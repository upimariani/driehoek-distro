-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2022 pada 02.22
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driehoek-distro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail`, `id_size`, `id_order`, `qty`) VALUES
(1, 2, '20220520KD3BERBE', 3),
(2, 5, '20220520KD3BERBE', 1),
(3, 3, '20220520OYHKVAE1', 5),
(4, 1, '20220604Y6DFOTE2', 5),
(5, 4, '20220604N7LQCUEV', 5),
(6, 6, '20220604N7LQCUEV', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Kemeja'),
(4, 'Celana Jeans'),
(5, 'Street');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_order` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `atas_nama` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `total_bayar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `tgl_order`, `time`, `atas_nama`, `alamat`, `no_hp`, `total_bayar`) VALUES
('20220520KD3BERBE', 3, '2022-05-20', '2022-05-20 13:29:34', 'upi', 'Kuningan', '0875698745633', '10732'),
('20220520OYHKVAE1', 3, '2022-05-20', '2022-05-20 13:37:23', 'dahlia', 'Ciawigebang, Kuningan', '085156727368', '50000'),
('20220604N7LQCUEV', 7, '2022-06-04', '2022-06-03 22:58:17', 'Siti', 'Cipicung Rt.02/03', '089876776545', '136000'),
('20220604Y6DFOTE2', 3, '2022-06-04', '2022-06-03 22:52:59', 'Dahlan', 'Ciawigebang, Kuningan', '0875698745633', '800000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `gambar`) VALUES
(1, 5, 'Street Orange Demon', '<p>Terbuat dari bahan <b>cotton 100%</b> pilihan, terjamin kualitas no.01</p>', 'Gambar_Mockup_Kaos_Oranye,_Kaos_Clipart,_Kaos,_Pria_PNG_Transparan_Clipart_dan_File_PSD_untuk_Unduh_Gratis.jpg'),
(3, 5, 'Street Black Pink White', '<p>Bahan terbuat dari <b>100% cotton</b> pilihan</p>', '50698faf-b96e-4d76-a585-b1ce3ebd901c.jpg'),
(4, 5, 'Street Pich', '<p>Cotton 100%</p>', 'Official_Webshop.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `qty_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_size`, `tgl_masuk`, `qty_masuk`) VALUES
(1, 3, '2022-06-18', 8),
(2, 1, '2022-06-15', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_size` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `harga_jual` varchar(15) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `nama_size`, `harga`, `harga_jual`, `stok`) VALUES
(1, 1, 'L', '160000', '170000', 230),
(2, 1, 'XL', '180000', '190000', 1231),
(3, 3, 'L', '10000', '0', 100),
(4, 3, 'S', '17000', '0', 86),
(5, 4, 'S', '10000', '0', 91),
(6, 4, 'XL', '17000', '0', 88);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'pemilik', 'Kuningan, Jawa Barat', '0897654345676', 'pemilik', 'pemilik', 1),
(2, 'admin', 'Ciawigebang, Jawa Barat', '0898765434567', 'admin', 'admin', 2),
(3, 'sales1', 'Cigugur, Kuningan', '087652615263', 'sales1', 'sales1', 3),
(7, 'Wawan', 'Cipicung, Kuningan', '089867564763', 'sales2', 'sales2', 3),
(8, 'Bag Keuangan Dani', 'LINK.KRAMAT JAYA RT/RW 007/003', '0875698745633', 'bagkeuangan', 'bagkeuangan', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
