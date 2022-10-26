include .env
DC = docker-compose
EXEC = exec app
EXEC_USER = exec --user www-data app

## ------ Docker and containers management ------

#start containers
start:
	${DC} up -d

#stop containers
stop:
	${DC} stop

#drop and remove volumes
down-v:
	${DC} down -v

#restart containers
restart:
	${DC} restart

#build containers
build:
	${DC} build

#ssh to lavarel container
shell-app:
	${DC} ${EXEC} bash

#ssh to mariadb container
shell-db:
	${DC} exec db bash


## ------ Setup guide ------

init: copy-env start composer-install artisan-cc

#copy env file
copy-env:
	cp .env.example .env

#run composer install in laravel
composer-install:
	${DC} ${EXEC} composer install

#clear laravel caches
artisan-cc:
	${DC} ${EXEC} php artisan optimize:clear
