-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 10:33 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electrotelfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `ID_ADMIN` char(50) NOT NULL,
  `NOMBRE_ADMIN` char(50) NOT NULL,
  `APELLIDO_ADMIN` char(50) NOT NULL,
  `EMAIL_ADMIN` char(50) NOT NULL,
  `CONTRASENA_ADMIN` char(50) NOT NULL,
  `ACCOUNT_TYPE` char(50) NOT NULL,
  `EDAD_ADMIN` int(11) NOT NULL,
  `DOMICILIO_ADMIN` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`ID_ADMIN`, `NOMBRE_ADMIN`, `APELLIDO_ADMIN`, `EMAIL_ADMIN`, `CONTRASENA_ADMIN`, `ACCOUNT_TYPE`, `EDAD_ADMIN`, `DOMICILIO_ADMIN`) VALUES
('master', 'master', 'master', 'master', 'eb0a191797624dd3a48fa681d3061212', 'Administrador', 1000, 'master');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` char(50) NOT NULL,
  `NOMBRE_CATEGORIA` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE_CATEGORIA`) VALUES
('L1590341000666', 'Material'),
('V1590341009281', 'Equipo');

-- --------------------------------------------------------

--
-- Table structure for table `incluye`
--

CREATE TABLE `incluye` (
  `ID_REPORTE` char(50) NOT NULL,
  `ID_ITEM` char(50) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incluye`
--

INSERT INTO `incluye` (`ID_REPORTE`, `ID_ITEM`, `CANTIDAD`) VALUES
('C1592777590461', 'H1592098898461', 5),
('D1593508998739', 'H1592098898461', 1),
('D1593508998739', 'L1592115082433', 1),
('D1593508998739', 'U1592722326698', 1),
('D1593508998739', 'W1592098925664', 1),
('M1592776832707', 'L1592115082433', 1),
('N1593205519067', 'H1592098898461', 1),
('P1592776405139', 'W1592098925664', 1),
('P1593906371756', 'H1592098898461', 10),
('S1592776799017', 'H1592098898461', 1),
('T1592776759216', 'U1592722326698', 1),
('U1592776764880', 'H1592098898461', 1),
('U1593995075267', 'H1592098898461', 1),
('W1592776427942', 'L1592115082433', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `address` char(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ip`
--

INSERT INTO `ip` (`address`, `timestamp`) VALUES
('::1', '2020-07-10 20:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ID_ITEM` char(50) NOT NULL,
  `ID_ADMIN` char(50) NOT NULL,
  `ID_CATEGORIA` char(50) NOT NULL,
  `NOMBRE_ITEM` char(50) NOT NULL,
  `NSERIE_ITEM` char(50) NOT NULL,
  `PRECIOEST_ITEM` float(8,2) NOT NULL,
  `PHOTOURL` char(200) NOT NULL,
  `FABRICANTE_ITEM` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ID_ITEM`, `ID_ADMIN`, `ID_CATEGORIA`, `NOMBRE_ITEM`, `NSERIE_ITEM`, `PRECIOEST_ITEM`, `PHOTOURL`, `FABRICANTE_ITEM`) VALUES
('H1592098898461', 'master', 'L1590341000666', 'RJ45 5M', '0000000100001', 10000.00, 'Empty', 'Logitech'),
('L1592115082433', 'master', 'V1590341009281', 'TP-LINK', 'TL-WR541G', 20000.00, 'Empty', 'TP-LINK'),
('U1592722326698', 'master', 'L1590341000666', 'C Coaxial RG6', 'RG610M', 30000.00, 'Empty', 'Kobalt'),
('W1592098925664', 'master', 'V1590341009281', 'Modem Arris', '000000015541', 40000.00, 'Empty', 'Arris');

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `ID_LABOR` char(50) NOT NULL,
  `NOMBRE_LABOR` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`ID_LABOR`, `NOMBRE_LABOR`) VALUES
('H1592040799193', 'Soporte'),
('S1592040762842', 'Instalación Eléctrica'),
('Y1592040787433', 'Cableado');

-- --------------------------------------------------------

--
-- Table structure for table `localizacion`
--

CREATE TABLE `localizacion` (
  `ID_LOCALIDAD` char(50) NOT NULL,
  `NOMBRE_LOCALIDAD` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localizacion`
--

INSERT INTO `localizacion` (`ID_LOCALIDAD`, `NOMBRE_LOCALIDAD`) VALUES
('F1592040741790', 'Calama'),
('H1592040747520', 'Antofagasta'),
('V1592040754670', 'San pedro');

-- --------------------------------------------------------

--
-- Table structure for table `reporte`
--

CREATE TABLE `reporte` (
  `ID_REPORTE` char(50) NOT NULL,
  `ID_LABOR` char(50) NOT NULL,
  `ID_TECNICO` char(50) NOT NULL,
  `ID_LOCALIDAD` char(50) NOT NULL,
  `FECHA_REPORTE` date NOT NULL,
  `COMENTARIO_REPORTE` char(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reporte`
--

INSERT INTO `reporte` (`ID_REPORTE`, `ID_LABOR`, `ID_TECNICO`, `ID_LOCALIDAD`, `FECHA_REPORTE`, `COMENTARIO_REPORTE`) VALUES
('C1592777590461', 'Y1592040787433', 'R1591591937491', 'F1592040741790', '2020-06-21', 'WORK'),
('D1593508998739', 'S1592040762842', 'R1591591937491', 'H1592040747520', '2020-06-30', ''),
('M1592776832707', 'S1592040762842', 'R1591591937491', 'F1592040741790', '2020-06-21', ''),
('N1593205519067', 'H1592040799193', 'R1591591937491', 'F1592040741790', '2020-06-26', ''),
('P1592776405139', 'Y1592040787433', 'R1591591937491', 'F1592040741790', '2020-06-21', ''),
('P1593906371756', 'Y1592040787433', 'O1592542201313', 'H1592040747520', '2020-07-04', ''),
('S1592776799017', 'H1592040799193', 'R1591591937491', 'F1592040741790', '2020-06-21', ''),
('T1592776759216', 'H1592040799193', 'R1591591937491', 'F1592040741790', '2020-06-21', ''),
('U1592776764880', 'S1592040762842', 'R1591591937491', 'F1592040741790', '2020-06-21', ''),
('U1593995075267', 'H1592040799193', 'P1590668579645', 'F1592040741790', '2020-07-05', ''),
('W1592776427942', 'H1592040799193', 'R1591591937491', 'F1592040741790', '2020-06-21', '');

-- --------------------------------------------------------

--
-- Table structure for table `tecnico`
--

CREATE TABLE `tecnico` (
  `ID_TECNICO` char(50) NOT NULL,
  `NOMBRE_TECNICO` char(50) NOT NULL,
  `APELLIDO_TECNICO` char(50) NOT NULL,
  `EMAIL_TECNICO` char(50) NOT NULL,
  `CONTRASENA_TECNICO` char(50) NOT NULL,
  `ACCOUNT_TYPE` char(50) NOT NULL,
  `EDAD_TECNICO` int(11) NOT NULL,
  `DOMICILIO_TECNICO` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tecnico`
--

INSERT INTO `tecnico` (`ID_TECNICO`, `NOMBRE_TECNICO`, `APELLIDO_TECNICO`, `EMAIL_TECNICO`, `CONTRASENA_TECNICO`, `ACCOUNT_TYPE`, `EDAD_TECNICO`, `DOMICILIO_TECNICO`) VALUES
('O1592542201313', 'Camila', 'Beltrán', 'fer@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tecnico', 21, 'Providencia #443'),
('P1590668579645', 'Ignacio', 'Garrido', 'esbt@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tecnico', 12, 'Kamac Mayu #583'),
('R1591591937491', 'Christopher', 'Diaz', 'cd@gmail.com', '202cb962ac59075b964b07152d234b70', 'Tecnico', 25, 'Grecia #565');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Indexes for table `incluye`
--
ALTER TABLE `incluye`
  ADD PRIMARY KEY (`ID_REPORTE`,`ID_ITEM`),
  ADD KEY `RELATIONSHIP_6_FK` (`ID_REPORTE`),
  ADD KEY `RELATIONSHIP_7_FK` (`ID_ITEM`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_ITEM`),
  ADD KEY `ESTA_FK` (`ID_CATEGORIA`),
  ADD KEY `GESTIONA_FK` (`ID_ADMIN`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`ID_LABOR`);

--
-- Indexes for table `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`ID_LOCALIDAD`);

--
-- Indexes for table `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`ID_REPORTE`),
  ADD KEY `REALIZA_FK` (`ID_TECNICO`),
  ADD KEY `PERTENECE_FK` (`ID_LOCALIDAD`),
  ADD KEY `ESTA_ASOCIADO_FK` (`ID_LABOR`);

--
-- Indexes for table `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`ID_TECNICO`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `incluye`
--
ALTER TABLE `incluye`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_REPORTE`) REFERENCES `reporte` (`ID_REPORTE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_ITEM`) REFERENCES `item` (`ID_ITEM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_ESTA` FOREIGN KEY (`ID_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_GESTIONA` FOREIGN KEY (`ID_ADMIN`) REFERENCES `administrador` (`ID_ADMIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `FK_ESTA_ASOCIADO` FOREIGN KEY (`ID_LABOR`) REFERENCES `labor` (`ID_LABOR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_PERTENECE` FOREIGN KEY (`ID_LOCALIDAD`) REFERENCES `localizacion` (`ID_LOCALIDAD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_REALIZA` FOREIGN KEY (`ID_TECNICO`) REFERENCES `tecnico` (`ID_TECNICO`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
