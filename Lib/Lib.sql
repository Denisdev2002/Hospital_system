create database Sistema_cadastro;
use Sistema_cadastro;
create table Cadastro(
	idUser int auto_increment not null,
    Full_name varchar(60) not null,
    Email varchar(65) not null,
    Identity varchar(15) not null,
    Birth date not null,
    SPassword varchar(10) not null,
    
    constraint PK_CADASTRO primary key (idUser)

);

select * from Cadastro;
