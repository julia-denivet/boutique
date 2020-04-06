-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 06 avr. 2020 à 12:32
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
(31, 'Canon', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` longtext NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, 89),
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

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_produit`, `id_utilisateur`, `quantite`) VALUES
(63, 57, 6, 1),
(62, 50, 6, 1),
(61, 33, 6, 1),
(75, 86, 6, 1),
(76, 84, 6, 1);

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
  `img_folder` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_sous_categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix_ht`, `prix_ttc`, `img_folder`, `img`, `id_categorie`, `id_sous_categorie`) VALUES
(88, 'Canon EOS 1D X  Mark III', 'La vie est ponctu&eacute;e d&#039;instants uniques. Immortalisez-les avec l&#039;EOS-1D X Mark III et racontez votre histoire en images au monde entier.<br />\r\n<br />\r\nLa photographie sans limites.<br />\r\n<br />\r\nLorsque les conditions sont difficiles, que la lumi&egrave;re ambiante est faible et que la pression monte, l&#039;EOS-1D X Mark III vous permet de prendre des photos impressionnantes avant la concurrence. Gr&acirc;ce &agrave; ses performances exceptionnelles en basse lumi&egrave;re, sa technologie d&#039;autofocus &agrave; base de Deep Learning et ses vid&eacute;os en RAW 5,5K, cet appareil est l&#039;outil de cr&eacute;ation ultime.<br />\r\n<br />\r\nUne vitesse et une r&eacute;activit&eacute; in&eacute;gal&eacute;es<br />\r\n<br />\r\nCertaines occasions ne se pr&eacute;sentent qu&#039;une seule fois. Elles disparaissent en une fraction de seconde, &agrave; jamais. Immortalisez-les pour toujours avec l&#039;EOS-1D X Mark III en capturant jusqu&#039;&agrave; 20 im./s.<br />\r\n<br />\r\nUn autofocus incroyablement intelligent<br />\r\n<br />\r\nPrenez des photos d&#039;une clart&eacute; et d&#039;une nettet&eacute; exceptionnelles. Les algorithmes d&#039;autofocus &agrave; base de Deep Learning reconnaissent tous les types de situations et suivent m&ecirc;me les visages cach&eacute;s derri&egrave;re des lunettes ou un casque.<br />\r\n<br />\r\nUne qualit&eacute; remarquable, m&ecirc;me dans des conditions difficiles<br />\r\n<br />\r\nLe processeur DIGIC X et le capteur de 20 millions de pixels sur mesure produisent de magnifiques r&eacute;sultats en basse lumi&egrave;re (ISO 102400 max., extensible jusqu&#039;&agrave; 819 200). L&#039;EOS-1D X Mark III offre &eacute;galement une plage dynamique exceptionnelle.<br />\r\n<br />\r\nL&#039;outil id&eacute;al pour r&eacute;aliser des vid&eacute;os<br />\r\n<br />\r\nL&#039;EOS-1D X Mark III s&#039;adapte &agrave; la plupart des flux de production de vid&eacute;o. Filmez des s&eacute;quences plein format en 4K 60p ou RAW 5,5K afin de multiplier vos possibilit&eacute;s cr&eacute;atives.<br />\r\n<br />\r\nRestez connect&eacute; et comp&eacute;titif<br />\r\n<br />\r\nQue vous travailliez dans un stade dot&eacute; d&#039;une connexion Ethernet ou transmettiez vos photos &agrave; livrer via Wi-Fi, l&#039;EOS-1D X Mark III vous permet de garder une longueur d&#039;avance sur la concurrence.<br />\r\n<br />\r\n<br />\r\nD&eacute;veloppez votre cr&eacute;ativit&eacute;<br />\r\n<br />\r\nReprenant les meilleures qualit&eacute;s de nos reflex num&eacute;riques et de nos appareils photo hybrides, l&#039;EOS-1D X Mark III est con&ccedil;u pour &ecirc;tre r&eacute;sistant, fiable et intuitif, tout en restant le plus discret possible.<br />\r\n<br />\r\n', '5839.99', '7299.99', 'Image/Boutique/Canon EOS 1D X  Mark III', 'eos-1dx-mark-iii.png', 2, 9),
(87, 'Canon 7D Mark II', 'La qu&ecirc;te du clich&eacute; parfait<br />\r\n<br />\r\nCon&ccedil;u pour les amateurs de vitesse. Soyez le premier &agrave; capturer le moment le plus significatif et &agrave; saisir les instants qui &eacute;chappent aux autres photographes. Que vous soyez branch&eacute; photos ou vid&eacute;os, vous aurez l&#039;occasion d&#039;exprimer votre cr&eacute;ativit&eacute; comme jamais auparavant.<br />\r\n<br />\r\nNe manquez rien de l&#039;action, m&ecirc;me la plus rapide<br />\r\n<br />\r\nImmortalisez le moment de votre choix, m&ecirc;me au c&oelig;ur de l&#039;action<br />\r\n<br />\r\nPrenez jusqu&#039;&agrave; 10 photos par seconde en rafale gr&acirc;ce aux fonctions d&#039;autofocus et d&#039;exposition automatique. La r&eacute;activit&eacute; des commandes de l&#039;appareil photo vous offre la possibilit&eacute; de capturer l&#039;instant souhait&eacute; &agrave; une fraction de seconde pr&egrave;s ; une m&eacute;moire tampon de grande capacit&eacute; vous permet de prendre des photos sans perte de performances.<br />\r\n<br />\r\nCapturez l&#039;instant pr&eacute;sent<br />\r\n<br />\r\nL&#039;EOS 7D Mark II s&#039;appuie sur deux processeurs d&#039;image &laquo; DIGIC 6 &raquo; pour offrir une grande r&eacute;activit&eacute;. Gr&acirc;ce au temps de d&eacute;calage minime lors des prises de vue, vous pouvez immortaliser chaque moment important avec une pr&eacute;cision in&eacute;gal&eacute;e.<br />\r\n<br />\r\nAutofocus large zone &agrave; 65 collimateurs<br />\r\n<br />\r\nPour une mise au point nette au cours de la prise de vue, les 65 collimateurs de l&#039;EOS 7D Mark II suivent les sujets se d&eacute;pla&ccedil;ant rapidement. Chaque collimateur, &laquo; de type crois&eacute; &raquo;*, peut se verrouiller sur un d&eacute;tail horizontal ou vertical avec rapidit&eacute; et pr&eacute;cision. Pour optimiser la prise de vue en basse lumi&egrave;re, le 7D Mark II peut effectuer la mise au point, m&ecirc;me &agrave; la lumi&egrave;re de la lune, lorsque la luminosit&eacute; n&#039;est que de -3 IL (valeurs d&#039;exposition).<br />\r\n<br />\r\n* Le nombre de collimateurs AF, de collimateurs de type crois&eacute; et de doubles collimateurs AF de type crois&eacute; disponibles d&eacute;pend de l&#039;objectif.<br />\r\n<br />\r\nS&eacute;lection du collimateur AF<br />\r\n<br />\r\nUtilisez tous les 65 collimateurs AF ensemble ou regroupez-les en zones amovibles pour cadrer des sujets excentr&eacute;s. Vous pouvez &eacute;galement avoir recours &agrave; un seul collimateur AF pour effectuer une mise au point pr&eacute;cise sur une partie sp&eacute;cifique de la sc&egrave;ne.<br />\r\n<br />\r\nMise au point iTR avanc&eacute;e<br />\r\n<br />\r\nLe syst&egrave;me de mise au point iTR AF de l&#039;EOS 7D Mark II utilise les informations relatives aux couleurs et aux visages pour identifier et suivre les sujets qui se d&eacute;placent &agrave; l&#039;int&eacute;rieur du cadre. La r&eacute;activit&eacute; de l&#039;AF peut &ecirc;tre personnalis&eacute;e &agrave; l&#039;aide d&#039;un outil simple qui ajuste le suivi en fonction de l&#039;environnement de prise de vue et du sujet, de sorte que les autres objets passant bri&egrave;vement devant ce dernier n&#039;affectent pas la mise au point.<br />\r\n<br />\r\nImpressions de qualit&eacute; professionnelle<br />\r\n<br />\r\nQue vous soyez sp&eacute;cialis&eacute; dans les photos d&#039;animaux sauvages, de sports motoris&eacute;s ou d&#039;environnements urbains, le nouveau capteur de 20,2 millions de pixels produit des images que vous pourriez exposer avec fiert&eacute;. M&ecirc;me en basse lumi&egrave;re, l&#039;EOS 7D Mark II r&eacute;alise des photos et des vid&eacute;os riches en d&eacute;tails.', '1039.99', '1299.99', 'Image/Boutique/Canon 7D Mark II', '616N44gQfrL._AC_SX466_.png', 2, 9),
(89, 'Canon EOS 6D  Mark II', 'Que vous souhaitiez entreprendre des projets plus ambitieux ou faire de la photo votre m&eacute;tier, le EOS 6D Mark II vous offre tout ce dont vous avez besoin pour franchir le cap<br />\r\n<br />\r\nVos prochaines &eacute;tapes cr&eacute;atives<br />\r\n<br />\r\nLes portraitistes adoreront la faible profondeur de champ offerte par le capteur plein format du EOS 6D Mark II, ainsi que sa capacit&eacute; &agrave; capturer les expressions fugaces &agrave; 6,5 im./s. Pour les photos de paysages, le capteur de 26,2 millions de pixels capture des images riches en d&eacute;tails et la plage dynamique produit des photos &agrave; la profondeur et &agrave; la clart&eacute; extr&ecirc;mement r&eacute;alistes.<br />\r\n<br />\r\nUne mise au point pr&eacute;cise pour une nettet&eacute; in&eacute;gal&eacute;e<br />\r\n<br />\r\nL&#039;autofocus avanc&eacute; utilise 45 collimateurs de type crois&eacute; pour effectuer une mise au point avec une extr&ecirc;me pr&eacute;cision, m&ecirc;me dans un environnement aussi obscur qu&#039;un clair de lune. Prenez vos photos en toute s&eacute;r&eacute;nit&eacute; lorsque vous utilisez une faible profondeur de champ et suivez le mouvement des sujets qui se d&eacute;placent dans le cadre.<br />\r\n<br />\r\nVotre fen&ecirc;tre sur le monde<br />\r\n<br />\r\nLe grand viseur &agrave; pentaprisme du EOS 6D Mark II vous aide &agrave; voir clairement ce qui vous entoure, &agrave; tisser des liens naturels avec vos sujets et &agrave; prendre des photos de fa&ccedil;on plus instinctive.<br />\r\n<br />\r\nComposition sous tous les angles<br />\r\n<br />\r\nPrenez en toute simplicit&eacute; des photos depuis des angles bas ou hauts dans les grands espaces, gr&acirc;ce &agrave; l&#039;&eacute;cran orientable du EOS 6D Mark II, qui pivote et se tourne dans toutes les directions. Essayez de l&#039;utiliser au niveau de la taille pour r&eacute;aliser des portraits plus naturels.<br />\r\n<br />\r\nLe GPS int&eacute;gr&eacute; suit chacun de vos mouvements<br />\r\n<br />\r\nG&eacute;olocalisez chacune de vos photos en indiquant votre emplacement actuel, o&ugrave; que vous vous trouviez dans le monde. Cette fonction se r&eacute;v&egrave;le int&eacute;ressante pour retracer votre parcours en vue d&#039;une reconnaissance, ou &eacute;crire des l&eacute;gendes pr&eacute;cises pour d&eacute;crire votre p&eacute;riple.<br />\r\n<br />\r\nCon&ccedil;u pour &ecirc;tre utilis&eacute; avec votre smartphone ou votre tablette<br />\r\n<br />\r\nLe EOS 6D Mark II utilise la technologie Bluetooth&reg; pour &eacute;tablir une connexion Wi-Fi avec votre smartphone ou votre tablette en toute simplicit&eacute;. Parcourez et s&eacute;lectionnez les images sur l&#039;&eacute;cran de votre p&eacute;riph&eacute;rique, puis partagez-les avec vos amis. Votre p&eacute;riph&eacute;rique peut &eacute;galement servir de t&eacute;l&eacute;commande, y compris en mode vis&eacute;e par l&#039;&eacute;cran.<br />\r\n<br />\r\nApplication Mon Coach Photo Canon<br />\r\n<br />\r\nId&eacute;ale pour tous les conteurs visuels, notre application Mon Coach Photo Canon vous donne acc&egrave;s &agrave; des informations et du contenu sur mesure et de haut niveau quand vous en avez le plus besoin. Vous allez pouvoir donner vie &agrave; vos histoires.<br />\r\n<br />\r\nVid&eacute;os cin&eacute;matographiques Full HD<br />\r\n<br />\r\nR&eacute;alisez de superbes vid&eacute;os Full HD gr&acirc;ce &agrave; l&#039;effet de faible profondeur de champ caract&eacute;ristique de la vid&eacute;o professionnelle. Le mode autofocus CMOS Dual Pixel s&#039;ajuste en toute transparence pour conserver la nettet&eacute; des objets sans changement de mise au point brusque et g&ecirc;nant. Par ailleurs, le stabilisateur d&#039;image num&eacute;rique &agrave; 5 axes int&eacute;gr&eacute; fluidifie les mouvements ind&eacute;sirables de l&#039;appareil photo.<br />\r\n<br />\r\nCet appareil photo vous permet de r&eacute;aliser des vid&eacute;os Time-Lapse 4K en capturant le mouvement des sc&egrave;nes lentes avec un niveau de d&eacute;tail exceptionnel.', '1199.99', '1499.99', 'Image/Boutique/Canon EOS 6D  Mark II', 'Reflex-Canon-EOS-6D-Mark-II-Boitier-Nu-Noir.png', 2, 9);

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
(6, 'lucvandermeijden', '$2y$10$.x3C2P0Hu/m7XTppXQ/W4.xmOAcGg8lZu3RIQ5Egy.jLRZ1hLj9aC', 'Van Der MEIJDEN', 'Luc', 'vanderluc@icloud.com', 1337);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
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
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
