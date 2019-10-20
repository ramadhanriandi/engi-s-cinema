-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 29, 2019 at 03:38 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `engima`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie_showings`
--

CREATE TABLE `movie_showings` (
  `movie_showing_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` time NOT NULL,
  `seats_count` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `movie_showings`
--

INSERT INTO `movie_showings` (`movie_showing_id`, `movie_id`, `show_date`, `show_time`, `seats_count`) VALUES
(1, 1, '2019-09-03', '06:30:00', 30),
(2, 1, '2019-09-03', '10:30:00', 30),
(3, 2, '2019-09-03', '06:30:00', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie_showings`
--
ALTER TABLE `movie_showings`
  ADD PRIMARY KEY (`movie_showing_id`),
  ADD KEY `fk_movie` (`movie_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_showings`
--
ALTER TABLE `movie_showings`
  ADD CONSTRAINT `fk_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
