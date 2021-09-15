-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 06:55 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Jason', 'Roy', 'jason@gmail.com', 'jason123'),
(4, 'Sohan', 'Dilusha', 'sohan@gmail.com', 'sohan123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `street_address` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `street_address`, `city`, `postal_code`, `phone`, `email`, `password`) VALUES
(1, 'Andrew', 'Perera', 'Kandy Road,', 'Kiribathgoda', 11600, 078564785, 'andrew@gmail.com', 'andrew'),
(8, 'Jeff', 'Perera', '78, Kandy road,', 'Malabe', 12354, 125478542, 'jeff@gmail.com', 'jeff');

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `laptop_id` int(11) NOT NULL,
  `laptop_brand` varchar(200) NOT NULL,
  `laptop_model` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `processor` varchar(100) NOT NULL,
  `processor_model` varchar(100) NOT NULL,
  `gpu` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `laptop_storage` varchar(100) NOT NULL,
  `refresh_rate` varchar(100) NOT NULL,
  `display_resolution` varchar(100) NOT NULL,
  `display_description` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `about_laptop` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`laptop_id`, `laptop_brand`, `laptop_model`, `image`, `processor`, `processor_model`, `gpu`, `ram`, `laptop_storage`, `refresh_rate`, `display_resolution`, `display_description`, `weight`, `warranty`, `price`, `about_laptop`) VALUES
(1, 'Asus', 'Asus ROG Zephyrus Duo 15 SE GX551', '../images/laptop/Asus ROG Zephyrus Duo 15 SE GX551.png', 'AMD Ryzen 9', '5900HX (16M Cache, up to 4.6 GHz)', 'RTX 3080 16GB GDDR6', '32GB DDR4 3200MHz', '2TB M.2 NVME SSD', '300Hz', '1920 x 1080', '300Hz 3ms 15.6” FHD IPS-Type PANTONE Validated Display 100% SRGB', '2.5 kg', '2', '845000', 'With its innovative ROG ScreenPad Plus secondary display, the Zephyrus Duo 15 SE takes Windows 10 gaming to new dimensions. Cutting-edge cooling empowers the latest AMD Ryzen™ 9 5900HX  CPU and NVIDIA® GeForce RTX 3080 16GB GDDR6 GPU. A ultrafast 300Hz/3ms gaming panel lets you tailor your system for pro-level esports or content creation. Elevate your entire experience with premium audio delivered by quad speakers and immersive Dolby Atmos surround sound.'),
(2, 'Asus', 'Asus ROG Zephyrus Duo 15 SE GX551QM', '../images/laptop/Asus ROG Zephyrus Duo 15 SE GX551QM.png', 'AMD Ryzen 7', '5800H (20M Cache, up to 4.40Ghz)', 'RTX 3060 6GB GDDR6', '32GB DDR4 3200MHz', '1TB M.2 NVME SSD', '300Hz', '1920 x 1080', '300Hz 3ms 15.6” FHD IPS-Type PANTONE Validated Display 100% SRGB', '2.5 kg', '2', '665000', 'With its innovative ROG ScreenPad Plus secondary display, the Zephyrus Duo 15 SE takes Windows 10 gaming to new dimensions. Cutting-edge cooling empowers the latest AMD Ryzen™ 9 5900HX  CPU and NVIDIA® GeForce RTX 3080 16GB GDDR6 GPU. A ultrafast 300Hz/3ms gaming panel lets you tailor your system for pro-level esports or content creation. Elevate your entire experience with premium audio delivered by quad speakers and immersive Dolby Atmos surround sound.'),
(3, 'Asus', 'Asus Zenbook Pro Duo UX582', '../images/laptop/Asus Zenbook Pro Duo UX582.png', 'Intel Core i9', '10980HK (16M Cache, up to 5.3 GHz, 8 cores)', 'RTX 3070 8GB GDDR6', '32GB DDR4 3200MHz', '1TB M.2 NVME SSD', '120Hz', '3840 x 2160', '15.6\" 4K OLED Touchscreen, Pantone Validated', '2.3 kg', '2', '745000', 'ZenBook Pro Duo 15 OLED lets you get things done in style: calmly, efficiently, and with zero fuss. It’s your powerful and elegant next-level companion for on-the-go productivity and creativity, featuring an amazing 4K OLED HDR touchscreen. It also includes the ASUS ScreenPad™ Plus secondary 4K display with a brand-new tilting design that offers effortless ergonomics and seamless workflows. Powered by up to an Intel® Core™ i9 eight-core processor and NVIDIA® GeForce RTX™ 3070 GPU, ZenBook Pro Duo 15 OLED brings you all the benefits of tomorrow’s technology, today.'),
(4, 'Asus', 'Asus ROG Zephyrus SCAR 15', '../images/laptop/Asus ROG Zephyrus SCAR 15.png', 'AMD Ryzen 9', '5900HX (8 Core 16 Treads, up to 4.6 GHz)', 'RTX 3080 16GB GDDR6', '32GB DDR4 3200MHz', '1TB M.2 NVME SSD', '300Hz', '1920 x 1080', '15.6\" 300Hz 100% SRGB 1080P', '2.5 kg', '2', '665000', 'Compete at the highest level of Windows 10 Pro gaming with the ROG Strix SCAR 15. Take on any challenge with the powerful AMD Ryzen™ 9 5900HX CPU and GeForce RTX™ 3080 GPU. Go all-in on esports speed with an ultrafast panel up to 300Hz/3ms. Input every strike with precision on a responsive optical mechanical keyboard. With a competitive edge this sharp, you can dominate any arena.'),
(5, 'Asus', 'Asus ROG Zephyrus G14 GA401QM', '../images/laptop/Asus ROG Zephyrus G14 GA401QM.png', 'AMD Ryzen 9', '5900HS (8 Core 16 Treads, up to 4.6 GHz)', 'RTX 3060 6GB GDDR6', '32GB DDR4 3200MHz', '2TB M.2 NVME SSD', '120Hz', '2560 x 1440', '14\" 2K 100% SRGB 120Hz Pantone® Validated QHD', '1.7 kg', '2', '439500', 'The ROG Zephyrus G14 makes powerful, ultraportable Windows 10 Pro gaming accessible to everyone. Featuring up to an 8-core AMD Ryzen™ 9 5900HS CPU and GeForce RTX™ 3060 GPU, this slim and stylish powerhouse rips through the most demanding apps and games. high-refresh 120Hz WQHD keep you immersed with lifelike, Pantone® validated colors. Quad speakers pump out lush Dolby Atmos audio, while exclusive Two-Way AI Noise Cancelation makes voice chat crystal clear. Live life at Zephyrus speed with the ultimate blend of power and portability.'),
(6, 'Asus', 'Asus ROG Zephyrus G14 GA401IU', '../images/laptop/Asus ROG Zephyrus G14 GA401IU.png', 'AMD Ryzen 7', '4800HS (8 Core 16 Treads, up to 4.2 GHz)', 'GTX 1650Ti 4GB GDDR6', '16GB DDR4 3200MHz', '512GB M.2 NVME SSD', '120Hz', '2560 x 1440', '14\" 2K 100% SRGB 60Hz Pantone® Validated QHD (2560 x 1440)', '1.7 kg', '2', '315000', 'Outclass the competition with up to an 8-core AMD CPU that speed through everyday multitasking and gaming.Pantone® Validated QHD (2560 x 1440) panel, for superb color accuracy.'),
(7, 'Acer', 'Acer Nitro 5 2021', '../images/laptop/Acer Nitro 5 2021.png', 'Intel Core i5', '11300H (8M Cache, up to 4.40', 'GTX 1650 4GB GDDR6', '8GB DDR4 3200MHz', '512GB M.2 NVME SSD', '144Hz', '1920 x 1080', '15.6\" FHD, IPS 144Hz Display', '2.6 kg', '2', '219000', 'The Nitro 5 laptop was developed to deliver an iconic gaming experience courtesy of the many awesome features inside, including its 11th Gen Intel Core i5-11300H Processor & high-performance NVIDIA GeForce GTX 1650 graphics, toss in its 15.6” FHD IPS 144hz display, awesome mobility, advanced cooling, stellar audio capabilities, & all of the other gaming-rich features & you quickly see why the Nitro 5 delivers a knockout blow to the competition!\r\n'),
(8, 'Acer', 'Acer Predator Helios 300', '../images/laptop/Acer Predator Helios 300.png', 'Intel Core i7', '10750H (12M Cache, up to 5.00Hz)', 'RTX 2060 6GB GDDR6', '16GB DDR4 2933MHz', '1TB M.2 NVME SSD', '144Hz', '1920 x 1080', '15.6\" FHD 1920x1080 IPS 144Hz 3ms', '2.2 kg', '2', '325000', 'The Helios 300 drops you right into the game with everything you need to obliterate the opposition on a blisteringly fast 144Hz display. Only now, we’ve armed it with an NVIDIA® GeForce RTX™ 2060 , a 10th Gen Intel® Core™ i7 Mobile Processor and our custom-engineered 4th Gen AeroBlade™ 3D Technology.\r\n'),
(9, 'Acer', 'Acer Nitro 5', '../images/laptop/Acer Nitro 5.png', 'Intel Core i7', '10870H (16M Cache, up to 5.0 GHz, 8 cores)', 'GTX 1650Ti 4GB GDDR6', '8GB DDR4 2933MHz', '512GB M.2 NVME SSD', '144Hz', '1920 x 1080', '15.6\" FHD, IPS 144Hz Display', '2.6 kg', '2', '269000', 'The Nitro 5 laptop was developed to deliver an iconic gaming experience courtesy of the many awesome features inside, including its Intel® Core™ i7-10870H (16M Cache, up to 5.0 GHz, 8 cores) Processor & high-performance NVIDIA GeForce GTX 1650Ti graphics, toss in its 15.6” FHD IPS 144hz display, awesome mobility, advanced cooling, stellar audio capabilities, & all of the other gaming-rich features & you quickly see why the Nitro 5 delivers a knockout blow to the competition!'),
(10, 'MSI', 'MSI GF75 Thin 10UE i', '../images/laptop/MSI GF75 Thin 10UE i.png', 'Intel Core i7', '10750H (12M Cache, up to 5.00Hz)', 'RTX 3060 Max-Q 6GB GDDR6', '16GB DDR4 2933MHz', '512GB M.2 NVME SSD', '144Hz', '1920 x 1080', '17.3\" FHD, IPS-Level 144Hz Thin Bezel', '2.2 kg', '2', '339500', 'Dedicated thermal solutions for both the CPU and GPU with up to 7 heat pipes, work harmoniously by minimizing heat and maximizing airflow for a smooth gaming performance in such a compact chassis.'),
(11, 'MSI', 'MSI GE76 RAIDER', '../images/laptop/MSI GE76 RAIDER.png', 'Intel Core i7', '10870H (16M Cache, up to 5.10 GHz)', 'RTX 3070 Max-Q 8GB GDDR', '16GB DDR4 3200MHz', '2TB M.2 NVME SSD', '240Hz', '1920 x 1080', '17.3\" FHD 1920x1080 240Hz 99% SRGB', '2.9 kg', '2', '595000', 'GE76 Raider is equipped with the latest 10th Gen. Intel® Core™ i9 processors and powered by NVIDIA® GeForce RTX™ 30 series graphics. The latest GeForce RTX™ 30 series graphics pursue the highest standard and deliver the revolutionary performance of real-time ray tracing. It’s now higher than ever before and becomes more perfect. The GE76 Raider provides gamers with unprecedented gaming experience. It’s time to immerse yourself in your game.\r\n'),
(18, 'MSI', 'MSI GL65 LEOPARD 10SER', '../images/laptop/MSI GL65 LEOPARD 10SER.png', 'Intel Core i7', '10750H (12M Cache, up to 5.00Hz)', 'RTX 2060 6GB GDDR6', '8GB DDR4 2933MHz', '512GB M.2 NVME SSD', '144Hz', '1920 x 1080', '15.6\" FHD, IPS-Level 144Hz Thin Bezel', '2.3 kg', '2', '315000', 'Dedicated thermal solutions for both the CPU and GPU with a total of 7 heat pipes ensure maximum performance under extreme gaming.');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wItem_id` int(11) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `item_id` varchar(100) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wItem_id`, `customer_id`, `item_id`, `item_name`, `image`, `price`) VALUES
(13, '1', '1', 'Asus ROG Zephyrus Duo 15 SE GX551', '../images/laptop/Asus ROG Zephyrus Duo 15 SE GX551.png', '845000'),
(14, '1', '8', 'Acer Predator Helios 300', '../images/laptop/Acer Predator Helios 300.png', '325000'),
(15, '1', '6', 'Asus ROG Zephyrus G14 GA401IU', '../images/laptop/Asus ROG Zephyrus G14 GA401IU.png', '315000'),
(16, '1', '7', 'Acer Nitro 5 2021', '../images/laptop/Acer Nitro 5 2021.png', '219000'),
(17, '1', '7', 'Acer Nitro 5 2021', '../images/laptop/Acer Nitro 5 2021.png', '219000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`laptop_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wItem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `laptop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
