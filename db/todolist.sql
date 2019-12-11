-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2019 at 07:30 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasklist`
--

DROP TABLE IF EXISTS `tasklist`;
CREATE TABLE IF NOT EXISTS `tasklist` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `tasks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `checked` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasklist`
--

INSERT INTO `tasklist` (`timestamp`, `tasks`, `checked`) VALUES
('2019-12-10 12:04:36', 'We can add any number of tasks', 'n'),
('2019-12-10 12:04:13', 'This is a minimal To-Do List', 'n'),
('2019-12-10 12:04:55', 'We can also check off the tasks that are completed', 'y'),
('2019-12-10 12:05:21', 'We can also access this list from any device within the same LAN', 'n'),
('2019-12-10 12:05:54', 'When hosted world-wide anyone can access and use this to-do list', 'y'),
('2019-12-10 12:06:19', 'This project is made using HTML, CSS, PHP and Javascript', 'n'),
('2019-12-10 12:07:45', 'Likith B', 'n'),
('2019-12-10 12:07:41', 'Kishore Prabhakar', 'n'),
('2019-12-10 12:07:36', 'Made By:', 'n'),
('2019-12-10 12:07:50', 'Madhav M Sullad', 'n'),
('2019-12-10 12:07:55', 'Neeraj B M', 'n');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
