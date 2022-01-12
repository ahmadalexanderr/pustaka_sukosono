-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8889
-- Generation Time: Jan 10, 2022 at 09:50 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `pustaka_sukosono`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book`
(
  `id` int
(11) NOT NULL,
  `title` varchar
(128) NOT NULL,
  `author` varchar
(128) NOT NULL,
  `year` year
(4) NOT NULL,
  `category_id` int
(2) NOT NULL,
  `status_id` int
(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`
id`,
`title
`, `author`, `year`, `category_id`, `status_id`) VALUES
(1, 'Gue Muda Gue Ngeblog', 'Hikmawan Ali', 2011, 14, 0),
(2, 'Otak-Atik Otak', 'Dr.Arman Yurisadi', 2009, 15, 0),
(3, 'Sains Seru Seri 2. Hewan', 'Aep Saifulloh', 2011, 15, 0),
(4, 'Bobo (Rahasia Fauna Hutan Bakau)', 'Majalah Bobo', 2016, 15, 1),
(5, 'Bobo ( Dongeng Bintang)', 'Majalah Bobo', 2014, 15, 0),
(6, 'Ensiklopedi anak (Dinosaurus dan Binatang PraSejarah)', 'Ensiklo', 1996, 15, 0),
(7, 'SPM Bahasa Inggris', 'Linawati ', 2012, 15, 0),
(8, 'Bahan Kimia di Sekitar Kita', 'Sallih Hewitt', 2010, 15, 0),
(9, 'Sains Seru Seri 1. Manusia', 'Aep Saifulloh', 2011, 15, 0),
(10, 'Pengantar Epidemiologi Penyakit Menular', 'Prof.dr Nurnasri', 2009, 15, 0),
(11, 'Pintar MTK', 'William Kenedi', 2000, 15, 0),
(12, 'Cerdas Sains Kelas 1-3SD', 'Yualind', 2008, 15, 0),
(13, 'Bisa Baca dan Tulis', 'Destyan', 2013, 15, 0),
(14, 'Asik dan Seru Belajar Membaca', 'Dewi Fatma', 2015, 15, 0),
(15, 'Bobo (The Book of Life)', 'Majalah Bobo', 2000, 15, 0),
(16, 'Bobo (Misteri Mesir Kuno)', 'Majalah Bobo', 2015, 15, 0),
(17, 'Bobo ( RS Kereta Api )', 'Majalah Bobo', 2014, 15, 0),
(18, 'Bobo ( Youtube Lautan Video )', 'Majalah Bobo', 2013, 15, 0),
(19, 'Bobo ( Goes to Japan )', 'Majalah Bobo', 2015, 15, 0),
(20, 'Bobo ( Tujuh Bintang Paling Terang )', 'Majalah Bobo', 2017, 15, 0),
(21, 'Bobo (Scrapbook)', 'Majalah Bobo', 2014, 15, 0),
(22, 'Bobo ( RS Hewan)', 'Majalah Bobo', 2014, 15, 0),
(23, 'Petualangan Dudu dan Dodo', 'Agung', 2000, 15, 0),
(24, 'Accounting', 'Kardiman', 2006, 15, 0),
(25, 'Cinta Tanah Air Mengenal Budaya Bangsa', 'MB. Rahimsyah', 2000, 15, 0),
(26, 'Soal-Soal Intelegensi Test Edisi IV', 'Dr. Yuli Iskandar', 1988, 15, 0),
(27, 'SBMPTN 2016', 'Tentor', 2016, 15, 0),
(28, 'Mengenal Tubuh Kita', 'Yana Sutisna', 2009, 15, 0),
(29, 'Panduan Lengkap Orang Tua dan Guru untuk Anak', 'Emirfan', 2012, 15, 0),
(30, 'Metode Bimbel Privat Kuasai Rumus MTK', 'Dipta Anggraeni', 2012, 15, 0),
(31, 'Burung-Burung Dilindungi (Julid 1)', 'Pranowo', 1977, 15, 0),
(32, '99 Percobaan Sehari-hari Seri 2', 'Prof.dr Wahyudin', 2009, 15, 0),
(33, '99 Percobaan Sehari-hari Seri 3', 'Prof.dr Wahyudin', 2009, 15, 0),
(34, '99 Percobaan Sehari-hari Seri 4', 'Prof.dr Wahyudin', 2009, 15, 0),
(35, '99 Percobaan Sehari-hari Seri 5', 'Prof.dr Wahyudin', 2009, 15, 0),
(36, '99 Percobaan Sehari-hari Seri 6', 'Prof.dr Wahyudin', 2009, 15, 0),
(37, 'Ensiklomini MTK Bilangan', 'Yuti Ariani', 2008, 15, 0),
(38, 'Ensiklopedia Hewan', 'Joko Santoso', 2006, 15, 0),
(39, 'Ensiklopedia Alat Musik Tradisional', 'Titik Oktia', 2011, 15, 0),
(40, 'Ensiklomini Nusantara Budaya Unik Bangsaku', 'Murni Irian', 2008, 15, 0),
(41, 'Ensiklomini Nusantara Prestasi Bangsaku', 'Adi Angga', 2008, 15, 0),
(42, 'Ensiklomini MTK Pecahan', 'Irfan Habiebie', 2008, 15, 0),
(43, 'Belajar Sains Melalui Fenomena di Sekitar Kita', 'Dr.Ana Permanasari', 2007, 15, 0),
(44, 'Ensiklomini Nusantara Kekayaan Alam Negeriku', 'Munri Irian', 2008, 15, 0),
(45, 'Ensiklomini MTK Bangun Datar dan Ruang', 'Reza Ageung', 2008, 15, 0),
(46, 'Pendidikan Kewarganegaraan untuk Perguruan Tinggi', 'Prof.dr Kailan', 2012, 15, 0),
(47, 'Metode BImbel Privat Kuasai Kimia SMA', 'Agustina Dwi R', 2012, 15, 0),
(48, 'Fisika SMA Kelas IX', 'Marthen K', 2006, 15, 0),
(49, 'Matematika Kelas IX', 'Sukino', 2013, 15, 0),
(50, 'Matematika Kelas X', 'Sukino', 2013, 15, 0),
(51, 'Biologi Kelas X', 'Sri Ayu', 2013, 15, 0),
(52, 'Kumpulan Rumus Fisika SMA', 'Bayu Saptahari', 2012, 15, 0),
(53, 'Biologi Kelas XI', 'Henny Riandari', 2006, 15, 0),
(54, 'Kimia Kelas XI', 'Michael Purba', 2006, 15, 0),
(55, 'Biologi Kelas XI', 'D.a Pratiwi', 2006, 15, 0),
(56, 'Sejarah Berbasis Pendidikan Karakter Bangsa', 'Tim Sosioprawara C', 2012, 15, 0),
(57, 'RPAL', 'Dr.Ersoetarno', 2001, 15, 0),
(58, 'Sosiologi 1', 'Tim Sosiologi', 2006, 15, 0),
(59, 'Chemistri 1B', 'Johari', 2010, 15, 0),
(60, 'Mengenal Sopan Santun Sejak Dini', 'Pagohardian', 2012, 15, 0),
(61, 'Chemistri 1A', 'Johari', 2010, 15, 0),
(62, 'Jelajah Kekayaan Alam Adat dan Budaya Nusantara', 'Ardi Sudibyo', 2000, 15, 0),
(63, 'Pendidikan Seni Tari Drama', 'Purwatiningsih', 2004, 15, 0),
(64, 'Bahasa Indonesia untuk Perguruan Tinggi', 'Surono', 2009, 15, 0),
(65, 'Gue Bisa Jadi yang Gue Mau', 'Adenata', 2007, 4, 0),
(66, 'Ulah si Kecil', 'Nagiga', 2008, 4, 0),
(67, 'Tanaman Bunga di Sekitar Kita', 'Yulia', 2006, 4, 0),
(68, 'Petunjuk Pertama Kungfu', 'Felix Denis', 2000, 4, 0),
(69, 'Belajar Aktif Seni Melipat Kertas', 'Miyoko Alam', 1999, 4, 0),
(70, 'Membuat Patng Gips dan Lilin', 'Olga Jusuf', 2010, 4, 0),
(71, 'Pernik Interior Kreasi Sendiri', 'Tabloid Rumah', 2014, 4, 0),
(72, 'Ngopi Yuk', 'Gagas Ulung', 2011, 4, 0),
(73, 'Asik Berkreasi dengan Krikil', 'Sri Anggani', 2010, 4, 0),
(74, 'Mood On', 'Naqib Nazah', 2014, 4, 0),
(75, 'Seni Meramal Wajah', 'WangHinHau', 2002, 4, 0),
(76, 'Kreasi Kartu Ucapan Cantik', 'Ifa Hardiana', 2009, 4, 0),
(77, 'Aneka Kreasi Paduan Rempah dan Biji-Bijian', 'Dr. Yuti Regawati', 2011, 4, 0),
(78, 'Belajar Membuat Batu-bata', 'Eny Yusriani', 2000, 4, 0),
(79, 'Keterampilan Menghias Kain', 'Wasia Roesbani', 2009, 4, 0),
(80, 'Sulaman', 'Sujono', 2007, 4, 0),
(81, 'Aneka Pigura', 'Bagas Sinuhi', 2009, 4, 0),
(82, 'Tas dan Dompet Pesta', 'Endang Rahminingsih', 2011, 4, 0),
(83, 'Kreasi Aneka Kertas', 'Bagas Sinuhi', 2009, 4, 0),
(84, 'Berkreasi Sendiri', 'Dir Parditilar', 2000, 4, 0),
(85, 'Merancang Rumah Mungil', 'Khoirul Amin', 2006, 4, 0),
(86, 'Korsase Gaya Hijab', 'Triana Hapsari', 2013, 4, 0),
(87, 'Jendela', 'Majalah Idea', 2006, 4, 0),
(88, 'Panduan Pengembangan Rumah', 'Majalah Idea', 2006, 4, 0),
(89, 'Ragam Ruang Dalam', 'Majalah Idea', 2008, 4, 0),
(90, 'Table Setting', 'Gramedia', 2007, 4, 0),
(91, 'Contoh Pengembangan Rumah', 'Gramedia', 2000, 4, 0),
(92, 'Aksesoris Cantik dari Manik', 'Yuki', 2011, 4, 0),
(93, 'Panduan Latihan Sepakbola Handal', 'Sunda Kelapa Pustaka', 2002, 4, 0),
(94, 'Pemipaan Rumah', 'Rita Laksmitasari', 2000, 4, 0),
(95, '2014 Fifa World Cup', 'fifa', 2014, 4, 0),
(96, '1001 Fakta-Fakta Unik Sepak Bola', 'Sashi', 2012, 4, 0),
(97, 'Don&#39;t Jugde a Girl By Her Cover', 'Ally Carter', 2009, 13, 0),
(98, 'Biru yang Kuning', 'Ravi Oktevian', 2019, 13, 0),
(99, 'A Girl Made of Dust', 'Natalie A.', 2011, 13, 0),
(100, 'Dilan 1991', 'Pidi Baiq', 2015, 13, 0),
(101, 'Blainded', 'Alia Zalea', 2010, 13, 0),
(102, 'I Wuf You', 'Wulanfadi', 2017, 13, 0),
(103, 'Teka-Teki Rasa', 'Ahimsyah A.', 2016, 13, 0),
(104, 'Sunshine Becomes You', 'Illana Tan', 2012, 13, 0),
(105, 'Of  Mice and Mine', 'John S.', 2006, 13, 0),
(106, '38 Tahun Mencari Ibu', 'Reza Purwanti', 2012, 13, 0),
(107, 'The Worry Website', 'Jacqueline W.', 2007, 13, 0),
(108, 'Papua Berkisah', 'Swastika Nohara', 2014, 13, 0),
(109, 'Andai Kau Tahu', 'Dahlian', 2012, 13, 0),
(110, 'Garis Waktu', 'Fiersa Besari', 2016, 13, 0),
(111, 'Kapan Jadian', 'Almaidah Swan', 2013, 13, 0),
(112, 'If I Stay', 'Gayle Forman', 2015, 13, 0),
(113, 'Puisi Indonesia Sebelum Kemerdekaan', 'Supardi Joko Darmono', 2009, 13, 0),
(114, 'Kumpulan Peribahasa Pantun dan Puisi', 'MB Rahimsyah', 2012, 13, 0),
(115, 'Black Powder War', 'Naomi Novik', 2006, 9, 0),
(116, 'Frankenstain', 'Marysaelley', 1994, 9, 0),
(117, 'Silverstone', 'Ardina Hasan B.', 2011, 9, 0),
(118, 'The Alien Bride', 'Gramedia Pustaka Utama', 2010, 9, 0),
(119, 'Hal-Hal Gaib', 'Erlangga', 2005, 9, 0),
(120, 'Manusia Srigala', 'Abdullah Harahab', 2011, 9, 0),
(121, 'Misteri Tatan Khamen', 'Takasioichi', 2009, 9, 0),
(122, 'Tintin (Profesor Lakmus)', 'Michel Farl', 2010, 9, 0),
(123, 'Tintin (Jenderal Alkazar)', 'Michel Farl', 2010, 9, 0),
(124, 'Tintin ( Milo )', 'Michel Farl', 2010, 9, 0),
(125, 'Tafsir Juz Amma 2', 'Muhammad Muslih', 2000, 17, 0),
(126, 'Ayo Belajar Sholat', 'Rahmi Fitriani', 2010, 17, 0),
(127, 'Ayo Belajar Puasa', 'Rahmi Fitriani', 2010, 17, 0),
(128, 'Ayo Mengenal Zakat', 'Rahmi Fitriani', 2010, 17, 0),
(129, 'Meneladani 99 Sifat Allah Jilid 3', 'Alfirdaus', 2000, 17, 0),
(130, 'Meneladani 99 Sifat Allah Jilid 2', 'Alfirdaus', 2000, 17, 0),
(131, 'Tafsir Juz Amma 3', 'Muhammad Muslih', 2000, 17, 0),
(132, 'Tafsir Juz Amma 4', 'Muhammad Muslih', 2000, 17, 0),
(133, 'Surat Terpilih dan Makna Ringkas', 'Dewi Mulyani', 2009, 17, 0),
(134, '20 Cerita Populer Islami', 'Ismail Usmayadi', 2009, 17, 0),
(135, 'Majmu Syarif', 'Abu Taufiqurrahman', 2000, 17, 0),
(136, 'Dosa Bagaikan Madu yang Beracun', 'Isa Selamat', 2000, 17, 0),
(137, 'Anak Punya Masalah Al-Quran Menjawab', 'Wini Gunarti', 2009, 17, 0),
(138, 'Membimbing Spiritualitas Anak', 'Salsa Az-Zahra', 2014, 17, 0),
(139, 'Dahsyatnya Terapi Sedekah', 'Hasan Hammam', 2007, 17, 0),
(140, 'Tata Cara Sholat Lengkap', 'Ustad Labib MZ', 2002, 17, 0),
(141, 'Salman Al-Farisi Mencari Kebenaran', 'S. Hidayat', 2012, 17, 0),
(142, 'Kisah-Kisah Jilbab ', 'Trisula Adisakti', 2010, 17, 0),
(143, 'Khalid Bin Walid', 'M.Anshori', 2012, 17, 0),
(144, 'Nabi Yusuf A.S', 'Shodiq', 2012, 17, 0),
(145, 'Usamah Mencari Syahid', 'Shodiq', 2012, 17, 0),
(146, 'Usluhudin', 'Trisula Adisakti', 2010, 17, 0),
(147, 'Sekitar Wali Songo', 'Sholihin Salam', 1960, 17, 0),
(148, 'Kisah-Kisah Ajaib', 'Trisula Adisakti', 2010, 17, 0),
(149, 'Dosa-Dosa Besar', 'Trisula Adisakti', 2010, 17, 0),
(150, 'Mengobati Penyakit Lisan', 'Trisula Adisakti', 2010, 17, 0),
(151, 'Perempuan dan Jilbab', 'Farid L.', 2009, 17, 0),
(152, 'Wanita-Wanita Pilihan', 'Abbas Azizi', 2010, 17, 0),
(153, 'Nasihat Syeikh Hakim', 'Choirul Anwar', 2007, 17, 0),
(154, 'Tafsir Juz Amma 5', 'Muhammad Muslih', 2000, 17, 0),
(155, 'Malaikat Ridwan dan Aku', 'Bunda Nanid', 2000, 17, 0),
(156, 'Jangan Pernah Menyerah', 'Aldilla D.', 2016, 17, 0),
(157, 'Variasi Kue Kering Praktis', 'Siti Fatimah', 2006, 6, 0),
(158, 'Pembuatan Tahu dan Tempe Kedelai', 'Ir. Heronymus Budi S.', 1993, 6, 0),
(159, 'Membuat Gift Cards Kirigami', 'Hamid Mitarwan', 2011, 6, 0),
(160, 'Minuman dan Dessert untuk Anak Balita', 'Hindah Muaris', 2006, 6, 0),
(161, 'Budidaya dan Manfaat Bawang, Mentimun, dan Pare', 'Kardono', 2010, 6, 0),
(162, 'Budidaya dan Manfaat Mengkudu, Blustru, Ciplukan', 'Kardono', 2010, 6, 0),
(163, 'Teknik Penyimpanan dan Pengemasan', 'Ryan Yuditian', 2007, 6, 0),
(164, 'Trubus 518', 'TRUBUS', 2013, 6, 0),
(165, 'Trubus 513', 'TRUBUS', 2012, 6, 0),
(166, 'Trubus 565', 'TRUBUS', 2016, 6, 0),
(167, 'Trubus 463', 'TRUBUS', 2008, 6, 0),
(168, 'Trubus 481', 'TRUBUS', 2009, 6, 0),
(169, 'Trubus 508', 'TRUBUS', 2012, 6, 0),
(170, 'Trubus 560', 'TRUBUS', 2016, 6, 0),
(171, 'Oxford Dictionary', 'OXFORD', 2008, 11, 0),
(172, 'Kamus Hukum', 'Yan Pramadya Puspa', 1977, 11, 0),
(173, 'Practical English Grammar & Daily Conversations', 'Dhanny R. Cysso', 2008, 11, 0),
(174, 'Hafal Ala Native Speaker', 'Ahmad Fanani', 2014, 11, 0),
(175, 'Smart Choice Oxford', 'LIA', 2000, 7, 0),
(176, 'Naruto Vol.21', 'Masashi Kishimoto', 2000, 7, 0),
(177, 'Naruto Vol.22', 'Masashi Kishimoto', 2000, 7, 0),
(178, 'Naruto Vol.23', 'Masashi Kishimoto', 2000, 7, 0),
(179, 'Naruto Vol.24', 'Masashi Kishimoto', 2000, 7, 0),
(180, 'Naruto Vol.25', 'Masashi Kishimoto', 2000, 7, 0),
(181, 'Naruto Vol.26', 'Masashi Kishimoto', 2000, 7, 0),
(182, 'Naruto Vol.27', 'Masashi Kishimoto', 2000, 7, 0),
(183, 'Junkyard Magnetic', 'Wataru Murayana', 2000, 7, 0),
(184, 'Pudding In Love', 'Shinozuka Himoru', 2000, 7, 0),
(185, 'Tail Of The Moon', 'Rinko Ueda', 2000, 7, 0),
(186, 'The Princess Cactus', 'Xu Ci', 2000, 7, 0),
(187, 'Rocket Man', 'Motohiro Kato', 2000, 7, 0),
(188, 'Dear Mine', 'Shigeru Takao', 2000, 7, 0),
(189, 'Noah Almighty Vol.1', 'Yochiro Ono', 2000, 7, 0),
(190, 'School Rumbel', 'Jin Kobayashi', 2000, 7, 0),
(191, 'Adrenalin', 'Lee Jung-Hwa', 2000, 7, 0),
(192, 'Pockemon', 'Tsukirino Yumi', 2000, 7, 0),
(193, 'Story Of Heroes', 'Choi Mir', 2000, 7, 0),
(194, 'Bleach Vol.42', 'Tite Kubo', 2000, 7, 0),
(195, 'Fairy&#39;s Landing Vol.4', 'Yoo Hyun', 2000, 7, 0),
(196, 'Fairy&#39;s Landing Vol.5', 'Yoo Hyun', 2000, 7, 0),
(197, 'Noah Almighty Vol. 3', 'Yochiro Ono', 2000, 7, 0),
(198, 'Noah Almighty Vol. 2', 'Yochiro Ono', 2000, 7, 0),
(199, 'Prahara', 'Susanto, Dkk', 2000, 7, 0),
(200, 'Pertempuran Final  Dunia Ninja Ke-4', 'Kimimaro Sakura', 2000, 7, 0),
(201, 'Bleach Vol.53', 'Tite Kubo', 2000, 7, 0),
(202, 'Fly, Daddy, Fly', 'Kaneshiro Kazuki', 2000, 7, 0),
(203, 'Eyeshield Vol.21', 'Richiro Inagaki', 2000, 7, 0),
(204, '3x3 Eyes Vol.1', 'Yuzo Takada', 2000, 7, 0),
(205, '3x3 Eyes Vol.2', 'Yuzo Takada', 2000, 7, 0),
(206, 'Julius Caesar', 'Ie Fen Lan', 2000, 7, 0),
(207, 'City Of Fiction', 'Andre Syahreza', 2000, 7, 0),
(208, 'Crayon Shinchan Vol.1', 'Yoshito Umi', 2000, 7, 0),
(209, 'Rapat Koordinasi Muspida Bersama Aparat Pemerintahan Desa Se-Kabupaten-Jepara', 'Bupati Jepara', 2010, 10, 0),
(210, 'Renvoi', 'Direktorat Jenderal Andministrasi Hukum', 2008, 10, 1),
(211, 'Etika Komunikasi Penjualan', 'I Dewa Made Hari Shandi', 2005, 10, 0),
(212, 'Panduan KPPS', 'Komisi Pemilihan Umum', 2014, 10, 0),
(213, 'Ulasan Terhadap Ketentuan UUD 1945', 'S. Toto Pandoyo', 1981, 10, 0),
(214, 'Membuka Indera Keenam', 'Masruri', 2006, 10, 0),
(215, 'Aliran Kebatinan', 'H. Ridin Sofwan', 2002, 10, 0),
(216, 'Permainan Sulap Populer', 'Ediramani, Dkk', 2000, 10, 0),
(217, 'Arbitase (Hukum Dagang)', 'Sri Redjeki Hartono', 1978, 10, 0),
(218, 'Pengantar Singkat Hukum Pajak', 'H. Rochmat Soemitro', 1986, 10, 0),
(219, 'Indonesia Kini dan Esok', 'Imam Walujo', 1981, 10, 0),
(220, 'Polisi Penegak Hukum ', 'Soehardi', 2010, 10, 0),
(221, 'Kitab UU Hukum Pidana (KUHP)', 'M. Jusuf Ismail', 2000, 10, 0),
(222, 'Asas dan Dasar Perpajakan', 'H. Rochmat Soemitro', 1998, 10, 0),
(223, 'Tinjauan Elementer Perbuatan Melawan Hukum ', 'Rachmat Setiawan', 1982, 10, 0),
(224, 'Perjanjian Kerja', 'FX. Djumialdji', 1987, 10, 0),
(225, 'Asas dan Susunan Hukum Adat', 'Soebakti Poesponoto', 1976, 10, 0),
(226, 'Redistribusi Tanah Pertanian ', 'Direktorat Landreform', 1992, 10, 0),
(227, 'Berutang dengan Cerdas', 'Jhonny Djohari', 2002, 10, 0),
(228, 'Inspirasi Bisnis Ala Londen', 'I Nyoman Londen', 2007, 10, 0),
(229, 'Pengantar Ilmu Hukum Pajak', 'R. Santoso Brotodihardjo', 1991, 10, 0),
(230, 'Asas Hukum Adat', 'Iman Sudiyat', 1978, 10, 0),
(231, 'Hukum Tata Lingkungan', 'Koesnadi Hardjasoemantri', 1972, 10, 0),
(232, '18 Rahasia Sukses Orang Terkaya', 'AW Publishing', 2014, 10, 0),
(233, 'Kumpulan 27 Cerita Rakyat Nusantara', 'MB. Rahimsyah', 2010, 3, 0),
(234, 'Kumpulan Cerita Rakyat Nusantara', 'MB. Rahimsyah', 2004, 3, 0),
(235, 'Dongeng Rakyat Se Nusantara', 'Pustaka indonesia', 2000, 3, 0),
(236, 'Statistika Untuk Ekonomi dan Niaga', 'DR.Sudjana ', 1984, 14, 0),
(237, 'Rekayasa Photoshop Terbaik', 'Laksamana Media', 2008, 14, 0),
(238, 'Rahasia Kedahsyatan Google ', 'Heru Granito', 2008, 14, 0),
(239, 'Belajar Fotografi Dasar dengan Kamera Saku II ponsel', 'Rudi R.Hakim', 2010, 14, 0),
(240, 'Buku Pintar Komputer ', 'Hasyim ', 2008, 14, 0),
(241, 'Keajaiban Photo Shop', 'Alex Media', 2011, 14, 0),
(242, 'Untold Story Susi Pudjiastuti', 'A.Bobby', 2015, 2, 0),
(243, 'Mohammad Hatta', 'B.A Saleh', 2007, 2, 0),
(244, 'Sultan Syarif kasim II', 'Drs.Mardanas Safwan ', 2010, 2, 0),
(245, '100 Wanita Yang Membentuk Sejarah dunia', 'Eddy Soetrisno', 2003, 2, 0),
(246, 'Pengantar Teori Mikro Ekonomi', 'Sadono Sukirno', 2000, 16, 0),
(247, 'Diktat Kuliah Teknik Separasi 1', 'Herry Santoso', 2011, 16, 0),
(248, 'Operasi Teknik Kimia Ekstraksi', 'Herry Santoso', 2004, 16, 0),
(249, 'Diktat Kuliah Operasi Teknik Kimia 3', 'Herry Santoso', 2002, 16, 0),
(250, 'Bumi Murka', 'Ellen J. Prager', 2010, 8, 0),
(251, 'Perjuangan Kapiten Patimura', 'Pusat Sejarah TNI', 2005, 8, 0),
(252, 'Jangan Pernah Jadi Malaikat', 'Christianto Wibisono', 2010, 8, 0),
(253, 'Amru bin Ash Sang Penakluk', 'Ginda R.H', 2012, 8, 0),
(254, 'Sejarah Fatimah Az-Zahra', 'Prof. Dasteghib', 2010, 8, 0),
(255, 'Sejarah Indonesia 2', 'Eko Praptanto', 2010, 8, 0),
(256, 'Sejarah Indonesia 9', 'Eko Praptanto', 2010, 8, 0),
(257, 'Sejarah Indonesia 3', 'Eko Praptanto', 2010, 8, 0),
(258, 'Sejarah Indonesia 1', 'Eko Praptanto', 2010, 8, 0),
(259, 'Harry Potter and The Goblet of Fire', 'J. K. Rowling', 2000, 23, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category`
(
  `id` int
(11) NOT NULL,
  `category` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`
id`,
`category
`) VALUES
(1, 'Seni dan Fotografi'),
(2, 'Biografi'),
(3, 'Cerita Rakyat'),
(4, 'Keterampilan dan Hobi'),
(5, 'Kriminal'),
(6, 'Makanan'),
(7, 'Manga'),
(8, 'Sejarah dan Arkeologis'),
(9, 'Fiksi Sains, Fantasi, dan Horror'),
(10, 'Bisnis, Keuangan, dan Hukum'),
(11, 'Kamus dan Bahasa'),
(12, 'Kesehatan'),
(13, 'Puisi dan Drama'),
(14, 'Komputer dan Teknologi Informasi'),
(15, 'Edukasi'),
(16, 'Teknik / Engineering'),
(17, 'Agama Islam'),
(18, 'Spiritual'),
(19, 'Comic'),
(21, 'Pengembangan Perangkat Lunak'),
(22, 'Lain-lain'),
(23, 'Fantasi');

-- --------------------------------------------------------

--
-- Table structure for table `book_status`
--

CREATE TABLE `book_status`
(
  `id` int
(11) NOT NULL,
  `status` varchar
(128) NOT NULL,
  `status_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_status`
--

INSERT INTO `book_status` (`
id`,
`status
`, `status_id`) VALUES
(3, 'Dipinjam', 1),
(4, 'Tersedia', 0),
(6, 'Proses Pengembalian', 2);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow`
(
  `id` int
(11) NOT NULL,
  `email` varchar
(128) NOT NULL,
  `book_id` int
(11) NOT NULL,
  `taken` int
(11) NOT NULL,
  `due` int
(11) NOT NULL,
  `return_` int
(11) NOT NULL,
  `confirm_id` int
(11) NOT NULL,
  `penalty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`
id`,
`email
`, `book_id`, `taken`, `due`, `return_`, `confirm_id`, `penalty`) VALUES
(19, 'ahmadalexander@students.undip.ac.id', 147, 1630626605, 1631231405, 0, 1, 0),
(23, 'manuela.rath@yahoo.com', 243, 1634969092, 1635573892, 1634974634, 3, 0),
(24, 'manuela.rath@yahoo.com', 217, 1634969098, 1635573898, 1634974633, 3, 0),
(25, 'manuela.rath@yahoo.com', 151, 1634969101, 1635573901, 1634974618, 3, 0),
(26, 'manuela.rath@yahoo.com', 245, 1634974774, 1634974834, 1634974846, 3, 0),
(27, 'manuela.rath@yahoo.com', 147, 1634980411, 1635585211, 1634980414, 3, 0),
(28, 'frami.sabina@block.com', 38, 1634981915, 1635586715, 1634981926, 3, 0),
(29, 'frami.sabina@block.com', 121, 1634981963, 1634982023, 1634981969, 3, 0),
(30, 'frami.sabina@block.com', 116, 1634982021, 1634982026, 1634982075, 3, 0),
(31, 'manuela.rath@yahoo.com', 146, 1634987461, 1634901061, 1634987475, 3, 5000),
(32, 'manuela.rath@yahoo.com', 150, 1634987584, 1634987560, 1634987588, 3, 5000),
(33, 'manuela.rath@yahoo.com', 133, 1634987634, 1634987634, 1634987639, 3, 5000),
(34, 'frami.sabina@block.com', 147, 1634987689, 1634987689, 1634987691, 3, 5000),
(35, 'frami.sabina@block.com', 138, 1634994784, 1635599584, 0, 1, 0),
(36, 'frami.sabina@block.com', 147, 1634994819, 1635599619, 0, 0, 0),
(37, 'manuela.rath@yahoo.com', 154, 1634995026, 1635599826, 1634995135, 1, 0),
(38, 'talia.sawayn@gmail.com', 125, 1634995391, 1635600191, 1639098132, 1, 0),
(39, 'talia.sawayn@gmail.com', 212, 1634995753, 1635082153, 1639098130, 1, 0),
(40, 'manuela.rath@yahoo.com', 155, 1639099833, 1639186233, 1639099952, 1, 0),
(41, 'manuela.rath@yahoo.com', 154, 1639100235, 1639186635, 1639100244, 1, 0),
(42, 'manuela.rath@yahoo.com', 132, 1639100237, 1639186637, 1639100243, 1, 0),
(43, 'ahmadalexanderr@gmail.com', 147, 1639254379, 1639340779, 0, 3, 0),
(44, 'ahmadalexanderr@gmail.com', 154, 1639254383, 1639340783, 0, 3, 0),
(45, 'ahmadalexanderr@gmail.com', 132, 1639254386, 1639340786, 1639254412, 3, 0),
(46, 'ahmadalexanderr@gmail.com', 135, 1639254438, 1639340838, 1639254441, 3, 0),
(47, 'ahmadalexanderr@gmail.com', 74, 1639254482, 1639340882, 1639254492, 3, 0),
(48, 'ahmadalexanderr@gmail.com', 59, 1639254486, 1639340886, 0, 3, 0),
(49, 'ahmadalexanderr@gmail.com', 234, 1639254489, 1639340889, 0, 3, 0),
(50, 'ahmadalexanderr@gmail.com', 250, 1639254533, 1639340933, 1639254551, 3, 0),
(51, 'ahmadalexanderr@gmail.com', 124, 1639254539, 1639340939, 1639254552, 3, 0),
(52, 'ahmadalexanderr@gmail.com', 188, 1639254546, 1639340946, 1639254554, 3, 0),
(53, 'ahmadalexanderr@gmail.com', 7, 1639254569, 1639340969, 1639254581, 3, 0),
(54, 'ahmadalexanderr@gmail.com', 42, 1639254573, 1639340973, 1639254582, 3, 0),
(55, 'ahmadalexanderr@gmail.com', 20, 1639254576, 1639340976, 1639254583, 3, 0),
(56, 'ahmadalexanderr@gmail.com', 217, 1639254596, 1639340996, 1639258143, 3, 5000),
(57, 'ahmadalexanderr@gmail.com', 234, 1639254600, 1639341000, 1639258134, 3, 0),
(58, 'ahmadalexanderr@gmail.com', 11, 1639258332, 1639344732, 1639258339, 3, 5000),
(59, 'ahmadalexanderr@gmail.com', 58, 1639258371, 1639344771, 1639258377, 3, 5000),
(60, 'ahmadalexanderr@gmail.com', 74, 1639258989, 1639345389, 1639258993, 3, 5000),
(61, 'ahmadalexanderr@gmail.com', 95, 1639259105, 1639345505, 1639259114, 3, 5000),
(62, 'ahmadalexanderr@gmail.com', 54, 1639259192, 1639345592, 1639259218, 3, 5000),
(63, 'ahmadalexanderr@gmail.com', 241, 1639562535, 1639648935, 1639562559, 1, 0),
(64, 'ahmadalexanderr@gmail.com', 135, 1640795004, 1640881404, 1640795018, 1, 0),
(65, 'ahmadalexanderr@gmail.com', 213, 1640795008, 1640881408, 1640795017, 1, 0),
(66, 'ahmadalexanderr@gmail.com', 227, 1640795012, 1640881412, 1640795015, 1, 0),
(67, 'ahmadalexanderr@gmail.com', 4, 1640825659, 1640912059, 0, 0, 0),
(68, 'nicola.hodkiewicz@gaylord.info', 259, 1640833659, 1640920059, 1640833690, 1, 0),
(69, 'nicola.hodkiewicz@gaylord.info', 250, 1640833667, 1640920067, 1640833689, 1, 0),
(70, 'nicola.hodkiewicz@gaylord.info', 245, 1640833679, 1640920079, 1640833687, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation`
(
  `id` int
(11) NOT NULL,
  `confirm` varchar
(128) NOT NULL,
  `confirm_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirmation`
--

INSERT INTO `confirmation` (`
id`,
`confirm
`, `confirm_id`) VALUES
(3, 'Sedang dipinjam', 0),
(4, 'Pengembalian Terkonfirmasi', 1),
(5, 'Denda Belum Lunas', 2),
(6, 'Denda Lunas', 3),
(7, 'Tunggu Konfirmasi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user`
(
  `id` int
(11) NOT NULL,
  `name` varchar
(128) NOT NULL,
  `email` varchar
(128) NOT NULL,
  `image` varchar
(128) NOT NULL,
  `password` varchar
(256) NOT NULL,
  `role_id` int
(11) NOT NULL,
  `is_active` int
(1) NOT NULL,
  `date_created` int
(11) NOT NULL,
  `organization_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user`
    (`id`, `nam
`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`, `organization_id`) VALUES
(7, 'mehmedalexanderr', 'mehmedalexanderr@gmail.com', 'DD003D88-A231-4BD2-994E-06D7B8023655_copy.jpg', '534b44a19bf18d20b71ecc4eb77c572f', 1, 1, 1630592803, 1),
(20, 'sadiesink', 'frami.sabina@block.com', 'default.jpg', '534b44a19bf18d20b71ecc4eb77c572f', 2, 1, 1634896013, 1),
(21, 'millie', 'manuela.rath@yahoo.com', 'millie.jpeg', '534b44a19bf18d20b71ecc4eb77c572f', 2, 1, 1634896037, 1),
(22, 'roger', 'talia.sawayn@gmail.com', 'default.jpg', '534b44a19bf18d20b71ecc4eb77c572f', 2, 1, 1634968045, 1),
(25, 'ahmadalexanderr', 'ahmadalexanderr@gmail.com', 'default.jpg', '534b44a19bf18d20b71ecc4eb77c572f', 2, 1, 1640794974, 1),
(26, 'tokuza', 'nicola.hodkiewicz@gaylord.info', 'default.jpg', '900150983cd24fb0d6963f7d28e17f72', 2, 1, 1640833531, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu`
(
  `id` int
(11) NOT NULL,
  `role_id` int
(11) NOT NULL,
  `menu_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`
id`,
`role_id
`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(8, 1, 2),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_activation`
--

CREATE TABLE `user_activation`
(
  `id` int
(11) NOT NULL,
  `activation` varchar
(128) NOT NULL,
  `is_active` int
(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_activation`
--

INSERT INTO `user_activation` (`
id`,
`activation
`, `is_active`) VALUES
(1, 'Tidak Aktif', 0),
(3, 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail`
(
  `id` int
(11) NOT NULL,
  `email` varchar
(128) NOT NULL,
  `company` varchar
(128) NOT NULL,
  `address` varchar
(128) NOT NULL,
  `contact` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`
id`,
`email
`, `company`, `address`, `contact`) VALUES
(36, 'pemdessukosono@gmail.com', 'Balai Desa Sukosono', 'Jl. Ciputat, RT 17/RW 5, Sukosono, Kedung, Rw. V, Sukosono, Jepara, Kabupaten Jepara, Jawa Tengah 59463', 'pemdessukosono@gmail.com'),
(37, 'esperanza62@stracke.com', 'individual', 'New York', '12344'),
(38, 'ahmadalexanderr@gmail.com', 'undip', 'semarang', '082135041966'),
(39, 'manuela.rath@yahoo.com', 'individu', 'London', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu`
(
  `id` int
(11) NOT NULL,
  `menu` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`
id`,
`menu
`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user_organization`
--

CREATE TABLE `user_organization`
(
  `id` int
(11) NOT NULL,
  `organization` varchar
(128) NOT NULL,
  `organization_id` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_organization`
--

INSERT INTO `user_organization` (`
id`,
`organization
`, `organization_id`) VALUES
(1, 'Individu', 1),
(2, 'Instansi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role`
(
  `id` int
(11) NOT NULL,
  `role` varchar
(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`
id`,
`role
`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu`
(
  `id` int
(11) NOT NULL,
  `menu_id` int
(11) NOT NULL,
  `title` varchar
(128) NOT NULL,
  `url` varchar
(128) NOT NULL,
  `icon` varchar
(128) NOT NULL,
  `is_active` int
(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`
id`,
`menu_id
`, `title`, `url`, `icon`, `is_active`) VALUES
(11, 2, 'Data Buku', 'user/book', 'fas fa-book', 1),
(12, 2, 'Kategori', 'user/category', 'fas fa-swatchbook', 1),
(14, 1, 'Impor Buku', 'Phpspreadsheet/import', 'fas fa-file-upload', 1),
(15, 2, 'Peminjaman', 'user/history', 'fas fa-bookmark', 1),
(16, 1, 'Member', 'admin', 'fas fa-users', 1),
(17, 1, 'Pengembalian Buku', 'admin/return', 'fas fa-undo-alt', 1),
(18, 1, 'Data Denda', 'admin/penalty', 'fas fa-money-bill-wave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token`
(
  `id` int
(11) NOT NULL,
  `email` varchar
(128) NOT NULL,
  `token` varchar
(128) NOT NULL,
  `date_created` int
(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`
id`,
`email
`, `token`, `date_created`) VALUES
(2, 'ahmad.alexander86@yahoo.com', 'XBo+qfcRwXa2Mgd7TIdmCcKwkiPxYU4x2DtzUXlTeK4=', 1579856703),
(4, 'genta0998@gmail.com', '9vKlmLCebIyy8f+48/dQeMTmwiVRIoQTcj1lI57vA8g=', 1580737654),
(5, 'genta0998@gmail.com', 'KzxIpuUpJMJZHRizuatdjJrbob2W6Zb+5jVg3IhyPtM=', 1580737856),
(6, 'genta0998@gmail.com', '6vAIF31GAFMgsjBr/15kFtLqGkxq7R/gwFJP5mEF/1s=', 1580738027),
(7, 'genta0998@gmail.com', 'bzueehA5XIQ30jeS8zqIaccExUyO3qb+IZp7yqIWz3E=', 1580739644),
(8, 'genta0998@gmail.com', 'VxjZ6WsHzrtGBITgaoGMNzFOZp02dwjIxoWV//jDaRI=', 1580739785),
(11, 'ahmadalexander@students.undip.ac.id', 'Vl3miqB2SA9OWOJZxIXwncyaI/TMFzX7gAQ3P3qsTDs=', 1634527523),
(12, 'ahmadalexander@students.undip.ac.id', 'vM9CuWNOMCjYjJRJAzvNirZN8H2REZR6OPu452ahFKQ=', 1634527602),
(13, 'mehmedalexanderr@gmail.com', '5Dycr6EwTv4/l+1rIix1TJyStvMfSK0OuV1JLnDqkM0=', 1639483259);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `book_status`
--
ALTER TABLE `book_status`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_activation`
--
ALTER TABLE `user_activation`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_organization`
--
ALTER TABLE `user_organization`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
ADD PRIMARY KEY
(`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `book_status`
--
ALTER TABLE `book_status`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_activation`
--
ALTER TABLE `user_activation`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_organization`
--
ALTER TABLE `user_organization`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;