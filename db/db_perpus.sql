-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 03:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama`, `judul_buku`, `pengarang`, `tahun_terbit`, `stok`) VALUES
(11, 'Majalah', 'Sukses 1 T di Crypto by Ibran', 'Ibran', 2025, 0),
(13, 'Novel', 'kisah sukses rumah tangga wahyu dan davina karamoy', 'wahyu', 2025, 70);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(12, 'Doujin'),
(13, 'Mahwa'),
(15, 'Majalah'),
(14, 'Manga'),
(8, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `tgl_bukukembali` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `id_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `id_user`, `tgl_pengembalian`, `tgl_bukukembali`, `status`, `id_buku`) VALUES
(3, '2025-05-22', 16, '2025-05-22', '2025-05-22', 'dipinjam', 13),
(4, '2025-05-22', 16, '2025-05-22', '2025-05-22', 'dipinjam', 13),
(5, '2025-05-22', 16, '2025-05-22', '2025-05-22', 'dipinjam', 13),
(6, '2025-05-22', 16, '2025-05-22', '2025-05-22', 'dipinjam', 13),
(7, '2025-05-22', 19, '2025-05-22', '2025-05-22', 'dikembalikan', 13),
(8, '2025-05-23', 19, '2025-05-23', '2025-05-23', 'dikembalikan', 13),
(9, '2025-05-23', 19, '2025-05-23', '2025-05-23', 'dipinjam', 13),
(10, '2025-05-23', 19, '2025-05-23', '2025-05-23', 'dipinjam', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`, `status`) VALUES
(15, 'zidan', 'zidan', 'zidan', 'siswa', 1),
(16, 'Wahyu ', 'Wahyu', 'wahyu', 'siswa', 1),
(17, 'admin', 'admin', 'admin', 'admin', 1),
(19, 'fauzan', 'fauzan', 'fauzan', 'siswa', 1),
(22, 'Bu Riski', 'Bu Riski', 'Bu Riski', 'petugas', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`nama`) REFERENCES `kategori` (`nama`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
