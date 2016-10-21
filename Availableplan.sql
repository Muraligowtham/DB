use telecomm;

create table AvailablePlans(
 PlanName varchar(120) not null primary key,
 PlanDescription varchar(120) not null,
 costperMinute int(20) not null,
 costperMB int(20) not null,
 costperMessage int(20) not null
 )
