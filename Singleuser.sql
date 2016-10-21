use telecomm;
drop table SingleUser;

CREATE TABLE IF NOT EXISTS singleuser (
  Userid varchar(200) primary key,
  FOREIGN KEY (Userid) REFERENCES user(userid) ,
  phonenumber int(20) not null check(phonenumber between 900000000 and 9999999999) ,
  plan varchar(200) not null,
  foreign key(plan) references availableplans(PlanName)
)




