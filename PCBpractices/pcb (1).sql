-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 01:29 PM
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
(0, 'tblroles', 1, 1);

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
(1, 'tables', 1);

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
(2, 2),
(3, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblfeatures`
--

CREATE TABLE `tblfeatures` (
  `FeatureId` int(11) NOT NULL,
  `FeatureName` varchar(45) NOT NULL,
  `FeatureType` tinyint(4) DEFAULT NULL,
  `FeatureTypeId` varchar(15) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeatures`
--

INSERT INTO `tblfeatures` (`FeatureId`, `FeatureName`, `FeatureType`, `FeatureTypeId`, `Status`) VALUES
(1, 'Employee Master', 0, 'MainMenu', 1),
(2, 'roles', 1, 'SubMenu', 1),
(3, 'districts', 5, 'SubMenu', 1),
(5, 'Location Master', 0, 'MainMenu', 1),
(6, 'taluka', 5, 'SubMenu', 1);

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
(1, 'create', 1),
(2, 'update', 1),
(3, 'delete', 1),
(4, 'sfgfupddfdate', 2);

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
(2, 2, 2);

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
(5, 'Employee', 1);

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
  `ApiToken` varchar(255) NOT NULL,
  `RememberToken` varchar(255) NOT NULL
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
-- Indexes for table `tblvillages`
--
ALTER TABLE `tblvillages`
  ADD PRIMARY KEY (`VillageId`),
  ADD KEY `fk_tblvillages_tblpanchaytee1_idx` (`PanchayteeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lookupgroups`
--
ALTER TABLE `lookupgroups`
  MODIFY `GroupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `LogId` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `UId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvillages`
--
ALTER TABLE `tblvillages`
  MODIFY `VillageId` int(11) NOT NULL AUTO_INCREMENT;

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
