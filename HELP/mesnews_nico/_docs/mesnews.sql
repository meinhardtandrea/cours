-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 13 Décembre 2016 à 16:01
-- Version du serveur :  5.6.17
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mesnews`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `USER_ID` int(11) NOT NULL,
  `USER_NOM` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `USER_PWD` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_user`
--

INSERT INTO `t_user` (`USER_ID`, `USER_NOM`, `USER_PWD`) VALUES
(1, 'admin', 'admin'),
(2, 'user', 'user');

--
-- Structure de la table `t_categorie`
--

CREATE TABLE `t_categorie` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NOM` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_categorie`
--

INSERT INTO `t_categorie` (`CAT_ID`, `CAT_NOM`) VALUES
(1, 'Développement'),
(2, 'Système'),
(3, 'Internet');

-- --------------------------------------------------------

--
-- Structure de la table `t_news`
--

CREATE TABLE `t_news` (
  `NEWS_ID` int(11) NOT NULL,
  `NEWS_TITRE` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NEWS_CONTENU` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `CAT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `t_news`
--

INSERT INTO `t_news` (`NEWS_ID`, `NEWS_TITRE`, `NEWS_CONTENU`, `CAT_ID`) VALUES
(1, 'Le meilleur langage pour le développement cross-platform est-il le C++ ?', 'Lorsqu’il s’agit de développement mobile, les langages mis en avant pour\r\nla création d’applications multiplateformes sont couramment HTML et\r\nJavaScript.\r\nPour le développement natif, en fonction des écosystèmes, les développeurs\r\ns’orientent le plus souvent vers objective-c ou Java.\r\nPourtant, ceux qui cherchent à créer des applications cross-platform tout en\r\nbénéficiant d’une approche efficace pour la réduction des coûts peuvent\r\ntrouver leur bonheur au sein du C++.', 1),
(2, 'Bousculé par Google et Apple, Windows n\'anime plus qu\'un terminal sur\r\ncinq', 'Si Windows peut se vanter d\'être le système d\'exploitation le plus\r\nprésent sur les PC, il n\'en n\'est plus de même lorsque les calculs comparent\r\nl\'ensemble des terminaux. Microsoft n\'arrive alors qu\'en troisième position\r\naprès Google et Apple.', 2),
(3, 'Linux 3.7 sort en version stable', 'Près de deux mois après la sortie du noyau Linux 3.6, Linus Torvalds annonce\r\nla publication de la version stable de Linux 3.7, avec un nombre important de\r\nnouvelles fonctionnalités : support de multiples plateformes ARM, améliorations\r\nde Btrfs, Ext4, TCP Fast Open et IPv6', 2);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Index pour la table `t_news`
--
ALTER TABLE `t_news`
  ADD PRIMARY KEY (`NEWS_ID`),
  ADD KEY `fk_news_cat` (`CAT_ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_categorie`
--
ALTER TABLE `t_categorie`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_news`
--
ALTER TABLE `t_news`
  MODIFY `NEWS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `t_news`
--
ALTER TABLE `t_news`
  ADD CONSTRAINT `fk_news_cat` FOREIGN KEY (`CAT_ID`) REFERENCES `t_categorie` (`CAT_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
