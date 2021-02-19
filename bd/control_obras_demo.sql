/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.17-MariaDB : Database - celicons_control_obras_demo
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`celicons_control_obras_demo` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `celicons_control_obras_demo`;

/*Table structure for table `cargo` */

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo` (
  `IdCargo` int(11) NOT NULL AUTO_INCREMENT,
  `IdTipo` varchar(11) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Sueldo` double(12,2) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdCargo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `cargo` */

insert  into `cargo`(`IdCargo`,`IdTipo`,`Descripcion`,`Sueldo`,`IdEstado`) values 
(1,'2','Sistemas',450.00,1),
(2,'3','OPERADOR DE MAQUINARIA',550.00,1),
(3,'7','Chofer de volqueta ',590.00,1),
(4,'7','Chofer de Tanquero',470.00,1),
(5,'2','Administrador de Maquinaria',700.00,1),
(6,'8','Gerente',1000.00,1),
(7,'9','Mecánico',550.00,1),
(8,'2','Ayudante',400.00,1),
(9,'10','Guardia',400.00,1);

/*Table structure for table `empleados` */

DROP TABLE IF EXISTS `empleados`;

CREATE TABLE `empleados` (
  `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT,
  `IdEmpresa` int(11) DEFAULT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `Identificacion` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `IdCargo` int(11) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdEmpleado`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empleados` */

insert  into `empleados`(`IdEmpleado`,`IdEmpresa`,`Nombres`,`Apellidos`,`Identificacion`,`Direccion`,`Telefono`,`Email`,`IdCargo`,`IdEstado`) values 
(1,1,'Stalin','Armijo','0802872341','Juan Montalvo','0980394871','stalinarmijo84@hotmail.com',1,0),
(2,1,'EMPLEADO 002','AP 002','1000895410','Norte','045655','miempresa@hotmail.com',1,0),
(3,1,'EMPLEADO 012','AP 012','33333333333','NORTE ASAA','04556666','miempresa@hotmail.com',1,0),
(4,1,'EMPLEADO 011','AP 011','44444455555','NORTE ASAAaaasasa','04556666','miempresa@hotmail.com',1,0),
(5,1,'Hector Julio','Zajia Navarrete','0924504095','Guayaquil','0','info@celiconstrucciones.com',2,1),
(6,1,'Juan Jose ','Palma Amaiquema','0926775297','Guayaquil','0','info@celiconstrucciones.com',2,1),
(7,1,'Merlin Waybel','Preciado Santos','0920950839','Guayaquil','0','info@celiconstrucciones.com',2,1),
(8,1,'Carlos Andres','Loor Gutierrez','0958037459','Guayaquil','0','info@celiconstrucciones.com',2,1),
(9,1,'Bolivar Patricio','Heredia Ortiz','0603592379','Guayaquil','0','info@celiconstrucciones.com',2,1),
(10,1,'Alex Brian','Lopez Torres','0958029092','Guayaquil','0','info@ilemental.com',2,1),
(11,1,'Manuel Tobias','Saldarriaga Casique','0920454162','Guayaquil','0','info@celiconstrucciones.com',5,1),
(12,1,'Alfonso ','Celi Atala','1306940352','Guayquil','0988749540','alfonsoceli@celiconstrucciones.com',6,1),
(13,3,'Yandri abel','Carreño Espinoza','1313235911','Tosagua','0','a@a',2,1),
(14,3,'Orley Orlando','Cedeño Espinoza','1308031705','Tosagua','0','a@a',4,1),
(15,3,'Guido Danilo','Andrade Delgado','1314793439','Tosagua','0','a@a',5,1),
(16,3,'Oscar Ivan','Ballesilla Godoy','0958066680','Tosagua','0','a@a',9,1),
(17,3,'Edgar Luis','Gonzalez Campoverde','1311358376','Tosagua','0','a@a',2,1),
(18,3,'Andres Ismail','Mendieta Mantilla','1314785096','Tosagua','0','a@a',2,1),
(19,3,'Francisco Gabriel','Piloso Molina','1724728231','Tosagua','0','a@a',8,1),
(20,3,'Nicolas Roger','Quiñonez Gonzalez','0801166620','Tosagua','0','a@a',3,1),
(21,3,'Henry Manuel','Velez Ganchozo','1315512234','Tosagua','0','a@a',2,1),
(22,3,'Cristian Jose','Yugcha Paredes','0201757937','Tosagua','0','a@a',7,1),
(23,1,'Juan Celio','Escobar Marichal','0906100359','Guayaquil','0','a@a',7,1),
(24,1,'Aaron Felipe','Gorotiza Leon','0953758802','Guayaquil','0','a@a',2,1);

/*Table structure for table `empresas` */

DROP TABLE IF EXISTS `empresas`;

CREATE TABLE `empresas` (
  `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Ruc` varchar(100) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Telefono` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdEmpresa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `empresas` */

insert  into `empresas`(`IdEmpresa`,`Descripcion`,`Ruc`,`Direccion`,`Telefono`,`Email`,`IdEstado`) values 
(1,'EMPRESA DEMO 001','999999999999','DIRECCION 001','00000000','miempresa@hotmail.com',1),
(3,'EMPRESA DEMO 002','999999999999','DIRECCION 002','00000000','miempresa@hotmail.com',1);

/*Table structure for table `equipos` */

DROP TABLE IF EXISTS `equipos`;

CREATE TABLE `equipos` (
  `IdEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `Aleas` varchar(100) DEFAULT NULL,
  `Tipo` varchar(100) DEFAULT NULL,
  `Marca` varchar(100) DEFAULT NULL,
  `Modelo` varchar(100) DEFAULT NULL,
  `Potencia` varchar(100) DEFAULT NULL,
  `Ano` varchar(100) DEFAULT NULL,
  `Matricula` varchar(100) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

/*Data for the table `equipos` */

insert  into `equipos`(`IdEquipo`,`Aleas`,`Tipo`,`Marca`,`Modelo`,`Potencia`,`Ano`,`Matricula`,`IdEstado`) values 
(1,'MINIC933','MINICARGADOR','CAT','REE222HL','2005RP','2017','GEER-8845',1),
(2,'RETRO S05','RETROEXCAVADORA','JCB','3C','92 HP','2014','0',1),
(3,'RETRO S53','RETROEXCAVADORA','JCB','3C','92 HP','2014','0',1),
(4,'RETRO S18','RETROEXCAVADORA','JCB','3CX','92 HP','2016','0',1),
(5,'MINI - CAT','MINICARGADOR','CATERPILLAR','242B3','56 HP','2012','0',1),
(6,'MINI - BOBCAT','MINICARGADOR','BOBCAT','175','56 HP','2011','0',1),
(7,'MINIEXC BLANCA','MINIEXCAVADORA','BOBCAR','E32','60 HP','2011','0',1),
(8,'MINIEXC 6 T','MINIEXCAVADORA','VOLVO','ECR58','90 HP','2012','0',1),
(9,'TRACTOR ','ORUGAS','JOHN DEERE','750J','156 HP','2012','a',1),
(10,'EXCAVADORA','ORUGAS','VOLVO','EC220BLC','165HP','2015','A',1),
(11,'RODILLO','VIBRATORIO','JCB','VM115','125HP','2015','A',1),
(12,'MOTONIVELADORA','RUEDAS','CATERPILLAR','120H','130HP','2004','A',1),
(13,'VOLQUETA','MULA','UD TRUCK','QUON','27TON','2015','GSS2010',1),
(14,'TANQUERO','AGUA','TOYOTA','0','0','1998','A',1);

/*Table structure for table `estado_obra` */

DROP TABLE IF EXISTS `estado_obra`;

CREATE TABLE `estado_obra` (
  `IdEstadoObra` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IdEstadoObra`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estado_obra` */

insert  into `estado_obra`(`IdEstadoObra`,`Estado`) values 
(0,'En Proceso'),
(1,'Terminado');

/*Table structure for table `estados` */

DROP TABLE IF EXISTS `estados`;

CREATE TABLE `estados` (
  `IdEstado` int(1) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`IdEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `estados` */

insert  into `estados`(`IdEstado`,`Estado`) values 
(0,'Inactivo'),
(1,'Activo');

/*Table structure for table `obras` */

DROP TABLE IF EXISTS `obras`;

CREATE TABLE `obras` (
  `IdObra` int(11) NOT NULL AUTO_INCREMENT,
  `IdEmpresa` int(1) DEFAULT NULL,
  `Obra` varchar(1000) DEFAULT NULL,
  `Ubicacion` varchar(100) DEFAULT NULL,
  `FechaInicio` date DEFAULT NULL,
  `IdEstadoObra` int(1) DEFAULT 0,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdObra`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `obras` */

insert  into `obras`(`IdObra`,`IdEmpresa`,`Obra`,`Ubicacion`,`FechaInicio`,`IdEstadoObra`,`IdEstado`) values 
(2,1,'Alquiler Garcia Goyena','Garcia Goyena','2021-01-01',0,1),
(3,1,'Alquiler Sauces','Sauces','2021-01-01',0,1),
(4,1,'Obreco Machala','Machala','2021-01-12',0,1),
(5,3,'GPM-FI-012 ','MANABI','2020-11-30',0,1);

/*Table structure for table `operaciones` */

DROP TABLE IF EXISTS `operaciones`;

CREATE TABLE `operaciones` (
  `IdOperacion` int(11) NOT NULL AUTO_INCREMENT,
  `IdEmpresa` int(11) DEFAULT NULL,
  `IdObra` int(11) DEFAULT NULL,
  `IdEquipo` int(11) DEFAULT NULL,
  `IdEmpleado` int(11) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `NroParte` varchar(10) DEFAULT NULL,
  `Horas` double(12,2) DEFAULT NULL,
  `Combustible` double(12,2) DEFAULT NULL,
  `Foto` varchar(1000) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdOperacion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `operaciones` */

insert  into `operaciones`(`IdOperacion`,`IdEmpresa`,`IdObra`,`IdEquipo`,`IdEmpleado`,`Fecha`,`NroParte`,`Horas`,`Combustible`,`Foto`,`IdEstado`) values 
(1,1,3,13,2,'2021-02-18','0025',8.00,23.25,'fotos_obra/grafic2.png',1);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `IdRol` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`IdRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `roles` */

insert  into `roles`(`IdRol`,`Descripcion`) values 
(1,'Administrador'),
(2,'Usuario');

/*Table structure for table `tipo_cargo` */

DROP TABLE IF EXISTS `tipo_cargo`;

CREATE TABLE `tipo_cargo` (
  `IdTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(100) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  PRIMARY KEY (`IdTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tipo_cargo` */

insert  into `tipo_cargo`(`IdTipo`,`Tipo`,`IdEstado`) values 
(1,'Administrativo',1),
(2,'Tecnico',1),
(3,'Operador',1),
(4,'Obrero',1),
(5,'Conserje',1),
(6,'CHOFER',0),
(7,'Choferes',1),
(8,'Gerente General',1),
(9,'Mecanico',1),
(10,'Guardia',1);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `IdEmpleado` int(11) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `Usuario` varchar(100) DEFAULT NULL,
  `Clave` varchar(100) DEFAULT NULL,
  `IdEstado` int(1) DEFAULT 1,
  `Elim` int(1) DEFAULT 1,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`IdUsuario`,`IdEmpleado`,`IdRol`,`Usuario`,`Clave`,`IdEstado`,`Elim`) values 
(1,1,1,'admin','admin',1,1),
(2,2,2,'test1','1234',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
