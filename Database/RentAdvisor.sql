-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Creato il: Mag 12, 2022 alle 10:33
-- Versione del server: 5.7.34
-- Versione PHP: 7.2.34

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
-- Struttura della tabella `Annuncio`
--

CREATE TABLE `Annuncio` (
  `id` mediumint(9) NOT NULL,
  `username_locatore` varchar(40) NOT NULL,
  `titolo_annuncio` varchar(100) NOT NULL,
  `descrizione` varchar(700) NOT NULL,
  `data_inserimento_annuncio` date NOT NULL,
  `disponibile` tinyint(1) NOT NULL DEFAULT '1',
  `provincia` char(2) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cap` char(5) NOT NULL,
  `zona_di_localizzazione` varchar(50) DEFAULT NULL,
  `indirizzo` varchar(100) NOT NULL,
  `numero_civico` varchar(6) NOT NULL,
  `piano` tinyint(3) UNSIGNED NOT NULL,
  `numero_posti_letto_totali` tinyint(3) UNSIGNED NOT NULL,
  `numero_bagni` tinyint(3) UNSIGNED NOT NULL,
  `fumatori` tinyint(1) NOT NULL DEFAULT '0',
  `parcheggio` tinyint(1) NOT NULL DEFAULT '0',
  `wi_fi` tinyint(1) NOT NULL DEFAULT '0',
  `ascensore` tinyint(1) NOT NULL DEFAULT '0',
  `canone_affitto` double(6,2) NOT NULL,
  `durata_minima_locazione` tinyint(3) UNSIGNED DEFAULT NULL,
  `genere_preferito` enum('M','F','ND') NOT NULL,
  `eta_preferita_min` tinyint(3) UNSIGNED DEFAULT NULL,
  `eta_preferita_max` tinyint(3) UNSIGNED DEFAULT NULL,
  `periodo_disponibilita_inizio` date NOT NULL,
  `periodo_disponibilita_fine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Appartamento`
--

CREATE TABLE `Appartamento` (
  `id_annuncio` mediumint(9) NOT NULL,
  `numero_camere` tinyint(3) UNSIGNED NOT NULL,
  `dimensioni_appartamento` mediumint(8) UNSIGNED NOT NULL,
  `presenza_cucina` tinyint(1) NOT NULL DEFAULT '0',
  `presenza_locale_ricreativo` tinyint(1) NOT NULL DEFAULT '0',
  `tipologia` enum('Casa indipendente','Appartamento') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `FAQ`
--

CREATE TABLE `FAQ` (
  `id` tinyint(4) NOT NULL,
  `domanda` varchar(200) NOT NULL,
  `risposta` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Messaggio`
--

CREATE TABLE `Messaggio` (
  `username_locatore` varchar(40) NOT NULL,
  `username_locatario` varchar(40) NOT NULL,
  `data_invio` datetime NOT NULL,
  `testo` varchar(500) NOT NULL,
  `mittente` enum('Locatore','Locatario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Opzione_Annuncio`
--

CREATE TABLE `Opzione_Annuncio` (
  `username_locatario` varchar(40) NOT NULL,
  `id_annuncio` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Posto_Letto`
--

CREATE TABLE `Posto_Letto` (
  `id_annuncio` mediumint(9) NOT NULL,
  `dimensioni_camera` tinyint(3) UNSIGNED NOT NULL,
  `letti_nella_camera` tinyint(3) UNSIGNED NOT NULL,
  `presenza_angolo_studio` tinyint(1) NOT NULL DEFAULT '0',
  `tipologia` enum('Singola','Condivisa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struttura della tabella `Utente`
--

CREATE TABLE `Utente` (
  `username` varchar(40) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `genere` enum('M','F','ND') NOT NULL,
  `data_nascita` date NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` char(13) DEFAULT NULL,
  `psw` varchar(50) NOT NULL,
  `tipologia` enum('Locatore','Locatario','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username_locatore` (`username_locatore`);

--
-- Indici per le tabelle `Appartamento`
--
ALTER TABLE `Appartamento`
  ADD PRIMARY KEY (`id_annuncio`);

--
-- Indici per le tabelle `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD PRIMARY KEY (`username_locatore`,`username_locatario`,`data_invio`),
  ADD KEY `messaggio_ibfk_2` (`username_locatario`);

--
-- Indici per le tabelle `Opzione_Annuncio`
--
ALTER TABLE `Opzione_Annuncio`
  ADD PRIMARY KEY (`username_locatario`,`id_annuncio`),
  ADD KEY `id_annuncio` (`id_annuncio`);

--
-- Indici per le tabelle `Posto_Letto`
--
ALTER TABLE `Posto_Letto`
  ADD PRIMARY KEY (`id_annuncio`);

--
-- Indici per le tabelle `Utente`
--
ALTER TABLE `Utente`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `Annuncio`
--
ALTER TABLE `Annuncio`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `Annuncio`
--
ALTER TABLE `Annuncio`
  ADD CONSTRAINT `annuncio_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Utente` (`username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Appartamento`
--
ALTER TABLE `Appartamento`
  ADD CONSTRAINT `appartamento_ibfk_1` FOREIGN KEY (`id_annuncio`) REFERENCES `Annuncio` (`id`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Messaggio`
--
ALTER TABLE `Messaggio`
  ADD CONSTRAINT `messaggio_ibfk_1` FOREIGN KEY (`username_locatore`) REFERENCES `Utente` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `messaggio_ibfk_2` FOREIGN KEY (`username_locatario`) REFERENCES `Utente` (`username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Opzione_Annuncio`
--
ALTER TABLE `Opzione_Annuncio`
  ADD CONSTRAINT `opzione_annuncio_ibfk_1` FOREIGN KEY (`username_locatario`) REFERENCES `Utente` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `opzione_annuncio_ibfk_2` FOREIGN KEY (`id_annuncio`) REFERENCES `Annuncio` (`id`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `Posto_Letto`
--
ALTER TABLE `Posto_Letto`
  ADD CONSTRAINT `posto_letto_ibfk_1` FOREIGN KEY (`id_annuncio`) REFERENCES `Annuncio` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
