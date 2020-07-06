-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2016 at 09:40 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pakaranak`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `blokir` enum('Y','N') NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `email`, `alamat`, `telepon`, `blokir`, `gambar`) VALUES
(1, 'ika', 'ika', '123456', 'ika@gmail.com', 'arahan', '089502606135', 'N', ''),
(2, 'admin', 'admin', 'admin', 'admin@admin.com', 'indramayu', '0812345678', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE IF NOT EXISTS `hasil_diagnosa` (
  `id_diagnosa` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `tanggal_diagnosa` datetime NOT NULL,
  `persentase` int(3) NOT NULL,
  PRIMARY KEY (`id_diagnosa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id_diagnosa`, `username`, `kode_penyakit`, `tanggal_diagnosa`, `persentase`) VALUES
(91, 'ika123', 'P0008', '2016-07-18 07:55:11', 120),
(92, 'ika123', 'P0008', '2016-07-20 11:34:43', 140),
(93, 'ika123', 'P0008', '2016-07-20 11:49:51', 120),
(94, 'ika123', 'P0008', '2016-07-20 12:10:57', 140),
(95, 'ika123', 'P0008', '2016-07-23 09:23:10', 120),
(101, 'yuli', 'P0008', '2016-08-04 15:31:53', 120),
(102, 'ibnu', 'P0006', '2016-08-06 07:41:10', 100),
(103, 'sisi', 'P0006', '2016-08-07 09:47:03', 100),
(104, 'sisi', 'P0008', '2016-08-07 09:48:45', 120),
(105, 'ibnu', 'P0002', '2016-08-07 12:53:11', 120);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int(2) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `nm_info` text NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `judul`, `nm_info`) VALUES
(5, '1.	Mengenal ASI Ekskusif ', '<p style="text-align: justify;">Air susu ibu (ASI) adalah sebuah cairan tanpa tanding ciptaan Yang Maha Kuasa untuk memenuhi kebutuhan gizi bayi dan melindunginya dalam melawan kemungkinan serangan penyakit. Keseimbangan zat-zat gizi dalam air susu ibu berada pada tingkat terbaik dan mudah dicerna oleh bayi baru lahir. ASI kaya akan sari makanan, paling higienis, dengan temperatur yang tepat dan kadar gizi yang paling dibutuhkan oleh bayi. ASI memiliki banyak manfaat, diantaranya adalah :</p>\r\n<p style="text-align: justify;"><span style="text-align: justify;">meningkatkan kecerdasan bayi</span><br /><span style="text-align: justify;">mengurangi risiko penyakit jantung</span><br /><span style="text-align: justify;">mengurangi risiko obesitas</span><br /><span style="text-align: justify;">mengurangi risiko kanker</span><br /><span style="text-align: justify;">mengurangi risiko infeksi saluran pernapasan dan diare</span><br /><span style="text-align: justify;">membuat bayi lebih tenang dan tidak mudah gelisah untuk waktu yang lama&nbsp;terutama dalam kondisi yang membuat stres (jurnal Archives of Disease in Childhood)</span><br /><span style="text-align: justify;">mengurangi kejadian alergi pada anak Makanan-makanan tiruan untuk bayi berupa susu formula tidak ada yang mampu menandingi keunggulan ASI.</span></p>\r\n<p style="text-align: justify;">Daftar manfaat ASI bagi bayi selalu bertambah setiap harinya. Salah satu hal yang menyebabkan ASI sangat dibutuhkan bagi perkembangan bayi yang baru lahir adalah kandungan minyak omega-3 asam linoleat alfa untuk perkembangan otak dan saraf. Apabila bayi diberikan makanan tambahan di bawah usia 6 bulan, maka ada kemungkinan bayi dapat mengalami gangguan pencernaan maupun alergi. Hal ini disebabkan sistim pencernaan bayi yang masih belum sempurna dan begitu pula sistim kekebalan tubuh pada bayi. Invaginasi atau salah satu penyakit pada bayi yaitu usus bayi masuk ke dalam ususnya yang lain akibat pengenalan makanan padat sebelum waktunya dapat mengancam nyawa bayi. Invaginasi membutuhkan terapi operasi. Ketimbang memberikan susu formula, akan lebih baik jika bayi diberikan ASI karena manfaat yang banyak bagi bayi dan Ibu. Keuntungan memberikan ASI bagi Ibu adalah :</p>\r\n<p style="text-align: justify;"><span style="text-align: justify;">Menambah panjang kembalinya kesuburan pasca melahirkan, sehingga dapat digunakan sebagai kontrasepsi alami</span><br /><span style="text-align: justify;">Ibu lebih cepat langsing. Penelitian membuktikan bahwa ibu menyusui enam bulan lebih langsing setengah kg dibanding ibu yang menyusui empat bulan Sebenarnya, jumlah produksi ASI tergantung dari berapa banyak bayi menyusu. Semakin sering bayi menyusu, semakin banyak hormon prolaktin dilepaskan, dan semakin banyak produksi ASI. Maka jika pada awal-awal masa menyusui, ASI Ibu tidak lancar maka tidak perlu khawatir karena dengan semakin sering mneyusui maka produksi ASI dapat semakin bertambah.</span></p>'),
(9, 'Cara tepat memilih pengasuh anak', '<p style="text-align: justify;">Salah satu jenis profesi yang belakangan ini semakin banyak ditemui adalah profesi pengasuh anak atau pengasuh bayi. Ini tidaklah mengherankan ketika semakin banyak orang tua yang bekerja di sektor formal dan harus meninggalkan rumah setidaknya 8 jam setiap harinya dan terpaksa meninggalkan pengasuhan anak pada orang lain selama periode tersebut. Bagi orang tua, meninggalkan anak pada pengasuhan orang lain, seberapapun sebentarnya, bukanlah sebuah pilihan yang mudah. Semua orang tua tentunya menginginkan bisa mengasuh buah hatinya sendiri dan melihatnya tiap saat. Namun terkadang ini bukanlah sebuah pilihan karena tuntutan pekerjaan.</p>\r\n<p style="text-align: justify;">apa saja yang harus diperhatikan ketika memilih pengasuh anak?</p>\r\n<p style="text-align: justify;">1. Keluarga Besar Pertimbangkan apakah di rumah ada keluarga lain yang tinggal selain keluarga inti. Dalam beberapa kondisi, orang tua, mertua, atau saudara juga tinggal dalam rumah yang sama atau berada dalam lingkungan yang sama. Kondisi ini bisa menjadi ideal karena berarti anak ada dalam pengawasan keluarga juga. Namun kondisi ini juga bisa menjadi potensi sumber masalah ketika ada ketidakcocokan antara pengasuh anak dan keluarga besar.</p>\r\n<p style="text-align: justify;">2. Kredibilitas agen Berhati-hatilan memilih pengasuh anak yang terpercaya. Beberapa hal yang dapat dilakukan untuk memastikan ini adalah mengambil dari agen penyalur yang terpercaya dan sudah memiliki pengalaman baik. Di dunia yang marak teknologi hal ini dapat mudah dicek. Manfaatkan fasilitas Google dan forum media sosial untuk mengecek adakah berita miring tentang agen tersebut. Jangan enggan untuk bertanya demi mendapatkan rekomendasi.</p>\r\n<p style="text-align: justify;">3. Aturan dasar Sebelum meninggalkan anak pada pengasuhan orang lain, buatlah aturan dasar pengasuhan anak. Aturan ini menyangkut bagaimana pola makan yang kita harapkan untuk diterapkan. Bagaimana cara pengolahan bahan makanan yang kita inginkan. Pola kebersihan seperti apa yang kita inginkan untuk diterapkan. Apa yang harus dilakukan pertama kali ketika terjadi kecelakaan di rumah, misalnya ketika anak jatuh dan terluka, apa yang harus dilakukan. Tinggalkan nomor telepon penting yang harus segera dihubungi dalam keadaan darurat.</p>\r\n<p style="text-align: justify;">4) Menu harian Bagi orang tua yang meninggalkan rumah dan memasrahkan penyiapan makanan pada pengasuh, pastikan makan anak terkontrol dengan menyiapkan menu harian anak dan cara pengolahan yang diinginkan. Misalnya: jangan gunakan penyedap dan jangan masak sayur kelewat matang. Anak harus makan buah tiap hari dan beri makanan cemilan hanya pada waktunya. Hal-hal seperti ini harus rajin-rajin disiapkan agar anak tetap terjaga nutrisi dan asupannya. Salah satu menjaga kesehatan anak adalah dengan menjaga makanan yang masuk ke dalam tubuh anak seh</p>\r\n<p style="text-align: justify;">5) Komunikasi Kembangkan pola komunikasi yang baik dengan pengasuh anak. Berbagilah informasi secara baik dan seimbangkan antara pola memberi instruksi/perintah dengan pola berdikusi dua arah untuk mendapatkan masukan. Cari tahu pendapatnya tentang sesuatu hal. Kembangkan hubungan saling menghormati dan menghargai. Kalau perlu ingat-ingatlah tanggal ulang tahunnya dan ajak keluarga untuk ikut merayakan atau memberikan kejutan manis. Seperti: ï¿½mbak tidak bekerja pada hari ulang tahunï¿½. Selain itu tentunya tepatilah hal-hal dasar seperti membayar gaji dan bonus tepat pada waktunya dan tidak merugikan yang bersangkutan.ingga kekebalan tubuhnya terjaga.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `pakar`
--

CREATE TABLE IF NOT EXISTS `pakar` (
  `id_pakar` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `pakarname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pakar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pakar`
--

INSERT INTO `pakar` (`id_pakar`, `nama`, `alamat`, `nohp`, `pakarname`, `password`) VALUES
(5, 'pakar', 'Ds. Karang Turi- Indramayu', '', 'pakar', 'pakar');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pertanyaan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `nm_pertanyaan`) VALUES
(1, 'Siapakah Nama Ibu Anda?'),
(2, 'Apa makanan favorit anda?'),
(3, 'Apa Film Favorite Anda?'),
(4, 'Dimana Tempat Favorite Anda?');

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `id_rule` int(5) NOT NULL AUTO_INCREMENT,
  `kode_penyakit` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `bobot` int(11) NOT NULL,
  PRIMARY KEY (`id_rule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`id_rule`, `kode_penyakit`, `kode_gejala`, `bobot`) VALUES
(100, 'P0008', 'G0001', 20),
(101, 'P0008', 'G0002', 20),
(102, 'P0008', 'G0012', 15),
(103, 'P0008', 'G0017', 15),
(104, 'P0008', 'G0021', 15),
(105, 'P0008', 'G0024', 15),
(106, 'P0003', 'G0001', 20),
(107, 'P0003', 'G0002', 20),
(108, 'P0003', 'G0004', 15),
(109, 'P0003', 'G0037', 15),
(110, 'P0003', 'G0038', 15),
(111, 'P0003', 'G0039', 15),
(112, 'P0006', 'G0001', 25),
(113, 'P0006', 'G0003', 25),
(114, 'P0006', 'G0008', 25),
(115, 'P0006', 'G0009', 25),
(121, 'P0005', 'G0001', 20),
(122, 'P0005', 'G0022', 20),
(123, 'P0005', 'G0023', 20),
(124, 'P0005', 'G0049', 20),
(125, 'P0005', 'G0059', 20),
(131, 'P0004', 'G0001', 25),
(132, 'P0004', 'G0007', 25),
(133, 'P0004', 'G0011', 25),
(134, 'P0004', 'G0015', 25),
(135, 'P0010', 'G0001', 15),
(136, 'P0010', 'G0020', 15),
(137, 'P0010', 'G0025', 15),
(138, 'P0010', 'G0052', 15),
(139, 'P0010', 'G0053', 15),
(140, 'P0010', 'G0054', 15),
(141, 'P0010', 'G0055', 10),
(142, 'P0009', 'G0001', 20),
(143, 'P0009', 'G0010', 20),
(144, 'P0009', 'G0040', 20),
(145, 'P0009', 'G0041', 20),
(146, 'P0009', 'G0056', 20),
(147, 'P0011', 'G0001', 20),
(148, 'P0011', 'G0042', 20),
(149, 'P0011', 'G0044', 15),
(150, 'P0011', 'G0045', 15),
(151, 'P0011', 'G0046', 15),
(152, 'P0011', 'G0057', 15),
(153, 'P0007', 'G0001', 25),
(154, 'P0007', 'G0034', 25),
(155, 'P0007', 'G0035', 25),
(156, 'P0007', 'G0036', 25),
(157, 'P0012', 'G0027', 15),
(158, 'P0012', 'G0028', 15),
(159, 'P0012', 'G0029', 10),
(160, 'P0012', 'G0030', 10),
(161, 'P0012', 'G0031', 10),
(162, 'P0012', 'G0032', 10),
(163, 'P0012', 'G0033', 10),
(164, 'P0012', 'G0047', 10),
(165, 'P0012', 'G0051', 10),
(166, 'P0002', 'G0016', 20),
(167, 'P0002', 'G0018', 20),
(168, 'P0002', 'G0019', 15),
(169, 'P0002', 'G0020', 15),
(170, 'P0002', 'G0058', 15),
(171, 'P0002', 'G0060', 15),
(172, 'P0013', 'G0043', 50),
(173, 'P0013', 'G0061', 50),
(194, 'P0001', 'G0001', 0),
(195, 'P0001', 'G0005', 0),
(196, 'P0001', 'G0006', 0),
(197, 'P0001', 'G0013', 0),
(198, 'P0001', 'G0014', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_gejala`
--

CREATE TABLE IF NOT EXISTS `tabel_gejala` (
  `kode_gejala` varchar(5) NOT NULL,
  `nm_gejala` varchar(255) NOT NULL,
  `kode_ya` varchar(5) NOT NULL,
  `kode_tidak` varchar(5) NOT NULL,
  PRIMARY KEY (`kode_gejala`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_gejala`
--

INSERT INTO `tabel_gejala` (`kode_gejala`, `nm_gejala`, `kode_ya`, `kode_tidak`) VALUES
('G0023', 'Pernapasan menjadi cepat', 'G0022', ''),
('G0022', 'Batuk kering kemudian menjadi berdahak, ekspirasi (penghembusan napas) berbunyi wheezing (bising men', 'G0059', ''),
('G0059', 'Sianosis (Kebiruan pada kulit) bibir', 'G0049', ''),
('G0008', 'Nyeri sendi', 'G0003', ''),
('G0009', 'Nyeri otot', 'G0008', ''),
('G0049', 'Pilek', '', 'G0003'),
('G0039', ' Adanya ruam kulit (bercak merah) diseluruh tubuh muncul saat demam tinggi dan bisa semakin banyak h', 'G0038', ''),
('G0003', 'Batuk kering', '', 'G0002'),
('G0038', ' Adanya koplik spots (Bintik Koplik)', 'G0037', ''),
('G0004', ' Pilek', '', 'G0012'),
('G0037', ' Hidung Berair atau mata merah', 'G0004', ''),
('G0024', ' Membuka Hidung lebar-lebar pada saat menarik napas karena sulit bernapas', 'G0021', ''),
('G0021', ' Sianosis (Kebiruan pada Kulit/Bibir)', 'G0017', ''),
('G0017', ' Dispena (Sesak Napas)', 'G0012', ''),
('G0012', ' Kejang', 'G0002', ''),
('G0002', ' Batuk', 'G0001', ''),
('G0001', ' Demam', '', ''),
('G0005', 'Gelisah', '', 'G0049'),
('G0006', 'Rewel', 'G0005', ''),
('G0013', 'Napsu makan berkurang', 'G0006', ''),
('G0014', 'Tinja dengan ciri-ciri seperti cair dan mungkin disertai lendir dan atau darah, muntah dan dehidrasi dengan ciri-ciri seperti trugor (kelenturan) kulit berkurang, mata cekung, ubun-ubun cekung, mulut merah dan kering', 'G0013', ''),
('G0007', 'Mual/muntah', '', 'G0005'),
('G0011', 'Nyeri tenggorokan', 'G0007', ''),
('G0015', 'Sakit perut dan susah menelan', 'G0011', ''),
('G0052', 'Nyeri sendi', '', 'G0007'),
('G0053', 'Nyeri otot', 'G0052', ''),
('G0054', 'Nyeri kepala', 'G0053', ''),
('G0055', 'Nyeri Tenggorokan', 'G0054', ''),
('G0025', 'Hidung tersumbat, hidung berair, lendir pada anak pilek akibat common cold biasanya awalnya jernih kemudian menjadi kental dan kekuningan', 'G0055', ''),
('G0020', 'Ekspirasi (penghembusan napas) berbunyi wheezing (bising mengi)', 'G0019', ''),
('G0010', 'Nyeri kepala', '', 'G0052'),
('G0056', 'Napsu makan berkurang', 'G0010', ''),
('G0040', 'Badan pegal-pegal', 'G0056', ''),
('G0041', 'Adanya ruam berupa bintil yang berisi air dan gatal dianggota tubuh', 'G0040', ''),
('G0057', 'Napsu makan berkurang', '', 'G0010'),
('G0042', 'Nyeri pada telinga', 'G0057', ''),
('G0044', 'Batuk lebih dari 3 minggu', 'G0042', ''),
('G0045', 'Batuk berdarah', 'G0044', ''),
('G0046', 'Berkeringat dimalam hari', 'G0045', ''),
('G0034', 'Dari pemeriksaan fisik terdapat pembesaran hati', '', 'G0057'),
('G0035', 'Adanya tanda perdarahan (adanya bintik-bintik perdarahan di bawah kulit, adanya perdarahan dimukosa, perdarahan dari hidung dan gusi, muntah darah atau buang air besar kehitaman)', 'G0034', ''),
('G0036', 'Adanya tanda-tanda syok seperti nadi cepat dan lemah, tangan dan kaki terasa dingin, tekanan darah sangat rendah dan gelisah', 'G0035', ''),
('G0047', 'Batuk', '', 'G0001'),
('G0051', 'Mual/muntah', 'G0047', ''),
('G0027', 'Anak rewel terutama setelah menyusu', 'G0051', ''),
('G0028', 'Terbangun pada malam hari', 'G0027', ''),
('G0029', 'Menolak menyusu', 'G0028', ''),
('G0030', 'Gangguan pertumbuhan (mengurangnya pertambahan berat badan)', 'G0029', ''),
('G0031', 'Kolik', 'G0030', ''),
('G0032', 'Gangguan menelan', 'G0031', ''),
('G0033', 'Gangguan bernapas', 'G0032', ''),
('G0050', 'Pilek', '', 'G0047'),
('G0016', 'Batuk kuat serta kering dan suara serak', 'G0050', ''),
('G0058', 'Dispena (sesak napas)', 'G0016', ''),
('G0018', 'Inspirasi (tarikan napas) berbunyi stridor (kasar)', 'G0058', ''),
('G0019', 'Demam dan terkadang berkeringat', 'G0018', ''),
('G0060', 'Sianosis (kebiruan kulit) bibir', 'G0020', ''),
('G0061', 'Nyeri pada telinga', '', 'G0050'),
('G0043', 'Keluar nanah dari telinga kurang dari 2 minggu', 'G0061', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penyakit`
--

CREATE TABLE IF NOT EXISTS `tabel_penyakit` (
  `kode_penyakit` varchar(5) NOT NULL,
  `nm_penyakit` text NOT NULL,
  `penyebab` text NOT NULL,
  `gambar` text NOT NULL,
  `definisi` text NOT NULL,
  `pengobatan` text NOT NULL,
  PRIMARY KEY (`kode_penyakit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penyakit`
--

INSERT INTO `tabel_penyakit` (`kode_penyakit`, `nm_penyakit`, `penyebab`, `gambar`, `definisi`, `pengobatan`) VALUES
('P0001', 'Diare', '<p>bakteri</p>', 'diare.jpg', '<p style="text-align: justify;">perubahan kebiasaan buang air besar, ditunjukan dengan peningkatan frekuensi (buang air besar lebih dari 3 kali dalam 1 hari) ditandai perubahan tinja dari padat menjadi cair.</p>', '<ol>\r\n<li>Pemberian terapi rehidrasi (pembuatan oralit :8 sendok the gula, ditambahkan 1 sendok the garam, lalu dilarutkan ke dalam 1 liter air matang).</li>\r\n<li style="text-align: justify;">Memberikan tablet zinc: - kurang dari 6 bulan : 10 mg perhari(1/2 tablet) selama 10-14 hari. - Lebih dari 6 bulan: 20 mg/hari (1 tablet) selama 10-14hari</li>\r\n</ol>'),
('P0002', 'Laringitis (Radang pada laring)', '<p>infeksi bakteri seperti difteri juga dapat menjadi penyebabnya , tapi hal ini jarang terjadi. laringitis akut dapat juga terjadi saat anda menderita suatu penyakit setelah anda sembuh dari suatu penyakit, seperti selesma, flu atau radang paru-paru</p>', 'laring.jpg', '<p style="text-align: justify;">Biasa ditemukan pada umur 1 sampai 3 tahun</p>', '<ol>\r\n<li style="text-align: justify;">meredakan batuk dengan memberikan banyak minuman hangat.</li>\r\n<li style="text-align: justify;">Baringkan diruangan sejuk atau lembab dan periksa irama nafas si anak dengan menghitung berapa kali ia bernafas setiap menit.</li>\r\n<li style="text-align: justify;">Letakkan tangan anda diatas dada atau punggungnya dan si anak harus dalam keadaan tenang.</li>\r\n<li style="text-align: justify;">Tingkat pernafasan maksimum anak usia di bawah 1 tahun antara 50-60 nafas/menit dan usia diatas 1 tahun 40 nafas/menit.</li>\r\n<li style="text-align: justify;">Bila terjadi demam, turunkan temperaturnya dengan melepaskan pakaian si anak dan usaplah kepala dan tubuhnya dengan air hangat.</li>\r\n<li style="text-align: justify;">Bila demam tidak mereda, berikan juga ibuprofen dengan dosis sesuai anjuran.</li>\r\n<li style="text-align: justify;">Periksakan ke dokter bila tingkat pernafasan melebihi batas maksimum dan demam tidak juga turun.</li>\r\n<li style="text-align: justify;">Segera bawa ke rumahsakit bila: 1. Bibir atau lidah membiru. &nbsp;2. Mengantuk yang tidak wajar. 3. Tidak mampu bersuara atau berbicara.</li>\r\n</ol>'),
('P0003', 'campak', '<p style="text-align: justify;">virus golongan paramyxovirus</p>', 'campak.jpg', '<p style="text-align: justify;">infeksi kulit yang disebabkan oleh virus golongan paramyxovirus</p>', '<ol style="text-align: justify;">\r\n<li><span style="text-align: justify;">campak tidak membutuhkan pengobatan yang khusus. campak disebabkan oleh virus, oleh karena itu tidak membutuhkan antibiotik dan anak mendapatkan pengobatan rawat jalan. &nbsp;&nbsp;</span></li>\r\n<li><span style="text-align: justify;">jika anak menderita campak yang berat atau dengan komplikasi, maka dilakukan rawat ina &nbsp;&nbsp;</span></li>\r\n<li><span style="text-align: justify;">idealnya anak disolasi selama 4hari setelah munculnya bercak campak agar tidak menularkan virus ke anak lain yang sehat &nbsp; &nbsp;</span></li>\r\n<li><span style="text-align: justify;">jika anak mengalami dehidrasi, diberikan oralit sesuai rekomendasi WHO (pembuatan oralit :8 sendok the gula, ditambahkan 1 sendok the garam, lalu dilarutkan ke dalam 1 liter air matang)</span></li>\r\n<li><span style="text-align: justify;">jika terdapat mata merah tidak perlu pengobatan jika cairannya jernih. namun jika bernanah dapat diberikan salep kloramfenikol/tetrasiklin 3 kali sehari selama 7 hari</span></li>\r\n<li><span style="text-align: justify;">pastikan anak sudah diberikan vit. A agar dapat mencegah kerusakan mata hingga kebutaan sebagai komplikasi campak dan menurunkan jumlah kematian hingga 50%</span></li>\r\n</ol>'),
('P0004', 'Tonsilitis (Radang amandel)', '<p>disebabkan oleh virusnpilek (Adenovirus, rhinovirus, influenzavirus, parainfluenza virus, coronavirus, RSV). </p>', 'tostilitis.jpg', '<p style="text-align: justify;">tostilitis adaah infeksi yang terjadi pada tonsil atau amandel yang biasanya disebabkan oleh virus atau bakteri. kebanyakan atau umumnya infeksi tostilitis ini terjadi pada anak yang masik berusia muda sekitar 5 - 15 tahun. kondisi ini dapat terjadi kadang-kadang atau sering kambuh.</p>', '<ol>\r\n<li style="text-align: justify;">Meredakan tenggorokan nyeri dengan memberikan minuman non-asam.</li>\r\n<li style="text-align: justify;">Susu sebanyak yang dia mau menggunakan sedotan serta memberikan ibuprofen atau parasetamol cair secara teratur.</li>\r\n<li style="text-align: justify;">Bila anak sudah cukup besar, ajarkan dia berkumur dengan airgaram hangat.</li>\r\n<li style="text-align: justify;">Periksakan ke dokter bila tenggorokan anak anda sangat serak atau tidak membaik dalam beberapa hari.</li>\r\n</ol>'),
('P0005', 'Bronkhitis (Radang Tenggorokan)', '<p>virus</p>', 'bronkitis.jpg', '<p style="text-align: justify;">Penderita terbanyak pada umur 1 sampai 3 tahun</p>', '<p style="text-align: justify;">Membawanya ke dokter Sekarang juga. Dokter akan memeriksa dan mungkin akan merujuk ke rumah sakit Untuk menjalani beberapa tes dan dipantau.</p>'),
('P0006', 'Influenza', '<p style="text-align: justify;">disebabkan oleh virus influenza,yaitu: virus influenza A dan B dapat menyebabkan flu musiman setiap tahunnya.</p>', 'virus-influenza.jpg', '<p style="text-align: justify;">Influenza istilah flu yang sering disebut dimasyarakat sebenarnya adalah kependekan dari influenza. Namun, sering kali digunakan untuk menyebut penyakit commond cold. Influenza merupakan penyakit yang mirip common clold namun berbeda penyebabnya. Influlenza disebabkan oleh virus influenza,yaitu: virus influenza A dan B dapat menyebabkan flu musiman setiap tahunnya.</p>', '<ol>\r\n<li style="text-align: justify;">Menggunakaan obat anti virus yang bertujuan untuk mengurangi tingkst kesakitan.</li>\r\n<li style="text-align: justify;">CDC (Badan pengendali penyakit di Amerika) merekomendasikan obat antivirus yang dapat digunakan, yaitu : tamiflu (oseltamivir) dan relenza (zanamivir) selama 3 hari.</li>\r\n</ol>'),
('P0007', 'Demam berdarah dengue (DBD)', '<p style="text-align: justify;">disebabkan virus dengue yang ditularkan oleh nyamuk aedes terutama aedes betina.</p>', 'demam-berdarah.gif', '<p>Demam berdarah dengue adlah penyakit yang disebabkan virus dengue yang ditularkan oleh nyamuk aedes terutama aedes betina.</p>', '<ol>\r\n<li style="text-align: justify;">Asupan cairan yang cukup</li>\r\n<li style="text-align: justify;">Istirahat cukup</li>\r\n<li style="text-align: justify;">Jika demam, diberikan paracetamol. Jangan diberikan ibuprofen karena dapat memicu terjadinya perdarahan.</li>\r\n<li style="text-align: justify;">Jika kondisi memburuk sebaiknya segera dibawa ke dokter dan rawat inap</li>\r\n</ol>'),
('P0008', 'Pneumonia (radang Paru-paru)', '<ol>\r\n<li style="text-align: justify;">streptococcus pneumonia/pnemocococcus, bakteri penyebab paling banyak terjadinya pneumonia pada anak dinegara berkembang (30-50% kasus)</li>\r\n<li style="text-align: justify;">&nbsp;haemophilus influenza type B (HIB) bakteri yang menyumbang hingga 30% kasus pneumonia</li>\r\n<li style="text-align: justify;">respiratory syncytial virus merupakan penyebab terbesar pneumonia yang diakibatkan oleh virus dan biasanya menyerang anak pra sekolah.</li>\r\n</ol>', 'pneunomia.jpg', '<p>Pneumonia adalah infeksi paru yang disebabkan oleh virus, bakteri, jamur atau infeksi campuran. namun, faktanya 70% penyebab pneumonia berat adalah bakteri</p>', '<ol>\r\n<li style="text-align: justify;">jangan memberikan obat batuk yang ada dipasaran</li>\r\n<li style="text-align: justify;">pastikan selama sakit, anak mendapatkan asupan nutrisi, istirahat dan minum yang cukup.</li>\r\n<li style="text-align: justify;">selalu memperhatikan kondisi anak, jika ada gejala sesak napas (napas</li>\r\n</ol>'),
('P0009', 'Cacar Air', '<p>disebabkan oleh varicella zooster virus</p>', 'cacar-air1.jpg', '<p style="text-align: justify;">Cacar Air adalah penyakit yang disebabkan oleh varicella zooster virus. cacar air ditularkan melalui percikan ludah lalu masuk kedalam tubuh manusia melalui saluran pernapasan. dari saluran pernapasan ini virus akan menyebar keseluruh tubuh bersama peredaran darah dan getah bening</p>', '<ol style="text-align: justify;">\r\n<li>edukasi anak agar tidak menggaruk atau mengelupas bintil-bintil yang berisi air karena dapat menimbulkan bekas yang lebih dalam dikulit</li>\r\n<li>jangan memberikan antibiotik karena cacar air disebabkan oleh virus , bukan bakteri. jika disertai gejala superinfeksi dengan bakteri, baru diberikan antibiotik sesuai anjuran dokter.</li>\r\n<li>jika anak demam berikan paracetamol, istirahat cukup dan asupan nutrisi yang baik</li>\r\n<li>konsumsi makanan cukup protein seperti ikan dan telur.</li>\r\n<li>jika anak gatal dapat diberikan obat anti gatal atau calamine lotion</li>\r\n<li style="text-align: justify;">anak mandi seperti biasa agar kebersihan kulitnya terjaga dan mengurangi rasa gatal</li>\r\n</ol>'),
('P0010', 'Common Cold (batuk pilek biasa)', '<p style="text-align: justify;">disebabkan oleh virus rhinoviruses, coronaviruses, respiratory syncitial virus, parainfluenzaviruses, adenoviruses, nonpolioenteroviruses, influenzaviruses dan reoviruses.</p>', 'cc.jpg', '<p style="text-align: justify;">common cold merupakan penyakit karena virus yang umum terjadi pada anak. penyakit ini biasanya dalam setahun menyerang anak sebanyak 3-10 kali, tergantung kondisi dan daya tahan tubuh. walaupun sangat sering menyerang common cold ini termasuk penyakit yang bisa disembuhkan dengan sendirinya tanpa pemberian obat anti biotik.</p>', '<ol>\r\n<li style="text-align: justify;">penggunaan tetes hidung garam fisiologis (natrium klorida) aman digunakan pada anak dan dapat mengurangi keluhan hidung tersumbat tapi tetap denan takaran yang wajar&nbsp;</li>\r\n<li style="text-align: justify;">pemberian antibiotik tidak direkomendasikan dan tidak efektif untuk mengobati batuk akut yang disebabkan oleh commmon cold.&nbsp;</li>\r\n<li style="text-align: justify;">tidak perlu menggunakan obat batuk pilek dipasaran yang dijual bebas.</li>\r\n</ol>'),
('P0011', 'TBC', '<p>virus mycrobacterium tuberculosis</p>', 'tbc.jpg', '<p>suatu infeksi akibat mycrobacterium tuberculosis yang dapat menyerang berbagai organ terutama paru-paru.</p>', '<p>dapat diberikan antibiotik, etambul dan streptomisin</p>'),
('P0012', 'Ger and Gerd (Gumoh)', '<ol>\r\n<li style="text-align: justify;">overfeeding ASi dan susu formula</li>\r\n</ol>', 'gomoh.JPG', '<p style="text-align: justify;">Gumoh merupakan naiknya isi lambung ke krongkongan. GER merupakan proses normal pada bayi muda dan bukan dikarenakan penyakit, sehingga tidak membutuhkan pengobatan. GERD merupakan GER yang sifatnya menatap/berkepanjangan dan menimbulkan dampak yang lebih serius.</p>', '<ol>\r\n<li style="text-align: justify;">mengubah pola makan /kebiasaan makan, misalnya mencegah jangan sampai terjadi overfeeding ASI dan susu formula pada anak, menyendawakan anak setelah menyusu, dan memposisikan anak berdiri selama 30 menit setelah menyusu</li>\r\n<li style="text-align: justify;">memberikan obat-obatan, misalnya pemberian H2 blocker seperti ranitidine untuk mengurangi asam lambung</li>\r\n</ol>'),
('P0013', 'OMA (Otitis Media Akut)', '<p style="text-align: justify;">penyebab OMA streptococcus pneumonia, hemophilus influenza dan moraxcella catharrhalis</p>', 'oma.jpg', '<p style="text-align: justify;">OMA merupakan nfeksi telinga tengah</p>', '<ol style="text-align: justify;">\r\n<li>dapat diobati dengan terapi antibiotik, misalnya amoxcilin 40mg/kg minimal selama 5 hari.&nbsp;</li>\r\n<li>jika nanah tetap keluar dari telinga lebih dari 2 minggu, maka dikategorikan sebagai otitis media kronis dan membutuhkan pemeriksaan selanjutnya</li>\r\n<li>jika anak demam dapat diberikan paracetamol atau kompres hangat.</li>\r\n<li>bersihkan nanah dengan menggunakan tissu yang dipluntir ujungya hingga lancip 3 kali sehari.</li>\r\n<li>pastikan agar telinga anak tidak kemasukan air, misalnya saat mandi. anak dilarang berenang</li>\r\n<li>jika kondisi memburuk, misalnya bagian blakang telinga bengkak segera kontrol ke dokter.</li>\r\n<li>jka anak masih menyusui berikan ASI ekslusif selama 6 bulan dan lanjutkan hingga 2 tahun.</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_analisa`
--

CREATE TABLE IF NOT EXISTS `tmp_analisa` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `1d` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `kode_gejala` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`1d`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE IF NOT EXISTS `tmp_penyakit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `kode_penyakit` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pertanyaan` int(3) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `pertanyaan2` int(3) NOT NULL,
  `jawaban2` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `umur`, `jk`, `no_hp`, `alamat`, `username`, `password`, `pertanyaan`, `jawaban`, `pertanyaan2`, `jawaban2`) VALUES
(3, 'iik', 1, 'peremuan', '+62098', '<p>gg</p>', 'ika123', '1234', 4, 'tuyul', 4, 'tuyul'),
(15, 'ibnu', 21, 'laki-laki', '+62890000', '<p>qwert</p>', 'ibnu', 'ibnu', 1, 'mawas', 1, 'mawas'),
(16, 'yuli', 12, 'peremuan', '+628900000', '<p>arahan</p>', 'yuli', 'yuli', 1, 'juli', 1, 'juli'),
(17, 'sahrul', 24, 'laki-laki', '+6268900000', '<p>cirebon</p>', 'sahrul', 'sahrul', 2, 'ayam', 2, 'ayam'),
(21, 'sisi', 2, 'peremuan', '+6289502606135', '<p>rambatan</p>', 'sisi', 'sisi', 1, 'sifa', 2, 'somay');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
