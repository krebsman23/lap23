-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Feb 2021 um 17:24
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `web2`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `course`
--

CREATE TABLE `course` (
  `course_id` int(20) NOT NULL,
  `course` varchar(20) DEFAULT NULL,
  `internal_user_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `course`
--

INSERT INTO `course` (`course_id`, `course`, `internal_user_id`) VALUES
(0, 'Deutsch', '0'),
(1, 'Mathe', '1'),
(2, 'Englisch', '2');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `documents`
--

CREATE TABLE `documents` (
  `id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `path` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `documents`
--

INSERT INTO `documents` (`id`, `course_id`, `name`, `path`) VALUES
(1, 0, 'Deutsch PDF 1', '/web1/documents/deutsch_1.pdf'),
(2, 0, 'Deutsch PDF 2', '/web1/documents/deutsch_2.pdf'),
(3, 1, 'Mathe PDF 1', '/web1/documents/mathe_1.pdf'),
(4, 1, 'Mathe PDF 2', '/web1/documents/mathe_2.pdf'),
(5, 2, 'Englisch PDF 1', '/web1/documents/english_1.pdf'),
(6, 2, 'Englisch PDF 2', '/web1/documents/english_2.pdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(100) NOT NULL,
  `course_id` int(20) DEFAULT NULL,
  `user_role` int(1) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `course_id`, `user_role`, `password`, `user`, `email`, `postal_code`, `street`, `place`) VALUES
(1, 2, 0, 'test', 'Jonas', 'jonas.lorenz@gmail.com', '8430', 'Am Walde', 'Jabing'),
(2, 1, 0, 'test', 'Emma', 'emma.kaplan@gmail.com', '8430', 'Engelgasse 1', 'Gralla'),
(3, 0, 0, 'test', 'Fuad', 'fuad.farajov@gmail.com', '8430', 'Kasernenstraße 77', 'Graz'),
(4, 1, 0, 'test', 'moritz', 'moritz@gmail.com', '0000', 'Hausstraße', 'Maut'),
(5, NULL, 2, 'test', 'Admin', 'admin@gmail.com', '8430', 'Adminstraße', 'Linuxhausen'),
(6, 2, 1, 'test', 'Rainer', 'rainer@gmail.com', '8450', 'Rainerstraße', 'Rainhausen'),
(7, 0, 0, 'test', 'Harvey', 'harveymills@gmail.com', '6518', 'MHStreet', 'London'),
(8, 1, 0, 'test', 'Samu', 'samu.yt@gmail.com', '665555', 'Moritzstreet', 'Germandy'),
(9, 1, 1, 'test', 'Ash', 'ash5@gmail.com', '884477', 'Hausstraße', 'Köln');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indizes für die Tabelle `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
