create database if not exists bleet;
use bleet;

create table if not exists socio(
    id int(11) primary key auto_increment,
    nome varchar(80) not null,
    email varchar(255) not null,
    username varchar(80) unique not null,
    password varchar(255) not null,
    associacaoId int(11) not null,
    permissions longtext not null
);

create table if not exists loginTokens(
    id int(11) primary key auto_increment,
    socioId int(11) not null,
    token varchar(255) unique not null
);


create table if not exists associacao(
    id int(11) primary key auto_increment,
    nome varchar(80) not null,
    morada varchar(255) not null,
    telefone varchar(15) not null,
    nContribuinte varchar(10) not null
);

create table imagensAssociacao(
    id int(11) primary key auto_increment,
    caminho varchar(255) not null,
    associacaoId int(11) not null
);

create table if not exists noticias(
    id int(11) primary key auto_increment,
    titulo varchar(120) not null,
    conteudo varchar(255) not null,
    caminhoImg varchar(255) not null,
    associacaoId int(11) not null
);

create table if not exists eventos(
    id int(11) primary key auto_increment,
    titulo varchar(120) not null,
    conteudo varchar(255) not null,
    associacaoId int(11) not null
);

create table if not exists eventoInscricoes(
    id int(11) primary key auto_increment,
    eventoId int(11) not null,
    socioId int(11) not null
);

create table if not exists quotas(
    id int(11) primary key auto_increment,
    socioId int(11) not null,
    dataComeco date not null,
    dataTermino date not null,
    preco int(4)
);

create table if not exists notificacoes(
    id int(11) primary key auto_increment,
    socioId int(11) not null,
    conteudo varchar(255) not null
);
