-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 03:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ismail`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(27, 15, 175, 1),
(29, 20, 33, 1),
(30, 20, 95, 1),
(42, 25, 33, 4),
(43, 25, 71, 1),
(51, 23, 34, 1),
(56, 19, 30, 10),
(57, 21, 42, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Lawn', 'lawn'),
(2, 'Swiss', 'swiss'),
(3, 'Print', 'print'),
(4, 'Formal', 'formal'),
(5, 'Bridal', 'bridal'),
(6, 'Party_Wear', 'party_wear'),
(7, 'Cotton', 'cotton'),
(8, 'Wash_&_Wear', 'wash&wear'),
(9, 'Embroidery', 'embroidery'),
(10, 'Kurta', 'kurta'),
(17, 'Umar Razzaq', '');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(21, 11, 33, 1),
(22, 12, 33, 1),
(23, 13, 33, 1),
(24, 13, 72, 1),
(25, 13, 149, 1),
(26, 14, 57, 1),
(27, 14, 55, 1),
(28, 15, 134, 1),
(29, 16, 58, 1),
(30, 17, 58, 1),
(31, 18, 62, 1),
(32, 19, 34, 1),
(33, 20, 33, 2),
(34, 21, 33, 2),
(35, 22, 34, 2),
(36, 23, 38, 1),
(37, 24, 33, 3),
(38, 25, 97, 50),
(39, 26, 34, 1),
(40, 27, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `stock`, `price`, `photo`, `date_view`, `counter`) VALUES
(30, 1, 'Unstitched Lawn EL-21-01-Ivory White and Maroon', '<p>Printed front, back, and sleeves</p>\r\n\r\n<p>Embroidered neckline</p>\r\n\r\n<p>Embroidered Ghera lace I</p>\r\n\r\n<p>Embroidered Ghera patch</p>\r\n\r\n<p>Dyed cambric trouser</p>\r\n\r\n<p>Embroidered trouser lace</p>\r\n\r\n<p>Embroidered sleeves lace I</p>\r\n\r\n<p>Embroidered sleeves motif</p>\r\n\r\n<p>Khaddi net dupatta printed dupatta pallu</p>\r\n', 'unstitched-lawn-el-21-01-ivory-white-and-maroon', '4', 15500, 'Unstitched Lawn EL-21-01-Ivory White and Maroon_1625312039.jpg', '2021-07-04', 2),
(33, 1, 'Unstitched Lawn D-2113-B', '<p>Embroidered schiffli lawn front and sleeves</p>\r\n\r\n<p>Printed lawn back</p>\r\n\r\n<p>Printed tissue silk dupatta</p>\r\n\r\n<p>Printed cambric trouser</p>\r\n\r\n<p>Embroidered organza neckline</p>\r\n\r\n<p>Embroidered organza Ghera patch</p>\r\n\r\n<p>Embroidered organza sleeve patch</p>\r\n\r\n<p>Embroidered organza Ghera Lace</p>\r\n\r\n<p>Embroidered organza sleeve lace I</p>\r\n\r\n<p>Embroidered organza sleeve lace II</p>\r\n', 'unstitched-lawn-d-2113-b', '0', 11999, 'unstitched-lawn-d-2113-b.jpg', '2021-07-03', 2),
(34, 1, 'Unstitched Lawn EL-21-08-White and Pink', 'Embroidered net front, back and sleeves\r\nEmbroidered neckline\r\nEmbriodered sleeves lace\r\nDyed lawn undershirt\r\nDyed cambric trouser\r\nEmbroidered ghera lace I\r\nEmbroidered ghera lace II\r\nPrinted tissue silk dupatta', 'unstitched-lawn-el-21-08-white-and-pink', '1', 10970, 'unstitched-lawn-el-21-08-white-and-pink.jpg', '2021-07-03', 2),
(35, 1, 'Unstitched Lawn EL-21-01-Ivory White and Maroon', 'Printed front, back and sleeves\r\nEmbroidered neckline\r\nEmbroidered ghera lace I\r\nEmbroidered ghera patch\r\nDyed cambric trouser\r\nEmbroidered trouser lace\r\nEmbroidered sleeves lace I\r\nEmbroidered sleeves motif\r\nKhaddi net dupatta\r\nPrinted dupatta pallu', 'unstitched-lawn-el-21-01-ivory-white-and-maroon', '5', 13990, 'unstitched-lawn-el-21-01-ivory-white-and-maroon.jpg', '0000-00-00', 0),
(36, 1, 'Unstitched Lawn EL-21-03-Maroon', 'Printed front, back and sleeves\r\nEmbroidered neckline\r\nEmbroidered shoulder patches\r\nEmbroidered lace for front\r\nPrinted chiffon dupatta\r\nEmbroidered organza sleeves lace I\r\nEmbroidered sleeves motif\r\nPrinted Ghera Patti\r\nDyed cambric trouser', 'unstitched-lawn-el-21-03-maroon', '5', 17990, 'unstitched-lawn-el-21-03-maroon.jpg', '2021-06-08', 1),
(37, 1, 'Unstitched Lawn EL-21-05-Off White and Peach', 'Printed back sleeves and Front side Panel\r\nSchiffli center panel with pearls\r\nEmbroidered ghera patch\r\nEmbroidered ghera lace\r\nEmbroidered sleeves lace I\r\nEmbroidered sleeves lace II\r\nDyed schiffli trouser\r\nEmbroidered organza dupatta\r\nEmbroidered necklilne\r\nEmbroidered patches for sleeves', 'unstitched-lawn-el-21-05-white-and-peach', '5', 10970, 'unstitched-lawn-el-21-05-white-and-peach.jpg', '0000-00-00', 0),
(38, 1, 'Unstitched Lawn EL-21-06-Nude Pink', 'Jacquard front, back and sleeves\r\nEmbroidered neckline, Patti and Pearls\r\nSchiffli centre panel for front\r\nEmbroidered front motifs\r\nEmbroidered ghera patch\r\nEmbroidered ghera lace\r\nEmbroidered sleeves lace\r\nEmbroidered sleeves patches\r\nEmbroidered net dupatta\r\nPrinted cambric trouser', 'unstitched-lawn-el-21-06-nude-pink', '4', 11999, 'unstitched-lawn-el-21-06-nude-pink.jpg', '2021-06-20', 2),
(39, 1, 'Unstitched Lawn D-2109-A', 'Embroidered brochia lawn front\r\nPrinted lawn back\r\nPlain lawn brochia side panels and sleeves\r\nPrinted cambric trouser\r\nJacquard dupatta\r\nEmbroidered organza sleeve Lace I\r\nEmbroidered organza lace II\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2109', '5', 15000, 'unstitched-lawn-d-2109.jpg', '0000-00-00', 0),
(41, 1, 'Unstitched Lawn D-2111-A', 'Embroidered lawn brochia front\r\nLawn brochia back\r\nEmbroidered Lawn brochia sleeves\r\nOrganza jacquard dupatta\r\nPrinted cambric trouser\r\nEmbroidered organza ghera lace\r\nEmbroidered organza neckline Lace\r\nEmbroidered organza sleeve lace', 'unstitched-lawn-d-2111', '5', 9990, 'unstitched-lawn-d-2111.jpg', '0000-00-00', 0),
(42, 1, 'Unstitched Lawn D-2109-B', 'Embroidered brochia lawn front\r\nPrinted lawn back\r\nPlain lawn brochia side panels and sleeves\r\nPrinted cambric trouser\r\nJacquard dupatta\r\nEmbroidered organza sleeve Lace I\r\nEmbroidered organza lace II\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2109-b', '5', 8900, 'unstitched-lawn-d-2109-b.jpg', '0000-00-00', 0),
(43, 1, 'Unstitched Lawn D-2111-B', 'Embroidered lawn brochia front\r\nLawn brochia back\r\nEmbroidered Lawn brochia sleeves\r\nOrganza jacquard dupatta\r\nPrinted cambric trouser\r\nEmbroidered organza ghera lace\r\nEmbroidered organza neckline Lace\r\nEmbroidered organza sleeve lace', 'unstitched-lawn-d-2111-b', '5', 10990, 'unstitched-lawn-d-2111-b.jpg', '0000-00-00', 0),
(45, 1, 'Unstitched Lawn EL-21-08-White and Pink', 'Embroidered net front, back and sleeves\r\nEmbroidered neckline\r\nEmbriodered sleeves lace\r\nDyed lawn undershirt\r\nDyed cambric trouser\r\nEmbroidered ghera lace I\r\nEmbroidered ghera lace II\r\nPrinted tissue silk dupatta', 'unstitched-lawn-el-21-08-white-and-pink', '5', 10990, 'unstitched-lawn-el-21-08-white-and-pink.jpg', '0000-00-00', 0),
(46, 1, 'Unstitched Lawn EL-21-01-Ivory White and Maroon', 'Printed front, back and sleeves\r\nEmbroidered neckline\r\nEmbroidered ghera lace I\r\nEmbroidered ghera patch\r\nDyed cambric trouser\r\nEmbroidered trouser lace\r\nEmbroidered sleeves lace I\r\nEmbroidered sleeves motif\r\nKhaddi net dupatta\r\nPrinted dupatta pallu', 'unstitched-lawn-el-21-01-ivory-white-and-maroon', '5', 10990, 'unstitched-lawn-el-21-01-ivory-white-and-maroon.jpg', '0000-00-00', 0),
(47, 1, 'Unstitched Lawn EL-21-03-Maroon', 'Printed front, back and sleeves\r\nEmbroidered neckline\r\nEmbroidered shoulder patches\r\nEmbroidered lace for front\r\nPrinted chiffon dupatta\r\nEmbroidered organza sleeves lace I\r\nEmbroidered sleeves motif\r\nPrinted Ghera Patti\r\nDyed cambric trouser', 'unstitched-lawn-el-21-03-maroon', '5', 10990, 'unstitched-lawn-el-21-03-maroon.jpg', '0000-00-00', 0),
(48, 1, 'Unstitched Lawn EL-21-05-Off White and Peach', 'Printed back sleeves and Front side Panel\r\nSchiffli center panel with pearls\r\nEmbroidered ghera patch\r\nEmbroidered ghera lace\r\nEmbroidered sleeves lace I\r\nEmbroidered sleeves lace II\r\nDyed schiffli trouser\r\nEmbroidered organza dupatta\r\nEmbroidered necklilne\r\nEmbroidered patches for sleeves', 'unstitched-lawn-el-21-05-white-and-peach', '5', 10990, 'unstitched-lawn-el-21-05-white-and-peach.jpg', '0000-00-00', 0),
(49, 1, 'Unstitched Lawn EL-21-06-Nude Pink', 'Jacquard front, back and sleeves\r\nEmbroidered neckline, Patti and Pearls\r\nSchiffli centre panel for front\r\nEmbroidered front motifs\r\nEmbroidered ghera patch\r\nEmbroidered ghera lace\r\nEmbroidered sleeves lace\r\nEmbroidered sleeves patches\r\nEmbroidered net dupatta\r\nPrinted cambric trouser', 'unstitched-lawn-el-21-06-nude-pink', '5', 10990, 'unstitched-lawn-el-21-06-nude-pink.jpg', '0000-00-00', 0),
(50, 1, 'Unstitched Lawn D-2109-A', 'Embroidered brochia lawn front\r\nPrinted lawn back\r\nPlain lawn brochia side panels and sleeves\r\nPrinted cambric trouser\r\nJacquard dupatta\r\nEmbroidered organza sleeve Lace I\r\nEmbroidered organza lace II\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2109', '5', 10990, 'unstitched-lawn-d-2109.jpg', '0000-00-00', 0),
(51, 1, 'Unstitched Lawn D-2109-B', 'Embroidered brochia lawn front\r\nPrinted lawn back\r\nPlain lawn brochia side panels and sleeves\r\nPrinted cambric trouser\r\nJacquard dupatta\r\nEmbroidered organza sleeve Lace I\r\nEmbroidered organza lace II\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2109-b', '5', 10990, 'unstitched-lawn-d-2109-b.jpg', '0000-00-00', 0),
(52, 1, 'Unstitched Lawn D-2111-A', 'Embroidered lawn brochia front\r\nLawn brochia back\r\nEmbroidered Lawn brochia sleeves\r\nOrganza jacquard dupatta\r\nPrinted cambric trouser\r\nEmbroidered organza ghera lace\r\nEmbroidered organza neckline Lace\r\nEmbroidered organza sleeve lace', 'unstitched-lawn-d-2111', '5', 10990, 'unstitched-lawn-d-2111.jpg', '0000-00-00', 0),
(53, 1, 'Unstitched Lawn D-2111-B', 'Embroidered lawn brochia front\r\nLawn brochia back\r\nEmbroidered Lawn brochia sleeves\r\nOrganza jacquard dupatta\r\nPrinted cambric trouser\r\nEmbroidered organza ghera lace\r\nEmbroidered organza neckline Lace\r\nEmbroidered organza sleeve lac', 'unstitched-lawn-d-2111-b', '5', 10990, 'unstitched-lawn-d-2111-b.jpg', '0000-00-00', 0),
(54, 10, 'UNSTITCHED KURTA FABRIC | JJMK-CLASSY-1807/JJ6959 - BISCUIT BROWN', '\r\nSize	2.5 Meters\r\nColor	BISCUIT BROWN\r\nProduct Category	Unstitched Kurta Fabric\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colours of the original product may slightly vary from the picture', 'unstitched-kurta-fabric-jjmk-classy-1807-jj6959-biscuit-brown', '5', 12990, 'unstitched-kurta-fabric-jjmk-classy-1807-jj6959-biscuit-brown.jpg', '2021-06-20', 1),
(55, 10, 'UNSTITCHED KURTA FABRIC | JJMK-CLASSY-1807/JJ6959 - TEAL', 'Size	2.5 Meters\r\nColor	TEAL\r\nProduct Category	Unstitched Kurta Fabric\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kurta-fabric-jjmk-classy-1807-jj6959-teal', '5', 11990, 'unstitched-kurta-fabric-jjmk-classy-1807-jj6959-teal.jpg', '2021-06-10', 1),
(56, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7036-TSR/S21/JJ6385', 'Size	4.5 Meters\r\nColor	IVORY\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7036-tsr-s21-jj6385', '5', 11990, 'unstitched-kameez-shalwar-fabric-jjms-7036-tsr-s21-jj6385.jpg', '0000-00-00', 0),
(57, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7029-TSR/S21/JJ6856', 'More Information\r\nSize	4.5 Meters\r\nColor	Hypnotic Heather\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7029-tsr-s21-jj6856', '5', 5990, 'unstitched-kameez-shalwar-fabric-jjms-7029-tsr-s21-jj6856.jpg', '2021-06-22', 1),
(58, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7034-TSR/S21/JJ6923', 'More Information\r\nSize	4.5 Meters\r\nColor	Nifty Navy\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7034-tsr-s21-jj6923', '5', 12990, 'unstitched-kameez-shalwar-fabric-jjms-7034-tsr-s21-jj6923.jpg', '2021-06-20', 1),
(59, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7031-TSR/S21/JJ6923', 'More Information\r\nSize	4.5 Meters\r\nColor	Wealthy White\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7031-tsr-s21-jj6923', '5', 5990, 'unstitched-kameez-shalwar-fabric-jjms-7031-tsr-s21-jj6923.jpg', '0000-00-00', 0),
(60, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7032-TSR/S21/JJ6923', 'More Information\r\nSize	4.5 Meters\r\nColor	Well Off White\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7032-tsr-s21-jj6923', '5', 5990, 'unstitched-kameez-shalwar-fabric-jjms-7032-tsr-s21-jj6923.jpg', '0000-00-00', 0),
(61, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7035-TSR/S21/JJ6923', 'More Information\r\nSize	4.5 Meters\r\nColor	Blissful Brown\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7035-tsr-s21-jj6923', '5', 5990, 'unstitched-kameez-shalwar-fabric-jjms-7035-tsr-s21-jj6923.jpg', '0000-00-00', 0),
(62, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-7028-TSR/S21/JJ6863', 'More Information\r\nSize	4.5 Meters\r\nColor	Rich Cream\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	Ta\'assur Premium Collection\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-7028-tsr-s21-jj6863', '5', 5990, 'unstitched-kameez-shalwar-fabric-jjms-7028-tsr-s21-jj6863.jpg', '2021-06-11', 1),
(63, 7, 'UNSTITCHED KAMEEZ SHALWAR FABRIC | JJMS-ELITE-1872/JJ7235 - WHITE', 'Size	4.5 Meters\r\nColor	WHITE\r\nProduct Category	Unstitched Kameez Shalwar Fabric\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'unstitched-kameez-shalwar-fabric-jjms-elite-1872-jj7235-white', '5', 12990, 'unstitched-kameez-shalwar-fabric-jjms-elite-1872-jj7235-white.jpg', '0000-00-00', 0),
(64, 1, 'Unstitched Lawn D-2112-A', 'Yarn dyed woven shirt\r\nEmbroidered net dupatta\r\nPrinted cambric trouser\r\nPrinted lawn sleeves border\r\nEmbroidered organza neckline lace I\r\nEmbroidered organza neckline lace II\r\nEmbroidered organza sleeve lace\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2112', '5', 10990, 'unstitched-lawn-d-2112.jpg', '0000-00-00', 0),
(65, 1, 'Unstitched Lawn D-2112-B', 'Yarn dyed woven shirt\r\nEmbroidered net dupatta\r\nPrinted cambric trouser\r\nPrinted lawn sleeves border\r\nEmbroidered organza neckline lace I\r\nEmbroidered organza neckline lace II\r\nEmbroidered organza sleeve lace\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2112-b', '5', 10990, 'unstitched-lawn-d-2112-b.jpg', '0000-00-00', 0),
(66, 1, 'Unstitched Lawn D-2113-A', 'Embroidered schiffli lawn front and sleeves\r\nPrinted lawn back\r\nPrinted tissue silk dupatta\r\nPrinted cambric trouser\r\nEmbroidered organza neckline\r\nEmbroidered organza ghera patch\r\nEmbroidered organza sleeve patch\r\nEmbroidered organza ghera lace\r\nEmbroidered organza sleeve lace I\r\nEmbroidered organza sleeve lace II', 'unstitched-lawn-d-2113', '5', 10990, 'unstitched-lawn-d-2113.jpg', '0000-00-00', 0),
(67, 1, 'Unstitched Lawn D-2114-A', 'Yarn dyed woven embroidered front\r\nYarn dyed woven back, side panels and sleeves\r\nPrinted chiffon dupatta\r\nDyed cambric trouser\r\nEmbroidered organza ghera patch I\r\nEmbroidered organza sleeve patch 2pieces\r\nEmbroidered organza sleeve lace I\r\nEmbroidered organza sleeve lace II\r\nEmbroidered organza ghera motif 2 pieces\r\nEmbroidered organza ghera side panels patti', 'unstitched-lawn-d-2114', '5', 10990, 'unstitched-lawn-d-2114.jpg', '0000-00-00', 0),
(68, 1, 'Unstitched Lawn D-2102-B', 'Printed lawn front\r\nPrinted lawn back\r\nEmbroidered lawn centre panel\r\nPrinted lawn sleeves\r\nEmbroidered net sleeve Border\r\nDyed lawn trouser\r\nJacquard dupatta', 'unstitched-lawn-d-2102-b', '5', 10990, 'unstitched-lawn-d-2102-b.jpg', '0000-00-00', 0),
(69, 1, 'Unstitched Lawn D-2103-A', 'Jacquard Shirt\r\nKhaddi dupatta\r\nEmbroidered trouser\r\nEmbroidered organza sleeve Lace I\r\nEmbroidered sleeves lawn Lace II\r\nEmbroidered organza sleeve lace III\r\nEmbroidered ghera organza Lace\r\nEmbroidered organza ghera patch', 'unstitched-lawn-d-2103', '5', 9990, 'unstitched-lawn-d-2103.jpg', '0000-00-00', 0),
(70, 2, 'Unstitched Sateen CST-302-Pink', 'Embroidered Cotton Satin Front\r\nEmbroidered Cotton Satin Back\r\nEmbroidered Cotton Satin Sleeves\r\nDyed Organza Jacquard Dupatta\r\nDyed Cotton Satin Trouser\r\nEmbroidered Organza Ghera Patch Front & Back\r\nEmbroidered Cotton Satin Ghera Patti Front & Back\r\nEmbroidered Organza Sleeves Patti 1\r\nEmbroidered Cotton Satin Sleeves Patti 2\r\nEmbroidered Organza Neck Motif\r\nEmbroidered Organza Neckline', 'unstitched-sateen-cst-302-pink', '5', 10990, 'unstitched-sateen-cst-302-pink.jpg', '0000-00-00', 0),
(71, 2, 'Unstitched Sateen CST-304-Lilac', 'Embroidered Cotton Satin Front\r\nEmbroidered Cotton Satin Back\r\nEmbroidered Cotton Satin Sleeves\r\nEmbroidered Crinkle Chiffon Dupatta\r\nDyed Cotton Satin Trouser\r\nDigital Printed Cotton Satin Dupatta Patti\r\nDyed Organza Ghera Patch', 'unstitched-sateen-cst-304-lilac', '5', 10990, 'unstitched-sateen-cst-304-lilac.jpg', '2021-06-18', 2),
(72, 2, 'Unstitched Sateen CST-305-Off White', 'Embroidered Cotton Satin Front\r\nEmbroidered Cotton Satin Back\r\nEmbroidered Cotton Satin Sleeves\'\r\nEmbroidered Net Dupatta\r\nEmbroidered Cotton Satin Gharara\r\nEmbroidered Cotton Satin Dupatta Patti\r\nEmbnroidered Organza Neck Patti\r\nEmbroidered Organza Neck Motif\r\nEmbroidered Organza Gharara Patti\r\nEmbroidered Organza Ghera Lace', 'unstitched-sateen-cst-305-white', '5', 10990, 'unstitched-sateen-cst-305-white.jpg', '2021-06-10', 2),
(73, 2, 'Unstitched Sateen CST-306-Purple', 'Embroidered Cotton Satin Front\r\nEmbroidered Cotton Satin Back\r\nEmbroidered Cotton Satin Sleeves\r\nEmbroidered Net Dupatta\r\nDyed Cotton Satin Trouser\r\nEmbroidered Velvet Ghera Patti\r\nEmbroidered Cotton Satin Sleeves Patti 1\r\nEmbroidered Velvet Sleeves Patti 2\r\nEmbroidered Velvet Dupatta Patti\r\nEmbroidered Velvet Dupatta Pallu', 'unstitched-sateen-cst-306-purple', '5', 10990, 'unstitched-sateen-cst-306-purple.jpg', '0000-00-00', 0),
(74, 2, 'Unstitched Sateen CST-307-Maroon', 'Dyed Cotton Satin Front\r\nDyed Cotton Satin Back\r\nDyed Cotton Satin Sleeves\r\nDigital Printed Tissue Silk Dupatta\r\nDyed Cotton Satin Trouser\r\nEmbroidered Organza Ghera Patti\r\nEmbroidered Organza Sleeves Patti\r\nEmbroidered Organza Neckline\r\nEmbroidered Cotton Satin Dupatta Patti', 'unstitched-sateen-cst-307-maroon', '5', 10990, 'unstitched-sateen-cst-307-maroon.jpg', '0000-00-00', 0),
(75, 2, 'Unstitched Sateen CST-308-Sea Green', 'Dyed Jacquard Front\r\nDyed Jacquard Back\r\nDyed Jacquard Sleeves\r\nEmbroidered Organza Dupatta\r\nDyed Cotton Satin Trouser\r\nEmbroidered Organza Ghera Lace With Pearls\r\nEmbroidered Organza Sleeves Patti With Pearls\r\nEmbroidered Cotton Satin Dupatta Patti\r\nEmbroidered Organza Neck Lace', 'unstitched-sateen-cst-308-sea-green', '5', 10990, 'unstitched-sateen-cst-308-sea-green.jpg', '0000-00-00', 0),
(76, 2, 'Unstitched Sateen CST-301-Blue', '<p>Dyed Cotton Satin Shirt Digital Printed Crinkle Chiffon Duppata Dyed Cotton Satin Trouser Embroidered Organza Neckline Embroidered Organza Ghera Patch Embroidered Cotton Satin Sleeves Patti 1 Embroidered/Applique Velvet &amp; Tissue Sleeves Patti 2 Embroidered Cotton Satin Dupatta Patti</p>\r\n', 'unstitched-sateen-cst-301-blue', '5', 9990, 'click-above-image-view-full-picture-unstitched-sateen-cst-301-blue.jpg', '0000-00-00', 0),
(77, 2, 'Unstitched Sateen CST-303-Black', 'Embroidered Cotton Satin Front\r\nEmbroidered Cotton Satin Back\r\nEmbroidered Cotton Satin Sleeves\r\nDigital Printed Crinkle Chiffon Dupatta\r\nDyed Cotton Satin Trouser\r\nEmbroidered Organza Ghera Patch\r\nEmbroidered Organza Sleeves Patti\r\nDigital Printed Cotton Sati N Sleeves Patti\r\nDissolving Lace Dupatta Patti', 'unstitched-sateen-cst-303-black', '5', 9990, 'unstitched-sateen-cst-303-black.jpg', '0000-00-00', 0),
(78, 3, 'Unstitched Fabrics/M.Prints MPT-1002-A', 'Printed Lawn Shirt\r\nDyed Cambric Trouser\r\nPrinted Trouser Patti\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline\r\nShiffli Embroidered Patti', 'unstitched-fabrics-m-prints-mpt-1002', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1002.jpg', '0000-00-00', 0),
(79, 3, 'Unstitched Fabrics/M.Prints MPT-1002-B', 'Printed Lawn Shirt\r\nDyed Cambric Trouser\r\nPrinted Trouser Patti\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline\r\nShiffli Embroidered Patti', 'unstitched-fabrics-m-prints-mpt-1002-b', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1002-b.jpg', '0000-00-00', 0),
(80, 3, 'Unstitched Fabrics/M.Prints MPT-1003-B', 'Printed Lawn Shirt\r\nPrinted Lawn Patti\r\nDyed Cambric Trouser\r\nPrinted Silk Dupatta\r\nEmbroidered Patch', 'unstitched-fabrics-m-prints-mpt-1003-b', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1003-b.jpg', '0000-00-00', 0),
(81, 3, 'Unstitched Fabrics/M.Prints MPT-1004-A', 'Printed Lawn Shirt\r\nPrinted Cambric Trouser\r\nPrinted chiffon Dupatta\r\nEmbroidered Neckline\r\nEmbroidered Patti', 'unstitched-fabrics-m-prints-mpt-1004', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1004.jpg', '0000-00-00', 0),
(82, 3, 'Unstitched Fabrics/M.Prints MPT-1004-B', 'Printed Lawn Shirt\r\nPrinted Cambric Trouser\r\nPrinted chiffon Dupatta\r\nEmbroidered Neckline\r\nEmbroidered Patti', 'unstitched-fabrics-m-prints-mpt-1004-b', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1004-b.jpg', '0000-00-00', 0),
(83, 3, 'Unstitched Fabrics/M.Prints MPT-1006-B', 'Printed Lawn shirt\r\nDyed cambric Trouser\r\nPrinted Silk Dupatta\r\nEmbroidered patches\r\nPuff Print Organza Trouser Patti', 'unstitched-fabrics-m-prints-mpt-1006-b', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1006-b.jpg', '0000-00-00', 0),
(84, 3, 'Unstitched Fabrics/M.Prints MPT-1007-A', 'Printed Lawn Shirt\r\nPrinted Cambric Trouser\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline', 'unstitched-fabrics-m-prints-mpt-1007', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1007.jpg', '0000-00-00', 0),
(85, 3, 'Unstitched Fabrics/M.Prints MPT-1008-B', 'Printed Lawn Shirt\r\nPrinted Cambric Trouser\r\nPrinted Chiffon Dupatta\r\nEmbroidered neckline patti & Motif\r\nEmbroidered patti-2\r\nEmbroidered Trouser patti', 'unstitched-fabrics-m-prints-mpt-1008-b', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1008-b.jpg', '0000-00-00', 0),
(86, 3, 'Unstitched Fabrics/M.Prints MPT-1009-B', 'Printed Lawn Shirt\r\nPrinted cambric Trouser\r\nPrinted Trouser Patti\r\nPrinted Chiffon Dupatta\r\nEmbroidered Ghera Patch', 'unstitched-fabrics-m-prints-mpt-1009-b', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1009-b.jpg', '0000-00-00', 0),
(87, 3, 'Unstitched Fabrics/M.Prints MPT-1010-A', 'Printed Lawn Shirt\r\nPrinted Trouser\r\nPrinted Trouser Patti\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline', 'unstitched-fabrics-m-prints-mpt-1010', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1010.jpg', '0000-00-00', 0),
(88, 3, 'Unstitched Fabrics/M.Prints MPT-1010-B', 'Printed Lawn Shirt\r\nPrinted Trouser\r\nPrinted Trouser Patti\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline', 'unstitched-fabrics-m-prints-mpt-1010-b', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1010-b.jpg', '0000-00-00', 0),
(89, 3, 'Unstitched Fabrics/M.Prints MPT-1012-B', 'Printed Lawn Shirt\r\nDyed cambric Trouser\r\nPrinted Chiffon Dupatta\r\nEmbroidered Patti-1\r\nEmbroidered Patti-2', 'unstitched-fabrics-m-prints-mpt-1012-b', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1012-b.jpg', '0000-00-00', 0),
(90, 3, 'Unstitched Fabrics/M.Prints MPT-913-A', 'Printed linen dobby shirt\r\nLinen dobby trouser\r\nPrinted acrylic shawl\r\nEmbroidered neckline patti\r\nEmbroidered neckline.', 'unstitched-fabrics-m-prints-mpt-913', '5', 5990, 'unstitched-fabrics-m-prints-mpt-913.jpg', '0000-00-00', 0),
(91, 3, 'Unstitched Fabrics/M.Prints MPT-1001-B', 'Printed Lawn Shirt\r\nDyed cambric Trouser\r\nPrinted Chiffon Dupatta\r\nEmbroidered Neckline', 'unstitched-fabrics-m-prints-mpt-1001-b', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1001-b.jpg', '0000-00-00', 0),
(92, 3, 'Unstitched Fabrics/M.Prints MPT-1003-A', 'Printed Lawn Shirt\r\nPrinted Lawn Patti\r\nDyed Cambric Trouser\r\nPrinted Silk Dupatta\r\nEmbroidered Patch', 'unstitched-fabrics-m-prints-mpt-1003', '5', 5990, 'unstitched-fabrics-m-prints-mpt-1003.jpg', '0000-00-00', 0),
(93, 3, 'Unstitched Fabrics/M.Prints MPT-1005-A', 'Printed Lawn Shirt\r\nDyed Cambric Trouser\r\nPrinted Silk Dupatta\r\nEmbroidered Neckline', 'unstitched-fabrics-m-prints-mpt-1005', '5', 6990, 'unstitched-fabrics-m-prints-mpt-1005.jpg', '0000-00-00', 0),
(94, 4, 'FX-857', '6-8 weeks\r\nExpedited production available for additional fee.', 'fx-857', '5', 13590, 'fx-857.jpg', '0000-00-00', 0),
(95, 4, 'FX-855', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-855', '5', 17690, 'fx-855.jpg', '2021-06-10', 1),
(96, 4, 'FX-860', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-860', '5', 15000, 'fx-860.jpg', '0000-00-00', 0),
(97, 4, 'FX-852', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'FX-852', '0', 18590, '_1625303068.jpg', '2021-07-03', 3),
(98, 4, 'FX-854', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-854', '5', 12090, 'fx-854.jpg', '0000-00-00', 0),
(99, 4, 'FX-856', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-856', '5', 17200, 'fx-856.jpg', '0000-00-00', 0),
(100, 4, 'FX-853', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-853', '5', 18590, 'fx-853.jpg', '0000-00-00', 0),
(101, 4, 'FX-858', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-858', '5', 18090, 'fx-858.jpg', '0000-00-00', 0),
(102, 4, 'FX-850', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-850', '5', 17890, 'fx-850.jpg', '0000-00-00', 0),
(103, 4, 'FX-841', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-841', '5', 23590, 'fx-841.jpg', '0000-00-00', 0),
(104, 4, 'FX-840', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-840', '5', 33590, 'fx-840.jpg', '0000-00-00', 0),
(105, 4, 'FX-842', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-842', '5', 23590, 'fx-842.jpg', '2021-07-03', 1),
(106, 4, 'FX-830', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-830', '5', 35000, 'fx-830.jpg', '0000-00-00', 0),
(107, 4, 'FX-829', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-829', '5', 28500, 'fx-829.jpg', '0000-00-00', 0),
(108, 4, 'FX-831', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-831', '5', 21000, 'fx-831.jpg', '0000-00-00', 0),
(109, 4, 'FX-825', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-825', '5', 22590, 'fx-825.jpg', '0000-00-00', 0),
(110, 5, 'EX-135', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-135', '5', 59590, 'ex-135.jpg', '0000-00-00', 0),
(111, 5, 'EX-134', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-134', '5', 56790, 'ex-134.jpg', '2021-06-08', 1),
(112, 5, 'EX-132', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-132', '5', 83590, 'ex-132.jpg', '2021-06-22', 2),
(113, 5, 'EX-127', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-127', '5', 61090, 'ex-127.jpg', '0000-00-00', 0),
(114, 5, 'EX-130', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-130', '5', 77590, 'ex-130.jpg', '0000-00-00', 0),
(115, 5, 'FX-832', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-832', '5', 350, 'fx-832.jpg', '0000-00-00', 0),
(116, 5, 'EX-129', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-129', '5', 74590, 'ex-129.jpg', '0000-00-00', 0),
(117, 5, 'EX-122', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-122', '5', 43590, 'ex-122.jpg', '0000-00-00', 0),
(118, 5, 'EX-123', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-123', '5', 46590, 'ex-123.jpg', '0000-00-00', 0),
(119, 5, 'EX-116', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-116', '5', 63790, 'ex-116.jpg', '0000-00-00', 0),
(120, 5, 'EX-126', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-126', '5', 52590, 'ex-126.jpg', '0000-00-00', 0),
(121, 5, 'EX-115', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'ex-115', '5', 48599, 'ex-115.jpg', '0000-00-00', 0),
(124, 6, 'FX-8559', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-8559', '5', 17690, 'fx-8559.jpg', '2021-07-03', 1),
(125, 6, 'FX-8529', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-8529', '5', 18590, 'fx-8529.jpg', '2021-07-03', 1),
(126, 6, 'FX-8419', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-8419', '5', 23590, 'fx-8419.jpg', '2021-07-03', 1),
(127, 6, 'FX-84099', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-84099', '5', 33590, 'fx-84099.jpg', '2021-07-03', 1),
(128, 6, 'FX-6549', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-6549', '5', 21590, 'fx-6549.jpg', '0000-00-00', 0),
(129, 6, 'FX-8249', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-8249', '5', 21890, 'fx-8249.jpg', '0000-00-00', 0),
(130, 6, 'FX-7749', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-7749', '5', 26590, 'fx-7749.jpg', '2021-07-03', 1),
(131, 6, 'FX-7899', 'We only do Made to Measure products for this category.The dress will be made as per your measurements. Please feel free to check our Terms and Conditions.\r\n\r\nFor further Bridal FAQs please click here.\r\n\r\nClick Here to get more details on our shipping & delivery policies.', 'fx-7899', '5', 27590, 'fx-7899.jpg', '2021-07-03', 1),
(132, 7, 'JJK-A-40083/S21/JJ7210', 'More Information\r\nColor	MAROON\r\nWear Type	Formal\r\nProduct Category	Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-40083-s21-jj7210', '5', 6990, 'jjk-40083-s21-jj7210.jpg', '0000-00-00', 0),
(133, 7, 'JJK-A-40086/S21/JJ7210', 'More Information\r\nColor	WHITE\r\nWear Type	Formal\r\nProduct Category	Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-40086-s21-jj7210', '5', 5990, 'jjk-40086-s21-jj7210.jpg', '0000-00-00', 0),
(134, 7, 'JJK-A-36787/S21/DMR31', 'More Information\r\nColor	MINT\r\nWear Type	Casual/Plain\r\nProduct Category	Casual Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-36787-s21-dmr31', '5', 5990, 'jjk-36787-s21-dmr31.jpg', '2021-06-10', 1),
(135, 8, 'JJKS-S-36677/S20/JJ6884', 'More Information\r\nColor	FAWN\r\nWear Type	Semi-Formal\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-36677-s20-jj6884', '5', 13990, 'jjks-s-36677-s20-jj6884.jpg', '0000-00-00', 0),
(136, 8, 'JJKS-A-36721/S21/JJ6949', 'More Information\r\nColor	Off White\r\nWear Type	Semi-Formal\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-36721-s21-jj6949', '5', 13990, 'jjks-36721-s21-jj6949.jpg', '2021-06-08', 1),
(137, 8, 'JJKS-S-36642/S20/JJ6229', 'More Information\r\nColor	Grey\r\nWear Type	Casual/Plain\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-36642-s20-jj6229', '5', 13990, 'jjks-s-36642-s20-jj6229.jpg', '0000-00-00', 0),
(138, 8, 'JJKS-A-36701/S21/JJ6949', 'More Information\r\nColor	LIGHT BEIGE\r\nWear Type	Semi-Formal\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Poly-Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-36701-s21-jj6949', '5', 13990, 'jjks-36701-s21-jj6949.jpg', '0000-00-00', 0),
(139, 8, 'JJKS-S-34022/S21/JJ6979', 'More Information\r\nColor	Pigeon Blue\r\nWear Type	Casual/Plain\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-34022-s21-jj6979', '5', 13000, 'jjks-s-34022-s21-jj6979.jpg', '0000-00-00', 0),
(140, 8, 'JJKS-S-32451/S21/JJ6979', 'More Information\r\nColor	Grey\r\nWear Type	Semi-Formal\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-32451-s21-jj6979', '5', 13000, 'jjks-s-32451-s21-jj6979.jpg', '0000-00-00', 0),
(141, 8, 'JJKS-A-39015/S19/JJ6128', 'More Information\r\nColor	Grey\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kameez Shalwar\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Polyester Viscose\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-39015-s19-jj6128', '5', 13990, 'jjks-39015-s19-jj6128.jpg', '0000-00-00', 0),
(142, 8, 'JJKS-A-36752/S21/JJ6949', 'Color	Off White\r\nWear Type	Casual/Plain\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-36752-s21-jj6949', '5', 13990, 'jjks-36752-s21-jj6949.jpg', '0000-00-00', 0),
(143, 8, 'JJKS-S-31123/S21/JJ6733', 'More Information\r\nColor	PEARL WHITE\r\nWear Type	Casual/Plain\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	CVC/Chief Value Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-31123-s21-jj6733', '5', 13990, 'jjks-s-31123-s21-jj6733.jpg', '0000-00-00', 0),
(144, 8, 'JJKS-A-31161/W20/JJ6595', 'More Information\r\nColor	Sky Blue\r\nProduct Category	Kameez Shalwar\r\nFabric	Blended\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-31161-w20-jj6595', '5', 13990, 'jjks-31161-w20-jj6595.jpg', '0000-00-00', 0),
(145, 8, 'JJKS-S-36674/S20/JJ6973', 'More Information\r\nColor	DULL PURPLE\r\nWear Type	Exclusive\r\nProduct Category	Kameez Shalwar\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-36674-s20-jj6973', '5', 13990, 'jjks-s-36674-s20-jj6973.jpg', '0000-00-00', 0),
(146, 8, 'JJKS-S-31122/S21/JJ6958', 'More Information\r\nColor	PEACH\r\nWear Type	Semi-Formal\r\nProduct Category	Kameez Shalwar\r\nVolume	Volume 1 2021\r\nCollection	Spring Summer Collection 2021\r\nFabric	Cotton\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjks-s-31122-s21-jj6958', '5', 13990, 'jjks-s-31122-s21-jj6958.jpg', '0000-00-00', 0),
(147, 9, 'Men Textured Fabric Embroidered Kurta Black', 'Condition:                                Wash n Wear fabric\r\n\r\nNeckline:                                  High-neck embroidered band \r\n\r\nSleeves:                                   Round long Sleeves\r\n\r\nFitting:                                     Regular\r\n\r\nFastening:                               Blend Loop Buttons\r\n\r\nPocket:                                    2 Side Pockets                                                 \r\n\r\nWashing Care:                        Machine Washable\r\n\r\nColors:                                    Black\r\n\r\nSizes:                                      S, M, L, XL\r\n\r\nSeason:                                  Winter\r\n\r\nSuitable For:                          Formal & Events', 'men-textured-fabric-embroidered-kurta-black', '5', 13900, 'men-textured-fabric-embroidered-kurta-black.jpg', '0000-00-00', 0),
(148, 9, 'Men Embroidery Design Kurta Yellow', 'Condition:            Brand New with Tags\r\nMaterial:               Textured Fabric\r\nCollar:                    Round Collar\r\nSleeves:                 Round Sleeves\r\nFitting:                    Regular Fit\r\nFastening:            Button Fly\r\nPockets:                2 Side Pockets\r\nWashing Care:    Machine Washable\r\nColors:                Yellow\r\nSizes:                      M, L, XL\r\nSeason:                 All\r\nSuitable For:        Casual & Events', 'men-embroidery-design-kurta-yellow', '5', 12990, 'men-embroidery-design-kurta-yellow.jpeg', '2021-06-17', 1),
(149, 9, 'Men Embroidered Fabric Kurta Green', 'Condition:                            Brand New with Tags\r\n\r\nMartial:                                 100% cotton\r\n\r\nMartial Type:                        Allover Schiffli Fabric\r\n\r\nNeckline:                              Band collar with narrow placket Jamawar fabric inside trim \r\n\r\nSleeves:                                Round long Sleeves\r\n\r\nFitting:                                   Regular\r\n\r\nFastening:                             Inner button \r\n\r\nPocket:                                  2 Side Pockets                                                 \r\n\r\nWashing Care:                      Machine Washable\r\n\r\nColors:                                  Green\r\n\r\nSizes:                                    S, M, L, XL\r\n\r\nSeason:                                 All\r\n\r\nSuitable For:                         Formal & Events', 'men-embroidered-fabric-kurta-green', '5', 14990, 'men-embroidered-fabric-kurta-green.jpg', '2021-06-10', 1),
(150, 9, 'Men Embroidery Design Kurta Brown', 'Premium jamawar fabric Kurta with Semi-formal embroidereddetails on band/placket. Jamawar fabric. Semi-Formal embroidery details onpremium velvet. Inner- buttons. Team it up with your favorite white pants', 'men-embroidery-design-kurta-brown', '5', 12900, 'men-embroidery-design-kurta-brown.jpeg', '2021-06-08', 1),
(151, 9, 'Men Embroidered Fabric Kurta Brown', 'Condition:                              Brand New with Tags\r\nMartial:                                  100% Cotton\r\nMartial Type:                          Allover Schiffli\r\nNeckline:                                Band collar with narrow placket White-inner buttons\r\nSleeves:                                 Round long Sleeves\r\nFitting:                                    Regular\r\nFastening:                              Inner button\r\nPocket:                                   2 Side Pockets                                                 \r\nWashing Care:                       Machine Washable\r\nColor:                                      Brown\r\nSizes:                                       S, M, L, XL\r\nSeason:                                   All\r\nSuitable For:                           Formal & Events', 'men-embroidered-fabric-kurta-brown', '5', 14990, 'men-embroidered-fabric-kurta-brown.jpg', '0000-00-00', 0),
(152, 9, 'Men Premium Jacquard Embroidered Kurta', 'Premium self-designjacquard washing wear fabric Kurta with premium anchor thread formalembroidered neckline with classic fit. \r\nSelf design fabric with 80% polyester & 20% cotton blend.\r\nFormal wear with anchor thread embroidery.\r\nMetal-silver button with classic fit.\r\nFor a modern and stylish look.', 'men-premium-jacquard-embroidered-kurta', '5', 14990, 'men-premium-jacquard-embroidered-kurta.jpeg', '2021-06-09', 1),
(153, 10, 'JJK-A-36664/S20/BMW502', 'More Information\r\nColor	Sea Green\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Bunnat\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-36664-s20-bmw502', '5', 12990, 'jjk-36664-s20-bmw502.jpg', '0000-00-00', 0),
(154, 10, 'JJK-S-90236/S20/JJ6587', 'More Information\r\nColor	DARK GREY\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Cotton\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-s-90236-s20-jj6587', '5', 12990, 'jjk-s-90236-s20-jj6587.jpg', '0000-00-00', 0);
INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `stock`, `price`, `photo`, `date_view`, `counter`) VALUES
(155, 10, 'JJK-A-36597/S20/JJ6580', 'More Information\r\nColor	TEA PINK\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Cotton\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-36597-s20-jj6580', '5', 12990, 'jjk-36597-s20-jj6580.jpg', '0000-00-00', 0),
(156, 10, 'JJK-S-36774/S21/JJ6874', 'More Information\r\nColor	LIME YELLOW\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Lawn\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-s-36774-s21-jj6874', '5', 12990, 'jjk-s-36774-s21-jj6874.jpg', '0000-00-00', 0),
(157, 10, 'JJK-S-36784/S21/JJ6837', 'More Information\r\nColor	CHARCOAL GREY\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Lawn\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-s-36784-s21-jj6837', '5', 12990, 'jjk-s-36784-s21-jj6837.jpg', '0000-00-00', 0),
(158, 10, 'JJK-S-36778/S21/JJ6874', 'More Information\r\nColor	MAROON\r\nWear Type	Semi-Formal\r\nProduct Category	Semi-Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Lawn\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-s-36778-s21-jj6874', '5', 12990, 'jjk-s-36778-s21-jj6874.jpg', '0000-00-00', 0),
(159, 10, 'JJK-A-34051/S21/JJ6686', 'More Information\r\nColor	PLUM\r\nWear Type	Formal\r\nProduct Category	Formal Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	Blended\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-34051-s21-jj6686', '5', 12990, 'jjk-34051-s21-jj6686.jpg', '0000-00-00', 0),
(160, 10, 'JJK-A-31158/S21/JJ6690', 'More Information\r\nColor	TURQUOISE\r\nWear Type	Casual/Plain\r\nProduct Category	Casual Kurta\r\nVolume	Volume 2 2021\r\nCollection	The Eid Edit \'21\r\nFabric	CVC/Chief Value Cotton\r\nFit Type	Regular Fit\r\nDisclaimer	Due to the photographic lighting & different screen calibrations, the colors of the original product may slightly vary from the picture', 'jjk-31158-s21-jj6690', '5', 12990, 'jjk-31158-s21-jj6690.jpg', '0000-00-00', 0),
(162, 9, 'Men Embroidery Design Kurta 854', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-854', '5', 4500, 'men-embroidery-design-kurta-854.jpg', '0000-00-00', 0),
(163, 9, 'Men Embroidery Design Kurta 855', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-855', '5', 6500, 'men-embroidery-design-kurta-855.jpg', '0000-00-00', 0),
(164, 9, 'Men Embroidery Design Kurta 856', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Yellow Embroidered Kurta is comfortable going outfits and adds a bit of class to yof your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-856', '5', 7500, 'men-embroidery-design-kurta-856.jpg', '0000-00-00', 0),
(165, 9, 'Men Embroidery Design Kurta 857', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This Embroidered Kurta is comfortable going outfits and adds a bit of class to everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-857', '5', 6500, 'men-embroidery-design-kurta-857.jpg', '0000-00-00', 0),
(166, 9, 'Men Embroidery Design Kurta 858', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Yellow Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitableChappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-858', '5', 8400, 'men-embroidery-design-kurta-858.jpg', '0000-00-00', 0),
(167, 9, 'New Men Embroidery Design Kurta 859', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Yellow Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look  with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'new-men-embroidery-design-kurta-859', '5', 8000, 'new-men-embroidery-design-kurta-859.jpg', '0000-00-00', 0),
(168, 9, 'Men Embroidery Design Kurta 860', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Yellow Embroidered Kurta is comfortable going outfits and adds a bit This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-860', '5', 10500, 'men-embroidery-design-kurta-860.jpg', '0000-00-00', 0),
(169, 9, 'Men Embroidery Design Kurta 861', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. -premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-861', '5', 6500, 'men-embroidery-design-kurta-861.jpg', '2021-06-08', 1),
(170, 9, 'Men Embroidery Design Kurta 862', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-862', '5', 6900, 'men-embroidery-design-kurta-862.jpg', '0000-00-00', 0),
(171, 9, 'Men Embroidery Design Kurta 863', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish  Kurta will be the collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-863', '5', 8650, 'men-embroidery-design-kurta-863.jpg', '0000-00-00', 0),
(172, 9, 'Men Embroidery Design Kurta 864', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and fabric. Self-premium handmade embroidery work on and Band line give it a classic look.', 'men-embroidery-design-kurta-864', '5', 9800, 'men-embroidery-design-kurta-864.jpg', '0000-00-00', 0),
(173, 9, 'Men Embroidery Design Kurta 865', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda . This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-865', '5', 9800, 'men-embroidery-design-kurta-865.jpg', '0000-00-00', 0),
(174, 9, 'Men Embroidery Design Kurta 866', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with Peshawari Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.\r\n ', 'men-embroidery-design-kurta-866', '5', 10500, 'men-embroidery-design-kurta-866.jpg', '0000-00-00', 0),
(175, 9, 'Men Embroidery Design Kurta 868', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable to wear with  Chappal and Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium embroidery work on Neckline and Band line give it a classic look.\r\n ', 'men-embroidery-design-kurta-868', '5', 8800, 'men-embroidery-design-kurta-868.jpg', '2021-06-10', 1),
(176, 9, 'Men Embroidery Design Kurta 870', 'Here are attractive, eye-catching men Handmade Embroidery Kurta for you. It will give you an elegant style & charming personality. This classy Kurta you can wear with matching slim fit Shalwar or white Pajama. This trendy Embroidered Kurta is comfortable going outfits and adds a bit of class to your everyday style. It is suitable  Charsadda chappal. This stylish Embroideries Kurta will be the best collection of your wardrobe. It will give you an attractive look from morning to night and provides you with a comfortable feeling due to soft and smooth fabric. Self-premium handmade embroidery work on Neckline and Band line give it a classic look.', 'men-embroidery-design-kurta-870', '5', 9500, 'men-embroidery-design-kurta-870.jpg', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(11, 21, '', '2021-06-10'),
(12, 21, '', '2021-06-10'),
(13, 22, '', '2021-06-10'),
(14, 23, '202106107DC2', '2021-06-10'),
(15, 24, '202106107159', '2021-06-10'),
(16, 25, '202106117E56', '2021-06-11'),
(17, 25, '202106118EBF', '2021-06-11'),
(18, 25, '202106115021', '2021-06-11'),
(19, 24, '202106204E57', '2021-06-20'),
(20, 24, '2021062024AD', '2021-06-20'),
(21, 24, '20210620713F', '2021-06-20'),
(22, 24, '20210620D9FA', '2021-06-20'),
(23, 24, '20210620C476', '2021-06-20'),
(24, 24, '20210702C9CF', '2021-07-02'),
(25, 24, '20210703E25D', '2021-07-03'),
(26, 24, '20210703C7D9', '2021-07-03'),
(27, 21, '20210703A725', '2021-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `country`, `city`, `contact_info`, `zip_code`, `status`, `reset_code`, `created_on`) VALUES
(1, 'raza@gmail.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Raza', 'Rehman', 'Moh bun wala near new katchary', 'Pakistan', 'daska', '+923157976749', '51010', 1, '', '2021-05-18'),
(13, 'raza@gmail.com', '$2y$10$jJTTCnb3gbWOlxCyTSdLf.exPc2DzIGMTStYTpinZogoIBhUwv4pS', 0, 'Raza', 'Rehman', 'Moh bun wala near new katchary', 'Pakistan', 'daska', '+923157976749', '51010', 1, '', '2021-05-18'),
(14, 'raza@gmail.com', '$2y$10$9GVqA.qAcL7MUE2OUz3Nxe4TG9d2Iu20fqWKOmM0HoTHFVG/muUYi', 0, 'Raza', 'Rehman', 'Moh bun wala near new katchary', 'Pakistan', 'daska', '+923157976749', '51010', 1, '', '2021-05-18'),
(21, 'umar@gmail.com', '$2y$10$oLpuM6cKuO0h/njOsTWZbu3nMDdvBZqG5gTr/vyOv251QpueryB9y', 0, 'Umar', ' Razzaq', 'Al-yousaf center Pasroor road', 'Pakistan', 'daska', '03157976749', '51010', 0, '', '2021-06-10'),
(22, 'hassan@gmail.com', '$2y$10$bq5eC0Qx2GLgSidnQ0z0cOrOshboyv18nmipvnZYF8JPq/UMGXmp.', 0, 'Haasan ', 'Khalid', 'Al-yousaf center Pasroor road', 'Pakistan', 'daska', '03157976749', '51010', 0, '', '2021-06-10'),
(23, 'ali@gmail.com', '$2y$10$g3l4Iesf61unCT1d2emhJeJ6KTJEoVfiG5dM82809qntxvKIpCRIG', 0, 'Ali', 'Raza', 'Al-yousaf center Pasroor road', 'Pakistan', 'daska', '03157976749', '51010', 0, '', '2021-06-10'),
(24, 'asim@gmail.com', '$2y$10$4w7Yr2jOtFDF5FMHhtmT3.xLgic6I092uVTd7AE9OFd6tvv2jk5tG', 0, 'Asim', 'Razzaq', 'Al-yousaf center Pasroor road', 'Pakistan', 'daska', '03157976749', '51010', 0, '', '2021-06-10'),
(25, 'bcsf17s13.uos@gmail.com', '$2y$10$J8oDjJmcmb5MQP7gxNKt5e6tgGn2p5m7dEZR4RYLT.xlHSIxvqFxO', 0, 'Umar', 'Razzaq', 'Al-yousaf center Pasroor road', 'Pakistan', 'daska', '03157976749', '51010', 0, '', '2021-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
