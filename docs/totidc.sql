-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2020 at 06:38 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `totidc`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ac_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `ac_name` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ac_id`, `username`, `ac_name`, `password`, `level`) VALUES
(1, 'jobmunjoo', 'Job Munjoo', '123654', 'admin'),
(2, 'crotis', 'Crotis hunter', '654123', 'user'),
(6, 'charp', 'kawinwat', '1234', 'admin'),
(7, 'user', 'kawinwat', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` varchar(30) NOT NULL,
  `com_name_TH` varchar(50) NOT NULL,
  `com_name_EN` varchar(50) NOT NULL,
  `com_creator` varchar(50) NOT NULL,
  `com_editor` varchar(50) NOT NULL,
  `com_date_creat` date NOT NULL,
  `com_date_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name_TH`, `com_name_EN`, `com_creator`, `com_editor`, `com_date_creat`, `com_date_edit`) VALUES
('C001', 'เค.เอส', 'k.s.', '', '', '0000-00-00', '0000-00-00'),
('C002', 'บี.บี.ซี', 'B.B.C', '', '', '0000-00-00', '0000-00-00'),
('C003', 'เอ.เอ.บี', 'AAB', '', '', '0000-00-00', '0000-00-00'),
('C004', 'บี.เอส', 'B.S', '', '', '0000-00-00', '0000-00-00'),
('C005', 'ซีซีเอ', 'CCA', '', '', '0000-00-00', '0000-00-00'),
('C006', 'เค.เอส', 'k.s.', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_status`
--

CREATE TABLE `customer_status` (
  `cs_id` varchar(30) NOT NULL,
  `cs_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_status`
--

INSERT INTO `customer_status` (`cs_id`, `cs_name`) VALUES
('cs001', 'รอติดตั้ง'),
('cs002', 'ใช้งานปกติ'),
('cs003', 'ระงับบริการ'),
('cs004', 'ยกเลิกบริการ'),
('cs005', 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE `customer_type` (
  `ct_id` varchar(30) NOT NULL,
  `ct_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`ct_id`, `ct_name`) VALUES
('ct001', 'นิติบุคคล'),
('ct002', 'บุคคลธรรมดา'),
('ct003', 'ภาครัฐ'),
('ct004', 'ภายในทีโอที');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pro_id` varchar(30) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `pro_creator` varchar(50) NOT NULL,
  `pro_editor` varchar(50) NOT NULL,
  `pro_date_creator` date NOT NULL,
  `pro_date_editor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `pro_name`, `date_start`, `date_end`, `pro_creator`, `pro_editor`, `pro_date_creator`, `pro_date_editor`) VALUES
('20200410PIDC001', 'กรมการขนส่ง', '2020-04-10', '2020-04-29', '', '', '0000-00-00', '0000-00-00'),
('20200410PIDC002', 'abcccccc', '2020-03-30', '2020-04-30', '', '', '0000-00-00', '0000-00-00'),
('20200416PIDC001', 'ลงโปรแกรม', '2020-04-17', '2020-06-17', '', '', '0000-00-00', '0000-00-00'),
('20200416PIDC002', 'ปรับเปลี่ยน ', '2020-04-17', '2020-05-30', '', '', '0000-00-00', '0000-00-00'),
('20200417PIDC001', 'มานะ', '2020-04-17', '2020-05-17', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

CREATE TABLE `project_detail` (
  `pd_id` varchar(30) NOT NULL,
  `pro_id` varchar(30) NOT NULL,
  `mp_name` varchar(50) NOT NULL,
  `st_id` varchar(30) NOT NULL,
  `cs_id` varchar(30) NOT NULL,
  `ct_id` varchar(30) NOT NULL,
  `sp_id` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `location` text NOT NULL,
  `rack_no` varchar(30) NOT NULL,
  `rack_unit` varchar(30) NOT NULL,
  `pd_note` text NOT NULL,
  `mp_lname` varchar(50) NOT NULL,
  `mp_phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_detail`
--

INSERT INTO `project_detail` (`pd_id`, `pro_id`, `mp_name`, `st_id`, `cs_id`, `ct_id`, `sp_id`, `ip`, `location`, `rack_no`, `rack_unit`, `pd_note`, `mp_lname`, `mp_phone`) VALUES
('PD001', '20200410PIDC001', 'นายชาญชัน', 'st003', 'cs003', 'ct002', 'sp010', '123.5555', 'ชั้น5', '55', 'full', 'มานะ', 'ชันชาญ', '0895623215'),
('PD002', '20200410PIDC002', 'พงพง', 'st002', 'cs001', 'ct002', 'sp013', '55', 'dfgdfg', '66', 'full', 'มาตามนัด', 'พานพาน', '0800214141'),
('PD003', '20200416PIDC001', 'กวินวัฒน์', 'st002', 'cs003', 'ct004', 'sp012', '123.321', 'ชั้น 10', '61', 'full', 'ลงทะเบียน', 'แสยงบาป', '0925992492'),
('PD004', '20200416PIDC002', 'Kawinwat Sayangbarp', 'st002', 'cs002', 'ct001', 'sp011', '555.6666', 'บ้าน', '6', 'full', 'มาลองดู', 'Sayangbarp', '039310000'),
('PD005', '20200417PIDC001', 'Kawinwat Sayangbarp', 'st003', 'cs002', 'ct001', 'sp011', '5555', 'ชั้น 4', '99', 'fu', 'มาตามนัด', 'Sayangbarp', '039310000');

-- --------------------------------------------------------

--
-- Table structure for table `service_plan`
--

CREATE TABLE `service_plan` (
  `sp_id` varchar(30) NOT NULL,
  `sp_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_plan`
--

INSERT INTO `service_plan` (`sp_id`, `sp_name`) VALUES
('sp001', '1/4-Rack'),
('sp002', '1U'),
('sp003', '2U'),
('sp004', '3U'),
('sp005', '4U'),
('sp006', '5U'),
('sp007', '6U'),
('sp008', 'FTTxSM'),
('sp009', 'Full-Rack'),
('sp010', 'Half-Rack'),
('sp011', 'Internet-TOT'),
('sp012', 'Tower'),
('sp013', 'Vendor-TOT');

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `st_id` varchar(30) NOT NULL,
  `st_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`st_id`, `st_name`) VALUES
('st001', 'ชั่วคราว'),
('st002', 'ทดลองใช้'),
('st003', 'ภายใน'),
('st004', 'ใช้งานจริง');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vis_id` varchar(30) NOT NULL,
  `vis_name` varchar(50) NOT NULL,
  `vis_lname` varchar(30) NOT NULL,
  `ID_card` varchar(15) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `vis_creator` varchar(50) NOT NULL,
  `vis_editor` varchar(50) NOT NULL,
  `vis_date_creat` date NOT NULL,
  `vis_date_edit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vis_id`, `vis_name`, `vis_lname`, `ID_card`, `phone`, `email`, `vis_creator`, `vis_editor`, `vis_date_creat`, `vis_date_edit`) VALUES
('vs001', 'กวินวัฒน์', 'แสยงบาป', '1102300038622', '0925992492', 'asd@hotmail.com', '', '', '0000-00-00', '0000-00-00'),
('vs002', 'ชาญชัย', 'ใจตะวัน', '1122233356489', '0863256487', 'xxx@gmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS003', 'ธิติรัต', 'นามใน', '55555', '0866666666', 'kkk@hotmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS004', 'พงพัต', 'พานทอง', '1125600032569 ', '0865232548', 'pong@hotmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS005', 'ชาญชัย', 'ใจบุญ', ' AB2226', '0965854745', 'hohh@gmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS006', 'ชาย', 'สมชาย', ' ab22222', '0956254874', '59310494@go.buu.ac.th', '', '', '0000-00-00', '0000-00-00'),
('VS007', 'สมชาย', 'ชายเมือง', '5652125487952 ', '0625142598', '8888@hotmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS008', 'พงศัก', 'งามงง', '8888888888888 ', '0524175685', '89999@hotmail.com', '', '', '0000-00-00', '0000-00-00'),
('VS009', 'พงพง', 'พพพพพ', ' AB2226', '039310000', 'xx@gmail.com', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_work`
--

CREATE TABLE `visitor_work` (
  `vw_id` varchar(30) NOT NULL,
  `vis_id` varchar(30) NOT NULL,
  `com_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visitor_work`
--

INSERT INTO `visitor_work` (`vw_id`, `vis_id`, `com_id`) VALUES
('VW0001', 'VS004', 'C004'),
('VW0002', 'VS008', 'C003'),
('VW0003', 'VS009', 'C006');

-- --------------------------------------------------------

--
-- Table structure for table `working`
--

CREATE TABLE `working` (
  `work_id` varchar(30) NOT NULL,
  `vis_id` varchar(30) NOT NULL,
  `pro_id` varchar(30) NOT NULL,
  `work_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `working`
--

INSERT INTO `working` (`work_id`, `vis_id`, `pro_id`, `work_date`) VALUES
('20200416W001', 'VS004', '20200416PIDC001', '2020-04-17'),
('20200417W001', 'VS009', '20200417PIDC001', '2020-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer_status`
--
ALTER TABLE `customer_status`
  ADD PRIMARY KEY (`cs_id`);

--
-- Indexes for table `customer_type`
--
ALTER TABLE `customer_type`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `sp_id` (`sp_id`),
  ADD KEY `st_id` (`st_id`),
  ADD KEY `cs_id` (`cs_id`),
  ADD KEY `ct_id` (`ct_id`);

--
-- Indexes for table `service_plan`
--
ALTER TABLE `service_plan`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`vis_id`);

--
-- Indexes for table `visitor_work`
--
ALTER TABLE `visitor_work`
  ADD PRIMARY KEY (`vw_id`),
  ADD KEY `vis_id` (`vis_id`),
  ADD KEY `com_id` (`com_id`);

--
-- Indexes for table `working`
--
ALTER TABLE `working`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `vis_id` (`vis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD CONSTRAINT `project_detail_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project` (`pro_id`),
  ADD CONSTRAINT `project_detail_ibfk_5` FOREIGN KEY (`sp_id`) REFERENCES `service_plan` (`sp_id`),
  ADD CONSTRAINT `project_detail_ibfk_6` FOREIGN KEY (`st_id`) REFERENCES `service_type` (`st_id`),
  ADD CONSTRAINT `project_detail_ibfk_7` FOREIGN KEY (`cs_id`) REFERENCES `customer_status` (`cs_id`),
  ADD CONSTRAINT `project_detail_ibfk_8` FOREIGN KEY (`ct_id`) REFERENCES `customer_type` (`ct_id`);

--
-- Constraints for table `visitor_work`
--
ALTER TABLE `visitor_work`
  ADD CONSTRAINT `visitor_work_ibfk_1` FOREIGN KEY (`vis_id`) REFERENCES `visitor` (`vis_id`),
  ADD CONSTRAINT `visitor_work_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `company` (`com_id`);

--
-- Constraints for table `working`
--
ALTER TABLE `working`
  ADD CONSTRAINT `working_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `project` (`pro_id`),
  ADD CONSTRAINT `working_ibfk_2` FOREIGN KEY (`vis_id`) REFERENCES `visitor` (`vis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
