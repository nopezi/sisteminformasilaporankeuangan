-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jan 2018 pada 06.41
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kp3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cabang`
--

CREATE TABLE `cabang` (
  `id` int(20) NOT NULL,
  `proxy` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cabang`
--

INSERT INTO `cabang` (`id`, `proxy`, `lokasi`) VALUES
(1, 'Gpro Media', 'Gamping'),
(2, 'Cia Media', 'Sleman dan sekitarnya'),
(3, 'Muvon Multimedia', 'Banguntapan'),
(4, 'Kahyangan Multimedia 	', 'Bantul'),
(5, 'Akbar Multimedia', 'Jl. Babarsari Blok 16 No.1A, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281'),
(7, 'Sewa Proyektor Murah Jogja (SPMJ)', 'Jogja Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnalpembelian`
--

CREATE TABLE `jurnalpembelian` (
  `id` int(11) NOT NULL,
  `tgl_pembelian` varchar(20) NOT NULL,
  `no_akun` int(4) NOT NULL,
  `nama_akun` varchar(40) NOT NULL,
  `saldo` int(7) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnalpembelian`
--

INSERT INTO `jurnalpembelian` (`id`, `tgl_pembelian`, `no_akun`, `nama_akun`, `saldo`, `jenis`) VALUES
(7, '31 January 2017', 7, 'edi', 300000, 'Debit'),
(13, '14 January 2017', 9, 'dika', 43252, 'Debit'),
(26, '12 January 2017', 2141, 'asdfa', 224, 'Debit'),
(27, '17 January 2017', 10, 'diding', 120000, 'Kredit'),
(28, '19 January 2017', 11, 'eko', 120029, 'Debit'),
(29, '27 January 2017', 12, 'sigit', 221000, 'Kredit'),
(30, '15 February 2017', 13, 'ryan', 324222, 'Kredit'),
(31, '17 January 2017', 1, 'alfat', 122000, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnalumum`
--

CREATE TABLE `jurnalumum` (
  `id` int(11) NOT NULL,
  `tgl_pembelian` varchar(20) NOT NULL,
  `jurnal` varchar(20) NOT NULL,
  `akun_debit` varchar(20) NOT NULL,
  `total_debit` int(10) NOT NULL,
  `akun_kredit` varchar(20) NOT NULL,
  `total_kredit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnalumum`
--

INSERT INTO `jurnalumum` (`id`, `tgl_pembelian`, `jurnal`, `akun_debit`, `total_debit`, `akun_kredit`, `total_kredit`) VALUES
(4, '19 January 2017', 'Pembelian', 'eko', 120029, 'KAS', 120029),
(5, '27 January 2017', 'Pembelian', 'KAS', 221000, 'sigit', 221000),
(6, '15 February 2017', 'Pembelian', 'KAS', 324222, 'ryan', 324222),
(7, '18 January 2017', 'Penjualan', 'dila', 420222, 'KAS', 420222),
(8, '10 January 2017', 'Penggajian', 'KAS', 203399, 'deden', 203399),
(9, '04 January 2017', 'Penerimaan', 'KAS', 233122, 'rahmat', 233122),
(13, '12 January 2017', 'Pengeluaran Kas', 'lulud', 123112, 'KAS', 123112),
(14, '16 January 2017', 'Penerimaan Kas', 'aris', 230000, 'KAS', 230000),
(15, '17 January 2017', 'Pembelian', 'KAS', 122000, 'alfat', 122000),
(16, '13 January 2017', 'Penjualan', 'KAS', 212333, 'sinta', 212333),
(17, '08 January 2017', 'Penggajian', 'ica', 122999, 'KAS', 122999),
(18, '09 January 2017', 'Pengeluaran Kas', 'KAS', 120000, 'rista', 120000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_kas`
--

CREATE TABLE `jurnal_kas` (
  `id` int(11) NOT NULL,
  `tgl_penerimaan` varchar(20) NOT NULL,
  `no_akun` int(10) NOT NULL,
  `nama_akun` varchar(40) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_kas`
--

INSERT INTO `jurnal_kas` (`id`, `tgl_penerimaan`, `no_akun`, `nama_akun`, `saldo`, `jenis`) VALUES
(1, '04 January 2017', 1, 'rahmat', 233122, 'Kredit'),
(2, '16 January 2017', 2, 'aris', 230000, 'Debit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_pengeluaran_kas`
--

CREATE TABLE `jurnal_pengeluaran_kas` (
  `id` int(11) NOT NULL,
  `tgl_pengeluaran` varchar(20) NOT NULL,
  `no_akun` int(10) NOT NULL,
  `nama_akun` varchar(40) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_pengeluaran_kas`
--

INSERT INTO `jurnal_pengeluaran_kas` (`id`, `tgl_pengeluaran`, `no_akun`, `nama_akun`, `saldo`, `jenis`) VALUES
(4, '12 January 2017', 1, 'lulud', 123112, 'Debit'),
(5, '09 January 2017', 2, 'rista', 120000, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_penggajian`
--

CREATE TABLE `jurnal_penggajian` (
  `id` int(11) NOT NULL,
  `tgl_penggajian` varchar(20) NOT NULL,
  `no_akun` int(10) NOT NULL,
  `nama_akun` varchar(40) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_penggajian`
--

INSERT INTO `jurnal_penggajian` (`id`, `tgl_penggajian`, `no_akun`, `nama_akun`, `saldo`, `jenis`) VALUES
(1, '10 January 2017', 1, 'deden', 203399, 'Kredit'),
(2, '08 January 2017', 2, 'ica', 122999, 'Debit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_penjualan`
--

CREATE TABLE `jurnal_penjualan` (
  `id` int(11) NOT NULL,
  `tgl_penjualan` varchar(20) NOT NULL,
  `no_akun` int(10) NOT NULL,
  `nama_akun` varchar(40) NOT NULL,
  `saldo` int(10) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_penjualan`
--

INSERT INTO `jurnal_penjualan` (`id`, `tgl_penjualan`, `no_akun`, `nama_akun`, `saldo`, `jenis`) VALUES
(1, '18 January 2017', 1, 'dila', 420222, 'Debit'),
(2, '13 January 2017', 2, 'sinta', 212333, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` int(10) NOT NULL,
  `id_proxy` varchar(200) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(20) NOT NULL,
  `nama_proxy` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `id_proxy`, `tanggal`, `bulan`, `tahun`, `nama_proxy`, `detail`, `jumlah`) VALUES
(1, '1', '26', 'januari', 2018, 'imam', 'Kartu Nama', '520000'),
(3, '3', '2018/01/22', '', 0, 'imam', 'Pulsa', '55000'),
(6, '18', '2018-01-01', '', 0, 'Dede', 'Pulsa', '50000'),
(7, '18', '2018-01-08', '', 0, 'Dede', 'Bensin', '20000'),
(14, '82', '2018-01-01', '', 0, 'Ibnu Ubaidillah', 'kuota', '55000'),
(16, '82', '2018-01-01', '', 0, 'Ibnu Ubaidillah', 'disetor ht', '1890000'),
(19, '4', '01', 'januari', 2018, 'Ade', 'Delivery mbk ida TBY', '20000'),
(20, '4', '02', 'januari', 2018, 'Ade', 'Paketan', '55000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukkan`
--

CREATE TABLE `pemasukkan` (
  `id_masuk` int(10) NOT NULL,
  `id_proxy` int(20) NOT NULL,
  `nama_proxy` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` int(20) NOT NULL,
  `nama_pelanggan` varchar(200) NOT NULL,
  `paket` varchar(200) NOT NULL,
  `no_invoice` varchar(30) NOT NULL,
  `income` int(30) NOT NULL,
  `share_office` int(30) NOT NULL,
  `share_proxy` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukkan`
--

INSERT INTO `pemasukkan` (`id_masuk`, `id_proxy`, `nama_proxy`, `tanggal`, `bulan`, `tahun`, `nama_pelanggan`, `paket`, `no_invoice`, `income`, `share_office`, `share_proxy`) VALUES
(1, 18, 'Dede', '01', 'januari', 2018, 'je jamuran', 'Ht. 18 Hari', '1', 2700000, 1890000, 0),
(2, 18, 'Dede', '03', 'januari', 2018, 'sujitno', 'proyektor 2500 lumens', '54', 50000, 20000, 0),
(4, 4, 'Ade', '01', 'januari', 2018, 'C Zidni', 'P2500/24 jam', '2', 100000, 75000, 25000),
(5, 4, 'Ade', '10', 'januari', 2018, 'C Dr mbk ida', 'VGA 2 + Splitter+D/20 jam', '5', 140000, 98000, 42000),
(6, 4, 'Ade', '12', 'januari', 2018, 'C Pets', 'P2500+S+D/24 jam', '3', 160000, 110000, 50000),
(7, 4, 'Ade', '12', 'januari', 2018, 'C SSCI', 'P2500+D/24 jam', '6', 130000, 85000, 45000),
(8, 4, 'Ade', '12', 'januari', 2018, 'C Bringin ', 'P2500+D/6 jam', '6', 80000, 55000, 25000),
(9, 4, 'Ade', '14', 'januari', 2018, 'C Pohan', 'P2500/24 jam', '7', 100000, 75000, 25000),
(10, 4, 'Ade', '15', 'januari', 2018, 'C Gigantara', 'P2500+Pointer+VGA 20+D/6 jam', '8', 130000, 82500, 47500),
(11, 4, 'Ade', '16', 'januari', 2018, 'C Wilih Angga', 'P2500+D/24 jam', '9', 125000, 85000, 124915),
(12, 4, 'Ade', '17', 'januari', 2018, 'C Dr mas Fendi', 'P2500/2Ã—24 jam', '10', 200000, 150000, 50000),
(13, 4, 'Ade', '18', 'januari', 2018, 'C Gigantara', 'Pointer+D/1 hari', '11', 45000, 25000, 20000),
(14, 4, 'Ade', '18', 'januari', 2018, 'C Haffazh', 'P2500/6 jam', '12', 60000, 45000, 15000),
(16, 4, 'Ade', '26', 'januari', 2018, 'C Arianto', 'P2500/6 jam', '14', 60000, 45000, 15000),
(17, 4, 'Ade', '27', 'januari', 2018, 'C Bantul', 'P2500+D/6 jam', '16', 85000, 55000, 30000),
(18, 4, 'Ade', '28', 'januari', 2018, 'C Dadakan', 'P2500/12 jam', '19', 80000, 60000, 20000),
(19, 46, 'ficho armando zwageri belle (edo)', '03', 'januari', 2018, 'Mbak Mela', 'Proyektor Std 6 Jam', '1', 60000, 45000, 15000),
(20, 46, 'ficho armando zwageri belle (edo)', '07', 'januari', 2018, 'Ibu Yuli', 'Proyektor Std 24 Jam', '2', 150000, 112500, 37500),
(21, 46, 'ficho armando zwageri belle (edo)', '07', 'januari', 2018, 'Pak Saryadi', 'Proyektor Std 2 Hari', '3', 200000, 150000, 50000),
(22, 46, 'ficho armando zwageri belle (edo)', '08', 'januari', 2018, 'Mas Gigih', 'Proyektor Std 1 Hari', '4', 100000, 75000, 25000),
(23, 46, 'ficho armando zwageri belle (edo)', '14', 'januari', 2018, 'Mas Pandu', 'Proyektor Std 6 Jam + Screen', '5', 90000, 70000, 20000),
(24, 47, 'Yahya Safrian ', '05', 'januari', 2018, 'Mas Yura', '24 jam + del + screen', '1', 150000, 110000, 40000),
(25, 14, 'Fikri', '06', 'januari', 2018, 'Anonim', 'proyektor, screen, del', '1', 200000, 150000, 50000),
(26, 91, 'Amir mahmud ', '03', 'januari', 2018, 'sinar mas', 'proyektor 12', '1', 80000, 60000, 20000),
(27, 68, 'Fendi utomo', '12', 'januari', 2018, 'wardi', 'proyektor', '1', 150000, 105000, 45000),
(29, 62, 'Fauzi', '07', 'januari', 2018, 'nuril', 'proyektor standar 24 jam ', '1', 100000, 75000, 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `proxy`
--

CREATE TABLE `proxy` (
  `id_proxy` int(11) NOT NULL,
  `nama_proxy` varchar(200) NOT NULL,
  `cabang` varchar(200) NOT NULL,
  `email_proxy` varchar(200) NOT NULL,
  `no_wa` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proxy`
--

INSERT INTO `proxy` (`id_proxy`, `nama_proxy`, `cabang`, `email_proxy`, `no_wa`, `lokasi`) VALUES
(4, 'Ade', 'Sewa Proyektor Murah Jogja (SPMJ)', 'sewaproyektor98@gmail.com', '085602029861', 'jalan gayam, semakin kulon, umbulharjo'),
(14, 'Fikri', 'Cia Media', 'abcproyektor@gmail.com', '08987377644', 'Jogja'),
(18, 'Dede Dikdik', 'Akbar Multimedia', 'dedearmeck@gmail.com', '085865580179', 'Babarsari Tb 17/19 Masjid Ksatria Taqwwa'),
(46, 'ficho armando zwageri belle (edo)', 'Cia Media', 'edo.ciamedia@gmail.com', '085335130382', 'padukuhan samirono (selatan gor uny)'),
(47, 'Yahya Safrian ', 'Gpro Media', 'gpronew01@gmail.com', '0895378309052', 'Gamping lor rt 02 rw 10 ambarketawang (kos pak heru)'),
(62, 'Fauzi', 'Muvon Multimedia', 'mojoxmultimedia@gmil.com', '08936275129', 'Balonglor, potorono, banguntapan'),
(68, 'Fendi utomo', 'Akbar Multimedia', 'Fendyutomo11@gmail.com', '085743319140', 'Babarsari Tb 17/19 masjid ksatria taqwa'),
(82, 'Ibnu Ubaidillah', 'Sewa Proyektor Murah Jogja (SPMJ)', 'spmj29@gmail.com', '081391052952', 'Jl. garuda belakang taman makam pahlawan (kusumanegara)'),
(91, 'Amir mahmud ', 'Muvon Multimedia', 'Insight.4md@gmail.com', '081226863852', 'Balonglor, potorono, banguntapan'),
(98, 'Imam Abdul Lathif', 'Gpro Media', 'ciamediachaptergamping@gmail.com', '085743318914', 'Gamping Lor RT 3 RW 11, Ambarketawang, Gamping, Sleman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(500) NOT NULL,
  `username` varchar(15) NOT NULL DEFAULT '',
  `pass` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `pass`, `level`) VALUES
('1', 'admin', 'admin', 'admin'),
('14', 'fikri', 'fikri', 'proxy'),
('18', 'dede', 'dede', 'proxy'),
('4', 'ade', 'Sharemore3', 'proxy'),
('46', 'edo', 'Sharemore3', 'proxy'),
('47', 'yahya', 'yahya', 'proxy'),
('62', 'fauzi', 'fauzi', 'proxy'),
('68', 'fendi', 'fendi', 'proxy'),
('82', 'ibnu', 'sheremore', 'proxy'),
('91', 'amir', 'amir', 'proxy'),
('98', 'imam', 'Sharemore3', 'proxy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnalpembelian`
--
ALTER TABLE `jurnalpembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnalumum`
--
ALTER TABLE `jurnalumum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_kas`
--
ALTER TABLE `jurnal_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_pengeluaran_kas`
--
ALTER TABLE `jurnal_pengeluaran_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_penggajian`
--
ALTER TABLE `jurnal_penggajian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_penjualan`
--
ALTER TABLE `jurnal_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`) USING BTREE;

--
-- Indexes for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`id_proxy`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jurnalpembelian`
--
ALTER TABLE `jurnalpembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `jurnalumum`
--
ALTER TABLE `jurnalumum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jurnal_kas`
--
ALTER TABLE `jurnal_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurnal_pengeluaran_kas`
--
ALTER TABLE `jurnal_pengeluaran_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `jurnal_penggajian`
--
ALTER TABLE `jurnal_penggajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jurnal_penjualan`
--
ALTER TABLE `jurnal_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  MODIFY `id_masuk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
