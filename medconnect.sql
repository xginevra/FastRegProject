-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Jan 2024 um 20:39
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `medconnect`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `doctors`
--

CREATE TABLE `doctors` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `institution` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `password`, `email_address`, `first_name`, `last_name`, `institution`) VALUES
(21, 'de12345', '$2y$10$..gPgYAT7bsM0EHWoou.fuouPbTN9IUffBWYq74vIhHEkcLzE9ISW', 'muster@mann.com', 'Kevin', 'Bergmann', 'Clinic Bread');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `prevDiseases` varchar(1000) NOT NULL,
  `signsSymptoms` varchar(500) NOT NULL,
  `diagnosis` varchar(500) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `gender`, `address`, `zipcode`, `city`, `phone`, `prevDiseases`, `signsSymptoms`, `diagnosis`, `allergies`, `doctor_id`) VALUES
(1, 'Franziska Wojtkowski', 'Male', 'Fichtenweg 5', 84359, 'Simbach', 2147483647, 'none', '', '', '', NULL),
(8, 'Franziska Wojtkowski', 'Other', 'Fichtenweg 5', 84359, 'Simbach', 2147483647, 'none', '', '', 'Pollen', NULL),
(10, 'Franziska Wojtkowski', 'female', 'Fichtenweg 5', 84359, 'Simbach', 2147483647, 'none so far', '', '', 'Peanuts,Shellfish,Pollen', NULL),
(11, 'Easy', 'female', 'Balance', 666, 'Between', 666999, 'Mind and Body is never reached.', '', '', 'Pollen,No known allergy', NULL),
(18, 'Erica Doe', 'female', '', 0, '', 0, 'migraine', '', '', 'Array', 21),
(20, 'Erica Doe', '', 'Downing St 1', 84663, 'Boston', 5558741, 'nothing in particular', 'cough', '', 'Shellfish,Pollen', 21);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `fk_doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT für Tabelle `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `fk_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
