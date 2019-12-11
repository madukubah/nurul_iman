-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 05:57 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurul_iman`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'uadmin', 'user admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL,
  `list_id` varchar(200) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `position` int(4) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `link`, `list_id`, `icon`, `status`, `position`, `description`) VALUES
(101, 1, 'Beranda', 'admin/', 'home_index', 'home', 1, 1, '-'),
(102, 1, 'Group', 'admin/group', 'group_index', 'home', 1, 2, '-'),
(103, 1, 'Setting', 'admin/menus', '-', 'cogs', 1, 3, '-'),
(104, 1, 'User', 'admin/user_management', 'user_management_index', 'users', 1, 4, '-'),
(106, 103, 'Menu', 'admin/menus', 'menus_index', 'circle', 1, 1, '-'),
(107, 2, 'Beranda', 'uadmin/home', 'home_index', 'home', 1, 1, '-'),
(108, 2, 'Santri', 'uadmin/student', 'student_index', 'home', 1, 2, '-'),
(109, 2, 'Iuran', 'uadmin/savings', 'savings_index', 'home', 1, 3, '-');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE `savings` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `nominal` double NOT NULL,
  `date` date NOT NULL,
  `timestamp` int(11) NOT NULL,
  `month` int(5) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `student_id`, `nominal`, `date`, `timestamp`, `month`, `year`) VALUES
(1, 180, 11100, '2019-11-20', 123443, 1, 2019),
(2, 180, 123, '2019-11-14', 123, 2, 2019),
(3, 181, 122, '2019-11-20', 12332, 1, 2019),
(4, 181, 111, '2019-11-20', 12332, 1, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `registration_number` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `ttl` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `parent_name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL,
  `photo` text NOT NULL,
  `gender` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `parent_job` varchar(200) NOT NULL,
  `study` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `registration_number`, `name`, `ttl`, `address`, `parent_name`, `phone`, `timestamp`, `photo`, `gender`, `entry_date`, `parent_job`, `study`, `status`) VALUES
(180, '1501 623', 'KHAIRIL LAUWANDY', 'KENDARI, 21 APRIL 2008', 'JL. S. KONAWEHA', 'WISING LAUWANDY', '-', 0, 'default.jpg', 1, '2015-01-30', 'WIRASWASTA', 'SLTA', 1),
(181, '1502 637', 'MUH. FEBRIAN', 'KENDARI, 22 FEBRUARI 2009', 'JL. IR SOEKARNO', 'ROSMAWATY', '-', 0, 'default.jpg', 1, '2015-01-09', 'IBU RUMAH TANGGA', 'SLTP', 1),
(182, '1503 646', 'SEFI SHABRINA NURALINI', 'KENDARI, 10 FEBRUARI 2009', 'JL. LASOLO NO. 14', 'DALIMIN', '-', 0, 'default.jpg', 1, '2015-03-06', 'WIRASWASTA', 'SLTA', 1),
(183, '1503 651', 'MUH. ADITIYA', 'KENDARI, 28 MARET 2008', 'JL. DR. MOH HATTA', 'SAMSUDDIN', '-', 0, 'default.jpg', 1, '2015-03-27', 'WIRASWASTA', 'SLTP', 1),
(184, '1504 655', 'NAILA MUAZZAHRAH MASLOMAN', 'KENDARI, 8 DESEMBER 2007', 'JL. CUMI-CUMI', 'HARTONO MASLOMAN', '-', 0, 'default.jpg', 0, '2015-04-03', 'WIRASWASTA', 'SLTA', 1),
(185, '1504 658', 'NUR HAFIZTA', 'KENDARI, 11 APRIL ', 'JL. S. KONAWEHA', 'KAMA', '-', 0, 'default.jpg', 0, '2015-04-08', 'PEDAGANG', 'SLTA', 1),
(186, '1504 622', 'IKBAL HERIAWAN', 'KENDARI, 4 MEI 2008', 'JL. PEMBAGUNAN NO. 26C', 'ILHAM', '-', 0, 'default.jpg', 1, '2015-04-27', 'PEDAGANG', 'SLTA', 1),
(187, '1504 664', 'YUSUF ARIF', 'KENDARI, 03 OKTOBER 2008', 'JL. DR. MOH HATTA', 'ARTANTO S', '-', 0, 'default.jpg', 1, '2015-05-07', 'WIRASWASTA', 'S 1', 1),
(188, '1506 677', 'NUR AISYAH AZZAHRAH', 'KENDARI, 17 SEPTEMBER 2009', 'JL. BETE-BETE NO. 3', 'SUBHAN ADU', '-', 0, 'default.jpg', 0, '2015-05-12', 'WIRASWASTA', 'SLTA', 1),
(189, '1506 678', 'NIDA UNNA MEKO', 'KENDARI, 9 SEPTEMBER 2009', 'JL. BETE-BETE NO. 3', 'SUHARTONO', '-', 0, 'default.jpg', 0, '2015-06-16', 'WIRASWASTA', 'SLTA', 1),
(190, '1508 687', 'RIDHO RAHMAT', 'KENDARI, 5 MARET 20098', 'JL. CAKALANG NO. 16', 'ARIFAI', '-', 0, 'default.jpg', 1, '2015-08-04', 'WIRASWASTA', 'SLTA', 1),
(191, '1508 691', 'MUHAMMAD ARIQIN ', 'KENDARI, 9 MEI 2008', 'JL. PEMBAGUNAN NO. 10B', 'HJ. SITI RAHMAH', '-', 0, 'default.jpg', 1, '2015-08-05', 'IBU RUMAH TANGGA', 'SLTA', 1),
(192, '1508 696', 'MUHAMMAD FADHILLAH', 'KENDARI, 18 JULI 2008', 'JL. FAJAR MERANTAU', 'SURATNO', '-', 0, 'default.jpg', 1, '1970-01-01', 'WIRASWASTA', 'SLTA', 1),
(193, '1509 704', 'MUHAMMAD ZAKI', 'KENDARI, 16 JANUARI 2009', 'JL. MOH HATTA NO. 52', 'HARUN HIBBAN', '-', 0, 'default.jpg', 1, '2015-09-01', 'PNS', 'S1', 1),
(194, '1509 706', 'SITI AZZAHRAH RAHMAT', 'KENDARI, 21 OKTOBER 2008', 'JL. TINUMBU NO. 1', 'IRWAN AHMAD', '-', 0, 'default.jpg', 0, '2015-09-03', 'WIRASWASTA', 'SLTA', 1),
(195, '1509 714', 'MUH. RAFA FADWA PRATAMA', 'KENDARI, 27 MEI 2008', 'JL. IR SOEKARNO', 'MUH. KASIM', '-', 0, 'default.jpg', 1, '2015-09-16', 'WIRASWASTA', 'SLTA', 1),
(196, '1510 718', 'AUREL SEPTIRAHMARIANTI R', 'KENDARI, 12 SEPTEMBER 2007', 'JL. CAKALANG ', 'RUSLAN', '-', 0, 'default.jpg', 0, '2015-10-07', 'WIRASWASTA', 'SLTP', 1),
(197, '1511 722', 'TIFATUL MUZANI', 'KENDARI, 01 JANUARI 2009', 'JL. KATAMBAK NO. 28', 'MUSFARIDDIN', '-', 0, 'default.jpg', 1, '2015-11-08', 'WIRASWASTA', 'SLTA', 1),
(198, '1511 724', 'SRI RIYANG RAMADHAN', 'KENDARI, 9 OKTOBER 2005', 'JL. DR. MOH HATTA', 'H. MUH RIZAL', '-', 0, 'default.jpg', 0, '2015-11-09', 'WIRASWASTA', 'SLTA', 1),
(199, '1511 728', 'AISYAH AZZAHRAH', 'KENDARI, 2 SEPTEMBER 2008', 'JL. CAKALANG', 'HERMAN KARIM', '-', 0, 'default.jpg', 0, '2015-11-19', 'WIRASWASTA', 'SLTA', 1),
(200, '1601 738', 'KHANZA DINA MASLOMAN', 'KENDARI, 11 JUNI 2011', 'JL. CUMI-CUMI', 'HARTONO MASLOMAN', '-', 0, 'default.jpg', 0, '2016-01-18', 'WIRASWASTA', 'SLTA', 1),
(201, '1603 743', 'MUH. DAVA', 'KENDARI, 9 OKTOBER 2009', 'JL. IR SOEKARNO', 'DEBI EFENDI', '-', 0, 'default.jpg', 1, '2016-03-01', 'WIRASWASTA', 'SLTA', 1),
(202, '1603 745', 'MUH. REYHAN', 'KENDARI, 9 MARET 2007', 'JL. IR SOEKARNO', 'DEBI EFENDI', '-', 0, 'default.jpg', 0, '2016-03-01', 'WIRASWASTA', 'SLTA', 1),
(203, '1605 757', 'MUHAMMAD GIO FANDI', 'KENDARI, 18 DESEMBER 2009', 'GUNUNG JATI', 'LA ODE JUDDIN', '-', 0, 'default.jpg', 1, '2016-05-05', 'TUKANG OJEK', 'SD', 1),
(204, '1605 795', 'WINDA CAHYANI ', 'BUTON, 31 DESEMBER 2008', 'GUNUNG JATI', 'FANDI', '-', 0, 'default.jpg', 0, '2016-05-23', 'WIRASWASTA', 'SLTP', 1),
(205, '1606 761', 'MUH. NABIL ABIYA', 'KENDARI, 18 MARET 2007', 'JL. IR SOEKARNO', 'ANDI RUSLI', '-', 0, 'default.jpg', 1, '2016-06-03', 'WIRASWASTA', 'SLTA', 1),
(206, '1607 762', 'AMELIA RATNA WULANDA', 'KENDARI, 21 AGUSTUS 2006', 'JL. S. KONAWEHA', 'SURATNO', '-', 0, 'default.jpg', 0, '2016-07-17', 'WIRASWASTA', 'SLTA', 1),
(207, '1609 789', 'NABILA KIRANA SARI', 'KENDARI, 31 DESEMBER 2007', 'RRI LAMA', 'NURSDIN DJAMIN', '-', 0, 'default.jpg', 0, '2016-09-17', 'WIRASWASTA', 'SLTA', 1),
(208, '1608 791', 'LUTHFI FARAS ALINAF', 'KENDARI, 15 MEI 2009', 'JL. FAJAR MERANTAU', 'WAHYUNINGSI', '-', 0, 'default.jpg', 1, '2016-08-10', 'IBU RUMAH TANGGA', 'SLTA', 1),
(209, '1608 793', 'DAVINA AURELIA', 'KENDARI, 10 JUNI 2006', 'JL. BANDANG', 'H. SUBUR ANBO ASSE', '-', 0, 'default.jpg', 0, '2016-08-09', 'WIRASWASTA', 'SLTP', 1),
(210, '1608 798', 'PERI PEBRIANSYAH', 'PUDAI, 10 FABERUARI 2007', 'JL. S. KONAWEHA', 'RIDA', '-', 0, 'default.jpg', 1, '2016-08-09', 'WIRASWASTA', 'SLTA', 1),
(211, '1608 800', 'ALIZA', 'KENDARI, 19 NOVEMBER 2008', 'JL. KAKATUA', 'IWAN', '-', 0, 'default.jpg', 0, '2016-08-16', 'WIRASWASTA', 'SLTA', 1),
(212, '1609 806', 'LUNA LIRISIA EREN', 'KENDARI, 20 AGUSTUS 2009', 'JL. S. KONAWEHA', 'ASDAR', '-', 0, 'default.jpg', 0, '2016-09-01', 'WIRASWASTA', 'SLTA', 1),
(213, '1609 808', 'HARYADI ', 'KENDARI, 18 MEI 2008', 'JL. CAKALANG', 'ABD. KADIR', '-', 0, 'default.jpg', 1, '2016-09-08', 'WIRASWASTA', 'SLTP', 1),
(214, '1611 819', 'DHAFA  DZULHILMI. W', 'KENDARI, 06 JULI 2010', 'JL. S. KONAWEHA', 'WAHID', '-', 0, 'default.jpg', 1, '2016-11-14', 'PEDAGANG', 'SLTA', 1),
(215, '1611 823', 'MUH. SYAWAL ACHMAD', 'KENDARI, 11 AGUSTUS 2009', 'JL. S. KONAWEHA', 'ACHMAD PEWA', '-', 0, 'default.jpg', 0, '2016-11-11', 'SOPIR', 'SD', 1),
(216, '1701 825', 'AINUL QOLBI', 'BONE, 5 JULI 2008', 'JL. CAKALANG ', 'ABD. RAHMAN', '-', 0, 'default.jpg', 1, '2017-01-04', '', 'SLTP', 1),
(217, '1707 841', 'AISYAH MALIKA INAYAH', 'KENDARI, 06 MARET 2011', 'JL. LASOLO', 'TIN RACMATAN', '-', 0, 'default.jpg', 0, '2017-07-25', 'PEDAGANG', 'SMK', 1),
(218, '1707 847', 'CANTIKA ANGGRAINI', 'KENDARI, 15 MEI 2009', 'JL. FAJAR MERANTAU', 'SUSANTO', '-', 0, 'default.jpg', 0, '2017-07-31', 'NELAYAN', 'SLTP', 1),
(219, '1708 851', 'FATIMAH AZZAHRA A. W', 'KENDARI, 28 MEI 2011', 'JL. FAJAR MERANTAU', 'ZAINUDDIN', '-', 0, 'default.jpg', 0, '2017-08-01', 'WIRASWASTA', 'SLTA', 1),
(220, '1708 853', 'ASRUN MUBAROK', 'KENDARI, 23 AGUSTUS 2009', 'JL. FAJAR MERANTAU', 'M. TAHANG SUDDING', '-', 0, 'default.jpg', 1, '2017-08-03', 'WIRASWASTA', 'SD', 1),
(221, '1708 859', 'MARLINDA', 'KENDARI, 11 MARET  2011', 'JL. FAJAR MERANTAU', 'HJ. ROSNAWATI', '-', 0, 'default.jpg', 0, '2017-08-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(222, '1708 863', 'ILMA SARI', 'KENDARI, 27 DESEMBER 2009', 'JL. IR SOEKARNO', 'HAIRIL ANWAR', '-', 0, 'default.jpg', 0, '2017-08-07', 'WIRASWASTA', 'SLTA', 1),
(223, '1708 866', 'ERNA WATI', 'RAHA, 28 MARET 2013', 'JL. FAJAR MERANTAU', 'RUSTAM', '-', 0, 'default.jpg', 0, '2017-08-10', 'NELAYAN', 'SLTP', 1),
(224, '1708 869', 'MUH, ABD. RAHMAN', 'KENDARI 07 JUNI 2009', 'JL. DR. MOH HATTA', 'ISMAIL', '-', 0, 'default.jpg', 1, '2017-08-10', 'WIRASWASTA', 'SLTP', 1),
(225, '1708 870', 'MUH. ADRIAN ', 'MAKASSAR  29 OKTOBER 2009', 'JL. FAJAR MERANTAU', 'RUSTAM', '-', 0, 'default.jpg', 1, '2017-08-10', 'WIRASWASTA', 'SLTP', 1),
(226, '1708 872', 'ADHWA NAIFAH ARIKHA', 'KENDARI, 21 AGUSTUS 2009', 'JL. IR SOEKARNO', 'ISDRI AWANTO SE', '-', 0, 'default.jpg', 0, '2017-08-18', 'WIRASWASTA', 'S1', 1),
(227, '1708 877', 'ZAFIRA RESKYTA PUTRI', 'KENDARI, 03 AGUSTUS 2010', 'JL. LASOLO', 'HERMAN SARMAN', '-', 0, 'default.jpg', 0, '2017-08-28', 'PNS', 'S1', 1),
(228, '1709 885', 'NUR ATHIFAH KHAIRUNNISA', 'KENDARI, 12 JUNI 2011', 'JL. IR SOEKARNO', 'ANGGRAINI', '-', 0, 'default.jpg', 0, '2017-09-11', 'WIRASWASTA', 'SLTA', 1),
(229, '1709 886', 'FADHIL KAHIRUL', 'KENDARI, 27 NOVEMBER 2007', 'JL. BANDANG', 'H. ANSAR', '-', 0, 'default.jpg', 1, '2017-09-11', 'WIRASWASTA', 'SLTA', 1),
(230, '1710 888', 'FABRIANTY', 'KENDARI, 25 FEBRUARI 2011', 'JL. CAKALANG ', 'SYUKUR', '-', 0, 'default.jpg', 0, '2017-10-02', 'WIRASWASTA', 'SLTP', 1),
(231, '1710 889', 'ARDIANSYAH', 'KENDARI, 21 JANUARI 2010', 'JL. CAKALANG', 'SYUKUR', '-', 0, 'default.jpg', 1, '2017-10-01', 'WIRASWASTA', 'SLTA', 1),
(232, '1710 890', 'AHMAD IMAAM .M', 'RAHA, 28 SEPTEMBER 2009', 'JL. MOH HATTA', 'AMRAN ALIMUDDIN', '-', 0, 'default.jpg', 1, '2017-10-02', 'WIRASWASTA', 'SLTA', 1),
(233, '1710 894', 'KAYLA ROHMATUL M', 'KENDARI, 20 JANUARI 2011', 'RRI LAMA', 'JALIAH', '-', 0, 'default.jpg', 0, '2017-10-12', 'IBU RUMAH TANGGA', 'STM', 1),
(234, '1710 895', 'ERFAN AIDHIL ADHAN', 'KENDARI, 27 NOVEMBER 2009', 'JL. CAKALANG', 'HERDIN MUKLIS', '-', 0, 'default.jpg', 1, '2017-10-12', 'WIRASWASTA', 'SLTA', 1),
(235, '1710 897', 'ASMIRANDA RAMADHANI', 'KENDARI, 14 AGUSTUS 2010', 'JL. PEMBANGUNAN', 'ILHAM', '-', 0, 'default.jpg', 0, '2017-10-19', 'WIRASWASTA', 'SMK', 1),
(236, '1711 901', 'MUHAMMAD AQILA NUGRAHA', 'KENDARI, 11 JULI 2012', 'JL. MOH HATTA', 'MUH. NUR RAMADHAN', '-', 0, 'default.jpg', 1, '2017-11-01', 'WIRASWASTA', 'SLTA', 1),
(237, '1711 902', 'ZAHRA  RAMADHAN ', 'KENDARI, 09 SPETEMBER 2009', 'JL. PEMBANGUNAN', 'MUH. AMIR', '-', 0, 'default.jpg', 0, '2017-11-02', 'WIRASWASTA', 'SLTA', 1),
(238, '1711 905', 'DINI AILANI ZAHRA MALIK', 'KENDARI, 09 FEBRUARI 2010', 'JL. DR. MOH HATTA', 'JUNI ARDI MALIK', '-', 0, 'default.jpg', 0, '2017-11-14', 'WIRASWASTA', 'SLTA', 1),
(239, '1711 906', 'DESKI NAVALIA MUTIARA', 'BONE, 03 FEBRUARI 2011', 'JL. DOWI AWI', 'ELIA', '-', 0, 'default.jpg', 0, '2017-11-15', 'WIRASWASTA', 'SLTA', 1),
(240, '1711 907', 'MUH. FATHIR NURDIN', 'KENDARI, 12 FEBRUARI 2011', 'JL. MOH HATTA', 'NURDIN', '-', 0, 'default.jpg', 1, '2017-11-16', 'PNS', 'S1', 1),
(241, '1801 911', 'AZIZAH NUR SU\'AD', 'KENDARI, 28 APRIL 2012', 'JL. CAKALANG ', 'MUH. IRWAN', '-', 0, 'default.jpg', 0, '2018-01-09', 'WIRASWASTA', 'SLTP', 1),
(242, '1801 912', 'RAHMAH AMELIA JUSRIN ', 'KENDARI, 3 MEI 2010', 'LAPULU', 'M. JUSRIN', '-', 0, 'default.jpg', 0, '2018-01-10', 'WIRASWASTA', 'SLTP', 1),
(243, '1801 915', 'KAYLILA MAI URIKA', 'KENDARI,17 OKTOBER 2011', 'JL.BETE-BETE', 'SUHARTONO', '-', 0, 'default.jpg', 0, '2018-01-18', 'WIRASWASTA', 'SLTA', 1),
(244, '1801 916', 'NUR KHUMAIRA AZZAHRA', 'KENDARI,27 NOVEMBER 2018', 'JL.IR.SOEKARNO', 'M.ROSLI', '-', 0, 'default.jpg', 0, '2018-01-19', 'WIRASWASTA', 'SLTA', 1),
(245, '1801 917', 'WD.JIHAN FARAH S.', 'KENDARI,10 JANUARI 2008', 'JL.DR.MOH HATTA', 'LAODE HALFI', '-', 0, 'default.jpg', 0, '2018-01-24', 'POLRI', '', 1),
(246, '1802 918', 'MUHAMMAD IBRA', 'KENDARI,15 FEBRUARI 2011', 'JL.IR.SOEKARNO', 'H.MUHAMMAD', '-', 0, 'default.jpg', 1, '2018-02-28', 'WIRASWASTA', 'S1', 1),
(247, '1802 919', 'KAYLA AISYA PUTRI', 'KENDARI,27 DESEMBER 2010', 'JL.SULTAN HASANUDDIN', 'HILDA APRIANTI P.S.', '-', 0, 'default.jpg', 0, '2018-02-28', 'IBU RUMAH TANGGA', 'SLTA', 1),
(248, '1804 923', 'MUH.DZUL HIJJAH', 'KENDARI,08 DESEMBER 2009', 'JL.TITANG', 'HJ.ZAENAL', '-', 0, 'default.jpg', 1, '2018-04-29', 'PEDAGANG', 'S1', 1),
(249, '1804 925', 'AURA ALFINAJMU', 'KENDARI,09 MEI 2010', 'JL.BARONANG', 'HERDI BACHTIAR', '-', 0, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'S1', 1),
(250, '1804 926', 'SYAFIRAH ATIFA FAIZAH', 'KENDARI,02 JANUARI 2011', 'JL.TINUMBU', 'FAIZAL ACHMAD', '-', 0, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'SLTA', 1),
(251, '1805 928', 'MUH.FAREL HIMAWAN', 'KENDARI,18 MARET 2008', 'JL.KONAWEHA', 'ABDUL SAMAD', '-', 0, 'default.jpg', 1, '2018-05-07', 'WIRASWASTA', 'SLTA', 1),
(252, '1805 929', 'NAGITA AULIA PUTRI', 'KENDARI,11 JANUARI 2010', 'JL.KONAWEHA', 'ABDUL SAMAD', '-', 0, 'default.jpg', 0, '2018-05-07', 'WIRASWASTA', 'SLTA', 1),
(253, '1806 933', 'MUH.IFANSYAH LOMPI', 'KENDARI,13 JANUARI 2005', 'JL.DR.MOH HATTA', 'SANTI IRFAN', '-', 0, 'default.jpg', 1, '2018-06-23', 'WIRASWASTA', 'SLTA', 1),
(254, '1807 934', 'YUNITA WIRANTI ANGGRAINI', 'KENDARI,06 MEI 2012', 'JL.DR.MOH HATTA', 'YUSRAN YUNUS', '-', 0, 'default.jpg', 0, '2018-07-02', 'POLISI', 'SLTA', 1),
(255, '1807 935', 'SAIFUL RUSLI', 'KENDARI,17 APRIL 2011', 'JL.KATAMBAK', 'MUHAMMAD RUSLI', '-', 0, 'default.jpg', 1, '2018-07-02', 'WIRASWASTA', 'SLTA', 1),
(256, '1807 936', 'MUH.RASYA', 'MAKASSAR 07 NOVEMBER 2010', 'JL.DR.MOH HATTA', 'MARIATI', '-', 0, 'default.jpg', 1, '2018-07-05', 'PEDAGANG', 'SLTA', 1),
(257, '1807 938', 'ANDI SIERA', 'KENDARI, 13 JUNI 2009', 'JL. IR SOEKARNO', 'ANDI AZWAR', '-', 0, 'default.jpg', 0, '2018-07-06', 'WIRASWASTA', 'SLTA', 1),
(258, '1807 942', 'MUH. ALDAFIN R.F.', 'KENDARI, 29 DESEMBER 2012', 'JL. BUNG TOMO', 'KAMARUDDIN', '-', 0, 'default.jpg', 1, '2018-07-09', 'WIRASWASTA', 'SLTA', 1),
(259, '1807 943', 'HELEN SAPUTRI', 'KENDARI, 31 MEI 2011', 'GUNUNG JATI', 'NARWIN', '-', 0, 'default.jpg', 0, '2018-07-09', 'BURUH HARIAN LAPAS', '', 1),
(260, '1807 944', 'NUR CAHYA MAULIDA', 'KENDARI, 16 FEBRUARI 2011', 'JL. DR. MOH HATTA', 'DEWI', '-', 0, 'default.jpg', 0, '2018-07-09', 'IBU RUMAH TANGGA', 'SLTA', 1),
(261, '1807 945', 'AISYAH MIKAILA', 'KENDARI, 01 JUNI 2011', 'JL. IR SOEKARNO', 'AMIN', '-', 0, 'default.jpg', 0, '2018-07-09', 'PETANI', 'SLTA', 1),
(262, '1807 946', 'DIANDRA ANZHANY', 'CENOEE, 17 APRIL 2011', 'JL. IR SOEKARNO', 'SUHARI', '-', 0, 'default.jpg', 0, '2017-07-10', 'IBU RUMAH TANGGA', 'SLTP', 1),
(263, '1807 950', ' MUH. ADRIANSYAH M', 'KENDARI, 24 JUNI 2011', 'JL. IR SOEKARNO', 'MUSTAKBAL', '-', 0, 'default.jpg', 1, '2018-07-12', 'WIRASWASTA', 'SLTA', 1),
(264, '1807 951', 'NUR RAMADHANI A', 'KENDARI, 17 AGUSTUS 2010', 'JL. CUMI-CUMI', 'NASRUDDIN', '-', 0, 'default.jpg', 0, '2018-07-16', 'WIRASWASTA', 'SLTA', 1),
(265, '1807 952', 'CITRA KIRANA', 'KENDARI, O2 AGUSTUS 2009', 'RRI LAMA', 'LADADUNI', '-', 0, 'default.jpg', 0, '2018-07-19', 'WIRASWASTA', 'SD', 1),
(266, '1807 953', 'WULADARI', 'KENDARI, 04 AGUSTUS 2006', 'RRI LAMA', 'LADADUNI', '-', 0, 'default.jpg', 0, '2018-07-19', 'WIRASWASTA', 'SD', 1),
(267, '1807 954', 'APRILIA', 'RAHA, 29 APRIL2009', 'GUNUNG JATI', 'LASARUNIA', '-', 0, 'default.jpg', 0, '2018-07-23', 'WIRASWASTA', 'SLTA', 1),
(268, '1807 958 ', 'PUTRI SAKINA MARLIA', 'KENDARI, 30 APRIL 2012', 'JL. DR. MOH HATTA', 'MARLIA', '-', 0, 'default.jpg', 0, '2018-07-31', 'WIRASWASTA', 'SLTA', 1),
(269, '1808 961', 'MUH. AYUB HAIRUN', 'KENDARI, 19 OKTOBER 2010', 'JL. GAJAH MADA', 'HAIRUN', '-', 0, 'default.jpg', 1, '2018-08-02', 'BURUH TANI', 'SLTA', 1),
(270, '1808 962', 'MUH. REIHAN SALBI A', 'KENDARI, 24 OKTOBER 2011', 'JL. CUMI-CUMI', 'MUH. ILYAS', '-', 0, 'default.jpg', 1, '2018-08-02', 'WIRASWASTA', 'STM', 1),
(271, '1808 963', 'MUH ANUGRAH P', 'KENDARI, 25 JUNI 2011', 'JL. S. KONAWEHA', 'BAHARUDDIN', '-', 0, 'default.jpg', 1, '2018-08-02', 'TUKANG KAYU', 'SD', 1),
(272, '1808 964', 'ASMAUL ', 'KENDARI, 25 JUNI 2005', 'GUNUNG JATI', 'DARWIS', '-', 0, 'default.jpg', 1, '2018-08-02', 'PEDAGANG', 'SD', 1),
(273, '1808 965', 'MUSTAFA ', 'KENDARI, 22PRIL 2010', 'JL. DR. MOH HATTA', 'SAMSUDDIN', '-', 0, 'default.jpg', 1, '2018-08-02', 'WIRASWASTA', 'SD', 1),
(274, '1808 966', 'MUH. ARFANDI DULLA', 'KENDARI, 13 MARET 2006', 'JL. JATI MEKAR', 'ARFAN', '-', 0, 'default.jpg', 1, '2018-08-03', 'WIRASWASTA', 'SLTA', 1),
(275, '1808 967', 'RANAL AKTAR Q.H', 'KENDARI, 14 NOVEMBER 2011', 'JL. LASOLO', 'IR. JUSRAN HALIK SP., M.Si', '-', 0, 'default.jpg', 1, '2018-08-04', 'PNS', 'S2', 1),
(276, '1808 968', 'ZULFADHIL ', 'SELAYAR, 09 SEPTEMBER 2011', 'GUNUNG JATI', 'ARFA', '-', 0, 'default.jpg', 1, '2018-08-04', 'BURUH PELABUHAN', 'SLTA', 1),
(277, '1808 969', 'SYAIFUL SALEH', 'KENDARI, 26 AGUSTUS 2012', 'JL. DR. MOH HATTA', 'SITI LELYANTI', '-', 0, 'default.jpg', 1, '2018-08-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(278, '1808 970', 'MUH SAFTIRAL', 'RAHA, 14 MEI 2002', 'JL. CUMI-CUMI', 'SARIFUDDIN', '-', 0, 'default.jpg', 1, '2018-08-04', 'WIRASWASTA', 'SLTA', 1),
(279, '1808 971', 'HELSIN', 'KENDARI, 05 MARET 2011', 'GUNUNG JATI', 'LA ODE HAERUDDIN', '-', 0, 'default.jpg', 0, '2018-08-04', 'BURUH ', 'SD', 1),
(280, '1808 973', 'WA ODE NUR AINI', 'KENDARI, 23 MEI 2011', 'GUNUNG JATI', 'LA ODE DALAMA', '-', 0, 'default.jpg', 0, '2018-08-05', 'BURUH', 'SD', 1),
(281, '1808 978', 'SAFIRA UMAR', 'KENDARI, 18 MARET 2012', 'JL. DR. MOH HATTA', 'RIDWAN UMAR', '-', 0, 'default.jpg', 0, '2018-08-07', 'WIRASWASTA', 'STM', 1),
(282, '1808 979', 'MUH. ALFANO', 'KENDARI, 04 JANUARI 2011', 'GUNUNG JATI', 'LA ODE SULI', '-', 0, 'default.jpg', 1, '2018-08-07', 'WIRASWASTA', 'SLTA', 1),
(283, '1808 980', 'SITI ALFANI', 'KENDARI, 04 JANUARI 2011', 'GUNUNG JATI', 'LA ODE SULI', '-', 0, 'default.jpg', 0, '2018-08-07', 'WIRASWASTA', 'SLTA', 1),
(284, '1808 981', 'LESTARI SUCI', 'KENDARI, 10 JANUARI 2009', 'GUNUNG JATI', 'RIA', '-', 0, 'default.jpg', 0, '2018-08-20', 'PEDAGANG', 'SLTP', 1),
(285, '1808 983', 'ALI NURUL ', 'KENDARI, 23 JANUARI 2011', 'RRI LAMA', 'REVA PAHLEVI', '-', 0, 'default.jpg', 0, '2018-08-27', 'HONORER', 'SLTA', 1),
(286, '1808 984', 'AKBAR KAISAR ', 'KENDARI, 28 DESEMBER 2011', 'JL. FAJAR MERANTAU', 'ISKANDAR', '-', 0, 'default.jpg', 1, '2018-08-29', 'WIRASWASTA', 'SLTA', 1),
(287, '1809 991', 'ARIL RAMADHAN ', 'KENDARI, 10 OKTOBER 2006', 'GUNUNG JATI', 'IRLAN', '-', 0, 'default.jpg', 1, '2018-09-24', 'BURUH', 'SLTP', 1),
(288, '1809 995', 'MUH. FAJAR', 'KENDARI, 06 JUNI 2006', '', 'H. FAJRI', '-', 0, 'default.jpg', 1, '2018-09-18', 'PEDAGANG', 'SLTA', 1),
(289, '1810 996', 'MUH. ZULKIFLI S', 'KENDARI, 23 JANUARI 2011', 'JL. FAJAR MERANTAU', 'MUH. SYAMSUL ALAM', '-', 0, 'default.jpg', 1, '2018-10-01', 'PENJAHIT', 'SLTP', 1),
(290, '1810 997', 'MUH. SAPAR', 'KENDARI, 21 JANUARI 2011', 'JL. FAJAR MERANTAU', 'SITI SULAIKHA', '-', 0, 'default.jpg', 1, '2018-10-01', 'IBU RUMAH TANGGA', 'SLTA', 1),
(291, '1810 998', 'WIDYA ASTUTI M', 'KENDARI, 19 OKTOBER 2010', 'JL. KATAMBAK ', 'AZWIRM AN M', '-', 0, 'default.jpg', 0, '2018-10-02', 'PNS', 'S1', 1),
(292, '1810 1001', 'YANTI ', 'KENDARI, 24 AGUSTUS 2010', 'GUNUNG JATI', 'DARWIS', '-', 0, 'default.jpg', 0, '2018-10-14', 'PEDAGANG', 'SD', 1),
(293, '1811 1003', 'NAILA AT TAYAH NAFIAH', 'KENDARI, 05 APRIL 2011', 'JL. TITANG', 'PANDI', '-', 0, 'default.jpg', 0, '2018-11-08', 'WIRASWASTA', 'SLTA', 1),
(294, '1812 1009', 'REYHAN ', 'KENDARI, 02 AGUSTUS 2010', 'RRI LAMA', 'NUR ANNAS', '-', 0, 'default.jpg', 1, '2018-12-08', 'WIRASWASTA', 'SLTA', 1),
(295, '1812 1010', 'DINI ALYA SALSABILA', 'KENDARI, 11 JUNI 2010', 'JL. MUTIARA', 'NISMA ADRIANI', '-', 0, 'default.jpg', 0, '2000-12-16', 'PEDAGANG', 'SLTA', 1),
(296, '1812 1011', 'MIFTAHUL AZIZAH ', 'KENDARI, 15 APRIL 2010', 'JL. CAKALANG', 'T. ISMAIL', '-', 0, 'default.jpg', 0, '2018-12-20', 'WIRASWASTA', 'S1', 1),
(297, '1901 1012', 'NABILA NUR AAFIYA', 'KENDARI, 16 NOVEMBER 2010', 'JL. DR. MOH HATTA', 'HAERUDDIN', '-', 0, 'default.jpg', 0, '2019-01-03', 'PNS', 'S1', 1),
(298, '1901 1017', 'FABIL AZHAR ', 'KENDARI 23 MARET 2009', 'JL. IR SOEKARNO', 'JUMARUWA NUHUNG, S.Pd', '-', 0, 'default.jpg', 1, '2019-01-11', 'PNS', 'S1', 1),
(299, '1901 1019', 'LD. FAHRUL REZA A', 'KIENDARI, 15 JANUARI 2012', 'ASRAMA POLSEK', 'HASRIANI', '-', 0, 'default.jpg', 1, '2019-01-30', 'PNS', 'S1', 1),
(300, '1902 1020', 'AMELIA PUTRI ', 'PARE-PERE, 17 SEPTEMBER 2011', 'JL. IR SOEKARNO', 'MULIYADI', '-', 0, 'default.jpg', 0, '2019-02-01', 'WIRASWASTA', 'SLTP', 1),
(301, '1902 1021', 'WA ODE SITI NUR HALIFAH', 'KENDARI, 06 NOVEMBER 2008', 'GUNUNG JATI', 'LA ODE HUSAINI', '-', 0, 'default.jpg', 0, '2019-02-04', 'TUKANG OJEK', 'SD', 1),
(302, '1902 1022', 'RAYA ', 'KENDARI, 31 AGUSTUS 2011', 'GUNUNG JATI', 'LA ABU', '-', 0, 'default.jpg', 0, '2019-02-13', 'BURUH HARIAN', 'SD', 1),
(303, '1902 1023', 'IZAR SAPUTRA M', 'KENDARI, 10 OKTOBER 2009', 'GUNUNG JATI', 'MADOALI', '-', 0, 'default.jpg', 1, '2019-02-25', 'BURUH', 'SLTP', 1),
(304, '1903 1024', 'MUHAMMAD REZKI', '', 'JL. S. KONAWEHA', 'H. RUSTAM', '-', 0, 'default.jpg', 1, '2019-03-03', 'WIRASWASTA', 'SLTP', 1),
(305, '1903 1025', 'ADRIANO ADRIAN BADRI', 'KENDARI, 21 NOVEMBER 2011', 'JL. POROS GUNUNG JATI', 'MARLINA, S.AMKL', '-', 0, 'default.jpg', 1, '2019-03-13', 'WIRASWASTA', 'D3', 1),
(306, '1903 1026', 'MUH. ZAINAL PRATAMA ', 'KENDARI, 07 JULI 2008', 'RRI LAMA', 'MARIATI ', '-', 0, 'default.jpg', 1, '2019-03-22', 'IBU RUMAH TANGGA', 'SLTA', 1),
(307, '1903 1027', 'NURLIANA', 'KEN DARI, 13 JULI 2008', 'GUNUNG JATI', 'NASRUN', '-', 0, 'default.jpg', 0, '2019-03-26', 'BURUH', 'SLTP', 1),
(308, '1904 1028', 'SASKIA SYARIAH SYARIF', 'KENDARI, 11 NOVEMBER 2012', 'JL. IR SOEKARNO', 'SYARIFUDDIN', '-', 0, 'default.jpg', 0, '2019-04-04', 'BURUH', 'SD', 1),
(309, '1904 1029', 'NUR AINI', 'KENDARI, 19 MEI 2011', 'JL. IR SOEKARNO', 'ABD,. MALIK HASAN', '-', 0, 'default.jpg', 0, '2011-04-10', 'WIRASWASTA', 'SD', 1),
(310, '1904 1030', 'MUH. ZULHIJJA', 'KENDARI, 08 DESEMBER 2009', 'JL. TITANG', 'H. ZAINAL', '-', 0, 'default.jpg', 1, '2019-04-03', 'WIRASWASTA', 'S1', 1),
(311, '1905 1033', 'M. ILHAM SAPUTRA', 'KENDARI, 24 OKTOBER 2010', 'JL. BANGAU', 'ALI', '-', 0, 'default.jpg', 1, '2019-05-20', 'WIRASWASTA', 'SD', 1),
(312, '1907 1036', 'ASYIFAH NUR AINI', 'PADANG, 01 SEPTEMBER 2011', 'GUNUNG JATI', 'SYAMSUARNI', '-', 0, 'default.jpg', 0, '2019-07-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(313, '1907 1037', 'YAFI NUGRAHA', 'PADANG, 18 JULI 2012', 'GUNUNG JATI', 'YENI FITRIA', '-', 0, 'default.jpg', 1, '2019-07-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(314, '1907 1038', 'GEFIRA HUSNA NUR F', 'KEBUMEN, 14 MEI 2015', 'GUNUNG JATI', 'YULI WIJIASTUTI', '-', 0, 'default.jpg', 0, '2019-07-04', 'IBU RUMAH TANGGA', 'S1', 1),
(315, '1907 1039', 'FIKA YASIRA Y', 'KENDARI, 19 JULI 2008', 'BTN GRIYA SINAJI', 'YEYEN SYAHDULLAH ARIF', '-', 0, 'default.jpg', 0, '2019-07-05', 'WIRASWASTA', 'SLTA', 1),
(316, '1907 1041', 'SITI PUTRI WULANDARI', 'KENDARI, 18 JUNI 2013', 'JL. BANGAU', 'ALI', '-', 0, 'default.jpg', 0, '2019-07-18', 'WIRASWASTA', 'SLTA', 1),
(317, '1907 1042', 'SULTAM ARRASYA', 'KENDARI, 17 JUNI 2013', 'JL. IR SOEKARNO', 'AFFANDI', '-', 0, 'default.jpg', 1, '2019-07-18', 'WIRASWASTA', 'SLTA', 1),
(318, '1907 1043', 'MUH. ADNAN ANNABA', 'KENDARI, 04 SEPTEMBER 2011', 'JL. CUMI-CUMI', 'SULAIMAN', '-', 0, 'default.jpg', 1, '2019-07-18', 'WIRASWASTA', 'SLTP', 1),
(319, '1907 1044', 'NUR QHAILA', 'KENDARI, 21 OKTOBER 2010', 'RRI LAMA', 'FERDI FALDI', '-', 0, 'default.jpg', 0, '2019-07-29', 'WIRASWASTA', 'SLTA', 1),
(320, '1907 1045', 'NAFISAH ZULFADHILLA', 'KENDARI, 25 SEPTEMBER 2013', 'GUNUNG JATI', 'SAMRIN', '-', 0, 'default.jpg', 0, '2019-07-29', 'BURUH', 'SLTP', 1),
(321, '1907 1046', 'NABILA SAMRIN', 'LOHIA, 16 JANUARI 2012', 'GUNUNG JATI', 'SAMRIN', '-', 0, 'default.jpg', 0, '2019-07-29', 'BURUH', 'SLTP', 1),
(322, '1908 1047', 'ALIF DHIAFAKRI R', 'KENDARI, 10 JULI 2013', 'GUNUNG JATI', 'LA ODE MUSLIMIN', '-', 0, 'default.jpg', 1, '2019-08-01', 'BURUH LEPAS', 'SLTA', 1),
(323, '1908 1048', 'DHIA VIESCHALOVA', 'KENDARI, ', 'JL. BARONANG', 'CHEMHARI', '-', 0, 'default.jpg', 0, '2019-08-01', 'HONORER', 'S1', 1),
(324, '1908 1049', 'IMAYAH NUR IKLASANI', 'KENDARI, 21 MEI 2012', 'JL. S. KONAWEHA', 'ABUSTANG', '-', 0, 'default.jpg', 0, '2019-08-10', 'WIRASWASTA', 'SLTA', 1),
(325, '1908 1050', 'ANDI ARAFAH GHELLI', 'KENDARI, 24 JANUARI 2014', 'JL. IR SOEKARNO', 'ANDI NURAFRI ADRIANSYAH', '-', 0, 'default.jpg', 1, '2019-08-01', 'KARYAWAN SWASTA', 'SMK', 1),
(326, '1908 1051', 'ST, ASIYAH CAHYANI ABBAS ', 'KENDARI, 06B MEI 2012', 'JL. S. KONAWEHA', 'ABBAS', '-', 0, 'default.jpg', 0, '2019-08-01', 'MEKANIK', 'SLTP', 1),
(327, '1908 1052', 'ASRIANA PELLA', 'KENDARI, 1O JU NI 2012', 'JL. PEMBAGUNAN', 'JEFRI PELLA', '-', 0, 'default.jpg', 0, '2019-08-06', 'WIRASWASTA', '. SLTA', 1),
(328, '1908 1052', 'WIDHI ARTHAMEVIA', 'TACCIPI, 18 NOVEMBER 2010', 'JL. CAKALANG', 'YESMIYATI', '-', 0, 'default.jpg', 0, '2019-08-06', '', '', 1),
(329, '1908 1024', 'ALEXA ZULFILIANA', 'KENDARI, 27 MARET 2010', 'JL. ANAWAI', 'JUMSAR', '-', 0, 'default.jpg', 0, '2019-08-10', 'WIRASWASTA', 'SLTA', 1),
(330, '1908 1055', 'RAIZUL RISYAWAL', 'KENDARI, 06 SEPTEMBER 2011', 'BTN PURI GARUDA', 'RUDI RIHARJO', '-', 0, 'default.jpg', 1, '2019-08-14', 'TNI AD', 'SLTA', 1),
(331, '1908 1056', 'LUNA SUNARTO', 'KENDARI, 21 NOVEMBER 2011', 'GUNUNG JATI', 'SUNARTO', '-', 0, 'default.jpg', 0, '2019-08-16', 'SOPIR', 'SLTA', 1),
(332, '1908 1057', 'SAVIRA', 'KENDARI, 29 NOVEMBER 2014', 'JL. IR SOEKARNO', 'ROSDIANA', '-', 0, 'default.jpg', 0, '2019-08-19', 'PEDAGANG', 'SD', 1),
(333, '1908 1058', 'ARNA BELA ARSYITA', 'KENDARI, 06 JULI 2010', 'JL. PEMBANGUNAN', 'IRMAN', '-', 0, 'default.jpg', 0, '2019-08-21', 'WIRASWASTA', 'SLTA', 1),
(334, '1908 1059', 'MELANI', 'KENDARI, 10 MEI 2015', 'MABOLU', 'UMA', '-', 0, 'default.jpg', 0, '2019-08-21', '', '', 1),
(335, '1908 1060', 'ATSHILA TALITA SULFAT', 'KENDARI, 26 NOVEMBER 2012', 'JL. CAKALANG', 'MUH. SULFI ABDULLAH', '-', 0, 'default.jpg', 0, '2019-08-21', 'WIRASWASTA', 'SLTA', 1),
(336, '1908 1061', 'ANIKA SYAM', 'SIBELAH, 26 MEI 2012', 'JL. PEMBANGUNAN', 'SAMSIL', '-', 0, 'default.jpg', 0, '2019-08-23', 'WIRASWASTA', 'SLTP', 1),
(337, '1909 1062', 'MUH. RAFLI SAPUTRA', 'KENDARI, 24 NOVEMBER 2011', 'GUNUNG JATI', 'LA EVI', '-', 0, 'default.jpg', 1, '2019-09-02', 'BURUH LEPAS', '', 1),
(338, '1909 1063', 'MUH. ALVIANTO AMIN', 'KENDARI, 28 OKTOBER 2005', 'SODOHA', 'SITI SAIRAH', '-', 0, 'default.jpg', 1, '2019-09-10', 'PEDAGANG', 'SLTA', 1),
(339, '1909 1064', 'R. DYLAN', 'KENDARI, 27 JANUARI 2013', 'JL. IR SOEKARNO', 'FIRA SABARA', '-', 0, 'default.jpg', 1, '2019-09-24', 'IBU RUMAH TANGGA', 'SLTA', 1),
(340, '1909 1065', 'ANGGI ', 'KENDARI, 16 JUNI 2011', 'GUNUNG JATI', 'WA ODE ANI', '-', 0, 'default.jpg', 0, '2019-09-24', 'PEDAGANG', 'SD', 1),
(341, '1909 1066', 'AFIFAH NABILA ', 'KENDARI, 20 AGUSTUS 2015', 'RRI LAMA', 'JORSEN', '-', 0, 'default.jpg', 1, '2019-09-24', 'PEDAGANG', 'D3', 1),
(342, '1909 1067', 'NUR AZALIA', 'KENDARI, 20 JULI 2011', 'GUNUNG JATI', 'JUSTAM', '-', 0, 'default.jpg', 0, '2019-09-24', 'BURUH', 'SLTA', 1),
(343, '1909 1068', 'ADELIA PUTRI', 'KENDARI, 13 JULI 2011', 'GUNUNG JATI', 'ALMUNI', '-', 0, 'default.jpg', 0, '2019-09-24', 'BURUH', 'SLTA', 1),
(344, '1909 1069', 'MUH. YUSUF MAULANA', 'TANGGERANG 14 JANUARI 2012', 'JL. TITANG', 'SYAMSUL ALAM', '-', 0, 'default.jpg', 1, '2019-09-24', 'WIRASWASTA', 'SLTA', 1),
(345, '1909 1070', 'DESI WA ODE', 'KENDARI, 17 DESEMBER 2009', 'GUNUNG JATI', 'LA ODE MUH. NURADI', '-', 0, 'default.jpg', 0, '2019-09-30', 'WIRASWASTA', 'SLTA', 1),
(346, '1910 1071', 'AIRIN SRI ASTRIANA', 'KENDARI, 16 DESEMBER ', 'GUNUNG JATI', 'LA ODE SUMAIDA', '-', 0, 'default.jpg', 0, '2019-10-07', 'BURUH', 'SD', 1),
(347, '1910 1072', 'MUHAMMAD ALFAN ', 'KENDARI, 20 SEPTEMBER 2009', 'GUNUNG JATI', 'RAHMAN', '-', 0, 'default.jpg', 1, '2019-10-07', 'WIRASWASTA', 'SLTA', 1),
(348, '1910 1073', 'NUR CAHAYA', 'KENDARI, ', 'GUNUNG JATI', 'HAMIDUL', '-', 0, 'default.jpg', 0, '2019-10-10', 'WIRASWASTA', 'SD', 1),
(349, '1910 1074', 'SITI AISYAH', 'KENDARI, 2 JANUARI 2009', 'GUNUNG JATI', 'ROY', '-', 0, 'default.jpg', 0, '2019-10-11', 'BURUH', 'SLTP', 1),
(350, '1910 1075', 'RIFAL ALI ', '1-Feb-08', 'GUNUNG JATI', 'LA ODE FILIU', '-', 0, 'default.jpg', 1, '2019-10-12', 'BURUH', 'SD', 1),
(351, '1910 1076', 'RAFKA ADITYA', 'KENDARI, 08 JULI 2012', 'JL. IR SOEKARNO', 'ZAKARIA', '-', 0, 'default.jpg', 1, '2019-10-12', 'WIRASWASTA', 'SLTA', 1),
(352, '1910 1077', 'MUH. RASYA RAMADHAN', 'KENDARI, 3 SEPTEMBER 2012', 'JL. LASOLO', 'JISMA JINAS', '-', 0, 'default.jpg', 1, '2019-10-12', 'POLISI', 'SLTA', 1),
(353, '1910 1078', 'SAHWA NUR KHALIFAH', 'KENDARI,', 'JL. BETE-BETE NO. 4', 'ERNA NINGSIH', '-', 1575103250, 'default.jpg', 0, '2019-10-16', 'WIRASWASTA', 'SLTA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` text NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `image`, `address`) VALUES
(1, '127.0.0.1', 'admin@fixl.com', '$2y$12$XpBgMvQ5JzfvN3PTgf/tA.XwxbCOs3mO0a10oP9/11qi1NUpv46.u', 'admin@fixl.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1573732643, 1, 'Admin', 'istrator', '081342989185', 'USER_1_1571554027.jpeg', 'admin'),
(13, '::1', 'uadmin@gmail.com', '$2y$10$78SZyvKRKMU7nPCew9w4nOpEUmJ1SeTV4L4ZG2NXXSfbEaswqoepq', 'uadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568678256, 1576040060, 1, 'admin', 'TPA', '00', 'USER_13_1568678463.jpg', 'jln mutiara no 8');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(29, 13, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=354;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
