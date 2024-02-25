

create table customers (
	c_id int auto_increment primary key,
	Name varchar(30) not null,
	Email varchar(30) not null,
	Pword varchar(30) NOT NULL,
	Address varchar(30) not null,
	Phone varchar(10) not null
);

drop table customers;
select * from customers;

create table admin(
a_id int auto_increment primary key,
Name varchar(30) not null,
Email varchar(30) not null,
Password varchar (30) not null
);
select * from admin;





















