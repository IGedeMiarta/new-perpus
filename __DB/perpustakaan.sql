-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2021 at 11:22 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kel` enum('L','P') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(11) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama`, `jenis_kel`, `alamat`, `no_hp`, `status`) VALUES
(1, '15001', 'I Gede Bayu Setiadi Sayoga', 'L', 'yogya', '08152155598', 2),
(3, '15002', 'Komang Lukas', 'L', 'AAAA', '08152159911', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
CREATE TABLE IF NOT EXISTS `buku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kd_buku` varchar(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(11) NOT NULL,
  `penerbit` varchar(11) NOT NULL,
  `th_terbit` year NOT NULL,
  `kategori` varchar(11) NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kd_buku`, `judul`, `pengarang`, `penerbit`, `th_terbit`, `kategori`, `status`) VALUES
(1, 'BK0001', 'DPRD & Otonomi Daerah Setelah Amandemen UUD 1945', 'PG0002', 'PN0001', 2010, 'KT0001', 1),
(2, 'BK0002', 'Dilan 1990', 'PG0001', 'PN0001', 2010, 'KT0003', 0),
(3, 'BK0003', 'Ilmu Komunikasi Pengantar', 'PG0002', 'PN0001', 2012, 'KT0002', 0),
(4, 'BK0004', 'Dilan 1991', 'PG0001', 'PN0001', 2021, 'KT0003', 0),
(5, 'BK0005', 'Android', 'PG0002', 'PN0001', 2018, 'KT0002', 0),
(6, 'BK0006', 'HTML 5', 'PG0002', 'PN0001', 2019, 'KT0002', 0),
(7, 'BK0007', 'belajar menggambar', 'PG0002', 'PN0001', 2011, 'KT0001', 1),
(8, 'BK0008', 'Buku Paket Siswa | Ilmu Pengtahuan Alam Kelas 9', 'PG0002', 'PN0001', 2019, 'KT0003', 0),
(9, 'BK0009', 'UUD 1945 Dan Makna Kebangsaan', 'PG0003', 'PN0002', 2010, 'KT0004', 0),
(10, 'BK0010', 'Seni Budaya', 'PG0003', 'PN0001', 2010, 'KT0004', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detail_buku`
--

DROP TABLE IF EXISTS `detail_buku`;
CREATE TABLE IF NOT EXISTS `detail_buku` (
  `id_detail` int NOT NULL AUTO_INCREMENT,
  `kd_detail` varchar(11) NOT NULL,
  `kd_buku` varchar(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `rak` int NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_buku`
--

INSERT INTO `detail_buku` (`id_detail`, `kd_detail`, `kd_buku`, `tgl_masuk`, `rak`, `status`) VALUES
(1, 'BK0001DTL1', 'BK0001', '2021-06-01', 4, 0),
(2, 'BK0001DTL2', 'BK0001', '2021-06-01', 4, 0),
(3, 'BK0001DTL3', 'BK0001', '2021-06-01', 4, 1),
(4, 'BK0007DTL1', 'BK0007', '2021-06-03', 2, 1),
(5, 'BK0007DTL2', 'BK0007', '2021-06-03', 2, 1),
(6, 'BK0007DTL3', 'BK0007', '2021-06-03', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_donasi`
--

DROP TABLE IF EXISTS `detail_donasi`;
CREATE TABLE IF NOT EXISTS `detail_donasi` (
  `id_detail_donasi` int NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL,
  PRIMARY KEY (`id_detail_donasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_donasi`
--

INSERT INTO `detail_donasi` (`id_detail_donasi`, `keterangan`, `status`) VALUES
(1, 'Sumbangan Sukarela', 'sumbangan'),
(2, 'sumabangan', 'sumbangan');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

DROP TABLE IF EXISTS `detail_peminjaman`;
CREATE TABLE IF NOT EXISTS `detail_peminjaman` (
  `id_detail_peminjaman` int NOT NULL AUTO_INCREMENT,
  `status_pinjam` enum('Terpinjam','Selesai','Terlambat','Perpanjang','Hilang') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_detail_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `status_pinjam`) VALUES
(1, 'Terpinjam'),
(2, 'Selesai'),
(3, 'Terlambat'),
(4, 'Perpanjang'),
(5, 'Hilang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

DROP TABLE IF EXISTS `detail_pengembalian`;
CREATE TABLE IF NOT EXISTS `detail_pengembalian` (
  `id_detail_pengembalian` int NOT NULL AUTO_INCREMENT,
  `status_kembali` enum('Terpinjam','Selesai','Terlambat','Perpanjang','Hilang') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_detail_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id_detail_pengembalian`, `status_kembali`) VALUES
(1, 'Terpinjam'),
(2, 'Selesai'),
(3, 'Terlambat'),
(4, 'Perpanjang'),
(5, 'Hilang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_perpanjangan`
--

DROP TABLE IF EXISTS `detail_perpanjangan`;
CREATE TABLE IF NOT EXISTS `detail_perpanjangan` (
  `id_detail_perpanjangan` int NOT NULL AUTO_INCREMENT,
  `status_perpanjangan` enum('Selesai','Terlambat','Hilang') NOT NULL,
  PRIMARY KEY (`id_detail_perpanjangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

DROP TABLE IF EXISTS `donasi`;
CREATE TABLE IF NOT EXISTS `donasi` (
  `id_donasi` int NOT NULL AUTO_INCREMENT,
  `tgl_donasi` date NOT NULL,
  `donatur` int NOT NULL,
  `jml_donasi` int NOT NULL,
  `detail` int NOT NULL,
  PRIMARY KEY (`id_donasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `tgl_donasi`, `donatur`, `jml_donasi`, `detail`) VALUES
(1, '2021-08-01', 2, 5000, 1),
(2, '2021-08-02', 2, 2500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

DROP TABLE IF EXISTS `donatur`;
CREATE TABLE IF NOT EXISTS `donatur` (
  `id_donatur` int NOT NULL AUTO_INCREMENT,
  `nama_donatur` varchar(255) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `no_hp` varchar(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_donatur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama_donatur`, `jenkel`, `no_hp`, `alamat`) VALUES
(2, 'Assabil Nur ', 'L', '08152155999', 'Yogyakarta\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `kd_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kd_kategori`, `nama_kategori`) VALUES
(1, 'KT0001', 'Sejarah'),
(2, 'KT0002', 'Teknologi Informasi'),
(3, 'KT0003', 'Novel'),
(4, 'KT0004', 'Buku Paket Siswa'),
(9, 'KT0005', 'Pariwisata');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date NOT NULL,
  `id_anggota` int NOT NULL,
  `id_buku` varchar(11) NOT NULL,
  `batas_pinjam` date NOT NULL,
  `tgl_perpanjang` date DEFAULT NULL,
  `detail` int NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `id_anggota`, `id_buku`, `batas_pinjam`, `tgl_perpanjang`, `detail`) VALUES
(1, '2021-07-01', 3, '1', '2021-07-08', NULL, 2),
(2, '2021-07-18', 1, '4', '2021-07-25', NULL, 2),
(3, '2021-07-01', 1, '1', '2021-07-08', NULL, 2),
(4, '2021-08-01', 1, '1', '2021-08-09', '2021-08-02', 4),
(5, '2021-10-11', 1, '2', '2021-10-18', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

DROP TABLE IF EXISTS `penerbit`;
CREATE TABLE IF NOT EXISTS `penerbit` (
  `id_penerbit` int NOT NULL AUTO_INCREMENT,
  `kd_penerbit` varchar(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  PRIMARY KEY (`id_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `kd_penerbit`, `nama_penerbit`) VALUES
(1, 'PN0001', 'Gramedia'),
(2, 'PN0002', 'Pustaka Buku'),
(3, 'PN0003', 'PN YK Indah');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

DROP TABLE IF EXISTS `pengarang`;
CREATE TABLE IF NOT EXISTS `pengarang` (
  `id_pengarang` int NOT NULL AUTO_INCREMENT,
  `kd_pengarang` varchar(11) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pengarang`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `kd_pengarang`, `nama_pengarang`) VALUES
(1, 'PG0001', 'Pidi Baiq'),
(4, 'PG0003', 'Andi Offset'),
(6, 'PG0004', 'Sutarman');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
CREATE TABLE IF NOT EXISTS `pengembalian` (
  `id_pengembalian` int NOT NULL AUTO_INCREMENT,
  `id_pinjam` int NOT NULL,
  `tgl_kembali` date NOT NULL,
  `detail` int NOT NULL,
  PRIMARY KEY (`id_pengembalian`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_pinjam`, `tgl_kembali`, `detail`) VALUES
(3, 2, '2021-07-01', 2),
(4, 1, '2021-07-18', 2),
(5, 3, '2021-07-18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perpanjangan`
--

DROP TABLE IF EXISTS `perpanjangan`;
CREATE TABLE IF NOT EXISTS `perpanjangan` (
  `id_perpanjangan` int NOT NULL AUTO_INCREMENT,
  `tgl_perpanjangan` date NOT NULL,
  `id_peminjaman` int NOT NULL,
  `batas_kembali` date NOT NULL,
  `detail` int NOT NULL,
  PRIMARY KEY (`id_perpanjangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int NOT NULL AUTO_INCREMENT,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nip`, `nama`, `jenkel`, `no_hp`, `alamat`) VALUES
(1, '510000010101101', 'Amin Arifin', 'L', '081222888', 'Jl A,BC Mlati, Sleman Yogyakarta'),
(5, '150000198221', 'Ayu', 'P', '08152159911', 'Sleman Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
CREATE TABLE IF NOT EXISTS `rak` (
  `id_rak` int NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `nama_rak`, `detail`) VALUES
(1, 'A01', 'Sains & Teknologi Informasi'),
(2, 'A02', 'Bahasa & Sastra Indonesia'),
(3, 'B01', 'Keagamaan'),
(4, 'B02', 'Ilmu Sosial & Sejarah'),
(5, 'A03', 'Novel & Komik'),
(6, 'A04', 'Ensiklopedia'),
(7, 'B03', 'Buku Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `status_anggota`
--

DROP TABLE IF EXISTS `status_anggota`;
CREATE TABLE IF NOT EXISTS `status_anggota` (
  `id_status_anggota` int NOT NULL AUTO_INCREMENT,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_status_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_anggota`
--

INSERT INTO `status_anggota` (`id_status_anggota`, `status`) VALUES
(1, 'Siswa'),
(2, 'Guru'),
(3, 'Karyawan'),
(4, 'Alumni');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `user_id` int NOT NULL,
  `role` enum('Admin','Petugas','Anggota') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `user_id`, `role`) VALUES
(1, 'admin', 'admin@sekolah.com', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 0, 'Admin'),
(2, 'user', 'user@gmail.com', '$2y$10$FmO8fDbUZcPH7X9NP1NGoetVZ5YCo86uzQ2iBcOmH9UFBaNc1L86a', 0, 'Petugas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
