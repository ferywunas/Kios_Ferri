-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_kios
-- ------------------------------------------------------
-- Server version	8.0.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `ID_Kategori` int NOT NULL AUTO_INCREMENT,
  `Nama_Kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (2,'Mie Instan'),(3,'Minuman Bersoda'),(5,'Minuman Manis'),(6,'Air Mineral Kemasan Botol'),(7,'Air Mineral Kemasan Gelas'),(8,'Makanan Ringan');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `laporan` (
  `ID_Laporan` int NOT NULL AUTO_INCREMENT,
  `ID_Penjualan` int DEFAULT NULL,
  `Tanggal_Laporan` date DEFAULT NULL,
  `Isi_Laporan` text,
  PRIMARY KEY (`ID_Laporan`),
  KEY `ID_Penjualan` (`ID_Penjualan`),
  CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`ID_Penjualan`) REFERENCES `penjualan` (`ID_Penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laporan`
--

LOCK TABLES `laporan` WRITE;
/*!40000 ALTER TABLE `laporan` DISABLE KEYS */;
/*!40000 ALTER TABLE `laporan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelanggan` (
  `ID_Pelanggan` int NOT NULL AUTO_INCREMENT,
  `Nama` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `No_tlp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelanggan`
--

LOCK TABLES `pelanggan` WRITE;
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembayaran`
--

DROP TABLE IF EXISTS `pembayaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembayaran` (
  `ID_Pembayaran` int NOT NULL AUTO_INCREMENT,
  `ID_Penjualan` int DEFAULT NULL,
  `Metode_Pembayaran` varchar(50) DEFAULT NULL,
  `Status_Pembayaran` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Pembayaran`),
  KEY `ID_Penjualan` (`ID_Penjualan`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`ID_Penjualan`) REFERENCES `penjualan` (`ID_Penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembelian`
--

DROP TABLE IF EXISTS `pembelian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembelian` (
  `ID_Pembelian` int NOT NULL AUTO_INCREMENT,
  `Tanggal_Pembelian` date NOT NULL,
  `ID_Supplier` int DEFAULT NULL,
  `ID_Produk` int DEFAULT NULL,
  `Jumlah` int NOT NULL,
  `Harga_Satuan` decimal(10,2) DEFAULT NULL,
  `Sub_Total` decimal(10,2) GENERATED ALWAYS AS ((`Jumlah` * `Harga_Satuan`)) VIRTUAL,
  `Total_Harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_Pembelian`),
  KEY `ID_Supplier` (`ID_Supplier`),
  KEY `ID_Produk` (`ID_Produk`),
  CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`ID_Supplier`) REFERENCES `supplier` (`ID_Supplier`),
  CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`ID_Produk`) REFERENCES `produk` (`ID_Produk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembelian`
--

LOCK TABLES `pembelian` WRITE;
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` (`ID_Pembelian`, `Tanggal_Pembelian`, `ID_Supplier`, `ID_Produk`, `Jumlah`, `Harga_Satuan`, `Total_Harga`) VALUES (6,'2024-10-13',3,12,5000,5000.00,25000000.00);
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penjualan`
--

DROP TABLE IF EXISTS `penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `penjualan` (
  `ID_Penjualan` int NOT NULL AUTO_INCREMENT,
  `Tanggal_Penjualan` date NOT NULL,
  `ID_Pelanggan` int DEFAULT NULL,
  `ID_Produk` int DEFAULT NULL,
  `Jumlah` int NOT NULL,
  `Harga_Satuan` decimal(10,2) DEFAULT NULL,
  `Sub_Total` decimal(10,2) GENERATED ALWAYS AS ((`Jumlah` * `Harga_Satuan`)) VIRTUAL,
  `Total_Harga` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_Penjualan`),
  KEY `ID_Pelanggan` (`ID_Pelanggan`),
  KEY `ID_Produk` (`ID_Produk`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID_Pelanggan`),
  CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`ID_Produk`) REFERENCES `produk` (`ID_Produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penjualan`
--

LOCK TABLES `penjualan` WRITE;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produk`
--

DROP TABLE IF EXISTS `produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produk` (
  `ID_Produk` int NOT NULL AUTO_INCREMENT,
  `Nama_Produk` varchar(100) DEFAULT NULL,
  `Harga_Produk` decimal(10,2) DEFAULT NULL,
  `Stok` decimal(10,2) DEFAULT NULL,
  `Deskripsi_Produk` text,
  `ID_Kategori` int DEFAULT NULL,
  PRIMARY KEY (`ID_Produk`),
  KEY `ID_Kategori` (`ID_Kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`ID_Kategori`) REFERENCES `kategori` (`ID_Kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produk`
--

LOCK TABLES `produk` WRITE;
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
INSERT INTO `produk` VALUES (12,'Aqua Botol',5000.00,5200.00,'Aqua',6),(14,'Twistko',5000.00,100.00,'twistko',8),(15,'Aqua Gelas',1000.00,100.00,'Aqua',7),(16,'Indomie Goreng',4000.00,100.00,'Mi goreng',2),(17,'Indomie Kuah',4000.00,100.00,'mi kuah',2),(18,'Coca-Cola',5000.00,100.00,'coacola',3),(19,'sprite',5000.00,100.00,'fanta',3);
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `ID_Supplier` int NOT NULL AUTO_INCREMENT,
  `Nama_Supplier` varchar(100) DEFAULT NULL,
  `Alamat_Supplier` text,
  `Telepon_Supplier` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (3,'Diza Ilmalasarifitri','Jl, Hamadi Rawa II','+6282239863075');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-13 20:22:31
