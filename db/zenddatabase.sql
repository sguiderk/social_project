-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 05 Juin 2017 à 23:31
-- Version du serveur: 5.5.54-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `zenddatabase`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `newsid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `title`, `content`, `date`, `newsid`) VALUES
(1, 'zadadadzadaz', 'zadadadzadaz', '2017-02-06 16:28:08', 7),
(2, 'mon deuxiÃ¨me commentaire', 'mon deuxiÃ¨me commentaire', '2017-02-06 16:38:06', 7),
(3, 'mon 3 Ã©me commentaire', 'mon 3 Ã©me commentaire', '2017-02-06 17:04:42', 7),
(4, 'cqscsqcscsqcsq', 'cqscsqcscsqcsq', '2017-02-06 17:05:59', 8),
(5, 'dazdzadzadza', 'dazdzadzadza', '2017-02-06 17:07:56', 8),
(6, 'mon test', 'mon test', '2017-02-06 17:08:53', 8),
(7, 'test', 'test', '2017-02-06 17:11:39', 8),
(8, 'test comment', 'test comment', '2017-02-06 17:12:00', 8),
(9, 'test comment 2', 'test comment 2', '2017-02-06 17:12:13', 8),
(10, 'test comment 2', 'test comment 2', '2017-02-06 17:12:13', 8),
(11, 'test test', 'test test', '2017-02-06 17:25:44', 8),
(12, 'un ptit test voilÃ  bla bla ', 'un ptit test voilÃ  bla bla ', '2017-02-06 17:27:38', 7),
(13, 'test test ', 'test test ', '2017-02-06 17:27:46', 7),
(14, 'zafafafafaf', 'zafafafafaf', '2017-02-06 17:29:05', 17),
(15, 'Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ', 'Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque in ', '2017-02-06 17:29:29', 17),
(16, 'test test', 'test test', '2017-02-06 17:29:51', 17),
(17, 'un commentaire ', 'un commentaire ', '2017-02-06 17:33:11', 18),
(18, 'le deuxiÃ¨me commentaire', 'le deuxiÃ¨me commentaire', '2017-02-06 17:33:37', 18),
(19, 'voilÃ  ', 'voilÃ  ', '2017-02-06 17:35:46', 10),
(20, '123456', '123456', '2017-02-06 17:37:09', 10),
(21, '88484', '88484', '2017-02-06 17:40:43', 7),
(22, '789', '789', '2017-02-06 17:53:19', 10),
(23, '1777', '1777', '2017-02-07 09:50:47', 7),
(24, 'oihoihoi', 'oihoihoi', '2017-02-07 11:15:22', 7),
(25, '121212', '121212', '2017-02-07 11:16:05', 7),
(26, '121212', '121212', '2017-02-07 11:16:05', 7),
(27, 'pojpoj', 'pojpoj', '2017-02-09 12:11:34', 7);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `date`, `userid`) VALUES
(8, 'News 4', 'Nulla porttitor accumsan tincidunt. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Sed porttitor lectus nibh. Pr', '2017-02-02 09:50:32', 0),
(9, 'News 4', 'Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Vestib', '2017-02-02 09:59:01', 0),
(10, 'Voici l''actualitÃ© de sam.guid', 'dzamojdzalkd zapoidh zapoijd pazo dpzaoj dpozaj podzaj opdj zapdazdza azdaz', '2017-02-02 15:39:43', 0),
(11, 'ceci est une actu de test', 'bla bla bla ', '2017-02-02 15:57:37', 7),
(12, 'ceci est une actu de test', 'bla bla bla ', '2017-02-02 15:57:37', 7),
(13, 'bla bla bla', '1234556', '2017-02-02 15:58:45', 7),
(14, 'News 147', 'Ceci est une news publiÃ© par hamza 2', '2017-02-02 16:34:00', 3),
(15, 'test', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. ', '2017-02-03 11:19:09', 29),
(16, 'test', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. ', '2017-02-03 11:19:21', 29),
(17, 'dzadza', 'dzadzada', '2017-02-03 16:52:19', 29),
(18, 'une actus de test', 'Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Praesent sapien massa, convallis a pellentesque nec,Curabitur arcu erat, ', '2017-02-06 17:32:32', 28);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `pathimg` varchar(500) NOT NULL,
  `company` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created`, `pathimg`, `company`, `role`) VALUES
(3, 'hamza11', 'hamza3@email.com', '13456', '0000-00-00 00:00:00', ' ', '', 'user'),
(7, 'sam.guid1', 'samir.guiderk@gmail.com1', '123456', '0000-00-00 00:00:00', '9646141.jpg', '', 'user'),
(9, 'sam.guid2', 'samir.guiderk@gmail.com', '123456', '0000-00-00 00:00:00', '', '', 'user'),
(25, 'user_picture', 'user@picture.com', '123456', '0000-00-00 00:00:00', '', '', 'user'),
(28, 'samir_whit_picture', 'samir.guiderk@gmail.com', '123', '0000-00-00 00:00:00', 'photo samir.jpg', '', 'manager'),
(29, 'samir2', 'samir2@gmail.com', '123456', '0000-00-00 00:00:00', 'image_samir.jpg', '', 'user'),
(32, 'sam.guid1', 'samir.guiderk@gmail.com1', '1234561', '0000-00-00 00:00:00', 'image_samir.jpg', '', 'user'),
(33, 'adil', 'adil11@gmail.com', '123', '0000-00-00 00:00:00', 'logo-moovapps-community.png', '', 'user'),
(34, 'admin', 'admin@test.com', '123456', '0000-00-00 00:00:00', ' ', '', 'admin'),
(35, '1', '1', '1', '0000-00-00 00:00:00', '', '', 'user'),
(36, 'samir123', 'samir123@gmail.com', '123', '0000-00-00 00:00:00', 'avatar132.jpg', '', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
