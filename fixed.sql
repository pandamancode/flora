/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - kalomyid_klinik_flora
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kalomyid_klinik_flora` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `kalomyid_klinik_flora`;

/*Table structure for table `ekg` */

DROP TABLE IF EXISTS `ekg`;

CREATE TABLE `ekg` (
  `id_ekg` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `heart_rate` varchar(50) DEFAULT NULL,
  `axis` varchar(50) DEFAULT NULL,
  `rhythm` varchar(50) DEFAULT NULL,
  `pr_interval` varchar(50) DEFAULT NULL,
  `resting_ecg` varchar(100) DEFAULT NULL,
  `suggestion` varchar(100) DEFAULT NULL,
  `saran` text DEFAULT NULL,
  PRIMARY KEY (`id_ekg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ekg` */

insert  into `ekg`(`id_ekg`,`no_mcu`,`heart_rate`,`axis`,`rhythm`,`pr_interval`,`resting_ecg`,`suggestion`,`saran`) values 
(1,'1610021621-1','80','80','80','80','80','80','skjfdksdjf skdfjskd');

/*Table structure for table `fisioterapi` */

DROP TABLE IF EXISTS `fisioterapi`;

CREATE TABLE `fisioterapi` (
  `id_fisioterapi` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `diagnosa` varchar(255) DEFAULT NULL,
  `tindakan` varchar(255) DEFAULT NULL,
  `evaluasi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_fisioterapi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `fisioterapi` */

insert  into `fisioterapi`(`id_fisioterapi`,`no_mcu`,`keterangan`,`diagnosa`,`tindakan`,`evaluasi`) values 
(1,'1610021621-10','asdf','asdf','asdf','adsf');

/*Table structure for table `hematologi` */

DROP TABLE IF EXISTS `hematologi`;

CREATE TABLE `hematologi` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `hemoglobin` varchar(255) NOT NULL DEFAULT '|',
  `eritrosit` varchar(255) NOT NULL DEFAULT '|',
  `hematokrit` varchar(255) NOT NULL DEFAULT '|',
  `lekosit` varchar(255) NOT NULL DEFAULT '|',
  `trombosit` varchar(255) NOT NULL DEFAULT '|',
  `mcv` varchar(255) NOT NULL DEFAULT '|',
  `mch` varchar(255) NOT NULL DEFAULT '|',
  `mchc` varchar(255) NOT NULL DEFAULT '|',
  `basofil` varchar(255) NOT NULL DEFAULT '|',
  `eosinofil` varchar(255) NOT NULL DEFAULT '|',
  `netrofil_batang` varchar(255) NOT NULL DEFAULT '|',
  `netrofil_segmen` varchar(255) NOT NULL DEFAULT '|',
  `limfosit` varchar(255) NOT NULL DEFAULT '|',
  `monosit` varchar(255) NOT NULL DEFAULT '|',
  `led` varchar(255) NOT NULL DEFAULT '|',
  `hasil_hematologi` text DEFAULT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `hematologi` */

insert  into `hematologi`(`id_lab`,`no_mcu`,`hemoglobin`,`eritrosit`,`hematokrit`,`lekosit`,`trombosit`,`mcv`,`mch`,`mchc`,`basofil`,`eosinofil`,`netrofil_batang`,`netrofil_segmen`,`limfosit`,`monosit`,`led`,`hasil_hematologi`) values 
(2,'1610021621-10','12.1**|-','3.8**|-','3.7|-','6.5|-','226|-','89|-','31|-','35|-','0|-','1|-','4|-','53|-','39|-','3|-','8|-',NULL);

/*Table structure for table `immunologi` */

DROP TABLE IF EXISTS `immunologi`;

CREATE TABLE `immunologi` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `widal` varchar(255) NOT NULL DEFAULT '|',
  `salmonela` varchar(255) NOT NULL DEFAULT '|',
  `malaria` varchar(255) NOT NULL DEFAULT '|',
  `dhf` varchar(255) NOT NULL DEFAULT '|',
  `hbsag` varchar(255) NOT NULL DEFAULT '|',
  `narkoba` varchar(255) NOT NULL DEFAULT '|',
  `sifilis` varchar(255) NOT NULL DEFAULT '|',
  `hiv` varchar(255) NOT NULL DEFAULT '|',
  `hasil_immunologi` text DEFAULT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `immunologi` */

insert  into `immunologi`(`id_lab`,`no_mcu`,`widal`,`salmonela`,`malaria`,`dhf`,`hbsag`,`narkoba`,`sifilis`,`hiv`,`hasil_immunologi`) values 
(2,'1610021621-10','1|-','1|-','1|-','23|-','2|-','1|-','4|-','4|-',NULL);

/*Table structure for table `item_pemeriksaan_mcu` */

DROP TABLE IF EXISTS `item_pemeriksaan_mcu`;

CREATE TABLE `item_pemeriksaan_mcu` (
  `id_item_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT,
  `item_pemeriksaan` varchar(100) DEFAULT NULL,
  `nilai_normal` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_item_pemeriksaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_pemeriksaan_mcu` */

/*Table structure for table `job_petugas` */

DROP TABLE IF EXISTS `job_petugas`;

CREATE TABLE `job_petugas` (
  `id_petugas_pelayanan` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(15) DEFAULT NULL,
  `nik_petugas` varchar(20) DEFAULT NULL,
  `nominal_tindakan` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_petugas_pelayanan`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `job_petugas` */

insert  into `job_petugas`(`id_petugas_pelayanan`,`no_invoice`,`nik_petugas`,`nominal_tindakan`) values 
(13,'INV210106001','01',0);

/*Table structure for table `kimia_darah` */

DROP TABLE IF EXISTS `kimia_darah`;

CREATE TABLE `kimia_darah` (
  `id_lab` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `kolesterol` varchar(255) NOT NULL DEFAULT '|',
  `hdl` varchar(255) NOT NULL DEFAULT '|',
  `ldl` varchar(255) NOT NULL DEFAULT '|',
  `trigliserida` varchar(255) NOT NULL DEFAULT '|',
  `ureum` varchar(255) NOT NULL DEFAULT '|',
  `kreatinin` varchar(255) NOT NULL DEFAULT '|',
  `asam_urat` varchar(255) NOT NULL DEFAULT '|',
  `sgot` varchar(255) NOT NULL DEFAULT '|',
  `sgpt` varchar(255) NOT NULL DEFAULT '|',
  `sewaktu` varchar(255) NOT NULL DEFAULT '|',
  `puasa` varchar(255) NOT NULL DEFAULT '|',
  `hasil_kimia_darah` text DEFAULT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kimia_darah` */

insert  into `kimia_darah`(`id_lab`,`no_mcu`,`kolesterol`,`hdl`,`ldl`,`trigliserida`,`ureum`,`kreatinin`,`asam_urat`,`sgot`,`sgpt`,`sewaktu`,`puasa`,`hasil_kimia_darah`) values 
(2,'1610021621-10','174|-','64|-','95|-','77|-','21|-','0.8|-','2.6|-','-|-','-|-','-|-','84|-',NULL);

/*Table structure for table `mcu` */

DROP TABLE IF EXISTS `mcu`;

CREATE TABLE `mcu` (
  `id_mcu` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `tgl_mcu` date DEFAULT NULL,
  `saran` text DEFAULT NULL,
  `print` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_mcu`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mcu` */

insert  into `mcu`(`id_mcu`,`no_mcu`,`nik`,`tgl_mcu`,`saran`,`print`) values 
(1,'1610021621-1','10283892','2021-01-07',NULL,'0'),
(3,'1610021621-2','74293894829','2021-01-07',NULL,'0'),
(6,'4578','10283892','2021-01-08',NULL,'0'),
(7,'1234','10283892','2021-01-08',NULL,'0'),
(8,'1610021621-10','1610021621-10','2021-01-08',NULL,'0');

/*Table structure for table `mcu_detail` */

DROP TABLE IF EXISTS `mcu_detail`;

CREATE TABLE `mcu_detail` (
  `id_mcu_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `id_item_pemeriksaan` int(11) DEFAULT NULL,
  `hasil_mcu` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_mcu_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mcu_detail` */

/*Table structure for table `obat` */

DROP TABLE IF EXISTS `obat`;

CREATE TABLE `obat` (
  `kd_obat` varchar(15) NOT NULL,
  `nama_obat` varchar(50) DEFAULT NULL,
  `harga_obat` double DEFAULT NULL,
  `jenis` enum('obat','non-obat','BMHP') DEFAULT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `obat` */

insert  into `obat`(`kd_obat`,`nama_obat`,`harga_obat`,`jenis`) values 
('001','Perban',5000,'non-obat'),
('002','Opimox tab',3500,'obat'),
('004','Pamol',1500,'BMHP'),
('005','Redoxon',1500,'obat'),
('006','Mestamox',4000,'obat'),
('301','Perban Streril',3000,'BMHP'),
('ACE002','Acetazolamide',35000,'non-obat'),
('MAXEF','MAXEFFFF',100000,'BMHP'),
('OB001','Bodrex',35000,'BMHP'),
('OB002','Diabetasol',25000,'non-obat');

/*Table structure for table `pasien` */

DROP TABLE IF EXISTS `pasien`;

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL AUTO_INCREMENT,
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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `pasien` */

insert  into `pasien`(`id_pasien`,`nik`,`nama_pasien`,`tgl_lahir`,`gender`,`alamat`,`instansi`,`satuan_kerja`,`bagian`,`pangkat`,`no_telp`,`status_pasien`,`date_created`) values 
(1,'10283892','Afif Wijaya','1996-01-07','L','Labuhan Ratu','POLDA LAMPUNG','POLDA LAMPUNG','IT','BRIPKA','0182391283918','UMUM','2021-01-07 05:57:04'),
(2,'74293894829','arta','2021-01-07','L','sdfsdf','polda lampung','polresta bandarlampung','lantas','bripka','7809','UMUM','2021-01-07 15:10:02'),
(3,'1610021621-10','andri','2017-06-05','L','rthjj','polri','polsek','lantas','bripol','09876','UMUM','2021-01-08 11:09:30');

/*Table structure for table `pemeriksaan_fisik` */

DROP TABLE IF EXISTS `pemeriksaan_fisik`;

CREATE TABLE `pemeriksaan_fisik` (
  `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT,
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
  `tekanan_darah` varchar(10) DEFAULT NULL,
  `suhu` varchar(10) DEFAULT NULL,
  `nadi` varchar(10) DEFAULT NULL,
  `penglihatan` varchar(100) DEFAULT NULL,
  `saran` text DEFAULT NULL,
  PRIMARY KEY (`id_pemeriksaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pemeriksaan_fisik` */

insert  into `pemeriksaan_fisik`(`id_pemeriksaan`,`no_mcu`,`keluhan`,`operasi`,`pengobatan`,`konsumsi_obat`,`tb`,`bb`,`bb_ideal`,`lp`,`imt`,`persen_lemak`,`tekanan_darah`,`suhu`,`nadi`,`penglihatan`,`saran`) values 
(1,'1610021621-1','skdfjs sdksdjk','ksjdkfj','ksjdfkj','skjfksj',180,80,'80','50','24','-','-','-','asdf','adfs','sdjfksdjf');

/*Table structure for table `penyakit` */

DROP TABLE IF EXISTS `penyakit`;

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_penyakit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `penyakit` */

insert  into `penyakit`(`kd_penyakit`,`nama_penyakit`) values 
('A01','Typhoid and Paratyphoid fevers'),
('A16','Tuberculosis respiratory'),
('B20','HIV / AIDS desease'),
('E10','Diabetes mullitus'),
('E79','Hyperuricaemia'),
('I00','Hipertensi'),
('I50','Congestive heart failure'),
('I64','Stroke'),
('J00','Common cold (acute nasopharyngitis)'),
('J02','Acute pharyngitis'),
('J03','Acute tonsillitis'),
('J45','Asthma'),
('L59','Erythema (Dermatitis)');

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `nik_petugas` varchar(20) NOT NULL,
  `nama_petugas` varchar(50) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('DOKTER','PERAWAT','APOTEKER','LABORATORIUM') DEFAULT NULL,
  `last_login` datetime NOT NULL,
  `level_user` enum('ADMIN','PENDAFTARAN','PELAYANAN','OWNER') DEFAULT NULL,
  PRIMARY KEY (`nik_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `petugas` */

insert  into `petugas`(`nik_petugas`,`nama_petugas`,`gender`,`alamat`,`no_telp`,`password`,`status`,`last_login`,`level_user`) values 
('002','Gempita','P','kl','790',NULL,'PERAWAT','0000-00-00 00:00:00',NULL),
('008','dayu','P','yioo','0987',NULL,'PERAWAT','0000-00-00 00:00:00',NULL),
('01','dr yuni','P','balam','08799',NULL,'DOKTER','0000-00-00 00:00:00',NULL),
('887','Adji','L','hjol','08799',NULL,'APOTEKER','0000-00-00 00:00:00',NULL),
('admin','Mahira Anindya Assami','L','Bandar Lampung','081541276509','21232f297a57a5a743894a0e4a801fc3','PERAWAT','2021-01-05 02:15:26','OWNER'),
('kasir','Samroni','L','Bandar Lampung','081541276509','202cb962ac59075b964b07152d234b70','DOKTER','2020-12-03 10:31:12','ADMIN'),
('pelayanan','Dina Puspita Mandarini','P','Natar, Lampung Selatan','0853 3301 1123','dfacc14c68e59736b622581601d972e2','PERAWAT','2020-12-02 16:59:48','PELAYANAN'),
('pendaftaran','Putri Mayang Sari','P','Teluk Betung Bandar lampung','0895 3321 0042','202cb962ac59075b964b07152d234b70','PERAWAT','2020-12-02 16:59:03','PENDAFTARAN'),
('thonie','thonie','L','natar','082372799157',NULL,'DOKTER','2020-11-29 05:56:35',NULL);

/*Table structure for table `poli_umum` */

DROP TABLE IF EXISTS `poli_umum`;

CREATE TABLE `poli_umum` (
  `no_invoice` varchar(15) NOT NULL,
  `no_registrasi` varchar(10) DEFAULT NULL,
  `no_rm` varchar(25) DEFAULT NULL,
  `tgl_pelayanan` date NOT NULL,
  `keluhan` text DEFAULT NULL,
  `tb` float DEFAULT NULL,
  `bb` float DEFAULT NULL,
  `lp` float DEFAULT NULL,
  `imt` double DEFAULT NULL,
  `tekanan_darah` varchar(10) DEFAULT NULL,
  `suhu` varchar(10) DEFAULT NULL,
  `respiratory_rate` varchar(10) DEFAULT NULL,
  `heart_rate` varchar(10) DEFAULT NULL,
  `id_ig` int(11) DEFAULT NULL,
  `biaya_tindakan` double DEFAULT NULL,
  `status_pelayanan` enum('dalam proses','selesai') NOT NULL DEFAULT 'dalam proses',
  `pembayaran` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `saran` text DEFAULT NULL,
  PRIMARY KEY (`no_invoice`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `poli_umum` */

insert  into `poli_umum`(`no_invoice`,`no_registrasi`,`no_rm`,`tgl_pelayanan`,`keluhan`,`tb`,`bb`,`lp`,`imt`,`tekanan_darah`,`suhu`,`respiratory_rate`,`heart_rate`,`id_ig`,`biaya_tindakan`,`status_pelayanan`,`pembayaran`,`saran`) values 
('INV210112001','210112001','RM210112001','2021-01-12','mual muntah, pusing',165,60,32,22,'120/80','36','-','-',NULL,NULL,'selesai','belum','Banyak istrahat');

/*Table structure for table `registrasi` */

DROP TABLE IF EXISTS `registrasi`;

CREATE TABLE `registrasi` (
  `id_reg` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_registrasi` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `status` enum('dalam antrian','selesai') NOT NULL DEFAULT 'dalam antrian',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_reg`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `registrasi` */

insert  into `registrasi`(`id_reg`,`no_registrasi`,`nik`,`status`,`date_created`) values 
(1,210112001,'74293894829','dalam antrian','2021-01-12 10:34:51');

/*Table structure for table `rontgen` */

DROP TABLE IF EXISTS `rontgen`;

CREATE TABLE `rontgen` (
  `id_xray` int(11) NOT NULL AUTO_INCREMENT,
  `no_mcu` varchar(25) DEFAULT NULL,
  `cor` text DEFAULT NULL,
  `pulmo` text DEFAULT NULL,
  `kesan` text DEFAULT NULL,
  `jenis_periksa` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL,
  `saran` text DEFAULT NULL,
  PRIMARY KEY (`id_xray`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `rontgen` */

insert  into `rontgen`(`id_xray`,`no_mcu`,`cor`,`pulmo`,`kesan`,`jenis_periksa`,`tgl_periksa`,`saran`) values 
(1,'1610021621-1','fgfghj','hjkjfgf','gghjk','hjhkl','2021-01-07','sfkjs skdjfskd sdkfjs');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id_user`,`uname`,`nama`,`password`,`level`,`last_login`) values 
(1,'admin','admin','202cb962ac59075b964b07152d234b70','','2021-01-12 09:12:33');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
