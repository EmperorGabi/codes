-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 11:59 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `assignmentID` int(50) NOT NULL AUTO_INCREMENT,
  `studentID` varchar(50) NOT NULL,
  `subjectCode` varchar(50) NOT NULL,
  `files` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `feedback` varchar(50) NOT NULL,
  PRIMARY KEY (`assignmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `studentID`, `subjectCode`, `files`, `grade`, `date`, `time`, `feedback`) VALUES
(2, 'b1702022', 'DIP203', 'index.php', '80', '0000-00-00', '', 'not bad'),
(3, 'b1702022', 'DIP204', 'Consultation.php', '90', '0000-00-00', '', 'very good'),
(4, 'b1702022', 'DIP201', 'lecturerNotes.php', '99', '0000-00-00', '', 'Excellent! But there is still room to improve.'),
(5, 'b1702022', 'DIP204', 'admin_Login.php', 'FL', '0000-00-00', '', 'not good'),
(6, 'b1702391', 'DIP203', 'index.php', '100', '0000-00-00', '', 'good'),
(8, 'b1702022', 'DIP201', 'OS Page Trace exercise.docx', 'hd2', '0000-00-00', '', 'good'),
(9, 'Brian123', 'BIT101', 'System Design Template-1 (1) (1).docx', '88', '0000-00-00', '', 'Excellent! But there is still room to improve.'),
(11, 'Brian123', 'DIP202', 'DM_Lecture_11.pptx', '', '0000-00-00', '', ''),
(12, 'Brian123', 'DIP201', 'DM_Lecture_11.pptx', '', '0000-00-00', '', ''),
(13, 'Brian123', 'DIP201', 'System Design Template-1 (1) (1).docx', '', '0000-00-00', '', ''),
(14, 'B1800982', 'BIT101', 'System Implementation (Edited_On_4_Apr_2020).docx', 'HD1', '0000-00-00', '', 'Excellent! But there is still room to improve.'),
(15, 'B1800982', 'DIP202', 'Conclusion ITMINI.docx', '99', '0000-00-00', '', 'Excellent! But there is still room to improve.'),
(16, 'B1800982', 'DIP202', '', '', '0000-00-00', '', ''),
(17, 'B1800982', 'DIP202', 'Conclusion ITMINI.docx', '99', '0000-00-00', '', 'Excellent! But there is still room to improve.'),
(18, 'B1800982', 'DIP202', 'System Analysis Template (1) (1).doc', '', '0000-00-00', '', ''),
(19, 'B1800982', 'DIP202', 'System Design Template Final Print.docx', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
  `studentID` varchar(50) NOT NULL,
  `lecturerID` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `response` varchar(50) NOT NULL,
  PRIMARY KEY (`bookingID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `studentID`, `lecturerID`, `date`, `time`, `message`, `response`) VALUES
(1, 'b1702022', '', '1999-11-11', '8djalf', 'see u sir', ''),
(2, 'b1702022', 'Scaveo15', '1999-11-11', '8djalf', 'adfjlad', ''),
(3, 'b1702022', 'A12345', '1999-11-11', '8djalf', 'dfalfdl', 'Ok ill see you tomorrow'),
(4, 'b1702022', 'A12345', '1999-11-11', '8:200', 'see u sir', 'Ok ill see you tomorrow'),
(5, 'Chong1234', 'L12345', '2020-04-04', '22:30', 'meet you at LS2.1', 'noted'),
(6, 'Brian123', 'L12345', '2020-04-10', '22:30', 'meet you at sr2.2', 'noted'),
(7, 'b1702022', 'A12345', '2020-11-11', '08:30', 'Can i see you tomorrow?', 'Ok ill see you tomorrow'),
(8, 'Brian123', 'L12345', '2020-04-02', '14:30', 'meet you at DSA sir.', 'No response yet'),
(9, 'B1800982', 'L12345', '2020-04-02', '14:30', 'Hi sir, regarding chapter 2 intro to IT  i am not ', 'No response yet'),
(10, 'B1800982', 'B12345', '2020-04-15', '13:20', 'meet you at sr2.2', 'No response yet');

-- --------------------------------------------------------

--
-- Table structure for table `lecturenotes`
--

CREATE TABLE IF NOT EXISTS `lecturenotes` (
  `notesID` int(50) NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(50) NOT NULL,
  `notes` varchar(50) NOT NULL,
  PRIMARY KEY (`notesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `lecturenotes`
--

INSERT INTO `lecturenotes` (`notesID`, `subjectCode`, `notes`) VALUES
(3, 'DIP201', 'index.php'),
(4, 'DIP202', 'loginPage.php'),
(5, 'DIP202', 'student_Submission.php'),
(6, 'DIP204', 'index.php'),
(7, 'DIP203', 'index.php'),
(8, 'DIP201', 'OS Page Trace exercise.docx'),
(11, 'BIT101', 'System Implementation (1).docx'),
(12, 'BIT101', 'DM_Lecture_10 (1).pptx'),
(13, 'BIT101', 'Lecture_3_selection.pptx'),
(14, 'DIP202', 'System Design Template Final Print.docx');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `lecturerID` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `lecturerID`, `password`) VALUES
(1, 'L12345', '12345678'),
(3, 'A12345', '12345678'),
(4, 'B12345', '12345678'),
(5, 'C12345', '12345678'),
(6, 'F12345', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `lecturersubject`
--

CREATE TABLE IF NOT EXISTS `lecturersubject` (
  `subjectID` int(50) NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(50) NOT NULL,
  `lecturerID` varchar(50) NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `lecturersubject`
--

INSERT INTO `lecturersubject` (`subjectID`, `subjectCode`, `lecturerID`) VALUES
(8, 'DIP201', 'L12345'),
(12, 'DIP202', 'L12345'),
(13, 'DIP203', 'L12345'),
(14, 'DIP204', 'A12345'),
(15, 'DIP215', 'A12345'),
(16, 'DIP215', 'L12345'),
(17, 'DIP203', 'B12345'),
(18, 'BIT101', 'L12345'),
(19, 'BIT103', 'L12345'),
(20, 'DIP208', 'L12345'),
(21, 'DIP215', 'F12345');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubject`
--

CREATE TABLE IF NOT EXISTS `studentsubject` (
  `subjectID` int(50) NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(50) NOT NULL,
  `studentID` varchar(50) NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `studentsubject`
--

INSERT INTO `studentsubject` (`subjectID`, `subjectCode`, `studentID`) VALUES
(8, 'DIP203', 'b1702391'),
(9, 'DIP205', 'b1702391'),
(10, 'DIP201', 'Brian123'),
(11, 'DIP204', 'Brian123'),
(12, 'DIP215', 'Brian123'),
(13, 'DIP202', 'Brian123'),
(14, 'BIT101', 'Brian123'),
(17, 'DIP202', 'B1800982'),
(18, 'BIT101', 'B1800982'),
(19, 'DIP215', 'B1800982'),
(20, 'DIP208', 'B1800982'),
(21, 'Dip207', 'B1800981');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subjectID` int(50) NOT NULL AUTO_INCREMENT,
  `subjectCode` varchar(50) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `endTime` int(50) NOT NULL,
  PRIMARY KEY (`subjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subjectCode`, `subjectName`, `image`, `status`, `start`, `end`, `endTime`) VALUES
(5, 'DIP202', 'Introduction to Multimedia', 'dip202.jpg', 'No', '2020-04-15 14:18:00', '2020-04-15 14:22:00', 0),
(6, 'DIP201', 'Discrete Mathematics', 'dip201.jpg', 'Yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(10, 'DIP215', 'Programming in JAVA I', 'dip215.jpg', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(12, 'DIP222', 'Introduction to Program Principles', 'dip222.jpg', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(13, 'BIT101', 'Introduction to Information Technology', 'bit101.jpg', 'Yes', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(14, 'BIT103', 'Introduction to Database System', 'bit103.jpg', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(15, 'DIP208', 'Introduction to Operating System', 'dip208.jpg', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(16, 'Dip207', 'Intro To IT Mini Project', 'dip202.jpg', 'No', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `systemadmin`
--

CREATE TABLE IF NOT EXISTS `systemadmin` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemadmin`
--

INSERT INTO `systemadmin` (`id`, `password`) VALUES
('1', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('B1234567', 'jameslee@gmail.com', '12345678'),
('b1702022', 'samanthafongyitwan@gmail.com', '12345678'),
('b1702391', 'brandonthoo@hotmail.com', '12345678'),
('B1800981', 'Brian981@gmail.com', '1234567'),
('B1800982', 'jameslee@gmail.com', '12345678'),
('Brian123', 'bboywaihoonghor@gmail.com', '12345'),
('Chong1234', 'chong1234@gmail.com', '123456'),
('samanthasince', 'samanthafongyitwan@gmail.com', '12345678');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
