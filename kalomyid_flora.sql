-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2021 at 10:53 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalomyid_flora`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekg`
--

CREATE TABLE `ekg` (
  `id_ekg` int(11) NOT NULL,
  `no_mcu` varchar(25) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `heart_rate` varchar(50) DEFAULT NULL,
  `axis` varchar(50) DEFAULT NULL,
  `rhythm` varchar(50) DEFAULT NULL,
  `pr_interval` varchar(50) DEFAULT NULL,
  `resting_ecg` varchar(100) DEFAULT NULL,
  `suggestion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_pemeriksaan_mcu`
--

CREATE TABLE `item_pemeriksaan_mcu` (
  `id_item_pemeriksaan` int(11) NOT NULL,
  `item_pemeriksaan` varchar(100) DEFAULT NULL,
  `nilai_normal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_petugas`
--

CREATE TABLE `job_petugas` (
  `id_petugas_pelayanan` bigint(20) NOT NULL,
  `no_invoice` varchar(15) DEFAULT NULL,
  `nik_petugas` varchar(20) DEFAULT NULL,
  `nominal_tindakan` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_petugas`
--

INSERT INTO `job_petugas` (`id_petugas_pelayanan`, `no_invoice`, `nik_petugas`, `nominal_tindakan`) VALUES
(13, 'INV210106001', '01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mcu`
--

CREATE TABLE `mcu` (
  `id_mcu` bigint(20) NOT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `no_mcu` varchar(25) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tgl_mcu` date DEFAULT NULL,
  `saran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcu`
--

INSERT INTO `mcu` (`id_mcu`, `barcode`, `no_mcu`, `nik`, `tgl_mcu`, `saran`) VALUES
(1, '102329138', '102329138', '10283892', '2021-01-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcu_detail`
--

CREATE TABLE `mcu_detail` (
  `id_mcu_detail` bigint(20) NOT NULL,
  `no_mcu` varchar(25) DEFAULT NULL,
  `id_item_pemeriksaan` int(11) DEFAULT NULL,
  `hasil_mcu` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `harga_obat` double DEFAULT NULL,
  `jenis` enum('obat','non-obat','BMHP') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nama_obat`, `harga_obat`, `jenis`) VALUES
('001', 'Perban', 5000, 'non-obat'),
('002', 'Opimox tab', 3500, 'obat'),
('004', 'Pamol', 1500, 'BMHP'),
('005', 'Redoxon', 1500, 'obat'),
('006', 'Mestamox', 4000, 'obat'),
('301', 'Perban Streril', 3000, 'BMHP'),
('ACE002', 'Acetazolamide', 35000, 'non-obat'),
('MAXEF', 'MAXEFFFF', 100000, 'BMHP'),
('OB001', 'Bodrex', 35000, 'BMHP'),
('OB002', 'Diabetasol', 25000, 'non-obat');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nik` varchar(25) DEFAULT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `instansi` varchar(100) DEFAULT NULL,
  `satuan_kerja` varchar(100) DEFAULT NULL,
  `bagian` varchar(100) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(35) NOT NULL,
  `status_pasien` enum('UMUM','KHUSUS') NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nik`, `nama_pasien`, `tgl_lahir`, `gender`, `alamat`, `instansi`, `satuan_kerja`, `bagian`, `pangkat`, `no_telp`, `status_pasien`, `date_created`) VALUES
(1, '10283892', 'Afif Wijaya', '2021-01-07', 'L', 'Labuhan Ratu', 'POLDA LAMPUNG', 'POLDA LAMPUNG', 'IT', 'BRIPKA', '0182391283918', 'UMUM', '2021-01-07 02:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `pasienx`
--

CREATE TABLE `pasienx` (
  `nik` varchar(20) NOT NULL,
  `nama_pasien` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `alergi` text NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `tgl_registrasi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasienx`
--

INSERT INTO `pasienx` (`nik`, `nama_pasien`, `tgl_lahir`, `gender`, `no_telp`, `alamat`, `alergi`, `pekerjaan`, `tgl_registrasi`) VALUES
('0001', 'Paijo', '1992-05-01', 'L', '566455232423', 'fgdgdgd', '-', 'kuli bangunan', '2021-01-04 21:20:30'),
('01011111', 'Kanguci', '2021-01-04', 'L', '0896', 'Natar', '', '', '2021-01-04 00:32:52'),
('1000200', 'UCII', '2020-11-01', 'L', '08117211119', 'sRI pENDOOWO', 'Oskadon', 'Programmer', '2021-01-04 21:37:16'),
('102391029', 'Samroni', '1987-11-11', 'L', '345353535', 'tanjung seneng', '', '', '2020-11-25 22:51:59'),
('122232', 'gUNADI', '2020-11-01', 'L', '', 'mATARAM bARU', '', '', '2020-11-01 06:02:14'),
('122323232323', 'Langgeng', '2015-10-05', 'L', '085279876547', 'Sribhawono', '', '', '2020-12-03 01:50:47'),
('12335686899', 'EYANG IT', '2020-12-15', 'L', '087654', 'SRIBHAWOno', '', '', '2020-12-01 08:42:47'),
('1245678899', 'atsyl', '2020-01-01', 'L', '908tu', 'hhkjkjkj', '', '', '2020-12-01 08:22:59'),
('1802071405920008', 'thonie', '1992-05-14', 'L', '082372799157', 'Pemanggilan Natar', '', '', '2020-11-28 01:59:17'),
('1871116908860001', 'Dedi Feroza', '1991-01-01', 'L', '0815412765555', 'Sekampung', '', '', '2020-11-30 01:21:14'),
('1871116908860002', 'Bendi Riyanti', '1990-01-02', 'L', '0815412765454', 'Sukararaja', '', '', '2020-11-30 01:31:41'),
('234234242423', 'Wening Atimulyasari', '2020-11-09', 'P', '8765432', 'natar', '', '', '2020-11-28 20:08:31'),
('234342342', 'arta', '2020-11-11', 'L', '234234', 'gsdfdsfs', '', '', '2020-11-25 23:23:47'),
('45452342342', 'Japrak', '2020-11-19', 'P', '392849328', 'skdjfksjdf', '', '', '2020-11-25 23:12:03'),
('5541213123', 'toni', '2020-11-09', 'L', '3435353', 'natar', '', '', '2020-11-25 23:10:44'),
('647236949273947', 'arta', '2019-08-01', 'L', '7678678', 'hhffg', '', '', '2020-12-31 01:52:32'),
('857464849', 'Erik setiaji', '2016-01-08', 'L', '5678', 'Jl. PKOR PWH', '', '', '2020-12-08 00:37:08'),
('Nik-002', 'Eko W', '1988-10-02', 'L', '0895 3321 0042', 'Waykandis', '', '', '2020-10-16 00:58:27'),
('NIK003', 'Dedi Feroza', '1986-01-01', 'P', '085343567789', 'Tanjung Bintang', '', '', '2020-10-16 02:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaan_fisik`
--

CREATE TABLE `pemeriksaan_fisik` (
  `id_pemeriksaan` int(11) NOT NULL,
  `no_mcu` varchar(25) DEFAULT NULL,
  `keluhan` varchar(100) DEFAULT NULL,
  `operasi` varchar(100) DEFAULT NULL,
  `pengobatan` varchar(100) DEFAULT NULL,
  `konsumsi_obat` varchar(100) DEFAULT NULL,
  `tb` int(11) DEFAULT NULL,
  `bb` int(11) DEFAULT NULL,
  `bb_ideal` varchar(20) DEFAULT NULL,
  `lp` varchar(10) DEFAULT NULL,
  `imt` varchar(10) DEFAULT NULL,
  `persen_lemak` varchar(100) DEFAULT NULL,
  `sistole` varchar(10) DEFAULT NULL,
  `diastole` varchar(10) DEFAULT NULL,
  `nadi` varchar(10) DEFAULT NULL,
  `penglihatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nama_penyakit`) VALUES
('A01', 'Typhoid and Paratyphoid fevers'),
('A16', 'Tuberculosis respiratory'),
('B20', 'HIV / AIDS desease'),
('E10', 'Diabetes mullitus'),
('E79', 'Hyperuricaemia'),
('I00', 'Hipertensi'),
('I50', 'Congestive heart failure'),
('I64', 'Stroke'),
('J00', 'Common cold (acute nasopharyngitis)'),
('J02', 'Acute pharyngitis'),
('J03', 'Acute tonsillitis'),
('J45', 'Asthma'),
('L59', 'Erythema (Dermatitis)');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `nik_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('DOKTER','PERAWAT','APOTEKER','LABORATORIUM') DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `level_user` enum('ADMIN','PENDAFTARAN','PELAYANAN','OWNER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`nik_petugas`, `nama_petugas`, `gender`, `alamat`, `no_telp`, `password`, `status`, `last_login`, `level_user`) VALUES
('002', 'Gempita', 'P', 'kl', '790', NULL, 'PERAWAT', '0000-00-00 00:00:00', NULL),
('008', 'dayu', 'P', 'yioo', '0987', NULL, 'PERAWAT', '0000-00-00 00:00:00', NULL),
('01', 'dr yuni', 'P', 'balam', '08799', NULL, 'DOKTER', '0000-00-00 00:00:00', NULL),
('887', 'Adji', 'L', 'hjol', '08799', NULL, 'APOTEKER', '0000-00-00 00:00:00', NULL),
('admin', 'Mahira Anindya Assami', 'L', 'Bandar Lampung', '081541276509', '21232f297a57a5a743894a0e4a801fc3', 'PERAWAT', '2021-01-05 02:15:26', 'OWNER'),
('kasir', 'Samroni', 'L', 'Bandar Lampung', '081541276509', '202cb962ac59075b964b07152d234b70', 'DOKTER', '2020-12-03 10:31:12', 'ADMIN'),
('pelayanan', 'Dina Puspita Mandarini', 'P', 'Natar, Lampung Selatan', '0853 3301 1123', 'dfacc14c68e59736b622581601d972e2', 'PERAWAT', '2020-12-02 16:59:48', 'PELAYANAN'),
('pendaftaran', 'Putri Mayang Sari', 'P', 'Teluk Betung Bandar lampung', '0895 3321 0042', '202cb962ac59075b964b07152d234b70', 'PERAWAT', '2020-12-02 16:59:03', 'PENDAFTARAN'),
('thonie', 'thonie', 'L', 'natar', '082372799157', NULL, 'DOKTER', '2020-11-29 05:56:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poli_umum`
--

CREATE TABLE `poli_umum` (
  `no_invoice` varchar(15) NOT NULL,
  `no_registrasi` varchar(10) DEFAULT NULL,
  `tgl_pelayanan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keluhan` text DEFAULT NULL,
  `tb` float DEFAULT NULL,
  `bb` float DEFAULT NULL,
  `lp` float DEFAULT NULL,
  `imt` double DEFAULT NULL,
  `sistole` varchar(10) DEFAULT NULL,
  `diastole` varchar(10) DEFAULT NULL,
  `respiratory_rate` varchar(10) DEFAULT NULL,
  `heart_rate` varchar(10) DEFAULT NULL,
  `id_ig` int(11) DEFAULT NULL,
  `biaya_tindakan` double DEFAULT NULL,
  `status_pelayanan` enum('dalam proses','selesai') NOT NULL DEFAULT 'dalam proses',
  `pembayaran` enum('sudah','belum') NOT NULL DEFAULT 'belum'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli_umum`
--

INSERT INTO `poli_umum` (`no_invoice`, `no_registrasi`, `tgl_pelayanan`, `keluhan`, `tb`, `bb`, `lp`, `imt`, `sistole`, `diastole`, `respiratory_rate`, `heart_rate`, `id_ig`, `biaya_tindakan`, `status_pelayanan`, `pembayaran`) VALUES
('INV210105001', '210105001', '2021-01-04 18:43:35', 'mual', 180, 80, 55, 24, NULL, NULL, NULL, NULL, 2, 150000, 'selesai', 'sudah'),
('INV210105002', '210105002', '2021-01-04 20:00:38', 'asdf', 155, 45, 27, 18, NULL, NULL, NULL, NULL, 1, 250000, 'selesai', 'sudah'),
('INV210105003', '210105003', '2021-01-04 20:13:25', '-', 160, 50, 29, 19, NULL, NULL, NULL, NULL, 1, 250000, 'selesai', 'sudah'),
('INV210105004', '210105004', '2021-01-04 20:17:45', '-', 155, 50, 25, 20, NULL, NULL, NULL, NULL, 2, 150000, 'selesai', 'sudah'),
('INV210105005', '210105005', '2021-01-04 20:32:43', '-', 160, 60, 30, 23, NULL, NULL, NULL, NULL, 1, 250000, 'selesai', 'sudah'),
('INV210105006', '210105006', '2021-01-04 20:53:46', '-', 160, 70, 55, 27, NULL, NULL, NULL, NULL, 1, 250000, 'selesai', 'sudah'),
('INV210106001', '210106001', '2021-01-06 03:20:27', '-', 180, 80, 35, 24, '22', '22', '22', '22', NULL, NULL, 'selesai', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_reg` bigint(20) NOT NULL,
  `no_registrasi` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status` enum('dalam antrian','selesai') NOT NULL DEFAULT 'dalam antrian',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_reg`, `no_registrasi`, `nik`, `status`, `date_created`, `poli`) VALUES
(3, 210106001, '0001', 'selesai', '2021-01-06 09:47:58', 'UMUM');

-- --------------------------------------------------------

--
-- Table structure for table `rontgen`
--

CREATE TABLE `rontgen` (
  `id_xray` int(11) NOT NULL,
  `no_mcu` varchar(25) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `cor` text DEFAULT NULL,
  `pulmo` text DEFAULT NULL,
  `kesan` text DEFAULT NULL,
  `jenis_periksa` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `uname`, `nama`, `password`, `level`, `last_login`) VALUES
(1, 'admin', 'admin', '202cb962ac59075b964b07152d234b70', '', '2021-01-07 03:45:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekg`
--
ALTER TABLE `ekg`
  ADD PRIMARY KEY (`id_ekg`);

--
-- Indexes for table `item_pemeriksaan_mcu`
--
ALTER TABLE `item_pemeriksaan_mcu`
  ADD PRIMARY KEY (`id_item_pemeriksaan`);

--
-- Indexes for table `job_petugas`
--
ALTER TABLE `job_petugas`
  ADD PRIMARY KEY (`id_petugas_pelayanan`);

--
-- Indexes for table `mcu`
--
ALTER TABLE `mcu`
  ADD PRIMARY KEY (`id_mcu`);

--
-- Indexes for table `mcu_detail`
--
ALTER TABLE `mcu_detail`
  ADD PRIMARY KEY (`id_mcu_detail`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `pasienx`
--
ALTER TABLE `pasienx`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  ADD PRIMARY KEY (`id_pemeriksaan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`nik_petugas`);

--
-- Indexes for table `poli_umum`
--
ALTER TABLE `poli_umum`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `rontgen`
--
ALTER TABLE `rontgen`
  ADD PRIMARY KEY (`id_xray`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekg`
--
ALTER TABLE `ekg`
  MODIFY `id_ekg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_pemeriksaan_mcu`
--
ALTER TABLE `item_pemeriksaan_mcu`
  MODIFY `id_item_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_petugas`
--
ALTER TABLE `job_petugas`
  MODIFY `id_petugas_pelayanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mcu`
--
ALTER TABLE `mcu`
  MODIFY `id_mcu` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mcu_detail`
--
ALTER TABLE `mcu_detail`
  MODIFY `id_mcu_detail` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemeriksaan_fisik`
--
ALTER TABLE `pemeriksaan_fisik`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_reg` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rontgen`
--
ALTER TABLE `rontgen`
  MODIFY `id_xray` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
