-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: COSGymPatronData
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `Contact`
--

DROP TABLE IF EXISTS `Contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Contact` (
  `MessageID` int NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Subject` varchar(45) DEFAULT NULL,
  `Message` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`MessageID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contact`
--

LOCK TABLES `Contact` WRITE;
/*!40000 ALTER TABLE `Contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `Contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MembersGroupSession`
--

DROP TABLE IF EXISTS `MembersGroupSession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MembersGroupSession` (
  `SessionID` int NOT NULL,
  `MemberID` int DEFAULT NULL,
  `SessionType` varchar(45) DEFAULT NULL,
  `NextSessionDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MembersGroupSession`
--

LOCK TABLES `MembersGroupSession` WRITE;
/*!40000 ALTER TABLE `MembersGroupSession` DISABLE KEYS */;
/*!40000 ALTER TABLE `MembersGroupSession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Order`
--

DROP TABLE IF EXISTS `Order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Order` (
  `OrderID` int NOT NULL,
  `Items` varchar(45) DEFAULT NULL,
  `TotalCost` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Order`
--

LOCK TABLES `Order` WRITE;
/*!40000 ALTER TABLE `Order` DISABLE KEYS */;
/*!40000 ALTER TABLE `Order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PersonalTrainingTable`
--

DROP TABLE IF EXISTS `PersonalTrainingTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `PersonalTrainingTable` (
  `PersonalTrainerID` int NOT NULL,
  `MemberID` int DEFAULT NULL,
  `SessionDate` varchar(45) DEFAULT NULL,
  `NextSessionDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PersonalTrainerID`),
  KEY `MemberID_idx` (`MemberID`),
  CONSTRAINT `MemberID` FOREIGN KEY (`MemberID`) REFERENCES `MembersGroupSession` (`SessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PersonalTrainingTable`
--

LOCK TABLES `PersonalTrainingTable` WRITE;
/*!40000 ALTER TABLE `PersonalTrainingTable` DISABLE KEYS */;
/*!40000 ALTER TABLE `PersonalTrainingTable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RegisteredLogin`
--

DROP TABLE IF EXISTS `RegisteredLogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `RegisteredLogin` (
  `UserID` int NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RegisteredLogin`
--

LOCK TABLES `RegisteredLogin` WRITE;
/*!40000 ALTER TABLE `RegisteredLogin` DISABLE KEYS */;
/*!40000 ALTER TABLE `RegisteredLogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TrialSessions`
--

DROP TABLE IF EXISTS `TrialSessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `TrialSessions` (
  `TrialID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `SessionType` varchar(45) DEFAULT NULL,
  `SessionsUsed` int DEFAULT NULL,
  `SessionsRemaining` varchar(45) DEFAULT NULL,
  `NextSessionDate` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`TrialID`),
  KEY `UserID_idx` (`UserID`),
  CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `RegisteredLogin` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TrialSessions`
--

LOCK TABLES `TrialSessions` WRITE;
/*!40000 ALTER TABLE `TrialSessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `TrialSessions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-18 19:09:09