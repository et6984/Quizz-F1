-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 05 mars 2025 à 17:20
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `quizz`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `choice1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `choice2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `choice3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `choice4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correct` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `question`, `choice1`, `choice2`, `choice3`, `choice4`, `correct`) VALUES
(1, 'Qui détient le record du nombre de titres de champion du monde en F1 (égalité avec Michael Schumacher) ?', 'Max Verstappen', 'Lewis Hamilton', 'Juan Manuel Fangio', 'Ayrton Senna', 'Lewis Hamilton'),
(2, 'Quelle est l’écurie la plus titrée de l’histoire de la F1 ?', 'Mercedes', 'Ferrari', 'McLaren', 'Red Bull', 'Ferrari'),
(3, 'Quel circuit accueille traditionnellement le Grand Prix de Monaco ?', 'Circuit de Spa-Francorchamps', 'Circuit de Monza', 'Circuit de Monaco', 'Circuit de Silverstone', 'Circuit de Monaco'),
(4, 'En quelle année la première saison officielle de Formule 1 a-t-elle eu lieu ?', '1947', '1950', '1955', '1960', '1950'),
(5, 'Quelle équipe a dominé la saison 2023 en remportant la plupart des courses ?', 'Mercedes', 'Ferrari', 'Red Bull', 'McLaren', 'Red Bull'),
(6, 'Quel pilote a remporté son premier titre de champion du monde en 2021 après une bataille intense avec Lewis Hamilton ?', 'Max Verstappen', 'Charles Leclerc', 'Sebastian Vettel', 'Nico Rosberg', 'Max Verstappen'),
(7, 'Quel drapeau est agité pour signaler la fin d’une course ?', 'Drapeau rouge', 'Drapeau à damier', 'Drapeau bleu', 'Drapeau jaune', 'Drapeau à damier'),
(8, 'Quel moteur équipe actuellement les monoplaces Red Bull en 2024 ?', 'Mercedes', 'Honda (rebadgé Red Bull Powertrains)', 'Renault', 'Ferrari', 'Honda (rebadgé Red Bull Powertrains)'),
(9, 'Quel pays accueille le circuit de Suzuka, célèbre pour ses virages en \"S\" ?', 'Chine', 'Japon', 'Corée du Sud', 'Singapour', 'Japon'),
(10, 'Quel est le surnom du virage le plus emblématique du circuit de Spa-Francorchamps ?', 'Eau Rouge', 'Parabolica', 'Senna S', 'Ascari', 'Eau Rouge');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `der_score` int DEFAULT NULL,
  `meilleur_score` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `der_score`, `meilleur_score`) VALUES
(16, 'ET6984', 1, 7),
(17, 'Teach', 1, 6),
(18, 'Test Top 3', 1, 2),
(19, 'Test Limite', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
