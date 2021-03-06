CREATE DATABASE  IF NOT EXISTS `administrasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `administrasi`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: administrasi
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `master_anjas`
--

DROP TABLE IF EXISTS `master_anjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_anjas` (
  `id_ms_anjas` int(11) NOT NULL AUTO_INCREMENT,
  `NIS` int(11) NOT NULL,
  `by_anjas` int(11) NOT NULL,
  `potongan` int(3) NOT NULL,
  PRIMARY KEY (`id_ms_anjas`),
  KEY `master_anjas` (`NIS`),
  CONSTRAINT `master_anjas` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_anjas`
--

LOCK TABLES `master_anjas` WRITE;
/*!40000 ALTER TABLE `master_anjas` DISABLE KEYS */;
INSERT INTO `master_anjas` VALUES (1,30071014,275000,3);
/*!40000 ALTER TABLE `master_anjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_bybuku`
--

DROP TABLE IF EXISTS `master_bybuku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_bybuku` (
  `id_master_buku` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `harga_buku` int(11) NOT NULL,
  PRIMARY KEY (`id_master_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_bybuku`
--

LOCK TABLES `master_bybuku` WRITE;
/*!40000 ALTER TABLE `master_bybuku` DISABLE KEYS */;
INSERT INTO `master_bybuku` VALUES (1,2017,1,450000),(2,2017,2,460000),(3,2018,4,470000),(4,2019,5,480000),(5,2018,1,470000);
/*!40000 ALTER TABLE `master_bybuku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_kegiatan`
--

DROP TABLE IF EXISTS `master_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_kegiatan` (
  `id_master_keg` int(11) NOT NULL AUTO_INCREMENT,
  `Tahun` varchar(20) DEFAULT NULL,
  `by_keg` int(30) DEFAULT NULL,
  PRIMARY KEY (`id_master_keg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_kegiatan`
--

LOCK TABLES `master_kegiatan` WRITE;
/*!40000 ALTER TABLE `master_kegiatan` DISABLE KEYS */;
INSERT INTO `master_kegiatan` VALUES (1,'2017',1300000),(2,'2018',1400000),(3,'2019',1500000);
/*!40000 ALTER TABLE `master_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_ms`
--

DROP TABLE IF EXISTS `master_ms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_ms` (
  `id_master_ms` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  PRIMARY KEY (`id_master_ms`),
  UNIQUE KEY `bulan_UNIQUE` (`bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_ms`
--

LOCK TABLES `master_ms` WRITE;
/*!40000 ALTER TABLE `master_ms` DISABLE KEYS */;
INSERT INTO `master_ms` VALUES (1,'2018-05-01',8500,16),(2,'2018-06-01',8500,17),(3,'2018-07-01',8500,15),(6,'2018-08-01',8500,14),(7,'2018-09-01',8500,17),(8,'2018-10-01',8500,15);
/*!40000 ALTER TABLE `master_ms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_potanjas`
--

DROP TABLE IF EXISTS `master_potanjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_potanjas` (
  `idpotanjas` int(11) NOT NULL AUTO_INCREMENT,
  `bulan` date NOT NULL,
  `potongan` int(11) NOT NULL,
  PRIMARY KEY (`idpotanjas`),
  UNIQUE KEY `bulan_UNIQUE` (`bulan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_potanjas`
--

LOCK TABLES `master_potanjas` WRITE;
/*!40000 ALTER TABLE `master_potanjas` DISABLE KEYS */;
INSERT INTO `master_potanjas` VALUES (1,'2018-09-01',3),(2,'2018-10-01',3);
/*!40000 ALTER TABLE `master_potanjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_ppdb`
--

DROP TABLE IF EXISTS `master_ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_ppdb` (
  `id_master_ppdb` int(11) NOT NULL AUTO_INCREMENT,
  `NIS` int(11) DEFAULT NULL,
  `by_ppdb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_master_ppdb`),
  KEY `master_ppdb` (`NIS`),
  CONSTRAINT `master_ppdb` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_ppdb`
--

LOCK TABLES `master_ppdb` WRITE;
/*!40000 ALTER TABLE `master_ppdb` DISABLE KEYS */;
INSERT INTO `master_ppdb` VALUES (2,30071015,4000000),(4,30071014,4000000);
/*!40000 ALTER TABLE `master_ppdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_siswa`
--

DROP TABLE IF EXISTS `master_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_siswa` (
  `NIS` int(11) NOT NULL,
  `password` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(30) DEFAULT NULL,
  `nama_ibu` varchar(30) DEFAULT NULL,
  `pekerjaan_ayah` varchar(30) DEFAULT NULL,
  `pekerjaan _ibu` varchar(30) DEFAULT NULL,
  `no_telp` varchar(25) DEFAULT NULL,
  `thn_ajaran` varchar(25) DEFAULT NULL,
  `foto` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`NIS`),
  KEY `master_siswa` (`kelas`),
  CONSTRAINT `master_siswa` FOREIGN KEY (`kelas`) REFERENCES `tbl_kelas_siswa` (`kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_siswa`
--

LOCK TABLES `master_siswa` WRITE;
/*!40000 ALTER TABLE `master_siswa` DISABLE KEYS */;
INSERT INTO `master_siswa` VALUES (30071014,12345,'ABDULLAH NIBRAS SAINANDA SATRIYA','4A','L','PASURUAN','2008-02-26','islam','WONOLILO\r\n','SAIAN','TRISNAWATI','Karyawan Swasta','Karyawan Swasta','087846055327','2017',''),(30071015,123,'DIAN SAFITRI','1','P','PASURUAN','2000-07-10','islam',NULL,NULL,NULL,NULL,NULL,NULL,'2018',NULL);
/*!40000 ALTER TABLE `master_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_spp`
--

DROP TABLE IF EXISTS `master_spp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_spp` (
  `id_master_spp` int(11) NOT NULL AUTO_INCREMENT,
  `NIS` int(11) NOT NULL,
  `pemb_spp` int(20) NOT NULL,
  PRIMARY KEY (`id_master_spp`),
  KEY `master_spp_ms` (`NIS`),
  CONSTRAINT `master_spp_ms` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_spp`
--

LOCK TABLES `master_spp` WRITE;
/*!40000 ALTER TABLE `master_spp` DISABLE KEYS */;
INSERT INTO `master_spp` VALUES (1,30071014,200000),(4,30071015,200000);
/*!40000 ALTER TABLE `master_spp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_anjas`
--

DROP TABLE IF EXISTS `tbl_anjas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_anjas` (
  `id_anjas` int(11) NOT NULL AUTO_INCREMENT,
  `id_master_anjas` int(11) NOT NULL,
  `tgl_bayar_anjas` date NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `bulan` date NOT NULL,
  `idtransfer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_anjas`),
  KEY `tbl_anjas` (`id_master_anjas`),
  KEY `tfanjas_idx` (`idtransfer`),
  CONSTRAINT `fk_master_anjas` FOREIGN KEY (`id_master_anjas`) REFERENCES `master_anjas` (`id_ms_anjas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tfanjas` FOREIGN KEY (`idtransfer`) REFERENCES `transfer` (`idtransfer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anjas`
--

LOCK TABLES `tbl_anjas` WRITE;
/*!40000 ALTER TABLE `tbl_anjas` DISABLE KEYS */;
INSERT INTO `tbl_anjas` VALUES (15,1,'2018-07-08',0,'2018-09-01',2);
/*!40000 ALTER TABLE `tbl_anjas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bybuku`
--

DROP TABLE IF EXISTS `tbl_bybuku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bybuku` (
  `id_buku` int(15) NOT NULL AUTO_INCREMENT,
  `id_master_buku` int(11) DEFAULT NULL,
  `NIS` int(15) DEFAULT NULL,
  `tgl_bayar_buku` datetime(6) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `angsuranke` tinyint(1) DEFAULT NULL,
  `telahbayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `lunas` tinyint(1) DEFAULT NULL,
  `idtransfer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `tbl_bybuku1` (`NIS`),
  KEY `master_bybuku_idx` (`id_master_buku`),
  KEY `tf_buku_idx` (`idtransfer`),
  CONSTRAINT `master_bybuku` FOREIGN KEY (`id_master_buku`) REFERENCES `master_bybuku` (`id_master_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_bybuku1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`),
  CONSTRAINT `tf_buku` FOREIGN KEY (`idtransfer`) REFERENCES `transfer` (`idtransfer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bybuku`
--

LOCK TABLES `tbl_bybuku` WRITE;
/*!40000 ALTER TABLE `tbl_bybuku` DISABLE KEYS */;
INSERT INTO `tbl_bybuku` VALUES (1,3,30071014,'2018-07-08 12:40:17.000000',200000,0,1,200000,270000,0,2);
/*!40000 ALTER TABLE `tbl_bybuku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kegiatan`
--

DROP TABLE IF EXISTS `tbl_kegiatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kegiatan` (
  `id_keg` int(11) NOT NULL AUTO_INCREMENT,
  `id_master_keg` int(11) DEFAULT NULL,
  `NIS` int(11) DEFAULT NULL,
  `tgl_bayar_keg` date NOT NULL,
  `angsuran` int(5) NOT NULL,
  `angsuranke` int(1) DEFAULT NULL,
  `telahbayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `validasi` tinyint(1) NOT NULL DEFAULT '0',
  `lunas` tinyint(1) NOT NULL DEFAULT '0',
  `idtransfer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keg`),
  KEY `tbl_kegiatan1` (`NIS`),
  KEY `master_keg_idx` (`id_master_keg`),
  KEY `tfkeg_idx` (`idtransfer`),
  CONSTRAINT `master_keg` FOREIGN KEY (`id_master_keg`) REFERENCES `master_kegiatan` (`id_master_keg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_kegiatan1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`),
  CONSTRAINT `tfkeg` FOREIGN KEY (`idtransfer`) REFERENCES `transfer` (`idtransfer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kegiatan`
--

LOCK TABLES `tbl_kegiatan` WRITE;
/*!40000 ALTER TABLE `tbl_kegiatan` DISABLE KEYS */;
INSERT INTO `tbl_kegiatan` VALUES (1,1,30071014,'2018-07-08',500000,1,500000,800000,0,0,2);
/*!40000 ALTER TABLE `tbl_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kelas_siswa`
--

DROP TABLE IF EXISTS `tbl_kelas_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kelas_siswa` (
  `kelas` varchar(2) NOT NULL,
  `tingkat` int(1) NOT NULL,
  PRIMARY KEY (`kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kelas_siswa`
--

LOCK TABLES `tbl_kelas_siswa` WRITE;
/*!40000 ALTER TABLE `tbl_kelas_siswa` DISABLE KEYS */;
INSERT INTO `tbl_kelas_siswa` VALUES ('1',1),('2',2),('3A',3),('3B',3),('4A',4),('4B',4),('5',5),('6',6);
/*!40000 ALTER TABLE `tbl_kelas_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ppdb`
--

DROP TABLE IF EXISTS `tbl_ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ppdb` (
  `id_ppdb` int(11) NOT NULL AUTO_INCREMENT,
  `id_master_ppdb` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `tgl_angsuran` datetime NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `angsuranke` int(11) DEFAULT NULL,
  `telahbayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `lunas` tinyint(1) DEFAULT NULL,
  `idtransfer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ppdb`),
  KEY `ppdb_idx` (`id_master_ppdb`),
  KEY `tfppdb_idx` (`idtransfer`),
  CONSTRAINT `ppdb` FOREIGN KEY (`id_master_ppdb`) REFERENCES `master_ppdb` (`id_master_ppdb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tfppdb` FOREIGN KEY (`idtransfer`) REFERENCES `transfer` (`idtransfer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ppdb`
--

LOCK TABLES `tbl_ppdb` WRITE;
/*!40000 ALTER TABLE `tbl_ppdb` DISABLE KEYS */;
INSERT INTO `tbl_ppdb` VALUES (1,4,2000000,'2018-07-08 12:40:17',0,1,2000000,2000000,0,2);
/*!40000 ALTER TABLE `tbl_ppdb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_spp_ms`
--

DROP TABLE IF EXISTS `tbl_spp_ms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_spp_ms` (
  `id_spp_ms` int(15) NOT NULL AUTO_INCREMENT,
  `id_master_spp` int(11) DEFAULT NULL,
  `NIS` int(11) DEFAULT NULL,
  `bulan` date NOT NULL,
  `tgl_bayar_spp` datetime NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `id_master_ms` int(11) DEFAULT NULL,
  `keterangan` varchar(45) DEFAULT NULL,
  `idtransfer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_spp_ms`),
  KEY `tbl_spp_ms` (`id_master_spp`),
  KEY `tbl_spp_ms1` (`NIS`),
  KEY `fk_master_ms_idx` (`id_master_ms`),
  KEY `tfspp_idx` (`idtransfer`),
  CONSTRAINT `fk_master_ms` FOREIGN KEY (`id_master_ms`) REFERENCES `master_ms` (`id_master_ms`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_spp_ms` FOREIGN KEY (`id_master_spp`) REFERENCES `master_spp` (`id_master_spp`),
  CONSTRAINT `tbl_spp_ms1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`),
  CONSTRAINT `tfspp` FOREIGN KEY (`idtransfer`) REFERENCES `transfer` (`idtransfer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_spp_ms`
--

LOCK TABLES `tbl_spp_ms` WRITE;
/*!40000 ALTER TABLE `tbl_spp_ms` DISABLE KEYS */;
INSERT INTO `tbl_spp_ms` VALUES (1,1,30071014,'2018-06-01','2018-07-08 12:40:17',0,2,NULL,2);
/*!40000 ALTER TABLE `tbl_spp_ms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL AUTO_INCREMENT,
  `username` int(20) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,123456,'admin','administrator');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer` (
  `idtransfer` int(11) NOT NULL AUTO_INCREMENT,
  `norek` int(45) NOT NULL,
  `noref` int(45) NOT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtransfer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer`
--

LOCK TABLES `transfer` WRITE;
/*!40000 ALTER TABLE `transfer` DISABLE KEYS */;
INSERT INTO `transfer` VALUES (1,123456,876543,NULL),(2,1234567,876543,200000);
/*!40000 ALTER TABLE `transfer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-08 12:50:11
