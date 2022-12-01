-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 nov. 2021 à 18:37
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `club_ping`
--
CREATE DATABASE IF NOT EXISTS `club_ping` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `club_ping`;

-- --------------------------------------------------------

--
-- Structure de la table `adh`
--

CREATE TABLE `adh` (
  `id_adh` int(11) DEFAULT NULL,
  `code_adh` int(11) NOT NULL,
  `xp` int(11) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `photo_avatar` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adh`
--

INSERT INTO `adh` (`id_adh`, `code_adh`, `xp`, `birth_date`, `photo_avatar`) VALUES
(1, 1, NULL, '2021-11-01', 0x393430623232656461365f35303137303333345f636f64652d696e666f726d6174697175652e6a7067);

-- --------------------------------------------------------

--
-- Structure de la table `arbitre`
--

CREATE TABLE `arbitre` (
  `id_arbitre` int(11) DEFAULT NULL,
  `num_licence` int(11) NOT NULL,
  `formation` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `arbitre`
--

INSERT INTO `arbitre` (`id_arbitre`, `num_licence`, `formation`) VALUES
(1, 1, 0x393430623232656461365f35303137303333345f636f64652d696e666f726d6174697175652e6a7067);

-- --------------------------------------------------------

--
-- Structure de la table `balle`
--

CREATE TABLE `balle` (
  `id_balle` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `qualité` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `balle`
--

INSERT INTO `balle` (`id_balle`, `type`, `qualité`, `prix`) VALUES
(1, 'Balle pour débutant en silicone michelin', 1, 2),
(2, 'Balle yamahamt07 pour moyen', 2, 3),
(3, 'Balle plaqué or et diamant', 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `carte_bancaire`
--

CREATE TABLE `carte_bancaire` (
  `id_cb` int(11) NOT NULL,
  `num_carte` int(16) DEFAULT NULL,
  `code_cvc` int(3) DEFAULT NULL,
  `mois` int(2) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `nom_titulaire` varchar(48) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `carte_bancaire`
--

INSERT INTO `carte_bancaire` (`id_cb`, `num_carte`, `code_cvc`, `mois`, `annee`, `nom_titulaire`) VALUES
(1, 2147483647, 123, 1, 21, '1');

-- --------------------------------------------------------

--
-- Structure de la table `championnat`
--

CREATE TABLE `championnat` (
  `id_championnat` int(11) NOT NULL,
  `id_createur` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `nb_team` int(11) DEFAULT NULL,
  `recompense` varchar(255) DEFAULT NULL,
  `bonus_xp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

CREATE TABLE `coach` (
  `id_coach` int(11) DEFAULT NULL,
  `num_licence` int(11) NOT NULL,
  `formation` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`id_coach`, `num_licence`, `formation`) VALUES
(1, 1, 0x393430623232656461365f35303137303333345f636f64652d696e666f726d6174697175652e6a7067);

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `team_name` varchar(255) DEFAULT NULL,
  `participant_1` int(11) DEFAULT NULL,
  `participant_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `id_joueur` int(11) NOT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `id_reservation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `match_champ`
--

CREATE TABLE `match_champ` (
  `id_match_champ` int(11) NOT NULL,
  `id_champ` int(11) DEFAULT NULL,
  `id_equipe1` int(11) DEFAULT NULL,
  `id_equipe2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `match_ping`
--

CREATE TABLE `match_ping` (
  `id_match` int(11) NOT NULL,
  `id_domicile` int(11) DEFAULT NULL,
  `id_ext` int(11) DEFAULT NULL,
  `num_licence_arbitre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `non_adh`
--

CREATE TABLE `non_adh` (
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `raquette`
--

CREATE TABLE `raquette` (
  `id_raquette` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `qualité` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `raquette`
--

INSERT INTO `raquette` (`id_raquette`, `type`, `qualité`, `prix`) VALUES
(1, 'raquette en bambou sans manche', 1, 2),
(2, 'raquette en bambou avec un manche', 2, 3),
(3, 'Raquette haut de gamme avec climatisation et chauffage', 3, 5),
(4, 'c\'est ma raquette !', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `type` tinyint(1) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL,
  `id_terrain` int(11) DEFAULT NULL,
  `num_licence_arbitre` int(11) DEFAULT NULL,
  `num_licence_coach` int(11) DEFAULT NULL,
  `id_raquette` int(11) DEFAULT NULL,
  `id_balle` int(11) DEFAULT NULL,
  `id_table` int(11) DEFAULT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`type`, `id_utilisateur`, `date_reservation`, `id_terrain`, `num_licence_arbitre`, `num_licence_coach`, `id_raquette`, `id_balle`, `id_table`, `id_reservation`) VALUES
(0, 1, '2021-11-13', 3, 1, 1, NULL, 1, 1, 26),
(0, 1, '2021-11-13', 3, 1, 1, NULL, 1, 1, 27),
(0, 1, '2021-11-13', 3, 1, 1, NULL, 1, 1, 28);

-- --------------------------------------------------------

--
-- Structure de la table `score_match`
--

CREATE TABLE `score_match` (
  `id_match` int(11) DEFAULT NULL,
  `score_dom` int(11) DEFAULT NULL,
  `score_ext` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `score_match_champ`
--

CREATE TABLE `score_match_champ` (
  `id_match` int(11) DEFAULT NULL,
  `score_dom` int(11) DEFAULT NULL,
  `score_ext` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `table_ping`
--

CREATE TABLE `table_ping` (
  `id_table` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `qualité` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `table_ping`
--

INSERT INTO `table_ping` (`id_table`, `type`, `qualité`, `prix`) VALUES
(1, 'Debutant, joue sur le sol', 0, 2),
(2, 'Expert, table batman', 12, 3);

-- --------------------------------------------------------

--
-- Structure de la table `terrain`
--

CREATE TABLE `terrain` (
  `id_terrain` int(11) NOT NULL,
  `etat` tinyint(1) DEFAULT NULL,
  `num_terrain` int(11) DEFAULT NULL,
  `date_reservation` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `terrain`
--

INSERT INTO `terrain` (`id_terrain`, `etat`, `num_terrain`, `date_reservation`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL),
(3, 0, 3, NULL),
(4, 0, 4, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `utilisateur_first_name` varchar(255) DEFAULT NULL,
  `utilisateur_last_name` varchar(255) DEFAULT NULL,
  `utilisateur_email` varchar(255) DEFAULT NULL,
  `utilisateur_mdp` varchar(48) DEFAULT NULL,
  `utilisateur_admin` int(11) DEFAULT NULL,
  `id_cb` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `utilisateur_first_name`, `utilisateur_last_name`, `utilisateur_email`, `utilisateur_mdp`, `utilisateur_admin`, `id_cb`) VALUES
(1, '1', '1', '1@gmail.com', '1', 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adh`
--
ALTER TABLE `adh`
  ADD PRIMARY KEY (`code_adh`),
  ADD KEY `id_adh` (`id_adh`);

--
-- Index pour la table `arbitre`
--
ALTER TABLE `arbitre`
  ADD PRIMARY KEY (`num_licence`),
  ADD KEY `id_arbitre` (`id_arbitre`);

--
-- Index pour la table `balle`
--
ALTER TABLE `balle`
  ADD PRIMARY KEY (`id_balle`);

--
-- Index pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  ADD PRIMARY KEY (`id_cb`);

--
-- Index pour la table `championnat`
--
ALTER TABLE `championnat`
  ADD PRIMARY KEY (`id_championnat`),
  ADD KEY `id_createur` (`id_createur`);

--
-- Index pour la table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`num_licence`),
  ADD KEY `id_coach` (`id_coach`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `participant_1` (`participant_1`),
  ADD KEY `participant_2` (`participant_2`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`id_joueur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `match_champ`
--
ALTER TABLE `match_champ`
  ADD PRIMARY KEY (`id_match_champ`),
  ADD KEY `id_champ` (`id_champ`),
  ADD KEY `id_equipe1` (`id_equipe1`),
  ADD KEY `id_equipe2` (`id_equipe2`);

--
-- Index pour la table `match_ping`
--
ALTER TABLE `match_ping`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `id_domicile` (`id_domicile`),
  ADD KEY `id_ext` (`id_ext`),
  ADD KEY `num_licence_arbitre` (`num_licence_arbitre`);

--
-- Index pour la table `non_adh`
--
ALTER TABLE `non_adh`
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `raquette`
--
ALTER TABLE `raquette`
  ADD PRIMARY KEY (`id_raquette`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `date_reservatation` (`date_reservation`),
  ADD KEY `id_terrain` (`id_terrain`),
  ADD KEY `num_licence_arbitre` (`num_licence_arbitre`),
  ADD KEY `num_licence_coach` (`num_licence_coach`),
  ADD KEY `id_raquette` (`id_raquette`),
  ADD KEY `id_balle` (`id_balle`),
  ADD KEY `id_table` (`id_table`);

--
-- Index pour la table `score_match`
--
ALTER TABLE `score_match`
  ADD KEY `id_match` (`id_match`);

--
-- Index pour la table `score_match_champ`
--
ALTER TABLE `score_match_champ`
  ADD KEY `id_match` (`id_match`);

--
-- Index pour la table `table_ping`
--
ALTER TABLE `table_ping`
  ADD PRIMARY KEY (`id_table`);

--
-- Index pour la table `terrain`
--
ALTER TABLE `terrain`
  ADD PRIMARY KEY (`id_terrain`),
  ADD KEY `date_reservation` (`date_reservation`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD KEY `id_cb` (`id_cb`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adh`
--
ALTER TABLE `adh`
  MODIFY `code_adh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `balle`
--
ALTER TABLE `balle`
  MODIFY `id_balle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `carte_bancaire`
--
ALTER TABLE `carte_bancaire`
  MODIFY `id_cb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `championnat`
--
ALTER TABLE `championnat`
  MODIFY `id_championnat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `match_champ`
--
ALTER TABLE `match_champ`
  MODIFY `id_match_champ` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `match_ping`
--
ALTER TABLE `match_ping`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `raquette`
--
ALTER TABLE `raquette`
  MODIFY `id_raquette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `table_ping`
--
ALTER TABLE `table_ping`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `terrain`
--
ALTER TABLE `terrain`
  MODIFY `id_terrain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adh`
--
ALTER TABLE `adh`
  ADD CONSTRAINT `adh_ibfk_1` FOREIGN KEY (`id_adh`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `arbitre`
--
ALTER TABLE `arbitre`
  ADD CONSTRAINT `arbitre_ibfk_1` FOREIGN KEY (`id_arbitre`) REFERENCES `adh` (`code_adh`);

--
-- Contraintes pour la table `championnat`
--
ALTER TABLE `championnat`
  ADD CONSTRAINT `championnat_ibfk_1` FOREIGN KEY (`id_createur`) REFERENCES `coach` (`num_licence`);

--
-- Contraintes pour la table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`id_coach`) REFERENCES `adh` (`code_adh`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `equipe_ibfk_1` FOREIGN KEY (`participant_1`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `equipe_ibfk_2` FOREIGN KEY (`participant_2`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `match_champ`
--
ALTER TABLE `match_champ`
  ADD CONSTRAINT `match_champ_ibfk_1` FOREIGN KEY (`id_champ`) REFERENCES `championnat` (`id_championnat`),
  ADD CONSTRAINT `match_champ_ibfk_2` FOREIGN KEY (`id_equipe1`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `match_champ_ibfk_3` FOREIGN KEY (`id_equipe2`) REFERENCES `equipe` (`id_equipe`);

--
-- Contraintes pour la table `match_ping`
--
ALTER TABLE `match_ping`
  ADD CONSTRAINT `match_ping_ibfk_1` FOREIGN KEY (`id_domicile`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `match_ping_ibfk_2` FOREIGN KEY (`id_ext`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `match_ping_ibfk_3` FOREIGN KEY (`num_licence_arbitre`) REFERENCES `arbitre` (`num_licence`);

--
-- Contraintes pour la table `non_adh`
--
ALTER TABLE `non_adh`
  ADD CONSTRAINT `non_adh_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_terrain`) REFERENCES `terrain` (`id_terrain`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`num_licence_arbitre`) REFERENCES `arbitre` (`num_licence`),
  ADD CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`num_licence_coach`) REFERENCES `coach` (`num_licence`),
  ADD CONSTRAINT `reservation_ibfk_6` FOREIGN KEY (`id_raquette`) REFERENCES `raquette` (`id_raquette`),
  ADD CONSTRAINT `reservation_ibfk_7` FOREIGN KEY (`id_balle`) REFERENCES `balle` (`id_balle`),
  ADD CONSTRAINT `reservation_ibfk_8` FOREIGN KEY (`id_table`) REFERENCES `table_ping` (`id_table`);

--
-- Contraintes pour la table `score_match`
--
ALTER TABLE `score_match`
  ADD CONSTRAINT `score_match_ibfk_1` FOREIGN KEY (`id_match`) REFERENCES `match_ping` (`id_match`);

--
-- Contraintes pour la table `score_match_champ`
--
ALTER TABLE `score_match_champ`
  ADD CONSTRAINT `score_match_champ_ibfk_1` FOREIGN KEY (`id_match`) REFERENCES `match_champ` (`id_match_champ`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_cb`) REFERENCES `carte_bancaire` (`id_cb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
