-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2021 pada 07.54
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `ID` int(4) NOT NULL,
  `name` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `sort` int(4) NOT NULL,
  `publish` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`ID`, `name`, `note`, `sort`, `publish`) VALUES
(1, 'Tentang Kami', '<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><strong>LEO Pump ( INDONESIA )</strong> merupakan anak perusahaan yang sepenuhnya di miliki oleh LEO Group untuk berinvestasi di Indonesia, adalah perusahaan yang bergerak dalam bidang pompa air, desain, manufaktur dan pemasaran. Produk utama adalah pompa self priming, pompa jet, pompa sirkulasi, pompa sumur,pompa submersible, mencakup rumah tangga, komersial, industri, perkebunan, dan lain-lain. Perusahaan berkomitmen untuk mengembangkan pompa air yang aman, efisien dan ramah lingkungan, demi upaya untuk memberikan pasoakn air bagi rakyat Indonesia.&nbsp;&nbsp; &nbsp;</p>\n\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">Perusahaan ini telah memiliki sistem manajemen produk yang baik, juga memiliki&nbsp; ISO9001 : 2015 sertifikat penjamin kualitas, dan juga telah dilakukan pengujian berdasarkan sistem manajemen kualitas dan memperoleh sertifikat SNI, menjamin pelanggan bahwa bahwa setiap produk selalu berada&nbsp; pada pengawasan yang ketat.<br />\n&nbsp;</p>\n\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">PT.LEO PUMP adalah satu perusahaan internasional di bidang pompa. Di Cina, Amerika Serikat, Italia, Hungaria, Thailand, Indonesia, Rusia, Dubai, dan negara-negara lain dengan pabrik manufaktur atau perusahaan distribusi, dengan lebih dari 5.000 karyawan di seluruh dunia, melakukan penjualan di Eropa, Amerika Utara, Amerika Tengah, Amerika Selatan, Asia Tenggara, Timur Tengah, Afrika, Ocenia, dan lebih dari 120 negara di dunia, dengan penjualan tahunan melebihi $ 1,2 miliar.</p>\n\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">LEO Pump Indonesia group memiliki pengalaman 70 tahun di bidang manufaktur pompa, Memfokuskan pada sistem pompa yang aman dan efisien bertujuan untuk memberikan nilai yang sangat baik bagi semua relasi yang bersangkutan dengan bisnis kami, ini adalah misi yang akan kami perjuangkan kedepannya.</p>\n', 5, 1),
(2, 'Visi Misi', '<p><strong>Logo LEO</strong></p>\n\n<p><img src=\"http://www.leogroup.cn/english/images/about_logo.jpg\" style=\"height:70px; width:164px\" /></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Logo LEO </strong>adalah singkatan dari Love Each Other, yang terkait dengan misi LEO dan mencerminkan CINTA untuk semua pemangku kepentingan:</p>\n\n<p>- CINTA untuk pengguna akhir dengan menyediakan produk dan solusi yang aman, efisien dan ramah lingkungan;</p>\n\n<p>- CINTA untuk pelanggan dengan memberikan dukungan penjualan, teknis dan layanan dan mewujudkan kerjasama win-win;</p>\n\n<p>- CINTA untuk pemasok dengan memastikan rantai pasokan dan membantu pertumbuhan mereka;</p>\n\n<p>- CINTA untuk karyawan dengan menciptakan platform untuk pengembangan karir;</p>\n\n<p>- CINTA untuk masyarakat dengan kontribusi sosial dan amal publik;</p>\n\n<p>- CINTA untuk alam dengan melindungi sumber air dan membantu memperbaiki lingkungan.</p>\n\n<p><strong>Misi</strong><br />\nFokus pada pengembangan sistem &amp; sistem aman &amp; ramah lingkungan dan menciptakan nilai bagi semua pemangku kepentingan.</p>\n\n<p><strong>Visi</strong><br />\nTinggikan citra industri pompa &amp; sistem China, menjadi perusahaan terdepan dalam pengembangan industri yang berkelanjutan.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Nilai Inti</strong></p>\n\n<p>Jalankan bisnis dengan VIRTUE;</p>\n\n<p>Mengejar kesuksesan dengan KESEMPURNAAN;</p>\n\n<p>Kemenangan kemenangan dengan EFISIENSI;</p>\n\n<p>Pergi foward dengan TINDAKAN yang benar.</p>\n\n<p><strong>Slogan</strong><br />\nSALING MENCINTAI</p>\n\n<p><strong>Maskot</strong></p>\n\n<p>Citra singa dengan karakter antusiasme, kemurahan hati, optimisme dan ambisi diciptakan sebagai maskot berdasarkan rujukan zodiak Leo.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"http://www.leogroup.cn/english/upload/201505/08/201505080951112812.jpg\" style=\"height:374px; width:800px\" /></p>\n', 6, 1),
(4, 'Sertifikasi', '<p>ISO9001:2008 yang kami dapatkan pada tanggal 10 september 2016 merupakan bukti bahwa kami memiliki manajemen mutu dengan standar internasional&nbsp; sehingga di harapkan kualitas produk yang kami pasarkan pun memiliki kualitas dan mutu yang sama</p>\n\n<p>SNI (Standar Nasional Indonesia) yang kami terima pada tanggal 24 Mei 2017 merupakan bukti bahwa produk kami memiliki kuwalitas yang sesuai dengan satandar produk di indonesia</p>\n\n<p>NRP (Nomor Registrasi Produk) merupakan nomor &nbsp;di terbitkan oleh PPMB (Pusat Pengawasan Mutu Barang) Kementrian Perdagangan guna menerapkan pengawasan mutu pada produk yang memilki standar SNI&nbsp; &nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/SERTIFIKAT%20WQA%209001%202015%20(FEB%202017).jpg\" style=\"height:708px; width:500px\" /></p>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/nrp.jpg\" style=\"height:714px; width:500px\" /></p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/SERTIFIKAT%20SNI.jpg\" style=\"height:651px; width:500px\" /></p>\n', 3, 1),
(5, 'Karir', '<p><strong><u>TRANSLATER</u></strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong><span style=\"font-size:12.0pt\">Job Description</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:12.0pt\">Pendidikan minimal D3 jurusan bahasa Mandarin</span></li>\n	<li><span style=\"font-size:12.0pt\">Dapat berbahasa Mandarin ( Tulisan dan Lisan )</span></li>\n	<li><span style=\"font-size:12.0pt\">Memiliki pengalaman sebagai Translater</span></li>\n	<li><span style=\"font-size:12.0pt\">Mampu melakukan translate dari bahasa Indonesia ke bahasa Mandarin,begitu juga sebaliknya</span></li>\n	<li><span style=\"font-size:12.0pt\">Memiliki kemampuan komunikasi yang baik, mampu bekerja secara individual maupun didalam tim</span></li>\n	<li><span style=\"font-size:12.0pt\">Siap menemani melakukan perjalanan dinas ke luar kota</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong><span style=\"font-size:12.0pt\">Requirement :</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:12.0pt\">Usia maksimal 40 tahun</span></li>\n	<li><span style=\"font-size:12.0pt\">Pengalaman minimal 2 tahun pada bidangnya</span></li>\n	<li><span style=\"font-size:12.0pt\">Pendidikan minimal D3 bahasa Mandarin / sederajat</span></li>\n	<li><span style=\"font-size:12.0pt\">Berpengalaman dibidang Translater mandarin (Diutamakan)</span></li>\n	<li><span style=\"font-size:12.0pt\">Berpenampilan rapih,menarik,sopan dan komunikatif</span></li>\n	<li><span style=\"font-size:12.0pt\">Jujur,tegas,teliti dan bertanggung jawab</span></li>\n	<li><span style=\"font-size:12.0pt\">Penempatan Kerja di Wilayah Balaraja , Tangerang</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><strong><u>SALES</u></strong></p>\n\n<p><strong><span style=\"font-size:12.0pt\">Job Description</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:12.0pt\">Mengunjungi dan membuka pasar baru,toko atau kontraktor untuk menjalin kerjasama, di area penugasannya untuk mempromosikan dan menjual produk pompa air Leo</span></li>\n	<li><span style=\"font-size:12.0pt\">Bekerja dengan target</span></li>\n	<li><span style=\"font-size:12.0pt\">Harus mempelajari dan menguasai selling point produk-produk agar dapat mempromosikan secara benar atau tepat sesuai pengarahan-pengarahan yang diberikan ( training )</span></li>\n	<li><span style=\"font-size:12.0pt\">Bisa membuat laporan rutin kepada perusahaan (sales report/progress report) sesuai pengarahan dari pimpinan sales</span></li>\n	<li><span style=\"font-size:12.0pt\">Membantu bagian keuangan untuk perihal penagihan setelah barang sudah terjual</span></li>\n	<li><span style=\"font-size:12.0pt\">Membuat laporan penjualan</span></li>\n	<li><span style=\"font-size:12.0pt\">Membuat laporan harga,Kwalitas,Type produk kompetitor secara periodik ke atasan</span></li>\n</ul>\n\n<p><strong><span style=\"font-size:12.0pt\">Requirement:</span></strong></p>\n\n<ul>\n	<li><span style=\"font-size:12.0pt\">Usia maksimal 35 tahun</span></li>\n	<li><span style=\"font-size:12.0pt\">Dapat mengoperasikan microsoft office</span></li>\n	<li><span style=\"font-size:12.0pt\">Pendidikan Minimal SLTA / SMA,semua jurusan</span></li>\n	<li><span style=\"font-size:12.0pt\">Bisa berbahasa Mandarin</span></li>\n	<li><span style=\"font-size:12.0pt\">Berpenampilan Rapih,Jujur, Disiplin dan Komunikatif</span></li>\n	<li><span style=\"font-size:12.0pt\">Berpengalaman 1-2 tahun sebagai Sales (mengerti dasar )</span></li>\n	<li><span style=\"font-size:12.0pt\">Diprioritaskan pengalaman dibidang Sales Pompa Air</span></li>\n	<li><span style=\"font-size:12.0pt\">Memiliki kendaraan pribadi (sepeda motor / mobil) dan Sim yang masih berlaku masa tanggal</span></li>\n	<li><span style=\"font-size:12.0pt\">Pekerja keras, Komunikatif baik dan dapat bekerja dibawah tekanan</span></li>\n	<li><span style=\"font-size:12.0pt\">Penempatan Kerja di Wilayah Balaraja , Tangerang</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', 2, 1),
(6, 'Service Center', '<p style=\"text-align:justify\"><strong>1. PT. MOJOPAHIT</strong></p>\n\n<p style=\"text-align:justify\">Komplek Ruko Marinatama Blok E No. 12</p>\n\n<p style=\"text-align:justify\">Jl. Gunung Sahari No. 2, Jakarta Utara 14420</p>\n\n<p style=\"text-align:justify\">Telp. 021-64700506, 021-64700507</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>2. BJP BERKAT JAYA POMPA</strong></p>\n\n<p style=\"text-align:justify\">Jl. Gatot Subroto Km. 6 Jatake-Tangerang</p>\n\n<p style=\"text-align:justify\">Telp. 0812 3048 4139, 0895 1813 9716</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>3. PT. MOJOPAHIT KONIRAKTOR</strong></p>\n\n<p style=\"text-align:justify\">Jl. Sabarudin 19D, Medan</p>\n\n<p style=\"text-align:justify\">Telp. 061-7323257</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>4. ION PUMP</strong></p>\n\n<p style=\"text-align:justify\">Jl. Tarum Barat II Blok A2-6 Ruko Royal Grande</p>\n\n<p style=\"text-align:justify\">Cikarang Baru</p>\n\n<p style=\"text-align:justify\">Telp. 021-29469618</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>5. ATP ARENA TEKNIK POMPA</strong></p>\n\n<p style=\"text-align:justify\">Jl. Bukit Darmo Boulevard 2G, Surabaya 60226</p>\n\n<p style=\"text-align:justify\">Telp. 031-7346318, 031-7349536, 031-7344945</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\"><strong>6. DOKTER POMPA</strong></p>\n\n<p style=\"text-align:justify\">Jl. Gatot Subroto Tengah 319 Denpasar-Bali</p>\n\n<p style=\"text-align:justify\">Telp. 0361-415056, 0361-430179</p>\n', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `bannerID` int(5) NOT NULL,
  `link` varchar(200) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `desc_1` varchar(250) NOT NULL,
  `desc_2` varchar(250) NOT NULL,
  `Sort` int(5) NOT NULL,
  `Publish` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `banner`
--

INSERT INTO `banner` (`bannerID`, `link`, `Image`, `desc_1`, `desc_2`, `Sort`, `Publish`) VALUES
(2, 'http://leopumps.co.id/beta/', '2.jpg', 'Welcome to LEO', 'LOVE EACH OTHER', 2, 1),
(3, 'http://leopumps.co.id/beta/', '3.jpg', 'Cinta Asal Usul Kehidupan', 'Love The Origin of Life', 3, 1),
(4, 'http://leopumps.co.id/beta/', '4.jpg', 'Saling Mencintai', 'LOVE EACH OTHER', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_global`
--

CREATE TABLE `config_global` (
  `ID` tinyint(2) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `info` varchar(200) NOT NULL,
  `konversi_poin` decimal(10,1) NOT NULL,
  `news` text NOT NULL,
  `sort` int(11) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(250) NOT NULL,
  `since` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `config_global`
--

INSERT INTO `config_global` (`ID`, `name`, `address`, `phone`, `email`, `info`, `konversi_poin`, `news`, `sort`, `flag`, `image`, `since`) VALUES
(1, 'LEO \"Love Each Other\"', 'Jembatan 5\r\n<br/>\r\nJakarta Barat', '0888 8888 888', 'info@willindo.com', '', '0.1', 'Belum ada berita terbaru', 1, 1, '1.png', '2017-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `content_master`
--

CREATE TABLE `content_master` (
  `ID` int(4) NOT NULL,
  `content_for` varchar(20) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `shortdesc` text,
  `desc` text,
  `date` date DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `publish` smallint(1) DEFAULT NULL,
  `sort` smallint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `content_master`
--

INSERT INTO `content_master` (`ID`, `content_for`, `title`, `shortdesc`, `desc`, `date`, `image`, `publish`, `sort`) VALUES
(1, 'about', 'Informasi Tentang Kami', 'PT LEO PUMP INDONESIA  adalah anak perusahaan yang sepenuhnya dimiliki oleh Leo Group Co.Ltd di Indonesia. ', '<p>PT LEO PUMP INDONESIA &nbsp;adalah anak perusahaan yang sepenuhnya dimiliki oleh Leo Group Co.Ltd di Indonesia. Sebagai perusahaan industri yang kompeherensif, PT LEO PUMP INDONESIA berfokus pada pengembangan, desain, pembuatan dan penjualan pompa di indonesai. Produk utamanya adalah pompa self-priming, jet pump, pompa sirkulasi, dan pompa sumur dalam, pompa submersible dan seri lainnya, meliputi area domestik, komersial, industri, kebun dan lain-lain. Perusahaan ini berkomitmen untuk pengembangan pompa air yang aman, efisien dan ramah lingkungan, dengan upaya tak kenal lelah untuk memenuhi misi penyelamatan pasokan air untuk Indonesia.</p>\n\n<p>Perusahaan ini membentuk sistem manajemen mutu yang sempurna sesuai dengan sistem manajemen mutu ISO 9001:2008 &nbsp;dan IECQ QC080000:2012 persyaratan sistem manajemen Zat proses berbahaya, dilengkapi dengan pengujian terlebih dahulu.peralatan pengujian untuk menjamin setiap pompa yang hardirkan kepada pelanggan telah di kontrol secara ketat.</p>\n\n<p>Leo Group Co.Ltd adalah perusahaan teknologi tinggi nasional yang bergerak di bidang riset dan pengembangan, desain, manufaktur, penjualan dan pelayanan semua seri pompa. LEO adalah perusahaan yang terdaftar pertama di industri pompa Cina, salah satu perancang standar industri pompa, dan presiden direktur drainase dan juga &nbsp;asosiasi &nbsp;irigasi industri mesin pertanian cina. Dapat dikatakan bahwa LEO adalah satu-satunya pusat teknis resmi pemerintah di industri ini.</p>\n\n<p>Dengan lebih dari 70 tahun teknologi profesional, LEO akan secara konsisten melanjutkan kreativitas dan kemampuan pengembangan di setiap pompa untuk kesehatan semua orang.</p>\n', NULL, NULL, 1, 1),
(2, 'contact', 'Contact Us', 'Gudang Balaraja, Kawasan Industri Benua Permai Lestari G12-G15\r\nJl.Raya Serang KM.25, Sentul Balaraja, Tangerang 15610==*==(021) 225.95567, 225.95668, 225.955505==*==info@leopumps.co.id', '<p><strong>Lokasi </strong>:</p>\r\n\r\n<p>Gudang Balaraja, Kawasan Industri Benua Permai Lestari G12-G15<br />\r\nJl.Raya Serang KM.25, Sentul Balaraja, Tangerang 15610</p>\r\n\r\n<p><strong>Telepon </strong>:</p>\r\n\r\n<p>(021) 225.95567, 225.95668, 225.955505</p>\r\n\r\n<p>FAX : (021) 225.95434</p>\r\n\r\n<p><strong>Email </strong>:</p>\r\n\r\n<p>info@leopumps.co.id</p>\r\n\r\n<p>Kirimkan Kritik atau saran anda dengan mengisi form di bawah ini.</p>\r\n', NULL, NULL, 1, 1),
(4, 'news', 'Stainless Steel Jet Pump', 'If false, the datepicker will be prevented from showing when the input field associated with it receives focus.', '<p>input&rsquo;s value for a multidate picker, this will also be used to split the incoming string to separate multiple formatted dates; as such, it is highly recommended that you not use a string that could be a substring of a formatted date (eg, using &lsquo;-&lsquo; to separate dates when your format is &lsquo;yyyy-mm-dd&rsquo;).</p>\n\n<div class=\"section\" id=\"orientation\">\n<h2>orientation</h2>\n\n<p>String. Default: &ldquo;auto&rdquo;</p>\n\n<h2>&nbsp;</h2>\n\n<h2>&nbsp;</h2>\n\n<p>A space-separated string consis</p>\n\n<h2>&nbsp;</h2>\n\n<p>ting of</p>\n\n<h2>&nbsp;</h2>\n\n<p>one or two of &ldquo;left&rdquo; or &ldquo;right&rdquo;, &ldquo;top&rdquo; or &ldquo;bottom&rdquo;, and &ldquo;auto&rdquo; (may be omitted); for example, &ldquo;top left&rdquo;, &ldquo;bottom&rdquo; (horizontal orientation will default to &ldquo;auto&rdquo;), &ldquo;right&rdquo; (vertical orientation will default to &ldquo;auto&rdquo;), &ldquo;auto top&rdquo;. Allows for fixed placement of the p</p>\n\n<h2>&nbsp;</h2>\n\n<p>icker popup.</p>\n\n<p>&ldquo;orientation&rdquo; refers to the location of the picker popup&rsquo;s &ldquo;anchor&rdquo;; you can also think of it as the location of the trigger element (input, component, etc) relative to the picker.</p>\n\n<p>&ldquo;auto&rdquo; triggers &ldquo;smart orientation&rdquo; of the picker. Horizontal orientation will default to &ldquo;left&rdquo; and left offset will be tweaked to keep the picker inside the browser viewport;</p>\n\n<h2>&nbsp;</h2>\n\n<p>vertical orientation will simply choose &ldquo;top&rdquo; or &ldquo;bottom&rdquo;, whichever will show more of the picker in the viewport.</p>\n</div>\n\n<h2>showOnFocus</h2>\n', '2017-06-09', 'leo_showOnFocus-0609184940.jpg', 0, 4),
(5, 'news', 'Pompa Air Self-priming Peripheral Pump', 'Enable multidate picking. Each date in month view acts as a toggle button, keeping track of which dates the user has selected in order.', '<div class=\"section\" id=\"maxviewmode\">\n<h2>VIew On maxViewMode</h2>\n\n<p>Number, String. Default: 4, &ldquo;centuries&rdquo;</p>\n\n<p>Set a maximum limit for the view mode. Accepts: 0 or &ldquo;days&rdquo; or &ldquo;month&rdquo;, 1 or &ldquo;months&rdquo; or &ldquo;year&rdquo;, 2 or &ldquo;years&rdquo; or &ldquo;decade&rdquo;, 3 or &ldquo;decades&rdquo; or &ldquo;century&rdquo;, and 4 or &ldquo;centuries&rdquo; or &ldquo;millenium&rdquo;. Gives the ability to pick only a day, a month, a year or a decade. The day is set to the 1st for &ldquo;months&rdquo;, the month is set to January for &ldquo;years&rdquo;, the year is set to the first year from the decade for &ldquo;decades&rdquo;, and the year is set to the first from the millennium for &ldquo;centuries&rdquo;.</p>\n</div>\n\n<div class=\"section\" id=\"minviewmode\">\n<h2>minViewMode</h2>\n\n<p>Number, String. Default: 0, &ldquo;days&rdquo;</p>\n\n<p>Set a minimum limit for the view mode. Accepts: 0 or &ldquo;days&rdquo; or &ldquo;month&rdquo;, 1 or &ldquo;months&rdquo; or &ldquo;year&rdquo;, 2 or &ldquo;years&rdquo; or &ldquo;decade&rdquo;, 3 or &ldquo;decades&rdquo; or &ldquo;century&rdquo;, and 4 or &ldquo;centuries&rdquo; or &ldquo;millenium&rdquo;. Gives the ability to pick only a month, a year or a decade. The day is set to the 1st for &ldquo;months&rdquo;, and the month is set to January for &ldquo;years&rdquo;, the year is set to the first year from the decade for &ldquo;decades&rdquo;, and the year is set to the first from the millennium for &ldquo;centuries&rdquo;.</p>\n</div>\n', '2017-06-08', '.jpg', 0, 1),
(6, 'about_visimisi', 'tentang kami visimisi', 'Logo LEO adalah singkatan dari Love Each Other, yang terkait dengan misi LEO dan mencerminkan CINTA untuk semua pemangku kepentingan:\r\n\r\n- CINTA untuk pengguna akhir dengan menyediakan produk dan solusi yang aman, efisien dan ramah lingkungan;\r\n\r\n- CINTA untuk pelanggan dengan memberikan dukungan penjualan, teknis dan layanan dan mewujudkan kerjasama win-win;\r\n\r\n- CINTA untuk pemasok dengan memastikan rantai pasokan dan membantu pertumbuhan mereka;\r\n\r\n- CINTA untuk karyawan dengan menciptakan platform untuk pengembangan karir;\r\n\r\n- CINTA untuk masyarakat dengan kontribusi sosial dan amal publik;\r\n\r\n- CINTA untuk alam dengan melindungi sumber air dan membantu memperbaiki lingkungan. ', '<p><span class=\"notranslate\"><strong>Logo LEO</strong></span></p>\n\n<p><img height=\"88\" src=\"http://www.leogroup.cn/english/images/about_logo.jpg\" style=\"width:164px;height:70px;\" width=\"188\" /></p>\n\n<p>&nbsp;</p>\n\n<p><strong>Logo LEO </strong>adalah singkatan dari Love Each Other, yang terkait dengan misi LEO dan mencerminkan CINTA untuk semua pemangku kepentingan:</p>\n\n<p>- CINTA untuk pengguna akhir dengan menyediakan produk dan solusi yang aman, efisien dan ramah lingkungan;</p>\n\n<p>- CINTA untuk pelanggan dengan memberikan dukungan penjualan, teknis dan layanan dan mewujudkan kerjasama win-win;</p>\n\n<p>- CINTA untuk pemasok dengan memastikan rantai pasokan dan membantu pertumbuhan mereka;</p>\n\n<p>- CINTA untuk karyawan dengan menciptakan platform untuk pengembangan karir;</p>\n\n<p>- CINTA untuk masyarakat dengan kontribusi sosial dan amal publik;</p>\n\n<p>- CINTA untuk alam dengan melindungi sumber air dan membantu memperbaiki lingkungan.</p>\n\n<p><strong>Misi</strong><br />\nFokus pada pengembangan sistem &amp; sistem aman &amp; ramah lingkungan dan menciptakan nilai bagi semua pemangku kepentingan.</p>\n\n<p><strong>Visi</strong><br />\nTinggikan citra industri pompa &amp; sistem China, menjadi perusahaan terdepan dalam pengembangan industri yang berkelanjutan.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Nilai Inti</strong></p>\n\n<p>Jalankan bisnis dengan VIRTUE;</p>\n\n<p>Mengejar kesuksesan dengan KESEMPURNAAN;</p>\n\n<p>Kemenangan kemenangan dengan EFISIENSI;</p>\n\n<p>Pergi foward dengan TINDAKAN yang benar.</p>\n\n<p><strong>Slogan</strong><br />\nSALING MENCINTAI</p>\n\n<p><strong>Maskot</strong></p>\n\n<p>Citra singa dengan karakter antusiasme, kemurahan hati, optimisme dan ambisi diciptakan sebagai maskot berdasarkan rujukan zodiak Leo.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"374\" src=\"http://www.leogroup.cn/english/upload/201505/08/201505080951112812.jpg\" width=\"800\" /></p>\n', NULL, NULL, 1, 2),
(7, 'about', 'Informasi Tentang Kami', NULL, '<p style=\"box-sizing: border-box; margin: 0px 0px 15px; line-height: 2rem; color: rgb(51, 51, 51); font-size: 14px; font-weight: 500; font-family: Raleway, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\"><strong>LEO Pump ( INDONESIA )</strong> m<strong>erupakan</strong> anak perusahaan yang sepenuhnya di miliki oleh LEO Group untuk berinvestasi di Indonesia, adalah perusahaan yang bergerak dalam bidang pompa air, desain, manufaktur dan pemasaran. Produk utama adalah pompa self priming, pompa jet, pompa sirkulasi, pompa sumur,pompa submersible, mencakup rumah tangga, komersial, industri, perkebunan, dan lain-lain. Perusahaan berkomitmen untuk mengembangkan pompa air yang aman, efisien dan ramah lingkungan, demi upaya untuk memberikan pasoakn air bagi rakyat Indonesia.&nbsp;&nbsp; &nbsp;</p>\n\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; line-height: 2rem; color: rgb(51, 51, 51); font-size: 14px; font-weight: 500; font-family: Raleway, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Perusahaan ini telah memiliki sistem manajemen produk yang baik, juga memiliki&nbsp; ISO9001 : 2015 sertifikat penjamin kualitas, dan juga telah dilakukan pengujian berdasarkan sistem manajemen kualitas dan memperoleh sertifikat SNI, menjamin pelanggan bahwa bahwa setiap produk selalu berada&nbsp; pada pengawasan yang ketat.<br />\n&nbsp;</p>\n\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; line-height: 2rem; color: rgb(51, 51, 51); font-size: 14px; font-weight: 500; font-family: Raleway, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">PT.LEO PUMP adalah satu perusahaan internasional di bidang pompa. Di Cina, Amerika Serikat, Italia, Hungaria, Thailand, Indonesia, Rusia, Dubai, dan negara-negara lain dengan pabrik manufaktur atau perusahaan distribusi, dengan lebih dari 5.000 karyawan di seluruh dunia, melakukan penjualan di Eropa, Amerika Utara, Amerika Tengah, Amerika Selatan, Asia Tenggara, Timur Tengah, Afrika, Ocenia, dan lebih dari 120 negara di dunia, dengan penjualan tahunan melebihi $ 1,2 miliar.</p>\n\n<p style=\"box-sizing: border-box; margin: 0px 0px 15px; line-height: 2rem; color: rgb(51, 51, 51); font-size: 14px; font-weight: 500; font-family: Raleway, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">LEO Pump Indonesia group memiliki pengalaman 70 tahun di bidang manufaktur pompa, Memfokuskan pada sistem pompa yang aman dan efisien bertujuan untuk memberikan nilai yang sangat baik bagi semua relasi yang bersangkutan dengan bisnis kami, ini adalah misi yang akan kami perjuangkan kedepannya.</p>\n', NULL, NULL, 1, 1),
(8, 'sertifikasi', 'Sertifikasi', NULL, '<p>ISO9001:2008 yang kami dapatkan pada tanggal 10 september 2016 merupakan bukti bahwa kami memiliki manajemen mutu dengan standar internasional&nbsp; sehingga di harapkan kualitas produk yang kami pasarkan pun memiliki kualitas dan mutu yang sama</p>\n\n<p>SNI (Standar Nasional Indonesia) yang kami terima pada tanggal 24 Mei 2017 merupakan bukti bahwa produk kami memiliki kuwalitas yang sesuai dengan satandar produk di indonesia</p>\n\n<p>NRP (Nomor Registrasi Produk) merupakan nomor &nbsp;di terbitkan oleh PPMB (Pusat Pengawasan Mutu Barang) Kementrian Perdagangan guna menerapkan pengawasan mutu pada produk yang memilki standar SNI&nbsp; &nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><a href=\"http://leopumps.co.id/beta/uploads/iso.png\"><img alt=\"\" src=\"http://leopumps.co.id/uploads/iso.png\" style=\"height:596px; width:436px\" /></a></p>\n\n<p><a href=\"http://leopumps.co.id/beta/uploads/sertifikat.png\"><img alt=\"\" src=\"http://leopumps.co.id/uploads/sertifikat.png\" style=\"height:638px; width:448px\" /></a></p>\n', NULL, NULL, 1, 1),
(9, 'karir', 'Karir', NULL, '<p><strong>Transleter mandarin : </strong></p>\n\n<ol style=\"list-style-type:lower-alpha;\">\n	<li>Laki laki usia max 38 tahun</li>\n	<li>Pendidikan S1 sastra mandarin</li>\n	<li>Pengalaman sebagai transleter selama 2 tahun</li>\n	<li>Mampu&nbsp; berbicara menulis dan membaca mandarin</li>\n</ol>\n\n<p>Jobdesk :</p>\n\n<ol>\n	<li>melakukan pengecekan kebutuhan barang</li>\n	<li>melakukan perhitungan gaji setiap bulan</li>\n	<li>mentranslet document dari indonesia ke mandarin maupun sebaliknya</li>\n	<li>mampu berkemunikasi bahasa mandarin dengan baik</li>\n</ol>\n\n<p><strong>Kepala produksi </strong></p>\n\n<ol style=\"list-style-type:lower-alpha;\">\n	<li>Laki &ndash; laki max 40 tahun</li>\n	<li>Pendidikan S1 engineering</li>\n	<li>Bisa berbicara mandarin</li>\n	<li>Pengalaman 2 tahun di bidang yang sama</li>\n</ol>\n\n<p>Jobdesk:</p>\n\n<ol>\n	<li>Melakukan pengontrolan terhadap kinerja karyawan</li>\n	<li>Malkukan pengecekan &amp; perbaikan bila ada problem pada pompa</li>\n</ol>\n\n<p><strong>Accounting </strong></p>\n\n<ol style=\"list-style-type:lower-alpha;\">\n	<li>Laki &ndash; laki usia max 38 tahun</li>\n	<li>Pendidikan S1&nbsp; akuntansi /pajak</li>\n	<li>&nbsp;Pengalaman 4 tahun sebagai accounting</li>\n</ol>\n\n<p>Jobdesk :</p>\n\n<ol>\n	<li>Memahami siklus akuntansi</li>\n	<li>Membuat laporan keuangan setiap bulan</li>\n	<li>Melakukan stock opname secara berkala</li>\n	<li>Melakukan penagihan kepada customer yang sudah jatuh tempo</li>\n	<li>Melakukan pengecekan document yang akan di bayar mau pun yang akan di kirim ke customer</li>\n	<li>Bisa menggunakan efaktur</li>\n	<li>Mahir dalam penggunaan program akuntasi</li>\n	<li>Menguasai&nbsp; dan mampu mengimplementasikan semua jenis pajak Pph 21, 22, 23, 29, 25, 4 ayat 2&nbsp; serta PPN</li>\n	<li>Melakukan pembayaran dan pelaporan pajak setiap bulan</li>\n	<li>Membuat SPT Tahunan</li>\n</ol>\n\n<p><strong>Sales </strong></p>\n\n<ol style=\"list-style-type:lower-alpha;\">\n	<li>Laki &ndash; laki / perempuan&nbsp; usia&nbsp; max 40 tahun</li>\n	<li>Pendidikan SMA</li>\n	<li>Memiliki pengalaman 3 tahun di bidang nya</li>\n	<li>Pengalaman sebagai sales pompa (lebih di sukai)</li>\n</ol>\n\n<p>Jobdesk:</p>\n\n<ol>\n	<li>Penampilan menarik</li>\n	<li>Memiliki kendaraan pribadi</li>\n	<li>Mampu mecapai target</li>\n</ol>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `email_subscribe`
--

CREATE TABLE `email_subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `email_subscribe`
--

INSERT INTO `email_subscribe` (`id`, `email`, `tgl`) VALUES
(1, 'didiek_amaterasu@yahoo.com', '2017-07-11'),
(2, 'didiekagus23@gmail.com', '2017-07-11'),
(3, 'yasin@yahoo.com', '2017-07-11'),
(4, 'slashtian.tirexxx@gmail.com', '2017-07-11'),
(5, '', '2017-09-12'),
(6, 'tovandara@gmail.com', '2017-09-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `name1` varchar(100) NOT NULL,
  `support1` varchar(100) DEFAULT NULL,
  `name2` varchar(100) NOT NULL,
  `support2` varchar(100) DEFAULT NULL,
  `name3` varchar(100) NOT NULL,
  `support3` varchar(100) DEFAULT NULL,
  `name4` varchar(100) NOT NULL,
  `support4` varchar(100) DEFAULT NULL,
  `support5` varchar(100) DEFAULT NULL,
  `bb` text NOT NULL,
  `Notif` longtext,
  `LongDesc` longtext,
  `Image1` char(10) DEFAULT NULL,
  `Image2` char(10) DEFAULT NULL,
  `Image3` char(10) DEFAULT NULL,
  `descBank1` text,
  `descBank2` text,
  `descBank3` text,
  `mail` text,
  `Sort` int(11) DEFAULT NULL,
  `PublishFlg` int(6) DEFAULT NULL,
  `newsticker` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menumst`
--

CREATE TABLE `menumst` (
  `MenuID` int(10) NOT NULL,
  `ParentNumber` int(11) DEFAULT NULL,
  `Child` char(4) COLLATE latin1_general_ci DEFAULT NULL,
  `menu_level` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `MenuName` char(50) CHARACTER SET latin1 NOT NULL,
  `cMenuName` char(50) COLLATE latin1_general_ci NOT NULL,
  `MenuType` char(2) COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `menumst`
--

INSERT INTO `menumst` (`MenuID`, `ParentNumber`, `Child`, `menu_level`, `sort`, `MenuName`, `cMenuName`, `MenuType`, `icon`) VALUES
(1, 0, '1', 1, 10, 'UTILITY', '#', 'B', 'fa fa-cog'),
(2, 1, NULL, 2, 2, 'Main Menu Setting', 'menu/index', 'B', ''),
(3, 1, NULL, 2, 3, 'User Group', 'useradmin/usergroup', 'B', ''),
(4, 1, NULL, 2, 4, 'User', 'useradmin/createUser', 'B', ''),
(5, 1, NULL, 2, 5, 'Change Password', 'admin_profile/index', 'B', ''),
(8, 0, NULL, 1, 1, 'HOME', 'home/index', 'B', 'fa fa-dashboard'),
(25, 0, '25', 1, 6, 'TRANSACTION', 'admin_transaction', 'B', 'fa fa-credit-card'),
(6, 0, '6', 1, 2, 'MASTER', 'admin_master', 'B', 'fa fa-folder-open-o'),
(9, 6, NULL, 2, 1, 'Customer', 'master/customer', 'B', ''),
(10, 6, NULL, 2, 2, 'Barang', 'master/product_category', 'B', ''),
(20, 0, '20', 1, 8, 'REPORT', 'admin_report/index', 'B', 'fa fa-pie-chart'),
(11, 6, NULL, 2, 127, 'Promo', 'master/promo', 'B', ''),
(27, 25, NULL, 2, 127, 'Nota', 'transaction/nota', 'B', ''),
(28, 25, NULL, 2, 127, 'Settlement', 'transaction/daftar_settlement', 'B', ''),
(21, 20, NULL, 2, 2, 'Sales by Category', 'admin_report/sales_category', 'B', ''),
(22, 20, NULL, 2, 3, 'Mutasi Poin', 'admin_report/mutasi_poin', 'B', ''),
(16, 0, '16', 1, 7, 'POIN', 'master_admin', 'B', 'fa fa-paypal'),
(17, 16, NULL, 2, 127, 'Poin Baru', 'poin/index', 'B', ''),
(18, 16, NULL, 2, 127, 'Poin Pakai', 'poin/make', 'B', ''),
(19, 16, NULL, 2, 127, 'Poin Expired', 'master_admin/poin_expired', 'B', ''),
(13, 25, NULL, 2, 127, 'Verification', 'transaction/verification', 'B', ''),
(14, 20, NULL, 2, 1, 'Sales by Customer', 'admin_report/sales', 'B', ''),
(15, 6, NULL, 2, 127, 'Config Global', 'master/config', 'B', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_menu`
--

CREATE TABLE `ms_menu` (
  `ID` int(11) NOT NULL,
  `parent_number` int(11) DEFAULT NULL,
  `menu_level` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `name` char(50) CHARACTER SET latin1 NOT NULL,
  `controller` char(50) COLLATE latin1_general_ci NOT NULL,
  `type` char(2) COLLATE latin1_general_ci NOT NULL,
  `icon` varchar(250) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `ms_menu`
--

INSERT INTO `ms_menu` (`ID`, `parent_number`, `menu_level`, `sort`, `name`, `controller`, `type`, `icon`) VALUES
(17, 0, 1, 6, 'NEWS', 'admin_news', 'B', 'fa fa-newspaper-o\"'),
(5, 1, 2, 5, 'Change Password', 'admin_profile/index', 'B', ''),
(2, 1, 2, 2, 'Main Menu Setting', 'menu/index', 'B', ''),
(3, 1, 2, 3, 'User Group', 'group/index', 'B', ''),
(16, 0, 1, 5, 'ABOUT US', 'about', 'B', 'fa fa-info-circle'),
(19, 0, 1, 3, 'PRODUCT', 'admin_category', 'B', 'fa fa-server'),
(24, 0, 1, 24, 'SERVICE', 'SERVICE', 'B', ''),
(8, 0, 1, 1, 'HOME', 'home', 'B', 'fa fa-dashboard'),
(1, 0, 1, 12, 'UTILITY', '#', 'B', 'fa fa-cog'),
(18, 0, 1, 7, 'CONTACT', 'admin_contact', 'B', 'fa fa-map-o'),
(21, 0, 1, 2, 'BANNER', 'banner', 'B', 'fa fa-picture-o'),
(22, 0, 1, 8, 'USER', 'admin_user', 'B', 'fa fa-user-plus'),
(23, 0, 1, 9, 'USERGROUP', 'group', 'B', 'fa fa-users');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_product`
--

CREATE TABLE `ms_product` (
  `ID` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `desc` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `fg_active` tinyint(1) NOT NULL,
  `unit` char(10) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_product`
--

INSERT INTO `ms_product` (`ID`, `id_category`, `code`, `name`, `link`, `desc`, `image`, `fg_active`, `unit`, `sort`) VALUES
(1, 1, 'AKSm126', 'AKSm126 Pump', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>Can be used to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for samll living water supply, automatic water sprinkler system, small air conditioner system or supporting equipment etc.</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Special anti-rust treatment</li>\n	<li>Brass impeller</li>\n	<li>AISI 304 shaft</li>\n	<li>Max. liquid temperature:+40 <sup>o</sup>C</li>\n	<li>Max. suction : +8 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\"><img alt=\"\" src=\"/uploads/ckeditor/files/03.jpg\" style=\"width: 300px; height: 165px;\" /></span></h2>\n', '', 1, '0', 1),
(2, 1, 'AKSm350', 'AKSm 350 A', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>Can be userd to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for samll living water supply, automatic water sprinkler system, small air conditioner system or supporting equipment etc.</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>With 2 L pressure tank for automatic operation</li>\n	<li>Special anti-rust treatment</li>\n	<li>Brass impeller</li>\n	<li>AIS 304 shaft</li>\n	<li>Max. liquid temperature : +40 <sup>o</sup>C</li>\n	<li>Max. custion : + 9 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Copper winding</li>\n	<li>Built-in thermas protector</li>\n	<li>Insulation class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2><img alt=\"\" height=\"172\" src=\"/uploads/ckeditor/files/3.jpg\" width=\"251\" /></h2>\n\n<p>&nbsp;</p>\n', '', 1, '0', 2),
(3, 2, 'AJm30', 'Stainless Steel Jet Pump', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>Can be used to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for samll living water supply, automatic water sprinkler system, small air conditioner system or supporting equipment etc.</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>&nbsp; Stainless steel pump body</li>\n	<li>&nbsp; Stainless steel impeller</li>\n	<li>&nbsp; AISI 304 shaft</li>\n	<li>&nbsp; Max. liquid temperature:+40 oC</li>\n	<li>&nbsp; Max. suction : +9 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/1.jpg\" style=\"width: 400px; height: 237px;\" /></p>\n', '', 1, '0', 1),
(4, 2, 'AJm 30 S A5', 'Stainless Steel Jet Pump', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>\n	<p>&nbsp;Can be used to transfer clean water or other liquids similat to water in physical and chemical properties</p>\n	</li>\n	<li>\n	<p>Suitable for lifting water from well, sprinking irrigation in garden, pressure boosting of running water, and&nbsp; supporting equipment etc.</p>\n\n	<p>&nbsp;</p>\n	</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Stainless steel pump body</li>\n	<li>Stainless steel impeller</li>\n	<li>AISI 304 shaft</li>\n	<li>Max. liquid temperature:+40 <sup>o</sup>C</li>\n	<li>Max. suction : +9 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/1.jpg\" style=\"width: 300px; height: 169px;\" /></p>\n', '', 1, '0', 2),
(5, 3, 'AJDm', 'Deep Weel Pump AJDm-55/4 HA', '', '<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<ul>\n	<li>Can be used to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for lifting water from the well, sprinkling irrigation in gardern, pressure boosting of running water and supporting equipment etc.</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Cast iron pump body and support special anti-rust treatment</li>\n	<li>Stainless steel impeller</li>\n	<li>AISI 304 shaft</li>\n	<li>Max. liquid temperature:+40 <sup>o</sup>C</li>\n	<li>Max. suction : +40 m</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<h2><img alt=\"\" height=\"238\" src=\"/uploads/ckeditor/files/ajdm.PNG\" width=\"386\" /></h2>\n', 'pompa_air-5.png', 1, '0', 1),
(7, 2, 'AJm75', 'Jet Pump AJm 75', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>\n	<p>&nbsp;Can be used to transfer clean water o</p>\n	</li>\n	<li>\n	<p>r other liquids similat to water in physical and chemical properties</p>\n	</li>\n	<li>\n	<p>Suitable for lifting water from well, sprinking irrigation in garden, pressure boosting of running water, and&nbsp; supporting equipment etc.</p>\n	</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Stainless steel&nbsp;pump body</li>\n	<li>Stainless steel impeller</li>\n	<li>AISI 304 shaft</li>\n	<li>Max. liquid temperature:+40 <sup>o</sup>C</li>\n	<li>Max. suction : +9 m</li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color: rgb(51, 153, 204);\"><img alt=\"\" src=\"/uploads/ckeditor/images/1(1).jpg\" style=\"width: 400px; height: 200px;\" /></span></h3>\n\n<p>&nbsp;</p>\n', '', 1, '0', 3),
(8, 5, 'LRP', 'Booster Pump', '', '<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<p>It is widely used for :</p>\n\n<ul>\n	<li>Pressure boosting for domistic water supply</li>\n	<li>Floor heating system</li>\n	<li>solat pump system</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Automatic pressure boosting</li>\n	<li>Anti-rust iron pump body</li>\n	<li>Noryl impeller with heat resistance up to 150<sup>o</sup>C</li>\n	<li>99% alumina ceramic shaft</li>\n	<li>Liquid temperature:+60 <sup>o</sup>C</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Cooper winding</li>\n	<li>Insulation Class : H</li>\n	<li>Protection class : IP44</li>\n	<li>99% alumina ceramic bearing</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#3399cc;\"><img alt=\"\" height=\"180\" src=\"/uploads/ckeditor/files/3(1).jpg\" width=\"310\" /></span></p>\n\n<p>&nbsp;</p>\n', '', 1, '0', 0),
(32, 6, '4XRS 2', 'Submersible Borehole Pump 4XRS 2', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"186\" src=\"/uploads/ckeditor/files/Capture.PNG\" width=\"376\" /></p>\n\n<p>&nbsp;</p>\n', '', 1, '0', 8),
(30, 6, '4XR 3', 'Submersible Borehole Pump 4XR 3', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n', '', 1, '0', 4),
(31, 6, '4XR 4', 'Submersible Borehole Pump 4XR 2', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n', '', 1, '0', 5),
(29, 6, '4XR 8', 'Submersible Borehole Pump 4XR 8', '', '<div class=\"col-sm-7\">\n<div style=\"font-size:12px\">\n<div class=\"col-sm-7\">\n<div style=\"font-size:12px\">\n<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n</div>\n</div>\n</div>\n</div>\n', '', 1, '0', 7),
(21, 7, 'XKS', 'Garden Submersible Pump XKS', '', '<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<ul>\n	<li>Can be used to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for immersed in water for liting from the well or the pool, and draining water from the basement.</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Plastic pump body</li>\n	<li>Float switch ensures automatic cut-in and cut-out</li>\n	<li>Max. liquid temperature: + 35<sup>o</sup>C</li>\n	<li>Max. immersion depth:7 m</li>\n	<li>Max. diameter of particle:8mm</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Aluminium winding</li>\n	<li>Built-in thermal protector</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h2><span style=\"color:#3399cc;\"><img alt=\"\" height=\"181\" src=\"/uploads/ckeditor/files/127.jpg\" width=\"340\" /></span></h2>\n\n<p>&nbsp;</p>\n', '', 1, '0', 2),
(22, 8, 'Foot Valve', 'Foot Valve', '', '<p>&nbsp;<img alt=\"\" height=\"163\" src=\"data:image/png;base64,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srKyenp6khGVZXlkZCQnJ4fjuHA4HI/H29ratm3bdvjwYXU7uHHVeTQarampoSgqEXM7GWYIYSQS6ejoIElyx44dBw4caGhoUMtZNBodHBzkOK6kpKS4uLi4uNhisdTX109gGsFpAbOansFgsLS01G63JyKoqrkwNDR09OjRvr6+5JPHxsZSU1M5jkv44XA4LIqiyWSSZTkajfb29tI0zfN8dnb2nj171O1HJvVXTo5ND5hVkySptrb24YcfvvLKK6+66qqrr75a/WP27NkbNmzYu3fv7Nmzt27dmlwrh8NhlmXvvPPO7du3S5KkbpVw5ZVXPvLII42NjcoX43jGYrEzZ8688sort99+e2tra6I6SDjqeDxeVVW1YMGCa6655uabb7755pvnzZt38uRJCGEoFDp8+PD8+fOvv/7666+//sYbb5wzZ8577703cakzTWCWZTkcDhcXFz/xxBNGo9Hn8yU88PDw8Lp169RtmRPdHHXP3YULF/I8r+ZULBarqal54okn7rzzzkgkom4V+MQTT6xevXrRokU///nPm5ubJ/tXTo5NG5jVLK+pqXn00Ue3b98ejUbD4XAwGFSzU5Kk7u7um2+++amnnhobG4PnG1perxfDsAceeEDdT7Cnp+eRRx751a9+NWvWrM2bNyfX39FotLq6evny5f/0T//0k5/8pKmpKXGThJ8fHBz89a9/PXfu3FOnTnk8HovFMnv27BtuuGFkZMTv92/ZsmXBggWHDx+uqqqqrKysqKjo7OycuPbeNIE5FAoVFxcvWLDg8ssvX7t2rdfrhRDG4/He3l6dTjdr1qyrrrqK4zi1C6MoirqX0HPPPadusK4oyvDw8KpVq773ve9de+21sVgsFouJorh48eL333//N7/5zbXXXtvS0vLt7DlPD5jVfI3H4zU1NUuWLPn000/V40rSYInX60UQ5Be/+IXVaoXnu1Ld3d2//OUvX3rpJY/HEw6H8/Lybrnllv37969YseL555/v6+tLuIWmpqa77rrrjjvumD179jXXXNPU1JQ8VKYWo7a2tp/+9Kcvv/yy+pHb7X7//fdvuumm5ubmgYGBNWvWvPrqq52dnYFAQN3LZkLTaDrAHA6HaZqePXv23Llz77rrrpSUFLU709PTs3Llyh/96EcPPfTQ7bffzrIsPF99O53O1NTUNWvWhEIhRVH8fn9WVtYdd9wxb968OXPmhEKhcDhcXl7+1FNPGY1GnU43b968byfJcLrAnGgJ19fXL1myZMuWLV6v1+PxqP8GAgFZlkOhEMuyP//5z9evX6/2h0Oh0JEjR2644QaSJNVW3GuvvTZv3ryurq7PPvts/vz5R48eTYyfdXR0vPHGG4WFhW+//fasWbNUmJWk8W1ZlgOBQG9vr9PpVP/b19f39NNP33rrrb29vS0tLStXrvz9739/8OBBHMfV7nQkEtE8c7IFg0GaptetW1dcXPzWW2+tWbPG4/FIktTf379p06a8vLzc3NwFCxZwHAfPd3CamppeeOEFAEA8Hlf3HnrxxRc/+OCDjz766LbbblMDJHd2dhqNxsOHDxcUFBgMBqgNgE1lS/bMDzzwwOOPP75q1apVq1alpKSkpqaaTCan0xmLxXp7e1955ZXf/e53HR0dKr0vvfTSww8/3NPTo24ot2DBgv/+7/9We1kLFy587733RkdHE0NcoVDI5XK98847s2bNGtfvSrS0E7F1nU7nvn375syZ87e//S0ej5eXly9evHju3LnLli1bsmTJDTfc8Mgjj+Tn52uj2cmmNpuj0ahadaowQwjVAQt1s/tkmCORSEFBwXPPPVdeXq4y/+GHH/72t78tKyszGAy33XabOvoYj8e9Xm8oFFJzEGowT3FTx5+qq6vvv//+++6776WXXnrppZdefvnllStXbtiwYWhoSG1p79+/f+HChSdPnoxEIqIo3nzzzWlpabFYzOv1ZmZm3nbbbSUlJbFYrKOj489//vNjjz1WWVmZmOFQFOUfw6ycj5XtcrkOHjx47733Pv30083NzdFotLm5OTU1devWrdXV1fX19Xv37r3lllteeOGFwcHBCUqg6QAzPB/LvrOz8/XXX09JSVE391ObXZFI5OTJkwsWLFCb2SqimzZtev3113t6egKBwL59+x5++OHjx4+7XC6j0ZjwzMnbFcgXBDz/9ti0gVnN77q6uqVLl65fv76/v7+/v39gYGBgYGB0dDQWi6m1u91uf/LJJ9PS0vr6+oxG43XXXdfQ0CBJUktLy3PPPfdv//ZvDzzwwGOPPbZ48eKbbrpp1qxZu3btUjtjqnO+EObEiHeilDidzr179957773Lly93OBySJEWj0UgkMjw87PP51EpnZGTk9ddfX7x4cV1d3UQlEJwWMEMIEzCvXr06sYe2Or136tSpZJi7u7v/9re/oSjqdDptNtudd9757rvvNjQ01NfXf/jhhz/72c/a2tpGR0eTq2PlqzY/mME2PWBOvCVSXV29dOnSnTt3wvNNKVmWY7FY4s2B3t7eDz/8cPny5YWFhfPnz3/++eej0WgwGDx58uQDDzywYsWK9PT09PT0DRs2fPjhh/fff/+rr77a39+fmHxyOp1f6pnl83umeDyerVu3XnvttW+88UZTU5M66CrLstvtbm9v9/l86oN5PJ6UlJSFCxeqezhPhE0TmBMjFK+//nqimQ3/DsxVVVVqh9nr9W7fvv073/nOD37wg1mzZv34xz++/PLL/+Vf/uVnP/vZ1q1b4RfnHbQBsCltiXlgFeZt27YlDsIvdpACgQAAYO7cuX/84x/vuOOO/Px8dTLjww8/vP322+12e2J0enh4+L333vvxj39ssVgSd/hSzxyLxdTmXCAQIAjihz/84TvvvNPa2pogORAI7N279wc/+AGGYV6vV5Kk3t7e+fPnP/roo+oU14SkEZxeMKt9ZrfbncjEcTCrre633367trY2Go3W1dURBJGVlXXgwIGdO3e++OKL11133b59+6qqqpSk1/US3zKJv3GybHrArHpO9W2Bxx57bM+ePepx5Yuv+MVisUgkUldXt3z58quuuuqee+7x+XzxeLy+vv7FF1988803+/v7E68BhsPhQ4cO3XvvvR988IE6Hg4hdLlcf/rTn6699loVZtXHFhQUmEymoaGhpqamu++++6c//WlmZqY69Jqbm5ufnz82NlZTU/PUU089+OCDWVlZ+fn5K1asmDVrVkZGxsR5iWkCM4Qw4Zk//vhjj8eTaCQnw6yOX6gd5oGBAXi+Fa2erL4+cPvttye/5plsWjN76lpi8Km5uflPf/pTXl6enPQK/rg3cl0uV0ZGxiOPPLJ79261iAiC8MILL+zfvz8x/ate0tzc/O6777788ssej0e9m9frNRqNTzzxRFdXl3ra0NDQhg0b3nvvvba2NovF8otf/GLevHm//OUv77nnHvXfZcuWdXZ2er3e3NzcJ5988tZbb73llluWLFmiemltaupCU2f1UBTdsWOH3++H5wcmotEoz/N//OMfKyoqJEnq6+tLTU3dvHlzOByGX1xNEQwGd+/e/fvf/z6xX++4AbBvp00PmOH5/Pb7/U1NTWfP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z0fklySpoaHh/vvvX7VqlbqzrNvtVh2+etq40CjffIrAqQ+zLMudnZ2/+93vvve9711++eXq9jSKong8HpIk77zzzu9+97tXXXUVy7KJ6ELqLvYrV67s7e198803586de+zYMTXs8UcffXT11VefOnVKEITFixevW7funXfeufnmm9VdBCf7t06CTWOYh4eH9Xr90qVL1Q1KVN5U/xmNRtW9mleuXJmIHNbR0fHwww8//PDDaq+M47hf//rXH3/88YYNG66//vpDhw4lbtLf33/vvfcuWrRo8+bNl1122bp168YFFVL3yrFarfPnKy141AAAIABJREFUz9+/f7/f73c6nYFAQL18XDihiUoROPVh9vl8RqNx7ty5H3300fPPP79q1Sp1L962trbly5c/+uija9asue+++wRBgPBcoK+zZ8+uXLkSRdGRkZEdO3Zs3bpV3Z4qFArt27fv6quv3rVrV21t7YoVK3bu3Ll169ann356sn/lpNk0hnlkZARF0QceeODw4cPt7e3t7e0dHR3d3d1qCPWzZ88+88wzN9xww8DAgNqKO3HixPz587dt26a6gu3bt8+dO/fQoUNNTU233nrr7373u8RAVygUKi0t9Xg8PM9ffvnlqampCZgTEacCgcDBgwfnzJnz1ltvvfjii9dee+1LL71UVFSkjrrFYrEJTxE49WGORqOVlZVnzpxpb29/44031F0gJUlyu92iKPb09Kj7M1ssFvX8WCxWWlr67LPPHjt2TI3ImYigODw8/Pbbb99www0VFRVer7eysrKzs7O3t7e6unpSf+Jk2jSGeXh4ODU19fvf//68efMWL168ePHiJUuW/OEPfygpKVEUJRAIUBR19dVXEwQBIXQ6nWvWrFmwYIG6DYJamP7whz90dHS43e6UlJSbb75ZvVA5HxIwFovxPH/ZZZepfebEaJYKttfr3bJly3XXXff4448jCLJy5crbb7998eLFdrtdLXYT2mGG0wNmCKEat7Sjo+PNN99U95pKhL8Oh8OnTp1auHChunEchDAcDmdnZ69YsaKlpSWxU6csyy6XKysr66c//el7770XDoeVpG13JzPa8WTbNIZ5aGgoLS1t9uzZf/rTn1AUxTAMx/GdO3eqQ9OSJHV2dt59993PPfecx+Opq6t7/vnnP/roI7WNXVRUNGfOnOXLlwMAsrOzV61a9f3vf/+9996LRCKJkOuRSESFed26dYkR7MQDqE5m586dLS0t6oY4GzduvOWWW9avX69uMTXRIdqnCczw/FTTW2+9legzqwkeDofz8/MfeughhmEghLIsj42Npaenp6SkDA8PJ64dGhravn37vHnzXnvttd7e3uQU/nZ2lRM2vWFGEGTp0qXqPmPjYqarzlPdK5BlWYqi7r///ry8vFgs5nK5Pv744+985zv//u//fvPNN990003XXHPNd7/73QcffPD06dMJaNWOdwJm+Yv7VKlH1ODYKvmJTrjL5YLnx8k0mMeZ2vDp6up66623UlJSXC5XYpRB9cwPPfQQz/Nqhra0tLz55puffvppOBxW03NkZGTTpk2zZ89esWJFU1NT8i4Fmk1jmM+ePavT6RYvXlxWVnbhjK46RtXY2HjHHXd89NFHq1atevbZZ5ubm9XxraVLly5btozjuOrq6qqqKofDsWHDhlmzZm3atEnt7qqDYTzPX3HFFampqepGKsnNueHhYZPJlJqaGgwGIYTRaLSoqGjRokWpqaler3dcbPcJSRE4LWCG5wcj//jHP6p95sRxdUPmhQsXchynTiXyPL9ixYqioiI1gPbo6GhaWtqtt966evXq7u7uRBtqEn/LlLJpDLM6APboo4+qYx5y0pZFKm/xeHxsbOz111+/6aablixZYjQa/X6/3+/Pycn5yU9+sn379oQzD4fDjY2Nv/zlL//whz/09/cr57ekUAfA0tLSEs1sj8fT3t6uvm32zjvvXH/99ep+7i6XC0GQK6+80mQyRaPR5G00JipF4LSAWU3zzs7ON954IyUlxel0wqQp5fz8fBXmeDzu8/n279//wgsvnDlzRh3CPHr06I9+9KOUlBR1f08IoQZzsk1vmI1G4+OP/9/2rjQqqiNt//j+fd+vSTRhnDEzR1zG5aBRUBGEltUleIwTMxrjSYwmTtzivoyJ4BITE6PGBEGJmbjgCohmiEEgxw2QLSCbyoR9b7S7aejl3qp63+9H0TWXxpkxM+jt7tznPIfT3K7urlt1n1reqnrfmUVFReiQjbK15maw1NTUZ555JjAw8IcffkBEo9G4efPm4ODg8vJyUOzr4q3+lClTrly5InaA3bp1a9CgQXv27EGHlTsrK2vs2LFnzpzhE7wJEyZ4eXktWbIkJCRk0KBBK1asqKurUy5iaTvA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\" width=\"220\" /></p>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>stainless steel mesh</li>\n	<li>can be user as a check valvel</li>\n</ul>\n', '', 1, '0', 3),
(23, 8, 'Cap', 'Capacitor', '', '<p><img alt=\"\" height=\"409\" src=\"/uploads/ckeditor/files/kapascito.PNG\" width=\"748\" /></p>\n', '', 1, '0', 7),
(24, 8, 'FLSW', 'Float Sweet', '', '<p><img alt=\"\" height=\"338\" src=\"/uploads/ckeditor/files/float.PNG\" width=\"726\" /></p>\n', '', 1, '0', 8),
(41, 7, 'QDX-3', 'Submersible Pump QDX-3', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li><span style=\"font-size:14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Cast iron pump body under special anti-rust treatment</span></li>\n	<li><span style=\"font-size:14px;\">- Max. immersion depth : 5 m </span></li>\n	<li><span style=\"font-size:14px;\">- Max. liquid temperature : +40 <sup>o</sup>C</span></li>\n	<li><span style=\"font-size:14px;\">- liquid pH value : 6.5-8</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Copper winding</span></li>\n	<li><span style=\"font-size:14px;\">- Built-in thermas protector</span></li>\n	<li><span style=\"font-size:14px;\">- Insulation class : B</span></li>\n	<li><span style=\"font-size:14px;\">- Protection class : IP68</span></li>\n	<li><span style=\"font-size:14px;\">- Stainless stell welded shaft</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px;\"><img alt=\"\" height=\"260\" src=\"/uploads/ckeditor/files/Capture2.PNG\" width=\"537\" /></span></p>\n', '', 1, '0', 3),
(42, 7, 'QDX15-10', 'Submersible Pump QDX15-10', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li><span style=\"font-size:14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Cast iron pump body under special anti-rust treatment</span></li>\n	<li><span style=\"font-size:14px;\">- Max. immersion depth : 5 m </span></li>\n	<li><span style=\"font-size:14px;\">- Max. liquid temperature : +40 <sup>o</sup>C</span></li>\n	<li><span style=\"font-size:14px;\">- liquid pH value : 6.5-8</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Copper winding</span></li>\n	<li><span style=\"font-size:14px;\">- Built-in thermas protector</span></li>\n	<li><span style=\"font-size:14px;\">- Insulation class : B</span></li>\n	<li><span style=\"font-size:14px;\">- Protection class : IP68</span></li>\n	<li><span style=\"font-size:14px;\">- Stainless stell welded shaft</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<p><span style=\"font-size:14px;\"><img alt=\"\" height=\"183\" src=\"/uploads/ckeditor/files/odx15.PNG\" width=\"378\" /></span></p>\n', '', 1, '0', 1);
INSERT INTO `ms_product` (`ID`, `id_category`, `code`, `name`, `link`, `desc`, `image`, `fg_active`, `unit`, `sort`) VALUES
(43, 9, 'XQS 7.2', 'Stainless Steel Submersible Pump 7', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li><span style=\"font-size:14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li>&nbsp;</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Stainless steel pump body</span></li>\n	<li><span style=\"font-size:14px;\">- Max. immersion depth : 5 m </span></li>\n	<li><span style=\"font-size:14px;\">- Max. liquid temperature : +40 <sup>o</sup>C</span></li>\n	<li><span style=\"font-size:14px;\">- liquid pH value : 4 - 10</span></li>\n	<li><span style=\"font-size:14px;\">- Max. liquid density : 1.03x10<sup>3</sup>kg/m<sup>3</sup></span></li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li><span style=\"font-size:14px;\">- Copper winding</span></li>\n	<li><span style=\"font-size:14px;\">- Built-in thermas protector</span></li>\n	<li><span style=\"font-size:14px;\">- Insulation class : B</span></li>\n	<li><span style=\"font-size:14px;\">- Protection class : IP68</span></li>\n	<li><span style=\"font-size:14px;\">- Stainless stell welded shaft</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><span style=\"font-size:14px;\"><img alt=\"\" height=\"190\" src=\"/uploads/ckeditor/files/Capture2(1).PNG\" width=\"437\" /></span></p>\n', '', 1, '0', 1),
(46, 9, 'XQS15-30', 'Stainless Steel XQS15-30', '', '<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- liquid pH value : 6.5 - 8</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/Capture2(2).PNG\" style=\"width: 500px; height: 226px;\" /></p>\n', '', 1, '0', 3),
(47, 9, 'XQS 15-30', 'Stainless Steel XQS 15-30', '', '<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- liquid pH value : 6.5 - 8</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/2-2.PNG\" style=\"width: 400px; height: 186px;\" /></p>\n', '', 1, '0', 5),
(45, 9, 'XQS 4.5 - 27', 'XQS Stainless Steel  4,5 - 27', '', '<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- liquid pH value : 6.5 - 8</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"box-sizing: border-box; margin: 0px; padding-right: 0px; padding-left: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/files/cp2(1).PNG\" style=\"width: 476px; height: 208px;\" /></p>\n', '', 1, '0', 2),
(48, 9, 'XQS 15-20', 'XQS Stainless Steel SP XQS 15-20', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Small electrical irrigation and drainage equipments</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Particularly applied in urban wall water pumping, field irrigation and drainage, garden irrigation and household water supply, as well as drainage of industrial accumulated water, water supply and drainage for construction, livestock breeding, etc..</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- liquid pH value : 6.5 - 8</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p style=\"color: rgb(34, 34, 34); font-family: Arial, Verdana, sans-serif; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><img alt=\"\" src=\"/uploads/ckeditor/images/15-20.PNG\" style=\"width: 400px; height: 188px;\" /></p>\n', '', 1, '0', 4),
(49, 9, 'XSP 8-7', 'Sewage Pump XSP 8-7', '', '<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding-right: 0px; padding-left: 0px; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding-right: 0px; padding-left: 0px; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup> &nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding-right: 0px; padding-left: 0px; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/Capture2.PNG\" style=\"width: 461px; height: 191px;\" /></p>\n', '', 1, '0', 6),
(50, 9, 'XSP 12 - 8,5', 'Sewage Pump XSP 12 - 8,5', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/xsp%2012-85.PNG\" style=\"width: 400px; height: 176px;\" /></p>\n', '', 1, '0', 7),
(51, 9, 'XSP 20-9', 'Sewage Pump XSP 20-9', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/a-xsp%2020-9.PNG\" style=\"width: 400px; height: 191px;\" /></p>\n', '', 1, '0', 8),
(52, 9, 'XSP 42-17', 'Sewage Pump XSP 42-17', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/xsp%2042-17.PNG\" style=\"height: 175px; width: 400px;\" /></p>\n', '', 1, '0', 9),
(53, 9, 'XSP 9 - 7,5', 'Sewage Pump XSP XSP 9 - 7,5', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/xsp%20-%209-7_5.PNG\" style=\"width: 400px; height: 160px;\" /></p>\n', '', 1, '0', 9);
INSERT INTO `ms_product` (`ID`, `id_category`, `code`, `name`, `link`, `desc`, `image`, `fg_active`, `unit`, `sort`) VALUES
(54, 9, 'XSP  18-12', 'Sewage Pump XSP 9-7,5', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/18-12.PNG\" style=\"width: 400px; height: 157px;\" /></p>\n', '', 1, '0', 10),
(55, 9, ' XSP 14 - 7', 'Sewage Pump XSP 14 - 7', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p><img alt=\"\" src=\"/uploads/ckeditor/images/14-7.PNG\" style=\"width: 400px; height: 184px;\" /></p>\n', '', 1, '0', 11),
(56, 9, 'XSP 18 - 12', 'Sewage Pump XSP 18 - 12', '', '<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Application</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Waswater drainage in factories, construction sites and commercial facilities</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage system in municipal sewage treatment plants</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Drainage station in residentiall quarters</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Municipal Project</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Methane pools and field irrigation in countryside</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Pump</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. immersion depth : 5 m</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid temperature : +40&nbsp;<span style=\"box-sizing: border-box; position: relative; font-size: 10.5px; line-height: 0; vertical-align: baseline; top: -0.5em;\">o</span>C</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid pH value : 4-10</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Liquid kinematic viscosity : 7x10<sup>-7</sup><span>&nbsp;</span>&nbsp;- 23x10<sup>-6</sup>m<sup>2</sup>/s</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Max. liquid density : 1.2x10<sup>3</sup>kg/m2</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<h3 style=\"font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; font-family: Raleway, sans-serif; font-weight: 500; line-height: 2rem; color: rgb(26, 26, 26); margin: 0px 0px 10px; font-size: 1.5rem; background-color: rgb(245, 245, 245);\"><span style=\"box-sizing: border-box; color: rgb(51, 153, 204);\">Motor</span></h3>\n\n<ul style=\"padding: 0px; font-size: 12px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; box-sizing: border-box; margin: 0px; list-style: none; color: rgb(121, 121, 121); font-family: Raleway, sans-serif; background-color: rgb(245, 245, 245);\">\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Copper winding</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Built-in thermas protector</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Stainless steel welded shaft</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Insulation class : B</span></li>\n	<li style=\"box-sizing: border-box;\"><span style=\"box-sizing: border-box; font-size: 14px;\">- Protection class : IP68</span></li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n	<li style=\"box-sizing: border-box;\">&nbsp;</li>\n</ul>\n\n<p>&nbsp;<img alt=\"\" src=\"/uploads/ckeditor/images/xsp%2018-12.PNG\" style=\"width: 400px; height: 208px;\" /></p>\n', '', 1, '0', 12),
(33, 6, '4XRS 3', 'Submersible Borehole Pump 4XRS 3', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n', '', 1, '0', 9),
(26, 6, '4XR 2', 'Submersible Borehole Pump 4XR 2', '', '<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<ul>\n	<li>For water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>For garden use and irrigation</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Core tolerance accordimg to ISO 9006t</li>\n	<li>Max. fluit temperature: + 35<sup>o</sup>C</li>\n	<li>Max. Sand content : 0.25 %</li>\n	<li>Max. immersion :80 m</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Copper Motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single-phase : 220V/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n', '', 1, '0', 3),
(27, 6, '3XR 2.5', 'Submersible Borehole Pump 3XR 2.5', '', '<div style=\"font-size:12px\">\n<h3><font style=\"color:#3399cc;\">Application</font></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"153\" src=\"/uploads/ckeditor/files/ident.PNG\" width=\"336\" /></p>\n</div>\n', '', 1, '0', 2),
(28, 6, '4XR 6', 'Submersible Borehole Pump 4XR 6', '', '<div class=\"col-sm-7\">\n<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Pump</span></h3>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"145\" src=\"/uploads/ckeditor/files/ident.PNG\" width=\"319\" /></p>\n</div>\n', '', 1, '0', 6),
(20, 6, '3XR 1.8', 'Submersible Borehole Pump 3XR 1.8', '', '<h2><span style=\"color:#3399cc;\">Application</span></h2>\n\n<ul>\n	<li>For Water supply from wells or reservoirs</li>\n	<li>For domestic use, for civil and industrial applications</li>\n	<li>for garden use and irrigation</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Pump</span></h2>\n\n<ul>\n	<li>Pump are designed by casing stressed</li>\n	<li>Cure tolerance according to ISO 9006</li>\n	<li>Maximum fluid temperature up to + 35<sup>o</sup>C</li>\n	<li>Maximum sand content : 0.25%</li>\n	<li>Maximum immersion : 80 m</li>\n</ul>\n\n<h2><span style=\"color:#3399cc;\">Motor</span></h2>\n\n<ul>\n	<li>Cooper motor</li>\n	<li>AISI 304 shaft</li>\n	<li>Insulation Class : F</li>\n	<li>Protection class : IPX8</li>\n	<li>Single phase : 220V-240/50Hz</li>\n	<li>Equip with start control box</li>\n</ul>\n\n<p><img alt=\"\" height=\"164\" src=\"/uploads/ckeditor/files/ident.PNG\" width=\"360\" /></p>\n', '', 0, '0', 1),
(34, 2, 'AJm75 A', 'Jet Pump  AJm75 A', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>Can be userd to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for samll living water supply, automatic water sprinkler system, small air conditioner system or supporting equipment etc.</li>\n</ul>\n\n<p><span style=\"color:#3399cc;\">Pump</span></p>\n\n<ul>\n	<li>Cast iron body and support under special anti-rust treatment</li>\n	<li>Stainless steel impeller</li>\n	<li>AISI 304 shaft</li>\n	<li>Max. liquid temperature : +40 <sup>o</sup>C</li>\n	<li>Max. custion : + 9 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Copper winding</li>\n	<li>Built-in thermas protector</li>\n	<li>Insulation class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient&nbsp;temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h3><span style=\"color: rgb(51, 153, 204);\"><img alt=\"\" src=\"/uploads/ckeditor/images/Capture.PNG\" style=\"width: 324px; height: 200px;\" /></span></h3>\n', '', 1, '0', 4),
(35, 3, 'AJDm H A', 'Jet Pump for Deep Well AJDm H A', '', '<h3><span style=\"color:#3399cc;\">Application</span></h3>\n\n<ul>\n	<li>Can be userd to transfer clean water or other liquids similat to water in physical and chemical properties</li>\n	<li>Suitable for samll living water supply, automatic water sprinkler system, small air conditioner system or supporting equipment etc.</li>\n</ul>\n\n<p><span style=\"color:#3399cc;\">Pump</span></p>\n\n<ul>\n	<li>With 2 L pressure tank for automatic operation</li>\n	<li>Special anti-rust treatment</li>\n	<li>Brass impeller</li>\n	<li>AIS 304 shaft</li>\n	<li>Max. liquid temperature : +40 <sup>o</sup>C</li>\n	<li>Max. custion : + 9 m</li>\n</ul>\n\n<h3><span style=\"color:#3399cc;\">Motor</span></h3>\n\n<ul>\n	<li>Copper winding</li>\n	<li>Built-in thermas protector</li>\n	<li>Insulation class : F</li>\n	<li>Protection class : IP44</li>\n	<li>Max. ambient temperature : +60<sup>o</sup>C</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n', '', 1, '0', 2),
(36, 8, 'Tank', 'Tank', '', '<h2>Informasi Produk</h2>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"228\" src=\"/uploads/ckeditor/files/Capture77.PNG\" width=\"489\" /></p>\n\n<p>&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"169\" src=\"/uploads/ckeditor/files/Capture4.PNG\" width=\"619\" /></p>\n\n<p><img alt=\"\" height=\"149\" src=\"/uploads/ckeditor/files/Capture23.PNG\" width=\"638\" /></p>\n', '', 1, '0', 1),
(37, 8, 'Branch', 'Branch 3-Way/5 Way', '', '<p><img alt=\"\" height=\"213\" src=\"/uploads/ckeditor/files/rin.PNG\" width=\"562\" /></p>\n', '', 1, '0', 2),
(38, 8, 'Pessure Switch ', 'Pessure Switch', '', '<ul>\n	<li>High Precesion</li>\n	<li>High Sensivity</li>\n	<li>Adjustabel Presure range 1.4-5.6 bar</li>\n	<li>G1/4&quot;</li>\n</ul>\n', '', 1, '0', 4),
(39, 8, 'Pressuer Gauge', 'Pressuer Gauge', '', '<h2><span style=\"color:#000000;\">Informasi Produk</span></h2>\n\n<p>&nbsp;</p>\n\n<p><span style=\"color:#000000;\"><span style=\"font-size: 14px;\">- Connection types : G1/4&quot;</span></span></p>\n\n<p><span style=\"color:#000000;\"><span style=\"font-size: 14px;\">- For 40mm gauge, the scae :0-6 bar</span></span></p>\n\n<p><span style=\"color:#000000;\"><span style=\"font-size: 14px;\">- Back/bottom connection</span></span></p>\n', '', 1, '0', 5),
(40, 8, 'PS-04A', 'Electromagnetic Switch', '', '<h2>&nbsp;Informasi Produk</h2>\n\n<p>&nbsp;</p>\n\n<p><img alt=\"\" height=\"420\" src=\"/uploads/ckeditor/files/elektromagnetic_switch.PNG\" width=\"895\" /></p>\n', '', 1, '0', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_product_category`
--

CREATE TABLE `ms_product_category` (
  `ID` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `desc` text NOT NULL,
  `sort` int(11) NOT NULL,
  `fg_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ms_product_category`
--

INSERT INTO `ms_product_category` (`ID`, `name`, `desc`, `sort`, `fg_active`) VALUES
(1, 'Self-priming Peripheral Pump', 'Lorem ipsum dolor sit amet', 9, 1),
(2, 'Jet Pumps', 'Lorem ipsum dolor sit amet', 7, 1),
(3, 'Jet Pumps for Deep Well', 'Lorem ipsum dolor sit amet', 3, 1),
(5, 'Booster Pump', 'Lorem ipsum dolor sit amet', 4, 1),
(6, 'Submersible Borehole Pump', 'Lorem ipsum dolor sit amet', 5, 1),
(7, 'Submersible Pump', 'Lorem ipsum dolor sit amet', 6, 1),
(8, 'Accesories', 'aksesoris produk', 1, 1),
(9, 'Stainless Steel Submersible Pump', 'Lorem ipsum ', 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_image`
--

CREATE TABLE `product_image` (
  `ID` int(6) NOT NULL,
  `id_product` int(6) DEFAULT NULL,
  `ImageName` varchar(250) DEFAULT NULL,
  `publish` smallint(1) DEFAULT '1',
  `mainImage` smallint(1) DEFAULT '0',
  `sort` smallint(5) DEFAULT NULL,
  `caption` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_image`
--

INSERT INTO `product_image` (`ID`, `id_product`, `ImageName`, `publish`, `mainImage`, `sort`, `caption`) VALUES
(16, 6, 'leo_Booster-Pump-Leo-0615070843.png', 1, 1, 1, 'freesea powerful ABS material Leo well'),
(21, 9, 'leo_OH-OH1-OH2-0620014502.jpg', 1, 1, 1, 'Petrochemical Pumps '),
(22, 10, 'leo_HA-HE-0620014834.jpg', 1, 1, 1, 'Petrochemical Pumps'),
(23, 11, 'leo_Pompa-Kimia-Standar-0620015207.jpg', 1, 1, 1, 'Pompa Kimia Standar'),
(24, 12, 'leo_Pompa-Split-Aksial-Horizontal-BBL-0620022130.jpg', 1, 1, 1, ' Pompa Split Aksial Horizontal (BBL) '),
(25, 13, 'leo_Heavy-Industry-Petrochemical-Process-Pump-BB2-0620023117.jpg', 1, 1, 1, ' Heavy Industry Petrochemical Process Pump (BB2) '),
(26, 14, 'leo_Axial-split-horizontal-multi-stage-centrifugal-pump-BB3-0620024931.jpg', 1, 1, 1, 'Axial split horizontal multi-stage centrifugal pump (BB3)'),
(27, 15, 'leo_Horizontal-single-shell-multi-stage-pump-BB4-0620025215.jpg', 1, 1, 1, '	Horizontal single-shell multi-stage pump (BB4)'),
(28, 16, 'leo_Horizontal-double-shell-multi-stage-pump-BB5-0620025701.jpg', 1, 1, 1, 'Horizontal double shell multi-stage pump (BB5)'),
(29, 17, 'leo_Vertical-Suspension-Long-Shaft-Pump-VS4-0620030514.jpg', 1, 1, 1, ' Vertical Suspension Long Shaft Pump (VS4) '),
(30, 18, 'leo_Vertical-multi-stage-suspension-centrifugal-pump-VS1-VS6-0620031325.jpg', 1, 1, 1, ' Vertical multi-stage suspension centrifugal pump (VS1 / VS6)'),
(31, 19, 'leo_Mixed-flow-pump-0620033245.jpg', 1, 1, 1, ' Mixed flow pump '),
(33, 1, 'leo_AKSm126-Pump-0621091538.jpg', 1, 1, 1, 'Self-priming Peripheral Pump AKSm126 Pump '),
(34, 1, 'leo_AKSm126-Pump-0621091549.jpg', 1, 0, 1, 'Self-priming Peripheral Pump AKSm126 Pump '),
(35, 2, 'leo_AKSm-350-A-0621094424.jpg', 1, 1, 1, 'aksn3'),
(36, 2, 'leo_AKSm-350-A-0621094431.jpg', 1, 0, 1, ''),
(37, 3, 'leo_Stainless-Steel-Jet-Pump-0621100105.jpg', 1, 1, 1, ''),
(38, 3, 'leo_Stainless-Steel-Jet-Pump-0621100112.jpg', 1, 0, 1, ''),
(39, 4, 'leo_Stainless-Steel-Jet-Pump-AJm-75-0621101326.jpg', 1, 1, 1, ''),
(40, 4, 'leo_Stainless-Steel-Jet-Pump-AJm-75-0621101332.jpg', 1, 0, 1, ''),
(41, 7, 'leo_Jet-Pump-AJm-75-0621104953.jpg', 1, 1, 1, ''),
(42, 7, 'leo_Jet-Pump-AJm-75-0621105000.jpg', 1, 0, 1, ''),
(43, 5, 'leo_Deep-Weel-Pump-AJDm-554-HA-0621135837.jpg', 1, 1, 1, ''),
(44, 5, 'leo_Deep-Weel-Pump-AJDm-554-HA-0621135844.jpg', 1, 0, 1, ''),
(45, 8, 'leo_Booster-Pump-0621140807.jpg', 1, 1, 1, ''),
(46, 8, 'leo_Booster-Pump-0621140812.jpg', 1, 0, 1, ''),
(48, 20, 'leo_Submersible-Borehole-Pump-XR-0621143840.jpg', 1, 1, 1, ''),
(49, 21, 'leo_Garden-Submersible-Pump-XKS-0621150657.jpg', 1, 1, 1, ''),
(50, 25, 'leo_Garden-Submersible-Pump-XRS-0703093303.jpg', 1, 1, 1, 'Submersible Borehold Pump'),
(54, 26, 'leo_Submersible-Borehole-Pump-4XR-2-0703110525.jpg', 1, 1, 1, ''),
(57, 27, 'leo_Submersible-Borehole-Pump-3XR-2-5-0703111645.jpg', 1, 1, 1, ''),
(58, 28, 'leo_Submersible-Borehole-Pump-4XR-6-0703134046.jpg', 1, 1, 1, ''),
(59, 29, 'leo_Submersible-Borehole-Pump-4XR-8-0703135610.jpg', 1, 1, 1, ''),
(60, 32, 'leo_Submersible-Borehole-Pump-4XRS-2-0703141647.PNG', 1, 1, 1, ''),
(61, 33, 'leo_Submersible-Borehole-Pump-4XRS-3-0703143414.PNG', 1, 1, 1, ''),
(62, 31, 'leo_Submersible-Borehole-Pump-4XR-2-0703151213.jpg', 1, 1, 1, ''),
(63, 22, 'leo_Foot-Valve-0704084034.PNG', 1, 1, 1, ''),
(64, 23, 'leo_Capacitor-0704084050.PNG', 1, 1, 1, ''),
(65, 24, 'leo_Float-Sweet-0704084102.PNG', 1, 1, 1, ''),
(66, 34, 'leo_Jet-Pump-AJm75-A-0704160246.PNG', 1, 1, 1, ''),
(67, 34, 'leo_Jet-Pump-AJm75-A-0704160253.PNG', 1, 0, 1, ''),
(68, 35, 'leo_Jet-Pump-for-Deep-Well-AJDm-H-A-0704162027.PNG', 1, 1, 1, ''),
(69, 35, 'leo_Jet-Pump-for-Deep-Well-AJDm-H-A-0704162036.PNG', 1, 0, 1, ''),
(71, 36, 'leo_Tank-0707110246.PNG', 1, 1, 1, 'Model 2VT, 24VT'),
(72, 36, 'leo_Tank-0707110258.PNG', 1, 0, 1, 'Model 24CT'),
(73, 37, 'leo_Branch-3-Way5-Way-0707111246.PNG', 1, 1, 1, ''),
(74, 38, 'leo_Pessure-Switch-0707112738.PNG', 1, 1, 1, ''),
(75, 39, 'leo_Pressuer-Gauge-0707133331.PNG', 1, 1, 1, ''),
(78, 40, 'leo_Electromagnetic-Switch-0707135334.PNG', 1, 1, 1, ''),
(79, 41, 'leo_Submersible-Pump-QDX-3-0707142306.PNG', 1, 1, 1, ''),
(80, 42, 'leo_Submersible-Pump-QDX15-10-0707143259.PNG', 1, 1, 1, ''),
(81, 43, 'leo_Stainless-Steel-Submersible-Pump-7-0707150122.PNG', 1, 1, 1, ''),
(84, 44, 'leo_XQS-Stainless-Steel-72-85-0724094651.jpg', 1, 1, 1, ''),
(86, 45, 'leo_XQS-Stainless-Steel-45-27-0724095700.PNG', 1, 1, 1, ''),
(87, 46, 'leo_Stainless-Steel-XQS15-30-0724101003.PNG', 1, 1, 1, ''),
(88, 47, 'leo_Stainless-Steel-XQS-15-29-0724101625.PNG', 1, 1, 1, ''),
(89, 49, 'leo_Sewage-Pump-XSP-8-7-0802152916.PNG', 1, 1, 1, ''),
(90, 53, 'leo_Sewage-Pump-XSP-XSP-9-75-0802154408.PNG', 1, 1, 1, ''),
(91, 48, 'leo_XQS-Stainless-Steel-SP-XQS-15-20-0802155537.PNG', 1, 1, 1, ''),
(92, 48, 'leo_XQS-Stainless-Steel-SP-XQS-15-20-0802155538.PNG', 1, 0, 1, ''),
(93, 50, 'leo_Sewage-Pump-XSP-12-85-0802155648.PNG', 1, 1, 1, ''),
(94, 51, 'leo_Sewage-Pump-XSP-20-9-0802155807.PNG', 1, 1, 1, ''),
(95, 52, 'leo_Sewage-Pump-XSP-42-17-0802155903.PNG', 1, 1, 1, ''),
(96, 54, 'leo_Sewage-Pump-XSP-9-75-0802160455.PNG', 1, 1, 1, ''),
(97, 55, 'leo_Sewage-Pump-XSP-14-7-0802160620.PNG', 1, 1, 1, ''),
(98, 56, 'leo_Sewage-Pump-XSP-18-12-0802160927.PNG', 1, 1, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_info`
--

CREATE TABLE `product_info` (
  `ID` int(6) NOT NULL,
  `id_product` int(6) DEFAULT NULL,
  `info_for` varchar(20) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `desc` text,
  `sort` smallint(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product_info`
--

INSERT INTO `product_info` (`ID`, `id_product`, `info_for`, `image`, `desc`, `sort`) VALUES
(2, 1, 'dimension', 'AKSm126-Pump_dimension-0607190756.jpg', '0', 2),
(3, 1, 'hpc', 'AKSm126-Pump_hpc-0607191558.PNG', '0', 3),
(4, 1, 'material', 'AKSm126-Pump_material-0607192556.PNG', '', 4),
(5, 1, 'package', 'AKSm126-Pump_package-0608192326.jpg', '', 1),
(7, 1, 'technical_data', 'AKSm126-Pump_technical_data-0608200345.jpg', '', 1),
(8, 3, 'technical_data', 'AJm-30-S-A5_technical_data-0608221320.jpg', '', 1),
(9, 3, 'dimension', 'AJm-30-S-A5_dimension-0608221927.jpg', '', 1),
(10, 3, 'hpc', 'AJm-30-S-A5_hpc-0608223200.jpg', '', 1),
(11, 3, 'package', 'AJm-30-S-A5_package-0608232630.jpg', '', 1),
(12, 3, 'material', 'AJm-30-S-A5_material-0608233446.jpg', '', 1),
(13, 4, 'technical_data', 'AJm-75_technical_data-0609175109.jpg', '', 1),
(14, 4, 'dimension', 'AJm-75_dimension-0609175137.jpg', '', 1),
(15, 8, 'technical_data', 'HLB-HLBK_technical_data-0620012212.jpg', '', 1),
(16, 8, 'dimension', 'HLB-HLBK_dimension-0620012301.jpg', '', 1),
(17, 8, 'material', 'HLB-HLBK_material-0620012321.jpg', '', 1),
(18, 9, 'technical_data', 'OH-OH1-OH2_technical_data-0620014548.jpg', 'rentang kinerja\nOH-F\nArus Q: sampai ~ 2400m 3 / h\nTekanan P: ~ 2.5MPa\nKepala H: ~ 250 m\nSuhu T: -80 ~ + 170 ?\n\nOH-C\nArus Q: sampai ~ 2400m 3 / h\nTekanan P: ~ 0.5MPa\nKepala H: ~ 250 m\nSuhu T: -80 ~ + 450 ?\nfitur struktural\n', 1),
(19, 9, 'hpc', 'OH-OH1-OH2_hpc-0620014618.jpg', '', 1),
(20, 10, 'technical_data', 'HA-HE_technical_data-0620014910.jpg', 'rentang kinerja\nArus Q: sampai 2000m 3 / h\nTekanan P: sampai 5.0MPa\nKepala H: sampai 250 m\nSuhu T: -80 ~ + 450 ?\nfitur struktural ', 1),
(21, 10, 'hpc', 'HA-HE_hpc-0620014953.jpg', '', 1),
(22, 11, 'technical_data', 'Pompa-Kimia-Standar_technical_data-0620015133.jpg', 'rentang kinerja\nArus Q: sampai 2000m 3 / h\nTekanan P: sampai 2.5MPa\nKepala H: sampai 160m\nSuhu T: -80 ~ + 300 ?\nfitur struktural', 1),
(23, 11, 'hpc', 'Pompa-Kimia-Standar_hpc-0620015231.jpg', '', 1),
(24, 12, 'technical_data', 'Pompa-Split-Aksial-Horizontal-BBL_technical_data-0620022112.jpg', 'parameter kinerja\nArus Q: sampai 4000m 3 / h\nTekanan P: sampai 5.0 ~ 15Mpa\nKepala H: sampai 440m\nSuhu T: -40 ~ + 200 ? ', 1),
(25, 12, 'hpc', 'Pompa-Split-Aksial-Horizontal-BBL_hpc-0620022147.jpg', '', 1),
(26, 13, 'technical_data', 'Heavy-Industry-Petrochemical-Process-Pump-BB2_technical_data-0620024429.jpg', 'Parameter kinerja\nArus Q: sampai ~ 4500M 3 / h\nTekanan P: 5,10,15MPa\nKepala H: ~ 660M\nSuhu T: -80 ~ + 450 ? ', 1),
(27, 13, 'material', 'Heavy-Industry-Petrochemical-Process-Pump-BB2_material-0620024551.jpg', '', 1),
(28, 13, 'hpc', 'Heavy-Industry-Petrochemical-Process-Pump-BB2_hpc-0620024610.jpg', '', 1),
(29, 14, 'technical_data', 'Axial-split-horizontal-multi-stage-centrifugal-pump-BB3_technical_data-0620024848.jpg', 'parameter kinerja\nArus Q: hingga 10 ~ 1400m 3 / h\nTekanan P: sampai 20.0MPa\nKepala H: sampai 2000m\nSuhu T: -60 ~ + 200 ?', 1),
(30, 14, 'hpc', 'Axial-split-horizontal-multi-stage-centrifugal-pump-BB3_hpc-0620025018.jpg', '', 1),
(31, 15, 'technical_data', 'Horizontal-single-shell-multi-stage-pump-BB4_technical_data-0620025258.jpg', 'parameter kinerja\nArus Q: hingga 3 ~ 900m 3 / h\nTekanan P: sampai 25.0MPa\nKepala H: sampai 2000m\nSuhu T: -60 ~ + 250 ? ', 1),
(32, 15, 'hpc', 'Horizontal-single-shell-multi-stage-pump-BB4_hpc-0620025313.jpg', '', 1),
(33, 16, 'technical_data', 'Horizontal-double-shell-multi-stage-pump-BB5_technical_data-0620025726.jpg', 'parameter kinerja\nArus Q: hingga 3 ~ 1000m 3 / h\nTekanan P: sampai 42.OMPa\nKepala H: sampai 2500m\nSuhu T: -80 ~ + 450 ?', 1),
(34, 16, 'hpc', 'Horizontal-double-shell-multi-stage-pump-BB5_hpc-0620025808.jpg', '', 1),
(35, 17, 'technical_data', 'Vertical-Suspension-Long-Shaft-Pump-VS4_technical_data-0620030728.jpg', 'parameter kinerja\nArus Q: hingga 2 ~ 400m 3 / h\nTekanan P: sampai 2.5MPa\nKepala H: sampai 4 ~ 100m\nSuhu T: -20 ~ + 120 ? ', 1),
(36, 17, 'hpc', 'Vertical-Suspension-Long-Shaft-Pump-VS4_hpc-0620030858.jpg', '', 1),
(37, 18, 'technical_data', 'Vertical-multi-stage-suspension-centrifugal-pump-VS1-VS6_technical_data-0620031343.jpg', 'parameter kinerja\nArus Q: sampai 2000m 3 / h\nTekanan P: sampai 15Mpa\nKepala H: sampai 1000m\nSuhu T: -80 ~ + 250 ? ', 1),
(38, 18, 'material', 'Vertical-multi-stage-suspension-centrifugal-pump-VS1-VS6_material-0620031420.jpg', '', 1),
(39, 18, 'hpc', 'Vertical-multi-stage-suspension-centrifugal-pump-VS1-VS6_hpc-0620031431.jpg', '', 1),
(40, 19, 'technical_data', 'Mixed-flow-pump_technical_data-0620033259.jpg', 'parameter kinerja\nArus Q: sampai 6000m 3 / h\nTekanan P: sampai 0.6MPa\nKepala H: sampai 30m\nSuhu T: -2 ??~ + 155 ? ', 1),
(41, 19, 'hpc', 'Mixed-flow-pump_hpc-0620033313.jpg', '', 1),
(42, 20, 'technical_data', 'Axial-flow-pump_technical_data-0620033624.jpg', '', 1),
(43, 20, 'hpc', 'Axial-flow-pump_hpc-0620033741.jpg', '', 1),
(44, 2, 'technical_data', 'AKSm-350-A_technical_data-0621094505.jpg', '', 1),
(45, 2, 'dimension', 'AKSm-350-A_dimension-0621094523.jpg', '', 1),
(46, 2, 'hpc', 'AKSm-350-A_hpc-0621094539.jpg', '', 1),
(47, 2, 'material', 'AKSm-350-A_material-0621094553.jpg', '', 1),
(48, 2, 'package', 'AKSm-350-A_package-0621094605.jpg', '', 1),
(49, 4, 'hpc', 'Stainless-Steel-Jet-Pump-AJm-75_hpc-0621101519.jpg', '', 1),
(50, 4, 'material', 'Stainless-Steel-Jet-Pump-AJm-75_material-0621101532.jpg', '', 1),
(51, 4, 'package', 'Stainless-Steel-Jet-Pump-AJm-75_package-0621101552.jpg', '', 1),
(52, 7, 'technical_data', 'Jet-Pump-AJm-75_technical_data-0621105008.jpg', '', 1),
(53, 7, 'dimension', 'Jet-Pump-AJm-75_dimension-0621105015.jpg', '', 1),
(54, 7, 'hpc', 'Jet-Pump-AJm-75_hpc-0621105023.jpg', '', 1),
(55, 7, 'material', 'Jet-Pump-AJm-75_material-0621105033.jpg', '', 1),
(56, 7, 'package', 'Jet-Pump-AJm-75_package-0621105041.jpg', '', 1),
(57, 5, 'technical_data', 'Deep-Weel-Pump-AJDm-554-HA_technical_data-0621135854.jpg', '', 1),
(58, 5, 'dimension', 'Deep-Weel-Pump-AJDm-554-HA_dimension-0621135902.jpg', '', 1),
(59, 5, 'material', 'Deep-Weel-Pump-AJDm-554-HA_material-0621135915.jpg', '', 1),
(60, 5, 'package', 'Deep-Weel-Pump-AJDm-554-HA_package-0621140010.jpg', '', 1),
(61, 8, 'hpc', 'Booster-Pump_hpc-0621140934.jpg', '', 1),
(62, 8, 'package', 'Booster-Pump_package-0621141037.jpg', '', 1),
(63, 20, 'dimension', 'Submersible-Borehole-Pump-XR_dimension-0621143932.jpg', '', 1),
(64, 20, 'material', 'Submersible-Borehole-Pump-XR_material-0621143950.jpg', '', 1),
(65, 21, 'technical_data', 'Garden-Submersible-Pump-XKS_technical_data-0621150911.jpg', '', 1),
(66, 21, 'dimension', 'Garden-Submersible-Pump-XKS_dimension-0621150927.jpg', '', 1),
(67, 25, 'technical_data', 'Garden-Submersible-Pump-XRS_technical_data-0703093151.jpg', '', 1),
(68, 25, 'dimension', 'Garden-Submersible-Pump-XRS_dimension-0703093159.jpg', '', 1),
(69, 26, 'technical_data', 'Submersible-Borehole-Pump-4XR-2_technical_data-0703110933.PNG', '', 1),
(70, 26, 'dimension', 'Submersible-Borehole-Pump-4XR-2_dimension-0703110948.PNG', '', 1),
(71, 26, 'hpc', 'Submersible-Borehole-Pump-4XR-2_hpc-0703110957.PNG', '', 1),
(72, 26, 'material', 'Submersible-Borehole-Pump-4XR-2_material-0703111050.jpg', '', 1),
(73, 27, 'technical_data', 'Submersible-Borehole-Pump-3XR-2.PNG', '', 1),
(74, 27, 'hpc', 'Submersible-Borehole-Pump-3XR-2.5_hpc-0703115208.PNG', '', 1),
(75, 28, 'technical_data', 'Submersible-Borehole-Pump-4XR-6_technical_data-0703134456.PNG', '', 1),
(76, 28, 'dimension', 'Submersible-Borehole-Pump-4XR-6_dimension-0703134505.PNG', '', 1),
(77, 28, 'hpc', 'Submersible-Borehole-Pump-4XR-6_hpc-0703134602.PNG', '', 1),
(78, 29, 'technical_data', 'Submersible-Borehole-Pump-4XR-8_technical_data-0703135626.PNG', '', 1),
(79, 29, 'dimension', 'Submersible-Borehole-Pump-4XR-8_dimension-0703135635.PNG', '', 1),
(80, 29, 'hpc', 'Submersible-Borehole-Pump-4XR-8_hpc-0703135645.PNG', '', 1),
(81, 32, 'technical_data', 'Submersible-Borehole-Pump-4XRS-2_technical_data-0703141828.PNG', '', 1),
(82, 32, 'dimension', 'Submersible-Borehole-Pump-4XRS-2_dimension-0703141936.PNG', '', 1),
(83, 32, 'hpc', 'Submersible-Borehole-Pump-4XRS-2_hpc-0703143228.PNG', '', 1),
(84, 32, 'material', 'Submersible-Borehole-Pump-4XRS-2_material-0703143312.PNG', '', 1),
(85, 33, 'technical_data', 'Submersible-Borehole-Pump-4XRS-3_technical_data-0703144503.PNG', '', 1),
(86, 33, 'dimension', 'Submersible-Borehole-Pump-4XRS-3_dimension-0703144517.PNG', '', 1),
(87, 33, 'hpc', 'Submersible-Borehole-Pump-4XRS-3_hpc-0703144527.PNG', '', 1),
(88, 33, 'material', 'Submersible-Borehole-Pump-4XRS-3_material-0703150945.PNG', '', 1),
(89, 31, 'material', 'Submersible-Borehole-Pump-4XR-2_material-0703151228.jpg', '', 1),
(90, 31, 'hpc', 'Submersible-Borehole-Pump-4XR-2_hpc-0703151603.PNG', '', 1),
(91, 31, 'technical_data', 'Submersible-Borehole-Pump-4XR-2_technical_data-0703151613.PNG', '', 1),
(92, 31, 'dimension', 'Submersible-Borehole-Pump-4XR-2_dimension-0703151624.PNG', '', 1),
(93, 21, 'hpc', 'Garden-Submersible-Pump-XKS_hpc-0703152526.PNG', '', 1),
(94, 21, 'material', 'Garden-Submersible-Pump-XKS_material-0703152537.PNG', '', 1),
(95, 21, 'package', 'Garden-Submersible-Pump-XKS_package-0703152545.PNG', '', 1),
(96, 34, 'technical_data', 'Jet-Pump-AJm75-A_technical_data-0704160305.PNG', '', 1),
(97, 34, 'dimension', 'Jet-Pump-AJm75-A_dimension-0704160355.PNG', '', 1),
(98, 34, 'hpc', 'Jet-Pump-AJm75-A_hpc-0704160409.PNG', '', 1),
(99, 34, 'material', 'Jet-Pump-AJm75-A_material-0704160425.PNG', '', 1),
(100, 34, 'package', 'Jet-Pump-AJm75-A_package-0704160444.PNG', '', 1),
(101, 35, 'technical_data', 'Jet-Pump-for-Deep-Well-AJDm-H-A_technical_data-0704162048.PNG', '', 1),
(102, 35, 'dimension', 'Jet-Pump-for-Deep-Well-AJDm-H-A_dimension-0704162125.PNG', '', 1),
(103, 35, 'material', 'Jet-Pump-for-Deep-Well-AJDm-H-A_material-0704162134.PNG', '', 1),
(104, 35, 'package', 'Jet-Pump-for-Deep-Well-AJDm-H-A_package-0704162141.PNG', '', 1),
(105, 41, 'technical_data', 'Submersible-Pump-QDX-3_technical_data-0707142330.PNG', '', 1),
(106, 41, 'dimension', 'Submersible-Pump-QDX-3_dimension-0707142414.PNG', '', 1),
(107, 41, 'hpc', 'Submersible-Pump-QDX-3_hpc-0707142424.PNG', '', 1),
(108, 41, 'material', 'Submersible-Pump-QDX-3_material-0707142438.PNG', '', 1),
(109, 41, 'package', 'Submersible-Pump-QDX-3_package-0707142452.PNG', '', 1),
(110, 42, 'technical_data', 'Submersible-Pump-QDX15-10_technical_data-0707143312.PNG', '', 1),
(111, 42, 'dimension', 'Submersible-Pump-QDX15-10_dimension-0707143339.PNG', '', 1),
(112, 42, 'hpc', 'Submersible-Pump-QDX15-10_hpc-0707143408.PNG', '', 1),
(113, 42, 'material', 'Submersible-Pump-QDX15-10_material-0707143437.PNG', '', 1),
(114, 42, 'package', 'Submersible-Pump-QDX15-10_package-0707143449.PNG', '', 1),
(115, 43, 'technical_data', 'Stainless-Steel-Submersible-Pump-7_technical_data-0707150228.PNG', '', 1),
(116, 43, 'dimension', 'Stainless-Steel-Submersible-Pump-7_dimension-0707150242.PNG', '', 1),
(117, 43, 'hpc', 'Stainless-Steel-Submersible-Pump-7_hpc-0707150254.PNG', '', 1),
(118, 43, 'material', 'Stainless-Steel-Submersible-Pump-7_material-0707150305.PNG', '', 1),
(119, 44, 'technical_data', 'XQS-Stainless-Steel-72-85_technical_data-0724094848.PNG', '', 1),
(120, 44, 'dimension', 'XQS-Stainless-Steel-72-85_dimension-0724094927.PNG', '', 1),
(121, 44, 'hpc', 'XQS-Stainless-Steel-72-85_hpc-0724095003.PNG', '', 1),
(122, 44, 'material', 'XQS-Stainless-Steel-72-85_material-0724095040.PNG', '', 1),
(123, 45, 'technical_data', 'XQS-Stainless-Steel-45-27_technical_data-0724095730.PNG', '', 1),
(124, 45, 'dimension', 'XQS-Stainless-Steel-45-27_dimension-0724095756.PNG', '', 1),
(125, 45, 'hpc', 'XQS-Stainless-Steel-45-27_hpc-0724095826.PNG', '', 1),
(126, 45, 'material', 'XQS-Stainless-Steel-45-27_material-0724095859.PNG', '', 1),
(127, 46, 'technical_data', 'Stainless-Steel-XQS15-30_technical_data-0724101013.PNG', '', 1),
(128, 46, 'dimension', 'Stainless-Steel-XQS15-30_dimension-0724101021.PNG', '', 1),
(129, 46, 'hpc', 'Stainless-Steel-XQS15-30_hpc-0724101029.PNG', '', 1),
(130, 46, 'material', 'Stainless-Steel-XQS15-30_material-0724101041.PNG', '', 1),
(131, 47, 'technical_data', 'Stainless-Steel-XQS-15-29_technical_data-0724101641.PNG', '', 1),
(132, 47, 'dimension', 'Stainless-Steel-XQS-15-29_dimension-0724101703.PNG', '', 1),
(133, 47, 'hpc', 'Stainless-Steel-XQS-15-29_hpc-0724101713.PNG', '', 1),
(134, 47, 'material', 'Stainless-Steel-XQS-15-29_material-0724101737.PNG', '', 1),
(135, 49, 'technical_data', 'Sewage-Pump-XSP-8-7_technical_data-0802152925.PNG', '', 1),
(136, 49, 'dimension', 'Sewage-Pump-XSP-8-7_dimension-0802152933.PNG', '', 1),
(137, 49, 'hpc', 'Sewage-Pump-XSP-8-7_hpc-0802152942.PNG', '', 1),
(138, 49, 'material', 'Sewage-Pump-XSP-8-7_material-0802152952.PNG', '', 1),
(139, 53, 'technical_data', 'Sewage-Pump-XSP-XSP-9-75_technical_data-0802154417.PNG', '', 1),
(140, 53, 'dimension', 'Sewage-Pump-XSP-XSP-9-75_dimension-0802154428.PNG', '', 1),
(141, 53, 'hpc', 'Sewage-Pump-XSP-XSP-9-75_hpc-0802154439.PNG', '', 1),
(142, 53, 'material', 'Sewage-Pump-XSP-XSP-9-75_material-0802154449.PNG', '', 1),
(143, 48, 'technical_data', 'XQS-Stainless-Steel-SP-XQS-15-20_technical_data-0802155550.PNG', '', 1),
(144, 48, 'dimension', 'XQS-Stainless-Steel-SP-XQS-15-20_dimension-0802155559.PNG', '', 1),
(145, 48, 'hpc', 'XQS-Stainless-Steel-SP-XQS-15-20_hpc-0802155606.PNG', '', 1),
(146, 48, 'material', 'XQS-Stainless-Steel-SP-XQS-15-20_material-0802155617.PNG', '', 1),
(147, 50, 'technical_data', 'Sewage-Pump-XSP-12-85_technical_data-0802155700.PNG', '', 1),
(148, 50, 'dimension', 'Sewage-Pump-XSP-12-85_dimension-0802155709.PNG', '', 1),
(149, 50, 'hpc', 'Sewage-Pump-XSP-12-85_hpc-0802155736.PNG', '', 1),
(150, 50, 'material', 'Sewage-Pump-XSP-12-85_material-0802155749.PNG', '', 1),
(151, 51, 'technical_data', 'Sewage-Pump-XSP-20-9_technical_data-0802155816.PNG', '', 1),
(152, 51, 'dimension', 'Sewage-Pump-XSP-20-9_dimension-0802155827.PNG', '', 1),
(153, 51, 'hpc', 'Sewage-Pump-XSP-20-9_hpc-0802155834.PNG', '', 1),
(154, 51, 'material', 'Sewage-Pump-XSP-20-9_material-0802155843.PNG', '', 1),
(155, 52, 'technical_data', 'Sewage-Pump-XSP-42-17_technical_data-0802155913.PNG', '', 1),
(156, 52, 'hpc', 'Sewage-Pump-XSP-42-17_hpc-0802155944.PNG', '', 1),
(157, 52, 'material', 'Sewage-Pump-XSP-42-17_material-0802155959.PNG', '', 1),
(158, 54, 'technical_data', 'Sewage-Pump-XSP-9-75_technical_data-0802160526.PNG', '', 1),
(159, 54, 'dimension', 'Sewage-Pump-XSP-9-75_dimension-0802160541.PNG', '', 1),
(160, 54, 'hpc', 'Sewage-Pump-XSP-9-75_hpc-0802160547.PNG', '', 1),
(161, 54, 'material', 'Sewage-Pump-XSP-9-75_material-0802160558.PNG', '', 1),
(162, 55, 'technical_data', 'Sewage-Pump-XSP-14-7_technical_data-0802160705.PNG', '', 1),
(163, 55, 'dimension', 'Sewage-Pump-XSP-14-7_dimension-0802160712.PNG', '', 1),
(164, 55, 'hpc', 'Sewage-Pump-XSP-14-7_hpc-0802160721.PNG', '', 1),
(165, 55, 'material', 'Sewage-Pump-XSP-14-7_material-0802160730.PNG', '', 1),
(166, 56, 'technical_data', 'Sewage-Pump-XSP-18-12_technical_data-0802160940.PNG', '', 1),
(167, 56, 'dimension', 'Sewage-Pump-XSP-18-12_dimension-0802161002.PNG', '', 1),
(168, 56, 'hpc', 'Sewage-Pump-XSP-18-12_hpc-0802161012.PNG', '', 1),
(169, 56, 'material', 'Sewage-Pump-XSP-18-12_material-0802161024.PNG', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `password` char(41) CHARACTER SET latin1 DEFAULT NULL,
  `since` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID`, `id_group`, `name`, `password`, `since`) VALUES
(1, 1, 'Admin', '1f0ba1ba0d48debf497daf9ea4f31892', '2017-05-01'),
(2, 2, 'Admin', '6116afedcb0bc31083935c1c262ff4c9', '2018-10-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usergroupdtlmst`
--

CREATE TABLE `usergroupdtlmst` (
  `UserGroupID` char(10) CHARACTER SET latin1 NOT NULL,
  `MenuID` char(10) CHARACTER SET latin1 NOT NULL,
  `ReadFlg` tinyint(1) NOT NULL,
  `ModifyFlg` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `usergroupdtlmst`
--

INSERT INTO `usergroupdtlmst` (`UserGroupID`, `MenuID`, `ReadFlg`, `ModifyFlg`) VALUES
('3', '25', 1, 0),
('3', '22', 1, 0),
('3', '21', 1, 0),
('3', '20', 1, 0),
('3', '19', 1, 0),
('3', '18', 1, 0),
('3', '17', 1, 0),
('3', '16', 1, 0),
('3', '15', 1, 0),
('3', '14', 1, 0),
('3', '13', 1, 0),
('3', '11', 1, 0),
('3', '10', 1, 0),
('3', '9', 1, 0),
('3', '8', 1, 0),
('3', '6', 1, 0),
('3', '5', 1, 0),
('3', '4', 0, 0),
('3', '3', 0, 0),
('3', '2', 0, 0),
('3', '1', 1, 0),
('2', '28', 1, 0),
('2', '27', 1, 0),
('2', '25', 1, 0),
('2', '22', 1, 0),
('2', '21', 1, 0),
('2', '20', 1, 0),
('2', '19', 1, 0),
('2', '18', 1, 0),
('2', '17', 1, 0),
('2', '16', 1, 0),
('2', '15', 1, 0),
('2', '14', 1, 0),
('2', '13', 1, 0),
('2', '11', 1, 0),
('2', '10', 1, 0),
('2', '9', 1, 0),
('2', '8', 1, 0),
('2', '6', 1, 0),
('2', '5', 1, 0),
('2', '4', 1, 0),
('2', '3', 1, 0),
('2', '2', 1, 0),
('2', '1', 1, 0),
('1', '28', 1, 0),
('1', '27', 1, 0),
('1', '25', 1, 0),
('1', '22', 1, 0),
('1', '21', 1, 0),
('1', '20', 1, 0),
('1', '19', 1, 0),
('1', '18', 1, 0),
('1', '17', 1, 0),
('1', '16', 1, 0),
('1', '15', 1, 0),
('1', '14', 1, 0),
('1', '13', 1, 0),
('1', '11', 1, 0),
('1', '10', 1, 0),
('1', '9', 1, 0),
('1', '8', 1, 0),
('1', '6', 1, 0),
('1', '5', 1, 0),
('1', '4', 1, 0),
('1', '3', 1, 0),
('1', '2', 1, 0),
('1', '1', 1, 0),
('3', '27', 1, 0),
('3', '28', 0, 0),
('4', '1', 1, 0),
('4', '2', 0, 0),
('4', '3', 0, 0),
('4', '4', 0, 0),
('4', '5', 1, 0),
('4', '6', 1, 0),
('4', '8', 1, 0),
('4', '9', 1, 0),
('4', '10', 1, 0),
('4', '11', 1, 0),
('4', '13', 1, 0),
('4', '14', 1, 0),
('4', '15', 0, 0),
('4', '16', 1, 0),
('4', '17', 1, 0),
('4', '18', 1, 0),
('4', '19', 1, 0),
('4', '20', 1, 0),
('4', '21', 1, 0),
('4', '22', 1, 0),
('4', '25', 1, 0),
('4', '27', 1, 0),
('4', '28', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usergroupmst`
--

CREATE TABLE `usergroupmst` (
  `UserGroupID` int(11) NOT NULL,
  `UserGroupName` char(25) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `usergroupmst`
--

INSERT INTO `usergroupmst` (`UserGroupID`, `UserGroupName`) VALUES
(1, 'Super Admin'),
(4, 'Accounting'),
(3, 'Front Desk'),
(2, 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermenu`
--

CREATE TABLE `usermenu` (
  `id` int(11) NOT NULL,
  `id_user` smallint(6) DEFAULT NULL,
  `userlevel` smallint(6) DEFAULT NULL,
  `menuid` int(11) DEFAULT NULL,
  `akses` smallint(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usermenu`
--

INSERT INTO `usermenu` (`id`, `id_user`, `userlevel`, `menuid`, `akses`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 1, 1, 5, 1),
(6, 1, 1, 6, 1),
(7, 1, 1, 7, 1),
(8, 1, 1, 8, 1),
(9, 1, 1, 9, 1),
(10, 1, 1, 10, 1),
(11, 1, 1, 11, 1),
(12, 1, 1, 12, 1),
(13, 1, 1, 13, 1),
(14, 1, 1, 14, 1),
(15, 1, 1, 15, 1),
(16, 1, 1, 16, 1),
(17, 1, 1, 17, 1),
(18, 1, 1, 18, 1),
(154, 7, 1, 22, 1),
(153, 7, 1, 21, 1),
(152, 7, 1, 1, 1),
(151, 7, 1, 2, 1),
(150, 7, 1, 3, 1),
(149, 7, 1, 4, 1),
(148, 7, 1, 5, 1),
(147, 7, 1, 6, 1),
(146, 7, 1, 7, 1),
(145, 7, 1, 8, 1),
(144, 7, 1, 9, 1),
(143, 7, 1, 10, 1),
(142, 7, 1, 11, 1),
(141, 7, 1, 12, 1),
(140, 7, 1, 13, 1),
(139, 7, 1, 14, 1),
(138, 7, 1, 15, 1),
(137, 7, 1, 16, 1),
(19, 1, 1, 19, 1),
(136, 7, 1, 17, 1),
(20, 1, 1, 20, 1),
(135, 7, 1, 18, 1),
(134, 7, 1, 19, 1),
(133, 7, 1, 20, 1),
(132, 6, 2, 22, 0),
(131, 6, 2, 21, 0),
(130, 6, 2, 1, 0),
(129, 6, 2, 2, 0),
(128, 6, 2, 3, 0),
(127, 6, 2, 4, 0),
(126, 6, 2, 5, 0),
(125, 6, 2, 6, 0),
(124, 6, 2, 7, 0),
(123, 6, 2, 8, 0),
(122, 6, 2, 9, 0),
(121, 6, 2, 10, 0),
(120, 6, 2, 11, 0),
(119, 6, 2, 12, 0),
(118, 6, 2, 13, 0),
(117, 6, 2, 14, 0),
(116, 6, 2, 15, 0),
(115, 6, 2, 16, 0),
(21, 1, 1, 21, 1),
(114, 6, 2, 17, 0),
(113, 6, 2, 18, 0),
(22, 1, 1, 22, 1),
(112, 6, 2, 19, 0),
(111, 6, 2, 20, 0),
(110, 5, 1, 22, 1),
(109, 5, 1, 21, 1),
(108, 5, 1, 1, 1),
(107, 5, 1, 2, 1),
(106, 5, 1, 3, 1),
(105, 5, 1, 4, 1),
(104, 5, 1, 5, 1),
(103, 5, 1, 6, 1),
(102, 5, 1, 7, 1),
(101, 5, 1, 8, 1),
(100, 5, 1, 9, 1),
(99, 5, 1, 10, 1),
(98, 5, 1, 11, 1),
(97, 5, 1, 12, 1),
(96, 5, 1, 13, 1),
(95, 5, 1, 14, 1),
(94, 5, 1, 15, 1),
(93, 5, 1, 16, 1),
(92, 5, 1, 17, 1),
(91, 5, 1, 18, 1),
(90, 5, 1, 19, 1),
(89, 5, 1, 20, 1),
(88, 4, 2, 22, 0),
(87, 4, 2, 21, 0),
(86, 4, 2, 1, 0),
(85, 4, 2, 2, 0),
(84, 4, 2, 3, 0),
(83, 4, 2, 4, 0),
(82, 4, 2, 5, 0),
(81, 4, 2, 6, 0),
(80, 4, 2, 7, 0),
(79, 4, 2, 8, 0),
(78, 4, 2, 9, 0),
(77, 4, 2, 10, 0),
(76, 4, 2, 11, 0),
(75, 4, 2, 12, 0),
(74, 4, 2, 13, 0),
(73, 4, 2, 14, 0),
(72, 4, 2, 15, 0),
(71, 4, 2, 16, 0),
(70, 4, 2, 17, 0),
(69, 4, 2, 18, 0),
(68, 4, 2, 19, 0),
(67, 4, 2, 20, 0),
(66, 3, 2, 22, 0),
(65, 3, 2, 21, 0),
(64, 3, 2, 1, 1),
(63, 3, 2, 2, 1),
(62, 3, 2, 3, 1),
(61, 3, 2, 4, 1),
(60, 3, 2, 5, 1),
(59, 3, 2, 6, 1),
(58, 3, 2, 7, 1),
(57, 3, 2, 8, 1),
(56, 3, 2, 9, 0),
(55, 3, 2, 10, 1),
(54, 3, 2, 11, 0),
(53, 3, 2, 12, 0),
(52, 3, 2, 13, 1),
(51, 3, 2, 14, 1),
(50, 3, 2, 15, 1),
(49, 3, 2, 16, 0),
(48, 3, 2, 17, 1),
(47, 3, 2, 18, 0),
(46, 3, 2, 19, 0),
(45, 3, 2, 20, 0),
(44, 2, 1, 22, 1),
(43, 2, 1, 21, 1),
(42, 2, 1, 1, 0),
(41, 2, 1, 2, 1),
(40, 2, 1, 3, 1),
(39, 2, 1, 4, 1),
(38, 2, 1, 5, 1),
(37, 2, 1, 6, 1),
(36, 2, 1, 7, 1),
(35, 2, 1, 8, 1),
(34, 2, 1, 9, 1),
(33, 2, 1, 10, 1),
(32, 2, 1, 11, 1),
(31, 2, 1, 12, 1),
(30, 2, 1, 13, 1),
(29, 2, 1, 14, 1),
(28, 2, 1, 15, 1),
(27, 2, 1, 16, 1),
(26, 2, 1, 17, 1),
(25, 2, 1, 18, 1),
(24, 2, 1, 19, 1),
(23, 2, 1, 20, 1),
(155, 8, 1, 20, 1),
(156, 8, 1, 19, 1),
(157, 8, 1, 18, 1),
(158, 8, 1, 17, 1),
(159, 8, 1, 16, 1),
(160, 8, 1, 15, 1),
(161, 8, 1, 14, 1),
(162, 8, 1, 13, 1),
(163, 8, 1, 12, 1),
(164, 8, 1, 11, 1),
(165, 8, 1, 10, 1),
(166, 8, 1, 9, 1),
(167, 8, 1, 8, 1),
(168, 8, 1, 7, 1),
(169, 8, 1, 6, 1),
(170, 8, 1, 5, 1),
(171, 8, 1, 4, 1),
(172, 8, 1, 3, 1),
(173, 8, 1, 2, 1),
(174, 8, 1, 1, 1),
(175, 8, 1, 21, 1),
(176, 8, 1, 22, 1),
(177, 7, 2, 20, 0),
(178, 7, 2, 19, 0),
(179, 7, 2, 18, 0),
(180, 7, 2, 17, 0),
(181, 7, 2, 16, 0),
(182, 7, 2, 15, 0),
(183, 7, 2, 14, 0),
(184, 7, 2, 13, 0),
(185, 7, 2, 12, 0),
(186, 7, 2, 11, 0),
(187, 7, 2, 10, 0),
(188, 7, 2, 9, 0),
(189, 7, 2, 8, 0),
(190, 7, 2, 7, 0),
(191, 7, 2, 6, 0),
(192, 7, 2, 5, 0),
(193, 7, 2, 4, 0),
(194, 7, 2, 3, 0),
(195, 7, 2, 2, 0),
(196, 7, 2, 1, 0),
(197, 7, 2, 21, 0),
(198, 7, 2, 22, 0),
(199, 8, 2, 20, 0),
(200, 8, 2, 19, 0),
(201, 8, 2, 18, 0),
(202, 8, 2, 17, 0),
(203, 8, 2, 16, 0),
(204, 8, 2, 15, 0),
(205, 8, 2, 14, 0),
(206, 8, 2, 13, 0),
(207, 8, 2, 12, 0),
(208, 8, 2, 11, 0),
(209, 8, 2, 10, 0),
(210, 8, 2, 9, 0),
(211, 8, 2, 8, 0),
(212, 8, 2, 7, 0),
(213, 8, 2, 6, 0),
(214, 8, 2, 5, 0),
(215, 8, 2, 4, 0),
(216, 8, 2, 3, 0),
(217, 8, 2, 2, 0),
(218, 8, 2, 1, 0),
(219, 8, 2, 21, 0),
(220, 8, 2, 22, 0),
(221, 9, 1, 20, 1),
(222, 9, 1, 19, 1),
(223, 9, 1, 18, 1),
(224, 9, 1, 17, 1),
(225, 9, 1, 16, 1),
(226, 9, 1, 15, 1),
(227, 9, 1, 14, 1),
(228, 9, 1, 13, 1),
(229, 9, 1, 12, 1),
(230, 9, 1, 11, 1),
(231, 9, 1, 10, 1),
(232, 9, 1, 9, 1),
(233, 9, 1, 8, 0),
(234, 9, 1, 7, 1),
(235, 9, 1, 6, 1),
(236, 9, 1, 5, 1),
(237, 9, 1, 4, 1),
(238, 9, 1, 3, 1),
(239, 9, 1, 2, 1),
(240, 9, 1, 1, 1),
(241, 9, 1, 21, 1),
(242, 9, 1, 22, 1),
(243, 10, 1, 20, 1),
(244, 10, 1, 19, 1),
(245, 10, 1, 18, 1),
(246, 10, 1, 17, 1),
(247, 10, 1, 16, 1),
(248, 10, 1, 15, 1),
(249, 10, 1, 14, 1),
(250, 10, 1, 13, 1),
(251, 10, 1, 12, 1),
(252, 10, 1, 11, 1),
(253, 10, 1, 10, 1),
(254, 10, 1, 9, 1),
(255, 10, 1, 8, 1),
(256, 10, 1, 7, 1),
(257, 10, 1, 6, 1),
(258, 10, 1, 5, 1),
(259, 10, 1, 4, 1),
(260, 10, 1, 3, 1),
(261, 10, 1, 2, 1),
(262, 10, 1, 1, 1),
(263, 10, 1, 21, 1),
(264, 10, 1, 22, 1),
(265, 11, 1, 20, 1),
(266, 11, 1, 19, 1),
(267, 11, 1, 18, 1),
(268, 11, 1, 17, 1),
(269, 11, 1, 16, 1),
(270, 11, 1, 15, 1),
(271, 11, 1, 14, 1),
(272, 11, 1, 13, 1),
(273, 11, 1, 12, 1),
(274, 11, 1, 11, 1),
(275, 11, 1, 10, 1),
(276, 11, 1, 9, 1),
(277, 11, 1, 8, 1),
(278, 11, 1, 7, 1),
(279, 11, 1, 6, 1),
(280, 11, 1, 5, 1),
(281, 11, 1, 4, 1),
(282, 11, 1, 3, 1),
(283, 11, 1, 2, 1),
(284, 11, 1, 1, 1),
(285, 11, 1, 21, 1),
(286, 11, 1, 22, 1),
(287, 12, 2, 20, 0),
(288, 12, 2, 19, 0),
(289, 12, 2, 18, 0),
(290, 12, 2, 17, 0),
(291, 12, 2, 16, 0),
(292, 12, 2, 15, 0),
(293, 12, 2, 14, 0),
(294, 12, 2, 13, 0),
(295, 12, 2, 12, 0),
(296, 12, 2, 11, 0),
(297, 12, 2, 10, 0),
(298, 12, 2, 9, 0),
(299, 12, 2, 8, 0),
(300, 12, 2, 7, 0),
(301, 12, 2, 6, 0),
(302, 12, 2, 5, 0),
(303, 12, 2, 4, 0),
(304, 12, 2, 3, 0),
(305, 12, 2, 2, 0),
(306, 12, 2, 1, 0),
(307, 12, 2, 21, 0),
(308, 12, 2, 22, 0),
(309, 12, 2, 20, 0),
(310, 12, 2, 19, 0),
(311, 12, 2, 18, 0),
(312, 12, 2, 17, 0),
(313, 12, 2, 16, 0),
(314, 12, 2, 15, 0),
(315, 12, 2, 14, 0),
(316, 12, 2, 13, 0),
(317, 12, 2, 12, 0),
(318, 12, 2, 11, 0),
(319, 12, 2, 10, 0),
(320, 12, 2, 9, 0),
(321, 12, 2, 8, 1),
(322, 12, 2, 7, 0),
(323, 12, 2, 6, 0),
(324, 12, 2, 5, 0),
(325, 12, 2, 4, 0),
(326, 12, 2, 3, 0),
(327, 12, 2, 2, 0),
(328, 12, 2, 1, 0),
(329, 12, 2, 21, 0),
(330, 12, 2, 22, 0),
(331, 13, 2, 20, 0),
(332, 13, 2, 19, 0),
(333, 13, 2, 18, 0),
(334, 13, 2, 17, 0),
(335, 13, 2, 16, 0),
(336, 13, 2, 15, 0),
(337, 13, 2, 14, 0),
(338, 13, 2, 13, 0),
(339, 13, 2, 12, 0),
(340, 13, 2, 11, 0),
(341, 13, 2, 10, 0),
(342, 13, 2, 9, 0),
(343, 13, 2, 8, 0),
(344, 13, 2, 7, 0),
(345, 13, 2, 6, 0),
(346, 13, 2, 5, 0),
(347, 13, 2, 4, 0),
(348, 13, 2, 3, 0),
(349, 13, 2, 2, 0),
(350, 13, 2, 1, 0),
(351, 13, 2, 21, 0),
(352, 13, 2, 22, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usermst`
--

CREATE TABLE `usermst` (
  `UserID` int(11) NOT NULL,
  `Nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `UserName` char(50) CHARACTER SET latin1 DEFAULT NULL,
  `UserPwd` char(41) CHARACTER SET latin1 DEFAULT NULL,
  `UserGroupID` char(10) CHARACTER SET latin1 DEFAULT NULL,
  `since` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `usermst`
--

INSERT INTO `usermst` (`UserID`, `Nama`, `UserName`, `UserPwd`, `UserGroupID`, `since`) VALUES
(1, 'Administrator', 'Admin', '1f0ba1ba0d48debf497daf9ea4f31892', '1', '0000-00-00'),
(65, 'darman', 'darman', 'f747fb176bee65860ab4ab26e5335ea1', '1', '0000-00-00'),
(68, 'Irfandi Rusdiansyah', 'Irfan', '6116afedcb0bc31083935c1c262ff4c9', '2', '0000-00-00'),
(69, 'Admin Leo', 'Admin', '6116afedcb0bc31083935c1c262ff4c9', '1', '0000-00-00'),
(70, 'Husnul Fikri', 'fikri', '25da7b71866605af524584520892abdf', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `ID` int(11) NOT NULL,
  `name` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`ID`, `name`, `sort`) VALUES
(1, 'Administrator', 1),
(2, 'Front Desk', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group_detail`
--

CREATE TABLE `user_group_detail` (
  `ID` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `read_flg` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `user_group_detail`
--

INSERT INTO `user_group_detail` (`ID`, `id_group`, `id_menu`, `read_flg`) VALUES
(1, 1, 8, 1),
(2, 1, 21, 1),
(3, 1, 19, 1),
(5, 1, 16, 1),
(6, 1, 17, 1),
(7, 1, 18, 1),
(8, 1, 22, 1),
(9, 1, 1, 1),
(10, 1, 5, 1),
(11, 1, 3, 1),
(12, 1, 2, 1),
(24, 2, 2, 0),
(23, 2, 3, 0),
(22, 2, 5, 0),
(21, 2, 1, 0),
(20, 2, 22, 1),
(19, 2, 18, 1),
(18, 2, 17, 1),
(17, 2, 16, 1),
(15, 2, 19, 1),
(14, 2, 21, 1),
(13, 2, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

CREATE TABLE `video` (
  `id` int(10) NOT NULL,
  `video` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`id`, `video`, `nama`) VALUES
(1, '', 'belajar');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bannerID`);

--
-- Indeks untuk tabel `config_global`
--
ALTER TABLE `config_global`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `content_master`
--
ALTER TABLE `content_master`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `email_subscribe`
--
ALTER TABLE `email_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menumst`
--
ALTER TABLE `menumst`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indeks untuk tabel `ms_menu`
--
ALTER TABLE `ms_menu`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ms_product`
--
ALTER TABLE `ms_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `ms_product_category`
--
ALTER TABLE `ms_product_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `usergroupdtlmst`
--
ALTER TABLE `usergroupdtlmst`
  ADD PRIMARY KEY (`UserGroupID`,`MenuID`),
  ADD KEY `UserGroupDtlMst_FKIndex1` (`UserGroupID`),
  ADD KEY `UserGroupDtlMst_FKIndex2` (`MenuID`);

--
-- Indeks untuk tabel `usergroupmst`
--
ALTER TABLE `usergroupmst`
  ADD PRIMARY KEY (`UserGroupID`);

--
-- Indeks untuk tabel `usermenu`
--
ALTER TABLE `usermenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_events` (`id`);

--
-- Indeks untuk tabel `usermst`
--
ALTER TABLE `usermst`
  ADD PRIMARY KEY (`UserID`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserGroupDtlMst_FKIndex1` (`ID`);

--
-- Indeks untuk tabel `user_group_detail`
--
ALTER TABLE `user_group_detail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserGroupDtlMst_FKIndex1` (`id_group`),
  ADD KEY `UserGroupDtlMst_FKIndex2` (`id_menu`);

--
-- Indeks untuk tabel `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `bannerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `config_global`
--
ALTER TABLE `config_global`
  MODIFY `ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `content_master`
--
ALTER TABLE `content_master`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `email_subscribe`
--
ALTER TABLE `email_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `menumst`
--
ALTER TABLE `menumst`
  MODIFY `MenuID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT untuk tabel `ms_menu`
--
ALTER TABLE `ms_menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `ms_product`
--
ALTER TABLE `ms_product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2351;

--
-- AUTO_INCREMENT untuk tabel `ms_product_category`
--
ALTER TABLE `ms_product_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT untuk tabel `product_info`
--
ALTER TABLE `product_info`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `usergroupmst`
--
ALTER TABLE `usergroupmst`
  MODIFY `UserGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `usermenu`
--
ALTER TABLE `usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=353;

--
-- AUTO_INCREMENT untuk tabel `usermst`
--
ALTER TABLE `usermst`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
