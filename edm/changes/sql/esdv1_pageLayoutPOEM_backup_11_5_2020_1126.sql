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
-- Table structure for table `pagelayoutpoem`
--

DROP TABLE IF EXISTS `pagelayoutpoem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagelayoutpoem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `﻿Number` int(2) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Position` int(2) DEFAULT NULL,
  `Order` int(2) DEFAULT NULL,
  `Type` int(1) DEFAULT NULL,
  `textType` int(1) DEFAULT NULL,
  `Value1` varchar(100) DEFAULT NULL,
  `Value2` varchar(100) DEFAULT NULL,
  `Text` varchar(100) DEFAULT NULL,
  `Link` varchar(10) DEFAULT NULL,
  `Message_t` varchar(10) DEFAULT NULL,
  `RequiredIndex` varchar(10) DEFAULT NULL,
  `Required4weeks` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagelayoutpoem`
--

LOCK TABLES `pagelayoutpoem` WRITE;
/*!40000 ALTER TABLE `pagelayoutpoem` DISABLE KEYS */;
INSERT INTO `pagelayoutpoem` VALUES (1,1,'MRN',1,1,2,1,NULL,NULL,'MRN',NULL,NULL,NULL,NULL),(2,2,'DOB',1,2,2,1,NULL,NULL,'Age',NULL,NULL,NULL,NULL),(3,3,'comorbidity',1,4,1,1,'comorbidity_major','comorbidity_major_t','major comorbidity?',NULL,NULL,NULL,NULL),(4,4,'comorbidity_other',1,5,2,1,NULL,NULL,'specify',NULL,NULL,NULL,NULL),(5,5,'weight',1,6,2,1,NULL,NULL,'weight (kg)',NULL,NULL,NULL,NULL),(6,6,'medication_aspirin',1,7,3,1,'Yes_no','Yes_no_t','aspirin',NULL,NULL,NULL,NULL),(7,7,'medication_clopidogrel',1,8,3,1,'Yes_no','Yes_no_t','clopidogrel',NULL,NULL,NULL,NULL),(8,8,'medication_warfarin',1,9,3,1,'Yes_no','Yes_no_t','warfarin / NOAC',NULL,NULL,NULL,NULL),(9,9,'medication_other',1,10,2,1,NULL,NULL,'other medication',NULL,NULL,NULL,NULL),(10,10,'previous_treatment_PPI',2,1,3,1,'Yes_no','Yes_no_t','PPI',NULL,NULL,NULL,NULL),(11,11,'previous_treatment_CACB',2,2,3,1,'Yes_no','Yes_no_t','CACB',NULL,NULL,NULL,NULL),(12,12,'previous_treatment_NITR',2,3,3,1,'Yes_no','Yes_no_t','Nitrates',NULL,NULL,NULL,NULL),(13,13,'previous_treatment_SSRI',2,4,3,1,'Yes_no','Yes_no_t','SSRI',NULL,NULL,NULL,NULL),(14,14,'previous_treatment_Dilatation',2,5,3,1,'Yes_no','Yes_no_t','Dilatation',NULL,NULL,NULL,NULL),(15,15,'previous_treatment_botulinum',2,6,3,1,'Yes_no','Yes_no_t','Botulinum',NULL,NULL,NULL,NULL),(21,21,'symptoms_other',3,11,4,1,NULL,NULL,'Other symptoms',NULL,NULL,NULL,NULL),(22,22,'Eckart_prior',3,12,2,1,NULL,NULL,'Total Eckart (pre-POEM)',NULL,NULL,NULL,NULL),(23,23,'prev_hrm',4,2,3,1,'Yes_no','Yes_no_t','Previous High Resolution Manometry',NULL,NULL,NULL,NULL),(24,24,'prev_hrm_rp',4,2,2,1,NULL,NULL,'IRP at HRM (mmHg)',NULL,NULL,NULL,NULL),(25,25,'prev_hrm_relaxLES',4,3,2,1,NULL,NULL,'LES relaxation pressure',NULL,NULL,NULL,NULL),(26,26,'prev_hrm_UES',4,4,2,1,NULL,NULL,'UES relaxation pressure',NULL,NULL,NULL,NULL),(27,27,'prev_hrm_diagnosis',4,5,1,1,'diagnosis',NULL,'Previous HRM diagnosis',NULL,NULL,NULL,NULL),(28,28,'barium_swallow_date',4,6,2,3,NULL,NULL,'Date of Barium Swallow',NULL,NULL,NULL,NULL),(29,29,'barium_swallow_result',4,7,4,1,NULL,NULL,'Barium swallow result',NULL,NULL,NULL,NULL),(30,30,'gastroscopy_prev',5,9,3,1,'Yes_no',NULL,'Gastroscopy observations performed',NULL,NULL,NULL,NULL),(31,31,'POEM_duration_total',6,12,2,1,NULL,NULL,'Total duration (min)',NULL,NULL,NULL,NULL),(32,32,'POEM_duration_tunnel',6,13,2,1,NULL,NULL,'Tunnel duration (min)',NULL,NULL,NULL,NULL),(33,33,'POEM_GOJ_distance',6,2,2,1,NULL,NULL,'Distance to GOJ (cm)',NULL,NULL,NULL,NULL),(34,34,'POEM_incision_distance',6,3,2,1,NULL,NULL,'Incision distance from incisors (cm)',NULL,NULL,NULL,NULL),(35,35,'POEM_incision_position',6,4,2,1,NULL,NULL,'Incision position (clock face)',NULL,NULL,NULL,NULL),(36,36,'myotomy_top',6,6,2,1,NULL,NULL,'Top of myotomy (cm)',NULL,NULL,NULL,NULL),(38,38,'POEM_IPB',7,1,3,1,'Yes_no',NULL,'Intra-procedural bleeding (requiring control)',NULL,NULL,NULL,NULL),(39,39,'POEM_current',6,9,1,1,'POEM_current',NULL,'Electrosurgical current',NULL,NULL,NULL,NULL),(40,40,'POEM_number_clips',6,11,2,1,NULL,NULL,'Number of clips to close tunnel',NULL,NULL,NULL,NULL),(41,41,'POEM_glucagon',6,14,3,1,'Yes_no',NULL,'Glucagon given',NULL,NULL,NULL,NULL),(42,42,'POEM_buscopan',6,15,3,1,'Yes_no',NULL,'Buscopan given',NULL,NULL,NULL,NULL),(43,43,'POEM_antibiotics',6,16,3,1,'Yes_no',NULL,'Antibiotics given',NULL,NULL,NULL,NULL),(44,44,'POEM_complication',7,3,3,1,'Yes_no',NULL,'Adverse Event?',NULL,NULL,NULL,NULL),(46,46,'POEM_admission_days',8,1,2,1,NULL,NULL,'Length of admission post POEM (days)',NULL,NULL,NULL,NULL),(47,47,'post_symptoms',9,1,3,1,NULL,NULL,'Post POEM review',NULL,NULL,NULL,NULL),(48,48,'post_Eckart',9,8,2,1,NULL,NULL,'Eckart post POEM',NULL,NULL,NULL,NULL),(50,50,'post_HRM_GOJ',9,9,2,1,NULL,NULL,'IRP at HRM (mmHg)',NULL,NULL,NULL,NULL),(51,52,'post_HRM_relaxLOS',9,10,2,1,NULL,NULL,'LES relaxation pressure (mmHg)',NULL,NULL,NULL,NULL),(52,53,'post_HRM_UESnormal',9,11,2,1,NULL,NULL,'UES relaxation pressure',NULL,NULL,NULL,NULL),(53,54,'post_HRM_diagnosis',9,8,1,1,'diagnosis',NULL,'HRM diagnosis',NULL,NULL,NULL,NULL),(54,55,'post_bariumswallow_date',9,12,3,3,NULL,NULL,'Barium swallow',NULL,NULL,NULL,NULL),(55,56,'post_bariumswallow_diagnosis',9,13,4,1,'diagnosis',NULL,'Diagnosis at barium swallow',NULL,NULL,NULL,NULL),(56,57,'post_gastroscopy',9,14,3,1,NULL,NULL,'Post POEM gastroscopy',NULL,NULL,NULL,NULL),(57,58,'post_gastroscopy_result',9,15,4,1,NULL,NULL,'Post POEM gastroscopy findings',NULL,NULL,NULL,NULL),(58,59,'post_datecollected',9,2,2,3,NULL,NULL,'Date collected',NULL,NULL,NULL,NULL),(59,60,'current_weight',9,3,2,1,NULL,NULL,'Weight, current, (kg)',NULL,NULL,NULL,NULL),(60,61,'diagnosis',4,1,1,1,'diagnosis','diagnosis_t','Diagnosis (Chicago v3)',NULL,NULL,NULL,NULL),(62,63,'ComplicationDetails',7,8,4,1,NULL,NULL,'Further adverse event details',NULL,NULL,NULL,NULL),(63,64,'ProcedureDate',6,1,2,3,NULL,NULL,'ProcedureDate',NULL,NULL,NULL,NULL),(64,66,'CompleteFUCheck',10,1,3,1,NULL,NULL,'Complete Follow Up?',NULL,NULL,NULL,NULL),(65,67,'Referrer',11,1,2,1,NULL,NULL,'Referrer Name',NULL,NULL,NULL,NULL),(66,68,'ReferrerFax',11,2,2,1,NULL,NULL,'Referrer Phone',NULL,NULL,NULL,NULL),(67,69,'ReferrerEmail',11,3,2,1,NULL,NULL,'Referrer Email',NULL,NULL,NULL,NULL),(70,72,'IPSubcutEmphysema',7,4,3,1,'Yes_no',NULL,'Capnoperitoneum',NULL,NULL,NULL,NULL),(71,73,'IPSubcutEmphysemaMx',7,5,1,1,'IPEmphysema',NULL,'Management of capnoperitoneum',NULL,NULL,NULL,NULL),(72,74,'gastroscopy_prevdilated',5,10,3,1,'Yes_no',NULL,'Dilated oesophagus',NULL,NULL,NULL,NULL),(73,75,'gastroscopy_prevresistance',5,11,3,1,'Yes_no',NULL,'Resistance to GOJ passage',NULL,NULL,NULL,NULL),(74,76,'gastroscopy_prevopenCOJ',5,12,3,1,'Yes_no',NULL,'GOJ sits open',NULL,NULL,NULL,NULL),(75,77,'gastroscopy_prevspasm',5,13,3,1,'Yes_no',NULL,'Spasm of the oesophageal body',NULL,NULL,NULL,NULL),(76,78,'gastroscopy_prevother',5,14,4,1,NULL,NULL,'Other observations gastroscopy',NULL,NULL,NULL,NULL),(77,79,'post_Eckart_dysphagia',9,4,1,1,'Eckart_dysphagia',NULL,'Dysphagia (Eckart)',NULL,NULL,NULL,NULL),(78,80,'post_Eckart_regurgitation',9,5,1,1,'Eckart_regurgitation',NULL,'Regurgitation (Eckart)',NULL,NULL,NULL,NULL),(79,81,'post_Eckart_pain',9,6,1,1,'Eckart_pain',NULL,'Pain (Eckart)',NULL,NULL,NULL,NULL),(80,82,'post_Eckart_wtloss',9,7,1,1,'Eckart_wtloss',NULL,'Weight loss (Eckart)',NULL,NULL,NULL,NULL),(81,83,'pre_Eckart_dysphagia',3,7,1,1,'Eckart_dysphagia','Eckart_dysphagia_t','Dysphagia (pre)',NULL,NULL,NULL,NULL),(82,84,'pre_Eckart_regurgitation',3,8,1,1,'Eckart_regurgitation','Eckart_regurgitation_t','Regurgitation(pre)',NULL,NULL,NULL,NULL),(83,85,'pre_Eckart_wtloss',3,9,1,1,'Eckart_wtloss','Eckart_wtloss_t','Weight Loss (pre)',NULL,NULL,NULL,NULL),(84,86,'pre_Eckart_pain',3,10,1,1,'Eckart_pain','Eckart_pain_t','Pain (pre)',NULL,NULL,NULL,NULL),(85,35,'submucosal_tunnel_bottom',6,5,2,1,NULL,NULL,'Bottom of submucosal tunnel distance (cm)',NULL,NULL,NULL,NULL),(86,36,'myotomy_bottom',6,7,2,1,NULL,NULL,'Bottom of myotomy (cm)',NULL,NULL,NULL,NULL),(87,36,'myotomy_full_thickness_length_distal',6,8,2,1,NULL,NULL,'Length of full thickness myotomy (cm)',NULL,NULL,NULL,NULL),(88,36,'IPB_solution',7,2,1,1,'IPB_solution',NULL,'Treatment of bleeding',NULL,NULL,NULL,NULL),(89,36,'tunnel_exit',7,6,3,1,'Yes_no',NULL,'Tunnel exit?',NULL,NULL,NULL,NULL),(90,36,'tunnel_exit_solution',7,7,1,1,'tunnel_exit_solution',NULL,'Tunnel exit solution?',NULL,NULL,NULL,NULL),(91,87,'validated',11,4,5,NULL,NULL,NULL,'validated?',NULL,NULL,NULL,NULL),(92,2,'Sex',1,3,1,NULL,'Sex',NULL,'Sex',NULL,NULL,NULL,NULL),(93,15,'previous_treatment_POEM',2,8,3,1,'Yes_no','Yes_no_t','Previous POEM',NULL,NULL,NULL,NULL),(94,15,'previous_treatment_notes',2,9,4,1,'Yes_no','Yes_no_t','Previous treatment notes',NULL,NULL,NULL,NULL),(95,15,'previous_treatment_heller',2,7,3,1,'Yes_no','Yes_no_t','Heller myotomy',NULL,NULL,NULL,NULL),(96,39,'POEM_knife',6,10,1,1,'knife',NULL,'Knife used',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pagelayoutpoem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-11 23:26:41
