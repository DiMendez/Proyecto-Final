-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: PROFIN
-- ------------------------------------------------------
-- Server version	5.6.30-0ubuntu0.15.10.1

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
-- Table structure for table `ALUMNO`
--

DROP TABLE IF EXISTS `ALUMNO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ALUMNO` (
  `USUARIO_NO` varchar(9) NOT NULL DEFAULT '',
  `GRADO` varchar(3) DEFAULT NULL,
  `ALUMNO_NOMBRE` varchar(25) DEFAULT NULL,
  `ALUMNO_BUENAS` int(11) DEFAULT NULL,
  `ALUMNO_PUNT` int(11) DEFAULT NULL,
  `ALUMNO_STYLE` char(7) DEFAULT NULL,
  `ALUMNO_FECHA` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`USUARIO_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ALUMNO`
--

LOCK TABLES `ALUMNO` WRITE;
/*!40000 ALTER TABLE `ALUMNO` DISABLE KEYS */;
/*!40000 ALTER TABLE `ALUMNO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ASIGNACION`
--

DROP TABLE IF EXISTS `ASIGNACION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ASIGNACION` (
  `USUARIO_NO` varchar(9) NOT NULL DEFAULT '',
  `MATERIA_NO` char(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`USUARIO_NO`,`MATERIA_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ASIGNACION`
--

LOCK TABLES `ASIGNACION` WRITE;
/*!40000 ALTER TABLE `ASIGNACION` DISABLE KEYS */;
/*!40000 ALTER TABLE `ASIGNACION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COLEGIO`
--

DROP TABLE IF EXISTS `COLEGIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COLEGIO` (
  `COLEGIO_NO` int(11) NOT NULL DEFAULT '0',
  `USUARIO_NO` varchar(9) DEFAULT NULL,
  `COLEGIO_NOMBRE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`COLEGIO_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COLEGIO`
--

LOCK TABLES `COLEGIO` WRITE;
/*!40000 ALTER TABLE `COLEGIO` DISABLE KEYS */;
/*!40000 ALTER TABLE `COLEGIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MATERIAS`
--

DROP TABLE IF EXISTS `MATERIAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MATERIAS` (
  `MATERIA_NO` char(4) NOT NULL DEFAULT '',
  `GRADO` varchar(3) DEFAULT NULL,
  `COLEGIO_NO` int(11) DEFAULT NULL,
  `MATERIA_NOMBRE` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`MATERIA_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MATERIAS`
--

LOCK TABLES `MATERIAS` WRITE;
/*!40000 ALTER TABLE `MATERIAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `MATERIAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PREGUNTAS`
--

DROP TABLE IF EXISTS `PREGUNTAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PREGUNTAS` (
  `MATERIA_NO` char(4) DEFAULT NULL,
  `UNIDAD_NO` int(11) DEFAULT NULL,
  `PREGUNTA_NOMBRE` varchar(200) DEFAULT NULL,
  `PREGUNTA_MEDIA` varchar(200) DEFAULT NULL,
  `PREGUNTA_OPCION1` varchar(200) DEFAULT NULL,
  `PREGUNTA_OPCION2` varchar(200) DEFAULT NULL,
  `PREGUNTA_OPCION3` varchar(200) DEFAULT NULL,
  `PREGUNTA_OPCION4` varchar(200) DEFAULT NULL,
  `PREGUNTA_RESPUESTA` tinyint(4) DEFAULT NULL,
  `PREGUNTA_XCONFIRMAR` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PREGUNTAS`
--

LOCK TABLES `PREGUNTAS` WRITE;
/*!40000 ALTER TABLE `PREGUNTAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `PREGUNTAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PROFESOR`
--

DROP TABLE IF EXISTS `PROFESOR`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PROFESOR` (
  `USUARIO_NO` varchar(9) NOT NULL DEFAULT '',
  `PROFESOR_NOMBRE` varchar(25) DEFAULT NULL,
  `PROFESOR_FECHA` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`USUARIO_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PROFESOR`
--

LOCK TABLES `PROFESOR` WRITE;
/*!40000 ALTER TABLE `PROFESOR` DISABLE KEYS */;
/*!40000 ALTER TABLE `PROFESOR` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UNIDAD`
--

DROP TABLE IF EXISTS `UNIDAD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UNIDAD` (
  `MATERIA_NO` char(4) NOT NULL DEFAULT '',
  `UNIDAD_NO` int(11) NOT NULL DEFAULT '0',
  `UNIDAD_NOMBRE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`MATERIA_NO`,`UNIDAD_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UNIDAD`
--

LOCK TABLES `UNIDAD` WRITE;
/*!40000 ALTER TABLE `UNIDAD` DISABLE KEYS */;
/*!40000 ALTER TABLE `UNIDAD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO`
--

DROP TABLE IF EXISTS `USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO` (
  `USUARIO_NO` varchar(9) NOT NULL DEFAULT '',
  `USUARIO_HSP` char(10) DEFAULT NULL,
  `USUARIO_TIPO` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`USUARIO_NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO`
--

LOCK TABLES `USUARIO` WRITE;
/*!40000 ALTER TABLE `USUARIO` DISABLE KEYS */;
/*!40000 ALTER TABLE `USUARIO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `VISITAS`
--

DROP TABLE IF EXISTS `VISITAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `VISITAS` (
  `VISITAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `VISITAS`
--

LOCK TABLES `VISITAS` WRITE;
/*!40000 ALTER TABLE `VISITAS` DISABLE KEYS */;
/*!40000 ALTER TABLE `VISITAS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-25 14:22:55
