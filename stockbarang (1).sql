-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 04:45 AM
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
(17, 20, '2023-06-26 06:28:59', 'hilang', 2),
(18, 20, '2023-06-26 06:30:00', 'toko', 85),
(19, 27, '2023-10-31 07:10:19', 'toko', 20),
(20, 18, '2023-11-02 02:46:22', 'toko', 4),
(21, 20, '2023-11-14 07:28:47', 'outlet', 43),
(22, 22, '2023-11-14 07:29:33', 'toko', 2),
(23, 18, '2023-11-14 07:37:35', 'toko', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('manajer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `user`, `password`, `level`) VALUES
(4, 'manajer@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'manajer'),
(7, 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(10, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(11, 'dimas', '81dc9bdb52d04dc20036dbd8313ed055', 'manajer');

-- --------------------------------------------------------

--
-- Table structure for table `log_stock`
--

CREATE TABLE `log_stock` (
  `kejadian` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_stock`
--

INSERT INTO `log_stock` (`kejadian`, `waktu`) VALUES
('Tambah_data', '2023-11-28 08:49:11'),
('Ubah data', '2023-11-28 08:53:22');

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
(16, 18, '2023-06-11 07:34:13', 'toko', 100),
(18, 16, '2023-06-11 08:01:48', 'Admin', 22),
(19, 16, '2023-06-12 02:26:29', 'Admin', 200),
(20, 20, '2023-06-13 02:02:55', 'toko', 20),
(21, 23, '2023-06-26 06:21:45', 'toko A', 2),
(22, 18, '2023-06-26 06:30:33', 'toko', 10),
(23, 22, '2023-06-30 07:53:15', 'toko', 2),
(24, 29, '2023-08-23 04:29:38', 'dimas', 10),
(25, 20, '2023-08-29 07:59:26', 'toko', 10),
(27, 18, '2023-08-29 08:02:49', 'toko', 10),
(28, 20, '2023-10-23 04:34:22', 'store', 30),
(29, 18, '2023-10-23 05:15:26', 'toko', 20),
(30, 27, '2023-10-23 05:24:31', 'toko', 50),
(32, 18, '2023-11-02 02:29:15', 'loper', 40),
(33, 27, '2023-11-14 07:24:46', 'kata log', 10),
(34, 18, '2023-11-14 07:30:30', 'kata log', 9),
(35, 23, '2023-11-14 07:39:29', 'loper', 20),
(36, 34, '2023-11-26 15:11:23', 'Toko Jaya Abadi', 500);

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
(18, 'Mesin Cuci 1 pintu', 'LG', 80, '175d18ee021b870c5152eb2da75a1bf6.jpg'),
(20, 'Lemari Es', 'Panasonic', 400, 'b416b598039c9269164eac1cafde7d28.jpg'),
(21, 'Smart TV', 'LG', 1000, 'bff79de4e5a55e18264dc56a22b6dc30.jpg'),
(22, 'Mesin Cuci', 'Aqua', 600, '4b16ae191089ef740dfd8e7335105a07.jpg'),
(23, 'Kompor Listrik', 'Cosmos', 330, 'e43d9b7b7d5c4e9f6cdb7de7c96c8aac.jpg'),
(25, 'Mesin Cuci', 'LG', 50, '65df9f42dcca788419b6c9be5f5b438a.jpg'),
(27, 'Kompor Gas', 'Rinna 2 tungku', 50, '4f59eef95904dd11af964c64a90df7d3.jpg'),
(30, 'AC', 'Air-Com', 12, '99bd88e578423620e4ede530d77c0f40.jpg'),
(31, 'Rice Cooker', 'Instant', 10, '06af598ca5da744acbe0e27ce7f88fc8.jpg'),
(32, 'Blender', 'Polytron', 20, '7bae7c66c99e9c6790a3547ba7e83274.jpg'),
(33, 'DVD', 'Philips', 10, 'ae8e871caf59bbf8fc4356321b5cf26b.jpg'),
(34, 'Vacum Cleaner', 'Panasonic', 505, 'fed6d201aaad9f15ba0aebbad70363f6.jpg'),
(35, 'Lampu Belajar', 'Walmart', 30, 'c77b063c7a4f38fc288698390ef5b0af.jpg'),
(36, 'Mixer', 'Sharp', 120, '07fc260a2962df0a427f76a46a5d2e62.jpg');

--
-- Triggers `stock`
--
DELIMITER $$
CREATE TRIGGER `insert_barang` AFTER INSERT ON `stock` FOR EACH ROW BEGIN
INSERT INTO log_stock VALUES('Tambah_data',NOW());
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubah_data` AFTER UPDATE ON `stock` FOR EACH ROW BEGIN
INSERT INTO log_stock VALUES ('Ubah data',NOW());
END
$$
DELIMITER ;

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
  MODIFY `idkeluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `idmasuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
