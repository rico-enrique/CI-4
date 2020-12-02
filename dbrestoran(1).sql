-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 04:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrestoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblidentitas`
--

CREATE TABLE `tblidentitas` (
  `idtoko` tinyint(4) NOT NULL,
  `namatoko` varchar(50) NOT NULL,
  `alamattoko` varchar(100) NOT NULL,
  `emailtoko` varchar(50) NOT NULL,
  `nomortoko` varchar(100) NOT NULL,
  `deskripsitoko` text NOT NULL,
  `icon` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblidentitas`
--

INSERT INTO `tblidentitas` (`idtoko`, `namatoko`, `alamattoko`, `emailtoko`, `nomortoko`, `deskripsitoko`, `icon`, `logo`) VALUES
(1, 'Jumbo Food', 'Sidoarjo, Jawa Timur', 'jumbofoodjatim@outlook.com', '0895666221210', 'Jumbo Food adalah restoran yang mengedepankan kualitas dan pelayanan terbaik untuk pelanggannya. Kami menyediakan makanan berporsi yang besar namun tetap ramah di kantong.', 'favicon.png', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`, `keterangan`) VALUES
(52, 'Makanan', 'Makanan Sehat'),
(54, 'Minuman', 'Berbagai macam minuman '),
(60, 'Kue', 'Hidangan Pembuka'),
(62, 'Camilan', 'Camilan ringan'),
(72, 'Kue Semi Basah', 'NGAHHHHH');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `idkategori`, `menu`, `gambar`, `harga`) VALUES
(16, 52, 'Lamb chops', 'FILE490.JPG', 20000),
(18, 54, 'Iced Tea', 'FILE492.JPG', 5000),
(19, 54, 'Mineral Water', 'FILE565.JPG', 20000),
(22, 54, 'Kopi Mocchachino', 'FILE486.JPG', 8000),
(23, 52, 'Nasi Goreng', 'FILE496.JPG', 12000),
(24, 54, 'Jus Strober', 'FILE500.JPG', 12000),
(25, 60, 'Arem-Arem', 'FILE751.JPG', 5000),
(27, 52, 'Spagheti', 'FILE495.JPG', 25000),
(28, 62, 'Kacang Kukus', 'file677.jpg', 5000),
(29, 52, 'Ayam Bakar', 'FILE690.JPG', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `idorder` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `tglorder` date NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `bayar` float NOT NULL DEFAULT 0,
  `kembali` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idpelanggan`, `tglorder`, `total`, `bayar`, `kembali`, `status`) VALUES
(27, 11, '2020-08-13', 12000, 15000, 3000, 1),
(28, 11, '2020-08-24', 54000, 100000, 46000, 1),
(29, 11, '2020-08-24', 85000, 100000, 15000, 1),
(30, 8, '2020-12-02', 165000, 167000, 2000, 1),
(31, 8, '2020-12-02', 700000, 770000, 70000, 1),
(32, 17, '2020-12-02', 140000, 12399000, 12259000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `idorderdetail` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`idorderdetail`, `idorder`, `idmenu`, `jumlah`, `hargajual`) VALUES
(53, 27, 23, 1, 12000),
(54, 28, 23, 2, 12000),
(55, 28, 18, 2, 5000),
(56, 28, 16, 1, 20000),
(57, 29, 18, 4, 5000),
(58, 29, 24, -2, 12000),
(59, 29, 16, 1, 20000),
(60, 29, 23, 2, 12000),
(61, 29, 19, 1, 20000),
(62, 29, 27, 1, 25000),
(63, 30, 16, 4, 20000),
(64, 30, 18, 5, 5000),
(65, 30, 19, 3, 20000),
(66, 31, 16, 35, 20000),
(67, 32, 16, 7, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tblpelanggan`
--

CREATE TABLE `tblpelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aktif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpelanggan`
--

INSERT INTO `tblpelanggan` (`idpelanggan`, `pelanggan`, `alamat`, `telp`, `email`, `password`, `aktif`) VALUES
(2, 'Joni', 'Sidoarjo', '081238198', 'joni@gmail.com', '12345678', 0),
(8, 'Muafi', 'Kalanganyar', '081234567890', 'afianoslayer@gmail.com', 'afiafi', 1),
(11, 'Evan', 'Zahard Empire', '08987654321', 'evan@mail.com', '1234', 0),
(17, 'Mochammad Enrique', 'Perumtas 2', '087754434901', 'terongraos@gmail.com', 'anakcuplis4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `email`, `password`, `level`, `aktif`) VALUES
(34, 'admin', 'admin@mimin.id', '$2y$10$KyZmVXrUiFRwrX.85qVU2.jnr3DdR3AfT5BEtoE5bm3VGwdjCh5mi', 'Admin', 1),
(35, 'kasir', 'kasir@mimin.id', '$2y$10$94a5GIGzhZQyhAuqPLBkteKZ.IsOA7fADzZ3oSqJJb86n2nO2wzPu', 'Kasir', 1),
(36, 'koki', 'koki@mimin.id', '$2y$10$1Vz0zvLhsQc2xdWuicDmyuXF6dT5mmLUUXLy98aH1m.gNL.iplzA.', 'Koki', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vorder`
-- (See below for the actual view)
--
CREATE TABLE `vorder` (
`idorder` int(11)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(100)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vorderdetail`
-- (See below for the actual view)
--
CREATE TABLE `vorderdetail` (
`idorderdetail` int(11)
,`idorder` int(11)
,`idmenu` int(11)
,`jumlah` int(11)
,`hargajual` float
,`idkategori` int(11)
,`menu` varchar(100)
,`gambar` varchar(200)
,`harga` float
,`kategori` varchar(100)
,`idpelanggan` int(11)
,`tglorder` date
,`total` float
,`bayar` float
,`kembali` float
,`status` int(11)
,`pelanggan` varchar(100)
,`alamat` varchar(200)
,`telp` varchar(100)
,`email` varchar(150)
,`password` varchar(255)
,`aktif` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vorder`
--
DROP TABLE IF EXISTS `vorder`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorder`  AS  select `tblorder`.`idorder` AS `idorder`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from (`tblpelanggan` join `tblorder` on(`tblpelanggan`.`idpelanggan` = `tblorder`.`idpelanggan`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vorderdetail`
--
DROP TABLE IF EXISTS `vorderdetail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vorderdetail`  AS  select `tblorderdetail`.`idorderdetail` AS `idorderdetail`,`tblorderdetail`.`idorder` AS `idorder`,`tblorderdetail`.`idmenu` AS `idmenu`,`tblorderdetail`.`jumlah` AS `jumlah`,`tblorderdetail`.`hargajual` AS `hargajual`,`tblmenu`.`idkategori` AS `idkategori`,`tblmenu`.`menu` AS `menu`,`tblmenu`.`gambar` AS `gambar`,`tblmenu`.`harga` AS `harga`,`tblkategori`.`kategori` AS `kategori`,`tblorder`.`idpelanggan` AS `idpelanggan`,`tblorder`.`tglorder` AS `tglorder`,`tblorder`.`total` AS `total`,`tblorder`.`bayar` AS `bayar`,`tblorder`.`kembali` AS `kembali`,`tblorder`.`status` AS `status`,`tblpelanggan`.`pelanggan` AS `pelanggan`,`tblpelanggan`.`alamat` AS `alamat`,`tblpelanggan`.`telp` AS `telp`,`tblpelanggan`.`email` AS `email`,`tblpelanggan`.`password` AS `password`,`tblpelanggan`.`aktif` AS `aktif` from ((((`tblorderdetail` join `tblorder` on(`tblorderdetail`.`idorder` = `tblorder`.`idorder`)) join `tblpelanggan` on(`tblorder`.`idpelanggan` = `tblpelanggan`.`idpelanggan`)) join `tblmenu` on(`tblorderdetail`.`idmenu` = `tblmenu`.`idmenu`)) join `tblkategori` on(`tblmenu`.`idkategori` = `tblkategori`.`idkategori`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblidentitas`
--
ALTER TABLE `tblidentitas`
  ADD PRIMARY KEY (`idtoko`);

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`idorderdetail`);

--
-- Indexes for table `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblidentitas`
--
ALTER TABLE `tblidentitas`
  MODIFY `idtoko` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `idorderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `tblpelanggan`
--
ALTER TABLE `tblpelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
