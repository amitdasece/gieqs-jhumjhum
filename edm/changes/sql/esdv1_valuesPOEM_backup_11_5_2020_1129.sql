-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: esdv1
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `valuespoem`
--

DROP TABLE IF EXISTS `valuespoem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuespoem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comorbidity_major` int(1) DEFAULT NULL,
  `comorbidity_major_t` varchar(14) DEFAULT NULL,
  `diagnosis` int(1) DEFAULT NULL,
  `diagnosis_t` varchar(25) DEFAULT NULL,
  `GasFindings` int(1) DEFAULT NULL,
  `GasFindings_t` varchar(18) DEFAULT NULL,
  `IPEmphysema` int(1) DEFAULT NULL,
  `IPEmphysema_t` varchar(17) DEFAULT NULL,
  `Post_HRM_diagnosis` int(1) DEFAULT NULL,
  `Post_HRM_diagnosis_t` varchar(25) DEFAULT NULL,
  `Symptoms` int(1) DEFAULT NULL,
  `Symptoms_t` varchar(13) DEFAULT NULL,
  `Type_of_complication` int(1) DEFAULT NULL,
  `Type_of_complication_t` varchar(11) DEFAULT NULL,
  `Yes_no` int(1) DEFAULT NULL,
  `yes_no_t` varchar(3) DEFAULT NULL,
  `Eckart_dysphagia` int(11) DEFAULT NULL,
  `Eckart_dysphagia_t` varchar(100) DEFAULT NULL,
  `Eckart_pain` int(11) DEFAULT NULL,
  `Eckart_pain_t` varchar(100) DEFAULT NULL,
  `Eckart_wtloss` int(11) DEFAULT NULL,
  `Eckart_wtloss_t` varchar(100) DEFAULT NULL,
  `Eckart_regurgitation` int(11) DEFAULT NULL,
  `Eckart_regurgitation_t` varchar(100) DEFAULT NULL,
  `POEM_current` int(11) DEFAULT NULL,
  `POEM_current_t` varchar(100) DEFAULT NULL,
  `IPB_solution` int(11) DEFAULT NULL,
  `IPB_solution_t` varchar(100) DEFAULT NULL,
  `tunnel_exit_solution` int(11) DEFAULT NULL,
  `tunnel_exit_solution_t` varchar(100) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `sex_t` varchar(100) DEFAULT NULL,
  `knife` int(11) DEFAULT NULL,
  `knife_t` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuespoem`
--

LOCK TABLES `valuespoem` WRITE;
/*!40000 ALTER TABLE `valuespoem` DISABLE KEYS */;
INSERT INTO `valuespoem` VALUES (1,0,'None',1,'Achalasia type 1',1,'Dilated Oesophagus',1,'Conservative',0,'No achalasia',1,'Regurgitation',1,'Bleeding',0,'No',0,'None',0,'None',0,'0',0,'None',1,'EndoCut Q',1,'Knife',1,'Clips',1,'Male',1,'Triangle tip J'),(2,1,'Cardiovascular',2,'Achalasia type 2',2,'Resistance at COJ',2,'Needle aspiration',1,'Achalasia type 1',2,'Dysphagia',2,'Perforation',1,'Yes',1,'Occasional',1,'Occasional',1,'<5 kg',1,'Occasional',2,'Dry Cut',2,'Coagulation forceps',2,'Over the scope clip',2,'Female',2,'Dual Knife 1,5 J'),(3,2,'Respiratory',3,'Achalasia type 3',3,'Open COJ',3,'Surgery',2,'Achalasia type 2',3,'Chest pain',3,'Infection',NULL,NULL,2,'Daily',2,'Daily',2,'5-10 kg',2,'Daily',3,'EndoCut I',3,'Endoscopic clips',3,'Endoscopic suturing',NULL,NULL,3,'Triangle non J'),(4,3,'Renal',4,'EGJ outflow obstruction',4,'Oesophageal Spasm',NULL,NULL,3,'Achalasia type 3',4,'Heartburn',4,'Other',NULL,NULL,3,'With Every Meal',3,'Several times a day',3,'> 10 kg',3,'With Every Meal',NULL,NULL,4,'Interventional radiology',4,'Surgery',NULL,NULL,4,'ERBE Hybrid Knife I type'),(5,4,'Other',5,'Diffuse Oesophageal Spasm',5,'Other',NULL,NULL,4,'Diffuse oesophageal spasm',5,'Other',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Surgery',NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,6,'Jackhammer Oesophagus',NULL,NULL,NULL,NULL,5,'Jackhammer oesophagus',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,7,'Absent Contractility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,8,'Ineffective Motility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,9,'Fragmented Peristalsis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,10,'Normal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `valuespoem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11 23:29:57
