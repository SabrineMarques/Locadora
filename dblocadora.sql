CREATE DATABASE  IF NOT EXISTS `dblocadora` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dblocadora`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: dblocadora
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acesso` (
  `id_acesso` int NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `senha` varchar(40) NOT NULL,
  PRIMARY KEY (`id_acesso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'sabrine','1234'),(2,'administrador','admin');
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluga`
--

DROP TABLE IF EXISTS `aluga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aluga` (
  `id_aluguel` int NOT NULL AUTO_INCREMENT,
  `livro` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `data_aluguel` varchar(50) NOT NULL,
  `data_devolucao` varchar(50) NOT NULL,
  `data_previsao` varchar(45) NOT NULL,
  PRIMARY KEY (`id_aluguel`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluga`
--

LOCK TABLES `aluga` WRITE;
/*!40000 ALTER TABLE `aluga` DISABLE KEYS */;
INSERT INTO `aluga` VALUES (32,'Demon Slayer VOL 1','Leonardo de Castro','2023-05-09','','2023-05-16'),(33,'Demon Slayer VOL 2','Sabrine','2023-05-02','','2023-05-30'),(34,'O Homem de giz ','Matheus','2023-05-10','2023-05-13','2023-05-10'),(37,'Moby Dick ','Mayara','2023-05-10','','2023-05-31'),(31,'O Homem de giz ','Matheus','2023-05-08','2023-05-10','2023-05-23');
/*!40000 ALTER TABLE `aluga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
  `id_editora` int NOT NULL AUTO_INCREMENT,
  `nome_editora` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Companhia de Letras','São Paulo'),(3,'Galera Record','Rio de Janeiro'),(4,'Record','Maranhão'),(5,'Intrínseca','Fortaleza'),(10,'Globo','Gramado'),(11,'Suma','Salvador'),(14,'Rocco','Brasília');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `id_livro` int NOT NULL AUTO_INCREMENT,
  `nome_livro` varchar(80) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `lancamento` year NOT NULL,
  PRIMARY KEY (`id_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,'O Homem de giz ','Intrínseca','C. J. Tudor',2020),(4,'É Assim Que Acaba','Record','Colleen Hoover',2023),(23,'É assim que começa ','Record','Colleen Hoover',2015),(24,'Demon Slayer VOL 2','Intrínseca','Alice Eleonor',2023),(25,'Demon Slayer VOL 1','Intrínseca','Alice Eleonor',2019),(27,'Outsider','Globo','Stephen King',2020),(28,'A Biblioteca Da Meia Noite','Rocco','Matt Haig',2021),(29,'Moby Dick ','Suma','Herman Melville.',2021),(30,'Guerra e Paz ','Galera Record','Lev Tolstói',2022);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (7,'Graciele','+55 85 37296629','Fortaleza','graciele@gmail.com','Rua X, 432','018.099.073-06'),(8,'Matheus','+55 85 47284924','Pacatuba','matheus@gmail.com','Rua XXIX, 123','434.143.124-43'),(20,'Dione Moura','+55 85 14693648','São Paulo','dione_ps2@hotmail.com','Rua A, 543','123.123.123-43'),(19,'Leonardo de Castro','+55 85 13755386','Fortaleza','leleo@gmail.com','Rua A, 543','629.297.583-50'),(27,'Carlos Jhonata','+55 85 68396735','Fortaleza','jhon@gmail.com','Rua D, 54',''),(28,'Sabrine','+55 85 18237124','Fortaleza','sasarabinho83@gmail.com','Rua A, 543','629.297.583-59'),(30,'Mayara','+55 85 90228922','Fortaleza','mayara@hotmail.com','Av. Matoso Filho, 1211',''),(31,'Micaely','+55 85 32352166','Fortaleza','micaely@gmail.com','Rua C, 12','');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-10 19:37:43
