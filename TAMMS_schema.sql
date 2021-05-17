-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 04:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtamms`
--

-- --------------------------------------------------------

--
-- Structure for view `yearly_visitors`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `yearly_visitors`  AS  select `c`.`country_id` AS `country_id`,`c`.`country_code` AS `country_code`,`c`.`country_name` AS `country_name`,`l`.`landmark_id` AS `landmark_id`,`l`.`landmark_name` AS `landmark_name`,year(`v`.`visit_date`) AS `year`,sum(`vbc`.`number_of_visitors`) AS `total_visitors`,round(avg(`vbc`.`number_of_visitors`),2) AS `average` from (`countries` `c` left join ((`landmarks` `l` left join `visits` `v` on((`l`.`landmark_id` = `v`.`landmark_id`))) join `visit_by_country` `vbc` on((`v`.`visit_id` = `vbc`.`visit_id`))) on((`vbc`.`country_id` = `c`.`country_id`))) group by `l`.`landmark_id`,`c`.`country_id`,year(`v`.`visit_date`) order by `l`.`landmark_name`,`c`.`country_name`,year(`v`.`visit_date`) ;

--
-- VIEW  `yearly_visitors`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
