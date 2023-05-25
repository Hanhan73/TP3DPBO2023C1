-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 05:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `element`
--

CREATE TABLE `element` (
  `element_id` int(11) NOT NULL,
  `element_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `element`
--

INSERT INTO `element` (`element_id`, `element_nama`) VALUES
(1, 'Wind'),
(2, 'Physical'),
(3, 'Fire'),
(4, 'Ice'),
(5, 'Lightning'),
(6, 'Quantum'),
(7, 'Imaginary');

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `karakter_id` int(11) NOT NULL,
  `karakter_nama` varchar(255) NOT NULL,
  `karakter_hp` int(11) NOT NULL,
  `karakter_atk` int(11) NOT NULL,
  `karakter_def` int(11) NOT NULL,
  `path_id` int(11) NOT NULL,
  `element_id` int(11) NOT NULL,
  `karakter_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`karakter_id`, `karakter_nama`, `karakter_hp`, `karakter_atk`, `karakter_def`, `path_id`, `element_id`, `karakter_foto`) VALUES
(19, 'Welt', 1125, 620, 509, 5, 7, '16850242416_sm.jpg'),
(20, 'Bronya', 1241, 582, 533, 4, 1, '168502434512_sm.jpg'),
(21, 'Bailu', 1319, 562, 485, 7, 5, '168502462224_sm.jpg'),
(22, 'Jin Yuan', 1164, 698, 485, 3, 5, '168502612822_sm.jpg'),
(23, 'Trailblazer', 1241, 601, 606, 6, 3, '16850265902_sm.jpg'),
(27, 'Himeko', 1047, 756, 436, 3, 3, '16850290695_sm.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `path`
--

CREATE TABLE `path` (
  `path_id` int(11) NOT NULL,
  `path_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `path`
--

INSERT INTO `path` (`path_id`, `path_nama`) VALUES
(1, 'The Destruction'),
(2, 'The Hunt'),
(3, 'The Erudition'),
(4, 'The Harmony'),
(5, 'The Nihility'),
(6, 'The Preservation'),
(7, 'The Abundance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`element_id`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`karakter_id`),
  ADD KEY `element_id` (`element_id`),
  ADD KEY `path_id` (`path_id`);

--
-- Indexes for table `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`path_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `element`
--
ALTER TABLE `element`
  MODIFY `element_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `karakter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `path`
--
ALTER TABLE `path`
  MODIFY `path_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karakter`
--
ALTER TABLE `karakter`
  ADD CONSTRAINT `karakter_ibfk_1` FOREIGN KEY (`path_id`) REFERENCES `path` (`path_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `karakter_ibfk_2` FOREIGN KEY (`element_id`) REFERENCES `element` (`element_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
