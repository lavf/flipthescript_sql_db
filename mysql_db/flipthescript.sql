-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Apr 2021 um 00:08
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Datenbank: `flipthescript`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `analysis`
--

CREATE TABLE `analysis` (
  `analysis_id` int(11) NOT NULL,
  `words_count` int(11) NOT NULL,
  `words_converted` int(11) DEFAULT NULL,
  `words_4bias` int(11) DEFAULT NULL,
  `ratio` decimal(11,3) DEFAULT NULL,
  `ratio_bias` decimal(11,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten f?r Tabelle `analysis`
--

INSERT INTO `analysis` (`analysis_id`, `words_count`, `words_converted`, `words_4bias`, `ratio`, `ratio_bias`) VALUES
(1, 279, 27, 11, '9.677', '3.943'),
(2, 504, 5, 3, '0.992', '0.595'),
(3, 401, 0, 0, '0.000', '0.000'),
(4, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `topic` varchar(25) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `analysis_id` int(11) NOT NULL,
  `grammar_id` int(11) NOT NULL,
  `rt_grammar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten f?r Tabelle `article`
--

INSERT INTO `article` (`id`, `author_id`, `url`, `title`, `date`, `topic`, `headline`, `analysis_id`, `grammar_id`, `rt_grammar_id`) VALUES
(1, 1, 'https://www.bbc.com/news/world-us-canada-55370919', 'US judge says parents owe son over trashed porn collection', '2020-12-18', 'local news', 'A US judge in Michigan has ruled that a 42-year-old man can seek compensation from his parents for destroying his pornography collection.', 1, 1, 1),
(2, 2, 'https://www.bbc.com/news/world-europe-55371102', 'Covid-19 pandemic: Sweden reverses face mask guidelines for public transport', '2020-12-18', 'health', 'Sweden\'s government is recommending wearing face masks on public transport during the rush hour, reversing its earlier Covid guidance.', 2, 2, 2),
(3, 3, 'https://www.dw.com/en/switzerland-same-sex-marriage-transgender-rights-move-a-step-forward/a-55994393', 'Switzerland: Same-sex marriage, transgender rights move a step forward', '2020-12-18', 'politics', 'Switzerland has lagged behind other Western European countries on LGBT+ rights. A progressive rights bill may still have to face a public vote before becoming law.', 3, 3, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `source_name` varchar(25) NOT NULL,
  `author_name` varchar(25) NOT NULL,
  `author_gender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten f?r Tabelle `author`
--

INSERT INTO `author` (`author_id`, `source_name`, `author_name`, `author_gender`) VALUES
(1, 'bbc news', 'bbc news', 'n'),
(2, 'bbc news', 'bbc news', 'n'),
(3, 'deutsche welle', 'reuters/afp', 'n'),
(4, '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `grammar`
--

CREATE TABLE `grammar` (
  `grammar_id` int(11) NOT NULL,
  `pers_pron_fem` int(11) DEFAULT NULL,
  `pers_pron_masc` int(11) DEFAULT NULL,
  `deter_pron_fem` int(11) DEFAULT NULL,
  `deter_pron_masc` int(11) DEFAULT NULL,
  `noun_fem` int(11) DEFAULT NULL,
  `noun_masc` int(11) DEFAULT NULL,
  `adj_conn_fem` int(11) DEFAULT NULL,
  `adj_conn_masc` int(11) DEFAULT NULL,
  `title_fem` int(11) DEFAULT NULL,
  `title_masc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten f?r Tabelle `grammar`
--

INSERT INTO `grammar` (`grammar_id`, `pers_pron_fem`, `pers_pron_masc`, `deter_pron_fem`, `deter_pron_masc`, `noun_fem`, `noun_masc`, `adj_conn_fem`, `adj_conn_masc`, `title_fem`, `title_masc`) VALUES
(1, 1, 4, 0, 11, 0, 4, 0, 0, 0, 7),
(2, 0, 2, 0, 0, 0, 1, 0, 0, 0, 2),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `rt_grammar`
--

CREATE TABLE `rt_grammar` (
  `rt_grammar_id` int(11) NOT NULL,
  `rt_pers_pron_fem` int(11) DEFAULT NULL,
  `rt_pers_pron_masc` int(11) DEFAULT NULL,
  `rt_deter_pron_fem` int(11) DEFAULT NULL,
  `rt_deter_pron_masc` int(11) DEFAULT NULL,
  `rt_noun_fem` int(11) DEFAULT NULL,
  `rt_noun_masc` int(11) DEFAULT NULL,
  `rt_adj_conn_fem` int(11) DEFAULT NULL,
  `rt_adj_conn_masc` int(11) DEFAULT NULL,
  `rt_title_fem` int(11) DEFAULT NULL,
  `rt_title_masc` int(11) DEFAULT NULL,
  `sum_rt_noun` int(11) DEFAULT NULL,
  `sum_rt_adj` int(11) DEFAULT NULL,
  `sum_rt_title` int(11) DEFAULT NULL,
  `sum_rt_global_bias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten f?r Tabelle `rt_grammar`
--

INSERT INTO `rt_grammar` (`rt_grammar_id`, `rt_pers_pron_fem`, `rt_pers_pron_masc`, `rt_deter_pron_fem`, `rt_deter_pron_masc`, `rt_noun_fem`, `rt_noun_masc`, `rt_adj_conn_fem`, `rt_adj_conn_masc`, `rt_title_fem`, `rt_title_masc`, `sum_rt_noun`, `sum_rt_adj`, `sum_rt_title`, `sum_rt_global_bias`) VALUES
(1, 4, 15, 0, 41, 0, 15, 0, 0, 0, 26, 15, 0, 26, 7),
(2, 0, 40, 0, 0, 0, 20, 0, 0, 0, 40, 20, 0, 40, 10),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur f?r Tabelle `test`
--

CREATE TABLE `test` (
  `id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `headline` varchar(255) DEFAULT NULL,
  `analysis_id` int(11) DEFAULT NULL,
  `grammar_id` int(11) DEFAULT NULL,
  `rt_grammar_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes f?r die Tabelle `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`analysis_id`);

--
-- Indizes f?r die Tabelle `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `analysis_id` (`analysis_id`),
  ADD KEY `grammar_id` (`grammar_id`),
  ADD KEY `rt_grammar_id` (`rt_grammar_id`);

--
-- Indizes f?r die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indizes f?r die Tabelle `grammar`
--
ALTER TABLE `grammar`
  ADD PRIMARY KEY (`grammar_id`);

--
-- Indizes f?r die Tabelle `rt_grammar`
--
ALTER TABLE `rt_grammar`
  ADD PRIMARY KEY (`rt_grammar_id`);

--
-- AUTO_INCREMENT f?r exportierte Tabellen
--

--
-- AUTO_INCREMENT f?r Tabelle `analysis`
--
ALTER TABLE `analysis`
  MODIFY `analysis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT f?r Tabelle `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT f?r Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT f?r Tabelle `grammar`
--
ALTER TABLE `grammar`
  MODIFY `grammar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT f?r Tabelle `rt_grammar`
--
ALTER TABLE `rt_grammar`
  MODIFY `rt_grammar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`analysis_id`) REFERENCES `analysis` (`analysis_id`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`grammar_id`) REFERENCES `grammar` (`grammar_id`),
  ADD CONSTRAINT `article_ibfk_4` FOREIGN KEY (`rt_grammar_id`) REFERENCES `rt_grammar` (`rt_grammar_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
