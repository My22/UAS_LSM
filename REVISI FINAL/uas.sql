-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2014 at 11:26 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_type`, `username`, `hashed_password`) VALUES
(1, 1, 'admin', '$2y$10$YTk1ZmM5MTg1NDhlZWMxMOXfTY33LL9wkJRZMiB0bMZfpzO.kZhv.'),
(3, 1, 'suryanita', '$2y$10$MThkOWMzMTVjYjdhMjFlNubZrT/5rhi.Gv9gW7Q35K/nxJVZ1/1ye'),
(4, 2, 'mylton', '$2y$10$ODAyMTRjZjc4YzY4NzEwMOCoePPU0Ic/ohBkUyzNQIAplOeMN7amu');

-- --------------------------------------------------------

--
-- Table structure for table `account_type`
--

CREATE TABLE IF NOT EXISTS `account_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_type`
--

INSERT INTO `account_type` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `subject`, `email`, `message`) VALUES
(2, 'abcdefg', 'aaaa@gmail.net', 'aaaaaa aaaaaa sdfdskshdfjkhkjsdf ? asdfsdafsdafa\r\nasdfsd!!!!!										'),
(3, '0000', 'aaaa@gmail.net', 'lol\r\nasdfsd!!!!!										');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `file` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `visible`, `file`, `content`) VALUES
(1, 'Sekarang bisa cek pulsa & kuota di gadget Androidm', 1, 'gambar/kRDHqPre5eFnvFLt0DJajx2okzzAfviPyHpUDqFvLWaIawhOfU.JPG', 'Kini aplikasi mobile My BOLT! sudah bisa diunduh di Play Store dari gadget android. Dengan aplikasi mobile ini setiap saat kamu bisa cek pulsa & kuotamu, melakukan pembelian kuota atau bayar tagihan buat BOLT! pasca bayar, selain itu kamu juga bisa tahu info seperti cara pembelian isi pulsa via atm, riwayat pemakaian kuota dan info menarik lainnya. Jangan sampai salah unduh karena banyak juga aplikasi dengan nama serupa, pastikan hanya menggunakan aplikasi resmi My Bolt dari PT Internux.									'),
(3, 'Isi ulang pulsa BOLT! kamu via M-Saku', 1, 'gambar/En4nzmyVC3dbWUfvigoeHgHkao7JIYczt6Mg8nDxSSRKbnCaeV.png', '									'),
(8, 'BOLT! 4G Powerphone Cicilan 0%', 1, 'gambar/EzZ1rX6NUHnLSycgx2o3LevowpOPVoxVfhn0pjEf16idlqPaes.jpg', '									'),
(10, 'Ayo Isi Ulang Pulsa BOLT! Sekarang', 1, 'gambar/2BluHKiJ50Hhavhhy2CSZZTYoezYXy81i4axPOZ4l5bOIfc3dA.jpg', '																																						');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `paket` int(3) NOT NULL,
  `isi_paket` text NOT NULL,
  `gambar_1` text NOT NULL,
  `gambar_2` text NOT NULL,
  `harga` varchar(20) NOT NULL,
  `catatan_1` text NOT NULL,
  `catatan_2` text NOT NULL,
  `catatan_3` text NOT NULL,
  `catatan_4` text NOT NULL,
  `catatan_5` text NOT NULL,
  `catatan_6` text NOT NULL,
  `catatan_7` text NOT NULL,
  `catatan_8` text NOT NULL,
  `catatan_9` text NOT NULL,
  `catatan_10` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `paket`, `isi_paket`, `gambar_1`, `gambar_2`, `harga`, `catatan_1`, `catatan_2`, `catatan_3`, `catatan_4`, `catatan_5`, `catatan_6`, `catatan_7`, `catatan_8`, `catatan_9`, `catatan_10`) VALUES
(2, 'BOLT! Premium Unlimited Paket Mobile WiFi', 2, 'BOLT! Mobile WiFi ZTE MF90', 'gambar/c1JUDpcUvOzkPSggUfFV6DvvFcBRaTu5ZUw6OwGCuuNF4wIiIo.png', 'gambar/L7A00BDWGEapg9V389BlAiaMDg6O7TLpxqj1QndaWQG9ROcVy3.png', 'IDR 149.000 / Bulan', 'Unlimited Quota', 'FUP 20GB/bulan', 'Minimum berlangganan 12 bulan', '', '', '', '', '', '', ''),
(4, 'Thunder BOLT! 8GB Paket USB Modem', 1, 'BOLT! USB Modem ZTE MF825A', 'gambar/6sVDHmJ2agGSXL0GP3El4sdvGmYfREBH51GctASVa1koxYr06v.png', 'gambar/R7fDXrBgQV5iilnoeH3XEqi0WVlnBFdKLwDEiBMMI9zRJnefv7.png', 'IDR 199.000', '8GB untuk 30 hari', 'Download hingga 72 Mbps', 'Upload hingga 10 Mbps', '', '', '', '', '', '', ''),
(5, 'Thunder BOLT 8GB Paket Mobile WiFi', 1, 'BOLT! Mobile WiFi ZTE MF90', 'gambar/c1JUDpcUvOzkPSggUfFV6DvvFcBRaTu5ZUw6OwGCuuNF4wIiIo.png', 'gambar/R7fDXrBgQV5iilnoeH3XEqi0WVlnBFdKLwDEiBMMI9zRJnefv7.png', 'IDR 399.000', '8GB untuk 30 hari', 'Download hingga 72 Mbps', 'Upload hingga 10 Mbps', '', '', '', '', '', '', ''),
(6, 'Thunder BOLT! 8GB Paket Home Router', 1, 'BOLT! Home Router Huawei E5172', 'gambar/1YJ7GIZDaHgtOEAebbBCLNicua3ObMSFpyRlTKfKDuusU5ZOiF.png', 'gambar/R7fDXrBgQV5iilnoeH3XEqi0WVlnBFdKLwDEiBMMI9zRJnefv7.png', 'IDR 1.199.000', '8GB untuk 30 hari', 'Download hingga 72 Mbps', 'Upload hingga 10 Mbps', 'Berbagi hingga 32 perangkat', 'Masa aktif kartu hingga 365 hari', '', '', '', '', ''),
(7, 'BOLT! Premium Unlimited Paket USB Modem', 2, 'BOLT! USB Modem ZTE MF825A', 'gambar/6sVDHmJ2agGSXL0GP3El4sdvGmYfREBH51GctASVa1koxYr06v.png', 'gambar/L7A00BDWGEapg9V389BlAiaMDg6O7TLpxqj1QndaWQG9ROcVy3.png', 'IDR 149.000 / Bulan', 'Unlimited Quota', 'FUP 20GB/bulan', 'Minimum berlangganan 12 bulan', 'Download hingga 72 Mbps', 'Upload hingga 10 Mbps', 'WiFi Sharing', 'Untuk langganan wajib menggunakan Kartu Kredit', '', '', ''),
(8, 'BOLT! Premium Unlimited Paket Home Router', 2, 'BOLT! Home Router Huawei E5172', 'gambar/1YJ7GIZDaHgtOEAebbBCLNicua3ObMSFpyRlTKfKDuusU5ZOiF.png', 'gambar/L7A00BDWGEapg9V389BlAiaMDg6O7TLpxqj1QndaWQG9ROcVy3.png', 'IDR 249.000 / Bulan', 'Unlimited Quota', 'FUP 30GB/bulan', 'Minimum berlangganan 12 bulan', 'Download hingga 72 Mbps', 'Upload hingga 10 Mbps', 'Berbagi hingga 32 perangkat', 'Untuk langganan wajib menggunakan Kartu Kredit', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `store_type` int(3) NOT NULL,
  `alamat` text NOT NULL,
  `waktu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `name`, `website`, `store_type`, `alamat`, `waktu`) VALUES
(1, 'BOLT! Zone Plaza Semanggi', '', 1, '											Lantai 1 unit 007 ( Ruko Sebelah Okeshop )									', '10.00 - 21.00 WIB'),
(2, 'BOLT! Zone Kemang Village', 'abbabab', 1, '																						Lantai UG No. OD - 07 ( Area Avenue of the star )																		', '10.00 - 21.00 WIB'),
(3, 'OKE Shop      ', 'www.oke.com', 3, '																				', ''),
(8, 'BOLT! Zone Pluit Village', '', 1, 'Lantai 3 No. 37 - 38 ( Area Gadget Store )', '10.00 - 21.00 WIB'),
(9, 'BOLT! Zone Bogor', '', 1, 'Jl. Raya Padjajaran No. 89D ( Ruko Sebelah Raja Inn ), Bogor', '09.00 - 20.00 WIB'),
(11, 'Global Teleshop', 'www.globalteleshop.com', 2, '', ''),
(12, 'Hypermart', '', 2, '', ''),
(13, 'Toko PDA.com ', 'www.tokopda.com', 2, '', ''),
(14, 'Bhinneka', 'www.bhinneka.com', 3, '', ''),
(15, 'Dino Market', 'www.dinomarket.com', 3, '', ''),
(16, 'BOLT! Store Cideng', '', 4, 'Jl. Tanah Abang II No 87 B Jakarta Pusat', ''),
(17, 'BOLT! Store Tebet', '', 4, 'Jl. Tebet Raya No 38 B Jakarta Selatan', ''),
(19, 'BOLT! Store Kalimalang', '', 4, '											Jl. Raden Inten II No 85 Jakarta Timur									', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_type`
--

CREATE TABLE IF NOT EXISTS `store_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `type` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `store_type`
--

INSERT INTO `store_type` (`id`, `type`) VALUES
(1, 'zone'),
(2, 'channel'),
(3, 'online'),
(4, 'store');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
