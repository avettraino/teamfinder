-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 05 Août 2015 à 20:42
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `teamfinder`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `nom` varchar(30) NOT NULL,
  `statut` varchar(10) NOT NULL,
  `devise` varchar(50) NOT NULL,
  `id_grp` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_grp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nom`, `statut`, `devise`, `id_grp`) VALUES
('Benzoo', '', 'OKLMposey', 1),
('oo', 'PrivÃ©', 'pp', 2),
('Canaa', 'Public', 'ee', 3),
('Briii', 'Prive', 'oklm', 4);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE IF NOT EXISTS `membre` (
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `amour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`pseudo`, `nom`, `prenom`, `mdp`, `age`, `ville`, `sexe`, `amour`) VALUES
('Tiffy', 'de toffol', 'florian', '5837a359c1dee2122ea0adca53152c92b998bf54', 0, 'chelles', 'Homme', 'Celibataire'),
('Guss', 'Durieu', 'Guillaume', '5837a359c1dee2122ea0adca53152c92b998bf54', 0, 'Chelles', 'Homme', 'En couple'),
('Nono', 'Aissaoui', 'Noe', '5837a359c1dee2122ea0adca53152c92b998bf54', 0, 'chelles', 'Homme', 'Celibataire'),
('Tifflax', 'de tofffol', 'florian', '5837a359c1dee2122ea0adca53152c92b998bf54', 0, 'chelles', 'Homme', 'Celibataire'),
('Alex', 'vettr', 'alex', '5837a359c1dee2122ea0adca53152c92b998bf54', 0, 'villpa', 'Homme', 'Celibataire'),
(',kekezkl', 'dldkl', 'zdejnen', '445dfa7a05967e28eaaec4150070eabc', 20, 'edez', 'Homme', 'Celibataire'),
('fffek', ';ld;l', 'ez,kk', '445dfa7a05967e28eaaec4150070eabc', 20, 'zd;lzdl;', 'Homme', 'Celibataire'),
('zef,kle,klfe', 'zad,kzdk', 'jdzj', '445dfa7a05967e28eaaec4150070eabc', 20, 'dk,', 'Homme', 'Celibataire'),
('Tiffouille', 'de toffol', 'Florian', '445dfa7a05967e28eaaec4150070eabc', 20, 'chelles', 'Homme', 'Celibataire'),
('zd,lkd', 'zd;lmzd', 'd,kl', '445dfa7a05967e28eaaec4150070eabc', 20, ';lfe', 'Homme', 'Celibataire'),
('ddzl;d', 'd;l', 'fel', '445dfa7a05967e28eaaec4150070eabc', 20, 'e;l', 'Homme', 'Celibataire'),
('Tiffff', 'de toffol', 'florian', '445dfa7a05967e28eaaec4150070eabc', 20, 'chelles', 'Homme', 'Celibataire'),
('bif', 'dth', 'flo', '445dfa7a05967e28eaaec4150070eabc', 20, 'Chelles', 'Homme', 'Celibataire'),
('Loulo', 'de toffol', 'florian', '445dfa7a05967e28eaaec4150070eabc', 20, 'Chelles', 'Homme', 'Celibataire'),
('mop', 'fty', 'fty', '445dfa7a05967e28eaaec4150070eabc', 20, 'Chelles', 'Homme', 'Celibataire'),
('oklm', 'jnjc', 'flo', '445dfa7a05967e28eaaec4150070eabc', 20, 'Chelles', 'Homme', 'En couple'),
('Tiffou', 'detof', 'flo', '445dfa7a05967e28eaaec4150070eabc', 20, 'Chelles', 'Homme', 'Celibataire');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
