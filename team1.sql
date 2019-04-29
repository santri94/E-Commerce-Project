SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `team1database`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_type` varchar(10) NOT NULL,
  `Cat_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_type`, `Cat_name`) VALUES
('BKB', 'Basketball'),
('BSB', 'Baseball'),
('FTB', 'Football'),
('SCC', 'Soccer'),
('TNS', 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(15) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `Pquantity` int(11) NOT NULL,
  `cost` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(30) NOT NULL,
  `Cat_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `PName`, `Pquantity`, `cost`, `description`, `image`, `Cat_type`) VALUES
('1001', 'Adidas Predator Cleat', 49, 39.99, 'White Flexible Ground Big Kids/Little Kids Soccer Cleat', 'image1', 'SCC'),
('1002', 'Nike Phantom Cleat', 100, 59.99, 'Red Venom Club Firm Ground Mens Soccer Cleat', 'image2', 'SCC'),
('1003', 'Adidas Striped Jersey', 100, 34.99, 'Top Mens Jersey', 'image3', 'SCC'),
('1004', 'Nike Breathe Jersey', 100, 29.99, 'Mens Soccer Shirt', 'image4', 'SCC'),
('1005', 'Nike Dri-FIT Short', 100, 20, 'Mens Soccer Short', 'image5', 'SCC'),
('1006', 'Nike Strike Ball', 100, 30, 'Pro Team Soccer Ball', 'image6', 'SCC'),
('1007', 'Nike Vapor Cleat', 100, 49.99, 'Untouchable Shark 3 Mens Cleat', 'image7', 'FTB'),
('1008', 'Under Armour Cleat ', 100, 79.99, 'Youth/Mens Cleat', 'image8', 'FTB'),
('1009', 'Shoulder Pad', 100, 159.99, 'Riddell Power SPK+ QB/WR Shoulder Pad', 'image9', 'FTB'),
('1010', 'Football Helmet', 100, 89.99, 'Riddell Victor Youth Football Helmet', 'image10', 'FTB'),
('1011', 'Football Top', 100, 30, 'Riddell Adult Five Piece Integrated Football Top', 'image11', 'FTB'),
('1012', 'Wilson Football', 100, 19.99, 'Wilson NFL Air Attack Pee Wee Football', 'image12', 'FTB'),
('1013', 'Under Armour Basketball Shoes', 94, 89.99, 'Big Kids/Mens Basketball Shoe', 'image13', 'BKB'),
('1014', 'Nike Basketball Shoe', 100, 79.99, 'Nike Kyrie Fly Mens Basketball Shoe', 'image14', 'BKB'),
('1015', 'Adidas Top', 100, 19.99, 'Performance Mens Heathered Tank Top', 'image15', 'BKB'),
('1016', 'Champion short', 100, 15.99, 'Black Champion Boys/Men Short', 'image16', 'BKB'),
('1017', 'Nike Basketball', 100, 20, 'Nike Versa Tak Basketball', 'image17', 'BKB'),
('1018', 'Wilson Basketball', 100, 25.99, 'Wilson NCAA Street Replica Basketball', 'image18', 'BKB'),
('1019', 'Ball Glove', 100, 49.99, 'Black Youth 11.5 Inch Right Hand Throw First Base Glove', 'image19', 'BSB'),
('1020', 'Ball Helmet', 100, 39.99, 'Rawlings T-Ball Helmet With Mask', 'image20', 'BSB'),
('1021', 'Tee Ball Bat', 100, 49.99, 'Easton Beast Speed -11 Tee Ball Bat', 'image21', 'BSB'),
('1022', 'Baseball', 100, 5.99, 'R8U 2 Pack of Baseballs', 'image22', 'BSB'),
('1023', 'Batting Glove', 100, 20, 'Sports Classic One MLB Adult Batting Glove', 'image23', 'BSB'),
('1024', 'Umpire Chest Protector', 100, 89.99, 'Wilson Guardian Umpire Chest Protector', 'image24', 'BSB'),
('1025', 'Tennis Racquet', 100, 29.99, 'Wilson Federer Adult Tennis Racquet', 'image25', 'TNS'),
('1026', 'Wilson Tennis Bag', 100, 19.99, 'Wilson Adult Tennis Racquet Bag', 'image26', 'TNS'),
('1027', 'Tennis Balls', 100, 4.99, 'Penn Champion Regular-Duty Felt Tennis Balls', 'image27', 'TNS'),
('1028', 'Tennis Polo', 100, 59.99, 'Nike Mens Tennis Polo', 'image28', 'TNS'),
('1029', 'Adidas Short', 100, 29, 'adidas Mens Club Short', 'image29', 'TNS'),
('1030', 'Tennis Cap', 100, 19.99, 'Nike Featherlight Mens Tennis Cap', 'image30', 'TNS');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `Cart_ID` int(11) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Cart_Cost` float NOT NULL,
  `State` varchar(20) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `P_ID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sold_orders`
--

CREATE TABLE `sold_orders` (
  `Order_Number` int(11) NOT NULL,
  `Purchase_Date` date NOT NULL,
  `Cart_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `Email` varchar(200) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `F_Name` varchar(30) NOT NULL,
  `L_Name` varchar(30) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`Email`, `Pass`, `Type`, `F_Name`, `L_Name`, `Phone`, `Address`) VALUES
('admin@admin.com', '$2y$10$PkAyjXlyzIEwg.QdUnO/G.UjsAKa1LgChKRTWvbgxQrnZRXG7RKk6', 'Admin', 'Santiago', 'Rivera', '(555) 555-5555', '2 BOGERT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_type`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Cat_type` (`Cat_type`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`Cart_ID`),
  ADD KEY `Email` (`Email`),
  ADD KEY `P_ID` (`P_ID`);

--
-- Indexes for table `sold_orders`
--
ALTER TABLE `sold_orders`
  ADD PRIMARY KEY (`Order_Number`,`Cart_ID`),
  ADD KEY `Cart_ID` (`Cart_ID`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`Email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Cat_type`) REFERENCES `category` (`Cat_type`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `userr` (`Email`),
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`P_ID`) REFERENCES `product` (`Product_ID`);

--
-- Constraints for table `sold_orders`
--
ALTER TABLE `sold_orders`
  ADD CONSTRAINT `sold_orders_ibfk_1` FOREIGN KEY (`Cart_ID`) REFERENCES `shopping_cart` (`Cart_ID`);
COMMIT;

-- create user to query product database -- 
GRANT SELECT, INSERT, DELETE, UPDATE 
ON team1database.*
TO team1@localhost
IDENTIFIED BY ' team1pass';