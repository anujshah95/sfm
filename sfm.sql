-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2014 at 08:51 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'chirag', 'chirag789'),
(2, 'anuj', 'anuj24'),
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_inquiry`
--

CREATE TABLE IF NOT EXISTS `admin_inquiry` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `timeframe` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_inquiry`
--

INSERT INTO `admin_inquiry` (`name`, `email`, `phone`, `timeframe`, `location`, `status`) VALUES
('1', '2', '2', '-', 'surat', '1'),
('456', '456', '456', '-', 'surat', '1'),
('chirag sanghvi', 'chirag@gmail.com', '9876543210', '3-6', 'surat', '1'),
('y', 'gg', 'g', '3', 'surat', '1');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `bname` varchar(100) NOT NULL,
  `baddress` varchar(250) NOT NULL,
  `bcode` varchar(50) NOT NULL,
  `bphone` bigint(15) NOT NULL,
  `bheadname` varchar(50) NOT NULL,
  `bpassword` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL COMMENT 'company code',
  UNIQUE KEY `bcode` (`bcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bname`, `baddress`, `bcode`, `bphone`, `bheadname`, `bpassword`, `code`) VALUES
('2', '2', 'MUM2', 2, '2', '2', 'MUM'),
('Ghod', 'Surat', 'ST102', 9321212121, 'Nim', 'st102', 'ST'),
('adajan', 'surat', 'ST111', 9876543210, 'chiraga', 'Chirag', 'ST'),
('prime', 'noida', 'ST121', 9898989898, 'Anuj_Shah', 'Anuj@12', 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `branch_admin`
--

CREATE TABLE IF NOT EXISTS `branch_admin` (
  `username` varchar(25) NOT NULL COMMENT 'Username of branch admin',
  `password` varchar(25) NOT NULL COMMENT 'password of branch admin',
  `code` varchar(20) NOT NULL COMMENT 'company code',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch_admin`
--

INSERT INTO `branch_admin` (`username`, `password`, `code`) VALUES
('MUM2', '2', 'MUM'),
('ST', '', 'ST'),
('ST102', 'st102', 'ST'),
('ST111', 'Chirag', 'ST'),
('ST121', 'Anuj@12', 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `c_name` varchar(20) NOT NULL,
  `c_location` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `headname` varchar(20) NOT NULL,
  `number` varchar(13) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`code`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `uname_2` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_name`, `c_location`, `code`, `uname`, `password`, `headname`, `number`, `email`) VALUES
('SFM', ' mumbai', 'MUM', 'aki', 'akshay@2', 'Aki', '9876543210', 'aki@gmail.com'),
(' sanghvis bro', 'Surat', 'ST', 'chirag7', 'Chirag@12', 'Chirag', '9876543210', 'anuj.gmail@com');

-- --------------------------------------------------------

--
-- Table structure for table `disable`
--

CREATE TABLE IF NOT EXISTS `disable` (
  `c_name` varchar(20) NOT NULL COMMENT 'Company Name',
  `c_location` varchar(20) NOT NULL COMMENT 'Location of company',
  `code` varchar(20) NOT NULL COMMENT 'Center code',
  `uname` varchar(20) NOT NULL COMMENT 'Username',
  `password` varchar(20) NOT NULL COMMENT 'Password',
  `headname` varchar(20) NOT NULL COMMENT 'Headname',
  `number` varchar(13) NOT NULL COMMENT 'Contact number',
  `email` varchar(20) NOT NULL COMMENT 'Email Id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disable`
--

INSERT INTO `disable` (`c_name`, `c_location`, `code`, `uname`, `password`, `headname`, `number`, `email`) VALUES
('SFM', ' abc', 'ABC', 'abc', 'abc@1234', 'Abc', '9876543210', 'abc@gmail.com'),
('Frendsss', 'Banglore', 'BNG', 'aki', 'Aki@1234', 'Aki', '9876543110', 'aki@gmail.com'),
(' sanghvi bros', 'Bangloru', 'BNGL', 'chirag20', 'Chirag@123', 'Chirag sanghvi P', '9876543210', 'chiragsanghvise@gmai');

-- --------------------------------------------------------

--
-- Table structure for table `disable_branch`
--

CREATE TABLE IF NOT EXISTS `disable_branch` (
  `bname` varchar(100) NOT NULL COMMENT 'Branch Name',
  `baddress` varchar(250) NOT NULL COMMENT 'Branch Address',
  `bcode` varchar(50) NOT NULL COMMENT 'Branch Code',
  `bphone` bigint(15) NOT NULL COMMENT 'Contact number',
  `bheadname` varchar(50) NOT NULL COMMENT 'Headname of branch',
  `bpassword` varchar(20) NOT NULL COMMENT 'password',
  `code` varchar(20) NOT NULL COMMENT 'Company code'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disable_branch`
--

INSERT INTO `disable_branch` (`bname`, `baddress`, `bcode`, `bphone`, `bheadname`, `bpassword`, `code`) VALUES
('abc', 'mumbai', 'ANCD101', 9876543210, 'chirag', 'chirag', 'ANCD');

-- --------------------------------------------------------

--
-- Table structure for table `employee_detail`
--

CREATE TABLE IF NOT EXISTS `employee_detail` (
  `emp_id` varchar(10) NOT NULL COMMENT 'Employee ID',
  `emp_name` varchar(20) NOT NULL COMMENT 'Employee Name',
  `address` varchar(30) NOT NULL COMMENT 'Address of employee',
  `gender` varchar(20) NOT NULL COMMENT 'Employee gender',
  `age` int(3) NOT NULL COMMENT 'Age of employee',
  `status` varchar(25) NOT NULL COMMENT 'Status i.e. Permanent or temporary or inactive',
  `contact_no` varchar(11) NOT NULL COMMENT 'Contact number of employee',
  `email` varchar(25) NOT NULL COMMENT 'Email of employee',
  `doj` date NOT NULL COMMENT 'Date of Joining of employee',
  `salary` int(12) NOT NULL COMMENT 'Current salary of employee',
  `qual` varchar(50) NOT NULL COMMENT 'Qualification of employee',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_detail`
--

INSERT INTO `employee_detail` (`emp_id`, `emp_name`, `address`, `gender`, `age`, `status`, `contact_no`, `email`, `doj`, `salary`, `qual`) VALUES
('1', '1', '1', '1', 1, '1', '11', '1', '0000-00-00', 1, '2'),
('2', '2', '1', '1', 1, '1', '1', '1', '2014-03-03', 1, '1'),
('3', '3', '3', '3', 3, '33', '3', '3', '0000-00-00', 3, '3');

-- --------------------------------------------------------

--
-- Table structure for table `extra_detail`
--

CREATE TABLE IF NOT EXISTS `extra_detail` (
  `addmission_form` varchar(10) NOT NULL COMMENT 'Addimission Form No.',
  `transport_facility` varchar(25) NOT NULL COMMENT 'Transport Facility',
  `physical_disability` varchar(25) NOT NULL COMMENT 'Any physical disability',
  `session_want` varchar(25) NOT NULL COMMENT 'Which session you want',
  `medical_history` varchar(25) NOT NULL COMMENT 'Any medical hisory'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `tution` int(11) NOT NULL,
  `enrollment` int(11) NOT NULL,
  `welfare` int(11) NOT NULL,
  `icard` int(11) NOT NULL,
  `admission` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `equipment` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  PRIMARY KEY (`branch_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`tution`, `enrollment`, `welfare`, `icard`, `admission`, `meal`, `equipment`, `branch_name`) VALUES
(1, 2, 3, 4, 56, 7, 8, 'default'),
(1, 8, 2, 3, 4, 56, 7, 'MUM2'),
(1000, 1000, 1000, 100, 1000, 1000, 1000, 'ST102'),
(1, 8, 2, 3, 4, 56, 7, 'ST111');

-- --------------------------------------------------------

--
-- Table structure for table `mum2employee_details`
--

CREATE TABLE IF NOT EXISTS `mum2employee_details` (
  `emp_id` varchar(10) NOT NULL COMMENT 'Employee ID',
  `emp_name` varchar(20) NOT NULL COMMENT 'Employee Name',
  `address` varchar(30) NOT NULL COMMENT 'Address of employee',
  `gender` varchar(20) NOT NULL COMMENT 'Employee gender',
  `age` int(3) NOT NULL COMMENT 'Age of employee',
  `status` varchar(25) NOT NULL COMMENT 'Status i.e. Permanent or temporary or inactive',
  `contact_no` varchar(11) NOT NULL COMMENT 'Contact number of employee',
  `email` varchar(25) NOT NULL COMMENT 'Email of employee',
  `doj` date NOT NULL COMMENT 'Date of Joining of employee',
  `salary` int(12) NOT NULL COMMENT 'Current salary of employee',
  `qual` varchar(50) NOT NULL COMMENT 'Qualification of employee',
  `bcode` varchar(20) NOT NULL COMMENT 'Branch code',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mum2employee_details`
--

INSERT INTO `mum2employee_details` (`emp_id`, `emp_name`, `address`, `gender`, `age`, `status`, `contact_no`, `email`, `doj`, `salary`, `qual`, `bcode`) VALUES
('1', 'chirag', 'adajn', '', 0, '', '', '', '0000-00-00', 0, '', 'MUM2');

-- --------------------------------------------------------

--
-- Table structure for table `mum2extra_detail`
--

CREATE TABLE IF NOT EXISTS `mum2extra_detail` (
  `addmission_form` varchar(10) NOT NULL COMMENT 'Addimission Form No.',
  `transport_facility` varchar(25) NOT NULL COMMENT 'Transport Facility',
  `physical_disability` varchar(25) NOT NULL COMMENT 'Any physical disability',
  `session_want` varchar(25) NOT NULL COMMENT 'Which session you want',
  `medical_history` varchar(25) NOT NULL COMMENT 'Any medical hisory',
  `child_hobbies` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mum2extra_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `mum2new_add_std`
--

CREATE TABLE IF NOT EXISTS `mum2new_add_std` (
  `fname` varchar(20) NOT NULL,
  `doa` date NOT NULL,
  `fno` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `addmission_type` varchar(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mum2new_add_std`
--


-- --------------------------------------------------------

--
-- Table structure for table `mum2parent_details`
--

CREATE TABLE IF NOT EXISTS `mum2parent_details` (
  `fno` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `poccup` varchar(10) NOT NULL,
  `pmob` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pincome` varchar(20) NOT NULL,
  `edu_quali` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mum2parent_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `mum2_timetable`
--

CREATE TABLE IF NOT EXISTS `mum2_timetable` (
  `section` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `activity` varchar(40) NOT NULL,
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mum2_timetable`
--

INSERT INTO `mum2_timetable` (`section`, `time`, `activity`) VALUES
('afternoon', '1:00 - 1:15', 'Settling in'),
('afternoon', '1:15 - 1:30', 'Taking a register'),
('afternoon', '1:30 - 2:30', 'Free play indoors/outdoors'),
('morning', '1st - 8:45 - 9:00', 'Settling in'),
('afternoon', '2:30 - 3:00', 'Songs/Rhymes'),
('morning', '2nd - 9:00', 'Taking a register'),
('afternoon', '3:00 - 3:15', 'Snaktime'),
('afternoon', '3:15 - 3:20', 'Tide up time'),
('afternoon', '3:20 - 3: 35', 'Story time'),
('afternoon', '3:35 - 4:00', 'Free play indoors/outdoors'),
('morning', '3rd - 9:15 - 10:00', 'Free play indoors/outdoors'),
('morning', '4th - 10:00 - 10:30', 'Snaktime'),
('morning', '5th - 10:30 - 10:45', 'Story-time'),
('morning', '6th - 10:45 - 11:30', 'Free play indoors/outdoors'),
('morning', '7th - 11:30 - 11:35', 'Tide up'),
('morning', '8th - 11:35 - 11:45', 'Songs/Rhymes'),
('morning', '9th - 11:45 - 12:30', 'Lunch and play time');

-- --------------------------------------------------------

--
-- Table structure for table `new_add_std`
--

CREATE TABLE IF NOT EXISTS `new_add_std` (
  `sid` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `doa` date NOT NULL,
  `fno` varchar(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `add` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `add_type` varchar(10) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_add_std`
--


-- --------------------------------------------------------

--
-- Table structure for table `parent_details`
--

CREATE TABLE IF NOT EXISTS `parent_details` (
  `sid` varchar(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `foccup` varchar(10) NOT NULL,
  `moccup` varchar(10) NOT NULL,
  `fmob` varchar(10) NOT NULL,
  `mmob` varchar(10) NOT NULL,
  `femail` varchar(20) NOT NULL,
  `memail` varchar(20) NOT NULL,
  `fincome` varchar(20) NOT NULL,
  `mincome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `school_admin`
--

CREATE TABLE IF NOT EXISTS `school_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `code` varchar(15) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_admin`
--

INSERT INTO `school_admin` (`username`, `password`, `code`) VALUES
(' aki', 'Caaaaaaaa123', ' '),
('aki', 'akshay@2', 'MUM'),
('chirag7', 'Chirag@123', 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `st102employee_details`
--

CREATE TABLE IF NOT EXISTS `st102employee_details` (
  `emp_id` varchar(10) NOT NULL COMMENT 'Employee ID',
  `emp_name` varchar(20) NOT NULL COMMENT 'Employee Name',
  `address` varchar(30) NOT NULL COMMENT 'Address of employee',
  `gender` varchar(20) NOT NULL COMMENT 'Employee gender',
  `age` int(3) NOT NULL COMMENT 'Age of employee',
  `status` varchar(25) NOT NULL COMMENT 'Status i.e. Permanent or temporary or inactive',
  `contact_no` varchar(11) NOT NULL COMMENT 'Contact number of employee',
  `email` varchar(25) NOT NULL COMMENT 'Email of employee',
  `doj` date NOT NULL COMMENT 'Date of Joining of employee',
  `salary` int(12) NOT NULL COMMENT 'Current salary of employee',
  `qual` varchar(50) NOT NULL COMMENT 'Qualification of employee',
  `bcode` varchar(20) NOT NULL COMMENT 'Branch code',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st102employee_details`
--

INSERT INTO `st102employee_details` (`emp_id`, `emp_name`, `address`, `gender`, `age`, `status`, `contact_no`, `email`, `doj`, `salary`, `qual`, `bcode`) VALUES
('1', 'chirag', 'adajan', 'male', 20, 'permanent', '9876543210', 'chirag@gmail.com', '2013-04-04', 50000, 'b.ed', 'ST102'),
('2', 'chintan', 'parlepoint', 'male', 21, 'permanent', '9898989898', 'chintan@gmail.com', '2012-04-01', 40000, 'b.tech', 'ST102'),
('3', 'aki', 'tadwadi', 'male', 20, 'permanent', '9879879876', 'aki@gmail.com', '2012-04-01', 35000, 'BCA', 'ST102'),
('4', 'disha', 'god dhod', 'female', 25, 'permanent', '9876546543', 'disha@yahoo.co,', '2011-02-01', 50000, 'phd', 'ST102'),
('5', 'raj', 'ring rod', 'male', 25, 'tempeorary', '9654321321', 'raj@gmail.com', '2014-04-01', 20000, 'bca', 'ST102');

-- --------------------------------------------------------

--
-- Table structure for table `st102extra_detail`
--

CREATE TABLE IF NOT EXISTS `st102extra_detail` (
  `addmission_form` varchar(10) NOT NULL COMMENT 'Addimission Form No.',
  `transport_facility` varchar(25) NOT NULL COMMENT 'Transport Facility',
  `physical_disability` varchar(25) NOT NULL COMMENT 'Any physical disability',
  `session_want` varchar(25) NOT NULL COMMENT 'Which session you want',
  `medical_history` varchar(25) NOT NULL COMMENT 'Any medical hisory',
  `child_hobbies` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `st102extra_detail`
--

INSERT INTO `st102extra_detail` (`addmission_form`, `transport_facility`, `physical_disability`, `session_want`, `medical_history`, `child_hobbies`, `id`) VALUES
('1', '', '', '', '', '', 1),
('2', 'y', '', '', 'no', 'it', 11),
('4', 'y', '', '', 'no', 'football', 13);

-- --------------------------------------------------------

--
-- Table structure for table `st102new_add_std`
--

CREATE TABLE IF NOT EXISTS `st102new_add_std` (
  `fname` varchar(20) NOT NULL,
  `doa` date NOT NULL,
  `fno` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `addmission_type` varchar(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `st102new_add_std`
--

INSERT INTO `st102new_add_std` (`fname`, `doa`, `fno`, `gender`, `address`, `state`, `city`, `pincode`, `mob`, `dob`, `addmission_type`, `branch_name`, `id`) VALUES
('chirag', '2014-04-22', 1, 'Male', '', '', '', 0, '', '0000-00-00', 'fresher', 'ST102', 8),
('nimesh sangada', '2014-04-23', 2, 'Male', 'surat', 'gujarat', 'Gujarat', 395009, '8141746374', '1993-12-25', 'fresher', 'ST102', 10),
('ankit jain', '2014-04-24', 4, 'Male', 'Adajan,surat', 'gujarat', 'surat', 395009, '9876549876', '2012-04-20', 'fresher', 'ST102', 12);

-- --------------------------------------------------------

--
-- Table structure for table `st102parent_details`
--

CREATE TABLE IF NOT EXISTS `st102parent_details` (
  `fno` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `poccup` varchar(10) NOT NULL,
  `pmob` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pincome` varchar(20) NOT NULL,
  `edu_quali` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `st102parent_details`
--

INSERT INTO `st102parent_details` (`fno`, `pname`, `poccup`, `pmob`, `email`, `pincome`, `edu_quali`, `id`) VALUES
('1', '', '', '', '', 'two cr.', '', 8),
('2', 'abc sangaada', 'business', '9898989898', 'Nimrod@gmail.com', 'two cr.', 'Web Developer', 10),
('4', 'Champalal jain', 'business m', '9123456779', 'ankt@ymail.com', 'two cr.', '10th pass', 12);

-- --------------------------------------------------------

--
-- Table structure for table `st102_timetable`
--

CREATE TABLE IF NOT EXISTS `st102_timetable` (
  `section` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `activity` varchar(40) NOT NULL,
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st102_timetable`
--

INSERT INTO `st102_timetable` (`section`, `time`, `activity`) VALUES
('afternoon', '1:00 - 1:15', 'Settling in'),
('afternoon', '1:15 - 1:30', 'Taking a register'),
('afternoon', '1:30 - 2:30', 'Free play indoors/outdoors'),
('morning', '1st - 8:45 - 9:00', 'Settling in'),
('afternoon', '2:30 - 3:00', 'Songs/Rhymes'),
('morning', '2nd - 9:00', 'Taking a register'),
('afternoon', '3:00 - 3:15', 'Sna'),
('afternoon', '3:15 - 3:20', 'Tide up time'),
('afternoon', '3:20 - 3: 35', 'Story time'),
('afternoon', '3:35 - 4:00', 'Free play indoors/outdoors'),
('morning', '3rd - 9:15 - 10:00', 'Free play indoors/outdoors'),
('morning', '4th - 10:00 - 10:30', 'Songs/Rhymes'),
('morning', '5th - 10:30 - 10:45', 'Sna'),
('morning', '6th - 10:45 - 11:30', 'Tide up time'),
('morning', '7th - 11:30 - 11:35', 'Story time'),
('morning', '8th - 11:35 - 11:45', 'Free play indoors/outdoors'),
('morning', '9th - 11:45 - 12:30', 'Lunch and play time');

-- --------------------------------------------------------

--
-- Table structure for table `st111employee_details`
--

CREATE TABLE IF NOT EXISTS `st111employee_details` (
  `emp_id` varchar(10) NOT NULL COMMENT 'Employee ID',
  `emp_name` varchar(20) NOT NULL COMMENT 'Employee Name',
  `address` varchar(30) NOT NULL COMMENT 'Address of employee',
  `gender` varchar(20) NOT NULL COMMENT 'Employee gender',
  `age` int(3) NOT NULL COMMENT 'Age of employee',
  `status` varchar(25) NOT NULL COMMENT 'Status i.e. Permanent or temporary or inactive',
  `contact_no` varchar(11) NOT NULL COMMENT 'Contact number of employee',
  `email` varchar(25) NOT NULL COMMENT 'Email of employee',
  `doj` date NOT NULL COMMENT 'Date of Joining of employee',
  `salary` int(12) NOT NULL COMMENT 'Current salary of employee',
  `qual` varchar(50) NOT NULL COMMENT 'Qualification of employee',
  `bcode` varchar(20) NOT NULL COMMENT 'Branch code',
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st111employee_details`
--

INSERT INTO `st111employee_details` (`emp_id`, `emp_name`, `address`, `gender`, `age`, `status`, `contact_no`, `email`, `doj`, `salary`, `qual`, `bcode`) VALUES
('1', 'abc', '', '', 0, '', '', '', '0000-00-00', 0, '', 'ST111'),
('2', 'chirag', '', '', 0, '', '', '', '0000-00-00', 0, '', 'ST111');

-- --------------------------------------------------------

--
-- Table structure for table `st111extra_detail`
--

CREATE TABLE IF NOT EXISTS `st111extra_detail` (
  `addmission_form` varchar(10) NOT NULL COMMENT 'Addimission Form No.',
  `transport_facility` varchar(25) NOT NULL COMMENT 'Transport Facility',
  `physical_disability` varchar(25) NOT NULL COMMENT 'Any physical disability',
  `session_want` varchar(25) NOT NULL COMMENT 'Which session you want',
  `medical_history` varchar(25) NOT NULL COMMENT 'Any medical hisory',
  `child_hobbies` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st111extra_detail`
--

INSERT INTO `st111extra_detail` (`addmission_form`, `transport_facility`, `physical_disability`, `session_want`, `medical_history`, `child_hobbies`, `id`) VALUES
('1', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `st111new_add_std`
--

CREATE TABLE IF NOT EXISTS `st111new_add_std` (
  `fname` varchar(20) NOT NULL,
  `doa` date NOT NULL,
  `fno` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `addmission_type` varchar(10) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st111new_add_std`
--

INSERT INTO `st111new_add_std` (`fname`, `doa`, `fno`, `gender`, `address`, `state`, `city`, `pincode`, `mob`, `dob`, `addmission_type`, `branch_name`, `id`) VALUES
('abc', '2014-04-23', 1, 'Male', '', '', '', 0, '', '0000-00-00', 'fresher', 'ST111', 1);

-- --------------------------------------------------------

--
-- Table structure for table `st111parent_details`
--

CREATE TABLE IF NOT EXISTS `st111parent_details` (
  `fno` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `poccup` varchar(10) NOT NULL,
  `pmob` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pincome` varchar(20) NOT NULL,
  `edu_quali` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st111parent_details`
--

INSERT INTO `st111parent_details` (`fno`, `pname`, `poccup`, `pmob`, `email`, `pincome`, `edu_quali`, `id`) VALUES
('1', '', '', '', '', 'two cr.', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `st111_timetable`
--

CREATE TABLE IF NOT EXISTS `st111_timetable` (
  `section` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `activity` varchar(40) NOT NULL,
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st111_timetable`
--

INSERT INTO `st111_timetable` (`section`, `time`, `activity`) VALUES
('afternoon', '1:00 - 1:15', 'Settling in'),
('afternoon', '1:15 - 1:30', 'Taking a register'),
('afternoon', '1:30 - 2:30', 'Free play indoors/outdoors'),
('morning', '1st - 8:45 - 9:00', 'Settling in'),
('afternoon', '2:30 - 3:00', 'Songs/Rhymes'),
('morning', '2nd - 9:00', 'Taking a register'),
('afternoon', '3:00 - 3:15', 'Snaktime'),
('afternoon', '3:15 - 3:20', 'Tide up time'),
('afternoon', '3:20 - 3: 35', 'Story time'),
('afternoon', '3:35 - 4:00', 'Free play indoors/outdoors'),
('morning', '3rd - 9:15 - 10:00', 'Free play indoors/outdoors'),
('morning', '4th - 10:00 - 10:30', 'Snaktime'),
('morning', '5th - 10:30 - 10:45', 'Story-time'),
('morning', '6th - 10:45 - 11:30', 'Free play indoors/outdoors'),
('morning', '7th - 11:30 - 11:35', 'Tide up'),
('morning', '8th - 11:35 - 11:45', 'Songs/Rhymes'),
('morning', '9th - 11:45 - 12:30', 'Lunch and play time');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_name` varchar(50) NOT NULL COMMENT 'Image name',
  `img_caption` varchar(50) NOT NULL COMMENT 'Image Caption',
  `img_status` varchar(50) NOT NULL COMMENT 'Image Status',
  `sort_order` varchar(50) NOT NULL COMMENT 'Sort order',
  `user_id` varchar(50) NOT NULL COMMENT 'User Id',
  `code` varchar(50) NOT NULL COMMENT 'Center Code',
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`img_id`, `img_name`, `img_caption`, `img_status`, `sort_order`, `user_id`, `code`) VALUES
(6, 'slide2.jpg', '', '0', '2', 'abcd', 'default'),
(7, 'slide7.jpg', '', '0', '', 'chirag7', 'default'),
(8, 'slide8.jpg', '', '0', '', 'chirag7', 'default'),
(9, 'slide9.jpg', '', '0', '', 'chirag7', 'ST'),
(11, 'slide11.jpg', '', '0', '', 'chirag7', 'ST'),
(12, 'slide12.jpg', '', '0', '', 'chirag7', 'ST'),
(13, 'slide13.jpg', '', '0', '', 'chirag7', 'ST'),
(14, 'slide14.jpg', '', '0', '2', 'chirag7', 'ST');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE IF NOT EXISTS `timetable` (
  `section` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `activity` varchar(40) NOT NULL,
  UNIQUE KEY `time` (`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`section`, `time`, `activity`) VALUES
('afternoon', '1:00 - 1:15', 'Settling in'),
('afternoon', '1:15 - 1:30', 'Taking a register'),
('afternoon', '1:30 - 2:30', 'Free play indoors/outdoors'),
('morning', '1st - 8:45 - 9:00', 'Settling in'),
('afternoon', '2:30 - 3:00', 'Songs/Rhymes'),
('morning', '2nd - 9:00', 'Taking a register'),
('afternoon', '3:00 - 3:15', 'Snaktime'),
('afternoon', '3:15 - 3:20', 'Tide up time'),
('afternoon', '3:20 - 3: 35', 'Story time'),
('afternoon', '3:35 - 4:00', 'Free play indoors/outdoors'),
('morning', '3rd - 9:15 - 10:00', 'Free play indoors/outdoors'),
('morning', '4th - 10:00 - 10:30', 'Snaktime'),
('morning', '5th - 10:30 - 10:45', 'Story-time'),
('morning', '6th - 10:45 - 11:30', 'Free play indoors/outdoors'),
('morning', '7th - 11:30 - 11:35', 'Tide up'),
('morning', '8th - 11:35 - 11:45', 'Songs/Rhymes'),
('morning', '9th - 11:45 - 12:30', 'Lunch and play time');
