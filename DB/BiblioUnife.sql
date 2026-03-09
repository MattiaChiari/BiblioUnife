/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.7.2-MariaDB, for osx10.20 (arm64)
--
-- Host: localhost    Database: BiblioUnife
-- ------------------------------------------------------
-- Server version	11.7.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `Autore`
--

DROP TABLE IF EXISTS `Autore`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Autore` (
  `CodiceFiscale` varchar(16) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `DataNascita` date DEFAULT NULL,
  `LuogoNascita` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodiceFiscale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Autore`
--

LOCK TABLES `Autore` WRITE;
/*!40000 ALTER TABLE `Autore` DISABLE KEYS */;
INSERT INTO `Autore` VALUES
('ACDMVG62073143BG','Anna','Esposito','1983-05-25','Ferrara'),
('HTZBGL36792059VO','Laura','Marino','1965-02-27','Parma'),
('ITLOYE12837441GJ','Roberto','Fontana','1968-10-07','Forlì'),
('LUCPQD94496758YU','Davide','Costa','1981-09-18','Modena'),
('MFQBEX49486431OR','Valentina','Verdi','1952-01-21','Modena'),
('NYOMCE05935694CI','Marta','Russo','1960-04-30','Bologna'),
('PTVJXI32820711ZN','Alessandro','Rinaldi','1970-11-03','Ravenna'),
('PYZQUN28520263CG','Chiara','Romano','1989-06-22','Forlì'),
('SMBGSV53128769DR','Francesca','Mancini','1987-12-15','Ferrara'),
('UZTADE88102156LE','Giorgio','Rizzo','1974-08-08','Parma'),
('WGCSBY85300748TS','Federico','Bianchi','1959-07-12','Ferrara');
/*!40000 ALTER TABLE `Autore` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Copie`
--

DROP TABLE IF EXISTS `Copie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Copie` (
  `CodLibro` varchar(7) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  PRIMARY KEY (`CodLibro`),
  KEY `ISBN` (`ISBN`),
  CONSTRAINT `copie_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `Libro` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Copie`
--

LOCK TABLES `Copie` WRITE;
/*!40000 ALTER TABLE `Copie` DISABLE KEYS */;
INSERT INTO `Copie` VALUES
('ING-001','9780132856201'),
('ING-002','9780132856201'),
('INF-005','9780136042594'),
('INF-006','9780136042594'),
('LAW-001','9780198827751'),
('LAW-002','9780198827751'),
('LAW-003','9780198827751'),
('INF-001','9780262033848'),
('INF-002','9780262033848'),
('INF-003','9780262033848'),
('INF-004','9780262033848'),
('MAT-001','9780321982384'),
('MAT-002','9780321982384'),
('MAT-003','9780321982384'),
('ECO-001','9780538453424'),
('ECO-002','9780538453424'),
('CHI-002','9781118230717'),
('FIS-001','9781118230717'),
('FIS-002','9781118230717'),
('FIS-003','9781118230717'),
('PSI-001','9781133313795'),
('PSI-002','9781133313795'),
('PSI-003','9781133313795'),
('CHI-001','9781305080485'),
('MED-001','9781455770052'),
('MED-002','9781455770052'),
('MED-003','9781455770052'),
('MED-004','9781455770052');
/*!40000 ALTER TABLE `Copie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Disponibile`
--

DROP TABLE IF EXISTS `Disponibile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Disponibile` (
  `CodLibro` varchar(7) NOT NULL,
  `ID` int(6) NOT NULL,
  `NUM_Copie` int(11) NOT NULL,
  PRIMARY KEY (`CodLibro`,`ID`),
  KEY `ID` (`ID`),
  CONSTRAINT `disponibile_ibfk_1` FOREIGN KEY (`CodLibro`) REFERENCES `Copie` (`CodLibro`),
  CONSTRAINT `disponibile_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `Succursale` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Disponibile`
--

LOCK TABLES `Disponibile` WRITE;
/*!40000 ALTER TABLE `Disponibile` DISABLE KEYS */;
INSERT INTO `Disponibile` VALUES
('CHI-001',111,2),
('CHI-002',109,4),
('FIS-001',106,4),
('FIS-003',108,1),
('INF-002',104,2),
('INF-003',102,1),
('INF-004',106,4),
('INF-005',103,2),
('INF-006',105,3),
('ING-001',106,3),
('ING-002',107,3),
('LAW-001',112,1),
('LAW-002',112,1),
('LAW-003',101,2),
('MAT-001',110,2),
('MAT-003',108,3),
('MED-003',107,4),
('PSI-001',103,5),
('PSI-001',111,2),
('PSI-002',105,5),
('PSI-003',108,2);
/*!40000 ALTER TABLE `Disponibile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Libro`
--

DROP TABLE IF EXISTS `Libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Libro` (
  `ISBN` varchar(13) NOT NULL,
  `Titolo` varchar(60) NOT NULL,
  `AnnoPubblicazione` int(11) NOT NULL,
  `Lingua` varchar(30) NOT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Libro`
--

LOCK TABLES `Libro` WRITE;
/*!40000 ALTER TABLE `Libro` DISABLE KEYS */;
INSERT INTO `Libro` VALUES
('9780073397924','Numerical Methods for Engineers',2015,'Spagnolo'),
('9780073398174','Thermodynamics: An Engineering Approach',2019,'Inglese'),
('9780073523323','Database System Concepts',2011,'Francese'),
('9780123814791','Data Mining: Concepts and Techniques',2014,'Inglese'),
('9780131989245','Digital Design',2008,'Francese'),
('9780132856201','Computer Networking: A Top-Down Approach',2013,'Spagnolo'),
('9780132915489','Engineering Mechanics: Dynamics',2016,'Italiano'),
('9780133406958','Principles of Economics',2015,'Italiano'),
('9780136042594','Artificial Intelligence: A Modern Approach',2010,'Italiano'),
('9780136156734','Modern Control Engineering',2007,'Italiano'),
('9780198827751','Introduction to Law',2015,'Italiano'),
('9780199272399','Constitutional Law',2013,'Francese'),
('9780262033848','Introduction to Algorithms',2009,'Inglese'),
('9780321982384','Linear Algebra and Its Applications',2011,'Tedesco'),
('9780323082551','Medical Microbiology',2014,'Spagnolo'),
('9780538453424','Principles of Microeconomics',2014,'Spagnolo'),
('9780538497909','Calculus: Early Transcendentals',2020,'Spagnolo'),
('9781108480713','Machine Learning',2021,'Italiano'),
('9781118063330','Operating System Concepts',2012,'Tedesco'),
('9781118230717','Fundamentals of Physics',2009,'Inglese'),
('9781133313795','Introduction to Psychology',2016,'Inglese'),
('9781305080485','Organic Chemistry',2018,'Italiano'),
('9781455770052','Gray\'s Anatomy',2012,'Inglese');
/*!40000 ALTER TABLE `Libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Prestito`
--

DROP TABLE IF EXISTS `Prestito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Prestito` (
  `CodLibro` varchar(7) NOT NULL,
  `ID` int(6) NOT NULL,
  `Matricola` int(11) NOT NULL,
  `DataUscita` date NOT NULL,
  `DataScadenza` date NOT NULL,
  PRIMARY KEY (`CodLibro`,`ID`,`Matricola`),
  KEY `ID` (`ID`),
  KEY `Matricola` (`Matricola`),
  CONSTRAINT `prestito_ibfk_1` FOREIGN KEY (`CodLibro`) REFERENCES `Copie` (`CodLibro`),
  CONSTRAINT `prestito_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `Succursale` (`ID`),
  CONSTRAINT `prestito_ibfk_3` FOREIGN KEY (`Matricola`) REFERENCES `Utente` (`Matricola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Prestito`
--

LOCK TABLES `Prestito` WRITE;
/*!40000 ALTER TABLE `Prestito` DISABLE KEYS */;
INSERT INTO `Prestito` VALUES
('CHI-001',111,102304,'2025-02-02','2025-03-04'),
('CHI-002',109,102307,'2025-03-28','2025-04-27'),
('FIS-001',106,102302,'2025-04-02','2025-05-02'),
('FIS-003',108,102301,'2025-04-18','2025-05-18'),
('INF-002',104,102301,'2025-03-15','2025-04-14'),
('INF-003',102,102308,'2025-02-18','2025-03-20'),
('INF-004',106,102303,'2025-01-27','2025-02-26'),
('INF-005',103,102302,'2025-05-01','2025-05-31'),
('INF-006',105,102304,'2025-05-20','2025-06-19'),
('ING-001',106,102308,'2025-04-15','2025-05-15'),
('ING-002',107,102300,'2025-03-10','2025-04-09'),
('LAW-001',112,102306,'2025-03-07','2025-04-06'),
('LAW-002',112,102303,'2025-02-10','2025-03-12'),
('LAW-003',101,102309,'2025-04-05','2025-05-05'),
('MAT-001',110,102306,'2025-01-12','2025-02-11'),
('MAT-001',111,102300,'2025-02-01','2025-01-01'),
('MAT-003',108,102300,'2025-03-01','2025-03-31'),
('MED-001',111,102307,'2004-05-05','2004-06-04'),
('MED-002',111,102307,'2323-03-23','2025-01-01'),
('MED-003',107,102307,'2025-02-20','2025-03-22'),
('PSI-001',103,102305,'2025-04-25','2025-05-25'),
('PSI-002',105,102305,'2025-05-10','2025-06-09'),
('PSI-003',108,102309,'2025-05-05','2025-06-04');
/*!40000 ALTER TABLE `Prestito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Scrive`
--

DROP TABLE IF EXISTS `Scrive`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Scrive` (
  `ISBN` varchar(13) NOT NULL,
  `CodiceFiscale` varchar(16) NOT NULL,
  PRIMARY KEY (`ISBN`,`CodiceFiscale`),
  KEY `CodiceFiscale` (`CodiceFiscale`),
  CONSTRAINT `scrive_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `Libro` (`ISBN`),
  CONSTRAINT `scrive_ibfk_2` FOREIGN KEY (`CodiceFiscale`) REFERENCES `Autore` (`CodiceFiscale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Scrive`
--

LOCK TABLES `Scrive` WRITE;
/*!40000 ALTER TABLE `Scrive` DISABLE KEYS */;
INSERT INTO `Scrive` VALUES
('9780073383095','ACDMVG62073143BG'),
('9780073523323','ACDMVG62073143BG'),
('9780321982384','HTZBGL36792059VO'),
('9780262033848','ITLOYE12837441GJ'),
('9781305080485','ITLOYE12837441GJ'),
('9780132915489','LUCPQD94496758YU'),
('9780136042594','MFQBEX49486431OR'),
('9780538497909','MFQBEX49486431OR'),
('9780132856201','NYOMCE05935694CI'),
('9781108480713','NYOMCE05935694CI'),
('9780138147570','PTVJXI32820711ZN'),
('9781118063330','PTVJXI32820711ZN'),
('9780073397924','PYZQUN28520263CG'),
('9780538453424','PYZQUN28520263CG'),
('9780262033848','SMBGSV53128769DR'),
('9781118230717','SMBGSV53128769DR'),
('9780073398174','UZTADE88102156LE'),
('9780073523323','UZTADE88102156LE'),
('9780123814791','WGCSBY85300748TS'),
('9781108480713','WGCSBY85300748TS');
/*!40000 ALTER TABLE `Scrive` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Succursale`
--

DROP TABLE IF EXISTS `Succursale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Succursale` (
  `ID` int(6) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Via` varchar(30) NOT NULL,
  `Civico` varchar(5) NOT NULL,
  `Citta` varchar(30) NOT NULL,
  `CAP` int(5) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Succursale`
--

LOCK TABLES `Succursale` WRITE;
/*!40000 ALTER TABLE `Succursale` DISABLE KEYS */;
INSERT INTO `Succursale` VALUES
(101,'Architettura','Via Ghiara','36','Ferrara',44121),
(102,'Economia e Management','Via Voltapaletto','11','Ferrara',44121),
(103,'Fisica e Scienze della Terra','Via Saragat','1','Ferrara',44122),
(104,'Giurisprudenza','Corso Ercole I d\'Este','37','Ferrara',44121),
(105,'Ingegneria','Via Saragat','1','Ferrara',44122),
(106,'Matematica e Informatica','Via Macchiavelli','30','Ferrara',44121),
(107,'Medicina Traslazionale e per la Romagna','Via Luigi Borsari','46','Ferrara',44121),
(108,'Neuroscienza e Riabilitazione','Via Luigi Borsari','46','Ferrara',44121),
(109,'Scienze Chimiche, Farmaceutiche ed Agrarie','Via Luigi Borsari','46','Ferrara',44121),
(110,'Scienze della Vita e Biotecnologie','Via Luigi Borsari','46','Ferrara',44121),
(111,'Scienze Mediche','Via Fossato di Mortara','64/B','Ferrara',44121),
(112,'Studi Umanistici','Via Paradiso','12','Ferrara',44121);
/*!40000 ALTER TABLE `Succursale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utente`
--

DROP TABLE IF EXISTS `Utente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `Utente` (
  `Matricola` int(6) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Cognome` varchar(30) NOT NULL,
  `NumTelefono` varchar(15) DEFAULT NULL,
  `Via` varchar(30) DEFAULT NULL,
  `Civico` varchar(5) DEFAULT NULL,
  `Citta` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Matricola`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utente`
--

LOCK TABLES `Utente` WRITE;
/*!40000 ALTER TABLE `Utente` DISABLE KEYS */;
INSERT INTO `Utente` VALUES
(1,'MARIO','ROSSI','3333333333','a','1','altedo'),
(102300,'Paolo','Giordano','3208963407','Via Bologna','29','Parma'),
(102301,'Davide','Barbieri','3208008901','Via Garibaldi','40','Bologna'),
(102302,'Giulia','Ferrari','3205354461','Via Savonarola','95','Modena'),
(102303,'Valentina','Conti','3207611783','Via Roma','39','Ferrara'),
(102304,'Marco','Romano','3201128467','Via Bologna','26','Forlì'),
(102305,'Andrea','Fontana','3201497783','Via Savonarola','61','Parma'),
(102306,'Francesca','Moretti','3204445363','Via Mazzini','94','Ravenna'),
(102307,'Giorgio','Bianchi','3209176446','Via Bologna','56','Bologna'),
(102308,'Chiara','Greco','3206322814','Via Saragat','22','Modena'),
(102309,'Elisa','Lombardi','3208280963','Via Savonarola','92','Forlì'),
(196812,'dsa','sad','123','San donato','43','Budrio'),
(196813,'Asia','Amisano','2341345678','San donato','112','Budrio'),
(196814,'Asia','Amisano','4673234573','San donato','69','Budrio'),
(12345678,'cynthia','lolli','343256754','hjlh','54','altedo');
/*!40000 ALTER TABLE `Utente` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2025-06-16 16:34:18
