/*


MySQL - 5.7.14-log : Database - pre_registration
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;




/*Table structure for table `answer` */







CREATE TABLE `course` (
  `cid` varchar(7) NOT NULL,
  `cname` varchar(63) DEFAULT NULL,
  `ccredit` int(1) DEFAULT NULL,
  `section` int(2) DEFAULT NULL,
  `time_day` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `course` */

insert  into `course`(`cid`,`cname`,`ccredit`,`section`,`time_day`) values ('CSC101','Introduction to Computer',3,1,'ST 9:40-11:10'),('CSC101L','Labwork for CSC101',1,1,'S 8:00-9:30'),('CSC201','Discrete Mathematics',3,1,'MW 1:40-3:10'),('CSC203','Data Structure',3,1,'ST 3:20-5:00'),('CSC203L','Labwork for Data Structure',1,1,'ST 1:40-3:10'),('CSC204','Computer Hardware & Ditital Logic',3,1,'ST 9:40-11:10'),('CSC204L','Labwork for CSC204',1,1,'M 8:00-9:30'),('CSC205','Programing Concept',3,1,'ST 9:40-11:10'),('CSC212','Microprocessors and Assembly Language',3,1,'ST 3:20-5:00'),('CSC212L','Labwork for CSC212',1,1,'S 9:40-11:10'),('CSC301','Finite Automata and Compatibility',3,1,'ST 1:40-3:10'),('CSC305','Object-Oriented Programming',3,1,'MW 1:40-3:10'),('CSC305L','Labwork for CSC305',1,1,'T 11:20-12:50'),('CSC306','Algoritms',3,1,'ST 1:40-3:10'),('CSC306L','Algoritms Lab',1,1,'S 11:20-12:50'),('CSC311','Computer Organization and Architecture',3,1,'ST 1:40-3:10'),('CSC317','Numerical Methods',3,1,'ST 9:40-11:10'),('CSC317L','Labwork for CSC317',1,1,'W 9:40-11:10'),('CSC401','Database Management',3,1,'MW 1:40-3:10'),('CSC401L','Database Management Lab',1,1,'ST 1:40-3:10'),('CSC403','Network Management',3,1,'ST 9:40-11:10'),('CSC404','Embedded Systems',3,1,'ST 9:40-11:10'),('CSC405','MIS and Systems Analysis',3,1,'MW 1:40-3:10'),('CSC411','Compiler Construction',3,1,'ST 9:40-11:10'),('CSC413','Design of Operating System',3,1,'ST 1:40-3:10'),('CSC420','Image Processing and Pattern Recognition',3,1,'MW 1:40-3:10'),('CSC421','Machine Learning',3,1,'ST 9:40-11:10'),('CSC422','Pattern Recognition',3,1,'ST 1:40-3:10'),('CSC423','Theory of Fuzzy Systems',3,1,'MW 1:40-3:10'),('CSC424','Neural Networks',3,1,'ST 1:40-3:10'),('CSC425','Artificial Intelligence',3,1,'ST 9:40-11:10'),('CSC426','Introduction to Robotics',3,1,'MW 9:40-11:10'),('CSC430','Data Communicatiion & Computer Networks',3,1,'ST 1:40-3:10'),('CSC430L','Labwork for CSC430',1,1,'MW 1:40-3:10'),('CSC445','Software Engineering',3,1,'ST 9:40-11:10'),('CSC450','Cryptography & Network Security',3,1,'ST 8:00-9:30'),('CSC452','Software Marketing',3,1,'MW 1:40-3:10'),('CSC453','Software Requirement Engineering',3,1,'ST 9:40-11:10'),('CSC454','Software Engineering Process Management',3,1,'ST 1:40-3:10'),('CSC455','Web Application & Internet',3,1,'MW 1:40-3:10'),('CSC456','Software Process Reengineering',3,1,'ST 1:40-3:10'),('CSC457','Project Management',3,1,'MW 1:40-3:10'),('CSC458','Software Quality & Testing',3,1,'ST 9:40-11:10'),('CSC498','Senior Project',6,1,'ST 1:40-3:10'),('CSC499','Internship',3,1,'ST 9:40-11:10');

/*Table structure for table `question` */



CREATE TABLE `question` (
  `qid` int(255) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `op1` varchar(255) DEFAULT NULL,
  `op2` varchar(255) DEFAULT NULL,
  `op3` varchar(255) DEFAULT NULL,
  `op4` varchar(255) DEFAULT NULL,
  `correct_ans` varchar(255) DEFAULT NULL,
  `marks` int(100) DEFAULT NULL,
  `subid` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  KEY `subid` (`subid`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `question` */

insert  into `question`(`qid`,`question`,`op1`,`op2`,`op3`,`op4`,`correct_ans`,`marks`,`suid`) values (1,'	\r\nWhich of the following is not a type of constructor?','Copy constructor','Friend constructor','Default constructor','Parameterized constructor','b',1,'CSC101'),(2,'why cout is used in C++ ?','for output','fot input','for both A & B','none','a',1,'CSC101'),(3,'why cin is used in C++ ?','for output','fot input','for both A & B','none','b',1,'CSC101L'),(4,'What is the MATLAB funtion for Symmetrical Hard Limit','hardlim','harldlims','logsigmoid','purelin','b',1,'CSC424'),(5,'Which of the following type of class allows only one object of it to be created?','Virtual class\r\n','Abstract class\r\n','Singleton class\r\n','Friend class\r\n','c',1,'CSC101'),(6,'In an undirected graph the number of nodes with odd degree must be','Zero','Odd','Prime','Even','d',1,'CSC201'),(7,'The relation { (1,2), (1,3), (3,1), (1,1), (3,3), (3,2), (1,4), (4,2), (3,4)} is','Reflexive','Transitive','Symmetric','Asymmetric','b',1,'CSC201'),(8,'In how many ways can a president and vice president be chosen from a set of 30 candidates? \r\n','820','850','880','870','d',1,'CSC201'),(9,'There are _____ tuples in finite state machine.','4','5','6','unlimited','b',1,'CSC301'),(11,'To describe the complement of a language, it is very important to describe the ----------- of that language over which the language is defined.','Alphabet','Regular Expression\r\n','String','Word','a',1,'CSC301'),(12,' If L1 and L2 are regular languages is/are also regular language(s).','L1 + L2','L1L2','L1','All of above\r\n','d',1,'CSC301');

/*Table structure for table `student` */



CREATE TABLE `student` (
  `sid` int(7) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `major` varchar(63) DEFAULT NULL,
  `minor` varchar(63) DEFAULT NULL,
  `semester` varchar(63) DEFAULT NULL,
  `course1` varchar(255) DEFAULT NULL,
  `course2` varchar(255) DEFAULT NULL,
  `course3` varchar(255) DEFAULT NULL,
  `course4` varchar(255) DEFAULT NULL,
  `course5` varchar(255) DEFAULT NULL,
  `course6` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `student` */

insert  into `student`(`sid`,`name`,`major`,`minor`,`semester`,`course1`,`course2`,`course3`,`course4`,`course5`,`course6`) values (1111111,'Mahfuzur Rahman','Computer Science','Anthropology','Spring 2016','CSC204','CSC204L','CSC205','CSC212','',''),(1122334,'Omar Faruk','EEE','CS','Spring 2016','CSC101','CSC101L','CSC201','CSC203','',''),(1220958,'forida','math','cs','Spring 2016','CSC201','CSC203','CSC203L','CSC204','CSC204L',''),(1330082,'bhoot15','Computer Science','Robotics','Spring 2016','CSC450','CSC456','CSC457','CSC458','',''),(1330084,'alif','Computer Science','MIS','Spring 2016','CSC306','CSC306L','CSC401','','',''),(1330193,'tanmoy','Computer Science','MIS','Spring 2016','CSC101','CSC101L','CSC201','CSC203','CSC203L',''),(1330250,'tasfia','Computer Science','MIS','Spring 2016','CSC425','CSC445','CSC450','CSC455','',''),(1330314,'Fhamida','Computer Science','Anthropology','Spring 2016','CSC101','CSC101L','CSC201','','','');

/*Table structure for table `subject` */



CREATE TABLE `subject` (
  `subid` varchar(7) NOT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `sdesc` varchar(255) DEFAULT NULL,
  `sid` int(7) DEFAULT NULL,
  PRIMARY KEY (`subid`),
  KEY `sid` (`sid`),
  CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `subject` */

insert  into `subject`(`subid`,`sname`,`sdesc`,`sid`) values ('CSC101','Introduction to CSC','foundation course taken by dr mahady hasan',NULL),('CSC101L','Labwork for CSC101','lab class will be conducted by dr mahady hasan',NULL),('CSC201','Discrete Maths','Section 1',NULL),('CSC301','Finite Automata','class will be conducted by dr Ashraful Amin',NULL),('CSC424','Neural Network','optional course',NULL);

/*Table structure for table `test` */



CREATE TABLE `test` (
  `tid` varchar(100) NOT NULL,
  `tname` varchar(100) DEFAULT NULL,
  `tdesc` varchar(100) DEFAULT NULL,
  `total_question` int(10) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `secret` varchar(10) DEFAULT NULL,
  `subid` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`tid`),
  KEY `subid` (`subid`),
  CONSTRAINT `test_ibfk_1` FOREIGN KEY (`subid`) REFERENCES `subject` (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `test` */

insert  into `test`(`tid`,`tname`,`tdesc`,`total_question`,`duration`,`secret`,`subid`) values ('001','test1','class test 1',10,10,'X92C2',NULL),('test 2 ','CT2 ','class test 2 ',10,10,'x92c2 ','CSC101L'),('test1_csc201 ','CT2 ','class test 2 ',5,5,'2GQ36 ','CSC301'),('test1_csc301 ','CT1 ','class test 1 ',5,5,'X92C2 ','CSC301'),('test_01_csc424 ','ct_01 ','this is 1st class test; syllabus - chapter 1 & 2 ',5,10,'X92C2 ','CSC424');

/*Table structure for table `user` */



CREATE TABLE `user` (
  `user_name` varchar(255) DEFAULT NULL,
  `user_type` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `minor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`user_name`,`user_type`,`password`,`email`,`student_id`,`full_name`,`major`,`minor`) values ('Dr. Aman Ullah','faculty','1234','aman@iub.edu.bd','1003','Aman Ullah Aman','',''),('Mahfuzur Rahman','student','1111','mahfuz@gmail.com','1111111','mahfuzur rahman','Computer Science','Anthropology'),('Omar Faruk','student','1234','faruk@hotmail.com','1122334','MD OMAR FARUK','EEE','CS'),('forida','student','1234','add@gmail.com','1220958','Afrida nakiba','math','cs'),('bhoot15','student','1122','shoumikxbox@gmail.com','1330082','Zobair Ibn Alam','Computer Science','Robotics'),('alif','student','1234','alif@gmail.com','1330084','Sheikh Muhtadi Alif','Computer Science','MIS'),('tanmoy','student','1111','tanmoy433@gmail.com','1330193','Tanmoy Indu Rana','Computer Science','MIS'),('tasfia','student','1234','tasfia@yahoo.com','1330250','tasfia sazzad','Computer Science','MIS'),('Fhamida','student','1234','fhamidaakterj.iub@gmail.com','1330314','Fhamida A Jahan','Computer Science','Anthropology'),('Habib Ullah','faculty','2001','habib@gmail.com','2001','Habib Ullah','',''),('faculty','faculty','faculty','faculty@iub.edu.bd','faculty','FACULTY',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
