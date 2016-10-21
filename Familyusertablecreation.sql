use telecomm;

drop table Familyuser;

CREATE TABLE IF NOT EXISTS Familyuser (
  Userid varchar(200) primary key,
  FOREIGN KEY (Userid) REFERENCES user(Userid) ,
  phonenumber1 int(20) not null check(phonenumber between 500000000 and 9999999999),
  phonenumber2 int(20) not null check(phonenumber between 500000000 and 9999999999),
  phonenumber3 int(20) not null check(phonenumber between 500000000 and 9999999999),
  phonenumber4 int(20) not null check(phonenumber between 500000000 and 9999999999),
  phonenumber5 int(20) not null check(phonenumber between 500000000 and 9999999999),
  plan varchar(200) not null,
  foreign key(plan) references availableplans(PlanName)
) 




