-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Apr 28, 2022 alle 15:15
-- Versione del server: 5.7.34
-- Versione PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RentAdvisor`
--
CREATE DATABASE IF NOT EXISTS `RentAdvisor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `RentAdvisor`;

-- --------------------------------------------------------

--
-- Struttura della tabella `Appartamento`
--

CREATE TABLE `Appartamento` (
  `titolo_annuncio` varchar(100) NOT NULL,
  `descrizione` varchar(700) NOT NULL,
  `id_annuncio` mediumint(9) NOT NULL,
  `data_inserimento_annuncio` date NOT NULL,
  `provincia` char(2) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `zona_di_localizzazione` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `numero_civico` varchar(6) NOT NULL,
  `piano` tinyint(3) UNSIGNED NOT NULL,
  `opzionato` tinyint(1) NOT NULL DEFAULT '0',
  `dimensioni_appartamento` tinyint(3) UNSIGNED NOT NULL,
  `tipologia` enum('appartamento','casa indipendente') NOT NULL,
  `numero_camere` tinyint(3) UNSIGNED NOT NULL,
  `numero_posti_letto_totali` tinyint(3) UNSIGNED NOT NULL,
  `numero_bagni` tinyint(3) UNSIGNED NOT NULL,
  `presenza_cucina` tinyint(1) NOT NULL DEFAULT '0',
  `presenza_locale_ricreativo` tinyint(1) NOT NULL DEFAULT '0',
  `ascensore` tinyint(1) NOT NULL DEFAULT '0',
  `fumatori` tinyint(1) NOT NULL DEFAULT '0',
  `parcheggio` tinyint(1) NOT NULL DEFAULT '0',
  `wi_fi` tinyint(1) NOT NULL DEFAULT '0',
  `canone_affitto` double(6,2) NOT NULL,
  `durata_minima_locazione` tinyint(3) UNSIGNED DEFAULT NULL,
  `genere_preferito` enum('M','F','ND') NOT NULL,
  `eta_preferita` tinyint(3) UNSIGNED DEFAULT NULL,
  `periodo_disponibilita_inizio` date NOT NULL,
  `periodo_disponibilita_fine` date NOT NULL,
  `username_locatore` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `FAQ`
--

CREATE TABLE `FAQ` (
  `domanda` varchar(200) NOT NULL,
  `risposta` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Locatario`
--

CREATE TABLE `Locatario` (
  `username` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `genere` enum('M','F','ND') NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(13) DEFAULT NULL,
  `psw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Locatore`
--

CREATE TABLE `Locatore` (
  `username` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(13) DEFAULT NULL,
  `psw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Messaggio`
--

CREATE TABLE `Messaggio` (
  `username_locatario` varchar(40) NOT NULL,
  `username_locatore` varchar(40) NOT NULL,
  `data_invio` datetime NOT NULL,
  `testo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Opzione`
--

CREATE TABLE `Opzione` (
  `username_locatore` varchar(40) NOT NULL,
  `username_locatario` varchar(40) NOT NULL,
  `id_appartamento` mediumint(9) NOT NULL,
  `id_posto_letto` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `Posto_Letto`
--

CREATE TABLE `Posto_Letto` (
  `titolo_annuncio` varchar(100) NOT NULL,
  `descrizione` varchar(700) NOT NULL,
  `id_annuncio` mediumint(9) NOT NULL,
  `data_inserimento_annuncio` date NOT NULL,
  `provincia` char(2) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `zona_di_localizzazione` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `numero_civico` varchar(6) NOT NULL,
  `piano` tinyint(3) UNSIGNED NOT NULL,
  `opzionato` tinyint(1) NOT NULL DEFAULT '0',
  `dimensioni_camera` tinyint(3) UNSIGNED NOT NULL,
  `tipologia` enum('singola','condivisa') NOT NULL,
  `letti_nella_camera` tinyint(3) UNSIGNED NOT NULL,
  `numero_posti_letto_totali` tinyint(3) UNSIGNED NOT NULL,
  `numero_bagni` tinyint(3) UNSIGNED NOT NULL,
  `disponibilita_angolo_studio` tinyint(1) NOT NULL DEFAULT '0',
  `ascensore` tinyint(1) NOT NULL DEFAULT '0',
  `fumatori` tinyint(1) NOT NULL DEFAULT '0',
  `parcheggio` tinyint(1) NOT NULL DEFAULT '0',
  `wi_fi` tinyint(1) NOT NULL DEFAULT '0',
  `canone_affitto` double(6,2) NOT NULL,
  `durata_minima_locazione` tinyint(3) UNSIGNED DEFAULT NULL,
  `genere_preferito` enum('M','F','ND') NOT NULL,
  `eta_preferita` tinyint(3) UNSIGNED DEFAULT NULL,
  `periodo_disponibilita_inizio` date NOT NULL,
  `periodo_disponibilita_fine` date NOT NULL,
  `username_locatore` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Appartamento`
--
ALTER TABLE `Appartamento`
  ADD PRIMARY KEY (`id_annuncio`),
  ADD KEY `username_locatore` (`username_locatore`);

--
-- Indici per le tabelle `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`domanda`);

--
-- Indici per le tabelle `Locatario`
--
ALTER TABLE `Locatario`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `Locatore`
--
ALTER TABLE `Locatore`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD PRIMARY KEY (`username_locatore`,`username_locatario`,`data_invio`),
  ADD KEY `Messaggio_ibfk_1` (`username_locatario`);

--
-- Indici per le tabelle `Opzione`
--
ALTER TABLE `Opzione`
  ADD PRIMARY KEY (`username_locatore`,`username_locatario`,`id_appartamento`,`id_posto_letto`),
  ADD KEY `username_locatario` (`username_locatario`),
  ADD KEY `id_appartamento` (`id_appartamento`),
  ADD KEY `id_posto_letto` (`id_posto_letto`);

--
-- Indici per le tabelle `Posto_Letto`
--
ALTER TABLE `Posto_Letto`
  ADD PRIMARY KEY (`id_annuncio`),
  ADD KEY `username_locatore` (`username_locatore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Appartamento`
--
ALTER TABLE `Appartamento`
  MODIFY `id_annuncio` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `Posto_Letto`
--
ALTER TABLE `Posto_Letto`
  MODIFY `id_annuncio` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Appartamento`
--
ALTER TABLE `Appartamento`
  ADD CONSTRAINT `Appartamento_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD CONSTRAINT `Messaggio_ibfk_1` FOREIGN KEY (`username_locatario`) REFERENCES `Locatario` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `Messaggio_ibfk_2` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Opzione`
--
ALTER TABLE `Opzione`
  ADD CONSTRAINT `opzione_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`),
  ADD CONSTRAINT `opzione_ibfk_2` FOREIGN KEY (`username_locatario`) REFERENCES `Locatario` (`username`),
  ADD CONSTRAINT `opzione_ibfk_3` FOREIGN KEY (`id_appartamento`) REFERENCES `Appartamento` (`id_annuncio`),
  ADD CONSTRAINT `opzione_ibfk_4` FOREIGN KEY (`id_posto_letto`) REFERENCES `Posto_Letto` (`id_annuncio`);

--
-- Limiti per la tabella `Posto_Letto`
--
ALTER TABLE `Posto_Letto`
  ADD CONSTRAINT `Posto_Letto_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Locatore` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
