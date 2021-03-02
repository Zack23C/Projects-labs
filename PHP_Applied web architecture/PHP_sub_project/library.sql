-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2018 at 03:13 PM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `onloan` tinyint(1) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `title`, `author`, `onloan`, `duedate`) VALUES
(1, 'Hello Physics', 'Corny Saga', 0, '0000-00-00'),
(2, 'African Diaries', 'John Regina', 0, '0000-00-00'),
(3, 'The Smarter', 'Tabeth Jonga', 0, '0000-00-00'),
(4, 'Speed Girl', 'Omega Peru', 0, '0000-00-00'),
(5, 'The Advocate', 'Oripah Lawrence', 0, '0000-00-00'),
(6, 'The Humble', 'Corny Shorai', 0, '0000-00-00'),
(7, 'South African Man', 'Lioenel Maschester', 0, '0000-00-00'),
(8, 'The pride of Africa', 'Regina Nyawera', 0, '0000-00-00'),
(9, 'The Innocent one', 'Cloudius Swiss', 0, '0000-00-00'),
(10, 'The last is better', 'Michael Smith', 0, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
