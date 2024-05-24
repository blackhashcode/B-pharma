-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 11:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinepharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserID`, `Username`, `PasswordHash`, `FirstName`, `LastName`, `Email`) VALUES
(1, 'afifa2001', '$2y$10$tqKHWQv/.GnPZRJ3gX6tbOAhrK0ZfeVORO6neop/287/NhBRHMOSO', 'afifa', 'rahman', 'afifa.rahman@northsouth.edu'),
(2, 'tausif1234', '$2y$10$bkXtJ8HDEef14S2.t9Hgge93tYb7Nr/Ym//LSGfX0tSOJD6nl.M5q', 'tausif', 'mushtaque', 'tausif.mushtaque@northsouth.edu'),
(3, 'nafisimtiaz', '$2y$10$hk8a.rjVTKYlP5QkTeo67e6ffcla9R.blppfi132xI7kj8NJjM49O', 'nafis', 'imtiaz', 'nafisimtiaz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `MedID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `VarID` int(11) NOT NULL,
  `CompanyRefID` int(11) DEFAULT NULL,
  `MedicineCategoryName` varchar(255) DEFAULT NULL,
  `DescUse` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`VarID`, `CompanyRefID`, `MedicineCategoryName`, `DescUse`) VALUES
(1, 1, 'Antibiotics', 'Medicines used to treat bacterial infections.'),
(2, 1, 'Analgesics', 'Pain-relieving medicines.'),
(3, 1, 'Antidiabetics', 'Medicines used to treat diabetes.'),
(4, 1, 'Antidepressants', 'Medicines used to treat depression.'),
(5, 1, 'Antiemetics', 'Medicines used to prevent or treat nausea and vomiting.'),
(6, 1, 'Antifungals', 'Medicines used to treat fungal infections.'),
(7, 1, 'Antihypertensives', 'Medicines used to treat high blood pressure.'),
(8, 1, 'Anti-inflammatory', 'Medicines that reduce inflammation.'),
(9, 1, 'Cardiovascular', 'Medicines related to heart and blood vessels.'),
(10, 1, 'Anticoagulants', 'Medicines that prevent blood clotting.'),
(11, 1, 'Antihyperlipidemics', 'Medicines used to lower lipid levels in the blood.'),
(12, 1, 'Diuretics', 'Medicines that increase urine production.'),
(13, 1, 'Beta-blockers', 'Medicines used to treat various heart conditions.'),
(14, 1, 'Vasodilators', 'Medicines that dilate blood vessels.'),
(15, 1, 'Antihistamines', 'Medicines that treat allergy symptoms.'),
(16, 1, 'Corticosteroids', 'Medicines used to reduce inflammation.'),
(17, 1, 'Bronchodilators', 'Medicines that open up the airways in the lungs.'),
(18, 1, 'Antitussives', 'Medicines used to suppress cough.'),
(19, 1, 'Expectorants', 'Medicines used to thin mucus and make it easier to cough up.'),
(20, 1, 'Mucolytics', 'Medicines used to break down mucus.'),
(21, 2, 'Antibiotics', 'Medicines used to treat bacterial infections.'),
(22, 2, 'Analgesics', 'Pain-relieving medicines.'),
(23, 2, 'Antidiabetics', 'Medicines used to treat diabetes.'),
(24, 2, 'Antidepressants', 'Medicines used to treat depression.'),
(25, 2, 'Antiemetics', 'Medicines used to prevent or treat nausea and vomiting.'),
(26, 2, 'Antifungals', 'Medicines used to treat fungal infections.'),
(27, 2, 'Antihypertensives', 'Medicines used to treat high blood pressure.'),
(28, 2, 'Anti-inflammatory', 'Medicines that reduce inflammation.'),
(29, 2, 'Cardiovascular', 'Medicines related to heart and blood vessels.'),
(30, 2, 'Anticoagulants', 'Medicines that prevent blood clotting.'),
(31, 2, 'Antihyperlipidemics', 'Medicines used to lower lipid levels in the blood.'),
(32, 2, 'Diuretics', 'Medicines that increase urine production.'),
(33, 2, 'Beta-blockers', 'Medicines used to treat various heart conditions.'),
(34, 2, 'Vasodilators', 'Medicines that dilate blood vessels.'),
(35, 2, 'Antihistamines', 'Medicines that treat allergy symptoms.'),
(36, 2, 'Corticosteroids', 'Medicines used to reduce inflammation.'),
(37, 2, 'Bronchodilators', 'Medicines that open up the airways in the lungs.'),
(38, 2, 'Antitussives', 'Medicines used to suppress cough.'),
(39, 2, 'Expectorants', 'Medicines used to thin mucus and make it easier to cough up.'),
(40, 2, 'Mucolytics', 'Medicines used to break down mucus.'),
(41, 3, 'Antibiotics', 'Medicines used to treat bacterial infections.'),
(42, 3, 'Analgesics', 'Pain-relieving medicines.'),
(43, 3, 'Antidiabetics', 'Medicines used to treat diabetes.'),
(44, 3, 'Antidepressants', 'Medicines used to treat depression.'),
(45, 3, 'Antiemetics', 'Medicines used to prevent or treat nausea and vomiting.'),
(46, 3, 'Antifungals', 'Medicines used to treat fungal infections.'),
(47, 3, 'Antihypertensives', 'Medicines used to treat high blood pressure.'),
(48, 3, 'Anti-inflammatory', 'Medicines that reduce inflammation.'),
(49, 3, 'Cardiovascular', 'Medicines related to heart and blood vessels.'),
(50, 3, 'Anticoagulants', 'Medicines that prevent blood clotting.'),
(51, 3, 'Antihyperlipidemics', 'Medicines used to lower lipid levels in the blood.'),
(52, 3, 'Diuretics', 'Medicines that increase urine production.'),
(53, 3, 'Beta-blockers', 'Medicines used to treat various heart conditions.'),
(54, 3, 'Vasodilators', 'Medicines that dilate blood vessels.'),
(55, 3, 'Antihistamines', 'Medicines that treat allergy symptoms.'),
(56, 3, 'Corticosteroids', 'Medicines used to reduce inflammation.'),
(57, 3, 'Bronchodilators', 'Medicines that open up the airways in the lungs.'),
(58, 3, 'Antitussives', 'Medicines used to suppress cough.'),
(59, 3, 'Expectorants', 'Medicines used to thin mucus and make it easier to cough up.'),
(60, 3, 'Mucolytics', 'Medicines used to break down mucus.'),
(61, 4, 'Antibiotics', 'Medicines used to treat bacterial infections.'),
(62, 4, 'Analgesics', 'Pain-relieving medicines.'),
(63, 4, 'Antidiabetics', 'Medicines used to treat diabetes.'),
(64, 4, 'Antidepressants', 'Medicines used to treat depression.'),
(65, 4, 'Antiemetics', 'Medicines used to prevent or treat nausea and vomiting.'),
(66, 4, 'Antifungals', 'Medicines used to treat fungal infections.'),
(67, 4, 'Antihypertensives', 'Medicines used to treat high blood pressure.'),
(68, 4, 'Anti-inflammatory', 'Medicines that reduce inflammation.'),
(69, 4, 'Cardiovascular', 'Medicines related to heart and blood vessels.'),
(70, 4, 'Anticoagulants', 'Medicines that prevent blood clotting.'),
(71, 4, 'Antihyperlipidemics', 'Medicines used to lower lipid levels in the blood.'),
(72, 4, 'Diuretics', 'Medicines that increase urine production.'),
(73, 4, 'Beta-blockers', 'Medicines used to treat various heart conditions.'),
(74, 4, 'Vasodilators', 'Medicines that dilate blood vessels.'),
(75, 4, 'Antihistamines', 'Medicines that treat allergy symptoms.'),
(76, 4, 'Corticosteroids', 'Medicines used to reduce inflammation.'),
(77, 4, 'Bronchodilators', 'Medicines that open up the airways in the lungs.'),
(78, 4, 'Antitussives', 'Medicines used to suppress cough.'),
(79, 4, 'Expectorants', 'Medicines used to thin mucus and make it easier to cough up.'),
(80, 4, 'Mucolytics', 'Medicines used to break down mucus.'),
(81, 5, 'Antibiotics', 'Medicines used to treat bacterial infections.'),
(82, 5, 'Analgesics', 'Pain-relieving medicines.'),
(83, 5, 'Antidiabetics', 'Medicines used to treat diabetes.'),
(84, 5, 'Antidepressants', 'Medicines used to treat depression.'),
(85, 5, 'Antiemetics', 'Medicines used to prevent or treat nausea and vomiting.'),
(86, 5, 'Antifungals', 'Medicines used to treat fungal infections.'),
(87, 5, 'Antihypertensives', 'Medicines used to treat high blood pressure.'),
(88, 5, 'Anti-inflammatory', 'Medicines that reduce inflammation.'),
(89, 5, 'Cardiovascular', 'Medicines related to heart and blood vessels.'),
(90, 5, 'Anticoagulants', 'Medicines that prevent blood clotting.'),
(91, 5, 'Antihyperlipidemics', 'Medicines used to lower lipid levels in the blood.'),
(92, 5, 'Diuretics', 'Medicines that increase urine production.'),
(93, 5, 'Beta-blockers', 'Medicines used to treat various heart conditions.'),
(94, 5, 'Vasodilators', 'Medicines that dilate blood vessels.'),
(95, 5, 'Antihistamines', 'Medicines that treat allergy symptoms.'),
(96, 5, 'Corticosteroids', 'Medicines used to reduce inflammation.'),
(97, 5, 'Bronchodilators', 'Medicines that open up the airways in the lungs.'),
(98, 5, 'Antitussives', 'Medicines used to suppress cough.'),
(99, 5, 'Expectorants', 'Medicines used to thin mucus and make it easier to cough up.'),
(100, 5, 'Mucolytics', 'Medicines used to break down mucus.');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `EstablishDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`CompanyID`, `CompanyName`, `EstablishDate`) VALUES
(1, 'ACI Limited', '1972-01-01 00:00:00'),
(2, 'Square Pharmaceuticals Ltd.', '1958-01-01 00:00:00'),
(3, 'Incepta Pharmaceuticals Ltd.', '1999-01-01 00:00:00'),
(4, 'Renata Limited', '1972-01-01 00:00:00'),
(5, 'Beximco Pharmaceuticals Ltd.', '1976-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `PhoneNumber` varchar(255) NOT NULL,
  `HomeAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`UserID`, `Email`, `PasswordHash`, `FirstName`, `LastName`, `PhoneNumber`, `HomeAddress`) VALUES
(9, 'tausif.mushtaque@northsouth.edu', '$2y$10$vdbHAbDw...Ma4IBC7TSeO3D21aaUuxnWaePUITHLK.gKH54fYEnO', 'Tausif', 'Mushtaque', '01552551311', 'abc'),
(10, 'afifa.rahman@northsouth.edu', '$2y$10$aRE6TGiBKZci/Q06ffHisuLx987czS3nRUPGNGARFXtzdg6hjSPUG', 'afifa', 'rahman', '01662361231', 'abc'),
(11, 'afifarahman@gmail.com', '$2y$10$pczcvUOt4vCp/pzEVdGUt.RznKrTBnj2RDq8jLxCyh7AuEKzRXGAe', 'afifa', 'rahman', '12345', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `MedID` int(11) NOT NULL,
  `MedCatRef` int(11) DEFAULT NULL,
  `MedCompRef` int(11) DEFAULT NULL,
  `MedicineName` varchar(255) DEFAULT NULL,
  `MedicinePhoto` blob DEFAULT NULL,
  `Price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`MedID`, `MedCatRef`, `MedCompRef`, `MedicineName`, `MedicinePhoto`, `Price`) VALUES
(1, 1, 1, 'Amoxicillin', NULL, 11),
(2, 2, 1, 'Ibuprofen', NULL, 5),
(3, 3, 1, 'Metformin', NULL, 9),
(4, 4, 1, 'Sertraline', NULL, 13),
(5, 5, 1, 'Ondansetron', NULL, 16),
(6, 6, 1, 'Fluconazole', NULL, 7),
(7, 7, 1, 'Lisinopril', NULL, 10),
(8, 8, 1, 'Prednisone', NULL, 6),
(9, 9, 1, 'Atorvastatin', NULL, 12),
(10, 10, 1, 'Warfarin', NULL, 8),
(11, 11, 1, 'Simvastatin', NULL, 10),
(12, 12, 1, 'Hydrochlorothiazide', NULL, 8),
(13, 13, 1, 'Metoprolol', NULL, 10),
(14, 14, 1, 'Nitroglycerin', NULL, 12),
(15, 15, 1, 'Diphenhydramine', NULL, 5),
(16, 16, 1, 'Prednisolone', NULL, 7),
(17, 17, 1, 'Albuterol', NULL, 9),
(18, 18, 1, 'Dextromethorphan', NULL, 4),
(19, 19, 1, 'Guaifenesin', NULL, 5),
(20, 20, 1, 'Acetylcysteine', NULL, 8),
(21, 21, 1, 'Acyclovir', NULL, 9),
(22, 22, 1, 'Chloroquine', NULL, 13),
(23, 23, 1, 'Metronidazole', NULL, 6),
(24, 24, 1, 'Ivermectin', NULL, 12),
(25, 25, 1, 'Lamivudine', NULL, 15),
(26, 26, 2, 'Ciprofloxacin', NULL, 11),
(27, 27, 2, 'Paracetamol', NULL, 5),
(28, 28, 2, 'Insulin', NULL, 9),
(29, 29, 2, 'Escitalopram', NULL, 13),
(30, 30, 2, 'Promethazine', NULL, 16),
(31, 31, 2, 'Ketoconazole', NULL, 7),
(32, 32, 2, 'Losartan', NULL, 10),
(33, 33, 2, 'Dexamethasone', NULL, 6),
(34, 34, 2, 'Rosuvastatin', NULL, 12),
(35, 35, 2, 'Rivaroxaban', NULL, 8),
(36, 36, 2, 'Clopidogrel', NULL, 10),
(37, 37, 2, 'Furosemide', NULL, 8),
(38, 38, 2, 'Propranolol', NULL, 10),
(39, 39, 2, 'Isosorbide', NULL, 12),
(40, 40, 2, 'Cetirizine', NULL, 5),
(41, 41, 2, 'Methylprednisolone', NULL, 7),
(42, 42, 2, 'Terbutaline', NULL, 9),
(43, 43, 2, 'Codeine', NULL, 4),
(44, 44, 2, 'Bromhexine', NULL, 5),
(45, 45, 2, 'Ambroxol', NULL, 8),
(46, 46, 2, 'Oseltamivir', NULL, 9),
(47, 47, 2, 'Primaquine', NULL, 13),
(48, 48, 2, 'Tinidazole', NULL, 6),
(49, 49, 2, 'Dolutegravir', NULL, 12),
(50, 50, 2, 'Levofloxacin', NULL, 15),
(51, 51, 3, 'Penicillin', NULL, 11),
(52, 52, 3, 'Aspirin', NULL, 5),
(53, 53, 3, 'Glibenclamide', NULL, 9),
(54, 54, 3, 'Fluoxetine', NULL, 13),
(55, 55, 3, 'Dexamethasone', NULL, 16),
(56, 56, 3, 'Amphotericin B', NULL, 7),
(57, 57, 3, 'Enalapril', NULL, 10),
(58, 58, 3, 'Methylprednisolone', NULL, 6),
(59, 59, 3, 'Atorvastatin', NULL, 12),
(60, 60, 3, 'Rivaroxaban', NULL, 8),
(61, 61, 3, 'Clopidogrel', NULL, 10),
(62, 62, 3, 'Hydrochlorothiazide', NULL, 8),
(63, 63, 3, 'Propranolol', NULL, 10),
(64, 64, 3, 'Isosorbide', NULL, 12),
(65, 65, 3, 'Cetirizine', NULL, 5),
(66, 66, 3, 'Methylprednisolone', NULL, 7),
(67, 67, 3, 'Salbutamol', NULL, 9),
(68, 68, 3, 'Dextromethorphan', NULL, 4),
(69, 69, 3, 'Bromhexine', NULL, 5),
(70, 70, 3, 'Acetylcysteine', NULL, 8),
(71, 71, 3, 'Acyclovir', NULL, 9),
(72, 72, 3, 'Chloroquine', NULL, 13),
(73, 73, 3, 'Metronidazole', NULL, 6),
(74, 74, 3, 'Ivermectin', NULL, 12),
(75, 75, 3, 'Lamivudine', NULL, 15),
(76, 76, 4, 'Cephalexin', NULL, 11),
(77, 77, 4, 'Acetaminophen', NULL, 5),
(78, 78, 4, 'Insulin', NULL, 9),
(79, 79, 4, 'Fluoxetine', NULL, 13),
(80, 80, 4, 'Ondansetron', NULL, 16),
(81, 81, 4, 'Ketoconazole', NULL, 7),
(82, 82, 4, 'Losartan', NULL, 10),
(83, 83, 4, 'Prednisone', NULL, 6),
(84, 84, 4, 'Rosuvastatin', NULL, 12),
(85, 85, 4, 'Warfarin', NULL, 8),
(86, 86, 4, 'Simvastatin', NULL, 10),
(87, 87, 4, 'Hydrochlorothiazide', NULL, 8),
(88, 88, 4, 'Metoprolol', NULL, 10),
(89, 89, 4, 'Nitroglycerin', NULL, 12),
(90, 90, 4, 'Diphenhydramine', NULL, 5),
(91, 91, 4, 'Prednisolone', NULL, 7),
(92, 92, 4, 'Albuterol', NULL, 9),
(93, 93, 4, 'Dextromethorphan', NULL, 4),
(94, 94, 4, 'Guaifenesin', NULL, 5),
(95, 95, 4, 'Acetylcysteine', NULL, 8),
(96, 96, 4, 'Acyclovir', NULL, 9),
(97, 97, 4, 'Chloroquine', NULL, 13),
(98, 98, 4, 'Metronidazole', NULL, 6),
(99, 99, 4, 'Ivermectin', NULL, 12),
(100, 100, 4, 'Lamivudine', NULL, 15),
(101, 1, 5, 'Amoxicillin', NULL, 11),
(102, 2, 5, 'Ibuprofen', NULL, 5),
(103, 3, 5, 'Metformin', NULL, 9),
(104, 4, 5, 'Sertraline', NULL, 13),
(105, 5, 5, 'Ondansetron', NULL, 16),
(106, 6, 5, 'Fluconazole', NULL, 7),
(107, 7, 5, 'Lisinopril', NULL, 10),
(108, 8, 5, 'Prednisone', NULL, 6),
(109, 9, 5, 'Atorvastatin', NULL, 12),
(110, 10, 5, 'Warfarin', NULL, 8),
(111, 11, 5, 'Simvastatin', NULL, 10),
(112, 12, 5, 'Hydrochlorothiazide', NULL, 8),
(113, 13, 5, 'Metoprolol', NULL, 10),
(114, 14, 5, 'Nitroglycerin', NULL, 12),
(115, 15, 5, 'Diphenhydramine', NULL, 5),
(116, 16, 5, 'Prednisolone', NULL, 7),
(117, 17, 5, 'Albuterol', NULL, 9),
(118, 18, 5, 'Dextromethorphan', NULL, 4),
(119, 19, 5, 'Guaifenesin', NULL, 5),
(120, 20, 5, 'Acetylcysteine', NULL, 8),
(121, 21, 5, 'Acyclovir', NULL, 9),
(122, 22, 5, 'Chloroquine', NULL, 13),
(123, 23, 5, 'Metronidazole', NULL, 6),
(124, 24, 5, 'Ivermectin', NULL, 12),
(125, 25, 5, 'Lamivudine', NULL, 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `TotalPrice` decimal(10,2) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `TotalPrice`, `OrderDate`) VALUES
(2, 9, 45.00, '2024-05-24 18:09:36'),
(3, 9, 38.00, '2024-05-24 18:09:44'),
(4, 9, 25.00, '2024-05-24 18:10:37'),
(5, 9, 25.00, '2024-05-24 18:12:47'),
(6, 9, 44.00, '2024-05-24 18:13:24'),
(7, 9, 26.00, '2024-05-24 18:15:06'),
(8, 9, 29.00, '2024-05-24 18:17:00'),
(9, 9, 16.00, '2024-05-24 18:17:21'),
(10, 9, 25.00, '2024-05-24 18:18:34'),
(11, 9, 45.00, '2024-05-24 18:23:21'),
(12, 11, 29.00, '2024-05-24 18:45:28'),
(13, 11, 16.00, '2024-05-24 18:48:40'),
(14, 11, 16.00, '2024-05-24 18:49:01'),
(15, 11, 16.00, '2024-05-24 18:50:07'),
(16, 11, 25.00, '2024-05-24 19:28:42'),
(17, 11, 25.00, '2024-05-24 19:38:48'),
(18, 11, 29.00, '2024-05-24 19:40:42'),
(19, 11, 39.00, '2024-05-24 20:05:58'),
(20, 11, 25.00, '2024-05-24 20:11:36'),
(21, 11, 29.00, '2024-05-24 20:14:17'),
(22, 11, 16.00, '2024-05-24 20:15:26'),
(23, 11, 19.00, '2024-05-24 20:18:35'),
(24, 11, 22.00, '2024-05-24 20:20:00'),
(25, 11, 39.00, '2024-05-24 20:26:13'),
(26, 11, 28.00, '2024-05-24 20:46:56'),
(27, 11, 40.00, '2024-05-24 20:48:09'),
(28, 11, 16.00, '2024-05-24 20:50:23'),
(29, 11, 45.00, '2024-05-24 20:50:58'),
(30, 9, 55.00, '2024-05-24 20:54:01'),
(31, 9, 28.00, '2024-05-24 20:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `OrderDetailID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `MedID` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `MedID` (`MedID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`VarID`),
  ADD KEY `CompanyRefID` (`CompanyRefID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`MedID`),
  ADD KEY `MedCatRef` (`MedCatRef`),
  ADD KEY `MedCompRef` (`MedCompRef`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `MedID` (`MedID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `VarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `MedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`UserID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`MedID`) REFERENCES `medicine` (`MedID`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`CompanyRefID`) REFERENCES `companies` (`CompanyID`);

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`MedCatRef`) REFERENCES `category` (`VarID`),
  ADD CONSTRAINT `medicine_ibfk_2` FOREIGN KEY (`MedCompRef`) REFERENCES `companies` (`CompanyID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`UserID`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`MedID`) REFERENCES `medicine` (`MedID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
