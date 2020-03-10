-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 01:43 PM
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
(3, 'waste disposals', 2, 1),
(4, 'waste generators', 2, 1);

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
(2, 'Organizations', 1);

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
  `BranchName` varchar(45) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeatures`
--

CREATE TABLE `tblfeatures` (
  `FeatureId` int(11) NOT NULL,
  `FeatureName` varchar(45) NOT NULL,
  `FeatureType` varchar(45) NOT NULL,
  `FeatureTypeId` int(11) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeatures`
--

INSERT INTO `tblfeatures` (`FeatureId`, `FeatureName`, `FeatureType`, `FeatureTypeId`, `Status`) VALUES
(1, 'Employee Master', 'MainMenu', NULL, 1),
(2, 'Location Master', 'MainMenu', NULL, 1),
(3, 'Masters', 'MainMenu', NULL, 1),
(4, 'Menu4', 'MainMenu', NULL, 1),
(5, 'Menu5', 'MainMenu', NULL, 1),
(6, 'Menu6', 'MainMenu', NULL, 1),
(7, 'Menu7', 'MainMenu', NULL, 1),
(8, 'Menu8', 'MainMenu', NULL, 1),
(9, 'Menu9', 'MainMenu', NULL, 1),
(10, 'Menu10', 'MainMenu', NULL, 1),
(11, 'Roles', 'SubMenu', 1, 1),
(12, 'States', 'SubMenu', 2, 1),
(13, 'Districts', 'SubMenu', 2, 1),
(14, 'Taluka', 'SubMenu', 2, 1),
(15, 'Country', 'SubMenu', 2, 1),
(16, 'Panchayatee', 'SubMenu', 2, 1),
(17, 'Village', 'SubMenu', 2, 1),
(18, 'Waste Colors', 'SubMenu', 3, 1),
(19, 'Waste types', 'SubMenu', 3, 1),
(20, 'Industry Types', 'SubMenu', 3, 1),
(21, 'Vehicle Types', 'SubMenu', 3, 1),
(22, 'Employee', 'SubMenu', 1, 1),
(23, 'Organizations', 'MainMenu', NULL, 1),
(24, 'Waste Generators', 'Submenu', 23, 1),
(25, 'Waste Disposal Plants', 'SubMenu', 23, 1);

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
(12, 1, 1, 1, '2020-03-10 12:12:53', 1, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `tblpanchaytee`
--

CREATE TABLE `tblpanchaytee` (
  `PanchayteeId` int(11) NOT NULL,
  `PanchayteeName` varchar(45) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `DistrictId` int(11) NOT NULL,
  `TalukaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 25, 4);

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
(6, 'Driver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroutes`
--

CREATE TABLE `tblroutes` (
  `RouteId` int(11) NOT NULL,
  `RouteName` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstates`
--

CREATE TABLE `tblstates` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `RememberToken` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UId`, `UserId`, `Password`, `FirstName`, `LastName`, `DisplayName`, `RoleId`, `ContactNo`, `EmailId`, `ProfilePic`, `Status`, `ApiToken`, `RememberToken`) VALUES
(1, 'aAPgtGRmzlIfwtf', '$2y$10$45SPyqp.AJ3ApjxgoBdJGua4yGq2oDSD8oSlAW6crIN7bD7JKE4om', NULL, NULL, 'test one', 2, NULL, 'testone@gmail.com', NULL, 1, 'cbNtdyz5gSj2qebSnzxn5WM1udwU3QQr7H70w4NYLZ9sbixCmusx8A79wdKeSEQCorEBSsXaMLohyp0CNYkPZjyvOfR89vHwW0kHxcKP78rx2JEMGQHe316m8AEnCmEFFogxEbAcOh5KJ6zznRp7L92020-03-1012:12:53', NULL),
(2, 'h9X9FUqNViFuvxK', '$2y$10$OflHeersiwimrnebmOWBZOzhukyOxmU4mjASvSv1YMglTtdqyYDuW', NULL, NULL, 'admin', 2, NULL, 'admin@gmail.com', NULL, 1, NULL, NULL);

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
  `PollutionCheckExpiryDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblvillages`
--

CREATE TABLE `tblvillages` (
  `VillageId` int(11) NOT NULL,
  `PanchayteeId` int(11) NOT NULL,
  `VillageName` varchar(45) NOT NULL,
  `Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblwastegenerators`
--

CREATE TABLE `tblwastegenerators` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `routename` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblwastegenerators`
--

INSERT INTO `tblwastegenerators` (`id`, `name`, `latitude`, `longitude`, `routename`) VALUES
(3, 'Madhapur, Hyderabad, Telangana, India', '17.4485835', '78.39080349999999', ''),
(4, 'Ameerpet, Hyderabad, Telangana, India', '17.4375084', '78.4482441', ''),
(5, 'Begumpet, Hyderabad, Telangana, India', '17.4447068', '78.4663812', ''),
(6, 'Paradise Circle, Sandhu Apartment, Kalasiguda, Secunderabad, Telangana', '17.4432902', '78.4874663', ''),
(7, 'Uppal, Hyderabad, Telangana, India', '17.434026', '78.5582652', '');

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
-- Indexes for table `tbldistricts`
--
ALTER TABLE `tbldistricts`
  ADD PRIMARY KEY (`DistrictId`),
  ADD UNIQUE KEY `DistrictName_UNIQUE` (`DistrictName`),
  ADD KEY `fk_tbldistricts_tblstates1_idx` (`StateId`);

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
-- Indexes for table `tblwastegenerators`
--
ALTER TABLE `tblwastegenerators`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lookupgroups`
--
ALTER TABLE `lookupgroups`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbranchs`
--
ALTER TABLE `tblbranchs`
  MODIFY `BranchId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldistricts`
--
ALTER TABLE `tbldistricts`
  MODIFY `DistrictId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllogs`
--
ALTER TABLE `tbllogs`
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbloperations`
--
ALTER TABLE `tbloperations`
  MODIFY `OperationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblpanchaytee`
--
ALTER TABLE `tblpanchaytee`
  MODIFY `PanchayteeId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblroutes`
--
ALTER TABLE `tblroutes`
  MODIFY `RouteId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstates`
--
ALTER TABLE `tblstates`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltaluka`
--
ALTER TABLE `tbltaluka`
  MODIFY `TalukaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `VehicleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvillages`
--
ALTER TABLE `tblvillages`
  MODIFY `VillageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblwastegenerators`
--
ALTER TABLE `tblwastegenerators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `fk_tblorganizations_lookupentity1` FOREIGN KEY (`OrgTypeId`) REFERENCES `lookupentity` (`EntityId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
