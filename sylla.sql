drop database if exists `sylla`;
create database if not exists `sylla`;
use `sylla`;

create table message(
    id int primary key,
    libelle text,
    user varchar(35)
)engine=innodb;
/*
    nous allons utiliser cette table pour notre teste  ... sa vas suffir on vas l'executé 
*/