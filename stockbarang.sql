-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2023 at 09:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stockbarang`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `idkeluar` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `penerima` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`idkeluar`, `idbarang`, `tanggal`, `penerima`, `qty`) VALUES
(1, 6, '2023-05-11 08:54:07', 'Pembeli', 150),
(3, 7, '2023-05-11 10:25:23', 'hilang', 2800),
(4, 8, '2023-05-12 13:18:27', 'Toko', 100),
(5, 9, '2023-05-12 13:44:14', 'Toko B', 30),
(7, 9, '2023-05-12 15:38:39', 'Toko B', 20),
(9, 12, '2023-05-17 10:47:50', 'Toko B', 300),
(12, 15, '2023-06-10 04:17:10', 'Toko', 300),
(14, 18, '2023-06-11 07:34:47', 'Toko', 10),
(15, 16, '2023-06-11 08:02:53', 'Toko', 66),
(16, 20, '2023-06-13 02:04:55', 'toko', 10),
(17, 20, '2023-06-26 06:28:59', 'hilang', 5),
(18, 20, '2023-06-26 06:30:00', 'outline', 85);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `email`, `password`) VALUES
(3, 'sandyaya@gmail.com', '222'),
(4, 'dimas@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `idmasuk` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `keterangan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`idmasuk`, `idbarang`, `tanggal`, `keterangan`, `qty`) VALUES
(2, 6, '2023-05-11 08:32:20', 'Ahmad', 500),
(5, 7, '2023-05-11 10:25:58', 'Ahmad', 500),
(6, 8, '2023-05-12 13:17:58', 'Sandya', 150),
(7, 9, '2023-05-12 13:43:49', 'Admin', 120),
(11, 12, '2023-05-17 10:46:32', 'Admin', 500),
(16, 18, '2023-06-11 07:34:13', 'Adminn', 100),
(18, 16, '2023-06-11 08:01:48', 'Admin', 22),
(19, 16, '2023-06-12 02:26:29', 'Admin', 200),
(20, 20, '2023-06-13 02:02:55', 'outlen', 20),
(21, 23, '2023-06-26 06:21:45', 'outlen', 6),
(22, 18, '2023-06-26 06:30:33', 'toko', 10),
(23, 22, '2023-06-30 07:53:15', 'saya', 2),
(24, 29, '2023-08-23 04:29:38', 'dimas', 10),
(25, 20, '2023-08-29 07:59:26', 'outlen', 10),
(26, 18, '2023-08-29 08:02:08', 'outlen', 10),
(27, 18, '2023-08-29 08:02:49', 'toko', 10);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(50) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`idbarang`, `namabarang`, `deskripsi`, `stock`, `image`) VALUES
(18, 'MacBook Pro', 'Apple', 30, 'e7e3e703b439a88d49afc5d162e36b76.jpg'),
(20, 'Vivo v27', 'Smartphone', 410, '84ca8cd9087e560de4453a6eab577896.jpg'),
(21, 'Redmi Note12', 'Handphone', 1000, '790f0e3f3c638487e823c511c1a38148.jpg'),
(22, 'Realmi', 'Smartphone', 602, '9c75682afb7c928fd2729e7cae69b9a6.jpg'),
(23, 'Samsung a52s', 'Hp', 306, 'f8d99f7872c59a9484ee94774e59c97b.jpg'),
(25, 'Iphone 14 Pro', 'Iphone', 50, 'c309e93780c6b89ac8b6cfbec6826f5b.jpg'),
(27, 'smartwacth', 'Jam Tangan', 10, '8729427cc51a0626a37e532d27a315bb.jpg'),
(28, 'Samsung Galaxy Z Flim 3', 'Handphone', 10, '875278a208ec4a3feb0240c203b08dab.jpg'),
(29, 'tv', 'LG', 20, '50dbe0f5c4ba9eef6546444bc2205385.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`idkeluar`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`idmasuk`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
