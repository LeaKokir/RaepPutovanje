-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2024 at 10:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `dostupno`
--

CREATE TABLE `dostupno` (
  `id` int(3) NOT NULL,
  `drzava` varchar(30) NOT NULL,
  `grad` varchar(30) NOT NULL,
  `prevoz` varchar(30) NOT NULL,
  `cena` int(10) NOT NULL,
  `mesec` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dostupno`
--

INSERT INTO `dostupno` (`id`, `drzava`, `grad`, `prevoz`, `cena`, `mesec`) VALUES
(1, 'Egipat', 'Hurgada', 'Avion', 1000, 'maj'),
(2, 'Turska', 'Istanbul', 'Avion', 1000, 'jul'),
(4, 'Brazil', 'Rio De Janeiro', 'Avion', 1500, 'februar'),
(5, 'Engleska', 'London', 'Autobus', 700, 'septembar'),
(6, 'Svajcarska', 'Cirih', 'Autobus', 500, 'mart');

-- --------------------------------------------------------

--
-- Table structure for table `putovanja`
--

CREATE TABLE `putovanja` (
  `id` int(3) NOT NULL,
  `drzava` varchar(30) NOT NULL,
  `grad` varchar(30) NOT NULL,
  `prevoz` varchar(30) NOT NULL,
  `cena` int(10) NOT NULL,
  `mesec` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `putovanja`
--

INSERT INTO `putovanja` (`id`, `drzava`, `grad`, `prevoz`, `cena`, `mesec`) VALUES
(1, 'Srbija', 'Beograd', 'auto', 500, 'oktobar'),
(3, 'Francuska', 'Pariz', 'avion', 1000, 'maj'),
(5, 'Indonezija', 'Bali', 'avion', 1000, 'decembar'),
(7, 'BIH', 'Sarajevo', 'autobus', 300, 'maj'),
(9, 'Madjarska', 'Budimpesta', 'autobus', 500, 'april'),
(10, 'Egipat', 'Hurgada', 'avion', 1000, 'januar'),
(12, 'Japan', 'Tokio', 'Taxi', 1000, 'jul'),
(13, 'Japan', 'Tokio', 'Taxi', 1000, 'jul'),
(14, 'Makedonija', 'Skoplje', 'autobus', 300, 'mart'),
(15, 'Makedonija', 'Skoplje', 'autobus', 300, 'mart'),
(20, 'Srbija', 'Subotica', 'avion', 500, 'jun'),
(21, 'Srbija', 'Beograd', 'avion', 300, 'oktobar'),
(22, 'Srbija', 'Subotica', 'autobus', 300, 'maj'),
(23, 'Srbija', 'Subotica', 'autobus', 300, 'maj'),
(24, 'Austrija', 'Bec', 'autobus', 300, 'jun'),
(25, 'Srbija', 'Novi', 'avion', 300, 'jun'),
(26, 'Srbija', 'Novi', 'avion', 300, 'jun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dostupno`
--
ALTER TABLE `dostupno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `putovanja`
--
ALTER TABLE `putovanja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dostupno`
--
ALTER TABLE `dostupno`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `putovanja`
--
ALTER TABLE `putovanja`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
