use telecomm;
CREATE TABLE IF NOT EXISTS User (
userid varchar(100) not null primary key,

Password varchar(20) not null ,

SSN_passport varchar(200) ,
Name varchar(200) not null,
addressline1 varchar(200) not null,
addressline2 varchar(200),
city varchar(100) not null,
zip int(10) not null,
state varchar(200) not null,
country varchar(200) not null, 
CardNumber varchar(200) not null,
CVV varchar(20) not null,
ExpiryDate int(20) not null 

)






