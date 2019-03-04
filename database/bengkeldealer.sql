-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 09:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkeldealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bengkel`
--

CREATE TABLE `data_bengkel` (
  `kdbengkel` varchar(7) NOT NULL,
  `nmbengkel` varchar(50) NOT NULL,
  `jmlmontir` int(3) NOT NULL,
  `haribuka` varchar(50) NOT NULL,
  `jambuka` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kdpos` varchar(5) NOT NULL,
  `kabupaten` varchar(9) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(11) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_bengkel`
--

INSERT INTO `data_bengkel` (`kdbengkel`, `nmbengkel`, `jmlmontir`, `haribuka`, `jambuka`, `alamat`, `kelurahan`, `kecamatan`, `kdpos`, `kabupaten`, `telepon`, `latitude`, `longitude`, `foto`, `username`, `waktu`) VALUES
('BK0002', 'sajasjsak', 2147483647, 'dajdjsanj', 'asjadjjas', 'askjsadja', 'sjadajsdhs', 'Bantarbolang', '21313', 'Pemalang', '9389398', 'q989839893', '9989898', 'BK0002.jpg', 'admin', '2017-10-21 22:47:43'),
('BK0003', 'gadhags', 1331, '3131', '1331', '1313', '313131', 'Belik', '88617', 'Pemalang', '7675756', '98787', 'u676uy', 'BK0003.jpg', 'admin', '2017-10-26 06:35:36'),
('BK0004', 'Bangun Mas', 2, 'xzxzxz', 'xzxzxzxz', 'zxzxzx', 'xzxzxzx', 'Pulosari', '21244', 'Pemalang', '324567788798', 'trtretee', 'ererrre', 'BK0004.jpg', 'admin', '2017-10-31 19:38:19');

-- --------------------------------------------------------

--
-- Table structure for table `data_dealer`
--

CREATE TABLE `data_dealer` (
  `kddealer` varchar(8) NOT NULL,
  `nmdealer` varchar(50) NOT NULL,
  `merk` varchar(10) NOT NULL,
  `jmlkaryawan` varchar(3) NOT NULL,
  `haribuka` varchar(50) NOT NULL,
  `jambuka` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kelurahan` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kdpos` varchar(5) NOT NULL,
  `kabupaten` varchar(8) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `pelayanan` varchar(50) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `latitude` varchar(10) NOT NULL,
  `longitude` varchar(11) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `data_dealer`
--

INSERT INTO `data_dealer` (`kddealer`, `nmdealer`, `merk`, `jmlkaryawan`, `haribuka`, `jambuka`, `alamat`, `kelurahan`, `kecamatan`, `kdpos`, `kabupaten`, `telepon`, `pelayanan`, `fasilitas`, `latitude`, `longitude`, `foto`, `username`, `waktu`) VALUES
('DL0002', 'ASTRA PEMALANG', 'HONDA', '4', 'Senin-Sabtu', '08.00-17.00', 'Jl. Raya Iser petanjuangan', 'Petanjungan', 'Comal', '33333', 'Pemalang', '333', 'Bengkel,Suku Cadang', 'WIFI,Toilet', '3333333333', '42222222222', 'DL0002.JPG', 'admin', '2017-10-19 20:40:46'),
('DL0003', 'ASTRA PEMALANG', 'HONDA', '4', 'Senin-Sabtu', '08.00-17.00', 'Jl. Raya Iser petanjuangan', 'Petanjungan', 'Comal', '33333', 'Pemalang', '333', 'Bengkel,Suku Cadang', 'WIFI,Toilet', '3333333333', '42222222222', 'DL0003.JPG', 'admin', '2017-10-19 20:47:57'),
('DL0004', 'Yamaha Semakin dideapan', 'YAMAHA', '222', '2kjsahud', 'kajhasaj', 'akjashdjah', 'shajkhsaj', 'Bantarbolang', '31313', 'Pemalang', '5', 'Penjualan,Bengkel,Suku Cadang', 'TV,WIFI,Toilet,Koran,Kipas Angin,Permen,Angsuran di Tempat,Biro Jasa,Ruang Tunggu AC,Ruang Tunggu No', '2222666666', '33334444444', 'DL0004.JPG', 'admin', '2017-10-21 06:50:25'),
('DL0005', 'SANJAYA MOTOR', 'HONDA', '46', 'Senin-Sabtu', '08.30-16.30', 'Jl. Gatot Subroto Taman Pemalang', 'Taman', 'Pemalang', '44222', 'Pemalang', '7878787', 'Penjualan,Bengkel,Suku Cadang', 'TV,Toilet,Kipas Angin,Permen,Ruang Tunggu Non AC', '-7,6665554', '109,6767676', 'DL0005.JPG', 'admin', '2017-10-21 07:02:12'),
('DL0006', 'JGJHGH', 'SUZUKI', '6', 'GFYFYU', 'KHHHHIHI', 'JBIHIHI', 'JBKCYUDU', 'Belik', '97997', 'Pemalang', '646447', 'Penjualan,Bengkel', 'WIFI,Toilet,Koran,Kipas Angin,Ruang Tunggu AC', '676767', '77878', 'DL0006.jpg', 'admin', '2017-10-30 10:47:09'),
('DL0007', 'BENGKEL MOTOR', 'HONDA', '7', 'eeniaa', 'mdamd', 'amlad', '87878', 'Ulujami', '87767', 'Pemalang', '87677', 'Bengkel', 'Permen,Ruang Tunggu AC,Area Bermain Anak,Kursi Pijat,Cuci Motor Gratis', 'aaaa', 'iwuewhe', 'DL0007.jpg', 'admin', '2017-10-30 21:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Ripr Lutuk', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bengkel`
--
ALTER TABLE `data_bengkel`
  ADD PRIMARY KEY (`kdbengkel`);

--
-- Indexes for table `data_dealer`
--
ALTER TABLE `data_dealer`
  ADD PRIMARY KEY (`kddealer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
