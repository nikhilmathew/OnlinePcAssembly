-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2015 at 06:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pcassembly`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_inventory`
--

CREATE TABLE IF NOT EXISTS `acc_inventory` (
  `id` int(10) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `type` varchar(3) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` int(6) NOT NULL,
  `reid` int(6) NOT NULL,
  `picture` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_inventory`
--

INSERT INTO `acc_inventory` (`id`, `productname`, `brand`, `type`, `description`, `price`, `reid`, `picture`) VALUES
(39, 'steelseries siberia', 'steelseries', 'hea', 'freakin awesome headset for gaming', 6799, 3, 'uploads/39.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `inv_id_gen`
--

CREATE TABLE IF NOT EXISTS `inv_id_gen` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `table` varchar(40) NOT NULL COMMENT 'name of the table in which this id is used',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `inv_id_gen`
--

INSERT INTO `inv_id_gen` (`id`, `table`) VALUES
(18, 'motherboard_inventory'),
(19, 'motherboard_inventory'),
(20, 'motherboard_inventory'),
(21, 'parts_inventory'),
(22, 'parts_inventory'),
(23, 'parts_inventory'),
(24, 'parts_inventory'),
(25, 'parts_inventory'),
(26, 'parts_inventory'),
(27, 'parts_inventory'),
(28, 'parts_inventory'),
(29, 'parts_inventory'),
(30, 'parts_inventory'),
(31, 'parts_inventory'),
(32, 'parts_inventory'),
(33, 'parts_inventory'),
(34, 'parts_inventory'),
(35, 'parts_inventory'),
(36, 'parts_inventory'),
(37, 'acc_inventory'),
(39, 'acc_inventory'),
(40, 'parts_inventory'),
(41, 'parts_inventory'),
(42, 'parts_inventory'),
(43, 'modificationlist'),
(44, 'modificationlist'),
(45, 'modificationlist');

-- --------------------------------------------------------

--
-- Table structure for table `modificationlist`
--

CREATE TABLE IF NOT EXISTS `modificationlist` (
  `id` int(6) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `type` varchar(6) NOT NULL,
  `price` int(8) NOT NULL,
  `reid` int(6) NOT NULL,
  `description` varchar(300) NOT NULL,
  `picture` varchar(30) NOT NULL,
  `brand` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modificationlist`
--

INSERT INTO `modificationlist` (`id`, `productname`, `type`, `price`, `reid`, `description`, `picture`, `brand`) VALUES
(43, 'Red Neon Cabinet Lighting', 'lig', 3600, 9, 'Style your awesome cabinet with some  awesome red lighting effects', 'uploads/43.jpg', 'NZXT'),
(44, 'Blue Neon Lighting', 'lig', 2700, 9, 'Blue Neon Lighting', 'uploads/44.jpg', 'spica'),
(45, 'green Lighting', 'lig', 2540, 9, 'Green Neon Lighting', 'uploads/45.jpg', 'greenify');

-- --------------------------------------------------------

--
-- Table structure for table `motherboard_inventory`
--

CREATE TABLE IF NOT EXISTS `motherboard_inventory` (
  `id` int(10) NOT NULL COMMENT 'motherboard id',
  `reid` int(6) NOT NULL COMMENT 'retailer id',
  `productname` varchar(30) NOT NULL COMMENT 'product name',
  `brand` varchar(20) NOT NULL COMMENT 'brand',
  `ff` varchar(10) NOT NULL COMMENT 'form factor',
  `description` varchar(300) NOT NULL COMMENT 'description',
  `socket` varchar(10) NOT NULL COMMENT 'socket type for cpu',
  `memtype` varchar(4) NOT NULL COMMENT 'memory type',
  `memslots` int(1) NOT NULL COMMENT 'no of memslots',
  `pcieslots` int(1) NOT NULL COMMENT 'no no of pcie slots',
  `nsata` int(1) NOT NULL COMMENT 'no of sata',
  `power` int(5) NOT NULL COMMENT 'power consumption',
  `price` int(6) NOT NULL COMMENT 'price',
  `picture` varchar(30) NOT NULL COMMENT 'location of pic',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mid` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motherboard_inventory`
--

INSERT INTO `motherboard_inventory` (`id`, `reid`, `productname`, `brand`, `ff`, `description`, `socket`, `memtype`, `memslots`, `pcieslots`, `nsata`, `power`, `price`, `picture`) VALUES
(18, 3, 'Asus RAMPAGE V EXTREME Motherb', 'Asus', 'E-ATX', 'Key Features of Asus RAMPAGE V EXTREME Motherboard 8 Memory :nkdlcdsavcsdvnkdsavnakds\ncnjxdavjavkjxavl;v\nnkawdnckdsnvkjsnvkrnkvlw\nnckdanckldnkehbjlwrcjkndkxn\nekcnkdsncklsnckadlbvjlrvbclkdjn\nckdnkclndkcndkcndekfcbrl\njwvdklnckdacndkc', 'lga2011', 'DDR4', 8, 4, 8, 100, 42000, 'uploads/18.jpg'),
(19, 3, 'Asus X99-DELUXE Motherboard', 'Asus', 'ATX', 'Key Features of Asus X99-DELUXE Motherboard LGA 2011-v3 Sock', 'lga2011', 'D', 6, 4, 8, 100, 40, 'uploads/19.jpg'),
(20, 3, 'Gigabyte GA-X99-SOC FORCE Moth', 'Gigabyte', 'E-ATX', 'Key Features of Gigabyte GA-X99-SOC FORCE Motherboard Intel ', 'lga2011', 'D', 8, 4, 8, 100, 40, 'uploads/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE IF NOT EXISTS `order_list` (
  `oid` int(6) NOT NULL AUTO_INCREMENT,
  `uid` int(6) NOT NULL,
  `reid` int(6) NOT NULL,
  `status` varchar(50) NOT NULL COMMENT 'status of the order',
  `orderstring` varchar(300) NOT NULL COMMENT 'orderstring',
  `price` int(12) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deliveryadd` varchar(300) NOT NULL,
  `notification` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`oid`, `uid`, `reid`, `status`, `orderstring`, `price`, `orderdate`, `deliveryadd`, `notification`) VALUES
(1, 3, 3, 'Shipped', 'S^19^21^24^29^31^34^35^19^21^24^29^30^34^35^36', 381476, '0000-00-00 00:00:00', '', 'shipping no: 23892hdjeky23890jsdejkf'),
(2, 3, 0, 'demo', 'G^Darth Invader^19^1^21^1^25^2^28^1^31^1^34^1^36^1', 381476, '0000-00-00 00:00:00', '', NULL),
(3, 3, 0, 'demo', 'P^dominator^19^1^21^1^25^1^28^1^31^1^34^1^36^1', 381476, '0000-00-00 00:00:00', '', NULL),
(6, 7, 3, 'processing', 'S^19^21^25^29^32^34^36', 171187, '0000-00-00 00:00:00', '', 'your order has been accepted'),
(52, 3, 0, 'pending', 'S^19^3^21^1^25^2^28^1^31^1^34^1^36^1', 234792, '2015-04-14 08:52:01', '', NULL),
(57, 3, 3, 'processing', 'A^39^2', 13598, '2015-04-14 08:53:36', '', 'your order has been accepted'),
(58, 3, 3, 'complete', 'P^21^1', 4800, '2015-04-14 08:53:37', '', 'Received confirmation that order has been received by customer'),
(59, 3, 0, 'pending', 'S^20^1^24^1^28^1^31^1^34^1^35^1^19^1^21^1^25^1^28^1^31^1^34^1^36^1', 355782, '2015-04-19 14:51:24', 'nikhildvwsjvljvajkfk', NULL),
(60, 7, 0, 'pending', 'S^21^1^25^2^29^2^32^2^34^1^36^1^21^1^26^5', 842828, '2015-04-21 11:57:55', 'nikhi;dnkdhcla', NULL),
(61, 7, 0, 'pending', 'A^39^1', 6799, '2015-04-21 11:57:55', 'nikhi;dnkdhcla', NULL),
(62, 7, 0, 'pending', 'P^19^1^19^2^20^2^32^3^19^2', 270277, '2015-04-21 11:57:55', 'nikhi;dnkdhcla', NULL),
(63, 7, 0, 'pending', 'S^19^1^21^1^25^2^28^1^31^1^34^1^36^1', 234792, '2015-04-24 01:22:49', 'nikhil mathew ajce', NULL),
(64, 3, 0, 'demo', 'G^Red Destroyer^19^1^21^1^25^2^28^1^31^1^34^1^36^1', 381476, '0000-00-00 00:00:00', '', NULL),
(65, 3, 0, 'demo', 'G^NEW GEN^19^1^22^1^25^1^28^1^31^1^34^1^36^1', 355782, '2015-04-19 14:51:24', 'nikhildvwsjvljvajkfk', NULL),
(66, 7, 0, 'pending', 'S^19^1^21^1^25^2^28^1^31^1^34^1^36^1', 238840, '2015-04-26 07:01:38', 'some randpm address', NULL),
(67, 7, 0, 'pending', 'S^19^1^21^1^25^2^28^1^31^1^34^1^36^1', 234700, '2015-04-26 07:04:17', 'some random address', NULL),
(68, 7, 0, 'pending', 'S^19^1^21^1^25^2^28^1^31^1^34^1^36^1^19^1^21^1^25^1^29^1^30^1^34^1^35^1^42^1^M^43^1', 513675, '2015-04-27 07:01:33', 'hdeqiodla', NULL),
(69, 7, 0, 'pending', 'A^39^1', 6799, '2015-04-27 07:01:33', 'hdeqiodla', NULL),
(70, 7, 9, 'Processing', 'P^18^1^25^1', 91999, '2015-04-27 07:01:34', 'hdeqiodla', 'your order has been accepted');

-- --------------------------------------------------------

--
-- Table structure for table `parts_inventory`
--

CREATE TABLE IF NOT EXISTS `parts_inventory` (
  `id` int(10) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `type` varchar(3) NOT NULL,
  `description` varchar(300) NOT NULL,
  `ff` varchar(10) DEFAULT NULL,
  `socket` varchar(10) DEFAULT NULL,
  `memtype` varchar(4) DEFAULT NULL,
  `power` int(5) DEFAULT NULL,
  `qty` int(2) NOT NULL DEFAULT '1',
  `price` int(6) NOT NULL,
  `reid` int(6) NOT NULL,
  `picture` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parts_inventory`
--

INSERT INTO `parts_inventory` (`id`, `productname`, `brand`, `type`, `description`, `ff`, `socket`, `memtype`, `power`, `qty`, `price`, `reid`, `picture`) VALUES
(21, 'Circle CC830 Full Tower Cabine', 'Circle', 'cab', 'Key Features of Product Compatible with professional gaming ', 'ATX', '', '', 0, 1, 4800, 3, 'uploads/21.jpg'),
(22, 'Cooler Master Cosmos II Black', 'CoolerMaster', 'cab', 'Key Features of Cooler Master Cosmos II Black 5 Fan Ultra To', 'ATX', '', '', 0, 1, 27542, 3, 'uploads/22.jpg'),
(24, 'Intel 3.5 GHz LGA 2011 i7 3970', 'Intel', 'cpu', 'Key Features of Intel 3.5 GHz LGA 2011 i7 3970X Processor FC', '', 'lga2011', '', 150, 1, 51999, 3, 'uploads/24.jpg'),
(25, 'Intel 3.2 GHz LGA 2011 Core i7', 'intel', 'cpu', 'Key Features of Intel 3.2 GHz LGA 2011 Core i7-3930K Process', '', 'lga2011', '', 130, 1, 49999, 3, 'uploads/25.jpg'),
(26, 'Intel 3 GHz LGA 2011 i7 5960X ', 'intel', 'cpu', 'Key Features of Intel 3 GHz LGA 2011 i7 5960X Processor 3 GH', '', 'lga2011', '', 140, 1, 79990, 3, 'uploads/26.jpg'),
(27, 'G.Skill Ripjaws4 DDR4 32 GB PC', 'G.Skill', 'ram', 'Ready to shred through data like never before. Imagine rows ', '', '', 'DDR4', 55, 1, 49500, 3, 'uploads/27.jpg'),
(28, 'HyperX Predator DDR4 16 GB PC ', 'HyperX', 'ram', 'HyperX HX421C13PBK4/16 is a kit of four 512M x 64-bit (4GB) ', '', '', 'D', 45, 1, 29999, 3, 'uploads/28.jpg'),
(29, 'Corsair Vengeance Pro DDR3 16 ', 'Corsair', 'ram', 'Corsair Vengeance Pro Series memory modules are designed for', '', '', 'D', 50, 1, 16999, 3, 'uploads/29.jpg'),
(30, 'NVIDIA Quadro K5000 for MAC 4 ', 'Nvidia', 'gpu', 'The NVIDIA Kepler architecture introduces the concept of bin', '', '', '', 300, 1, 147200, 3, 'uploads/30.jpg'),
(31, 'NVIDIA Quadro K4000 3 GB DDR5 ', 'Nvidia', 'gpu', 'The NVIDIA Kepler architecture introduces the concept of bin', '', '', '', 250, 1, 59900, 3, 'uploads/31.jpg'),
(32, 'ZOTAC NVIDIA GeForce GTX TITAN', 'zotac', 'gpu', 'ZOTAC NVIDIA GeForce GTX TITAN 6GB GDDR5 Graphics Card', '', '', '', 200, 1, 89999, 3, 'uploads/32.jpg'),
(34, 'wd caviar blue 1tb', 'wd', 'hdd', '1tb internal hdd', '', '', '', 35, 1, 4350, 5, 'uploads/34.jpg'),
(35, 'wd caviar blue 2tb', 'wd', 'hdd', '2 tb internal hdd', '', '', '', 35, 1, 9000, 5, 'uploads/35.jpg'),
(36, 'cooler master 600w', 'cooler master', 'psu', 'power supply', '', '', '', 600, 1, 5000, 5, 'uploads/36.jpg'),
(41, 'snapdragon desklord', 'qualcomm', 'cpu', 'the first mobile processor for desktop motherboards (fake)', '', '810', '', 25, 1, 12000, 3, 'uploads/41.jpg'),
(42, 'coolermaster powerbarn', 'coolermaster', 'psu', 'something i thought about in a dream', '', '', '', 1700, 1, 6599, 13, 'uploads/42.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE IF NOT EXISTS `shopping_cart` (
  `cartelement` int(7) NOT NULL AUTO_INCREMENT COMMENT 'autoicrement pk',
  `uid` int(6) NOT NULL,
  `typeofpurchase` varchar(5) NOT NULL,
  `pid` int(7) NOT NULL,
  `qty` int(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cartelement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `userid` int(6) NOT NULL AUTO_INCREMENT COMMENT 'generates a auto incrementing id for every user',
  `username` varchar(30) NOT NULL COMMENT 'unique username',
  `password` varchar(40) NOT NULL COMMENT 'password',
  `email` varchar(30) NOT NULL COMMENT 'mail id',
  `privelage` varchar(1) NOT NULL COMMENT 'either U  or R or A',
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userid`, `username`, `password`, `email`, `privelage`, `address`, `phone`) VALUES
(2, 'sanish', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sanish@grandmaster.chs', 'U', '', ''),
(3, 'sharannia', '1ec31a8aadeb69ffe9193dbe741d780c8143b920', 'sharanniapillai@gmail.com', 'A', NULL, ''),
(4, 'ooko', '2d204e7f96d4a0f506b6c666347c795b0acb3d94', 'tainu@opa.com', 'U', '', ''),
(5, 'tainu', 'f597171dbc8270391bc547d4639cceca65d69b8e', 'tainuraju@gmail.com', 'R', '', ''),
(6, 'san', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'san@ish.com', 'R', '', ''),
(7, 'manish', '87fbca52fb0e7e5e95cccaf6c6876d02ef0b5ee5', 'manish@gmail.com', 'U', '', ''),
(9, 'nikku', '1ec31a8aadeb69ffe9193dbe741d780c8143b920', 'nikhillukemathew@gmail.com', 'R', 'nikhildvwsjvljvajkfk', ''),
(10, 'nikhita', '1ca89253a10aab8ca6938a100af5a3996b3c0e55', 'nikhitatheresa@gmail.com', 'R', '', ''),
(11, 'nikhila', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nikhilamaria@gmail.com', 'U', '', ''),
(12, 'qwe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'nikhil@opa.co', 'U', '', ''),
(13, 'shefali', '1ec31a8aadeb69ffe9193dbe741d780c8143b920', 'shefaligairola@gmail.com', 'U', 'somewhere in north india', '7958527800'),
(14, 'riya', 'c008b7fd4c2b1539b9716151fa43b949e6570363', 'riya.mm.15@gmail.com', 'U', 'bfwhaflweifxjgmeloo', '7958527800');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
