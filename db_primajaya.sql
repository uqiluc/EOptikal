-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Sep 2017 pada 04.08
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_primajaya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_brand`
--

CREATE TABLE `goods_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mnemonic` char(100) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `goods_brand`
--

INSERT INTO `goods_brand` (`id`, `name`, `mnemonic`, `type_id`) VALUES
(1, 'Times', 'TMFR', 1),
(2, 'Adidas', 'ADFR', 1),
(3, 'Gucci', 'GCFR', 1),
(4, 'Rodenstock', 'RDFR', 1),
(5, 'Ray Bon', 'RBFR', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_request`
--

CREATE TABLE `goods_request` (
  `request_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `goods_request`
--

INSERT INTO `goods_request` (`request_code`, `date`, `user_id`, `store_id`, `status`) VALUES
('PB1709230001', '2017-09-23', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_request_detail`
--

CREATE TABLE `goods_request_detail` (
  `id` int(11) NOT NULL,
  `request_code` varchar(255) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_stock`
--

CREATE TABLE `goods_stock` (
  `id` int(11) NOT NULL,
  `goods_code` varchar(100) NOT NULL,
  `type_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` int(11) NOT NULL DEFAULT '0',
  `kind` varchar(255) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` char(100) DEFAULT NULL,
  `material` varchar(255) DEFAULT NULL,
  `quantity` float NOT NULL,
  `purchase_price` char(12) NOT NULL,
  `selling_price` char(12) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `goods_stock`
--

INSERT INTO `goods_stock` (`id`, `goods_code`, `type_id`, `brand_id`, `name`, `details`, `kind`, `color`, `size`, `material`, `quantity`, `purchase_price`, `selling_price`, `status`) VALUES
(1, 'FR1709220001', 1, 4, 'Rodenstock Frame L2', 1, '', '', '', '', 43, '200000', '300000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `goods_type`
--

CREATE TABLE `goods_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mnemonic` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `goods_type`
--

INSERT INTO `goods_type` (`id`, `name`, `mnemonic`) VALUES
(1, 'Frame', 'FR'),
(2, 'Kotak Kacamata', 'KK'),
(3, 'Softlens', 'SL'),
(4, 'Tali Kacamata', 'TK'),
(5, 'Cairan Softlens', 'CS'),
(6, 'Lap Kacamata', 'LK'),
(7, 'Baut Kacamata', 'BK'),
(8, 'Lensa', 'LS'),
(9, 'Pembersih Lensa', 'PL'),
(10, 'Nose Pad', 'NP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `incoming_goods`
--

CREATE TABLE `incoming_goods` (
  `incoming_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `incoming_goods`
--

INSERT INTO `incoming_goods` (`incoming_code`, `date`, `supplier_id`, `user_id`) VALUES
('BM1709220001', '2017-09-22', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `incoming_goods_detail`
--

CREATE TABLE `incoming_goods_detail` (
  `id` int(11) NOT NULL,
  `incoming_code` varchar(255) NOT NULL,
  `goods_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `incoming_goods_detail`
--

INSERT INTO `incoming_goods_detail` (`id`, `incoming_code`, `goods_id`, `amount`, `status`) VALUES
(1, 'BM1709220001', 1, 20, 0);

--
-- Trigger `incoming_goods_detail`
--
DELIMITER $$
CREATE TRIGGER `masukBarang` AFTER INSERT ON `incoming_goods_detail` FOR EACH ROW BEGIN
 UPDATE `goods_stock` SET `quantity`=`quantity`+`NEW`.`amount`
 WHERE `id`=`NEW`.`goods_id`;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outcoming_goods`
--

CREATE TABLE `outcoming_goods` (
  `id` int(11) NOT NULL,
  `request_code` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone_number` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone_number`) VALUES
(1, 'Pandi Optik', 'Jln. Leuwi Panjang', '2247500000'),
(2, 'Safari Optik', 'Jln. Kemayoran Baru', '8767865678'),
(3, 's''luvita', 'Jl. Bojong Loa Timur', '22678187111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `useraccount`
--

CREATE TABLE `useraccount` (
  `id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth` date NOT NULL,
  `address` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `useraccount`
--

INSERT INTO `useraccount` (`id`, `part_id`, `fullname`, `birth`, `address`, `username`, `password`, `level`, `date_created`, `avatar`) VALUES
(1, 1, 'admin', '2017-09-18', '-', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2017-09-18', '0'),
(2, 3, 'Operatorr', '2017-09-19', 'Jln. Jalan', 'operator', '4b583376b2767b923c3e1da60d10de59', 1, '2017-09-19', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_part`
--

CREATE TABLE `user_part` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_part`
--

INSERT INTO `user_part` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Gudang'),
(3, 'Operator Toko 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods_brand`
--
ALTER TABLE `goods_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_request`
--
ALTER TABLE `goods_request`
  ADD PRIMARY KEY (`request_code`);

--
-- Indexes for table `goods_request_detail`
--
ALTER TABLE `goods_request_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_stock`
--
ALTER TABLE `goods_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goods_type`
--
ALTER TABLE `goods_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incoming_goods`
--
ALTER TABLE `incoming_goods`
  ADD PRIMARY KEY (`incoming_code`);

--
-- Indexes for table `incoming_goods_detail`
--
ALTER TABLE `incoming_goods_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraccount`
--
ALTER TABLE `useraccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_part`
--
ALTER TABLE `user_part`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods_brand`
--
ALTER TABLE `goods_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `goods_request_detail`
--
ALTER TABLE `goods_request_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `goods_stock`
--
ALTER TABLE `goods_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `goods_type`
--
ALTER TABLE `goods_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `incoming_goods_detail`
--
ALTER TABLE `incoming_goods_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `outcoming_goods`
--
ALTER TABLE `outcoming_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `useraccount`
--
ALTER TABLE `useraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_part`
--
ALTER TABLE `user_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
