-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 01:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bahanbaku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_bantu`
--

CREATE TABLE `bahan_bantu` (
  `id` int(11) NOT NULL,
  `kd_bahan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `stok` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_bantu`
--

INSERT INTO `bahan_bantu` (`id`, `kd_bahan`, `nama`, `merk`, `stok`, `id_kategori`, `keterangan`) VALUES
(1, 'GLUELFE01', 'Low Formaldehyde Emission', 'LFE', 29212, 1, 'Stok awal'),
(2, 'GLUEMF01', 'Melamine Glue', 'MF', 24750, 1, 'Stok awal'),
(3, 'TPNGBGSR01', 'Tepung', 'Bogasari', 2367, 2, 'Stok awal'),
(4, 'TPNGSGTBR02', 'Tepung', 'Segitiga Biru', 2400, 2, 'Stok awal'),
(5, 'HU100', 'Hardener', 'HU-100', 646, 5, 'Stok awal'),
(6, 'HU103', 'Hardener', 'HU-103', 646, 5, ''),
(7, 'HU360', 'Hardener', 'HU-360', 649, 5, 'Stok awal');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `id_bahan` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `stok_masuk` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_masuk`
--

INSERT INTO `bahan_masuk` (`id`, `invoice`, `tgl`, `id_bahan`, `nama`, `stok_masuk`, `keterangan`, `id_supplier`) VALUES
(1, 'MFG7283', '2019-12-10', '2', 'Melamine Glue', 250, '', 1),
(17, 'LFEG8921', '2019-12-04', '1', 'LFE', 500, 'Lem Plywood', 1),
(18, 'LFEG7283', '2019-12-04', '1', 'LFE', 500, 'Lem Plywood 2', 1),
(19, 'BGSR7263', '2019-12-12', '3', 'Tepung Bogasari', 600, '', 3),
(20, 'HRD10082', '2019-12-16', '5', 'HU-100', 200, '', 7),
(22, 'LFEG2563', '2020-01-01', '1', 'Low Formaldehyde Emission', 20000, '', 1),
(23, 'MFG1836', '2020-01-02', '2', 'Melamine Glue', 5000, '', 1);

--
-- Triggers `bahan_masuk`
--
DELIMITER $$
CREATE TRIGGER `bahanmasuk_delete` BEFORE DELETE ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-OLD.stok_masuk
    WHERE id=OLD.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `bahanmasuk_insert` AFTER INSERT ON `bahan_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+NEW.stok_masuk
    WHERE id=NEW.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_gluemix`
--

CREATE TABLE `dtl_gluemix` (
  `id` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_gluemix` int(11) NOT NULL,
  `stok_keluar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_gluemix`
--

INSERT INTO `dtl_gluemix` (`id`, `id_bahan`, `id_gluemix`, `stok_keluar`) VALUES
(1, 1, 1, 250),
(2, 4, 1, 50),
(3, 5, 1, 2),
(4, 6, 1, 1),
(5, 2, 2, 250),
(6, 4, 2, 50),
(7, 7, 2, 1),
(8, 1, 3, 275),
(9, 3, 3, 65),
(10, 5, 3, 1),
(11, 6, 3, 2),
(12, 1, 4, 263),
(13, 3, 4, 68),
(14, 5, 4, 1),
(15, 6, 4, 2);

--
-- Triggers `dtl_gluemix`
--
DELIMITER $$
CREATE TRIGGER `dtl_gluemix_delete` BEFORE DELETE ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok+OLD.stok_keluar
    WHERE id=OLD.id_bahan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `gluemix_insert` AFTER INSERT ON `dtl_gluemix` FOR EACH ROW BEGIN
	UPDATE bahan_bantu SET stok=stok-NEW.stok_keluar WHERE id=NEW.id_bahan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_kayu_masuk`
--

CREATE TABLE `dtl_kayu_masuk` (
  `id` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `kd_kayu` varchar(20) NOT NULL,
  `stok_masuk` int(20) NOT NULL,
  `kubik_masuk` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_kayu_masuk`
--

INSERT INTO `dtl_kayu_masuk` (`id`, `invoice`, `kd_kayu`, `stok_masuk`, `kubik_masuk`) VALUES
(18, 'SBJ8292', '11', 450, 5670.00),
(19, 'SBJ8292', '12', 258, 3625.00),
(20, 'SBJ8292', '13', 19, 1879.00),
(21, 'KAJR2768', '14', 500, 7500.00),
(22, 'KAJR2768', '15', 250, 5800.00),
(23, 'KTA8372', '11', 400, 6500.00),
(24, 'KTA8372', '14', 200, 4700.00),
(25, 'KTA8372', '12', 150, 3200.00);

--
-- Triggers `dtl_kayu_masuk`
--
DELIMITER $$
CREATE TRIGGER `stok_log_delete` AFTER DELETE ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-OLD.stok_masuk, kubikasi=kubikasi-OLD.kubik_masuk
    WHERE id = OLD.kd_kayu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_log_masuk` AFTER INSERT ON `dtl_kayu_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id=NEW.kd_kayu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dtl_vinir_keluar`
--

CREATE TABLE `dtl_vinir_keluar` (
  `id` int(11) NOT NULL,
  `id_vinir` int(11) NOT NULL,
  `id_keluar` int(11) NOT NULL,
  `stok_keluar` int(20) NOT NULL DEFAULT 0,
  `kubik_keluar` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dtl_vinir_keluar`
--

INSERT INTO `dtl_vinir_keluar` (`id`, `id_vinir`, `id_keluar`, `stok_keluar`, `kubik_keluar`) VALUES
(1, 3, 1, 5, 5),
(2, 3, 2, 26, 896),
(3, 5, 2, 47, 1428),
(4, 5, 3, 63, 1038),
(5, 4, 3, 90, 1739),
(6, 3, 3, 67, 1167);

-- --------------------------------------------------------

--
-- Table structure for table `gluemix`
--

CREATE TABLE `gluemix` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `gluemix` varchar(30) NOT NULL,
  `shift` varchar(10) NOT NULL,
  `total` int(20) NOT NULL,
  `keterangan` varchar(100) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gluemix`
--

INSERT INTO `gluemix` (`id`, `tgl`, `gluemix`, `shift`, `total`, `keterangan`) VALUES
(1, '2020-01-02', 'Type-2 LFE', '1', 303, ''),
(2, '2020-01-01', 'Type-1 Melamine', '1', 301, 'shift malam'),
(3, '2020-01-02', 'Type-2 LFE', '2', 343, ''),
(4, '2020-01-15', 'Type-2 LFE', '2', 334, 'shift siang');

--
-- Triggers `gluemix`
--
DELIMITER $$
CREATE TRIGGER `gluemix_delete` AFTER DELETE ON `gluemix` FOR EACH ROW BEGIN
	DELETE FROM dtl_gluemix WHERE dtl_gluemix.id_gluemix = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jeniskayu`
--

CREATE TABLE `jeniskayu` (
  `id` int(11) NOT NULL,
  `kd_jenis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT 'Tidak ada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jeniskayu`
--

INSERT INTO `jeniskayu` (`id`, `kd_jenis`, `nama`, `keterangan`) VALUES
(2, 'MLP', 'Melapi', ''),
(3, 'MRT', 'Meranti', ''),
(4, 'DH', 'Damar Hitam', ''),
(5, 'MSW', 'Mersawa', ''),
(6, 'KR', 'Kruing', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nm_kateg` varchar(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nm_kateg`, `keterangan`) VALUES
(1, 'Lem Plywood', 'lem'),
(2, 'Tepung Industri', ''),
(4, 'Kayu Log', ''),
(5, 'Hardener', 'hardener'),
(6, 'Veneer Basah', ''),
(7, 'Veneer Kering', '');

-- --------------------------------------------------------

--
-- Table structure for table `kayu`
--

CREATE TABLE `kayu` (
  `id` int(11) NOT NULL,
  `kd_kayu` varchar(20) NOT NULL,
  `kd_jenis` varchar(11) NOT NULL,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) DEFAULT 0.00,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kayu`
--

INSERT INTO `kayu` (`id`, `kd_kayu`, `kd_jenis`, `stok`, `kubikasi`, `keterangan`) VALUES
(11, 'LOGMRT01', 'MRT', 1250, 11668.50, 'Meranti merah'),
(12, 'LOGKR01', 'KR', 448, 7024.00, 'kayu kruing'),
(13, 'LOGMLP01', 'MLP', 133, 1890.00, 'kayu melapi'),
(14, 'LOGMSW03', 'MSW', 800, 14200.00, 'mersawa'),
(15, 'LOGDH10', 'DH', 275, 6300.00, 'stok awal');

-- --------------------------------------------------------

--
-- Table structure for table `kayu_masuk`
--

CREATE TABLE `kayu_masuk` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `jml_stok` int(20) NOT NULL,
  `jml_kubik` float(8,2) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kayu_masuk`
--

INSERT INTO `kayu_masuk` (`id`, `id_supplier`, `invoice`, `tgl`, `jml_stok`, `jml_kubik`, `keterangan`) VALUES
(8, 2, 'SBJ8292', '2020-01-08', 727, 11174.00, ''),
(9, 4, 'KAJR2768', '2020-01-23', 750, 13300.00, ''),
(10, 5, 'KTA8372', '2020-01-28', 750, 14400.00, '');

--
-- Triggers `kayu_masuk`
--
DELIMITER $$
CREATE TRIGGER `detail_kayu_delete` BEFORE DELETE ON `kayu_masuk` FOR EACH ROW BEGIN
	DELETE FROM dtl_kayu_masuk WHERE invoice=OLD.invoice;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nm_sup` varchar(100) NOT NULL,
  `sup` varchar(100) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nm_sup`, `sup`, `alamat`, `email`, `telp`, `keterangan`) VALUES
(1, 'PT. GCKA', 'bahan', 'jl. barito kuala', 'gckabanjarmasin@gmail.com', '234534', 'pabrik lem dan hardener'),
(2, 'PT. Sumber Berkat Jaya', 'kayu', 'Jl. Sudimara', 'gelora@gmail.com', '08748983', NULL),
(3, 'PT. Bogasari Flour Mills', 'bahan', 'jakarta', 'bogasari@gmail.com', '021554621', 'tepung'),
(4, 'PT. Kayu Ara Jaya Raya', 'kayu', 'kaltim', '', '', ''),
(5, 'PT. Kahayan Terang Abadi', 'kayu', '', '', '', ''),
(6, 'PT. Austral Byna', 'kayu', NULL, NULL, NULL, NULL),
(7, 'Japan Hydrazine Co. Inc', 'bahan', 'Jakarta', '', '', 'ADH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(18) DEFAULT NULL,
  `level` enum('admin','user','manager','supplier') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `username`, `password`, `nama`, `telp`, `level`) VALUES
(1, '0001', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Super Admin', '081212', 'admin'),
(2, '0002', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', '0811313', 'admin'),
(3, '0003', 'manager', 'manager', 'Manager', '082323', 'manager'),
(4, '0004', 'supplier', 'supplier', 'Supplier', '085252', 'supplier'),
(6, '1111', 'userbaru', '51b7613b184c2503b6c45670b6140661', 'User Baru', '085696', 'user'),
(7, '00051', 'testingedit', 'e7ac2d7371483b4d9abdc14339f5b29b', 'Testing Aja Edited 2', '08989', 'user'),
(8, '21246', 'testing2', 'a119e534072584a0ea88cdea4664aecd', 'Testing Aja 2', '357670', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `vinir`
--

CREATE TABLE `vinir` (
  `id` int(11) NOT NULL,
  `kd_jenis` varchar(11) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stok` int(20) NOT NULL DEFAULT 0,
  `kubikasi` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vinir`
--

INSERT INTO `vinir` (`id`, `kd_jenis`, `ukuran`, `stok`, `kubikasi`, `keterangan`) VALUES
(3, 'MLP', '0.7 mm x 945 x 1845', 100, 10.00, 'Stok awal'),
(4, 'MRT', '2.0 mm x 945 x 1845', 100, 10.00, 'Stok awal'),
(5, 'MSW', '2.5 mm x 945 x 1850', 10, 100.00, ''),
(6, 'DH', '1.0 mm x 1245 x 2445', 600, 1010.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `vinir_keluar`
--

CREATE TABLE `vinir_keluar` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `shift` varchar(10) NOT NULL,
  `tipe_glue` varchar(20) NOT NULL,
  `jml_stok` int(20) NOT NULL DEFAULT 0,
  `jml_kubikasi` float(8,2) NOT NULL DEFAULT 0.00,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vinir_keluar`
--

INSERT INTO `vinir_keluar` (`id`, `tgl`, `shift`, `tipe_glue`, `jml_stok`, `jml_kubikasi`, `keterangan`) VALUES
(1, '2020-01-01', '1', 'Type-1 Melamine', 5, 5.00, 'www'),
(2, '2020-01-30', '2', 'Type-1 Melamine', 73, 2324.00, ''),
(3, '2020-01-31', '1', 'Type-2 LFE', 220, 3943.61, '');

-- --------------------------------------------------------

--
-- Table structure for table `vinir_masuk`
--

CREATE TABLE `vinir_masuk` (
  `id` int(11) NOT NULL,
  `id_kayu` int(11) NOT NULL,
  `id_vinir` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `stok_masuk` int(20) NOT NULL DEFAULT 0,
  `kubik_masuk` float(8,2) NOT NULL DEFAULT 0.00,
  `kayu_log` int(20) NOT NULL DEFAULT 0,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vinir_masuk`
--

INSERT INTO `vinir_masuk` (`id`, `id_kayu`, `id_vinir`, `tgl`, `stok_masuk`, `kubik_masuk`, `kayu_log`, `keterangan`) VALUES
(4, 11, 3, '2019-12-21', 20, 850.00, 25, 'tesaaaa'),
(5, 13, 4, '2019-12-21', 800, 100.00, 10, 'vinir melapi face'),
(6, 13, 3, '2020-01-01', 1000, 789.00, 11, 'tetetes'),
(8, 15, 6, '2020-01-28', 500, 1000.00, 25, '');

--
-- Triggers `vinir_masuk`
--
DELIMITER $$
CREATE TRIGGER `delete_log_to_vinir` AFTER DELETE ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok+OLD.kayu_log, kubikasi=kubikasi+OLD.kubik_masuk
    WHERE id = OLD.id_kayu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_vinir_masuk` BEFORE INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE vinir SET stok=stok+NEW.stok_masuk, kubikasi=kubikasi+NEW.kubik_masuk
    WHERE id = NEW.id_vinir;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_to_vinir` AFTER INSERT ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=stok-NEW.kayu_log, kubikasi=kubikasi-NEW.kubik_masuk
    WHERE id = NEW.id_kayu;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_log_to_vinir` AFTER UPDATE ON `vinir_masuk` FOR EACH ROW BEGIN
	UPDATE kayu SET stok=(stok+OLD.kayu_log)-NEW.kayu_log, kubikasi=(kubikasi+OLD.kubik_masuk)-NEW.kubik_masuk
    WHERE id = NEW.id_kayu;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_bantu`
--
ALTER TABLE `bahan_bantu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `kd_bahan` (`kd_bahan`);

--
-- Indexes for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kd_bahan` (`id_bahan`);

--
-- Indexes for table `dtl_gluemix`
--
ALTER TABLE `dtl_gluemix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_gluemix` (`id_gluemix`);

--
-- Indexes for table `dtl_kayu_masuk`
--
ALTER TABLE `dtl_kayu_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`invoice`);

--
-- Indexes for table `dtl_vinir_keluar`
--
ALTER TABLE `dtl_vinir_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vinir_keluar` (`id_vinir`),
  ADD KEY `id_keluar` (`id_keluar`);

--
-- Indexes for table `gluemix`
--
ALTER TABLE `gluemix`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeniskayu`
--
ALTER TABLE `jeniskayu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kayu`
--
ALTER TABLE `kayu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`kd_jenis`);

--
-- Indexes for table `kayu_masuk`
--
ALTER TABLE `kayu_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinir`
--
ALTER TABLE `vinir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`kd_jenis`);

--
-- Indexes for table `vinir_keluar`
--
ALTER TABLE `vinir_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vinir_masuk`
--
ALTER TABLE `vinir_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kayu` (`id_kayu`),
  ADD KEY `id_vinir` (`id_vinir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_bantu`
--
ALTER TABLE `bahan_bantu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dtl_gluemix`
--
ALTER TABLE `dtl_gluemix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dtl_kayu_masuk`
--
ALTER TABLE `dtl_kayu_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dtl_vinir_keluar`
--
ALTER TABLE `dtl_vinir_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gluemix`
--
ALTER TABLE `gluemix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jeniskayu`
--
ALTER TABLE `jeniskayu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kayu`
--
ALTER TABLE `kayu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kayu_masuk`
--
ALTER TABLE `kayu_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vinir`
--
ALTER TABLE `vinir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vinir_keluar`
--
ALTER TABLE `vinir_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vinir_masuk`
--
ALTER TABLE `vinir_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
