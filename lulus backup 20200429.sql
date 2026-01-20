-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:24 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lulus`
--

-- --------------------------------------------------------

--
-- Table structure for table `un_siswa`
--

CREATE TABLE `un_siswa` (
  `nisn` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `ttl` varchar(225) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pesan` varchar(500) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_siswa`
--

INSERT INTO `un_siswa` (`nisn`, `nama`, `kelas`, `ttl`, `jk`, `status`, `pesan`, `file`) VALUES
('0016288719', 'FAIZ AKBAR', 'IPA', 'Pangkalpinang, 09-09-2002', 'Laki-Laki', 'Alhamdulillah, anda dinyatakan LULUS', 'Hidup itu ibarat seseorang mendaki gunung, kaki gunungnya sudah terlewati tapi puncak gunung belum terlihat. Bekal semakin tipis, tubuh semakin lelah. Saatnya kita memilih, mundur atau terus mendaki. Keduanya sama saja lelahnya. Tapi jika kita terus mendaki, akan ada harapan bagi kita indahnya alam disana. Faidza ‘Azamta Fatawakkal “Alallah.', 'sk-1.pdf'),
('0016933403', 'DIVA DITARIA', 'IPA', 'Bandung, 02-11-2001', 'Perempuan', 'Alhamdulillah, anda dinyatakan LULUS', 'Hidup itu ibarat seseorang mendaki gunung, kaki gunungnya sudah terlewati tapi puncak gunung belum terlihat. Bekal semakin tipis, tubuh semakin lelah. Saatnya kita memilih, mundur atau terus mendaki. Keduanya sama saja lelahnya. Tapi jika kita terus mendaki, akan ada harapan bagi kita indahnya alam disana. Faidza ‘Azamta Fatawakkal “Alallah.', 'sk-2.pdf'),
('0020437592', 'MUHAMMAD YUSRIL HADI', 'IPA', 'Belinyu, 07-03-2002', 'Laki-Laki', 'Alhamdulillah, anda dinyatakan LULUS', 'Ananda Muhammad Yusril Hadi, selamat atas kelulusannya. Teruslah belajar, dimana pun, kapan pun dan dari siapa pun. Tetap semangat berjuang mengejar cita-citamu dan jangan pernah putus asa serta terus istiqomah dalam beribadah. Jadilah pribadi yang mampu menebar manfaat  untuk orang banyak, karena sebaik-baik manusia  adalah yang bermanfaat untuk orang lain.  Doa ustadz dan ustadzah selalu menyertaimu.', 'sk-3.pdf'),
('0020437853', 'EDOI', 'IPA', 'Nibung, 08-06-2002', 'Laki-Laki', 'Alhamdulillah, anda dinyatakan LULUS', 'Hidup itu ibarat seseorang mendaki gunung, kaki gunungnya sudah terlewati tapi puncak gunung belum terlihat. Bekal semakin tipis, tubuh semakin lelah. Saatnya kita memilih, mundur atau terus mendaki. Keduanya sama saja lelahnya. Tapi jika kita terus mendaki, akan ada harapan bagi kita indahnya alam disana. Faidza ‘Azamta Fatawakkal “Alallah.', 'sk-4.pdf'),
('nisn', 'nama', 'kelas', 'ttl', 'jk', 'status', 'pesan', 'file');

-- --------------------------------------------------------

--
-- Table structure for table `un_user`
--

CREATE TABLE `un_user` (
  `UID` tinyint(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `un_user`
--

INSERT INTO `un_user` (`UID`, `username`, `password`) VALUES
(1, 'admin', 'd216bfbcb69b155a9a5d9c009fa66be7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `un_siswa`
--
ALTER TABLE `un_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `un_user`
--
ALTER TABLE `un_user`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `un_user`
--
ALTER TABLE `un_user`
  MODIFY `UID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
