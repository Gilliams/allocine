-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 03 jan. 2019 à 10:10
-- Version du serveur :  10.1.29-MariaDB
-- Version de PHP :  7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `allocine`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

CREATE TABLE `actors` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `career` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `lastname`, `firstname`, `country`, `birthday`, `age`, `price`, `career`, `img`) VALUES
(1, 'De Niro', 'Robert', 'Américain', '0000-00-00', 75, 6, 54, 'robertdeniro.jpg'),
(2, 'Depp', 'Johnny', 'Americain', '1963-06-09', 55, 8, 32, 'johnnydepp.jpg'),
(3, 'Downey Jr', 'Robert', 'Americain', '1965-04-04', 53, 4, 47, 'robertdownerjr.jpg'),
(4, 'Johansson', 'Scarlett', 'Americaine', '1984-11-22', 34, 3, 22, 'scarlettjohansson.jpg'),
(5, 'Cassel', 'Vincent ', 'Français', '1966-11-23', 52, 7, 28, 'vincentcassel.jpg'),
(6, 'Clavier', 'Christian', 'Français', '1952-06-06', 66, 3, 44, 'christianclavier.jpg'),
(7, 'Blunt', 'Emily', 'Britannique', '1983-02-23', 35, 9, 14, 'emilyblunt.jpg'),
(8, 'McAvoid', 'James', 'Britannique', '1979-04-21', 39, 2, 22, 'jamesmcavoid.jpg'),
(9, 'Solivérès', 'Thomas', 'Français', '1990-07-11', 28, 0, 6, 'thomassoliveres.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Fantastique'),
(3, 'Comédie'),
(4, 'Drame'),
(5, 'Famille'),
(6, 'Animmation'),
(7, 'Aventure'),
(8, 'Classique'),
(9, 'Documentaire'),
(10, 'Policier');

-- --------------------------------------------------------

--
-- Structure de la table `categories_movies`
--

CREATE TABLE `categories_movies` (
  `id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories_movies`
--

INSERT INTO `categories_movies` (`id`, `categorie_id`, `movie_id`) VALUES
(1, 2, 1),
(2, 1, 1),
(3, 1, 3),
(4, 2, 3),
(5, 3, 3),
(6, 4, 8),
(7, 5, 5),
(8, 3, 5),
(9, 1, 4),
(10, 4, 9),
(11, 2, 4),
(12, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nb_room` int(11) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `nb_room`, `adresse`, `city_id`) VALUES
(1, 'Gaumont', 13, ' Parc Millesime 51370 Thillois ', 1),
(2, 'L\'ESCAL', 8, '31 bvd du Chemin de Fer 51420 Witry-lès-Reims', 1),
(3, 'Opéra', 10, '3, rue Theodore Dubois 51100 Reims', 1),
(4, 'Caroussel', 8, '4 rue du 61ème R.A. 55100 Verdun', 2);

-- --------------------------------------------------------

--
-- Structure de la table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `citys`
--

INSERT INTO `citys` (`id`, `name`) VALUES
(1, 'Reims'),
(2, 'Verdun');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `newspapper` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `score` int(11) NOT NULL,
  `contain` text NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `newspapper`, `author`, `score`, `contain`, `date`, `movie_id`) VALUES
(1, 'Closer', 'La Rédaction', 5, 'Cette version animé brillamment réinventée nous fait redécouvrir Spider-Man sous une forme pop énergique et drôle, le tout dopé par une animation au top.', '2018-12-13 16:49:47', 1),
(2, '', 'skayan m', 5, 'Juste incroyable, tant sur la mise en scène, le style du dessin, le scénario et la bande son, pour moi le meilleur animé de l\'année voire meilleur film.', '2018-12-13 16:49:47', 1);

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contain` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `producer_id` int(11) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `img_url` varchar(300) NOT NULL,
  `public` varchar(200) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `name`, `contain`, `created`, `producer_id`, `nationality`, `duration`, `img_url`, `public`, `cinema_id`) VALUES
(1, 'Il faut sauver le soldat ryan', 'Alors que les forces alliées débarquent à Omaha Beach, Miller doit conduire son escouade derrière les lignes ennemies pour une mission particulièrement dangereuse : trouver et ramener sain et sauf le simple soldat James Ryan, dont les trois frères sont morts au combat en l\'espace de trois jours. Pendant que l\'escouade progresse en territoire ennemi, les hommes de Miller se posent des questions. Faut-il risquer la vie de huit hommes pour en sauver un seul ?', '1998-09-30 12:43:34', 1, 'Américain', '2h43', 'ilfautsauverlesoldatryan.jpg', '', 1),
(2, 'Matrix', 'Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l\'un des pirates les plus recherchés du cyber-espace. A cheval entre deux mondes, Neo est assailli par d\'étranges songes et des messages cryptés provenant d\'un certain Morpheus. Celui-ci l\'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu\'est-ce que la Matrice ?', '1999-06-23 12:47:39', 2, 'Américain', '2h15', 'matrix.jpg', '', 2),
(3, 'Avenger', 'Les Avengers et leurs alliés devront être prêts à tout sacrifier pour neutraliser le redoutable Thanos avant que son attaque éclair ne conduise à la destruction complète de l’univers.', '2018-12-12 10:45:54', 3, 'Américain', '2h23', 'avengers.jpg', '', 3),
(4, 'Creed 2', 'La vie est devenue un numéro d\'équilibriste pour Adonis Creed. Entre ses obligations personnelles et son entraînement pour son prochain grand match, il est à la croisée des chemins.', '2018-12-12 10:45:54', 4, 'Américain', '2h10', 'creed.jpg', '', 4),
(5, 'Qu\'est-ce qu\'on a encore fait au bon dieu ?', 'Le retour des familles Verneuil et Koffi au grand complet !\r\nClaude et Marie Verneuil font face à une nouvelle crise.\r\nLeurs quatre gendres, Rachid, David, Chao et Charles sont décidés à quitter la France avec femmes et enfants pour tenter leur chance à l’étranger.\r\nIncapables d’imaginer leur famille loin d’eux, Claude et Marie sont prêts à tout pour les retenir.', '2018-12-12 10:57:28', 5, '0', '', 'questcequonaencorefaitaubondieu.jpg', '', 1),
(6, 'L\'empereur de Paris', 'Sous le règne de Napoléon, François Vidocq, le seul homme à s\'être échappé des plus grands bagnes du pays, est une légende des bas-fonds parisiens. Laissé pour mort après sa dernière évasion spectaculaire, l\'ex-bagnard essaye de se faire oublier sous les traits d\'un simple commerçant.', '2018-12-12 10:57:28', 6, 'Français', '1h50', 'lempereurdeparis.jpg', '', 2),
(7, 'Le retour de Mary poppins', 'Michael Banks travaille à la banque où son père était employé, et il vit toujours au 17 allée des Cerisiers avec ses trois enfants, Annabel, Georgie et John, et leur gouvernante Ellen. Comme sa mère avant elle, Jane Banks se bat pour les droits des ouvriers et apporte son aide à la famille de Michael.', '2018-12-12 10:57:28', 7, 'Américain', '2h11', 'leretourdemarypoppins.jpg', '', 3),
(8, 'Glass', 'Peu de temps après les événements relatés dans SPLIT, David Dunn - l’homme incassable - poursuit sa traque de La Bête, surnom donné à Kevin Crumb depuis qu’on le sait capable d’endosser 23 personnalités différentes. De son côté, le mystérieux homme souffrant du syndrome des os de verre Elijah Price suscite à nouveau l’intérêt des forces de l’ordre en affirmant détenir des informations capitales sur les deux hommes…', '2018-12-12 10:57:28', 8, 'Américain', '', 'glass.jpg', '', 4),
(9, 'Edmond', 'Décembre 1897, Paris. Edmond Rostand n’a pas encore trente ans mais déjà deux enfants et beaucoup d’angoisses. Il n’a rien écrit depuis deux ans. En désespoir de cause, il propose au grand Constant Coquelin une pièce nouvelle, une comédie héroïque, en vers, pour les fêtes. ', '2018-12-12 10:57:28', 9, 'Français', '1h50', 'edmond.jpg', '', 1),
(10, 'Aquaman', 'Les origines d’un héros malgré lui, dont le destin est d’unir deux mondes opposés, la terre et la mer. Cette histoire épique est celle d’un homme ordinaire destiné à devenir le roi des Sept Mers.', '2018-12-19 00:00:00', 4, 'Americain', '2h24', 'aquaman.jpg', '', 2),
(11, 'Mortal Engine', 'Des centaines d’années après qu’un évènement apocalyptique a détruit la Terre, l’humanité s’est adaptée pour survivre en trouvant un nouveau mode de vie. Ainsi, de gigantesques villes mobiles errent sur Terre prenant sans pitié le pouvoir sur d’autres villes mobiles plus petites.\r\nTom Natsworthy - originaire du niveau inférieur de la grande ville mobile de Londres – se bat pour sa propre survie après sa mauvaise rencontre avec la dangereuse fugitive Hester Shaw. Deux personnages que tout oppose, qui n’étaient pas destinés à se croiser, vont alors former une alliance hors du commun, destinée à bouleverser le futur.', '2018-12-12 00:00:00', 8, 'Néo-Zélandais', '2h08', 'moartalengine.jpg', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `movies_actors`
--

CREATE TABLE `movies_actors` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `movies_actors`
--

INSERT INTO `movies_actors` (`id`, `movie_id`, `actor_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 3),
(4, 3, 4),
(5, 4, 1),
(6, 2, 4),
(7, 7, 1),
(8, 7, 2),
(9, 7, 3),
(10, 8, 5),
(11, 8, 6),
(12, 9, 9),
(13, 9, 8),
(14, 9, 7),
(15, 5, 4),
(16, 4, 7);

-- --------------------------------------------------------

--
-- Structure de la table `producers`
--

CREATE TABLE `producers` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `producers`
--

INSERT INTO `producers` (`id`, `name`) VALUES
(1, 'Hurd'),
(2, 'Silver'),
(3, 'Besson'),
(4, 'Kaufman'),
(5, 'Spielberg'),
(6, 'Langmann'),
(7, 'Nolan'),
(8, 'Coppola'),
(9, 'Tarantino');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `cinema_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `date`, `time`, `cinema_id`, `movie_id`) VALUES
(29, '2019-01-03', '10:30:00', 2, 1),
(30, '2019-01-04', '10:30:00', 2, 2),
(31, '2019-01-05', '10:30:00', 2, 3),
(32, '2019-01-06', '10:30:00', 2, 0),
(33, '2019-01-07', '10:30:00', 2, 4),
(34, '2019-01-08', '10:30:00', 2, 5),
(35, '2019-01-09', '10:30:00', 2, 6),
(36, '2019-01-10', '10:30:00', 2, 7),
(37, '2019-01-11', '10:30:00', 2, 8),
(38, '2019-01-12', '10:30:00', 2, 9),
(39, '2019-01-03', '18:00:00', 2, 8),
(40, '2019-01-04', '18:00:00', 2, 7),
(41, '2019-01-05', '18:00:00', 2, 6),
(42, '2019-01-06', '18:00:00', 2, 5),
(43, '2019-01-07', '18:00:00', 2, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories_movies`
--
ALTER TABLE `categories_movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movies_actors`
--
ALTER TABLE `movies_actors`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `categories_movies`
--
ALTER TABLE `categories_movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `movies_actors`
--
ALTER TABLE `movies_actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `producers`
--
ALTER TABLE `producers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
