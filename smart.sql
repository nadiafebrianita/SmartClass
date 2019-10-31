-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2019 at 02:01 PM
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
-- Database: `smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(255) NOT NULL,
  `id_scan` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `id_scan`, `nama_dosen`, `nip`, `nidn`) VALUES
(2, '1', 'Agung Budi Prasetijo, ST, M.IT, Ph.D', '197105061995121001', '987'),
(4, '2', 'Eko Didik Widianto, ST, MT', '197705262010121001', '123'),
(5, '3', 'Adian Fatchur Rochim, ST, MT', '197302261998021001', '789'),
(6, '4', 'Ike Pertiwi, ST, MT', '198412062010122008', '23'),
(7, '5', 'Ir. Kodrat IS, MT', '196310281993031002', '67'),
(8, '6', 'Kurniawan Teguh Martono, ST, MT', '198303192010121002', '245'),
(9, '7', 'Dr. Oky Dwi Nurhayati, ST, MT', '197910022009122001', '986');

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
  `id_matkul` varchar(255) NOT NULL,
  `id_dosen` int(255) NOT NULL,
  `id_kls` int(255) NOT NULL,
  `id_smt` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `waktu`, `id_matkul`, `id_dosen`, `id_kls`, `id_smt`) VALUES
(1, 'Senin', '07:00:00', '1', 2, 1, 1),
(2, 'Selasa', '08:40:00', '2', 5, 5, 1),
(4, 'Senin', '07:00:00', '8', 9, 4, 1),
(5, 'Senin', '07:00:00', '15', 6, 1, 1),
(6, 'Kamis', '07:00:00', '20', 4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kls` int(255) NOT NULL,
  `nama_kls` varchar(255) NOT NULL,
  `ket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kls`, `nama_kls`, `ket`) VALUES
(1, 'E201', 'Gedung Kuliah Bersama'),
(4, 'D205', 'Gedung Kuliah Bersama'),
(5, 'D304', 'Gedung Kuliah Bersama');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `nama_matkul` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL,
  `id_prodi` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`, `sks`, `id_prodi`) VALUES
(1, 'TKC244', 'Logika Fuzzy', 0, 1),
(2, 'TKC243', 'Keamanan Jaringan Komputer', 0, 1),
(4, 'TKC234', 'Pemrograman Jaringan B', 0, 1),
(5, 'TKC211', 'Teknik Mikroprosesor B', 0, 1),
(6, 'TKC211', 'Teknik Mikroprosesor A', 0, 1),
(7, 'TKC201', 'Fisika Dasar I C', 0, 1),
(8, 'TKC223', 'Pemrograman Berorientasi Objek A', 0, 1),
(9, 'TKC223', 'Pemrograman Berorientasi Objek B', 0, 1),
(10, 'TKC235', 'Manajemen Trafik A', 0, 1),
(11, 'TKC234', 'Pemrograman Jaringan A', 0, 1),
(12, 'TKC214', 'Pengantar Perangkat Bergerak A', 0, 1),
(13, 'TKC214', 'Pengantar Perangkat Bergerak B', 0, 1),
(14, 'TKC227', 'Rekayasa Perangkat Lunak A', 0, 1),
(15, 'TKC227', 'Rekayasa Perangkat Lunak B', 0, 1),
(16, 'TKC210', 'Teknik Interface Dan Periperal A', 0, 1),
(17, 'TKC210', 'Teknik Interface Dan Periperal B', 0, 1),
(18, 'TKC222', 'Bahasa Pemrograman Rakitan A', 0, 1),
(19, 'TKC222', 'Bahasa Pemrograman Rakitan B', 0, 1),
(20, 'MPK104', 'Bahasa Inggris A', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id_mhs` int(255) NOT NULL,
  `nama_mhs` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `id_scan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id_mhs`, `nama_mhs`, `nim`, `id_scan`) VALUES
(1, 'Nadia Febrianita Gunarto', '21120116130046', '9'),
(2, 'M Muharrik A', '21120116120003', '13'),
(3, 'Azizah Kamalia', '21120116140070', '14'),
(5, 'Vania Ariyani P P', '21120116130042', '15');

-- --------------------------------------------------------

--
-- Table structure for table `mhsmatkul`
--

CREATE TABLE `mhsmatkul` (
  `id_mhsmatkul` int(255) NOT NULL,
  `id_mhs` int(255) NOT NULL,
  `id_jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhsmatkul`
--

INSERT INTO `mhsmatkul` (`id_mhsmatkul`, `id_mhs`, `id_jadwal`) VALUES
(1, 1, '1'),
(2, 2, '2'),
(3, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id_presensi` int(255) NOT NULL,
  `id_jadwal` varchar(255) NOT NULL,
  `id_mhs` int(255) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id_presensi`, `id_jadwal`, `id_mhs`, `waktu`) VALUES
(1, '1', 1, '2019-10-15 12:05:00'),
(2, '2', 2, '2019-10-15 15:04:00');

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
(2, 'Teknik Industri', 1),
(3, 'Fisika', 2);

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
(2, 'Genap', '2019/2020', ''),
(3, 'Gasal', '2020/2021', '');

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
(9, 'NFG'),
(13, 'MMA'),
(14, 'AK'),
(15, 'VAPP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

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
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kls`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- Indexes for table `mhsmatkul`
--
ALTER TABLE `mhsmatkul`
  ADD PRIMARY KEY (`id_mhsmatkul`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kls` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id_mhs` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mhsmatkul`
--
ALTER TABLE `mhsmatkul`
  MODIFY `id_mhsmatkul` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id_presensi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smt`
--
ALTER TABLE `smt`
  MODIFY `id_smt` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_scan`
--
ALTER TABLE `user_scan`
  MODIFY `id_scan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
