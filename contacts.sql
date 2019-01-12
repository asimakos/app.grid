-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 12 Ιαν 2019 στις 15:42:23
-- Έκδοση διακομιστή: 5.6.17
-- Έκδοση PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση δεδομένων: `contacts`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `job` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `employer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Άδειασμα δεδομένων του πίνακα `people`
--

INSERT INTO `people` (`id`, `name`, `job`, `employer`, `address`, `email`, `phone`, `fax`, `mobile`, `state`) VALUES
(1, 'Αλεξόπουλος Βασίλειος', 'Υπάλληλος', 'Πυροσβεστική Ναυπλίου', '25ης Μαρτίου 4, 21100, Ναύπλιο', 'nafplio@psnet.gr', '(2752)-028282', '(2752)-027222', '(69)-36173387', 'Αργολίδα'),
(2, 'Καπουράλος Ανδρέας', 'Υπάλληλος', 'Πυροσβεστική Άργους', '1o χλμ. Άργους Κορίνθου, 21200, Άργος', 'argos@psnet.gr', '(2751)-066200', '(2751)-069650', '(69)-73357579', 'Αργολίδα');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
