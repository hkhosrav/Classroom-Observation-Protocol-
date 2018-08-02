-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2018 at 11:24 AM
-- Server version: 5.7.20
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uq_copus_db`
--
CREATE DATABASE IF NOT EXISTS `uq_copus_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uq_copus_db`;

-- --------------------------------------------------------

--
-- Table structure for table `Class_Activity_One_Hour`
--

DROP TABLE IF EXISTS `Class_Activity_One_Hour`;
CREATE TABLE `Class_Activity_One_Hour` (
  `ID` int(255) NOT NULL,
  `Time_Slot` varchar(20) NOT NULL,
  `Faculty_Activity` varchar(100) NOT NULL,
  `Student_Activity` varchar(100) NOT NULL,
  `Student_Engagement` decimal(10,1) NOT NULL,
  `Num_Students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Activity_One_Hour`:
--   `Faculty_Activity`
--       `Faculty_Activities` -> `Activity`
--   `Student_Activity`
--       `Student_Activities` -> `Activity`
--   `Time_Slot`
--       `Time_Slot_One_Hour` -> `Slot`
--   `Student_Engagement`
--       `Student_Engagement` -> `Engagement`
--

--
-- Dumping data for table `Class_Activity_One_Hour`
--

INSERT INTO `Class_Activity_One_Hour` (`ID`, `Time_Slot`, `Faculty_Activity`, `Student_Activity`, `Student_Engagement`, `Num_Students`) VALUES
(1, '00-02', 'Lecturing', 'Listening', '0.9', 88),
(1, '02-04', 'Lecturing', 'Listening', '0.9', 88),
(1, '04-06', 'Lecturing', 'Listening', '0.9', 89),
(1, '06-08', 'Lecturing', 'Listening', '1.0', 90),
(1, '08-10', 'Lecturing', 'Listening', '0.9', 90),
(1, '10-12', 'Asking a clicker question', 'Clicker Question discussion', '0.9', 90),
(1, '12-14', 'Follow-up on clicker questions or activity', 'Listening', '0.9', 90),
(1, '14-16', 'Lecturing', 'Listening', '0.9', 90),
(1, '16-18', 'Lecturing', 'Listening', '0.9', 90),
(1, '18-20', 'Lecturing', 'Listening', '0.9', 90),
(1, '20-22', 'Lecturing', 'Listening', '0.8', 90),
(1, '22-24', 'Asking a clicker question', 'Clicker Question discussion', '0.9', 90),
(1, '24-26', 'Follow-up on clicker questions or activity', 'Listening', '0.9', 90),
(1, '26-28', 'Lecturing', 'Listening', '0.9', 90),
(1, '28-30', 'Lecturing', 'Listening', '0.9', 90),
(1, '30-32', 'Lecturing', 'Listening', '0.9', 89),
(1, '32-34', 'Lecturing', 'Listening', '0.8', 89),
(1, '34-36', 'Asking a clicker question', 'Clicker Question discussion', '0.9', 89),
(1, '36-38', 'Follow-up on clicker questions or activity', 'Individual thinking', '0.9', 89),
(1, '38-40', 'Adminstration', 'Worksheet group work', '0.9', 89),
(1, '40-42', 'Adminstration', 'Worksheet group work', '0.9', 88),
(1, '42-44', 'Adminstration', 'Worksheet group work', '0.9', 88),
(1, '44-46', 'Adminstration', 'Worksheet group work', '0.9', 88),
(1, '46-48', 'Adminstration', 'Worksheet group work', '0.9', 88),
(1, '48-50', 'Answering student questions', 'Student asks Question', '0.7', 88),
(2, '00-02', 'Lecturing', 'Listening', '0.7', 88),
(2, '02-04', 'Lecturing', 'Listening', '0.8', 88),
(2, '04-06', 'Lecturing', 'Listening', '0.8', 89),
(2, '06-08', 'Lecturing', 'Listening', '0.9', 90),
(2, '08-10', 'Lecturing', 'Listening', '0.8', 90),
(2, '10-12', 'Asking a clicker question', 'Clicker Question discussion', '0.8', 90),
(2, '12-14', 'Follow-up on clicker questions or activity', 'Listening', '0.8', 90),
(2, '14-16', 'Lecturing', 'Listening', '0.8', 90),
(2, '16-18', 'Lecturing', 'Listening', '0.8', 90),
(2, '18-20', 'Lecturing', 'Listening', '0.8', 90),
(2, '20-22', 'Lecturing', 'Listening', '0.7', 90),
(2, '22-24', 'Asking a clicker question', 'Clicker Question discussion', '0.8', 90),
(2, '24-26', 'Follow-up on clicker questions or activity', 'Listening', '0.8', 90),
(2, '26-28', 'Lecturing', 'Listening', '0.8', 90),
(2, '28-30', 'Lecturing', 'Listening', '0.8', 90),
(2, '30-32', 'Lecturing', 'Listening', '0.8', 89),
(2, '32-34', 'Lecturing', 'Listening', '0.7', 89),
(2, '34-36', 'Asking a clicker question', 'Clicker Question discussion', '0.9', 89),
(2, '36-38', 'Follow-up on clicker questions or activity', 'Individual thinking', '0.9', 89),
(2, '38-40', 'Adminstration', 'Test or Quiz', '0.9', 89),
(2, '40-42', 'Adminstration', 'Test or Quiz', '0.9', 88),
(2, '42-44', 'Adminstration', 'Test or Quiz', '0.9', 88),
(2, '44-46', 'Adminstration', 'Test or Quiz', '0.9', 88),
(2, '46-48', 'Adminstration', 'Test or Quiz', '0.9', 88),
(2, '48-50', 'Answering student questions', 'Student asks Question', '0.5', 88);

-- --------------------------------------------------------

--
-- Table structure for table `Class_Activity_One_Hour_Preview`
--

DROP TABLE IF EXISTS `Class_Activity_One_Hour_Preview`;
CREATE TABLE `Class_Activity_One_Hour_Preview` (
  `ID` int(255) NOT NULL,
  `Time_Slot` varchar(20) NOT NULL,
  `Faculty_Activity` varchar(100) NOT NULL,
  `Student_Activity` varchar(100) NOT NULL,
  `Student_Engagement` decimal(10,1) NOT NULL,
  `Num_Students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Activity_One_Hour_Preview`:
--   `Faculty_Activity`
--       `Faculty_Activities` -> `Activity`
--   `Student_Activity`
--       `Student_Activities` -> `Activity`
--   `Time_Slot`
--       `Time_Slot_One_Hour` -> `Slot`
--   `Student_Engagement`
--       `Student_Engagement` -> `Engagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class_Activity_Two_Hour`
--

DROP TABLE IF EXISTS `Class_Activity_Two_Hour`;
CREATE TABLE `Class_Activity_Two_Hour` (
  `ID` int(255) NOT NULL,
  `Time_Slot` varchar(20) NOT NULL,
  `Faculty_Activity` varchar(100) NOT NULL,
  `Student_Activity` varchar(100) NOT NULL,
  `Student_Engagement` decimal(10,1) NOT NULL,
  `Num_Students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Activity_Two_Hour`:
--   `Faculty_Activity`
--       `Faculty_Activities` -> `Activity`
--   `Student_Activity`
--       `Student_Activities` -> `Activity`
--   `Student_Engagement`
--       `Student_Engagement` -> `Engagement`
--   `Time_Slot`
--       `Time_Slot_Two_Hour` -> `Slot`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class_Activity_Two_Hour_Preview`
--

DROP TABLE IF EXISTS `Class_Activity_Two_Hour_Preview`;
CREATE TABLE `Class_Activity_Two_Hour_Preview` (
  `ID` int(255) NOT NULL,
  `Time_Slot` varchar(20) NOT NULL,
  `Faculty_Activity` varchar(100) NOT NULL,
  `Student_Activity` varchar(100) NOT NULL,
  `Student_Engagement` decimal(10,1) NOT NULL,
  `Num_Students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Activity_Two_Hour_Preview`:
--   `Faculty_Activity`
--       `Faculty_Activities` -> `Activity`
--   `Student_Activity`
--       `Student_Activities` -> `Activity`
--   `Student_Engagement`
--       `Student_Engagement` -> `Engagement`
--   `Time_Slot`
--       `Time_Slot_Two_Hour` -> `Slot`
--

-- --------------------------------------------------------

--
-- Table structure for table `Class_Duration_One_Hour`
--

DROP TABLE IF EXISTS `Class_Duration_One_Hour`;
CREATE TABLE `Class_Duration_One_Hour` (
  `Duration_Minutes` int(10) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Duration_One_Hour`:
--

--
-- Dumping data for table `Class_Duration_One_Hour`
--

INSERT INTO `Class_Duration_One_Hour` (`Duration_Minutes`, `Description`) VALUES
(50, '1 hour session');

-- --------------------------------------------------------

--
-- Table structure for table `Class_Duration_Two_Hour`
--

DROP TABLE IF EXISTS `Class_Duration_Two_Hour`;
CREATE TABLE `Class_Duration_Two_Hour` (
  `Duration_Minutes` int(10) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Class_Duration_Two_Hour`:
--

--
-- Dumping data for table `Class_Duration_Two_Hour`
--

INSERT INTO `Class_Duration_Two_Hour` (`Duration_Minutes`, `Description`) VALUES
(110, '2 hour session');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
CREATE TABLE `Course` (
  `Course_Code` varchar(20) NOT NULL,
  `Course_Title` varchar(50) NOT NULL,
  `Units` int(10) NOT NULL,
  `Course_Coordinator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Course`:
--

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`Course_Code`, `Course_Title`, `Units`, `Course_Coordinator`) VALUES
('CSSE7030', 'Introduction to Software Engineering', 2, 's158956'),
('DATA7001', 'Introduction to Data Science', 2, 's148169'),
('INFS7205', 'Advanced Techniques for High Dimensional Data', 2, 's158956'),
('INFS7901', 'Database Principles', 2, 's151251');

-- --------------------------------------------------------

--
-- Table structure for table `Course_Units`
--

DROP TABLE IF EXISTS `Course_Units`;
CREATE TABLE `Course_Units` (
  `Units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Course_Units`:
--

--
-- Dumping data for table `Course_Units`
--

INSERT INTO `Course_Units` (`Units`) VALUES
(2),
(4);

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

DROP TABLE IF EXISTS `Faculty`;
CREATE TABLE `Faculty` (
  `Dept_ID` varchar(20) NOT NULL,
  `Dept_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Faculty`:
--

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`Dept_ID`, `Dept_Name`) VALUES
('BEL', 'Business, Economics & Law'),
('EAIT', 'Engineering, Architecture & Information Technology'),
('HABS', 'Health & Behavioural Sciences'),
('HASS', 'Humanities & Social Sciences'),
('MED', 'Medicine'),
('SCI', 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `Faculty_Activities`
--

DROP TABLE IF EXISTS `Faculty_Activities`;
CREATE TABLE `Faculty_Activities` (
  `Activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Faculty_Activities`:
--

--
-- Dumping data for table `Faculty_Activities`
--

INSERT INTO `Faculty_Activities` (`Activity`) VALUES
('Adminstration'),
('Answering student questions'),
('Asking a clicker question'),
('Conducting a demo,experiment etc.'),
('Follow-up on clicker questions or activity'),
('Lecturing'),
('Moving through the class'),
('One-on-one discussions with students'),
('Other'),
('Posing nonclicker questions'),
('Real-time writing'),
('Waiting');

-- --------------------------------------------------------

--
-- Table structure for table `Instructor`
--

DROP TABLE IF EXISTS `Instructor`;
CREATE TABLE `Instructor` (
  `Personal_No` varchar(20) NOT NULL,
  `First_Name` text NOT NULL,
  `Last_Name` text NOT NULL,
  `Designation` text NOT NULL,
  `Dept_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Instructor`:
--   `Dept_ID`
--       `Faculty` -> `Dept_ID`
--

--
-- Dumping data for table `Instructor`
--

INSERT INTO `Instructor` (`Personal_No`, `First_Name`, `Last_Name`, `Designation`, `Dept_ID`) VALUES
('s148169', 'Shazia', 'Sadiq', 'Senior Lecturer', 'EAIT'),
('s151251', 'Hassan', 'Khosravi', 'Senior Lecturer', 'EAIT'),
('s155221', 'Richard', 'Thomas', 'Senior Lecturer', 'EAIT'),
('s158956', 'Guanfeng', 'Liu', 'Senior Lecturer', 'EAIT'),
('s190553', 'Thomas', 'Tamire', 'Lecturer', 'SCI');

-- --------------------------------------------------------

--
-- Table structure for table `Program`
--

DROP TABLE IF EXISTS `Program`;
CREATE TABLE `Program` (
  `Program_Code` varchar(20) NOT NULL,
  `Program_Name` varchar(50) NOT NULL,
  `Faculty` varchar(20) NOT NULL,
  `Program_Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Program`:
--   `Faculty`
--       `Faculty` -> `Dept_ID`
--

--
-- Dumping data for table `Program`
--

INSERT INTO `Program` (`Program_Code`, `Program_Name`, `Faculty`, `Program_Level`) VALUES
('073270G', 'Master of Computer Science', 'EAIT', '9'),
('073272E', 'Master of Computer Science', 'EAIT', '9'),
('080723B', 'Master of Information Technology', 'EAIT', '9'),
('092454G', 'Master of Data Science', 'EAIT', '9');

-- --------------------------------------------------------

--
-- Table structure for table `Program_Course_Relationship`
--

DROP TABLE IF EXISTS `Program_Course_Relationship`;
CREATE TABLE `Program_Course_Relationship` (
  `Program_Code` varchar(20) NOT NULL,
  `Course_Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Program_Course_Relationship`:
--   `Course_Code`
--       `Course` -> `Course_Code`
--   `Program_Code`
--       `Program` -> `Program_Code`
--

--
-- Dumping data for table `Program_Course_Relationship`
--

INSERT INTO `Program_Course_Relationship` (`Program_Code`, `Course_Code`) VALUES
('092454G', 'CSSE7030'),
('092454G', 'DATA7001'),
('092454G', 'INFS7205'),
('092454G', 'INFS7901');

-- --------------------------------------------------------

--
-- Table structure for table `Program_Level`
--

DROP TABLE IF EXISTS `Program_Level`;
CREATE TABLE `Program_Level` (
  `Level` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Program_Level`:
--

--
-- Dumping data for table `Program_Level`
--

INSERT INTO `Program_Level` (`Level`, `Description`) VALUES
(1, 'Certificate I'),
(2, 'Certificate II'),
(3, 'Certificate III'),
(4, 'Certificate IV'),
(5, 'Diploma'),
(6, 'Advanced Diploma/Associate Degree'),
(7, 'Bachelor Degree'),
(8, 'Bachelor Honours Degree/Graduate Certificate/Graduate Diploma'),
(9, 'Masters Degree'),
(10, 'Doctoral Degree');

-- --------------------------------------------------------

--
-- Table structure for table `Semester`
--

DROP TABLE IF EXISTS `Semester`;
CREATE TABLE `Semester` (
  `Semester` int(10) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Semester`:
--

--
-- Dumping data for table `Semester`
--

INSERT INTO `Semester` (`Semester`, `Description`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2');

-- --------------------------------------------------------

--
-- Table structure for table `Session_One_Hour`
--

DROP TABLE IF EXISTS `Session_One_Hour`;
CREATE TABLE `Session_One_Hour` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Year` int(10) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Teaching_Week` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Course_Code` varchar(20) NOT NULL,
  `Instructor` varchar(20) NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration_Minutes` int(10) NOT NULL,
  `Enrolled_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Session_One_Hour`:
--   `Course_Code`
--       `Course` -> `Course_Code`
--   `Instructor`
--       `Instructor` -> `Personal_No`
--   `Teaching_Week`
--       `Teaching_Week` -> `Week_Number`
--   `Year`
--       `Year` -> `Year`
--   `Semester`
--       `Semester` -> `Semester`
--   `Duration_Minutes`
--       `Class_Duration_One_Hour` -> `Duration_Minutes`
--   `Start_Time`
--       `Session_Start_Time` -> `Time`
--

--
-- Dumping data for table `Session_One_Hour`
--

INSERT INTO `Session_One_Hour` (`ID`, `Year`, `Semester`, `Teaching_Week`, `Date`, `Course_Code`, `Instructor`, `Start_Time`, `Duration_Minutes`, `Enrolled_Students`) VALUES
(1, 2018, 1, 1, '2018-02-20', 'CSSE7030', 's155221', '10:00:00', 50, 100),
(2, 2018, 1, 1, '2018-02-20', 'CSSE7030', 's155221', '10:00:00', 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `Session_One_Hour_Preview`
--

DROP TABLE IF EXISTS `Session_One_Hour_Preview`;
CREATE TABLE `Session_One_Hour_Preview` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Year` int(10) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Teaching_Week` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Course_Code` varchar(20) NOT NULL,
  `Instructor` varchar(20) NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration_Minutes` int(10) NOT NULL,
  `Enrolled_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Session_One_Hour_Preview`:
--   `Course_Code`
--       `Course` -> `Course_Code`
--   `Instructor`
--       `Instructor` -> `Personal_No`
--   `Teaching_Week`
--       `Teaching_Week` -> `Week_Number`
--   `Year`
--       `Year` -> `Year`
--   `Semester`
--       `Semester` -> `Semester`
--   `Duration_Minutes`
--       `Class_Duration_One_Hour` -> `Duration_Minutes`
--   `Start_Time`
--       `Session_Start_Time` -> `Time`
--

-- --------------------------------------------------------

--
-- Table structure for table `Session_Start_Time`
--

DROP TABLE IF EXISTS `Session_Start_Time`;
CREATE TABLE `Session_Start_Time` (
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Session_Start_Time`:
--

--
-- Dumping data for table `Session_Start_Time`
--

INSERT INTO `Session_Start_Time` (`Time`) VALUES
('08:00:00'),
('09:00:00'),
('10:00:00'),
('11:00:00'),
('12:00:00'),
('13:00:00'),
('14:00:00'),
('15:00:00'),
('16:00:00'),
('17:00:00'),
('18:00:00'),
('19:00:00'),
('20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Session_Two_Hour`
--

DROP TABLE IF EXISTS `Session_Two_Hour`;
CREATE TABLE `Session_Two_Hour` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Year` int(10) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Teaching_Week` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Course_Code` varchar(20) NOT NULL,
  `Instructor` varchar(20) NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration_Minutes` int(10) NOT NULL,
  `Enrolled_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Session_Two_Hour`:
--   `Course_Code`
--       `Course` -> `Course_Code`
--   `Semester`
--       `Semester` -> `Semester`
--   `Instructor`
--       `Instructor` -> `Personal_No`
--   `Teaching_Week`
--       `Teaching_Week` -> `Week_Number`
--   `Year`
--       `Year` -> `Year`
--   `Start_Time`
--       `Session_Start_Time` -> `Time`
--   `Duration_Minutes`
--       `Class_Duration_Two_Hour` -> `Duration_Minutes`
--

-- --------------------------------------------------------

--
-- Table structure for table `Session_Two_Hour_Preview`
--

DROP TABLE IF EXISTS `Session_Two_Hour_Preview`;
CREATE TABLE `Session_Two_Hour_Preview` (
  `ID` int(255) UNSIGNED NOT NULL,
  `Year` int(10) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Teaching_Week` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Course_Code` varchar(20) NOT NULL,
  `Instructor` varchar(20) NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration_Minutes` int(10) NOT NULL,
  `Enrolled_Students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Session_Two_Hour_Preview`:
--   `Course_Code`
--       `Course` -> `Course_Code`
--   `Instructor`
--       `Instructor` -> `Personal_No`
--   `Teaching_Week`
--       `Teaching_Week` -> `Week_Number`
--   `Year`
--       `Year` -> `Year`
--   `Semester`
--       `Semester` -> `Semester`
--   `Duration_Minutes`
--       `Class_Duration_Two_Hour` -> `Duration_Minutes`
--   `Start_Time`
--       `Session_Start_Time` -> `Time`
--

-- --------------------------------------------------------

--
-- Table structure for table `Student_Activities`
--

DROP TABLE IF EXISTS `Student_Activities`;
CREATE TABLE `Student_Activities` (
  `Activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Student_Activities`:
--

--
-- Dumping data for table `Student_Activities`
--

INSERT INTO `Student_Activities` (`Activity`) VALUES
('Answer Instructor Question'),
('Clicker Question discussion'),
('Individual thinking'),
('Listening'),
('Other'),
('Other Group Activity'),
('Prediction of Demo/Experiment'),
('Presentation by Students'),
('Student asks Question'),
('Test or Quiz'),
('Waiting'),
('Whole Class discussion'),
('Worksheet group work');

-- --------------------------------------------------------

--
-- Table structure for table `Student_Engagement`
--

DROP TABLE IF EXISTS `Student_Engagement`;
CREATE TABLE `Student_Engagement` (
  `Engagement` decimal(10,1) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Student_Engagement`:
--

--
-- Dumping data for table `Student_Engagement`
--

INSERT INTO `Student_Engagement` (`Engagement`, `Description`) VALUES
('0.1', '10% Engagement'),
('0.2', '20% Engagement'),
('0.3', '30% Engagement'),
('0.4', '40% Engagement'),
('0.5', '50% Engagement'),
('0.6', '60% Engagement'),
('0.7', '70% Engagement'),
('0.8', '80% Engagement'),
('0.9', '90% Engagement'),
('1.0', '100% Engagement');

-- --------------------------------------------------------

--
-- Table structure for table `Teaching_Week`
--

DROP TABLE IF EXISTS `Teaching_Week`;
CREATE TABLE `Teaching_Week` (
  `Week_Number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Teaching_Week`:
--

--
-- Dumping data for table `Teaching_Week`
--

INSERT INTO `Teaching_Week` (`Week_Number`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `Time_Slot_One_Hour`
--

DROP TABLE IF EXISTS `Time_Slot_One_Hour`;
CREATE TABLE `Time_Slot_One_Hour` (
  `Slot` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Time_Slot_One_Hour`:
--

--
-- Dumping data for table `Time_Slot_One_Hour`
--

INSERT INTO `Time_Slot_One_Hour` (`Slot`, `Description`) VALUES
('00-02', '00 to 02 minutes'),
('02-04', '02 to 04 minutes'),
('04-06', '04 to 06 minutes'),
('06-08', '06 to 08 minutes'),
('08-10', '08 to 10 minutes'),
('10-12', '10 to 12 minutes'),
('12-14', '12 to 14 minutes'),
('14-16', '14 to 16 minutes'),
('16-18', '16 to 18 minutes'),
('18-20', '18 to 20 minutes'),
('20-22', '20 to 22 minutes'),
('22-24', '22 to 24 minutes'),
('24-26', '24 to 26 minutes'),
('26-28', '26 to 28 minutes'),
('28-30', '28 to 30 minutes'),
('30-32', '30 to 32 minutes'),
('32-34', '32 to 34 minutes'),
('34-36', '34 to 36 minutes'),
('36-38', '36 to 38 minutes'),
('38-40', '38 to 40 minutes'),
('40-42', '40 to 42 minutes'),
('42-44', '42 to 44 minutes'),
('44-46', '44 to 46 minutes'),
('46-48', '46 to 48 minutes'),
('48-50', '48 to 50 minutes');

-- --------------------------------------------------------

--
-- Table structure for table `Time_Slot_Two_Hour`
--

DROP TABLE IF EXISTS `Time_Slot_Two_Hour`;
CREATE TABLE `Time_Slot_Two_Hour` (
  `Serial_Number` int(11) DEFAULT NULL,
  `Slot` varchar(20) NOT NULL,
  `Description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Time_Slot_Two_Hour`:
--

--
-- Dumping data for table `Time_Slot_Two_Hour`
--

INSERT INTO `Time_Slot_Two_Hour` (`Serial_Number`, `Slot`, `Description`) VALUES
(0, '00-02', '00 to 02 minutes'),
(1, '02-04', '02 to 04 minutes'),
(2, '04-06', '04 to 06 minutes'),
(3, '06-08', '06 to 08 minutes'),
(4, '08-10', '08 to 10 minutes'),
(5, '10-12', '10 to 12 minutes'),
(50, '100-102', '100 to 102 minutes'),
(51, '102-104', '102 to 104 minutes'),
(52, '104-106', '104 to 106 minutes'),
(53, '106-108', '106 to 108 minutes'),
(54, '108-110', '108 to 110 minutes'),
(6, '12-14', '12 to 14 minutes'),
(7, '14-16', '14 to 16 minutes'),
(8, '16-18', '16 to 18 minutes'),
(9, '18-20', '18 to 20 minutes'),
(10, '20-22', '20 to 22 minutes'),
(11, '22-24', '22 to 24 minutes'),
(12, '24-26', '24 to 26 minutes'),
(13, '26-28', '26 to 28 minutes'),
(14, '28-30', '28 to 30 minutes'),
(15, '30-32', '30 to 32 minutes'),
(16, '32-34', '32 to 34 minutes'),
(17, '34-36', '34 to 36 minutes'),
(18, '36-38', '36 to 38 minutes'),
(19, '38-40', '38 to 40 minutes'),
(20, '40-42', '40 to 42 minutes'),
(21, '42-44', '42 to 44 minutes'),
(22, '44-46', '44 to 46 minutes'),
(23, '46-48', '46 to 48 minutes'),
(24, '48-50', '48 to 50 minutes'),
(25, '50-52', '50 to 52 minutes'),
(26, '52-54', '52 to 54 minutes'),
(27, '54-56', '54 to 56 minutes'),
(28, '56-58', '56 to 58 minutes'),
(29, '58-60', '58 to 60 minutes'),
(30, '60-62', '60 to 62 minutes'),
(31, '62-64', '62 to 64 minutes'),
(32, '64-66', '64 to 66 minutes'),
(33, '66-68', '66 to 68 minutes'),
(39, '68-70', '68 to 70 minutes'),
(35, '70-72', '70 to 72 minutes'),
(36, '72-74', '72 to 74 minutes'),
(37, '74-76', '74 to 76 minutes'),
(38, '76-78', '76 to 78 minutes'),
(39, '78-80', '78 to 80 minutes'),
(40, '80-82', '80 to 82 minutes'),
(41, '82-84', '82 to 84 minutes'),
(42, '84-86', '84 to 86 minutes'),
(43, '86-88', '86 to 88 minutes'),
(44, '88-90', '88 to 90 minutes'),
(45, '90-92', '90 to 92 minutes'),
(46, '92-94', '92 to 94 minutes'),
(47, '94-96', '94 to 96 minutes'),
(48, '96-98', '96 to 98 minutes'),
(49, '98-100', '98 to 100 minutes');

-- --------------------------------------------------------

--
-- Table structure for table `Year`
--

DROP TABLE IF EXISTS `Year`;
CREATE TABLE `Year` (
  `Year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONSHIPS FOR TABLE `Year`:
--

--
-- Dumping data for table `Year`
--

INSERT INTO `Year` (`Year`) VALUES
(2018),
(2019),
(2020),
(2021),
(2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Class_Activity_One_Hour`
--
ALTER TABLE `Class_Activity_One_Hour`
  ADD PRIMARY KEY (`ID`,`Time_Slot`),
  ADD KEY `Faculty_Activity` (`Faculty_Activity`),
  ADD KEY `Student_Activity` (`Student_Activity`),
  ADD KEY `Time_Slot` (`Time_Slot`),
  ADD KEY `Student_Engagement` (`Student_Engagement`);

--
-- Indexes for table `Class_Activity_One_Hour_Preview`
--
ALTER TABLE `Class_Activity_One_Hour_Preview`
  ADD PRIMARY KEY (`ID`,`Time_Slot`),
  ADD KEY `Faculty_Activity` (`Faculty_Activity`),
  ADD KEY `Student_Activity` (`Student_Activity`),
  ADD KEY `Time_Slot` (`Time_Slot`),
  ADD KEY `Student_Engagement` (`Student_Engagement`);

--
-- Indexes for table `Class_Activity_Two_Hour`
--
ALTER TABLE `Class_Activity_Two_Hour`
  ADD PRIMARY KEY (`ID`,`Time_Slot`),
  ADD KEY `Faculty_Activity` (`Faculty_Activity`),
  ADD KEY `Student_Activity` (`Student_Activity`),
  ADD KEY `Time_Slot` (`Time_Slot`),
  ADD KEY `Student_Engagement` (`Student_Engagement`);

--
-- Indexes for table `Class_Activity_Two_Hour_Preview`
--
ALTER TABLE `Class_Activity_Two_Hour_Preview`
  ADD PRIMARY KEY (`ID`,`Time_Slot`),
  ADD KEY `Faculty_Activity` (`Faculty_Activity`),
  ADD KEY `Student_Activity` (`Student_Activity`),
  ADD KEY `Time_Slot` (`Time_Slot`),
  ADD KEY `Student_Engagement` (`Student_Engagement`);

--
-- Indexes for table `Class_Duration_One_Hour`
--
ALTER TABLE `Class_Duration_One_Hour`
  ADD PRIMARY KEY (`Duration_Minutes`);

--
-- Indexes for table `Class_Duration_Two_Hour`
--
ALTER TABLE `Class_Duration_Two_Hour`
  ADD PRIMARY KEY (`Duration_Minutes`);

--
-- Indexes for table `Course`
--
ALTER TABLE `Course`
  ADD PRIMARY KEY (`Course_Code`);

--
-- Indexes for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD PRIMARY KEY (`Dept_ID`);

--
-- Indexes for table `Faculty_Activities`
--
ALTER TABLE `Faculty_Activities`
  ADD PRIMARY KEY (`Activity`);

--
-- Indexes for table `Instructor`
--
ALTER TABLE `Instructor`
  ADD PRIMARY KEY (`Personal_No`),
  ADD KEY `Dept_ID` (`Dept_ID`);

--
-- Indexes for table `Program`
--
ALTER TABLE `Program`
  ADD PRIMARY KEY (`Program_Code`,`Faculty`),
  ADD KEY `Faculty` (`Faculty`);

--
-- Indexes for table `Program_Course_Relationship`
--
ALTER TABLE `Program_Course_Relationship`
  ADD PRIMARY KEY (`Program_Code`,`Course_Code`),
  ADD KEY `Course_Code` (`Course_Code`);

--
-- Indexes for table `Program_Level`
--
ALTER TABLE `Program_Level`
  ADD PRIMARY KEY (`Level`);

--
-- Indexes for table `Semester`
--
ALTER TABLE `Semester`
  ADD PRIMARY KEY (`Semester`);

--
-- Indexes for table `Session_One_Hour`
--
ALTER TABLE `Session_One_Hour`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Course_Code` (`Course_Code`),
  ADD KEY `Instructor` (`Instructor`),
  ADD KEY `Teaching_Week` (`Teaching_Week`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `Duration_Minutes` (`Duration_Minutes`),
  ADD KEY `Start_Time` (`Start_Time`);

--
-- Indexes for table `Session_One_Hour_Preview`
--
ALTER TABLE `Session_One_Hour_Preview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Course_Code` (`Course_Code`),
  ADD KEY `Instructor` (`Instructor`),
  ADD KEY `Teaching_Week` (`Teaching_Week`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `Duration_Minutes` (`Duration_Minutes`),
  ADD KEY `Start_Time` (`Start_Time`);

--
-- Indexes for table `Session_Start_Time`
--
ALTER TABLE `Session_Start_Time`
  ADD PRIMARY KEY (`Time`);

--
-- Indexes for table `Session_Two_Hour`
--
ALTER TABLE `Session_Two_Hour`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Course_Code` (`Course_Code`),
  ADD KEY `Instructor` (`Instructor`),
  ADD KEY `Teaching_Week` (`Teaching_Week`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `Duration_Minutes` (`Duration_Minutes`),
  ADD KEY `Start_Time` (`Start_Time`);

--
-- Indexes for table `Session_Two_Hour_Preview`
--
ALTER TABLE `Session_Two_Hour_Preview`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Course_Code` (`Course_Code`),
  ADD KEY `Instructor` (`Instructor`),
  ADD KEY `Teaching_Week` (`Teaching_Week`),
  ADD KEY `Year` (`Year`),
  ADD KEY `Semester` (`Semester`),
  ADD KEY `Duration_Minutes` (`Duration_Minutes`),
  ADD KEY `Start_Time` (`Start_Time`);

--
-- Indexes for table `Student_Activities`
--
ALTER TABLE `Student_Activities`
  ADD PRIMARY KEY (`Activity`);

--
-- Indexes for table `Student_Engagement`
--
ALTER TABLE `Student_Engagement`
  ADD PRIMARY KEY (`Engagement`);

--
-- Indexes for table `Teaching_Week`
--
ALTER TABLE `Teaching_Week`
  ADD PRIMARY KEY (`Week_Number`);

--
-- Indexes for table `Time_Slot_One_Hour`
--
ALTER TABLE `Time_Slot_One_Hour`
  ADD PRIMARY KEY (`Slot`);

--
-- Indexes for table `Time_Slot_Two_Hour`
--
ALTER TABLE `Time_Slot_Two_Hour`
  ADD PRIMARY KEY (`Slot`);

--
-- Indexes for table `Year`
--
ALTER TABLE `Year`
  ADD PRIMARY KEY (`Year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Session_One_Hour`
--
ALTER TABLE `Session_One_Hour`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Session_One_Hour_Preview`
--
ALTER TABLE `Session_One_Hour_Preview`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Session_Two_Hour`
--
ALTER TABLE `Session_Two_Hour`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Session_Two_Hour_Preview`
--
ALTER TABLE `Session_Two_Hour_Preview`
  MODIFY `ID` int(255) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Class_Activity_One_Hour`
--
ALTER TABLE `Class_Activity_One_Hour`
  ADD CONSTRAINT `Class_Activity_One_Hour_ibfk_1` FOREIGN KEY (`Faculty_Activity`) REFERENCES `Faculty_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_One_Hour_ibfk_2` FOREIGN KEY (`Student_Activity`) REFERENCES `Student_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_One_Hour_ibfk_3` FOREIGN KEY (`Time_Slot`) REFERENCES `Time_Slot_One_Hour` (`Slot`),
  ADD CONSTRAINT `Class_Activity_One_Hour_ibfk_4` FOREIGN KEY (`Student_Engagement`) REFERENCES `Student_Engagement` (`Engagement`);

--
-- Constraints for table `Class_Activity_One_Hour_Preview`
--
ALTER TABLE `Class_Activity_One_Hour_Preview`
  ADD CONSTRAINT `Class_Activity_One_Hour_Preview_ibfk_1` FOREIGN KEY (`Faculty_Activity`) REFERENCES `Faculty_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_One_Hour_Preview_ibfk_2` FOREIGN KEY (`Student_Activity`) REFERENCES `Student_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_One_Hour_Preview_ibfk_4` FOREIGN KEY (`Time_Slot`) REFERENCES `Time_Slot_One_Hour` (`Slot`),
  ADD CONSTRAINT `Class_Activity_One_Hour_Preview_ibfk_5` FOREIGN KEY (`Student_Engagement`) REFERENCES `Student_Engagement` (`Engagement`);

--
-- Constraints for table `Class_Activity_Two_Hour`
--
ALTER TABLE `Class_Activity_Two_Hour`
  ADD CONSTRAINT `Class_Activity_Two_Hour_ibfk_1` FOREIGN KEY (`Faculty_Activity`) REFERENCES `Faculty_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_ibfk_2` FOREIGN KEY (`Student_Activity`) REFERENCES `Student_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_ibfk_3` FOREIGN KEY (`Student_Engagement`) REFERENCES `Student_Engagement` (`Engagement`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_ibfk_4` FOREIGN KEY (`Time_Slot`) REFERENCES `Time_Slot_Two_Hour` (`Slot`);

--
-- Constraints for table `Class_Activity_Two_Hour_Preview`
--
ALTER TABLE `Class_Activity_Two_Hour_Preview`
  ADD CONSTRAINT `Class_Activity_Two_Hour_Preview_ibfk_1` FOREIGN KEY (`Faculty_Activity`) REFERENCES `Faculty_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_Preview_ibfk_2` FOREIGN KEY (`Student_Activity`) REFERENCES `Student_Activities` (`Activity`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_Preview_ibfk_3` FOREIGN KEY (`Student_Engagement`) REFERENCES `Student_Engagement` (`Engagement`),
  ADD CONSTRAINT `Class_Activity_Two_Hour_Preview_ibfk_4` FOREIGN KEY (`Time_Slot`) REFERENCES `Time_Slot_Two_Hour` (`Slot`);

--
-- Constraints for table `Instructor`
--
ALTER TABLE `Instructor`
  ADD CONSTRAINT `Instructor_ibfk_1` FOREIGN KEY (`Dept_ID`) REFERENCES `Faculty` (`Dept_ID`);

--
-- Constraints for table `Program`
--
ALTER TABLE `Program`
  ADD CONSTRAINT `Program_ibfk_1` FOREIGN KEY (`Faculty`) REFERENCES `Faculty` (`Dept_ID`);

--
-- Constraints for table `Program_Course_Relationship`
--
ALTER TABLE `Program_Course_Relationship`
  ADD CONSTRAINT `Program_Course_Relationship_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `Course` (`Course_Code`),
  ADD CONSTRAINT `Program_Course_Relationship_ibfk_2` FOREIGN KEY (`Program_Code`) REFERENCES `Program` (`Program_Code`);

--
-- Constraints for table `Session_One_Hour`
--
ALTER TABLE `Session_One_Hour`
  ADD CONSTRAINT `Session_One_Hour_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `Course` (`Course_Code`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_2` FOREIGN KEY (`Instructor`) REFERENCES `Instructor` (`Personal_No`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_3` FOREIGN KEY (`Teaching_Week`) REFERENCES `Teaching_Week` (`Week_Number`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_4` FOREIGN KEY (`Year`) REFERENCES `Year` (`Year`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_5` FOREIGN KEY (`Semester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_6` FOREIGN KEY (`Duration_Minutes`) REFERENCES `Class_Duration_One_Hour` (`Duration_Minutes`),
  ADD CONSTRAINT `Session_One_Hour_ibfk_7` FOREIGN KEY (`Start_Time`) REFERENCES `Session_Start_Time` (`Time`);

--
-- Constraints for table `Session_One_Hour_Preview`
--
ALTER TABLE `Session_One_Hour_Preview`
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `Course` (`Course_Code`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_2` FOREIGN KEY (`Instructor`) REFERENCES `Instructor` (`Personal_No`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_3` FOREIGN KEY (`Teaching_Week`) REFERENCES `Teaching_Week` (`Week_Number`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_4` FOREIGN KEY (`Year`) REFERENCES `Year` (`Year`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_5` FOREIGN KEY (`Semester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_6` FOREIGN KEY (`Duration_Minutes`) REFERENCES `Class_Duration_One_Hour` (`Duration_Minutes`),
  ADD CONSTRAINT `Session_One_Hour_Preview_ibfk_7` FOREIGN KEY (`Start_Time`) REFERENCES `Session_Start_Time` (`Time`);

--
-- Constraints for table `Session_Two_Hour`
--
ALTER TABLE `Session_Two_Hour`
  ADD CONSTRAINT `Session_Two_Hour_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `Course` (`Course_Code`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_2` FOREIGN KEY (`Semester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_3` FOREIGN KEY (`Instructor`) REFERENCES `Instructor` (`Personal_No`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_4` FOREIGN KEY (`Teaching_Week`) REFERENCES `Teaching_Week` (`Week_Number`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_5` FOREIGN KEY (`Year`) REFERENCES `Year` (`Year`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_6` FOREIGN KEY (`Start_Time`) REFERENCES `Session_Start_Time` (`Time`),
  ADD CONSTRAINT `Session_Two_Hour_ibfk_7` FOREIGN KEY (`Duration_Minutes`) REFERENCES `Class_Duration_Two_Hour` (`Duration_Minutes`);

--
-- Constraints for table `Session_Two_Hour_Preview`
--
ALTER TABLE `Session_Two_Hour_Preview`
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_1` FOREIGN KEY (`Course_Code`) REFERENCES `Course` (`Course_Code`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_2` FOREIGN KEY (`Instructor`) REFERENCES `Instructor` (`Personal_No`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_3` FOREIGN KEY (`Teaching_Week`) REFERENCES `Teaching_Week` (`Week_Number`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_4` FOREIGN KEY (`Year`) REFERENCES `Year` (`Year`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_5` FOREIGN KEY (`Semester`) REFERENCES `Semester` (`Semester`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_6` FOREIGN KEY (`Duration_Minutes`) REFERENCES `Class_Duration_Two_Hour` (`Duration_Minutes`),
  ADD CONSTRAINT `Session_Two_Hour_Preview_ibfk_7` FOREIGN KEY (`Start_Time`) REFERENCES `Session_Start_Time` (`Time`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
