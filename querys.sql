create user 'luis'@'localhost' identified by 'password';
grant all on *.* to 'luis'@'localhost';
create database department;
create table department(id int not null primary key,name varchar(30),location varchar(30),phone int);
