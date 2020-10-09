-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 05:47 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmaba`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `asal_sekolah` text NOT NULL,
  `nomor` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `email`, `password`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `asal_sekolah`, `nomor`) VALUES
(1, 'abc@gmail.com', 'b', 'abc', '2020-05-05', 'Perempuan', 'fgh', 'nana', '12345678'),
(2, 'halo@gmail.com', 'h', 'halohai', '1998-05-30', 'Laki-laki', 'cjvlh', 'gjvjvoh', '86867686'),
(3, 'tes@gmail.com', 'q', 'sinta', '1998-05-02', 'Perempuan', 'fsjsksl', 'bajaja', '0546462'),
(4, 'evi@gmail.com', 'a', 'evia', '1998-05-07', 'Laki-laki', 'gajalla', 'gajsks', '45434964'),
(5, 'novia@gmail.com', 'q', 'novia@gmail.com', '1999-08-04', 'Perempuan', 'hakals', 'hakala', '0556494'),
(6, 'din@gmail.com', 'a', 'dini april', '1998-07-04', 'Laki-laki', 'hqhqj', 'hqjqk', '85401664'),
(7, 'tita@gmail.com', 'a', 'tita', '1990-08-04', 'Laki-laki', 'gahaja', 'yahaka', '04529454');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `fakultas` enum('Fakultas Teknik','Fakultas Kesehatan','Fakultas Agama Islam','Fakultas Sosial & Humaniora') NOT NULL,
  `prodi` enum('S1 Teknik Informatika','S1 Teknik Elektro','S1 Teknologi Informasi','S1 Sistem Informasi','S1 Rekayasa Perangkat Lunak','S1 Ilmu Keperawatan','D3 Kebidanan','Profesi NERS','S1 Komunikasi & Penyiaran Islam','S1 Ilmu Al-Qur''an & Tafsir','S1 Hukum Keluarga (Ahwal Al-Syakhshiyah)','S1 Ekonomi Syari''ah','S1 Perbankan Syari''ah','S1 Pendidikan Agama Islam','S1 Pendidikan Bahasa Arab','S1 Manajemen Pendidikan Islam','S1 Pendidik Guru Madrasah Ibtidaiyah','S1 Pendidik Islam Anak Usia Dini','S1 Pendidikan Bahasa Inggris','S1 Pendidikan Matematika','S1 Hukum','S1 Ekonomi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_mahasiswa`, `fakultas`, `prodi`) VALUES
(1, 1, '', 'S1 Teknik Informatika'),
(2, 2, '', ''),
(3, 2, '', ''),
(4, 2, 'Fakultas Kesehatan', 'S1 Ilmu Keperawatan'),
(5, 2, '', 'S1 Teknik Elektro'),
(6, 2, '', 'S1 Teknik Informatika'),
(7, 2, 'Fakultas Teknik', 'S1 Teknik Elektro'),
(8, 3, 'Fakultas Sosial & Humaniora', 'S1 Pendidikan Matematika'),
(9, 4, 'Fakultas Sosial & Humaniora', 'S1 Pendidikan Matematika'),
(10, 6, 'Fakultas Sosial & Humaniora', 'S1 Hukum'),
(11, 7, 'Fakultas Sosial & Humaniora', 'S1 Pendidikan Bahasa Inggris');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
