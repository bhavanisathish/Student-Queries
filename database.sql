#create a database named as student
create database student;

#create a student registration table

create table user(NAME varchar(100),USERNAME varchar(100),PASSWORD varchar(100),QUESTION varchar(100),ANSWER varchar(100));


#create a alumini registration table

create table  `alumini` (`NAME` varchar(100) , `USERNAME` varchar(100), `EMAIL` varchar(100), `PASSWORD` varchar(100), `ANSWER` varchar(100), `QUESTION` varchar(100), `BATCH` int(10));

#create a chat table

create table chat(`sender` varchar(100), `msg` varchar(1000), `date` date(10), `time` time(6));

#create a query table

create table query(image blob,sub varchar(100),chat varchar(100),video blob,idno int(10),flag int(10));

#create a event table

create table event(image blob,sub varchar(100));