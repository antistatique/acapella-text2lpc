set :application, 'Text2LPC'
set :repo_url, 'git@github.com:antistatique/acapella-text2lpc.git'
set :user, 'acapella-text2lpc'

server 'ssh-acapella-text2lpc.alwaysdata.net', user: 'acapella-text2lpc', roles: %w{app db web}

# ask :branch, proc { `git rev-parse --abbrev-ref HEAD`.chomp }

set :linked_files, fetch(:linked_files, []).push(".env")

set :laravel_version, 5.8
set :laravel_upload_dotenv_file_on_deploy, false
set :laravel_server_user, :user
set :laravel_5_linked_dirs, [
  'storage'
]

set :laravel_set_acl_paths, false

set :laravel_5_acl_paths, [
  'bootstrap/cache',
  'storage',
  'storage/app',
  'storage/app/public',
  'storage/framework',
  'storage/framework/cache',
  'storage/framework/sessions',
  'storage/framework/views',
  'storage/logs'
  # TODO : Private images
]

after 'laravel:storage_link', 'laravel:migrate'

# set :format, :pretty
# set :log_level, :debug
# set :pty, true

# set :default_env, { path: "/opt/ruby/bin:$PATH" }
set :keep_releases, 5

#namespace :deploy do
 # after :finishing, 'deploy:cleanup'
#end
