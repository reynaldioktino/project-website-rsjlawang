-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 03:55 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsjlawang`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`id`, `id_user`, `nip`, `nama`, `alamat`, `no_tlp`, `jk`) VALUES
(1, 5, '1212', '24242', '424', '424', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa_sekunder`
--

CREATE TABLE `diagnosa_sekunder` (
  `id` int(10) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `id_icd10` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa_sekunder`
--

INSERT INTO `diagnosa_sekunder` (`id`, `id_periksa`, `id_icd10`) VALUES
(1, 2, 3),
(2, 3, 3),
(3, 4, 3),
(4, 5, 3),
(5, 6, 3),
(6, 7, 3),
(7, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_klinik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_user`, `nip`, `nama`, `alamat`, `no_tlp`, `jk`, `id_klinik`) VALUES
(3, 3, '1212121', 'dr. Reynaldi', 'Halah Kono', '0834343434', 'Laki-Laki', 3);

-- --------------------------------------------------------

--
-- Table structure for table `icd9`
--

CREATE TABLE `icd9` (
  `id` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icd9`
--

INSERT INTO `icd9` (`id`, `kode`, `keterangan`) VALUES
(2, '2', 'icd 9 coba2');

-- --------------------------------------------------------

--
-- Table structure for table `icd10`
--

CREATE TABLE `icd10` (
  `id` int(11) NOT NULL,
  `icd_kode` varchar(7) NOT NULL,
  `jenis_penyakit` varchar(184) NOT NULL,
  `sebabpenyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `icd10`
--

INSERT INTO `icd10` (`id`, `icd_kode`, `jenis_penyakit`, `sebabpenyakit`) VALUES
(2, 'D10.1', 'Batuk', 'Pilek'),
(3, 'D10.2', 'Asma', 'Paru-paru');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `hubungan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`id`, `id_pasien`, `id_user`, `nama`, `alamat`, `no_tlp`, `hubungan`) VALUES
(1, 1, 6, 'Rajiman', 'kediri', '08777665543', 'Orang Tua'),
(2, 6, 7, 'Sutoyo', 'kauman', '03442323', 'Orang Tua');

-- --------------------------------------------------------

--
-- Table structure for table `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `kode`, `nama`) VALUES
(2, 'MT', 'Mata'),
(3, 'THT', 'Telinga Hati Tenggorokan');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `is_parent` tinyint(1) NOT NULL,
  `parent_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama`) VALUES
(1, 'Obat Batuk'),
(2, 'Obat Asma');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) NOT NULL,
  `no_rm` varchar(10) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(16) NOT NULL,
  `status` varchar(30) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_rm`, `no_ktp`, `nama`, `alamat`, `jk`, `tempat_lahir`, `tanggal_lahir`, `umur`, `status`, `pendidikan`, `pekerjaan`) VALUES
(1, 'RM0001', '1212121211', 'Reynaldi Oktino', 'Tanggung', 'Laki-Laki', 'Tulungagung', '1997-10-06', '21', 'Kawin', 'D3', 'Program'),
(2, 'RM0002', '9393383838', 'Lukman', 'Turen', 'Laki-Laki', 'Tulungagung', '1997-12-12', '21', 'Kawin', 'D-4', 'Program'),
(3, 'RM0003', '34343434', 'Alin', 'Tangerang', 'Perempuan', 'Jakarta', '1998-10-10', '20', 'Belum Kawin', 'D-4', 'Programmer'),
(4, 'RM0004', '1221212122', 'dio', 'ta', 'Laki-Laki', 'ta', '1998-11-12', '21', 'Belum Menikah', 'SMA', 'Pelajar'),
(5, 'RM0005', '11', 'scs', 'ss', 'Perempuan', 'ss', '1997-02-22', '22', 'Belum Kawin', 'SMA', 'Pelajar'),
(6, 'RM0006', '123409876', 'Destiarga', 'Kauman', 'Laki-Laki', 'Tulungagung', '1998-12-12', '20', 'Kawin', 'D3', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(10) NOT NULL,
  `no_pendaftaran` varchar(25) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `rujukan` varchar(100) NOT NULL,
  `id_klinik` int(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `no_antrian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `no_pendaftaran`, `id_pasien`, `rujukan`, `id_klinik`, `tgl_masuk`, `status`, `no_antrian`) VALUES
(1, 'P0001', 1, 'Datang Sendiri', 2, '2018-10-15', 'pemeriksaan', 'GG0001'),
(4, 'P00003', 3, 'Datang Sendiri', 3, '2018-10-17', 'pemeriksaan', 'GG0003'),
(5, 'p0002', 2, 'Datang Sendiri', 2, '2018-10-24', 'antri', 'GG0002'),
(6, 'P0006', 4, 'Datang Sendiri', 2, '2018-11-07', 'antri', 'GG0005'),
(7, 'P0007', 1, 'Puskesmas', 2, '2018-12-05', 'antri', 'GG0002'),
(8, 'P0008', 6, 'Datang Sendiri', 2, '2018-12-06', 'pemeriksaan', 'GG0002');

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `id_perawat` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`id_perawat`, `id_user`, `nip`, `nama`, `alamat`, `no_tlp`, `jk`) VALUES
(1, 4, '12332323', 'Jaenab', '2424242424 dhdh', '408402402804', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id_periksa` int(10) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `id_pendaftaran` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `keluhan` text NOT NULL,
  `id_icd10` int(10) NOT NULL,
  `catatan` text NOT NULL,
  `kondisi_umum` varchar(25) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`id_periksa`, `kode`, `id_pendaftaran`, `id_dokter`, `tgl_periksa`, `keluhan`, `id_icd10`, `catatan`, `kondisi_umum`, `foto`) VALUES
(1, 'REP1', 5, 3, '2018-10-01', 'aanjay', 2, 'jjasaasas', 'Muntah', 'foto.jpg'),
(2, 'PERI1', 1, 3, '2018-10-31', 'Sakit', 2, 'Jiwa', 'Muntah', 'foto.jpg'),
(3, 'PERI2', 4, 3, '2018-11-05', 'Sakit', 2, 'Batuk', 'Muntah', 'foto.jpg'),
(4, 'PERI3', 5, 3, '2018-10-31', 'Sakit', 2, 'Fikiran', 'Muntah', 'foto.jpg'),
(5, 'PER12', 1, 3, '0000-00-00', 'Sakit Pokoke', 2, 'jiwa', 'Muntah', 'foto.jpg'),
(6, 'PER11', 1, 3, '0000-00-00', 'Sakit Pokoke', 2, 'jiwa', 'Muntah', 'foto.jpg'),
(7, 'PER007', 1, 3, '2018-11-23', 'sakit', 2, 'batuk', 'Muntah', 'foto.jpg'),
(8, 'PER008', 8, 3, '2018-12-06', 'Mata Minus', 2, 'Tes Mata', 'Muntah', 'foto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `periksa_lab`
--

CREATE TABLE `periksa_lab` (
  `id` int(11) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `periksa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id_rawatinap` int(10) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat_inap`
--

INSERT INTO `rawat_inap` (`id_rawatinap`, `id_ruangan`, `id_pendaftaran`, `tgl_masuk`, `tgl_keluar`, `status`, `keterangan`) VALUES
(3, 1, 5, '2018-11-06', '2018-11-20', 'Keluar', 'sakit2'),
(4, 2, 4, '2018-11-06', '2018-11-07', 'Keluar', 'tindakan'),
(5, 2, 5, '2018-11-07', '0000-00-00', 'Belum Keluar', 'perlu tindakan lanjut'),
(6, 2, 5, '2018-11-22', '2018-11-21', 'Keluar', 'aaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(10) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `kode`, `id_periksa`, `keterangan`, `status`) VALUES
(3, 'RSP03', 4, 'resep sesuai yang diberikan', 'Konfirmasi'),
(4, 'RSP04', 5, 'Kasih Resep', 'Konfirmasi'),
(5, 'RSP05', 6, 'Kasih Resep', 'Pending'),
(6, 'RSP06', 7, 'resep dari dokter', 'Pending'),
(7, 'RSP07', 8, 'Resep Mata Minus', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `resep_det`
--

CREATE TABLE `resep_det` (
  `id` int(10) NOT NULL,
  `id_resep` int(10) NOT NULL,
  `id_obat` int(10) NOT NULL,
  `aturan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep_det`
--

INSERT INTO `resep_det` (`id`, `id_resep`, `id_obat`, `aturan`) VALUES
(2, 3, 2, '3 x 1 hari'),
(4, 4, 1, '3 x 1 hari'),
(5, 5, 1, '3 x 1 hari'),
(6, 6, 1, '3 x 1 hari'),
(7, 7, 1, '3 x 4 hari');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kapasitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `nama`, `kapasitas`) VALUES
(1, 'Melati', 20),
(2, 'Mawar', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(10) NOT NULL,
  `id_dokter` int(10) NOT NULL,
  `id_perawat` int(10) NOT NULL,
  `id_periksa` int(10) NOT NULL,
  `id_ruangan` int(10) NOT NULL,
  `tgl_tindakan` date NOT NULL,
  `id_icd9` int(10) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `id_dokter`, `id_perawat`, `id_periksa`, `id_ruangan`, `tgl_tindakan`, `id_icd9`, `catatan`) VALUES
(1, 3, 1, 5, 1, '2018-11-22', 2, 'coba2345'),
(2, 3, 1, 2, 1, '2018-11-21', 2, 'coba23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0'),
(3, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', '1'),
(4, 'perawat', '5d6a514ee02a5fc910dee69cc07017cc', '2'),
(5, 'apoteker', '326dd0e9d42a3da01b50028c51cf21fc', '3'),
(6, 'keluarga', '1f28c5369ecdded95abc79ffd01257bc', '4'),
(7, 'keluarga2', '1af3f96ee2b49b4ee95788d23ec3d08f', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `diagnosa_sekunder`
--
ALTER TABLE `diagnosa_sekunder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periksa` (`id_periksa`),
  ADD KEY `id_icd10` (`id_icd10`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indexes for table `icd9`
--
ALTER TABLE `icd9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icd10`
--
ALTER TABLE `icd10`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`id_perawat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `id_icd10` (`id_icd10`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `periksa_lab`
--
ALTER TABLE `periksa_lab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id_rawatinap`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`),
  ADD KEY `id_ruangan` (`id_ruangan`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_periksa` (`id_periksa`);

--
-- Indexes for table `resep_det`
--
ALTER TABLE `resep_det`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_resep` (`id_resep`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`),
  ADD KEY `id_perawat` (`id_perawat`),
  ADD KEY `id_ruangan` (`id_ruangan`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_periksa` (`id_periksa`),
  ADD KEY `id_icd9` (`id_icd9`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diagnosa_sekunder`
--
ALTER TABLE `diagnosa_sekunder`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `icd9`
--
ALTER TABLE `icd9`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `icd10`
--
ALTER TABLE `icd10`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perawat`
--
ALTER TABLE `perawat`
  MODIFY `id_perawat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id_periksa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `periksa_lab`
--
ALTER TABLE `periksa_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id_rawatinap` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `resep_det`
--
ALTER TABLE `resep_det`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD CONSTRAINT `apoteker_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `diagnosa_sekunder`
--
ALTER TABLE `diagnosa_sekunder`
  ADD CONSTRAINT `diagnosa_sekunder_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`),
  ADD CONSTRAINT `diagnosa_sekunder_ibfk_2` FOREIGN KEY (`id_icd10`) REFERENCES `icd10` (`id`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id_klinik`);

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `keluarga_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id_klinik`);

--
-- Constraints for table `perawat`
--
ALTER TABLE `perawat`
  ADD CONSTRAINT `perawat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`),
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_icd10`) REFERENCES `icd10` (`id`),
  ADD CONSTRAINT `periksa_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Constraints for table `periksa_lab`
--
ALTER TABLE `periksa_lab`
  ADD CONSTRAINT `periksa_lab_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `periksa_lab_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `periksa_lab_ibfk_3` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`);

--
-- Constraints for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD CONSTRAINT `rawat_inap_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`),
  ADD CONSTRAINT `rawat_inap_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_ibfk_1` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`);

--
-- Constraints for table `resep_det`
--
ALTER TABLE `resep_det`
  ADD CONSTRAINT `resep_det_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `resep_det_ibfk_2` FOREIGN KEY (`id_resep`) REFERENCES `resep` (`id_resep`);

--
-- Constraints for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD CONSTRAINT `tindakan_ibfk_1` FOREIGN KEY (`id_perawat`) REFERENCES `perawat` (`id_perawat`),
  ADD CONSTRAINT `tindakan_ibfk_2` FOREIGN KEY (`id_ruangan`) REFERENCES `ruangan` (`id_ruangan`),
  ADD CONSTRAINT `tindakan_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `tindakan_ibfk_4` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id_periksa`),
  ADD CONSTRAINT `tindakan_ibfk_5` FOREIGN KEY (`id_icd9`) REFERENCES `icd9` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
