-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2020 pada 03.50
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `id_barang` varchar(50) NOT NULL,
  `id_principle` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nama_grup` varchar(40) NOT NULL,
  `satuan_kecil` varchar(25) DEFAULT NULL,
  `satuan_besar` varchar(25) DEFAULT NULL,
  `scan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`id_barang`, `id_principle`, `nama_barang`, `nama_grup`, `satuan_kecil`, `satuan_besar`, `scan`) VALUES
('B001', 'B001BR123', 'Printer Zebra HC100', 'Printer', 'unit', 'box', 'Principle id'),
('B002', 'B002BR123', 'Printer Zebra ZXP Series 9', 'Printer', 'gram', '1 set', 'Principle id'),
('B003', 'B003BR123', 'Label 5 x 8', 'Label', 'unit', 'Set 10', 'Principle id'),
('B005', 'B005BR123', 'Printer Label', 'Printer', '1 unit', '12 unit', 'Principle id'),
('B006', 'B006BR123', 'Label 3 x 5', 'Label', 'pcs', 'box', 'Principle id'),
('B007', 'B007BR123', 'Gelang Ultrasoft infant bayi', 'Gelang', 'gram', '1 set', 'Principle id'),
('CL20060005', 'LX899188729008', 'Clip Dewasa Biru', 'Gelang', 'pcs', '1 set', 'Principle id'),
('LA20060005', 'LA20060005', 'Label 5 x 5', 'Label', 'pcs', 'box', 'Product id'),
('PR20055001', 'PR20055001', 'Printer Zebra ZD 101', 'Label', 'unit', '1 set', 'Product id'),
('PR20055002', 'PR20055002', 'Printer ZD 120', 'zebra', 'pcs', 'box', 'Product id'),
('PR20055003', 'PR20055003', 'Printer ZD 100', 'zebra', 'pcs', 'box', 'Product id'),
('PR20061005', '899100989880', 'Printer Zx 200', 'Printer', 'unit', 'box', 'Principle id'),
('TE20050004', 'TE20050005', 'tes', 'Gelang', 'gram', 'box', 'Product id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gudang`
--

CREATE TABLE `t_gudang` (
  `id_gudang` varchar(8) NOT NULL,
  `nama_gudang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_gudang`
--

INSERT INTO `t_gudang` (`id_gudang`, `nama_gudang`) VALUES
('G01', 'Gudang Pusat'),
('G02', 'Gudang Satelit'),
('G03', 'Gudang Cadangan'),
('G04', 'Gudang Sewa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_gudang_lokasi`
--

CREATE TABLE `t_gudang_lokasi` (
  `id_gudang_lokasi` varchar(12) NOT NULL,
  `id_lokasi` varchar(12) DEFAULT NULL,
  `rak` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_history`
--

CREATE TABLE `t_history` (
  `id_history` int(11) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `rak` varchar(20) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `qty_awal` int(11) NOT NULL,
  `qty_in` int(11) NOT NULL,
  `qty_out` int(11) NOT NULL,
  `qty_so` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `qty_ahir` int(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_history`
--

INSERT INTO `t_history` (`id_history`, `id_barang`, `tanggal`, `jam`, `nama_gudang`, `nama_lokasi`, `rak`, `nama_barang`, `qty_awal`, `qty_in`, `qty_out`, `qty_so`, `selisih`, `qty_ahir`, `user`) VALUES
(1, 'PR20055003', '2020-05-01', '15:18:00', 'Gudang Pusat', 'Penerimaan', 'R004', 'Printer ZD 100', 0, 11, 0, 0, 0, 11, 'Asep'),
(2, 'PR20055003', '2020-05-01', '15:24:00', 'G02', 'L001', 'R002', 'Printer ZD 100', 3, 1, 0, 0, 0, 4, 'Asep'),
(3, 'PR20055003', '2020-05-01', '15:29:00', 'G02', 'L001', 'R004', 'Printer ZD 100', 4, 0, 2, 0, 0, 2, 'Hikmat'),
(4, 'PR20055003', '2020-05-01', '15:31:00', 'G02', 'L001', 'R004', 'Printer ZD 100', 2, 0, 2, 0, 0, 0, 'Asep'),
(5, 'B003', '2020-05-01', '15:34:00', 'Gudang Pusat', 'Penerimaan', 'R004', 'Label 5 x 8', 0, 14, 0, 0, 0, 14, 'Samsul'),
(6, 'PR20055003', '2020-05-02', '13:30:00', 'Gudang Pusat', 'Inspeksi', 'R003', 'Printer ZD 100', 0, 8, 0, 0, 0, 8, 'Samsul'),
(7, 'B003', '2020-05-02', '13:31:00', 'Gudang Pusat', 'Penerimaan', 'R004', 'Label 5 x 8', 14, 0, 4, 0, 0, 10, 'Samsul'),
(8, '', '2020-05-02', '13:35:00', 'Gudang 41', 'Penerimaan', 'R003', 'Printer Zx 200', 0, 200, 0, 0, 0, 200, 'Samsul'),
(9, 'B003', '2020-05-02', '13:36:00', 'gudang 41', 'Penerimaan', 'R002', 'Label 5 x 8', 0, 90, 0, 0, 0, 90, 'Samsul'),
(10, '', '2020-05-02', '13:37:00', 'Gudang 41', 'Penerimaan', 'R003', 'Printer Zx 200', 200, 0, 50, 0, 0, 150, 'Samsul'),
(11, '', '2020-05-02', '13:38:00', 'Gudang Satelit', 'Inspeksi', 'R003', 'Printer VX 150', 50, 0, 10, 0, 0, 40, 'Samsul'),
(12, 'PR20055003', '2020-05-02', '13:47:00', 'G02', 'L002', 'R002', 'Printer ZD 100', 12, 3, 0, 0, 0, 15, 'Samsul'),
(13, 'B006', '2020-05-05', '09:03:00', 'Gudang 41', 'Inspeksi', 'R002', 'Label 3 x 5', 90, 0, 10, 0, 0, 80, 'Hikmat'),
(14, 'PR20055003', '2020-05-12', '13:55:00', 'Gudang Satelit', 'Penerimaan', 'R001', 'Printer ZD 100', 0, 90, 0, 0, 0, 90, 'Asep'),
(15, 'PR20055003', '2020-05-12', '13:56:00', 'Gudang Satelit', 'Penerimaan', 'R001', 'Printer ZD 100', 90, 5, 0, 0, 0, 95, 'Asep'),
(16, 'PR20055003', '2020-05-12', '13:56:00', 'Gudang Satelit', 'Penerimaan', 'R001', 'Printer ZD 100', 95, 0, 3, 0, 0, 92, 'Asep'),
(17, '', '2020-06-02', '13:28:00', 'Gudang Pusat', 'Inspeksi', 'R002', 'cek', 0, 10, 0, 0, 0, 10, 'Hikmat'),
(18, 'PR20055003', '2020-06-05', '11:19:00', 'G02', 'L002', 'R002', 'Printer ZD 100', 15, 0, 3, 0, 0, 12, 'Asep'),
(19, 'PR20055003', '2020-06-05', '11:19:00', 'G02', 'L002', 'R002', 'Printer ZD 100', 12, 0, 2, 0, 0, 10, 'Asep'),
(34, 'B006', '2020-06-11', '09:15:00', 'Gudang Sewa', 'Lokasi Lain - lain', '', 'Label 3 x 5', 0, 11, 0, 0, 0, 11, 'Hikmat'),
(35, 'B006', '2020-06-11', '09:17:00', 'Gudang Sewa', 'Lokasi Lain - lain', '', 'Label 3 x 5', 11, 11, 0, 0, 0, 22, 'Hikmat'),
(36, 'B006', '2020-06-11', '09:17:00', 'Gudang Sewa', 'Lokasi Lain - lain', '', 'Label 3 x 5', 22, 0, 12, 0, 0, 10, 'Hikmat'),
(37, 'B006', '2020-06-11', '09:24:00', 'Gudang Sewa', 'Lokasi Lain - lain', 'R004', 'Label 3 x 5', 0, 10, 0, 0, 0, 10, 'Hikmat'),
(38, 'B006', '2020-06-11', '09:24:00', 'Gudang Sewa', 'Lokasi Lain - lain', 'R004', 'Label 3 x 5', 10, 3, 0, 0, 0, 13, 'Hikmat'),
(39, 'B002', '2020-06-11', '13:55:00', 'Gudang Cadangan', 'Inspeksi', 'R003', 'Printer Zebra ZXP Series 9', 0, 25, 0, 0, 0, 25, 'Hikmat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_item_balance`
--

CREATE TABLE `t_item_balance` (
  `id_transaksi` varchar(12) NOT NULL,
  `id_barang` varchar(50) NOT NULL,
  `id_principle` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `nama_gudang` varchar(50) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `rak` varchar(20) NOT NULL,
  `qty` int(8) NOT NULL,
  `qty_so` int(11) NOT NULL,
  `selisih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_item_balance`
--

INSERT INTO `t_item_balance` (`id_transaksi`, `id_barang`, `id_principle`, `nama_barang`, `nama_gudang`, `nama_lokasi`, `rak`, `qty`, `qty_so`, `selisih`) VALUES
('TR001', 'PR20055003', 'PR20055003', 'Printer ZD 100', 'G02', 'L002', 'R002', 10, 10, 0),
('TR002', 'B006', 'B006BR123', 'Label 3 x 5', 'Gudang 41', 'Inspeksi', 'R002', 80, 70, 10),
('TR003', 'PR20061005	', '899100989880', 'Printer Zx 200', 'Gudang Satelit', 'Inspeksi', 'R002', 30, 31, -1),
('TR004', '	 B007', 'B007BR123', 'Gelang Ultrasoft infant bayi', 'Gudang Cadangan', 'Inspeksi', '', 40, 20, 20),
('TR005', 'B006', 'B006BR123', 'Label 3 x 5', 'Gudang Pusat', 'Penerimaan', 'R001', 35, 0, 35),
('TR006', 'B006', 'B006BR123', 'Label 3 x 5', 'Gudang Pusat', 'Penerimaan', 'R001', 11, 16, -5),
('TR007', 'PR20055003', 'PR20055003', 'Printer ZD 100', 'Gudang Pusat', 'Penerimaan', 'R004', 11, 0, 11),
('TR008', 'B003', 'B003BR123', 'Label 5 x 8', 'Gudang Pusat', 'Penerimaan', 'R004', 10, 10, 0),
('TR009', 'PR20055003', 'PR20055003', 'Printer ZD 100', 'Gudang Pusat', 'Inspeksi', 'R003', 8, 0, 0),
('TR010', 'PR20061005	', '899100989880', 'Printer Zx 200', 'Gudang 41', 'Penerimaan', 'R003', 150, 0, 0),
('TR011', 'B003', 'B003BR123', 'Label 5 x 8', 'gudang 50', 'Penerimaan', 'R002', 90, 0, 0),
('TR012', 'PR20055003', 'PR20055003', 'Printer ZD 100', 'Gudang Satelit', 'Penerimaan', 'R001', 92, 0, 0),
('TR013', 'B006', 'B006BR123', 'Label 3 x 5', 'Gudang Sewa', 'Lokasi Lain - lain', 'R004', 13, 0, 0),
('TR014', 'B006', 'B006BR123', 'Label 3 x 5', 'Gudang Sewa', 'Lokasi Lain - lain', '', 10, 0, 0),
('TR015', 'B002', 'B002BR123', 'Printer Zebra ZXP Series 9', 'Gudang Cadangan', 'Inspeksi', 'R003', 25, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_lokasi`
--

CREATE TABLE `t_lokasi` (
  `id_lokasi` varchar(12) NOT NULL,
  `nama_lokasi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_lokasi`
--

INSERT INTO `t_lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
('L001', 'Penerimaan'),
('L002', 'Inspeksi'),
('L003', 'Lokasi Lain - lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_produk_grup`
--

CREATE TABLE `t_produk_grup` (
  `id_produk_grup` int(11) NOT NULL,
  `nama_grup` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_produk_grup`
--

INSERT INTO `t_produk_grup` (`id_produk_grup`, `nama_grup`) VALUES
(1, 'Label'),
(3, 'Printer'),
(4, 'MC'),
(5, 'Gelang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_satuan`
--

CREATE TABLE `t_satuan` (
  `id_satuan` int(12) NOT NULL,
  `satuan_kecil` varchar(12) DEFAULT NULL,
  `satuan_besar` varchar(12) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_satuan`
--

INSERT INTO `t_satuan` (`id_satuan`, `satuan_kecil`, `satuan_besar`, `qty`) VALUES
(1, 'pcs', 'box', 20),
(2, 'gram', 'kg', 1000),
(3, 'unit', '1 set', 6),
(5, 'lembar', 'Lusin', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL,
  `nip` varchar(16) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `user_name` varchar(16) DEFAULT NULL,
  `otorisasi` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nip`, `nama`, `pass`, `user_name`, `otorisasi`) VALUES
(123, '123', 'Asep Suraji', '123', 'Asep', 'admin'),
(124, '124', 'Samsul Hikmat', '123', 'Samsul', 'user'),
(125, '125', 'Jimy Stadio', '123', 'Jimy', 'manajer'),
(126, '126', 'Samsul Hikmat', '123', 'Hikmat', 'user'),
(131, '131', 'Saya Tes', '123', 'Saya', 'manajer');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `t_gudang`
--
ALTER TABLE `t_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `t_gudang_lokasi`
--
ALTER TABLE `t_gudang_lokasi`
  ADD PRIMARY KEY (`id_gudang_lokasi`);

--
-- Indeks untuk tabel `t_history`
--
ALTER TABLE `t_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indeks untuk tabel `t_item_balance`
--
ALTER TABLE `t_item_balance`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `t_lokasi`
--
ALTER TABLE `t_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `t_produk_grup`
--
ALTER TABLE `t_produk_grup`
  ADD PRIMARY KEY (`id_produk_grup`);

--
-- Indeks untuk tabel `t_satuan`
--
ALTER TABLE `t_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_history`
--
ALTER TABLE `t_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `t_produk_grup`
--
ALTER TABLE `t_produk_grup`
  MODIFY `id_produk_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_satuan`
--
ALTER TABLE `t_satuan`
  MODIFY `id_satuan` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
