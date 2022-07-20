-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 12:30 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

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
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_order` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order`
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
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Kemeja'),
(4, 'Celana Jeans'),
(5, 'Street');

-- --------------------------------------------------------

--
-- Table structure for table `order`
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
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `tgl_order`, `time`, `atas_nama`, `alamat`, `no_hp`, `total_bayar`) VALUES
('20220520KD3BERBE', 3, '2022-05-20', '2022-05-20 13:29:34', 'upi', 'Kuningan', '0875698745633', '10732'),
('20220520OYHKVAE1', 3, '2022-05-20', '2022-05-20 13:37:23', 'dahlia', 'Ciawigebang, Kuningan', '085156727368', '50000'),
('20220604N7LQCUEV', 7, '2022-06-04', '2022-06-03 22:58:17', 'Siti', 'Cipicung Rt.02/03', '089876776545', '136000'),
('20220604Y6DFOTE2', 3, '2022-06-04', '2022-06-03 22:52:59', 'Dahlan', 'Ciawigebang, Kuningan', '0875698745633', '800000');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(125) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `deskripsi`, `gambar`) VALUES
(1, 5, 'Street Orange Demon', '<p>Terbuat dari bahan <b>cotton 100%</b> pilihan, terjamin kualitas no.01</p>', 'Gambar_Mockup_Kaos_Oranye,_Kaos_Clipart,_Kaos,_Pria_PNG_Transparan_Clipart_dan_File_PSD_untuk_Unduh_Gratis.jpg'),
(3, 5, 'Street Black Pink White', '<p>Bahan terbuat dari <b>100% cotton</b> pilihan</p>', '50698faf-b96e-4d76-a585-b1ce3ebd901c.jpg'),
(4, 5, 'Street Pich', '<p>Cotton 100%</p>', 'Official_Webshop.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk_masuk`
--

CREATE TABLE `produk_masuk` (
  `id_produk_masuk` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `tgl_masuk` varchar(15) NOT NULL,
  `qty_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_masuk`
--

INSERT INTO `produk_masuk` (`id_produk_masuk`, `id_size`, `tgl_masuk`, `qty_masuk`) VALUES
(1, 3, '2022-06-18', 8),
(2, 1, '2022-06-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_size` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `nama_size`, `harga`, `stok`) VALUES
(1, 1, 'L', '160000', 230),
(2, 1, 'XL', '180000', 1231),
(3, 3, 'L', '10000', 100),
(4, 3, 'S', '17000', 86),
(5, 4, 'S', '10000', 91),
(6, 4, 'XL', '17000', 88);

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_hp`, `username`, `password`, `level_user`) VALUES
(1, 'pemilik', 'Kuningan, Jawa Barat', '0897654345676', 'pemilik', 'pemilik', 1),
(2, 'admin', 'Ciawigebang, Jawa Barat', '0898765434567', 'admin', 'admin', 2),
(3, 'sales1', 'Cigugur, Kuningan', '087652615263', 'sales1', 'sales1', 3),
(7, 'Wawan', 'Cipicung, Kuningan', '089867564763', 'sales2', 'sales2', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  ADD PRIMARY KEY (`id_produk_masuk`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk_masuk`
--
ALTER TABLE `produk_masuk`
  MODIFY `id_produk_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
