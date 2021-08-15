-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: basealumnos
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'171.2506.025',1,3,3,2),(2,'151.2603.104',2,1,2,1),(3,'161.2305.048',3,4,1,3),(4,'132.567.894',6,1,6,1),(5,'132.567.823',7,2,7,1),(6,'132.567.114',8,2,8,3),(7,'122.567.894',9,1,9,2),(8,'142.567.894',10,2,10,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumnogrupo`
--

LOCK TABLES `alumnogrupo` WRITE;
/*!40000 ALTER TABLE `alumnogrupo` DISABLE KEYS */;
INSERT INTO `alumnogrupo` VALUES (1,'2017-05-12','Activo',2,5),(2,'2017-05-19','Activo',1,5),(3,'2017-06-16','Activo',3,8),(4,'2021-08-15','Activo',4,9),(5,'2021-08-15','Activo',5,9),(6,'2021-08-15','Activo',6,9),(7,'2021-08-15','Activo',7,5),(8,'2021-08-15','Activo',8,9);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficio`
--

LOCK TABLES `beneficio` WRITE;
/*!40000 ALTER TABLE `beneficio` DISABLE KEYS */;
INSERT INTO `beneficio` VALUES (1,'Descuento de Matricula'),(2,'Descuento en CID'),(3,'Comedor Gratis');
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
  `idSemestre` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficioalumno`
--

LOCK TABLES `beneficioalumno` WRITE;
/*!40000 ALTER TABLE `beneficioalumno` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficioxtipgrupo`
--

LOCK TABLES `beneficioxtipgrupo` WRITE;
/*!40000 ALTER TABLE `beneficioxtipgrupo` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `condicion_economica`
--

LOCK TABLES `condicion_economica` WRITE;
/*!40000 ALTER TABLE `condicion_economica` DISABLE KEYS */;
INSERT INTO `condicion_economica` VALUES (1,'Pobre Extremo'),(2,'Pobre'),(3,'No pobre');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_usuario`
--

LOCK TABLES `datos_usuario` WRITE;
/*!40000 ALTER TABLE `datos_usuario` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escuela`
--

LOCK TABLES `escuela` WRITE;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` VALUES (1,'Ingenieria de sistemas e informatica',1),(2,'Administracion',2),(3,'Ingenieria Ambiental',10),(4,'Contabilidad',3),(5,'Enfermeria',4),(6,'Derecho',5),(7,'Ingenieria de Minas',6),(8,'Ingenieria Agricola',7),(9,'Ingenieria Industrial',8),(10,'Ingenieria Civil',9),(11,'Educacion',11);
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
  PRIMARY KEY (`idEventosrealizados`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos_realizados`
--

LOCK TABLES `eventos_realizados` WRITE;
/*!40000 ALTER TABLE `eventos_realizados` DISABLE KEYS */;
INSERT INTO `eventos_realizados` VALUES (1,'Cumbre de las Tunas universitaria del peru','2020-05-05','2020-05-06'),(2,'Hackatom','2021-08-09','2021-10-03'),(3,'Danzando con Dios','2021-07-18','2021-07-25');
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facultad`
--

LOCK TABLES `facultad` WRITE;
/*!40000 ALTER TABLE `facultad` DISABLE KEYS */;
INSERT INTO `facultad` VALUES (1,'Facultad de Ciencias'),(2,'Facultad de Administración y Turismo'),(3,'Facultad de Economia y Contabilidad'),(4,'Facultad de Ciencias Medicas'),(5,'Facultad de Derecho y Ciencias Politicas'),(6,'Facultad de Minas, Geologia y Metalurgia'),(7,'Facultad de Ciencias Agrarias'),(8,'Facultad de Industrias Alimentarias'),(9,'Facultad de Ingenieria Civil'),(10,'Facultad de Ingenieria del Ambiente'),(11,'Facultad de ciencias Sociales, Educacion y de la comunicacion');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formacion_socioeconomica`
--

LOCK TABLES `formacion_socioeconomica` WRITE;
/*!40000 ALTER TABLE `formacion_socioeconomica` DISABLE KEYS */;
INSERT INTO `formacion_socioeconomica` VALUES (1,'Esto es una descripcion',4),(2,'Su descripcion',5),(3,'No es pobre',6),(4,'Esta es una descripcion mas',7),(5,'nada',8);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_universitario`
--

LOCK TABLES `grupo_universitario` WRITE;
/*!40000 ALTER TABLE `grupo_universitario` DISABLE KEYS */;
INSERT INTO `grupo_universitario` VALUES (5,' Deportivo ','2021-08-10','RES_45','70ed58b53fbccec929dfc680034d67d9.jpg',2),(8,'Grupo estudios','2021-08-06','RES_123','4466df1374c590a8d1b7f9462121e996grupo2.jpg',4),(9,'Tuna Femenina ','2021-07-30','RES_234','ed4748a6078f65686a09c33d7766315d.jpg',1),(10,'Deporte SIstemas','2021-08-14','RES_89','03f958d0fdfbc28c225a529eccde7d40adusan.png',2),(11,'Tuna UNASAM','2021-08-06','RES_12','073b381628487f23b4276f57339fee0a.jpg',1),(12,'Desarrollo Inf.','2021-08-01','RES_003','75a1da4887220c39f7e8cf86682cd408grupo4.jpg',4),(13,'TUSAM','2021-08-15','RES_0009','0d56108668a6741d4b3f669f4201e8a5grupo3.jpg',3),(15,'Grupo','2021-08-07','RES_198','88cda3956cfe0b8519a28778d01d46b4grupo3.jpg',1),(18,' Grupo App','2021-08-08','RES_19811','b9a849d3de323af557c6a7d3c62b8065.jpg',1),(19,'gruposs','2021-08-14','234','3477a7fc5cc3fc7b7a80262ed0b31ce6.jpg',1),(21,' Nuevo Grupete','2021-08-10','res555','d7a2d1ee29132361d9723829bdb04ce6.jpg',2),(22,' Nuevo Grupete','2021-08-14','RES_2001','460d981514377cdb275faf772578606a.jpg',3),(23,' Nuevo Grupete','2021-08-14','RES_2001','0f3251c02297191140b8c08e6a211ba6.jpg',3),(24,'Los Rosados','2021-08-13','res555we','7db919bd66d08b248e70a74386fa6255.jpg',2),(25,'Equipo','2021-08-14','ALV_45','f106eb2487d11298dcd93cc97af1ac19.jpg',4),(26,' Equipo los grandes','2021-08-13','res555we','17c11b68286534ba59394db97ba7c0e8.jpg',2),(27,' Gripo nuee','2021-08-08','RES_19811','10180405841b76d7c028d7c0b1138ac6.jpg',1),(28,'  Gripo nuee','2021-08-08','RES_19811','e336b18bf689738246f3129a7815a7f4.jpg',1),(29,'  Equiposs','2021-08-14','ALV_45','b09d4be1678ec945fe06e15d7c26952b.jpg',3),(30,' Tuna FEm','2021-07-30','RES_234','ba18850777055f093a2b00d9ec728db4.jpg',1),(31,' Prueba','2021-08-15','res55511','af21933ecb961bab26a2794d845675ad.jpg',2);
/*!40000 ALTER TABLE `grupo_universitario` ENABLE KEYS */;
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
  `fecha` date DEFAULT NULL,
  `idEventosrealizados` int NOT NULL,
  `idAlumnoGrupo` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idSemestre` int NOT NULL,
  PRIMARY KEY (`idParticipacionAlumno`),
  KEY `Eventosrealizados1_idx` (`idEventosrealizados`),
  KEY `AlumnoGrupo1_idx` (`idAlumnoGrupo`),
  KEY `Usuario1_idx` (`idUsuario`),
  KEY `Semestre2_idx` (`idSemestre`),
  CONSTRAINT `AlumnoGrupo1` FOREIGN KEY (`idAlumnoGrupo`) REFERENCES `alumnogrupo` (`idAlumnoGrupo`),
  CONSTRAINT `Eventosrealizados1` FOREIGN KEY (`idEventosrealizados`) REFERENCES `eventos_realizados` (`idEventosrealizados`),
  CONSTRAINT `Semestre2` FOREIGN KEY (`idSemestre`) REFERENCES `semestre` (`idSemestre`),
  CONSTRAINT `Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participacionalumno`
--

LOCK TABLES `participacionalumno` WRITE;
/*!40000 ALTER TABLE `participacionalumno` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'71856595','Ximena Azucena','Coral Crispin','Femenino','Av. Anta 345','coral@correo.com','965841236'),(2,'96385274','Claudia Alejandra','Briceño Pulache','Feminino','Jr. Las piedras 342','Claudia@correo.com','965874125'),(3,'96587451','Jamil Sean Paul','Morales Bermudes','Masculino','Av. Tupac Amaru','reforma@agraria.com','745865232'),(4,'85456958','Pedro ','Castillo Terrones','Masculino','Av. Chota','lapiz@peruLibre.com','974854568'),(5,'74854585','Julio ','Poterico Huamayali','Masculino','Jr. las manzanas','rector@unasam.com','965874123'),(6,'12345678','Julio','Agosto','Masculino','Los Planos ','Correo@correo.com ','34567688'),(7,'1234563','Maria','Bellido','Femenino','Las Flores ','Correo2@correo.com ','34567872'),(8,'34554433','Maricarmen','Medina','Femenino','Av. Los Angeles ','correF@correo.com ','234545676'),(9,'54678799','Jesenia Judith','Melgarejo Principe','Femenino','Shancayan ','jes@gmail.com ','998876543'),(10,'23623644','Martin','Melgarejo Principe','Masculino','Av. Los Angeles ','correo@defg.nom ','21513673');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedencia`
--

LOCK TABLES `procedencia` WRITE;
/*!40000 ALTER TABLE `procedencia` DISABLE KEYS */;
INSERT INTO `procedencia` VALUES (1,'Ayacucho'),(2,'Chimbote'),(3,'Huaraz'),(4,'Carhuaz'),(5,'Yungay'),(6,'Huaraz'),(7,'Huaraz'),(8,'Huaraz'),(9,'Huaraz'),(10,'Huaraz');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resolucionxbeneficio`
--

LOCK TABLES `resolucionxbeneficio` WRITE;
/*!40000 ALTER TABLE `resolucionxbeneficio` DISABLE KEYS */;
INSERT INTO `resolucionxbeneficio` VALUES (1,'123','2021-05-12','completado',1),(2,'456','2021-05-19','pendiente',2),(3,'543','2021-05-14','completado',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semestre`
--

LOCK TABLES `semestre` WRITE;
/*!40000 ALTER TABLE `semestre` DISABLE KEYS */;
INSERT INTO `semestre` VALUES (1,'2021-I','2021-04-15','2021-08-15','Activo'),(2,'2020-II','2020-08-08','2020-12-12','Inactivo');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_grupo`
--

LOCK TABLES `tipo_grupo` WRITE;
/*!40000 ALTER TABLE `tipo_grupo` DISABLE KEYS */;
INSERT INTO `tipo_grupo` VALUES (1,'Musica'),(2,'Deporte'),(3,'Danza'),(4,'Academico');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2021-08-15  2:52:12
