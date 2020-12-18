-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 28 oct. 2020 à 10:15
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `feedparser`
--

-- --------------------------------------------------------

--
-- Structure de la table `fluxrss`
--

DROP TABLE IF EXISTS `fluxrss`;
CREATE TABLE IF NOT EXISTS `fluxrss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(70) NOT NULL,
  `flux` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fluxrss`
--

INSERT INTO `fluxrss` (`id`, `titre`, `flux`) VALUES
(1, 'Ordinateur quantique', 'https://news.google.fr/news/feeds?q=%22ordinateur+quantique&output=rss'),
(2, 'covid', 'https://news.google.fr/news/feeds?q=%22covid&output=rss');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titreRss` varchar(100) NOT NULL,
  `titre` text NOT NULL,
  `lien` text NOT NULL,
  `dateArticle` varchar(17) NOT NULL,
  `dateAjout` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `test`
--

INSERT INTO `test` (`id`, `titreRss`, `titre`, `lien`, `dateArticle`, `dateAjout`) VALUES
(60, 'covid', 'Covid-19 : la délicate estimation du nombre réel de nouveaux cas - Le Parisien', 'https://www.leparisien.fr/societe/covid-19-la-delicate-estimation-du-nombre-reel-de-nouveaux-cas-27-10-2020-8405277.php', '27 Oct 2020', '27 Oct 2020'),
(61, 'Ordinateur quantique', 'L\'ordinateur quantique gagne en puissance - Le Figaro', 'https://www.lefigaro.fr/sciences/l-ordinateur-quantique-gagne-en-puissance-20200929', '29 Sep 2020', '27 Oct 2020');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
