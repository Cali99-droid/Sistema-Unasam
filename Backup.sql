-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: alumnos
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumno` (
  `idAlumno` int NOT NULL AUTO_INCREMENT,
  `codigo_alumno` varchar(25) DEFAULT NULL,
  `idPersona` int NOT NULL,
  `idEscuela` int NOT NULL,
  `idProcedencia` int NOT NULL,
  `idCondicionEconomica` int NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `Persona_idx` (`idPersona`),
  KEY `Escuela1_idx` (`idEscuela`),
  KEY `Procedencia1_idx` (`idProcedencia`),
  KEY `CondicionEconomica1_idx` (`idCondicionEconomica`),
  CONSTRAINT `CondicionEconomica1` FOREIGN KEY (`idCondicionEconomica`) REFERENCES `condicion_economica` (`idCondicionEconomica`),
  CONSTRAINT `Escuela1` FOREIGN KEY (`idEscuela`) REFERENCES `escuela` (`idEscuela`),
  CONSTRAINT `Persona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `Procedencia1` FOREIGN KEY (`idProcedencia`) REFERENCES `procedencia` (`idProcedencia`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'171.2506.025',1,3,3,2),(2,'132.567.892',2,1,2,1),(3,'161.2305.048',3,4,1,3),(4,'132.567.894',6,1,6,1),(5,'132.567.850',7,2,7,1),(6,'172.007.894',8,1,8,1),(7,'132.567.8177',9,6,9,3),(8,'132.007.894',10,1,10,1),(9,'122.567.823',11,6,11,2),(10,'132.007.894',13,1,13,4),(11,'132.567.894',14,1,14,4),(12,'111.567.817',17,1,15,3),(13,'132.567.178',18,1,16,3);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumnogrupo`
--

DROP TABLE IF EXISTS `alumnogrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alumnogrupo` (
  `idAlumnoGrupo` int NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `idAlumno` int NOT NULL,
  `idgrupo_universitario` int NOT NULL,
  PRIMARY KEY (`idAlumnoGrupo`),
  KEY `Alumno1_idx` (`idAlumno`),
  KEY `GRUPO_UNIVERSITARIO1_idx` (`idgrupo_universitario`),
  CONSTRAINT `Alumno1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idAlumno`),
  CONSTRAINT `GRUPO_UNIVERSITARIO1` FOREIGN KEY (`idgrupo_universitario`) REFERENCES `grupo_universitario` (`idgrupo_universitario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnogrupo`
--

LOCK TABLES `alumnogrupo` WRITE;
/*!40000 ALTER TABLE `alumnogrupo` DISABLE KEYS */;
INSERT INTO `alumnogrupo` VALUES (1,'2021-08-17','Activo',2,5),(2,'2021-08-20','Activo',1,5),(3,'2017-06-16','Activo',3,8),(4,'2021-08-17','Activo',4,9),(5,'2021-10-30','Inactivo',5,9),(6,'2021-08-17','Activo',6,9),(7,'2021-08-21','Activo',7,5),(8,'2021-10-30','Inactivo',8,9),(9,'2021-08-16','Activo',8,5),(10,'2021-08-17','Activo',7,9),(11,'2021-08-17','Activo',9,5),(12,'2021-11-04','Activo',11,32),(13,'2021-11-03','Activo',12,33),(14,'2021-11-04','Activo',13,34);
/*!40000 ALTER TABLE `alumnogrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficio`
--

DROP TABLE IF EXISTS `beneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficio` (
  `idBeneficio` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idBeneficio`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio`
--

LOCK TABLES `beneficio` WRITE;
/*!40000 ALTER TABLE `beneficio` DISABLE KEYS */;
INSERT INTO `beneficio` VALUES (1,'Descuento de Matricula '),(2,'Descuento en CID'),(3,'Comedor Gratis'),(4,'Beneficio nuevo'),(5,'Beneficio nuevo'),(6,'Beneficio nuevo'),(7,'Beneficio edt'),(8,'bb'),(9,'bb'),(10,'bb'),(11,'benee'),(12,'Nuevo beneficio'),(13,'Aprobar en progra '),(14,'Descuento Matrícula'),(15,'depor'),(16,'depor'),(17,'Descuento Matrícula'),(18,'Descuento Matrícula'),(19,'Beneficio 1'),(20,'Beneficio 2'),(21,'Beneficio 3'),(22,'Beneficio 4 '),(23,'Beneficio 5'),(24,'Beneficio 6'),(25,'Beneficio 7'),(26,'Beneficio 8');
/*!40000 ALTER TABLE `beneficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficioalumno`
--

DROP TABLE IF EXISTS `beneficioalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficioalumno` (
  `idBeneficioalumno` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `idAlumnoGrupo` int NOT NULL,
  `fechefec` date DEFAULT NULL,
  `idBeneficioxtipGrupo` int NOT NULL,
  `idSemestre` int DEFAULT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idBeneficioalumno`),
  KEY `AlumnoGrupo2_idx` (`idAlumnoGrupo`),
  KEY `BeneficioxtipGrupo1_idx` (`idBeneficioxtipGrupo`),
  KEY `Semestre1_idx` (`idSemestre`),
  KEY `Usuario3_idx` (`idUsuario`),
  CONSTRAINT `AlumnoGrupo2` FOREIGN KEY (`idAlumnoGrupo`) REFERENCES `alumnogrupo` (`idAlumnoGrupo`),
  CONSTRAINT `BeneficioxtipGrupo1` FOREIGN KEY (`idBeneficioxtipGrupo`) REFERENCES `beneficioxtipgrupo` (`idBeneficioxtipGrupo`),
  CONSTRAINT `Semestre1` FOREIGN KEY (`idSemestre`) REFERENCES `semestre` (`idSemestre`),
  CONSTRAINT `Usuario3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficioalumno`
--

LOCK TABLES `beneficioalumno` WRITE;
/*!40000 ALTER TABLE `beneficioalumno` DISABLE KEYS */;
INSERT INTO `beneficioalumno` VALUES (1,'CUMPLIDO',12,'2021-11-03',16,4,6),(2,'CUMPLIDO',12,'2021-11-03',17,4,6),(3,'CUMPLIDO',12,'2021-11-08',18,4,6),(4,'CUMPLIDO',12,'2021-11-08',19,4,6),(5,'PENDIENTE',12,'2021-11-08',20,4,6),(6,'PENDIENTE',13,'2021-11-03',21,4,6),(7,'PENDIENTE',14,NULL,32,4,6),(8,'CUMPLIDO',13,'2021-11-08',29,4,6),(9,'PENDIENTE',13,NULL,33,4,6),(10,'PENDIENTE',13,NULL,30,4,6),(11,'PENDIENTE',13,NULL,31,4,6),(12,'PENDIENTE',13,NULL,28,4,6);
/*!40000 ALTER TABLE `beneficioalumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `beneficioxtipgrupo`
--

DROP TABLE IF EXISTS `beneficioxtipgrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `beneficioxtipgrupo` (
  `idBeneficioxtipGrupo` int NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) NOT NULL,
  `idBeneficio` int NOT NULL,
  `idTipoGrupo` int NOT NULL,
  PRIMARY KEY (`idBeneficioxtipGrupo`),
  KEY `Beneficio3_idx` (`idBeneficio`),
  KEY `TipoGrupo2_idx` (`idTipoGrupo`),
  CONSTRAINT `Beneficio3` FOREIGN KEY (`idBeneficio`) REFERENCES `beneficio` (`idBeneficio`),
  CONSTRAINT `TipoGrupo2` FOREIGN KEY (`idTipoGrupo`) REFERENCES `tipo_grupo` (`idTipoGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficioxtipgrupo`
--

LOCK TABLES `beneficioxtipgrupo` WRITE;
/*!40000 ALTER TABLE `beneficioxtipgrupo` DISABLE KEYS */;
INSERT INTO `beneficioxtipgrupo` VALUES (1,'ACTIVO',1,2),(2,'INACTIVO',2,3),(3,'ACTIVO',4,1),(4,'ACTIVO',5,1),(5,'ACTIVO',6,1),(6,'ACTIVO',7,3),(7,'ACTIVO',8,2),(8,'ACTIVO',9,2),(9,'ACTIVO',10,2),(10,'ACTIVO',11,1),(11,'ACTIVO',12,1),(12,'ACTIVO',13,3),(13,'ACTIVO',14,4),(14,'ACTIVO',15,2),(15,'ACTIVO',16,2),(16,'ACTIVO',18,8),(17,'ACTIVO',19,8),(18,'ACTIVO',20,8),(19,'ACTIVO',21,8),(20,'ACTIVO',22,8),(21,'ACTIVO',23,9),(28,'ACTIVO',18,9),(29,'ACTIVO',22,9),(30,'ACTIVO',21,9),(31,'ACTIVO',20,9),(32,'ACTIVO',19,10),(33,'ACTIVO',19,9);
/*!40000 ALTER TABLE `beneficioxtipgrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `condicion_economica`
--

DROP TABLE IF EXISTS `condicion_economica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `condicion_economica` (
  `idCondicionEconomica` int NOT NULL AUTO_INCREMENT,
  `nombre_condicion` varchar(45) NOT NULL,
  PRIMARY KEY (`idCondicionEconomica`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicion_economica`
--

LOCK TABLES `condicion_economica` WRITE;
/*!40000 ALTER TABLE `condicion_economica` DISABLE KEYS */;
INSERT INTO `condicion_economica` VALUES (1,'Pobre Extremo'),(2,'Pobre'),(3,'No pobre'),(4,'POBRE'),(5,'NO POBRE');
/*!40000 ALTER TABLE `condicion_economica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_usuario`
--

DROP TABLE IF EXISTS `datos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `datos_usuario` (
  `idDatosUsuario` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `idPersona` int NOT NULL,
  PRIMARY KEY (`idDatosUsuario`),
  KEY `Usuario2_idx` (`idUsuario`),
  KEY `Persona1_idx` (`idPersona`),
  CONSTRAINT `Persona1` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`),
  CONSTRAINT `Usuario2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_usuario`
--

LOCK TABLES `datos_usuario` WRITE;
/*!40000 ALTER TABLE `datos_usuario` DISABLE KEYS */;
INSERT INTO `datos_usuario` VALUES (1,1,1),(2,2,2),(3,3,12),(4,4,2),(5,5,2),(6,6,19);
/*!40000 ALTER TABLE `datos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escuela`
--

DROP TABLE IF EXISTS `escuela`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escuela` (
  `idEscuela` int NOT NULL AUTO_INCREMENT,
  `nombre_escuela` varchar(45) NOT NULL,
  `idFacultad` int NOT NULL,
  PRIMARY KEY (`idEscuela`),
  KEY `Facultad1_idx` (`idFacultad`),
  CONSTRAINT `Facultad1` FOREIGN KEY (`idFacultad`) REFERENCES `facultad` (`idFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuela`
--

LOCK TABLES `escuela` WRITE;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` VALUES (1,'MATEMATICA',12);
/*!40000 ALTER TABLE `escuela` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos_realizados`
--

DROP TABLE IF EXISTS `eventos_realizados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventos_realizados` (
  `idEventosrealizados` int NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `idorganizador` int NOT NULL,
  PRIMARY KEY (`idEventosrealizados`),
  KEY `fk_eventos_realizados_organizador1_idx` (`idorganizador`),
  CONSTRAINT `fk_eventos_realizados_organizador1` FOREIGN KEY (`idorganizador`) REFERENCES `organizador` (`idorganizador`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_realizados`
--

LOCK TABLES `eventos_realizados` WRITE;
/*!40000 ALTER TABLE `eventos_realizados` DISABLE KEYS */;
INSERT INTO `eventos_realizados` VALUES (6,'Evento 1','2021-11-03','2021-11-15',1),(7,'Evento 2','2021-11-06','2021-11-12',2),(8,'EVENTO 3','2021-11-06','2021-11-19',3),(9,'EVENTO 4','2021-11-12','2021-11-19',1),(10,'EVENTO 5','2021-11-13','2021-11-28',4),(11,'Evento 6','2021-11-08','2021-11-19',4);
/*!40000 ALTER TABLE `eventos_realizados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facultad`
--

DROP TABLE IF EXISTS `facultad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facultad` (
  `idFacultad` int NOT NULL AUTO_INCREMENT,
  `nombre_facultad` varchar(200) NOT NULL,
  PRIMARY KEY (`idFacultad`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (12,'FACULTAD DE CIENCIAS'),(13,'FAT');
/*!40000 ALTER TABLE `facultad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formacion_socioeconomica`
--

DROP TABLE IF EXISTS `formacion_socioeconomica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formacion_socioeconomica` (
  `idformacion_socioeconomica` int NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  `codalum` int NOT NULL,
  PRIMARY KEY (`idformacion_socioeconomica`),
  KEY `Alumno2_idx` (`codalum`),
  CONSTRAINT `Alumno2` FOREIGN KEY (`codalum`) REFERENCES `alumno` (`idAlumno`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacion_socioeconomica`
--

LOCK TABLES `formacion_socioeconomica` WRITE;
/*!40000 ALTER TABLE `formacion_socioeconomica` DISABLE KEYS */;
INSERT INTO `formacion_socioeconomica` VALUES (7,'1231',11),(8,'Ninguna',12),(9,'Ninguna',13);
/*!40000 ALTER TABLE `formacion_socioeconomica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_universitario`
--

DROP TABLE IF EXISTS `grupo_universitario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grupo_universitario` (
  `idgrupo_universitario` int NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(45) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `resolucion_creacion` varchar(25) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `idTipoGrupo` int NOT NULL,
  PRIMARY KEY (`idgrupo_universitario`),
  KEY `TipoGrupo1_idx` (`idTipoGrupo`),
  CONSTRAINT `TipoGrupo1` FOREIGN KEY (`idTipoGrupo`) REFERENCES `tipo_grupo` (`idTipoGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_universitario`
--

LOCK TABLES `grupo_universitario` WRITE;
/*!40000 ALTER TABLE `grupo_universitario` DISABLE KEYS */;
INSERT INTO `grupo_universitario` VALUES (32,' Tuna','2021-10-05','123','c283ca81af7fe2d5bdd07964197f643e.jpg',8),(33,' GRUPO 1','2021-11-03','RES_G001','f7cc7d59f95f19c16c1d9ef2ba4e32d2.jpg',9),(34,' GRUPO 2','2021-11-10','RES_G002','c086a602bbb834c44cb294fb8951964d.jpg',10);
/*!40000 ALTER TABLE `grupo_universitario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitacion`
--

DROP TABLE IF EXISTS `invitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invitacion` (
  `idinvitacion` int NOT NULL AUTO_INCREMENT,
  `fechaRegistro` date NOT NULL,
  `fechaHoraInvitacion` datetime NOT NULL,
  `estado` varchar(45) NOT NULL,
  `Observacion` varchar(100) NOT NULL,
  `idEventosrealizados` int NOT NULL,
  `idgrupo_universitario` int NOT NULL,
  PRIMARY KEY (`idinvitacion`),
  KEY `fk_invitacion_eventos_realizados1_idx` (`idEventosrealizados`),
  KEY `fk_invitacion_grupo_universitario1_idx` (`idgrupo_universitario`),
  CONSTRAINT `fk_invitacion_eventos_realizados1` FOREIGN KEY (`idEventosrealizados`) REFERENCES `eventos_realizados` (`idEventosrealizados`),
  CONSTRAINT `fk_invitacion_grupo_universitario1` FOREIGN KEY (`idgrupo_universitario`) REFERENCES `grupo_universitario` (`idgrupo_universitario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitacion`
--

LOCK TABLES `invitacion` WRITE;
/*!40000 ALTER TABLE `invitacion` DISABLE KEYS */;
INSERT INTO `invitacion` VALUES (1,'2021-11-12','2021-11-16 00:00:00','NO CUMPLIDO','Danza de Huaraz',6,33),(2,'2021-11-05','2021-11-08 18:38:00','VIGENTE','ninguna',6,34),(3,'2021-11-05','2021-11-05 22:43:00','VIGENTE','nueva observacion',7,32),(4,'2021-11-07','2021-11-27 23:52:00','VIGENTE','niguna',10,33),(5,'2021-11-08','2021-11-09 22:32:00','VIGENTE','ningun',11,32),(6,'2021-11-08','2021-11-09 22:49:00','VIGENTE','ninguna',11,34);
/*!40000 ALTER TABLE `invitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizador`
--

DROP TABLE IF EXISTS `organizador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizador` (
  `idorganizador` int NOT NULL AUTO_INCREMENT,
  `organizador` varchar(100) NOT NULL,
  `contacto` text NOT NULL,
  PRIMARY KEY (`idorganizador`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizador`
--

LOCK TABLES `organizador` WRITE;
/*!40000 ALTER TABLE `organizador` DISABLE KEYS */;
INSERT INTO `organizador` VALUES (1,'EMPRESA 1','correo@correo.com'),(2,'EMPRESA 2','correo1@correo.com'),(3,'EMPRESA 3','963852741'),(4,'EMPRESA 4','963852777');
/*!40000 ALTER TABLE `organizador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participacionalumno`
--

DROP TABLE IF EXISTS `participacionalumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `participacionalumno` (
  `idParticipacionAlumno` int NOT NULL AUTO_INCREMENT,
  `tipo_participacion` varchar(25) NOT NULL,
  `idAlumnoGrupo` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idSemestre` int NOT NULL,
  `idinvitacion` int NOT NULL,
  PRIMARY KEY (`idParticipacionAlumno`),
  KEY `AlumnoGrupo1_idx` (`idAlumnoGrupo`),
  KEY `Usuario1_idx` (`idUsuario`),
  KEY `Semestre2_idx` (`idSemestre`),
  KEY `fk_participacionalumno_invitacion1_idx` (`idinvitacion`),
  CONSTRAINT `AlumnoGrupo1` FOREIGN KEY (`idAlumnoGrupo`) REFERENCES `alumnogrupo` (`idAlumnoGrupo`),
  CONSTRAINT `fk_participacionalumno_invitacion1` FOREIGN KEY (`idinvitacion`) REFERENCES `invitacion` (`idinvitacion`),
  CONSTRAINT `Semestre2` FOREIGN KEY (`idSemestre`) REFERENCES `semestre` (`idSemestre`),
  CONSTRAINT `Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participacionalumno`
--

LOCK TABLES `participacionalumno` WRITE;
/*!40000 ALTER TABLE `participacionalumno` DISABLE KEYS */;
INSERT INTO `participacionalumno` VALUES (1,'presencial',13,6,4,1),(3,'presencial',13,6,4,4),(4,'presencial',12,6,4,5),(5,'presencial',14,6,4,6),(6,'presencial',12,6,4,3);
/*!40000 ALTER TABLE `participacionalumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `idPersona` int NOT NULL AUTO_INCREMENT,
  `dni` char(8) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `email` text NOT NULL,
  `telefono` char(10) NOT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (13,'12346543','Claudia Alejandra','Briceño Pulache','Masculino','Los Planos       ','Correo@correo.com ','615445'),(14,'1122325','Claudia Alejandra','Rosales','Masculino','Los Planos              ','Correo@correo.com ','123123'),(15,'7185785','Juan','Luna','MASCULINO','jr. Alisos','co','95848758'),(16,'7185786','Juan','Luna','MASCULINO','jr. Alisos','co','95848758'),(17,'96365488','Julio','Medina Luna','Masculino','Av. Los Angeles  ','Correo@correo.com ','963589644'),(18,'14569777','Mario','Rosales Rosas','Masculino','Av. Los Angeles ','Correo@correo.com ','963963963'),(19,'71658894','Miguel','Silva Zapata','MASCULINO','AV. los programadores','miguel@dev.com','963256541');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedencia`
--

DROP TABLE IF EXISTS `procedencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `procedencia` (
  `idProcedencia` int NOT NULL AUTO_INCREMENT,
  `nombre_procedencia` varchar(45) NOT NULL,
  PRIMARY KEY (`idProcedencia`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedencia`
--

LOCK TABLES `procedencia` WRITE;
/*!40000 ALTER TABLE `procedencia` DISABLE KEYS */;
INSERT INTO `procedencia` VALUES (12,'Huaraz'),(13,'Huaraz'),(14,'Huaraz'),(15,'Huaraz'),(16,'Huaraz');
/*!40000 ALTER TABLE `procedencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resolucionxbeneficio`
--

DROP TABLE IF EXISTS `resolucionxbeneficio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resolucionxbeneficio` (
  `idResolucionxbeneficio` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  `fecha_emision` date DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idBeneficio` int NOT NULL,
  PRIMARY KEY (`idResolucionxbeneficio`),
  KEY `Beneficio2_idx` (`idBeneficio`),
  CONSTRAINT `Beneficio2` FOREIGN KEY (`idBeneficio`) REFERENCES `beneficio` (`idBeneficio`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolucionxbeneficio`
--

LOCK TABLES `resolucionxbeneficio` WRITE;
/*!40000 ALTER TABLE `resolucionxbeneficio` DISABLE KEYS */;
INSERT INTO `resolucionxbeneficio` VALUES (17,'0020322','2021-10-05','COMPLETADO',18),(18,'RES_002','2021-11-18','COMPLETADO',19),(19,'RES_003','2021-11-01','COMPLETADO',20),(20,'RES_003','2021-11-01','COMPLETADO',21),(21,'RES_004','2021-11-11','COMPLETADO',22),(22,'RES_005','2021-11-04','COMPLETADO',23),(23,'RES_006','2021-11-04','COMPLETADO',24),(24,'RES_007','2021-11-05','COMPLETADO',25),(25,'',NULL,'PENDIENTE',26);
/*!40000 ALTER TABLE `resolucionxbeneficio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `semestre` (
  `idSemestre` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
INSERT INTO `semestre` VALUES (4,'semstre uno','2021-02-12','2021-06-22','Activo');
/*!40000 ALTER TABLE `semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_grupo`
--

DROP TABLE IF EXISTS `tipo_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_grupo` (
  `idTipoGrupo` int NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idTipoGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_grupo`
--

LOCK TABLES `tipo_grupo` WRITE;
/*!40000 ALTER TABLE `tipo_grupo` DISABLE KEYS */;
INSERT INTO `tipo_grupo` VALUES (8,' Danza '),(9,' Teatro '),(10,' Musica ');
/*!40000 ALTER TABLE `tipo_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (6,'admin','admin','activo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_users`
--

DROP TABLE IF EXISTS `v_users`;
/*!50001 DROP VIEW IF EXISTS `v_users`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_users` AS SELECT 
 1 AS `idPersona`,
 1 AS `dni`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `genero`,
 1 AS `direccion`,
 1 AS `email`,
 1 AS `telefono`,
 1 AS `idDatosUsuario`,
 1 AS `idUsuario`,
 1 AS `usuario`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_alumno_x_grupo`
--

DROP TABLE IF EXISTS `vista_alumno_x_grupo`;
/*!50001 DROP VIEW IF EXISTS `vista_alumno_x_grupo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_alumno_x_grupo` AS SELECT 
 1 AS `idPersona`,
 1 AS `dni`,
 1 AS `nombre`,
 1 AS `genero`,
 1 AS `direccion`,
 1 AS `codigo_alumno`,
 1 AS `fecha_inscripcion`,
 1 AS `estado`,
 1 AS `idgrupo_universitario`,
 1 AS `nombre_grupo`,
 1 AS `idTipoGrupo`,
 1 AS `nombre_tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_asistenciaalumno`
--

DROP TABLE IF EXISTS `vista_asistenciaalumno`;
/*!50001 DROP VIEW IF EXISTS `vista_asistenciaalumno`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_asistenciaalumno` AS SELECT 
 1 AS `idAlumnoGrupo`,
 1 AS `idgrupo_universitario`,
 1 AS `nombre_grupo`,
 1 AS `idinvitacion`,
 1 AS `idEventosrealizados`,
 1 AS `nombre_evento`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_benef_tipo`
--

DROP TABLE IF EXISTS `vista_benef_tipo`;
/*!50001 DROP VIEW IF EXISTS `vista_benef_tipo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_benef_tipo` AS SELECT 
 1 AS `idBeneficio`,
 1 AS `nombre`,
 1 AS `idBeneficioxtipGrupo`,
 1 AS `estado`,
 1 AS `idTipoGrupo`,
 1 AS `nombre_tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_beneficioalumnos`
--

DROP TABLE IF EXISTS `vista_beneficioalumnos`;
/*!50001 DROP VIEW IF EXISTS `vista_beneficioalumnos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_beneficioalumnos` AS SELECT 
 1 AS `idBeneficioalumno`,
 1 AS `EstadoBenAlum`,
 1 AS `idAlumnoGrupo`,
 1 AS `fechefec`,
 1 AS `idSemestre`,
 1 AS `idBeneficioxtipGrupo`,
 1 AS `EstadoBeneficioG`,
 1 AS `idTipoGrupo`,
 1 AS `idBeneficio`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_beneficios`
--

DROP TABLE IF EXISTS `vista_beneficios`;
/*!50001 DROP VIEW IF EXISTS `vista_beneficios`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_beneficios` AS SELECT 
 1 AS `idResolucionxbeneficio`,
 1 AS `numero`,
 1 AS `fecha_emision`,
 1 AS `estado`,
 1 AS `idBeneficio`,
 1 AS `nombre`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_beneficios_tipo`
--

DROP TABLE IF EXISTS `vista_beneficios_tipo`;
/*!50001 DROP VIEW IF EXISTS `vista_beneficios_tipo`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_beneficios_tipo` AS SELECT 
 1 AS `idResolucionxbeneficio`,
 1 AS `numero`,
 1 AS `fecha_emision`,
 1 AS `estadoresolucion`,
 1 AS `idBeneficio`,
 1 AS `nombre`,
 1 AS `idBeneficioxtipGrupo`,
 1 AS `estado`,
 1 AS `idTipoGrupo`,
 1 AS `nombre_tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_estudiantes`
--

DROP TABLE IF EXISTS `vista_estudiantes`;
/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_estudiantes` AS SELECT 
 1 AS `idPersona`,
 1 AS `dni`,
 1 AS `nombre`,
 1 AS `apellido`,
 1 AS `genero`,
 1 AS `direccion`,
 1 AS `email`,
 1 AS `telefono`,
 1 AS `idAlumno`,
 1 AS `codigo_alumno`,
 1 AS `idEscuela`,
 1 AS `nombre_escuela`,
 1 AS `idCondicionEconomica`,
 1 AS `nombre_condicion`,
 1 AS `idProcedencia`,
 1 AS `nombre_procedencia`,
 1 AS `idAlumnoGrupo`,
 1 AS `fecha_inscripcion`,
 1 AS `estado`,
 1 AS `idgrupo_universitario`,
 1 AS `fecha_creacion`,
 1 AS `resolucion_creacion`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_eventos`
--

DROP TABLE IF EXISTS `vista_eventos`;
/*!50001 DROP VIEW IF EXISTS `vista_eventos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_eventos` AS SELECT 
 1 AS `idEventosrealizados`,
 1 AS `nombre_evento`,
 1 AS `fecha_inicio`,
 1 AS `fecha_final`,
 1 AS `idorganizador`,
 1 AS `organizador`,
 1 AS `contacto`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_grupo_universitario`
--

DROP TABLE IF EXISTS `vista_grupo_universitario`;
/*!50001 DROP VIEW IF EXISTS `vista_grupo_universitario`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_grupo_universitario` AS SELECT 
 1 AS `idgrupo_universitario`,
 1 AS `nombre_grupo`,
 1 AS `fecha_creacion`,
 1 AS `resolucion_creacion`,
 1 AS `imagen`,
 1 AS `idTipoGrupo`,
 1 AS `nombre_tipo`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vista_res_beneficio`
--

DROP TABLE IF EXISTS `vista_res_beneficio`;
/*!50001 DROP VIEW IF EXISTS `vista_res_beneficio`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vista_res_beneficio` AS SELECT 
 1 AS `idBeneficio`,
 1 AS `nombre`,
 1 AS `idResolucionxbeneficio`,
 1 AS `numero`,
 1 AS `fecha_emision`,
 1 AS `estado`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'alumnos'
--
/*!50003 DROP FUNCTION IF EXISTS `func_EstadoInvitacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `func_EstadoInvitacion`(idInv int, fechaHora date) RETURNS varchar(12) CHARSET utf8mb4
    DETERMINISTIC
begin
if(select count(*) from participacionalumno where idinvitacion=idInv)>0 then
return 'CUMPLIDA';
else
if(timestampdiff(day,curdate(),fechaHora))>0 then
return 'VIGENTE';
else
return 'NO CUMPLIDA';
END IF;
END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `func_EstadoParticipacionAlumno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `func_EstadoParticipacionAlumno`(idInv int, idAlumno int) RETURNS varchar(12) CHARSET utf8mb4
    DETERMINISTIC
begin
if(select count(*) from participacionalumno where idinvitacion=idInv and idAlumnoGrupo=idAlumno)>0 then
return 'ASISTIO';
else
return 'NO ASISTIO';
END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proce_updateAlumno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proce_updateAlumno`(idper int,dniPers varchar(8),nombres varchar(45),apellidos varchar(45),gene varchar(15),direc varchar(60),mail text,tele char(10),
codigo varchar(25), idEscuelas int, procedencia varchar(45),idCondicionEcon int, formacionSocioEcono longtext,
fechaInscr date, estadoA varchar(15),idGrupoUniversitario int)
begin
-- DECLARACIONES

declare idAlum int;
declare idProced int;
declare idAlumnoG int;
declare idformacion int;
-- ASIGNACIONES -------

set idAlum=(select (idAlumno) from vista_estudiantes where idPersona=idper limit 1);
set idProced=(select (idProcedencia) from vista_estudiantes where idPersona=idper limit 1);
set idAlumnoG=(select (idAlumnoGrupo) from vista_estudiantes where idPersona=idper and idgrupo_universitario=idGrupoUniversitario limit 1);
if((select count(*) from vista_estudiantes where codigo_alumno=codigo and idPersona <> idper) > 0)then
 SELECT 1 valor;
else if((select count(*) from vista_estudiantes where dni=dniPers and idPersona <> idper) > 0) THEN
 SELECT 2 valor;
ELSE
update persona set dni=dniPers,nombre=nombres,apellido=apellidos,genero=gene,direccion=direc,email=mail,telefono=tele where idpersona=idper;
update Procedencia set nombre_procedencia= procedencia where idProcedencia=idProced;
update alumno set codigo_alumno=codigo, idEscuela=idEscuelas,idCondicionEconomica=idCondicionEcon where idAlumno=idAlum;
set idformacion=(select idformacion_socioeconomica from formacion_socioeconomica where codalum=4 limit 1);
update formacion_socioeconomica set descripcion=formacionSocioEcono where idformacion_socioeconomica=idformacion;
update alumnogrupo set fecha_inscripcion=fechaInscr,estado=estadoA where idalumnogrupo=idAlumnoG;
 SELECT 5 valor;
end if;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proce_updateAlumno_dos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proce_updateAlumno_dos`(idper int,dniPers varchar(8),nombres varchar(45),apellidos varchar(45),gene varchar(15),direc varchar(60),mail text,tele char(10),
codigo varchar(25), idEscuelas int, procedencia varchar(45),idCondicionEcon int, formacionSocioEcono longtext,
fechaInscr date, estadoA varchar(15),idGrupoUniversitario int)
begin
-- DECLARACIONES

declare idAlum int;
declare idProced int;
declare idAlumnoG int;
declare idformacion int;
-- ASIGNACIONES -------

set idAlum=(select (idAlumno) from vista_estudiantes where idPersona=idper limit 1);
set idProced=(select (idProcedencia) from vista_estudiantes where idPersona=idper limit 1);
set idAlumnoG=(select (idAlumnoGrupo) from vista_estudiantes where idPersona=idper and idgrupo_universitario=idGrupoUniversitario limit 1);
if((select count(*) from vista_estudiantes where codigo_alumno=codigo and idPersona <> idper) > 0)then
 SELECT 1 valor;
else if((select count(*) from vista_estudiantes where dni=dniPers and idPersona <> idper) > 0) THEN
 SELECT 2 valor;
ELSE
update persona set dni=dniPers,nombre=nombres,apellido=apellidos,genero=gene,direccion=direc,email=mail,telefono=tele where idpersona=idper;
update Procedencia set nombre_procedencia= procedencia where idProcedencia=idProced;
update alumno set codigo_alumno=codigo, idEscuela=idEscuelas,idCondicionEconomica=idCondicionEcon where idAlumno=idAlum;
set idformacion=(select idformacion_socioeconomica from formacion_socioeconomica where codalum=4 limit 1);
update formacion_socioeconomica set descripcion=formacionSocioEcono where idformacion_socioeconomica=idformacion;
update alumnogrupo set fecha_inscripcion=fechaInscr,estado=estadoA where idalumnogrupo=idAlumnoG;
 SELECT 5 valor;
end if;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertaParticipacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertaParticipacion`(tipoparticipacion varchar(25), idAlumnog int,idUsu int, idSemest int, idInv int)
begin
if(select count(*) from participacionalumno where idinvitacion=idInv and idAlumnoGrupo=idAlumnog)>0 then
select 0 valor;
else
if(idSemest=0)then
insert into participacionalumno values(null,tipoparticipacion,idAlumnog,idUsu,null,idInv);
else
insert into participacionalumno values(null,tipoparticipacion,idAlumnog,idUsu,idSemest,idInv);
end if;
select 1 valor;
END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertBenefTipo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertBenefTipo`(estadBen varchar(45),idBene int, idTipoG int)
begin
declare idBenTipoG int;
if(select count(*) from beneficioxtipgrupo where idBeneficio=idBene and idTipoGrupo=idTipoG)>0 then
set idBenTipoG=(select idBeneficioxtipGrupo from beneficioxtipgrupo where idBeneficio=idBene and idTipoGrupo=idTipoG);
update beneficioxtipgrupo set estado=estadBen where idBeneficioxtipGrupo=idBenTipoG;
select 0 valor;
else
insert into beneficioxtipgrupo values(null,estadBen,idBene,idTipoG);
select 1 valor;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertEvent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertEvent`(nomevent varchar(200),fecIni date,fecFin date, idOrg int)
begin
if(select count(*) from eventos_realizados where nombre_evento=nomevent)>0 then
select 0 valor;
else
insert into eventos_realizados values(null,nomevent,fecIni,fecFin,idOrg);
select 1 valor;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insertInvitacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertInvitacion`(fechaHoraInv datetime,observa varchar(100),idEvento int,idGrupUni int)
begin
if(select count(*) from invitacion where idEventosrealizados=idEvento and idgrupo_universitario=idGrupUni)>0 then
select 0 valor;
else
insert into invitacion values(null,curdate(),fechaHoraInv,'VIGENTE',observa,idEvento,idGrupUni);
select 1 valor;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `proc_insrtBenAlumno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insrtBenAlumno`(idAlumG int,idBeneG int, idSemes int,idUsu int)
begin
if(select count(*) from beneficioalumno where idAlumnoGrupo=idAlumG and idBeneficioxtipGrupo=idBeneG)>0 then
select 0 valor;
else
if(idSemes>0)then
insert into beneficioalumno values(null,'PENDIENTE',idAlumG,null,idBeneG,idSemes,idUsu);
select 1 valor;
else
insert into beneficioalumno values(null,'PENDIENTE',idAlumG,null,idBeneG,null,idUsu);
select 1 valor;
end if;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_insertarAlumno` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insertarAlumno`(dniPers varchar(8),nombre varchar(45),apellidos varchar(45),genero varchar(15),direccion varchar(60),email text,telefono char(10),
codigo varchar(25), idEscuela int, procedencia varchar(45),idCondicionEcon int, formacionSocioEcono longtext,
fechaInscr date, estado varchar(15), idGrupoUniversitario int)
begin
declare idPers int;
declare idAlum int;
set idPers=(select (idpersona+1) from persona order by 1 desc limit 1);
set idAlum=(select (idAlumno+1) from alumno order by 1 desc limit 1);
if((select count(*) from persona where dni=dniPers)>0)then
-- Existe persona
set idPers=(select idpersona from persona where dni=dniPers limit 1);
else
-- no existe
insert into persona values (idPers,dniPers,nombre,apellidos,genero,direccion,email,telefono);
end if;

if((select count(*) from alumno where codigo_alumno=codigo)>0)then
-- Existe Alumno
set idAlum=(select idAlumno from alumno where codigo_alumno=codigo limit 1);
else
-- no existe
insert into Procedencia values (null,procedencia);
insert into alumno values(idAlum,codigo,idPers,idEscuela,(select idProcedencia from procedencia order by 1 desc limit 1),idCondicionEcon);
insert into formacion_socioeconomica values(null,formacionSocioEcono,idAlum);
end if;
if((select count(*) from alumnogrupo where idAlumno=(select idAlumno from alumno where codigo_alumno=codigo)
and idgrupo_universitario=idGrupoUniversitario)>0) then
select 1 valor;
else
insert into alumnogrupo values(null,curdate(),estado,idAlum,idGrupoUniversitario);
select 'Se registró exitosamente';
end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_insertarbeneficio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insertarbeneficio`(nomBeneficio varchar(45),nroResol varchar(45), fecha_emision varchar(15), estadoRes varchar(45))
begin
declare idBen int;
if(select count(*) from beneficio where nombre=nomBeneficio)>0 then
select 0 valor;
else
insert into beneficio values (null,nomBeneficio);
set idBen=(select idBeneficio from beneficio order by idBeneficio desc limit 1);
if(fecha_emision='')then
insert into resolucionxbeneficio values(null,nroResol,null,estadoRes,idBen);
else
insert into resolucionxbeneficio values(null,nroResol,fecha_emision,estadoRes,idBen);
end if;
select 1 valor;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_insertUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_insertUsuario`(dniP varchar(8), nombreP varchar(45), apellidoP varchar(45), generoP varchar(15),
direccionP varchar(60), emailP text, telefonoP char(10), username varchar(45),passw text, estadoU varchar(45))
begin
declare idP int;
declare idU int;
if(select count(*) from persona where dni=dniP)>0 then
set idP=(select (idPersona) from persona where dni=dniP order by 1 desc limit 1);
else
insert into persona values(idP, dniP, nombreP, apellidoP, generoP, direccionP, emailP, telefonoP);
set idP=(select (idPersona) from persona order by 1 desc limit 1);
end if;
if(select count(*) from datos_usuario where idPersona=idP)>0 then
select 1 valor;
else
insert into usuario values (null,username,(passw),estadoU);
set idU=(select (idUsuario) from usuario order by 1 desc limit 1);
insert into datos_usuario values (null,idU,idP);
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_updatebeneficio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_updatebeneficio`(idBen int, nombreB varchar(45),nroResol varchar(45), fecha_emisionR varchar(15), estadoRes varchar(45))
begin
declare idRes int;
set idRes=(select (idResolucionxbeneficio) from resolucionxbeneficio where idBeneficio=idBen order by 1 desc limit 1);
update beneficio set nombre=nombreB where idBeneficio=idBen;

 if(fecha_emisionR='')then
update resolucionxbeneficio set numero=nroResol,fecha_emision=null,estado=estadoRes where idResolucionxbeneficio=idRes;
else
update resolucionxbeneficio set numero=nroResol,fecha_emision=fecha_emisionR,estado=estadoRes where idResolucionxbeneficio=idRes;
end if;
select 1 valor;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `p_updateUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_updateUsuario`(idP int, dniP varchar(8), nombreP varchar(45), apellidoP varchar(45), generoP varchar(15),
direccionP varchar(60), emailP text, telefonoP char(10), username varchar(45),passw text, estadoU varchar(45))
begin
declare idU int;
set idU=(select (idUsuario) from v_users where idPersona=idP order by 1 desc limit 1);
update persona set dni=dniP, nombre=nombreP, apellido=apellidoP, genero=generoP, direccion=direccionP, email=emailP, telefono=telefonoP
where idPersona=idP;
if(length(passw)>0)then
update usuario set password=passw,estado=estadoU where idUsuario=idU;
else
update usuario set estado=estadoU where idUsuario=idU;
end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `v_users`
--

/*!50001 DROP VIEW IF EXISTS `v_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_users` AS select `p`.`idPersona` AS `idPersona`,`p`.`dni` AS `dni`,`p`.`nombre` AS `nombre`,`p`.`apellido` AS `apellido`,`p`.`genero` AS `genero`,`p`.`direccion` AS `direccion`,`p`.`email` AS `email`,`p`.`telefono` AS `telefono`,`du`.`idDatosUsuario` AS `idDatosUsuario`,`u`.`idUsuario` AS `idUsuario`,`u`.`usuario` AS `usuario`,`u`.`estado` AS `estado` from ((`persona` `p` join `datos_usuario` `du` on((`du`.`idPersona` = `p`.`idPersona`))) join `usuario` `u` on((`u`.`idUsuario` = `du`.`idUsuario`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_alumno_x_grupo`
--

/*!50001 DROP VIEW IF EXISTS `vista_alumno_x_grupo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_alumno_x_grupo` AS select `p`.`idPersona` AS `idPersona`,`p`.`dni` AS `dni`,concat(`p`.`nombre`,'  ',`p`.`apellido`) AS `nombre`,`p`.`genero` AS `genero`,`p`.`direccion` AS `direccion`,`a`.`codigo_alumno` AS `codigo_alumno`,`ag`.`fecha_inscripcion` AS `fecha_inscripcion`,`ag`.`estado` AS `estado`,`gu`.`idgrupo_universitario` AS `idgrupo_universitario`,`gu`.`nombre_grupo` AS `nombre_grupo`,`tg`.`idTipoGrupo` AS `idTipoGrupo`,`tg`.`nombre_tipo` AS `nombre_tipo` from ((((`persona` `p` join `alumno` `a` on((`a`.`idPersona` = `p`.`idPersona`))) join `alumnogrupo` `ag` on((`a`.`idAlumno` = `ag`.`idAlumno`))) join `grupo_universitario` `gu` on((`gu`.`idgrupo_universitario` = `ag`.`idgrupo_universitario`))) join `tipo_grupo` `tg` on((`gu`.`idTipoGrupo` = `tg`.`idTipoGrupo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_asistenciaalumno`
--

/*!50001 DROP VIEW IF EXISTS `vista_asistenciaalumno`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_asistenciaalumno` AS select `a`.`idAlumnoGrupo` AS `idAlumnoGrupo`,`gu`.`idgrupo_universitario` AS `idgrupo_universitario`,`gu`.`nombre_grupo` AS `nombre_grupo`,`i`.`idinvitacion` AS `idinvitacion`,`er`.`idEventosrealizados` AS `idEventosrealizados`,`er`.`nombre_evento` AS `nombre_evento`,`func_EstadoParticipacionAlumno`(`i`.`idinvitacion`,`a`.`idAlumnoGrupo`) AS `estado` from (((`alumnogrupo` `a` left join `grupo_universitario` `gu` on((`a`.`idgrupo_universitario` = `gu`.`idgrupo_universitario`))) join `invitacion` `i` on((`i`.`idgrupo_universitario` = `gu`.`idgrupo_universitario`))) join `eventos_realizados` `er` on((`er`.`idEventosrealizados` = `i`.`idEventosrealizados`))) where (`gu`.`idgrupo_universitario` is not null) order by `a`.`idAlumnoGrupo` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_benef_tipo`
--

/*!50001 DROP VIEW IF EXISTS `vista_benef_tipo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_benef_tipo` AS select `b`.`idBeneficio` AS `idBeneficio`,`b`.`nombre` AS `nombre`,`bt`.`idBeneficioxtipGrupo` AS `idBeneficioxtipGrupo`,`bt`.`estado` AS `estado`,`tg`.`idTipoGrupo` AS `idTipoGrupo`,`tg`.`nombre_tipo` AS `nombre_tipo` from ((`beneficio` `b` join `beneficioxtipgrupo` `bt` on((`bt`.`idBeneficio` = `b`.`idBeneficio`))) join `tipo_grupo` `tg` on((`tg`.`idTipoGrupo` = `bt`.`idTipoGrupo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_beneficioalumnos`
--

/*!50001 DROP VIEW IF EXISTS `vista_beneficioalumnos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_beneficioalumnos` AS select `ba`.`idBeneficioalumno` AS `idBeneficioalumno`,`ba`.`estado` AS `EstadoBenAlum`,`ba`.`idAlumnoGrupo` AS `idAlumnoGrupo`,`ba`.`fechefec` AS `fechefec`,`ba`.`idSemestre` AS `idSemestre`,`bg`.`idBeneficioxtipGrupo` AS `idBeneficioxtipGrupo`,`bg`.`estado` AS `EstadoBeneficioG`,`bg`.`idTipoGrupo` AS `idTipoGrupo`,`b`.`idBeneficio` AS `idBeneficio`,`b`.`nombre` AS `nombre` from ((`beneficioalumno` `ba` join `beneficioxtipgrupo` `bg` on((`ba`.`idBeneficioxtipGrupo` = `bg`.`idBeneficioxtipGrupo`))) join `beneficio` `b` on((`bg`.`idBeneficio` = `b`.`idBeneficio`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_beneficios`
--

/*!50001 DROP VIEW IF EXISTS `vista_beneficios`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_beneficios` AS select `r`.`idResolucionxbeneficio` AS `idResolucionxbeneficio`,`r`.`numero` AS `numero`,`r`.`fecha_emision` AS `fecha_emision`,`r`.`estado` AS `estado`,`b`.`idBeneficio` AS `idBeneficio`,`b`.`nombre` AS `nombre` from (`resolucionxbeneficio` `r` join `beneficio` `b` on((`r`.`idBeneficio` = `b`.`idBeneficio`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_beneficios_tipo`
--

/*!50001 DROP VIEW IF EXISTS `vista_beneficios_tipo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_beneficios_tipo` AS select `rb`.`idResolucionxbeneficio` AS `idResolucionxbeneficio`,`rb`.`numero` AS `numero`,`rb`.`fecha_emision` AS `fecha_emision`,`rb`.`estado` AS `estadoresolucion`,`b`.`idBeneficio` AS `idBeneficio`,`b`.`nombre` AS `nombre`,`btp`.`idBeneficioxtipGrupo` AS `idBeneficioxtipGrupo`,`btp`.`estado` AS `estado`,`tp`.`idTipoGrupo` AS `idTipoGrupo`,`tp`.`nombre_tipo` AS `nombre_tipo` from (((`beneficio` `b` join `resolucionxbeneficio` `rb` on((`rb`.`idBeneficio` = `b`.`idBeneficio`))) join `beneficioxtipgrupo` `btp` on((`btp`.`idBeneficio` = `b`.`idBeneficio`))) join `tipo_grupo` `tp` on((`tp`.`idTipoGrupo` = `btp`.`idTipoGrupo`))) order by `b`.`idBeneficio` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_estudiantes`
--

/*!50001 DROP VIEW IF EXISTS `vista_estudiantes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_estudiantes` AS select `p`.`idPersona` AS `idPersona`,`p`.`dni` AS `dni`,`p`.`nombre` AS `nombre`,`p`.`apellido` AS `apellido`,`p`.`genero` AS `genero`,`p`.`direccion` AS `direccion`,`p`.`email` AS `email`,`p`.`telefono` AS `telefono`,`a`.`idAlumno` AS `idAlumno`,`a`.`codigo_alumno` AS `codigo_alumno`,`e`.`idEscuela` AS `idEscuela`,`e`.`nombre_escuela` AS `nombre_escuela`,`ce`.`idCondicionEconomica` AS `idCondicionEconomica`,`ce`.`nombre_condicion` AS `nombre_condicion`,`pro`.`idProcedencia` AS `idProcedencia`,`pro`.`nombre_procedencia` AS `nombre_procedencia`,`ag`.`idAlumnoGrupo` AS `idAlumnoGrupo`,`ag`.`fecha_inscripcion` AS `fecha_inscripcion`,`ag`.`estado` AS `estado`,`gu`.`idgrupo_universitario` AS `idgrupo_universitario`,`gu`.`fecha_creacion` AS `fecha_creacion`,`gu`.`resolucion_creacion` AS `resolucion_creacion` from ((((((`persona` `p` join `alumno` `a` on((`p`.`idPersona` = `a`.`idPersona`))) join `escuela` `e` on((`e`.`idEscuela` = `a`.`idEscuela`))) join `condicion_economica` `ce` on((`ce`.`idCondicionEconomica` = `a`.`idCondicionEconomica`))) join `procedencia` `pro` on((`pro`.`idProcedencia` = `a`.`idProcedencia`))) join `alumnogrupo` `ag` on((`ag`.`idAlumno` = `a`.`idAlumno`))) join `grupo_universitario` `gu` on((`gu`.`idgrupo_universitario` = `ag`.`idgrupo_universitario`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_eventos`
--

/*!50001 DROP VIEW IF EXISTS `vista_eventos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_eventos` AS select `er`.`idEventosrealizados` AS `idEventosrealizados`,`er`.`nombre_evento` AS `nombre_evento`,`er`.`fecha_inicio` AS `fecha_inicio`,`er`.`fecha_final` AS `fecha_final`,`o`.`idorganizador` AS `idorganizador`,`o`.`organizador` AS `organizador`,`o`.`contacto` AS `contacto` from (`eventos_realizados` `er` join `organizador` `o` on((`o`.`idorganizador` = `er`.`idorganizador`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_grupo_universitario`
--

/*!50001 DROP VIEW IF EXISTS `vista_grupo_universitario`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_grupo_universitario` AS select `gu`.`idgrupo_universitario` AS `idgrupo_universitario`,`gu`.`nombre_grupo` AS `nombre_grupo`,`gu`.`fecha_creacion` AS `fecha_creacion`,`gu`.`resolucion_creacion` AS `resolucion_creacion`,`gu`.`imagen` AS `imagen`,`tg`.`idTipoGrupo` AS `idTipoGrupo`,`tg`.`nombre_tipo` AS `nombre_tipo` from (`grupo_universitario` `gu` join `tipo_grupo` `tg` on((`gu`.`idTipoGrupo` = `tg`.`idTipoGrupo`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vista_res_beneficio`
--

/*!50001 DROP VIEW IF EXISTS `vista_res_beneficio`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vista_res_beneficio` AS select `b`.`idBeneficio` AS `idBeneficio`,`b`.`nombre` AS `nombre`,`r`.`idResolucionxbeneficio` AS `idResolucionxbeneficio`,`r`.`numero` AS `numero`,`r`.`fecha_emision` AS `fecha_emision`,`r`.`estado` AS `estado` from (`beneficio` `b` join `resolucionxbeneficio` `r` on((`b`.`idBeneficio` = `r`.`idBeneficio`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-08 23:10:39
