-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 09:06 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fullname`, `admin_img`) VALUES
(2, 'aya@gmail.com', 'aaa', 'aya alasmar', '1599661799aya.jpg'),
(3, 'alaa@gmail.com', 'aaa', 'alaa alasmar', '1599662090IMG_0026.JPG'),
(5, 'aya.alasmar@htu.edu.jo', 'aaa', 'aya', '1601692358aya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(4) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_img`) VALUES
(3, 'Jackets', 'c06be130b2d554b3db77d43248df62a6-removebg-preview.png'),
(5, 'Tops', 'rBVaV13HxKCAFvGjAAPdvCNvOHI579-removebg-preview.png'),
(6, 'Pants', 'pants.png'),
(7, 'Skirts', 'white-crop-top-and-maxi-skirt-removebg-preview (1).png'),
(8, 'Dresses', 'JCrew-Petite-Tiered-Maxi-Dress-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_address` varchar(1000) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `customer_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_mobile`, `customer_img`) VALUES
(2, 'a', 'aaa', 'a', 'a', 'a', '1599695242admin.jpg'),
(3, 'aya alasmar', 'aya@gmail.com', 'aaa', 'jordan , Zarqa , new zarqa', '0788888888', '1601600381aya.jpg'),
(7, 'aya', 'aya.asma32@gmail.com', 'aya', '', '77888', '1601603190aya.jpg'),
(16, 'aa2', 'aya2@gmail.com', 'aaa', 'aaa', '5', '1601659362');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(3) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(3) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `customer_id`, `total`) VALUES
(43, '2020-10-04', 3, 49.9),
(44, '2020-10-04', 3, 18.7),
(45, '2020-10-21', 0, 35),
(46, '2020-10-21', 0, 16.5),
(47, '2020-10-21', 3, 0),
(48, '2020-10-21', 3, 0),
(49, '2020-10-21', 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `order_d`
--

CREATE TABLE `order_d` (
  `order_d_id` int(3) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_d`
--

INSERT INTO `order_d` (`order_d_id`, `order_id`, `product_id`, `size`) VALUES
(22, 43, 48, 'm'),
(23, 43, 48, 'xs'),
(24, 43, 47, 'xs'),
(25, 44, 48, 'xs'),
(26, 45, 47, 'l'),
(27, 45, 58, 'm'),
(28, 46, 46, 'l'),
(29, 49, 53, 'm'),
(30, 49, 53, 'xl');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(4) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_img` text NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `cat_id` int(4) NOT NULL,
  `vendor_id` int(4) NOT NULL,
  `product_date` date NOT NULL,
  `product_offer` double NOT NULL,
  `product_season` varchar(50) NOT NULL,
  `product_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_img`, `product_price`, `product_desc`, `cat_id`, `vendor_id`, `product_date`, `product_offer`, `product_season`, `product_size`) VALUES
(37, 'Bishop Sleeve Tartan Corduroy Jacket', '16002273616cbc0663df67272f9a4580ea19d2727c_thumbnail_600x.webp', 50, 'Color:	Brown\r\nStyle:	Casual\r\nPattern Type:	Tartan\r\nNeckline:	Collar\r\nLength:	Crop\r\nType:	Other\r\nDetails:	Pocket, Button Front\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Bishop Sleeve\r\nSeason:	Spring/Fall\r\nComposition:	97% Polyester, 3% Spandex\r\nMaterial:	Corduroy\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Single Breasted', 3, 3, '0000-00-00', 15, 'Autumn', 'free_size,'),
(40, 'Ditsy Floral Asymmetrical Hem Wrap Belted Skirt', '15982544111e14528e0416273535cef4dda847ca15_thumbnail_600xa.webp', 25, 'Color:	Teal Blue\r\nStyle:	Boho\r\nPattern Type:	Ditsy Floral\r\nLength:	Long\r\nType:	Wrap\r\nDetails:	Wrap, Asymmetrical, Zipper, Tie Front\r\nSeason:	Spring/Summer\r\nComposition:	100% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nBelt:	Yes', 7, 1, '2020-09-29', 5, 'Summer', 'xs,s,m,'),
(45, 'Zip Up Solid Skirt', '1600826169dd6b2cb16c562d4bf246ae2ffba42fe7_thumbnail_220x293.webp', 55, 'Color:	Baby Blue\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nLength:	Midi\r\nType:	Straight\r\nDetails:	Zipper\r\nSeason:	Spring/Summer/Fall\r\nComposition:	2% Spandex, 98% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No', 7, 3, '2020-10-03', 25, 'Autumn', 'xs,s,m,l,'),
(46, 'Missord Plunging Neck Frill Ruffle Hem Chiffon Dre', '159479339830963b1998556f5e0bb1ae09c9d91f92_thumbnail_220x293.webp', 55, 'Color:	Apricot\r\nStyle:	Sexy\r\nPattern Type:	Plain\r\nNeckline:	Deep V Neck\r\nLength:	Mini\r\nType:	A Line\r\nDetails:	Ruched, Frill, Ruffle Hem, Zipper\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Flounce Sleeve\r\nSeason:	Spring/Summer\r\nComposition:	35% Cotton, 65% Polyester\r\nMaterial:	Chiffon\r\nFabric:	Non-Stretch\r\nWaist Line:	High Waist\r\nSheer:	No\r\nHem Shaped:	Flounce\r\nFit Type:	Regular Fit\r\nLining:	Yes', 8, 3, '2020-10-03', 70, 'Summer', 'xs,s,m,l,xl,'),
(47, 'Rhinestone Beaded Puff Sleeve Velvet Dress', '1597198932ec65102b6a2785ee53f6299b640b1e5f_thumbnail_220x293.webp', 52, 'Color:	Black\r\nStyle:	Glamorous\r\nPattern Type:	Plain\r\nNeckline:	Square Neck\r\nLength:	Short\r\nType:	A Line\r\nDetails:	Beaded, Zipper\r\nSleeve Length:	Short Sleeve\r\nSleeve Type:	Puff Sleeve\r\nSeason:	Fall/Winter\r\nComposition:	3% Spandex, 97% Polyester\r\nMaterial:	Velvet\r\nFabric:	Non-Stretch\r\nWaist Line:	High Waist\r\nSheer:	No\r\nHem Shaped:	Flared\r\nFit Type:	Regular Fit\r\nLining:	Yes', 8, 0, '2020-10-03', 50, 'Winter', 'xs,s,m,l,xl,'),
(48, 'Allover Floral Print Button Front Puff Sleeve Dres', '1592475008c7b711516fc51d533410c88c8705a74d_thumbnail_220x293.webp', 22, 'Color:	Multicolor\r\nStyle:	Boho\r\nPattern Type:	Floral, All Over Print\r\nNeckline:	V neck\r\nLength:	Short\r\nType:	Fit and Flare\r\nDetails:	Button Front\r\nSleeve Length:	Short Sleeve\r\nSleeve Type:	Puff Sleeve\r\nSeason:	Summer\r\nComposition:	100% Cotton\r\nMaterial:	Cotton\r\nFabric:	Non-Stretch\r\nWaist Line:	High Waist\r\nSheer:	No\r\nHem Shaped:	Flared\r\nFit Type:	Regular Fit', 0, 0, '2020-10-03', 15, 'Summer', 'xs,s,m,l,'),
(50, 'Zip Up Leopard Teddy Jacket', '160182466515990999099cdcfc7929f23a98046aa11f37ad5200_thumbnail_220x293.webp', 30, 'Color:	Multicolor\r\nStyle:	Casual\r\nPattern Type:	Leopard\r\nNeckline:	Collar\r\nLength:	Regular\r\nType:	Teddy\r\nDetails:	Pocket, Zipper\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Drop Shoulder\r\nSeason:	Winter\r\nComposition:	100% Polyester\r\nMaterial:	Shearling\r\nFabric:	Slight Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Zipper', 3, 0, '2020-10-04', 5, 'Winter', 'xs,s,m,'),
(51, 'SHEIN Lapel Neck Flap Pocket Teddy Jacket', '160182476915994461009142a1b031e9d5bd86bcbb11002daa8a_thumbnail_220x293.webp', 35, 'Color:	Dusty Pink\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nNeckline:	Lapel\r\nLength:	Crop\r\nType:	Teddy\r\nDetails:	Pocket, Button Front\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Drop Shoulder\r\nSeason:	Winter\r\nComposition:	100% Polyester\r\nMaterial:	Shearling\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Single Breasted', 3, 3, '2020-10-04', 10, 'Winter', 'xs,s,m,l,'),
(52, ' Flap Pocket Buffalo Plaid Jacket', '16018248541600065859e7f388e5fb32278337541c54d49f9c28_thumbnail_220x293.webp', 15, 'Color:	Black and White\r\nStyle:	Casual\r\nPattern Type:	Gingham\r\nNeckline:	Collar\r\nLength:	Crop\r\nType:	Other\r\nDetails:	Button, Pocket, Zipper\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Regular Sleeve\r\nSeason:	Spring/Fall\r\nComposition:	95% Polyester, 5% Spandex\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Zipper', 3, 3, '2020-10-04', 30, 'Spring', 's,m,l,'),
(53, 'Solid Crop Moto Jacket', '16018249611598254416d2bda2a527d558bfe5d628c2cb18f2eb_thumbnail_220x293.webp', 25, 'Color:	White\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nNeckline:	Collar\r\nLength:	Crop\r\nType:	Biker\r\nDetails:	Zipper\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Regular Sleeve\r\nSeason:	Spring/Fall\r\nComposition:	97% Polyester, 3% Spandex\r\nMaterial:	Polyester\r\nFabric:	Slight Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Zipper\r\nLining:	Yes', 3, 1, '2020-10-04', 0, 'Summer', 's,m,l,xl,'),
(54, 'Zip Up Drawstring Hooded Cord Jacket', '1601825065160030917702cfe3e6f6b86d2e329bc0efb1bc69d5_thumbnail_220x293.webp', 30, 'Color:	Mauve Purple\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nNeckline:	Hooded\r\nLength:	Crop\r\nType:	Other\r\nDetails:	Drawstring, Zipper\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Drop Shoulder\r\nSeason:	Fall/Winter\r\nComposition:	82% Polyester, 18% Spandex\r\nMaterial:	Corduroy\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nPlacket:	Zipper', 3, 1, '2020-10-04', 5, 'Winter', 'xs,s,m,l,'),
(55, 'Open Placket PU Jacket', '160182517915223752042616227627_thumbnail_220x293.webp', 35, 'Color:	Black\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nLength:	Crop\r\nType:	Other\r\nSleeve Length:	Long Sleeve\r\nSeason:	Fall/Winter\r\nComposition:	55% PU Leather, 45% Rayon\r\nFabric:	Slight Stretch\r\nFit Type:	Regular Fit\r\nLining:	Yes', 3, 1, '2020-10-04', 10, 'Autumn', 'xs,s,m,l,'),
(56, 'Open Front Crop Faux Fur Coat', '160182525015995312004989d433e907742c4bd4579515d7ced6_thumbnail_220x293.webp', 50, 'Color:	Blue\r\nStyle:	Glamorous\r\nPattern Type:	Plain\r\nLength:	Crop\r\nType:	Faux Fur\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Regular Sleeve\r\nSeason:	Winter\r\nComposition:	100% Polyester\r\nMaterial:	Faux Fur\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nLining:	Yes', 3, 3, '2020-10-04', 20, 'Winter', 'xs,s,m,l,'),
(57, 'Slant Pocket Tartan Pants', '160182541716008274748d38cdeeae02c16822fcc8935a09997a_thumbnail_220x293.webp', 29, 'Color:	Multicolor\r\nStyle:	Preppy\r\nPattern Type:	Tartan\r\nDetails:	Button, Pocket, Zipper\r\nLength:	Long\r\nType:	Straight Leg\r\nSeason:	Spring/Summer/Fall\r\nComposition:	80% Cotton, 20% Polyester\r\nMaterial:	Cotton\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nClosure Type:	Zipper Fly\r\nWaist Line:	High Waist', 6, 0, '2020-10-04', 10, 'Autumn', 'xs,s,m,'),
(58, 'High Waist Corduroy Pants', '160182554715967654270105b7eceacf89ca148c01e5a8d593ae_thumbnail_220x293.webp', 30, 'Color:	Beige\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nDetails:	Button, Pocket, Zipper\r\nLength:	Long\r\nType:	Straight Leg\r\nSeason:	Fall/Winter\r\nComposition:	3% Spandex, 22% Viscose, 75% Cotton\r\nMaterial:	Corduroy\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nClosure Type:	Zipper Fly\r\nWaist Line:	High Waist', 6, 3, '2020-10-04', 70, 'Winter', 'xs,s,m,l,'),
(59, 'Solid Fold Pleat Tailored Pants', '160182567615928909271bd359c27515eb07b5c90f933a0afaf8_thumbnail_220x293.webp', 27, 'Color:	Khaki\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nDetails:	Button, Pocket, Zipper\r\nLength:	Cropped\r\nType:	Tailored\r\nSeason:	Spring/Summer/Fall\r\nComposition:	5% Spandex, 95% Polyester\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nClosure Type:	Button Fly, Zipper Fly\r\nWaist Line:	Natural', 6, 3, '2020-10-04', 0, 'Spring', 'xs,s,m,'),
(60, 'Slant Pocket Buffalo Plaid Pants', '16018257661592624193629633bce77ef0ce364a4825b577a225_thumbnail_220x293.webp', 30, 'Color:	Blue and White\r\nStyle:	Casual\r\nPattern Type:	Gingham\r\nDetails:	Pocket, Zipper\r\nLength:	Cropped\r\nType:	Tapered/Carrot\r\nSeason:	Spring/Summer/Fall\r\nComposition:	5% Spandex, 95% Polyester\r\nMaterial:	Polyester\r\nFabric:	Slight Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nClosure Type:	Zipper Fly\r\nWaist Line:	High Waist', 6, 1, '2020-10-04', 0, 'Autumn', 's,m,l,'),
(61, 'Pocket Side Solid Textured Pants', '160182584215471925321621644533_thumbnail_220x293.webp', 15, 'Color:	Pastel, Baby Pink\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nDetails:	Pocket\r\nLength:	Long\r\nSeason:	Spring/Summer/Fall\r\nComposition:	5% Spandex, 95% Polyester\r\nFabric:	Slight Stretch\r\nFit Type:	Regular Fit\r\nWaist Line:	Natural', 6, 0, '2020-10-04', 0, 'Spring', 'xs,s,m,'),
(62, 'Elastic Waist Knot Hem Floral Print Pants', '1601825917158933616564dc73aaae78f180e44b496b93cbf1b7_thumbnail_220x293.webp', 18, 'Color:	Navy Blue\r\nStyle:	Casual\r\nPattern Type:	Floral\r\nDetails:	Knot, Pocket\r\nLength:	Cropped\r\nType:	Tapered/Carrot\r\nSeason:	Spring/Summer/Fall\r\nComposition:	100% Polyester\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nClosure Type:	Elastic Waist\r\nWaist Line:	High Waist', 6, 0, '2020-10-04', 0, 'Summer', 'xs,s,m,l,xl,xxl,'),
(63, 'Tropical Print High Split Side Knot Hem Pants', '16018259941591582587e55a61bd7102eb5c42b0381168a8cd9f_thumbnail_220x293.webp', 18, 'Color:	Multicolor\r\nStyle:	Boho\r\nPattern Type:	Tropical, All Over Print\r\nDetails:	Knot, Split Thigh\r\nLength:	Long\r\nType:	Tapered/Carrot\r\nSeason:	Summer\r\nComposition:	100% Polyester\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit\r\nClosure Type:	Elastic Waist\r\nWaist Line:	High Waist', 6, 0, '2020-10-04', 0, 'Summer', 'xs,s,m,l,xl,xxl,'),
(64, 'Button Front Cord Skirt', '1601826106160067269467e6acf39e08ad7104726dfa057c828f_thumbnail_220x293.webp', 25, 'Color:	Black\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nLength:	Mini\r\nType:	Straight\r\nDetails:	Button Front\r\nSeason:	Fall/Winter\r\nComposition:	5% Spandex, 95% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Corduroy\r\nFabric:	Non-Stretch\r\nSheer:	No', 7, 0, '2020-10-04', 0, 'Winter', 'xs,s,m,'),
(65, 'Butterfly Print Elastic Waist Bodycon Skirt', '16018262111600923100e9daa028df25990c911d4c5ab18c2374_thumbnail_220x293.webp', 25, 'Color:	Multicolor\r\nStyle:	Elegant\r\nPattern Type:	Striped, Animal\r\nLength:	Short\r\nType:	Bodycon\r\nSeason:	Summer\r\nComposition:	5% Spandex, 95% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Polyester\r\nFabric:	High Stretch\r\nSheer:	No', 7, 0, '2020-10-04', 0, 'Summer', 'xs,s,m,'),
(66, 'Split Hem Solid Pencil Skirt', '1601826280160030656406718f57820e73c5707edce54a1c2347_thumbnail_220x293.webp', 20, 'Color:	Black\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nLength:	Short\r\nType:	Pencil\r\nDetails:	Split, Button, Pocket, Zipper\r\nSeason:	Spring/Summer\r\nComposition:	5% Spandex, 70% Cotton, 25% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Cotton\r\nFabric:	Slight Stretch\r\nSheer:	No', 7, 1, '2020-10-04', 5, 'Spring', 'xs,s,m,'),
(67, 'Grid Print Bodycon Skirt', '160182636516009200956a5f5803c30694c1080f6e04f5909e96_thumbnail_220x293.webp', 23, 'Color:	Black and White\r\nStyle:	Elegant\r\nPattern Type:	Plaid\r\nLength:	Knee Length\r\nType:	Pencil\r\nSeason:	Spring/Summer/Fall\r\nComposition:	5% Spandex, 95% Polyester\r\nWaist Line:	High Waist\r\nMaterial:	Polyester\r\nFabric:	Slight Stretch\r\nSheer:	No', 7, 1, '2020-10-04', 0, 'Winter', 'xs,s,m,'),
(68, ' Sheer Mesh Back Guipure Lace Dress', '1601826908159962711703bb765d051ad26d8e59c9fa0e87e0f9_thumbnail_220x293.webp', 70, 'Color:	Yellow\r\nStyle:	Romantic\r\nPattern Type:	Plain\r\nNeckline:	Round Neck\r\nLength:	Short\r\nType:	Fitted\r\nDetails:	Contrast Mesh, Zipper\r\nSleeve Length:	Half Sleeve\r\nSleeve Type:	Puff Sleeve\r\nSeason:	Spring/Fall\r\nComposition:	100% Polyester\r\nMaterial:	Guipure Lace\r\nFabric:	Non-Stretch\r\nWaist Line:	High Waist\r\nSheer:	No\r\nHem Shaped:	Pencil\r\nFit Type:	Slim Fit\r\nLining:	Yes', 8, 1, '2020-10-04', 60, 'Summer', 'xs,s,m,l,'),
(69, 'Mock Neck Floral Print Pencil Dress', '160182698215710421759a2999a67b8bd343b94f12fa6656af70_thumbnail_220x293.webp', 20, 'Color:	Red, Bright\r\nStyle:	Elegant\r\nPattern Type:	Floral, All Over Print\r\nNeckline:	Stand Collar\r\nLength:	Knee Length\r\nType:	Bodycon\r\nSleeve Length:	Short Sleeve\r\nSleeve Type:	Regular Sleeve\r\nSeason:	Spring/Summer\r\nComposition:	5% Spandex, 95% Polyester\r\nMaterial:	Polyester\r\nFabric:	Slight Stretch\r\nWaist Line:	Natural\r\nSheer:	No\r\nHem Shaped:	Pencil\r\nFit Type:	Slim Fit', 8, 0, '2020-10-04', 5, 'Spring', 'xs,s,m,l,xl,'),
(70, 'Surplice Neck Puff Sleeve Shirred Tight Hem Crop T', '160182719015989323168d1492a94bab604aaec857fb6c41c76e_thumbnail_220x293.webp', 21, 'Color:	Camel\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nNeckline:	V neck\r\nLength:	Crop\r\nType:	Top\r\nDetails:	Frill, Wrap, Shirred\r\nSleeve Length:	Short Sleeve\r\nSleeve Type:	Puff Sleeve\r\nSeason:	Summer\r\nComposition:	100% Polyester\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nHem Shaped:	Tight Hem\r\nFit Type:	Regular Fit\r\nPlacket Type:	Pullovers', 5, 3, '2020-10-04', 5, 'Summer', 'free_size,'),
(71, 'Flounce Sleeve Wrap Blouse', '16018272661599546531bcfcf52f5061835105f143dde667e61e_thumbnail_220x293.webp', 25, 'Color:	Black\r\nStyle:	Elegant\r\nPattern Type:	Plain\r\nNeckline:	V neck\r\nLength:	Regular\r\nType:	Peplum\r\nDetails:	Ruffle, Button, Wrap\r\nSleeve Length:	Long Sleeve\r\nSleeve Type:	Flounce Sleeve\r\nSeason:	Spring/Fall\r\nComposition:	3% Spandex, 97% Polyester\r\nMaterial:	Polyester\r\nFabric:	Non-Stretch\r\nSheer:	No\r\nHem Shaped:	Flared\r\nFit Type:	Regular Fit\r\nPlacket Type:	Placket\r\nCustomers Also Viewed', 5, 1, '2020-10-04', 15, 'Spring', 'xs,s,m,'),
(72, 'Mock Neck Solid Tank Top', '160182733916010129424b260b29cfb1d7ca638bc2dd293c34d5_thumbnail_220x293.webp', 15, 'Color:	Brown\r\nStyle:	Casual\r\nPattern Type:	Plain\r\nNeckline:	Stand Collar\r\nLength:	Regular\r\nType:	Tank\r\nSeason:	Summer\r\nComposition:	5% Spandex, 95% Polyester\r\nMaterial:	Polyester\r\nFabric:	Slight Stretch\r\nSheer:	No\r\nFit Type:	Regular Fit', 5, 0, '2020-10-04', 0, 'Autumn', 'xs,s,m,');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(4) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_email` varchar(100) NOT NULL,
  `vendor_password` varchar(50) NOT NULL,
  `vendor_img` text NOT NULL,
  `vendor_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_name`, `vendor_email`, `vendor_password`, `vendor_img`, `vendor_mobile`) VALUES
(0, 'no vendor', '', '', '', ''),
(1, 'v1', 'aya@gmail.com', 'aaa', 'iconfinder_weather_47_2682804.png', '0885'),
(3, 'v2', 'v2@gmail.com', 'aaa', 'iconfinder_flower_flowers_blossom-05_642223.png', '000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_d`
--
ALTER TABLE `order_d`
  ADD PRIMARY KEY (`order_d_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `order_d`
--
ALTER TABLE `order_d`
  MODIFY `order_d_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
