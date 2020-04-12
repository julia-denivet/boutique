-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 12 avr. 2020 à 23:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `boutique`
--
CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `boutique`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `comp_adresse` varchar(255) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `id_utilisateur`, `nom`, `prenom`, `adresse`, `comp_adresse`, `code_postal`, `ville`, `pays`) VALUES
(1, 6, 'Van Der MEIJDEN', 'Luc', '8 bd vert plan', '', 13009, 'Marseille', 'France'),
(7, 6, 'Van Der MEIJDEN', 'Luc', '8 bd vert plan', '', 13009, 'Marseille', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `name`, `id_parent`) VALUES
(1, 'Objectifs', 0),
(2, 'Appareils Photo', 0),
(3, 'Accessoires', 0),
(9, 'Canon', 2),
(10, 'Nikon', 2),
(12, 'Nikon', 1),
(13, 'Canon', 1),
(29, 'Peak Design', 3),
(30, 'Velbon', 3),
(32, 'Canon', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `numero_commande` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `prix` varchar(255) NOT NULL,
  `adresse_facturation` varchar(255) NOT NULL,
  `adresse_livraison` varchar(255) NOT NULL,
  `paiement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_utilisateur`, `numero_commande`, `date`, `prix`, `adresse_facturation`, `adresse_livraison`, `paiement`) VALUES
(8, 6, '6127222701', '2020-04-13 00:27:01', '21099,93', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Carte Bleue'),
(9, 6, '6127231541', '2020-04-13 01:15:41', '21099,93', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Paypal'),
(10, 6, '6127232905', '2020-04-13 01:29:05', '7299,99', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Van Der MEIJDEN\nLuc\n8 bd vert plan\n\n13009 Marseille\nFrance', 'Carte Bleue');

-- --------------------------------------------------------

--
-- Structure de la table `commande_produit`
--

CREATE TABLE `commande_produit` (
  `id` int(11) NOT NULL,
  `numero_commande` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` varchar(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande_produit`
--

INSERT INTO `commande_produit` (`id`, `numero_commande`, `nom`, `prix`, `quantite`) VALUES
(8, '6127222701', 'Canon 7D Mark II', '1299,99', 5),
(9, '6127222701', 'Canon EOS 1D X  Mark III', '7299,99', 2),
(10, '6127231541', 'Canon 7D Mark II', '1299,99', 5),
(11, '6127231541', 'Canon EOS 1D X  Mark III', '7299,99', 2),
(12, '6127232905', 'Canon EOS 1D X  Mark III', '7299,99', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` longtext NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `id_article`, `id_utilisateur`, `date`) VALUES
(1, 'ffsgfdgfsgf', 87, 6, '2020-04-12 00:15:43'),
(2, 'ffsgfdgfsgf', 87, 6, '2020-04-12 00:17:24'),
(3, 'cdcdscds', 88, 6, '2020-04-12 02:31:22'),
(4, 'qxsqxs', 88, 6, '2020-04-12 02:33:13'),
(5, 'cqcsq', 88, 6, '2020-04-12 02:34:11'),
(6, 'dscdds', 87, 6, '2020-04-12 03:07:08');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1337, 'Administrateur'),
(1, 'Utilisateur'),
(50, 'Modérateur\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_produit`) VALUES
(1, 88),
(2, 88),
(3, 87),
(4, 87);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `prix_ht` varchar(255) NOT NULL,
  `prix_ttc` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `img_folder` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix_ht`, `prix_ttc`, `stock`, `img_folder`, `img`, `id_categorie`, `id_sous_categorie`) VALUES
(88, 'Canon EOS 1D X  Mark III', 'La vie est ponctu&eacute;e d&#039;instants uniques. Immortalisez-les avec l&#039;EOS-1D X Mark III et racontez votre histoire en images au monde entier.\r\n\r\nLa photographie sans limites.\r\n\r\nLorsque les conditions sont difficiles, que la lumi&egrave;re ambiante est faible et que la pression monte, l&#039;EOS-1D X Mark III vous permet de prendre des photos impressionnantes avant la concurrence. Gr&acirc;ce &agrave; ses performances exceptionnelles en basse lumi&egrave;re, sa technologie d&#039;autofocus &agrave; base de Deep Learning et ses vid&eacute;os en RAW 5,5K, cet appareil est l&#039;outil de cr&eacute;ation ultime.\r\n\r\nUne vitesse et une r&eacute;activit&eacute; in&eacute;gal&eacute;es\r\n\r\nCertaines occasions ne se pr&eacute;sentent qu&#039;une seule fois. Elles disparaissent en une fraction de seconde, &agrave; jamais. Immortalisez-les pour toujours avec l&#039;EOS-1D X Mark III en capturant jusqu&#039;&agrave; 20 im./s.\r\n\r\nUn autofocus incroyablement intelligent\r\n\r\nPrenez des photos d&#039;une clart&eacute; et d&#039;une nettet&eacute; exceptionnelles. Les algorithmes d&#039;autofocus &agrave; base de Deep Learning reconnaissent tous les types de situations et suivent m&ecirc;me les visages cach&eacute;s derri&egrave;re des lunettes ou un casque.\r\n\r\nUne qualit&eacute; remarquable, m&ecirc;me dans des conditions difficiles\r\n\r\nLe processeur DIGIC X et le capteur de 20 millions de pixels sur mesure produisent de magnifiques r&eacute;sultats en basse lumi&egrave;re (ISO 102400 max., extensible jusqu&#039;&agrave; 819 200). L&#039;EOS-1D X Mark III offre &eacute;galement une plage dynamique exceptionnelle.\r\n\r\nL&#039;outil id&eacute;al pour r&eacute;aliser des vid&eacute;os\r\n\r\nL&#039;EOS-1D X Mark III s&#039;adapte &agrave; la plupart des flux de production de vid&eacute;o. Filmez des s&eacute;quences plein format en 4K 60p ou RAW 5,5K afin de multiplier vos possibilit&eacute;s cr&eacute;atives.\r\n\r\nRestez connect&eacute; et comp&eacute;titif\r\n\r\nQue vous travailliez dans un stade dot&eacute; d&#039;une connexion Ethernet ou transmettiez vos photos &agrave; livrer via Wi-Fi, l&#039;EOS-1D X Mark III vous permet de garder une longueur d&#039;avance sur la concurrence.\r\n\r\nD&eacute;veloppez votre cr&eacute;ativit&eacute;\r\n\r\nReprenant les meilleures qualit&eacute;s de nos reflex num&eacute;riques et de nos appareils photo hybrides, l&#039;EOS-1D X Mark III est con&ccedil;u pour &ecirc;tre r&eacute;sistant, fiable et intuitif, tout en restant le plus discret possible', '5839,99', '7299,99', 5, 'Image/Boutique/Canon EOS 1D X  Mark III', 'eos-1dx-mark-iii.png', 2, 9),
(87, 'Canon 7D Mark II', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum est sit amet ipsum dapibus, sit amet venenatis massa faucibus. Mauris nisi metus, molestie malesuada justo vitae, malesuada tempor orci. Nullam vitae risus vel augue vulputate posuere sit amet sit amet nisi. Quisque accumsan erat at felis luctus hendrerit. Donec vel libero convallis metus pretium ullamcorper a in eros. Phasellus eleifend purus purus, sit amet aliquet nunc accumsan efficitur. Maecenas sed mattis lectus. Nullam non eros leo. Aliquam erat volutpat. Duis pharetra pellentesque erat a laoreet. Sed aliquam at elit in sollicitudin. Cras rutrum non tortor quis ultrices. Vestibulum tortor turpis, lobortis nec ultrices ut, convallis eget diam. Ut pretium dapibus elit in lacinia. Etiam quis orci augue. Aenean ac auctor diam, in dapibus dolor.\r\n\r\n&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&eacute;&agrave;&agrave;&agrave;&ecirc;&acirc;\r\n\r\n\r\nDonec lacus ante, pellentesque vel malesuada ac, eleifend sit amet nisi. Nunc mollis, ligula non venenatis elementum, urna diam pulvinar odio, ut malesuada eros est nec lectus. Integer at arcu et quam condimentum rhoncus quis quis nibh. Integer sodales, justo eu efficitur pellentesque, tellus risus rutrum ex, id hendrerit magna massa vitae ante. Duis sed semper eros, eu venenatis turpis. Nulla vel accumsan nisl. Sed fringilla sapien varius, vestibulum tellus sed, sagittis orci. Maecenas ornare nisl nisi, nec rutrum ex hendrerit eget. Vestibulum dictum porta nisl, eget varius dolor maximus ut. Suspendisse potenti. Donec rutrum congue odio, sed vulputate velit. Nunc nec molestie dui, nec lacinia ex. Curabitur tincidunt libero risus, non rhoncus dui tincidunt nec. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate ante lectus, tempor rhoncus lacus volutpat eu. Proin nec augue elit.\r\n\r\nQuisque eleifend dapibus vulputate. In sodales mi lacus, in sodales velit viverra a. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc vestibulum blandit risus, ac sollicitudin nulla. Nulla ultricies vitae ante eu vehicula. Aenean placerat imperdiet purus non varius. Mauris ut nisl consequat, elementum justo a, tempor massa. Donec ornare libero lectus, eu rhoncus risus tincidunt vitae. Proin accumsan nulla non magna dictum sagittis. Aliquam et mauris nec ex eleifend maximus eu ut magna. Nulla ante est, maximus nec sollicitudin nec, bibendum ut diam. Mauris rutrum condimentum molestie. Nulla facilisi. Mauris risus dolor, mattis pharetra egestas eget, blandit non augue. Integer congue eros erat, sit amet vehicula diam blandit non. Aenean venenatis mattis nulla, at dictum ex hendrerit ac.', '1039,99', '1299,99', 5, 'Image/Boutique/Canon 7D Mark II', '616N44gQfrL._AC_SX466_.png', 2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `nom`, `prenom`, `email`, `id_droits`) VALUES
(1, 'julia-denivet', '$2y$10$SP0Mv2UCAKdG8XLQEjLoauPMeJTFv.Pb/QEAQT8iXQHlIuKOYNmXi', 'Denivet', 'Julia', 'julia.denivet@laplateforme.io', 1337),
(8, 'lvandermeijden', '$2y$10$vMq40giMf2chqJGByuWs8OKHySV2BIKO1EvaPYNs8m.sCgHyol/62', 'Van Der MEIJDEN', 'Luc', 'vadnderluc@icloud.com', 1),
(6, 'lucvandermeijden', '$2y$10$.x3C2P0Hu/m7XTppXQ/W4.xmOAcGg8lZu3RIQ5Egy.jLRZ1hLj9aC', 'Van Der MEIJDEN', 'Luc', 'vanderluc@icloud.com', 1337);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande_produit`
--
ALTER TABLE `commande_produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;