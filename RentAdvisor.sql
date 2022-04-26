-- MySQL dump 10.13  Distrib 8.0.27, for macos12.0 (x86_64)
--
-- Host: localhost    Database: RentAdvisor
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Appartamento`
--

DROP TABLE IF EXISTS `Appartamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Appartamento` (
  `titolo_annuncio` varchar(100) NOT NULL,
  `descrizione` varchar(700) NOT NULL,
  `id_annuncio` mediumint NOT NULL AUTO_INCREMENT,
  `data_inserimento_annuncio` date NOT NULL,
  `provincia` char(2) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `zona_di_localizzazione` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `numero_civico` varchar(6) NOT NULL,
  `piano` tinyint unsigned NOT NULL,
  `opzionato` tinyint(1) NOT NULL DEFAULT '0',
  `dimensioni_appartamento` tinyint unsigned NOT NULL,
  `tipologia` enum('appartamento','casa indipendente') NOT NULL,
  `numero_camere` tinyint unsigned NOT NULL,
  `numero_posti_letto_totali` tinyint unsigned NOT NULL,
  `numero_bagni` tinyint unsigned NOT NULL,
  `presenza_cucina` tinyint(1) NOT NULL DEFAULT '0',
  `presenza_locale_ricreativo` tinyint(1) NOT NULL DEFAULT '0',
  `ascensore` tinyint(1) NOT NULL DEFAULT '0',
  `fumatori` tinyint(1) NOT NULL DEFAULT '0',
  `parcheggio` tinyint(1) NOT NULL DEFAULT '0',
  `wi_fi` tinyint(1) NOT NULL DEFAULT '0',
  `canone_affitto` double(6,2) NOT NULL,
  `durata_minima_locazione` tinyint unsigned DEFAULT NULL,
  `genere_preferito` enum('M','F','ND') NOT NULL,
  `eta_preferita` tinyint unsigned DEFAULT NULL,
  `periodo_disponibilita_inizio` date NOT NULL,
  `periodo_disponibilita_fine` date NOT NULL,
  `username_locatore` varchar(40) NOT NULL,
  PRIMARY KEY (`id_annuncio`),
  KEY `username_locatore` (`username_locatore`),
  CONSTRAINT `Appartamento_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Appartamento`
--

LOCK TABLES `Appartamento` WRITE;
/*!40000 ALTER TABLE `Appartamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `Appartamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FAQ`
--

DROP TABLE IF EXISTS `FAQ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `FAQ` (
  `domanda` varchar(200) NOT NULL,
  `risposta` varchar(700) NOT NULL,
  PRIMARY KEY (`domanda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FAQ`
--

LOCK TABLES `FAQ` WRITE;
/*!40000 ALTER TABLE `FAQ` DISABLE KEYS */;
/*!40000 ALTER TABLE `FAQ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Locatario`
--

DROP TABLE IF EXISTS `Locatario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Locatario` (
  `username` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `genere` enum('M','F','ND') NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(13) DEFAULT NULL,
  `psw` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `locatario_chk_1` CHECK ((`email` like _utf8mb4'%@%.%'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Locatario`
--

LOCK TABLES `Locatario` WRITE;
/*!40000 ALTER TABLE `Locatario` DISABLE KEYS */;
/*!40000 ALTER TABLE `Locatario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Locatore`
--

DROP TABLE IF EXISTS `Locatore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Locatore` (
  `username` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(13) DEFAULT NULL,
  `psw` varchar(50) NOT NULL,
  PRIMARY KEY (`username`),
  CONSTRAINT `CONSTRAINT_1` CHECK ((`email` like _utf8mb4'%@%.%'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Locatore`
--

LOCK TABLES `Locatore` WRITE;
/*!40000 ALTER TABLE `Locatore` DISABLE KEYS */;
/*!40000 ALTER TABLE `Locatore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Messaggio`
--

DROP TABLE IF EXISTS `Messaggio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Messaggio` (
  `username_locatario` varchar(40) NOT NULL,
  `username_locatore` varchar(40) NOT NULL,
  `id_appartamento` mediumint DEFAULT NULL,
  `id_posto_letto` mediumint DEFAULT NULL,
  `data_invio` datetime NOT NULL,
  `testo` varchar(500) NOT NULL,
  PRIMARY KEY (`username_locatore`,`username_locatario`,`data_invio`),
  KEY `Messaggio_ibfk_1` (`username_locatario`),
  KEY `Messaggio_ibfk_3` (`id_appartamento`),
  KEY `Messaggio_ibfk_4` (`id_posto_letto`),
  CONSTRAINT `Messaggio_ibfk_1` FOREIGN KEY (`username_locatario`) REFERENCES `Locatario` (`username`) ON UPDATE CASCADE,
  CONSTRAINT `Messaggio_ibfk_2` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE,
  CONSTRAINT `Messaggio_ibfk_3` FOREIGN KEY (`id_appartamento`) REFERENCES `Appartamento` (`id_annuncio`) ON UPDATE CASCADE,
  CONSTRAINT `Messaggio_ibfk_4` FOREIGN KEY (`id_posto_letto`) REFERENCES `Posto_Letto` (`id_annuncio`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Messaggio`
--

LOCK TABLES `Messaggio` WRITE;
/*!40000 ALTER TABLE `Messaggio` DISABLE KEYS */;
/*!40000 ALTER TABLE `Messaggio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Posto_Letto`
--

DROP TABLE IF EXISTS `Posto_Letto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Posto_Letto` (
  `titolo_annuncio` varchar(100) NOT NULL,
  `descrizione` varchar(700) NOT NULL,
  `id_annuncio` mediumint NOT NULL AUTO_INCREMENT,
  `data_inserimento_annuncio` date NOT NULL,
  `provincia` char(2) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `zona_di_localizzazione` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `numero_civico` varchar(6) NOT NULL,
  `piano` tinyint unsigned NOT NULL,
  `opzionato` tinyint(1) NOT NULL DEFAULT '0',
  `dimensioni_camera` tinyint unsigned NOT NULL,
  `tipologia` enum('singola','condivisa') NOT NULL,
  `letti_nella_camera` tinyint unsigned NOT NULL,
  `numero_posti_letto_totali` tinyint unsigned NOT NULL,
  `numero_bagni` tinyint unsigned NOT NULL,
  `disponibilita_angolo_studio` tinyint(1) NOT NULL DEFAULT '0',
  `ascensore` tinyint(1) NOT NULL DEFAULT '0',
  `fumatori` tinyint(1) NOT NULL DEFAULT '0',
  `parcheggio` tinyint(1) NOT NULL DEFAULT '0',
  `wi_fi` tinyint(1) NOT NULL DEFAULT '0',
  `canone_affitto` double(6,2) NOT NULL,
  `durata_minima_locazione` tinyint unsigned DEFAULT NULL,
  `genere_preferito` enum('M','F','ND') NOT NULL,
  `eta_preferita` tinyint unsigned DEFAULT NULL,
  `periodo_disponibilita_inizio` date NOT NULL,
  `periodo_disponibilita_fine` date NOT NULL,
  `username_locatore` varchar(40) NOT NULL,
  PRIMARY KEY (`id_annuncio`),
  KEY `username_locatore` (`username_locatore`),
  CONSTRAINT `Posto_Letto_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Posto_Letto`
--

LOCK TABLES `Posto_Letto` WRITE;
/*!40000 ALTER TABLE `Posto_Letto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Posto_Letto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-26 19:10:46
