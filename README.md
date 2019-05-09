# Acapella-text2LPC

Project to transform a French sentence to LPC keys.

## Tools used

### Phonemizer

Phonemizer was used in this project, the repository for this library can be found [here](https://github.com/bootphon/phonemizer/tree/v1.0.1). The library is under a GPL licence.

## Project Setup

This project runs on Docker, if you don't have it installed you can get it [here]((https://www.docker.com/get-started)).
It also uses a Makefile to make life easier and run commands on the containers easily, so make sure to have that installed locally.

To setup the projects, simply run this command in your terminal at the root of the project :

```
make setup
```

It will build the 2 containers (database and project), setup the project and run the migrations.
The Laravel project will be available on localhost with the port 8181 and if you want to access the MariaDB database, it's on port 9999.

The credentials for the development database are :

|Database|User|Password|
|---|---|---|
|acapella|acapealla|acapealla|

## Other make commands

To make life easier, there are other make commands to run different actions :

* ``` make setup ``` : Setup the project
* ``` make build ``` : Only build the containers
* ``` make up ``` : Starts the containers
* ``` make migrations ``` : Run the migrations
* ``` make stop ``` : Stop the containers
* ``` make restart ``` : Restart the containers
* ``` make test ``` : Run PHP tests
