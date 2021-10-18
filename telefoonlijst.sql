-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 19 Nov 2013 om 08:10
-- Serverversie: 5.5.8
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `telefoonlijst`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contacten`
--

CREATE TABLE IF NOT EXISTS `contacten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gebruikersnaam` varchar(30) NOT NULL,
  `wachtwoord` varchar(30) NOT NULL,
  `voornaam` varchar(30) NOT NULL,
  `tussenvoegsel` varchar(20) NOT NULL,
  `achternaam` varchar(30) NOT NULL,
  `extern` varchar(30) NOT NULL,
  `intern` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `recht` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `contacten`
--

INSERT INTO `contacten` (`id`, `gebruikersnaam`, `wachtwoord`, `voornaam`, `tussenvoegsel`, `achternaam`, `extern`, `intern`, `email`, `recht`) VALUES
(1, 'jlodeweges', 'qwerty', 'Jeanine', '', 'Lodeweges', '070-234325655', '3611', 'jlodeweges@cpe.com', 'medewerker'),
(2, 'dspaan', 'qwerty', 'Daphne', '', 'Spaan', '070-983526231', '4359', 'dspaan@ist.com', 'secretaresse'),
(3, 'akragt', 'qwerty', 'Alice', '', 'Kracht', '070-432892376', '3299', 'akragt@mco.com', 'medewerker'),
(4, 'kvos', 'qwerty', 'Karen', 'de', 'Vos', '070-239232564', '4588', 'kvos@bfd.com', 'medewerker'),
(5, 'pcoevorden', 'qwerty', 'Petra', 'van', 'Coevorden', '070-234454567', '3294', 'pcoevorden@bfd.com', 'medewerker'),
(6, 'cdijken', 'qwerty', 'Claudia', 'van', 'Dijken', '070-444555676', '2964', 'cdijken@so.com', 'medewerker');
