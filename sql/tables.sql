--
-- Database: `db1`

-- Table structure for table `phpusers`
--
CREATE TABLE `phpusers` (
  `user_id` int (11) not null auto_increment,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
   primary key (user_id)
);

-- Table structure for table `tbl_eprofile`
--


CREATE TABLE `tbl_eprofile` (
  `entry` int not null auto_increment,
  `fName` varchar(50) DEFAULT NULL,
  `lName` varchar(50) DEFAULT NULL,
  `employeeID` varchar(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `nChildren` int(10) DEFAULT NULL,
  `nCars` int(10) DEFAULT NULL,
  `lEducation` varchar(250) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
   primary key (entry)
);