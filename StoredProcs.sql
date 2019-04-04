USE [PerPortAaron]
GO
drop procedure if exists sp_insertVisitor
go

create procedure sp_insertVisitor
@visitorFName varchar(50),
@visitorLName varchar(50),
@visitorEmail varchar(50),
@company varchar(50),
@message varchar(200)
as
INSERT INTO [dbo].[visitors]
           ([FirstName]
           ,[LastName]
           ,[Email]
           ,[Company]
           ,[Comments])
     VALUES
           (@visitorFName,
            @visitorLName,
            @visitorEmail,
            @company,
            @message)
GO


exec sp_insertVisitor 'Jim', 'Bob', 'Jim@bob.com', NULL, 'This website is awesome'


create login Tears with password='Pa$$w0rd', default_Database=perportaaron
go
use perportaaron
create user Tears for login tears with default_schema=dbo
go
grant execute on sp_insertVisitor to Tears
go

