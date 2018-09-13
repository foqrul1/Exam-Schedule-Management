-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 02:33 PM
-- Server version: 10.1.30-MariaDB
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
-- Database: `xm_sche_mng`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `contactno` int(15) NOT NULL,
  `emailid` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `profilepic` varchar(11) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contactno`, `emailid`, `password`, `profilepic`, `address`) VALUES
(1, 'Nowshin Sharmili', 1837632890, 'nowshin@yahoo.com', '12345', 'hello.jpg', 'Mirpur');

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(150) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `credit` varchar(150) NOT NULL,
  `exam_date` date NOT NULL,
  `xm_duration` varchar(11) NOT NULL,
  `exam_location` varchar(300) NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`course_id`, `course_code`, `course_name`, `credit`, `exam_date`, `xm_duration`, `exam_location`, `created_by`, `modified_by`, `modified_date`) VALUES
(1, 'CSE230', 'Numerical Method', '3.0', '2018-03-12', '2 Hrs', 'Mohakhali', 1, 0, '0000-00-00'),
(3, 'MKT101', 'Introduction To Marketing', '3.0', '2018-03-12', '2 Hrs', 'Mohakhali', 1, 0, '0000-00-00'),
(4, 'PHY111', 'Principles of Physics I', '3.0', '2018-03-12', '2 Hrs', 'Mohakhali', 1, 0, '0000-00-00'),
(5, 'PHY112', 'Principles of Physics II', '3.0', '2018-03-12', '2 Hrs', 'Mirpur', 1, 0, '0000-00-00'),
(6, 'ENG091', ' English Fundamentals', 'Non-credit', '2018-03-12', '1.5 Hrs', 'BUET', 1, 0, '0000-00-00'),
(7, 'CSE110', 'Programming Language I ', '3.0', '2018-03-15', '3 Hrs', 'BRAC University', 1, 1, '2018-03-13'),
(8, 'ENG101', ' English Composition', '3.0', '2018-03-12', '1.5 Hrs', 'Dhaka University', 1, 0, '0000-00-00'),
(10, 'MAT110', 'Mathematics I ', '3.0', '2018-03-12', '2 Hrs', 'BRAC University', 1, 0, '0000-00-00'),
(11, 'CSE220', ' Data Structures ', '3.0', '2018-03-13', '2.5 Hrs', 'BRAC University', 1, 1, '2018-03-13'),
(12, 'CSE250', 'Circuits and Electronics', '3.0', '2018-03-12', '2.5 Hrs', 'BRAC University', 1, 0, '0000-00-00'),
(13, 'CPHP', 'CoRe PHP', '3', '2018-03-13', '2 Hrs', 'SITL', 1, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  `course_ids` varchar(20) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `profilepic` varchar(1000) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `contactno`, `emailid`, `password`, `address`, `status`, `course_ids`, `created_date`, `modified_date`, `created_by`, `profilepic`, `modified_by`) VALUES
(4, 'Sadia Tasmin', '923879123', 'sadia@gmail.com', '123', 'Mirpur', 'Active', '', '2018-03-12', '0000-00-00', 0, 'ppg_glitchfixers---266x266.jpg', 0),
(5, 'Habiba Rahman', '3987491847', 'rahmanhabiab@gmail.com', '123', 'Dhanmondi', 'Inactive', '', '2018-03-12', '0000-00-00', 0, '1ff3bf362c4c4bdf63aa9c44b752e06d--old-cartoons-classic-cartoons.jpg', 0),
(6, 'Nasif Shuvo', '475187435', 'shuvo@yahoo.com', '123', 'Mohakhali', 'Active', '', '2018-03-12', '0000-00-00', 0, 'images (1).png', 0),
(11, 'Naveed Ahmed Tuli', '384723455', 'naveed@gmail.com', '123', 'Farmgate', 'Active', '', '2018-03-12', '0000-00-00', 0, '7-2-cartoon-picture.png', 0),
(12, 'Tonny', 'Haque', 'tn@gmail.com', '123', 'Mirpur', 'Active', '', '2018-03-12', '0000-00-00', 0, 'cartoon-network-clipart-gambar-2.jpg', 0),
(14, 'Rasheda Khan', '02398498745', 'khan@gmail.com', '123', 'Hatirjhil', 'Active', '', '2018-03-12', '0000-00-00', 0, '21108.jpg', 0),
(16, 'Natasha Alam', '83724682', 'alam@gmail.com', '123', 'Niketon', 'Active', '', '2018-03-12', '0000-00-00', 0, 'imagesabc.png', 0),
(17, 'Bornil Sumaiya', '9238479238', 'sumaiya@gmail.com', '123', 'Komolapur', 'Active', '', '2018-03-13', '0000-00-00', 0, 'download.png', 0),
(18, 'Tazniur Neety', '9238478723', 'neety@gmail.com', '123', 'Lalmatia', 'Active', '', '2018-03-13', '0000-00-00', 0, 'ben17_180x180.png', 0),
(19, 'Nazmul Rahman', '829347782', 'naz@gmail.com', '123', 'Mirpur', 'Active', '', '2018-03-13', '0000-00-00', 0, 'First-Dog-on-the-Moon,_L.png', 0),
(20, 'Anik Alam', '123894682', 'anik@gmail.com', '123', 'Matijhil', 'Active', '', '2018-03-13', '0000-00-00', 0, 'Mickey-mouse.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coursedetails`
--
ALTER TABLE `coursedetails`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
