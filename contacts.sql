-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2025 at 04:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `last_name`, `phone`) VALUES
(1, 'Kökten', 'Adal', '+90 333 8859342'),
(2, 'Hamma', 'Abdurrezak', '+90 333 1563682'),
(3, 'Güleycan', 'Şensal', '+90 333 2557114'),
(4, 'Suadiye', 'Ratip', '+90 333 9163726'),
(5, 'Barik', 'Nurşide', '+90 333 3323749'),
(6, 'Hanifi', 'Emineeylem', '+90 333 2763531'),
(7, 'Nakiye', 'Oğulkan', '+90 333 6168924'),
(8, 'Hamsiye', 'Cerit', '+90 333 3544579'),
(9, 'Mahfi', 'Hülâgü', '+90 333 8937773'),
(10, 'Esmeray', 'Nurihayat', '+90 333 1688759'),
(11, 'Şennur', 'Nazifer', '+90 333 5326326'),
(12, 'Çetinok', 'Seden', '+90 333 1614182'),
(13, 'Vuslat', 'Erimşah', '+90 333 9551194'),
(14, 'Şeküre', 'Ruhiye', '+90 333 8792165'),
(15, 'İmran', 'Ümmehan', '+90 333 6971156'),
(16, 'Yavuzbay', 'Hiçsönmez', '+90 333 8839473'),
(17, 'Nevzete', 'Abdulgafur', '+90 333 1453851'),
(18, 'Aksüyek', 'Sal', '+90 333 2481491'),
(19, 'Ferhat', 'Kılıçaslan', '+90 333 6861354'),
(20, 'Fereç', 'Tomurcuk', '+90 333 4141534'),
(21, 'Balkız', 'Alabegüm', '+90 333 8826359'),
(22, 'Adulle', 'Nesim', '+90 333 5364556'),
(23, 'Sevdal', 'Bilhan', '+90 333 8634743'),
(24, 'Hariz', 'Budunal', '+90 333 1193335'),
(25, 'Alnıak', 'Atız', '+90 333 5676454'),
(26, 'Haşmet', 'Taşgan', '+90 333 6185991'),
(27, 'Salli', 'Necife', '+90 333 6692117'),
(28, 'Türeli', 'Selçen', '+90 333 5588146'),
(29, 'Boray', 'Ümit', '+90 333 7741455'),
(30, 'Aktemür', 'Akbora', '+90 333 4139141'),
(31, 'Yediveren', 'Muhammetali', '+90 333 8483755'),
(32, 'Baltaş', 'Tonguç', '+90 333 3724797'),
(33, 'Tepegöz', 'Ferize', '+90 333 9528318'),
(34, 'Selen', 'Arısal', '+90 333 9524786'),
(35, 'Abdulcabbar', 'Mahizar', '+90 333 6782359'),
(36, 'İyem', 'Emre', '+90 333 8238835'),
(37, 'Muazzam', 'Lâmia', '+90 333 1348678'),
(38, 'İlten', 'Eripek', '+90 333 3758172'),
(39, 'Zerrin', 'Resul', '+90 333 9276424'),
(40, 'İlalan', 'Telmize', '+90 333 3563723'),
(41, 'Hamise', 'Sertan', '+90 333 8263265'),
(42, 'Zubeyde', 'Berk', '+90 333 7281496'),
(43, 'Feda', 'Balsarı', '+90 333 4969618'),
(44, 'Müsemme', 'Civanşir', '+90 333 2556491'),
(45, 'Aydınyol', 'Fitnet', '+90 333 7783478'),
(46, 'Çoğa', 'Bigüm', '+90 333 4133666'),
(47, 'Şehrinaz', 'Raşide', '+90 333 2677248'),
(48, 'Naif', 'Rukhiya', '+90 333 8252766'),
(49, 'Azat', 'Nilden', '+90 333 9324656'),
(50, 'Gamze', 'Korday', '+90 333 9442367');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
