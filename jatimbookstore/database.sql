-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2014 at 05:25 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jatimbookstore`
--
CREATE DATABASE IF NOT EXISTS `jatimbookstore` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jatimbookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3'),
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(100) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(100) NOT NULL,
  `isbn` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(200) NOT NULL,
  `stok` int(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kondisi` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `views` int(200) NOT NULL,
  `tgl` date NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_kategori`, `isbn`, `penulis`, `penerbit`, `nama`, `harga`, `stok`, `deskripsi`, `kondisi`, `gambar`, `views`, `tgl`) VALUES
(1, 2, 'ARRU130', 'Sanggar', 'Dyan', 'Wings - Sayap Peri', '35000', 23, 'Panduan A-Z ', 'Buku Baru', '1.jpg', 1, '2014-06-22'),
(2, 2, 'ARRU1302', 'Sanggar Karya', 'Lesmana', 'Kau, Aku dan Sepucuk Angpau Merah', '40000', 44, 'aurel benar-benar terpesona. ', 'Buku Bekas', '2.jpg', 12, '2014-06-22'),
(3, 3, 'ARRU1306', 'Sanggar Karya', 'Lesmono', 'Mengatasi Narkoba dengan Welas Asih (Bonus DVD)', '50000', 55, 'Alih-alih melewatkan musim panas di Manhattan, ', 'Buku Bekas', '3.jpg', 35, '2014-06-22'),
(4, 4, 'ARRU1302', 'Karya', 'Lajimin', 'Musim Panas di Danau Willow', '35000', -15, '"Dalam hidup ini tidak ada yang perlu kita takuti, kita hanya perlu memahami." \r\n', 'Buku Baru', '4.jpg', 31, '2014-06-22'),
(5, 2, 'ARRU1306', 'Sanggar Karya', 'Paijo', 'Kesempatan yang Kedua', '12000', 10, '"Dalam hidup ini tidak ada yang perlu kita takuti, kita hanya perlu memahami." ', 'Buku Baru', '5.jpg', 12, '2014-06-22'),
(12, 2, '1', '1', '1', 'buku 1', '1', -11, '1', '1', 'Penguins.jpg', 40, '2014-06-22'),
(13, 1, '12345', '12345', '12345', 'buku 2', '12345', 12345, '12345', '12345', 'ajax-logo1.jpg', 40, '2014-06-22'),
(23, 1, '7654321', '7654321', '7654321', 'buku 3', '7654321', 7654321, '7654321', '7654321', 'Lighthouse.jpg', 35, '2014-06-22'),
(24, 2, '11111', 'sadf', 'sadf', 'buku 14', '111', 111, 'asdasd', 'sadfsadf', 'Lighthouse.jpg', 48, '2014-06-22'),
(25, 4, '32', 'sad', 'asdf', 'buku 15', '12', 23, 'sadf', 'asdfasfd', 'Penguins.jpg', 10, '2014-06-22'),
(26, 4, 'safd', 'asdf', 'sadf', 'buku 16', 'asd', 0, 'sdaf', 'asf', 'Penguins.jpg', 2, '2014-06-22'),
(27, 2, 'asdf', 'sadf', 'dsaf', 'buku 8', 'sad', 0, 'asdfdsafa', 'asasdf', 'Tulips.jpg', 6, '2014-06-22'),
(28, 2, '', 'Jarot', 'Santra', 'buku 9', '', 0, '', 'baru', '', 0, '2014-06-22'),
(29, 2, '', '', '', '', '', 0, '', '', '', 0, '2014-06-22'),
(30, 1, '', 'jarot', 'santra', 'buku 11', '', 0, '', '', 'IMG_20140224_150343.jpg', 2, '2014-06-22'),
(6, 1, '432', 'as', 'ads', 'buku 10', '23', 0, 'sadfsdafsd', 'asdf', 'Tulips.jpg', 0, '2014-06-22'),
(7, 1, '1234', 'asd', 'adsfsadf', 'buku 7', '32', -10, 'sadfasdf', 'asdf', 'Tulips.jpg', 38, '2014-06-22'),
(21, 1, '123456', '123456', '123456', 'buku 6', '123456', 123456, '123456', '123456', 'rahmat-gepeng-kartun_otot-kawat-balung-wesi_ayo-semangat-gek-golek-rejeki.jpg', 0, '2014-06-22'),
(11, 4, '22', '22', '22', 'buku 12', '2222', 222, '222', '22', 'Chrysanthemum.jpg', 0, '2014-06-22'),
(31, 1, '12', 'tetete', '332', 'buku 13', '3232', 33, 'test', 'test', 'ADN-IVR.PNG', 0, '2014-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id_berita` int(100) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `isi` text NOT NULL,
  `tgl` date NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `views` int(100) NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul`, `isi`, `tgl`, `gambar`, `views`) VALUES
(1, 'Judul1Judul1Judul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2014-05-18', 'avatar.png', 0),
(2, 'Judul2Judul1Judul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2014-05-18', 'avatar.png', 0),
(3, 'Judul3Judul1Judul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2014-05-18', 'avatar.png', 2),
(4, 'Judul4Judul1Judul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2014-05-18', 'avatar.png', 4),
(5, 'Judul5Judul1Judul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2014-05-18', '1234.gif', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_tmp`
--

CREATE TABLE IF NOT EXISTS `tb_det_tmp` (
  `id_det_tmp` int(100) NOT NULL AUTO_INCREMENT,
  `id_trans` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  PRIMARY KEY (`id_det_tmp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tb_det_tmp`
--

INSERT INTO `tb_det_tmp` (`id_det_tmp`, `id_trans`, `id_barang`) VALUES
(1, 15, 15),
(2, 17, 6),
(3, 18, 7),
(22, 32, 21),
(5, 19, 9),
(24, 33, 23),
(7, 20, 11),
(8, 20, 1),
(9, 20, 2),
(10, 20, 3),
(11, 20, 4),
(12, 20, 5),
(13, 23, 12),
(14, 23, 13),
(28, 39, 27),
(27, 39, 26),
(26, 35, 25),
(25, 34, 24),
(29, 59, 28),
(30, 59, 29),
(31, 60, 30),
(32, 63, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_det_trans`
--

CREATE TABLE IF NOT EXISTS `tb_det_trans` (
  `id_det_trans` int(100) NOT NULL AUTO_INCREMENT,
  `id_trans` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  PRIMARY KEY (`id_det_trans`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `tb_det_trans`
--

INSERT INTO `tb_det_trans` (`id_det_trans`, `id_trans`, `id_barang`, `jumlah`) VALUES
(1, 0, 4, 2),
(2, 0, 3, 3),
(3, 2, 4, 3),
(4, 2, 3, 3),
(5, 3, 4, 3),
(6, 3, 3, 3),
(7, 3, 1, 2),
(8, 4, 4, 3),
(9, 6, 4, 2),
(10, 6, 3, 1),
(11, 7, 5, 1),
(12, 7, 4, 2),
(13, 8, 5, 1),
(14, 8, 4, 2),
(15, 9, 4, 2),
(16, 9, 3, 1),
(17, 10, 4, 2),
(18, 12, 3, 5),
(19, 21, 2, 1),
(20, 21, 3, 1),
(21, 22, 5, 3),
(22, 31, 7, 2),
(23, 36, 13, 3),
(24, 38, 12, 1),
(25, 40, 13, 3),
(26, 40, 12, 5),
(27, 41, 13, 4),
(28, 41, 12, 2),
(29, 42, 13, 3),
(30, 42, 12, 2),
(31, 42, 25, 12),
(32, 43, 13, 3),
(33, 43, 12, 2),
(34, 43, 25, 12),
(35, 44, 13, 5),
(36, 44, 12, 2),
(37, 44, 25, 12),
(38, 45, 13, 5),
(39, 45, 12, 2),
(40, 45, 25, 12),
(41, 46, 13, 5),
(42, 46, 12, 2),
(43, 46, 25, 12),
(44, 48, 13, 2),
(45, 49, 13, 1),
(46, 50, 12, 3),
(47, 50, 13, 2),
(48, 51, 12, 1),
(49, 52, 7, 1),
(50, 53, 7, 2),
(51, 53, 13, 1),
(52, 53, 12, 1),
(53, 54, 24, 2),
(54, 55, 13, 1),
(55, 55, 12, 1),
(56, 56, 12, 2),
(57, 56, 13, 1),
(58, 57, 12, 12),
(59, 57, 13, 25),
(60, 57, 7, 6),
(61, 58, 7, 1),
(62, 58, 12, 2),
(63, 61, 7, 12),
(64, 62, 7, 12),
(65, 62, 26, 2),
(66, 62, 24, 3),
(67, 62, 23, 1),
(68, 62, 25, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `id_kategori` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama`) VALUES
(1, 'Buku Anak'),
(2, 'Buku Remaja'),
(3, 'Fiksi'),
(4, 'Non Fiksi'),
(5, 'semangat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE IF NOT EXISTS `tb_komentar` (
  `id_komentar` int(100) NOT NULL AUTO_INCREMENT,
  `id_barang` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `komentar` text NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_barang`, `id_user`, `komentar`, `tgl`) VALUES
(1, 4, 1, 'asdf', '2014-06-10 21:17:15'),
(13, 7, 1, 'asfda', '2014-06-10 09:41:07'),
(4, 3, 1, 'asdfdsa', '2014-06-10 21:24:40'),
(15, 25, 1, 'asdf', '2014-06-10 14:12:54'),
(14, 23, 2, 'hehee', '2014-06-10 10:56:12'),
(16, 23, 1, 'saya', '2014-06-10 09:48:26'),
(10, 2, 3, 'selamat', '2014-06-10 10:55:18'),
(17, 24, 1, '....semangatsemangatsemangat', '2014-06-10 09:53:12'),
(12, 10, 1, 'asfasd', '2014-06-10 14:54:16'),
(18, 24, 1, 'asdfadsf', '2014-06-10 09:55:29'),
(19, 25, 1, 'safdfdsafdsafdsafdsafdasafdsdssafd', '2014-06-10 12:25:31'),
(20, 25, 1, 'dfghjkl', '2014-06-10 16:40:41'),
(21, 13, 1, 'asdf', '2014-06-10 17:47:40'),
(22, 27, 1, 'yttr', '2014-06-10 11:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pm`
--

CREATE TABLE IF NOT EXISTS `tb_pm` (
  `id_pm` int(199) NOT NULL AUTO_INCREMENT,
  `id_user` int(100) NOT NULL,
  `id_pengirim` int(100) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pesan` text NOT NULL,
  `tgl` datetime NOT NULL,
  PRIMARY KEY (`id_pm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_pm`
--

INSERT INTO `tb_pm` (`id_pm`, `id_user`, `id_pengirim`, `judul`, `pesan`, `tgl`) VALUES
(1, 1, 1, 'asdfasdf', 'asdfasdfasdf', '2014-05-19 22:57:15'),
(2, 2, 3, 'Coba', 'Lorem ipsum', '2014-05-20 10:54:40'),
(3, 1, 3, 'saya', 'saya', '2014-05-20 10:55:33'),
(4, 1, 1, 'jarot', 'jarot esadfdsaf', '2014-05-20 11:11:49'),
(5, 1, 1, 'sdfa', 'sadfasdfsadfsadfdsaf', '2014-05-20 11:12:24'),
(6, 1, 2, 'asfd', 'sadfsdafdsaf', '2014-05-22 09:41:34'),
(7, 1, 2, 'asdf', 'sadf', '2014-05-22 14:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stat`
--

CREATE TABLE IF NOT EXISTS `tb_stat` (
  `stat` int(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_trans` int(100) NOT NULL AUTO_INCREMENT,
  `id_user` int(100) NOT NULL,
  `tipe_trans` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `nama_bank` varchar(200) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_rek` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `tgl_trans` date NOT NULL,
  PRIMARY KEY (`id_trans`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_trans`, `id_user`, `tipe_trans`, `status`, `nama_bank`, `atas_nama`, `no_rek`, `keterangan`, `tgl_pembayaran`, `tgl_trans`) VALUES
(1, 0, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(2, 0, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(3, 1, 'pembelian', 'selesai', 'BNI', 'Jarot', '8947t62389', 'Silahkan', '2012-05-20', '2014-06-22'),
(4, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(5, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(6, 1, 'pembelian', 'selesai', 'asdf', 'sadf', 'sadf', 'adsf', '2012-05-22', '2014-06-22'),
(7, 3, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(8, 3, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(9, 1, 'pembelian', 'selesai', 'asdf', 'asd', 'asdf', 'sadf', '2012-05-22', '2014-06-22'),
(10, 1, 'pembelian', 'selesai', 'sadf', 'asdf', 'asdf', 'sadf', '2012-05-22', '2014-06-22'),
(11, 1, 'penjualan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(12, 1, 'pembelian', 'batal', 'asfd', 'asdf', '232', 'sadfdsaf', '2012-05-22', '2014-06-22'),
(13, 1, 'pemesanan', 'batal', '', '', '', '', '0000-00-00', '2014-06-22'),
(14, 1, 'pemesanan', 'batal', '', '', '', '', '0000-00-00', '2014-06-22'),
(15, 1, 'penjualan', 'batal', '', '', '', '', '0000-00-00', '2014-06-22'),
(16, 1, 'penjualan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(17, 1, 'penjualan', 'batal', '', '', '', '', '0000-00-00', '2014-06-22'),
(18, 1, 'penjualan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(31, 1, 'pembelian', 'batal', 'bni', 'eko', '0987655', 'sudah membayar', '2012-05-22', '2014-06-22'),
(21, 1, 'pembelian', 'selesai', 'A', 'a', '324', 'sadfdsfa', '2012-05-22', '2014-06-22'),
(22, 1, 'pembelian', 'selesai', 'asdf', 'asdf', 'asdf', 'sadfdsfa', '2012-05-22', '2014-06-22'),
(23, 2, 'pemesanan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(34, 1, 'pemesanan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(33, 2, 'penjualan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(35, 0, 'pengadaan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(36, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(37, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(38, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(39, 1, 'penjualan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(40, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(41, 1, 'pembelian', 'batal', 'sadf', 'asdf', '2332', 'asdfsadf', '2012-05-27', '2014-06-22'),
(42, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(43, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(44, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(45, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(46, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(47, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(48, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(49, 1, 'pembelian', 'sudah', 'sdgf', 'sadffsdafdsa', '32', 'dssdf', '2012-05-27', '2014-06-22'),
(50, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(51, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(52, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(53, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(54, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(55, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(56, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(57, 7, 'pembelian', 'selesai', 'BCA', 'rahmat', '123456', 'lunas', '2012-06-05', '2014-06-22'),
(58, 7, 'pembelian', 'selesai', 'BCA', 'rahmat', '943847583', 'tes', '2012-06-05', '2014-06-22'),
(59, 0, 'pemesanan', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(60, 7, 'pemesanan', 'selesai', '', '', '', '', '0000-00-00', '2014-06-22'),
(61, 1, 'pembelian', 'belum', '', '', '', '', '0000-00-00', '2014-06-22'),
(62, 1, 'pembelian', 'selesai', 'test', 'test', '33223', 'test e t ete t', '2013-09-29', '2014-06-22'),
(63, 1, 'penjualan', 'belum', '', '', '', '', '0000-00-00', '2014-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` int(200) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `alamat`, `provinsi`, `kota`, `negara`, `username`, `password`, `telp`, `email`, `keterangan`, `tgl_masuk`) VALUES
(1, 'Jarot Eko Saputra', 'Jl. Anusopati', 'Jawa Timur', 'Malang', 'Indonesia', 'jarot', 'b866086860fd1d2f7bbced23688df96b', 2147483647, 'jaroteko18@gmail.com', 'Silahkan anda yg menilai', '2014-06-22'),
(2, 'Doil', 'doil alamat', 'doil prov', 'doil kot', 'doil neg', 'doil', '11c886850f411a43e6e6cef586372202', 93483, 'doil gmail', 'doil', '2014-06-22'),
(3, 'septian', 'Jl. septian', 'Jawa Timur', 'Malang', 'Indonesia', 'septian', '5b3bb3e5458e02aa356f2fc671ae08d9', 239487, 'septian@gmail.com', 'septian', '2014-06-22'),
(5, 'sdfasf', '', '', '', '', 'safd', '75ee80b061a3f1f174ac371697684906', 0, '', '', '2014-06-22'),
(6, 'sadfdsaf', '', '', '', '', 'sadffdsa', '3851423b9fdfac47e5c017f45f3c3e4a', 0, '', '', '2014-06-22'),
(7, 'rahmat', 'sawojajar', 'jawa timur', 'malang', 'indonesia', 'erdeje', '017d74a346d5423388f860718494cc24', 811353595, 'erdeje@yahoo.com', 'tes', '2014-06-22'),
(8, 'jarot', 'jarot@gmail.com', '32jk', 'k', 'jk', 'jarot', 'b866086860fd1d2f7bbced23688df96b', 3232, 'jarot@gmail.com', 'dsfasdf', '2014-06-22'),
(9, 'a', 'es', 'ffd', 'dfr', 'gfg', '', 'd41d8cd98f00b204e9800998ecf8427e', 0, '', '', '2014-06-22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
