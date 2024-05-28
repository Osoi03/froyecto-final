-- Active: 1712311877209@@127.0.0.1@3306@symfony
CREATE DATABASE registro;

CREATE TABLE usuario(
    nombre VARCHAR (20),
    email VARCHAR (20),
    usuario VARCHAR (20),
    contrasena VARCHAR (20)
);

USE registro;


CREATE TABLE contactos(
    nombrecontacto VARCHAR (20),
    telefonocontacto INT (9));
