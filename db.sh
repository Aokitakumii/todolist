#!/bin/sh

mysql -uroot -e "drop database todolist"

mysql -uroot -e "create database todolist character set UTF8;"

mysql -uroot -e "create table todolist.todo(id int primary key,title varchar(30));"

mysql -uroot -e "insert into todolist.todo(id,title)values(0,'test')"

mysql -uroot todolist -e "select * from todo"
