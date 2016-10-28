-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 28 Octobre 2016 à 09:25
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anime`
--

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

CREATE TABLE `anime` (
  `ID_anime` int(11) NOT NULL,
  `Titre_anime` varchar(100) NOT NULL,
  `Annee_sortie` int(4) NOT NULL,
  `Auteur` varchar(100) NOT NULL,
  `Synopsis` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anime`
--

INSERT INTO `anime` (`ID_anime`, `Titre_anime`, `Annee_sortie`, `Auteur`, `Synopsis`) VALUES
(1, 'Eureka Seven', 2005, 'Dai Sato', 'Lors du grand cataclysme connu sous le nom de "Summer Of Love", Adrock Thurston, imminent chercheur, réussi à sauver la planète en y laissant sa propre vie. Renton Thurston, son fils, fut alors élevé par son grand père, mécanicien de son état, et vis banalement en banlieu de la cité de Belforest. Ce qui motive Renton, pré-adolescent d\'à peine 14 ans, c\'est le "lift", sorte de sport qui consiste a surfer sur des vagues de TraPar. Souvenir du Summer Of Love, le TraPar (Transparence Light Particule), sorte de courant, invisible comme l\'air, présentant des vagues comme un océan, offre à Renton sa principale occupation: lifter de grandes vagues de TraPar et devenir un jour peut-être comme son idole Holland, pro du lift. Malheureusement pour lui, en plus d\'être ennuyante, Belforest, ville natale de Renton ne fait l\'objet que de petites vagues de TraPar, pas de quoi réaliser de figures impressionnantes. Si ce n\'était que l\'ennui d\'une ville terne, Renton doit également faire face à la notoriété acquise par son père en sauvant le monde, pas facile quand même son prof en fait l\'éloge en plein cours, devant le reste de la classe. Ce qui va délivrer Renton de cette monotonie, c\'est l\'arrivée assez inattendue de "Light Finding Operation (LFO)" militaire en ville. Arrivée aussi peu attendue que le soir même un LFO en détresse se pose en catastrophe chez Renton...'),
(2, 'Mirai Nikki', 2011, 'ESUNO SAKAE', 'Ayant toujours préféré rester à l’écart de ses camarades, Yukitero Amano (Yuki), est un collégien qui se décrit comme étant un observateur. Il a même pris l’habitude de consigner tout ce qu’il voit dans son téléphone portable, en quelque sorte son journal intime. Il s’est également inventé un monde bien à lui, et c’est dans cet univers imaginaire qu’il a ses seuls amis : Deux Ex Machina, le dieu du Temps et de l’Espace, et Murmur, sa facétieuse servante. Mais un jour, Deus lui annonce qu’il prépare un « jeu » intéressant… Et voilà Yuki entraîné dans une cauchemardesque « course contre la mort » où chacun des participants peut voir écrit l’avenir dans son portable et doit éliminer les autres pour obtenir la place de Deus…'),
(3, 'Sword Art Online', 2012, ' Kawahara Reki', 'En 2022, l\'humanité a réussi à créer une réalité virtuelle. Grâce à un casque, les humains peuvent se plonger entièrement dans le monde virtuel en étant comme déconnectés de la réalité, et Sword Art Online est le premier MMORPG a utiliser ce système. Mais voila que le premier jour de jeu, 10 000 personnes se retrouvent piégées dans cette réalité virtuelle par son créateur : Akihiko Kayaba. Le seul moyen d\'en sortir est de finir le jeu. Mais ce ne sera pas facile de sortir de ce monde virtuel puisque si un joueur perd la partie, il meurt également dans la vraie vie. Kirito décide alors de partir à la conquête du jeu en solo, avec pour avantage le fait de faire partie des 1 000 ex-bêta-testeurs, mais arrivera-t-il à terminer les 99 donjons et leurs boss ?'),
(4, 'Nagi no Asukara', 2013, 'OKADA Mari', 'Nagi no Asukara raconte l\'histoire de deux collégiens : Manaka Mukaido et Hikari Sakishima. Manaka est une pleurnicheuse de première et Hikari, son ami d\'enfance, passe son temps à prendre soin d\'elle. Ils ont cependant une petite particularité : ce sont des humains vivant au fond de la mer. Eux et leurs amis, Chisaki et Kaname, s\'apprêtent désormais à intégrer le collège à la surface de la terre.'),
(5, 'No Game No Life', 2014, 'Yuu Kamiya', 'Nagi no Asukara raconte l\'histoire de deux collégiens : Manaka Mukaido et Hikari Sakishima. Manaka est une pleurnicheuse de première et Hikari, son ami d\'enfance, passe son temps à prendre soin d\'elle. Ils ont cependant une petite particularité : ce sont des humains vivant au fond de la mer. Eux et leurs amis, Chisaki et Kaname, s\'apprêtent désormais à intégrer le collège à la surface de la terre.'),
(7, 'Akame ga Kill!', 2014, 'Takahiro &amp; Tashiro Tetsuya', 'L’histoire nous entraîne dans les aventures de Tatsumi, un jeune combattant qui se rend à la Capitale Impériale pour rejoindre l’armée. Cependant, il découvre que la ville est corrompue par la soif de pouvoir des hauts fonctionnaires qui profitent de l’inexpérience de l’Empereur pour gouverner à leur convenance. Suite à une certaine rencontre, Tatsumi se retrouve embarqué au sein d’un groupe d’assassins de l’ombre appelé Night Raid, luttant contre la tyrannie de la Cité Impériale…'),
(8, 'One Punch Man', 2015, 'ONE', 'Saitama est un jeune homme sans emploi. Un jour, il rencontre un homme-crabe qui recherche un jeune garçon au menton en forme de fesses. Saitama finit par rencontrer ce jeune garçon et décide de le sauver de l\'homme-crabe, qu\'il arrive à battre difficilement. Dès lors, Saitama décide de devenir un super-héros et s’entraîne pendant trois ans. À la fin de son entrainement, si intense qu\'il en perd les cheveux, il remarque qu\'il est devenu tellement fort qu\'il parvient désormais à battre tous ses adversaires d\'un seul coup de poing. Sa force démesurée est pour lui source de problèmes, puisqu\'il ne trouve pas d\'adversaires à sa taille et s\'ennuie dans son métier de héros. Bien qu\'il ait mis un terme à un bon nombre de menaces toutes plus dangereuses les unes que les autres, personne ne semble remarquer l\'incroyable capacité de Saitama, à l\'exception de son ami et disciple Genos.'),
(9, 'Golden Time', 2013, 'TAKEMIYA YUYUKO', 'L’histoire nous entraîne dans la vie quotidienne de Tada Banri, qui intègre l’université privée de Droit à Tokyo. A la rentrée, les étudiants de première année, Tada &amp; Yanagisawa Mitsuo, sont légèrement perdus. C’est ainsi qu’ils rencontrent une ravissante demoiselle tenant un bouquet de rose et qui félicite Mitsuo pour son entrée à la faculté. Tada Banri tombe immédiatement sous le charme de cette mystérieuse demoiselle. Mais il découvre que Kaga Kouko (la jeune fille), est l’amie d’enfance de Mitsuo. Ils s’étaient même promis de se marier ensemble, une fois adulte. Pour tenir sa promesse, Kouko a passé secrètement l’examen d’entrée pour l’université de Droit…'),
(10, 'Full Metal Alchemist : Brotherhood', 2009, 'Hiromu Arakawa', 'Dans le pays d\'Amestris, pays où l\'Alchimie est élevée au rang de science universelle, deux frères, Edward et Alphonse Elric parcourent le monde à la recherche de la légendaire pierre philosophale dans le but de retrouver leurs corps perdus. Leur père, Van Hohenheim, les a quittés il y a de cela des années, et leur mère Trisha Elric meurt quelques années plus tard d\'une maladie, laissant ses deux jeunes enfants derrière elle. Un an plus tard, les deux frères tentent de la faire revenir grâce à l\'alchimie, bravant la loi qui interdit formellement la transmutation humaine. Ils en payeront le prix fort. Edward, l\'ainé, perdra sa jambe gauche, son petit frère perd son corps tout entier. Ed sacrifiera son bras droit en scellant l\'âme de son petit frère Alphonse dans une armure. Edward décide de s\'engager dans l\'armée à l\'âge de 12 ans en tant qu\'Alchimiste d\'État, réussit l\'examen haut la main et obtient son nom d\'alchimiste, le Fullmetal Alchemist. Avec les avantages d\'alchimiste d\'état et leurs recherches, les deux frères chercheront au péril de leur vie la pierre mythique qui leur rendra ce qu\'ils ont perdu, mais le secret de la Pierre Philosophale est bien gardé.'),
(13, 'Sakurasou no pet na kanojo', 2012, 'Kamoshida Hajime', 'Kanda Sorata est un lycéen qui vit au Sakurasō, un dortoir pour les élèves à problèmes du lycée de Sorata. Un jour, Shiina Mashiro, une superbe jeune fille et brillante artiste, arrive au Sakurasō. Sorata se dit qu\'il doit protéger Mashiro des locataires farfelus de Sakurasō, mais Mashiro a un secret surprenant : elle n\'a aucune idée de comment prendre soin d\'elle-même. Elle se perd si elle sort et sa chambre est un désordre complet. Les camarades de dortoir de Sorata le désignent alors comme le maître de Mashiro, et c\'est ainsi qu\'un garçon ordinaire et une fille brillante vont devoir vivre comme un maître et son animal de compagnie.');

-- --------------------------------------------------------

--
-- Structure de la table `anime_genre`
--

CREATE TABLE `anime_genre` (
  `ID_anime` int(11) NOT NULL,
  `ID_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `anime_genre`
--

INSERT INTO `anime_genre` (`ID_anime`, `ID_genre`) VALUES
(1, 11),
(1, 10),
(1, 31),
(1, 6),
(1, 33),
(2, 1),
(2, 14),
(2, 25),
(2, 43),
(2, 35),
(4, 11),
(4, 29),
(4, 6),
(2, 40),
(5, 10),
(5, 28),
(5, 20),
(5, 29),
(5, 37),
(5, 35),
(7, 1),
(7, 10),
(7, 29),
(8, 1),
(8, 28),
(8, 23),
(8, 33),
(8, 41),
(8, 26),
(8, 35),
(9, 28),
(9, 6),
(9, 41),
(3, 1),
(3, 10),
(3, 29),
(3, 37),
(3, 6),
(10, 1),
(10, 10),
(10, 11),
(10, 29),
(10, 13),
(10, 39),
(10, 25),
(13, 28),
(13, 11),
(13, 6),
(13, 24),
(13, 42);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `Nom_genre` varchar(100) NOT NULL,
  `Definition_genre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `Nom_genre`, `Definition_genre`) VALUES
(1, 'Action', NULL),
(2, 'Demons', NULL),
(3, 'Harem', NULL),
(4, 'Kids', NULL),
(5, 'Music', NULL),
(6, 'Romance', NULL),
(7, 'Shoujo', NULL),
(8, 'Space', NULL),
(9, 'Vampire', NULL),
(10, 'Adventure', NULL),
(11, 'Drama', NULL),
(12, 'Hentai', NULL),
(13, 'Magic', NULL),
(14, 'Mystery', NULL),
(15, 'Samurai', NULL),
(16, 'Shoujo Ai', NULL),
(17, 'Sports', NULL),
(18, 'Yaoi', NULL),
(19, 'Cars', NULL),
(20, 'Ecchi', NULL),
(21, 'Historical', NULL),
(22, 'Martial Arts', NULL),
(23, 'Parody', NULL),
(24, 'School', NULL),
(25, 'Shounen', NULL),
(26, 'Super Power', NULL),
(27, 'Yuri', NULL),
(28, 'Comedy', NULL),
(29, 'Fantasy', NULL),
(30, 'Horreur', NULL),
(31, 'Mecha', NULL),
(32, 'Police', NULL),
(33, 'Sci-Fi', NULL),
(34, 'Shounen Ai', NULL),
(35, 'Supernatural', NULL),
(36, 'Dementia', NULL),
(37, 'Game', NULL),
(38, 'Josei', NULL),
(39, 'Military', NULL),
(40, 'Psychological', NULL),
(41, 'Seinen', NULL),
(42, 'Slice of life', NULL),
(43, 'Thriller', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id_membre` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mot_de_passe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membres`
--

INSERT INTO `membres` (`id_membre`, `pseudo`, `mail`, `mot_de_passe`) VALUES
(1, 'maxime', 'maxime@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'kevin', 'kevin@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'loys', 'loys@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(4, 'margaux', 'margaux@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Structure de la table `note_membre`
--

CREATE TABLE `note_membre` (
  `id_note` int(11) NOT NULL,
  `ID_membre` int(11) NOT NULL,
  `ID_anime` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `Description` text,
  `Date_note` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note_membre`
--

INSERT INTO `note_membre` (`id_note`, `ID_membre`, `ID_anime`, `note`, `Description`, `Date_note`) VALUES
(1, 1, 7, 9, 'Très bon anime, je le recommande vraiment :)', '2016-10-27 16:10:12'),
(2, 3, 7, 7, 'Une description !!!', '2016-10-27 16:32:32'),
(3, 2, 7, 5, 'ouais bof...', '2016-10-27 16:32:56'),
(4, 4, 7, 1, 'vraiment nul', '2016-10-27 16:33:18'),
(5, 1, 1, 1, 'pas encore regardé', '2016-10-27 17:38:34'),
(6, 3, 1, 6, '', '2016-10-27 17:38:52');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`ID_anime`);

--
-- Index pour la table `anime_genre`
--
ALTER TABLE `anime_genre`
  ADD KEY `ID_anime` (`ID_anime`),
  ADD KEY `ID_genre` (`ID_genre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `note_membre`
--
ALTER TABLE `note_membre`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `ID_membre` (`ID_membre`),
  ADD KEY `ID_anime` (`ID_anime`),
  ADD KEY `note` (`note`),
  ADD KEY `id_note` (`id_note`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `anime`
--
ALTER TABLE `anime`
  MODIFY `ID_anime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `note_membre`
--
ALTER TABLE `note_membre`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `anime_genre`
--
ALTER TABLE `anime_genre`
  ADD CONSTRAINT `fk_ID_Anime` FOREIGN KEY (`ID_anime`) REFERENCES `anime` (`ID_anime`),
  ADD CONSTRAINT `fk_ID_genre` FOREIGN KEY (`ID_genre`) REFERENCES `genre` (`id_genre`);

--
-- Contraintes pour la table `note_membre`
--
ALTER TABLE `note_membre`
  ADD CONSTRAINT `fk_anime_note` FOREIGN KEY (`ID_anime`) REFERENCES `anime` (`ID_anime`),
  ADD CONSTRAINT `fk_membre_note` FOREIGN KEY (`ID_membre`) REFERENCES `membres` (`id_membre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
