-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2023 at 09:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csCinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookHistory`
--

CREATE TABLE `bookHistory` (
  `bookingID` int(100) NOT NULL,
  `user_ID` int(4) NOT NULL,
  `bTheatre` int(2) NOT NULL,
  `bTime` varchar(100) NOT NULL,
  `bSeat` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comingSoon`
--

CREATE TABLE `comingSoon` (
  `coming_ID` int(4) NOT NULL,
  `coming_name` varchar(255) NOT NULL,
  `cLength` varchar(255) NOT NULL,
  `cType` varchar(255) NOT NULL,
  `cRelease` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `c_image` varchar(255) NOT NULL,
  `cDirector` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comingSoon`
--

INSERT INTO `comingSoon` (`coming_ID`, `coming_name`, `cLength`, `cType`, `cRelease`, `detail`, `actor`, `c_image`, `cDirector`) VALUES
(1, 'Transformers: Rise of the Beasts', '130 นาที\r\n', 'หมวดหมู่: Action, Adventure, Sci - Fi', '2023-07-06\r\n', 'ทรานส์ฟอร์เมอร์ส : กำเนิดจักรกลอสูร จะพาผู้ชมกลับไปในการผจญภัยรอบโลกในยุคทศวรรษ 90 กับเหล่าออโตบ็อตส์ และขอแนะนำสายเลือดใหม่ของทรานส์ฟอร์เมอร์ส “แม็กซิมัลส์”\r\n', 'Michelle Yeoh, Peter Dinklage, Anthony Ramos, Peter Cullen, Dominique Fishback', 'tran.jpeg', 'ผู้กำกับ: Steven Caple Jr.'),
(2, 'Spider-Man: Across the Spider-Verse', '140 นาที', 'หมวดหมู่: Action, Adventure, Animation', '2023-05-31', 'สไปเดอร์-แมนเพื่อนบ้านที่แสนดี ได้ถูกโยนเข้าไปสู่มัลติเวิร์สใหม่ของเหล่าแมงมุม ที่ซึ่งทำให้ไมล์สได้พบกับสไปเดอร์คนอื่นๆ แต่แล้วความขัดแย้งก็เกิดขึ้นเพราะความเห็นต่างของเหล่าสไปเดอร์ ไมลส์จึงถูกกดดันให้ต้องต่อสู้กับสไปเดอร์คนอื่นๆ', 'Hailee Steinfeld, Shameik Moore, Issa Rae', 'spider.jpeg', 'ผู้กำกับ: Kemp Powers, Joaquim Dos Santos, Justin K. Thompson'),
(3, 'The flash', '145 นาที', 'หมวดหมู่: Action, Adventure, Fantasy', '2023-15-06', 'เมื่อ แบร์รี่ ใช้พลังวิเศษของเขาเดินทางย้อนเวลาหวังกลับไปเปลี่ยนสิ่งที่เกิดขึ้นในอดีต แต่การความตั้งใจที่อยากช่วยชีวิตครอบครัวของเขาเอาไว้กลับทำให้อนาคตเปลี่ยนไป แถม แบร์รี่ ยังต้องติดอยู่ในช่วงเวลาที่ นายพลซ็อด กลับมาคุกคามพร้อมทำลายล้างโลกใบนี้', 'Michael Keaton, Ben Affleck, Ezra Miller, Sasha Calle', 'theFlash.jpeg', 'ผู้กำกับ: Andy Muschietti'),
(9, 'Elemental', '105 นาที', 'หมวดหมู่: Adventure, Animation, Comedy', '2023-22-06', 'พบเรื่องราวสุดโรแมนติกของวัยรุ่นต่างธาตุ ดำเนินเรื่องใน Element City ที่ซึ่งไฟ น้ำ ดิน และลม อาศัยอยู่ร่วมกัน', 'Mamoudou Athie, Ronnie Del Carmen, Shila Ommi', 'elemental.jpeg', 'ผู้กำกับ: Peter Sohn, Leah Lewis');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_ID` int(4) NOT NULL,
  `movie_name` varchar(255) NOT NULL,
  `mLength` varchar(20) NOT NULL,
  `mType` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `actor` varchar(255) NOT NULL,
  `M_image` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_ID`, `movie_name`, `mLength`, `mType`, `release_date`, `detail`, `actor`, `M_image`, `director`) VALUES
(1, 'FastX', '140 นาที', 'หมวดหมู่: Action, Crime, Mystery', '2023-05-17', 'หลังจากภารกิจมากมายและการฝ่าฟันอุปสรรคนานัปการ ดอม ทอเร็ตโต้ และครอบครัวของเขา ก็สามารถเฉือนคม ชนะสงครามประสาทและแซงหน้าศัตรูทุกคนที่อยู่บนเส้นทางของพวกเขาได้ ', 'Brie Larson, Jason Momoa, Charlize Theron, Vin Diesel, Michelle Rodriguez', 'fast.jpeg', 'ผู้กำกับ : Louis Leterrier'),
(2, 'Guardians of the galaxy vol 3', '150 นาที', 'หมวดหมู่: Action, Adventure, Comedy', '2023-05-03', 'รวมพันธุ์นักสู้พิทักษ์จักรวาล 3 เหล่าผู้พิทักษ์จักรวาลกำลังเริ่มต้นชีวิตใหม่บนดาวโนว์แวร์ แต่แล้วจู่ ๆ ชีวิตในอดีตสุดปั่นป่วนของร็อคเก็ตก็หวนกลับมาทำให้เกิดเรื่องอีกครั้ง ต้องรวมทีมกับเหล่าสหายในภารกิจสุดท้าทายเพื่อช่วยชีวิตของร็อคเก็ต', 'Karen Gillan, Chris Pratt, Will Poulter, Zoe Saldana', 'guardians.jpeg', 'ผู้กำกับ : James Gunn'),
(3, 'Conan 26 : มฤตยูใต้น้ำทมิฬ', '110 นาที', 'หมวดหมู่: Action, Adventure, Mystery', '2023-04-26', 'แก๊งนักสืบเยาวชนได้รับคำเชิญจากโซโนโกะให้มาดูปลาวาฬที่เกาะฮะจิโจ โคนันได้รับโทรศัพท์จากโอกิยะ ซุบารุ(อากาอิ ชูอิจิ)ว่ามีเจ้าหน้าที่ยูโรโพลถูกจินฆ่าตายที่เยอรมนี', '-', 'conan.jpeg', 'ผู้กำกับ : Tachikawa Yuzuru'),
(5, 'The super mario bros. movie', '90 นาที', 'หมวดหมู่: Adventure, Animation, Comedy', '2023-05-04', 'จากนินเทนโดและอิลลูมิเนชั่นสู่ภาพยนตร์แอนิเมชั่นเรื่องใหม่จากโลกของ Super Mario Bros. เรื่องราวการผจญภัยในอาณาจักรเห็ดของมาริโอ้ ลุยจิ และ เจ้าหญิงพีช เพื่อปกป้องอาณาจักรอันเป็นที่รักให้รอดพ้นจากวายร้าย', 'Anya Taylor-Joy, Chris Pratt, Jack Black, Seth Rogen', 'mario.jpeg\r\n', 'ผู้กำกับ: Aaron Horvath, Michael Jelenic'),
(10, 'The boogeyman', '100 นาที', 'หมวดหมู่: Horror, Mystery, Thriller', '2023-01-06', 'Sadie Harper นักเรียนมัธยมปลายและ Sawyer น้องสาวของเธอที่พบเหตุสะเทือนใจ จากการเสียชีวิตของแม่เมื่อเร็วๆ นี้และ Will พ่อของทั้งสอง และเป็นนักบำบัดที่ก็ต้องรับมือกับความเจ็บปวดของตัวเอง จนไม่ได้ให้ความช่วยเหลือลูกๆ ทั้งคู่มากนัก', 'Chris Messina, Vivien Lyra Blair, Sophie Thatcher', 'boogeyman.jpeg', 'ผู้กำกับ: Rob Savage'),
(11, 'About my father', '90 นาที', 'หมวดหมู่: Comedy', '2023-01-06', 'เมื่อเซบาสเตียนบอกซัลโว คุณพ่อสุดหัวโบราณที่เป็นชาวอิตาเลียนอพยพ ว่าเขาจะแต่งงานกับแฟนสาวอเมริกัน ซัลโวยืนกรานว่าขอลองไปเยี่ยมบ้านครอบครัวลูกสะใภ้ซักช่วงสุดสัปดาห์ดูซักครั้ง', 'Robert De Niro, Sebastian Maniscalco, Leslie Bibb', 'father.jpeg', 'ผู้กำกับ: Laura Terruso');

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `showID` int(1) NOT NULL,
  `Time` varchar(5) NOT NULL,
  `movie_name` varchar(1000) NOT NULL,
  `theatre` int(1) NOT NULL,
  `movID` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`showID`, `Time`, `movie_name`, `theatre`, `movID`) VALUES
(1, '10.00', 'fastX', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `theatre1`
--

CREATE TABLE `theatre1` (
  `tID` int(100) NOT NULL,
  `tTime` varchar(6) NOT NULL,
  `seatNum` varchar(6) NOT NULL,
  `seatStatus` varchar(1000) NOT NULL,
  `tNum` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `theatre1`
--

INSERT INTO `theatre1` (`tID`, `tTime`, `seatNum`, `seatStatus`, `tNum`) VALUES
(1, '10.00', 'B1', 'unavailable', 1),
(2, '10.00', 'B2', 'available', 1),
(3, '10.00', 'B3', 'available', 1),
(4, '10.00', 'B4', 'available', 1),
(5, '10.00', 'A1', 'available', 1),
(6, '10.00', 'A2', 'available', 1),
(7, '10.00', 'A3', 'available', 1),
(8, '10.00', 'A4', 'available', 1),
(9, '10.00', 'AA1', 'available', 1),
(10, '10.00', 'AA2', 'available', 1),
(11, '10.00', 'AA3', 'available', 1),
(12, '10.00', 'AA4', 'available', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `citizen_ID` varchar(13) NOT NULL,
  `birthday` varchar(10) NOT NULL,
  `homenumber` int(3) NOT NULL,
  `subdistrict` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_ID` int(10) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`email`, `password`, `firstname`, `lastname`, `citizen_ID`, `birthday`, `homenumber`, `subdistrict`, `district`, `street`, `province`, `zipcode`, `phone`, `user_ID`, `urole`, `created_at`) VALUES
('ad.min@gmail.com', 'ad123', 'John', 'Doe', '4565000000665', '28/01/1992', 445, 'คลองหนึ่ง', 'คลองหลวง', 'พหลโยธิน', 'ปทุมธานี', 12120, '0987656555', 16, 'admin', '2023-05-28 19:11:12'),
('dev.dev@gmail.com', 'dev1234', 'deve', 'lopper', '1111111111111', '02/05/2002', 111, 'italino', 'Iloilo', '-', 'pttt', 11000, '1111111111', 20, 'user', '2023-05-31 09:05:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookHistory`
--
ALTER TABLE `bookHistory`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `comingSoon`
--
ALTER TABLE `comingSoon`
  ADD PRIMARY KEY (`coming_ID`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_ID`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`showID`);

--
-- Indexes for table `theatre1`
--
ALTER TABLE `theatre1`
  ADD PRIMARY KEY (`tID`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookHistory`
--
ALTER TABLE `bookHistory`
  MODIFY `bookingID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comingSoon`
--
ALTER TABLE `comingSoon`
  MODIFY `coming_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `showID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
