use telecomm;
create table availablenumbers(
 phonenumber int(20) not null check(phonenumber between 900000000 and 9999999999) 
)
