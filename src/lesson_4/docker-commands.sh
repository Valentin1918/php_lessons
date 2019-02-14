#!/usr/bin/env bash

docker ps
docker volume ls
docker ps #whole containers
docker kill containerId # docker-compose up -d will up all needed containers
docker-compose up #from the folder with docker-compose.yml ctrl+C for quit
docker-compose down
docker-compose up -d #in daemon (doesn't block a console)
docker-compose exec mysql bash #write 'exit' or ctrl+P twice + ENTER for exit, ctrl+L move last line to top, ctrl+I -- info
docker-compose exec mysql mysql -uroot -proot
#mysql>
show databases;
create database catalog; #DB creating
use catalog; #work in some DB
show tables; #show tables in DB
describe products; #show columns keys, data types, default values
