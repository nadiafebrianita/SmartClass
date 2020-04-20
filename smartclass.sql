-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 12:15 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_prodi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `id_prodi`) VALUES
(2, 'nadiafebrianita1', '6001a0de0064b1cc59ef8c1d7b7c09cc', 1),
(5, 'nadiaa', '3ada3aa8c1475459a4f5e532436eded5', 2),
(7, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 0),
(10, 'industri1', 'be71d66c0d8f9c5d6f43aa6078fd3435', 2),
(13, 'tekkom1', '56abe31ad7a889c8f3e43dfb6d902761', 1);

-- --------------------------------------------------------

--
-- Table structure for table `att_log`
--

CREATE TABLE `att_log` (
  `sn` varchar(30) NOT NULL,
  `scan_date` datetime NOT NULL,
  `pin` int(255) NOT NULL,
  `verifymode` int(11) NOT NULL,
  `inoutmode` int(11) NOT NULL DEFAULT 0,
  `device_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `att_log`
--

INSERT INTO `att_log` (`sn`, `scan_date`, `pin`, `verifymode`, `inoutmode`, `device_ip`) VALUES
('66595019130181', '2019-11-06 09:30:00', 5, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-06 09:30:00', 129, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 07:00:01', 24, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 07:00:01', 111, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 07:00:01', 112, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 08:41:21', 20, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 08:47:21', 9, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-07 08:47:21', 111, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-14 07:00:01', 24, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-14 07:00:01', 111, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-14 08:41:21', 20, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-14 08:47:21', 9, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-15 12:53:21', 2, 1, 1, '192.168.1.10'),
('66595019130181', '2019-11-15 12:55:21', 2, 1, 1, '192.168.1.10');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(255) NOT NULL,
  `id_scan` int(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_scan`, `nama_dosen`, `nip`, `nidn`) VALUES
(2, 1, 'Agung Budi Prasetijo, ST, M.IT, Ph.D', '197105061995121001', '987'),
(4, 2, 'Eko Didik Widianto, ST, MT', '197705262010121001', '123'),
(5, 3, 'Adian Fatchur Rochim, ST, MT', '197302261998021001', '789'),
(6, 4, 'Ike Pertiwi, ST, MT', '198412062010122008', '23'),
(7, 5, 'Ir. Kodrat IS, MT', '196310281993031002', '1111'),
(8, 6, 'Kurniawan Teguh Martono, ST, MT', '198303192010121002', '2455'),
(9, 7, 'Dr. Oky Dwi Nurhayati, ST, MT', '197910022009122001', '986'),
(15, 16, 'Dr. R. Rizal Isnanto, MM. MT', '197007272000121001', '2222'),
(16, 17, 'Sukiswo, ST, MT', '196907141997021001', '123'),
(17, 18, 'Yuli Christyono, ST, MT', '196807111997021001', '1'),
(18, 19, 'Adnan Fauzi, ST, M.Kom', 'H.7.198101272018071001', '1'),
(19, 20, 'Dania Eridani, ST, M.Eng', '198910132015042002', '1'),
(20, 21, 'Yudi Eko Windarto, ST, M.Kom', 'H.7.198906042018071001', '1'),
(21, 22, 'Risma Septiana, ST, M.Eng', 'H.7.1988909122018072001', '1'),
(22, 23, 'Kuntoro Adi Nugroho, ST, M.Eng', 'H.7.199109042018071001', '1'),
(23, 24, 'Dr. Eng. Udi Harmoko, S.Si, M.Si', '1', '1'),
(24, 25, 'Dra. Kusrahayuwati, M.A', '1', '1'),
(25, 26, 'Bambang Irawanto, S.Si, M.Si', '736485', '927481'),
(26, 27, 'Drs. Slamet Subekti, M.Hum', '1', '1'),
(27, 28, 'Sumardi, ST, MT', '1', '1'),
(28, 29, 'Drs. Suharyo, M.Hum', '1', '1'),
(29, 30, 'Mas\'ut, S.Ag, M.Si', '1', '1'),
(30, 31, 'Drs. YD Sumanto , M.Si', '1', '1'),
(31, 32, 'Zaenul Muhlisin, S.Si, M.Si', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(255) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `singkat` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `singkat`) VALUES
(1, 'Teknik', 'FT'),
(2, 'Sains dan Matematika', 'FSM'),
(3, 'Hukum', 'FH');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `waktu` time NOT NULL,
  `akhir` time NOT NULL,
  `id_matkul` int(255) NOT NULL,
  `id_dosen` int(255) NOT NULL,
  `id_dosen2` int(11) DEFAULT NULL,
  `id_kls` int(255) NOT NULL,
  `id_smt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `waktu`, `akhir`, `id_matkul`, `id_dosen`, `id_dosen2`, `id_kls`, `id_smt`) VALUES
(1, 'Monday', '07:00:00', '08:40:00', 1, 2, 22, 5, 1),
(2, 'Monday', '08:40:00', '10:20:00', 2, 5, 18, 5, 1),
(4, 'Monday', '07:00:00', '09:30:00', 8, 9, 4, 4, 1),
(5, 'Monday', '07:00:00', '08:40:00', 15, 6, NULL, 1, 1),
(8, 'Tuesday', '08:40:00', '10:20:00', 22, 2, 21, 1, 1),
(9, 'Monday', '10:20:00', '12:00:00', 14, 6, NULL, 1, 1),
(11, 'Monday', '09:30:00', '12:00:00', 9, 9, NULL, 4, 1),
(12, 'Monday', '08:40:00', '10:20:00', 16, 19, NULL, 1, 1),
(13, 'Monday', '12:00:00', '13:40:00', 5, 5, 4, 5, 1),
(14, 'Monday', '12:00:00', '13:40:00', 10, 16, 20, 4, 1),
(15, 'Monday', '12:00:00', '13:40:00', 19, 8, NULL, 1, 1),
(16, 'Monday', '13:40:00', '15:20:00', 6, 5, 4, 5, 1),
(17, 'Monday', '13:40:00', '15:20:00', 11, 2, 20, 4, 1),
(18, 'Monday', '13:40:00', '15:20:00', 18, 8, NULL, 1, 1),
(19, 'Monday', '15:20:00', '17:00:00', 20, 24, NULL, 1, 1),
(20, 'Monday', '15:20:00', '17:00:00', 12, 7, NULL, 4, 1),
(21, 'Monday', '15:20:00', '17:00:00', 7, 23, 31, 5, 1),
(22, 'Tuesday', '07:00:00', '08:40:00', 27, 15, 22, 4, 1),
(23, 'Tuesday', '07:00:00', '08:40:00', 29, 15, 20, 5, 1),
(24, 'Tuesday', '07:00:00', '08:40:00', 47, 25, 32, 1, 1),
(25, 'Wednesday', '07:00:00', '08:40:00', 31, 7, 21, 1, 1),
(26, 'Tuesday', '08:40:00', '10:20:00', 33, 19, NULL, 4, 1),
(27, 'Tuesday', '08:40:00', '10:20:00', 35, 2, 18, 5, 1),
(28, 'Tuesday', '10:20:00', '12:00:00', 28, 15, 22, 4, 1),
(29, 'Tuesday', '10:20:00', '12:00:00', 30, 15, 20, 5, 1),
(30, 'Tuesday', '10:20:00', '12:00:00', 58, 26, NULL, 1, 1),
(31, 'Tuesday', '12:00:00', '13:40:00', 24, 8, NULL, 4, 1),
(32, 'Tuesday', '12:00:00', '13:40:00', 13, 7, NULL, 5, 1),
(33, 'Tuesday', '12:00:00', '13:40:00', 42, 24, NULL, 1, 1),
(34, 'Tuesday', '13:40:00', '15:20:00', 25, 8, NULL, 4, 1),
(35, 'Tuesday', '13:40:00', '15:20:00', 61, 27, 4, 5, 1),
(36, 'Tuesday', '13:40:00', '15:20:00', 41, 2, 21, 1, 1),
(37, 'Tuesday', '15:20:00', '17:00:00', 60, 7, 18, 4, 1),
(38, 'Tuesday', '15:20:00', '17:00:00', 39, 15, NULL, 5, 1),
(40, 'Wednesday', '07:00:00', '08:40:00', 44, 5, NULL, 5, 1),
(41, 'Wednesday', '07:00:00', '08:40:00', 40, 15, NULL, 5, 1),
(42, 'Wednesday', '07:00:00', '09:30:00', 46, 9, NULL, 4, 1),
(43, 'Wednesday', '08:40:00', '10:20:00', 47, 17, NULL, 5, 1),
(44, 'Wednesday', '08:40:00', '10:20:00', 17, 19, NULL, 5, 1),
(46, 'Wednesday', '12:00:00', '13:40:00', 48, 25, 32, 1, 1),
(47, 'Wednesday', '10:20:00', '12:00:00', 50, 2, NULL, 5, 1),
(48, 'Wednesday', '09:30:00', '11:10:00', 49, 9, NULL, 4, 1),
(50, 'Wednesday', '12:00:00', '13:40:00', 45, 5, 18, 5, 1),
(51, 'Wednesday', '12:50:00', '15:20:00', 54, 9, 22, 4, 1),
(52, 'Wednesday', '13:40:00', '15:20:00', 55, 2, 4, 5, 1),
(53, 'Monday', '10:20:00', '12:00:00', 4, 2, 20, 5, 1),
(54, 'Wednesday', '13:40:00', '15:20:00', 56, 8, 21, 1, 1),
(55, 'Wednesday', '08:40:00', '10:20:00', 59, 26, NULL, 1, 1),
(56, 'Wednesday', '15:20:00', '17:00:00', 21, 2, 4, 5, 1),
(57, 'Wednesday', '15:20:00', '17:00:00', 57, 8, 21, 1, 1),
(91, 'Tuesday', '15:20:00', '17:00:00', 52, 28, NULL, 1, 1),
(92, 'Wednesday', '11:10:00', '12:50:00', 43, 7, NULL, 4, 1),
(93, 'Wednesday', '10:20:00', '12:00:00', 63, 29, NULL, 1, 1),
(94, 'Wednesday', '15:20:00', '17:00:00', 23, 16, 20, 4, 1),
(95, 'Thursday', '07:00:00', '08:40:00', 37, 23, 31, 1, 1),
(96, 'Thursday', '07:00:00', '09:30:00', 67, 5, 6, 4, 1),
(97, 'Thursday', '07:00:00', '08:40:00', 65, 25, 32, 5, 1),
(98, 'Thursday', '08:40:00', '10:20:00', 68, 19, NULL, 5, 1),
(99, 'Thursday', '09:30:00', '11:10:00', 73, 15, NULL, 4, 1),
(100, 'Thursday', '08:40:00', '10:20:00', 32, 7, 21, 1, 1),
(101, 'Thursday', '10:20:00', '12:00:00', 36, 2, 18, 1, 1),
(102, 'Thursday', '10:20:00', '12:00:00', 34, 19, NULL, 5, 1),
(103, 'Thursday', '11:10:00', '13:40:00', 72, 30, NULL, 4, 1),
(104, 'Thursday', '12:00:00', '13:40:00', 51, 2, NULL, 5, 1),
(105, 'Thursday', '12:00:00', '13:40:00', 53, 28, NULL, 1, 1),
(106, 'Thursday', '13:40:00', '15:20:00', 69, 5, 22, 5, 1),
(107, 'Thursday', '13:40:00', '15:20:00', 74, 15, NULL, 4, 1),
(108, 'Thursday', '13:40:00', '15:20:00', 78, 4, NULL, 1, 1),
(109, 'Thursday', '15:20:00', '17:00:00', 70, 5, 22, 5, 1),
(110, 'Thursday', '15:20:00', '17:50:00', 66, 5, 6, 4, 1),
(116, 'Thursday', '15:20:00', '17:00:00', 77, 4, NULL, 1, 1),
(117, 'Friday', '07:00:00', '09:30:00', 71, 30, NULL, 5, 1),
(118, 'Friday', '07:00:00', '08:40:00', 75, 4, NULL, 4, 1),
(119, 'Friday', '07:00:00', '08:40:00', 38, 23, 31, 1, 1),
(120, 'Friday', '08:40:00', '10:20:00', 76, 16, NULL, 4, 1),
(121, 'Friday', '08:40:00', '10:20:00', 64, 29, NULL, 1, 1),
(122, 'Friday', '12:50:00', '14:30:00', 79, 4, NULL, 1, 1),
(123, 'Friday', '14:30:00', '16:10:00', 62, 27, 4, 1, 1),
(1055, 'Monday', '07:00:00', '08:00:00', 40, 15, 6, 1, 1),
(1057, 'Tuesday', '08:00:00', '09:00:00', 75, 4, NULL, 4, 1),
(1058, 'Monday', '07:00:00', '08:00:00', 97, 27, NULL, 1, 1),
(1069, 'Wednesday', '09:00:00', '10:00:00', 99, 7, NULL, 8, 1),
(1072, 'Monday', '06:00:00', '06:30:00', 75, 4, NULL, 4, 1),
(1076, 'Friday', '19:00:00', '20:00:00', 104, 9, NULL, 4, 1),
(1253, 'Monday', '06:00:00', '06:30:00', 75, 4, NULL, 4, 9),
(1254, 'Monday', '07:00:00', '09:30:00', 8, 9, NULL, 4, 9),
(1255, 'Monday', '07:00:00', '08:40:00', 1, 2, 22, 5, 9),
(1256, 'Monday', '07:00:00', '08:00:00', 40, 15, 6, 1, 9),
(1257, 'Monday', '08:40:00', '10:20:00', 16, 19, NULL, 1, 9),
(1258, 'Monday', '10:20:00', '12:00:00', 4, 2, 20, 5, 9),
(1259, 'Monday', '12:00:00', '13:40:00', 10, 16, 20, 4, 9),
(1260, 'Monday', '12:00:00', '13:40:00', 19, 8, NULL, 1, 9),
(1261, 'Monday', '13:40:00', '15:20:00', 6, 5, 4, 5, 9),
(1262, 'Monday', '15:20:00', '17:00:00', 12, 7, NULL, 4, 9),
(1263, 'Monday', '15:20:00', '17:00:00', 20, 24, NULL, 1, 9),
(1264, 'Tuesday', '07:00:00', '08:40:00', 27, 15, 22, 4, 9),
(1265, 'Tuesday', '07:00:00', '08:40:00', 29, 15, 20, 5, 9),
(1266, 'Tuesday', '07:00:00', '08:40:00', 47, 25, 32, 1, 9),
(1267, 'Tuesday', '10:20:00', '12:00:00', 28, 15, 22, 4, 9),
(1268, 'Tuesday', '10:20:00', '12:00:00', 30, 15, 20, 5, 9),
(1269, 'Tuesday', '10:20:00', '12:00:00', 58, 26, NULL, 1, 9),
(1270, 'Tuesday', '13:40:00', '15:20:00', 25, 8, NULL, 4, 9),
(1271, 'Tuesday', '13:40:00', '15:20:00', 61, 27, 4, 5, 9),
(1272, 'Tuesday', '13:40:00', '15:20:00', 41, 2, 21, 1, 9),
(1273, 'Wednesday', '07:00:00', '09:30:00', 46, 9, NULL, 4, 9),
(1274, 'Wednesday', '07:00:00', '08:40:00', 44, 5, NULL, 5, 9),
(1275, 'Wednesday', '07:00:00', '08:40:00', 31, 7, 21, 1, 9),
(1277, 'Wednesday', '10:20:00', '12:00:00', 50, 2, NULL, 5, 9),
(1278, 'Wednesday', '10:20:00', '12:00:00', 63, 29, NULL, 1, 9),
(1279, 'Wednesday', '11:10:00', '12:50:00', 43, 7, NULL, 4, 9),
(1280, 'Wednesday', '13:40:00', '15:20:00', 55, 2, 4, 5, 9),
(1281, 'Wednesday', '13:40:00', '15:20:00', 56, 8, 21, 1, 9),
(1282, 'Wednesday', '15:20:00', '17:00:00', 23, 16, 20, 4, 9),
(1283, 'Thursday', '07:00:00', '09:30:00', 67, 5, 6, 4, 9),
(1284, 'Thursday', '07:00:00', '08:40:00', 65, 25, 32, 5, 9),
(1285, 'Thursday', '07:00:00', '08:40:00', 37, 23, 31, 1, 9),
(1286, 'Thursday', '10:20:00', '12:00:00', 34, 19, NULL, 5, 9),
(1287, 'Thursday', '10:20:00', '12:00:00', 36, 2, 18, 1, 9),
(1288, 'Thursday', '11:10:00', '13:40:00', 72, 30, NULL, 4, 9),
(1289, 'Thursday', '13:40:00', '15:20:00', 69, 5, 22, 5, 9),
(1290, 'Thursday', '13:40:00', '15:20:00', 78, 4, NULL, 1, 9),
(1291, 'Thursday', '15:20:00', '17:50:00', 66, 5, 6, 4, 9),
(1292, 'Friday', '07:00:00', '08:40:00', 75, 4, NULL, 4, 9),
(1293, 'Friday', '07:00:00', '09:30:00', 71, 30, NULL, 5, 9),
(1294, 'Friday', '07:00:00', '08:40:00', 38, 23, 31, 1, 9),
(1295, 'Friday', '12:50:00', '14:30:00', 79, 4, NULL, 1, 9),
(1297, 'Monday', '05:00:00', '05:30:00', 99, 9, NULL, 1, 9),
(1299, 'Wednesday', '09:00:00', '10:00:00', 99, 7, NULL, 8, 9),
(1300, 'Friday', '19:00:00', '20:00:00', 104, 9, NULL, 4, 9),
(1349, 'Monday', '04:00:00', '04:10:00', 36, 18, NULL, 1, 10),
(1354, 'Monday', '05:00:00', '05:30:00', 1, 27, 22, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kls` int(255) NOT NULL,
  `nama_kls` varchar(255) NOT NULL,
  `sn` varchar(30) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `id_prodi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kls`, `nama_kls`, `sn`, `ket`, `id_prodi`) VALUES
(1, 'E201', '66595019130181', 'Gedung Kuliah Bersama', 1),
(4, 'D205', '66595019130181', 'Gedung Kuliah Bersama', 1),
(5, 'D304', '66595019130181', 'Gedung Kuliah Bersama', 1),
(7, 'E202', '66595019130181', 'GKB222', 2),
(8, 'K901', '66595019130181', 'Gedung Industri', 2),
(12, 'W12', '66595019130181', 'Industri', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `id_prodi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `id_prodi`) VALUES
(1, 'TKC244', 'Logika Fuzzy', 1),
(2, 'TKC243', 'Keamanan Jaringan Komputer', 1),
(4, 'TKC234', 'Pemrograman Jaringan B', 1),
(5, 'TKC211', 'Teknik Mikroprosesor B', 1),
(6, 'TKC211', 'Teknik Mikroprosesor A', 1),
(7, 'TKC201', 'Fisika Dasar I C', 1),
(8, 'TKC223', 'Pemrograman Berorientasi Objek A', 1),
(9, 'TKC223', 'Pemrograman Berorientasi Objek B', 1),
(10, 'TKC235', 'Manajemen Trafik A', 1),
(11, 'TKC234', 'Pemrograman Jaringan A', 1),
(12, 'TKC214', 'Pengantar Perangkat Bergerak A', 1),
(13, 'TKC214', 'Pengantar Perangkat Bergerak B', 1),
(14, 'TKC227', 'Rekayasa Perangkat Lunak A', 1),
(15, 'TKC227', 'Rekayasa Perangkat Lunak B', 1),
(16, 'TKC210', 'Teknik Interface Dan Periperal A', 1),
(17, 'TKC210', 'Teknik Interface Dan Periperal B', 1),
(18, 'TKC222', 'Bahasa Pemrograman Rakitan A', 1),
(19, 'TKC222', 'Bahasa Pemrograman Rakitan B', 1),
(20, 'MPK104', 'Bahasa Inggris A', 1),
(21, 'Revisi', 'Metode Numerik A', 1),
(22, 'TKC203', 'Dasar Komputer Dan Pemrograman B', 1),
(23, 'TKC235', 'Manajemen Trafik B', 1),
(24, 'TKC236', 'Interaksi Manusia Dan Komputer A', 1),
(25, 'TKC236', 'Interaksi Manusia Dan Komputer B', 1),
(26, 'Revisi', 'Pemrograman Game', 1),
(27, 'TKC220', 'Struktur Data A', 1),
(28, 'TKC220', 'Struktur Data B', 1),
(29, 'TKC212', 'Sistem Operasi B', 1),
(30, 'TKC212', 'Sistem Operasi A', 1),
(31, 'MWU110', 'Teknologi Informasi B', 1),
(32, 'MWU110', 'Teknologi Informasi A', 1),
(33, 'TKC226', 'Sistem Tertanam A', 1),
(34, 'TKC226', 'Sistem Tertanam B', 1),
(35, 'TKC408', 'Jaringan Komputer II B', 1),
(36, 'TKC408', 'Jaringan Komputer II A', 1),
(37, 'TKC201', 'Fisika Dasar I A', 1),
(38, 'TKC201', 'Fisika Dasar I B', 1),
(39, 'MWU109', 'Kewirausahaan B', 1),
(40, 'MWU109', 'Kewirausahaan A', 1),
(41, 'TKC203', 'Dasar Komputer Dan Pemrograman A', 1),
(42, 'MPK104', 'Bahasa Inggris B', 1),
(43, 'TKC248', 'Sistem Terintegrasi', 1),
(44, 'TKC208', 'Konsep Jaringan Komputer A', 1),
(45, 'TKC208', 'Konsep Jaringan Komputer B', 1),
(46, 'TKC323', 'Pemrograman Berorientasi Objek Lanjut', 1),
(47, 'TKC202', 'Kalkulus I A', 1),
(48, 'TKC202', 'Kalkulus I B', 1),
(49, 'TKC246', 'Pengolahan Citra Dan Pengenalan Pola', 1),
(50, 'TKC305', 'Sistem Digital Lanjut B', 1),
(51, 'TKC305', 'Sistem Digital Lanjut A', 1),
(52, 'MPK103', 'Bahasa Indonesia A', 1),
(53, 'MPK103', 'Bahasa Indonesia B', 1),
(54, 'TKC252', 'Kecerdasan Buatan', 1),
(55, 'Revisi', 'Metode Numerik B', 1),
(56, 'TKC213', 'Organisasi Komputer A', 1),
(57, 'TKC213', 'Organisasi Komputer B', 1),
(58, 'Revisi', 'Pancasila A', 1),
(59, 'Revisi', 'Pancasila B', 1),
(60, 'TKC245', 'Sistem Informasi', 1),
(61, 'TKC209', 'Dasar Sistem Kendali A', 1),
(62, 'TKC209', 'Dasar Sistem Kendali B', 1),
(63, 'MPK101', 'Pendidikan Agama Islam A', 1),
(64, 'MPK101', 'Pendidikan Agama Islam B', 1),
(65, 'TKC202', 'Kalkulus I C', 1),
(66, 'TKC232', 'Perencanaan Strategis Sistem Dan Teknologi Informasi A', 1),
(67, 'TKC232', 'Perencanaan Strategis Sistem Dan Teknologi Informasi B', 1),
(68, 'TKC240', 'Jaringan Syaraf Tiruan', 1),
(69, 'Revisi', 'Probabilitas Statistik A', 1),
(70, 'Revisi', 'Probabilitas Statistik B', 1),
(71, 'TKC207', 'Matematika Teknik A', 1),
(72, 'TKC207', 'Matematika Teknik B', 1),
(73, 'TKC233', 'Kecakapan Antar Personal A', 1),
(74, 'TKC233', 'Kecakapan Antar Personal B', 1),
(75, 'TKC205', 'Sistem Digital', 1),
(76, 'TKC219', 'Teknik Telekomunikasi Seluler', 1),
(77, 'TKC225', 'Robotika A', 1),
(78, 'TKC225', 'Robotika B', 1),
(79, 'TKC225', 'Robotika C', 1),
(97, 'TKC111', 'TES', 2),
(99, 'TKC2019', 'Industrial', 2),
(104, 'KKK111', 'Bahasa Korea', 2),
(105, 'UII123', 'Bahasa Robot', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `nim` varchar(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `id_scan` int(255) NOT NULL,
  `id_prodi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama_mhs`, `id_scan`, `id_prodi`) VALUES
('21120116120002', 'Tengku Kemal Yusron', 129, 2),
('21120116120003', 'Muhammad Rizki Nur Majiid', 130, 2),
('21120116120004', 'Evita Cindy Septiviani', 131, 2),
('21120116120005', 'Guntur Dwi Cahyono', 132, 2),
('21120116120006', 'Monanzarifa Yonanta', 133, 2),
('21120116120007', 'Kornelius Satria Budiyanto', 134, 2),
('21120116120008', 'Agustiawan', 135, 2),
('21120116120009', 'Ahmad Shofie Hilmi', 136, 2),
('21120116120010', 'Mutiara Victorina M.', 137, 2),
('21120116120011', 'Rio Julian Azis Pratama', 138, 2),
('21120116130036', 'Muhammad Muharrik Al-islamy', 111, 1),
('21120116130037', 'Snowy', 140, 1),
('21120116130042', 'Vania Ariyani', 112, 1),
('21120116130044', 'Veronika Putri Bestari', 113, 1),
('21120116130046', 'Nadia Febrianita Gunarto', 9, 1),
('21120116130056', 'Muhammad Rizki', 115, 1),
('21120116130059', 'Afif Wicaksono', 116, 1),
('21120116130080', 'Yogie Meysa', 143, 1),
('21120116140050', 'Wildan Aufa Hanif Bagassurya', 114, 1),
('21120116140058', 'Saskia Agustin Leonydytia', 117, 1),
('21120116140070', 'Azizah Kamalia', 118, 1),
('21120119802374', 'Kikoo Koki', 155, 2),
('22', 'Yiyiyiy', 142, 1),
('222', 'Pipi', 152, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mhsmatkul`
--

CREATE TABLE `mhsmatkul` (
  `id_mhsmatkul` int(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `id_jadwal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhsmatkul`
--

INSERT INTO `mhsmatkul` (`id_mhsmatkul`, `nim`, `id_jadwal`) VALUES
(122, '21120116120002', 1069),
(123, '21120116120003', 1069),
(148, '21120116120002', 1076),
(151, '21120116130036', 95),
(162, '21120116130046', 95),
(165, '21120116130046', 98),
(166, '21120116130036', 98),
(168, '21120116130059', 98);

-- --------------------------------------------------------

--
-- Stand-in structure for view `presensi_dosen`
-- (See below for the actual view)
--
CREATE TABLE `presensi_dosen` (
`nama_dosen` varchar(255)
,`id_dosen` int(255)
,`id_matkul` int(11)
,`kode_matkul` varchar(255)
,`nama_matkul` varchar(255)
,`id_prodi` int(255)
,`nama_prodi` varchar(255)
,`hari_scan` varchar(9)
,`tanggal_scan` date
,`waktu_scan` time
,`hari` varchar(255)
,`waktu` time
,`akhir` time
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `presensi_mhs`
-- (See below for the actual view)
--
CREATE TABLE `presensi_mhs` (
`id_mhsmatkul` int(255)
,`nim` varchar(255)
,`id_prodi` int(255)
,`nama_prodi` varchar(255)
,`nama_mhs` varchar(255)
,`id_matkul` int(11)
,`kode_matkul` varchar(255)
,`nama_matkul` varchar(255)
,`hari_scan` varchar(9)
,`tanggal_scan` date
,`waktu_scan` time
,`hari` varchar(255)
,`waktu` time
,`akhir` time
);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(255) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `id_fakultas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `id_fakultas`) VALUES
(1, 'Teknik Komputer', 1),
(2, 'Teknik Industri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `smt`
--

CREATE TABLE `smt` (
  `id_smt` int(255) NOT NULL,
  `nama_smt` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `smt`
--

INSERT INTO `smt` (`id_smt`, `nama_smt`, `tahun`, `status`) VALUES
(1, 'Gasal', '2019/2020', 'Aktif'),
(9, 'Genap', '2019/2020', ''),
(10, 'Gasal', '2020/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_scan`
--

CREATE TABLE `user_scan` (
  `id_scan` int(255) NOT NULL,
  `alias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_scan`
--

INSERT INTO `user_scan` (`id_scan`, `alias`) VALUES
(1, 'ABP'),
(2, 'EDW'),
(3, 'AFR'),
(4, 'IPW'),
(5, 'KIS'),
(6, 'KTM'),
(7, 'ODN'),
(9, 'Nadia'),
(16, 'RZI'),
(17, 'SKW'),
(18, 'Y'),
(19, 'ADF'),
(20, 'DED'),
(21, 'YEW'),
(22, 'RIS'),
(23, 'KAN'),
(24, 'UDH'),
(25, 'KRW'),
(26, 'BBI'),
(27, 'SLS'),
(28, 'SMD'),
(29, 'SUH'),
(30, 'MAS'),
(31, 'YDS'),
(32, 'ZAE'),
(33, 'ABA'),
(111, 'Muhammad'),
(112, 'Vania'),
(113, 'Veronika'),
(114, 'Wildan'),
(115, 'Muhammad'),
(116, 'Afif'),
(117, 'Saskia'),
(118, 'Azizah'),
(119, 'R.'),
(129, 'Tengkuu'),
(130, 'Muhammad'),
(131, 'Evita'),
(132, 'Guntur'),
(133, 'Monanzarifa'),
(134, 'Kornelius'),
(135, 'Agustiawan'),
(136, 'Ahmad'),
(137, 'Mutiara'),
(138, 'Rio'),
(140, 'Snowy'),
(141, 'Yoyoyoy'),
(142, 'Yiyiyiy'),
(143, 'Yogie'),
(145, 'Yoyoyoy'),
(146, 'Momo'),
(147, 'Tengku'),
(148, 'Pipo'),
(149, 'Pipi'),
(151, 'Pipo'),
(152, 'Pipi'),
(153, 'Popo'),
(154, 'WW'),
(155, 'Kikoo'),
(156, 'WA'),
(160, 'Atha');

-- --------------------------------------------------------

--
-- Structure for view `presensi_dosen`
--
DROP TABLE IF EXISTS `presensi_dosen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `presensi_dosen`  AS  select `dosen`.`nama_dosen` AS `nama_dosen`,`dosen`.`id_dosen` AS `id_dosen`,`matkul`.`id_matkul` AS `id_matkul`,`matkul`.`kode_matkul` AS `kode_matkul`,`matkul`.`nama_matkul` AS `nama_matkul`,`prodi`.`id_prodi` AS `id_prodi`,`prodi`.`nama_prodi` AS `nama_prodi`,dayname(`att_log`.`scan_date`) AS `hari_scan`,cast(`att_log`.`scan_date` as date) AS `tanggal_scan`,cast(`att_log`.`scan_date` as time) AS `waktu_scan`,`jadwal`.`hari` AS `hari`,`jadwal`.`waktu` AS `waktu`,`jadwal`.`akhir` AS `akhir` from ((((((`dosen` join `att_log` on(`dosen`.`id_scan` = `att_log`.`pin`)) join `jadwal` on(`dosen`.`id_dosen` = `jadwal`.`id_dosen`)) join `matkul` on(`jadwal`.`id_matkul` = `matkul`.`id_matkul`)) join `prodi` on(`prodi`.`id_prodi` = `matkul`.`id_prodi`)) join `kelas` on(`jadwal`.`id_kls` = `kelas`.`id_kls`)) join `smt` on(`smt`.`id_smt` = `jadwal`.`id_smt`)) where `smt`.`status` = 'Aktif' and dayname(`att_log`.`scan_date`) = `jadwal`.`hari` and `jadwal`.`waktu` <= cast(`att_log`.`scan_date` as time) and cast(`att_log`.`scan_date` as time) <= `jadwal`.`akhir` ;

-- --------------------------------------------------------

--
-- Structure for view `presensi_mhs`
--
DROP TABLE IF EXISTS `presensi_mhs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `presensi_mhs`  AS  select `mhsmatkul`.`id_mhsmatkul` AS `id_mhsmatkul`,`mhs`.`nim` AS `nim`,`prodi`.`id_prodi` AS `id_prodi`,`prodi`.`nama_prodi` AS `nama_prodi`,`mhs`.`nama_mhs` AS `nama_mhs`,`matkul`.`id_matkul` AS `id_matkul`,`matkul`.`kode_matkul` AS `kode_matkul`,`matkul`.`nama_matkul` AS `nama_matkul`,dayname(`att_log`.`scan_date`) AS `hari_scan`,cast(`att_log`.`scan_date` as date) AS `tanggal_scan`,cast(`att_log`.`scan_date` as time) AS `waktu_scan`,`jadwal`.`hari` AS `hari`,`jadwal`.`waktu` AS `waktu`,`jadwal`.`akhir` AS `akhir` from ((((((`mhs` join `mhsmatkul` on(`mhs`.`nim` = `mhsmatkul`.`nim`)) join `att_log` on(`mhs`.`id_scan` = `att_log`.`pin`)) join `jadwal` on(`mhsmatkul`.`id_jadwal` = `jadwal`.`id_jadwal`)) join `matkul` on(`jadwal`.`id_matkul` = `matkul`.`id_matkul`)) join `prodi` on(`prodi`.`id_prodi` = `matkul`.`id_prodi`)) join `kelas` on(`jadwal`.`id_kls` = `kelas`.`id_kls`)) where dayname(`att_log`.`scan_date`) = `jadwal`.`hari` and `jadwal`.`waktu` <= cast(`att_log`.`scan_date` as time) and cast(`att_log`.`scan_date` as time) <= `jadwal`.`akhir` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `att_log`
--
ALTER TABLE `att_log`
  ADD PRIMARY KEY (`sn`,`scan_date`,`pin`),
  ADD KEY `pin` (`pin`),
  ADD KEY `sn` (`sn`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `FK_dosen` (`id_dosen`),
  ADD KEY `FK_kls` (`id_kls`),
  ADD KEY `FK_matkul` (`id_matkul`),
  ADD KEY `FK_smt` (`id_smt`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kls`),
  ADD KEY `FK_prodi` (`id_prodi`),
  ADD KEY `FK_sn` (`sn`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`nim`) USING BTREE,
  ADD KEY `FK_Scan` (`id_scan`);

--
-- Indexes for table `mhsmatkul`
--
ALTER TABLE `mhsmatkul`
  ADD PRIMARY KEY (`id_mhsmatkul`),
  ADD KEY `FK_Mhs` (`nim`),
  ADD KEY `FK_Jadwal` (`id_jadwal`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `FK_fakultas` (`id_fakultas`);

--
-- Indexes for table `smt`
--
ALTER TABLE `smt`
  ADD PRIMARY KEY (`id_smt`);

--
-- Indexes for table `user_scan`
--
ALTER TABLE `user_scan`
  ADD PRIMARY KEY (`id_scan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1359;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kls` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `mhsmatkul`
--
ALTER TABLE `mhsmatkul`
  MODIFY `id_mhsmatkul` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smt`
--
ALTER TABLE `smt`
  MODIFY `id_smt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_scan`
--
ALTER TABLE `user_scan`
  MODIFY `id_scan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `att_log`
--
ALTER TABLE `att_log`
  ADD CONSTRAINT `FK_userscan` FOREIGN KEY (`pin`) REFERENCES `user_scan` (`id_scan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `FK_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sn` FOREIGN KEY (`sn`) REFERENCES `att_log` (`sn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `FK_Scan` FOREIGN KEY (`id_scan`) REFERENCES `user_scan` (`id_scan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mhsmatkul`
--
ALTER TABLE `mhsmatkul`
  ADD CONSTRAINT `FK_Jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Mhs` FOREIGN KEY (`nim`) REFERENCES `mhs` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `FK_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
