# Deployment

## Capistrano installation

To deploy our projects, we use Capistrano. It is a Ruby library made to make deployment easier.

First, you'll need Ruby on your machine, you can get it [here](https://www.ruby-lang.org/en/documentation/installation/). Then you can install bundler, which is a package manager for Ruby.

Init bundler on your project with : ``` bundle init ``` which will create a Gemfile where you can add the gems needed.
The gem needed is 'capistrano' and you can simply add the line ``` gem 'capistrano'``` and the gem needed for the type of project in the Gemfile and then ``` bundle install ``` to install it

Capistrano should now be installed on the project. To initialize all the files necessary, you can type ``` bundle exec cap install ``` and it will create :

* Capfile at the root of the project
* deploy.rb in the config folder of the project
* production.rb and staging.rb in the config/deploy folder
* the folder lib/capistrano/tasks

## Capfile

The Capfile should be set up by default, but you need to add a require for the gem installed for the specific project (symfony, drupal, etc)

## Codeship preparation

When Capistrano is set up, Codeship needs to be set up. A docker container has been created to deploy more simply.
First, we need to take care of SSH keys, a script has been created to handle it more simply :

```bash
#!/usr/bin/env bash
set -ex

CODESHIP_FOLDER=.codeship
KEYS_FOLDER=.codeship/keys

# ensure codeship directory exists
mkdir -p $KEYS_FOLDER

if [ ! -f $KEYS_FOLDER/codeship.aes ]; then
  printf "\033[0;31mFile '$KEYS_FOLDER/codeship.aes' must exist, can be downloaded from Codeship Pro project general settings tab.\033[0m\n"
  exit 1
fi

# Generate the key
printf "\033[0;34m* Generate SSH private key.\033[0m\n"
docker run -it --rm -v $(pwd)/$KEYS_FOLDER:/keys/ codeship/ssh-helper generate "dev@antistatique.net"

# Generate .env file then remove private key
if [ -f $CODESHIP_FOLDER/env.encrypted ]; then
  printf "\033[0;34m* Decrpty existing .env encrypted file.\033[0m\n"
  jet decrypt $CODESHIP_FOLDER/env.encrypted $KEYS_FOLDER/codeship.env --key-path $KEYS_FOLDER/codeship.aes
  sed '/PRIVATE_SSH_KEY/d' $KEYS_FOLDER/codeship.env > $KEYS_FOLDER/codeship.env.new
  mv $KEYS_FOLDER/codeship.env.new $KEYS_FOLDER/codeship.env
fi
printf "\033[0;34m* Add or replace SSH private key in .env file.\033[0m\n"
docker run -it --rm -v $(pwd)/$KEYS_FOLDER:/keys/ codeship/ssh-helper prepare
rm $KEYS_FOLDER/codeship_deploy_key

# Encrypt .env file then remove clear .env file
printf "\033[0;34m* Encrypt .env file.\033[0m\n"
jet encrypt $KEYS_FOLDER/codeship.env $CODESHIP_FOLDER/env.encrypted --key-path $KEYS_FOLDER/codeship.aes
rm $KEYS_FOLDER/codeship.env

# Just check that keys cannot be commited
if grep -v -q $KEYS_FOLDER .gitignore; then
  printf "\033[0;31mYou must add '$KEYS_FOLDER' to .gitignore file to avoid to commit it's content!\033[0m\n"
fi

# Print public key
printf "\033[0;34m* The public keys ($KEYS_FOLDER/codeship_deploy_key.pub):\n\n$(cat "$KEYS_FOLDER/codeship_deploy_key.pub")\033[0m\n"
```

The script must be at the root of the project. When run for the first time, an error will occur because a file doesn't exist. But the folder structure needed will be created.
The file needed is ``` .codeship/keys/codeship.aes ```, you need to create and put the AES key from the Codeship project in it. To get it, go into ``` Project settings > General ``` and copy it.

When the script has run successfully, the file ``` .codeship/env_encrypted ``` should have been created. Don't forget to put the ``` .codeship/keys ``` folder in the ``` .gitignore ``` of the project.

### Dockerfile.deploy

Now, we create the Dockerfile for the deploy container created, you can create it at ``` .codeship/Dockerfile.deploy ``` and put this in the file :

```dockerfile
FROM antistatique/deploy

WORKDIR /app

ADD Gemfile Gemfile.lock ./
RUN set -eux; \
  \
  bundle install --jobs=5 --retry=5; \
  \
  rm -rf /tmp/* $GEM_HOME/cache/* $HOME/.bundle/cache/*

COPY . ./
```

### Build

If you need to build a styleguide or such, it's easier to create another Dockerfile that will only be used to build it. As the deploy one, you can create the Dockerfile in the ``` .codeship ``` folder.

## Codeship configuration

Now that everything should be set up, we can create the files needed by Codeship to deploy

Codeship uses 2 files to run tasks :

* codeship-services.yml
* codeship-steps.yml

The first one is to declare the different services (docker containers) that Codeship will build.
The second one is more interesting since it's where we declare the differents steps that Codeship will run.

### codeship-services

This file is really close to a docker-compose file with some syntaxic differences. Here's an example :

```yml
node-build:
  build:
    context: .
    dockerfile: .codeship/Dockerfile.node
  volumes:
    - ./public/build:/app/public/build
deploy:
  build:
    context: .
    dockerfile: .codeship/Dockerfile.deploy
  cached: true
  default_cache_branch: develop
  encrypted_env_file: .codeship/env.encrypted
  volumes:
    - ./public/build:/app/public/build
```

The first service is a container that will be used to build the styles/styleguide of the project. The volume created is to share the result of the build with other services.

The second one is the deploy service. First, caching will help gain some times if no dependencies have been added to the project and setting the branch depending on deploy you want (staging or production). We also have to specify the file that was previously generated for SSH keys. And the volume is for the same purpose as the first one.


### codeship-steps

This is the file where we'll specify the steps Codeship will make when we push to the repository.

Here's an example of this file :

```yml
- name: Deploy
  type: serial
  steps:
    - name: Build styles
      service: node-build
      command: npm run production
    - name: Deploy to Staging
      service: deploy
      tag: develop
      command: cap staging deploy
```

The first thing to do is to name the step, then set the type. The type is important since it will declare if the steps will be run asynchronously or synchronously, the serial type is to make steps synchronous, since we want to build the styles before deploying.

Then we declare the steps, the first one is usually to build something. So we specify the service that will be run for the step (service that was declared in the codeship-services.yml file) and the command.
And the last is the deployment using the deploy service. The deploy service will just run capistrano and set the keys so Codeship will be able to deploy to the server.

## Github

Before deploying, you need to add the public key that was generated by the bash script ``` .codeship/keys/codeship_deploy_key.pub ``` to the Github deploy keys of the project.