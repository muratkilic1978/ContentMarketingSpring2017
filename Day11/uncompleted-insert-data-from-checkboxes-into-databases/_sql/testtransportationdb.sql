-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 06. 04 2017 kl. 07:05:46
-- Serverversion: 5.6.20
-- PHP-version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testtransportationdb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `transportation`
--

CREATE TABLE IF NOT EXISTS `transportation` (
`id` int(11) NOT NULL,
  `transportationtype` varchar(40) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Data dump for tabellen `transportation`
--

INSERT INTO `transportation` (`id`, `transportationtype`, `description`) VALUES
(1, 'Bus', 'A bus is a road vehicle designed to carry many passengers.'),
(2, 'Train', 'A train is a form of rail transport consisting of a series of vehicles that usually runs along a rail track to transport cargo or passengers.'),
(3, 'Aircraft', 'An aircraft are usually large and most often operated by airlines, intended for carrying multiple passengers or cargo in commercial service.'),
(4, 'Bicycle', 'A bicycle, often called a bike or cycle, is a human-powered, pedal-driven, single-track vehicle, having two wheels attached to a frame, one behind the other.'),
(5, 'Car', 'A car is a vehicle used to transport passengers.'),
(6, 'Ship', 'A ship is a vessel that transports cargo or carries passengers for hire.'),
(7, 'Skateboard', 'A skateboard is a type of sports equipment or toy used primarily for the activity of skateboarding.'),
(8, 'Electric car', 'An electric car is an automobile that is propelled by one or more electric motors, using electrical energy stored in rechargeable batteries or another energy storage device.');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`) VALUES
(1, 'Murat', 'Kilic'),
(2, 'Hanne', 'Moselund'),
(3, 'Karen', 'Dalgaard'),
(4, 'Simon', 'Jensen'),
(5, 'Kevin', 'Smith');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `usertransportation`
--

CREATE TABLE IF NOT EXISTS `usertransportation` (
`id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `transportation`
--
ALTER TABLE `transportation`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `usertransportation`
--
ALTER TABLE `usertransportation`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Userid` (`uid`), ADD KEY `fk_Transportationid` (`tid`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `transportation`
--
ALTER TABLE `transportation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Tilføj AUTO_INCREMENT i tabel `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `usertransportation`
--
ALTER TABLE `usertransportation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `usertransportation`
--
ALTER TABLE `usertransportation`
ADD CONSTRAINT `fk_Transportationid` FOREIGN KEY (`tid`) REFERENCES `transportation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Userid` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
