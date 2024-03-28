-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 28, 2024 at 07:23 PM
-- Server version: 8.0.24
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_table`
--

CREATE TABLE `agent_table` (
  `agent_id` int NOT NULL,
  `agent_name` varchar(100) NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gst` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agent_table`
--

INSERT INTO `agent_table` (`agent_id`, `agent_name`, `phone`, `address`, `city`, `status`, `email`, `gst`) VALUES
(1, 'Holide', '9930660143', 'Shop no - 4, Ground Floor,Opp - Dwarkadhish Mandir, Vithal wadi,Kalbadevi Road, Mumbai - 400002', 'Mumbai', 'Active', 'bookings@holide.in', ' 27ADTPJ9921B1ZB'),
(2, 'Nupur Word', '8655086066', 'Delhi', 'Delhi', 'Active', 'nupurworld2012@gmail.com', 'Nil'),
(3, 'Heenkar Travel', '9323108024', 'Delhi', 'Delhi', 'Active', 'nipesh@heenkartravels.com', 'NIL'),
(4, ' Classic Holidays', '9819683188', 'GR FLR, 4/4 A, 482, SANGHRAJKA HOUSE, S.V.P. ROAD, OPERA HOUSE - MUMBAI, Mumbai City, Maharashtra, 400004', 'Mumbai', 'Active', 'res2@classicholidays.in', '27AAACC4354N1ZG'),
(5, 'Beyond Heaven', ' 8850125201', 'Shop no: 09 Ganjawala Bldg | near Chamunda Circle | Borivali (W) | Mumbai - 92 | INDIA', 'Mumbai', 'Active', 'tushar@beyondheaven.in', 'NIL'),
(6, 'Heen Tour and Travel', '93240 11155', '3rd Floor, 304/305 M L Space  Opp Jain Temple, D J Road  Above Bank Of Baroda  Vile Parle { West }  Mumbai – 400056', 'Mumbai', 'Active', 'isha@heenatours.in', ' 27AAACH2649P1Z5'),
(7, 'Dream Vacation', '9716322844', 'Head  Office Address : Gokalpur, shahadara, loni road, opp HP petrolpump Delhi-93', 'Delhi', 'Active', 'dream.vacation2you@gmail.com ', 'NIL'),
(8, 'Parikrama Holidays', '9820253565', 'BEHIND HOTEL RAMAKRISHNA, 27 A, NEMINATH CO OP HSG SOCIETY, Tejpal Road, KAMBLI WADI VILE PARLE EAST, Mumbai, Mumbai Suburban, Maharashtra, 400057', 'Mumbai', 'Active', 'enquiry@parikramaholidays.com', '27ACVPC0806D1ZW'),
(9, 'Travel Support Services', '9910171909', ' F 54, Second Floor Motinagar,  ND - 110015', 'Delhi', 'Inactive', 'travelsupportservice@gmail.com', '07EFMPP2436G1Z8'),
(10, 'Trip Kara De', '9997828099', ' Haldwani Road. Tallital, Nainital, Uttarakhand-263002', 'Nainital', 'Active', 'tripkaradehospitalitynainital@gmail.com', 'Nil'),
(11, 'Direct Guest', 'Nil', 'Nil', 'Nil', 'Active', 'Nil', 'Nil'),
(12, 'Trav Comfort', '9967112228', 'Mumbai', 'Mumbai', 'Active', 'travcomfort@gmail.com', 'NIL'),
(13, 'RM Travel', '9664214821', 'Maharastra', 'Mumbai', 'Active', 'sales@rmtravels.in', 'Nil'),
(14, ' Journey bees', '9999732731', 'Delhi', 'Delhi', 'Active', 'sales@journeybees.com', 'Nil'),
(15, 'Tragoin', '9654382001', 'SF-39, Central Plaza High Street, GH-04, Sector-4, Greater Noida West', 'Delhi', 'Active', 'tragoin@gmail.com', '07AFCPB6936P2Z3'),
(16, 'AAA Tours', '8299550801', 'Uttar Pradesh', 'Uttar Pradesh', 'Active', 'aaatourtravelvns@gmail.com', '09ADDPJ0048B1Z5'),
(17, 'Northern Trips', '8700766658', ' S5 Building No.252, 2nd Floor Nazar Singh palace, Sant Nagar East of Kailash 110065', 'Delhi', 'Active', 'ranjana.northerntrips@gmail.com , info.northerntrips@gmail.com , rohit.northerntrips@gmail.com', 'Nil'),
(18, 'Mountain Trails', '9654304050', 'Delhi', 'Delhi', 'Active', 'nitin@mountaintrails.in', 'Nil'),
(19, 'Travel Support Services', ' 9910171909 ,  8800992533', ' F 54, Second Floor Motinagar,  ND - 110015', 'Delhi', 'Active', 'travelsupportservice@gmail.com  ,   info@travelsupportservice.com', ' 07EFMPP2436G1Z8'),
(20, 'Vivaan Holiday Planners', ' 8743024111 ', 'Ground Floor I WZ-903 ,Shiv  Nagar Extension, Jail Road I West Delhi -110058', 'Delhi', 'Active', 'simran@vivaanholidayplanners.com', ''),
(21, 'Travocart ', '7011847979 , 7071212121 ', 'Air tickets l Hotel bookings l Packages l Cruise l Visa l Travel Insurance l Forex  E-56, Shivaji Road, Adarsh Nagar, Delhi-110033', 'Delhi', 'Active', 'travocart1@gmail.com  , ', '07AYDPA0526C1ZA'),
(22, 'A to Z Holiday', '7940020240', 'A - 305, Mondeal Heights, Nr. Wide Angle Cinema,  S.G.Highway, Ahmedabad, Gujarat - 380015', 'Gujrat', 'Active', 'sales@atozholidays.co.in', '24AGDPT8311Q1ZW'),
(23, 'Tour Mantra', '8427611122', 'Tour Mantra • B-1/1178/A, Satsang Road, Kailash Chowk, Civil Lines, Ludhiana, Punjab-141001, INDIA', 'Punjab', 'Active', 'sales@tourmantra.com sales.     tourmantra@gmail.com', '03BGVPS5292Q1Z8'),
(24, 'Urlaub Holidays ', '9266999959', 'East of Kailash', 'Delhi', 'Active', 'sumit@urlaubholidays.com', '07AABCU6615K1Z5');

-- --------------------------------------------------------

--
-- Table structure for table `fest_table`
--

CREATE TABLE `fest_table` (
  `fest_id` int NOT NULL,
  `fest` varchar(250) NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(100) NOT NULL,
  `bed` varchar(100) NOT NULL,
  `prate` float NOT NULL,
  `lst_dt` date NOT NULL,
  `gst` float NOT NULL,
  `fest_status` varchar(100) NOT NULL,
  `doc` date NOT NULL,
  `meal` varchar(100) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fest_table`
--

INSERT INTO `fest_table` (`fest_id`, `fest`, `hotel_name`, `chk_in`, `chk_out`, `rooms`, `bed`, `prate`, `lst_dt`, `gst`, `fest_status`, `doc`, `meal`, `user_id`) VALUES
(1, 'Gandhi Jayanti', 'Mosaic Mussoorie', '2023-09-29', '2023-10-02', '6', '0', 0, '2023-08-05', 0, 'Inactive', '2023-07-17', 'MAP', 1),
(2, 'Diwali', 'Mosaic Mussoorie', '2023-11-10', '2023-11-20', '10', '0', 0, '2023-09-06', 0, 'Inactive', '2023-07-17', 'MAP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guest_table`
--

CREATE TABLE `guest_table` (
  `guest_name` varchar(100) NOT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(10) NOT NULL,
  `bed` varchar(10) NOT NULL,
  `child` varchar(250) NOT NULL,
  `meal` varchar(100) NOT NULL,
  `prate` float NOT NULL,
  `srate` float NOT NULL,
  `gst` float NOT NULL,
  `profit` float NOT NULL,
  `booking_status` varchar(50) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `doc` date DEFAULT NULL,
  `booking_id` int NOT NULL,
  `agent` varchar(50) NOT NULL,
  `sub_id` int NOT NULL,
  `source_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guest_table`
--

INSERT INTO `guest_table` (`guest_name`, `hotel_name`, `chk_in`, `chk_out`, `rooms`, `bed`, `child`, `meal`, `prate`, `srate`, `gst`, `profit`, `booking_status`, `user_id`, `doc`, `booking_id`, `agent`, `sub_id`, `source_name`) VALUES
('Monika', 'Ayar Jungle Resort ', '2023-08-07', '2023-08-14', '1', '0', '0', 'map', 125000, 150000, 18, 20500, 'Inactive', '3', '2023-08-14', 7, ' Classic Holidays', 0, ''),
('Aakash Parekh', 'Ramada Amritsar', '2023-08-14', '2023-08-15', '02', '0', '0', 'CPAI', 10500, 11500, 18, 820, 'Active', '3', '2023-08-14', 8, 'RM Travel', 0, ''),
('Nitin Wadhwa & Family', 'Khyber Himalayan Resort & Spa', '2023-08-11', '2023-08-13', '2', '0', '0', 'CPAI', 153400, 157400, 18, 3280, 'Active', '3', '2023-08-14', 9, ' journey bees', 0, ''),
('Nitin Wadhwa & Family', 'Kabo Resort', '2023-08-13', '2023-08-14', '2', '0', '0', 'CPAI', 24000, 26640, 18, 2164.8, 'Active', '3', '2023-08-14', 10, ' journey bees', 0, ''),
('Rajan Handa', 'Eden Resort & Spa ', '2023-08-01', '2023-08-02', '1', '0', '0', 'MAPAI', 10000, 12500, 18, 2050, 'Active', '3', '2023-08-14', 11, 'Tragoin', 0, ''),
('Rajan Handa', ' Vintage', '2023-08-02', '2023-08-04', '1', '0', '0', 'MAPAI', 30000, 31000, 18, 820, 'Active', '3', '2023-08-14', 12, 'Tragoin', 0, ''),
('Rajan Handa', 'Kabo Resort', '2023-08-04', '2023-08-05', '1', '0', '0', 'MAPAI', 14000, 15000, 18, 820, 'Active', '3', '2023-08-14', 13, 'Tragoin', 0, ''),
('Rajan Handa', 'Kabo Resort', '2023-08-04', '2023-08-05', '1', '0', '0', 'MAPAI', 14000, 15000, 18, 820, 'Inactive', '3', '2023-08-14', 14, 'Tragoin', 13, 'Direct'),
('Ramandeep Singh', 'Ayar Jungle Resort ', '2023-08-13', '2023-08-15', '2', '0', '0', 'MAPAI', 48000, 48000, 18, 0, 'Active', '3', '2023-08-14', 15, 'Northern Trips', 0, 'Direct'),
('Vinod Kumar Arya', 'Mosaic Mussoorie', '2023-08-12', '2023-08-13', '1', '0', '0', 'CPAI', 8400, 8800, 18, 328, 'Active', '3', '2023-08-14', 16, 'Tour Mantra', 0, ''),
('Gunjan Aneja', 'Mosaic Mussoorie', '2023-07-11', '2023-07-14', '1', '0', '0', 'CPAI', 21000, 27000, 18, 4920, 'Active', '3', '2023-08-16', 17, 'Direct Guest', 0, 'Direct'),
('Hariom mittal', 'PINE SPRING RESORT ', '2023-07-12', '2023-07-14', '5', '0', '0', 'CPAI', 84000, 91000, 18, 5740, 'Active', '3', '2023-08-16', 18, 'Dream Vacation', 0, 'Direct'),
('Manish Kumar Karia', 'Renest Haridwar', '2023-07-04', '2023-07-05', '1', '1', '0', 'MAPAI', 4000, 5750, 18, 1435, 'Active', '3', '2023-08-16', 19, 'Parikrama Holidays', 0, 'Direct'),
('Manish Kumar Karia', 'Divine Resort and SPA Rishikesh', '2023-07-05', '2023-07-07', '1', '1', '0', 'MAPAI', 26000, 32000, 18, 4920, 'Active', '3', '2023-08-16', 20, 'Parikrama Holidays', 0, 'Direct'),
('Manish Kumar Karia', 'Mosaic Mussoorie', '2023-07-09', '2023-07-10', '1', '1', '0', 'MAPAI', 10300, 12950, 18, 2173, 'Active', '3', '2023-08-16', 21, 'Parikrama Holidays', 20, 'Direct'),
('Arshanapally Vamsi Mohan Rao', 'ITC Hotels The Savoy Mussoorie', '2023-07-10', '2023-07-12', '6', '1', '0', 'CPAI', 247800, 250968, 18, 2597.76, 'Active', '3', '2023-08-16', 22, 'Travel Support Services', 0, 'Direct'),
('Arshanapally Vamsi Mohan Rao', 'Divine Resort and SPA Rishikesh', '2023-07-09', '2023-07-10', '6', '1', '0', 'CPAI', 57000, 66800, 18, 8036, 'Active', '3', '2023-08-16', 23, 'Travel Support Services', 0, 'Direct'),
('MOHAMMAD SHOYAB', 'Jakhoo Crest ', '2023-07-08', '2023-07-10', '5', '0', '0', 'MAPAI', 35000, 35000, 18, 0, 'Active', '3', '2023-08-16', 24, 'Direct Guest', 0, 'Direct'),
('Rohit Adhana', 'Jakhoo Crest ', '2023-07-08', '2023-07-09', '1 Triple', '0', '0', 'CPAI', 3700, 3700, 18, 0, 'Active', '3', '2023-08-16', 25, 'Direct Guest', 0, 'Direct'),
('Rishabh Singh', 'Jakhoo Crest ', '2023-07-09', '2023-07-10', '2', '0', '0', 'CPAI', 6000, 6000, 18, 0, 'Active', '3', '2023-08-16', 26, 'Direct Guest', 0, 'Direct'),
('Anuj bassi', 'Kamay Hospitality Pvt. Ltd.', '2023-07-07', '2023-07-09', '2', '0', '0', 'CPAI', 19200, 20800, 18, 1312, 'Active', '3', '2023-08-16', 27, 'Direct Guest', 0, 'Direct');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_table`
--

CREATE TABLE `hotel_table` (
  `hotel_id` int NOT NULL,
  `hname` varchar(100) NOT NULL,
  `location` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sperson` varchar(100) NOT NULL,
  `mobile_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gst_no` varchar(20) NOT NULL,
  `email_id` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sp_dob` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hotel_table`
--

INSERT INTO `hotel_table` (`hotel_id`, `hname`, `location`, `status`, `sperson`, `mobile_no`, `gst_no`, `email_id`, `sp_dob`) VALUES
(1, 'Divine Resort and SPA Rishikesh', 'Rishikesh', 'Active', 'Anil Gusain', '7900307777', ' 05AAICS2764A1ZN', 'info@divineresort.com', '1984-04-04'),
(2, 'Mosaic Mussoorie', 'Mussoorie', 'Active', 'Avadhesh Sharma', '8279475410', '05AAGCS8808K2ZY', 'ssm.mussoorie@mosaichotels.co.in', ''),
(3, 'Shervani Hilltop', 'Nainital', 'Active', 'Manoj Mathpal', '9999578443', '05AAACS0255Q1Z8', 'gmsales@shervanihotels.com', ''),
(4, 'Hotel Dhroov', 'Shimla', 'Active', 'Sachin Sood', '9805512476', '02AAOPV4309H3ZK', 'gm@hoteldhroov.com , reservations@hoteldhroov.com', ''),
(5, 'Jakhoo Crest ', 'Shimla', 'Active', 'Sukrant Sood', '8219400587', 'NIL', 'sukrant.sood5@gmail.com , info@thejakhoocrest.com', ''),
(6, 'Ayar Jungle Resort ', 'Nainital', 'Active', 'Mr HImanshu ', '8979201025', 'NIL', 'ayar@ayarjungleresort.com , gm@ayarjungleresort.com , rm@ayarjungleresort.com', ''),
(7, 'Exotic Places', 'Almedabad', 'Inactive', 'Niral Patel', '9227152530', '24AGXPP0976F1ZW', 'sales@exoticdays.org', '2023-07-17'),
(8, 'Radisson Kufri', '0km Milestone, Kufri - Fagu Highway, Shimla, Himachal Pradesh - 171012. ', 'Active', 'Kailash Lakhara', ' 9317298001', 'Nil', 'reservations.kufri@radisson.com', '2023-07-17'),
(9, 'Renest Dwarka', 'Nil', 'Active', 'Nil', 'Nil', 'Nil', 'Chawlajassi0008@yahoo.com', '2023-07-14'),
(10, 'Ramada Amritsar', 'Amritsar', 'Active', 'Mr Amit', '9654953180', 'NIL', 'reservations@ramadaamritsar.com , dilip@ramadaamritsar.com', ''),
(11, 'Khyber Himalayan Resort & Spa', 'Gulmarg Kashmir', 'Active', 'Aarif Wani', '7051403450', 'NIL', 'salesassociate.gulmarg@khyberhotels.com , salesassociate.gulmarg@khyberhotels.com', ''),
(12, 'The Kabo Luxury Boutique Hotel', 'Srinagar', 'Active', 'Ms. Faizul Manzoor', '91 1942313401', 'NIL', 'reservations@thekabo.com', ''),
(13, 'Eden Resort & Spa ', 'Pahalgam', 'Active', 'Ms Sabiya', '6006750327', 'NIL', 'info@edenresorts.in', ''),
(14, 'The Vintage Srinagar at Dal Lake', 'Srinagar', 'Active', 'Irshad Ahmad', '6006501993', 'NIL', 'reservations@thevintagesrinagar.com', ''),
(15, 'Renest Tirupati', 'Tirupati  Andhra Pradesh', 'Active', 'Mr Manish', '9711760905', 'NIL', 'kumar.manish@renesthotels.com', ''),
(16, 'Renest Haridwar', 'Haridwar', 'Active', 'Mr Manish', '9711760905', 'NIL', 'kumar.manish@renesthotels.com', ''),
(17, 'Badar Resort and Spa', 'Sonmarg Kashmir', 'Active', 'Ms. Benish Beigh', '7006338557', 'NIL', 'reservations@badarresorts.com', ''),
(18, 'Hotel Green Heights', 'Pahalgam', 'Active', 'Abid Bhat', '9797978007', 'NIL', 'info@hotelgreenheights.com', ''),
(19, 'Holiday Inn Amritsar ', 'Amritsar', 'Active', 'Bhupendra Bora', '9914610505', 'NIL', 'reservations@holidayinnamritsar.com , Bhupendra.Bora@ihg.com', ''),
(20, 'Club Mahindra', 'Naldhera', 'Active', 'Veronica Lal', '9971553693', 'NIL', 'Veronica.Lal@mahindraholidays.com', ''),
(21, 'Taj Ganges, Varanasi', 'Varanasi', 'Active', 'Mr Farman (FSR)', '8130691161', 'NIL', 'hotels@fsrtravels.com', ''),
(22, 'SS Resorts Dalhousie', 'Dalhousie', 'Active', 'Mr Negi ', '9810229464', 'NIL', 'bookssresort@gmail.com', ''),
(23, 'Lemon Tree Premier, Rishikesh', 'Rishikesh', 'Active', 'Mr Rishabh Kumar', '8588096269', 'NIL', 'sales7.ttdl@lemontreehotels.com', ''),
(24, 'Kabo Resort', 'Shri Nagar', 'Active', 'Shah Rida', '942473223', 'Nil', 'kashmir@urlaubholidays.com', '2023-08-14'),
(25, ' Vintage', 'Shri Nagar', 'Active', 'Aiman Ajaz', '942473223', 'Nil', 'kashmir@urlaubholidays.com', '2023-08-14'),
(26, 'PINE SPRING RESORT ', 'Pahalgam', 'Active', ' Naveen', '8715016333', 'Nil', ' info@hotelpinespring.com', '2023-08-16'),
(27, 'ITC Hotels The Savoy Mussoorie', 'Library Bazar, Gandhi Chowk,  PO Savoy, Mussoorie – 248179, Uttarakhand', 'Active', 'Devendra Bisht', ' 91-135-2637000 ', 'Nil', 'savoyreservations@savoyhotel.in     savoyreservations@savoyhotel.in     payables@savoyhotel.in', ''),
(28, 'Kamay Hospitality Pvt. Ltd.', '249, 2nd Floor, Vipul Trade Centre,  Sector-48, Sohna Road,  Gurugram - 122018 (Haryana)', 'Active', 'Sumit Kaushik  ', '9996006199 ', 'Nil', 'asm.delhi@kamayhotels.com     ', '2023-08-16'),
(29, 'Nibaana  Resort', 'Dharamshala', 'Active', 'Robin', 'Nil', 'Nil', 'reservations@nibaana.com', '2023-08-18'),
(30, 'The Golden Tusk', 'Jim Corbett National Park, Dhela, Ramnagar (Nainital) Uttarakhand 244715, India', 'Active', 'Nil', ' 7253000771', 'Nil', 'contact@thegoldentusk.com', '2023-08-18'),
(31, 'The Nesta Elements', 'Balera Road, near Panjpula, Dalhousie, Dalhousie, Himachal Pradesh, 176305, India', 'Active', 'Nil', '9711223341', '02AAICT4203F1ZW', ' info@thenestaelements.com', '2023-08-18'),
(32, 'Nature Vilas Sarovar', 'NatureVilas Sarovar Portico Manali  Naggar road Shuru | P.O. Prini | Manali- 175143 ', 'Active', 'Anil Kumar', '93170 39212', '02BFWPS1490E1Z8 ', ' nspm@sarovarhotels.com', '2023-08-18'),
(33, 'JW Marriott Mussoorie', 'Village Siya, Kempty Fall Road | Mussoorie, Uttarakhand  - 248179', 'Active', 'LOVEY GULATI', '7060211017', 'Nil', 'w.dedjw.reservations@marriotthotels.com       jw.dedjw.duty.mgr@marriotthotels.com', '2023-08-18'),
(34, 'Amaya Resort', 'Tehri Garhwal U.K', 'Active', 'Nil', '9089008900', '05ALTPP6067A1ZX', 'subodh@amayaresort.in', '2023-08-18'),
(35, 'Modi Yoga Retreat', '238, Virbhadra Road ,Rishikesh -249201', 'Active', 'Ajay Singh', '7302889020', '05AAATM1265H1ZU', ' fo@modiretreat.com        ajay.singh@modiretreat.com           arpit.goel@modiretreat.com', '2023-08-18'),
(36, 'Fortune Grace Resort', '(A Unit of Gopal Holidays Pvt. Ltd.) Library Bazaar, Gandhi Chowk Mussoorie - 248179.', 'Active', 'Sonu Pundir', '9520869011         9634093014', '05AAACB0086G1Z5 ', ' resortgrace@fortunehotels.in                    sales1.frg@fortunehotels.in', '2023-08-18'),
(37, 'Renest River country Manali', 'NH 3, Rangri, Manali, Distt. Kullu-175131 Himachal Pradesh, India.', 'Active', 'Sanjeev Thakur', '9816010005', 'Nil', 'kumar.manish@renesthotels.com         himanshu.rathee@renesthotels.com', '2023-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int NOT NULL,
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `cash` float NOT NULL,
  `bank` float NOT NULL,
  `hotel` float NOT NULL,
  `received_by` varchar(250) NOT NULL,
  `dor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `booking_id`, `user_id`, `cash`, `bank`, `hotel`, `received_by`, `dor`) VALUES
(1, 0, 3, 0, 0, 0, ' ', ' '),
(2, 0, 3, 0, 0, 0, ' ', ' '),
(3, 0, 3, 0, 0, 0, ' ', ' '),
(4, 0, 3, 0, 0, 0, ' ', ' '),
(5, 0, 3, 0, 0, 0, ' ', ' '),
(6, 0, 3, 0, 0, 0, ' ', ' '),
(7, 7, 3, 0, 0, 0, ' ', ' '),
(8, 8, 3, 0, 0, 0, ' ', ' '),
(9, 9, 3, 0, 0, 0, ' ', ' '),
(10, 10, 3, 0, 0, 0, ' ', ' '),
(11, 0, 3, 0, 0, 0, ' ', ' '),
(12, 0, 3, 0, 0, 0, ' ', ' '),
(13, 0, 3, 0, 0, 0, ' ', ' '),
(14, 0, 3, 0, 0, 0, ' ', ' '),
(15, 0, 3, 0, 0, 0, ' ', ' '),
(16, 16, 3, 0, 0, 0, ' ', ' '),
(17, 17, 3, 0, 0, 0, ' ', ' '),
(18, 0, 3, 0, 0, 0, ' ', ' '),
(19, 0, 3, 0, 0, 0, ' ', ' '),
(20, 0, 3, 0, 0, 0, ' ', ' '),
(21, 21, 3, 0, 0, 0, ' ', ' '),
(22, 0, 1, 0, 0, 0, ' ', ' '),
(23, 0, 3, 0, 0, 0, ' ', ' '),
(24, 24, 3, 0, 0, 0, ' ', ' '),
(25, 25, 3, 0, 0, 0, ' ', ' '),
(26, 26, 3, 0, 0, 0, ' ', ' '),
(27, 27, 1, 0, 0, 0, ' ', ' '),
(28, 0, 3, 0, 0, 0, ' ', ' '),
(29, 0, 1, 0, 0, 0, ' ', ' '),
(30, 0, 1, 0, 0, 0, ' ', ' '),
(31, 0, 3, 0, 0, 0, ' ', ' '),
(32, 0, 3, 0, 0, 0, ' ', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `prep_table`
--

CREATE TABLE `prep_table` (
  `prep_id` int NOT NULL,
  `hotel_name` varchar(250) NOT NULL,
  `chk_in` date NOT NULL,
  `chk_out` date NOT NULL,
  `rooms` varchar(250) NOT NULL,
  `bed` varchar(250) NOT NULL,
  `prate` float NOT NULL,
  `lst_dt` date NOT NULL,
  `gst` float NOT NULL,
  `prep_status` varchar(250) NOT NULL,
  `doc` date NOT NULL,
  `user_id` int NOT NULL,
  `meal` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `source_table`
--

CREATE TABLE `source_table` (
  `source_id` int NOT NULL,
  `source_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `gst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `source_table`
--

INSERT INTO `source_table` (`source_id`, `source_name`, `phone`, `address`, `city`, `status`, `email`, `gst`) VALUES
(1, 'test', 'test', 'test', 'test', 'Active', 'test', 'test'),
(2, 'Direct', 'Nil', 'Delhi', 'Delhi', 'Active', 'Nil', 'Nil'),
(3, 'Trip Kara De', '9997828099', ' Haldwani Road. Tallital, Nainital, Uttarakhand-263002', 'Nanital', 'Active', 'tripkaradehospitalitynainital@gmail.com', 'Nil'),
(4, 'ABR Hospitality', '8178560841, 9810903122', 'Delhi', 'Delhi', 'Active', ' info@abrhospitality.com', ' 07AHJPJ4352Q2ZS');

-- --------------------------------------------------------

--
-- Table structure for table `sub_pay`
--

CREATE TABLE `sub_pay` (
  `id` int NOT NULL,
  `pay_id` int NOT NULL,
  `booking_id` int NOT NULL,
  `user_id` int NOT NULL,
  `cash` varchar(250) NOT NULL,
  `bank` varchar(250) NOT NULL,
  `hotel` varchar(250) NOT NULL,
  `received_by` varchar(250) NOT NULL,
  `dor` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_pay`
--

INSERT INTO `sub_pay` (`id`, `pay_id`, `booking_id`, `user_id`, `cash`, `bank`, `hotel`, `received_by`, `dor`) VALUES
(1, 7, 7, 3, '0', '15000', '0', ' Tragoin', '2023-07-29'),
(2, 7, 7, 3, '0', '14000', '14000', 'Tragoin', '2023-07-29'),
(3, 7, 7, 3, '0', '29500', '29500', 'Tragoin', '2023-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user') NOT NULL,
  `user_status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'admin@gmail.com', '$2y$10$RLLZCXPya895uFIn1LyVOO2x2VhhYSP1z6yIZ/E7ab7fYJ2muTymy', 'ADMIN', 'master', 'Active'),
(2, 'info@khr.net.in', '$2y$10$9vb4luepQftPqrvn6K/wde7QXv3Ihh49OJdTkaiJJnbo.Gn1dz4nS', 'Robin', 'user', 'Active'),
(3, 'resv@khr.net.in', '$2y$10$UDNNQkNa335.6fSAcGp1f.gb5KyaC7PCrQIcicAHEteJ10aJYSkJ2', 'Vanshika', 'user', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_table`
--
ALTER TABLE `agent_table`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `fest_table`
--
ALTER TABLE `fest_table`
  ADD PRIMARY KEY (`fest_id`);

--
-- Indexes for table `guest_table`
--
ALTER TABLE `guest_table`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotel_table`
--
ALTER TABLE `hotel_table`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `prep_table`
--
ALTER TABLE `prep_table`
  ADD PRIMARY KEY (`prep_id`);

--
-- Indexes for table `source_table`
--
ALTER TABLE `source_table`
  ADD PRIMARY KEY (`source_id`);

--
-- Indexes for table `sub_pay`
--
ALTER TABLE `sub_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_table`
--
ALTER TABLE `agent_table`
  MODIFY `agent_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `fest_table`
--
ALTER TABLE `fest_table`
  MODIFY `fest_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guest_table`
--
ALTER TABLE `guest_table`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hotel_table`
--
ALTER TABLE `hotel_table`
  MODIFY `hotel_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `prep_table`
--
ALTER TABLE `prep_table`
  MODIFY `prep_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `source_table`
--
ALTER TABLE `source_table`
  MODIFY `source_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_pay`
--
ALTER TABLE `sub_pay`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
