-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 29 Mars 2015 à 14:28
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `site1`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `nom` varchar(50) NOT NULL,
  `nombre_pers` int(3) NOT NULL,
  `devise` varchar(150) NOT NULL,
  `id_grp` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_grp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nom`, `nombre_pers`, `devise`, `id_grp`) VALUES
('Weedgang', 10, 'smoke smoke', 1),
('Tiffycrew', 20, 'Motherfucker', 2),
('ZacGang', 15, 'Yeaaaah', 3),
('ZacGang', 15, 'Yeaaaah', 4),
('ZacGang', 15, 'Yeaaaah', 5),
('ZacGang', 15, 'Yeaaaah', 6),
('ZacGang', 15, 'Yeaaaah', 7),
('ZacGang', 15, 'Yeaaaah', 8),
('ZacGang', 15, 'Yeaaaah', 9),
('ZacGang', 15, 'Yeaaaah', 10),
('ZacGang', 15, 'Yeaaaah', 11),
('ZacGang', 15, 'Yeaaaah', 12),
('ZacGang', 15, 'Yeaaaah', 13),
('ZacGang', 15, 'Yeaaaah', 14),
('ZacGang', 15, 'Yeaaaah', 15),
('ZacGang', 15, 'Yeaaaah', 16),
('ZacGang', 15, 'Yeaaaah', 17),
('JahGang', 20, 'smoke weed', 18),
('j', 1, 'l', 19),
('j', 1, 'l', 20),
('j', 1, 'l', 21),
('j', 1, 'l', 22),
('j', 1, 'l', 23),
('j', 1, 'l', 24),
('j', 1, 'l', 25),
('j', 1, 'l', 26),
('j', 1, 'l', 27),
('j', 1, 'l', 28),
('j', 1, 'l', 29),
('j', 1, 'l', 30),
('j', 1, 'l', 31),
('j', 1, 'l', 32),
('j', 1, 'l', 33),
('Kingston', 20, 'Jamming!', 34),
('Kingston', 20, 'Jamming!', 35),
('Kingston', 20, 'Jamming!', 36),
('Kingston', 20, 'Jamming!', 37),
('Kingston', 20, 'Jamming!', 38),
('Kingston', 20, 'Jamming!', 39),
('Kingston', 20, 'Jamming!', 40),
('Kingston', 20, 'Jamming!', 41),
('Kingston', 20, 'Jamming!', 42),
('Kingston', 20, 'Jamming!', 43),
('Kingston', 20, 'Jamming!', 44),
('Kingston', 20, 'Jamming!', 45),
('Kingston', 20, 'Jamming!', 46),
('Kingston', 20, 'Jamming!', 47),
('Kingston', 20, 'Jamming!', 48),
('Kingston', 20, 'Jamming!', 49),
('Kingston', 20, 'Jamming!', 50),
('Kingston', 20, 'Jamming!', 51),
('Kingston', 20, 'Jamming!', 52),
('Kingston', 20, 'Jamming!', 53),
('Kingston', 20, 'Jamming!', 54),
('Kingston', 20, 'Jamming!', 55),
('Kingston', 20, 'Jamming!', 56),
('Kingston', 20, 'Jamming!', 57),
('Kingston', 20, 'Jamming!', 58),
('Kingston', 20, 'Jamming!', 59),
('Kingston', 20, 'Jamming!', 60),
('Kingston', 20, 'Jamming!', 61),
('Kingston', 20, 'Jamming!', 62),
('Kingston', 20, 'Jamming!', 63),
('Kingston', 20, 'Jamming!', 64),
('Kingston', 20, 'Jamming!', 65),
('Kingston', 20, 'Jamming!', 66),
('Kingston', 20, 'Jamming!', 67),
('Kingston', 20, 'Jamming!', 68),
('Kingston', 20, 'Jamming!', 69),
('Kingston', 20, 'Jamming!', 70),
('Kingston', 20, 'Jamming!', 71),
('Kingston', 20, 'Jamming!', 72),
('Kingston', 20, 'Jamming!', 73),
('Kingston', 20, 'Jamming!', 74),
('Kingston', 20, 'Jamming!', 75),
('Kingston', 20, 'Jamming!', 76),
('Taylor', 15, 'Damn!', 77),
('ZacGang', 20, 'biatch', 78),
('grupe', 2, 'j', 79),
('GanjaShot', 3, 'smoke smoke', 80),
('GanjaShot', 3, 'smoke smoke', 81),
('GanjaShot', 3, 'smoke smoke', 82),
('GanjaShot', 3, 'smoke smoke', 83),
('GanjaShot', 3, 'smoke smoke', 84),
('GanjaShot', 3, 'smoke smoke', 85),
('WeWeed', 18, 'dla Weed dla Weed dla Weed', 86),
('ff', 1, 'd', 87),
('ff', 1, 'd', 88),
('aa', 2, 'aa', 89);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `nom_photo` varchar(255) NOT NULL,
  `pseudo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `pseudo` varchar(25) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `amour` varchar(100) NOT NULL,
  `locomotion` varchar(150) NOT NULL,
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`pseudo`, `mdp`, `email`, `age`, `ville`, `sexe`, `amour`, `locomotion`, `id`, `groupe`) VALUES
('Florian', '5837a359c1dee2122ea0adca53152c92b998bf54', '', 0, '', '', '', '', 1, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 2, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 3, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 4, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 5, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 6, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 7, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 8, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 9, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 10, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 11, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 12, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 13, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 14, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 15, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 16, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 17, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 18, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 19, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 20, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 21, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 22, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 23, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 24, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 25, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 26, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 27, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 28, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 29, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 30, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 31, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 32, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 33, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 34, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 35, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 36, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 37, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 38, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 39, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 40, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 41, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 42, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 43, ''),
('Tiffy', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 44, ''),
('blabla', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'floriandetoffol@yahoo.fr', 10, 'Chelles', 'Homme', 'En couple', 'Velo', 45, ''),
('RR', '06576556d1ad802f247cad11ae748be47b70cd9c', 'floriandetoffol@yahoo.fr', 22, 'xixi', 'Homme', 'En couple', 'Voiture', 46, ''),
('Tiffouille', '516b9783fca517eecbd1d064da2d165310b19759', '', 0, '', '', '', '', 47, ''),
('Tiffouille', '516b9783fca517eecbd1d064da2d165310b19759', '', 0, '', '', '', '', 48, ''),
('Pipouz', '3c363836cf4e16666669a25da280a1865c2d2874', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 49, ''),
('Ned-b', '5c2dd944dde9e08881bef0894fe7b22a5c9c4b06', 'nedb@yahoo.fr', 20, 'Lyon', 'Homme', 'Celibataire', 'Transport', 50, ''),
('Garcims', '6b0d31c0d563223024da45691584643ac78c96e8', '', 0, '', 'Homme', 'En couple', 'Voiture', 51, 'WeWeed'),
('stioof', 'a0f1490a20d0211c997b44bc357e1972deab8ae3', 'stioof@kk.fr', 20, 'Chelles', 'Homme', 'En couple', 'Pied', 52, ''),
('ll', '07c342be6e560e7f43842e2e21b774e61d85f047', 'a@a.fr', 18, 'Chelles', 'Homme', 'En couple', 'Voiture', 53, ''),
('lala', '07c342be6e560e7f43842e2e21b774e61d85f047', '', 0, '', '', '', '', 54, ''),
('biatch', 'd1854cae891ec7b29161ccaf79a24b00c274bdaa', 'biatch@weed.fr', 25, 'Las Vegas', 'Femme', 'Celibataire', 'Voiture', 55, ''),
('flooo', '4a0a19218e082a343a1b17e5333409af9d98f0f5', 'floriandetoffol@yahoo.fr', 21, 'Chelles', 'Homme', 'En couple', 'Voiture', 56, ''),
('mauritius', '5a1dc7909428b65e576a7190e0a26fbdefb8ed9b', 'jah@jah.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 57, ''),
('d', '3c363836cf4e16666669a25da280a1865c2d2874', '', 0, '', 'Homme', 'En couple', 'Voiture', 58, ''),
('BonMarley', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', 'marley@ganja.fr', 32, 'Kingston', 'Homme', 'En couple', 'Voiture', 59, 'Kingston'),
('WizKhalifa', '07c342be6e560e7f43842e2e21b774e61d85f047', 'wiz@wiz.fr', 25, 'miami', 'Homme', 'En couple', 'Voiture', 60, 'Taylor'),
('thotho', '7a81af3e591ac713f81ea1efe93dcf36157d8376', '', 0, '', 'Homme', 'En couple', 'Voiture', 61, 'ZacGang'),
('tiff', '8efd86fb78a56a5145ed7739dcb00c78581c5375', 'tiff@tiff.fr', 21, 'Chelles', 'Homme', 'Celibataire', 'Scooter', 62, 'grupe'),
('tifflax', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', '', 0, '', 'Homme', 'En couple', 'Voiture', 63, ''),
('Garcims', 'aff024fe4ab0fece4091de044c58c9ae4233383a', '', 0, '', 'Homme', 'En couple', 'Voiture', 64, 'WeWeed'),
('kk', '13fbd79c3d390e5d6585a21e11ff5ec1970cff0c', '', 0, '', 'Homme', 'En couple', 'Voiture', 65, 'ff'),
('aa', 'e0c9035898dd52fc65c41454cec9c4d2611bfb37', 'floriandetoffol@yahoo.fr', 20, 'Chelles', 'Homme', 'En couple', 'Voiture', 66, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
