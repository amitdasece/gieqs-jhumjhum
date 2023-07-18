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
-- Table structure for table `ERCPpatient`
--

DROP TABLE IF EXISTS `ERCPpatient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ERCPpatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Karnofsky` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `WHO` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ERCPpatient`
--

LOCK TABLES `ERCPpatient` WRITE;
/*!40000 ALTER TABLE `ERCPpatient` DISABLE KEYS */;
INSERT INTO `ERCPpatient` VALUES (1,'2','2'),(2,'3','3');
/*!40000 ALTER TABLE `ERCPpatient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ERCPprocedure`
--

DROP TABLE IF EXISTS `ERCPprocedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ERCPprocedure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientid` int(10) NOT NULL,
  `yearlyERCPvolumeCenter` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `yearlyERCPvolumeEndoscopist` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `agepatient` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dateprocedure` datetime DEFAULT NULL,
  `informedconsent` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `antibiotics` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `anticoagulants` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `pancreatitisprevention` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `indication` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bismuth` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `gradedifficultyERCP` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `previousfailedERCP` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `durationERCP` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `timetocannulation` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `fluoroscopytime` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `fluoroscopydose` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `positioninfrontofpapilla` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `positionERCPscope` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nativepapilla` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `duodenaldiverticulum` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileductindicated` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileduct` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `biliarypapillotomy` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsungindicatied` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsung` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `pancreaticpapillotomy` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `contrastwirsung` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `difficultcannulationapproach` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `lithiasispresent` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `lithiasisremoved` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `indicationstenting` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `stenting` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `stentinglocation` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `brushing` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dilatation` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `perproceduraladverseevents` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bleedingtreatment` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `hemostasis` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `perforationtype` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `perforationtreatment` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `latecomplications` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `severitypancreatitislate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `bleedingtreatmentlate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `hemostasislate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `perforationtypelate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `perforationtreatmentlate` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `technicalsuccess` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `clinicalsuccess` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `additionaltreatmentneeded` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `durationhospitalisation` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `location` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ERCPprocedure`
--

LOCK TABLES `ERCPprocedure` WRITE;
/*!40000 ALTER TABLE `ERCPprocedure` DISABLE KEYS */;
INSERT INTO `ERCPprocedure` VALUES (1,2,'4','2','87','2019-10-04 00:00:00','0','1','3','1','0','0','3','0','23','15','0','0','1','1','1','1','1','1','1','0','0','0','0','0','1','1','1','0','selected','0','0','0','5','1','1','0','0','0','0','0','1','0','1','0','0','0','0');
/*!40000 ALTER TABLE `ERCPprocedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Foglio1`
--

DROP TABLE IF EXISTS `Foglio1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Foglio1` (
  `Position` int(2) DEFAULT NULL,
  `Text` varchar(61) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Foglio1`
--

LOCK TABLES `Foglio1` WRITE;
/*!40000 ALTER TABLE `Foglio1` DISABLE KEYS */;
INSERT INTO `Foglio1` VALUES (1,'Patient details'),(2,'SMSA'),(3,'Lesion details'),(4,'Procedure'),(5,'Patient preparation'),(6,'Lesion Assessment'),(7,': Facilitates access'),(8,': Injection technique'),(9,': Snare placement'),(10,': Safety checks prior to snare resection'),(11,': Management of adverse events IPB'),(12,': Management of adverse events, when suspecting a perforation'),(13,'Diffficult access'),(14,'Polyps in specific locations'),(15,'Defect inspection'),(16,'Margin treatment');
/*!40000 ALTER TABLE `Foglio1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Lesion`
--

DROP TABLE IF EXISTS `Lesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lesion` (
  `_k_lesion` int(11) NOT NULL AUTO_INCREMENT,
  `_k_procedure` int(11) DEFAULT NULL,
  `﻿Patientcode` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `Firstname` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `Surname` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `MRN` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `AGE` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `Ethnicity` text COLLATE utf8_bin DEFAULT NULL,
  `Dateofprocedure` text COLLATE utf8_bin DEFAULT NULL,
  `Duplicate` int(11) DEFAULT NULL,
  `UseForLesion` int(11) DEFAULT NULL,
  `UseForPatient` int(11) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `IndicationforESD` int(11) DEFAULT NULL,
  `Preresectionbiopsydone` text COLLATE utf8_bin DEFAULT NULL,
  `PreresectionHistology` text COLLATE utf8_bin DEFAULT NULL,
  `Scopetype` int(11) DEFAULT NULL,
  `Knifetype` int(11) DEFAULT NULL,
  `Injectate` int(11) DEFAULT NULL,
  `Length_min` text COLLATE utf8_bin DEFAULT NULL,
  `ASAscore` text COLLATE utf8_bin DEFAULT NULL,
  `GAvssedation` int(11) DEFAULT NULL,
  `Admitted` int(11) DEFAULT NULL,
  `Complications` int(11) DEFAULT NULL,
  `comp_IPB` int(11) DEFAULT NULL,
  `Prophylaxis_bleed` int(11) DEFAULT NULL,
  `comp_perf` int(11) DEFAULT NULL,
  `comp_DB` int(11) DEFAULT NULL,
  `Mortality` int(11) DEFAULT NULL,
  `lesionlocation` int(11) DEFAULT NULL,
  `lesionlocationdetail` text COLLATE utf8_bin DEFAULT NULL,
  `lesion_Paris` int(11) DEFAULT NULL,
  `ulceration` int(11) DEFAULT NULL,
  `lesionsize_mm` int(11) DEFAULT NULL,
  `En_bloc` int(11) DEFAULT NULL,
  `Historemarks` text COLLATE utf8_bin DEFAULT NULL,
  `Numberofresectionspecimens` int(11) DEFAULT NULL,
  `Completeendoscopicresectionachieved` int(11) DEFAULT NULL,
  `Histology` int(11) DEFAULT NULL,
  `HistologyHGD` int(11) DEFAULT NULL,
  `Completepathologicalresection_R0` int(11) DEFAULT NULL,
  `MarginVerticalPos` text COLLATE utf8_bin DEFAULT NULL,
  `MarginHorizPos` text COLLATE utf8_bin DEFAULT NULL,
  `ClinicalCriteria` int(11) DEFAULT NULL,
  `SurgicalRefBasedonHisto` int(11) DEFAULT NULL,
  `SurgDueToFail` int(11) DEFAULT NULL,
  `UnderwentSurgeryatIndex` int(11) DEFAULT NULL,
  `SurgeryDuringSurveillance` int(11) DEFAULT NULL,
  `NoSurgerySoSurveillance` int(11) DEFAULT NULL,
  `DeclinedSurgery` int(11) DEFAULT NULL,
  `AwaitingSurgOutcome` text COLLATE utf8_bin DEFAULT NULL,
  `WhyDeclinedSurgery` int(11) DEFAULT NULL,
  `SurgResidual` text COLLATE utf8_bin DEFAULT NULL,
  `SurgLN` text COLLATE utf8_bin DEFAULT NULL,
  `SurgTStage` text COLLATE utf8_bin DEFAULT NULL,
  `SurgNotes` text COLLATE utf8_bin DEFAULT NULL,
  `SMI` int(11) DEFAULT NULL,
  `SMDepth` text COLLATE utf8_bin DEFAULT NULL,
  `Differentiation` text COLLATE utf8_bin DEFAULT NULL,
  `LVI` int(11) DEFAULT NULL,
  `WhyNoSC1` text COLLATE utf8_bin DEFAULT NULL,
  `CompletedSE1` int(11) DEFAULT NULL,
  `SE_1date` text COLLATE utf8_bin DEFAULT NULL,
  `SE_time_new` text COLLATE utf8_bin DEFAULT NULL,
  `SE_1endo_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_1HISTO_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_1Treatment` text COLLATE utf8_bin DEFAULT NULL,
  `CompletedSE2` int(11) DEFAULT NULL,
  `WhyNoSC2` text COLLATE utf8_bin DEFAULT NULL,
  `DueSC2` text COLLATE utf8_bin DEFAULT NULL,
  `ExplainSC2` text COLLATE utf8_bin DEFAULT NULL,
  `SE_2date` text COLLATE utf8_bin DEFAULT NULL,
  `SE_2endo_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_2HISTO_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_2Treatment` text COLLATE utf8_bin DEFAULT NULL,
  `MonthsToSEMostRecent` text COLLATE utf8_bin DEFAULT NULL,
  `SE_MostRecentdate` text COLLATE utf8_bin DEFAULT NULL,
  `SE_MostRecentendo_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_MostRecentHISTO_Rec_Res` text COLLATE utf8_bin DEFAULT NULL,
  `SE_MostRecentTreatment` text COLLATE utf8_bin DEFAULT NULL,
  `clearofdiseaseonlatestSE` text COLLATE utf8_bin DEFAULT NULL,
  `Numberoffollow_upscopes` text COLLATE utf8_bin DEFAULT NULL,
  `Monthsindextolastscope` text COLLATE utf8_bin DEFAULT NULL,
  `Ultimateoutcome` text COLLATE utf8_bin DEFAULT NULL,
  `FullThicknessPerf` int(11) DEFAULT NULL,
  `Historemarks2` text COLLATE utf8_bin DEFAULT NULL,
  `SMIdyn` text COLLATE utf8_bin DEFAULT NULL,
  `HistologyCriteriaLGDNew_old` int(11) DEFAULT NULL,
  `HistologyCriteriaLGDNew_oldv2` int(11) DEFAULT NULL,
  `HistologyCriteriaLGDNew` int(11) DEFAULT NULL,
  `AgeCategory` int(11) DEFAULT NULL,
  `SizeCategory` int(11) DEFAULT NULL,
  `LocationCategory` int(11) DEFAULT NULL,
  `DurationCategory` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`_k_lesion`),
  UNIQUE KEY `_k_procedure_UNIQUE` (`_k_procedure`),
  CONSTRAINT `procedure` FOREIGN KEY (`_k_procedure`) REFERENCES `Procedure` (`_k_procedure`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lesion`
--

LOCK TABLES `Lesion` WRITE;
/*!40000 ALTER TABLE `Lesion` DISABLE KEYS */;
INSERT INTO `Lesion` VALUES (1,NULL,'243','Marie','Lewis','3667682','0000-00-00 00:00:00','87',' ','3/28/2017',0,1,1,2,1,' ',' ',1,4,1,'120',' ',1,1,0,0,0,0,0,0,1,' ',2,0,80,0,' ',8,0,2,2,0,' ',' ',2,0,1,0,0,1,1,' ',2,' ',' ',' ',' ',0,' ',' ',0,'2',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',3,3,3,2,2,2,'2'),(2,NULL,'210','Maureen','Thurston','3555232','0000-00-00 00:00:00','86',' ','11/1/2016',0,1,1,2,1,' ',' ',1,4,1,'500',' ',1,1,0,1,2,1,0,0,2,'greater curve',1,0,60,0,' ',2,0,3,4,0,' ',' ',2,1,1,0,0,1,1,' ',1,' ',' ',' ',' ',1,'3','1',1,' ',1,'2/2/2017','3','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','3',' ',' ',' ',' ',' ',' ',' ','Surgery',1,' ','1',3,3,3,2,2,2,'2'),(3,NULL,'103','Mustafa','Keskin','8027909','0000-00-00 00:00:00','65',' ','1/19/2012',0,1,1,1,1,' ',' ',1,1,1,'141','3',2,1,0,0,0,0,0,0,2,'Lesser curve/mid body',2,0,25,0,' ',2,1,1,1,0,' ',' ',2,0,1,0,0,1,1,' ',1,' ',' ',' ',' ',0,' ',' ',0,' ',1,'5/8/2012','4','0','0',' ',1,' ','1',' ','6/4/2013','0','0',' ','16','6/4/2013','0','0',' ','1','4',' ','no recurrence',0,' ','1',4,4,3,1,2,2,'2'),(4,NULL,'105',' Joseph','Frendo','2189104','0000-00-00 00:00:00','68',' ','3/8/2012',1,1,1,1,1,' ',' ',1,2,2,'155','2',1,1,0,0,0,0,0,0,5,'Antral',2,0,100,0,' ',3,1,2,2,0,' ',' ',2,1,1,0,1,0,1,' ',2,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/7/2012','4','0','0',' ',1,' ','0',' ','10/25/2012','1','1','HGD','7','10/25/2012','1','1','HGD','0','2','7.5945205479452','Subtotal gastrectomy on 19/12/12 by Dr Arthur Richardson. T3N0M0 moderately differentiated adenocarcinoma',0,' ','1',3,3,3,1,2,1,'2'),(5,NULL,'312','Irene','Regoli','3949584','0000-00-00 00:00:00','87',' ','3/23/2018',0,1,1,2,1,' ',' ',1,4,1,' ','2',1,1,1,1,2,0,0,0,3,'60% circumference',6,0,70,0,' ',2,1,2,2,0,' ',' ',2,0,1,0,0,0,1,'0',2,' ',' ',' ',' ',0,' ',' ',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',3,3,3,2,2,2,' '),(6,NULL,'101',' Joseph','Frendo','2189104','0000-00-00 00:00:00','66',' ','6/4/2010',2,1,0,1,1,' ',' ',1,1,1,'150','2',1,1,0,0,1,0,0,0,5,'Antrum posterior wall',2,0,45,0,' ',2,1,2,2,0,' ',' ',2,1,1,1,0,0,0,' ',0,'1','0','T1bN0M0',' ',0,' ',' ',0,'3',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','Subtotal gastrectomy on 19/12/12 by Dr Arthur Richardson. T3N0M0 moderately differentiated adenocarcinoma',0,' ','1',3,3,3,1,2,1,'2'),(7,NULL,'149','Ester','Porta','311976','0000-00-00 00:00:00','69',' ','12/23/2014',0,1,1,2,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,3,'mid body posterior wall',4,0,15,0,' ',2,1,3,4,0,' ',' ',1,1,1,1,0,0,0,' ',0,'0','0','T1bN0M0',' ',1,'1','1',1,'3',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','Surgery',0,' ','0',3,3,3,1,1,2,' '),(8,NULL,'133','Xue Cheng','Chao','893321','0000-00-00 00:00:00','59',' ','3/7/2014',0,1,1,1,1,' ',' ',1,1,1,'120','3',1,1,1,1,1,0,0,0,3,'Lesser curvature',2,0,70,1,' ',1,1,1,1,0,'0','1',2,1,0,0,1,1,0,' ',0,'1','0','T2N0M0',' ',0,' ',' ',0,' ',1,'7/8/2014','4','1','1','1',1,' ','1',' ','2/24/2015','1','1','Sur','11','2/24/2015','1','1','Sur','1','1','11.6383561643836','Surgery',0,' ','1',4,4,3,1,2,2,'2'),(9,NULL,'132','Kenneth','Neill','2984260','0000-00-00 00:00:00','82',' ','3/6/2014',0,1,1,1,1,' ',' ',1,1,1,'220','3',1,1,0,0,0,0,1,0,2,'Lesser curvature -proximal',2,0,40,1,' ',1,1,2,3,0,'0','1',2,1,0,0,0,1,1,' ',2,' ',' ',' ',' ',0,' ','1',1,' ',1,'6/17/2014','3','0','0',' ',0,'7','1','1',' ',' ',' ',' ','3',' ',' ',' ',' ','1','1','3','Declined further followup',0,' ','1',3,3,3,2,2,2,'2'),(10,NULL,'154','Aye','Ba','3156420','0000-00-00 00:00:00','77',' ','3/5/2015',0,1,1,1,1,' ',' ',1,1,1,'20','1',1,1,1,1,0,0,0,0,1,'CARDIA',4,0,20,1,' ',1,1,3,4,0,'1','0',1,1,0,0,0,1,1,' ',2,' ',' ',' ',' ',1,'2','2',0,' ',1,'10/13/2015','7','0','0',' ',0,'2','1','1',' ',' ',' ',' ','7',' ',' ',' ',' ','1','1','5','No recurrence',0,' ','1',3,3,3,2,2,2,'1'),(11,NULL,'279','Ingrid','Bohn','3794190','0000-00-00 00:00:00','74',' ','8/29/2017',0,1,1,2,1,'1','2',1,4,1,'80',' ',1,1,0,0,2,0,0,0,4,'incisura',2,0,20,1,' ',1,1,3,4,0,'0','1',1,1,0,0,0,1,0,'0',0,'0','0','0.0','0.0',1,'1','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',2,2,3,2,2,2,'1'),(12,NULL,'292','Sandra','Campbell','474398','0000-00-00 00:00:00','55',' ','11/21/2017',0,1,1,2,1,'1',' ',1,4,1,' ',' ',1,1,1,1,2,0,0,0,5,'antrum & distal body 5-12 o\'clock',4,0,50,1,' ',1,1,3,4,0,'1','0',2,1,0,0,0,1,0,'0',0,'0','0','0.0','0.0',1,'1','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',6,2,3,1,2,1,' '),(13,NULL,'271','Pearl','Chipkin','3776724','0000-00-00 00:00:00','88',' ','7/25/2017',0,1,1,2,1,'1','5',1,2,1,'80',' ',1,1,0,0,2,0,0,0,3,' ',4,0,10,1,' ',1,1,3,4,0,'1','0',1,1,0,0,0,1,1,'0',2,'0','0','0','0',1,'3','1',0,' ',1,'2/5/2018','7','0','0',' ',0,'1',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',3,3,3,2,1,2,'1'),(14,NULL,'134',' Janina','Zielonko','105361','0000-00-00 00:00:00','83',' ','3/25/2014',0,1,1,2,1,' ','3',1,1,1,'213','2',1,1,0,0,0,0,0,0,2,'Lesser curvature',4,0,20,1,' ',1,1,3,4,0,'0','1',1,1,0,0,0,0,1,'0',2,' ',' ',' ','need surg outcome',1,'1','1',0,' ',1,'7/30/2014','4','0','0',' ',0,'2','0',' ',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4','no further followup - age/comorbidities',0,' ','0',2,2,3,2,2,2,'2'),(15,NULL,'0','Darrel','Boyd','1467284','0000-00-00 00:00:00','63',' ','3/22/2016',0,1,1,1,1,' ',' ',1,2,1,'200',' ',1,1,1,1,0,0,0,0,3,'lesser curve, mid body to incisura',2,0,60,1,' ',1,1,3,4,0,'0','1',2,1,0,1,0,0,0,' ',0,'0','0','T1bN0M0',' ',1,'2','1',1,'3',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','0',' ','Surgery, no nodes positive, no residual tumour',0,' ','1',3,3,3,1,2,2,'2'),(16,NULL,'182','Gary','King','3449009','0000-00-00 00:00:00','53',' ','5/6/2016',0,1,1,1,1,'1','5',1,2,1,'135','1',1,1,0,1,2,0,0,0,1,'At COJ, associated with short segment BO',4,0,30,1,' ',1,1,3,4,0,'1','1',2,1,0,1,0,0,0,' ',0,'1','0','T2N0M0',' ',1,'2','1',0,'3',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','Surgery',0,' ','1',3,3,3,1,2,2,'2'),(17,NULL,'315','Maria','Romano','3965068','0000-00-00 00:00:00','65',' ','4/10/2018',0,1,1,2,1,' ',' ',1,4,1,' ','2',1,1,1,1,2,0,0,0,3,' ',4,1,20,1,' ',1,1,3,4,0,'1','0',2,1,0,1,0,0,0,'0',0,'1','0','Tis','Tis, reactive lymph node only, confined to mucosa',1,'1','2',1,'3',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',3,3,3,1,2,2,' '),(18,NULL,'116','Giovanni',' Salvatore','2840051','0000-00-00 00:00:00','78',' ','7/5/2013',0,1,1,1,1,' ',' ',1,1,1,'115','3',1,1,1,1,2,0,0,0,5,'Antrum/ posterior',2,0,35,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'2/4/2014','7','0','0',' ',1,' ','1',' ','8/14/2014','0','0',' ','13','8/14/2014','0','0',' ','1','3','7.03561643835616','return to referrer',0,' ','1',4,4,4,2,2,1,'2'),(19,NULL,'169','Helen','Abba','1882809','0000-00-00 00:00:00','71',' ','6/2/2015',0,1,1,2,1,' ',' ',1,1,1,' ',' ',2,1,0,0,0,0,0,0,4,'lesser curve',4,0,12,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,'7',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,2,1,2,' '),(20,NULL,'172','Roberto','Arevalo','1202838','0000-00-00 00:00:00','62',' ','9/22/2015',0,1,1,1,1,' ',' ',1,1,1,'35','1',1,1,0,0,0,0,0,0,2,'posterior wall',2,0,12,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/14/2016','6','0','0',' ',1,' ','1',' ','11/9/2017','0','0','0','25','11/9/2017','0','0','0','1','1',' ',' ',0,' ','1',4,4,4,1,1,2,'1'),(21,NULL,'278','William','Candiloro','3781397','0000-00-00 00:00:00','65',' ','8/22/2017',0,1,1,1,1,'1','L',1,4,1,'20',' ',1,1,0,0,2,0,0,0,5,'lesser curve',3,0,6,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ',' ',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',4,4,4,1,1,1,'1'),(22,NULL,'273','Carlo','Cogliato','3788099','0000-00-00 00:00:00','84',' ','8/22/2017',0,1,1,1,1,'1','H',1,4,1,'170',' ',1,1,1,1,2,0,0,0,5,'lesser curve prepyloric and involving th',3,0,30,1,' ',0,1,1,1,1,' ',' ',2,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ',' ',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',4,4,4,2,2,1,'2'),(23,NULL,'110',' Gordon','Cooke','1349067','0000-00-00 00:00:00','80',' ','1/22/2013',2,1,0,1,1,' ',' ',1,2,2,'73','1',2,0,0,0,0,0,0,0,3,'Greater curve/distal',2,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/9/2013','6','0','0',' ',1,' ','1',' ','2/6/2014','0','0',' ','57','11/16/2017','0','0','0','1','4','5.52328767123288','no recurrence',0,' ','1',4,4,4,2,1,2,'1'),(24,NULL,'171','Gwenfydd','Cryer','3199217','0000-00-00 00:00:00','66',' ','4/14/2015',0,1,1,2,1,' ',' ',1,1,1,' ',' ',1,1,1,0,0,0,1,0,5,'anterior wall',4,0,5,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/18/2015','4','0','0',' ',1,' ','1',' ','2/15/2017','0','0',' ','22','2/15/2017','0','0',' ','1','2',' ',' ',0,' ','1',4,4,4,1,1,1,' '),(25,NULL,'137','Piero','Del Buono','3033943','0000-00-00 00:00:00','75',' ','7/15/2014',0,1,1,1,1,' ',' ',1,1,1,'140','2',1,1,0,0,0,0,0,0,3,'greater curve mid body',4,0,20,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/27/2014','4','0','0',' ',0,'2','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4.43835616438356',' ',0,' ','1',4,4,4,2,2,2,'2'),(26,NULL,'240','Marie','Fausset','3669951','0000-00-00 00:00:00','83',' ','3/16/2017',0,1,1,2,1,' ',' ',1,4,1,' ',' ',1,1,1,1,1,0,0,0,5,' ',2,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/27/2017','6','0','0',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,2,1,1,' '),(27,NULL,'235','Grantley','Geaghan','3637195','0000-00-00 00:00:00','66',' ','2/21/2017',0,1,1,1,1,' ',' ',1,4,1,' ',' ',1,1,0,1,2,0,0,0,5,' ',4,0,35,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/14/2017','5','0','0','0',0,'1','0',' ',' ',' ',' ',' ','5','8/14/2017','0','0',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,2,1,' '),(28,NULL,'148','Roberto','Hamad','3113372','0000-00-00 00:00:00','63',' ','12/16/2014',0,1,1,1,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,4,'incisura',2,0,30,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'10/7/2015','10','0','0',' ',0,'2','1','1',' ',' ',' ',' ','9',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',4,4,4,1,2,2,' '),(29,NULL,'263','Debra','Havemann','3762878','0000-00-00 00:00:00','37',' ','7/4/2017',0,1,1,1,1,' ',' ',1,4,1,'180','1',1,0,1,0,1,0,0,0,1,'fundus, greater curver, difficult access',2,0,60,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'1/22/2018','6','0',' ',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,2,2,'2'),(30,NULL,'305','Ross','Jones','1359547','0000-00-00 00:00:00','79',' ','2/6/2018',0,1,1,1,2,' ',' ',1,4,1,'40','3',2,1,0,0,2,0,0,0,5,' ',4,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',4,4,4,2,1,1,'1'),(31,NULL,'142','Ross','Jones','3089559','0000-00-00 00:00:00','76',' ','9/9/2014',0,1,1,1,1,' ',' ',1,1,1,' ',' ',1,1,1,0,1,1,1,0,3,'greater curve',2,0,70,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'4/23/2015','7','0','0',' ',0,'2','1','1',' ',' ',' ',' ','7',' ',' ',' ',' ','1','1','7',' ',0,' ','1',4,4,4,2,2,2,' '),(32,NULL,'272','Jackson','Kinglake','1895935','0000-00-00 00:00:00','58',' ','7/25/2017',0,1,1,1,1,'1','1',1,4,1,'110',' ',1,0,1,1,2,0,0,0,4,'incisura',2,0,25,1,' ',0,1,1,1,1,' ',' ',2,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ',' ',0,' ',1,'1/30/2018','7','0','0',' ',0,'1',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',4,4,4,1,2,2,'2'),(33,NULL,'160','Arthur','Kingston','1307182','0000-00-00 00:00:00','71',' ','7/28/2015',2,1,0,1,1,' ',' ',1,1,2,' ',' ',1,1,0,0,0,0,0,0,5,'3 oclock relative to pylorus',2,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/24/2015','4','0',' ','0',0,'2','1','1',' ',' ',' ',' ','3',' ',' ',' ',' ','1','1','3.91232876712329',' ',0,' ','1',4,4,4,2,1,1,' '),(34,NULL,'125','Joanna','Krygler','2901196','0000-00-00 00:00:00','69',' ','11/19/2013',0,1,1,2,1,' ',' ',1,1,1,'122','2',1,1,0,0,0,0,0,0,1,'Cardia',6,0,30,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/4/2014','3','0','0',' ',1,' ','1',' ','4/13/2015','0','0',' ','16','4/13/2015','0','0',' ','1','2',' ',' ',0,' ','1',4,4,4,1,2,2,'2'),(35,NULL,'164','Zhen Fu','Liu','2805725','0000-00-00 00:00:00','62',' ','7/14/2015',2,1,0,1,1,' ',' ',1,1,1,' ',' ',2,1,0,0,0,0,0,0,5,'anterior wall',4,0,18,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'2/15/2016','7','0','0',' ',1,' ','1',' ','11/21/2016','0','0',' ','28','11/16/2017','0','0',' ','1','2',' ',' ',0,' ','1',4,4,4,1,1,1,' '),(36,NULL,'130','Jianhang','Liu','2413509','0000-00-00 00:00:00','74',' ','1/21/2014',0,1,1,1,1,' ',' ',1,1,1,'90','2',1,1,0,0,1,0,0,0,5,'Antrum posterior',3,0,20,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/16/2014','6','0','0',' ',1,' ','1',' ','9/30/2016','0','0',' ','32','9/30/2016','0','0',' ','1','3',' ',' ',0,' ','1',4,4,4,2,2,1,'1'),(37,NULL,'145','Chee','Loon Chee','3106930','0000-00-00 00:00:00','62',' ','11/4/2014',0,1,1,1,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,5,'proximal antrum',3,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/17/2015','8','0','0',' ',0,'2','1','1',' ',' ',' ',' ','8',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,1,1,' '),(38,NULL,'141','James','Maxwell','3057767','0000-00-00 00:00:00','86',' ','8/5/2014',0,1,1,1,1,' ',' ',1,1,1,'120','3',1,0,0,0,0,0,0,0,5,'anterio wall antrum',4,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'12/9/2014','4','0','0',' ',0,'7','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4.14246575342466',' ',0,' ','1',4,4,4,2,1,1,'2'),(39,NULL,'0','Michael','McKeown','3375011','0000-00-00 00:00:00','66',' ','1/15/2016',0,1,1,1,1,'0',' ',1,2,1,'35',' ',1,1,0,1,1,0,0,0,2,'LESSER CURVE side',4,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/21/2016','6','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','6',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',4,4,4,1,1,2,'1'),(40,NULL,'129','John','Molnar','2784646','0000-00-00 00:00:00','72',' ','1/14/2014',0,1,1,1,1,' ',' ',1,1,1,'60','2',1,1,0,0,0,0,0,0,5,'antral',3,0,12,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'9/29/2014','8','0','0',' ',0,'2','1','1',' ',' ',' ',' ','8',' ',' ',' ',' ','1','1','8','No recurrence',0,' ','1',4,4,4,2,1,1,'1'),(41,NULL,'152','Maureen','Morley','1592513','0000-00-00 00:00:00','64',' ','2/3/2015',0,1,1,2,1,' ',' ',1,1,1,' ','2',1,0,0,0,0,0,0,0,5,'antrum',2,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/10/2015','6','0','0',' ',1,' ','1',' ','8/29/2016','0','0',' ','18','8/29/2016','0','0',' ','1','2','18',' ',0,' ','1',4,4,4,1,1,1,' '),(42,NULL,'175','Peter','Morris','3342259','0000-00-00 00:00:00','65',' ','11/10/2015',0,1,1,1,1,' ',' ',1,1,1,'20',' ',1,0,0,0,0,0,0,0,5,'greater curve',4,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'6/9/2016','7','0','0',' ',0,'2','1','1',' ',' ',' ',' ','6',' ',' ',' ',' ','1','1','7',' ',0,' ','1',4,4,4,1,1,1,'1'),(43,NULL,'205','Sainimili','Nakilimoce','2638488','0000-00-00 00:00:00','24',' ','9/27/2016',1,1,1,2,1,'0',' ',1,2,1,'90','1',2,0,0,1,0,1,0,0,5,'11 to 5 o clock',6,0,40,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/3/2017','6','0','0',' ',1,' ','0',' ','3/13/2018','0','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,2,1,'1'),(44,NULL,'184','Sainimili','Nakilimoce','2638488','0000-00-00 00:00:00','23',' ','5/10/2016',2,1,0,2,1,'1','1',1,2,1,'20','1',1,1,0,0,2,0,0,0,5,'pyloric 11 o\'clock',2,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'9/27/2016','4','0','0','0',0,'1','1',' ',' ',' ',' ',' ','4',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,1,1,'1'),(45,NULL,'121','Kyoung','Ree','2878829','0000-00-00 00:00:00','72',' ','9/10/2013',0,1,1,1,1,' ',' ',1,1,1,'135','1',1,1,0,0,2,0,0,0,5,'Greater curve/antrum',2,0,30,1,' ',1,1,1,1,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'1/14/2014','4','0','0',' ',1,' ','1',' ','9/2/2014','0','0',' ','11','9/2/2014','0','0',' ','1','2','4.14246575342466',' ',0,' ','1',4,4,4,2,2,1,'2'),(46,NULL,'0','Hyun','Shin','3359542','0000-00-00 00:00:00','51',' ','1/15/2016',0,1,1,1,1,' ',' ',1,2,1,'20',' ',1,0,0,0,0,0,0,0,5,'anterior wall',4,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/27/2016','6','0','0',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,1,1,1,'1'),(47,NULL,'157','BouMalhab','Sleiman','0','0000-00-00 00:00:00','72',' ','3/17/2015',0,1,1,1,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,5,'great curve antrum',4,0,10,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/27/2015','5','0','0',' ',0,'2','1','1',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1','5',' ',0,' ','1',4,4,4,2,1,1,' '),(48,NULL,'208','Francesco','Stivala','1547142','0000-00-00 00:00:00','72',' ','11/8/2016',2,1,0,1,1,'0',' ',1,4,1,'30',' ',1,0,0,1,0,0,0,0,3,'greater curve',2,0,20,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/16/2017','12','0',' ',' ',0,'1','0',' ',' ',' ',' ',' ','12',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',4,4,4,2,2,2,'1'),(49,NULL,'185','Marcel','Van Ommeren','47551','0000-00-00 00:00:00','58',' ','11/20/2015',0,1,1,2,1,' ',' ',1,2,1,' ',' ',0,1,0,0,0,0,0,0,5,' ',4,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'4/28/2016','5','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1','5',' ',0,' ','1',4,4,4,1,1,1,' '),(50,NULL,'153','JOSE','Vieira','3174333','0000-00-00 00:00:00','69',' ','3/3/2015',0,1,1,1,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,2,'proximal lesser curve',4,0,5,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'6/11/2015','3','0','0','0',1,' ','1',' ','6/9/2016','0',' ',' ','27','6/8/2017','0',' ',' ','1','2','15',' ',0,' ','1',4,4,4,1,1,2,' '),(51,NULL,'192','Colin','Walton','3452225','0000-00-00 00:00:00','70',' ','6/14/2016',0,1,1,1,1,'0',' ',1,2,1,'20','2',1,1,0,1,2,0,0,0,5,'antrum, posterior wall',2,0,15,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'12/13/2016','6','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',4,4,4,1,1,1,'1'),(52,NULL,'150','Shu','Wang','2671002','0000-00-00 00:00:00','77',' ','12/23/2014',0,1,1,2,1,' ',' ',1,3,2,' ',' ',2,0,0,0,1,0,0,0,3,'greater curve',2,0,8,1,' ',1,1,1,1,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/6/2015','7','0','0',' ',0,'2','1','1',' ',' ',' ',' ','7',' ',' ',' ',' ','1','1','7',' ',0,' ','1',4,4,4,2,1,2,' '),(53,NULL,'140','Habiburahman',' Ghani','749506','0000-00-00 00:00:00','74',' ','7/29/2014',0,1,1,1,1,' ',' ',1,1,1,'120','3',1,0,0,0,0,0,0,0,2,'proximal stomach',1,0,10,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,'6',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','deceased',0,' ','1',1,1,1,2,1,2,'2'),(54,NULL,'118','Maria','Campuzano','2854810','0000-00-00 00:00:00','60',' ','7/30/2013',0,1,1,2,1,' ',' ',1,1,1,'95','2',2,1,0,0,0,0,0,0,5,'Antrum/greater curve',2,0,10,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'1/21/2014','6','0','0',' ',1,' ','1',' ','5/26/2014','0','0',' ','9','5/26/2014','0','0',' ','1','2','5.75342465753425',' ',0,' ','1',1,1,1,1,1,1,'2'),(55,NULL,'119','Sydney','D\'Ornay','2878218','0000-00-00 00:00:00','77',' ','8/27/2013',0,1,1,1,1,' ',' ',1,1,1,'125','3',2,1,1,0,1,1,0,0,5,'Antrum/posterior wall',6,0,30,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'1/16/2014','5','0','0',' ',0,'2','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4.66849315068493','Check with MB/EL rooms.',1,' ','1',2,2,2,2,2,1,'2'),(56,NULL,'0','George','Davies','3396398','0000-00-00 00:00:00','83',' ','3/18/2016',0,1,1,1,1,'1','2',1,2,1,'130',' ',1,1,0,0,1,0,0,0,5,'lesser curve, 12 to 3 o\'clock',3,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'2/8/2017','11','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','10',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',1,1,1,2,2,1,'2'),(57,NULL,'155','Antoinet','Debono','0','0000-00-00 00:00:00','83',' ','3/6/2015',0,1,1,2,1,' ',' ',1,1,1,' ','3',1,1,0,0,0,0,0,0,5,'antrum',2,0,30,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/15/2015','8','0','0',' ',0,'2','1','1',' ',' ',' ',' ','8',' ',' ',' ',' ','1','1','8',' ',0,' ','1',2,2,2,2,2,1,' '),(58,NULL,'202','Gordon','Dein','3545182','0000-00-00 00:00:00','61',' ','9/20/2016',0,1,1,1,1,' ',' ',1,4,1,'45','2',1,1,0,1,2,0,0,0,3,'greater curve',4,0,40,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'2/20/2017','6','0','0',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',2,2,2,1,2,2,'1'),(59,NULL,'0','Milton','Elliott','164901','0000-00-00 00:00:00','65',' ','7/11/2017',0,1,1,2,1,'1','2',1,4,1,' ',' ',1,1,1,1,1,0,1,0,5,'inferior wall',2,0,10,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,'2',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,1,1,1,' '),(60,NULL,'195','Shumi','Fukuda','0','0000-00-00 00:00:00','66',' ','2/24/2015',0,1,1,2,1,'0',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,5,' ',3,0,15,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/18/2015','6','0','0',' ',1,' ','1',' ','2/12/2016','0','0',' ','11','2/12/2016','0','0',' ','1','2','11','Clear',0,' ','1',1,1,1,1,1,1,' '),(61,NULL,'194','Manny','Getzler','3205329','0000-00-00 00:00:00','84',' ','7/26/2016',1,1,1,1,1,' ',' ',1,2,1,'35',' ',2,1,1,1,1,0,0,0,6,'COJ',2,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'2/10/2017','7','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','6',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',1,1,1,2,2,2,'1'),(62,NULL,'0','Robert','Griffin','3381612','0000-00-00 00:00:00','80',' ','2/25/2016',0,1,1,1,1,'0',' ',1,2,1,' ','2',1,1,1,1,2,0,0,0,5,' ',4,0,35,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/19/2016','5','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',2,2,2,2,2,1,' '),(63,NULL,'0','Benjamin','Jones','90317','0000-00-00 00:00:00','85',' ','4/5/2016',0,1,1,1,1,'1','2',1,2,1,'110',' ',1,1,1,1,2,0,0,0,3,'distal body, greater curve',2,0,40,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'9/19/2016','5','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1','5',' ',0,' ','1',2,2,2,2,2,2,'2'),(64,NULL,'0','Hee','Kang','2523791','0000-00-00 00:00:00','70',' ','11/17/2015',0,1,1,1,1,'1','2',1,1,1,'50','1',1,1,0,0,0,0,0,0,5,'posterior wall',2,0,8,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'5/12/2016','6','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',1,1,1,1,1,1,'1'),(65,NULL,'124','Arthur','Kingston','1307182','0000-00-00 00:00:00','69',' ','11/14/2013',1,1,1,1,1,' ',' ',1,1,1,'210','3',1,1,0,0,0,0,0,0,5,'Antrum',3,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/25/2014','4','0','0',' ',1,' ','1',' ','7/28/2015','0','0',' ','20','7/28/2015','0','0',' ','1','3','24.3287671232877',' ',0,' ','1',1,1,1,1,2,1,'2'),(66,NULL,'231','Kevin','Kirk','3630830','0000-00-00 00:00:00','75',' ','1/31/2017',0,1,1,1,1,'1','5',1,4,1,'45',' ',1,1,0,1,2,0,0,0,1,'GOJ, 7 o\'clock',6,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/24/2017','7','0','0',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,2,2,2,'1'),(67,NULL,'104','Joseph','Li','2559965','0000-00-00 00:00:00','61',' ','2/9/2012',0,1,1,1,1,' ',' ',1,1,1,'210','2',2,0,0,0,0,0,0,0,5,'Lesser curve/antrum',4,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'6/19/2012','4','0','0',' ',1,' ','1',' ','11/15/2013','0','0',' ','21','11/15/2013','0','0',' ','1','2','4.30684931506849',' ',0,' ','1',1,1,1,1,2,1,'2'),(68,NULL,'115','Zhen Fu','Liu','2805725','0000-00-00 00:00:00','60',' ','5/10/2013',1,1,1,1,1,' ',' ',1,1,1,'150','2',1,1,0,0,2,0,0,0,4,'Incisura',2,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'9/10/2013','4','0','0',' ',1,' ','1',' ','1/30/2014','0','0',' ','54','11/16/2017','0','0',' ','1','4','8','no recurrence',0,' ','1',1,1,1,1,2,2,'2'),(69,NULL,'204','Bozo','Mijatovic','2077911','0000-00-00 00:00:00','74',' ','9/22/2016',0,1,1,1,1,'0',' ',1,2,1,'75','2',1,1,1,1,1,1,0,0,2,'Lesser curve, GOJ',4,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/9/2017','6','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',1,1,1,2,2,2,'1'),(70,NULL,'114','John','Molnar','2784646','0000-00-00 00:00:00','71',' ','4/2/2013',0,1,1,1,1,' ',' ',1,1,1,'90','2',2,0,0,0,0,0,0,0,5,'Antral',3,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'10/22/2013','7','0','0',' ',1,' ','1',' ','3/14/2014','0','0',' ','11','3/14/2014','0','0',' ','1','3','6.67397260273973','no recurrence',0,' ','1',1,1,1,2,2,1,'1'),(71,NULL,'112','John','Molnar','2784646','0000-00-00 00:00:00','71',' ','3/8/2013',0,1,1,1,1,' ',' ',1,1,1,'60','2',1,1,0,0,0,0,0,0,5,'Greater curve/antrum',4,0,30,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'10/22/2013','7','0','0',' ',1,' ','1',' ','3/14/2014','0','0',' ','12','3/14/2014','0','0',' ','1','3','7.4958904109589','no recurrence',0,' ','1',2,2,2,2,2,1,'1'),(72,NULL,'146','Elena','Nero','3115314','0000-00-00 00:00:00','65',' ','12/9/2014',0,1,1,2,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,3,'posterior wall',6,0,20,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'4/28/2015','5','0','0',' ',0,'2','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4',' ',0,' ','1',1,1,1,1,2,2,' '),(73,NULL,'0','Thomas','Phelan','297929','0000-00-00 00:00:00','85',' ','2/16/2016',0,1,1,1,1,'0',' ',1,2,1,' ','3',1,1,1,1,0,0,0,0,5,'Antrum',2,0,40,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/18/2016','6','0','0',' ',1,' ','1',' ','7/12/2017','0','0','0','16','7/12/2017','0','0','0','1','1',' ',' ',0,' ','1',2,2,2,2,2,1,' '),(74,NULL,'138','Alberto','Santos','3010316','0000-00-00 00:00:00','74',' ','7/22/2014',0,1,1,1,1,' ',' ',1,1,1,'140','2',1,1,0,0,1,0,0,0,4,'angulus',3,0,40,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'11/25/2014','4','0','0',' ',1,' ','1',' ','6/20/2016','0','0',' ','22','6/20/2016','0','0',' ','1','1','24',' ',0,' ','1',2,2,2,2,2,2,'2'),(75,NULL,'123',' Judith','Schuiki','2878814','0000-00-00 00:00:00','69',' ','9/17/2013',0,1,1,2,1,' ',' ',1,1,1,'165','2',1,1,1,0,1,2,0,0,4,'Anterior wall/incisura',2,0,45,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'8/19/2014','11','0','0',' ',1,' ','1',' ','7/16/2015','0','0',' ','21','7/16/2015','0','0',' ','1','3','11.0465753424658','no recurrence',0,' ','1',2,2,2,1,2,2,'2'),(76,NULL,'163','Sylvia','Sherwood','622803','0000-00-00 00:00:00','84',' ','4/14/2015',0,1,1,2,1,' ',' ',2,1,1,' ',' ',1,1,0,0,0,0,0,0,2,'lesser curve',4,0,8,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'7/17/2015','3','0','0','0',0,'7','1','1',' ',' ',' ',' ','3',' ',' ',' ',' ','1','1','3.09041095890411',' ',0,' ','1',1,1,1,2,1,2,' '),(77,NULL,'120','Graeme','Sontag','2863389','0000-00-00 00:00:00','63',' ','9/3/2013',0,1,1,1,1,' ',' ',1,1,1,'125','3',1,1,1,0,1,1,0,0,1,'Cardia GOJ',6,0,15,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,'4',0,' ',' ',' ',' ',' ',0,'4','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,1,1,2,'2'),(78,NULL,'0','Allan','Sonter','242678','0000-00-00 00:00:00','88',' ','3/29/2016',2,1,0,1,1,' ',' ',1,2,1,'30',' ',1,1,0,1,0,0,0,0,1,' ',4,0,8,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'10/27/2016','7','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','6',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,2,1,2,'1'),(79,NULL,'144','Yvonne','YEE','716123','0000-00-00 00:00:00','74',' ','10/14/2014',0,1,1,2,1,' ',' ',1,1,1,' ',' ',1,1,0,0,0,0,0,0,3,'anterior wall',3,0,15,1,' ',1,1,2,2,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'3/11/2015','5','0',' ',' ',0,'2','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4',' ',0,' ','1',1,1,1,2,1,2,' '),(80,NULL,'127','Bruno','Zappavigna','452350','0000-00-00 00:00:00','69',' ','11/26/2013',0,1,1,1,1,' ',' ',1,1,1,'170','3',1,1,0,0,0,0,1,0,1,'Oesophageal/ Cardia??',6,0,30,1,' ',1,1,2,2,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,'5/15/2014','6','0','0',' ',1,' ','1',' ','11/18/2014','0','0',' ','11','11/18/2014','0','0',' ','1','3','5.58904109589041','no further followup - comorbidities',0,' ','1',2,2,2,1,2,2,'2'),(81,NULL,'136','Dorothy',' Laws','147923','0000-00-00 00:00:00','79',' ','6/24/2014',0,1,1,2,1,' ',' ',1,1,1,'90','3',1,0,0,0,0,0,0,0,5,'amtrum post. Wall',4,0,35,1,' ',1,1,2,3,1,' ',' ',2,1,0,0,0,0,1,' ',2,' ',' ',' ','need surg outcome',0,' ','1',0,' ',1,'10/28/2014','4','0','0',' ',0,'2','0',' ',' ',' ',' ',' ','4',' ',' ',' ',' ',' ',' ',' ','no surveillance',0,' ','1',3,3,3,2,2,1,'1'),(82,NULL,'280','Domenic','Alvaro','3822525','0000-00-00 00:00:00','70',' ','9/5/2017',0,1,1,1,1,'1','5',1,4,1,'60','1',1,1,1,1,2,0,0,0,5,'anterior wall',3,0,15,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',1,1,1,1,1,1,'1'),(83,NULL,'108','Alfie','Borg','2683524','0000-00-00 00:00:00','74',' ','9/21/2012',0,1,1,1,1,' ',' ',1,1,1,'170','3',2,1,0,0,0,0,0,0,1,'Oesophageal/Cardia??',4,0,15,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'3/18/2014','18','0','0',' ',0,'2','1','1',' ',' ',' ',' ','17',' ',' ',' ',' ','1','1','17.8520547945205',' ',0,' ','1',1,1,1,2,1,2,'2'),(84,NULL,'283','Joy','Brogan','3792796','0000-00-00 00:00:00','69',' ','9/19/2017',0,1,1,2,1,'1','H',1,4,1,'95',' ',1,1,1,1,2,0,0,0,5,'pre-pyloric',2,0,50,1,' ',0,1,2,3,1,' ',' ',2,0,0,0,0,0,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',2,2,2,1,2,1,'2'),(85,NULL,'178','Su-Ting','Cheng','3424743','0000-00-00 00:00:00','55',' ','4/12/2016',0,1,1,2,1,'0','0',1,2,1,'75','1',1,1,0,1,2,0,0,0,3,'lesser curve',3,0,30,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'11/1/2016','7','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','6',' ',' ',' ',' ','1','1',' ',' ',0,' ','1',2,2,2,1,2,2,'1'),(86,NULL,'306','Kel','Chong','3949571','0000-00-00 00:00:00','77',' ','3/22/2018',0,1,1,2,1,' ',' ',2,3,1,'60','2',1,1,0,0,2,0,0,0,5,'posterior wall',4,0,10,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',1,1,1,2,1,1,'1'),(87,NULL,'111',' Gordon','Cooke','1349067','0000-00-00 00:00:00','80',' ','3/7/2013',1,1,1,1,1,' ',' ',1,1,1,'120','3',1,1,0,0,0,0,0,0,3,'Lesser curve/distal',2,0,35,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'7/9/2013','4','0','0','0',1,' ','1',' ','3/6/2014','0','0','0','56','11/16/2017','0','0','0','1','4','32.2191780821918','no recurrence',0,' ','1',2,2,2,2,2,2,'2'),(88,NULL,'126',' Allan','Farrey','526946','0000-00-00 00:00:00','83',' ','11/26/2013',0,1,1,1,1,' ',' ',1,1,1,'115','3',1,1,0,0,0,0,0,0,1,'Oesophageal/ Cardia??',2,0,15,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'2/18/2014','3','0','0',' ',1,' ','1',' ','8/12/2014','0','0',' ','8','8/12/2014','0','0',' ','1','10','2.76164383561644','Close surveillance. Further procedure planned for 6 months at Westmead.',0,' ','1',1,1,1,2,1,2,'2'),(89,NULL,'181','Nick','Georgiou','335413','0000-00-00 00:00:00','64',' ','4/26/2016',0,1,1,1,1,' ',' ',1,2,1,'20','4',1,1,0,1,1,0,0,0,5,'anterior wall',2,0,15,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'9/13/2016','5','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4',' ',0,' ','1',1,1,1,1,1,1,'1'),(90,NULL,'179','Manny','Getzler','3205329','0000-00-00 00:00:00','83',' ','4/28/2015',2,1,0,1,1,' ',' ',1,2,1,' ',' ',1,1,0,0,1,0,0,0,2,'greater curve side, 3cm below GEJ',4,0,20,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'8/11/2015','3','0','0',' ',1,' ','1',' ','4/5/2016','0','0',' ','11','4/5/2016','0','0',' ','1','3','12','Metachronous lesion sc2',0,' ','1',1,1,1,2,2,2,' '),(91,NULL,'139',' Abdul','Ghafoor','864658','0000-00-00 00:00:00','59',' ','7/22/2014',0,1,1,1,1,' ',' ',1,1,1,'90','3',1,0,0,0,0,0,0,0,4,'angulus',3,0,10,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'11/6/2014','4','0','0',' ',1,' ','1',' ','2/24/2015','0','0',' ','7','2/24/2015','0','0',' ','1','4','7.13424657534247','no recurrence',0,' ','1',1,1,1,1,1,2,'1'),(92,NULL,'298','Donald','Gutteridge','3254373','0000-00-00 00:00:00','83',' ','12/19/2017',3,1,0,1,1,' ',' ',1,4,1,'45','2',1,1,1,1,2,0,0,0,4,'incisura',4,0,8,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',1,1,1,2,1,2,'1'),(93,NULL,'167','Donald','Gutteridge','3254373','0000-00-00 00:00:00','83',' ','6/9/2015',1,1,1,1,1,' ',' ',1,1,1,' ','3',1,1,0,0,2,0,0,0,4,'incisura',2,0,8,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,' ',1,'11/12/2015','5','0','0',' ',0,'1',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',1,1,1,2,1,2,' '),(94,NULL,'107','Peter','Hatzis','272139','0000-00-00 00:00:00','77',' ','6/29/2012',0,1,1,1,1,' ',' ',1,1,1,'279','3',2,1,0,0,0,0,0,0,3,'Anterior wall',2,0,60,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'10/23/2012','4','0','0','0',1,' ','1',' ','6/1/2013','0','0','0','11','6/1/2013','0','0','0','1','4','40.4712328767123',' ',0,' ','1',2,2,2,2,2,2,'2'),(95,NULL,'287','Ahmet','Havic','3861031','0000-00-00 00:00:00','79',' ','11/7/2017',0,1,1,1,1,' ',' ',1,4,1,'180',' ',1,1,1,1,2,0,0,0,5,' ',4,0,25,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',2,2,2,2,2,1,'2'),(96,NULL,'113','James','Hayley','801119','0000-00-00 00:00:00','85',' ','4/2/2013',0,1,1,1,1,' ',' ',1,1,1,'205','3',1,1,1,0,1,1,0,0,3,'Lesser curve',3,0,80,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'9/17/2013','6','0','0',' ',1,' ','1',' ','3/13/2014','0','0',' ','11','3/13/2014','0','0',' ','1','2','5.52328767123288',' ',0,' ','1',2,2,2,2,2,2,'2'),(97,NULL,'166','Taisia','Kaye','3217731','0000-00-00 00:00:00','75',' ','6/9/2015',0,1,1,2,1,' ',' ',1,1,1,'105',' ',1,1,0,0,0,0,0,0,5,'lesser curve',3,0,70,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'11/20/2015','5','0',' ','0',0,'2','1','1',' ',' ',' ',' ','5',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',2,2,2,2,2,1,'2'),(98,NULL,'274','Nikolaos','Koutzas','518286','0000-00-00 00:00:00','53',' ','8/1/2017',0,1,1,1,1,'1','2',1,4,1,'120',' ',1,1,0,0,2,0,0,0,5,'incisura',4,0,30,1,' ',0,1,2,3,1,' ',' ',2,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,' ',1,'4/4/2018','8','0','0','0',0,'1',' ',' ',' ',' ',' ',' ','8',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',2,2,2,1,2,1,'2'),(99,NULL,'206','Antonio','Macri','2874926','0000-00-00 00:00:00','65',' ','10/4/2016',0,1,1,1,1,'1','2',1,2,1,'50','3',1,1,1,0,2,0,0,0,3,'greater curve, distal body',4,0,20,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,'4',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,1,2,2,'1'),(100,NULL,'147','Elwyn','Skinner','637915','0000-00-00 00:00:00','87',' ','12/9/2014',0,1,1,1,1,' ',' ',1,1,1,' ','3',1,1,0,0,1,0,0,0,5,'lesser curve',6,0,15,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'5/7/2015','5','0','0',' ',0,'7','1','1',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','1',' ',0,' ','1',1,1,1,2,1,1,' '),(101,NULL,'122','Allan','Sonter','242678','0000-00-00 00:00:00','85',' ','9/10/2013',1,1,1,1,1,' ',' ',1,1,1,'95','3',1,1,1,0,1,1,0,0,1,'Cardia',4,0,10,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'11/26/2013','3','0','0',' ',1,' ','1',' ','7/2/2014','0','0',' ','9','7/2/2014','0','0',' ','1','6','2.53150684931507','no recurrence',0,' ','1',1,1,1,2,1,2,'2'),(102,NULL,'156','Francesco','Stivala','0','0000-00-00 00:00:00','76',' ','3/10/2015',1,1,1,1,1,' ',' ',1,1,1,' ','3',1,1,1,1,1,0,0,0,3,'distal lesser curve body',2,0,120,1,' ',1,1,2,3,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'8/20/2015','5','0','0',' ',1,' ','1',' ','11/16/2017','0',' ',' ','32','11/16/2017','0',' ',' ','1','1','5',' ',0,' ','1',2,2,2,2,2,2,' '),(103,NULL,'276','Luigi','Vescio','3751802','0000-00-00 00:00:00','85',' ','8/8/2017',0,1,1,1,1,'1','5',1,4,1,'85',' ',1,1,1,1,2,0,0,0,5,' ',2,0,35,1,' ',0,1,2,3,1,' ',' ',2,0,0,0,0,1,0,'0',0,'0','0','0.0','0.0',0,' ','2',0,' ',1,'3/15/2018','7','0','0','0',0,'1','0',' ',' ',' ',' ',' ','7',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',2,2,2,2,2,1,'1'),(104,NULL,'151','Allan','Waters','3152827','0000-00-00 00:00:00','66',' ','12/23/2014',0,1,1,1,1,' ',' ',1,1,1,' ','2',1,1,0,0,0,0,0,0,4,'lesser curve+incisura',6,0,20,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'4/23/2015','4','0','0',' ',1,' ','1',' ','11/26/2015','0','0',' ','11','11/26/2015','0','0',' ','1','2','11',' ',0,' ','1',1,1,1,1,2,2,' '),(105,NULL,'180','Helen','Woods','3446899','0000-00-00 00:00:00','66',' ','4/22/2016',0,1,1,2,1,'1','2',1,2,1,'35',' ',1,1,0,0,2,0,0,0,3,'lesser curve',1,0,10,1,' ',1,1,2,3,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',0,' ','2',0,' ',1,'11/28/2016','6','0','0',' ',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','1',1,1,1,1,1,2,'1'),(106,NULL,'293','Patricia','Fraser','3868429','0000-00-00 00:00:00','76',' ','11/28/2017',0,1,1,2,1,'1','H',1,4,1,'180','2',1,1,1,1,2,0,0,0,1,' ',2,0,30,1,' ',1,1,3,4,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',1,'1','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ','0',6,2,2,2,2,2,'2'),(107,NULL,'131','Elwin',' Davis','2984083','0000-00-00 00:00:00','82',' ','3/4/2014',0,1,1,1,1,' ',' ',1,1,1,'90',' ',1,1,1,1,1,0,0,0,2,'lesser curvature - proximal',4,0,20,1,' ',1,1,3,4,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',1,'1','2',0,' ',1,'7/3/2014','4','0','0',' ',0,'7','1','1',' ',' ',' ',' ','3',' ',' ',' ',' ','1','1','4',' ',0,' ','0',2,2,2,2,2,2,'1'),(108,NULL,'159','Manuel','Coelho','3275007','0000-00-00 00:00:00','82',' ','7/28/2015',0,1,1,1,1,' ',' ',1,1,2,' ',' ',1,1,0,0,0,0,0,0,4,' ',2,0,25,1,' ',1,1,3,4,1,' ',' ',2,1,0,0,0,1,1,' ',2,' ',' ',' ',' ',1,'3','2',1,'7',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','No surveillance',0,' ','1',3,3,3,2,2,2,' '),(109,NULL,'135','Edward','Cynkar','2978250','0000-00-00 00:00:00','76',' ','4/1/2014',0,1,1,1,1,' ',' ',1,1,1,'155','3',1,1,0,0,1,0,0,0,1,'Cardia/Proximal greater curvature',4,0,25,1,' ',1,1,3,4,1,' ',' ',2,1,0,0,0,1,1,' ',2,' ',' ',' ',' ',1,'1','2',1,' ',1,'2/12/2015','10','0','0',' ',0,'2','1','1',' ',' ',' ',' ','10',' ',' ',' ',' ','1','1','10.4219178082192','Outcome ? Surgery planned',0,' ','0',3,3,3,2,2,2,'2'),(110,NULL,'201','Donald','Delaney','3525705','0000-00-00 00:00:00','82',' ','9/13/2016',0,1,1,1,1,'0',' ',1,2,1,'45','3',1,1,0,1,2,0,0,0,3,'lesser curve',4,0,30,1,' ',1,1,3,4,1,' ',' ',2,1,0,0,0,1,1,' ',2,' ',' ',' ',' ',1,'1','2',1,' ',1,'2/27/2017','5','0','0',' ',0,'1','1',' ',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1',' ','Surgery',0,' ','0',3,3,3,2,2,2,'1'),(111,NULL,'307','Catherine','Downes','3955475','0000-00-00 00:00:00','73',' ','3/27/2018',0,1,1,2,3,' ',' ',1,4,1,'90','2',1,1,0,0,2,0,0,0,6,'COJ',4,0,25,1,' ',1,1,3,4,1,' ',' ',2,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',1,'1','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',2,2,2,2,2,2,'1'),(112,NULL,'106','Daisy','Eadie','2607773','0000-00-00 00:00:00','83',' ','4/13/2012',0,1,1,2,1,' ',' ',1,1,2,'170','2',1,1,0,0,0,0,0,0,3,'Posterior wall - mid body',2,0,25,1,' ',1,1,3,4,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',1,'1','2',0,' ',1,'9/18/2012','5','0','0',' ',1,' ','1',' ','3/14/2013','0','0',' ','11','3/14/2013','0','0',' ','1','3','18.4438356164384','no recurrence',0,' ','0',2,2,2,2,2,2,'2'),(113,NULL,'299','Brunhilde','Fuhrmann','1340317','0000-00-00 00:00:00','79',' ','12/14/2017',0,1,1,2,1,' ',' ',1,4,1,' ','2',1,1,1,1,2,0,0,0,5,'anterior wall',2,0,15,1,' ',1,1,3,4,1,' ',' ',1,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',1,'1','2',0,' ',1,'4/26/2018','6','0','0','0',0,'1','0',' ',' ',' ',' ',' ','4',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',2,2,2,2,1,1,' '),(114,NULL,'300','Eric','Glass','3903882','0000-00-00 00:00:00','77',' ','1/16/2018',0,1,1,1,1,'1','5',1,4,1,'60','2',1,1,1,1,2,0,1,0,5,'lesser curve overlying the incisura',4,0,20,1,' ',1,1,3,4,1,' ',' ',1,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',1,'1','2',0,'1',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',2,2,2,2,2,1,'1'),(115,NULL,'167','Donald','Gutteridge','3254373','0000-00-00 00:00:00','83',' ','6/9/2015',2,1,0,1,1,' ',' ',1,1,1,' ','3',1,1,0,0,0,0,0,0,5,'lesser curve',4,0,15,1,' ',1,1,3,4,1,' ',' ',1,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',1,'1','2',0,' ',1,'11/12/2015','5','0','0',' ',0,'7','1','1',' ',' ',' ',' ','5',' ',' ',' ',' ','1','1','5',' ',0,' ','0',2,2,2,2,1,1,' '),(116,NULL,'193','Pamela','McNeilly','3482125','0000-00-00 00:00:00','78',' ','6/21/2016',0,1,1,2,1,'0',' ',1,2,1,'60','3',1,1,0,1,2,0,0,0,5,'anterior wall',4,0,40,1,' ',1,1,3,4,1,' ',' ',2,0,0,0,0,1,0,' ',0,' ',' ',' ',' ',1,'1','2',0,' ',1,'3/14/2017','9','0','0','0',0,'1','1',' ',' ',' ',' ',' ','8',' ',' ',' ',' ','1','1',' ',' ',0,' ','0',6,3,3,2,2,1,'1'),(117,NULL,'262','George','Pennell','2215622','0000-00-00 00:00:00','83',' ','6/29/2017',0,1,1,1,1,'1','5',1,4,1,' ',' ',1,1,0,0,0,0,0,0,5,'lesser curve/incisura',2,0,25,1,' ',1,1,3,4,1,' ',' ',2,1,0,0,0,0,1,'0',2,' ',' ',' ',' ',1,'1','2',1,' ',1,'4/1/2018','11','0','0','0',0,'1','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','Surgery',0,' ','0',3,3,3,2,2,1,' '),(118,NULL,'308','Sang','Yi','914426','0000-00-00 00:00:00','71',' ','3/13/2018',0,1,1,1,1,'1','2',1,4,1,'45','2',1,1,1,1,2,0,0,0,5,' ',4,1,10,1,' ',1,1,3,4,1,' ',' ',2,1,0,0,0,0,0,'1',0,' ',' ',' ','awaiting surgery',1,'1','2',1,'2',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',3,3,3,2,1,1,'1'),(119,NULL,'143','Maria','Fernandes','663716','0000-00-00 00:00:00','69',' ','9/16/2014',0,1,1,2,1,' ',' ',1,1,1,' ',' ',1,0,0,0,0,0,0,0,2,'greater curve',2,0,30,1,' ',1,1,2,3,1,' ',' ',2,1,0,1,0,0,0,' ',0,'0','0','T1bN0M0','Check powerchart for surg t stage, get diff',0,' ','2',1,' ',0,'1/20/2015','4','0','0',' ',0,' ','0',' ',' ',' ',' ',' ','4',' ',' ',' ',' ','1','1','4','Surgery',0,' ','1',3,3,3,1,2,2,' '),(120,NULL,'102','Robert','Hair','2497478','0000-00-00 00:00:00','68',' ','9/30/2011',0,1,1,1,1,' ',' ',1,1,1,'505','2',1,1,1,1,1,0,1,0,2,'Lesser curve /proximal',4,0,30,1,' ',1,1,3,4,1,' ',' ',2,1,0,1,0,0,0,' ',0,'0','0','T1bN0M0',' ',1,'3','2',0,'3',0,' ',' ',' ',' ',' ',0,' ','0',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ','Surgery',0,' ','1',3,3,3,1,2,2,'2'),(121,NULL,'303','Denise','Hill','3916049','0000-00-00 00:00:00','69',' ','1/30/2018',0,1,1,2,1,'1','5',1,4,1,'120','2',1,1,1,1,2,0,0,0,6,'GOJ (oes 36cm-4cm into gastric cardia),',6,0,60,1,' ',1,1,3,4,1,' ',' ',2,1,0,1,0,0,0,'0',0,'0','0','0','no residual other than LGD',1,'3','2',0,'3',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',3,3,3,1,2,2,'2'),(122,NULL,'318',' ',' ','3923834','0000-00-00 00:00:00','0',' ','5/8/2018',0,0,0,0,1,' ',' ',1,4,1,'90',' ',1,0,0,0,0,0,0,0,5,'pyloric region, extending into proximal',0,0,50,1,'tva - focal hgd',0,1,2,2,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',1,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(123,NULL,'320',' ',' ','3983844','0000-00-00 00:00:00','0',' ','5/22/2018',0,0,0,0,1,' ',' ',1,4,1,' ',' ',1,0,0,0,0,0,0,0,2,'anterior wall overlying incisura',0,0,15,0,'Intramucosal carcinoma. pT1. No SM invasion.',1,1,2,3,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(124,NULL,'321',' ',' ','3983738','0000-00-00 00:00:00','0',' ','5/22/2018',0,0,0,0,1,' ',' ',1,4,1,' ',' ',1,0,0,0,0,0,0,0,2,'incisura (mid-body)',4,0,25,1,'pT1a. Involves peripheral margins. No deep/ LV/ PN/SM invasion.',0,1,2,3,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(125,NULL,'323',' ',' ','3983733','0000-00-00 00:00:00','0',' ','5/29/2018',0,0,0,0,1,' ',' ',1,4,1,' ',' ',1,0,0,0,0,0,0,0,4,' ',4,0,25,1,'polypoid LGD on a background of atrophy and extensive IM.',0,1,1,1,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(126,NULL,'325',' ',' ','1806424','0000-00-00 00:00:00','0',' ','7/24/2018',0,0,0,0,1,' ',' ',1,4,1,'72',' ',1,0,0,0,0,0,0,0,1,' ',0,0,15,1,'intramucosal adenocarcinoma. well def. Margins clear. No LVI/PN',1,1,2,3,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(127,NULL,'326',' ',' ','3178018','0000-00-00 00:00:00','0',' ','7/24/2018',0,0,0,0,1,' ',' ',1,4,1,'27',' ',1,0,0,0,0,0,0,0,4,' ',0,0,10,1,'mixed LGD with HGD and foci of adenocarcinoma. Clear all margins.',1,1,2,2,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(128,NULL,'327',' ',' ','2120558','0000-00-00 00:00:00','0',' ','8/7/2018',0,0,0,0,1,' ',' ',1,2,1,' ',' ',1,0,0,0,0,0,0,0,5,'large diffuse area of interupted mucosa',0,0,60,1,'background of atrophic gastritis with extensive IM',1,1,1,1,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(129,NULL,'328',' ',' ','1303086','0000-00-00 00:00:00','0',' ','7/31/2018',0,0,0,0,1,' ',' ',1,2,1,'99',' ',1,0,0,0,0,0,0,0,5,'anterior wall',3,0,30,1,'background IM. HP negative',1,1,1,1,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(130,NULL,'334',' ',' ','3720568','0000-00-00 00:00:00','0',' ','8/10/2018',0,0,0,0,1,' ',' ',1,2,1,'26',' ',1,0,0,0,0,0,0,0,5,'pre pyloric- posterior wall',4,0,15,1,'pT1b  Tumour invades submucosa. \r\nfocal poorly differentiated areas (20%)\r\n\r\nDepth of invasion into submucosa: 1340um deep into submucosa from the base of the muscularis\r\n\r\nDeep margin: 440um clearance \r\nPeripheral margin - not involved, at least 6mm wide clearance\r\nTumour budding: present',1,1,3,4,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(131,NULL,'337',' ',' ','1547142','0000-00-00 00:00:00','0',' ','8/21/2018',0,0,0,0,1,' ',' ',1,4,1,'69',' ',1,0,0,0,0,0,0,0,2,'adjacent previous ESD scar',2,0,6,1,'Separate biopsy from \'anterior inferior margin\' shows focal HGD',0,1,1,2,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' '),(132,NULL,'342',' ',' ','1476855','0000-00-00 00:00:00','0',' ','9/4/2018',0,0,0,0,1,' ',' ',1,4,1,'72',' ',1,0,0,0,0,0,0,0,4,' ',4,0,30,1,'GASTRIC ADENOMA WITH LOW GRADE DYSPLASIA INTESTINAL PHENOTYPE',1,1,1,1,0,' ',' ',0,0,0,0,0,0,0,' ',0,' ',' ',' ',' ',0,' ',' ',0,' ',0,' ',' ',' ',' ',' ',0,' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',0,' ',' ',0,0,0,0,0,0,' ');
/*!40000 ALTER TABLE `Lesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `POEM`
--

DROP TABLE IF EXISTS `POEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `POEM` (
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
-- Dumping data for table `POEM`
--

LOCK TABLES `POEM` WRITE;
/*!40000 ALTER TABLE `POEM` DISABLE KEYS */;
INSERT INTO `POEM` VALUES (33,23343,'25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-04-11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,78239,'77',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'2020-04-09',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL),(35,25,'234',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,'2020-04-14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `POEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Patient`
--

DROP TABLE IF EXISTS `Patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Patient` (
  `_k_patient` int(7) NOT NULL AUTO_INCREMENT,
  `_k_referrer` int(7) DEFAULT NULL,
  `Sex` varchar(2) DEFAULT NULL,
  `Age` varchar(4) DEFAULT NULL,
  `Institution` varchar(2) DEFAULT NULL,
  `ProspectiveEthics` varchar(2) DEFAULT NULL,
  `Family_Hx` varchar(2) DEFAULT NULL,
  `Number_affected_FH` varchar(2) DEFAULT NULL,
  `Relationship_1` varchar(2) DEFAULT NULL,
  `Age_1_FH` varchar(2) DEFAULT NULL,
  `Relationship_2` varchar(2) DEFAULT NULL,
  `Age_2_FH` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`_k_patient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Patient`
--

LOCK TABLES `Patient` WRITE;
/*!40000 ALTER TABLE `Patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `Patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PolypectomyAssessmentTool`
--

DROP TABLE IF EXISTS `PolypectomyAssessmentTool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PolypectomyAssessmentTool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `AGE` varchar(18) DEFAULT NULL,
  `Sex` varchar(18) DEFAULT NULL,
  `OnlyLesion` varchar(18) DEFAULT NULL,
  `SMSASize` varchar(18) DEFAULT NULL,
  `SMSAMorphology` varchar(18) DEFAULT NULL,
  `SMSASite` varchar(18) DEFAULT NULL,
  `SMSAAccess` varchar(18) DEFAULT NULL,
  `Paris` varchar(18) DEFAULT NULL,
  `Location` varchar(18) DEFAULT NULL,
  `Morphology` varchar(18) DEFAULT NULL,
  `ColonCleanliness` varchar(18) DEFAULT NULL,
  `Dateofprocedure` varchar(18) DEFAULT NULL,
  `AssessorName` varchar(80) DEFAULT NULL,
  `AssessorGrade` varchar(18) DEFAULT NULL,
  `AssesseeName` varchar(80) DEFAULT NULL,
  `AssesseeGrade` varchar(18) DEFAULT NULL,
  `ExperienceAssessor` varchar(18) DEFAULT NULL,
  `ExperienceAssessee` varchar(18) DEFAULT NULL,
  `PatientConsentObtained` varchar(18) DEFAULT NULL,
  `PatientComorbidity` varchar(18) DEFAULT NULL,
  `AnticoagulantTherapy` varchar(18) DEFAULT NULL,
  `Antibiotics` varchar(18) DEFAULT NULL,
  `ProphylacticAntibiotics` varchar(18) DEFAULT NULL,
  `PatientCorrectlyPositioned` varchar(18) DEFAULT NULL,
  `PlateOn` varchar(18) DEFAULT NULL,
  `MetalImplant` varchar(18) DEFAULT NULL,
  `AccurateSizeDetermination` varchar(18) DEFAULT NULL,
  `HighestKudoAssessor` varchar(18) DEFAULT NULL,
  `HighestKudoAssessee` varchar(18) DEFAULT NULL,
  `HighestNICEAssessor` varchar(18) DEFAULT NULL,
  `HighestNICEAssessee` varchar(18) DEFAULT NULL,
  `RiskSMICAssessor` varchar(18) DEFAULT NULL,
  `RiskSMICAssessee` varchar(18) DEFAULT NULL,
  `EnblocResection` varchar(18) DEFAULT NULL,
  `Enbloc` varchar(18) DEFAULT NULL,
  `AttemptBeyondCapabilities` varchar(18) DEFAULT NULL,
  `Piecemeal` varchar(18) DEFAULT NULL,
  `Access` varchar(18) DEFAULT NULL,
  `Pressure` varchar(18) DEFAULT NULL,
  `LesionPosition` varchar(18) DEFAULT NULL,
  `Retroflexion` varchar(18) DEFAULT NULL,
  `ScopeUsed` varchar(18) DEFAULT NULL,
  `Insufflation` varchar(18) DEFAULT NULL,
  `Cap` varchar(18) DEFAULT NULL,
  `Antispasmodics` varchar(18) DEFAULT NULL,
  `OptimisesAccess` varchar(18) DEFAULT NULL,
  `LiftAtOnce` varchar(18) DEFAULT NULL,
  `Sequential_Inj_Res` varchar(18) DEFAULT NULL,
  `ImproveAccess` varchar(18) DEFAULT NULL,
  `AirExpelled` varchar(18) DEFAULT NULL,
  `InjectionThroughMalignant` varchar(18) DEFAULT NULL,
  `NeedleTangential` varchar(18) DEFAULT NULL,
  `DynamicInjection` varchar(18) DEFAULT NULL,
  `IntramucosalBlebs` varchar(18) DEFAULT NULL,
  `IntramucosalBlebsTreatment` varchar(18) DEFAULT NULL,
  `Lifting` varchar(18) DEFAULT NULL,
  `StopInjection` varchar(18) DEFAULT NULL,
  `AppropriateLift` varchar(18) DEFAULT NULL,
  `NarrowSegment` varchar(18) DEFAULT NULL,
  `AppropriateSnare` varchar(18) DEFAULT NULL,
  `AppropriateSize` varchar(18) DEFAULT NULL,
  `StartsAtTheEdge` varchar(18) DEFAULT NULL,
  `LongAxis` varchar(18) DEFAULT NULL,
  `Aspiration` varchar(18) DEFAULT NULL,
  `TipVisualisation` varchar(18) DEFAULT NULL,
  `StopClosureSnare` varchar(18) DEFAULT NULL,
  `EndoscopistSnare` varchar(18) DEFAULT NULL,
  `SnareClosure` varchar(18) DEFAULT NULL,
  `TissueMobility` varchar(18) DEFAULT NULL,
  `TactileFeedback` varchar(18) DEFAULT NULL,
  `GoodResection_Piecemeal` varchar(18) DEFAULT NULL,
  `GoodResection_EnBloc` varchar(18) DEFAULT NULL,
  `SpeedOfClosure` varchar(18) DEFAULT NULL,
  `ColdSnare` varchar(18) DEFAULT NULL,
  `CorrectSettingsEnsured` varchar(18) DEFAULT NULL,
  `StablePosition` varchar(18) DEFAULT NULL,
  `CheckHaemostatics` varchar(18) DEFAULT NULL,
  `UsesDistension` varchar(18) DEFAULT NULL,
  `MobilityChecks` varchar(18) DEFAULT NULL,
  `DiathermyApplication` varchar(18) DEFAULT NULL,
  `StopsIfNoTransection` varchar(18) DEFAULT NULL,
  `StopDiathermy` varchar(18) DEFAULT NULL,
  `NLA` varchar(18) DEFAULT NULL,
  `NLATreatment` varchar(18) DEFAULT NULL,
  `SecondLine` varchar(18) DEFAULT NULL,
  `IPB` varchar(18) DEFAULT NULL,
  `CauseOfBleedingIdentified` varchar(18) DEFAULT NULL,
  `PatientPosition` varchar(18) DEFAULT NULL,
  `MildBleeding` varchar(18) DEFAULT NULL,
  `STSCNeeded` varchar(18) DEFAULT NULL,
  `STSC` varchar(18) DEFAULT NULL,
  `Coag` varchar(18) DEFAULT NULL,
  `CoagForceps` varchar(18) DEFAULT NULL,
  `SevereBleeding` varchar(18) DEFAULT NULL,
  `NotControlledBleeding` varchar(18) DEFAULT NULL,
  `NotControlledBleeding_1` varchar(18) DEFAULT NULL,
  `CompleteBleedingControl` varchar(18) DEFAULT NULL,
  `Perforation` varchar(18) DEFAULT NULL,
  `SydneyDMIScore` varchar(18) DEFAULT NULL,
  `ClosureRequired` varchar(18) DEFAULT NULL,
  `PriorClosure` varchar(18) DEFAULT NULL,
  `ClipUses` varchar(18) DEFAULT NULL,
  `TTSTechnique` varchar(18) DEFAULT NULL,
  `TTSNotUsed` varchar(18) DEFAULT NULL,
  `OTSCTechnique` varchar(18) DEFAULT NULL,
  `CompleteClosure` varchar(18) DEFAULT NULL,
  `AntibioticsPostPerf` varchar(18) DEFAULT NULL,
  `Ctscan` varchar(18) DEFAULT NULL,
  `SurgicalReview` varchar(18) DEFAULT NULL,
  `DifficultAccess` varchar(18) DEFAULT NULL,
  `Position` varchar(18) DEFAULT NULL,
  `ScopeChanged` varchar(18) DEFAULT NULL,
  `CapUsed` varchar(18) DEFAULT NULL,
  `AntispasmodicsUsed` varchar(18) DEFAULT NULL,
  `Retroflexionv2` varchar(18) DEFAULT NULL,
  `ExternalPressure` varchar(18) DEFAULT NULL,
  `HoldTheScope` varchar(18) DEFAULT NULL,
  `ICV` varchar(18) DEFAULT NULL,
  `AppendicealOrfice` varchar(18) DEFAULT NULL,
  `AnorectalJunction` varchar(18) DEFAULT NULL,
  `DefectInspection` varchar(18) DEFAULT NULL,
  `Chromoendoscopy` varchar(18) DEFAULT NULL,
  `Margin` varchar(18) DEFAULT NULL,
  `PolypTissueRemoved` varchar(18) DEFAULT NULL,
  `SubmucosaInspected` varchar(18) DEFAULT NULL,
  `Fibrosis` varchar(18) DEFAULT NULL,
  `MPInspection` varchar(18) DEFAULT NULL,
  `MPDescription` varchar(18) DEFAULT NULL,
  `NonStainedSM` varchar(18) DEFAULT NULL,
  `Uncertainty` varchar(18) DEFAULT NULL,
  `Photodocumentation` varchar(18) DEFAULT NULL,
  `MarginTreatment` varchar(18) DEFAULT NULL,
  `STSCTechnique` varchar(18) DEFAULT NULL,
  `APCTechnique` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PolypectomyAssessmentTool`
--

LOCK TABLES `PolypectomyAssessmentTool` WRITE;
/*!40000 ALTER TABLE `PolypectomyAssessmentTool` DISABLE KEYS */;
INSERT INTO `PolypectomyAssessmentTool` VALUES (1,'hellohsjaksdasldkj','2','0','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','0','1','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','hellohsjaksdasldkj','2'),(2,'34','2','0','2','2','2','1','1','3','2','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','4','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','2','1','1','1','1',NULL,NULL,NULL,'0','1','1','1','2','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'2323','1','0',NULL,'2','2','0',NULL,NULL,NULL,NULL,NULL,NULL,'1','23','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-11-07','Roland Valori','1','David Tate','2','5','2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `PolypectomyAssessmentTool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Procedure`
--

DROP TABLE IF EXISTS `Procedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Procedure` (
  `_k_procedure` int(7) NOT NULL AUTO_INCREMENT,
  `_k_patient` int(7) NOT NULL,
  `Institution` varchar(10) DEFAULT NULL,
  `ProcedureDate` date DEFAULT NULL,
  `Age` varchar(3) DEFAULT NULL,
  `Consultant` varchar(100) DEFAULT NULL,
  `Endoscopist` varchar(20) DEFAULT NULL,
  `Complete_Colon` varchar(3) DEFAULT NULL,
  `TertiaryReferral` varchar(3) DEFAULT NULL,
  `RefDocType` varchar(3) DEFAULT NULL,
  `ASA` varchar(3) DEFAULT NULL,
  `MajorComorb_Simple` varchar(3) DEFAULT NULL,
  `MajorComorbNone` varchar(3) DEFAULT NULL,
  `MajorComorbIHD` varchar(3) DEFAULT NULL,
  `MajorComorbCCF` varchar(3) DEFAULT NULL,
  `MajorComorbHT` varchar(3) DEFAULT NULL,
  `MajorComorbCVA` varchar(3) DEFAULT NULL,
  `MajorComorbChronicResp` varchar(3) DEFAULT NULL,
  `MajorComorbChronicRenal` varchar(3) DEFAULT NULL,
  `MajorComorbMajorRheum` varchar(3) DEFAULT NULL,
  `MajorComorbLiverDisease` varchar(3) DEFAULT NULL,
  `MajorComorbCirrhosis` varchar(3) DEFAULT NULL,
  `MajorComorbActiveCa` varchar(3) DEFAULT NULL,
  `MajorComorbDM1` varchar(3) DEFAULT NULL,
  `MajorComorbDM2` varchar(3) DEFAULT NULL,
  `MajorComorbHaem` varchar(3) DEFAULT NULL,
  `MajorComorbObese` varchar(3) DEFAULT NULL,
  `MajorComorbOther` varchar(500) DEFAULT NULL,
  `MajorComorb_OtherNotes` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Reg_Antithromb` varchar(3) DEFAULT NULL,
  `Reg_Antithromb_1` varchar(3) DEFAULT NULL,
  `Reg_Antithromb_1Other` varchar(200) DEFAULT NULL,
  `Discontinuation1` varchar(3) DEFAULT NULL,
  `Reg_Antithromb_2` varchar(3) DEFAULT NULL,
  `Reg_Antithromb_2Other` varchar(200) DEFAULT NULL,
  `Discontinuation2` varchar(3) DEFAULT NULL,
  `Reg_Antithromb_7daySum` varchar(3) DEFAULT NULL,
  `MainIndic` varchar(10) DEFAULT NULL,
  `MainIndic_Other` varchar(100) DEFAULT NULL,
  `Height` varchar(3) DEFAULT NULL,
  `Weight` varchar(3) DEFAULT NULL,
  `AbdoCirc` varchar(3) DEFAULT NULL,
  `Smoking100CigsEver` varchar(3) DEFAULT NULL,
  `SmokingCigsPerDay` varchar(3) DEFAULT NULL,
  `AlcoholCurrent` varchar(3) DEFAULT NULL,
  `AlcoholEver` varchar(3) DEFAULT NULL,
  `Bowel_preparation` varchar(3) DEFAULT NULL,
  `Pain` varchar(3) DEFAULT NULL,
  `MultipleESDs` varchar(3) DEFAULT NULL,
  `DirectAdmit` varchar(3) DEFAULT NULL,
  `DirectAdmitReason` varchar(3) DEFAULT NULL,
  `DirectAdmit_Other` varchar(25) DEFAULT NULL,
  `DirectAdmit_NoNights` varchar(3) DEFAULT NULL,
  `DirectAdmit_NonSocialYN` varchar(3) DEFAULT NULL,
  `DelayedAdmit` varchar(3) DEFAULT NULL,
  `DelayedAdmit_Reason` varchar(3) DEFAULT NULL,
  `DelayedAdmit_ReasonOther` varchar(25) DEFAULT NULL,
  `DelayedAdmit_NoNights` varchar(3) DEFAULT NULL,
  `AnyAdmit` varchar(3) DEFAULT NULL,
  `TotalInpatientNights` varchar(3) DEFAULT NULL,
  `AnyAdmitNotes` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`_k_procedure`),
  KEY `_k_patient` (`_k_patient`),
  CONSTRAINT `patient` FOREIGN KEY (`_k_patient`) REFERENCES `Patient` (`_k_patient`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Procedure`
--

LOCK TABLES `Procedure` WRITE;
/*!40000 ALTER TABLE `Procedure` DISABLE KEYS */;
/*!40000 ALTER TABLE `Procedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `esdLesion`
--

DROP TABLE IF EXISTS `esdLesion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `esdLesion` (
  `_k_lesion` int(11) NOT NULL AUTO_INCREMENT,
  `_k_procedure` varchar(10) DEFAULT NULL,
  `AGE` varchar(4) DEFAULT NULL,
  `Ethnicity` varchar(10) DEFAULT NULL,
  `Dateofprocedure` date DEFAULT NULL,
  `Duplicate` int(1) DEFAULT NULL,
  `Gender` int(1) DEFAULT NULL,
  `IndicationforESD` int(1) DEFAULT NULL,
  `Preresectionbiopsydone` int(1) DEFAULT NULL,
  `PreresectionHistology` int(1) DEFAULT NULL,
  `Scopetype` int(1) DEFAULT NULL,
  `Knifetype` int(1) DEFAULT NULL,
  `Injectate` int(1) DEFAULT NULL,
  `Length_min` int(3) DEFAULT NULL,
  `ASAscore` int(1) DEFAULT NULL,
  `GAvssedation` int(1) DEFAULT NULL,
  `Admitted` int(1) DEFAULT NULL,
  `Complications` int(1) DEFAULT NULL,
  `comp_IPB` int(1) DEFAULT NULL,
  `Prophylaxis_bleed` int(1) DEFAULT NULL,
  `comp_perf` int(1) DEFAULT NULL,
  `comp_DB` int(1) DEFAULT NULL,
  `Mortality` int(1) DEFAULT NULL,
  `lesionlocation` int(1) DEFAULT NULL,
  `lesionlocationdetail` varchar(200) DEFAULT NULL,
  `lesion_Paris` int(1) DEFAULT NULL,
  `ulceration` int(1) DEFAULT NULL,
  `lesionsize_mm` int(2) DEFAULT NULL,
  `En_bloc` int(1) DEFAULT NULL,
  `Historemarks` varchar(10) DEFAULT NULL,
  `Numberofresectionspecimens` int(1) DEFAULT NULL,
  `Completeendoscopicresectionachieved` int(1) DEFAULT NULL,
  `Histology` varchar(100) DEFAULT NULL,
  `HistologyHGD` varchar(100) DEFAULT NULL,
  `Completepathologicalresection_R0` varchar(100) DEFAULT NULL,
  `MarginVerticalPos` varchar(10) DEFAULT NULL,
  `MarginHorizPos` varchar(10) DEFAULT NULL,
  `ClinicalCriteria` varchar(10) DEFAULT NULL,
  `SurgicalRefBasedonHisto` varchar(10) DEFAULT NULL,
  `SurgDueToFail` varchar(10) DEFAULT NULL,
  `UnderwentSurgeryatIndex` varchar(10) DEFAULT NULL,
  `SurgeryDuringSurveillance` varchar(10) DEFAULT NULL,
  `NoSurgerySoSurveillance` varchar(10) DEFAULT NULL,
  `DeclinedSurgery` varchar(10) DEFAULT NULL,
  `AwaitingSurgOutcome` varchar(10) DEFAULT NULL,
  `WhyDeclinedSurgery` varchar(10) DEFAULT NULL,
  `SurgResidual` varchar(10) DEFAULT NULL,
  `SurgLN` varchar(10) DEFAULT NULL,
  `SurgTStage` varchar(10) DEFAULT NULL,
  `SurgM` varchar(10) DEFAULT NULL,
  `SurgNotes` varchar(10) DEFAULT NULL,
  `SMI` varchar(10) DEFAULT NULL,
  `SMDepth` varchar(10) DEFAULT NULL,
  `Differentiation` varchar(10) DEFAULT NULL,
  `LVI` varchar(10) DEFAULT NULL,
  `WhyNoSC1` varchar(10) DEFAULT NULL,
  `CompletedSE1` varchar(10) DEFAULT NULL,
  `SE_1date` varchar(10) DEFAULT NULL,
  `SE_time_new` varchar(10) DEFAULT NULL,
  `SE_1endo_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_1HISTO_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_1Treatment` varchar(10) DEFAULT NULL,
  `CompletedSE2` varchar(10) DEFAULT NULL,
  `WhyNoSC2` varchar(200) DEFAULT NULL,
  `DueSC2` varchar(10) DEFAULT NULL,
  `ExplainSC2` varchar(10) DEFAULT NULL,
  `SE_2date` varchar(10) DEFAULT NULL,
  `SE_2endo_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_2HISTO_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_2Treatment` varchar(10) DEFAULT NULL,
  `MonthsToSEMostRecent` varchar(10) DEFAULT NULL,
  `SE_MostRecentdate` varchar(10) DEFAULT NULL,
  `SE_MostRecentendo_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_MostRecentHISTO_Rec_Res` varchar(10) DEFAULT NULL,
  `SE_MostRecentTreatment` varchar(10) DEFAULT NULL,
  `clearofdiseaseonlatestSE` varchar(10) DEFAULT NULL,
  `Numberoffollow_upscopes` varchar(10) DEFAULT NULL,
  `Monthsindextolastscope` varchar(10) DEFAULT NULL,
  `Ultimateoutcome` varchar(10) DEFAULT NULL,
  `FullThicknessPerf` varchar(10) DEFAULT NULL,
  `Historemarks2` varchar(10) DEFAULT NULL,
  `HistologyCriteriaLGDNew` varchar(10) DEFAULT NULL,
  `AdjuvantTreatment` varchar(10) DEFAULT NULL,
  `created` timestamp NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`_k_lesion`),
  UNIQUE KEY `_k_lesion` (`_k_lesion`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `esdLesion`
--

LOCK TABLES `esdLesion` WRITE;
/*!40000 ALTER TABLE `esdLesion` DISABLE KEYS */;
INSERT INTO `esdLesion` VALUES (1,NULL,'65','1','2019-10-09',0,1,3,1,1,1,4,1,240,3,1,1,1,2,1,0,0,0,9,NULL,2,0,30,1,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-24 19:33:46','2019-10-27 06:10:25'),(3,NULL,'45','1','2019-10-09',1,2,2,1,2,1,2,1,25,3,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,'proximal stomach, greater curvature',3,0,NULL,NULL,NULL,NULL,NULL,'2','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ff',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1',NULL,'3','0','2','1',NULL,'never had this\nbetter never see them again this time not then\ndt 1\ndoesnt works',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-24 19:33:46','2019-11-03 08:35:19'),(16,NULL,'65','2','2019-10-09',0,1,2,1,1,1,4,1,240,3,1,1,1,2,1,0,0,0,9,NULL,2,0,30,1,NULL,1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','not possible, patient too old',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-24 19:33:46','2019-10-30 07:41:33'),(22,NULL,'6','2',NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-27 20:30:28',NULL),(23,NULL,'33','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-27 20:35:26',NULL),(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-29 21:53:55',NULL),(28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-29 21:55:46',NULL),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-10-29 21:56:18',NULL),(30,NULL,'33','3','2019-10-15',0,2,3,1,3,1,4,1,90,2,1,1,0,2,1,0,0,0,9,'37cm 2-5u',3,0,30,1,'IMC',1,1,'2','0','1','0','0','0','0','0',NULL,'1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2','0',NULL,NULL,'2020-01-01',NULL,'0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0',NULL,'IMC','0','2019-10-30 11:19:58','2020-04-10 13:18:04'),(31,NULL,'1121',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-11-02 13:31:55',NULL),(32,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-11-02 13:35:09',NULL),(33,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-31 09:00:50',NULL),(34,NULL,'102','1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-01-06 21:12:21','2020-01-06 21:12:37'),(35,NULL,'22','2','2020-01-18',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-01-06 21:12:52','2020-01-06 21:31:21'),(38,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-04-10 14:28:53',NULL),(39,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-04-10 14:29:40',NULL);
/*!40000 ALTER TABLE `esdLesion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pageLayoutESD`
--

DROP TABLE IF EXISTS `pageLayoutESD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pageLayoutESD` (
  `﻿Number` int(2) NOT NULL AUTO_INCREMENT,
  `Name` varchar(35) DEFAULT NULL,
  `Position` int(2) DEFAULT NULL,
  `Order` int(2) DEFAULT NULL,
  `Type` int(1) DEFAULT NULL,
  `textType` int(1) DEFAULT NULL,
  `Value1` varchar(21) DEFAULT NULL,
  `Value2` varchar(23) DEFAULT NULL,
  `Text` varchar(100) DEFAULT NULL,
  `Link` varchar(10) DEFAULT NULL,
  `Message_t` varchar(220) DEFAULT NULL,
  `RequiredIndex` varchar(10) DEFAULT NULL,
  `Required4weeks` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`﻿Number`),
  UNIQUE KEY `﻿Number` (`﻿Number`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pageLayoutESD`
--

LOCK TABLES `pageLayoutESD` WRITE;
/*!40000 ALTER TABLE `pageLayoutESD` DISABLE KEYS */;
INSERT INTO `pageLayoutESD` VALUES (2,'AGE',1,1,2,1,NULL,NULL,'Age',NULL,NULL,NULL,NULL),(3,'Ethnicity',1,2,1,NULL,'Ethnicity','Ethnicity_t','Ethnicity',NULL,NULL,NULL,NULL),(4,'Dateofprocedure',1,3,2,3,NULL,NULL,'Date of procedure',NULL,NULL,NULL,NULL),(5,'Duplicate',1,5,1,NULL,'Yes_No','Yes_No_t','Duplicate lesion in this patient?',NULL,NULL,NULL,NULL),(6,'Gender',1,4,1,NULL,'Sex','Sex_t','Sex',NULL,NULL,NULL,NULL),(7,'IndicationforESD',2,6,1,NULL,'Indication','Indication_t','Indication for ESD procedure',NULL,NULL,NULL,NULL),(8,'Preresectionbiopsydone',2,7,1,NULL,'Yes_No','Yes_No_t','Previously biopsied?',NULL,NULL,NULL,NULL),(9,'PreresectionHistology',2,8,1,NULL,'pre_resect_histo','pre_resect_histo','Histology of previous biopsy',NULL,NULL,NULL,NULL),(10,'Scopetype',3,9,1,NULL,'ScopeType','ScopeType_t','Scope type',NULL,NULL,NULL,NULL),(11,'Knifetype',3,10,1,NULL,'Knife','Knife_t','Knife type',NULL,NULL,NULL,NULL),(12,'Injectate',3,11,1,NULL,'Injectate','Injectate_t','Injectate',NULL,NULL,NULL,NULL),(13,'Length_min',3,12,2,1,NULL,NULL,'Duration (min)',NULL,NULL,NULL,NULL),(14,'ASAscore',3,13,2,1,NULL,NULL,'ASA score',NULL,NULL,NULL,NULL),(15,'GAvssedation',3,14,1,NULL,'GA','GA_t','GA versus Sedation',NULL,NULL,NULL,NULL),(16,'Admitted',5,23,1,NULL,'Yes_No','Yes_No_t','Admitted directly?',NULL,NULL,NULL,NULL),(17,'Complications',5,24,1,NULL,'Yes_No','Yes_No_t','Adverse events?',NULL,NULL,NULL,NULL),(18,'comp_IPB',5,25,1,NULL,'IPB_tx','IPB_tx_t','Intra-procedural bleeding?',NULL,NULL,NULL,NULL),(19,'Prophylaxis_bleed',5,26,1,NULL,'Prophylaxis_bleed','Prophylaxis_bleed_t','Prophylaxis performed?',NULL,NULL,NULL,NULL),(20,'comp_perf',5,27,1,NULL,'comp_perf','comp_perf_t','Perforation',NULL,NULL,NULL,NULL),(21,'comp_DB',5,28,1,NULL,'Yes_No','Yes_No_t','Delayed bleeding?',NULL,NULL,NULL,NULL),(22,'Mortality',5,30,1,NULL,'Yes_No','Yes_No_t','Mortality?',NULL,NULL,NULL,NULL),(23,'lesionlocation',4,15,1,NULL,'location','location_t','Location',NULL,NULL,NULL,NULL),(24,'lesionlocationdetail',4,16,2,2,NULL,NULL,'Detailed location',NULL,NULL,NULL,NULL),(25,'lesion_Paris',4,17,1,NULL,'Paris','Paris_t','Paris',NULL,NULL,NULL,NULL),(26,'ulceration',4,18,1,NULL,'Yes_No','Yes_No_t','Ulcerated?',NULL,NULL,NULL,NULL),(27,'lesionsize_mm',4,19,2,1,NULL,NULL,'Size (mm)',NULL,NULL,NULL,NULL),(28,'En_bloc',4,20,1,NULL,'Yes_No','Yes_No_t','En bloc',NULL,NULL,NULL,NULL),(29,'Historemarks',6,34,4,NULL,NULL,NULL,'Histology remarks',NULL,NULL,NULL,NULL),(30,'Numberofresectionspecimens',4,21,2,1,NULL,NULL,'Number of specimens',NULL,NULL,NULL,NULL),(31,'Completeendoscopicresectionachieved',4,22,1,NULL,'Yes_No','Yes_No_t','Complete endoscopic clearance',NULL,NULL,NULL,NULL),(32,'Histology',6,32,1,NULL,'Histology','Histology_t','Histology',NULL,NULL,NULL,NULL),(33,'HistologyHGD',6,33,1,NULL,'Yes_No','Yes_No_t','Histology with HGD',NULL,NULL,NULL,NULL),(34,'Completepathologicalresection_R0',6,35,1,NULL,'R0','R0_t','R0',NULL,NULL,NULL,NULL),(35,'MarginVerticalPos',6,36,1,NULL,'Yes_No','Yes_No_t','Vertical margin pos?',NULL,NULL,NULL,NULL),(36,'MarginHorizPos',6,37,1,NULL,'Yes_No','Yes_No_t','Horizontal margin pos?',NULL,NULL,NULL,NULL),(37,'ClinicalCriteria',5,31,1,NULL,'ClinicalCriteria','ClinicalCriteria_t','Clinical criteria (pre resection)',NULL,NULL,NULL,NULL),(38,'SurgicalRefBasedonHisto',6,38,1,NULL,'Yes_No','Yes_No_t','Surgery due to unfavourable histology',NULL,NULL,NULL,NULL),(39,'SurgDueToFail',6,39,1,NULL,'Yes_No','Yes_No_t','Surgery due to failed procedure',NULL,NULL,NULL,NULL),(40,'UnderwentSurgeryatIndex',7,46,1,NULL,'Yes_No','Yes_No_t','Underwent surgery at index',NULL,NULL,NULL,NULL),(41,'SurgeryDuringSurveillance',7,47,1,NULL,'Yes_No','Yes_No_t','Underwent surgery during surveillance',NULL,NULL,NULL,NULL),(42,'NoSurgerySoSurveillance',7,48,1,NULL,'Yes_No','Yes_No_t','Did not have surgery so has surveillance planned',NULL,NULL,NULL,NULL),(43,'DeclinedSurgery',7,49,1,NULL,'Yes_No','Yes_No_t','Declined surgery',NULL,NULL,NULL,NULL),(44,'AwaitingSurgOutcome',7,50,1,NULL,'Yes_No','Yes_No_t','Awaiting surgical ourtcome',NULL,NULL,NULL,NULL),(45,'WhyDeclinedSurgery',7,51,4,NULL,NULL,NULL,'Why declined surgery?',NULL,NULL,NULL,NULL),(46,'SurgResidual',7,52,1,NULL,'Yes_No','Yes_No_t','Residual at surgery?',NULL,NULL,NULL,NULL),(47,'SurgLN',7,53,1,NULL,'SurgLN','SurgLN_t','L status',NULL,NULL,NULL,NULL),(48,'SurgTStage',7,54,1,NULL,'SurgTStage','SurgTStage_t','T stage',NULL,NULL,NULL,NULL),(49,'SurgM',7,54,1,NULL,'SurgM','SurgM_t','M status',NULL,NULL,NULL,NULL),(50,'SurgNotes',7,55,4,NULL,NULL,NULL,'Surgical notes',NULL,NULL,NULL,NULL),(51,'SMI',6,40,1,NULL,'Yes_No','Yes_No_t','Submucosal invasion?',NULL,NULL,NULL,NULL),(52,'SMDepth',6,41,1,NULL,'SMIDepth','SMIDepth_t','Submucosal invasion depth',NULL,NULL,NULL,NULL),(53,'Differentiation',6,42,1,NULL,'Differentiation','Differentiation_t','Differentiation',NULL,NULL,NULL,NULL),(54,'LVI',6,43,1,NULL,'Yes_No','Yes_No_t','Lymphovascular invasion',NULL,NULL,NULL,NULL),(55,'WhyNoSC1',8,56,4,NULL,NULL,NULL,'Why no SC1',NULL,NULL,NULL,NULL),(56,'CompletedSE1',8,57,1,NULL,'Yes_No','Yes_No_t','Completed SC1',NULL,NULL,NULL,NULL),(57,'SE_1date',8,58,2,3,NULL,NULL,'Date SC1',NULL,NULL,NULL,NULL),(58,'SE_time_new',8,59,2,1,NULL,NULL,'SE timing',NULL,NULL,NULL,NULL),(59,'SE_1endo_Rec_Res',8,60,1,NULL,'Yes_No','Yes_No_t','Endoscopic evidence of recurrence',NULL,NULL,NULL,NULL),(60,'SE_1HISTO_Rec_Res',8,61,1,NULL,'SE_HISTO_Rec_Res','SE_HISTO_Rec_Res_t','Histologic evidence of recurrence',NULL,NULL,NULL,NULL),(61,'SE_1Treatment',8,62,1,NULL,'SE_Rx','SE_Rx_t','Treatment of recurrence at SC1',NULL,NULL,NULL,NULL),(62,'CompletedSE2',9,63,1,NULL,'Yes_No','Yes_No_t','Completed SC2',NULL,NULL,NULL,NULL),(63,'WhyNoSC2',9,64,4,NULL,NULL,NULL,'Why no SC2',NULL,NULL,NULL,NULL),(64,'DueSC2',9,65,1,NULL,'Yes_No','Yes_No_t','Due SC2',NULL,NULL,NULL,NULL),(66,'SE_2date',9,67,2,3,NULL,NULL,'Date SC2',NULL,NULL,NULL,NULL),(67,'SE_2endo_Rec_Res',9,68,1,NULL,'Yes_No','Yes_No_t','Recurrence at SC2',NULL,NULL,NULL,NULL),(68,'SE_2HISTO_Rec_Res',9,69,1,NULL,'SE_HISTO_Rec_Res','SE_HISTO_Rec_Res_t','Histologic evidence of recurrence at SC2',NULL,NULL,NULL,NULL),(69,'SE_2Treatment',9,70,1,NULL,'SE_Rx','SE_Rx_t','Treatment at SC2',NULL,NULL,NULL,NULL),(70,'MonthsToSEMostRecent',10,71,2,1,NULL,NULL,'Months to most recent SC',NULL,NULL,NULL,NULL),(71,'SE_MostRecentdate',10,72,2,3,NULL,NULL,'Date most recent SE',NULL,NULL,NULL,NULL),(72,'SE_MostRecentendo_Rec_Res',10,73,1,NULL,'Yes_No','Yes_No_t','Recurrence at most recent SE',NULL,NULL,NULL,NULL),(73,'SE_MostRecentHISTO_Rec_Res',10,74,1,NULL,'SE_HISTO_Rec_Res','SE_HISTO_Rec_Res_t','Histologic evidence of recurrence at most recent SE',NULL,NULL,NULL,NULL),(74,'SE_MostRecentTreatment',10,75,1,NULL,'SE_Rx','SE_Rx_t','Treatment at most recent SE',NULL,NULL,NULL,NULL),(75,'clearofdiseaseonlatestSE',10,76,1,NULL,'Yes_No','Yes_No_t','Is clear of disease on the latest SE',NULL,NULL,NULL,NULL),(76,'Numberoffollow_upscopes',10,77,2,1,NULL,NULL,'Number of follow-up endoscopies',NULL,NULL,NULL,NULL),(77,'Monthsindextolastscope',10,78,2,1,NULL,NULL,'Months from index to last endoscopy',NULL,NULL,NULL,NULL),(78,'Ultimateoutcome',10,79,1,NULL,'Ultimateoutcome','Ultimateoutcome_t','Ultimate outcome',NULL,NULL,NULL,NULL),(79,'FullThicknessPerf',5,29,1,NULL,'Yes_No','Yes_No_t','Full Thickness Resection Performed',NULL,NULL,NULL,NULL),(80,'Historemarks2',6,44,4,NULL,NULL,NULL,'Histology remarks',NULL,NULL,NULL,NULL),(81,'HistologyCriteriaLGDNew',6,45,2,2,NULL,NULL,'New Histology Criteria for LGD',NULL,NULL,NULL,NULL),(82,'AdjuvantTreatment',6,45,1,NULL,'AdjuvantTreatment','AdjuvantTreatment_t','Adjuvant treatment ',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pageLayoutESD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pageLayoutPOEM`
--

DROP TABLE IF EXISTS `pageLayoutPOEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pageLayoutPOEM` (
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
-- Dumping data for table `pageLayoutPOEM`
--

LOCK TABLES `pageLayoutPOEM` WRITE;
/*!40000 ALTER TABLE `pageLayoutPOEM` DISABLE KEYS */;
INSERT INTO `pageLayoutPOEM` VALUES (1,1,'MRN',1,1,2,1,NULL,NULL,'MRN',NULL,NULL,NULL,NULL),(2,2,'DOB',1,2,2,1,NULL,NULL,'Age',NULL,NULL,NULL,NULL),(3,3,'comorbidity',1,4,1,1,'comorbidity_major','comorbidity_major_t','major comorbidity?',NULL,NULL,NULL,NULL),(4,4,'comorbidity_other',1,5,2,1,NULL,NULL,'specify',NULL,NULL,NULL,NULL),(5,5,'weight',1,6,2,1,NULL,NULL,'weight (kg)',NULL,NULL,NULL,NULL),(6,6,'medication_aspirin',1,7,3,1,'Yes_no','Yes_no_t','aspirin',NULL,NULL,NULL,NULL),(7,7,'medication_clopidogrel',1,8,3,1,'Yes_no','Yes_no_t','clopidogrel',NULL,NULL,NULL,NULL),(8,8,'medication_warfarin',1,9,3,1,'Yes_no','Yes_no_t','warfarin / NOAC',NULL,NULL,NULL,NULL),(9,9,'medication_other',1,10,2,1,NULL,NULL,'other medication',NULL,NULL,NULL,NULL),(10,10,'previous_treatment_PPI',2,1,3,1,'Yes_no','Yes_no_t','PPI',NULL,NULL,NULL,NULL),(11,11,'previous_treatment_CACB',2,2,3,1,'Yes_no','Yes_no_t','CACB',NULL,NULL,NULL,NULL),(12,12,'previous_treatment_NITR',2,3,3,1,'Yes_no','Yes_no_t','Nitrates',NULL,NULL,NULL,NULL),(13,13,'previous_treatment_SSRI',2,4,3,1,'Yes_no','Yes_no_t','SSRI',NULL,NULL,NULL,NULL),(14,14,'previous_treatment_Dilatation',2,5,3,1,'Yes_no','Yes_no_t','Dilatation',NULL,NULL,NULL,NULL),(15,15,'previous_treatment_botulinum',2,6,3,1,'Yes_no','Yes_no_t','Botulinum',NULL,NULL,NULL,NULL),(21,21,'symptoms_other',3,11,4,1,NULL,NULL,'Other symptoms',NULL,NULL,NULL,NULL),(22,22,'Eckart_prior',3,12,2,1,NULL,NULL,'Total Eckart (pre-POEM)',NULL,NULL,NULL,NULL),(23,23,'prev_hrm',4,2,3,1,'Yes_no','Yes_no_t','Previous High Resolution Manometry',NULL,NULL,NULL,NULL),(24,24,'prev_hrm_rp',4,2,2,1,NULL,NULL,'IRP at HRM (mmHg)',NULL,NULL,NULL,NULL),(25,25,'prev_hrm_relaxLES',4,3,2,1,NULL,NULL,'LES relaxation pressure',NULL,NULL,NULL,NULL),(26,26,'prev_hrm_UES',4,4,2,1,NULL,NULL,'UES relaxation pressure',NULL,NULL,NULL,NULL),(27,27,'prev_hrm_diagnosis',4,5,1,1,'diagnosis',NULL,'Previous HRM diagnosis',NULL,NULL,NULL,NULL),(28,28,'barium_swallow_date',4,6,2,3,NULL,NULL,'Date of Barium Swallow',NULL,NULL,NULL,NULL),(29,29,'barium_swallow_result',4,7,4,1,NULL,NULL,'Barium swallow result',NULL,NULL,NULL,NULL),(30,30,'gastroscopy_prev',5,9,3,1,'Yes_no',NULL,'Gastroscopy observations performed',NULL,NULL,NULL,NULL),(31,31,'POEM_duration_total',6,12,2,1,NULL,NULL,'Total duration (min)',NULL,NULL,NULL,NULL),(32,32,'POEM_duration_tunnel',6,13,2,1,NULL,NULL,'Tunnel duration (min)',NULL,NULL,NULL,NULL),(33,33,'POEM_GOJ_distance',6,2,2,1,NULL,NULL,'Distance to GOJ (cm)',NULL,NULL,NULL,NULL),(34,34,'POEM_incision_distance',6,3,2,1,NULL,NULL,'Incision distance from incisors (cm)',NULL,NULL,NULL,NULL),(35,35,'POEM_incision_position',6,4,2,1,NULL,NULL,'Incision position (clock face)',NULL,NULL,NULL,NULL),(36,36,'myotomy_top',6,6,2,1,NULL,NULL,'Top of myotomy (cm)',NULL,NULL,NULL,NULL),(38,38,'POEM_IPB',7,1,3,1,'Yes_no',NULL,'Intra-procedural bleeding (requiring control)',NULL,NULL,NULL,NULL),(39,39,'POEM_current',6,9,1,1,'POEM_current',NULL,'Electrosurgical current',NULL,NULL,NULL,NULL),(40,40,'POEM_number_clips',6,11,2,1,NULL,NULL,'Number of clips to close tunnel',NULL,NULL,NULL,NULL),(41,41,'POEM_glucagon',6,14,3,1,'Yes_no',NULL,'Glucagon given',NULL,NULL,NULL,NULL),(42,42,'POEM_buscopan',6,15,3,1,'Yes_no',NULL,'Buscopan given',NULL,NULL,NULL,NULL),(43,43,'POEM_antibiotics',6,16,3,1,'Yes_no',NULL,'Antibiotics given',NULL,NULL,NULL,NULL),(44,44,'POEM_complication',7,3,3,1,'Yes_no',NULL,'Adverse Event?',NULL,NULL,NULL,NULL),(46,46,'POEM_admission_days',8,1,2,1,NULL,NULL,'Length of admission post POEM (days)',NULL,NULL,NULL,NULL),(47,47,'post_symptoms',9,1,3,1,NULL,NULL,'Post POEM review',NULL,NULL,NULL,NULL),(48,48,'post_Eckart',9,8,2,1,NULL,NULL,'Eckart post POEM',NULL,NULL,NULL,NULL),(50,50,'post_HRM_GOJ',9,9,2,1,NULL,NULL,'IRP at HRM (mmHg)',NULL,NULL,NULL,NULL),(51,52,'post_HRM_relaxLOS',9,10,2,1,NULL,NULL,'LES relaxation pressure (mmHg)',NULL,NULL,NULL,NULL),(52,53,'post_HRM_UESnormal',9,11,2,1,NULL,NULL,'UES relaxation pressure',NULL,NULL,NULL,NULL),(53,54,'post_HRM_diagnosis',9,8,1,1,'diagnosis',NULL,'HRM diagnosis',NULL,NULL,NULL,NULL),(54,55,'post_bariumswallow_date',9,12,3,3,NULL,NULL,'Barium swallow',NULL,NULL,NULL,NULL),(55,56,'post_bariumswallow_diagnosis',9,13,4,1,'diagnosis',NULL,'Diagnosis at barium swallow',NULL,NULL,NULL,NULL),(56,57,'post_gastroscopy',9,14,3,1,NULL,NULL,'Post POEM gastroscopy',NULL,NULL,NULL,NULL),(57,58,'post_gastroscopy_result',9,15,4,1,NULL,NULL,'Post POEM gastroscopy findings',NULL,NULL,NULL,NULL),(58,59,'post_datecollected',9,2,2,3,NULL,NULL,'Date collected',NULL,NULL,NULL,NULL),(59,60,'current_weight',9,3,2,1,NULL,NULL,'Weight, current, (kg)',NULL,NULL,NULL,NULL),(60,61,'diagnosis',4,1,1,1,'diagnosis','diagnosis_t','Diagnosis (Chicago v3)',NULL,NULL,NULL,NULL),(62,63,'ComplicationDetails',7,8,4,1,NULL,NULL,'Further adverse event details',NULL,NULL,NULL,NULL),(63,64,'ProcedureDate',6,1,2,3,NULL,NULL,'ProcedureDate',NULL,NULL,NULL,NULL),(64,66,'CompleteFUCheck',10,1,3,1,NULL,NULL,'Complete Follow Up?',NULL,NULL,NULL,NULL),(65,67,'Referrer',11,1,2,1,NULL,NULL,'Referrer Name',NULL,NULL,NULL,NULL),(66,68,'ReferrerFax',11,2,2,1,NULL,NULL,'Referrer Phone',NULL,NULL,NULL,NULL),(67,69,'ReferrerEmail',11,3,2,1,NULL,NULL,'Referrer Email',NULL,NULL,NULL,NULL),(70,72,'IPSubcutEmphysema',7,4,3,1,'Yes_no',NULL,'Capnoperitoneum',NULL,NULL,NULL,NULL),(71,73,'IPSubcutEmphysemaMx',7,5,1,1,'IPEmphysema',NULL,'Management of capnoperitoneum',NULL,NULL,NULL,NULL),(72,74,'gastroscopy_prevdilated',5,10,3,1,'Yes_no',NULL,'Dilated oesophagus',NULL,NULL,NULL,NULL),(73,75,'gastroscopy_prevresistance',5,11,3,1,'Yes_no',NULL,'Resistance to GOJ passage',NULL,NULL,NULL,NULL),(74,76,'gastroscopy_prevopenCOJ',5,12,3,1,'Yes_no',NULL,'GOJ sits open',NULL,NULL,NULL,NULL),(75,77,'gastroscopy_prevspasm',5,13,3,1,'Yes_no',NULL,'Spasm of the oesophageal body',NULL,NULL,NULL,NULL),(76,78,'gastroscopy_prevother',5,14,4,1,NULL,NULL,'Other observations gastroscopy',NULL,NULL,NULL,NULL),(77,79,'post_Eckart_dysphagia',9,4,1,1,'Eckart_dysphagia',NULL,'Dysphagia (Eckart)',NULL,NULL,NULL,NULL),(78,80,'post_Eckart_regurgitation',9,5,1,1,'Eckart_regurgitation',NULL,'Regurgitation (Eckart)',NULL,NULL,NULL,NULL),(79,81,'post_Eckart_pain',9,6,1,1,'Eckart_pain',NULL,'Pain (Eckart)',NULL,NULL,NULL,NULL),(80,82,'post_Eckart_wtloss',9,7,1,1,'Eckart_wtloss',NULL,'Weight loss (Eckart)',NULL,NULL,NULL,NULL),(81,83,'pre_Eckart_dysphagia',3,7,1,1,'Eckart_dysphagia','Eckart_dysphagia_t','Dysphagia (pre)',NULL,NULL,NULL,NULL),(82,84,'pre_Eckart_regurgitation',3,8,1,1,'Eckart_regurgitation','Eckart_regurgitation_t','Regurgitation(pre)',NULL,NULL,NULL,NULL),(83,85,'pre_Eckart_wtloss',3,9,1,1,'Eckart_wtloss','Eckart_wtloss_t','Weight Loss (pre)',NULL,NULL,NULL,NULL),(84,86,'pre_Eckart_pain',3,10,1,1,'Eckart_pain','Eckart_pain_t','Pain (pre)',NULL,NULL,NULL,NULL),(85,35,'submucosal_tunnel_bottom',6,5,2,1,NULL,NULL,'Bottom of submucosal tunnel distance (cm)',NULL,NULL,NULL,NULL),(86,36,'myotomy_bottom',6,7,2,1,NULL,NULL,'Bottom of myotomy (cm)',NULL,NULL,NULL,NULL),(87,36,'myotomy_full_thickness_length_distal',6,8,2,1,NULL,NULL,'Length of full thickness myotomy (cm)',NULL,NULL,NULL,NULL),(88,36,'IPB_solution',7,2,1,1,'IPB_solution',NULL,'Treatment of bleeding',NULL,NULL,NULL,NULL),(89,36,'tunnel_exit',7,6,3,1,'Yes_no',NULL,'Tunnel exit?',NULL,NULL,NULL,NULL),(90,36,'tunnel_exit_solution',7,7,1,1,'tunnel_exit_solution',NULL,'Tunnel exit solution?',NULL,NULL,NULL,NULL),(91,87,'validated',11,4,5,NULL,NULL,NULL,'validated?',NULL,NULL,NULL,NULL),(92,2,'Sex',1,3,1,NULL,'Sex',NULL,'Sex',NULL,NULL,NULL,NULL),(93,15,'previous_treatment_POEM',2,8,3,1,'Yes_no','Yes_no_t','Previous POEM',NULL,NULL,NULL,NULL),(94,15,'previous_treatment_notes',2,9,4,1,'Yes_no','Yes_no_t','Previous treatment notes',NULL,NULL,NULL,NULL),(95,15,'previous_treatment_heller',2,7,3,1,'Yes_no','Yes_no_t','Heller myotomy',NULL,NULL,NULL,NULL),(96,39,'POEM_knife',6,10,1,1,'knife',NULL,'Knife used',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `pageLayoutPOEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pageLayoutPolypectomyTool`
--

DROP TABLE IF EXISTS `pageLayoutPolypectomyTool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pageLayoutPolypectomyTool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `﻿Number` varchar(10) DEFAULT NULL,
  `Name` varchar(26) DEFAULT NULL,
  `Position` int(2) DEFAULT NULL,
  `Order` int(3) DEFAULT NULL,
  `Type` int(1) DEFAULT NULL,
  `textType` int(1) DEFAULT NULL,
  `Value1` varchar(25) DEFAULT NULL,
  `Value2` varchar(27) DEFAULT NULL,
  `Weight` int(1) DEFAULT NULL,
  `Value3` varchar(32) DEFAULT NULL,
  `Value4` varchar(37) DEFAULT NULL,
  `Text` varchar(242) DEFAULT NULL,
  `Link` varchar(10) DEFAULT NULL,
  `Message_t` varchar(17) DEFAULT NULL,
  `ForVideo` int(1) DEFAULT NULL,
  `SelectMultiple` int(1) DEFAULT NULL,
  `AlwaysRequired` int(1) DEFAULT NULL,
  `RequiredIfCondition` int(1) DEFAULT NULL,
  `Condition` varchar(17) DEFAULT NULL,
  `T` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pageLayoutPolypectomyTool`
--

LOCK TABLES `pageLayoutPolypectomyTool` WRITE;
/*!40000 ALTER TABLE `pageLayoutPolypectomyTool` DISABLE KEYS */;
INSERT INTO `pageLayoutPolypectomyTool` VALUES (1,NULL,'AGE',1,1,2,2,NULL,NULL,NULL,NULL,NULL,'Age',NULL,NULL,0,NULL,1,0,NULL,NULL),(2,NULL,'Sex',1,2,1,NULL,'Sex','Sex_t',0,NULL,NULL,'Sex',NULL,NULL,0,NULL,1,0,NULL,NULL),(3,NULL,'OnlyLesion',1,3,1,NULL,'Yes_no','Yes_no_t',0,NULL,NULL,'Is this the only lesion in this patient?',NULL,NULL,0,NULL,1,0,NULL,NULL),(4,NULL,'SMSASize',2,4,1,NULL,'SMSASize','SMSASize_t',1,NULL,NULL,'Size according to SMSA classification',NULL,NULL,1,NULL,1,0,NULL,NULL),(5,NULL,'SMSAMorphology',2,5,1,NULL,'SMSAMorphology','SMSAMorphology_t',1,NULL,NULL,'Morphology according to SMSA classification',NULL,NULL,1,NULL,1,0,NULL,NULL),(6,NULL,'SMSASite',2,6,1,NULL,'SMSASite','SMSASite_t',1,NULL,NULL,'Size according to SMSA classification',NULL,NULL,1,NULL,1,0,NULL,NULL),(7,NULL,'SMSAAccess',2,7,1,NULL,'SMSAAccess','SMSAAccess_t',1,NULL,NULL,'Access according to SMSA classification',NULL,NULL,1,NULL,1,0,NULL,NULL),(8,NULL,'Paris',3,8,1,NULL,'Paris','Paris_t',0,NULL,NULL,'Paris classification',NULL,NULL,1,NULL,1,0,NULL,NULL),(9,NULL,'Location',3,9,1,NULL,'Location','Location_t',1,NULL,NULL,'Location of the lesion',NULL,NULL,1,NULL,1,0,NULL,NULL),(10,NULL,'Morphology',3,10,1,NULL,'Morphology','Morphology_t',0,NULL,NULL,'Morphology ',NULL,NULL,1,NULL,1,0,NULL,NULL),(11,NULL,'ColonCleanliness',5,11,1,NULL,'ColonCleanliness','ColonCleanliness_t',1,NULL,NULL,'Colon cleanliness',NULL,NULL,1,NULL,1,0,NULL,NULL),(12,NULL,'Dateofprocedure',4,12,2,3,NULL,NULL,0,NULL,NULL,'Date of procedure',NULL,NULL,1,NULL,1,0,NULL,NULL),(13,NULL,'AssessorName',4,13,2,2,NULL,NULL,0,NULL,NULL,'Assessor name',NULL,NULL,1,NULL,0,0,NULL,NULL),(14,NULL,'AssessorGrade',4,14,1,NULL,'Grade','Grade_t',0,NULL,NULL,'Assessor Grade',NULL,NULL,1,NULL,1,0,NULL,NULL),(15,NULL,'AssesseeName',4,15,2,2,NULL,NULL,0,NULL,NULL,'Assessee Name',NULL,NULL,1,NULL,0,0,NULL,NULL),(16,NULL,'AssesseeGrade',4,16,1,NULL,'Grade','Grade_t',0,NULL,NULL,'Assessee Grade',NULL,NULL,1,NULL,1,0,NULL,NULL),(17,NULL,'ExperienceAssessor',4,17,1,NULL,'LifetimeProcedures','LifetimeProcedures_t',0,NULL,NULL,'Number of lifetime EMR>20mm of the assessor',NULL,NULL,1,NULL,1,0,NULL,NULL),(18,NULL,'ExperienceAssessee',4,18,1,NULL,'LifetimeProcedures','LifetimeProcedures_t',0,NULL,NULL,'Number of lifetime EMR>20mm of the assessee',NULL,NULL,1,NULL,1,0,NULL,NULL),(19,NULL,'PatientConsentObtained',5,19,1,NULL,'Yes_no','Yes_no_t',1,'Yes_no_weight','Yes_no_denominator','Patient consent obtained',NULL,NULL,0,NULL,1,0,NULL,NULL),(20,NULL,'PatientComorbidity',5,20,1,NULL,'PatientComorbidity','PatientComorbidity_t',1,NULL,NULL,'Patient ASA score',NULL,NULL,0,NULL,1,0,NULL,NULL),(22,NULL,'AnticoagulantTherapy',5,22,1,NULL,'Yes_no_notReq','Yes_no_notReq_t',1,'Yes_no_weight','Yes_no_denominator','Appropriate anticoagulant management?',NULL,NULL,0,NULL,0,0,NULL,NULL),(24,NULL,'ProphylacticAntibiotics',5,24,1,NULL,'Yes_no_notReq','Yes_no_notReq_t',1,'Yes_no_weight','Yes_no_denominator','Prophylactic antibiotics considered and prescribed if required',NULL,NULL,0,NULL,0,0,NULL,NULL),(25,NULL,'PatientCorrectlyPositioned',5,25,1,NULL,'Yes_no','Yes_no_t',0,'Yes_no_weight','Yes_no_denominator','Patient correctly positioned (lesion in non-dependent position)',NULL,NULL,1,NULL,1,0,NULL,NULL),(26,NULL,'PlateOn',5,26,1,NULL,'Yes_no','Yes_no_t',0,'Yes_no_weight','Yes_no_denominator','Ensures that the patient has an electrosurgical plate on and that the generator is ready to deliver thermal energy',NULL,NULL,0,NULL,1,0,NULL,NULL),(27,NULL,'MetalImplant',5,27,1,NULL,'Yes_no','Yes_no_t',0,'Yes_no_weight','Yes_no_denominator','Metal implants checked prior to plate placement for correct positioning',NULL,NULL,0,NULL,0,1,NULL,NULL),(28,NULL,'AccurateSizeDetermination',6,28,1,NULL,'Q11','Q11_t',1,'Q11_weight','Q11_denominator','Accurately determines size and full extent of the lesion',NULL,NULL,0,NULL,1,0,NULL,NULL),(29,NULL,'HighestKudoAssessor',6,29,1,NULL,'HighestKudo','HighestKudo_t',0,NULL,NULL,'Highest Kudo of the lesion according to the assessor',NULL,NULL,1,NULL,1,0,NULL,NULL),(30,NULL,'HighestKudoAssessee',6,30,1,NULL,'HighestKudo','HighestKudo_t',0,NULL,NULL,'Highest Kudo of the lesion according to the assessee',NULL,NULL,0,NULL,0,0,NULL,NULL),(31,NULL,'HighestNICEAssessor',6,31,1,NULL,'HighestNICE','HighestNICE_t',0,NULL,NULL,'Highest NICE of the lesion according to the assessor',NULL,NULL,1,NULL,1,0,NULL,NULL),(32,NULL,'HighestNICEAssessee',6,32,1,NULL,'HighestNICE','HighestNICE_t',0,NULL,NULL,'Highest NICE of the lesion according to the assessee',NULL,NULL,0,NULL,0,0,NULL,NULL),(33,NULL,'RiskSMICAssessor',6,33,1,NULL,'RiskOfSMIC','RiskOfSMIC_t',0,NULL,NULL,'Risk of SMIC of the lesion according to the assessor',NULL,NULL,1,NULL,1,0,NULL,NULL),(34,NULL,'RiskSMICAssessee',6,34,1,NULL,'RiskOfSMIC','RiskOfSMIC_t',0,NULL,NULL,'Risk of SMIC of the lesion according to the assessee',NULL,NULL,0,NULL,0,0,NULL,NULL),(35,NULL,'EnblocResection',6,35,1,NULL,'Yes_no','Yes_no_t',1,'Yes_no_weight','Yes_no_denominator','En-bloc resection? ',NULL,NULL,1,NULL,1,0,NULL,NULL),(36,NULL,'Enbloc',6,36,1,NULL,'Yes_no','Yes_no_t',1,'Yes_no_weight','Yes_no_denominator','Can justify based on evidence whether en-bloc resection is required ',NULL,NULL,0,NULL,1,0,NULL,NULL),(37,NULL,'AttemptBeyondCapabilities',6,37,1,NULL,'AttemptBeyondCapabilities','AttemptBeyondCapabilities_t',1,'AttemptBeyondCapabilities_weight','AttemptBeyondCapabilities_denominator','Does not attempt a lesion beyond their capabilities (discusses with trained colleague and allow them to take over procedure)',NULL,NULL,0,NULL,1,0,NULL,NULL),(38,NULL,'Piecemeal',6,38,1,NULL,'Q14','Q14_t',1,'Q14_weight','Q14_denominator','If undertaking piecemeal resection identifies suspicious areas which may require en-bloc resection for better pathology reporting',NULL,NULL,1,NULL,0,1,'En-blocResection',NULL),(39,NULL,'Access',7,39,1,NULL,'Access','Access_t',1,'Access_weight','Access_denominator','Difficult access?',NULL,NULL,0,NULL,1,0,NULL,NULL),(40,NULL,'Pressure',7,40,1,NULL,'Yes_no_required','Yes_no_required_t',1,'Yes_no_required_weight','Yes_no_required_denominator','Appropriate use of external pressure to prevent loop formation ',NULL,NULL,0,NULL,1,0,NULL,NULL),(41,NULL,'LesionPosition',7,41,1,NULL,'LesionPosition','LesionPosition_t',1,'LesionPosition_weight','LesionPosition_denominator','lesion at 3-7 o clock position',NULL,NULL,1,NULL,1,0,NULL,NULL),(42,NULL,'Retroflexion',7,42,1,NULL,'Retroflextion','Retroflextion_t',1,'Retroflextion_weight','Retroflextion_denominator','Use of retroflexion to assist access if required',NULL,NULL,1,NULL,1,0,NULL,NULL),(43,NULL,'ScopeUsed',7,43,1,NULL,'ScopeUsed','ScopeUsed_t',1,'ScopeUsed_weight','ScopeUsed_denominatori','Use of different endoscopes with different lengths or stiffness or tip bending properties',NULL,NULL,0,NULL,1,0,NULL,NULL),(44,NULL,'Insufflation',7,44,1,NULL,'Yes_no','Yes_no_t',1,'Yes_no_weight','Yes_no_denominator','Good use of insufflation?',NULL,NULL,1,NULL,1,0,NULL,NULL),(45,NULL,'Cap',7,45,1,NULL,'Yes_no_required','Yes_no_required_t',1,'Yes_no_required_weight','Yes_no_required_denominator','Use of distal attachment cap where it would be helpful e.g. ARJ, ICV, flexures, appendiceal orifice ',NULL,NULL,1,NULL,1,0,NULL,NULL),(46,NULL,'Antispasmodics',7,46,1,NULL,'Antispasmodics','Antispasmodics_t',1,'Antispasmodics_weight','Antispasmodics_denominator','Administration of antispasmodics',NULL,NULL,0,NULL,1,0,NULL,NULL),(47,NULL,'OptimisesAccess',7,47,NULL,NULL,'SubjectiveScore','SubjectiveScore_t',1,NULL,NULL,'Assessor subjective score for optimising access',NULL,NULL,1,NULL,1,0,NULL,NULL),(48,NULL,'LiftAtOnce',8,48,1,NULL,'No_yes','No_yes_t',NULL,'No_yes_weight','No_yes_denominator','Attempts to lift the whole lesion at once (when en-bloc resection not attempted)',NULL,NULL,1,NULL,0,1,'En-blocResection',NULL),(49,NULL,'Sequential_Inj_Res',8,49,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Follows a process of sequential injection after snare resection for piecemeal resections',NULL,NULL,1,NULL,0,1,'En-blocResection',NULL),(50,NULL,'ImproveAccess',8,50,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Uses injection to improve lesion access and visualisation',NULL,NULL,1,NULL,1,0,NULL,NULL),(51,NULL,'AirExpelled',8,51,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Ensures air expelled from injection catheter prior to first injection (priming)',NULL,NULL,0,NULL,1,0,NULL,NULL),(52,NULL,'InjectionThroughMalignant',8,52,1,NULL,'InjectionThroughMalignant','InjectionThroughMalignant_t',NULL,'InjectionThroughMalignant_weight','InjectionThroughMalignant_denominator','Does not attempt injection through clearly malignant lesion ',NULL,NULL,1,NULL,1,0,NULL,NULL),(53,NULL,'NeedleTangential',8,53,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Starts injection with the needle tangential to the mucosa',NULL,NULL,1,NULL,1,0,NULL,NULL),(54,NULL,'DynamicInjection',8,54,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Dynamic injection technique used (starts injection as tissue being punctured and then pull catheter back and lift up/away in the desired direction)',NULL,NULL,1,NULL,1,0,NULL,NULL),(55,NULL,'IntramucosalBlebs',8,55,1,NULL,'Yes_no_addweight','Yes_no_addweight_t',1,NULL,NULL,'Creates intramucosal blebs',NULL,NULL,1,NULL,1,0,NULL,'adds weight'),(56,NULL,'IntramucosalBlebsTreatment',8,56,1,NULL,'IntramucosalBlebs','IntramucosalBlebs_t',NULL,'IntramucosalBlebs_weight','IntramucosalBlebs_denominator','Management of intra-mucosal blebs',NULL,NULL,1,NULL,0,1,'IntramucosalBlebs',NULL),(57,NULL,'Lifting',8,57,1,NULL,'Yes_no_addweight','Yes_no_addweight_t',1,NULL,NULL,'Difficult lifting?',NULL,NULL,1,NULL,1,0,NULL,'adds weight'),(58,NULL,'StopInjection',8,58,1,NULL,'StopInjection','StopInjection_t',NULL,'StopInjection_weight','StopInjection_denominator','Stops injection if no lift noted',NULL,NULL,1,NULL,0,1,'Lifting',NULL),(59,NULL,'AppropriateLift',8,59,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Obtains an appropriate and sustained lift of the lesion',NULL,NULL,1,NULL,1,0,NULL,NULL),(60,NULL,'NarrowSegment',8,60,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Does not over-lift in narrow segment?',NULL,NULL,1,NULL,1,0,NULL,NULL),(61,NULL,'AppropriateSnare',9,61,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Appropriate snare type used for the lesion',NULL,NULL,1,NULL,1,0,NULL,NULL),(62,NULL,'AppropriateSize',9,62,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Appropriate snare size used for the lesion ',NULL,NULL,1,NULL,1,0,NULL,NULL),(63,NULL,'StartsAtTheEdge',9,63,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Starts at the edge of the lesion with a 1-2 mm rim of normal mucosa',NULL,NULL,1,NULL,1,0,NULL,NULL),(64,NULL,'LongAxis',9,64,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Long-axis of the snare placed parallel to the polyp base during resection where possible',NULL,NULL,1,NULL,1,0,NULL,NULL),(65,NULL,'Aspiration',9,65,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Uses of aspiration of luminal gas and firm downward pressure with the tip of the endoscope whilst closing snare to aid tissue capture',NULL,NULL,1,NULL,1,0,NULL,NULL),(66,NULL,'TipVisualisation',9,66,1,NULL,'Q44','Q44_t',NULL,'Q44_weight','Q44_denominator','The tip of the snare catheter during closure was',NULL,NULL,1,NULL,1,0,NULL,NULL),(67,NULL,'StopClosureSnare',9,67,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','The endoscopist closes the snare and informs the assistant to stop closure when resistance is felt',NULL,NULL,1,NULL,0,1,'EndoscopistSnare',NULL),(68,NULL,'EndoscopistSnare',9,68,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Does the endoscopist take the snare?',NULL,NULL,0,NULL,1,0,NULL,NULL),(69,NULL,'SnareClosure',9,69,1,NULL,'SnareClosure','SnareClosure_t',NULL,'SnareClosure_weight','SnareClosure_denominator','The endoscopist takes the snare and closes the handle to 1cm',NULL,NULL,0,NULL,0,1,'EndoscopistSnare',NULL),(70,NULL,'TissueMobility',9,70,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','',NULL,NULL,1,NULL,1,0,NULL,NULL),(71,NULL,'TactileFeedback',9,71,1,NULL,'TactileFeedback','TactileFeedback_t',NULL,'TactileFeedback_weight','TactileFeedback_denominator','Checks for tactile feedback & or listens to the feedback of the assistant',NULL,NULL,0,NULL,1,0,NULL,NULL),(72,NULL,'GoodResection_Piecemeal',9,72,1,NULL,'GoodResection_Piecemeal','GoodResection_Piecemeal_t',NULL,'GoodResection_Piecemeal_weight','GoodResection_Piecemeal_denominator','',NULL,NULL,1,1,0,1,NULL,NULL),(73,NULL,'GoodResection_EnBloc',9,73,1,NULL,'GoodResection_EnBloc','GoodResection_EnBloc_t',NULL,'GoodResection_EnBloc_weight','GoodResection_EnBloc_denominator','How to perform a good resection (if en bloc)',NULL,NULL,1,1,0,1,NULL,NULL),(74,NULL,'SpeedOfClosure',9,74,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Gives specific instructions regarding speed of closure of the snare and whether the endoscopist or assistant will close the snare on application of diathermy prior to any snare closure',NULL,NULL,0,NULL,1,0,NULL,NULL),(75,NULL,'ColdSnare',9,75,1,NULL,'ColdSnare','ColdSnare_t',NULL,'ColdSnare_weight','ColdSnare_denominator','Does not inadvertently perform cold snare resection when attempting diathermy assisted resection',NULL,NULL,1,NULL,1,0,NULL,NULL),(76,NULL,'CorrectSettingsEnsured',10,76,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Ensures correct settings on the electrosurgical unit prior to any application of diathermy',NULL,NULL,0,NULL,1,0,NULL,NULL),(77,NULL,'StablePosition',10,77,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator',' ',NULL,NULL,0,NULL,1,0,NULL,NULL),(78,NULL,'CheckHaemostatics',10,78,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Checks at least once during the procedure and prior to the application of any diathermy that haemostatic options are available immediately afterwards - e.g. clips, haemostatic forceps',NULL,NULL,0,NULL,1,0,NULL,NULL),(79,NULL,'UsesDistension',10,79,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Uses luminal distensionto ensure visualisation ofthe captured tissue and snare placement',NULL,NULL,1,NULL,1,0,NULL,NULL),(80,NULL,'MobilityChecks',10,80,1,NULL,'MobilityChecks','MobilityChecks_t',NULL,'MobilityChecks_weight','MobilityChecks_denominator','Mobility check of the captured tissue performed to ensure that the muscularis propria is not entrapped each time a resection is performed',NULL,NULL,1,NULL,1,0,NULL,NULL),(81,NULL,'DiathermyApplication',10,81,1,NULL,'DiathermyApplication','DiathermyApplication_t',NULL,'DiathermyApplication_weight','DiathermyApplication_denominator','The sequence of commands on application of diathermy ',NULL,NULL,0,NULL,1,0,NULL,NULL),(82,NULL,'StopsIfNoTransection',10,82,1,NULL,'Yes_no_notOccur','Yes_no_notOccur_t',NULL,'Yes_no_notOccur_weight','Yes_no_notOccur_denominator','During the application of current if the tissue is not transected stops further diathermy application and assesses the situation',NULL,NULL,0,NULL,1,0,NULL,NULL),(83,NULL,'StopDiathermy',10,83,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Stops application of diathermy as soon as tissue transected',NULL,NULL,0,NULL,1,0,NULL,NULL),(84,NULL,'NLA ',10,84,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Non lifting adenoma?',NULL,NULL,1,NULL,1,0,NULL,NULL),(85,NULL,'NLATreatment',10,85,1,NULL,'NLATreatment','NLATreatment_t',NULL,'NLATreatment_weight','NLATreatment_denominator','Treatment of non lifting adenoma ',NULL,NULL,1,NULL,0,1,NULL,NULL),(86,NULL,'SecondLine',10,86,1,NULL,'SecondLine','SecondLine_t',NULL,'SecondLine_weight','SecondLine_denominator','Considers the following as second line for tissue that cannot be resected using the above techinques and appears benign [depending on histopathology]',NULL,NULL,0,NULL,0,1,NULL,NULL),(87,NULL,'IPB',11,87,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was there IPB?',NULL,NULL,1,NULL,1,0,NULL,NULL),(88,NULL,'CauseOfBleedingIdentified',11,88,1,NULL,'CauseOfBleedingIdentified','CauseOfBleedingIdentified_t',NULL,'CauseOfBleedingIdentified_weight','CauseOfBleedingIdentified_denominator','',NULL,NULL,1,NULL,0,1,NULL,NULL),(89,NULL,'PatientPosition ',11,89,1,NULL,'PatientPosition','PatientPosition_t',NULL,'PatientPosition_weight','PatientPosition_denominator','Ensures the patient position is optimal such that bleeding occurs away from resection site to improve visualisation (use gravity)',NULL,NULL,1,NULL,0,1,NULL,NULL),(90,NULL,'MildBleeding',11,90,1,NULL,'MildBleeding','MildBleeding_t',NULL,'MildBleeding_weight','MildBleeding_denominator','In cases of mild/moderate bleeding [interpreted by the assessor]',NULL,NULL,1,NULL,0,1,NULL,NULL),(91,NULL,'STSCNeeded',11,91,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was STSC needed?',NULL,NULL,1,NULL,1,0,NULL,NULL),(92,NULL,'STSC',11,92,1,NULL,'STSC','STSC_t',NULL,'STSC_weight','STSC_denominator','Technique for STSC to control intraprocedural bleeding ',NULL,NULL,1,NULL,0,1,NULL,NULL),(93,NULL,'Coag ',11,93,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was coagulation needed?',NULL,NULL,1,NULL,1,0,NULL,NULL),(94,NULL,'CoagForceps',11,94,1,NULL,'CoagForceps','CoagForceps_t',NULL,'CoagForceps_weight','CoagForceps_denominator','When appropriately using the coagulation forceps ',NULL,NULL,1,NULL,0,1,NULL,NULL),(95,NULL,'SevereBleeding',11,95,1,NULL,'SevereBleeding','SevereBleeding_t',NULL,'SevereBleeding_weight','SevereBleeding_denominator','In the case of severe bleeding [judgement by the assessor]',NULL,NULL,1,NULL,0,1,NULL,NULL),(96,NULL,'NotControlledBleeding',11,96,1,NULL,'NotControlledBleeding','NotControlledBleeding_t',NULL,'NotControlledBleeding_weight','NotControlledBleeding_denominator','When thermal energy does not control bleeding',NULL,NULL,1,NULL,0,1,NULL,NULL),(97,NULL,'NotControlledBleeding_1',11,97,1,NULL,'NotControlledBleeding_1','NotControlledBleeding_1_t',NULL,'NotControlledBleeding_1_weight','NotControlledBleeding_1_denominator','When there is diffuse intra-procedural bleeding which cannot be controlled using the other, more precise methods (above)',NULL,NULL,1,NULL,0,1,NULL,NULL),(98,NULL,'CompleteBleedingControl',11,98,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Achieves complete control of intraprocedural bleeding /',NULL,NULL,1,NULL,0,1,NULL,NULL),(99,NULL,'Perforation',12,99,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was a perforation suspected during the procedure?',NULL,NULL,1,NULL,1,0,NULL,NULL),(100,NULL,'SydneyDMIScore',12,100,1,NULL,'SydneyDMIScore','SydneyDMIScore_t',NULL,'SydneyDMIScore_weight','SydneyDMIScore_denominator','The suspected perforation is classified according to the Sydney Deep mural injury score (DMI) ',NULL,NULL,0,NULL,0,1,NULL,NULL),(101,NULL,'ClosureRequired',12,101,1,NULL,'Q77','Q77_t',NULL,'Q77_weight','Q77_denominator','',NULL,NULL,1,NULL,0,1,NULL,NULL),(102,NULL,'PriorClosure',12,102,1,NULL,'PriorClosure','PriorClosure_t',NULL,'PriorClosure_weight','PriorClosure_denominator','Prior to closure of the resection [if judged appropriate to do so by the assessor based on the bowel preparation, competence of the endoscopist [previous scoring in this tool, if available], size of the perforation and stage of the resection]',NULL,NULL,1,NULL,0,1,NULL,NULL),(103,NULL,'ClipUses',12,103,1,NULL,'ClipUses','ClipUses_t',NULL,'ClipUses_weight','ClipUses_denominator','Uses through the scope clips as first line to close a suspected perforation ',NULL,NULL,1,NULL,0,1,NULL,NULL),(104,NULL,'TTSTechnique',12,104,1,NULL,'TTSTechnique','TTSTechnique_t',NULL,'TTSTechnique_weight','TTSTechnique_denominator','Regarding through the scope clip placement technique',NULL,NULL,1,NULL,0,1,NULL,NULL),(105,NULL,'TTSNotUsed',12,105,1,NULL,'TTSNotUsed','TTSNotUsed_t',NULL,'TTSNotUsed_weight','TTSNotUsed_denominator','If closure cannot be achieved with through the scope clips (TTS)',NULL,NULL,1,NULL,0,1,NULL,NULL),(106,NULL,'OTSCTechnique',12,106,1,NULL,'OTSCTechnique','OTSCTechnique_t',NULL,'OTSCTechnique_weight','OTSCTechnique_denominator','The technique of OTSC placement (if OTSC required and considered necessary by the assessor) ',NULL,NULL,1,NULL,0,1,NULL,NULL),(107,NULL,'CompleteClosure',12,107,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Achieves complete closure of the perforation ',NULL,NULL,1,NULL,0,1,NULL,NULL),(108,NULL,'AntibioticsPostPerf',12,108,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Administers IV antibiotics in the case of suspected perforation',NULL,NULL,0,NULL,0,1,NULL,NULL),(109,NULL,'Ctscan',12,109,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Considers a CT scan after completion of the procedure if any concern for closure or patient discomfort ',NULL,NULL,0,NULL,0,1,NULL,NULL),(110,NULL,'SurgicalReview',12,110,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Considers review by a surgeon based on degree of observed faecal contamination, presence/absence of persistent post-procedural pain, CT scan appearances',NULL,NULL,0,NULL,0,1,NULL,NULL),(111,NULL,'DifficultAccess',13,111,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was access difficult?',NULL,NULL,0,NULL,1,0,NULL,NULL),(112,NULL,'Position',13,112,1,NULL,'Position','Position_t',NULL,'Position_weight','Position_denominator','Changes patient position to improve luminal view or access to lesion',NULL,NULL,0,NULL,1,0,NULL,NULL),(113,NULL,'ScopeChanged',13,113,1,NULL,'ScopeChanged','ScopeChanged_t',NULL,'ScopeChanged_weight','ScopeChanged_denominator','Tries a different colonoscope to improve access to lesion',NULL,NULL,1,NULL,1,0,NULL,NULL),(114,NULL,'CapUsed',13,114,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Adds a transparent distal attachment to increase stability around folds / flexures (e.g. straight cap)',NULL,NULL,1,NULL,1,0,NULL,NULL),(115,NULL,'AntispasmodicsUsed',13,115,1,NULL,'Yes_no_required','Yes_no_required_t',NULL,'Yes_no_required_weight','Yes_no_required_denominator','Uses antispasmodics ',NULL,NULL,0,NULL,0,1,NULL,NULL),(116,NULL,'Retroflexionv2',13,116,1,NULL,'Retroflextion','Retroflextion_t',NULL,'Retroflextion_weight','Retroflextion_denominator','Use of retroflexion ',NULL,NULL,1,NULL,0,1,NULL,NULL),(117,NULL,'ExternalPressure',13,117,1,NULL,'Yes_no_required','Yes_no_required_t',NULL,'Yes_no_required_weight','Yes_no_required_denominator','Use external compression to stabilise the endoscope position',NULL,NULL,0,NULL,0,1,NULL,NULL),(118,NULL,'HoldTheScope',13,118,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Asks assistant/nurse to hold the endoscope',NULL,NULL,0,NULL,0,1,NULL,NULL),(119,NULL,'ICV',14,119,1,NULL,'ICV','ICV_t',NULL,'ICV_weight','ICV_denominator','ICV',NULL,NULL,1,NULL,0,1,NULL,NULL),(120,NULL,'AppendicealOrfice',14,120,6,NULL,'AppendicealOrfice','AppendicealOrfice_t',NULL,'AppendicealOrfice_weight','AppendicealOrfice_denominator','Appendiceal orifice',NULL,NULL,1,NULL,0,1,NULL,NULL),(121,NULL,'AnorectalJunction',14,121,1,NULL,'AnorectalJunction','AnorectalJunction_t',NULL,'AnorectalJunction_weight','AnorectalJunction_denominator','Anorectal junction',NULL,NULL,1,NULL,0,1,NULL,NULL),(122,NULL,'DefectInspection',15,122,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Spends an appropriate amount of time inspecting the entire mucosal defect, particularly the margins, for residual polyp tissue',NULL,NULL,1,NULL,1,0,NULL,NULL),(123,NULL,'Chromoendoscopy',15,123,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Uses virtual chromendoscopy and or magnification to detect residual polyp tissue at the margins',NULL,NULL,1,NULL,1,0,NULL,NULL),(124,NULL,'Margin',15,124,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was residual at the margin detected?',NULL,NULL,1,NULL,1,0,NULL,NULL),(125,NULL,'PolypTissueRemoved',15,125,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Removes any visible polyp tissue by further snare resection or mechanical avulsion rather than coagulating ',NULL,NULL,1,NULL,0,1,NULL,NULL),(126,NULL,'SubmucosaInspected',15,126,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','The submucosal layer of the defect should be further inspected for any bleeding vessels and these should be treated using snare tip soft coagulation (see above)_ ',NULL,NULL,1,NULL,1,0,NULL,NULL),(127,NULL,'Fibrosis',15,127,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Significant fibrosis in the submucosal plane should be noted',NULL,NULL,0,NULL,1,0,NULL,NULL),(128,NULL,'MPInspection',15,128,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Inspection of the muscularis propria should be undertaken',NULL,NULL,1,NULL,1,0,NULL,NULL),(129,NULL,'MPDescription',15,129,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Description of the muscularis propria using the Sydney Classification of Deep Mural Injury should be performed',NULL,NULL,1,NULL,1,0,NULL,NULL),(130,NULL,'NonStainedSM',15,130,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','was there an area of non stained SM',NULL,NULL,1,NULL,1,0,NULL,NULL),(131,NULL,'Uncertainty',15,131,1,NULL,'Uncertainty','Uncertainty_t',NULL,'Uncertainty_weight','Uncertainty_denominator','In case of uncertainty',NULL,NULL,1,NULL,0,1,NULL,NULL),(132,NULL,'Photodocumentation',15,132,1,NULL,'Yes_no','Yes_no_t',NULL,'Yes_no_weight','Yes_no_denominator','Was photodocumentation done of all areas of the post ER defect',NULL,NULL,1,NULL,1,0,NULL,NULL),(133,NULL,'MarginTreatment',16,133,1,NULL,'MarginTreatment','MarginTreatment_t',NULL,'MarginTreatment_weight','MarginTreatment_denominator','Margin treatment',NULL,NULL,1,NULL,1,0,NULL,NULL),(134,NULL,'STSCTechnique',16,134,1,NULL,'STSCTechnique','STSCTechnique_t',NULL,'STSCTechnique_weight','STSCTechnique_denominator','The technique for STSC involves ',NULL,NULL,1,NULL,0,1,NULL,NULL),(135,NULL,'APCTechnique',16,135,1,NULL,'APCTechnique','APCTechnique_t',NULL,'APCTechnique_weight','APCTechnique_denominator','The technique for APC involves ',NULL,NULL,1,NULL,0,1,NULL,NULL);
/*!40000 ALTER TABLE `pageLayoutPolypectomyTool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagelayoutercppatient`
--

DROP TABLE IF EXISTS `pagelayoutercppatient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagelayoutercppatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text COLLATE utf8_bin DEFAULT NULL,
  `Position` bigint(20) DEFAULT NULL,
  `Order` bigint(20) DEFAULT NULL,
  `Type` bigint(20) DEFAULT NULL,
  `textType` text COLLATE utf8_bin DEFAULT NULL,
  `Value1` text COLLATE utf8_bin DEFAULT NULL,
  `Value2` text COLLATE utf8_bin DEFAULT NULL,
  `Text` text COLLATE utf8_bin DEFAULT NULL,
  `Link` text COLLATE utf8_bin DEFAULT NULL,
  `Message_t` text COLLATE utf8_bin DEFAULT NULL,
  `RequiredIndex` text COLLATE utf8_bin DEFAULT NULL,
  `Required4weeks` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagelayoutercppatient`
--

LOCK TABLES `pagelayoutercppatient` WRITE;
/*!40000 ALTER TABLE `pagelayoutercppatient` DISABLE KEYS */;
INSERT INTO `pagelayoutercppatient` VALUES (1,'Karnofsky',1,1,1,'','karnofsky','karnofsky_t','Karnofsky performance score','','90-100%: normal, no evidence of disease or able to perform normal activity with only minor symptoms; 70-80%: normal activity with effort, some symptoms or able to care for self but unable to do normal activities; 50-60%: requires occasional assistance, cares for most needs or requires considerable assistance; 30-40%: disabled, requires special assistance or severely diqbled; 10-20%: very sick, requires active supportive treatment or moribund','1','0'),(2,'WHO',1,2,1,'','WHO','WHO_t','WHO performance status scale','','0: asymptomatic; 1: symptomatic, fully ambulatory; 2: symptomatic, in bed <50% of the day; 3: symptomatic, in bed >50% of the day but not bedridden; 4: bedridden','1','0');
/*!40000 ALTER TABLE `pagelayoutercppatient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagelayoutercpprocedure`
--

DROP TABLE IF EXISTS `pagelayoutercpprocedure`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagelayoutercpprocedure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `﻿Number` text COLLATE utf8_bin DEFAULT NULL,
  `Name` text COLLATE utf8_bin DEFAULT NULL,
  `Position` int(11) DEFAULT NULL,
  `Order` int(11) DEFAULT NULL,
  `Type` int(11) DEFAULT NULL,
  `textType` text COLLATE utf8_bin DEFAULT NULL,
  `Value1` text COLLATE utf8_bin DEFAULT NULL,
  `Value2` text COLLATE utf8_bin DEFAULT NULL,
  `Text` text COLLATE utf8_bin DEFAULT NULL,
  `Link` text COLLATE utf8_bin DEFAULT NULL,
  `Message_t` text COLLATE utf8_bin DEFAULT NULL,
  `RequiredIndex` int(11) DEFAULT NULL,
  `Required4weeks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagelayoutercpprocedure`
--

LOCK TABLES `pagelayoutercpprocedure` WRITE;
/*!40000 ALTER TABLE `pagelayoutercpprocedure` DISABLE KEYS */;
INSERT INTO `pagelayoutercpprocedure` VALUES (1,'','yearlyERCPvolumeCenter',1,1,1,'','yearlyERCPvolumeCenter','yearlyERCPvolumeCenter_t','number of ERCP\'s performed yearly/center','','',1,0),(2,'','yearlyERCPvolumeEndoscopist',1,2,1,'','yearlyERCPvolumeEndoscopist','yearlyERCPvolumeEndoscopist_t','number of ERCP\'s performed yearly/endoscopist','','',1,0),(3,'','agepatient',1,3,2,'2','','','age of patient (years)','','',1,0),(4,'','dateprocedure',1,4,2,'2','','','date of procedure (YYYY-MM-DD)','','',1,0),(5,'','informedconsent',1,5,1,'','informedconsent','informedconsent_t','informed consent obtained','','',1,0),(6,'','antibiotics',1,6,1,'','antibiotics','antibiotics_t','administration of antibiotics','','',1,0),(7,'','anticoagulants',1,7,1,'','anticoagulants','anticoagulants_t','intake anticoagulants','','non-interrupted anticoagulants pre-procedure',1,0),(8,'','pancreatitisprevention',1,8,1,'','pancreatitisprevention','pancreatitisprevention_t','measurement for prevention of pancreatitis','','',1,0),(10,'','indication',2,1,1,'','indication','indication_t','indication of procedure','','',1,0),(11,'','location',2,2,1,'','location','location_t','location of pathology','','',1,0),(12,'','bismuth',2,3,1,'','bismuth','bismuth_t','bismuth classification','https://www.ncbi.nlm.nih.gov/pmc/articles/PMC2712165/figure/F1/','type 3a: type II and extends to the bifurcation of the right hepatic duct; type 3b: type II and extends to the bifurcation of the left hepatic duct; type 4: extending to the bifurcations of both right and left hepatic ducts or multifocal involvement; type 5: stricture at the junction of common bile duct and cystic duct',0,0),(14,'','gradedifficultyERCP',3,1,1,'','gradedifficultyERCP','gradedifficultyERCP_t','difficulty of ERCP','https://www.sciencedirect.com/science/article/pii/S0016510700702859?via%3Dihub','',1,0),(15,'','previousfailedERCP',3,2,1,'','previousfailedERCP','previousfailedERCP_t','previous failed ERCP','','',1,0),(16,'','durationERCP',3,3,2,'2','','','duration of ERCP (min)','','duration measured from introduction until removal of scope',1,0),(17,'','timetocannulation',3,4,2,'2','','','time to cannulation (min)','','duration measured from introduction scope until cannulation of papilla with guidewire',1,0),(18,'','fluoroscopytime',3,5,2,'2','','','fluroscopy time (min)','','',1,0),(19,'','fluoroscopydose',3,6,2,'2','','','fluoroscopy dose ','','',1,0),(21,'','positioninfrontofpapilla',4,1,1,'','positioninfrontofpapilla','positioninfrontofpapilla_t','position in front of papilla','','',1,0),(22,'','positionERCPscope',4,2,1,'','positionERCPscope_t','positionERCPscope','position of ERCP scope','','',1,0),(23,'','nativepapilla',4,3,1,'','nativepapilla','nativepapilla_t','presence of native papilla','','',1,0),(24,'','duodenaldiverticulum',4,4,1,'','duodenaldiverticulum','duodenaldiverticulum_t','presence of duodenal diverticulum','','',1,0),(25,'','cannulationbileductindicated',4,5,1,'','cannulationbileductindicated','cannulationbileductindicated_t','cannulation of bile duct indicated','','',1,0),(26,'','cannulationbileduct',4,6,1,'','cannulationbileduct','cannulationbileduct_t','cannulation of bile duct achieved','','',1,0),(27,'','biliarypapillotomy',4,7,1,'','biliarypapillotomy','biliarypapillotomy_t','biliary papillotomy performed','','',0,0),(28,'','cannulationwirsungindicatied',4,8,1,'','cannulationwirsungindicated','cannulationwirsungindicated_t','cannulation of wirsung indicated','','',1,0),(29,'','cannulationwirsung',4,9,1,'','cannulationwirsung','cannulationwirsung_t','cannulation of wirsung achieved','','',1,0),(30,'','pancreaticpapillotomy',4,10,1,'','pancreaticpapillotomy','pancreaticpapillotomy_t','pancreatic papillotomy performed','','',0,0),(31,'','contrastwirsung',4,11,1,'','contrastwirsung','constrastwirsung_t','injection of contrast in wirsung','','',1,0),(32,'','difficultcannulationapproach',4,12,1,'','difficultcannulationapproach','difficultcannulationapproach_t','approach in case of difficult cannulation','','',1,0),(33,'','lithiasispresent',4,13,1,'','lithiasispresent','lithiasispresent_t','presence of lithiasis','','',1,0),(34,'','lithiasisremoved',4,14,1,'','lithiasisremoved','lithiasisremoved_t','removal of lithiasis','','',1,0),(35,'','indicationstenting',4,15,1,'','indicationstenting','indicationstenting_t','was there an indication for stenting?','','',1,0),(36,'','stenting',4,16,1,'','stenting','stenting_t','type of stent','','',1,0),(37,'','stentinglocation',4,17,1,'','stentinglocation','stentinglocation_t','location of stent','','',1,0),(38,'','brushing',4,18,1,'','brushing','brushing_t','brushing performed','','',1,0),(39,'','dilatation',4,19,1,'','dilatation','dilatation_t','dilatation performed','','',1,0),(41,'','perproceduraladverseevents',5,1,1,'','perproceduraladverseevents','perproceduraladverseevents_t','per procedural adverse events','','',1,0),(42,'','bleedingtreatment',5,2,1,'','bleedingtreatment','bleedingtreatment_t','treatment in case of bleeding','','',1,0),(43,'','hemostasis',5,3,1,'','hemostasis','hemostasis_t','achievement of hemostasis','','',1,0),(44,'','perforationtype',5,4,1,'','perforationtype','perforationtype_t','type of perforation (Stapfer classiciation)','https://www.ncbi.nlm.nih.gov/pmc/articles/PMC1421129/pdf/20000800s00007p191.pdf','type 1: lateral or medial duodenal wall perforation, endoscope related; type 2: periampullary perforations, sphincterotomy related; type 3: ductal or duodenal perforations due to endoscopic instruments; type 4: guidewire-related perforation with presence of retroperitioneal air at X-ray',1,0),(45,'','perforationtreatment',5,5,1,'','perforationtreatment','perforationtreatment_t','treatment in case of perforation','','',1,0),(47,'','latecomplications',6,1,1,'','latecomplications','latecomplications_t','late complications','','',0,1),(48,'','severitypancreatitislate',6,2,1,'','severitypancreatitis','severitypancreatitis_t','severity of pancreatitis','mild: clinical pancreatitis, elevated amylase or lipase (> 3 times normal upper limit) at more than 24h after the procedure, requiring admission or prolongation of plannend admission to 2-3 days; moderate: pancreatitis requiring hospitalization of 4-10 days; severe: hospitalisation for more than 10 days or hemorrhagic pancreatitis, necrosis or pseudocyst, or intervention (percutaneous drainage or surgery)','',0,1),(49,'','bleedingtreatmentlate',6,3,1,'','bleedingtreatment','bleedingtreatment_t','treatment in case of bleeding','','',0,1),(50,'','hemostasislate',6,4,1,'','hemostasis','hemostasis_t','achievement of hemostasis','','',0,1),(51,'','perforationtypelate',6,5,1,'','perforationtype','perforationtype_t','type of perforation (Stapfer classiciation)','https://www.ncbi.nlm.nih.gov/pmc/articles/PMC1421129/pdf/20000800s00007p191.pdf','type 1: lateral or medial duodenal wall perforation, endoscope related; type 2: periampullary perforations, sphincterotomy related; type 3: ductal or duodenal perforations due to endoscopic instruments; type 4: guidewire-related perforation with presence of retroperitioneal air at X-ray',0,1),(52,'','perforationtreatmentlate',6,6,1,'','perforationtreatment','perforationtreatment_t','treatment in case of perforation','','',0,1),(54,'','technicalsuccess',7,1,1,'','technicalsuccess','technicalsuccess_t','technical success','','',1,0),(55,'','clinicalsuccess',7,2,1,'','clinicalsucces','clinicalsucces_t','clinical success','',' reduction of total serum bilirubin levels to less than half of the pretreatment level within one week and/or less than a quarter of the pretreatment level within four weeks and/or patient can recieve chemotherapy',0,1),(56,'','additionaltreatmentneeded',7,3,1,'','additionaltreatmentneeded','additionaltreatmentneeded_t','additional needed interventions','','',1,1),(57,'','durationhospitalisation',7,4,2,'2','','','duration hospitalisation (days)','','',0,1);
/*!40000 ALTER TABLE `pagelayoutercpprocedure` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `surname` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `centre` int(10) DEFAULT NULL,
  `registered_date` date DEFAULT NULL,
  `last_login` timestamp(6) NULL DEFAULT NULL,
  `previous_login` timestamp(6) NULL DEFAULT NULL,
  `timezone` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `access_level` int(3) DEFAULT NULL,
  `contactPhone` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `key` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'David','Tate','djtate@gmail.com','3912d3cc391166ae9d1723078d828747755a965b4b35b30873fc32cd91564884dddde22b2e5afab7076b373aeb20e3a2ead9905bb2987f71870e46245444cad9',1,'2018-11-01','0000-00-00 00:00:00.000000','0000-00-00 00:00:00.000000','',1,'',''),(3,'Helena','Degroote','helena.degroote@uzgent.be','93d60fe425c4bdf99c15d4ff15073aadc29ef9879863ae0845ed00c6c046955cbe0d06eb3c61876489c0076b82f7ed2aeb328e22339ac0f81131a7403bc86edc',1,'2019-09-24',NULL,NULL,'Europe',2,NULL,'rvCVpfwT4bvtrWq'),(4,'Pieter','Hindryckx','pieter.hindryckx@uzgent.be','74aa4c71f02d77617a48d2602070307a9885e55ccc84192a6299dca10e9973b70ec0f86b5114bdc89e7698f9547f8dff1bd686b0ea68248f3c1e68496718e994',1,'2019-09-24',NULL,NULL,NULL,2,NULL,'ogoJNXsQRYR8VRn');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuesESD`
--

DROP TABLE IF EXISTS `valuesESD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuesESD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Admit_reason` int(1) DEFAULT NULL,
  `Admit_reason_t` varchar(12) DEFAULT NULL,
  `AdjuvantTreatment` int(1) DEFAULT NULL,
  `AdjuvantTreatment_t` varchar(12) DEFAULT NULL,
  `Antiplatelet` int(1) DEFAULT NULL,
  `Antiplatelet_t` varchar(11) DEFAULT NULL,
  `Bleeding_severity` int(1) DEFAULT NULL,
  `Bleeding_severity_t` varchar(59) DEFAULT NULL,
  `Comp_other` int(1) DEFAULT NULL,
  `Comp_other_t` varchar(32) DEFAULT NULL,
  `Comp_perf` int(1) DEFAULT NULL,
  `Comp_perf_t` varchar(26) DEFAULT NULL,
  `Complications` int(1) DEFAULT NULL,
  `Complications_t` varchar(3) DEFAULT NULL,
  `ClinicalCriteria` int(1) DEFAULT NULL,
  `ClinicalCriteria_t` varchar(8) DEFAULT NULL,
  `Differentiation` int(1) DEFAULT NULL,
  `Differentiation_t` varchar(6) DEFAULT NULL,
  `Ethnicity` int(1) DEFAULT NULL,
  `Ethnicity_t` varchar(15) DEFAULT NULL,
  `Fellow` int(1) DEFAULT NULL,
  `Fellow_t` varchar(4) DEFAULT NULL,
  `GA` int(1) DEFAULT NULL,
  `GA_t` varchar(8) DEFAULT NULL,
  `Hemostatic_method_DB` int(1) DEFAULT NULL,
  `Hemostatic_method_DB_t` varchar(18) DEFAULT NULL,
  `Histology` int(1) DEFAULT NULL,
  `Histology_t` varchar(11) DEFAULT NULL,
  `Indication` int(1) DEFAULT NULL,
  `Indication_t` varchar(28) DEFAULT NULL,
  `Injectate` int(1) DEFAULT NULL,
  `Injectate_t` varchar(10) DEFAULT NULL,
  `IPB_tx` int(1) DEFAULT NULL,
  `IPB_tx_t` varchar(10) DEFAULT NULL,
  `Knife` int(1) DEFAULT NULL,
  `Knife_t` varchar(6) DEFAULT NULL,
  `location` int(2) DEFAULT NULL,
  `location_t` varchar(19) DEFAULT NULL,
  `Paris` int(1) DEFAULT NULL,
  `Paris_t` varchar(6) DEFAULT NULL,
  `Perf_tx` int(1) DEFAULT NULL,
  `Perf_tx_t` varchar(9) DEFAULT NULL,
  `pre_resect_histo` int(1) DEFAULT NULL,
  `pre_resect_histo_t` varchar(14) DEFAULT NULL,
  `Prophylaxis_bleed` int(1) DEFAULT NULL,
  `Prophylaxis_bleed_t` varchar(8) DEFAULT NULL,
  `R0` int(1) DEFAULT NULL,
  `R0_t` varchar(37) DEFAULT NULL,
  `ScopeType` int(1) DEFAULT NULL,
  `ScopeType_t` varchar(9) DEFAULT NULL,
  `SE_Rx` int(1) DEFAULT NULL,
  `SE_Rx_t` varchar(16) DEFAULT NULL,
  `SE_HISTO_Rec_Res` int(1) DEFAULT NULL,
  `SE_HISTO_Rec_Res_t` varchar(11) DEFAULT NULL,
  `Sex` int(1) DEFAULT NULL,
  `Sex_t` varchar(6) DEFAULT NULL,
  `SMIDepth` int(1) DEFAULT NULL,
  `SMIDepth_t` varchar(3) DEFAULT NULL,
  `SurgTStage` int(1) DEFAULT NULL,
  `SurgTStage_t` varchar(11) DEFAULT NULL,
  `SurgLN` int(1) DEFAULT NULL,
  `SurgLN_t` varchar(100) DEFAULT NULL,
  `SurgM` int(1) DEFAULT NULL,
  `SurgM_t` varchar(100) DEFAULT NULL,
  `SurgicalRefBasedonHisto` int(1) DEFAULT NULL,
  `SurgicalRefBasedonHisto_t` varchar(50) DEFAULT NULL,
  `UltimateOutcome` int(1) DEFAULT NULL,
  `UltimateOutcome_t` varchar(9) DEFAULT NULL,
  `Yes_no` int(1) DEFAULT NULL,
  `Yes_no_t` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuesESD`
--

LOCK TABLES `valuesESD` WRITE;
/*!40000 ALTER TABLE `valuesESD` DISABLE KEYS */;
INSERT INTO `valuesESD` VALUES (1,1,'Observation',0,'none',1,'Aspirin',1,'Minor, no intervention',0,'None',0,'No',0,'No',0,'expanded',1,'Poorly',1,'European',1,'Tate',1,'GA',0,'None necessary',1,'LGD',1,'EGC or biopsy proven HGD/LGD',1,'Gelofusine',0,'None',1,'Hybrid',1,'cardia',1,'Is',0,'None',0,'None/Not Taken',0,'No',0,'No',1,'GIF-HQ190',1,'Cold avulsion',1,'LGD',1,'Male',1,'SM1',0,'T0',0,'N0',0,'M0',0,'no',0,'Cured',0,'No'),(2,2,'Complication',1,'surgery',2,'Clopidogrel',2,'Major, >20mg drop Hb, 2 units PRBC, hemodynamic instability',1,'Post op pain requiring analgesia',1,'MP injury',1,'Yes',1,'absolute',2,'Well',2,'Asian',2,'Lee',2,'Sedation',1,'Endoscopic clips',2,'HGD/IMC',2,'Gastric, other lesion',2,'Saline',1,'Clip',2,'Dual',2,'proximal body',2,'IIa',1,'Endoclips',1,'LGD',1,'Yes-Clip',1,'Yes (clear margins, lateral and deep)',2,'Other',2,'Snare',2,'HGD/IMC',2,'Female',2,'SM2',1,'T1',1,'N1',1,'M1',1,'no patient whishes/comorbidity althought indicated',1,'Not cured',1,'Yes'),(3,NULL,NULL,2,'radiotherapy',3,'Combo',NULL,NULL,2,'Post op infection',2,'Full thickness perforation',NULL,NULL,NULL,NULL,NULL,NULL,3,'Afro-carribean',NULL,NULL,NULL,NULL,2,'Endoscopic thermal',3,'Invasive Ca',3,'Oesophagus, Barrett\'s',NULL,NULL,2,'Coag',3,'Other',3,'distal body',3,'IIb',2,'Surgery',2,'HGD',2,'Yes-Coag',2,'Cannot be determined',NULL,NULL,3,'APC',3,'Invasive Ca',NULL,NULL,3,'SM3',2,'T2',2,'N2',NULL,NULL,2,'yes due to complications',NULL,NULL,NULL,NULL),(4,NULL,NULL,3,'chemioterapy',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Hispanic',NULL,NULL,NULL,NULL,3,'Endo injection',4,'Other',4,'Oesophagus, squamous',NULL,NULL,3,'STSC',4,'Dual-J',4,'angulus',4,'IIa+c',NULL,NULL,3,'Cancer',NULL,NULL,NULL,NULL,NULL,NULL,4,'Soft coagulation',4,'Other',NULL,NULL,NULL,NULL,3,'T3',3,'N3',NULL,NULL,3,'yes due to adverse histology (not R0)',NULL,NULL,NULL,NULL),(5,NULL,NULL,4,'radio/chemio',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Endo combo',NULL,NULL,5,'Oesophagus, other',NULL,NULL,4,'Combo',NULL,NULL,5,'antrum',5,'Ip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Combination',NULL,NULL,NULL,NULL,NULL,NULL,4,'T4',NULL,NULL,NULL,NULL,4,'yes due to adverse histology (others)',NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Angiography',NULL,NULL,6,'Submucosal lesion',NULL,NULL,5,'Adrenaline',NULL,NULL,6,'other',6,'IIa+Is',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Further ESD',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Surgery',NULL,NULL,7,'STER',NULL,NULL,NULL,NULL,NULL,NULL,7,'Duodenum',7,'SML',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,'GEJ',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,'distal oesophagus',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,'medium oesophagus',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,'proximal oesophagus',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `valuesESD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuesPOEM`
--

DROP TABLE IF EXISTS `valuesPOEM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuesPOEM` (
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
-- Dumping data for table `valuesPOEM`
--

LOCK TABLES `valuesPOEM` WRITE;
/*!40000 ALTER TABLE `valuesPOEM` DISABLE KEYS */;
INSERT INTO `valuesPOEM` VALUES (1,0,'None',1,'Achalasia type 1',1,'Dilated Oesophagus',1,'Conservative',0,'No achalasia',1,'Regurgitation',1,'Bleeding',0,'No',0,'None',0,'None',0,'0',0,'None',1,'EndoCut Q',1,'Knife',1,'Clips',1,'Male',1,'Triangle tip J'),(2,1,'Cardiovascular',2,'Achalasia type 2',2,'Resistance at COJ',2,'Needle aspiration',1,'Achalasia type 1',2,'Dysphagia',2,'Perforation',1,'Yes',1,'Occasional',1,'Occasional',1,'<5 kg',1,'Occasional',2,'Dry Cut',2,'Coagulation forceps',2,'Over the scope clip',2,'Female',2,'Dual Knife 1,5 J'),(3,2,'Respiratory',3,'Achalasia type 3',3,'Open COJ',3,'Surgery',2,'Achalasia type 2',3,'Chest pain',3,'Infection',NULL,NULL,2,'Daily',2,'Daily',2,'5-10 kg',2,'Daily',3,'EndoCut I',3,'Endoscopic clips',3,'Endoscopic suturing',NULL,NULL,3,'Triangle non J'),(4,3,'Renal',4,'EGJ outflow obstruction',4,'Oesophageal Spasm',NULL,NULL,3,'Achalasia type 3',4,'Heartburn',4,'Other',NULL,NULL,3,'With Every Meal',3,'Several times a day',3,'> 10 kg',3,'With Every Meal',NULL,NULL,4,'Interventional radiology',4,'Surgery',NULL,NULL,4,'ERBE Hybrid Knife I type'),(5,4,'Other',5,'Diffuse Oesophageal Spasm',5,'Other',NULL,NULL,4,'Diffuse oesophageal spasm',5,'Other',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Surgery',NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,6,'Jackhammer Oesophagus',NULL,NULL,NULL,NULL,5,'Jackhammer oesophagus',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,7,'Absent Contractility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,8,'Ineffective Motility',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,9,'Fragmented Peristalsis',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,10,'Normal',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `valuesPOEM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuesPolypectomyTool`
--

DROP TABLE IF EXISTS `valuesPolypectomyTool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuesPolypectomyTool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Access` int(1) DEFAULT NULL,
  `Access_t` varchar(25) DEFAULT NULL,
  `Access_weight` int(1) DEFAULT NULL,
  `Access_denominator` int(1) DEFAULT NULL,
  `Antispasmodics` int(1) DEFAULT NULL,
  `Antispasmodics_t` varchar(58) DEFAULT NULL,
  `Antispasmodics_weight` int(1) DEFAULT NULL,
  `Antispasmodics_denominator` int(1) DEFAULT NULL,
  `AnorectalJunction` int(1) DEFAULT NULL,
  `AnorectalJunction_t` varchar(192) DEFAULT NULL,
  `AnorectalJunction_weight` int(1) DEFAULT NULL,
  `AnorectalJunction_denominator` int(1) DEFAULT NULL,
  `APCTechnique` int(1) DEFAULT NULL,
  `APCTechnique_t` varchar(134) DEFAULT NULL,
  `APCTechnique_weight` int(1) DEFAULT NULL,
  `APCTechnique_denominator` int(1) DEFAULT NULL,
  `AppendicealOrfice` int(1) DEFAULT NULL,
  `AppendicealOrfice_t` varchar(316) DEFAULT NULL,
  `AppendicealOrfice_weight` int(1) DEFAULT NULL,
  `AppendicealOrfice_denominator` int(1) DEFAULT NULL,
  `AttemptBeyondCapabilities` int(1) DEFAULT NULL,
  `AttemptBeyondCapabilities_t` varchar(48) DEFAULT NULL,
  `AttemptBeyondCapabilities_weight` int(1) DEFAULT NULL,
  `AttemptBeyondCapabilities_denominator` int(1) DEFAULT NULL,
  `CauseOfBleedingIdentified` int(1) DEFAULT NULL,
  `CauseOfBleedingIdentified_t` varchar(129) DEFAULT NULL,
  `CauseOfBleedingIdentified_weight` int(1) DEFAULT NULL,
  `CauseOfBleedingIdentified_denominator` int(1) DEFAULT NULL,
  `ClipUses` int(1) DEFAULT NULL,
  `ClipUses_t` varchar(133) DEFAULT NULL,
  `ClipUses_weight` int(1) DEFAULT NULL,
  `ClipUses_denominator` int(1) DEFAULT NULL,
  `CoagForceps` int(1) DEFAULT NULL,
  `CoagForceps_t` varchar(133) DEFAULT NULL,
  `CoagForceps_weight` int(1) DEFAULT NULL,
  `CoagForceps_denominator` int(1) DEFAULT NULL,
  `ColdSnare` int(1) DEFAULT NULL,
  `ColdSnare_t` varchar(87) DEFAULT NULL,
  `ColdSnare_weight` int(1) DEFAULT NULL,
  `ColdSnare_denominator` int(1) DEFAULT NULL,
  `ColonCleanliness` int(1) DEFAULT NULL,
  `ColonCleanliness_t` varchar(20) DEFAULT NULL,
  `ColonCleanliness_weight` int(11) DEFAULT NULL,
  `ColonCleanliness_denominator` int(11) DEFAULT NULL,
  `PatientComorbidity` int(11) DEFAULT NULL,
  `PatientComorbidity_t` varchar(44) DEFAULT NULL,
  `PatientComorbidity_weight` int(11) DEFAULT NULL,
  `PatientComorbidity_denominator` int(11) DEFAULT NULL,
  `GoodResection_EnBloc` int(1) DEFAULT NULL,
  `GoodResection_EnBloc_t` varchar(88) DEFAULT NULL,
  `GoodResection_EnBloc_weight` int(1) DEFAULT NULL,
  `GoodResection_EnBloc_denominator` int(1) DEFAULT NULL,
  `GoodResection_Piecemeal` int(1) DEFAULT NULL,
  `GoodResection_Piecemeal_t` varchar(21) DEFAULT NULL,
  `GoodResection_Piecemeal_weight` int(1) DEFAULT NULL,
  `GoodResection_Piecemeal_denominator` int(1) DEFAULT NULL,
  `DiathermyApplication` int(1) DEFAULT NULL,
  `DiathermyApplication_t` varchar(50) DEFAULT NULL,
  `DiathermyApplication_weight` int(1) DEFAULT NULL,
  `DiathermyApplication_denominator` int(1) DEFAULT NULL,
  `Grade` int(1) DEFAULT NULL,
  `Grade_t` varchar(21) DEFAULT NULL,
  `HighestKudo` int(1) DEFAULT NULL,
  `HighestKudo_t` varchar(3) DEFAULT NULL,
  `HighestNICE` int(1) DEFAULT NULL,
  `HighestNICE_t` varchar(3) DEFAULT NULL,
  `ICV` int(1) DEFAULT NULL,
  `ICV_t` varchar(192) DEFAULT NULL,
  `ICV_weight` int(1) DEFAULT NULL,
  `ICV_denominator` int(1) DEFAULT NULL,
  `InjectionThroughMalignant` int(1) DEFAULT NULL,
  `InjectionThroughMalignant_t` varchar(33) DEFAULT NULL,
  `InjectionThroughMalignant_weight` int(1) DEFAULT NULL,
  `InjectionThroughMalignant_denominator` int(1) DEFAULT NULL,
  `IntramucosalBlebs` int(1) DEFAULT NULL,
  `IntramucosalBlebs_t` varchar(49) DEFAULT NULL,
  `IntramucosalBlebs_weight` int(1) DEFAULT NULL,
  `IntramucosalBlebs_denominator` int(1) DEFAULT NULL,
  `LesionPosition` int(1) DEFAULT NULL,
  `LesionPosition_t` varchar(54) DEFAULT NULL,
  `LesionPosition_weight` int(1) DEFAULT NULL,
  `LesionPosition_denominator` int(1) DEFAULT NULL,
  `LifetimeProcedures` int(1) DEFAULT NULL,
  `LifetimeProcedures_t` varchar(7) DEFAULT NULL,
  `Location` int(2) DEFAULT NULL,
  `Location_t` varchar(36) DEFAULT NULL,
  `Location_weight` int(1) DEFAULT NULL,
  `Location_denominator` int(1) DEFAULT NULL,
  `MarginTreatment` int(1) DEFAULT NULL,
  `MarginTreatment_t` varchar(128) DEFAULT NULL,
  `MarginTreatment_weight` int(1) DEFAULT NULL,
  `MarginTreatment_denominator` int(1) DEFAULT NULL,
  `MetalImplant` int(1) DEFAULT NULL,
  `MetalImplant_t` varchar(11) DEFAULT NULL,
  `MetalImplant_weight` int(1) DEFAULT NULL,
  `MetalImplant_denominator` int(1) DEFAULT NULL,
  `MildBleeding` int(1) DEFAULT NULL,
  `MildBleeding_t` varchar(66) DEFAULT NULL,
  `MildBleeding_weight` int(1) DEFAULT NULL,
  `MildBleeding_denominator` int(1) DEFAULT NULL,
  `MobilityChecks` int(1) DEFAULT NULL,
  `MobilityChecks_t` varchar(49) DEFAULT NULL,
  `MobilityChecks_weight` int(1) DEFAULT NULL,
  `MobilityChecks_denominator` int(1) DEFAULT NULL,
  `Morphology` int(1) DEFAULT NULL,
  `Morphology_t` varchar(35) DEFAULT NULL,
  `NLATreatment` int(1) DEFAULT NULL,
  `NLATreatment_t` varchar(111) DEFAULT NULL,
  `NLATreatment_weight` int(1) DEFAULT NULL,
  `NLATreatment_denominator` int(1) DEFAULT NULL,
  `No_yes` int(1) DEFAULT NULL,
  `No_yes_t` varchar(3) DEFAULT NULL,
  `No_yes_weight` int(1) DEFAULT NULL,
  `No_yes_denominator` int(1) DEFAULT NULL,
  `No_yes_notEncountered` int(1) DEFAULT NULL,
  `No_yes_notEncountered_t` varchar(25) DEFAULT NULL,
  `No_yes_notEncountered_weight` int(1) DEFAULT NULL,
  `No_yes_notEncountered_denominator` int(1) DEFAULT NULL,
  `NotControlledBleeding` int(1) DEFAULT NULL,
  `NotControlledBleeding_t` varchar(51) DEFAULT NULL,
  `NotControlledBleeding_weight` int(1) DEFAULT NULL,
  `NotControlledBleeding_denominator` int(1) DEFAULT NULL,
  `NotControlledBleeding_1` int(1) DEFAULT NULL,
  `NotControlledBleeding_1_t` varchar(97) DEFAULT NULL,
  `NotControlledBleeding_1_weight` int(1) DEFAULT NULL,
  `NotControlledBleeding_1_denominator` int(1) DEFAULT NULL,
  `OTSCTechnique` int(1) DEFAULT NULL,
  `OTSCTechnique_t` varchar(188) DEFAULT NULL,
  `OTSCTechnique_weight` int(1) DEFAULT NULL,
  `OTSCTechnique_denominator` int(1) DEFAULT NULL,
  `Paris` int(1) DEFAULT NULL,
  `Paris_t` varchar(12) DEFAULT NULL,
  `PatientPosition` int(1) DEFAULT NULL,
  `PatientPosition_t` varchar(100) DEFAULT NULL,
  `PatientPosition_weight` int(1) DEFAULT NULL,
  `PatientPosition_denominator` int(1) DEFAULT NULL,
  `Position` int(1) DEFAULT NULL,
  `Position_t` varchar(61) DEFAULT NULL,
  `Position_weight` int(1) DEFAULT NULL,
  `Position_denominator` int(1) DEFAULT NULL,
  `PriorClosure` int(1) DEFAULT NULL,
  `PriorClosure_t` varchar(64) DEFAULT NULL,
  `PriorClosure_weight` int(1) DEFAULT NULL,
  `PriorClosure_denominator` int(1) DEFAULT NULL,
  `Q11` int(1) DEFAULT NULL,
  `Q11_t` varchar(76) DEFAULT NULL,
  `Q11_weight` int(1) DEFAULT NULL,
  `Q11_denominator` int(1) DEFAULT NULL,
  `Q14` int(1) DEFAULT NULL,
  `Q14_t` varchar(17) DEFAULT NULL,
  `Q14_weight` int(1) DEFAULT NULL,
  `Q14_denominator` int(1) DEFAULT NULL,
  `Q44` int(1) DEFAULT NULL,
  `Q44_t` varchar(48) DEFAULT NULL,
  `Q44_weight` int(1) DEFAULT NULL,
  `Q44_denominator` int(1) DEFAULT NULL,
  `Q77` int(1) DEFAULT NULL,
  `Q77_t` varchar(46) DEFAULT NULL,
  `Q77_weight` int(1) DEFAULT NULL,
  `Q77_denominator` int(1) DEFAULT NULL,
  `Retroflextion` int(1) DEFAULT NULL,
  `Retroflextion_t` varchar(79) DEFAULT NULL,
  `Retroflextion_weight` int(1) DEFAULT NULL,
  `Retroflextion_denominator` int(1) DEFAULT NULL,
  `RiskOfSMIC` int(1) DEFAULT NULL,
  `RiskOfSMIC_t` varchar(29) DEFAULT NULL,
  `SecondLine` int(1) DEFAULT NULL,
  `SecondLine_t` varchar(89) DEFAULT NULL,
  `SecondLine_weight` int(1) DEFAULT NULL,
  `SecondLine_denominator` int(1) DEFAULT NULL,
  `Sex` int(11) DEFAULT NULL,
  `Sex_t` varchar(22) DEFAULT NULL,
  `ScopeChanged` int(1) DEFAULT NULL,
  `ScopeChanged_t` varchar(82) DEFAULT NULL,
  `ScopeChanged_weight` int(1) DEFAULT NULL,
  `ScopeChanged_denominator` int(1) DEFAULT NULL,
  `ScopeUsed` int(1) DEFAULT NULL,
  `ScopeUsed_t` varchar(42) DEFAULT NULL,
  `ScopeUsed_weight` int(1) DEFAULT NULL,
  `ScopeUsed_denominator` int(1) DEFAULT NULL,
  `SevereBleeding` int(1) DEFAULT NULL,
  `SevereBleeding_t` varchar(66) DEFAULT NULL,
  `SevereBleeding_weight` int(1) DEFAULT NULL,
  `SevereBleeding_denominator` int(1) DEFAULT NULL,
  `SubjectiveScore` int(1) DEFAULT NULL,
  `SubjectiveScore_t` varchar(13) DEFAULT NULL,
  `SydneyDMIScore` int(1) DEFAULT NULL,
  `SydneyDMIScore_t` varchar(133) DEFAULT NULL,
  `SydneyDMIScore_weight` int(1) DEFAULT NULL,
  `SydneyDMIScore_denominator` int(1) DEFAULT NULL,
  `SMSAAccess` int(1) DEFAULT NULL,
  `SMSAAccess_t` varchar(9) DEFAULT NULL,
  `SMSAAccess_weight` int(1) DEFAULT NULL,
  `SMSAAccess_denominator` int(1) DEFAULT NULL,
  `SMSAMorphology` int(1) DEFAULT NULL,
  `SMSAMorphology_t` varchar(12) DEFAULT NULL,
  `SMSAMorphology_weight` int(1) DEFAULT NULL,
  `SMSAMorphology_denominator` int(1) DEFAULT NULL,
  `SMSASite` int(1) DEFAULT NULL,
  `SMSASite_t` varchar(5) DEFAULT NULL,
  `SMSASite_weight` int(1) DEFAULT NULL,
  `SMSASite_denominator` int(1) DEFAULT NULL,
  `SMSASize` int(1) DEFAULT NULL,
  `SMSASize_t` varchar(13) DEFAULT NULL,
  `SMSASize_weight` int(1) DEFAULT NULL,
  `SMSASize_denominator` int(1) DEFAULT NULL,
  `SnareClosure` int(1) DEFAULT NULL,
  `SnareClosure_t` varchar(53) DEFAULT NULL,
  `SnareClosure_weight` int(1) DEFAULT NULL,
  `SnareClosure_denominator` int(1) DEFAULT NULL,
  `StopInjection` int(1) DEFAULT NULL,
  `StopInjection_t` varchar(61) DEFAULT NULL,
  `StopInjection_weight` int(1) DEFAULT NULL,
  `StopInjection_denominator` int(1) DEFAULT NULL,
  `STSC` int(1) DEFAULT NULL,
  `STSC_t` varchar(83) DEFAULT NULL,
  `STSC_weight` int(1) DEFAULT NULL,
  `STSC_denominator` int(1) DEFAULT NULL,
  `STSCTechnique` int(1) DEFAULT NULL,
  `STSCTechnique_t` varchar(132) DEFAULT NULL,
  `STSCTechnique_weight` int(1) DEFAULT NULL,
  `STSCTechnique_denominator` int(1) DEFAULT NULL,
  `TactileFeedback` int(1) DEFAULT NULL,
  `TactileFeedback_t` varchar(113) DEFAULT NULL,
  `TactileFeedback_weight` int(1) DEFAULT NULL,
  `TactileFeedback_denominator` int(1) DEFAULT NULL,
  `TTSNotUsed` int(1) DEFAULT NULL,
  `TTSNotUsed_t` varchar(145) DEFAULT NULL,
  `TTSNotUsed_weight` int(1) DEFAULT NULL,
  `TTSNotUsed_denominator` int(1) DEFAULT NULL,
  `TTSTechnique` int(1) DEFAULT NULL,
  `TTSTechnique_t` varchar(102) DEFAULT NULL,
  `TTSTechnique_weight` int(1) DEFAULT NULL,
  `TTSTechnique_denominator` int(1) DEFAULT NULL,
  `Uncertainty` int(1) DEFAULT NULL,
  `Uncertainty_t` varchar(104) DEFAULT NULL,
  `Uncertainty_weight` int(1) DEFAULT NULL,
  `Uncertainty_denominator` int(1) DEFAULT NULL,
  `Yes_no_notReq` int(1) DEFAULT NULL,
  `Yes_no_notReq_t` varchar(44) DEFAULT NULL,
  `Yes_no_notReq_weight` int(1) DEFAULT NULL,
  `Yes_no_notReq_denominator` int(1) DEFAULT NULL,
  `Yes_no` int(1) DEFAULT NULL,
  `Yes_no_t` varchar(3) DEFAULT NULL,
  `Yes_no_weight` int(1) DEFAULT NULL,
  `Yes_no_denominator` int(1) DEFAULT NULL,
  `Yes_no_required` int(1) DEFAULT NULL,
  `Yes_no_required_t` varchar(44) DEFAULT NULL,
  `Yes_no_required_weight` int(1) DEFAULT NULL,
  `Yes_no_required_denominator` int(1) DEFAULT NULL,
  `Yes_no_notOccur` int(1) DEFAULT NULL,
  `Yes_no_notOccur_t` varchar(45) DEFAULT NULL,
  `Yes_no_notOccur_weight` int(1) DEFAULT NULL,
  `Yes_no_notOccur_denominator` int(1) DEFAULT NULL,
  `Yes_no_addweight` int(1) DEFAULT NULL,
  `Yes_no_addweight_t` varchar(3) DEFAULT NULL,
  `Yes_no_addweight_weight` int(1) DEFAULT NULL,
  `Yes_no_addweight_denominator` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuesPolypectomyTool`
--

LOCK TABLES `valuesPolypectomyTool` WRITE;
/*!40000 ALTER TABLE `valuesPolypectomyTool` DISABLE KEYS */;
INSERT INTO `valuesPolypectomyTool` VALUES (1,1,'Unresolved looping',0,1,0,'not required',0,0,1,'Uses a distal attachment to aid lesion assessment and resection ',1,5,1,'Extending the tip of the catheter 1-2mm beyond tip of the endoscope',1,6,1,'Considers risk factors for failed endoscopic resection and if encountered considers not attempting [/terminating the attempt] [invasion of the lesion beyond the endoscopic view into the appendiceal orifice, >50% circumferential involvement of the appendiceal orifice] except where there was a previous appendicectomy',2,5,1,'Lesion within capabilities',0,0,0,'No intraprocedural bleeding occurred',0,0,0,'Attempts to use more resource intensive techniques first [over the scope clip, surgery]',0,1,1,'Switches instrument to a coagulation forceps (coag-grasper)',1,5,0,'no',1,1,1,'BBPS 6',1,1,1,'ASA 1',1,1,1,'Guides the snare carefully over the lesion for resection',1,4,1,'1',1,1,1,'Wait 2 seconds then close snare slowly to the mark',1,1,1,'Consutant endoscopist',1,'I',1,'I',1,'Use a distal attachment to aid lesion assessment and resection',1,5,0,'Not malignant',0,0,0,'None',0,1,0,'Lesion at 3-7 o’clock position',1,1,1,'&lt;25',1,'rectum (&lt;5cm from anus)',3,3,1,'Only after all visible polyp has been removed from the margin',1,3,0,'no',0,1,1,'Immediately requests coagulation forceps',0,1,0,'Never',0,2,1,'Granular',1,'Switches to a stiff wire snare to attempt tissue capture [and is successful]',2,2,0,'no',1,1,0,'No',1,1,0,'No bleeding',0,0,1,'Considers the use of Hemospray [if active bleeding] or a a topical hemostatic gel (e.g. Purastat)',1,1,1,'introduction of the lateral edges of the perforation into the cap using an instrument e.g. twin grasper rather than aspiration due to the risk of fistula formation with adjacent structures',2,2,1,'Is',1,'Yes',1,1,0,'No',0,2,0,'Not appropriate',2,2,1,'Inaccurate size estimation and does not examine full extent of the lesion',0,2,0,'no',0,1,1,'Far from the endoscope and not always visualised',0,2,1,'Not necessary, Type 0 or 1, correctly judged',1,1,0,'Not required / would not help',0,0,1,'Definitely no',1,'Second procedure at an interval',1,1,1,'Male',0,'Not required',0,0,0,'not required',0,0,1,'starts with a coagulation forceps',1,1,1,'Very negative',0,'No attempt at scoring is made / there is no knowledge of a validated scoring system to assess injury to the muscularis propria at EMR',0,2,0,'Easy',1,3,1,'Pedunculated',1,3,1,'Right',1,2,1,'&lt;10 mm',1,9,0,'No, gives no instructions and does not take the snare',0,2,0,'Required but not stopped',0,1,1,'Use the tip of the snare to apply light pressure precisely over the bleeding point',1,3,1,'Extending the tip of the snare 1-2mm beyond the catheter sheath',1,6,0,'If there is concern for too much tissue captured the snare is released and reclosed',1,1,0,'Considers another endoscopic technique [e.g. endoloop assisted closure, over the scope clip] or consulting a more experienced colleague / trainer',1,1,0,'no TTS placed',0,0,1,'Topical application of the injectate (containing a chromic dye) can allow determination of the DMI score',1,1,0,'No',0,1,0,'No',0,1,0,'yes',1,1,0,'No',0,1,0,'No',0,0),(2,2,'Looping but resolved',1,1,1,'No , but it would have been helpful (no controindications)',0,1,2,'Uses a small snare to commence resection after injection at the anal verge',1,5,2,'Use the scope and the APC catheter as one devicedon\'t move the catheter in and out of the channel] ',1,6,2,'Uses a small, stiff snare at this location',1,5,2,'Lesion outside capabilities, attempts anyway',0,1,1,'Uses the endoscope flushing pump / water flush to identify the exact place where bleeding is occurring within the mucosal defect ',1,1,1,'Attempts to use more resource intensive techniques first [over the scope clip, surgery] [this is judged appropriate by the assessor ]',1,1,2,'Precisely captures the responsible vessel is with the forceps',1,5,1,'Yes – this occurs more than once in a piecemeal EMR or occurs in an en bloc EMR attempt',0,1,2,'BBPS 6-8',2,2,2,'ASA 2',1,1,2,'Selects an appropriate snare size for the lesion',1,4,2,'Does not do the above',0,1,2,'This did not occur during this specific procedure',0,0,2,'Trainee',2,'II',2,'II',2,'Considers risk factors for failed endoscopic resection and if encountered considers not attempting [/terminating the attempt] [deep ingrowth into the ileum, involvement of all lips of the ICV]',1,5,1,'Malignant and injected',0,1,1,'Puncture them and re-attempt submucosal injection',1,1,1,'Lesion in other position and impossible to rotate',2,2,2,'25-50',2,'rectum (&gt;5cm from anus)',2,2,2,'A thermal ablation technique (e.g. snare tip soft coagulation, ERBE Effect 4 80 W or APC) should be applied to the entire margin',1,3,1,'yes',1,1,2,'Immediately requests a hemostatic clip',0,1,1,'Once or twice during the procedure but not always',1,2,2,'Non-Granular',2,'Applies ablative technique without an attempt to physically remove non-lifting tissue',0,2,1,'yes',0,1,1,'Yes',0,1,1,'considers mechanical control with hemostatic clips ',1,1,2,'Does not consider these methods',0,1,NULL,NULL,NULL,NULL,2,'Iia',2,'Does not consider the effect of gravity on bleeding despite the fact that this may have been helpful',0,1,1,'Yes, sigmoid, descending, splenic flexure and caecal pole RLL',1,2,1,'Does not attempt to complete the resection',0,2,2,'Accurately determines size but does not fully determine extent of the lesion',1,2,1,'yes',1,1,2,'Far from the endoscope and constantly visualised',2,2,2,'Not necessary, Type 0 or 1, incorrectly judged',0,1,1,'Uses retroflexion to assist access successfully',1,1,2,'Low confidence but likely no',2,'Second procedure by a more experienced endoscopist at an interval',1,1,2,'Female',1,'Tries a paediatric colonoscope for difficulty angulation',1,1,1,'uses',1,1,2,'starts with snare tip soft coagulation (STSC) [ERBE Effect 4, 80W]',0,1,2,'Negative',1,'Not correctly but an attempt at scoring is made',1,2,1,'Difficult',3,3,2,'Sessile',2,3,2,'Left',2,2,2,'10-19 mm',3,9,1,'Yes, takes the snare but does not close to 1cm',1,2,1,'Yes, recognizes likely transmural / intraperitoneal injection',1,1,2,'Applies diathermy for 1-2 seconds.  Then lifts the snare to re-assess bleeding',1,3,2,'Use the scope and the snare tip as one devicedon\'t move the catheter in and out of the channel] ',1,6,1,'Transection using diathermy is performed without checking tactile feedback or heeding the advice of the assistant',0,1,1,'Immediately suggests surgery is required',0,1,1,'Uses the effect of gravity to prevent obstruction of subsequent clip placement by those already placed',1,4,2,'Any areas suspicious for DMI II-V are closed with an appropriate closure technique',1,1,1,'Yes',1,1,1,'Yes',1,1,1,'no not required',0,0,1,'Yes',1,1,1,'Yes',2,2),(3,3,'Insertion without looping',0,0,2,'yes',1,1,3,'Use local anaesthetic (e.g. 1% lidocaine, 50:50 with submucosal injectate, maximum 20mls) as part of the injectate in this area to provide analgesia after the procedure with ECG/EKG monitoring',1,5,3,'Apply pulses of APC without touching the mucosa to the margin of the defect',1,6,3,'Works onto the non-lifting area at the AO from the lifting tissue surrounding',2,5,3,'Lesion outside capabilities, refers to colleague',1,1,2,'Does not accurately identify the source of bleeding within the mucosal defect',0,1,2,'Yes',1,1,3,'Checks for cessation of bleeding. If not noted repeats the attempt the capture the vessel [rather than continuing to apply diathermy]',1,5,NULL,NULL,NULL,NULL,3,'BBPS =9',1,1,3,'ASA 3',2,2,3,'Does not perform en bloc resection &gte;20mm in the right colon and 25mm in the left',1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'III',3,'III',3,'Starts by using dynamic injection to encourage the ileal margin of the lesion into the colonic lumen',1,5,2,'Does not inject because malignant',1,1,NULL,NULL,NULL,NULL,2,'Lesion in other position and no attempt made to rotate',0,1,3,'50-100',3,'sigmoid',2,2,3,'The thermal ablation technique should be applied only to tissue with a prior submucosal injection to ensure safety',1,3,2,'not implant',0,0,3,'Starts with snare tip soft coagulation (STSC) [ERBE Effect 4, 80W]',1,1,2,'Always',2,2,3,'Mixed',3,'Uses cold avulsion (using a standard biopsy forceps)',1,2,NULL,NULL,NULL,NULL,2,'Situation not encountered',0,0,2,'considers non-endoscopic technique prior to clips',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'IIb',NULL,NULL,NULL,NULL,2,'Yes, hepatic flexure and ascending LL',1,2,2,'Attempts to complete the resection',1,2,3,'Accurately determines both',2,2,2,'en-bloc resection',0,0,3,'Close to the endoscope and not always visualised',0,1,3,'Necessary, Type II-V, incorrectly judged',0,1,2,'Uses retroflexion and cannot achieve / does not use when would have been useful',0,1,3,'Low confidence but likely yes',3,'Endoscopic Full-Thickness Resection with endoscopic full-thickness resection device (FTRD',1,1,NULL,NULL,2,'Tries a gastroscope for retroflexion in the left colon or rectum',1,1,2,'not available',1,1,NULL,NULL,NULL,NULL,3,'Neutral',2,'Correctly',2,2,NULL,NULL,NULL,NULL,3,'Flat',3,3,NULL,NULL,NULL,NULL,3,'20-29 mm',5,9,2,'Yes, takes the snare and closes to 1cm',2,2,NULL,NULL,NULL,NULL,3,'After 3 applications if the technique is not effective requests coagulation forceps',1,3,3,'Apply pulses of soft coagulation using a light touch technique to the margin of the defect',1,6,2,'No concern for excessive tissue capture',0,0,NULL,NULL,NULL,NULL,2,'Starts on an area of normal tissue if possible [not directly on the perforation]',1,4,3,'Visualisation of a mucosal defect over a fold or at a flexure should be using a distal attachment',1,1,2,'Not relevant to this procedure',0,0,NULL,NULL,NULL,NULL,2,'Required but not used',0,1,2,'This did not occur in this specific procedure',0,0,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Considers antibiotic prophylaxis since the drainage of this site is directly into the systemic circulation',1,5,4,'Aim for a 1-2mm rim of treated tissue at the margin',1,6,4,'Terminates the attempt',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Tents the vessel away from the deeper structures before diathermy is applied',1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'ASA 4',2,2,4,'Ensures visualisation whilst closing the snare to achieve en bloc resection',1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'IV',NULL,NULL,4,'Starts resection from this margin',1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'100-200',4,'descending colon',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Unable to classify',4,'then applies thermal ablation using soft coagulation [ERBE effect 4 80 W] using the snare tip and is successful',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'IIc or IIa+c',NULL,NULL,NULL,NULL,3,'Yes, transverse colon S',1,2,3,'Fails to clear the polyp tissue surrounding the perforation',0,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Close to the endoscope and constantly visualised',1,1,4,'Necessary, Type II-V, correctly judged',1,1,NULL,NULL,NULL,NULL,4,'Definitely yes',4,'Underwater EMR',1,1,NULL,NULL,3,'Tries a balloon-enteroscope for difficulty accessing the lesion in the right colon',1,1,3,'Not used even if it would have been useful',0,1,NULL,NULL,NULL,NULL,4,'Positive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'30-39 mm',7,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'If diathermy is applied for too long, more than 3 applications are required etc',0,3,4,'Aim for a 1-2mm rim of treated tissue at the margin',1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,'Proceeds along the axis of the perforation to achieve a zipper type closure',1,4,4,'Photodocumentation should be made of all areas of the post ER defect',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Considers prescription of stool softeners for the following 2 weeks after EMR at this location',1,5,5,'Ensure that the margin is ablated around the full circumference without gaps',1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Applies diathermy for 1-2 seconds prior to opening the forceps and checking whether bleeding has caesed',1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'V',NULL,NULL,5,'Uses a small, stiff snare to start the resection at the ileal margin',1,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'&gt;200',5,'splenic flexure',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Consistent with Serrated Morphology',5,'Uses hot avulsion by tenting tissue away',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'III',NULL,NULL,NULL,NULL,4,'Yes, difficuly sigmoid in overweight patient P',1,2,4,'Successfully clears the polyp tissue surrounding the perforation',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Surgery - if a default to surgery approach taken',0,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Very positive',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'≥40 mm',9,9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,5,'Ensure that the margin is ablated around the full circumference without',1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,'Uses suction of luminal gas to increase the amount of tissue captured',1,4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Confirmation of complete application of the technique is endoscopic identifying the ablated appearance of the mucosa after application',1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Requests a hemostatic clip prior to an attempt with the coagulation forceps',0,5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Terminates the attempt',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'transverse distal',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'then applying thermal energy and is successful',1,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'IIa+Is',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Surgery - if all other options considered no possible or applicable',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,6,'Confirmation of complete application of the technique is endoscopic identifying the white appearance of the mucosa after application',1,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Starts on an area of normal tissue is not possible [directly on the perforation]',1,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,'transverse middle',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,7,'Ip',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,'transverse proximal',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,9,'hepatic flexure',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,'ascending colon',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,11,'caecum',2,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,'caecum, ileocaecal valve involved',3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,'caecum, appendiceal orifice involved',3,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `valuesPolypectomyTool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valuesercp`
--

DROP TABLE IF EXISTS `valuesercp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valuesercp` (
  `﻿id` int(11) NOT NULL AUTO_INCREMENT,
  `karnofsky` int(11) DEFAULT NULL,
  `karnofsky_t` text COLLATE utf8_bin DEFAULT NULL,
  `WHO` int(11) DEFAULT NULL,
  `WHO_t` text COLLATE utf8_bin DEFAULT NULL,
  `indication` int(11) DEFAULT NULL,
  `indication_t` text COLLATE utf8_bin DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `location_t` text COLLATE utf8_bin DEFAULT NULL,
  `bismuth` bigint(20) DEFAULT NULL,
  `bismuth_t` text COLLATE utf8_bin DEFAULT NULL,
  `gradedifficultyERCP` bigint(20) DEFAULT NULL,
  `gradedifficultyERCP_t` text COLLATE utf8_bin DEFAULT NULL,
  `previousfailedERCP` bigint(20) DEFAULT NULL,
  `previousfailedERCP_t` text COLLATE utf8_bin DEFAULT NULL,
  `informedconsent` bigint(20) DEFAULT NULL,
  `informedconsent_t` text COLLATE utf8_bin DEFAULT NULL,
  `antibiotics` bigint(20) DEFAULT NULL,
  `antibiotics_t` text COLLATE utf8_bin DEFAULT NULL,
  `anticoagulants` bigint(20) DEFAULT NULL,
  `anticoagulants_t` text COLLATE utf8_bin DEFAULT NULL,
  `pancreatitisprevention` text COLLATE utf8_bin DEFAULT NULL,
  `pancreatitisprevention_t` text COLLATE utf8_bin DEFAULT NULL,
  `yearlyERCPvolumeCenter` int(11) DEFAULT NULL,
  `yearlyERCPvolumeCenter_t` text COLLATE utf8_bin DEFAULT NULL,
  `yearlyERCPvolumeEndoscopist` int(11) DEFAULT NULL,
  `yearlyERCPvolumeEndoscopist_t` text COLLATE utf8_bin DEFAULT NULL,
  `positioninfrontofpapilla` text COLLATE utf8_bin DEFAULT NULL,
  `positioninfrontofpapilla_t` text COLLATE utf8_bin DEFAULT NULL,
  `positionERCPscope_t` text COLLATE utf8_bin DEFAULT NULL,
  `positionERCPscope` text COLLATE utf8_bin DEFAULT NULL,
  `nativepapilla` text COLLATE utf8_bin DEFAULT NULL,
  `nativepapilla_t` text COLLATE utf8_bin DEFAULT NULL,
  `duodenaldiverticulum` text COLLATE utf8_bin DEFAULT NULL,
  `duodenaldiverticulum_t` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileductindicated` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileductindicated_t` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileduct` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationbileduct_t` text COLLATE utf8_bin DEFAULT NULL,
  `biliarypapillotomy` text COLLATE utf8_bin DEFAULT NULL,
  `biliarypapillotomy_t` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsungindicated` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsungindicated_t` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsung` text COLLATE utf8_bin DEFAULT NULL,
  `cannulationwirsung_t` text COLLATE utf8_bin DEFAULT NULL,
  `pancreaticpapillotomy` text COLLATE utf8_bin DEFAULT NULL,
  `pancreaticpapillotomy_t` text COLLATE utf8_bin DEFAULT NULL,
  `contrastwirsung` text COLLATE utf8_bin DEFAULT NULL,
  `constrastwirsung_t` text COLLATE utf8_bin DEFAULT NULL,
  `difficultcannulationapproach` int(11) DEFAULT NULL,
  `difficultcannulationapproach_t` text COLLATE utf8_bin DEFAULT NULL,
  `lithiasispresent` text COLLATE utf8_bin DEFAULT NULL,
  `lithiasispresent_t` text COLLATE utf8_bin DEFAULT NULL,
  `lithiasisremoved` text COLLATE utf8_bin DEFAULT NULL,
  `lithiasisremoved_t` text COLLATE utf8_bin DEFAULT NULL,
  `indicationstenting` text COLLATE utf8_bin DEFAULT NULL,
  `indicationstenting_t` text COLLATE utf8_bin DEFAULT NULL,
  `stenting` text COLLATE utf8_bin DEFAULT NULL,
  `stenting_t` text COLLATE utf8_bin DEFAULT NULL,
  `stentinglocation` text COLLATE utf8_bin DEFAULT NULL,
  `stentinglocation_t` text COLLATE utf8_bin DEFAULT NULL,
  `brushing` text COLLATE utf8_bin DEFAULT NULL,
  `brushing_t` text COLLATE utf8_bin DEFAULT NULL,
  `dilatation` text COLLATE utf8_bin DEFAULT NULL,
  `dilatation_t` text COLLATE utf8_bin DEFAULT NULL,
  `perproceduraladverseevents` text COLLATE utf8_bin DEFAULT NULL,
  `perproceduraladverseevents_t` text COLLATE utf8_bin DEFAULT NULL,
  `bleedingtreatment` int(11) DEFAULT NULL,
  `bleedingtreatment_t` text COLLATE utf8_bin DEFAULT NULL,
  `hemostasis` text COLLATE utf8_bin DEFAULT NULL,
  `hemostasis_t` text COLLATE utf8_bin DEFAULT NULL,
  `perforationtype` text COLLATE utf8_bin DEFAULT NULL,
  `perforationtype_t` text COLLATE utf8_bin DEFAULT NULL,
  `perforationtreatment` text COLLATE utf8_bin DEFAULT NULL,
  `perforationtreatment_t` text COLLATE utf8_bin DEFAULT NULL,
  `latecomplications` text COLLATE utf8_bin DEFAULT NULL,
  `latecomplications_t` text COLLATE utf8_bin DEFAULT NULL,
  `severitypancreatitis` text COLLATE utf8_bin DEFAULT NULL,
  `severitypancreatitis_t` text COLLATE utf8_bin DEFAULT NULL,
  `technicalsuccess` text COLLATE utf8_bin DEFAULT NULL,
  `technicalsuccess_t` text COLLATE utf8_bin DEFAULT NULL,
  `clinicalsucces` text COLLATE utf8_bin DEFAULT NULL,
  `clinicalsucces_t` text COLLATE utf8_bin DEFAULT NULL,
  `additionaltreatmentneeded` text COLLATE utf8_bin DEFAULT NULL,
  `additionaltreatmentneeded_t` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`﻿id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valuesercp`
--

LOCK TABLES `valuesercp` WRITE;
/*!40000 ALTER TABLE `valuesercp` DISABLE KEYS */;
INSERT INTO `valuesercp` VALUES (1,0,'90-100%',0,'fully active',0,'biliary stones',0,'distal',0,'bismuth 3a',0,'grade 1',0,'no',0,'no',0,'no',0,'aspirine','0','none',0,'<50',0,'<20','0','stable','0','long','0','no','0','no','0','no','0','no','0','no','0','no','0','no','0','no','0','no',0,'none','0','no','0','no','0','no','0','metallic','','infrahilar','0','no','0','no','0','none',0,'ballooncompression','0','no','0','type 1','0','endoscopic','0','pancreatitis','0','mild','0','no','0','no','0','PTC'),(2,1,'70-80%',1,'no heavy physical work',1,'pancreatic stones',1,'infrahilar',1,'bismuth 3b',1,'grade 2',1,'yes',1,'yes',1,'yes',1,'clopidogrel','1','NSAID',1,'50-100',1,'20-50','1','instable','1','short','1','yes','1','yes','1','yes','1','yes','1','yes','1','yes','1','yes','1','yes','1','yes',1,'precut ','1','yes','1','complete','1','yes','1','plastic','','unilateral','1','yes','1','succesful','1','bleeding',1,'epinephrine','1','yes','1','type 2','1','surgery','1','perforation','1','moderate','1','yes','1','yes','1','surgery'),(3,2,'50-60%',2,'more than 50% active, not well enough to work',2,'benign stenosis',2,'hilar',2,'bismuth 4',2,'grade 3',0,'',0,'',0,'',2,'oral anticoagulants','2','wirsungstent',2,'100-200',2,'50-100','2','impossible','','','','','','','','','','','','','','','','','','','','',2,'double wire technique','','','2','incomplete','','','2','multiple plastic','','bilateral','','','2','attempted, not succesful','2','perforation',2,'clipping','','','2','type 3','2','conservative','2','bleeding','2','severe','','','','','2','redo-ERCP'),(4,3,'30-40%',3,'in bed/chair most of the day',3,'bile leak',3,'intrahepatic',0,'',3,'grade 4',0,'',0,'',0,'',3,'other','3','NSAID and wirsungstent',3,'200-300',3,'100-200','','','','','','','','','','','','','','','','','','','','','','',3,'rendez-vous procedure','','','','','','','','','','','','','','','','',3,'coagulation','','','3','type 4','','','3','cholangitis','','','','','','','',''),(5,4,'10-20%',4,'in bed/chair all the time',4,'pancreatic duct laceration',4,'hilar and intrahepatic',0,'',0,'',0,'',0,'',0,'',0,'','','',4,'>300',4,'>200','','','','','','','','','','','','','','','','','','','','','','',4,'combination','','','','','','','','','','','','','','','','',4,'hemospray','','','','','','','','','','','','','','','',''),(6,NULL,NULL,NULL,'',5,'anastomotic stricture ',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',4,'>200','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',5,'stenting','','','','','','','','','','','','','','','',''),(7,NULL,NULL,NULL,'',6,'ampullary stenosis',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',6,'embolisation','','','','','','','','','','','','','','','',''),(8,NULL,NULL,NULL,'',7,'stent dysfunction',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',7,'surgery','','','','','','','','','','','','','','','',''),(9,NULL,'',0,'',8,'ampulloma',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(10,NULL,'',0,'',9,'primary sclerosing cholangitis',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(11,NULL,'',0,'',10,'cholangiocarcinoma',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(12,NULL,'',0,'',11,'pancreatic carcinoma',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(13,NULL,'',0,'',12,'metastasis',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(14,NULL,'',0,'',13,'gallblader carcinoma',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','',''),(15,NULL,'',0,'',14,'Mirizzi syndrome',0,'',0,'',0,'',0,'',0,'',0,'',0,'','','',0,'',0,'','','','','','','','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','',0,'','','','','','','','','','','','','','','','','');
/*!40000 ALTER TABLE `valuesercp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-18 12:46:14
