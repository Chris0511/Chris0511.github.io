-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 04:03 PM
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
-- Database: `dbresep`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbminuman`
--

CREATE TABLE `tbminuman` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `deskripsi` text NOT NULL,
  `resep` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbminuman`
--

INSERT INTO `tbminuman` (`id`, `nama`, `deskripsi`, `resep`, `gambar`) VALUES
(1, 'Es Jelly Mangga', 'Es jelly mangga adalah hidangan penutup yang menyegarkan dan lezat. Hidangan ini terdiri dari potongan-potongan buah mangga yang disajikan dalam campuran jelly transparan yang dingin dan manis. Potongan mangga yang segar memberikan rasa manis alami, sementara jelly memberikan tekstur kenyal dan segar.', 'Es jelly mangga.txt', 'es mangga jeli.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbminuman`
--
ALTER TABLE `tbminuman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbminuman`
--
ALTER TABLE `tbminuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
