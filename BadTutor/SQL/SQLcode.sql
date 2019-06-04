-- Use the tutors database
use tutors;

-- Insert some students
insert into Students values ('Melody','Fritz','mfritz@student.umuc.edu','mfritz');
insert into Students values ('Jon','Robbins','jrobbins@student.umuc.edu','jrobbins');
insert into Students values ('Tiffany','Jones','tjones@student.umuc.edu','tjones');
insert into Students values ('Mel','Griffin','mgriffin@student.umuc.edu','mgriffin');

-- Some Semester data
insert into Semesters values ('Spring 2015','2015-01-12','2015-05-10');
insert into Semesters values ('Summer 2015','2015-05-18','2015-08-09');

-- Load some courses for First semester:
insert into Courses values ('CMIS', '102','Introduction to Problem Solving and Algorithm Design');
insert into Courses values ('CMIS', '141','Introductory Programming');
insert into Courses values ('CMIS' ,'242','Intermediate Programming');
insert into Courses values ('CMIS' ,'320','Relational Database Concepts and Applications');

-- Insert some CourseGroups
insert into CourseGroups values ('A','CMIS','102');
insert into CourseGroups values ('B','CMIS','141');
insert into CourseGroups values ('B','CMIS','242');
insert into CourseGroups values ('C','CMIS','320');


-- Insert some Tutors
insert into tutors values ('Tutor','One','tutor1@umuc.edu','tutor1','N');
insert into tutors values ('Tutor','Two','tutor2@umuc.edu','tutor2','N');
insert into tutors values ('Tutor','Three','tutor3@umuc.edu','tutor3','N');

-- Insert tutor details
insert into TutorDetails values ('tutor1','t123');
insert into TutorDetails values ('tutor2','t234');
insert into TutorDetails values ('tutor3','t345');

-- Insert some Group Schedules
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',900,930,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',930,1000,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1000,1030,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1030,1100,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1100,1130,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1130,1200,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1200,1230,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-20','Sunday',1230,1300,'A','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',1800,1830,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',1830,1900,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',1900,1930,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',1930,2000,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',2000,2030,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',2030,2100,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',2100,2130,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-21','Monday',2130,2200,'B','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',1800,1830,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',1830,1900,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',1900,1930,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',1930,2000,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',2000,2030,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',2030,2100,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',2100,2130,'C','N','Spring 2015');
insert into GroupSchedules (thedate,day,timeStart,timeEnd,groupName,f2f,sName) values ('2015-04-22','Tuesday',2130,2200,'C','N','Spring 2015');



insert into TutorSchedules values (1,'tutor1');
insert into TutorSchedules values (2,'tutor1');
insert into TutorSchedules values (3,'tutor1');
insert into TutorSchedules values (4,'tutor1');
insert into TutorSchedules values (5,'tutor1');
insert into TutorSchedules values (6,'tutor1');
insert into TutorSchedules values (7,'tutor1');
insert into TutorSchedules values (8,'tutor1');
insert into TutorSchedules values (9,'tutor2');
insert into TutorSchedules values (10,'tutor2');
insert into TutorSchedules values (11,'tutor2');
insert into TutorSchedules values (12,'tutor2');
insert into TutorSchedules values (13,'tutor2');
insert into TutorSchedules values (14,'tutor2');
insert into TutorSchedules values (15,'tutor2');
insert into TutorSchedules values (16,'tutor2');
insert into TutorSchedules values (17,'tutor3');
insert into TutorSchedules values (18,'tutor3');
insert into TutorSchedules values (19,'tutor3');
insert into TutorSchedules values (20,'tutor3');
insert into TutorSchedules values (21,'tutor3');
insert into TutorSchedules values (22,'tutor3');
insert into TutorSchedules values (23,'tutor3');
insert into TutorSchedules values (24,'tutor3');


-- Some Schedules - requests for tutors
insert into StudentSchedules values (1,'mfritz','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (2,'mfritz','Need help on Project 2','CMIS141',now());
insert into StudentSchedules values (3,'mfritz','Need help on Project 3','CMIS141',now());
insert into StudentSchedules values (4,'mfritz','Need help on Project 4','CMIS141',now());
insert into StudentSchedules values (5,'jrobbins','Need help on Project 1','CMIS242',now());
insert into StudentSchedules values (6,'jrobbins','Need help on Project 1','CMIS242',now());
insert into StudentSchedules values (7,'jrobbins','Need help on Project 1','CMIS242',now());
insert into StudentSchedules values (8,'jrobbins','Need help on Project 1','CMIS242',now());
insert into StudentSchedules values (9,'tjones','Need help on Project 1','CMIS320',now());
insert into StudentSchedules values (10,'tjones','Need help on Project 1','CMIS320',now());
insert into StudentSchedules values (11,'tjones','Need help on Project 1','CMIS320',now());
insert into StudentSchedules values (12,'tjones','Need help on Project 1','CMIS320',now());
insert into StudentSchedules values (13,'mgriffin','Need help on Project 1','CMIS102',now());
insert into StudentSchedules values (14,'mgriffin','Need help on Project 1','CMIS102',now());
insert into StudentSchedules values (15,'mgriffin','Need help on Project 1','CMIS102',now());
insert into StudentSchedules values (16,'mgriffin','Need help on Project 1','CMIS102',now());
insert into StudentSchedules values (17,'mfritz','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (18,'mfritz','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (19,'jrobbins','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (20,'jrobbins','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (21,'tjones','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (22,'tjones','Need help on Project 1','CMIS141',now());
insert into StudentSchedules values (23,'mgriffin','Need help on Project 1','CMIS242',now());
insert into StudentSchedules values (24,'mgriffin','Need help on HW 3','CMIS320',now());
