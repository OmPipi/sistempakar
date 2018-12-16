-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 04:10 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gangguan_kehamilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pakar`
--

CREATE TABLE `data_pakar` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `akses` varchar(5) NOT NULL DEFAULT 'pakar'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pakar`
--

INSERT INTO `data_pakar` (`username`, `password`, `pertanyaan`, `jawaban`, `akses`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'Apa Makanan Favorit Anda?', 'bffa783a022fe2d98692014dda6d7a4c', 'pakar');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `usia` int(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `pertanyaan` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `akses` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`username`, `password`, `nama_user`, `usia`, `jenis_kelamin`, `alamat`, `pertanyaan`, `jawaban`, `akses`) VALUES
('panji', 'e10adc3949ba59abbe56e057f20f883e', 'PANJI', 40, 'L', 'JAKARTA', 'Apa Makanan Favorit Anda?', '9bb98c41bffb2b44f24cf17e554158cf', 'user'),
('pipii', 'e10adc3949ba59abbe56e057f20f883e', 'pipii', 25, 'L', 'Kemayoran', 'Apa Makanan Favorit Anda?', 'bffa783a022fe2d98692014dda6d7a4c', 'user'),
('user1', 'e10adc3949ba59abbe56e057f20f883e', 'User 1', 27, 'P', 'Kemayoran, Jakarta Pusat', 'Apa Makanan Favorit Anda?', '8ee31981b5d2f28baa834fefc532249a', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kode_gejala` varchar(4) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `kode_induk_ya` varchar(4) NOT NULL,
  `kode_induk_tidak` varchar(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kode_gejala`, `nama_gejala`, `kode_induk_ya`, `kode_induk_tidak`) VALUES
('G001', 'Apakah tekanan darah lebih dari 120/80 mmHg ?', '', ''),
('G002', 'Apakah tekanan darah kurang dari 120/80 mmHg ?', '', 'G001'),
('G003', 'Apakah tekanan darah normal atau sama dengan 120/80 mmHg ?', '', 'G002'),
('G004', 'Apakah usia kehamilan kurang dari 20 minggu ?', 'G006', ''),
('G005', 'Apakah usia kehamilan lebih dari 20 minggu ?', '', 'G004'),
('G006', 'Apakah proteinuria/tes celup urine ?', 'G001', ''),
('G007', 'Apakah trombosit kurang dari 100.000 mm3 ?', 'G014', ''),
('G008', 'Apakah mengalami trismus/Gangguan pembukaan mulut ?', '', 'G013'),
('G009', 'Apakah sering kelelahan ?', 'G002', ''),
('G010', 'Apakah sebelumnya mengalami pingsan ?', 'G009', ''),
('G011', 'Apakah merasa depresi ?', 'G010', ''),
('G012', 'Apakah merasa stres ?', 'G011', ''),
('G013', 'Apakah sebelumnya mengalami kejang ?', '', 'G019'),
('G014', 'Apakah hasil Proteinuria 2.0 g/hari atau lebih dari 2+ dispstick ?', 'G005', ''),
('G015', 'Apakah hasil Proteinuria lebih dari 300 mg/hari atau lebih dari 1+dispstick ?', '', 'G014'),
('G016', 'Apakah mengalami oliguria/gangguan air kemih ?', 'G007', ''),
('G017', 'Apakah volume air kemih/hari kurang dari 400 ml/jam ?', 'G016', ''),
('G018', 'Apakah mengalami spasme otot/Ketegangan otot ?', 'G043', ''),
('G019', 'Apakah merasa sakit kepala ?', 'G003', ''),
('G020', 'Apakah tekanan darah meningkat > 160/110 mmHg ?', 'G031', ''),
('G021', 'Apakah pertumbuhan janin terhambat ?', 'G020', ''),
('G022', 'Apakah mengalami peningkatan kadar enzim ALT atau AST ?', 'G021', ''),
('G023', 'Apakah LDH/Laktat Dehidrogenase meningkat ?', 'G022', ''),
('G024', 'Apakah mengalami demam ?', 'G019', ''),
('G025', 'Apakah mengalami kaku kuduk ?', 'G024', ''),
('G026', 'Apakah mengalami disorientasi ?', 'G025', ''),
('G027', 'Apakah mengalami gangguan penglihatan ?', 'G028', ''),
('G028', 'Apakah mengalami muntah-muntah ?', '', 'G024'),
('G029', 'Apakah kesulitan untuk berkonsentrasi ?', 'G012', ''),
('G030', 'Apakah mengalami kejang yang terjadi bersifat menyeluruh ?', '', 'G035'),
('G031', 'Apakah merasa sakit kepala yang berat ?', 'G017', ''),
('G032', 'Apakah memiliki riwayat hipertensi sebelum kehamilan ?', 'G004', ''),
('G033', 'Apakah menderita multipara ?', 'G032', ''),
('G034', 'Apakah ada riwayat hipertensi menurun dalam keluarga ?', 'G033', ''),
('G035', 'Apakah proteinuria bersifat persisten ?', '', 'G015'),
('G036', 'Apakah mengalami sakit ulu hati ?', 'G035', ''),
('G037', 'Apakah mengalami trombositopeni ?', 'G036', ''),
('G038', 'Apakah memiliki riwayat epilepsi ?', 'G027', ''),
('G039', 'Apakah sebelumnya merasa hilang kesadaran ?', 'G026', ''),
('G040', 'Apakah merasa kaku di  muka ?', 'G008', ''),
('G041', 'Apakah merasa kaku di leher ?', 'G040', ''),
('G042', 'Apakah merasa kaku di tengkuk ?', 'G041', ''),
('G043', 'Apakah dinding perut terasa kaku ?', 'G042', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id_diagnosa` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `kode_penyakit` varchar(4) NOT NULL,
  `tanggal_diagnosa` datetime NOT NULL,
  `persentase` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id_diagnosa`, `username`, `kode_penyakit`, `tanggal_diagnosa`, `persentase`) VALUES
(3, 'rahman', 'P002', '2013-09-13 19:26:53', 80),
(4, 'rahman', 'P002', '2013-09-13 19:28:23', 60),
(5, 'rahman', 'P001', '2013-09-13 19:30:04', 90),
(6, 'rahman', 'P002', '2015-02-25 14:17:48', 120),
(7, 'rahman', '', '2015-02-25 14:21:43', 0),
(8, 'rahman', 'P002', '2015-02-26 11:45:15', 120),
(9, 'rahman', 'P001', '2015-02-26 11:50:25', 105),
(10, 'rahman', 'P002', '2015-02-26 11:52:42', 100),
(11, 'rahman', 'P002', '2015-02-26 17:47:52', 120),
(12, 'rahman', 'P002', '2015-03-03 10:30:46', 80),
(13, 'rahman', 'P002', '2015-03-03 10:31:55', 120),
(14, 'rahman', 'P002', '2015-03-03 10:40:24', 120),
(15, 'rahman', 'P002', '2015-03-03 11:08:16', 60),
(16, 'pipii', 'P002', '2018-05-22 20:57:35', 60),
(17, 'pipii', 'P002', '2018-05-22 21:03:54', 120),
(18, 'pipii', 'P001', '2018-05-22 22:54:25', 45),
(19, 'pipii', '', '2018-05-22 23:30:43', 0),
(20, 'pipii', '', '2018-05-22 23:31:20', 0),
(21, 'pipii', '', '2018-05-22 23:31:56', 0),
(22, 'pipii', '', '2018-05-22 23:32:14', 0),
(23, 'pipii', 'P002', '2018-05-22 23:33:58', 120),
(24, 'pipii', 'P002', '2018-05-22 23:34:38', 80),
(25, 'pipii', 'P002', '2018-05-22 23:34:56', 120),
(26, 'pipii', '', '2018-05-22 23:35:17', 0),
(27, 'pipii', '', '2018-05-22 23:35:50', 0),
(28, 'pipii', '', '2018-05-22 23:36:27', 0),
(29, 'pipii', 'P002', '2018-05-22 23:37:33', 120),
(30, 'pipii', 'P001', '2018-05-22 23:41:45', 40),
(31, 'pipii', '', '2018-05-22 23:43:16', 0),
(32, 'pipii', 'P001', '2018-05-22 23:46:14', 120),
(33, 'pipii', 'P002', '2018-05-22 23:46:30', 120),
(34, 'pipii', 'P001', '2018-05-22 23:47:22', 80),
(35, 'pipii', '', '2018-05-23 02:58:25', 0),
(36, 'pipii', '', '2018-05-23 02:58:44', 0),
(37, 'pipii', 'P001', '2018-05-23 03:02:45', 120),
(38, 'pipii', '', '2018-05-23 03:17:37', 0),
(39, 'pipii', 'P001', '2018-05-23 03:17:46', 10),
(40, 'pipii', '', '2018-05-23 03:18:16', 0),
(41, 'pipii', '', '2018-05-23 03:18:40', 0),
(42, 'pipii', 'P001', '2018-05-23 03:18:53', 10),
(43, 'pipii', 'P001', '2018-05-23 03:22:23', 80),
(44, 'pipii', 'P001', '2018-05-23 03:22:41', 60),
(45, 'pipii', 'P001', '2018-05-23 03:22:54', 60),
(46, 'pipii', 'P001', '2018-05-23 03:23:07', 60),
(47, 'pipii', 'P001', '2018-05-23 03:23:27', 30),
(48, 'pipii', 'P001', '2018-05-23 03:23:42', 60),
(49, 'pipii', 'P001', '2018-05-23 03:24:49', 60),
(50, 'pipii', 'P011', '2018-05-23 03:25:37', 60),
(51, 'pipii', 'P001', '2018-05-23 03:25:51', 10),
(52, 'pipii', 'P001', '2018-05-23 03:26:15', 10),
(53, 'pipii', 'P001', '2018-05-23 03:30:46', 30),
(54, 'pipii', 'P001', '2018-05-23 03:32:46', 30),
(55, 'pipii', 'P001', '2018-05-23 03:33:36', 60),
(56, 'pipii', 'P001', '2018-05-23 20:16:21', 30),
(57, 'pipii', 'P005', '2018-05-23 20:22:05', 60),
(58, 'pipii', '', '2018-05-23 20:23:10', 0),
(59, 'pipii', 'P001', '2018-05-23 20:25:09', 60),
(60, 'pipii', '', '2018-05-23 20:34:52', 0),
(61, 'pipii', 'P001', '2018-05-23 20:39:26', 60),
(62, 'pipii', '', '2018-05-23 20:39:55', 0),
(63, 'pipii', 'P001', '2018-05-23 20:40:54', 60),
(64, 'pipii', '', '2018-05-23 20:44:41', 0),
(65, 'pipii', 'P001', '2018-05-23 20:46:43', 60),
(66, 'pipii', 'P001', '2018-05-23 20:47:16', 60),
(67, 'pipii', 'P005', '2018-05-24 15:19:13', 60),
(68, 'pipii', 'P001', '2018-05-24 21:56:14', 340),
(69, 'pipii', 'P001', '2018-05-24 21:56:37', 20),
(70, 'pipii', 'P001', '2018-05-24 22:02:16', 60),
(71, 'pipii', 'P001', '2018-05-24 22:08:07', 120),
(72, 'pipii', 'P001', '2018-05-24 22:20:06', 100),
(73, 'pipii', 'P001', '2018-05-24 22:21:22', 60),
(74, 'pipii', 'P001', '2018-05-24 22:27:31', 90),
(75, 'pipii', 'P001', '2018-05-24 22:28:27', 60),
(76, 'pipii', 'P001', '2018-05-24 23:41:10', 100),
(77, 'pipii', 'P001', '2018-05-24 23:41:50', 60),
(78, 'pipii', '', '2018-05-24 23:42:47', 0),
(79, 'pipii', 'P001', '2018-05-25 00:51:48', 70),
(80, 'pipii', 'P001', '2018-05-25 00:52:03', 20),
(81, 'pipii', 'P001', '2018-05-25 00:52:16', 60),
(82, 'pipii', 'P001', '2018-05-25 00:53:12', 60),
(83, 'pipii', 'P001', '2018-05-25 01:02:11', 20),
(84, 'pipii', 'P001', '2018-05-25 01:02:33', 60),
(85, 'pipii', 'P001', '2018-05-25 01:05:01', 20),
(86, 'pipii', 'P001', '2018-05-25 01:05:08', 20),
(87, 'pipii', 'P001', '2018-05-25 01:05:19', 20),
(88, 'pipii', 'P001', '2018-05-25 01:05:32', 20),
(89, 'pipii', 'P001', '2018-05-25 01:17:21', 60),
(90, 'pipii', 'P001', '2018-05-25 01:52:01', 60),
(91, 'pipii', 'P001', '2018-05-25 01:57:56', 60),
(92, 'pipii', 'P001', '2018-05-25 01:58:42', 20),
(93, 'pipii', 'P001', '2018-05-25 01:58:52', 20),
(94, 'pipii', 'P001', '2018-05-25 01:59:00', 20),
(95, 'pipii', 'P001', '2018-05-25 02:01:42', 60),
(96, 'pipii', 'P001', '2018-05-25 02:01:53', 20),
(97, 'pipii', 'P001', '2018-05-25 02:02:07', 20),
(98, 'pipii', 'P001', '2018-05-25 02:02:18', 20),
(99, 'pipii', 'P001', '2018-05-25 03:04:07', 70),
(100, 'pipii', 'P001', '2018-05-25 03:04:34', 60),
(101, 'pipii', 'P001', '2018-05-25 03:08:04', 70),
(102, 'pipii', 'P001', '2018-05-25 03:08:19', 60),
(103, 'pipii', 'P001', '2018-05-25 03:11:28', 60),
(104, 'pipii', 'P001', '2018-05-25 03:11:47', 60),
(105, 'pipii', 'P001', '2018-05-25 03:12:31', 60),
(106, 'pipii', 'P001', '2018-05-25 03:12:48', 60),
(107, 'pipii', 'P001', '2018-05-25 03:13:51', 60),
(108, 'pipii', 'P001', '2018-05-25 03:17:44', 60),
(109, 'pipii', 'P001', '2018-05-25 03:20:47', 60),
(110, 'pipii', 'P001', '2018-05-25 03:22:10', 60),
(111, 'pipii', 'P001', '2018-05-25 03:22:21', 60),
(112, 'pipii', 'P001', '2018-05-25 03:25:49', 60),
(113, 'pipii', 'P001', '2018-05-25 03:26:22', 60),
(114, 'pipii', 'P001', '2018-05-25 03:30:40', 60),
(115, 'pipii', 'P001', '2018-05-25 03:32:42', 60),
(116, 'pipii', 'P001', '2018-05-25 03:35:58', 120),
(117, 'pipii', 'P001', '2018-05-25 03:37:27', 60),
(118, 'pipii', '', '2018-05-25 04:25:36', 0),
(119, 'pipii', 'P001', '2018-05-25 04:26:26', 20),
(120, 'pipii', 'P001', '2018-05-25 04:27:10', 140),
(121, 'pipii', 'P001', '2018-05-25 04:27:29', 60),
(122, 'pipii', 'P001', '2018-05-25 04:28:49', 20),
(123, 'pipii', 'P001', '2018-05-25 04:32:09', 60),
(124, 'pipii', 'P001', '2018-05-25 04:33:36', 180),
(125, 'pipii', 'P001', '2018-05-25 04:33:45', 60),
(126, 'pipii', 'P001', '2018-05-25 04:33:58', 60),
(127, 'pipii', 'P001', '2018-05-25 04:34:20', 60),
(128, 'pipii', 'P001', '2018-05-25 04:34:45', 60),
(129, 'pipii', 'P001', '2018-05-25 04:57:45', 90),
(130, 'pipii', 'P001', '2018-05-25 04:58:08', 150),
(131, 'pipii', 'P001', '2018-05-25 04:58:23', 60),
(132, 'pipii', 'P001', '2018-05-25 04:58:40', 60),
(133, 'pipii', 'P001', '2018-05-25 05:06:56', 60),
(134, 'pipii', 'P001', '2018-05-25 05:17:24', 20),
(135, 'pipii', 'P001', '2018-05-25 05:54:30', 70),
(136, 'pipii', 'P001', '2018-05-25 05:54:41', 60),
(137, 'pipii', 'P001', '2018-05-25 05:56:15', 60),
(138, 'pipii', 'P001', '2018-05-25 07:14:11', 60),
(139, 'pipii', 'P001', '2018-05-25 07:17:01', 130),
(140, 'pipii', 'P001', '2018-05-25 07:22:38', 220),
(141, 'pipii', 'P001', '2018-05-25 07:24:43', 60),
(142, 'pipii', 'P001', '2018-05-25 07:25:09', 70),
(143, 'pipii', 'P001', '2018-05-25 07:25:29', 60),
(144, 'pipii', 'P001', '2018-05-25 07:27:13', 60),
(145, 'pipii', 'P001', '2018-05-25 15:19:32', 60),
(146, 'pipii', 'P001', '2018-05-26 07:29:08', 110),
(147, 'pipii', 'P001', '2018-05-26 07:50:35', 60),
(148, 'pipii', 'P001', '2018-05-26 08:03:02', 60),
(149, 'pipii', '', '2018-05-26 08:10:47', 0),
(150, 'pipii', 'P001', '2018-05-26 08:13:43', 60),
(151, 'pipii', 'P001', '2018-05-26 08:19:56', 60),
(152, 'pipii', 'P001', '2018-05-26 08:58:45', 20),
(153, 'pipii', 'P011', '2018-05-26 08:59:30', 60),
(154, 'pipii', 'P005', '2018-05-26 09:06:35', 60),
(155, 'pipii', 'P011', '2018-05-26 09:07:33', 20),
(156, 'pipii', 'P001', '2018-05-26 09:08:04', 60),
(157, 'pipii', 'P001', '2018-05-26 09:27:51', 60),
(158, 'pipii', 'P005', '2018-05-26 15:11:00', 60),
(159, 'pipii', 'P001', '2018-05-26 16:45:48', 60),
(160, 'pipii', 'P005', '2018-05-27 22:37:06', 20),
(161, 'pipii', 'P001', '2018-05-29 00:34:56', 20),
(162, 'pipii', 'P001', '2018-05-29 00:43:04', 40),
(163, 'pipii', 'P001', '2018-05-29 00:59:09', 70),
(164, 'pipii', 'P001', '2018-05-29 01:01:39', 40),
(165, 'pipii', 'P001', '2018-05-29 01:15:49', 40),
(166, 'pipii', '', '2018-05-29 01:25:31', 0),
(167, 'pipii', 'P011', '2018-05-29 01:26:46', 60),
(168, 'pipii', 'P001', '2018-05-29 01:41:35', 360),
(169, 'pipii', 'P001', '2018-05-29 01:42:08', 60),
(170, 'pipii', 'P001', '2018-05-29 01:47:49', 80),
(171, 'pipii', 'P001', '2018-05-29 07:27:02', 50),
(172, 'pipii', 'P001', '2018-05-29 08:28:00', 10),
(173, 'pipii', 'P001', '2018-05-29 08:28:10', 10),
(174, 'pipii', 'P001', '2018-05-29 08:28:24', 40),
(175, 'pipii', 'P001', '2018-05-29 08:28:34', 10),
(176, 'pipii', 'P011', '2018-05-29 08:28:45', 10),
(177, 'pipii', '', '2018-05-29 15:06:56', 0),
(178, 'pipii', '', '2018-05-29 15:07:27', 0),
(179, 'pipii', 'P001', '2018-05-29 15:09:49', 60),
(180, 'pipii', 'P001', '2018-05-29 15:10:02', 40),
(181, 'pipii', 'P005', '2018-05-29 15:11:06', 60),
(182, 'pipii', 'P001', '2018-05-29 15:12:28', 10),
(183, 'pipii', '', '2018-05-29 15:14:37', 0),
(184, 'pipii', '', '2018-05-29 16:52:11', 0),
(185, 'pipii', 'P001', '2018-05-29 16:52:45', 60),
(186, 'pipii', 'P001', '2018-05-29 20:48:07', 60),
(187, 'pipii', 'P001', '2018-05-29 22:43:08', 60),
(188, 'pipii', 'P001', '2018-05-30 00:01:45', 60),
(189, 'pipii', '', '2018-05-30 03:29:57', 0),
(190, 'pipii', 'P001', '2018-05-31 19:58:25', 70),
(191, 'pipii', '', '2018-05-31 19:58:51', 0),
(192, 'pipii', '', '2018-05-31 20:00:23', 0),
(193, 'pipii', 'P001', '2018-05-31 20:14:18', 60),
(194, 'pipii', '', '2018-05-31 20:14:35', 0),
(195, 'pipii', '', '2018-05-31 20:15:22', 0),
(196, 'pipii', 'P001', '2018-05-31 20:17:09', 60),
(197, 'pipii', '', '2018-05-31 20:18:16', 0),
(198, 'pipii', 'P001', '2018-05-31 20:19:11', 60),
(199, 'pipii', 'P001', '2018-05-31 20:21:19', 120),
(200, 'pipii', 'P001', '2018-05-31 20:24:56', 60),
(201, 'pipii', '', '2018-05-31 20:25:29', 0),
(202, 'pipii', '', '2018-05-31 20:26:13', 0),
(203, 'pipii', '', '2018-05-31 20:26:24', 0),
(204, 'pipii', '', '2018-05-31 20:28:32', 0),
(205, 'pipii', 'P011', '2018-05-31 20:30:34', 60),
(206, 'pipii', 'P001', '2018-05-31 20:33:38', 60),
(207, 'pipii', 'P001', '2018-05-31 20:35:08', 60),
(208, 'pipii', 'P001', '2018-05-31 20:39:08', 60),
(209, 'pipii', 'P001', '2018-05-31 20:39:36', 60),
(210, 'pipii', '', '2018-05-31 20:43:03', 0),
(211, 'pipii', '', '2018-05-31 20:44:49', 0),
(212, 'pipii', 'P001', '2018-05-31 20:48:02', 60),
(213, 'pipii', 'P011', '2018-05-31 20:48:23', 10),
(214, 'pipii', 'P008', '2018-05-31 20:48:56', 60),
(215, 'pipii', '', '2018-05-31 20:49:09', 0),
(216, 'pipii', 'P001', '2018-05-31 20:51:04', 60),
(217, 'pipii', 'P001', '2018-05-31 20:52:18', 60),
(218, 'pipii', '', '2018-06-02 00:16:37', 0),
(219, 'pipii', 'P001', '2018-06-02 00:21:36', 60),
(220, 'pipii', 'P001', '2018-06-02 04:37:28', 40),
(221, 'pipii', 'P001', '2018-06-02 04:37:40', 60),
(222, 'pipii', '', '2018-06-02 04:51:33', 0),
(223, 'pipii', 'P001', '2018-06-03 21:19:22', 60),
(224, 'user1', 'P001', '2018-06-04 21:14:42', 60);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kode_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `definisi` varchar(1000) NOT NULL,
  `pengobatan` varchar(1000) NOT NULL,
  `pencegahan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kode_penyakit`, `nama_penyakit`, `definisi`, `pengobatan`, `pencegahan`) VALUES
('P001', 'Hipertensi Kronis', 'Hipertensi kronis didefinisikan sebagai tekanan darah sistolik lebih atau sama dengan 140 mmhg dan atau tekanan darah diastolik lebih atau sama dengan 90 mmhg yang telah ada sebelum kehamilan, yang bertahan sampai lebih dari 20 minggu pasca partus 1 atau setelah 12 minggu.', 'Konsultasi ke dokter.', 'Selain minum obat sesuai yang diresepkan dan konsultasi dengan dokter secara teratur, Anda perlu merawat diri Anda sendiri untuk mengurangi risiko komplikasi jangka panjang hipertensi, seperti penyakit jantung atau ginjal dan stroke. Cobalah untuk mempertahankan gaya hidup sehat, memberikan perhatian khusus pada menu makan dan berat badan, hindari tembakau, dan membatasi alkohol yang Anda minum.'),
('P002', 'Superimposed Pre-Eklampsia', 'Superimposed preeklampsia adalah tekanan darah tinggi, >=140/90 dan < 160/110 mm Hg yang disertai dengan proteinuria (protein dalam air kemih) atau edema (penimbunan cairan), yang terjadi pada kehamilan 20 minggu sampai akhir minggu pertama setelah persalinan.', 'Konsultasi ke dokter.', 'Penderita dianjurkan untuk mengkonsumsi garam dalam jumlah normal dan minum air lebih banyak. Sangat penting untuk menjalani tirah baring. Penderita juga dianjurkan untuk berbaring miring ke kiri sehingga tekanan terhadap vena besar di dalam perut yang membawa darah ke jantung berkurang dan aliran darah menjadi lebih lancar.'),
('P003', 'Hipertensi Gestasional', 'Hipertensi\r\n', 'Hipertensi Gestasional', 'Hipertensi Gestasional'),
('P004', 'Pre-Eklampsia Ringan', 'Pre Eklampsia ringan adalah tekanan darah tinggi, >=140/90 dan < 160/110 mm Hg yang disertai dengan proteinuria (protein dalam air kemih) atau edema (penimbunan cairan), yang terjadi pada kehamilan 20 minggu sampai akhir minggu pertama setelah persalinan.', 'Jika pre-eklamsianya bersifat ringan, penderita cukup menjalani tirah baring di rumah, tetapi harus memeriksakan diri ke dokter setiap 2 hari.\r\nJika perbaikan tidak segera terjadi, biasanya penderita harus dirawat dan jika kelainan ini terus berlanjut, maka persalinan dilakukan sesegera mungkin.', 'Penderita dianjurkan untuk mengkonsumsi garam dalam jumlah normal dan minum air lebih banyak. Sangat penting untuk menjalani tirah baring. Penderita juga dianjurkan untuk berbaring miring ke kiri sehingga tekanan terhadap vena besar di dalam perut yang membawa darah ke jantung berkurang dan aliran darah menjadi lebih lancar.'),
('P005', 'Pre-Eklampsia Berat', 'Pre Eklampsia adalah tekanan darah tinggi (>= 160/110) yang disertai dengan proteinuria (protein dalam air kemih) atau edema (penimbunan cairan),  yang terjadi pada kehamilan 20 minggu sampai akhir minggu pertama setelah persalinan.\r\n', 'Penderita pre-eklamsi berat dirawat di rumah sakit dan menjalani tirah baring. Cairan dan magnesium sulfat diberikan melalui infus. Dalam waktu 4-6 jam, biasanya tekanan darah kembali normal dan bayi dapat dilahirkan dengan selamat. Jika tekanan darah tetap tinggi, sebelum persalinan dimulai, diberikan obat tambahan.', 'Penderita dianjurkan untuk mengkonsumsi garam dalam jumlah normal dan minum air lebih banyak. Sangat penting untuk menjalani tirah baring. Penderita juga dianjurkan untuk berbaring miring ke kiri sehingga tekanan terhadap vena besar di dalam perut yang membawa darah ke jantung berkurang dan aliran darah menjadi lebih lancar.'),
('P006', 'Eklampsia', 'Bentuk pre-eklamsi yang lebih berat, yang menyebabkan terjadinya kejang atau koma.', 'Penderita harus dirawat di rumah sakit guna pengawasan  dan perawatan secar intensif. Diperlukan obat penenang yang cukup untuk menghidarkan timbulnya kejang dapat diberi diaezepam 20 mg im. Pertolongan pertama yang perlu diberikan jika timbulnya kejangan adalah mempertahankan jalan pernapasan bebas, menghindarkan tergigitnya lidah, pemberian oksigen, dan menjaga agar penderita tidak mengalami koma.\r\nSetelah kejangan dapat diatasi dan keadaan umum penderita dapat diperbaiki maka direncanakan untuk mengakhiri kehamilan atau mempercepat persalinan.', 'meningkatkan jumlah balai pemeriksaan antenatal dn mengusahakan agar semua wanita hamil memeriksakan diri sejak hamil muda. Mencari pada tiap pemeriksaan tanda-tanda pre eklampsia dan mengobatinya segera. Mengakhiri	 kehamilan sedapat-dapatnya pada kehamilan 37 minggu ke atas apabila setelah dirawat tanda-tanda pre eklampsia tidak juga dapat dihilangkan.'),
('P007', 'Epilepsi', 'Epilepsi adalah suatu gangguan pada sistem syaraf otak manusia karena terjadinya aktivitas yang berlbihan dari sekelompok sel neuron pada otak sehingga menyebabkan berbagai reaksi pada tubuh manusia mulai dari bengong sesaat, kesemutan, gangguan kesadaran, kejang-kejang dan atau kontraksi otot.', 'Konsultasi ke dokter.', 'Perbanyak jam tidur setiap malam, cobalah untuk mengatur jadwal tidur yang teratur, dan melakukan dengan disiplin. Anda bisa mencoba untuk mengatur stres dan mempelajari teknik relaksasi yang bisa menenangkan otak, tubuh, serta pikiran guna mencegah epilepsi muncul. Ini dapat Anda lakukan dengan cara yoga atau meditasi. Hindari mengonsumsi narkoba dan alkohol. Hindari cahaya yang terang, lampu kelap-kelip, dan rangsangan visual lainnya yang bisa memicu kaget. Kurangi waktu Anda menonton TV dan b'),
('P008', 'Malaria', 'Malaria', 'Malaria', 'Malaria'),
('P009', 'Migrain', 'MigrainMigrain', 'Migrain', 'Migrain'),
('P010', 'Tetanus', 'Tetanus', 'Tetanus', 'Tetanus'),
('P011', 'Hipotensi', 'Hipotensi k', 'Hipotensi', 'Hipotensi');

-- --------------------------------------------------------

--
-- Table structure for table `relasi_penyakit_gejala`
--

CREATE TABLE `relasi_penyakit_gejala` (
  `kode_penyakit` varchar(4) NOT NULL,
  `kode_gejala` varchar(4) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi_penyakit_gejala`
--

INSERT INTO `relasi_penyakit_gejala` (`kode_penyakit`, `kode_gejala`, `bobot`) VALUES
('P003', 'G001', 10),
('P003', 'G005', 10),
('P003', 'G006', 20),
('P003', 'G035', 20),
('P003', 'G036', 20),
('P003', 'G037', 20),
('P004', 'G001', 20),
('P004', 'G005', 20),
('P004', 'G006', 30),
('P004', 'G015', 30),
('P005', 'G001', 5),
('P005', 'G005', 5),
('P005', 'G006', 5),
('P005', 'G007', 5),
('P005', 'G014', 10),
('P005', 'G016', 10),
('P005', 'G017', 10),
('P005', 'G020', 10),
('P005', 'G021', 10),
('P005', 'G022', 10),
('P005', 'G023', 10),
('P005', 'G031', 10),
('P006', 'G001', 25),
('P006', 'G005', 25),
('P006', 'G006', 25),
('P006', 'G030', 25),
('P007', 'G003', 30),
('P007', 'G013', 35),
('P007', 'G038', 35),
('P008', 'G003', 10),
('P008', 'G019', 10),
('P008', 'G024', 20),
('P008', 'G025', 20),
('P008', 'G026', 20),
('P008', 'G039', 20),
('P009', 'G003', 25),
('P009', 'G019', 25),
('P009', 'G027', 25),
('P009', 'G028', 25),
('P010', 'G003', 10),
('P010', 'G008', 10),
('P010', 'G018', 10),
('P010', 'G040', 10),
('P010', 'G041', 20),
('P010', 'G042', 20),
('P010', 'G043', 20),
('P011', 'G002', 10),
('P011', 'G009', 10),
('P011', 'G010', 20),
('P011', 'G011', 20),
('P011', 'G012', 20),
('P011', 'G029', 20),
('P002', 'G001', 20),
('P002', 'G004', 20),
('P002', 'G006', 30),
('P002', 'G032', 30),
('P001', 'G001', 10),
('P001', 'G004', 10),
('P001', 'G006', 20),
('P001', 'G032', 20),
('P001', 'G033', 20),
('P001', 'G034', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE `tmp_analisa` (
  `username` varchar(10) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `username` varchar(10) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `username` varchar(10) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pakar`
--
ALTER TABLE `data_pakar`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `nama_user` (`nama_user`),
  ADD KEY `usia` (`usia`),
  ADD KEY `alamat` (`alamat`),
  ADD KEY `jenis_kelamin` (`jenis_kelamin`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kode_gejala`),
  ADD KEY `kode_induk_ya` (`kode_induk_ya`);

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id_diagnosa`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `relasi_penyakit_gejala`
--
ALTER TABLE `relasi_penyakit_gejala`
  ADD KEY `kode_penyakit` (`kode_penyakit`),
  ADD KEY `kode_gejala` (`kode_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id_diagnosa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relasi_penyakit_gejala`
--
ALTER TABLE `relasi_penyakit_gejala`
  ADD CONSTRAINT `relasi_penyakit_gejala_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `penyakit` (`kode_penyakit`),
  ADD CONSTRAINT `relasi_penyakit_gejala_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `gejala` (`kode_gejala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
