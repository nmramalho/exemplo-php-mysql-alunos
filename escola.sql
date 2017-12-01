drop database if exists escola;
create database escola;
use escola;

create table aluno (
	email varchar(45) primary key,
	nome varchar(50),
	idade int(3),
	turma varchar(10),
	ano int(2),
	username varchar(25),
	pass varchar(255));
 
   
insert into aluno values ('teste@email.com','Teste',16,'E',12,'teste','$2y$10$ZXe5QUKxk/JvBKdxZYxyw.p0TzxXjRKVDVmDeLIwIiaf7SRgkbHm6');  
insert into aluno values ('aluno22222@email.com','Teste222',16,'E',12,'teste2','$2y$10$ZXe5QUKxk/JvBKdxZYxyw.p0TzxXjRKVDVmDeLIwIiaf7SRgkbHm6');   
insert into aluno values ('aluno33333@email.com','Teste3333',16,'E',12,'teste3','$2y$10$ZXe5QUKxk/JvBKdxZYxyw.p0TzxXjRKVDVmDeLIwIiaf7SRgkbHm6'); 