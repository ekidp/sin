-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: administrasi
-- ------------------------------------------------------
-- Server version	5.6.21

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
INSERT INTO `master_anjas` VALUES (1,30071014,275000,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_bybuku`
--

LOCK TABLES `master_bybuku` WRITE;
/*!40000 ALTER TABLE `master_bybuku` DISABLE KEYS */;
INSERT INTO `master_bybuku` VALUES (1,2017,1,450000),(2,2017,2,460000),(3,2018,4,470000);
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
  PRIMARY KEY (`id_master_ms`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_ms`
--

LOCK TABLES `master_ms` WRITE;
/*!40000 ALTER TABLE `master_ms` DISABLE KEYS */;
INSERT INTO `master_ms` VALUES (1,'2018-05-01',8500,16),(2,'2018-06-01',8500,17),(3,'2018-07-01',8500,15);
/*!40000 ALTER TABLE `master_ms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_ppdb`
--

DROP TABLE IF EXISTS `master_ppdb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_ppdb` (
  `id_master_ppdb` int(11) NOT NULL,
  `NIS` int(11) DEFAULT NULL,
  `by_ppdb` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_master_ppdb`),
  KEY `master_ppdb` (`NIS`),
  CONSTRAINT `master_ppdb` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_ppdb`
--

LOCK TABLES `master_ppdb` WRITE;
/*!40000 ALTER TABLE `master_ppdb` DISABLE KEYS */;
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
  `alamat` varchar(50) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `pekerjaan _ibu` varchar(30) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `thn_ajaran` varchar(25) NOT NULL,
  `foto` varchar(2) NOT NULL,
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
INSERT INTO `master_siswa` VALUES (30071014,12345,'ABDULLAH NIBRAS SAINANDA SATRIYA','4A','L','PASURUAN','2008-02-26','islam','WONOLILO\r\n','SAIAN','TRISNAWATI','Karyawan Swasta','Karyawan Swasta','087846055327','2017','');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_spp`
--

LOCK TABLES `master_spp` WRITE;
/*!40000 ALTER TABLE `master_spp` DISABLE KEYS */;
INSERT INTO `master_spp` VALUES (1,30071014,200000);
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
  `NIS` int(11) NOT NULL,
  `tgl_bayar_anjas` date NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `bulan` date NOT NULL,
  PRIMARY KEY (`id_anjas`),
  KEY `tbl_anjas` (`id_master_anjas`),
  KEY `tbl_anjas2` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_anjas`
--

LOCK TABLES `tbl_anjas` WRITE;
/*!40000 ALTER TABLE `tbl_anjas` DISABLE KEYS */;
INSERT INTO `tbl_anjas` VALUES (3,1,30071014,'2018-05-28',1,'2018-02-01'),(4,1,30071014,'2018-05-28',1,'2018-03-01'),(5,1,30071014,'2018-05-28',1,'2018-04-01'),(6,1,30071014,'2018-05-28',1,'2018-05-01');
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
  `angsuran` varchar(3) NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `ansuranke` tinyint(1) DEFAULT NULL,
  `telahbayar` int(11) DEFAULT NULL,
  `sisa` int(11) DEFAULT NULL,
  `lunas` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `tbl_bybuku1` (`NIS`),
  KEY `master_bybuku_idx` (`id_master_buku`),
  CONSTRAINT `master_bybuku` FOREIGN KEY (`id_master_buku`) REFERENCES `master_bybuku` (`id_master_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_bybuku1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bybuku`
--

LOCK TABLES `tbl_bybuku` WRITE;
/*!40000 ALTER TABLE `tbl_bybuku` DISABLE KEYS */;
INSERT INTO `tbl_bybuku` VALUES (1,1,30071014,'2018-05-28 15:22:31.000000','300',1,NULL,NULL,NULL,NULL);
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
  PRIMARY KEY (`id_keg`),
  KEY `tbl_kegiatan1` (`NIS`),
  KEY `master_keg_idx` (`id_master_keg`),
  CONSTRAINT `master_keg` FOREIGN KEY (`id_master_keg`) REFERENCES `master_kegiatan` (`id_master_keg`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_kegiatan1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kegiatan`
--

LOCK TABLES `tbl_kegiatan` WRITE;
/*!40000 ALTER TABLE `tbl_kegiatan` DISABLE KEYS */;
INSERT INTO `tbl_kegiatan` VALUES (12,1,30071014,'2018-06-04',100000,1,100000,1200000,1,0),(13,1,30071014,'2018-06-04',500000,2,600000,700000,1,0),(15,1,30071014,'2018-06-05',700000,3,1300000,0,1,1);
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
  `NIS` int(11) NOT NULL,
  `id_master_ppdb` int(11) NOT NULL,
  `angsuran` int(11) NOT NULL,
  `tgl_angsuran` datetime NOT NULL,
  `by_angsur` int(11) NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_ppdb`),
  KEY `tbl_ppdb1` (`id_master_ppdb`),
  KEY `tbl_ppdb0` (`NIS`),
  CONSTRAINT `tbl_ppdb0` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`),
  CONSTRAINT `tbl_ppdb1` FOREIGN KEY (`id_master_ppdb`) REFERENCES `master_ppdb` (`id_master_ppdb`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ppdb`
--

LOCK TABLES `tbl_ppdb` WRITE;
/*!40000 ALTER TABLE `tbl_ppdb` DISABLE KEYS */;
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
  PRIMARY KEY (`id_spp_ms`),
  KEY `tbl_spp_ms` (`id_master_spp`),
  KEY `tbl_spp_ms1` (`NIS`),
  KEY `fk_master_ms_idx` (`id_master_ms`),
  CONSTRAINT `fk_master_ms` FOREIGN KEY (`id_master_ms`) REFERENCES `master_ms` (`id_master_ms`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tbl_spp_ms` FOREIGN KEY (`id_master_spp`) REFERENCES `master_spp` (`id_master_spp`),
  CONSTRAINT `tbl_spp_ms1` FOREIGN KEY (`NIS`) REFERENCES `master_siswa` (`NIS`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_spp_ms`
--

LOCK TABLES `tbl_spp_ms` WRITE;
/*!40000 ALTER TABLE `tbl_spp_ms` DISABLE KEYS */;
INSERT INTO `tbl_spp_ms` VALUES (3,1,30071014,'2018-05-01','2018-05-30 00:00:00',1,1),(10,1,30071014,'2018-06-01','2018-05-28 15:22:31',1,2);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-05 14:59:07
