-- Run as root

create database tutors;

-- Password is tutorville
-- Set-up privileges
-- Not a good practice to grant all privileges for WebApp user.
-- The SDEV Secure DB course will provide better approaches
Grant All Privileges on tutors.* to tutors_owner@localhost Identified by Password '*EB2BC30085F40F80205FE66591CF633D1BCE409E';

-- exit mysql 
exit

-- login into mysql as lab7_owner
mysql –u tutors_owner –p
tutorville

-- use the newly created lab7 database
use tutors;


-- Drops
drop table if exists TutorDetails;
drop table if exists StudentSchedules;
drop table if exists TutorSchedules;
drop table if exists GroupSchedules;
drop table if exists CourseGroups;
drop table if exists TutorGroups;
drop table if exists Students;
drop table if exists Semesters;
drop table if exists Courses;
drop table if exists Tutors;
drop table if exists GuestBook;


-- Create tables

CREATE TABLE Courses(
courseDisc varchar(4),
courseNum varchar(4),
courseTitle varchar(75),
Constraint Primary Key (courseDisc,courseNum) 
);

CREATE TABLE CourseGroups (
groupName varchar(10),
courseDisc varchar(4),
courseNum varchar(4),
Constraint Primary Key (groupName,courseDisc,courseNum),
Constraint Foreign Key (courseDisc,courseNum) references Courses(courseDisc,courseNum)
);


CREATE TABLE Students (
firstName varchar(30),
lastName varchar(30),
eMail varchar(60),
tychoName varchar(30) primary key
);

-- Tutor table
CREATE TABLE Tutors (
firstName varchar(30),
lastName varchar(30),
eMail varchar(60),
tychoName varchar(30) primary key,
f2f char(1)
);

-- Table for Tutor passwords
CREATE TABLE TutorDetails(
tychoName varchar(30),
password varchar(255),
Constraint Foreign Key (tychoName) references Tutors(tychoName),
Constraint Primary Key (tychoName)
);

-- Semesters table
CREATE TABLE Semesters(
sName varchar(14) primary key,
sStart date,
sStop date
);


CREATE TABLE GroupSchedules(
scheduleID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
thedate date,
day varchar(10),
timeStart int,
timeEnd int,
groupName varchar(10),
f2f char(1),
sName varchar(14),
Constraint Foreign Key (groupName) references CourseGroups(groupName),
Constraint Foreign Key (sName) references Semesters(sName)
);

-- TutorSchedule table to align with the GroupSchedules
CREATE TABLE TutorSchedules(
scheduleID int NOT NULL,
tychoName varchar(30),
Constraint Foreign Key (tychoName) references Tutors(tychoName),
Constraint Foreign Key (scheduleID) references GroupSchedules(scheduleID),
Constraint Primary Key (scheduleID,tychoName)
);
    
    
-- Now need a place for Students to sign-up based on the tutors time schedule
CREATE TABLE StudentSchedules(
scheduleID int NOT NULL,
tychoName varchar(30),
helpDescription varchar(255),
courseInfo varchar(10),
RegisterDate varchar(50),
Constraint Foreign Key (tychoName) references Students(tychoName),
Constraint Foreign Key (scheduleID) references GroupSchedules(scheduleID),
Constraint Primary Key (scheduleID,tychoName)
);

-- Create GuestBook
Create Table GuestBook (
scheduleID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
guestname varchar(50) not null,
comments varchar(1000)
);

-- exit mysql
exit

--log into mysql as root
mysql -u root -p
sdev300vm99

-- grant lab7_user the SELECT, INSERT, UPDATE and DELETE privilieges on the students table in the lab7 database
GRANT SELECT, INSERT, UPDATE, DELETE ON tutors.* TO tutors_user@localhost Identified by Password '*EB2BC30085F40F80205FE66591CF633D1BCE409E';