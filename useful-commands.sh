#!/usr/bin/env bash
docker ps # запущенные процессы
docker ps -a # все процессы
docker rm c # удаления процесса ID которого начинаться на с
docker rm $(docker ps -aq) # удаление всех процессов
docker run redis # запуск редиса
docker run --name redis redis # запуск редиса и присвоение этому процемму имя redis
docker run -it redis # запуск редиса и переход в папку этого процесса
docker inspect redis # инспект процесса

ps aux | grep redis # вывод всех процессов связанных с редисом

php --help
php -a # запуск Interactive shell php
docker run -it php:cli # запуск Interactive shell php в докере
nano hello.php # создали файл hello.php
php -f hello.php # запустили файл hello.php
docker run --rm -v $(pwd):/app -w /app php:cli php hello.php # запустили файл hello.php в докере

php > echo PHP_INT_MAX;
php > echo PHP_FLOAT_MAX;
