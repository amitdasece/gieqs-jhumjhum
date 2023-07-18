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
-- Table structure for table `poem`
--

DROP TABLE IF EXISTS `poem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MRN` int(8) DEFAULT NULL,
  `DOB` varchar(10) DEFAULT NULL,
  `sex` varchar(11) DEFAULT NULL,
  `comorbidity` int(1) DEFAULT NULL,
  `comorbidity_other` varchar(300) DEFAULT NULL,
  `weight` decimal(4,1) DEFAULT NULL,
  `medication_aspirin` int(1) DEFAULT NULL,
  `medication_clopidogrel` int(1) DEFAULT NULL,
  `medication_warfarin` int(1) DEFAULT NULL,
  `medication_other` varchar(27) DEFAULT NULL,
  `previous_treatment_PPI` int(1) DEFAULT NULL,
  `previous_treatment_CACB` int(1) DEFAULT NULL,
  `previous_treatment_NITR` int(1) DEFAULT NULL,
  `previous_treatment_SSRI` int(1) DEFAULT NULL,
  `previous_treatment_Dilatation` int(1) DEFAULT NULL,
  `previous_treatment_botulinum` int(1) DEFAULT NULL,
  `previous_treatment_heller` varchar(11) DEFAULT NULL,
  `previous_treatment_POEM` varchar(11) DEFAULT NULL,
  `previous_treatment_notes` varchar(800) DEFAULT NULL,
  `weight_loss` int(2) DEFAULT NULL,
  `symptoms_regurg` int(1) DEFAULT NULL,
  `symptoms_dysphagia` int(1) DEFAULT NULL,
  `symptoms_chestpain` int(1) DEFAULT NULL,
  `symptoms_heartburn` int(1) DEFAULT NULL,
  `symptoms_other` varchar(10) DEFAULT NULL,
  `current_weight_pre` varchar(11) DEFAULT NULL,
  `Eckart_prior` int(2) DEFAULT NULL,
  `prev_hrm` int(1) DEFAULT NULL,
  `prev_hrm_rp` decimal(4,1) DEFAULT NULL,
  `prev_hrm_relaxLES` decimal(4,1) DEFAULT NULL,
  `prev_hrm_UES` int(5) DEFAULT NULL,
  `prev_hrm_diagnosis` int(1) DEFAULT NULL,
  `barium_swallow_date` varchar(10) DEFAULT NULL,
  `barium_swallow_result` varchar(800) DEFAULT NULL,
  `gastroscopy_prev` int(1) DEFAULT NULL,
  `POEM_duration_total` int(3) DEFAULT NULL,
  `POEM_duration_tunnel` int(3) DEFAULT NULL,
  `POEM_GOJ_distance` int(2) DEFAULT NULL,
  `POEM_incision_distance` int(2) DEFAULT NULL,
  `POEM_incision_position` int(2) DEFAULT NULL,
  `submucosal_tunnel_bottom` varchar(100) DEFAULT NULL,
  `myotomy_top` varchar(100) DEFAULT NULL,
  `myotomy_bottom` varchar(100) DEFAULT NULL,
  `myotomy_full_thickness_length_distal` varchar(100) DEFAULT NULL,
  `POEM_myotomy_length` int(2) DEFAULT NULL,
  `POEM_perforation` int(1) DEFAULT NULL,
  `POEM_IPB` int(1) DEFAULT NULL,
  `IPB_solution` varchar(100) DEFAULT NULL,
  `tunnel_exit` varchar(11) DEFAULT NULL,
  `tunnel_exit_solution` varchar(100) DEFAULT NULL,
  `POEM_knife` varchar(11) DEFAULT NULL,
  `POEM_current` int(1) DEFAULT NULL,
  `POEM_number_clips` int(1) DEFAULT NULL,
  `POEM_glucagon` int(1) DEFAULT NULL,
  `POEM_buscopan` int(2) DEFAULT NULL,
  `POEM_antibiotics` int(1) DEFAULT NULL,
  `POEM_complication` int(1) DEFAULT NULL,
  `POEM_complication_type` int(1) DEFAULT NULL,
  `POEM_admission_days` int(3) DEFAULT NULL,
  `post_symptoms` int(1) DEFAULT NULL,
  `post_Eckart` int(1) DEFAULT NULL,
  `post_HRM_resting` int(3) DEFAULT NULL,
  `post_HRM_GOJ` int(2) DEFAULT NULL,
  `_k_patient` int(2) DEFAULT NULL,
  `post_HRM_relaxLOS` int(3) DEFAULT NULL,
  `post_HRM_UESnormal` int(1) DEFAULT NULL,
  `post_HRM_diagnosis` int(1) DEFAULT NULL,
  `post_bariumswallow_date` varchar(10) DEFAULT NULL,
  `post_bariumswallow_diagnosis` varchar(10) DEFAULT NULL,
  `post_gastroscopy` int(8) DEFAULT NULL,
  `post_gastroscopy_result` int(1) DEFAULT NULL,
  `post_datecollected` varchar(10) DEFAULT NULL,
  `current_weight` varchar(10) DEFAULT NULL,
  `diagnosis` int(1) DEFAULT NULL,
  `barium_swallow_done` int(1) DEFAULT NULL,
  `ComplicationDetails` varchar(91) DEFAULT NULL,
  `ProcedureDate` varchar(10) DEFAULT NULL,
  `CompleteFUCheck` int(1) DEFAULT NULL,
  `Referrer` varchar(100) DEFAULT NULL,
  `ReferrerFax` varchar(100) DEFAULT NULL,
  `ReferrerEmail` varchar(100) DEFAULT NULL,
  `Firstname` varchar(100) DEFAULT NULL,
  `Surname` varchar(100) DEFAULT NULL,
  `IPSubcutEmphysema` varchar(30) DEFAULT NULL,
  `IPSubcutEmphysemaMx` int(1) DEFAULT NULL,
  `gastroscopy_prevdilated` int(1) DEFAULT NULL,
  `gastroscopy_prevresistance` int(1) DEFAULT NULL,
  `gastroscopy_prevopenCOJ` int(1) DEFAULT NULL,
  `gastroscopy_prevspasm` int(1) DEFAULT NULL,
  `gastroscopy_prevother` varchar(800) DEFAULT NULL,
  `post_Eckart_dysphagia` varchar(10) DEFAULT NULL,
  `post_Eckart_regurgitation` varchar(10) DEFAULT NULL,
  `post_Eckart_pain` varchar(10) DEFAULT NULL,
  `post_Eckart_wtloss` varchar(10) DEFAULT NULL,
  `pre_Eckart_dysphagia` varchar(10) DEFAULT NULL,
  `pre_Eckart_regurgitation` varchar(10) DEFAULT NULL,
  `pre_Eckart_wtloss` varchar(10) DEFAULT NULL,
  `pre_Eckart_pain` varchar(10) DEFAULT NULL,
  `validated` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poem`
--

LOCK TABLES `poem` WRITE;
/*!40000 ALTER TABLE `poem` DISABLE KEYS */;
INSERT INTO `poem` VALUES (33,23343,'25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-04-11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,78239,'77',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'2020-04-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL),(35,25,'234',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'2020-04-14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `poem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11 22:45:27
