-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 06:02 AM
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
-- Database: `cpsc471`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`) VALUES
('admin', 'admin101@email.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customerusername` varchar(45) NOT NULL,
  `totalprice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customerusername`, `totalprice`) VALUES
('braden.thompson', 0),
('tyler.thompson', 10.99);

-- --------------------------------------------------------

--
-- Table structure for table `contains`
--

CREATE TABLE `contains` (
  `idorder` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contains`
--

INSERT INTO `contains` (`idorder`, `idproduct`) VALUES
(1, 1002),
(2, 1002),
(3, 1003),
(3, 1004),
(4, 1004);

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `couriername` varchar(45) NOT NULL,
  `phonenumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`couriername`, `phonenumber`) VALUES
('Fedex', 2044834092);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `streetname` varchar(45) DEFAULT NULL,
  `unitnumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `email`, `password`, `province`, `country`, `city`, `streetname`, `unitnumber`) VALUES
('braden.thompson', 'bradent@outlook.com', '123', 'Alberta', 'Canada', 'Calgary', '49st NW', 3519),
('tyler.thompson', 'tylert@outlook.com', '123', 'Alberta', 'Canada', 'Calgary', '49st NW', 3519);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `adminusername` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`username`, `email`, `adminusername`, `password`, `firstname`, `lastname`) VALUES
('employee', 'employee101@email.com', 'admin', 'employee', 'Mike', 'Wazowski');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `idorder` int(11) NOT NULL,
  `couriername` varchar(45) NOT NULL,
  `customerusername` varchar(45) NOT NULL,
  `orderdate` varchar(45) NOT NULL,
  `shippingdate` varchar(45) NOT NULL,
  `trackingid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myorder`
--

INSERT INTO `myorder` (`idorder`, `couriername`, `customerusername`, `orderdate`, `shippingdate`, `trackingid`) VALUES
(1, 'Fedex', 'braden.thompson', '2019/12/04', '2019/12/04', 1),
(2, 'Fedex', 'braden.thompson', '2019/12/04', '2019/12/04', 2),
(3, 'Fedex', 'tyler.thompson', '2019/12/06', '2019/12/06', 3),
(4, 'Fedex', 'braden.thompson', '2019/12/06', '2019/12/06', 4);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idproduct` int(11) NOT NULL,
  `adminusername` varchar(45) DEFAULT NULL,
  `idsupplier` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idproduct`, `adminusername`, `idsupplier`, `quantity`, `name`, `price`, `image`) VALUES
(1002, 'admin', 3001, 0, 'Treadmill', 1999.99, 'img/treadmill.png'),
(1003, 'admin', 3001, 76, 'Protein Powder', 10.99, 'img/proteinpowder.jpg'),
(1004, 'admin', 3001, 0, 'Twenty Pound Weight', 49.99, 'img/twentylbs.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productfills`
--

CREATE TABLE `productfills` (
  `customerusername` varchar(45) NOT NULL,
  `productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productfills`
--

INSERT INTO `productfills` (`customerusername`, `productid`) VALUES
('tyler.thompson', 1003);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `postalcode` varchar(45) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `streetname` varchar(45) DEFAULT NULL,
  `unitnumber` varchar(45) DEFAULT NULL,
  `phonenumber` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `name`, `postalcode`, `province`, `country`, `city`, `streetname`, `unitnumber`, `phonenumber`) VALUES
(3001, 'supplier', 'T3A2C7', 'Alberta', 'Canada', 'Calgary', '49st NW', '31', '2045734393');

-- --------------------------------------------------------

--
-- Table structure for table `timestamp`
--

CREATE TABLE `timestamp` (
  `sender` varchar(45) NOT NULL,
  `date` date DEFAULT NULL,
  `messagecontent` varchar(255) DEFAULT NULL,
  `recipient` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timestamp`
--

INSERT INTO `timestamp` (`sender`, `date`, `messagecontent`, `recipient`) VALUES
('riptonedsupport', '2019-12-06', 'This is a test', 'Braden');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`customerusername`);

--
-- Indexes for table `contains`
--
ALTER TABLE `contains`
  ADD PRIMARY KEY (`idorder`,`idproduct`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`couriername`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`);

--
-- Indexes for table `productfills`
--
ALTER TABLE `productfills`
  ADD PRIMARY KEY (`customerusername`,`productid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
