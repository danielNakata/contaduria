/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.28-MariaDB : Database - contadb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`contadb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `contadb`;

/*Table structure for table `catconceptosresultado` */

DROP TABLE IF EXISTS `catconceptosresultado`;

CREATE TABLE `catconceptosresultado` (
  `idfila` int(11) NOT NULL,
  `idorden` int(11) NOT NULL,
  `concepto` varchar(255) DEFAULT NULL,
  `multiplicador` int(11) NOT NULL DEFAULT 1,
  `pctggravado` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `monto` decimal(10,6) NOT NULL,
  `excento` decimal(10,6) NOT NULL,
  `gravado` decimal(10,6) DEFAULT NULL,
  `idestatus` int(11) NOT NULL,
  `fereg` timestamp NOT NULL DEFAULT current_timestamp(),
  `femod` datetime DEFAULT NULL,
  PRIMARY KEY (`idfila`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catconceptosresultado` */

insert  into `catconceptosresultado`(`idfila`,`idorden`,`concepto`,`multiplicador`,`pctggravado`,`monto`,`excento`,`gravado`,`idestatus`,`fereg`,`femod`) values 
(1,1,'Salario comodin',1,1.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:13:33',NULL),
(2,2,'Tiempo Extra comodin',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:13:57',NULL),
(3,3,'Dia de Descanso Laborado',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:14:08',NULL),
(4,4,'Prima Dominical',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:14:14',NULL),
(5,5,'Totales comodin',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:14:22',NULL),
(6,6,'Limite Inferior ISR',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:14:25',NULL),
(7,7,'Excedente Limite Inferior ISR',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:15:14',NULL),
(8,8,'Porcentaje Aplicable Limite Inferior ISR',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:15:26',NULL),
(9,9,'ISR Marginal',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:15:33',NULL),
(10,10,'Cuota Fija',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:15:39',NULL),
(11,11,'Subsidio al Empleo Correspondiente',-1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:16:04',NULL),
(12,12,'ISR a Retener comodin',1,0.000000,0.000000,0.000000,0.000000,1,'2023-09-23 06:16:22',NULL);

/*Table structure for table `catjornadas` */

DROP TABLE IF EXISTS `catjornadas`;

CREATE TABLE `catjornadas` (
  `idjornada` int(11) NOT NULL,
  `jornada` varchar(50) DEFAULT NULL,
  `maxhorastrabajo` int(11) NOT NULL DEFAULT 8,
  `maxhorasextras` int(11) NOT NULL DEFAULT 1,
  `annio` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  `fereg` timestamp NOT NULL DEFAULT current_timestamp(),
  `femod` datetime DEFAULT NULL,
  PRIMARY KEY (`idjornada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catjornadas` */

insert  into `catjornadas`(`idjornada`,`jornada`,`maxhorastrabajo`,`maxhorasextras`,`annio`,`idestatus`,`fereg`,`femod`) values 
(1,'diurna',8,4,2023,1,'2023-09-23 05:38:04',NULL),
(2,'nocturna',7,3,2023,1,'2023-09-23 05:38:14',NULL),
(3,'mixta',7,3,2023,1,'2023-09-23 05:38:23',NULL);

/*Table structure for table `catoperadores` */

DROP TABLE IF EXISTS `catoperadores`;

CREATE TABLE `catoperadores` (
  `idoperador` int(11) NOT NULL,
  `operador` varchar(50) NOT NULL,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idoperador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catoperadores` */

insert  into `catoperadores`(`idoperador`,`operador`,`idestatus`) values 
(1,'ninguno',1),
(2,'suma',1),
(3,'multiplicador',1);

/*Table structure for table `catparametros` */

DROP TABLE IF EXISTS `catparametros`;

CREATE TABLE `catparametros` (
  `idparametro` bigint(20) NOT NULL,
  `parametro` varchar(255) NOT NULL,
  `valor` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `idoperador` int(11) NOT NULL DEFAULT 1,
  `idunidad` int(11) NOT NULL DEFAULT 1,
  `idperiodo` int(11) NOT NULL DEFAULT 1,
  `limiteinf` decimal(10,6) DEFAULT 0.000000,
  `limitemax` decimal(10,6) DEFAULT 0.000000,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  `annio` int(11) NOT NULL,
  `aplicaisr` int(11) NOT NULL DEFAULT 0,
  `pctgaplicaisr` decimal(10,6) DEFAULT 0.000000,
  `fereg` timestamp NOT NULL DEFAULT current_timestamp(),
  `femod` datetime DEFAULT NULL,
  PRIMARY KEY (`idparametro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catparametros` */

insert  into `catparametros`(`idparametro`,`parametro`,`valor`,`idoperador`,`idunidad`,`idperiodo`,`limiteinf`,`limitemax`,`idestatus`,`annio`,`aplicaisr`,`pctgaplicaisr`,`fereg`,`femod`) values 
(1,'prima dominical',51.820000,1,1,2,51.820000,51.820000,1,2023,0,0.000000,'2023-09-21 00:12:37',NULL),
(2,'uma diaria',103.740000,1,1,1,103.740000,103.740000,1,2023,0,0.000000,'2023-09-21 00:12:38',NULL),
(3,'salario minimo general',207.440000,1,1,1,207.440000,414.880000,1,2023,2,100.000000,'2023-09-21 00:12:38',NULL),
(4,'salario minimo general frontera',312.410000,1,1,1,312.410000,624.820000,1,2023,2,100.000000,'2023-09-21 00:12:38',NULL),
(5,'horas extras dobles',2.000000,2,3,7,1.000000,3.000000,1,2023,2,50.000000,'2023-09-21 00:12:38',NULL),
(6,'horas extras triples',3.000000,2,3,7,4.000000,8.000000,1,2023,1,100.000000,'2023-09-21 00:12:38',NULL);

/*Table structure for table `catperiodos` */

DROP TABLE IF EXISTS `catperiodos`;

CREATE TABLE `catperiodos` (
  `idperiodo` int(11) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `totaldias` int(11) NOT NULL DEFAULT 1,
  `maxhorasextrasdobles` int(11) DEFAULT NULL,
  `maxhorasextrastriples` int(11) DEFAULT NULL,
  `maxhorasextrasdoblesexcentas` int(11) NOT NULL,
  `diasdescanso` int(11) DEFAULT 0,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idperiodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catperiodos` */

insert  into `catperiodos`(`idperiodo`,`periodo`,`totaldias`,`maxhorasextrasdobles`,`maxhorasextrastriples`,`maxhorasextrasdoblesexcentas`,`diasdescanso`,`idestatus`) values 
(1,'diario',1,1,0,1,0,1),
(2,'semanal',7,9,0,7,1,1),
(3,'quincenal',15,18,0,14,2,1),
(4,'mensual',30,36,0,28,4,1),
(5,'decenales',10,12,0,10,1,1),
(6,'anual',365,468,0,175,52,1),
(7,'hora',0,0,0,0,0,1);

/*Table structure for table `catunidades` */

DROP TABLE IF EXISTS `catunidades`;

CREATE TABLE `catunidades` (
  `idunidad` int(11) NOT NULL,
  `unidad` varchar(50) NOT NULL,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idunidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `catunidades` */

insert  into `catunidades`(`idunidad`,`unidad`,`idestatus`) values 
(1,'pesos',1),
(2,'porcentaje',1),
(3,'horas',1);

/*Table structure for table `rangosisr` */

DROP TABLE IF EXISTS `rangosisr`;

CREATE TABLE `rangosisr` (
  `idrango` bigint(20) NOT NULL,
  `idperiodo` int(11) NOT NULL,
  `annio` int(11) NOT NULL,
  `limiteinferior` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `limitesuperior` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `cuotafija` decimal(10,6) NOT NULL DEFAULT 0.000000,
  `pctgaplica` decimal(10,6) NOT NULL,
  `idestatus` int(11) NOT NULL DEFAULT 1,
  `orden` int(11) DEFAULT NULL,
  `fereg` timestamp NOT NULL DEFAULT current_timestamp(),
  `femod` datetime DEFAULT NULL,
  PRIMARY KEY (`idrango`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `rangosisr` */

insert  into `rangosisr`(`idrango`,`idperiodo`,`annio`,`limiteinferior`,`limitesuperior`,`cuotafija`,`pctgaplica`,`idestatus`,`orden`,`fereg`,`femod`) values 
(1,1,2023,0.010000,24.540000,0.000000,1.920000,1,1,'2023-09-21 00:13:33',NULL),
(2,1,2023,24.540000,208.290000,0.470000,6.400000,1,2,'2023-09-21 00:13:33',NULL),
(3,1,2023,208.300000,366.050000,12.230000,10.880000,1,3,'2023-09-21 00:13:33',NULL),
(4,1,2023,366.060000,425.520000,29.400000,16.000000,1,4,'2023-09-21 00:13:33',NULL),
(5,1,2023,425.530000,509.460000,38.910000,17.920000,1,5,'2023-09-21 00:13:33',NULL),
(6,1,2023,509.470000,1027.520000,53.950000,21.360000,1,6,'2023-09-21 00:13:33',NULL),
(7,1,2023,1027.530000,1619.510000,164.610000,23.520000,1,7,'2023-09-21 00:13:33',NULL),
(8,1,2023,1619.520000,3091.900000,303.850000,30.000000,1,8,'2023-09-21 00:13:33',NULL),
(9,1,2023,3091.910000,4122.540000,745.560000,32.000000,1,9,'2023-09-21 00:13:33',NULL),
(10,1,2023,4122.550000,9999.999999,1075.370000,34.000000,1,10,'2023-09-21 00:13:33',NULL),
(11,1,2023,9999.999999,9999.999999,3878.690000,35.000000,1,11,'2023-09-21 00:13:33',NULL),
(12,2,2023,0.010000,171.780000,0.000000,1.920000,1,1,'2023-09-21 00:13:33',NULL),
(13,2,2023,171.790000,1458.030000,3.290000,6.400000,1,2,'2023-09-21 00:13:33',NULL),
(14,2,2023,1458.040000,2562.350000,85.610000,10.880000,1,3,'2023-09-21 00:13:33',NULL),
(15,2,2023,2562.360000,2978.640000,205.800000,16.000000,1,4,'2023-09-21 00:13:33',NULL),
(16,2,2023,2978.650000,3566.220000,272.370000,17.920000,1,5,'2023-09-21 00:13:33',NULL),
(17,2,2023,3566.230000,7192.640000,377.650000,21.360000,1,6,'2023-09-21 00:13:33',NULL),
(18,2,2023,7192.650000,9999.999999,1152.270000,23.520000,1,7,'2023-09-21 00:13:33',NULL),
(19,2,2023,9999.999999,9999.999999,2126.950000,30.000000,1,8,'2023-09-21 00:13:33',NULL),
(20,2,2023,9999.999999,9999.999999,5218.920000,32.000000,1,9,'2023-09-21 00:13:33',NULL),
(21,2,2023,9999.999999,9999.999999,7527.590000,34.000000,1,10,'2023-09-21 00:13:34',NULL),
(22,2,2023,9999.999999,9999.999999,9999.999999,35.000000,1,11,'2023-09-21 00:13:34',NULL),
(23,5,2023,0.010000,245.400000,0.000000,1.920000,1,1,'2023-09-21 00:13:34',NULL),
(24,5,2023,245.410000,2082.900000,4.700000,6.400000,1,2,'2023-09-21 00:13:34',NULL),
(25,5,2023,2082.910000,3660.500000,122.300000,10.880000,1,3,'2023-09-21 00:13:34',NULL),
(26,5,2023,3660.510000,4255.200000,294.000000,16.000000,1,4,'2023-09-21 00:13:34',NULL),
(27,5,2023,4255.210000,5094.600000,389.100000,17.920000,1,5,'2023-09-21 00:13:34',NULL),
(28,5,2023,5094.610000,9999.999999,539.500000,21.360000,1,6,'2023-09-21 00:13:34',NULL),
(29,5,2023,9999.999999,9999.999999,1646.100000,23.520000,1,7,'2023-09-21 00:13:34',NULL),
(30,5,2023,9999.999999,9999.999999,3038.500000,30.000000,1,8,'2023-09-21 00:13:34',NULL),
(31,5,2023,9999.999999,9999.999999,7455.600000,32.000000,1,9,'2023-09-21 00:13:34',NULL),
(32,5,2023,9999.999999,9999.999999,9999.999999,34.000000,1,10,'2023-09-21 00:13:34',NULL),
(33,5,2023,9999.999999,9999.999999,9999.999999,35.000000,1,11,'2023-09-21 00:13:34',NULL),
(34,3,2023,0.010000,368.100000,0.000000,1.920000,1,1,'2023-09-21 00:13:34',NULL),
(35,3,2023,368.110000,3124.350000,7.050000,6.400000,1,2,'2023-09-21 00:13:35',NULL),
(36,3,2023,3124.360000,5490.750000,183.450000,10.880000,1,3,'2023-09-21 00:13:35',NULL),
(37,3,2023,5490.760000,6382.800000,441.000000,16.000000,1,4,'2023-09-21 00:13:35',NULL),
(38,3,2023,6382.810000,7641.900000,583.650000,17.920000,1,5,'2023-09-21 00:13:35',NULL),
(39,3,2023,7641.910000,9999.999999,809.250000,21.360000,1,6,'2023-09-21 00:13:35',NULL),
(40,3,2023,9999.999999,9999.999999,2469.150000,23.520000,1,7,'2023-09-21 00:13:35',NULL),
(41,3,2023,9999.999999,9999.999999,4557.750000,30.000000,1,8,'2023-09-21 00:13:35',NULL),
(42,3,2023,9999.999999,9999.999999,9999.999999,32.000000,1,9,'2023-09-21 00:13:35',NULL),
(43,3,2023,9999.999999,9999.999999,9999.999999,34.000000,1,10,'2023-09-21 00:13:35',NULL),
(44,3,2023,9999.999999,9999.999999,9999.999999,35.000000,1,11,'2023-09-21 00:13:35',NULL),
(45,4,2023,0.010000,746.040000,0.000000,1.920000,1,1,'2023-09-21 00:13:35',NULL),
(46,4,2023,746.050000,6332.050000,14.320000,6.400000,1,2,'2023-09-21 00:13:35',NULL),
(47,4,2023,6332.060000,9999.999999,371.830000,10.880000,1,3,'2023-09-21 00:13:35',NULL),
(48,4,2023,9999.999999,9999.999999,893.630000,16.000000,1,4,'2023-09-21 00:13:35',NULL),
(49,4,2023,9999.999999,9999.999999,1182.880000,17.920000,1,5,'2023-09-21 00:13:35',NULL),
(50,4,2023,9999.999999,9999.999999,1640.180000,21.360000,1,6,'2023-09-21 00:13:35',NULL),
(51,4,2023,9999.999999,9999.999999,5004.120000,23.520000,1,7,'2023-09-21 00:13:35',NULL),
(52,4,2023,9999.999999,9999.999999,9236.890000,30.000000,1,8,'2023-09-21 00:13:35',NULL),
(53,4,2023,9999.999999,9999.999999,9999.999999,32.000000,1,9,'2023-09-21 00:13:35',NULL),
(54,4,2023,9999.999999,9999.999999,9999.999999,34.000000,1,10,'2023-09-21 00:13:35',NULL),
(55,4,2023,9999.999999,9999.999999,9999.999999,35.000000,1,11,'2023-09-21 00:13:35',NULL),
(56,6,2023,0.010000,2238.120000,0.000000,1.920000,1,1,'2023-09-21 00:13:35',NULL),
(57,6,2023,8952.500000,9999.999999,171.880000,6.400000,1,2,'2023-09-21 00:13:35',NULL),
(58,6,2023,9999.999999,9999.999999,4461.940000,10.880000,1,3,'2023-09-21 00:13:35',NULL),
(59,6,2023,9999.999999,9999.999999,9999.999999,16.000000,1,4,'2023-09-21 00:13:35',NULL),
(60,6,2023,9999.999999,9999.999999,9999.999999,17.920000,1,5,'2023-09-21 00:13:35',NULL),
(61,6,2023,9999.999999,9999.999999,9999.999999,21.360000,1,6,'2023-09-21 00:13:35',NULL),
(62,6,2023,9999.999999,9999.999999,9999.999999,23.520000,1,7,'2023-09-21 00:13:35',NULL),
(63,6,2023,9999.999999,9999.999999,9999.999999,30.000000,1,8,'2023-09-21 00:13:35',NULL),
(64,6,2023,9999.999999,9999.999999,9999.999999,32.000000,1,9,'2023-09-21 00:13:35',NULL),
(65,6,2023,9999.999999,9999.999999,9999.999999,34.000000,1,10,'2023-09-21 00:13:35',NULL),
(66,6,2023,9999.999999,9999.999999,9999.999999,35.000000,1,11,'2023-09-21 00:13:35',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
