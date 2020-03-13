-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2020 at 01:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lookupentity`
--

CREATE TABLE `lookupentity` (
  `EntityId` int(11) NOT NULL,
  `EntityName` varchar(45) NOT NULL,
  `GroupId` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lookupentity`
--

INSERT INTO `lookupentity` (`EntityId`, `EntityName`, `GroupId`, `Status`) VALUES
(1, 'tblusers', 1, 1),
(2, 'tblroles', 1, 1),
(3, 'schools', 3, 1),
(4, 'hospitals', 3, 1),
(5, 'e-waste', 5, 1),
(6, 'bio waste', 5, 1),
(7, 'solidwaste', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lookupgroups`
--

CREATE TABLE `lookupgroups` (
  `GroupId` int(11) NOT NULL,
  `GroupName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lookupgroups`
--

INSERT INTO `lookupgroups` (`GroupId`, `GroupName`, `Status`) VALUES
(1, 'tables', 1),
(2, 'Organizations', 1),
(3, 'Waste Generators', 1),
(4, 'Waste Disposals', 1),
(5, 'Waste Types', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladdress`
--

CREATE TABLE `tbladdress` (
  `AddressId` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `ConcatNo` varchar(15) NOT NULL,
  `AlternateContactNo` varchar(15) DEFAULT NULL,
  `EmailId` varchar(45) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `VillageId` int(11) DEFAULT NULL,
  `Lattitude` varchar(45) DEFAULT NULL,
  `Longitude` varchar(45) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblbranchs`
--

CREATE TABLE `tblbranchs` (
  `BranchId` int(11) NOT NULL,
  `OrgId` int(11) NOT NULL,
  `BranchName` varchar(45) NOT NULL,
  `EntityId` int(11) NOT NULL,
  `Latitude` varchar(45) NOT NULL,
  `Longitude` varchar(45) NOT NULL,
  `Location` varchar(225) NOT NULL,
  `Status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblbranchs`
--

INSERT INTO `tblbranchs` (`BranchId`, `OrgId`, `BranchName`, `EntityId`, `Latitude`, `Longitude`, `Location`, `Status`) VALUES
(1, 3, 'narayana madhapur', 3, '17.4485835', '78.39080349999999', 'Madhapur, Hyderabad, Telangana, India', 1),
(2, 3, 'narayana amerpet', 3, '17.4375084', '78.4482441', 'Ameerpet, Hyderabad, Telangana, India', 1),
(3, 3, 'nb', 3, '17.4447068', '78.4663812', 'Begumpet, Hyderabad, Telangana, India', 1),
(4, 4, 'sri chaithanya', 4, '17.4432902', '78.4874663', 'Paradise Circle, Sandhu Apartment, Kalasiguda, Secunderabad, Telangana', 1),
(5, 4, 'sri uppal', 4, '17.434026', '78.5582652', 'Uppal, Hyderabad, Telangana, India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactdetails`
--

CREATE TABLE `tblcontactdetails` (
  `ContactId` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `BranchId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontactdetails`
--

INSERT INTO `tblcontactdetails` (`ContactId`, `Name`, `EmailId`, `Phone`, `BranchId`) VALUES
(1, 'abctest', 'abctest@gmail.com', '11111111111', 1),
(2, 'abcxyz', 'abcxyz@gmail.com', '2222222222', 1),
(3, 'pqr', 'pqr@gmail.com', '3453453453', 2),
(4, 'abcxywerewtz', 'abcertrexyz@gmail.com', '34534534555', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbldistricts`
--

CREATE TABLE `tbldistricts` (
  `DistrictId` int(11) NOT NULL,
  `StateId` int(11) NOT NULL,
  `DistrictName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldistricts`
--

INSERT INTO `tbldistricts` (`DistrictId`, `StateId`, `DistrictName`, `Status`) VALUES
(1, 1, 'kadapa', 1),
(2, 3, 'Mysuru', 1),
(3, 3, 'East Bangalore', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbldriverroutes`
--

CREATE TABLE `tbldriverroutes` (
  `AssignmentId` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `RouteId` int(11) NOT NULL,
  `AssignedDate` date NOT NULL,
  `AssignedTime` time NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `AssignedBy` int(11) NOT NULL,
  `AcceptedBy` int(11) DEFAULT NULL,
  `AcceptedDate` date DEFAULT NULL,
  `AcceptedTime` date DEFAULT NULL,
  `DriverStartDate` date DEFAULT NULL,
  `DriverStartTime` time DEFAULT NULL,
  `ArrivalDate` date DEFAULT NULL,
  `ArrivalTime` time DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldriverroutes`
--

INSERT INTO `tbldriverroutes` (`AssignmentId`, `UId`, `VehicleId`, `RouteId`, `AssignedDate`, `AssignedTime`, `StartDate`, `StartTime`, `AssignedBy`, `AcceptedBy`, `AcceptedDate`, `AcceptedTime`, `DriverStartDate`, `DriverStartTime`, `ArrivalDate`, `ArrivalTime`, `Status`) VALUES
(1, 6, 1, 2, '0000-00-00', '00:00:00', '2020-04-12', '10:30:00', 0, 0, '0000-00-00', '2020-03-11', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 1),
(2, 5, 1, 1, '0000-00-00', '00:00:00', '2020-03-11', '16:30:00', 0, 0, '0000-00-00', '2020-03-11', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 1),
(3, 5, 1, 1, '0000-00-00', '00:00:00', '2020-05-11', '16:30:00', 0, 0, '0000-00-00', '2020-03-11', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 1),
(4, 6, 2, 2, '2020-03-12', '11:17:56', '2020-03-12', '17:00:00', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 5, 1, 1, '2020-03-12', '11:23:45', '2020-03-13', '18:30:00', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 5, 2, 1, '2020-03-13', '12:02:36', '2020-03-12', '18:00:00', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeatureoperations`
--

CREATE TABLE `tblfeatureoperations` (
  `FeatureId` int(11) NOT NULL,
  `OperationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeatureoperations`
--

INSERT INTO `tblfeatureoperations` (`FeatureId`, `OperationId`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(14, 1),
(14, 2),
(14, 3),
(14, 4),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(16, 1),
(16, 2),
(16, 3),
(16, 4),
(17, 1),
(17, 2),
(17, 3),
(17, 4),
(18, 1),
(18, 2),
(18, 3),
(18, 4),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(20, 1),
(20, 2),
(20, 3),
(20, 4),
(21, 1),
(21, 2),
(21, 3),
(21, 4),
(22, 1),
(22, 2),
(22, 3),
(22, 4),
(23, 1),
(24, 1),
(24, 2),
(24, 3),
(24, 4),
(25, 1),
(25, 2),
(25, 3),
(25, 4),
(26, 1),
(27, 1),
(27, 2),
(27, 3),
(27, 4),
(28, 1),
(28, 2),
(28, 3),
(28, 4),
(29, 1),
(29, 2),
(29, 3),
(29, 4),
(30, 1),
(30, 2),
(30, 3),
(30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeatures`
--

CREATE TABLE `tblfeatures` (
  `FeatureId` int(11) NOT NULL,
  `FeatureName` varchar(45) NOT NULL,
  `FeatureType` varchar(45) NOT NULL,
  `FeatureTypeId` int(11) DEFAULT NULL,
  `MenuOrder` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeatures`
--

INSERT INTO `tblfeatures` (`FeatureId`, `FeatureName`, `FeatureType`, `FeatureTypeId`, `MenuOrder`, `Status`) VALUES
(1, 'Employees', 'MainMenu', NULL, 3, 1),
(2, 'Location', 'MainMenu', NULL, 5, 1),
(3, 'Masters', 'MainMenu', NULL, 4, 1),
(4, 'Transporter Service', 'MainMenu', NULL, 6, 1),
(5, 'Menu5', 'MainMenu', NULL, 0, 1),
(6, 'Menu6', 'MainMenu', NULL, 0, 1),
(7, 'Menu7', 'MainMenu', NULL, 0, 1),
(8, 'Menu8', 'MainMenu', NULL, 0, 1),
(9, 'Menu9', 'MainMenu', NULL, 0, 1),
(10, 'Menu10', 'MainMenu', NULL, 0, 1),
(11, 'Roles', 'SubMenu', 1, 1, 1),
(12, 'States', 'SubMenu', 2, 2, 1),
(13, 'Districts', 'SubMenu', 2, 3, 1),
(14, 'Taluka', 'SubMenu', 2, 4, 1),
(15, 'Country', 'SubMenu', 2, 1, 1),
(16, 'Panchayatee', 'SubMenu', 2, 5, 1),
(17, 'Village', 'SubMenu', 2, 6, 1),
(18, 'Waste Colors', 'SubMenu', 3, 1, 1),
(19, 'Waste types', 'SubMenu', 3, 2, 1),
(20, 'Industry Types', 'SubMenu', 3, 3, 1),
(21, 'Vehicle Types', 'SubMenu', 3, 4, 1),
(22, 'Employee', 'SubMenu', 1, 2, 1),
(23, 'Organizations', 'MainMenu', NULL, 1, 1),
(24, 'Waste Generators', 'Submenu', 23, 1, 1),
(25, 'Waste Disposal Plants', 'SubMenu', 23, 2, 1),
(26, 'Routes', 'MainMenu', NULL, 2, 1),
(27, 'Add Route', 'SubMenu', 26, 1, 1),
(28, 'Assign Route', 'SubMenu', 26, 2, 1),
(29, 'Generate QR Code', 'SubMenu', 4, 1, 1),
(30, 'Waste Collection', 'SubMenu', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `LogId` int(11) NOT NULL,
  `RecordId` int(11) NOT NULL,
  `TableId` int(11) NOT NULL,
  `TypeId` int(11) NOT NULL,
  `Dated` datetime NOT NULL,
  `LogBy` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`LogId`, `RecordId`, `TableId`, `TypeId`, `Dated`, `LogBy`, `Status`) VALUES
(1, 1, 1, 1, '2020-03-10 07:22:37', 1, 1),
(2, 1, 1, 1, '2020-03-10 07:22:48', 1, 1),
(3, 1, 1, 1, '2020-03-10 07:25:50', 1, 1),
(4, 1, 1, 1, '2020-03-10 11:03:18', 1, 1),
(5, 1, 1, 1, '2020-03-10 11:11:20', 1, 1),
(6, 1, 1, 1, '2020-03-10 11:38:16', 1, 1),
(7, 1, 1, 1, '2020-03-10 11:39:33', 1, 1),
(8, 1, 1, 1, '2020-03-10 11:51:24', 1, 1),
(9, 1, 1, 1, '2020-03-10 11:54:36', 1, 1),
(10, 1, 1, 1, '2020-03-10 12:10:42', 1, 1),
(11, 1, 1, 1, '2020-03-10 12:11:25', 1, 1),
(12, 1, 1, 1, '2020-03-10 12:12:53', 1, 1),
(13, 1, 1, 1, '2020-03-11 05:24:08', 1, 1),
(14, 1, 1, 1, '2020-03-11 09:29:08', 1, 1),
(15, 1, 1, 1, '2020-03-11 09:29:46', 1, 1),
(16, 1, 1, 1, '2020-03-11 09:32:42', 1, 1),
(17, 1, 1, 1, '2020-03-11 09:33:06', 1, 1),
(18, 1, 1, 1, '2020-03-11 09:35:32', 1, 1),
(19, 6, 1, 1, '2020-03-11 09:35:44', 6, 1),
(20, 1, 1, 1, '2020-03-11 09:36:13', 1, 1),
(21, 1, 1, 1, '2020-03-11 09:37:15', 1, 1),
(22, 1, 1, 1, '2020-03-11 09:37:18', 1, 1),
(23, 1, 1, 1, '2020-03-11 09:37:22', 1, 1),
(24, 1, 1, 1, '2020-03-11 09:38:17', 1, 1),
(25, 1, 1, 1, '2020-03-11 09:38:21', 1, 1),
(26, 1, 1, 1, '2020-03-11 09:40:10', 1, 1),
(27, 1, 1, 1, '2020-03-11 09:40:16', 1, 1),
(28, 1, 1, 1, '2020-03-11 09:42:32', 1, 1),
(29, 1, 1, 1, '2020-03-11 09:42:49', 1, 1),
(30, 1, 1, 1, '2020-03-11 09:47:21', 1, 1),
(31, 1, 1, 1, '2020-03-11 09:48:13', 1, 1),
(32, 1, 1, 1, '2020-03-11 09:48:24', 1, 1),
(33, 1, 1, 1, '2020-03-11 09:48:39', 1, 1),
(34, 1, 1, 1, '2020-03-11 09:50:35', 1, 1),
(35, 1, 1, 1, '2020-03-11 09:50:44', 1, 1),
(36, 1, 1, 1, '2020-03-11 10:02:50', 1, 1),
(37, 1, 1, 1, '2020-03-11 10:02:51', 1, 1),
(38, 1, 1, 1, '2020-03-11 10:02:52', 1, 1),
(39, 1, 1, 1, '2020-03-11 10:02:52', 1, 1),
(40, 1, 1, 1, '2020-03-11 10:03:07', 1, 1),
(41, 1, 1, 1, '2020-03-11 10:03:31', 1, 1),
(42, 1, 1, 1, '2020-03-11 10:04:47', 1, 1),
(43, 1, 1, 1, '2020-03-11 10:05:03', 1, 1),
(44, 1, 1, 1, '2020-03-11 10:05:33', 1, 1),
(45, 1, 1, 1, '2020-03-11 10:08:04', 1, 1),
(46, 1, 1, 1, '2020-03-11 10:10:01', 1, 1),
(47, 1, 1, 1, '2020-03-11 10:11:20', 1, 1),
(48, 1, 1, 1, '2020-03-11 10:11:37', 1, 1),
(49, 1, 1, 1, '2020-03-11 10:11:40', 1, 1),
(50, 1, 1, 1, '2020-03-11 10:13:49', 1, 1),
(51, 1, 1, 1, '2020-03-11 10:14:17', 1, 1),
(52, 1, 1, 1, '2020-03-11 10:14:24', 1, 1),
(53, 1, 1, 1, '2020-03-11 10:16:37', 1, 1),
(54, 1, 1, 1, '2020-03-11 10:18:38', 1, 1),
(55, 1, 1, 1, '2020-03-11 10:18:53', 1, 1),
(56, 1, 1, 1, '2020-03-11 10:20:38', 1, 1),
(57, 1, 1, 1, '2020-03-11 10:21:23', 1, 1),
(58, 1, 1, 1, '2020-03-11 10:24:31', 1, 1),
(59, 1, 1, 1, '2020-03-11 10:25:08', 1, 1),
(60, 1, 1, 1, '2020-03-11 10:25:37', 1, 1),
(61, 1, 1, 1, '2020-03-11 10:26:23', 1, 1),
(62, 1, 1, 1, '2020-03-11 10:28:27', 1, 1),
(63, 1, 1, 1, '2020-03-11 10:28:43', 1, 1),
(64, 1, 1, 1, '2020-03-11 10:28:55', 1, 1),
(65, 1, 1, 1, '2020-03-11 10:29:22', 1, 1),
(66, 1, 1, 1, '2020-03-11 10:29:51', 1, 1),
(67, 1, 1, 1, '2020-03-11 10:30:13', 1, 1),
(68, 1, 1, 1, '2020-03-11 10:30:27', 1, 1),
(69, 1, 1, 1, '2020-03-11 10:31:44', 1, 1),
(70, 1, 1, 1, '2020-03-11 10:32:14', 1, 1),
(71, 1, 1, 1, '2020-03-11 10:33:46', 1, 1),
(72, 1, 1, 1, '2020-03-11 10:34:47', 1, 1),
(73, 1, 1, 1, '2020-03-11 10:35:15', 1, 1),
(74, 1, 1, 1, '2020-03-11 10:35:54', 1, 1),
(75, 1, 1, 1, '2020-03-11 10:36:41', 1, 1),
(76, 1, 1, 1, '2020-03-11 10:37:32', 1, 1),
(77, 1, 1, 1, '2020-03-11 10:38:43', 1, 1),
(78, 1, 1, 1, '2020-03-11 10:38:57', 1, 1),
(79, 1, 1, 1, '2020-03-11 10:40:00', 1, 1),
(80, 1, 1, 1, '2020-03-11 10:40:36', 1, 1),
(81, 1, 1, 1, '2020-03-11 10:40:51', 1, 1),
(82, 1, 1, 1, '2020-03-11 10:44:08', 1, 1),
(83, 1, 1, 1, '2020-03-11 10:44:41', 1, 1),
(84, 1, 1, 1, '2020-03-11 10:44:57', 1, 1),
(85, 1, 1, 1, '2020-03-11 10:45:18', 1, 1),
(86, 1, 1, 1, '2020-03-11 10:45:20', 1, 1),
(87, 1, 1, 1, '2020-03-11 10:45:51', 1, 1),
(88, 1, 1, 1, '2020-03-11 10:46:13', 1, 1),
(89, 1, 1, 1, '2020-03-11 10:46:56', 1, 1),
(90, 1, 1, 1, '2020-03-11 10:48:44', 1, 1),
(91, 1, 1, 1, '2020-03-11 10:49:10', 1, 1),
(92, 1, 1, 1, '2020-03-11 10:49:28', 1, 1),
(93, 1, 1, 1, '2020-03-11 10:49:42', 1, 1),
(94, 1, 1, 1, '2020-03-11 10:50:54', 1, 1),
(95, 1, 1, 1, '2020-03-11 10:52:46', 1, 1),
(96, 1, 1, 1, '2020-03-11 10:53:23', 1, 1),
(97, 1, 1, 1, '2020-03-11 10:55:55', 1, 1),
(98, 1, 1, 1, '2020-03-11 10:56:02', 1, 1),
(99, 1, 1, 1, '2020-03-11 10:57:04', 1, 1),
(100, 1, 1, 1, '2020-03-11 10:57:45', 1, 1),
(101, 1, 1, 1, '2020-03-11 10:58:19', 1, 1),
(102, 1, 1, 1, '2020-03-11 10:59:23', 1, 1),
(103, 1, 1, 1, '2020-03-11 11:01:53', 1, 1),
(104, 1, 1, 1, '2020-03-11 11:02:13', 1, 1),
(105, 1, 1, 1, '2020-03-11 11:02:30', 1, 1),
(106, 1, 1, 1, '2020-03-11 11:06:21', 1, 1),
(107, 1, 1, 1, '2020-03-11 11:06:40', 1, 1),
(108, 1, 1, 1, '2020-03-11 11:06:53', 1, 1),
(109, 1, 1, 1, '2020-03-11 11:07:02', 1, 1),
(110, 1, 1, 1, '2020-03-11 11:07:44', 1, 1),
(111, 1, 1, 1, '2020-03-11 11:11:42', 1, 1),
(112, 1, 1, 1, '2020-03-11 11:14:11', 1, 1),
(113, 1, 1, 1, '2020-03-11 11:14:42', 1, 1),
(114, 1, 1, 1, '2020-03-11 11:16:00', 1, 1),
(115, 1, 1, 1, '2020-03-11 11:16:04', 1, 1),
(116, 1, 1, 1, '2020-03-11 11:16:10', 1, 1),
(117, 1, 1, 1, '2020-03-11 11:17:23', 1, 1),
(118, 1, 1, 1, '2020-03-11 11:19:10', 1, 1),
(119, 1, 1, 1, '2020-03-11 11:20:23', 1, 1),
(120, 1, 1, 1, '2020-03-11 11:21:28', 1, 1),
(121, 1, 1, 1, '2020-03-11 11:21:46', 1, 1),
(122, 1, 1, 1, '2020-03-11 11:25:13', 1, 1),
(123, 1, 1, 1, '2020-03-11 11:25:49', 1, 1),
(124, 1, 1, 1, '2020-03-11 11:29:30', 1, 1),
(125, 1, 1, 1, '2020-03-11 11:29:37', 1, 1),
(126, 1, 1, 1, '2020-03-11 11:30:10', 1, 1),
(127, 1, 1, 1, '2020-03-11 11:35:43', 1, 1),
(128, 1, 1, 1, '2020-03-11 11:37:16', 1, 1),
(129, 1, 1, 1, '2020-03-11 11:39:26', 1, 1),
(130, 1, 1, 1, '2020-03-11 11:39:34', 1, 1),
(131, 1, 1, 1, '2020-03-11 11:39:55', 1, 1),
(132, 1, 1, 1, '2020-03-11 11:40:20', 1, 1),
(133, 1, 1, 1, '2020-03-11 11:40:48', 1, 1),
(134, 1, 1, 1, '2020-03-11 11:41:50', 1, 1),
(135, 1, 1, 1, '2020-03-11 11:42:06', 1, 1),
(136, 1, 1, 1, '2020-03-11 11:47:43', 1, 1),
(137, 1, 1, 1, '2020-03-11 11:48:14', 1, 1),
(138, 1, 1, 1, '2020-03-11 11:48:34', 1, 1),
(139, 1, 1, 1, '2020-03-11 11:50:24', 1, 1),
(140, 1, 1, 1, '2020-03-11 11:56:47', 1, 1),
(141, 1, 1, 1, '2020-03-11 11:58:01', 1, 1),
(142, 1, 1, 1, '2020-03-11 11:58:21', 1, 1),
(143, 1, 1, 1, '2020-03-11 11:58:22', 1, 1),
(144, 1, 1, 1, '2020-03-11 12:10:31', 1, 1),
(145, 1, 1, 1, '2020-03-11 12:10:59', 1, 1),
(146, 1, 1, 1, '2020-03-11 12:26:38', 1, 1),
(147, 1, 1, 1, '2020-03-11 12:34:52', 1, 1),
(148, 6, 1, 1, '2020-03-11 12:59:19', 6, 1),
(149, 1, 1, 1, '2020-03-12 04:30:56', 1, 1),
(150, 1, 1, 1, '2020-03-12 04:31:45', 1, 1),
(151, 1, 1, 1, '2020-03-12 05:02:02', 1, 1),
(152, 1, 1, 1, '2020-03-12 05:14:18', 1, 1),
(153, 1, 1, 1, '2020-03-12 05:15:24', 1, 1),
(154, 1, 1, 1, '2020-03-12 05:16:24', 1, 1),
(155, 1, 1, 1, '2020-03-12 05:16:31', 1, 1),
(156, 1, 1, 1, '2020-03-12 05:17:27', 1, 1),
(157, 1, 1, 1, '2020-03-12 05:18:51', 1, 1),
(158, 1, 1, 1, '2020-03-12 05:21:15', 1, 1),
(159, 1, 1, 1, '2020-03-12 05:23:11', 1, 1),
(160, 1, 1, 1, '2020-03-12 05:25:24', 1, 1),
(161, 1, 1, 1, '2020-03-12 05:33:22', 1, 1),
(162, 1, 1, 1, '2020-03-12 05:34:35', 1, 1),
(163, 1, 1, 1, '2020-03-12 05:45:39', 1, 1),
(164, 1, 1, 1, '2020-03-12 05:47:54', 1, 1),
(165, 1, 1, 1, '2020-03-12 05:49:36', 1, 1),
(166, 1, 1, 1, '2020-03-12 05:50:42', 1, 1),
(167, 1, 1, 1, '2020-03-12 06:11:22', 1, 1),
(168, 1, 1, 1, '2020-03-12 06:11:37', 1, 1),
(169, 1, 1, 1, '2020-03-12 06:13:05', 1, 1),
(170, 1, 1, 1, '2020-03-12 06:14:53', 1, 1),
(171, 1, 1, 1, '2020-03-12 06:28:41', 1, 1),
(172, 1, 1, 1, '2020-03-12 06:34:06', 1, 1),
(173, 1, 1, 1, '2020-03-12 06:41:42', 1, 1),
(174, 1, 1, 1, '2020-03-12 06:45:42', 1, 1),
(175, 1, 1, 1, '2020-03-12 06:46:35', 1, 1),
(176, 1, 1, 1, '2020-03-12 06:48:39', 1, 1),
(177, 1, 1, 1, '2020-03-12 06:51:52', 1, 1),
(178, 1, 1, 1, '2020-03-12 06:55:17', 1, 1),
(179, 1, 1, 1, '2020-03-12 06:56:02', 1, 1),
(180, 1, 1, 1, '2020-03-12 06:59:25', 1, 1),
(181, 1, 1, 1, '2020-03-12 06:59:55', 1, 1),
(182, 1, 1, 1, '2020-03-12 07:02:16', 1, 1),
(183, 1, 1, 1, '2020-03-12 07:04:52', 1, 1),
(184, 1, 1, 1, '2020-03-12 07:12:30', 1, 1),
(185, 6, 1, 1, '2020-03-12 09:16:42', 6, 1),
(186, 6, 1, 1, '2020-03-12 09:18:05', 6, 1),
(187, 6, 1, 1, '2020-03-12 09:23:29', 6, 1),
(188, 1, 1, 1, '2020-03-12 09:52:26', 1, 1),
(189, 1, 1, 1, '2020-03-12 09:54:39', 1, 1),
(190, 1, 1, 1, '2020-03-12 10:13:41', 1, 1),
(191, 1, 1, 1, '2020-03-12 10:13:41', 1, 1),
(192, 1, 1, 1, '2020-03-12 10:13:58', 1, 1),
(193, 1, 1, 1, '2020-03-12 10:15:18', 1, 1),
(194, 1, 1, 1, '2020-03-12 10:16:54', 1, 1),
(195, 1, 1, 1, '2020-03-12 10:18:53', 1, 1),
(196, 1, 1, 1, '2020-03-12 10:19:25', 1, 1),
(197, 1, 1, 1, '2020-03-12 10:23:02', 1, 1),
(198, 1, 1, 1, '2020-03-12 10:24:19', 1, 1),
(199, 1, 1, 1, '2020-03-12 10:24:37', 1, 1),
(200, 1, 1, 1, '2020-03-12 10:26:01', 1, 1),
(201, 1, 1, 1, '2020-03-12 10:26:22', 1, 1),
(202, 1, 1, 1, '2020-03-12 10:27:36', 1, 1),
(203, 1, 1, 1, '2020-03-12 10:27:49', 1, 1),
(204, 1, 1, 1, '2020-03-12 10:29:46', 1, 1),
(205, 1, 1, 1, '2020-03-12 10:40:53', 1, 1),
(206, 1, 1, 1, '2020-03-12 10:49:11', 1, 1),
(207, 1, 1, 1, '2020-03-12 10:50:03', 1, 1),
(208, 1, 1, 1, '2020-03-12 10:51:55', 1, 1),
(209, 1, 1, 1, '2020-03-12 10:57:53', 1, 1),
(210, 1, 1, 1, '2020-03-12 11:00:07', 1, 1),
(211, 1, 1, 1, '2020-03-12 11:15:10', 1, 1),
(212, 1, 1, 1, '2020-03-12 11:17:42', 1, 1),
(213, 1, 1, 1, '2020-03-12 11:19:35', 1, 1),
(214, 1, 1, 1, '2020-03-12 11:20:37', 1, 1),
(215, 1, 1, 1, '2020-03-12 11:22:25', 1, 1),
(216, 1, 1, 1, '2020-03-12 11:23:45', 1, 1),
(217, 1, 1, 1, '2020-03-12 11:40:37', 1, 1),
(218, 1, 1, 1, '2020-03-12 11:47:21', 1, 1),
(219, 1, 1, 1, '2020-03-12 11:51:26', 1, 1),
(220, 1, 1, 1, '2020-03-12 11:52:42', 1, 1),
(221, 5, 1, 1, '2020-03-12 11:56:20', 5, 1),
(222, 1, 1, 1, '2020-03-12 12:03:00', 1, 1),
(223, 1, 1, 1, '2020-03-12 12:04:11', 1, 1),
(224, 1, 1, 1, '2020-03-12 12:14:03', 1, 1),
(225, 1, 1, 1, '2020-03-12 12:16:41', 1, 1),
(226, 1, 1, 1, '2020-03-12 12:19:58', 1, 1),
(227, 1, 1, 1, '2020-03-12 12:22:10', 1, 1),
(228, 1, 1, 1, '2020-03-12 12:23:22', 1, 1),
(229, 1, 1, 1, '2020-03-12 12:25:55', 1, 1),
(230, 1, 1, 1, '2020-03-12 12:30:23', 1, 1),
(231, 1, 1, 1, '2020-03-12 12:33:27', 1, 1),
(232, 1, 1, 1, '2020-03-12 12:34:56', 1, 1),
(233, 1, 1, 1, '2020-03-12 12:35:57', 1, 1),
(234, 1, 1, 1, '2020-03-12 12:38:07', 1, 1),
(235, 1, 1, 1, '2020-03-12 12:39:03', 1, 1),
(236, 1, 1, 1, '2020-03-12 12:50:47', 1, 1),
(237, 1, 1, 1, '2020-03-12 12:52:27', 1, 1),
(238, 1, 1, 1, '2020-03-12 12:53:32', 1, 1),
(239, 1, 1, 1, '2020-03-12 12:57:09', 1, 1),
(240, 1, 1, 1, '2020-03-12 12:58:08', 1, 1),
(241, 1, 1, 1, '2020-03-12 13:00:45', 1, 1),
(242, 1, 1, 1, '2020-03-13 04:32:18', 1, 1),
(243, 1, 1, 1, '2020-03-13 05:08:41', 1, 1),
(244, 1, 1, 1, '2020-03-13 05:09:54', 1, 1),
(245, 1, 1, 1, '2020-03-13 05:11:06', 1, 1),
(246, 6, 1, 1, '2020-03-13 05:50:22', 6, 1),
(247, 6, 1, 1, '2020-03-13 05:53:26', 6, 1),
(248, 6, 1, 1, '2020-03-13 05:54:33', 6, 1),
(249, 1, 1, 1, '2020-03-13 05:57:37', 1, 1),
(250, 1, 1, 1, '2020-03-13 05:58:02', 1, 1),
(251, 1, 1, 1, '2020-03-13 06:00:48', 1, 1),
(252, 6, 1, 1, '2020-03-13 06:06:40', 6, 1),
(253, 6, 1, 1, '2020-03-13 06:07:09', 6, 1),
(254, 6, 1, 1, '2020-03-13 06:07:48', 6, 1),
(255, 6, 1, 1, '2020-03-13 06:19:17', 6, 1),
(256, 6, 1, 1, '2020-03-13 06:19:25', 6, 1),
(257, 6, 1, 1, '2020-03-13 06:19:43', 6, 1),
(258, 6, 1, 1, '2020-03-13 06:20:21', 6, 1),
(259, 6, 1, 1, '2020-03-13 06:21:31', 6, 1),
(260, 6, 1, 1, '2020-03-13 06:22:33', 6, 1),
(261, 6, 1, 1, '2020-03-13 06:24:03', 6, 1),
(262, 6, 1, 1, '2020-03-13 06:25:41', 6, 1),
(263, 6, 1, 1, '2020-03-13 06:26:29', 6, 1),
(264, 6, 1, 1, '2020-03-13 06:43:39', 6, 1),
(265, 6, 1, 1, '2020-03-13 06:59:44', 6, 1),
(266, 6, 1, 1, '2020-03-13 07:00:33', 6, 1),
(267, 6, 1, 1, '2020-03-13 07:01:01', 6, 1),
(268, 6, 1, 1, '2020-03-13 07:02:05', 6, 1),
(269, 6, 1, 1, '2020-03-13 07:03:01', 6, 1),
(270, 6, 1, 1, '2020-03-13 07:04:13', 6, 1),
(271, 6, 1, 1, '2020-03-13 07:07:31', 6, 1),
(272, 6, 1, 1, '2020-03-13 07:13:03', 6, 1),
(273, 6, 1, 1, '2020-03-13 07:17:05', 6, 1),
(274, 6, 1, 1, '2020-03-13 07:18:05', 6, 1),
(275, 6, 1, 1, '2020-03-13 07:19:46', 6, 1),
(276, 6, 1, 1, '2020-03-13 07:20:40', 6, 1),
(277, 6, 1, 1, '2020-03-13 07:21:48', 6, 1),
(278, 6, 1, 1, '2020-03-13 07:22:45', 6, 1),
(279, 6, 1, 1, '2020-03-13 07:42:09', 6, 1),
(280, 6, 1, 1, '2020-03-13 07:43:40', 6, 1),
(281, 6, 1, 1, '2020-03-13 07:47:05', 6, 1),
(282, 6, 1, 1, '2020-03-13 09:02:08', 6, 1),
(283, 6, 1, 1, '2020-03-13 09:02:44', 6, 1),
(284, 6, 1, 1, '2020-03-13 09:03:19', 6, 1),
(285, 6, 1, 1, '2020-03-13 09:06:46', 6, 1),
(286, 1, 1, 1, '2020-03-13 09:07:14', 1, 1),
(287, 1, 1, 1, '2020-03-13 09:08:19', 1, 1),
(288, 1, 1, 1, '2020-03-13 09:08:41', 1, 1),
(289, 1, 1, 1, '2020-03-13 09:09:19', 1, 1),
(290, 1, 1, 1, '2020-03-13 09:09:49', 1, 1),
(291, 1, 1, 1, '2020-03-13 09:10:20', 1, 1),
(292, 1, 1, 1, '2020-03-13 09:11:05', 1, 1),
(293, 1, 1, 1, '2020-03-13 09:11:14', 1, 1),
(294, 1, 1, 1, '2020-03-13 09:11:47', 1, 1),
(295, 6, 1, 1, '2020-03-13 09:12:00', 6, 1),
(296, 6, 1, 1, '2020-03-13 09:12:21', 6, 1),
(297, 1, 1, 1, '2020-03-13 09:27:44', 1, 1),
(298, 1, 1, 1, '2020-03-13 09:28:02', 1, 1),
(299, 1, 1, 1, '2020-03-13 09:38:32', 1, 1),
(300, 1, 1, 1, '2020-03-13 09:39:44', 1, 1),
(301, 1, 1, 1, '2020-03-13 09:41:01', 1, 1),
(302, 1, 1, 1, '2020-03-13 09:42:22', 1, 1),
(303, 1, 1, 1, '2020-03-13 09:47:30', 1, 1),
(304, 1, 1, 1, '2020-03-13 09:48:19', 1, 1),
(305, 1, 1, 1, '2020-03-13 09:51:02', 1, 1),
(306, 1, 1, 1, '2020-03-13 09:53:58', 1, 1),
(307, 6, 1, 1, '2020-03-13 10:01:01', 6, 1),
(308, 1, 1, 1, '2020-03-13 10:12:20', 1, 1),
(309, 1, 1, 1, '2020-03-13 10:14:41', 1, 1),
(310, 6, 1, 1, '2020-03-13 10:15:26', 6, 1),
(311, 6, 1, 1, '2020-03-13 10:16:12', 6, 1),
(312, 1, 1, 1, '2020-03-13 10:23:30', 1, 1),
(313, 1, 1, 1, '2020-03-13 10:29:44', 1, 1),
(314, 1, 1, 1, '2020-03-13 10:32:35', 1, 1),
(315, 1, 1, 1, '2020-03-13 10:36:35', 1, 1),
(316, 1, 1, 1, '2020-03-13 11:13:12', 1, 1),
(317, 1, 1, 1, '2020-03-13 11:24:00', 1, 1),
(318, 6, 1, 1, '2020-03-13 11:25:07', 6, 1),
(319, 1, 1, 1, '2020-03-13 11:29:31', 1, 1),
(320, 1, 1, 1, '2020-03-13 11:33:54', 1, 1),
(321, 6, 1, 1, '2020-03-13 11:38:33', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbloperations`
--

CREATE TABLE `tbloperations` (
  `OperationId` int(11) NOT NULL,
  `OperationName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbloperations`
--

INSERT INTO `tbloperations` (`OperationId`, `OperationName`, `Status`) VALUES
(1, 'view', 1),
(2, 'create', 1),
(3, 'update', 1),
(4, 'delete', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorganizations`
--

CREATE TABLE `tblorganizations` (
  `OrgId` int(11) NOT NULL,
  `OrgName` varchar(45) DEFAULT NULL,
  `OrgTypeId` int(11) NOT NULL,
  `Status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorganizations`
--

INSERT INTO `tblorganizations` (`OrgId`, `OrgName`, `OrgTypeId`, `Status`) VALUES
(3, 'Narayana Intitutes', 3, 1),
(4, 'srichaithanya educational institutes', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpanchaytee`
--

CREATE TABLE `tblpanchaytee` (
  `PanchayteeId` int(11) NOT NULL,
  `PanchayteeName` varchar(45) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `DistrictId` int(11) NOT NULL,
  `TalukaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpanchaytee`
--

INSERT INTO `tblpanchaytee` (`PanchayteeId`, `PanchayteeName`, `Status`, `DistrictId`, `TalukaId`) VALUES
(1, 'Rangasamudram', 1, 1, 2),
(2, 'devanahalli', 1, 3, 3),
(3, 'Chendrayapattanam', 1, 2, 1),
(4, 'Porumamilla', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblpickups`
--

CREATE TABLE `tblpickups` (
  `PickupId` int(11) NOT NULL,
  `AssignmentId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL,
  `UId` int(11) NOT NULL,
  `EntityId` int(11) NOT NULL,
  `ArrivedDateTime` datetime NOT NULL,
  `PickedUpDateTime` datetime NOT NULL,
  `QrCode` varchar(150) NOT NULL,
  `Weight` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpickups`
--

INSERT INTO `tblpickups` (`PickupId`, `AssignmentId`, `BranchId`, `UId`, `EntityId`, `ArrivedDateTime`, `PickedUpDateTime`, `QrCode`, `Weight`) VALUES
(1, 1, 2, 6, 5, '2020-03-12 10:48:13', '2020-03-12 10:48:13', '5', '4.00000'),
(2, 1, 2, 6, 7, '2020-03-12 10:48:50', '2020-03-12 10:48:50', '857366', '1.00000'),
(3, 1, 2, 6, 6, '2020-03-12 10:53:02', '2020-03-12 10:53:02', '366043', '3.00000'),
(4, 1, 2, 6, 6, '2020-03-12 10:53:15', '2020-03-12 10:53:15', '333820', '2.00000'),
(5, 1, 2, 6, 6, '2020-03-12 10:54:36', '2020-03-12 10:54:36', '67069', '4.00000'),
(6, 1, 2, 6, 6, '2020-03-12 10:55:34', '2020-03-12 10:55:34', '749147', '4.00000'),
(7, 1, 2, 6, 6, '2020-03-12 10:56:00', '2020-03-12 10:56:00', '73247', '3.00000'),
(8, 1, 2, 6, 6, '2020-03-12 10:56:29', '2020-03-12 10:56:29', '793655', '3.00000'),
(9, 1, 2, 6, 6, '2020-03-12 10:58:00', '2020-03-12 10:58:00', '216724', '1.00000'),
(10, 1, 2, 6, 6, '2020-03-13 04:32:29', '2020-03-13 04:32:29', '784807', '4.00000');

-- --------------------------------------------------------

--
-- Table structure for table `tblrolefeatures`
--

CREATE TABLE `tblrolefeatures` (
  `RoleId` int(11) NOT NULL,
  `FeatureId` int(11) NOT NULL,
  `OperationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrolefeatures`
--

INSERT INTO `tblrolefeatures` (`RoleId`, `FeatureId`, `OperationId`) VALUES
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 4, 1),
(2, 11, 1),
(2, 11, 2),
(2, 11, 3),
(2, 11, 4),
(2, 12, 1),
(2, 12, 2),
(2, 12, 3),
(2, 12, 4),
(2, 13, 1),
(2, 13, 2),
(2, 13, 3),
(2, 13, 4),
(2, 14, 1),
(2, 14, 2),
(2, 14, 3),
(2, 14, 4),
(2, 15, 1),
(2, 15, 2),
(2, 15, 3),
(2, 15, 4),
(2, 16, 1),
(2, 16, 2),
(2, 16, 3),
(2, 16, 4),
(2, 17, 1),
(2, 17, 2),
(2, 17, 3),
(2, 17, 4),
(2, 18, 1),
(2, 18, 2),
(2, 18, 3),
(2, 18, 4),
(2, 19, 1),
(2, 19, 2),
(2, 19, 3),
(2, 19, 4),
(2, 20, 1),
(2, 20, 2),
(2, 20, 3),
(2, 20, 4),
(2, 21, 1),
(2, 21, 2),
(2, 21, 3),
(2, 21, 4),
(2, 22, 1),
(2, 22, 2),
(2, 22, 3),
(2, 22, 4),
(2, 23, 1),
(2, 24, 1),
(2, 24, 2),
(2, 24, 3),
(2, 24, 4),
(2, 25, 1),
(2, 25, 2),
(2, 25, 3),
(2, 25, 4),
(2, 26, 1),
(2, 27, 1),
(2, 27, 2),
(2, 27, 3),
(2, 27, 4),
(2, 28, 1),
(2, 28, 2),
(2, 28, 3),
(2, 28, 4),
(2, 29, 1),
(2, 29, 2),
(2, 29, 3),
(2, 29, 4),
(2, 30, 1),
(2, 30, 3),
(2, 30, 4),
(6, 4, 1),
(6, 26, 1),
(6, 28, 1),
(6, 29, 1),
(6, 29, 2),
(6, 29, 3),
(6, 29, 4),
(6, 30, 1),
(6, 30, 2),
(6, 30, 3),
(6, 30, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

CREATE TABLE `tblroles` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroles`
--

INSERT INTO `tblroles` (`RoleId`, `RoleName`, `Status`) VALUES
(1, 'Guest', 1),
(2, 'Admin', 1),
(3, 'Super Admin', 1),
(4, 'Gsfdfuest', 2),
(5, 'Employee', 1),
(6, 'Transporter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroutelocations`
--

CREATE TABLE `tblroutelocations` (
  `RouteId` int(11) NOT NULL,
  `BranchId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroutelocations`
--

INSERT INTO `tblroutelocations` (`RouteId`, `BranchId`) VALUES
(1, 4),
(1, 5),
(2, 2),
(2, 4),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tblroutes`
--

CREATE TABLE `tblroutes` (
  `RouteId` int(11) NOT NULL,
  `RouteName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblroutes`
--

INSERT INTO `tblroutes` (`RouteId`, `RouteName`) VALUES
(1, 'Route - 1'),
(2, 'Route - 2');

-- --------------------------------------------------------

--
-- Table structure for table `tblstates`
--

CREATE TABLE `tblstates` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstates`
--

INSERT INTO `tblstates` (`StateId`, `StateName`, `Status`) VALUES
(1, 'Andhara Pradesh', 1),
(2, 'Telangana', 1),
(3, 'Karnataka', 1),
(4, 'Tamilanadu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltaluka`
--

CREATE TABLE `tbltaluka` (
  `TalukaId` int(11) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `TalukaName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbltaluka`
--

INSERT INTO `tbltaluka` (`TalukaId`, `DistrictId`, `TalukaName`, `Status`) VALUES
(1, 2, 'Mysuru', 1),
(2, 1, 'Badvel', 1),
(3, 3, 'devanahalli', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UId` int(11) NOT NULL,
  `UserId` varchar(45) NOT NULL,
  `Password` text NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL,
  `DisplayName` varchar(45) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `ContactNo` varchar(15) DEFAULT NULL,
  `EmailId` varchar(45) DEFAULT NULL,
  `ProfilePic` varchar(100) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `ApiToken` varchar(255) DEFAULT NULL,
  `RememberToken` varchar(255) DEFAULT NULL,
  `Imei` varchar(50) NOT NULL,
  `AppVersion` varchar(45) NOT NULL,
  `OsVersion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UId`, `UserId`, `Password`, `FirstName`, `LastName`, `DisplayName`, `RoleId`, `ContactNo`, `EmailId`, `ProfilePic`, `Status`, `ApiToken`, `RememberToken`, `Imei`, `AppVersion`, `OsVersion`) VALUES
(1, 'aAPgtGRmzlIfwtf', '$2y$10$45SPyqp.AJ3ApjxgoBdJGua4yGq2oDSD8oSlAW6crIN7bD7JKE4om', NULL, NULL, 'test one', 2, NULL, 'testone@gmail.com', NULL, 1, 'wr2IyY39VJpNI7eVh5wGWT5fwIiNIYFNKKbynJ5ldYk1fhVQdeVadMCzmnLRhl70WQKW9rukV1nzgFFnXvMEE3WV5Qbr6paTroTCjDN6j9j5pqkWBeslx9KxcVqLaKKh1mVxGXNMGUbNzm5t6Qoljv2020-03-1311:33:54', NULL, '', '', ''),
(2, 'h9X9FUqNViFuvxK', '$2y$10$OflHeersiwimrnebmOWBZOzhukyOxmU4mjASvSv1YMglTtdqyYDuW', NULL, NULL, 'admin', 2, NULL, 'admin@gmail.com', NULL, 1, 'qsdOhkaZzccJUvF96rh3EwRVnleMzCI08zWNH2VcJOTK1OBNgCY5AizgXfJ8eYNZXn8ayOkoW3jQ3C7ZOYOnmjWNrk2awRhYY4AScHCCf8CzVYSMf6ditCipEJO35OnjqQ72ejHOzuCGgdbkFo293B2020-03-1309:09:19', NULL, '', '', ''),
(3, 'narayanasc@gmail.com', '$2y$10$0VxXzUFhXMPdMh3rNJMYZ.mRIIUkm2y/pF8E1jVi/KQH9A/Lpmv/2', NULL, NULL, 'Narayana school', 1, NULL, 'narayanasc@gmail.com', NULL, 1, NULL, NULL, '', '', ''),
(4, 'srichaithanya@gmail.com', '$2y$10$Yyl4Nl/3/hTh47rFXsmWE.VsceERqRLHfjypRqpvhxe5SBkBeN7Fy', NULL, NULL, 'srichaithanya', 1, NULL, 'srichaithanya@gmail.com', NULL, 1, NULL, NULL, '', '', ''),
(5, 'driver12@gmail.com', '$2y$10$Vorqa/iqgyUm00GMIVaHKehKEEs8yDf6l3gJ1E.yq1bcy3DJSfPXa', NULL, NULL, 'driver one', 6, NULL, 'driver12@gmail.com', NULL, 1, '5nYI36XT3uMgGcKydVHg8AxyPG5upXjB6Z9xAYSRNavtcuGwJ0X3kutlgZE3jCli633hlzq2MtHNojdpAp6xV3BKUXMODDoVcRNxWMAPaars9YffuiLYh00jZDLlbkr3O02ThqgRxj2D7JnM6FN3ym2020-03-1211:56:20', NULL, '', '', ''),
(6, 'driver123@gmail.com', '$2y$10$Vorqa/iqgyUm00GMIVaHKehKEEs8yDf6l3gJ1E.yq1bcy3DJSfPXa', NULL, NULL, 'Driver Two', 6, NULL, 'driver123@gmail.com', NULL, 1, '8Q4DYqki36jHEv0RxeNNbW0pnJEuMjvbGRxDxhx61CFi8V4IS0OSKPHVGE5cMCPSwzWZTdYaGOi05RnnDM0PWzVj69k2Wr3lE6MB1EYXy3ZwqbAh8i0QQ4ECpT9urFcyO74TIC3PHeHbu0IFbglxMt2020-03-1311:38:33', NULL, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `VehicleId` int(11) NOT NULL,
  `VehicleName` varchar(150) NOT NULL,
  `VehicleType` int(11) DEFAULT NULL,
  `VehicleNumber` varchar(20) NOT NULL,
  `VehicleRC` varchar(20) NOT NULL,
  `RCDocument` varchar(225) NOT NULL,
  `RCExpiryDate` timestamp NULL DEFAULT NULL,
  `VehicleInsurance` varchar(45) DEFAULT NULL,
  `VehicleInsuranceDocument` varchar(225) DEFAULT NULL,
  `InsuranceExpiryDate` timestamp NULL DEFAULT NULL,
  `PollutionCheck` varchar(45) DEFAULT NULL,
  `PollutionCheckDocument` varchar(225) DEFAULT NULL,
  `PollutionCheckExpiryDate` timestamp NULL DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvehicles`
--

INSERT INTO `tblvehicles` (`VehicleId`, `VehicleName`, `VehicleType`, `VehicleNumber`, `VehicleRC`, `RCDocument`, `RCExpiryDate`, `VehicleInsurance`, `VehicleInsuranceDocument`, `InsuranceExpiryDate`, `PollutionCheck`, `PollutionCheckDocument`, `PollutionCheckExpiryDate`, `Status`) VALUES
(1, 'abc truck', 1, 'AP02 1111', '12345', '', '2020-03-30 04:46:42', '123456', NULL, '2020-03-20 04:46:42', NULL, NULL, NULL, 1),
(2, 'abc pqr', 2, 'TS90D 2222', '22222', '', '2020-03-23 04:46:42', NULL, NULL, '2020-03-21 04:46:42', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblvillages`
--

CREATE TABLE `tblvillages` (
  `VillageId` int(11) NOT NULL,
  `PanchayteeId` int(11) NOT NULL,
  `VillageName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblvillages`
--

INSERT INTO `tblvillages` (`VillageId`, `PanchayteeId`, `VillageName`, `Status`) VALUES
(1, 3, 'mvillage', 1),
(2, 4, 'chennareddypeta', 1),
(3, 2, 'bagaluru', 1),
(4, 2, 'abctestvillage', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_driver_routes`
-- (See below for the actual view)
--
CREATE TABLE `vw_driver_routes` (
`UId` int(11)
,`DisplayName` varchar(45)
,`VehicleName` varchar(150)
,`VehicleNumber` varchar(20)
,`BranchName` varchar(45)
,`Latitude` varchar(45)
,`Longitude` varchar(45)
,`Location` varchar(225)
,`BranchId` int(11)
,`AssignmentId` int(11)
,`StartDate` date
,`StartTime` time
);

-- --------------------------------------------------------

--
-- Structure for view `vw_driver_routes`
--
DROP TABLE IF EXISTS `vw_driver_routes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_driver_routes`  AS  select `dr`.`UId` AS `UId`,`u`.`DisplayName` AS `DisplayName`,`v`.`VehicleName` AS `VehicleName`,`v`.`VehicleNumber` AS `VehicleNumber`,`b`.`BranchName` AS `BranchName`,`b`.`Latitude` AS `Latitude`,`b`.`Longitude` AS `Longitude`,`b`.`Location` AS `Location`,`b`.`BranchId` AS `BranchId`,`dr`.`AssignmentId` AS `AssignmentId`,`dr`.`StartDate` AS `StartDate`,`dr`.`StartTime` AS `StartTime` from ((((`tbldriverroutes` `dr` join `tblusers` `u` on(`dr`.`UId` = `u`.`UId`)) join `tblvehicles` `v` on(`dr`.`VehicleId` = `v`.`VehicleId`)) join `tblroutelocations` `rl` on(`dr`.`RouteId` = `rl`.`RouteId`)) join `tblbranchs` `b` on(`rl`.`BranchId` = `b`.`BranchId`)) where `dr`.`Status` = 1 and `v`.`Status` = 1 and `b`.`Status` = 1 and `u`.`Status` = 1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lookupentity`
--
ALTER TABLE `lookupentity`
  ADD PRIMARY KEY (`EntityId`),
  ADD UNIQUE KEY `EntityName_UNIQUE` (`EntityName`),
  ADD KEY `fk_lookupentity_lookupgroups_idx` (`GroupId`);

--
-- Indexes for table `lookupgroups`
--
ALTER TABLE `lookupgroups`
  ADD PRIMARY KEY (`GroupId`);

--
-- Indexes for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `fk_tbladdress_tblusers1_idx` (`UId`),
  ADD KEY `fk_tbladdress_tblvillages1_idx` (`VillageId`);

--
-- Indexes for table `tblbranchs`
--
ALTER TABLE `tblbranchs`
  ADD PRIMARY KEY (`BranchId`),
  ADD KEY `fk_tblBranchs_tblorganizations1_idx` (`OrgId`);

--
-- Indexes for table `tblcontactdetails`
--
ALTER TABLE `tblcontactdetails`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `tbldistricts`
--
ALTER TABLE `tbldistricts`
  ADD PRIMARY KEY (`DistrictId`),
  ADD UNIQUE KEY `DistrictName_UNIQUE` (`DistrictName`),
  ADD KEY `fk_tbldistricts_tblstates1_idx` (`StateId`);

--
-- Indexes for table `tbldriverroutes`
--
ALTER TABLE `tbldriverroutes`
  ADD PRIMARY KEY (`AssignmentId`);

--
-- Indexes for table `tblfeatureoperations`
--
ALTER TABLE `tblfeatureoperations`
  ADD PRIMARY KEY (`FeatureId`,`OperationId`),
  ADD KEY `fk_tblfeatureoperations_tbloperations1_idx` (`OperationId`);

--
-- Indexes for table `tblfeatures`
--
ALTER TABLE `tblfeatures`
  ADD PRIMARY KEY (`FeatureId`),
  ADD UNIQUE KEY `FeatureName_UNIQUE` (`FeatureName`);

--
-- Indexes for table `tbllogs`
--
ALTER TABLE `tbllogs`
  ADD PRIMARY KEY (`LogId`);

--
-- Indexes for table `tbloperations`
--
ALTER TABLE `tbloperations`
  ADD PRIMARY KEY (`OperationId`);

--
-- Indexes for table `tblorganizations`
--
ALTER TABLE `tblorganizations`
  ADD PRIMARY KEY (`OrgId`),
  ADD UNIQUE KEY `IndustryName_UNIQUE` (`OrgName`),
  ADD KEY `fk_tblorganizations_tblusers1_idx` (`OrgId`),
  ADD KEY `fk_tblorganizations_lookupentity1_idx` (`OrgTypeId`);

--
-- Indexes for table `tblpanchaytee`
--
ALTER TABLE `tblpanchaytee`
  ADD PRIMARY KEY (`PanchayteeId`),
  ADD KEY `fk_tblpanchaytee_tbldistricts1_idx` (`DistrictId`),
  ADD KEY `fk_tblpanchaytee_tbltaluka1_idx` (`TalukaId`);

--
-- Indexes for table `tblpickups`
--
ALTER TABLE `tblpickups`
  ADD PRIMARY KEY (`PickupId`);

--
-- Indexes for table `tblrolefeatures`
--
ALTER TABLE `tblrolefeatures`
  ADD PRIMARY KEY (`RoleId`,`FeatureId`,`OperationId`),
  ADD KEY `fk_tblrolefeatures_tblroles1_idx` (`RoleId`),
  ADD KEY `fk_tblrolefeatures_tblfeatureoperations1_idx` (`FeatureId`,`OperationId`);

--
-- Indexes for table `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`RoleId`),
  ADD UNIQUE KEY `RoleName_UNIQUE` (`RoleName`);

--
-- Indexes for table `tblroutelocations`
--
ALTER TABLE `tblroutelocations`
  ADD UNIQUE KEY `RouteId` (`RouteId`,`BranchId`);

--
-- Indexes for table `tblroutes`
--
ALTER TABLE `tblroutes`
  ADD PRIMARY KEY (`RouteId`);

--
-- Indexes for table `tblstates`
--
ALTER TABLE `tblstates`
  ADD PRIMARY KEY (`StateId`),
  ADD UNIQUE KEY `StateName_UNIQUE` (`StateName`);

--
-- Indexes for table `tbltaluka`
--
ALTER TABLE `tbltaluka`
  ADD PRIMARY KEY (`TalukaId`),
  ADD KEY `fk_tbltaluka_tbldistricts1_idx` (`DistrictId`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UId`),
  ADD UNIQUE KEY `UserId_UNIQUE` (`UserId`),
  ADD KEY `fk_tblusers_tblroles1_idx` (`RoleId`);

--
-- Indexes for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`VehicleId`);

--
-- Indexes for table `tblvillages`
--
ALTER TABLE `tblvillages`
  ADD PRIMARY KEY (`VillageId`),
  ADD KEY `fk_tblvillages_tblpanchaytee1_idx` (`PanchayteeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lookupentity`
--
ALTER TABLE `lookupentity`
  MODIFY `EntityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lookupgroups`
--
ALTER TABLE `lookupgroups`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbranchs`
--
ALTER TABLE `tblbranchs`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcontactdetails`
--
ALTER TABLE `tblcontactdetails`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbldistricts`
--
ALTER TABLE `tbldistricts`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldriverroutes`
--
ALTER TABLE `tbldriverroutes`
  MODIFY `AssignmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `tbloperations`
--
ALTER TABLE `tbloperations`
  MODIFY `OperationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblorganizations`
--
ALTER TABLE `tblorganizations`
  MODIFY `OrgTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpanchaytee`
--
ALTER TABLE `tblpanchaytee`
  MODIFY `PanchayteeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpickups`
--
ALTER TABLE `tblpickups`
  MODIFY `PickupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblroutes`
--
ALTER TABLE `tblroutes`
  MODIFY `RouteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstates`
--
ALTER TABLE `tblstates`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltaluka`
--
ALTER TABLE `tbltaluka`
  MODIFY `TalukaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `VehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvillages`
--
ALTER TABLE `tblvillages`
  MODIFY `VillageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lookupentity`
--
ALTER TABLE `lookupentity`
  ADD CONSTRAINT `fk_lookupentity_lookupgroups` FOREIGN KEY (`GroupId`) REFERENCES `lookupgroups` (`GroupId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD CONSTRAINT `fk_tbladdress_tblusers1` FOREIGN KEY (`UId`) REFERENCES `tblusers` (`UId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbladdress_tblvillages1` FOREIGN KEY (`VillageId`) REFERENCES `tblvillages` (`VillageId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblbranchs`
--
ALTER TABLE `tblbranchs`
  ADD CONSTRAINT `fk_tblBranchs_tblorganizations1` FOREIGN KEY (`OrgId`) REFERENCES `tblorganizations` (`OrgId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbldistricts`
--
ALTER TABLE `tbldistricts`
  ADD CONSTRAINT `fk_tbldistricts_tblstates1` FOREIGN KEY (`StateId`) REFERENCES `tblstates` (`StateId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblfeatureoperations`
--
ALTER TABLE `tblfeatureoperations`
  ADD CONSTRAINT `fk_tblfeatureoperations_tblfeatures1` FOREIGN KEY (`FeatureId`) REFERENCES `tblfeatures` (`FeatureId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblfeatureoperations_tbloperations1` FOREIGN KEY (`OperationId`) REFERENCES `tbloperations` (`OperationId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblorganizations`
--
ALTER TABLE `tblorganizations`
  ADD CONSTRAINT `fk_tblorganizations_tblusers1` FOREIGN KEY (`OrgId`) REFERENCES `tblusers` (`UId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblpanchaytee`
--
ALTER TABLE `tblpanchaytee`
  ADD CONSTRAINT `fk_tblpanchaytee_tbldistricts1` FOREIGN KEY (`DistrictId`) REFERENCES `tbldistricts` (`DistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblpanchaytee_tbltaluka1` FOREIGN KEY (`TalukaId`) REFERENCES `tbltaluka` (`TalukaId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblrolefeatures`
--
ALTER TABLE `tblrolefeatures`
  ADD CONSTRAINT `fk_tblrolefeatures_tblfeatureoperations1` FOREIGN KEY (`FeatureId`,`OperationId`) REFERENCES `tblfeatureoperations` (`FeatureId`, `OperationId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblrolefeatures_tblroles1` FOREIGN KEY (`RoleId`) REFERENCES `tblroles` (`RoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbltaluka`
--
ALTER TABLE `tbltaluka`
  ADD CONSTRAINT `fk_tbltaluka_tbldistricts1` FOREIGN KEY (`DistrictId`) REFERENCES `tbldistricts` (`DistrictId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD CONSTRAINT `fk_tblusers_tblroles1` FOREIGN KEY (`RoleId`) REFERENCES `tblroles` (`RoleId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblvillages`
--
ALTER TABLE `tblvillages`
  ADD CONSTRAINT `fk_tblvillages_tblpanchaytee1` FOREIGN KEY (`PanchayteeId`) REFERENCES `tblpanchaytee` (`PanchayteeId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
