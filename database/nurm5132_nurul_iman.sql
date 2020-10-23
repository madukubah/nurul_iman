-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2020 at 04:50 AM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nurm5132_nurul_iman`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
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
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `organization_id`, `name`, `date`, `image`, `preview`, `file_content`) VALUES
(24, 3, 'Kegiatan Halqoh Rimnis', '2020-04-16', '1603383637_ACTIVITY__1603383637.png', 'Kegiatan Halqoh Rimnis', 'ACTIVITY__1603383637.html'),
(26, 3, 'HALAQAH RIMNIS', '2020-02-15', '1603383691_ACTIVITY__1603383691.png', 'Halaqah RIMNIS', 'ACTIVITY__1603383691.html'),
(33, 3, 'QURBAN 1441 HIJRIYAH', '2020-08-01', '1603383558_ACTIVITY__1603383558.png', 'Qurban 1441 Hijriyah', 'ACTIVITY__1603383558.html'),
(34, 3, 'RIHLAH RIMNIS', '2020-06-24', '1603383604_ACTIVITY__1603383604.png', 'Rihlah RIMNIS', 'ACTIVITY__1603383604.html'),
(38, 1, 'PROSES BELAJAR MENGAJAR AUDIO VISUAL', '2020-03-03', '1603382642_ACTIVITY__1603382642.png', 'Proses Belajar Mengajar Audio Visual', 'ACTIVITY__1603382642.html'),
(44, 1, 'PMD Audio Visual', '2020-09-30', '1603382418_ACTIVITY__1603382418.png', 'PMD Audio Visual', 'ACTIVITY__1603382418.html'),
(45, 2, 'Lomba Gerak Jalan Majelis Taklim Pemersatu Umat', '2020-06-24', '1603383176_ACTIVITY__1603383176.png', 'Lomba Gerak Jalan Majelis Taklim Pemersatu Umat', 'ACTIVITY__1603383176.html'),
(47, 2, 'Dalam rangka lomba gerak jalan majelis taklim. Sekota kendari. Dalam rangka 1 muharram.', '2020-09-15', '1603382982_ACTIVITY__1603382982.png', 'Dalam rangka lomba gerak jalan majelis taklim. Sekota kendari. Dalam rangka 1 muharram.', 'ACTIVITY__1603382982.html'),
(48, 2, 'Dalam rangka lomba gerak jalan majelis taklim. Sekota kendari. Dalam rangka 1 muharram.', '2020-09-14', '1603383081_ACTIVITY__1603383081.png', 'Dalam rangka lomba gerak jalan majelis taklim. Sekota kendari. Dalam rangka 1 muharram.', 'ACTIVITY__1603383081.html'),
(50, 2, 'Maulid nabi Bersamah majelis taklim dan pengurus MNI. Di hadiri pak ketua dan ibu .', '2020-01-15', '1603383236_ACTIVITY__1603383236.png', 'Maulid nabi\r\nBersamah majelis taklim dan pengurus MNI. Di hadiri pak ketua dan ibu .', 'ACTIVITY__1603383236.html'),
(52, 2, 'Isra mirad. Dan wisuda satri. Bersama majelis taklim dan pengurus MNI. Juga anak2 RIamNIs. Dan anak santri', '2020-09-15', '1603383031_ACTIVITY__1603383031.png', 'Isra mirad. Dan wisuda satri. Bersama majelis taklim dan pengurus MNI. Juga anak2 RIamNIs. Dan anak santri', 'ACTIVITY__1603383031.html'),
(53, 2, 'Pelantikan ibu ketua majelis taklim nurul iman. Menjadi pengurus BKMT.. Tingkat kota. Kendari', '2020-09-08', '1603383127_ACTIVITY__1603383127.png', 'Pelantikan ibu ketua majelis taklim nurul iman. Menjadi pengurus BKMT.. Tingkat kota. Kendari', 'ACTIVITY__1603383127.html'),
(54, 2, 'Gema islami Bersama Majelis Ta\'lim Nurul Iman', '2020-09-17', '1603382900_ACTIVITY__1603382900.png', 'Gema islami Majelis Ta\'lim Nurul Iman', 'ACTIVITY__1603382900.html'),
(56, 4, 'Kurban Pengurus Besar Nurul Iman', '2020-09-14', '1603384007_ACTIVITY__1603384007.png', 'Kurban Pengurus Besar Nurul Iman ', 'ACTIVITY__1603384007.html'),
(60, 3, 'TALK SHOW INSPIRATIF ZAMAN NOW', '2018-02-03', '1601717301_ACTIVITY__1601717301.jpg', 'Talk Show Inspiratif Zaman Now', 'ACTIVITY__1601717301.html'),
(61, 2, 'Seminar internasional dan muktamar VIII badan kontak majelis taklim (BKMT) kampus assafiyah,bekasi', '2016-03-10', '1603383378_ACTIVITY__1603383378.png', 'Seminar internasional dan muktamar VIII badan kontak majelis taklim (BKMT) ', 'ACTIVITY__1603383379.html'),
(63, 2, 'Lomba gerak jalan majelis taklim nurul iman dalam rangka pawai ta\'\'ruf', '1970-01-01', '1603383451_ACTIVITY__1603383451.png', 'Lomba gerak jalan majelis taklim nurul iman Dalam rangka pawai ta\"ruf', 'ACTIVITY__1603383451.html'),
(66, 2, 'Gemah islami oleh majelis taklim sekota kendari.mesjid nurul iman sebagai tuan rumah dan di siarkan langsung oleh RRI.kota kendari', '1970-01-01', '1603383496_ACTIVITY__1603383496.png', 'Gemah islami oleh majelis taklim sekota kendari.mesjid nurul iman sebagai tuan rumah dan di siarkan Langsung oleh RRI.kota kendari', 'ACTIVITY__1603383496.html'),
(67, 3, 'PEMERIKSAAN KESEHATAN', '2019-08-24', '1601204746_ACTIVITY_PEMERIKSAAN_KESEHATAN_1601204746.jpeg', 'Pemeriksaan Kesehatan (PEMKES)', 'ACTIVITY__1601206469.html'),
(68, 3, 'TABLIGH MUHARRAM 1441 HIJRIYAH', '2019-09-01', '1601205838_ACTIVITY_Hdnsn_1601205838.jpeg', 'Tabligh Muharram 1441 Hijriyah', 'ACTIVITY__1601210303.html'),
(69, 3, 'PANITIA PELAKSANA TAHUN BARU ISLAM 1441 HIJRIYAH', '2019-09-01', '1601210212_ACTIVITY_PANITIA_PELAKSANA_TAHUN_BARU_ISLAM_1441_HIJRIYAH_1601210212.jpeg', 'Panitia Pelaksana Tahun baru Islam 1441 Hijriyah', 'ACTIVITY__1601210384.html'),
(70, 3, 'PAWAI OBOR 1441 HIJRIYAH', '2019-09-01', '1601271185_ACTIVITY_PAWAI_OBOR_1441_HIJRIYAH_1601271185.jpeg', 'Pawai Obor 1441 Hijriyah', 'ACTIVITY__1601271185.html'),
(71, 3, 'BERSIH-BERSIH MASJID', '2019-09-08', '1601271678_ACTIVITY_BERSIH-BERSIH_MASJID_1601271678.jpeg', 'Bersih-Bersih Masjid (BBM)', 'ACTIVITY__1601271678.html'),
(72, 3, 'BERANTAS BUTA QUR’AN', '2019-09-30', '1601272196_ACTIVITY_BERANTAS_BUTA_QUR’AN_1601272196.jpeg', 'Berantas Buta Qur’an (BBQ)', 'ACTIVITY__1601272196.html'),
(73, 1, 'STUDI BANDING JOGOKARIYAN', '2018-05-12', '1603382696_ACTIVITY__1603382696.png', 'Study Banding Jogokariyan', 'ACTIVITY__1603382696.html'),
(74, 1, 'STUDI BANDING JOGOKARIYAN', '2018-05-12', '1603382739_ACTIVITY__1603382739.png', 'Studi Banding Jogokariyan', 'ACTIVITY__1603382739.html'),
(75, 3, 'DONOR DARAH SUKARELA', '2019-12-23', '1601711678_ACTIVITY_DONOR_DARAH_SUKARELA_1601711678.jpeg', 'Donor Darah Sukarela (DORAS)', 'ACTIVITY__1601714192.html'),
(76, 3, 'BAKSOS PEDULI CORONA', '2020-04-23', '1601713475_ACTIVITY_BAKSOS_PEDULI_CORONA_1601713475.jpeg', 'BAKSOS Peduli Coronoa', 'ACTIVITY__1601713475.html'),
(77, 4, 'Sholat Idul Adha', '2020-10-02', '1603383812_ACTIVITY__1603383812.png', '-', 'ACTIVITY__1603383812.html'),
(78, 1, 'WISUDA AKBAR TPA NURUL IMAN SANUA KE-XVI', '2017-10-12', '1603382807_ACTIVITY__1603382807.png', 'Wisuda Akbar TPA Nurul Iman Sanua Ke-XVI', 'ACTIVITY__1603382807.html'),
(79, 1, 'PERINGATAN 1 MUHARRAM 14411 HIJRIYAH', '2020-09-02', '1603382533_ACTIVITY__1603382533.png', 'Peringatan 1 Muharram 1441 Hijriyah', 'ACTIVITY__1603382533.html'),
(81, 4, 'Study Banding', '2020-10-02', '1603383863_ACTIVITY__1603383863.png', '-', 'ACTIVITY__1603383863.html'),
(82, 4, 'Hasil Kotak Amal Shalat ID Fitri 14.. H', '2020-10-02', '1603383954_ACTIVITY__1603383954.png', '-', 'ACTIVITY__1603383954.html'),
(83, 1, 'PERINGATAN 1 MUHARRAM 1441 HIJRIYAH', '2020-10-02', '1601735235_ACTIVITY_PERINGATAN_1_MUHARRAM_1441_HIJRIYAH_1601735235.jpeg', '-', 'ACTIVITY__1601735235.html'),
(84, 1, 'Tadabbur', '2020-10-02', '1601735311_ACTIVITY_Tadabbur_1601735311.jpeg', '-', 'ACTIVITY__1601735311.html'),
(85, 1, 'Tadabbur Alam', '2020-10-02', '1601735400_ACTIVITY_Tadabbur_Alam_1601735400.jpeg', '-', 'ACTIVITY__1601735400.html'),
(86, 4, 'TABLIGH 1 MUHARRAM 1441 HIJRIYAH', '2020-10-02', '1601735526_ACTIVITY_TABLIGH_1_MUHARRAM_1441_HIJRIYAH_1601735526.jpeg', '-', 'ACTIVITY__1601735526.html'),
(87, 4, 'PERINGATAN 1 MUHARRAM 1441 HIJRIYAH', '2020-10-02', '1601735756_ACTIVITY_PERINGATAN_1_MUHARRAM_1441_HIJRIYAH_1601735756.jpeg', '-', 'ACTIVITY__1601735756.html'),
(88, 1, 'Malam Bina Ilmu dan Takwa', '2020-10-02', '1603382316_ACTIVITY__1603382316.png', '-', 'ACTIVITY__1603382316.html'),
(89, 1, 'PROSES BELAJAR MENGAJAR DARING', '2020-09-13', '1603382472_ACTIVITY__1603382472.png', 'Proses Belajar Mengajar Daring', 'ACTIVITY__1603382472.html');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
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
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `student_id`, `knowledge`, `attitude`, `class`, `description`) VALUES
(3, 175, 0, 0, 'IQRO 1', '-'),
(5, 14, 85, 50, 'Alquran', 'perilakunya di perbaiki lagi');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `file` text DEFAULT 'default.jpg',
  `_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `organization_id`, `type`, `name`, `description`, `file`, `_order`) VALUES
(1, 3, 2, 'Muhammad Adriansyah', 'Ketua', '1599557592_Adri_BIru.JPG', 1),
(2, 2, 1, 'Struktur Majelis Ta\'lim', '-', '1599206406_STRUKTUR_ORGANISASI_TPA_2.png', 0),
(3, 2, 2, 'St. Syairah Hibban, S.Pd.I', 'Wakil Ketua I', '1599288341_Sitti_Sairan_Hibban,S_Pd.JPG', 2),
(4, 3, 1, 'Struktur Remaja Mesjid', '-', '1599201151_STRUKTUR_ORGANISASI_RIMIS_2.png', 0),
(10, 5, 3, 'main-slider', '<h1 style=\"color:white\"><b>\r\nMasjid Nurul Iman\r\n</b>\r\n</h1>\r\n<h4>Mewujudkan masjid makmur pusat peribadatan, pengembangan sumber daya manusia dan pemberdayaan ummat\r\n</h4>', '1603452278_MESJID.JPG', 0),
(11, 5, 3, 'main-slider', '<h1 style=\"color:white\"><b>\r\nRemaja Islam Masjid Nurul Iman Sanua (RIMNIS) Kendari\r\n</b>\r\n</h1>\r\n<h4>Menyiapkan pemimpin muda berbasis masjid dalam bingkai persatuan ummat\r\n</h4>', '261024.jpg', 0),
(12, 5, 3, 'main-slider', '<h1 style=\"color:white\"><b>\r\nTPA Nurul Iman Sanua-Kendari\r\n</b>\r\n</h1>\r\n<h4>Menyiapkan generasi qur’ani menyongsong masa depan gemilang\r\n</h4>', 'hajj-video-superJumbo.jpg', 0),
(13, 5, 3, 'main-slider', '<h1 style=\"color:white\"><b>\r\nMajelis Taklim\r\n</b>\r\n</h1>\r\n<h4>\r\nSebaik-baik majelis adalah majelis taklim Nurul Iman. Sebaik-baik manusia adalah yang bermanfaat bagi orang lain\r\n</h4>', '1601733623_DJI_0889.JPG', 0),
(14, 5, 3, 'second-slider', 'second-slider', '2b6b1f8643f82bae3284bbb1be56d85b.jpg', 0),
(15, 5, 3, 'second-slider', 'second-slider', '261025.jpg', 0),
(16, 5, 3, 'second-slider', 'second-slider', 'hajj-video-superJumbp.jpg', 0),
(17, 5, 3, 'second-slider', 'second-slider', 'quran-bool.jpg', 0),
(21, 3, 1, 'Bagan Struktur organisasi Rimnis', 'Bagan Struktur organisasi Rimnis', '1599206240_STRUKTUR_ORGANISASI_RIMIS_2.png', 0),
(22, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Dokumentasi Bakti Sosial', '1599201209_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(23, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201252_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(24, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201253_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(25, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201260_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(26, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201266_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(27, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201272_Galeri_RIMNIS_Nurul_Iman.jpg', 0),
(28, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201280_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(29, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201287_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(30, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201301_Galeri_RIMNIS_Nurul_Iman.jpg', 0),
(31, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201308_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(32, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201317_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(33, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201325_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(34, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201333_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(35, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201341_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(36, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Bakti Sosial', '1599201358_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(37, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Halqoh Rimnis', '1599201522_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(39, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Halqoh Rimnis', '1599201631_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(40, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Halqoh Rimnis', '1599201640_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(41, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Kegiatan Halqoh Rimnis', '1599201646_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(42, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202370_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(43, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202377_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(44, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202394_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(45, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202400_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(46, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202409_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(47, 3, 3, 'Galeri RIMNIS Nurul Iman', 'kegiatan qurban 2020', '1599202418_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(48, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Rihlah Rihmis', '1599203343_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(49, 3, 3, 'Galeri RIMNIS Nurul Iman', 'Rihlah Rihmis', '1599203350_Galeri_RIMNIS_Nurul_Iman.JPG', 0),
(50, 1, 1, 'struktur TPA', '-', '1599207022_STRUKTUR_ORGANISASI_TPA_2.png', 0),
(51, 2, 2, 'Rochmiyah Kaimah', 'Ketua', '1599288364_Sitti_Rochmiyah_Kaimah.JPG', 1),
(52, 2, 2, 'Hamsiah Kasim', 'Bendahara', '1599288384_Bendara__Hamsiah_Kasim.JPG', 5),
(53, 2, 2, 'Irna Julia Gani, SH', 'Sekretaris', '1599288401_sekertaris___Irna_Julia_Gani.JPG', 4),
(54, 2, 2, 'Sulaeha', 'Wakil Bendahara', '1599288424_Sulaeha___Wak__Bendahara.JPG', 6),
(55, 2, 2, 'Hermawati', 'Wakil Ketua II', '1599288447_Wak__Ketua_2___Harmawati.JPG', 3),
(56, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288561_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(57, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288567_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(58, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288577_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(59, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288584_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(60, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288590_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(61, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288596_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(62, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288603_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(63, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288611_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(64, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288620_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(65, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288626_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(66, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288634_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(67, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288642_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(68, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288650_Galeri_Majelis_Talim_Nurul_Iman.jpg', 0),
(70, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi Kegiatan Majelis Ta\'lim Nurul Iman', '1599288664_Galeri_Majelis_Talim_Nurul_Iman.jpeg', 0),
(71, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289270_Galeri_TPA_Nurul_Iman.JPG', 0),
(72, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289294_Galeri_TPA_Nurul_Iman.JPG', 0),
(73, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289304_Galeri_TPA_Nurul_Iman.JPG', 0),
(74, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289309_Galeri_TPA_Nurul_Iman.JPG', 0),
(75, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289318_Galeri_TPA_Nurul_Iman.JPG', 0),
(76, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289324_Galeri_TPA_Nurul_Iman.JPG', 0),
(77, 1, 3, 'Galeri TPA Nurul Iman', 'Proses Belajar Mengajar Audio Visual', '1599289330_Galeri_TPA_Nurul_Iman.JPG', 0),
(80, 3, 2, 'Nur Alamsyah Asis', 'Sekretaris', '1599374739_Sekertaris_:_Nur_Alamsyah_Azis.jpg', 2),
(81, 3, 2, 'Abdul Muin Hamzah', 'Bendahara', '1599374782_Muin_Biru.JPG', 3),
(82, 3, 2, 'Rahmawati', 'Koordinator Bidang Kemuslimahan', '1599374839_Bidang_Kemuslimahan_:_Rahmawati.JPG', 4),
(83, 3, 2, 'Syella Etiyaningsih', 'Koordinator Bidang Sosial Masyarakat', '1599558210_IMG_6382.JPG', 5),
(84, 3, 2, 'Muh. Syamsul Alam Suyuti', 'Koordinator Bidang Kewirausahaan', '1599558089_IMG_6352.JPG', 6),
(85, 3, 2, 'Fizal Oktaviansyah', 'Koordinator Bidang Humas Media', '1599557512_Fizzal_B.jpg', 7),
(86, 3, 2, 'Muhammad Anugrah Apriliansyah', 'Koordinator Bidang  Lingkungan Hidup', '1599557811_IMG_6431.JPG', 8),
(89, 4, 1, 'Struktur Masjid Nurul Iman Kendari', '-', '1602301640_struktur_mesjod_NURUL_IMAN.png', 1),
(94, 4, 2, 'Drs. H. Masyhur Masie Abunawas, M.Si', 'Ketua', '1600239221_Drs__H__Masyhur_Masie_Abunawas_M__Si_jpg.jpg', 6),
(96, 4, 2, 'Muh. Asrullah Gaffar, S. Pd', 'Sekretaris Umum', '1601469390_.jpg', 7),
(97, 4, 2, 'H. Rizal', 'Bendahara Umum', '1601469582_.png', 8),
(98, 4, 2, 'Ayyub, M.Sos.I', 'Ketua Bidang Syiar, Dakwah dan Peribadatan', '1600359998_.jpg', 15),
(99, 4, 2, 'Syamsul Marhalim, SP', 'Ketua Bidang Pembinaan Remaja Masjid/TPA/Majelis Taklim', '1600360051_.jpg', 18),
(100, 4, 2, 'Hj. Hamidah Yamin', 'Penasehat', '1601469112_.jpg', 4),
(102, 4, 2, 'Muh. Syamsul Alam Suyuti', 'Wakil Sekretaris', '1601469950_.jpg', 9),
(103, 4, 2, 'Fizal Oktaviansyah', 'Humas dan Media', '1601470192_.jpg', 10),
(104, 4, 2, 'Abdul Muin Hamzah', 'Wakil Bendahara', '1601469881_.jpg', 11),
(105, 4, 2, 'Drs. H. Dahlan P', 'Penasehat', '1601468383_.jpg', 1),
(106, 4, 2, 'Drs. H. Muh. Sa\'adah Taslim', 'Penasehat', '1601468635_.jpg', 2),
(107, 4, 2, 'Roem S. Manaba', 'Penasehat', '1601468864_.jpg', 3),
(108, 4, 2, 'Zainal Abidin, SP. MP', 'Penasehat', '1601469294_.jpg', 5),
(109, 4, 2, 'Muh. Thamrin Nonci', 'Ketua Bidang Pembangunan', '1601470348_.jpg', 12),
(110, 4, 2, 'H. Ibrahim Rakibe', 'Ketua Bidang Dana dan Usaha', '1600438614_.jpg', 13),
(111, 4, 2, 'Ridwan Ali', 'Ketua Bidang Inventarisasi dan Aset', '1600436607_.jpg', 14),
(112, 4, 2, 'Syamrais', 'Ketua Bidang Perayaan Hari Besar Islam (PHBI)', '1600438638_.jpg', 16),
(113, 4, 2, 'H. Jefry', 'Ketua Bidang Sosial dan Pelayanan Ummat', '1601788541_.png', 17),
(114, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601196214_.jpg', 1),
(115, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601196281_.jpg', 1),
(116, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601196333_.jpg', 1),
(117, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601199533_.jpg', 1),
(118, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601199555_.jpg', 1),
(119, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601199575_.jpg', 1),
(120, 2, 3, 'Galeri Majelis Ta\'lim Nurul Iman', 'Dokumentasi kegiatan majelis taklim nurul iman', '1601199617_.jpg', 1),
(121, 1, 4, 'logo TPA', 'logo TPA', '1603449756_TPA.PNG', 1),
(122, 2, 4, 'logo MAJELIS', 'logo MAJELIS', 'default.jpg', 1),
(123, 4, 4, 'logo MASJID', 'logo MASJID', '1603449699_PENGURUS_MASJID.PNG', 1),
(124, 3, 4, 'logo REMAS', 'logo REMAS', '1603449673_RIMNIS.PNG', 1);

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
(109, 2, 'Iuran', 'uadmin/savings', 'savings_index', 'home', 1, 3, '-'),
(110, 2, 'BLOGS', 'header', '-', 'home', 1, 10, '-'),
(111, 2, 'TPA', 'uadmin/', '-', 'home', 1, 11, '-'),
(112, 2, 'Majelis Taklim', 'uadmin/', '-', 'home', 1, 12, '-'),
(113, 2, 'RIMNIS', 'uadmin/', '-', 'home', 1, 13, '-'),
(114, 111, 'Kegiatan TPA', 'uadmin/activities/index/1', 'activities_index_1', 'home', 1, 1, '-'),
(115, 111, 'Data Pengurus', 'uadmin/teacher', 'teacher_index', 'home', 1, 1, '-'),
(116, 112, 'Kegiatan', 'uadmin/activities/index/2', 'activities_index_2', 'home', 1, 1, '-'),
(117, 112, 'Bagan Struktur', 'uadmin/structural/index/2', 'structural_index_2', 'home', 1, 1, '-'),
(118, 112, 'Data Pengurus', 'uadmin/caretaker/index/2', 'caretaker_index_2', 'home', 1, 1, '-'),
(119, 113, 'Kegiatan', 'uadmin/activities/index/3', 'activities_index_3', 'home', 1, 1, '-'),
(120, 113, 'Bagan Struktur', 'uadmin/structural/index/3', 'structural_index_3', 'home', 1, 1, '-'),
(121, 113, 'Data Pengurus', 'uadmin/caretaker/index/3', 'caretaker_index_3', 'home', 1, 1, '-'),
(122, 2, 'Profil Mesjid', 'uadmin/profile', 'profile_index', 'home', 1, 4, '-'),
(123, 111, 'Galeri', 'uadmin/gallery/index/1', 'gallery_index_1', 'home', 1, 1, '-'),
(124, 112, 'Galeri', 'uadmin/gallery/index/2', 'gallery_index_2', 'home', 1, 1, '-'),
(125, 113, 'Galeri', 'uadmin/gallery/index/3', 'gallery_index_3', 'home', 1, 1, '-'),
(126, 2, 'Masjid', 'uadmin/', '-', 'home', 1, 20, '-'),
(127, 126, 'Kegiatan', 'uadmin/activities/index/4', 'activities_index_4', 'home', 1, 1, '-'),
(128, 111, 'Bagan Struktur', 'uadmin/structural/index/1', 'structural_index_1', 'home', 1, 1, '-'),
(129, 126, 'Bagan Struktur', 'uadmin/structural/index/4', 'structural_index_4', 'home', 1, 1, '-'),
(130, 126, 'Data Pengurus', 'uadmin/caretaker/index/4', 'caretaker_index_4', 'home', 1, 1, '-'),
(131, 126, 'Galeri', 'uadmin/gallery/index/4', 'gallery_index_4', 'home', 1, 1, '-');

-- --------------------------------------------------------

--
-- Table structure for table `mosque`
--

CREATE TABLE `mosque` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mosque`
--

INSERT INTO `mosque` (`id`, `file_content`) VALUES
(1, 'default.html');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`id`, `name`, `description`) VALUES
(1, 'TPA Nurul Iman', 'Taman Pendidikan Al-Qur\'an Masjid Nurul Iman'),
(2, 'Majelis Ta\'lim Nurul Iman', 'Majelis Ta\'lim Masjid Nurul Iman'),
(3, 'RIMNIS Nurul Iman', 'Remaja Masjid Nurul Iman'),
(4, 'Masjid', '-'),
(5, 'profile', '-');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `email`, `phone`, `address`) VALUES
(1, 'nuruliman@gmail.com', '081234567891', 'Jln. Dr Moh. Hatta No.6 Kel. Sanua Kec. Kendari Barat');

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
(33, 8, 50000, '2020-01-15', 1579021200, 1, 2020),
(34, 8, 50000, '2020-02-15', 1581699600, 2, 2020),
(35, 8, 0, '2020-03-15', 1584205200, 3, 2020),
(36, 8, 0, '2020-04-15', 1586883600, 4, 2020),
(37, 8, 0, '2020-05-15', 1589475600, 5, 2020),
(38, 8, 0, '2020-06-15', 1592154000, 6, 2020),
(39, 8, 0, '2020-07-15', 1594746000, 7, 2020),
(40, 8, 0, '2020-08-15', 1597424400, 8, 2020),
(41, 8, 0, '2020-09-15', 1600102800, 9, 2020),
(42, 8, 0, '2020-10-15', 1602694800, 10, 2020),
(43, 8, 0, '2020-11-15', 1605373200, 11, 2020),
(44, 8, 0, '2020-12-15', 1607965200, 12, 2020),
(45, 8, 50000, '2020-03-21', 1601211606, 3, 2020),
(46, 8, 50000, '2020-07-21', 1601211700, 7, 2020),
(47, 8, 50000, '2020-08-07', 1601211741, 8, 2020),
(48, 8, 50000, '2020-09-22', 1601211772, 9, 2020),
(53, 21, 50000, '2020-01-15', 1579021200, 1, 2020),
(54, 21, 50000, '2020-02-15', 1581699600, 2, 2020),
(55, 21, 0, '2020-03-15', 1584205200, 3, 2020),
(56, 21, 0, '2020-04-15', 1586883600, 4, 2020),
(57, 21, 0, '2020-05-15', 1589475600, 5, 2020),
(58, 21, 0, '2020-06-15', 1592154000, 6, 2020),
(59, 21, 50000, '2020-07-15', 1594746000, 7, 2020),
(60, 21, 50000, '2020-08-15', 1597424400, 8, 2020),
(61, 21, 50000, '2020-09-15', 1600102800, 9, 2020),
(62, 21, 0, '2020-10-15', 1602694800, 10, 2020),
(63, 21, 0, '2020-11-15', 1605373200, 11, 2020),
(64, 21, 0, '2020-12-15', 1607965200, 12, 2020),
(66, 13, 50000, '2020-08-22', 1601254937, 8, 2020),
(67, 22, 50000, '2020-01-28', 1601255042, 1, 2020),
(68, 22, 50000, '2020-02-22', 1601255066, 2, 2020),
(69, 22, 50000, '2020-03-24', 1601255103, 3, 2020),
(70, 22, 50000, '2020-07-24', 1601255138, 7, 2020),
(71, 22, 50000, '2020-08-21', 1601255163, 8, 2020),
(72, 24, 50000, '2020-01-21', 1601255240, 1, 2020),
(73, 24, 50000, '2020-02-22', 1601255276, 2, 2020),
(74, 24, 50000, '2020-03-21', 1601255351, 3, 2020),
(75, 24, 50000, '2020-07-21', 1601255436, 7, 2020),
(76, 24, 50000, '2020-08-12', 1601255474, 8, 2020),
(77, 25, 50000, '2020-01-27', 1601255655, 1, 2020),
(78, 25, 50000, '2020-02-27', 1601255678, 2, 2020),
(79, 25, 50000, '2020-03-27', 1601255695, 3, 2020),
(80, 25, 50000, '2020-07-27', 1601255728, 7, 2020),
(81, 25, 50000, '2020-08-09', 1601255755, 8, 2020),
(82, 35, 50000, '2020-01-21', 1601255918, 1, 2020),
(83, 35, 50000, '2020-02-27', 1601255937, 2, 2020),
(84, 35, 50000, '2020-03-10', 1601255955, 3, 2020),
(85, 35, 50000, '2020-07-24', 1601255979, 7, 2020),
(86, 35, 50000, '2020-08-21', 1601256009, 8, 2020),
(87, 38, 50000, '2020-01-21', 1601256069, 1, 2020),
(88, 38, 50000, '2020-02-21', 1601256086, 2, 2020),
(89, 38, 50000, '2020-03-21', 1601256105, 3, 2020),
(90, 38, 50000, '2020-07-21', 1601256123, 7, 2020),
(91, 38, 50000, '2020-08-12', 1601256139, 8, 2020),
(92, 39, 50000, '2020-01-01', 1601256213, 1, 2020),
(93, 39, 50000, '2020-02-22', 1601256232, 2, 2020),
(94, 39, 50000, '2020-03-13', 1601256249, 3, 2020),
(95, 39, 50000, '2020-07-28', 1601256270, 7, 2020),
(96, 39, 50000, '2020-08-21', 1601256289, 8, 2020),
(97, 42, 50000, '2020-01-31', 1601256353, 1, 2020),
(98, 42, 50000, '2020-02-22', 1601256374, 2, 2020),
(99, 42, 50000, '2020-03-13', 1601256397, 3, 2020),
(100, 42, 50000, '2020-07-04', 1601256415, 7, 2020),
(101, 42, 50000, '2020-08-04', 1601256442, 8, 2020),
(102, 46, 50000, '2020-01-28', 1601256496, 1, 2020),
(103, 46, 50000, '2020-02-22', 1601256511, 2, 2020),
(104, 46, 50000, '2020-03-13', 1601256527, 3, 2020),
(105, 46, 50000, '2020-07-27', 1601256544, 7, 2020),
(106, 46, 50000, '2020-08-02', 1601256569, 8, 2020),
(107, 21, 50000, '2020-03-28', 1601256685, 3, 2020),
(113, 56, 50000, '2020-01-15', 1579021200, 1, 2020),
(114, 56, 50000, '2020-02-15', 1581699600, 2, 2020),
(115, 56, 50000, '2020-03-15', 1584205200, 3, 2020),
(116, 56, 0, '2020-04-15', 1586883600, 4, 2020),
(117, 56, 0, '2020-05-15', 1589475600, 5, 2020),
(118, 56, 0, '2020-06-15', 1592154000, 6, 2020),
(119, 56, 50000, '2020-07-15', 1594746000, 7, 2020),
(120, 56, 0, '2020-08-15', 1597424400, 8, 2020),
(121, 56, 0, '2020-09-15', 1600102800, 9, 2020),
(122, 56, 0, '2020-10-15', 1602694800, 10, 2020),
(123, 56, 0, '2020-11-15', 1605373200, 11, 2020),
(124, 56, 0, '2020-12-15', 1607965200, 12, 2020),
(125, 56, 50000, '2020-08-04', 1601261279, 8, 2020),
(126, 51, 50000, '2020-01-28', 1601261331, 1, 2020),
(127, 51, 50000, '2020-02-22', 1601261349, 2, 2020),
(128, 51, 50000, '2020-03-21', 1601261367, 3, 2020),
(129, 47, 50000, '2020-01-21', 1601261478, 1, 2020),
(130, 47, 50000, '2020-02-27', 1601261495, 2, 2020),
(131, 47, 50000, '2020-03-21', 1601261512, 3, 2020),
(132, 47, 50000, '2020-07-21', 1601261532, 7, 2020),
(133, 47, 50000, '2020-08-29', 1601261556, 8, 2020),
(148, 7, 50000, '2020-01-15', 1579021200, 1, 2020),
(149, 7, 0, '2020-02-15', 1581699600, 2, 2020),
(150, 7, 0, '2020-03-15', 1584205200, 3, 2020),
(151, 7, 0, '2020-04-15', 1586883600, 4, 2020),
(152, 7, 0, '2020-05-15', 1589475600, 5, 2020),
(153, 7, 0, '2020-06-15', 1592154000, 6, 2020),
(154, 7, 0, '2020-07-15', 1594746000, 7, 2020),
(155, 7, 0, '2020-08-15', 1597424400, 8, 2020),
(156, 7, 0, '2020-09-15', 1600102800, 9, 2020),
(157, 7, 0, '2020-10-15', 1602694800, 10, 2020),
(158, 7, 0, '2020-11-15', 1605373200, 11, 2020),
(159, 7, 0, '2020-12-15', 1607965200, 12, 2020),
(160, 7, 50000, '2020-02-22', 1601709429, 2, 2020),
(161, 7, 50000, '2020-03-28', 1601709447, 3, 2020),
(162, 7, 50000, '2020-07-26', 1601709483, 7, 2020),
(163, 7, 30000, '2020-08-02', 1601709534, 8, 2020),
(164, 49, 50000, '2020-01-21', 1601709586, 1, 2020),
(165, 49, 50000, '2020-02-22', 1601709606, 2, 2020),
(166, 49, 50000, '2020-03-02', 1601709625, 3, 2020),
(167, 49, 50000, '2020-10-02', 1601709643, 10, 2020),
(168, 49, 50000, '2020-09-03', 1601709666, 9, 2020),
(171, 47, 50000, '2020-09-30', 1602685605, 9, 2020),
(172, 47, 50000, '2020-10-30', 1602685631, 10, 2020),
(173, 25, 50000, '2020-09-30', 1602685665, 9, 2020),
(174, 25, 50000, '2020-10-30', 1602685680, 10, 2020),
(176, 50, 0, '2020-01-15', 1579021200, 1, 2020),
(177, 50, 0, '2020-02-15', 1581699600, 2, 2020),
(178, 50, 0, '2020-03-15', 1584205200, 3, 2020),
(179, 50, 0, '2020-04-15', 1586883600, 4, 2020),
(180, 50, 0, '2020-05-15', 1589475600, 5, 2020),
(181, 50, 0, '2020-06-15', 1592154000, 6, 2020),
(182, 50, 0, '2020-07-15', 1594746000, 7, 2020),
(183, 50, 0, '2020-08-15', 1597424400, 8, 2020),
(184, 50, 0, '2020-09-15', 1600102800, 9, 2020),
(185, 50, 0, '2020-10-15', 1602694800, 10, 2020),
(186, 50, 0, '2020-11-15', 1605373200, 11, 2020),
(187, 50, 0, '2020-12-15', 1607965200, 12, 2020),
(188, 50, 50000, '2020-01-21', 1602685769, 1, 2020),
(189, 50, 50000, '2020-02-22', 1602685782, 2, 2020),
(190, 50, 50000, '2020-03-21', 1602685798, 3, 2020),
(191, 50, 50000, '2020-10-14', 1602685831, 10, 2020),
(192, 50, 50000, '2020-08-04', 1602685850, 8, 2020),
(193, 50, 50000, '2020-09-04', 1602685870, 9, 2020),
(194, 50, 50000, '2020-07-21', 1602685891, 7, 2020),
(195, 29, 50000, '2020-01-22', 1602685997, 1, 2020),
(196, 29, 50000, '2020-02-22', 1602686013, 2, 2020),
(197, 29, 50000, '2020-03-05', 1602686024, 3, 2020),
(198, 29, 50000, '2020-07-05', 1602686042, 7, 2020),
(199, 29, 50000, '2020-08-07', 1602686054, 8, 2020),
(200, 29, 50000, '2020-09-30', 1602686072, 9, 2020),
(201, 29, 50000, '2020-10-30', 1602686086, 10, 2020),
(204, 6, 50000, '2020-01-15', 1579021200, 1, 2020),
(205, 6, 50000, '2020-02-15', 1581699600, 2, 2020),
(206, 6, 0, '2020-03-15', 1584205200, 3, 2020),
(207, 6, 0, '2020-04-15', 1586883600, 4, 2020),
(208, 6, 0, '2020-05-15', 1589475600, 5, 2020),
(209, 6, 0, '2020-06-15', 1592154000, 6, 2020),
(210, 6, 50000, '2020-07-15', 1594746000, 7, 2020),
(211, 6, 30000, '2020-08-15', 1597424400, 8, 2020),
(212, 6, 0, '2020-09-15', 1600102800, 9, 2020),
(213, 6, 0, '2020-10-15', 1602694800, 10, 2020),
(214, 6, 0, '2020-11-15', 1605373200, 11, 2020),
(215, 6, 0, '2020-12-15', 1607965200, 12, 2020),
(216, 9, 50000, '2020-01-28', 1602686331, 1, 2020),
(217, 9, 50000, '2020-02-22', 1602686342, 2, 2020),
(218, 9, 50000, '2020-03-13', 1602686351, 3, 2020),
(219, 9, 50000, '2020-07-24', 1602686362, 7, 2020),
(220, 9, 50000, '2020-08-02', 1602686374, 8, 2020),
(221, 9, 50000, '2020-09-01', 1602686392, 9, 2020),
(225, 10, 0, '2020-01-15', 1579021200, 1, 2020),
(226, 10, 0, '2020-02-15', 1581699600, 2, 2020),
(227, 10, 0, '2020-03-15', 1584205200, 3, 2020),
(228, 10, 0, '2020-04-15', 1586883600, 4, 2020),
(229, 10, 0, '2020-05-15', 1589475600, 5, 2020),
(230, 10, 0, '2020-06-15', 1592154000, 6, 2020),
(231, 10, 50000, '2020-07-15', 1594746000, 7, 2020),
(232, 10, 50000, '2020-08-15', 1597424400, 8, 2020),
(233, 10, 0, '2020-09-15', 1600102800, 9, 2020),
(234, 10, 0, '2020-10-15', 1602694800, 10, 2020),
(235, 10, 0, '2020-11-15', 1605373200, 11, 2020),
(236, 10, 0, '2020-12-15', 1607965200, 12, 2020),
(237, 10, 50000, '2020-09-30', 1602686511, 9, 2020),
(238, 11, 50000, '2020-07-04', 1602686538, 7, 2020),
(239, 11, 50000, '2020-08-02', 1602686555, 8, 2020),
(240, 11, 50000, '2020-09-30', 1602686570, 9, 2020),
(243, 20, 50000, '2020-01-22', 1602687044, 1, 2020),
(244, 20, 50000, '2020-02-27', 1602687056, 2, 2020),
(245, 20, 50000, '2020-03-21', 1602687069, 3, 2020),
(246, 20, 50000, '2020-07-28', 1602687085, 7, 2020),
(247, 20, 50000, '2020-08-21', 1602687129, 8, 2020),
(248, 20, 50000, '2020-09-30', 1602687144, 9, 2020),
(249, 27, 50000, '2020-01-28', 1602687221, 1, 2020),
(250, 27, 50000, '2020-02-13', 1602687231, 2, 2020),
(251, 27, 50000, '2020-03-13', 1602687242, 3, 2020),
(252, 27, 50000, '2020-07-28', 1602687259, 7, 2020),
(253, 27, 50000, '2020-08-02', 1602687272, 8, 2020),
(254, 27, 50000, '2020-09-27', 1602687284, 9, 2020),
(261, 23, 50000, '2020-01-31', 1602931028, 1, 2020),
(262, 23, 50000, '2020-02-13', 1602931038, 2, 2020),
(263, 23, 50000, '2020-03-21', 1602931050, 3, 2020),
(264, 23, 50000, '2020-07-10', 1602931064, 7, 2020),
(265, 23, 50000, '2020-08-26', 1602931079, 8, 2020),
(266, 23, 30000, '2020-09-26', 1602931101, 9, 2020),
(267, 48, 50000, '2020-01-21', 1602931632, 1, 2020),
(268, 48, 50000, '2020-02-22', 1602931648, 2, 2020),
(269, 48, 50000, '2020-03-13', 1602931660, 3, 2020),
(270, 48, 50000, '2020-07-24', 1602931683, 7, 2020),
(271, 48, 50000, '2020-08-02', 1602931699, 8, 2020),
(272, 48, 50000, '2020-09-01', 1602931708, 9, 2020),
(279, 55, 50000, '2020-01-15', 1579021200, 1, 2020),
(280, 55, 50000, '2020-02-15', 1581699600, 2, 2020),
(281, 55, 50000, '2020-03-15', 1584205200, 3, 2020),
(282, 55, 0, '2020-04-15', 1586883600, 4, 2020),
(283, 55, 0, '2020-05-15', 1589475600, 5, 2020),
(284, 55, 0, '2020-06-15', 1592154000, 6, 2020),
(285, 55, 50000, '2020-07-15', 1594746000, 7, 2020),
(286, 55, 50000, '2020-08-15', 1597424400, 8, 2020),
(287, 55, 0, '2020-09-15', 1600102800, 9, 2020),
(288, 55, 0, '2020-10-15', 1602694800, 10, 2020),
(289, 55, 0, '2020-11-15', 1605373200, 11, 2020),
(290, 55, 0, '2020-12-15', 1607965200, 12, 2020),
(291, 55, 50000, '2020-09-01', 1602931887, 9, 2020),
(292, 42, 50000, '2020-09-30', 1602931983, 9, 2020),
(293, 18, 50000, '2020-01-28', 1602932352, 1, 2020),
(294, 18, 50000, '2020-02-27', 1602932368, 2, 2020),
(295, 18, 50000, '2020-03-21', 1602932377, 3, 2020),
(296, 18, 50000, '2020-07-21', 1602932388, 7, 2020),
(297, 18, 50000, '2020-08-10', 1602932400, 8, 2020),
(299, 14, 0, '2020-01-15', 1579021200, 1, 2020),
(300, 14, 0, '2020-02-15', 1581699600, 2, 2020),
(301, 14, 0, '2020-03-15', 1584205200, 3, 2020),
(302, 14, 0, '2020-04-15', 1586883600, 4, 2020),
(303, 14, 0, '2020-05-15', 1589475600, 5, 2020),
(304, 14, 0, '2020-06-15', 1592154000, 6, 2020),
(305, 14, 0, '2020-07-15', 1594746000, 7, 2020),
(306, 14, 50000, '2020-08-15', 1597424400, 8, 2020),
(307, 14, 50000, '2020-09-15', 1600102800, 9, 2020),
(308, 14, 0, '2020-10-15', 1602694800, 10, 2020),
(309, 14, 0, '2020-11-15', 1605373200, 11, 2020),
(310, 14, 0, '2020-12-15', 1607965200, 12, 2020),
(311, 54, 50000, '2020-01-22', 1602932790, 1, 2020),
(312, 54, 50000, '2020-02-22', 1602932800, 2, 2020),
(313, 54, 50000, '2020-03-21', 1602932810, 3, 2020),
(314, 54, 50000, '2020-07-07', 1602932825, 7, 2020),
(315, 53, 50000, '2020-01-22', 1602932856, 1, 2020),
(316, 53, 50000, '2020-02-22', 1602932865, 2, 2020),
(317, 53, 50000, '2020-03-21', 1602932874, 3, 2020),
(318, 43, 50000, '2020-01-15', 1579021200, 1, 2020),
(319, 43, 50000, '2020-02-15', 1581699600, 2, 2020),
(320, 43, 50000, '2020-03-15', 1584205200, 3, 2020),
(321, 43, 0, '2020-04-15', 1586883600, 4, 2020),
(322, 43, 0, '2020-05-15', 1589475600, 5, 2020),
(323, 43, 0, '2020-06-15', 1592154000, 6, 2020),
(324, 43, 50000, '2020-07-15', 1594746000, 7, 2020),
(325, 43, 50000, '2020-08-15', 1597424400, 8, 2020),
(326, 43, 50000, '2020-09-15', 1600102800, 9, 2020),
(327, 43, 0, '2020-10-15', 1602694800, 10, 2020),
(328, 43, 0, '2020-11-15', 1605373200, 11, 2020),
(329, 43, 0, '2020-12-15', 1607965200, 12, 2020),
(330, 8, 50000, '2020-10-16', 1603451651, 10, 2020),
(332, 2, 50000, '2020-01-15', 1579021200, 1, 2020),
(333, 2, 50000, '2020-02-15', 1581699600, 2, 2020),
(334, 2, 50000, '2020-03-15', 1584205200, 3, 2020),
(335, 2, 0, '2020-04-15', 1586883600, 4, 2020),
(336, 2, 0, '2020-05-15', 1589475600, 5, 2020),
(337, 2, 0, '2020-06-15', 1592154000, 6, 2020),
(338, 2, 50000, '2020-07-15', 1594746000, 7, 2020),
(339, 2, 10000, '2020-08-15', 1597424400, 8, 2020),
(340, 2, 0, '2020-09-15', 1600102800, 9, 2020),
(341, 2, 0, '2020-10-15', 1602694800, 10, 2020),
(342, 2, 0, '2020-11-15', 1605373200, 11, 2020),
(343, 2, 0, '2020-12-15', 1607965200, 12, 2020),
(344, 2, 50000, '2021-01-05', 1603459113, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `structural`
--

CREATE TABLE `structural` (
  `id` int(10) UNSIGNED NOT NULL,
  `organization_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, '1412 618', 'ASYIFA IBRAHIM', 'KENDARI , 14 FEBRUARI 2000', 'JL. TITANG', 'H. IBRAHIM RAKIBE', '-', 1601196341, 'default.jpg', 0, '2014-12-07', 'WIRASWASTA', 'SLTA', 1),
(3, '1903 1026', 'MUH. ZAENAL PRATAMA', 'KENDARI 07 JULI 2008', 'RRI LAMA', 'MARIATI', '-', 1601195147, 'default.jpg', 1, '2019-03-22', 'IBU RUKMAH TANGGA', 'SLTA', 1),
(4, '1908 1053', 'WIDHY ARTHAMEVIA', 'TACCIPI, 18 NOVEMBER 2010', 'JL. CAKALANG', 'YASMIATI', '-', 1601194965, 'default.jpg', 0, '2019-08-06', 'IBU RUKMAH TANGGA', '    ', 1),
(5, '1908 1054', 'ALEXA ZULVILIANA M', 'KENDARI,27 MARET 2010', 'JL. ANAWAI , RANOMETOO', 'JUMSAR', '-', 1601194941, 'default.jpg', 0, '2019-08-10', 'WIRASWASTA', 'SLTA', 1),
(6, '1908 1058', 'ARNA BELA ARSITA', 'KENDARI, 6 JULI 2010', 'JL. PEMBANGUNAN', 'IRMAN', '-', 1601194918, 'default.jpg', 0, '2019-08-21', 'WIRASWASTA', 'SLTA', 1),
(7, '1908 1061', 'ANIKASYAM', 'SEBELAH, 26 MEI 2012', 'JL. PEMBANGUNAN', 'SAMSIL', '-', 1601194883, 'default.jpg', 0, '2019-08-23', 'WIRASWASTA', 'SLTP', 1),
(8, '1909 1064', 'R DYLAN', 'KENDARI, 27 JANUARI 2013', 'JL. Ir. SOEKARNO', 'FIRA SABARA', '-', 1601194863, 'default.jpg', 1, '2019-09-24', 'IBU RUKMAH TANGGA', 'SLTA', 1),
(9, '1911 1084', 'LUTHFI ALDI', 'SELAYAR,-', 'GUNUNG JATI', 'ARFAN', '-', 1601194754, 'default.jpg', 1, '2019-11-19', 'BURUH HARIAN', 'SLTP', 1),
(10, '2007 1097', 'RIANTI FEBRIANTI', 'KENDAEI, 1 FEBRUARI 2014', 'JL. KONGGOASA', 'RUSLI', '-', 1601194611, 'default.jpg', 0, '2020-07-09', 'WIRASWASTA', 'SMK', 1),
(11, '2007 1098', 'MUHAMMAD RIFAI', 'KENDARI, 3 DESEMBER 2012', 'JL. KONGGOASA', 'RUSLI', '-', 1601194588, 'default.jpg', 1, '2020-07-10', 'WIRASWASTA', 'SMK', 1),
(12, '2007 1101', 'NUR SUCI FADHILLAH Z', 'KENDARI, 2 SEPTEMBER 2013', 'JL. S. KONAWEHA', 'ZAINUDDIN', '-', 1601194553, 'default.jpg', 0, '2020-07-13', 'WIRASWASTA', 'SLTA', 1),
(13, '2007 1102', 'MUH. FEBRIANSYAH', 'KENDARI, 4 FEBRUARI 2013', 'JL. LASOLO', 'HASIM', '-', 1601194407, 'default.jpg', 1, '2020-07-14', 'WIRASWASTA', 'SLTA', 1),
(14, '2008 1107', 'MUH.YUSUF JUFRI RENDI', 'KENDARI, 24 SEPTEMBER 2015', 'JL. PEMBANGUNAN', 'JUFRI RENDI', '-', 1601194385, 'default.jpg', 1, '2019-08-08', 'WIRASWASTA', 'SLTP', 1),
(15, '2009 1113', 'DIRLI ANUGRAH', 'BELUM DI ISI', 'JL. PEMBANGUNAN', 'BELUM DI ISI', '-', 1601194250, 'default.jpg', 1, '2019-08-01', 'WIRASWASTA', 'SLTA', 1),
(16, '2009 1114', 'MUHAMMAD ADRIANSYAH', 'BELUM DI ISI', 'BELUM DI ISI', 'BELUM DI ISI', '-', 1601195036, 'default.jpg', 1, '2019-08-01', 'BELUM DI ISI', 'BELUM DI ISI', 1),
(17, '2009 1115', 'SITTI ZAKIAH  NUR AISYAH', 'BELUM DI ISI', 'JL. Ir SOEKARNO', 'BELUM DI ISI', '-', 1601194326, 'default.jpg', 0, '2020-07-17', 'WIRASWASTA', '', 1),
(18, '1503646', 'SEFI SHABRINA NURALINI', 'KENDARI, 10 FEBRUARI 2009', 'JL. LASOLO NO. 14', 'DALIMIN', '-', 1601196368, 'default.jpg', 1, '2015-03-06', 'WIRASWASTA', 'SLTA', 1),
(19, '1510718', 'AUREL SEPTIRAHMARIANTI R', 'KENDARI, 12 SEPTEMBER 2007', 'JL. CAKALANG', 'RUSLAN', '-', 1601196731, 'default.jpg', 0, '2015-10-07', 'WIRASWASTA', 'SLTP', 1),
(20, '1607762', 'AMELIA RATNA WULANDA', 'KENDARI, 21 AGUSTUS 2006', 'JL. S. KONAWEHA', 'SURATNO', '-', 1601196751, 'default.jpg', 0, '2016-07-17', 'WIRASWASTA', 'SLTA', 1),
(21, '1608791', 'LUTHFI FARAS ALINAF', 'KENDARI, 15 MEI 2009', 'JL. FAJAR MERANTAU', 'WAHYUNINGSI', '-', 1601196770, 'default.jpg', 1, '2016-08-10', 'IBU RUMAH TANGGA', 'SLTA', 1),
(22, '1609806', 'LUNA LIRISIA EREN', 'KENDARI, 20 AGUSTUS 2009', 'JL. S. KONAWEHA', 'ASDAR', '-', 1601196789, 'default.jpg', 0, '2016-09-01', 'WIRASWASTA', 'SLTA', 1),
(23, '1609808', 'HARYADI', 'KENDARI, 18 MEI 2008', 'JL. CAKALANG', 'ABD. KADIR', '-', 1601196868, 'default.jpg', 1, '2016-09-08', 'WIRASWASTA', 'SLTP', 1),
(24, '1708851', 'FATIMAH AZZAHRA ABDUL W', 'KENDARI, 28 MEI 2011', 'JL. FAJAR MERANTAU', 'ZAINUDDIN', '-', 1601196810, 'default.jpg', 0, '2017-08-01', 'WIRASWASTA', 'SLTA', 1),
(25, '1708853', 'ASRUN MUBAROK', 'KENDARI, 23 AGUSTUS 2009', 'JL. FAJAR MERANTAU', 'M. TAHANG SUDDING', '-', 1601196846, 'default.jpg', 1, '2017-08-03', 'WIRASWASTA', 'SD', 1),
(26, '1708859', 'MARLINDA', 'KENDARI, 11 MARET  2011', 'JL. FAJAR MERANTAU', 'HJ. ROSNAWATI', '-', 1601196709, 'default.jpg', 0, '2017-08-04', 'IBU RUMAH TANGGA', 'SLTA', 1),
(27, '1708866', 'ERNA WATI', 'RAHA, 28 MARET 2013', 'JL. FAJAR MERANTAU', 'RUSTAM', '-', 1601196687, 'default.jpg', 0, '2017-08-10', 'NELAYAN', 'SLTP', 1),
(28, '1708869', 'MUH, ABD. RAHMAN', 'KENDARI 07 JUNI 2009', 'JL. DR. MOH HATTA', 'ISMAIL', '-', 1601196663, 'default.jpg', 1, '2017-08-10', 'WIRASWASTA', 'SLTP', 1),
(29, '1710890', 'AHMAD IMAAM .M', 'RAHA, 28 SEPTEMBER 2009', 'JL. MOH HATTA', 'AMRAN ALIMUDDIN', '-', 1601196626, 'default.jpg', 1, '2017-10-02', 'WIRASWASTA', 'SLTA', 1),
(30, '1710894', 'KEILA ROHMATUL M', 'KENDARI, 20 JANUARI 2011', 'RRI LAMA', 'JALIAH', '-', 1601196604, 'default.jpg', 0, '2017-10-12', 'IBU RUMAH TANGGA', 'STM', 1),
(31, '1710897', 'ASMIRANDA RAMADHANI', 'KENDARI, 14 AGUSTUS 2010', 'JL. PEMBANGUNAN', 'ILHAM', '-', 1601196536, 'default.jpg', 0, '2017-10-19', 'WIRASWASTA', 'SMK', 1),
(32, '1711902', 'ZAHRA  RAMADHANI', 'KENDARI, 09 SPETEMBER 2009', 'JL. PEMBANGUNAN', 'MUH. AMIR', '-', 1601196472, 'default.jpg', 0, '2017-11-02', 'WIRASWASTA', 'SLTA', 1),
(33, '1711906', 'DESKI NAVALYA MUTIARA', 'BONE, 03 FEBRUARI 2011', 'JL. DOWI AWI', 'ELIA', '-', 1601196430, 'default.jpg', 0, '2017-11-15', 'WIRASWASTA', 'SLTA', 1),
(34, '1801912', 'RAHMAH AMELIA JUSRIN', 'KENDARI, 3 MEI 2010', 'LAPULU', 'M. JUSRIN', '-', 1601196410, 'default.jpg', 0, '2018-01-10', 'WIRASWASTA', 'SLTP', 1),
(35, '1804925', 'AURA ALFINAJMU', 'KENDARI,09 MEI 2010', 'JL.BARONANG', 'HERDI BACHTIAR', '-', 1601196386, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'S1', 1),
(36, '1804926', 'SHAFIRA ATIFA FAIZAL', 'KENDARI,02 JANUARI 2011', 'JL.TINUMBU', 'FAIZAL ACHMAD', '-', 1601196316, 'default.jpg', 0, '2018-04-09', 'WIRASWASTA', 'SLTA', 1),
(37, '1805929', 'NAGITA AULIA PUTRI', 'KENDARI,11 JANUARI 2010', 'JL.KONAWEHA', 'ABDUL SAMAD', '-', 1601196269, 'default.jpg', 0, '2018-05-07', 'WIRASWASTA', 'SLTA', 1),
(38, '1806933', 'MUH.IFANSYAH LOMPI', 'KENDARI,13 JANUARI 2005', 'JL.DR.MOH HATTA', 'SANTI IRFAN', '-', 1601196249, 'default.jpg', 1, '2018-06-23', 'WIRASWASTA', 'SLTA', 1),
(39, '1807934', 'YUNITA WIRANTI ANGGRAINI', 'KENDARI,06 MEI 2012', 'JL.DR.MOH HATTA', 'YUSRAN YUNUS', '-', 1601196228, 'default.jpg', 0, '2018-07-02', 'POLISI', 'SLTA', 1),
(40, '1807936', 'MUH.RASYA RAMADHAN', 'MAKASSAR 07 NOVEMBER 2010', 'JL.DR.MOH HATTA', 'MARIATI', '-', 1601196205, 'default.jpg', 1, '2018-07-05', 'PEDAGANG', 'SLTA', 1),
(41, '1807938', 'ANDI SERA', 'KENDARI, 13 JUNI 2009', 'JL. IR SOEKARNO', 'ANDI AZWAR', '-', 1601196177, 'default.jpg', 0, '2018-07-06', 'WIRASWASTA', 'SLTA', 1),
(42, '1807946', 'DIANDRA ANZHANY', 'CENOEE, 17 APRIL 2011', 'JL. IR SOEKARNO', 'SUHARI', '-', 1601196147, 'default.jpg', 0, '2017-07-10', 'IBU RUMAH TANGGA', 'SLTP', 1),
(43, '1807950', 'MUH. ADRIANSYAH M', 'KENDARI, 24 JUNI 2011', 'JL. IR SOEKARNO', 'MUSTAKBAL', '-', 1601196088, 'default.jpg', 1, '2018-07-12', 'WIRASWASTA', 'SLTA', 1),
(44, '1807958', 'PUTRI SAKINA MARLIA', 'KENDARI, 30 APRIL 2012', 'JL. DR. MOH HATTA', 'MARLIA', '-', 1601196031, 'default.jpg', 0, '2018-07-31', 'WIRASWASTA', 'SLTA', 1),
(45, '1808961', 'MUH. AYUB HAIRUN', 'KENDARI, 19 OKTOBER 2010', 'JL. GAJAH MADA', 'HAIRUN', '-', 1601195976, 'default.jpg', 1, '2018-08-02', 'BURUH TANI', 'SLTA', 1),
(46, '1808966', 'MUH. ARFANDI DULLA', 'KENDARI, 13 MARET 2006', 'JL. JATI MEKAR', 'ARFAN', '-', 1601195949, 'default.jpg', 1, '2018-08-03', 'WIRASWASTA', 'SLTA', 1),
(47, '1808967', 'RANAL AKTAR Q.H', 'KENDARI, 14 NOVEMBER 2011', 'JL. LASOLO', 'IR. JUSRAN HALIK SP., M.Si', '-', 1601195790, 'default.jpg', 1, '2018-08-04', 'PNS', 'S2', 1),
(48, '1808968', 'ZULFAHDIL', 'SELAYAR, 09 SEPTEMBER 2011', 'GUNUNG JATI', 'ARFA', '-', 1601195317, 'default.jpg', 1, '2018-08-04', 'BURUH PELABUHAN', 'SLTA', 1),
(49, '1808981', 'LESTARI SUCI', 'KENDARI, 10 JANUARI 2009', 'GUNUNG JATI', 'RIA', '-', 1601195287, 'default.jpg', 0, '2018-08-20', 'PEDAGANG', 'SLTP', 1),
(50, '1808984', 'AKBAR KAISAR', 'KENDARI, 28 DESEMBER 2011', 'JL. FAJAR MERANTAU', 'ISKANDAR', '-', 1601195220, 'default.jpg', 1, '2018-08-29', 'WIRASWASTA', 'SLTA', 1),
(51, '1809991', 'ARIL RAMADHAN', 'KENDARI, 10 OKTOBER 2006', 'GUNUNG JATI', 'IRLAN', '-', 1601195190, 'default.jpg', 1, '2018-09-24', 'BURUH', 'SLTP', 1),
(52, '19031027', 'NURLIANA', 'KEN DARI, 13 JULI 2008', 'GUNUNG JATI', 'NASRUN', '-', 1601195166, 'default.jpg', 0, '2019-03-26', 'BURUH', 'SLTP', 1),
(53, '19051033', 'M. ILHAM SAPUTRA', 'KENDARI, 24 OKTOBER 2010', 'JL. BANGAU', 'ALI', '-', 1601195121, 'default.jpg', 1, '2019-05-20', 'WIRASWASTA', 'SD', 1),
(54, '19071041', 'SITI PUTRI WULANDARI', 'KENDARI, 18 JUNI 2013', 'JL. BANGAU', 'ALI', '-', 1601195014, 'default.jpg', 0, '2019-07-18', 'WIRASWASTA', 'SLTA', 1),
(55, '1911 1085', 'MUHAMMAD AFRIADIT', 'KENDARI, -', 'GUNUNG JATI', 'ARFAN', '-', 1601195100, 'default.jpg', 1, '2019-11-19', 'BURUH', 'SLTP', 1),
(56, '1912 1087', 'EKA RIYANTI YUNITA SARI', 'KENDARI, 6 JANUARI 2009', 'JL. CAKALANG NO. 24', 'HJ. FARIAH', '-', 1601195058, 'default.jpg', 0, '2019-12-06', 'IBU RUMAH TANGGA', 'SLTA', 1),
(57, '2001 1092', 'PUTRI AULIA HIKMAH', 'LAMONGAN, 08 JUNI 2013', 'JL. DR MOH HATTA', 'DODIK IRWANTO', '-', 1601195076, 'default.jpg', 0, '2020-01-21', 'WIRASWASTA', 'SLTA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `position`, `description`, `photo`, `_order`) VALUES
(2, 'Muh Syamsul Alam S', 'Ketua', 'Ketua', '1599286823_Ketua_TPA___Muh_Syamsul_Alam_S.jpg', 0),
(8, 'Muhammad Farhan Akil Bahri', 'Sekertaris ', 'Sekretaris', '1599286934_Sekertaris___Farhan_Aqil_Bahri_.jpg', 0),
(11, 'Winda Almaidah', 'Bendahara', 'Bendahara', '1600483669_Bendahara_:_Winda_Almaidah.jpg', 0),
(12, 'Khaerul Ulum', 'Wakil Sekretaris', 'Wakil Sekretaris', '1600701249_SAVE_20200921_231355.jpg', 0),
(13, 'Fauzan Rijul Ramadhan', 'Wakil Bendahara', 'Wakil Bendahara', '1600701271_SAVE_20200921_231345.jpg', 0),
(14, 'Rahmawati', 'Bidang Kemuslimahan', 'Bidang Kemuslimahan', '1600700658_Bidang_Kemuslimahan_:_Rahmawati.jpg', 0),
(15, 'Nur Alamsyah Asis', 'Bidang Inventarisasi', 'Bidang Inventarisasi', '1600700765_Inventaris_:_Nur_alamsyah_Azis.jpg', 0),
(16, 'Saskia Cahya Risda', 'Bidang Kebersihan dan Perlengkapan', 'Bidang Kebersihan dan Perlengkapan', '1600700863_Perlengkapan_dan_Kebersihan_:_Zaskia_Cahya_Risda_.jpg', 0),
(17, 'Fizal Oktaviansyah', 'Bidang Humas dan Media', 'Bidang Humas dan Media', '1600700914_Humas_dan_Media_:_Fizal_Oktaviansyah.jpg', 0);

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
(1, '127.0.0.1', 'admin@fixl.com', '$2y$12$XpBgMvQ5JzfvN3PTgf/tA.XwxbCOs3mO0a10oP9/11qi1NUpv46.u', 'admin@fixl.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1601910415, 1, 'Admin', 'istrator', '081342989185', 'USER_1_1571554027.jpeg', 'admin'),
(13, '::1', 'uadmin@gmail.com', '$2y$10$78SZyvKRKMU7nPCew9w4nOpEUmJ1SeTV4L4ZG2NXXSfbEaswqoepq', 'uadmin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1568678256, 1603458206, 1, 'admin', 'TPA', '00', 'USER_13_1568678463.jpg', 'jln mutiara no 8');

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `mosque`
--
ALTER TABLE `mosque`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `structural`
--
ALTER TABLE `structural`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Constraints for table `assessment`
--
ALTER TABLE `assessment`
  ADD CONSTRAINT `assessment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `savings`
--
ALTER TABLE `savings`
  ADD CONSTRAINT `savings_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `structural`
--
ALTER TABLE `structural`
  ADD CONSTRAINT `structural_ibfk_1` FOREIGN KEY (`organization_id`) REFERENCES `organization` (`id`);

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
