-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 14, 2022 at 03:02 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entrepriseinterim`
--

-- --------------------------------------------------------

--
-- Table structure for table `offres`
--

CREATE TABLE `offres` (
  `id` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `intitule` varchar(150) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `type_contrat` varchar(30) NOT NULL COMMENT 'CCD ou CDI ou Mission',
  `profil` varchar(100) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `presentation` text NOT NULL,
  `prerequis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `offres`
--

INSERT INTO `offres` (`id`, `id_entreprise`, `intitule`, `adresse`, `type_contrat`, `profil`, `duree`, `presentation`, `prerequis`) VALUES
(1, 4, 'stage ieufzih', '27 aihid', 'CDI', 'fzefzeve', '1 mois', 'zefez e', 'azdsda ezef'),
(2, 4, '', 'azd', 'CDI', 'zdaz', 'azda', 'azdaz', 'azdazd'),
(7, 2, 'ZECZ', 'Z', 'CDI', 'ZEDZ', 'DZ', 'ZEDZ', 'EECZ'),
(8, 2, 'frvr', '', 'CDI', 'refe', '', '', ''),
(9, 4, 'zdzz', 'dzd', 'CDI', 'dzdzd', 'zdz', 'zdzdz', 'dzdz'),
(10, 2, 'OUIoui', 'azd', 'CDI', 'sczc', '1 mois', 'zczc', 'zzsdd');

-- --------------------------------------------------------

--
-- Table structure for table `offres_candidat`
--

CREATE TABLE `offres_candidat` (
  `id_candidat` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `nom_entreprise` varchar(100) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_interim` int(11) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL COMMENT 'compris entre 1 et 2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Nom`, `Prenom`, `nom_entreprise`, `adresse`, `num_tel`, `email`, `num_interim`, `mdp`, `isAdmin`, `role`) VALUES
(1, 'eli', 'ELI', '', '27 rue des Patis', 781925696, 'ga@gmail.com', 766525, 'aqwzsxedc', 0, 1),
(2, '', '', 'zejfifeaj', '27 rue des Patis', 1922381723, 'fiaejeai@gmail.com', 0, 'AZERTYUI', 0, 2),
(3, 'eli', 'jiajgajg', '', '240 Bis Boulevard Saint Germain', 781925696, 'ahge@gmail.com', 288045, 'azedrft', 0, 1),
(4, '', '', 'Z', '12 dy zdd', 781925696, 'ad@gmail.com', 0, 'aqwzsxedc', 0, 2),
(5, 'Noe', 'Elise', '', '12 avenue truc', 921152637, 'zdzyu@gmail.com', 591124, 'AQWZSXEDCRF', 0, 1),
(6, 'okfoakoekfj', 'zdcc', '', '', 782911223, 'adf@gmail.com', 837094, 'AZEDRFTGH', 0, 1),
(8, 'ziuehf', 'aLIE', '', '23 AYE', 78221190, 'aiec@gmail.com', 682800, 'AUEYCVD ', 0, 1),
(9, 'ziuehf', 'aLIE', '', '23 AYE', 78221190, 'aieeec@gmail.com', 689288, 'iecuerhcevf', 0, 1),
(10, 'Z', 'Mich', '', '23 rue blabla', 781253647, 'eueudh@gmail.com', 165508, 'idneyauxs', 0, 1),
(11, 'Z', 'Mich', '', '23 rue blabla', 781253647, 'eid@gmail.com', 416105, 'frdzrtcs', 0, 1),
(12, 'Z', 'Mich', '', '23 rue blabla', 781253647, 'poziebdjuc@gmail.com', 266447, 'dicizieucje', 0, 1),
(13, 'groz', 'izi', '', '240 Bis Boulevard Saint Germain', 781925696, 'groszizi@gmail.com', 770020, 'azerty123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Indexes for table `offres_candidat`
--
ALTER TABLE `offres_candidat`
  ADD KEY `id_candidat` (`id_candidat`),
  ADD KEY `id_offre` (`id_offre`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `offres_candidat`
--
ALTER TABLE `offres_candidat`
  ADD CONSTRAINT `offres_candidat_ibfk_1` FOREIGN KEY (`id_candidat`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `offres_candidat_ibfk_2` FOREIGN KEY (`id_offre`) REFERENCES `offres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
