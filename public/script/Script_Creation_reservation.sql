-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 04 déc. 2025 à 13:52
-- Version du serveur : 11.8.3-MariaDB-0+deb13u1 from Debian
-- Version de PHP : 8.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `razanateraa_mcd`
--

-- --------------------------------------------------------

--
-- Structure de la table `mcd_cache`
--

CREATE TABLE `mcd_cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_cache_locks`
--

CREATE TABLE `mcd_cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_categories`
--

CREATE TABLE `mcd_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `id_concours` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_categories`
--
DELIMITER $$
CREATE TRIGGER `mcd_categories_set_update_date` BEFORE UPDATE ON `mcd_categories` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_classer`
--

CREATE TABLE `mcd_classer` (
  `id_equipe` bigint(20) UNSIGNED NOT NULL,
  `id_categorie` bigint(20) UNSIGNED NOT NULL,
  `score_total` decimal(5,2) NOT NULL DEFAULT 0.00,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_classer`
--
DELIMITER $$
CREATE TRIGGER `mcd_classer_set_update_date` BEFORE UPDATE ON `mcd_classer` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_colleges`
--

CREATE TABLE `mcd_colleges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `adr_ligne_1` varchar(50) DEFAULT '',
  `adr_ligne_2` varchar(50) DEFAULT '',
  `adr_lieu` varchar(50) DEFAULT '',
  `adr_code_postal` varchar(10) DEFAULT '',
  `adr_ville` varchar(50) DEFAULT '',
  `adr_region` varchar(50) DEFAULT '',
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `code_pays` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_colleges`
--
DELIMITER $$
CREATE TRIGGER `mcd_colleges_set_update_date` BEFORE UPDATE ON `mcd_colleges` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_concours`
--

CREATE TABLE `mcd_concours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `date_debut` datetime NOT NULL DEFAULT current_timestamp(),
  `date_fin` datetime NOT NULL DEFAULT current_timestamp(),
  `actif` tinyint(1) NOT NULL DEFAULT 0,
  `en_cours` tinyint(1) NOT NULL DEFAULT 0,
  `equipe_min` tinyint(4) NOT NULL DEFAULT 2,
  `equipe_max` tinyint(4) NOT NULL DEFAULT 5,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_concours`
--
DELIMITER $$
CREATE TRIGGER `mcd_concours_set_update_date` BEFORE UPDATE ON `mcd_concours` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_engager`
--

CREATE TABLE `mcd_engager` (
  `id_utilisateur` bigint(20) UNSIGNED NOT NULL,
  `id_concours` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `id_role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_engager`
--
DELIMITER $$
CREATE TRIGGER `mcd_engager_set_update_date` BEFORE UPDATE ON `mcd_engager` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_epreuves`
--

CREATE TABLE `mcd_epreuves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `score_max` decimal(5,2) NOT NULL DEFAULT 10.00,
  `coefficient` float NOT NULL DEFAULT 1,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `id_concours` bigint(20) UNSIGNED NOT NULL,
  `id_categorie` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_epreuves`
--
DELIMITER $$
CREATE TRIGGER `mcd_epreuves_set_update_date` BEFORE UPDATE ON `mcd_epreuves` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_equipes`
--

CREATE TABLE `mcd_equipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `site` varchar(250) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `id_concours` bigint(20) UNSIGNED NOT NULL,
  `id_college` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_equipes`
--
DELIMITER $$
CREATE TRIGGER `mcd_equipes_set_update_date` BEFORE UPDATE ON `mcd_equipes` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_failed_jobs`
--

CREATE TABLE `mcd_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_genres`
--

CREATE TABLE `mcd_genres` (
  `code` char(1) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_genres`
--
DELIMITER $$
CREATE TRIGGER `mcd_genres_set_update_date` BEFORE UPDATE ON `mcd_genres` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_jobs`
--

CREATE TABLE `mcd_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_job_batches`
--

CREATE TABLE `mcd_job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_migrations`
--

CREATE TABLE `mcd_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_participer`
--

CREATE TABLE `mcd_participer` (
  `id_college` bigint(20) UNSIGNED NOT NULL,
  `id_concours` bigint(20) UNSIGNED NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_participer`
--
DELIMITER $$
CREATE TRIGGER `mcd_participer_set_update_date` BEFORE UPDATE ON `mcd_participer` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_password_reset_tokens`
--

CREATE TABLE `mcd_password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_pays`
--

CREATE TABLE `mcd_pays` (
  `code` varchar(5) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_pays`
--
DELIMITER $$
CREATE TRIGGER `mcd_pays_set_update_date` BEFORE UPDATE ON `mcd_pays` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_personal_access_tokens`
--

CREATE TABLE `mcd_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_roles`
--

CREATE TABLE `mcd_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_roles`
--
DELIMITER $$
CREATE TRIGGER `mcd_roles_set_update_date` BEFORE UPDATE ON `mcd_roles` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_scorer`
--

CREATE TABLE `mcd_scorer` (
  `id_secretaire` bigint(20) UNSIGNED NOT NULL,
  `id_equipe` bigint(20) UNSIGNED NOT NULL,
  `id_epreuve` bigint(20) UNSIGNED NOT NULL,
  `score` decimal(5,2) NOT NULL DEFAULT 0.00,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_scorer`
--
DELIMITER $$
CREATE TRIGGER `mcd_scorer_set_update_date` BEFORE UPDATE ON `mcd_scorer` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_sessions`
--

CREATE TABLE `mcd_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_statuts`
--

CREATE TABLE `mcd_statuts` (
  `code` char(1) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_statuts`
--
DELIMITER $$
CREATE TRIGGER `mcd_statuts_set_update_date` BEFORE UPDATE ON `mcd_statuts` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_users`
--

CREATE TABLE `mcd_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_users`
--
DELIMITER $$
CREATE TRIGGER `mcd_users_set_update_date` BEFORE UPDATE ON `mcd_users` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `mcd_utilisateurs`
--

CREATE TABLE `mcd_utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `classe` varchar(10) DEFAULT NULL,
  `commentaire` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `code_statut` char(1) NOT NULL,
  `code_genre` char(1) NOT NULL,
  `id_college` bigint(20) UNSIGNED DEFAULT NULL,
  `id_equipe` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déclencheurs `mcd_utilisateurs`
--
DELIMITER $$
CREATE TRIGGER `mcd_utilisateurs_set_update_date` BEFORE UPDATE ON `mcd_utilisateurs` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP()
$$
DELIMITER ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `mcd_cache`
--
ALTER TABLE `mcd_cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `mcd_cache_locks`
--
ALTER TABLE `mcd_cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `mcd_categories`
--
ALTER TABLE `mcd_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_concours` (`id_concours`);

--
-- Index pour la table `mcd_classer`
--
ALTER TABLE `mcd_classer`
  ADD PRIMARY KEY (`id_equipe`,`id_categorie`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `mcd_colleges`
--
ALTER TABLE `mcd_colleges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `code_pays` (`code_pays`);

--
-- Index pour la table `mcd_concours`
--
ALTER TABLE `mcd_concours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `mcd_engager`
--
ALTER TABLE `mcd_engager`
  ADD PRIMARY KEY (`id_utilisateur`,`id_concours`),
  ADD KEY `id_concours` (`id_concours`),
  ADD KEY `id_role` (`id_role`);

--
-- Index pour la table `mcd_epreuves`
--
ALTER TABLE `mcd_epreuves`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_concours` (`id_concours`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `mcd_equipes`
--
ALTER TABLE `mcd_equipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_concours` (`id_concours`),
  ADD KEY `id_college` (`id_college`);

--
-- Index pour la table `mcd_failed_jobs`
--
ALTER TABLE `mcd_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mcd_failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `mcd_genres`
--
ALTER TABLE `mcd_genres`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `mcd_jobs`
--
ALTER TABLE `mcd_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcd_jobs_queue_index` (`queue`);

--
-- Index pour la table `mcd_job_batches`
--
ALTER TABLE `mcd_job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mcd_migrations`
--
ALTER TABLE `mcd_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mcd_participer`
--
ALTER TABLE `mcd_participer`
  ADD PRIMARY KEY (`id_college`,`id_concours`),
  ADD KEY `id_concours` (`id_concours`);

--
-- Index pour la table `mcd_password_reset_tokens`
--
ALTER TABLE `mcd_password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `mcd_pays`
--
ALTER TABLE `mcd_pays`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `mcd_personal_access_tokens`
--
ALTER TABLE `mcd_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mcd_personal_access_tokens_token_unique` (`token`),
  ADD KEY `mcd_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `mcd_personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Index pour la table `mcd_roles`
--
ALTER TABLE `mcd_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Index pour la table `mcd_scorer`
--
ALTER TABLE `mcd_scorer`
  ADD PRIMARY KEY (`id_secretaire`,`id_equipe`,`id_epreuve`),
  ADD KEY `id_equipe` (`id_equipe`),
  ADD KEY `id_epreuve` (`id_epreuve`);

--
-- Index pour la table `mcd_sessions`
--
ALTER TABLE `mcd_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mcd_sessions_user_id_index` (`user_id`),
  ADD KEY `mcd_sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `mcd_statuts`
--
ALTER TABLE `mcd_statuts`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `mcd_users`
--
ALTER TABLE `mcd_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `mcd_utilisateurs`
--
ALTER TABLE `mcd_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code_statut` (`code_statut`),
  ADD KEY `code_genre` (`code_genre`),
  ADD KEY `id_college` (`id_college`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `mcd_categories`
--
ALTER TABLE `mcd_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_colleges`
--
ALTER TABLE `mcd_colleges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_concours`
--
ALTER TABLE `mcd_concours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_epreuves`
--
ALTER TABLE `mcd_epreuves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_equipes`
--
ALTER TABLE `mcd_equipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_failed_jobs`
--
ALTER TABLE `mcd_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_jobs`
--
ALTER TABLE `mcd_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_migrations`
--
ALTER TABLE `mcd_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_personal_access_tokens`
--
ALTER TABLE `mcd_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_roles`
--
ALTER TABLE `mcd_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mcd_users`
--
ALTER TABLE `mcd_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mcd_categories`
--
ALTER TABLE `mcd_categories`
  ADD CONSTRAINT `mcd_categories_ibfk_1` FOREIGN KEY (`id_concours`) REFERENCES `mcd_concours` (`id`);

--
-- Contraintes pour la table `mcd_classer`
--
ALTER TABLE `mcd_classer`
  ADD CONSTRAINT `mcd_classer_ibfk_1` FOREIGN KEY (`id_equipe`) REFERENCES `mcd_equipes` (`id`),
  ADD CONSTRAINT `mcd_classer_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `mcd_categories` (`id`);

--
-- Contraintes pour la table `mcd_colleges`
--
ALTER TABLE `mcd_colleges`
  ADD CONSTRAINT `mcd_colleges_ibfk_1` FOREIGN KEY (`code_pays`) REFERENCES `mcd_pays` (`code`);

--
-- Contraintes pour la table `mcd_engager`
--
ALTER TABLE `mcd_engager`
  ADD CONSTRAINT `mcd_engager_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `mcd_utilisateurs` (`id`),
  ADD CONSTRAINT `mcd_engager_ibfk_2` FOREIGN KEY (`id_concours`) REFERENCES `mcd_concours` (`id`),
  ADD CONSTRAINT `mcd_engager_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `mcd_roles` (`id`);

--
-- Contraintes pour la table `mcd_epreuves`
--
ALTER TABLE `mcd_epreuves`
  ADD CONSTRAINT `mcd_epreuves_ibfk_1` FOREIGN KEY (`id_concours`) REFERENCES `mcd_concours` (`id`),
  ADD CONSTRAINT `mcd_epreuves_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `mcd_categories` (`id`);

--
-- Contraintes pour la table `mcd_equipes`
--
ALTER TABLE `mcd_equipes`
  ADD CONSTRAINT `mcd_equipes_ibfk_1` FOREIGN KEY (`id_concours`) REFERENCES `mcd_concours` (`id`),
  ADD CONSTRAINT `mcd_equipes_ibfk_2` FOREIGN KEY (`id_college`) REFERENCES `mcd_colleges` (`id`);

--
-- Contraintes pour la table `mcd_participer`
--
ALTER TABLE `mcd_participer`
  ADD CONSTRAINT `mcd_participer_ibfk_1` FOREIGN KEY (`id_college`) REFERENCES `mcd_colleges` (`id`),
  ADD CONSTRAINT `mcd_participer_ibfk_2` FOREIGN KEY (`id_concours`) REFERENCES `mcd_concours` (`id`);

--
-- Contraintes pour la table `mcd_scorer`
--
ALTER TABLE `mcd_scorer`
  ADD CONSTRAINT `mcd_scorer_ibfk_1` FOREIGN KEY (`id_secretaire`) REFERENCES `mcd_utilisateurs` (`id`),
  ADD CONSTRAINT `mcd_scorer_ibfk_2` FOREIGN KEY (`id_equipe`) REFERENCES `mcd_equipes` (`id`),
  ADD CONSTRAINT `mcd_scorer_ibfk_3` FOREIGN KEY (`id_epreuve`) REFERENCES `mcd_epreuves` (`id`);

--
-- Contraintes pour la table `mcd_utilisateurs`
--
ALTER TABLE `mcd_utilisateurs`
  ADD CONSTRAINT `mcd_utilisateurs_ibfk_1` FOREIGN KEY (`id`) REFERENCES `mcd_users` (`id`),
  ADD CONSTRAINT `mcd_utilisateurs_ibfk_2` FOREIGN KEY (`code_statut`) REFERENCES `mcd_statuts` (`code`),
  ADD CONSTRAINT `mcd_utilisateurs_ibfk_3` FOREIGN KEY (`code_genre`) REFERENCES `mcd_genres` (`code`),
  ADD CONSTRAINT `mcd_utilisateurs_ibfk_4` FOREIGN KEY (`id_college`) REFERENCES `mcd_colleges` (`id`),
  ADD CONSTRAINT `mcd_utilisateurs_ibfk_5` FOREIGN KEY (`id_equipe`) REFERENCES `mcd_equipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
