create table generos(
id int auto_increment,
genero char(10),
primary key(id));

create table ciudades(
id int auto_increment,
ciudad  varchar(30),
primary key(id));

create table lenguajes(
id int auto_increment,
nombre_lenguaje varchar(30),
primary key(id));

create table usuarios(
id int auto_increment,
nombre_usuario varchar(40),
apellido_usuario varchar(40),
correo_usuario varchar(50),
fecha_nacimiento_usuario date,
genero int,
ciudad int,
unique(correo_usuario),
primary key(id),
foreign key (genero) references generos(id),
foreign key (ciudad) references ciudades(id));

drop table lenguaje_usuario;
drop table generos;
drop table ciudades;
drop table lenguajes;
drop table usuarios;


create table lenguaje_usuario(
nombre_usuario int,
nombre_lenguaje int,
foreign key (nombre_usuario) references usuarios(id),
foreign key (nombre_lenguaje) references lenguajes(id));
 
insert into ciudades (ciudad) values ('Bucaramanga'),('Florida'),('Giron'),('Piedecuesta'),('Lebrija');
insert into lenguajes (nombre_lenguaje) values('java'),('.net'),('sql'),('python'),('JavaScript');
insert into generos (genero) values ('masculino'),('femenino'),('otros');


describe usuarios;

	select*from usuarios;
    select*from lenguaje_usuario;
    
    alter table usuarios drop nombre_lenguaje;
select*from lenguajes;