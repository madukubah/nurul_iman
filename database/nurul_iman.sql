-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 21 Feb 2020 pada 16.16
-- Versi Server: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL,
  `preview` text NOT NULL,
  `file_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `organization_id`, `name`, `date`, `image`, `preview`, `file_content`) VALUES
(1, 1, 'Lomba Ngaji', '2020-01-11', '1579248682_ACTIVITY_Lomba_Ngaji_1579248682.jpg', 'Lomba Mengaji yang di laksanakan di Masjid Nurul Iman dan diikuti oleh seluruh santri TPA Nurul Iman', 'ACTIVITY__1579249581.html'),
(2, 2, 'Majelis Taklim Pemersatu Umat', '2016-03-11', '1581000570_ACTIVITY_Majelis_Taklim_Pemersatu_Umat_1581000570.jpg', '-', 'ACTIVITY__1581000570.html'),
(3, 3, 'Membangun Generasi Muda Suka ke Masjid', '2016-09-22', '1581000842_ACTIVITY_Membangun_Generasi_Muda_Suka_ke_Masjid_1581000842.jpg', '-', 'ACTIVITY__1581000842.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `assessment`
--

CREATE TABLE `assessment` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `knowledge` int(5) NOT NULL,
  `attitude` int(5) NOT NULL,
  `class` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `assessment`
--

INSERT INTO `assessment` (`id`, `student_id`, `knowledge`, `attitude`, `class`, `description`) VALUES
(1, 174, 80, 90, 'A', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `organization_id`, `type`, `name`, `description`, `file`) VALUES
(1, 3, 2, 'Nama', '-', '1579246023_IMG_20191224_182741.jpg'),
(2, 2, 1, 'Struktur Majelis Ta\'lim', '-', '1579249639_IMG_20191224_182741.jpg'),
(3, 2, 2, 'Pengurus', '-', '1579249661_www.png'),
(4, 3, 1, 'Struktur Remaja Mesjid', '-', '1581040333_historic-sultan-ahmet-mosque-vector-illustration.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'uadmin', 'user admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
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
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `link`, `list_id`, `icon`, `status`, `position`, `description`) VALUES
(101, 1, 'Beranda', 'admin/', 'home_index', 'home', 1, 1, '-'),
(102, 1, 'Group', 'admin/group', 'group_index', 'home', 1, 2, '-'),
(103, 1, 'Setting', 'admin/menus', '-', 'cogs', 1, 3, '-'),
(104, 1, 'User', 'admin/user_management', 'user_management_index', 'users', 1, 4, '-'),
(106, 103, 'Menu', 'admin/menus', 'menus_index', 'circle', 1, 1, '-'),
(107, 2, 'Beranda', 'uadmin/home', 'home_index', 'home', 1, 1, '-'),
(108, 2, 'Santri', 'uadmin/student', 'student_index', 'home', 1, 2, '-'),
(109, 2, 'Iuran', 'uadmin/savings', 'savings_index', 'home', 1, 3, '-'),
(110, 2, 'BLOGS', 'header', '-', 'home', 1, 10, '-'),
(111, 2, 'TPA', 'uadmin/', '-', 'home', 1, 11, '-'),
(112, 2, 'Majelis Taklim', 'uadmin/', '-', 'home', 1, 12, '-'),
(113, 2, 'RIMNIS', 'uadmin/', '-', 'home', 1, 13, '-'),
(114, 111, 'Kegiatan TPA', 'uadmin/activities/index/1', 'activities_index_1', 'home', 1, 1, '-'),
(115, 111, 'Data Guru', 'uadmin/teacher', 'teacher_index', 'home', 1, 1, '-'),
(116, 112, 'Kegiatan', 'uadmin/activities/index/2', 'activities_index_2', 'home', 1, 1, '-'),
(117, 112, 'Bagan Struktur', 'uadmin/structural/index/2', 'structural_index_2', 'home', 1, 1, '-'),
(118, 112, 'Data Pengurus', 'uadmin/caretaker/index/2', 'caretaker_index_2', 'home', 1, 1, '-'),
(119, 113, 'Kegiatan', 'uadmin/activities/index/3', 'activities_index_3', 'home', 1, 1, '-'),
(120, 113, 'Bagan Struktur', 'uadmin/structural/index/3', 'structural_index_3', 'home', 1, 1, '-'),
(121, 113, 'Data Pengurus', 'uadmin/caretaker/index/3', 'caretaker_index_3', 'home', 1, 1, '-'),
(122, 2, 'Profil Mesjid', 'uadmin/profile', 'profile_index', 'home', 1, 4, '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mosque`
--

CREATE TABLE `mosque` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `organization`
--

CREATE TABLE `organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `organization`
--

INSERT INTO `organization` (`id`, `name`, `description`) VALUES
(1, 'TPA Nurul Iman', 'Taman Pendidikan Al-Qur\'an Masjid Nurul Iman'),
(2, 'Majelis Ta\'lim Nurul Iman', 'Majelis Ta\'lim Masjid Nurul Iman'),
(3, 'RIMNIS Nurul Iman', 'Remaja Masjid Nurul Iman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `savings`
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
-- Dumping data untuk tabel `savings`
--

INSERT INTO `savings` (`id`, `student_id`, `nominal`, `date`, `timestamp`, `month`, `year`) VALUES
(1, 174, 50000, '2020-01-12', 1578812789, 1, 2020),
(2, 174, 2000, '2020-02-12', 1578981982, 2, 2020);

-- --------------------------------------------------------

--
-- Struktur dari tabel `structural`
--

CREATE TABLE `structural` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `student`
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
-- Dumping data untuk tabel `student`
--

INSERT INTO `student` (`id`, `registration_number`, `name`, `ttl`, `address`, `parent_name`, `phone`, `timestamp`, `photo`, `gender`, `entry_date`, `parent_job`, `study`, `status`) VALUES
(1, '1501 623', 'KHAIRIL LAUWANDY', 'KENDARI, 21 APRIL 2008', 'JL. S. KONAWEHA', 'WISING LAUWANDY', '-', 0, 'default.jpg', 1, '2015-01-30', 'WIRASWASTA', 'SLTA', 1),
(2, '1502 637', 'MUH. FEBRIAN', 'KENDARI, 22 FEBRUARI 2009', 'JL. IR SOEKARNO', 'ROSMAWATY', '-', 0, 'default.jpg', 1, '2015-01-09', 'IBU RUMAH TANGGA', 'SLTP', 1),
(3, '1503 646', 'SEFI SHABRINA NURALINI', 'KENDARI, 10 FEBRUARI 2009', 'JL. LASOLO NO. 14', 'DALIMIN', '-', 0, 'default.jpg', 1, '2015-03-06', 'WIRASWASTA', 'SLTA', 1),
(4, '1503 651', 'MUH. ADITIYA', 'KENDARI, 28 MARET 2008', 'JL. DR. MOH HATTA', 'SAMSUDDIN', '-', 0, 'default.jpg', 1, '2015-03-27', 'WIRASWASTA', 'SLTP', 1),
(5, '1504 655', 'NAILA MUAZZAHRAH MASLOMAN', 'KENDARI, 8 DESEMBER 2007', 'JL. CUMI-CUMI', 'HARTONO MASLOMAN', '-', 0, 'default.jpg', 0, '2015-04-03', 'WIRASWASTA', 'SLTA', 1),
(6, '1504 658', 'NUR HAFIZTA', 'KENDARI, 11 APRIL ', 'JL. S. KONAWEHA', 'KAMA', '-', 0, 'default.jpg', 0, '2015-04-08', 'PEDAGANG', 'SLTA', 1),
(7, '1504 622', 'IKBAL HERIAWAN', 'KENDARI, 4 MEI 2008', 'JL. PEMBAGUNAN NO. 26C', 'ILHAM', '-', 0, 'default.jpg', 1, '2015-04-27', 'PEDAGANG', 'SLTA', 1),
(8, '1504 664', 'YUSUF ARIF', 'KENDARI, 03 OKTOBER 2008', 'JL. DR. MOH HATTA', 'ARTANTO S', '-', 0, 'default.jpg', 1, '2015-05-07', 'WIRASWASTA', 'S 1', 1),
(9, '1506 677', 'NUR AISYAH AZZAHRAH', 'KENDARI, 17 SEPTEMBER 2009', 'JL. BETE-BETE NO. 3', 'SUBHAN ADU', '-', 0, 'default.jpg', 0, '2015-05-12', 'WIRASWASTA', 'SLTA', 1),
(10, '1506 678', 'NIDA UNNA MEKO', 'KENDARI, 9 SEPTEMBER 2009', 'JL. BETE-BETE NO. 3', 'SUHARTONO', '-', 0, 'default.jpg', 0, '2015-06-16', 'WIRASWASTA', 'SLTA', 1),
(11, '1508 687', 'RIDHO RAHMAT', 'KENDARI, 5 MARET 20098', 'JL. CAKALANG NO. 16', 'ARIFAI', '-', 0, 'default.jpg', 1, '2015-08-04', 'WIRASWASTA', 'SLTA', 1),
(12, '1508 691', 'MUHAMMAD ARIQIN ', 'KENDARI, 9 MEI 2008', 'JL. PEMBAGUNAN NO. 10B', 'HJ. SITI RAHMAH', '-', 0, 'default.jpg', 1, '2015-08-05', 'IBU RUMAH TANGGA', 'SLTA', 1),
(13, '1508 696', 'MUHAMMAD FADHILLAH', 'KENDARI, 18 JULI 2008', 'JL. FAJAR MERANTAU', 'SURATNO', '-', 0, 'default.jpg', 1, '1970-01-01', 'WIRASWASTA', 'SLTA', 1),
(14, '1509 704', 'MUHAMMAD ZAKI', 'KENDARI, 16 JANUARI 2009', 'JL. MOH HATTA NO. 52', 'HARUN HIBBAN', '-', 0, 'default.jpg', 1, '2015-09-01', 'PNS', 'S1', 1),
(15, '1509 706', 'SITI AZZAHRAH RAHMAT', 'KENDARI, 21 OKTOBER 2008', 'JL. TINUMBU NO. 1', 'IRWAN AHMAD', '-', 0, 'default.jpg', 0, '2015-09-03', 'WIRASWASTA', 'SLTA', 1),
(16, '1509 714', 'MUH. RAFA FADWA PRATAMA', 'KENDARI, 27 MEI 2008', 'JL. IR SOEKARNO', 'MUH. KASIM', '-', 0, 'default.jpg', 1, '2015-09-16', 'WIRASWASTA', 'SLTA', 1),
(17, '1510 718', 'AUREL SEPTIRAHMARIANTI R', 'KENDARI, 12 SEPTEMBER 2007', 'JL. CAKALANG ', 'RUSLAN', '-', 0, 'default.jpg', 0, '2015-10-07', 'WIRASWASTA', 'SLTP', 1),
(18, '1511 722', 'TIFATUL MUZANI', 'KENDARI, 01 JANUARI 2009', 'JL. KATAMBAK NO. 28', 'MUSFARIDDIN', '-', 0, 'default.jpg', 1, '2015-11-08', 'WIRASWASTA', 'SLTA', 1),
(19, '1511 724', 'SRI RIYANG RAMADHAN', 'KENDARI, 9 OKTOBER 2005', 'JL. DR. MOH HATTA', 'H. MUH RIZAL', '-', 0, 'default.jpg', 0, '2015-11-09', 'WIRASWASTA', 'SLTA', 1),
(20, '1511 728', 'AISYAH AZZAHRAH', 'KENDARI, 2 SEPTEMBER 2008', 'JL. CAKALANG', 'HERMAN KARIM', '-', 0, 'default.jpg', 0, '2015-11-19', 'WIRASWASTA', 'SLTA', 1),
(21, '1601 738', 'KHANZA DINA MASLOMAN', 'KENDARI, 11 JUNI 2011', 'JL. CUMI-CUMI', 'HARTONO MASLOMAN', '-', 0, 'default.jpg', 0, '2016-01-18', 'WIRASWASTA', 'SLTA', 1),
(22, '1603 743', 'MUH. DAVA', 'KENDARI, 9 OKTOBER 2009', 'JL. IR SOEKARNO', 'DEBI EFENDI', '-', 0, 'default.jpg', 1, '2016-03-01', 'WIRASWASTA', 'SLTA', 1),
(23, '1603 745', 'MUH. REYHAN', 'KENDARI, 9 MARET 2007', 'JL. IR SOEKARNO', 'DEBI EFENDI', '-', 0, 'default.jpg', 0, '2016-03-01', 'WIRASWASTA', 'SLTA', 1),
(24, '1605 757', 'MUHAMMAD GIO FANDI', 'KENDARI, 18 DESEMBER 2009', 'GUNUNG JATI', 'LA ODE JUDDIN', '-', 0, 'default.jpg', 1, '2016-05-05', 'TUKANG OJEK', 'SD', 1),
(25, '1605 795', 'WINDA CAHYANI ', 'BUTON, 31 DESEMBER 2008', 'GUNUNG JATI', 'FANDI', '-', 0, 'default.jpg', 0, '2016-05-23', 'WIRASWASTA', 'SLTP', 1),
(26, '1606 761', 'MUH. NABIL ABIYA', 'KENDARI, 18 MARET 2007', 'JL. IR SOEKARNO', 'ANDI RUSLI', '-', 0, 'default.jpg', 1, '2016-06-03', 'WIRASWASTA', 'SLTA', 1),
(27, '1607 762', 'AMELIA RATNA WULANDA', 'KENDARI, 21 AGUSTUS 2006', 'JL. S. KONAWEHA', 'SURATNO', '-', 0, 'default.jpg', 0, '2016-07-17', 'WIRASWASTA', 'SLTA', 1),
(28, '1609 789', 'NABILA KIRANA SARI', 'KENDARI, 31 DESEMBER 2007', 'RRI LAMA', 'NURSDIN DJAMIN', '-', 0, 'default.jpg', 0, '2016-09-17', 'WIRASWASTA', 'SLTA', 1),
(29, '1608 791', 'LUTHFI FARAS ALINAF', 'KENDARI, 15 MEI 2009', 'JL. FAJAR MERANTAU', 'WAHYUNINGSI', '-', 0, 'default.jpg', 1, '2016-08-10', 'IBU RUMAH TANGGA', 'SLTA', 1),
(30, '1608 793', 'DAVINA AURELIA', 'KENDARI, 10 JUNI 2006', 'JL. BANDANG', 'H. SUBUR ANBO ASSE', '-', 0, 'default.jpg', 0, '2016-08-09', 'WIRASWASTA', 'SLTP', 1),
(31, '1608 798', 'PERI PEBRIANSYAH', 'PUDAI, 10 FABERUARI 2007', 'JL. S. KONAWEHA', 'RIDA', '-', 0, 'default.jpg', 1, '2016-08-09', 'WIRASWASTA', 'SLTA', 1),
(32, '1608 800', 'ALIZA', 'KENDARI, 19 NOVEMBER 2008', 'JL. KAKATUA', 'IWAN', '-', 0, 'default.jpg', 0, '2016-08-16', 'WIRASWASTA', 'SLTA', 1),
(33, '1609 806', 'LUNA LIRISIA EREN', 'KENDARI, 20 AGUSTUS 2009', 'JL. S. KONAWEHA', 'ASDAR', '-', 0, 'default.jpg', 0, '2016-09-01', 'WIRASWASTA', 'SLTA', 1),
(34, '1609 808', 'HARYADI ', 'KENDARI, 18 MEI 2008', 'JL. CAKALANG', 'ABD. KADIR', '-', 0, 'default.jpg', 1, '2016-09-08', 'WIRASWASTA', 'SLTP', 1),
(35, '1611 819', 'DHAFA  DZULHILMI. W', 'KENDARI, 06 JULI 2010', 'JL. S. KONAWEHA', 'WAHID', '-', 0, 'default.jpg', 1, '2016-11-14', 'PEDAGANG', 'SLTA', 1),
(36, '1611 823', 'MUH. SYAWAL ACHMAD', 'KENDARI, 11 AGUSTUS 2009', 'JL. S. KONAWEHA', 'ACHMAD PEWA', '-', 0, 'default.jpg', 0, '2016-11-11', 'SOPIR', 'SD', 1),
(37, '1701 825', 'AINUL QOLBI', 'BONE, 5 JULI 2008', 'JL. CAKALANG ', 'ABD. RAHMAN', '-', 0, 'default.jpg', 1, '2017-01-04', '', 'SLTP', 1),
(38, '1707 841', 'AISYAH MALIKA INAYAH', 'KENDARI, 06 MARET 2011', 'JL. LASOLO', 'TIN RACMATAN', '-', 0, 'default.jpg', 0, '2017-07-25', 'PEDAGANG', 'SMK', 1),
(39, '1707 847', 'CANTIKA ANGGRAINI', 'KENDARI, 15 MEI 2009', 'JL. FAJAR MERANTAU', 'SUSANTO', '-', 0, 'default.jpg', 0, '2017-07-31', 'NELAYAN', 'SLTP', 1),
(40, '1708 851', 'FATIMAH AZZAHRA A. W', 'KENDARI, 28 MEI 2011', 'JL. FAJAR MERANTAU', 'ZAINUDDIN', '-', 0, 'default.jpg', 0, '2017-08-01', 'WIRASWASTA', 'SLTA', 1),
(41, '1708 853', 'ASRUN MUBAROK', 'KENDARI, 23 AGUSTUS 2009', 'JL. FAJAR MERANTAU', 'M. TAHANG SUDDING', '-', 0, 'default.jpg', 1, '2017-08-03', 'WIRASWASTA', 'SD', 1),
(42, '1708 859', 'MARLINDA', 'KENDARI, 11 MARET  2011', 'JL. FAJAR MERANTAU', 'HJ. ROSNAWATI', '-', 0, 'default.jpg', 0, '2017-08-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(43, '1708 863', 'ILMA SARI', 'KENDARI, 27 DESEMBER 2009', 'JL. IR SOEKARNO', 'HAIRIL ANWAR', '-', 0, 'default.jpg', 0, '2017-08-07', 'WIRASWASTA', 'SLTA', 1),
(44, '1708 866', 'ERNA WATI', 'RAHA, 28 MARET 2013', 'JL. FAJAR MERANTAU', 'RUSTAM', '-', 0, 'default.jpg', 0, '2017-08-10', 'NELAYAN', 'SLTP', 1),
(45, '1708 869', 'MUH, ABD. RAHMAN', 'KENDARI 07 JUNI 2009', 'JL. DR. MOH HATTA', 'ISMAIL', '-', 0, 'default.jpg', 1, '2017-08-10', 'WIRASWASTA', 'SLTP', 1),
(46, '1708 870', 'MUH. ADRIAN ', 'MAKASSAR  29 OKTOBER 2009', 'JL. FAJAR MERANTAU', 'RUSTAM', '-', 0, 'default.jpg', 1, '2017-08-10', 'WIRASWASTA', 'SLTP', 1),
(47, '1708 872', 'ADHWA NAIFAH ARIKHA', 'KENDARI, 21 AGUSTUS 2009', 'JL. IR SOEKARNO', 'ISDRI AWANTO SE', '-', 0, 'default.jpg', 0, '2017-08-18', 'WIRASWASTA', 'S1', 1),
(48, '1708 877', 'ZAFIRA RESKYTA PUTRI', 'KENDARI, 03 AGUSTUS 2010', 'JL. LASOLO', 'HERMAN SARMAN', '-', 0, 'default.jpg', 0, '2017-08-28', 'PNS', 'S1', 1),
(49, '1709 885', 'NUR ATHIFAH KHAIRUNNISA', 'KENDARI, 12 JUNI 2011', 'JL. IR SOEKARNO', 'ANGGRAINI', '-', 0, 'default.jpg', 0, '2017-09-11', 'WIRASWASTA', 'SLTA', 1),
(50, '1709 886', 'FADHIL KAHIRUL', 'KENDARI, 27 NOVEMBER 2007', 'JL. BANDANG', 'H. ANSAR', '-', 0, 'default.jpg', 1, '2017-09-11', 'WIRASWASTA', 'SLTA', 1),
(51, '1710 888', 'FABRIANTY', 'KENDARI, 25 FEBRUARI 2011', 'JL. CAKALANG ', 'SYUKUR', '-', 0, 'default.jpg', 0, '2017-10-02', 'WIRASWASTA', 'SLTP', 1),
(52, '1710 889', 'ARDIANSYAH', 'KENDARI, 21 JANUARI 2010', 'JL. CAKALANG', 'SYUKUR', '-', 0, 'default.jpg', 1, '2017-10-01', 'WIRASWASTA', 'SLTA', 1),
(53, '1710 890', 'AHMAD IMAAM .M', 'RAHA, 28 SEPTEMBER 2009', 'JL. MOH HATTA', 'AMRAN ALIMUDDIN', '-', 0, 'default.jpg', 1, '2017-10-02', 'WIRASWASTA', 'SLTA', 1),
(54, '1710 894', 'KAYLA ROHMATUL M', 'KENDARI, 20 JANUARI 2011', 'RRI LAMA', 'JALIAH', '-', 0, 'default.jpg', 0, '2017-10-12', 'IBU RUMAH TANGGA', 'STM', 1),
(55, '1710 895', 'ERFAN AIDHIL ADHAN', 'KENDARI, 27 NOVEMBER 2009', 'JL. CAKALANG', 'HERDIN MUKLIS', '-', 0, 'default.jpg', 1, '2017-10-12', 'WIRASWASTA', 'SLTA', 1),
(56, '1710 897', 'ASMIRANDA RAMADHANI', 'KENDARI, 14 AGUSTUS 2010', 'JL. PEMBANGUNAN', 'ILHAM', '-', 0, 'default.jpg', 0, '2017-10-19', 'WIRASWASTA', 'SMK', 1),
(57, '1711 901', 'MUHAMMAD AQILA NUGRAHA', 'KENDARI, 11 JULI 2012', 'JL. MOH HATTA', 'MUH. NUR RAMADHAN', '-', 0, 'default.jpg', 1, '2017-11-01', 'WIRASWASTA', 'SLTA', 1),
(58, '1711 902', 'ZAHRA  RAMADHAN ', 'KENDARI, 09 SPETEMBER 2009', 'JL. PEMBANGUNAN', 'MUH. AMIR', '-', 0, 'default.jpg', 0, '2017-11-02', 'WIRASWASTA', 'SLTA', 1),
(59, '1711 905', 'DINI AILANI ZAHRA MALIK', 'KENDARI, 09 FEBRUARI 2010', 'JL. DR. MOH HATTA', 'JUNI ARDI MALIK', '-', 0, 'default.jpg', 0, '2017-11-14', 'WIRASWASTA', 'SLTA', 1),
(60, '1711 906', 'DESKI NAVALIA MUTIARA', 'BONE, 03 FEBRUARI 2011', 'JL. DOWI AWI', 'ELIA', '-', 0, 'default.jpg', 0, '2017-11-15', 'WIRASWASTA', 'SLTA', 1),
(61, '1711 907', 'MUH. FATHIR NURDIN', 'KENDARI, 12 FEBRUARI 2011', 'JL. MOH HATTA', 'NURDIN', '-', 0, 'default.jpg', 1, '2017-11-16', 'PNS', 'S1', 1),
(62, '1801 911', 'AZIZAH NUR SU\'AD', 'KENDARI, 28 APRIL 2012', 'JL. CAKALANG ', 'MUH. IRWAN', '-', 0, 'default.jpg', 0, '2018-01-09', 'WIRASWASTA', 'SLTP', 1),
(63, '1801 912', 'RAHMAH AMELIA JUSRIN ', 'KENDARI, 3 MEI 2010', 'LAPULU', 'M. JUSRIN', '-', 0, 'default.jpg', 0, '2018-01-10', 'WIRASWASTA', 'SLTP', 1),
(64, '1801 915', 'KAYLILA MAI URIKA', 'KENDARI,17 OKTOBER 2011', 'JL.BETE-BETE', 'SUHARTONO', '-', 0, 'default.jpg', 0, '2018-01-18', 'WIRASWASTA', 'SLTA', 1),
(65, '1801 916', 'NUR KHUMAIRA AZZAHRA', 'KENDARI,27 NOVEMBER 2018', 'JL.IR.SOEKARNO', 'M.ROSLI', '-', 0, 'default.jpg', 0, '2018-01-19', 'WIRASWASTA', 'SLTA', 1),
(66, '1801 917', 'WD.JIHAN FARAH S.', 'KENDARI,10 JANUARI 2008', 'JL.DR.MOH HATTA', 'LAODE HALFI', '-', 0, 'default.jpg', 0, '2018-01-24', 'POLRI', '', 1),
(67, '1802 918', 'MUHAMMAD IBRA', 'KENDARI,15 FEBRUARI 2011', 'JL.IR.SOEKARNO', 'H.MUHAMMAD', '-', 0, 'default.jpg', 1, '2018-02-28', 'WIRASWASTA', 'S1', 1),
(68, '1802 919', 'KAYLA AISYA PUTRI', 'KENDARI,27 DESEMBER 2010', 'JL.SULTAN HASANUDDIN', 'HILDA APRIANTI P.S.', '-', 0, 'default.jpg', 0, '2018-02-28', 'IBU RUMAH TANGGA', 'SLTA', 1),
(69, '1804 923', 'MUH.DZUL HIJJAH', 'KENDARI,08 DESEMBER 2009', 'JL.TITANG', 'HJ.ZAENAL', '-', 0, 'default.jpg', 1, '2018-04-29', 'PEDAGANG', 'S1', 1),
(70, '1804 925', 'AURA ALFINAJMU', 'KENDARI,09 MEI 2010', 'JL.BARONANG', 'HERDI BACHTIAR', '-', 0, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'S1', 1),
(71, '1804 926', 'SYAFIRAH ATIFA FAIZAH', 'KENDARI,02 JANUARI 2011', 'JL.TINUMBU', 'FAIZAL ACHMAD', '-', 0, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'SLTA', 1),
(72, '1805 928', 'MUH.FAREL HIMAWAN', 'KENDARI,18 MARET 2008', 'JL.KONAWEHA', 'ABDUL SAMAD', '-', 0, 'default.jpg', 1, '2018-05-07', 'WIRASWASTA', 'SLTA', 1),
(73, '1805 929', 'NAGITA AULIA PUTRI', 'KENDARI,11 JANUARI 2010', 'JL.KONAWEHA', 'ABDUL SAMAD', '-', 0, 'default.jpg', 0, '2018-05-07', 'WIRASWASTA', 'SLTA', 1),
(74, '1806 933', 'MUH.IFANSYAH LOMPI', 'KENDARI,13 JANUARI 2005', 'JL.DR.MOH HATTA', 'SANTI IRFAN', '-', 0, 'default.jpg', 1, '2018-06-23', 'WIRASWASTA', 'SLTA', 1),
(75, '1807 934', 'YUNITA WIRANTI ANGGRAINI', 'KENDARI,06 MEI 2012', 'JL.DR.MOH HATTA', 'YUSRAN YUNUS', '-', 0, 'default.jpg', 0, '2018-07-02', 'POLISI', 'SLTA', 1),
(76, '1807 935', 'SAIFUL RUSLI', 'KENDARI,17 APRIL 2011', 'JL.KATAMBAK', 'MUHAMMAD RUSLI', '-', 0, 'default.jpg', 1, '2018-07-02', 'WIRASWASTA', 'SLTA', 1),
(77, '1807 936', 'MUH.RASYA', 'MAKASSAR 07 NOVEMBER 2010', 'JL.DR.MOH HATTA', 'MARIATI', '-', 0, 'default.jpg', 1, '2018-07-05', 'PEDAGANG', 'SLTA', 1),
(78, '1807 938', 'ANDI SIERA', 'KENDARI, 13 JUNI 2009', 'JL. IR SOEKARNO', 'ANDI AZWAR', '-', 0, 'default.jpg', 0, '2018-07-06', 'WIRASWASTA', 'SLTA', 1),
(79, '1807 942', 'MUH. ALDAFIN R.F.', 'KENDARI, 29 DESEMBER 2012', 'JL. BUNG TOMO', 'KAMARUDDIN', '-', 0, 'default.jpg', 1, '2018-07-09', 'WIRASWASTA', 'SLTA', 1),
(80, '1807 943', 'HELEN SAPUTRI', 'KENDARI, 31 MEI 2011', 'GUNUNG JATI', 'NARWIN', '-', 0, 'default.jpg', 0, '2018-07-09', 'BURUH HARIAN LAPAS', '', 1),
(81, '1807 944', 'NUR CAHYA MAULIDA', 'KENDARI, 16 FEBRUARI 2011', 'JL. DR. MOH HATTA', 'DEWI', '-', 0, 'default.jpg', 0, '2018-07-09', 'IBU RUMAH TANGGA', 'SLTA', 1),
(82, '1807 945', 'AISYAH MIKAILA', 'KENDARI, 01 JUNI 2011', 'JL. IR SOEKARNO', 'AMIN', '-', 0, 'default.jpg', 0, '2018-07-09', 'PETANI', 'SLTA', 1),
(83, '1807 946', 'DIANDRA ANZHANY', 'CENOEE, 17 APRIL 2011', 'JL. IR SOEKARNO', 'SUHARI', '-', 0, 'default.jpg', 0, '2017-07-10', 'IBU RUMAH TANGGA', 'SLTP', 1),
(84, '1807 950', ' MUH. ADRIANSYAH M', 'KENDARI, 24 JUNI 2011', 'JL. IR SOEKARNO', 'MUSTAKBAL', '-', 0, 'default.jpg', 1, '2018-07-12', 'WIRASWASTA', 'SLTA', 1),
(85, '1807 951', 'NUR RAMADHANI A', 'KENDARI, 17 AGUSTUS 2010', 'JL. CUMI-CUMI', 'NASRUDDIN', '-', 0, 'default.jpg', 0, '2018-07-16', 'WIRASWASTA', 'SLTA', 1),
(86, '1807 952', 'CITRA KIRANA', 'KENDARI, O2 AGUSTUS 2009', 'RRI LAMA', 'LADADUNI', '-', 0, 'default.jpg', 0, '2018-07-19', 'WIRASWASTA', 'SD', 1),
(87, '1807 953', 'WULADARI', 'KENDARI, 04 AGUSTUS 2006', 'RRI LAMA', 'LADADUNI', '-', 0, 'default.jpg', 0, '2018-07-19', 'WIRASWASTA', 'SD', 1),
(88, '1807 954', 'APRILIA', 'RAHA, 29 APRIL2009', 'GUNUNG JATI', 'LASARUNIA', '-', 0, 'default.jpg', 0, '2018-07-23', 'WIRASWASTA', 'SLTA', 1),
(89, '1807 958 ', 'PUTRI SAKINA MARLIA', 'KENDARI, 30 APRIL 2012', 'JL. DR. MOH HATTA', 'MARLIA', '-', 0, 'default.jpg', 0, '2018-07-31', 'WIRASWASTA', 'SLTA', 1),
(90, '1808 961', 'MUH. AYUB HAIRUN', 'KENDARI, 19 OKTOBER 2010', 'JL. GAJAH MADA', 'HAIRUN', '-', 0, 'default.jpg', 1, '2018-08-02', 'BURUH TANI', 'SLTA', 1),
(91, '1808 962', 'MUH. REIHAN SALBI A', 'KENDARI, 24 OKTOBER 2011', 'JL. CUMI-CUMI', 'MUH. ILYAS', '-', 0, 'default.jpg', 1, '2018-08-02', 'WIRASWASTA', 'STM', 1),
(92, '1808 963', 'MUH ANUGRAH P', 'KENDARI, 25 JUNI 2011', 'JL. S. KONAWEHA', 'BAHARUDDIN', '-', 0, 'default.jpg', 1, '2018-08-02', 'TUKANG KAYU', 'SD', 1),
(93, '1808 964', 'ASMAUL ', 'KENDARI, 25 JUNI 2005', 'GUNUNG JATI', 'DARWIS', '-', 0, 'default.jpg', 1, '2018-08-02', 'PEDAGANG', 'SD', 1),
(94, '1808 965', 'MUSTAFA ', 'KENDARI, 22PRIL 2010', 'JL. DR. MOH HATTA', 'SAMSUDDIN', '-', 0, 'default.jpg', 1, '2018-08-02', 'WIRASWASTA', 'SD', 1),
(95, '1808 966', 'MUH. ARFANDI DULLA', 'KENDARI, 13 MARET 2006', 'JL. JATI MEKAR', 'ARFAN', '-', 0, 'default.jpg', 1, '2018-08-03', 'WIRASWASTA', 'SLTA', 1),
(96, '1808 967', 'RANAL AKTAR Q.H', 'KENDARI, 14 NOVEMBER 2011', 'JL. LASOLO', 'IR. JUSRAN HALIK SP., M.Si', '-', 0, 'default.jpg', 1, '2018-08-04', 'PNS', 'S2', 1),
(97, '1808 968', 'ZULFADHIL ', 'SELAYAR, 09 SEPTEMBER 2011', 'GUNUNG JATI', 'ARFA', '-', 0, 'default.jpg', 1, '2018-08-04', 'BURUH PELABUHAN', 'SLTA', 1),
(98, '1808 969', 'SYAIFUL SALEH', 'KENDARI, 26 AGUSTUS 2012', 'JL. DR. MOH HATTA', 'SITI LELYANTI', '-', 0, 'default.jpg', 1, '2018-08-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(99, '1808 970', 'MUH SAFTIRAL', 'RAHA, 14 MEI 2002', 'JL. CUMI-CUMI', 'SARIFUDDIN', '-', 0, 'default.jpg', 1, '2018-08-04', 'WIRASWASTA', 'SLTA', 1),
(100, '1808 971', 'HELSIN', 'KENDARI, 05 MARET 2011', 'GUNUNG JATI', 'LA ODE HAERUDDIN', '-', 0, 'default.jpg', 0, '2018-08-04', 'BURUH ', 'SD', 1),
(101, '1808 973', 'WA ODE NUR AINI', 'KENDARI, 23 MEI 2011', 'GUNUNG JATI', 'LA ODE DALAMA', '-', 0, 'default.jpg', 0, '2018-08-05', 'BURUH', 'SD', 1),
(102, '1808 978', 'SAFIRA UMAR', 'KENDARI, 18 MARET 2012', 'JL. DR. MOH HATTA', 'RIDWAN UMAR', '-', 0, 'default.jpg', 0, '2018-08-07', 'WIRASWASTA', 'STM', 1),
(103, '1808 979', 'MUH. ALFANO', 'KENDARI, 04 JANUARI 2011', 'GUNUNG JATI', 'LA ODE SULI', '-', 0, 'default.jpg', 1, '2018-08-07', 'WIRASWASTA', 'SLTA', 1),
(104, '1808 980', 'SITI ALFANI', 'KENDARI, 04 JANUARI 2011', 'GUNUNG JATI', 'LA ODE SULI', '-', 0, 'default.jpg', 0, '2018-08-07', 'WIRASWASTA', 'SLTA', 1),
(105, '1808 981', 'LESTARI SUCI', 'KENDARI, 10 JANUARI 2009', 'GUNUNG JATI', 'RIA', '-', 0, 'default.jpg', 0, '2018-08-20', 'PEDAGANG', 'SLTP', 1),
(106, '1808 983', 'ALI NURUL ', 'KENDARI, 23 JANUARI 2011', 'RRI LAMA', 'REVA PAHLEVI', '-', 0, 'default.jpg', 0, '2018-08-27', 'HONORER', 'SLTA', 1),
(107, '1808 984', 'AKBAR KAISAR ', 'KENDARI, 28 DESEMBER 2011', 'JL. FAJAR MERANTAU', 'ISKANDAR', '-', 0, 'default.jpg', 1, '2018-08-29', 'WIRASWASTA', 'SLTA', 1),
(108, '1809 991', 'ARIL RAMADHAN ', 'KENDARI, 10 OKTOBER 2006', 'GUNUNG JATI', 'IRLAN', '-', 0, 'default.jpg', 1, '2018-09-24', 'BURUH', 'SLTP', 1),
(109, '1809 995', 'MUH. FAJAR', 'KENDARI, 06 JUNI 2006', '', 'H. FAJRI', '-', 0, 'default.jpg', 1, '2018-09-18', 'PEDAGANG', 'SLTA', 1),
(110, '1810 996', 'MUH. ZULKIFLI S', 'KENDARI, 23 JANUARI 2011', 'JL. FAJAR MERANTAU', 'MUH. SYAMSUL ALAM', '-', 0, 'default.jpg', 1, '2018-10-01', 'PENJAHIT', 'SLTP', 1),
(111, '1810 997', 'MUH. SAPAR', 'KENDARI, 21 JANUARI 2011', 'JL. FAJAR MERANTAU', 'SITI SULAIKHA', '-', 0, 'default.jpg', 1, '2018-10-01', 'IBU RUMAH TANGGA', 'SLTA', 1),
(112, '1810 998', 'WIDYA ASTUTI M', 'KENDARI, 19 OKTOBER 2010', 'JL. KATAMBAK ', 'AZWIRM AN M', '-', 0, 'default.jpg', 0, '2018-10-02', 'PNS', 'S1', 1),
(113, '1810 1001', 'YANTI ', 'KENDARI, 24 AGUSTUS 2010', 'GUNUNG JATI', 'DARWIS', '-', 0, 'default.jpg', 0, '2018-10-14', 'PEDAGANG', 'SD', 1),
(114, '1811 1003', 'NAILA AT TAYAH NAFIAH', 'KENDARI, 05 APRIL 2011', 'JL. TITANG', 'PANDI', '-', 0, 'default.jpg', 0, '2018-11-08', 'WIRASWASTA', 'SLTA', 1),
(115, '1812 1009', 'REYHAN ', 'KENDARI, 02 AGUSTUS 2010', 'RRI LAMA', 'NUR ANNAS', '-', 0, 'default.jpg', 1, '2018-12-08', 'WIRASWASTA', 'SLTA', 1),
(116, '1812 1010', 'DINI ALYA SALSABILA', 'KENDARI, 11 JUNI 2010', 'JL. MUTIARA', 'NISMA ADRIANI', '-', 0, 'default.jpg', 0, '2000-12-16', 'PEDAGANG', 'SLTA', 1),
(117, '1812 1011', 'MIFTAHUL AZIZAH ', 'KENDARI, 15 APRIL 2010', 'JL. CAKALANG', 'T. ISMAIL', '-', 0, 'default.jpg', 0, '2018-12-20', 'WIRASWASTA', 'S1', 1),
(118, '1901 1012', 'NABILA NUR AAFIYA', 'KENDARI, 16 NOVEMBER 2010', 'JL. DR. MOH HATTA', 'HAERUDDIN', '-', 0, 'default.jpg', 0, '2019-01-03', 'PNS', 'S1', 1),
(119, '1901 1017', 'FABIL AZHAR ', 'KENDARI 23 MARET 2009', 'JL. IR SOEKARNO', 'JUMARUWA NUHUNG, S.Pd', '-', 0, 'default.jpg', 1, '2019-01-11', 'PNS', 'S1', 1),
(120, '1901 1019', 'LD. FAHRUL REZA A', 'KIENDARI, 15 JANUARI 2012', 'ASRAMA POLSEK', 'HASRIANI', '-', 0, 'default.jpg', 1, '2019-01-30', 'PNS', 'S1', 1),
(121, '1902 1020', 'AMELIA PUTRI ', 'PARE-PERE, 17 SEPTEMBER 2011', 'JL. IR SOEKARNO', 'MULIYADI', '-', 0, 'default.jpg', 0, '2019-02-01', 'WIRASWASTA', 'SLTP', 1),
(122, '1902 1021', 'WA ODE SITI NUR HALIFAH', 'KENDARI, 06 NOVEMBER 2008', 'GUNUNG JATI', 'LA ODE HUSAINI', '-', 0, 'default.jpg', 0, '2019-02-04', 'TUKANG OJEK', 'SD', 1),
(123, '1902 1022', 'RAYA ', 'KENDARI, 31 AGUSTUS 2011', 'GUNUNG JATI', 'LA ABU', '-', 0, 'default.jpg', 0, '2019-02-13', 'BURUH HARIAN', 'SD', 1),
(124, '1902 1023', 'IZAR SAPUTRA M', 'KENDARI, 10 OKTOBER 2009', 'GUNUNG JATI', 'MADOALI', '-', 0, 'default.jpg', 1, '2019-02-25', 'BURUH', 'SLTP', 1),
(125, '1903 1024', 'MUHAMMAD REZKI', '', 'JL. S. KONAWEHA', 'H. RUSTAM', '-', 0, 'default.jpg', 1, '2019-03-03', 'WIRASWASTA', 'SLTP', 1),
(126, '1903 1025', 'ADRIANO ADRIAN BADRI', 'KENDARI, 21 NOVEMBER 2011', 'JL. POROS GUNUNG JATI', 'MARLINA, S.AMKL', '-', 0, 'default.jpg', 1, '2019-03-13', 'WIRASWASTA', 'D3', 1),
(127, '1903 1026', 'MUH. ZAINAL PRATAMA ', 'KENDARI, 07 JULI 2008', 'RRI LAMA', 'MARIATI ', '-', 0, 'default.jpg', 1, '2019-03-22', 'IBU RUMAH TANGGA', 'SLTA', 1),
(128, '1903 1027', 'NURLIANA', 'KEN DARI, 13 JULI 2008', 'GUNUNG JATI', 'NASRUN', '-', 0, 'default.jpg', 0, '2019-03-26', 'BURUH', 'SLTP', 1),
(129, '1904 1028', 'SASKIA SYARIAH SYARIF', 'KENDARI, 11 NOVEMBER 2012', 'JL. IR SOEKARNO', 'SYARIFUDDIN', '-', 0, 'default.jpg', 0, '2019-04-04', 'BURUH', 'SD', 1),
(130, '1904 1029', 'NUR AINI', 'KENDARI, 19 MEI 2011', 'JL. IR SOEKARNO', 'ABD,. MALIK HASAN', '-', 0, 'default.jpg', 0, '2011-04-10', 'WIRASWASTA', 'SD', 1),
(131, '1904 1030', 'MUH. ZULHIJJA', 'KENDARI, 08 DESEMBER 2009', 'JL. TITANG', 'H. ZAINAL', '-', 0, 'default.jpg', 1, '2019-04-03', 'WIRASWASTA', 'S1', 1),
(132, '1905 1033', 'M. ILHAM SAPUTRA', 'KENDARI, 24 OKTOBER 2010', 'JL. BANGAU', 'ALI', '-', 0, 'default.jpg', 1, '2019-05-20', 'WIRASWASTA', 'SD', 1),
(133, '1907 1036', 'ASYIFAH NUR AINI', 'PADANG, 01 SEPTEMBER 2011', 'GUNUNG JATI', 'SYAMSUARNI', '-', 0, 'default.jpg', 0, '2019-07-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(134, '1907 1037', 'YAFI NUGRAHA', 'PADANG, 18 JULI 2012', 'GUNUNG JATI', 'YENI FITRIA', '-', 0, 'default.jpg', 1, '2019-07-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(135, '1907 1038', 'GEFIRA HUSNA NUR F', 'KEBUMEN, 14 MEI 2015', 'GUNUNG JATI', 'YULI WIJIASTUTI', '-', 0, 'default.jpg', 0, '2019-07-04', 'IBU RUMAH TANGGA', 'S1', 1),
(136, '1907 1039', 'FIKA YASIRA Y', 'KENDARI, 19 JULI 2008', 'BTN GRIYA SINAJI', 'YEYEN SYAHDULLAH ARIF', '-', 0, 'default.jpg', 0, '2019-07-05', 'WIRASWASTA', 'SLTA', 1),
(137, '1907 1041', 'SITI PUTRI WULANDARI', 'KENDARI, 18 JUNI 2013', 'JL. BANGAU', 'ALI', '-', 0, 'default.jpg', 0, '2019-07-18', 'WIRASWASTA', 'SLTA', 1),
(138, '1907 1042', 'SULTAM ARRASYA', 'KENDARI, 17 JUNI 2013', 'JL. IR SOEKARNO', 'AFFANDI', '-', 0, 'default.jpg', 1, '2019-07-18', 'WIRASWASTA', 'SLTA', 1),
(139, '1907 1043', 'MUH. ADNAN ANNABA', 'KENDARI, 04 SEPTEMBER 2011', 'JL. CUMI-CUMI', 'SULAIMAN', '-', 0, 'default.jpg', 1, '2019-07-18', 'WIRASWASTA', 'SLTP', 1),
(140, '1907 1044', 'NUR QHAILA', 'KENDARI, 21 OKTOBER 2010', 'RRI LAMA', 'FERDI FALDI', '-', 0, 'default.jpg', 0, '2019-07-29', 'WIRASWASTA', 'SLTA', 1),
(141, '1907 1045', 'NAFISAH ZULFADHILLA', 'KENDARI, 25 SEPTEMBER 2013', 'GUNUNG JATI', 'SAMRIN', '-', 0, 'default.jpg', 0, '2019-07-29', 'BURUH', 'SLTP', 1),
(142, '1907 1046', 'NABILA SAMRIN', 'LOHIA, 16 JANUARI 2012', 'GUNUNG JATI', 'SAMRIN', '-', 0, 'default.jpg', 0, '2019-07-29', 'BURUH', 'SLTP', 1),
(143, '1908 1047', 'ALIF DHIAFAKRI R', 'KENDARI, 10 JULI 2013', 'GUNUNG JATI', 'LA ODE MUSLIMIN', '-', 0, 'default.jpg', 1, '2019-08-01', 'BURUH LEPAS', 'SLTA', 1),
(144, '1908 1048', 'DHIA VIESCHALOVA', 'KENDARI, ', 'JL. BARONANG', 'CHEMHARI', '-', 0, 'default.jpg', 0, '2019-08-01', 'HONORER', 'S1', 1),
(145, '1908 1049', 'IMAYAH NUR IKLASANI', 'KENDARI, 21 MEI 2012', 'JL. S. KONAWEHA', 'ABUSTANG', '-', 0, 'default.jpg', 0, '2019-08-10', 'WIRASWASTA', 'SLTA', 1),
(146, '1908 1050', 'ANDI ARAFAH GHELLI', 'KENDARI, 24 JANUARI 2014', 'JL. IR SOEKARNO', 'ANDI NURAFRI ADRIANSYAH', '-', 0, 'default.jpg', 1, '2019-08-01', 'KARYAWAN SWASTA', 'SMK', 1),
(147, '1908 1051', 'ST, ASIYAH CAHYANI ABBAS ', 'KENDARI, 06B MEI 2012', 'JL. S. KONAWEHA', 'ABBAS', '-', 0, 'default.jpg', 0, '2019-08-01', 'MEKANIK', 'SLTP', 1),
(148, '1908 1052', 'ASRIANA PELLA', 'KENDARI, 1O JU NI 2012', 'JL. PEMBAGUNAN', 'JEFRI PELLA', '-', 0, 'default.jpg', 0, '2019-08-06', 'WIRASWASTA', '. SLTA', 1),
(149, '1908 1052', 'WIDHI ARTHAMEVIA', 'TACCIPI, 18 NOVEMBER 2010', 'JL. CAKALANG', 'YESMIYATI', '-', 0, 'default.jpg', 0, '2019-08-06', '', '', 1),
(150, '1908 1024', 'ALEXA ZULFILIANA', 'KENDARI, 27 MARET 2010', 'JL. ANAWAI', 'JUMSAR', '-', 0, 'default.jpg', 0, '2019-08-10', 'WIRASWASTA', 'SLTA', 1),
(151, '1908 1055', 'RAIZUL RISYAWAL', 'KENDARI, 06 SEPTEMBER 2011', 'BTN PURI GARUDA', 'RUDI RIHARJO', '-', 0, 'default.jpg', 1, '2019-08-14', 'TNI AD', 'SLTA', 1),
(152, '1908 1056', 'LUNA SUNARTO', 'KENDARI, 21 NOVEMBER 2011', 'GUNUNG JATI', 'SUNARTO', '-', 0, 'default.jpg', 0, '2019-08-16', 'SOPIR', 'SLTA', 1),
(153, '1908 1057', 'SAVIRA', 'KENDARI, 29 NOVEMBER 2014', 'JL. IR SOEKARNO', 'ROSDIANA', '-', 0, 'default.jpg', 0, '2019-08-19', 'PEDAGANG', 'SD', 1),
(154, '1908 1058', 'ARNA BELA ARSYITA', 'KENDARI, 06 JULI 2010', 'JL. PEMBANGUNAN', 'IRMAN', '-', 0, 'default.jpg', 0, '2019-08-21', 'WIRASWASTA', 'SLTA', 1),
(155, '1908 1059', 'MELANI', 'KENDARI, 10 MEI 2015', 'MABOLU', 'UMA', '-', 0, 'default.jpg', 0, '2019-08-21', '', '', 1),
(156, '1908 1060', 'ATSHILA TALITA SULFAT', 'KENDARI, 26 NOVEMBER 2012', 'JL. CAKALANG', 'MUH. SULFI ABDULLAH', '-', 0, 'default.jpg', 0, '2019-08-21', 'WIRASWASTA', 'SLTA', 1),
(157, '1908 1061', 'ANIKA SYAM', 'SIBELAH, 26 MEI 2012', 'JL. PEMBANGUNAN', 'SAMSIL', '-', 0, 'default.jpg', 0, '2019-08-23', 'WIRASWASTA', 'SLTP', 1),
(158, '1909 1062', 'MUH. RAFLI SAPUTRA', 'KENDARI, 24 NOVEMBER 2011', 'GUNUNG JATI', 'LA EVI', '-', 0, 'default.jpg', 1, '2019-09-02', 'BURUH LEPAS', '', 1),
(159, '1909 1063', 'MUH. ALVIANTO AMIN', 'KENDARI, 28 OKTOBER 2005', 'SODOHA', 'SITI SAIRAH', '-', 0, 'default.jpg', 1, '2019-09-10', 'PEDAGANG', 'SLTA', 1),
(160, '1909 1064', 'R. DYLAN', 'KENDARI, 27 JANUARI 2013', 'JL. IR SOEKARNO', 'FIRA SABARA', '-', 0, 'default.jpg', 1, '2019-09-24', 'IBU RUMAH TANGGA', 'SLTA', 1),
(161, '1909 1065', 'ANGGI ', 'KENDARI, 16 JUNI 2011', 'GUNUNG JATI', 'WA ODE ANI', '-', 0, 'default.jpg', 0, '2019-09-24', 'PEDAGANG', 'SD', 1),
(162, '1909 1066', 'AFIFAH NABILA ', 'KENDARI, 20 AGUSTUS 2015', 'RRI LAMA', 'JORSEN', '-', 0, 'default.jpg', 1, '2019-09-24', 'PEDAGANG', 'D3', 1),
(163, '1909 1067', 'NUR AZALIA', 'KENDARI, 20 JULI 2011', 'GUNUNG JATI', 'JUSTAM', '-', 0, 'default.jpg', 0, '2019-09-24', 'BURUH', 'SLTA', 1),
(164, '1909 1068', 'ADELIA PUTRI', 'KENDARI, 13 JULI 2011', 'GUNUNG JATI', 'ALMUNI', '-', 0, 'default.jpg', 0, '2019-09-24', 'BURUH', 'SLTA', 1),
(165, '1909 1069', 'MUH. YUSUF MAULANA', 'TANGGERANG 14 JANUARI 2012', 'JL. TITANG', 'SYAMSUL ALAM', '-', 0, 'default.jpg', 1, '2019-09-24', 'WIRASWASTA', 'SLTA', 1),
(166, '1909 1070', 'DESI WA ODE', 'KENDARI, 17 DESEMBER 2009', 'GUNUNG JATI', 'LA ODE MUH. NURADI', '-', 0, 'default.jpg', 0, '2019-09-30', 'WIRASWASTA', 'SLTA', 1),
(167, '1910 1071', 'AIRIN SRI ASTRIANA', 'KENDARI, 16 DESEMBER ', 'GUNUNG JATI', 'LA ODE SUMAIDA', '-', 0, 'default.jpg', 0, '2019-10-07', 'BURUH', 'SD', 1),
(168, '1910 1072', 'MUHAMMAD ALFAN ', 'KENDARI, 20 SEPTEMBER 2009', 'GUNUNG JATI', 'RAHMAN', '-', 0, 'default.jpg', 1, '2019-10-07', 'WIRASWASTA', 'SLTA', 1),
(169, '1910 1073', 'NUR CAHAYA', 'KENDARI, ', 'GUNUNG JATI', 'HAMIDUL', '-', 0, 'default.jpg', 0, '2019-10-10', 'WIRASWASTA', 'SD', 1),
(170, '1910 1074', 'SITI AISYAH', 'KENDARI, 2 JANUARI 2009', 'GUNUNG JATI', 'ROY', '-', 0, 'default.jpg', 0, '2019-10-11', 'BURUH', 'SLTP', 1),
(171, '1910 1075', 'RIFAL ALI ', '1-Feb-08', 'GUNUNG JATI', 'LA ODE FILIU', '-', 0, 'default.jpg', 1, '2019-10-12', 'BURUH', 'SD', 1),
(172, '1910 1076', 'RAFKA ADITYA', 'KENDARI, 08 JULI 2012', 'JL. IR SOEKARNO', 'ZAKARIA', '-', 0, 'default.jpg', 1, '2019-10-12', 'WIRASWASTA', 'SLTA', 1),
(173, '1910 1077', 'MUH. RASYA RAMADHAN', 'KENDARI, 3 SEPTEMBER 2012', 'JL. LASOLO', 'JISMA JINAS', '-', 0, 'default.jpg', 1, '2019-10-12', 'POLISI', 'SLTA', 1),
(174, '1910 1078', 'SAHWA NUR KHALIFAH', 'KENDARI,', 'JL. BETE-BETE NO. 4', 'ERNA NINGSIH', '-', 1578981861, 'student_SAHWA_NUR_KHALIFAH_1578812821.png', 0, '2019-10-16', 'WIRASWASTA', 'SLTA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `position`, `description`, `photo`) VALUES
(2, 'Guru', 'Guru Kelas', '-', '1579941388_ubuntu.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`, `image`, `address`) VALUES
(1, '127.0.0.1', 'admin@fixl.com', '$2y$12$XpBgMvQ5JzfvN3PTgf/tA.XwxbCOs3mO0a10oP9/11qi1NUpv46.u', 'admin@fixl.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1579942390, 1, 'Admin', 'istrator', '081342989185', 'USER_1_1571554027.jpeg', 'admin'),
(13, '::1', 'uadmin@gmail.com', '$2y$10$78SZyvKRKMU7nPCew9w4nOpEUmJ1SeTV4L4ZG2NXXSfbEaswqoepq', 'uadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568678256, 1581039277, 1, 'admin', 'TPA', '00', 'USER_13_1568678463.jpg', 'jln mutiara no 8');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(29, 13, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

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
-- Indexes for table `mosque`
--
ALTER TABLE `mosque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `structural`
--
ALTER TABLE `structural`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `mosque`
--
ALTER TABLE `mosque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `structural`
--
ALTER TABLE `structural`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Ketidakleluasaan untuk tabel `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ketidakleluasaan untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Ketidakleluasaan untuk tabel `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ketidakleluasaan untuk tabel `structural`
--
ALTER TABLE `structural`
  ADD CONSTRAINT `structural_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
