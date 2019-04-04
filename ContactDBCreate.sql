use master
go

IF DB_ID('PerPortAaron') IS NOT NULL
	DROP DATABASE PerPortAaron
GO

create database PerPortAaron
go

use PerPortAaron
go

CREATE TABLE employees (
  EmployeeID int NOT NULL Primary Key Identity,
  EmployeeName varchar(45) NOT NULL,
  Position varchar(45) NOT NULL
)
go

CREATE TABLE replies (
  ReplyID int NOT NULL Primary Key Identity,
  EmployeeID int NOT NULL,
  ReplyEmail varchar(45) NOT NULL,
  ReplyText text NOT NULL
)
go

CREATE TABLE visitors (
  VisitorID int NOT NULL Primary Key Identity,
  FirstName varchar(45) NOT NULL,
  LastName varchar(45) NOT NULL,
  Email varchar(45) NOT NULL,
  Company varchar(45) NULL,
  Comments text NOT NULL
)
go

