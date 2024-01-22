CREATE DATABASE  IF NOT EXISTS `rvr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rvr`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: rvr
-- ------------------------------------------------------
-- Server version	8.1.0

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
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `estado` varchar(45) NOT NULL DEFAULT 'En camino',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido`),
  KEY `usuario_fk_idx` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,1,'entregado','2024-01-17 23:00:00'),(7,1,'En camino','2024-01-22 19:13:38'),(8,2,'En camino','2024-01-22 19:16:04');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `precios`
--

DROP TABLE IF EXISTS `precios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `precios` (
  `id_precios` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `precio` int DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_precios`),
  KEY `producto_fk_idx` (`id_producto`),
  CONSTRAINT `producto_fk` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `precios`
--

LOCK TABLES `precios` WRITE;
/*!40000 ALTER TABLE `precios` DISABLE KEYS */;
INSERT INTO `precios` VALUES (1,1,50,'2024-01-18 11:37:37'),(2,2,15,'2024-01-18 11:37:37'),(3,3,600,'2024-01-18 11:37:37'),(4,4,650,'2024-01-18 11:37:37'),(5,5,120,'2024-01-18 11:37:37'),(6,6,130,'2024-01-18 11:37:37'),(7,7,800,'2024-01-18 11:37:37'),(8,8,300,'2024-01-18 11:37:37'),(9,9,200,'2024-01-18 11:37:37'),(10,10,850,'2024-01-18 11:37:37'),(11,11,100,'2024-01-18 11:37:37'),(12,12,210,'2024-01-18 11:37:37'),(13,13,80,'2024-01-18 11:37:37'),(14,14,110,'2024-01-18 11:37:37'),(15,15,55,'2024-01-18 11:37:37'),(16,16,60,'2024-01-18 11:37:37'),(17,17,900,'2024-01-18 11:37:37'),(18,18,140,'2024-01-18 11:37:37'),(19,19,320,'2024-01-18 11:37:37'),(20,20,220,'2024-01-18 11:37:37'),(21,21,115,'2024-01-18 11:37:37'),(22,22,1000,'2024-01-18 11:37:37'),(23,23,230,'2024-01-18 11:37:37'),(24,24,340,'2024-01-18 11:37:37'),(25,25,1050,'2024-01-18 11:37:37'),(26,26,1100,'2024-01-18 11:37:37'),(27,27,1150,'2024-01-18 11:37:37'),(28,28,1200,'2024-01-18 11:37:37'),(29,29,1250,'2024-01-18 11:37:37'),(30,30,30,'2024-01-18 11:37:37'),(31,31,35,'2024-01-18 11:37:37'),(32,32,20,'2024-01-18 11:37:37'),(33,33,25,'2024-01-18 11:37:37'),(34,34,30,'2024-01-18 11:37:37'),(35,42,500,'2024-01-19 20:19:52'),(36,36,300,'2024-01-19 20:20:37'),(37,35,350,'2024-01-19 20:21:12'),(38,36,300,'2024-01-19 20:21:12'),(39,37,200,'2024-01-19 20:21:12'),(40,38,600,'2024-01-19 20:21:12'),(41,39,400,'2024-01-19 20:21:12'),(42,40,250,'2024-01-19 20:21:12'),(43,41,700,'2024-01-19 20:21:12'),(44,42,500,'2024-01-19 20:21:12'),(45,25,1350,'2024-01-21 19:18:47');
/*!40000 ALTER TABLE `precios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id_producto` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `marca` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `subcategoria` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'airpods pro',10,'apple','periferico','auriculares','airpods pro de 2a generacion con estuche de carga inalambrica de color blanco'),(2,'cargador',15,'apple','periferico','cargador','cargador wireless para airpods de color blanco'),(3,'iphone 14',15,'apple','dispositivo-movil','','iphone 14 plus 128gb '),(4,'iphone 15',9,'apple','dispositivo-movil','','iphone 15 pro 256gb color titanio azul'),(5,'prime z790',20,'asus','componente','placa base','placa base de alta gama con wifi'),(6,'rog maximus z790 hero',4,'asus','componente','placa base','placa base de alta gama con wifi customizada con la tematica de evangelion'),(7,'tuf-gaming-a15',5,'asus','portatil','','portatil con procesador amd ryzen 77735hs, 16gb de ram, 512gb de ssd y una rtx 4050'),(8,'rtx-4070',15,'asus','componente','tarjeta grafica','asus tuf gaming geforce rtx 4070 ti oc 12gb de memoria gráfica gddr6x'),(9,'tuf-gaming-vg249q1a',15,'asus','monitor','','asus tuf gaming vg249q1a 238 led panel ips con resolución fullhd y una tasa de refresco de 165hz con tecnología freesync'),(10,'vivobook go e1504fa',25,'asus','portatil','','portatil con procesador amd ryzen 5 7520u, 8gb de ram, disco duro de 512gb ssd y tarjeta gráfica radeon 610m'),(11,'cv650',15,'corsair','componente','fuente de alimentacion','potencia de 650w con certificado 80 plus bronze'),(12,'xeneon 27qhd240',19,'corsair','monitor','','pantalla de 27 pulgadas con panel oled, tasa de refresco de 240hz con tecnología g-sync'),(13,'vengeance rgb',25,'corsair','componente','ram','conexión ddr5, clockrate 6000mhz, 32gb (2x16gb) de memoria, color negro'),(14,'rmx rm1000x',25,'corsair','componente','fuente de alimentacion','fuente de alimentación modular con potencia de 1000w con certificado 80 plus gold'),(15,'hs75-xb',10,'corsair','periferico','auriculares','auricular wireless gaming para xbox one x'),(16,'virtuoso-rgb',15,'corsair','periferico','auriculares','auriculares gaming inalambricos express'),(17,'aorus 5 se4',14,'gigabyte','portatil','','portátil con procesador intel core i7 12700h, 16gb de ram, 1tb ssd y una tarjeta gráfica rtx 3070'),(18,'b550 aorus elite v2',10,'gigabyte','componente','placa base','\nadmite ryzen 5000 de 3ª generación, ram ddr4 y pci-express\n'),(19,'rtx 3060',15,'gigabyte','componente','tarjeta grafica','\ngeforce rtx 3060 versión gaming oc con 12gb de memoria gráfica gddr6\n'),(20,'m28u',15,'gigabyte','monitor','','\npantalla de 28 pulgadas, tecnología led con resolución ultrahd 4k y tasa de refresco de 144hz con puerto usb-c\n'),(21,'ud850gm pg5',15,'gigabyte','componente','fuente de alimentacion','\nfuente de alimentación modular con 850w de potencia y certificado 80 plus gold \n'),(22,'pc platinum',5,'rvr','portatil','','\ncomputadora msi con tarjeta gráfica rtx 4090, procesador intel core i9 13980hx y 2 tb de memoria ssd\n'),(23,'g27cq4 e2',15,'msi','monitor','','\npantalla led curva de 27 pulgadas, tasa de refresco de 170hz con tecnología freesync\n'),(24,'amd radeon rx 6650',15,'msi','componente','tarjeta grafica','\ntarjeta grádica con 8gb de memoria gddr6\n'),(25,'rog g16ch',8,'asus','sobremesa','','\npc con procesador intel core i7 13700kf, 32gb de ram, 1tb de ssd y tarjeta gráfica rtx 4080\n'),(26,'omen 45l',10,'hp','sobremesa','','\npc con procesador intel core i9 12900k, 32gb de ram, 2tb de ssd y una tarjeta gráfica rtx 3080ti\n'),(27,'pc gold',15,'rvr','sobremesa','','\npc con procesador intel i5 12400f, 16gb de ram, 1tb de ssd y tarjeta gráfica rtx 3060 de 12gb\n'),(28,'pc silver',15,'rvr','sobremesa','','\npc con procesador intel i3 8400f, 8gb de ram, 1tb de ssd y tarjeta gráfica rtx 2060\n'),(29,'mag infinite s3',10,'msi','sobremesa','','\npc con procesador intel core i7 13700f, 16gb de ram, 1tb de ssd y tarjeta gráfica rtx 4070\n'),(30,'k65 pro mini',20,'corsair','periferico','teclado','\nteclado optico mecanico gaming rgb\n'),(31,'huntman mini',25,'razer','periferico','teclado','\nteclado gaming con rgb y switch optico negro\n'),(32,'nightsabre wireless',25,'corsair','periferico','raton','\nraton gaming inalambrico con 26000 dpi\n'),(33,'x200',25,'hp','periferico','raton','\nraton negro inalambrico con 1600 dpi\n'),(34,'scimitar',15,'corsair','periferico','raton','\nraton gaming optico con 18000 dpi y rgb\n'),(35,'redmi pad se 11',10,'xiaomi','dispositivo-movil','','\ntablet con 8gb de ram y 256gb de almacenamiento. color gris grafito\n'),(36,'pad 28k',15,'xiaomi','dispositivo-movil','','\ntablet gris con 8gb de ram y 256gb de almacenamiento\n\n'),(37,'galaxy a14',15,'samsung','dispositivo-movil','','\nSmartphone con 4gb de ram y 128gb color verde libre\n'),(38,'ipad air 2022',10,'apple','dispositivo-movil','','\ntablet azul con 4gb de ram y 256gb de almacenamiento\n'),(39,'galaxy active pro',15,'samsung','dispositivo-movil','','\nTablet negra con 6gb de ram y 128gb de almacenamiento\n'),(40,'redmi a2',15,'xiaomi','dispositivo-movil','','\nSmartphone negro con 8gb de ram y 128gb de almacenamiento\n\n\n\n\n\n\n\n\n\n\n\n'),(41,'x6 pro',20,'poco','dispositivo-movil','','\nSmartphone negro con tecnología 5G, 12gb de ram y 512gb de almacenamiento\n\n\n\n\n\n\n\n\n\n\n'),(42,'rtx 4060',20,'zotac','componente','tarjeta grafica','\nTarjeta gráfica con 2 ventiladores, 8gb de memoria gráfica gddr6 y conexión dlss3\n\n\n\n\n\n\n\n\n\n');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_pedido`
--

DROP TABLE IF EXISTS `productos_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos_pedido` (
  `id_productos_pedido` int NOT NULL AUTO_INCREMENT,
  `id_producto` int NOT NULL,
  `id_pedido` int NOT NULL,
  `precio` int NOT NULL,
  `cantidad` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_productos_pedido`),
  KEY `pedido_idx` (`id_pedido`),
  KEY `producto_idx` (`id_producto`),
  CONSTRAINT `pedido_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  CONSTRAINT `producto_comprado_fk` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_pedido`
--

LOCK TABLES `productos_pedido` WRITE;
/*!40000 ALTER TABLE `productos_pedido` DISABLE KEYS */;
INSERT INTO `productos_pedido` VALUES (1,2,1,15,1),(10,13,1,80,2),(11,23,1,230,1),(12,6,7,130,1),(13,17,7,900,1),(14,25,7,1350,2),(15,4,8,650,1),(16,12,8,210,1);
/*!40000 ALTER TABLE `productos_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contraseña` char(60) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Rubén','Valverde','rubenvr@msmk.university','$2y$10$aLiSeF2HG60iZMWu.9C26OXTiAh7.XpmhpwV9MwTN4jRsCmEjRSjC'),(2,'Ricardo','Ramos','ricardo@gmail.com','$2y$10$Kg1hgOe4DJzdG93gHJbnIOIYOQbcStXdsRPcqTe0X3gIhuMfImaba');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-22 20:31:58
