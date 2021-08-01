-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 14 mai 2021 à 17:17
-- Version du serveur :  10.3.29-MariaDB
-- Version de PHP : 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `suricate`
--

-- --------------------------------------------------------

--
-- Structure de la table `computers`
--

CREATE TABLE `computers` (
  `computer_id` int(11) NOT NULL,
  `computer_name` varchar(200) NOT NULL,
  `computer_key` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `computers`
--

INSERT INTO `computers` (`computer_id`, `computer_name`, `computer_key`) VALUES
(1, 'unautreordinateur', '8fb560125db8e71eae2991a4103123266a52ecdd7f74b1999e2f32409ce62701'),
(2, 'jphi', '274a86f480f2d517c8ae9fcdcfa4ce5838eb8b38c664b8d92b7fd330e97c1141'),
(3, 'pc76', 'ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174');

-- --------------------------------------------------------

--
-- Structure de la table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_key` varchar(200) NOT NULL,
  `status_name` varchar(200) NOT NULL,
  `status_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status_data` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `status`
--

INSERT INTO `status` (`status_id`, `status_key`, `status_name`, `status_date`, `status_data`) VALUES
(1, 'sldkfjlskdgjh', 'lsdkjf', '2021-03-27 17:22:32', 'kljhkjh'),
(2, 'ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174', 'lsdkjf', '2021-03-27 17:23:45', 'kljhkjh'),
(3, 'ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174', 'pc76', '2021-03-27 17:45:25', '{\"key\":\"ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174\"}'),
(4, 'ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174', 'pc76', '2021-03-27 17:47:04', '{\"cn\":\"PC76\",\"fcn\":\"pc76\",\"d\":\"2021-03-27T17:47:04.3895789+01:00\",\"utc\":\"2021-03-27T16:47:04.3932Z\",\"key\":\"ff31035979b231cfca404bc4494152c705840804fb9bbe0de3c55c6453b3e174\",\"v\":1,\"s\":{\"setupD\":\"2019-12-07T10:14:52.1741279+01:00\"}}');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`) VALUES
(1, 'contact.alexrobert04@gmail.com', '$2y$10$XK1LuxMBaxWusQ6zxIHgeuF/QeN9SwB/VkOJ2kyRQijOI49DPbGKi'),
(2, 'jeanphilippe.hallot@gmail.com', '$2y$10$pJpaZlIxGfM2h0Wfh6i7t.xlAt/P4nZjhWtSCR.fwAvNjAP.WQNQe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`computer_id`),
  ADD UNIQUE KEY `computer_name` (`computer_name`);

--
-- Index pour la table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `computers`
--
ALTER TABLE `computers`
  MODIFY `computer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
