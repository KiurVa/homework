-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2025 at 05:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `added`, `name`, `email`, `message`) VALUES
(12, '2025-05-05 12:01:16', 'proov', 'proov@jama.ee', 'dsfdsdfdf &gt &gt &gt &gt &lt &lt &lt &lt &lt '),
(13, '2025-05-05 12:01:28', 'proov', 'proov@jama.ee', 'dsfdsdfdf &gt &gt &gt &gt &lt &lt &lt &lt &lt '),
(14, '2025-05-05 12:01:31', 'proov', 'proov@jama.ee', 'dsfdsdfdf &gt &gt &gt &gt &lt &lt &lt &lt &lt '),
(16, '2025-05-05 12:06:37', 'proov', 'proov@hot.ee', 'fgadsfgsdfgsdf'),
(17, '2025-05-05 12:07:01', 'proov', 'proov@proov.ee', 'proov'),
(18, '2025-05-05 12:09:58', 'viimane', 'viimane@viimane', 'viimane'),
(19, '2025-05-05 12:17:27', 'proov', 'proov@gmail.com', 'dsdsdfsd'),
(20, '2025-05-05 12:21:46', 'proov1', 'proov@gmail.com', 'sdfdsfds'),
(21, '2025-05-05 12:30:39', 'proov3', 'proov@gmail.com', 'fdhfgjghkjghdjg'),
(22, '2025-05-05 12:31:48', 'proov5', 'proov@gmail.com', 'fdgshgfhjdg'),
(23, '2025-05-05 12:37:45', 'proov6', 'proov@gmail.com', 'sdgttyui******'),
(24, '2025-05-05 12:57:58', 'ddfdf', 'dffdff@d.ee', 'fsdsgfgfdgfh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
