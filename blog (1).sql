-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2017 at 05:36 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `pid` int(11) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`pid`, `emailid`, `title`, `content`, `time`) VALUES
(1, 'jd@gmail.com', 'first post', 'hii whats upp..goo back huuu thheeee', 1502898008),
(2, 'jd@gmail.com', 'second', 'dsf', 1502898008),
(3, 'jd@gmail.com', 'third', 'sdf', 1502898008),
(4, 'rd@gmail.com', 'fourth', 'cb', 1502898008),
(5, 'jd@gmail.com', 'via code with', 'a post via code with\r\n', 1503242248),
(7, 'rd@gmail.com', 'tuu bhi', 'haa me bhii', 1503245851),
(12, 'rd@gmail.com', 'hm', 'hm', 1503247043),
(13, 'jd@gmail.com', 'j bj', 'igbuyh ', 1504524803),
(14, 'jd@gmail.com', 'hii fellas haaa u jj', 'Yupp hii  bnghnghn', 1504696801);

-- --------------------------------------------------------

--
-- Table structure for table `signin`
--

CREATE TABLE `signin` (
  `sid` int(25) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signin`
--

INSERT INTO `signin` (`sid`, `fname`, `lname`, `emailid`, `password`, `permission`, `admin`) VALUES
(1, 'Jay', 'Dudhat', 'jd@gmail.com', '83Qp4Chng0ucA', 1, 1),
(2, 'raj', 'dudhat', 'rd@gmail.com', '83Qp4Chng0ucA', 0, 0),
(11, 'sid', 'ptl', 'sp@gmail.com', '83Qp4Chng0ucA', 1, 0),
(13, 'akki', 'patel', 'ap@gmail.com', '83Qp4Chng0ucA', 0, 1),
(14, 'sid', 'patel', 'sp3@gmail.com', '83Qp4Chng0ucA', 0, 0),
(15, 'hardik', 'patel', 'hp@gmail.com', '83Qp4Chng0ucA', 0, 0),
(16, 'sanket', 'ghevriya', 'sg@gmail.com', '83Qp4Chng0ucA', 0, 0),
(32, 'sarthik', 'amipara', 'jaydudhatnk@gmail.com', '83Qp4Chng0ucA', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `signin`
--
ALTER TABLE `signin`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `signin`
--
ALTER TABLE `signin`
  MODIFY `sid` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
