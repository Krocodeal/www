-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Avril 2015 à 00:09
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `concert_paris`
--

-- --------------------------------------------------------

--
-- Structure de la table `associer`
--

CREATE TABLE IF NOT EXISTS `associer` (
  `STYLE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`STYLE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `associer`
--

INSERT INTO `associer` (`STYLE_ID`, `EVENEMENT_ID`) VALUES
(1, 5),
(1, 6),
(1, 13),
(1, 19),
(2, 5),
(2, 7),
(2, 11),
(2, 12),
(2, 13),
(2, 15),
(2, 16),
(3, 6),
(3, 13),
(3, 17),
(4, 5),
(4, 6),
(4, 10),
(4, 13),
(4, 15),
(4, 17),
(5, 6),
(5, 7),
(5, 8),
(5, 10),
(5, 18),
(6, 9),
(6, 14),
(6, 17),
(7, 10),
(7, 14);

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

CREATE TABLE IF NOT EXISTS `jouer` (
  `PERSONNE_ID` int(6) NOT NULL,
  `STYLE_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`STYLE_ID`),
  KEY `STYLE_ID` (`STYLE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `jouer`
--

INSERT INTO `jouer` (`PERSONNE_ID`, `STYLE_ID`) VALUES
(3, 0),
(4, 0),
(5, 0),
(35, 2),
(36, 2),
(37, 3),
(37, 4),
(42, 2),
(49, 7),
(50, 2);

-- --------------------------------------------------------

--
-- Structure de la table `organiser`
--

CREATE TABLE IF NOT EXISTS `organiser` (
  `EVENEMENT_ID` int(6) NOT NULL,
  `PERSONNE_ID` int(6) NOT NULL,
  PRIMARY KEY (`EVENEMENT_ID`,`PERSONNE_ID`),
  KEY `PERSONNE_ID` (`PERSONNE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `organiser`
--

INSERT INTO `organiser` (`EVENEMENT_ID`, `PERSONNE_ID`) VALUES
(5, 29),
(6, 29),
(7, 29),
(8, 20),
(9, 20),
(10, 20),
(11, 20),
(12, 20),
(13, 20),
(14, 20),
(15, 20),
(16, 20),
(17, 20),
(18, 20),
(19, 20);

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `PERSONNE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `participer`
--

INSERT INTO `participer` (`PERSONNE_ID`, `EVENEMENT_ID`) VALUES
(1, 5),
(1, 6),
(3, 5),
(3, 8),
(7, 1),
(7, 2),
(15, 9),
(15, 14),
(15, 17),
(15, 18),
(20, 7),
(20, 9),
(20, 11),
(20, 12),
(20, 13),
(20, 14),
(20, 15),
(20, 16),
(20, 17),
(24, 6),
(24, 7),
(24, 9),
(24, 11),
(24, 12),
(24, 13),
(24, 14),
(24, 15),
(24, 16),
(24, 17),
(31, 7),
(31, 9),
(31, 12),
(37, 13),
(38, 9),
(38, 12),
(48, 12),
(48, 13);

-- --------------------------------------------------------

--
-- Structure de la table `se_produire`
--

CREATE TABLE IF NOT EXISTS `se_produire` (
  `PERSONNE_ID` int(6) NOT NULL,
  `EVENEMENT_ID` int(6) NOT NULL,
  PRIMARY KEY (`PERSONNE_ID`,`EVENEMENT_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `se_produire`
--

INSERT INTO `se_produire` (`PERSONNE_ID`, `EVENEMENT_ID`) VALUES
(0, 17),
(0, 18),
(0, 19),
(1, 5),
(1, 6),
(2, 7),
(3, 5),
(3, 7),
(3, 8),
(7, 1),
(7, 2),
(7, 7),
(15, 9),
(16, 10),
(20, 7),
(33, 10),
(35, 11),
(36, 12),
(37, 13),
(49, 14),
(50, 15),
(50, 16);

-- --------------------------------------------------------

--
-- Structure de la table `t_artiste`
--

CREATE TABLE IF NOT EXISTS `t_artiste` (
  `PERSONNE_ID` int(6) NOT NULL,
  `PAYS_ID` int(6) NOT NULL,
  `ARTISTE_Age` int(4) DEFAULT NULL,
  `ARTISTE_Description` text,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`),
  KEY `PAYS_ID` (`PAYS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_artiste`
--

INSERT INTO `t_artiste` (`PERSONNE_ID`, `PAYS_ID`, `ARTISTE_Age`, `ARTISTE_Description`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(1, 1, 23, '', 'STROMAE', 'STROMAE', 'stromae', 'artiste', '', 'stromae@none.com', '0600000000'),
(2, 3, 32, '', 'THEOPHILUS_LONDON', 'Theophilus London', 'theophiluslondon', 'artiste', '', 'theophiluslondon@none.com', '0600000000'),
(3, 2, 25, '', 'BEAT_ASSAILANT', 'Beat Assailant', 'beatassailant', 'artiste', '', 'beatassailant@none.com', '0600000000'),
(7, 1, 20, 'Na&acirc;man incarne aujourd&rsquo;hui l&rsquo;&eacute;nergie sinc&egrave;re et naturelle de la jeunesse de ce monde, la positivit&eacute; est son fer de lance, la vie aussi... Et ce visage d&rsquo;ange n&rsquo;a pas fini de nous donner le sourire ! Sur sc&egrave;ne c&rsquo;est comme un fourmillement qui vous prendra de la t&ecirc;te aux pieds, le son explosif et l&rsquo;&eacute;nergie positive dont le jeune homme d&eacute;borde ne laissent personne indiff&eacute;rent !', 'NAAMAN', 'Naaman', 'naaman', 'artiste', '', 'naaman@none.com', '0600000000'),
(15, 8, 40, 'Pas loins de 300 concerts, 4 albums, des splits, des compiles, des clips et des pochettes affreuses, des rencontres fortes, Justin(e) avance dans l&rsquo;indiff&eacute;rence et la joie, dans une d&eacute;marche amateur et DIY, sans objectifs, et donc sans aucune raison de s''arr&ecirc;ter.', 'Fikce', 'Justin(e)', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/0002683278_10.jpg', 'fikce@justine.com', ''),
(16, 8, 40, '', 'BatBat', 'Diego Pallavas', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'batbat@diego.com', ''),
(33, 21, 0, 'Gang Starr est un groupe américain de rap, originaire de Boston, Massachusetts. Pionnier du rap East Coast des années 19901, le duo s''est créé une identité propre en réactualisant le son new yorkais au fil de ses albums.', 'Gangstarr', 'Gang Starr', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'gangstarr@insta.fr', ''),
(35, 21, 64, 'Robert Bobby McFerrin Jr., nÃƒÂ© le 11 mars 1950 ÃƒÂ  Manhattan, est un chanteur, vocaliste et chef d\\\\\\''orchestre amÃƒÂ©ricain. Il est surtout connu pour la chanson Don\\\\\\''t Worry, Be Happy.', 'BobbyMC', 'Bobby McFerrin', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/390e2cbe318872354a7b76f4c2282058.jpg', 'bobby@chatelet.fr', ''),
(36, 45, 26, 'Tigran Hamasyan est un pianiste de jazz armÃ©nien nÃ© le 17 juillet 1987 Ã  Gyumri.', 'Tigran', 'Tigran Hamasyan', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/ab12034b09b99b131ad410cd3a16c655.jpg', 'tigran@jazz.com', ''),
(37, 21, 0, 'Lords of the Underground est un trio amÃ©ricain de rap, originaire de Newark, dans le New Jersey. Les MC Mr funk et DoltAll DuprÃ© ont rencontrÃ© le DJ Lord Jazz quand ils Ã©taient encore tous les trois Ã©tudiants a l''universitÃ© Shaw;', 'LOTU', 'Lords Of The Underground', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'LOTU@macki.com', ''),
(49, 21, 0, 'Turnstile (USA) Balltimore - DC - Ohio // REAPER RECORDS https://www.facebook.com/turnstilehc http://www.turnstilehardcore.com/', 'Turnstile', 'Turnstile', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/701e047d60ae1cb9c77a4ccf4936796c.jpg', 'turnstile@hc.com', ''),
(50, 4, 0, 'Passionnés de jazz version free ou contemporain et de hip-hop instrumental, les trois godelureaux forment le groupe BadBadNotGood, aussi stylisé en BBNG.', 'AlexBBNG', 'BadBadNotGood', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/6ecef0c97674fba54c82240e5c064827.png', 'alex@bbng.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_evenement`
--

CREATE TABLE IF NOT EXISTS `t_evenement` (
  `EVENEMENT_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LIEU_ID` int(6) NOT NULL,
  `EVENEMENT_Libelle` varchar(255) NOT NULL,
  `EVENEMENT_Description` text,
  `EVENEMENT_Prix` varchar(255) DEFAULT NULL,
  `EVENEMENT_Horaire` varchar(255) DEFAULT NULL,
  `EVENEMENT_Date` date DEFAULT NULL,
  PRIMARY KEY (`EVENEMENT_ID`),
  KEY `LIEU_ID` (`LIEU_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `t_evenement`
--

INSERT INTO `t_evenement` (`EVENEMENT_ID`, `LIEU_ID`, `EVENEMENT_Libelle`, `EVENEMENT_Description`, `EVENEMENT_Prix`, `EVENEMENT_Horaire`, `EVENEMENT_Date`) VALUES
(1, 1, 'NEVER SAY DIE X SPLASH (SKISM - EPTIC - DODGE & FUSKI - 501)', 'Grands habitués des Splash depuis ses tous débuts, la famille NEVER SAY DIE attendait depuis longtemps de faire sa propre soirée à Paris.\r\nCe sera chose faite ce vendredi 13 décembre avec la NEVER SAY DIE NIGHT x SPLASH !!\r\n\r\nUne soirée pleine de surprise qui viendra clôturer une année 2013 incroyable pour les SPLASH qui ont donné autant de Bass qu''ils ont reçu d''amour de votre part...\r\n\r\nCe soir, c''est le Big Boss du label et meilleur DJ de la scène dubstep, SKISM qui emmène sa joyeuse troupe pour un week-end dans la capitale : L''agité duo de DODGE & FUSKI, l''étoile montante belge EPTIC, le puriste venu du nord 501, l''homme de l''ombre MOBSCENE et en maître de cérémonie, ILLAMAN.\r\n\r\n\r\nINFOS PRATIQUES\r\n\r\n13.12.2013 @ LA MACHINE DU MOULIN ROUGE\r\n23h00 - 06h00\r\n24?\r\n\r\nLa Machine du Moulin Rouge\r\n90 Bvd de Clichy 75018 Paris\r\nMétro : Blanche Ligne 2\r\nBus : Blanche 68, 74, 30, 54, N01, N02\r\n\r\nwww.facebook.com/chwetprod\r\nwww.twitter.com/splashgig\r\nwww.lamachinedumoulinrouge.com\r\nsplashgig@gmail.com\r\n\r\n\r\nPreventes :\r\n\r\nINTERDIT AUX MINEURS / CARTE D''IDENTITÉ OBLIGATOIRE\r\n\r\nBillet téléchargeable sur mobile\r\n\r\nOrganisateur : CHWET', '22,50', '22h a 06h', '2013-12-13'),
(2, 3, 'NAÂMAN + PHASES CACHEES', 'Depuis 2010 *Naâman* illumine la scène reggae française avec un flow groovy\r\nune voix claire et vivifiante. Le jeune chanteur s''attache à faire revivre\r\ndes légendes du reggae empruntant au hip-hop et au raggamuffin leurs\r\nrythmiques incessantes et leurs messages engagés. Après avoir été élu\r\nRévélation de l''Année 2013 aux Victoires du Reggae (Reggae.fr), il revient\r\nle 4 Juin 2013 avec son nouvel album *Deep Rockers, Back A Yard *! Avis à\r\ntous ceux qui n''auraient pas déjà entendu son flow explosif, Naâman va vous\r\nravir le coeur et les oreilles !', '15', '18h', '2013-12-18'),
(3, 3, 'NAaMAN', 'Depuis 2010 *Naâman* illumine la scène reggae fran', '15', '18h', '2013-12-19'),
(5, 3, 'EVENT 1', 'Ella Fitzegerald Tribute', '30', '21h', '2012-05-14'),
(6, 1, 'EVENT 2', 'STROMAE - Nouvel Album', '20', '20h', '2015-02-14'),
(9, 6, 'JUSTIN(E) + POGOMARTO + POESIE ZERO + LORDS OF THE PINT + TO THE LAST DROP', 'VENDREDI 27 JUIN 2014\r\nLa Miroiterie  88, rue MÃ©nilmontant\r\nMÂ° MÃ©nilmontant (L2) ou Jourdain (L11)\r\n18H\r\n5 GROUPES / 5 EUROS', '5', '18H', '2014-06-27'),
(11, 7, 'Bobby McFerrin', 'Bobby McFerrin, clÃ´ture la saison par sa prÃ©sence charismatique et sa voix-camÃ©lÃ©on, oÃ¹ les sortilÃ¨ges de lâ€™Afrique font Ã©cho aux negro spirituals quâ€™il convoque dans sa derniÃ¨re production discographique : il y a chez lui un gÃ©nie de la transformation vocale qui nous fait entrer sans patronage dans une communion spontanÃ©e avec sa planÃ¨te des songes.', '20', '20H', '2014-05-20'),
(12, 8, 'TIGRAN SHADOW THEATER', 'Tigran Piano / Areni Agbabian Voix / Charles Altura Guitare / Chris Tordini Basse / Arthur Hnatek Batterie\r\nÃ€ quatre jours de fÃªter ses 27 ans, le pianiste armÃ©nien montre le chemin parcouru depuis quâ€™il dÃ©barquait en trombe sur les festivals Ã  lâ€™aube des annÃ©es 2000. Titulaire du prix Thelonious Monk, il a Ã©tÃ© comparÃ© Ã  Herbie Hancock comme Ã  Keith Jarrett, des exemples forcÃ©ment rÃ©ducteurs au vu de lâ€™originalitÃ© de sa dÃ©marche. Ã€ la dextÃ©ritÃ© crÃ©ative de ses maÃ®tres, il ajoute une propension spectaculaire Ã  fondre dans une mÃªme logique la somme de ses influences : lâ€™ArmÃ©nie, le rock, la musique contemporaine, le rÃ©pertoire classiqueâ€¦', '10', '15H30', '2014-07-13'),
(13, 9, 'Macki Music Festival DAY 1', 'La Mamie''s et Cracki Records s''associent cet Ã©tÃ© pour rÃ©aliser la premiÃ¨re Ã©dition du Macki Music Festival !\r\n\r\n- MAIN EVENT DAY 1\r\n\r\nLords Of The Underground \r\nSecret Dj Guest\r\nThe Garifuna Collective\r\nDaniel Wang \r\nSchatrax \r\nMop Mop & Ange Da Costa\r\nBlue Hawaii\r\nRahaan \r\nAl Kent \r\nSchultz & Forever \r\nAlma Negra \r\n\r\nlieu : Parc de la Mairie / CarriÃ¨res-sur-Seine (78) \r\n- RER A : ArrÃªt Houilles/CarriÃ¨re sur Seine (15 minutes de la station Les Halles)\r\n- Train : direct Saint Lazare - Houilles/CarriÃ¨re sur Seine (10 minutes)', '32', '12h', '2014-07-05'),
(14, 10, 'TURNSTILE + NO TURNING BACK + HIGHTOWER + DIREWOLVES', 'Turnstile (USA)\r\nBalltimore - DC - Ohio // REAPER RECORDS\r\nhttps://www.facebook.com/turnstilehc\r\nhttp://www.turnstilehardcore.com/\r\n-----\r\nNo Turning Back (Hollande)\r\nBrabant // Take Control Records\r\nhttps://www.facebook.com/NoTurningBackHC\r\nwww.noturningback.nl\r\n------\r\nHightower (Paris)\r\nPunk Rock // knives out records\r\nhttps://www.facebook.com/HIGHTOWERMUSIC\r\nhttp://hightower.fr/\r\n------\r\nDirewolves (Lorient)\r\nHardcore/Punk\r\nThroatruiner á¹˜ecords\r\nhttp://direwolves.bandcamp.com/\r\nhttps://www.facebook.com/wearedirewolves\r\n\r\n10â‚¬ en prÃ©vente (fortement conseillÃ©e)\r\nhttps://www.yesgolive.com/la-mecanique-ondulatoire/turnstileno-turning-backhightowerguest\r\n\r\n12â‚¬ sur place\r\n\r\n//// Ouaib ////\r\nFacebook : https://www.facebook.com/lamecaniqueondulatoire\r\nTwitter : @lamequeannick\r\nInstagram : #lamecaniqueondulatoire', '10', '19h', '2015-04-26'),
(15, 8, 'Villette Street Festival 2015 â™« GHOSTFACE KILLAH & BADBADNOTGOOD + APOLLO BROWN & RAS KASS + MICK JENKINS', 'Pour sa deuxiÃ¨me Ã©dition, Villette Street Festival fait peau neuve et revient en version XXL pour deux semaines entiÃ¨rement dÃ©diÃ©es Ã  la street culture sous toutes ses formes.\r\nAu menu : musique, danse, street art, sports, gaming, lifestyle, mode mais aussi des blocks parties et des food trucksâ€¦\r\n\r\nGhostface Killah & BADBADNOTGOOD\r\nApollo Brown & Ras Kass\r\nMick Jenkins \r\nPlein tarif: 35â‚¬ - Les billets jeunes (-26 ans), Cartes Villette et minima sociaux sont Ã  24â‚¬ !\r\n(Tarif de lancement Ã  28â‚¬ Ã©puisÃ©s) \r\nDisponibles ici : http://bit.ly/VSF-Concert2 ', '35', '19h30', '2015-05-16'),
(16, 11, ' SUPER! BADBADNOTGOOD 30 MAI BADABOUM', 'â–  BADBADNOTGOOD â– \r\nâ–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€\r\nBADBADNOTGOOD est un jeune trio de formation classique composÃ© de Matthew Tavares aux claviers, Chester Hansen Ã  la basse et Alex Sowinski Ã  la batterie. Depuis leur rencontre dans une Ã©cole de musique en 2011, les trois ont jetÃ© aux oubliettes leur manuel dâ€™improvisation musicale instrumentale et portent un regard neuf sur la tradition jazz avec les yeux braquÃ©s vers le futur.\r\n\r\nÃ‰couter â–ºhttps://soundcloud.com/badbadnotgood\r\n\r\nBILLETS\r\nâ–€â–€â–€â–€â–€â–€â–€â–€â–€\r\nDigitick: http://bit.ly/1wjttrR\r\nFnac : http://bit.ly/1MNvmRY', '16', '20h', '2015-05-30'),
(17, 12, 'ONYX @ BATOFAR', 'Le Batofar prÃ©sente : \r\nâ˜° ONYX\r\nOnyx, câ€™est lâ€™association de quatre soldats du Queens : Fredro Starr, Stickly Fingaz, Big Ds et Dj Suave qui voit le jour au milieu des annÃ©es 80.\r\nLes bad boys commencent leurs premiÃ¨res scÃ¨nes dans les clubs locaux en espÃ©rant attirer lâ€™attention, jusquâ€™au jour ou Jam Master Jay (plus tard Def Jam) les remarque. Ce dernier prÃªte une attention toute particuliÃ¨re aux textes sombres et violent des MCâ€™s et dÃ©cide de signer leur premier opus Bacdafucup avec le succÃ¨s monumental Â« Slam Â». \r\nUn Gangsta Rap engagÃ©, parfois jugÃ© trop hardcore qui leur vaudra Ã  plusieurs reprises lâ€™interdiction de se produire sur scÃ¨ne.\r\nDevenu un groupe mythique avec des lines violentes regroupant, Onyx nous fait lâ€™honneur dâ€™un concert sous haute tension.\r\n\r\nâ˜° TARIFS\r\nâ–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€â–€\r\n22 euros en prÃ©vente\r\n26 euros sur place\r\n>> http://bit.ly/1y8kbA8', '22', '19h30', '2015-05-06'),
(18, 12, 'The Real Mc Kenzies + Dirty Fonzy + Union Jack + To The Last Drop', 'Sick My Duck, Petits Ciseaux Prod et Le Batofar prÃ©sentent :\r\n\r\nThe Real McKenzies (celtic punk rock/Canada)\r\nAprÃ¨s un passage au Petit Bain cet Ã©tÃ©, les Real Mc Kenzies reviennent Ã  Paris sur la pÃ©niche d''a cÃ´tÃ© pour nous prÃ©senter leur nouvel album "Rats In The Burlap" le successeur de "Westwinds" qui sors ces jours ci.\r\nhttp://www.realmckenzies.com/\r\nhttps://www.facebook.com/therealmckenzies?fref=ts\r\n\r\nDirty Fonzy (punk rock/Albi)\r\nIls ont eux aussi Ã©tÃ© de passage au Petit Bain dÃ©but dÃ©cembre aprÃ¨s une longue absence de la capitale et ils reviennent accompagner les Real Mc Kenzies pour Ã©cumer a nouveau le quai FranÃ§ois Mauriac.\r\nhttps://www.facebook.com/pages/Dirty-Fonzy/143536822656\r\nhttps://dirtyfonzy.bandcamp.com/\r\n\r\nUnion Jack (bad ska/Paris)\r\nLe trio de bad ska parisien, qui Ã©cument les scÃ¨nes de Paris et d''ailleurs depuis bientot 20 viendra donner une note crack rocksteady a cette soirÃ©e hÃ©tÃ©roclite\r\nhttp://unionjackxxx.free.fr/pages/bio.htm\r\nhttps://unionjack.bandcamp.com/\r\nhttps://www.facebook.com/badska\r\n\r\nTo The Last Drop (celtic punk rock/Paris)\r\nLes "local heroes" a cornemuse, issus de divers groupes parisiens seront lÃ  pour ouvrir pour un de leur groupe favori et nous faire dÃ©couvrir des morceaux de leur futur premier album a sortir cette annÃ©e.\r\nhttps://www.facebook.com/tothelastdrop?fref=ts\r\nhttps://tothelastdrop.bandcamp.com/\r\n\r\n12 euros en prÃ©vente/15 euros sur place\r\n\r\nLe Batofar : 11 Quai FranÃ§ois Mauriac 75013 Paris \r\nMetro : BibliothÃ¨que FranÃ§ois Mitterrand ou Quai de la Gare', '12', '19h', '2015-05-04'),
(19, 6, 'SHERWOOD & PINCH Release Party : ADRIAN SHERWOOD - MAD PROFESSOR - PINCH', 'LA RAFINERIE prÃ©sente\r\n\r\nSHERWOOD & PINCH Release Party \r\n\r\nfeat\r\nSHERWOOD & PINCH Live\r\nADRIAN SHERWOOD\r\nMAD PROFESSOR\r\nPINCH\r\n& special guests!\r\n\r\nA l''occasion de la sortie de l''album de SHERWOOD & PINCH, La Rafinerie rÃ©unit 2 lÃ©gendes du dub sur le mÃªme line up : ADRIAN SHERWOOD & MAD PROFESSOR!\r\n\r\nTickets : http://www.digitick.com/sherwood-pinch-release-party-soiree-la-bellevilloise-paris-22-mai-2015-css4-digitick-pg101-ri3088228.html\r\n\r\n\r\nLA BELLEVILLOISE\r\n19-21 Rue Boyer \r\n75020 PARIS', '15', '23h', '2015-05-22');

-- --------------------------------------------------------

--
-- Structure de la table `t_favoris`
--

CREATE TABLE IF NOT EXISTS `t_favoris` (
  `FAVORIS_ID` int(6) NOT NULL AUTO_INCREMENT,
  `FAVORIS_TypeMusique` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`FAVORIS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_gallerie`
--

CREATE TABLE IF NOT EXISTS `t_gallerie` (
  `GALLERIE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `GALLERIE_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`GALLERIE_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `t_gallerie`
--

INSERT INTO `t_gallerie` (`GALLERIE_ID`, `EVENEMENT_ID`, `GALLERIE_Libelle`) VALUES
(2, 5, 'Gallerie :EVENT 1\n									'),
(3, 6, 'Gallerie :EVENT 2\n									'),
(4, 7, 'Gallerie :EVENT 3\n									'),
(5, 8, 'Gallerie :FETE DE L\\''INSTA !!\n									'),
(6, 9, 'Gallerie :JUSTIN(E) + POGOMARTO + POESIE ZERO + LORDS OF THE PINT + TO THE LAST DROP\n									'),
(7, 10, 'Gallerie :TETS\n									'),
(8, 11, 'Gallerie :Bobby McFerrin\n									'),
(9, 12, 'Gallerie :TIGRAN SHADOW THEATER\r\n									'),
(10, 13, 'Gallerie :Macki Music Festival DAY 1\r\n									'),
(11, 14, 'Gallerie :TURNSTILE (USA) + NO TURNING BACK (HOLLANDE) + HIGHTOWER + DIREWOLVES\r\n									'),
(12, 15, 'Gallerie :Villette Street Festival 2015 â™« GHOSTFACE KILLAH & BADBADNOTGOOD + APOLLO BROWN & RAS KASS + MICK JENKINS\r\n									'),
(13, 16, 'Gallerie : SUPER! BADBADNOTGOOD 30 MAI BADABOUM\r\n									'),
(14, 17, 'Gallerie :ONYX @ BATOFAR\r\n									'),
(15, 18, 'Gallerie :The Real Mc Kenzies + Dirty Fonzy + Union Jack + To The Last Drop\r\n									'),
(16, 19, 'Gallerie :SHERWOOD & PINCH Release Party : ADRIAN SHERWOOD - MAD PROFESSOR - PINCH\r\n									');

-- --------------------------------------------------------

--
-- Structure de la table `t_lien`
--

CREATE TABLE IF NOT EXISTS `t_lien` (
  `LIEN_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `PERSONNE_ID_Organisation` int(6) NOT NULL,
  `PERSONNE_ID_Artiste` int(6) NOT NULL,
  `LIEN_Libelle` varchar(255) NOT NULL,
  `LIEN_Url` varchar(255) NOT NULL,
  PRIMARY KEY (`LIEN_ID`),
  KEY `PERSONNE_ID_1` (`PERSONNE_ID_Artiste`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`),
  KEY `PERSONNE_ID` (`PERSONNE_ID_Organisation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `t_lieu`
--

CREATE TABLE IF NOT EXISTS `t_lieu` (
  `LIEU_ID` int(6) NOT NULL AUTO_INCREMENT,
  `LIEU_Libelle` varchar(255) NOT NULL,
  `LIEU_Adresse` varchar(255) NOT NULL,
  `LIEU_Ville` varchar(255) DEFAULT NULL,
  `LIEU_Codepostal` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`LIEU_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `t_lieu`
--

INSERT INTO `t_lieu` (`LIEU_ID`, `LIEU_Libelle`, `LIEU_Adresse`, `LIEU_Ville`, `LIEU_Codepostal`) VALUES
(1, 'La Machine du Moulin Rouge', '90 Boulevard de Clichy', 'Paris', '75018'),
(2, 'Rex Club', '5 Boulevard Poissonnière', 'Paris', '75002'),
(3, 'Cabaret Sauvage', '211 Avenue Jean Jaurès', 'Paris', '75019'),
(4, 'Glazart', '7-15 Avenue de la Porte de la Villette', 'Paris', '75019'),
(5, 'Insta', '37 bis rue des Trois Bornes', 'Paris', '75011'),
(6, 'La Miroiterie', '88 rue Menilmontant', 'Paris', '75020'),
(7, 'ThÃ©Ã¢tre du ChÃ¢telet', '2 rue Edouard Colonne', 'Paris', '75001'),
(8, 'Parc Floral de Paris', 'Parc Floral, Route du Champ de Manoeuvre, Paris', 'Paris', '75012'),
(9, ' Parc de la Mairie de CarriÃ¨res-sur-Seine', ' Parc de la Mairie de CarriÃ¨res-sur-Seine', 'CarriÃ¨res-sur-Seine', '78420'),
(10, 'La MÃ©canique Ondulatoire', '8 Passage Thiere', 'Paris', '75011'),
(11, 'Badaboum', '2bis, rue des Taillandiers', 'Paris', '75011'),
(12, 'Le Batofar', 'Face au 11 quai FranÃ§ois Mauriac', 'Paris', '75013');

-- --------------------------------------------------------

--
-- Structure de la table `t_organisation`
--

CREATE TABLE IF NOT EXISTS `t_organisation` (
  `PERSONNE_ID` int(6) NOT NULL,
  `ORGANISATION_Nomcontact` varchar(255) DEFAULT NULL,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_organisation`
--

INSERT INTO `t_organisation` (`PERSONNE_ID`, `ORGANISATION_Nomcontact`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(28, 'chief remi', 'adaba', 'babouin crew', '61809f85c4e74b413055b37ce999875d', 'organisateur', '', 'babouin@babouin.fr', '122212'),
(20, 'Jules', 'Jules Carnage', 'Carnage Punk', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'organisateur', '', 'jules@carnage.com', ''),
(29, 'gael', 'Gaell', 'aaaaaaaaaaa', '25f9e794323b453885f5181f1b624d0b', 'organisateur', '', 'laloum@gmail.com', '000'),
(30, 'gaell', 'gael.org', 'elgars oner', '25f9e794323b453885f5181f1b624d0b', 'organisateur', '', 'gaelorg@gmail.com', '0134562859');

-- --------------------------------------------------------

--
-- Structure de la table `t_pays`
--

CREATE TABLE IF NOT EXISTS `t_pays` (
  `PAYS_ID` int(10) unsigned NOT NULL,
  `PAYS_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`PAYS_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_pays`
--

INSERT INTO `t_pays` (`PAYS_ID`, `PAYS_Libelle`) VALUES
(1, 'Allemagne'),
(2, 'Autriche'),
(3, 'Belgique'),
(4, 'Canada'),
(5, 'Chine'),
(6, 'Espagne'),
(7, 'Finlande'),
(8, 'France'),
(9, 'Grèce'),
(10, 'Italie'),
(11, 'Japon'),
(12, 'Luxembourg'),
(13, 'Pays-bas'),
(14, 'Pologne'),
(15, 'Portugal'),
(16, 'République Tchèque'),
(17, 'Royaume-Uni'),
(18, 'Suède'),
(19, 'Suisse'),
(20, 'Danemark'),
(21, 'États-Unis'),
(22, 'Hong-Kong'),
(23, 'Norvège'),
(24, 'Australie'),
(25, 'Singapour'),
(26, 'Ireland'),
(27, 'Nouvelle-Zélande'),
(28, 'Corée du Sud'),
(29, 'Israël'),
(30, 'Afrique du Sud'),
(31, 'Nigeria'),
(32, 'Côte d''Ivoire'),
(33, 'Togo'),
(34, 'Bolivie'),
(35, 'Ile Maurice'),
(36, 'Roumanie'),
(37, 'Slovaquie'),
(38, 'Algérie'),
(39, 'Samoa Américaines'),
(40, 'Andorre'),
(41, 'Angola'),
(42, 'Anguilla'),
(43, 'Antigua et Barbuda'),
(44, 'Argentine'),
(45, 'Arménie'),
(46, 'Aruba'),
(47, 'Azerbaïdjan'),
(48, 'Bahamas'),
(49, 'Bahreïn'),
(50, 'Bangladesh'),
(51, 'Barbade'),
(52, 'Bélarus'),
(53, 'Belize'),
(54, 'Bénin'),
(55, 'Bermudes'),
(56, 'Bhoutan'),
(57, 'Botswana'),
(58, 'Brésil'),
(59, 'Brunéi Darussalam'),
(60, 'Burkina Faso'),
(61, 'Burma (Myanmar)'),
(62, 'Burundi'),
(63, 'Cambodge'),
(64, 'Cameroun'),
(65, 'Cap-Vert'),
(66, 'Centrafricaine, République'),
(67, 'Tchad'),
(68, 'Chili'),
(69, 'Colombie'),
(70, 'Comores'),
(71, 'Congo, Rép. Dém.'),
(72, 'Congo, Rép.'),
(73, 'Costa Rica'),
(74, 'Croatie'),
(75, 'Cuba'),
(76, 'Chypre'),
(77, 'Djibouti'),
(78, 'Dominica'),
(79, 'République Dominicaine'),
(80, 'Timor oriental'),
(81, 'Équateur'),
(82, 'Égypte'),
(83, 'El Salvador'),
(84, 'Guinée Équatoriale'),
(85, 'Érythrée'),
(86, 'Estonie'),
(87, 'Éthiopie'),
(88, 'Falkland, Îles'),
(89, 'Féroé, Îles'),
(90, 'Fidji'),
(91, 'Gabon'),
(92, 'Gambie'),
(93, 'Géorgie'),
(94, 'Ghana'),
(95, 'Grenade'),
(96, 'Groenland'),
(97, 'Gibraltar'),
(98, 'Guadeloupe'),
(99, 'Guam'),
(100, 'Guatemala'),
(101, 'Guernesey'),
(102, 'Guinée'),
(103, 'Guinée-Bissau'),
(104, 'Guyana'),
(105, 'Haîti'),
(106, 'Heard, Île et Mcdonald, Îles'),
(107, 'Saint-Siege (État de la Cité du Vatican)'),
(108, 'Honduras'),
(109, 'Islande'),
(110, 'Inde'),
(111, 'Indonésie'),
(112, 'Iran'),
(113, 'Iraq'),
(114, 'Man, Île de'),
(115, 'Jamaique'),
(116, 'Jersey'),
(117, 'Jordanie'),
(118, 'Kazakhstan'),
(119, 'Kenya'),
(120, 'Kiribati'),
(121, 'Corée, Rép. Populaire Dém. de'),
(122, 'Koweït'),
(123, 'Kirghizistan'),
(124, 'Laos'),
(125, 'Lettonie'),
(126, 'Liban'),
(127, 'Lesotho'),
(128, 'Libéria'),
(129, 'Libyenne, Jamahiriya Arabe'),
(130, 'Liechtenstein'),
(131, 'Lituanie'),
(132, 'Macao'),
(133, 'Macédoine'),
(134, 'Madagascar'),
(135, 'Malawi'),
(136, 'Malaisie'),
(137, 'Maldives'),
(138, 'Mali'),
(139, 'Malte'),
(140, 'Marshall, Îles'),
(141, 'Martinique'),
(142, 'Mauritanie'),
(143, 'Hongrie'),
(144, 'Mayotte'),
(145, 'Mexique'),
(146, 'Micronésie'),
(147, 'Moldova'),
(148, 'Monaco'),
(149, 'Mongolie'),
(150, 'Monténégro'),
(151, 'Montserrat'),
(152, 'Maroc'),
(153, 'Mozambique'),
(154, 'Namibie'),
(155, 'Nauru'),
(156, 'Népal'),
(157, 'Antilles Néerlandaises'),
(158, 'Nouvelle-Calédonie'),
(159, 'Nicaragua'),
(160, 'Niger'),
(161, 'Niué'),
(162, 'Norfolk, Île'),
(163, 'Mariannes du Nord, Îles'),
(164, 'Oman'),
(165, 'Pakistan'),
(166, 'Palaos'),
(167, 'Palestinien Occupé, Territoire'),
(168, 'Panama'),
(169, 'Papouasie-Nouvelle-Guinée'),
(170, 'Paraguay'),
(171, 'Pérou'),
(172, 'Philippines'),
(173, 'Pitcairn'),
(174, 'Porto Rico'),
(175, 'Qatar'),
(176, 'Réunion, Île de la'),
(177, 'Russie, Fédération de'),
(178, 'Rwanda'),
(179, 'Saint-Barthélemy'),
(180, 'Saint-Kitts-et-Nevis'),
(181, 'Sainte-Lucie'),
(182, 'Saint-Martin'),
(183, 'Saint-Pierre-et-Miquelon'),
(184, 'Saint-Vincent-et-Les Grenadines'),
(185, 'Samoa'),
(186, 'Saint-Marin'),
(187, 'Sao Tomé-et-Principe'),
(188, 'Arabie Saoudite'),
(189, 'Sénégal'),
(190, 'Serbie'),
(191, 'Seychelles'),
(192, 'Sierra Leone'),
(193, 'Slovénie'),
(194, 'Salomon, Îles'),
(195, 'Somalie'),
(196, 'Géorgie du Sud et les Îles Sandwich du Sud'),
(197, 'Sri Lanka'),
(198, 'Soudan'),
(199, 'Suriname'),
(200, 'Svalbard et Île Jan Mayen'),
(201, 'Swaziland'),
(202, 'Syrienne'),
(203, 'Taïwan'),
(204, 'Tadjikistan'),
(205, 'Tanzanie'),
(206, 'Thaïlande'),
(207, 'Tokelau'),
(208, 'Tonga'),
(209, 'Trinité-et-Tobago'),
(210, 'Tunisie'),
(211, 'Turquie'),
(212, 'Turkménistan'),
(213, 'Turks et Caiques, Îles'),
(214, 'Tuvalu'),
(215, 'Ouganda'),
(216, 'Ukraine'),
(217, 'Émirats Arabes Unis'),
(218, 'Uruguay'),
(219, 'Ouzbékistan'),
(220, 'Vanuatu'),
(221, 'Venezuela'),
(222, 'Vietnam'),
(223, 'Îles Vierges Britanniques'),
(224, 'Îles Vierges des États-Unis'),
(225, 'Wallis et Futuna'),
(226, 'Sahara Occidental'),
(227, 'Yémen'),
(228, 'Zambie'),
(229, 'Zimbabwe'),
(230, 'Albanie'),
(231, 'Afghanistan'),
(232, 'Antarctique'),
(233, 'Bosnie-Herzégovine'),
(234, 'Bouvet, Île'),
(235, 'Océan Indien, Territoire Britannique de L'''),
(236, 'Bulgarie'),
(237, 'Caïmans, Îles'),
(238, 'Christmas, Île'),
(239, 'Cocos (Keeling), Îles'),
(240, 'Cook, Îles'),
(241, 'Guyane Française'),
(242, 'Polynésie Française'),
(243, 'Terres Australes Françaises'),
(244, 'Åland, Îles');

-- --------------------------------------------------------

--
-- Structure de la table `t_personne`
--

CREATE TABLE IF NOT EXISTS `t_personne` (
  `PERSONNE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) DEFAULT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Contenu de la table `t_personne`
--

INSERT INTO `t_personne` (`PERSONNE_ID`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(1, 'STROMAE', 'STROMAE', 'stromae', 'artiste', '', 'stromae@none.com', '0600000000'),
(2, 'THEOPHILUS_LONDON', 'Theophilus London', 'theophiluslondon', 'artiste', '', 'theophiluslondon@none.com', '0600000000'),
(3, 'BEAT_ASSAILANT', 'Beat Assailant', 'beatassailant', 'artiste', '', 'beatassailant@none.com', '0600000000'),
(4, 'EL_GARS', 'Laloum', 'laloum', 'utilisateur', '', 'laloumgael@none.com', '0600000000'),
(5, 'REMI_K', 'Koci', 'koci', 'utilisateur', '', 'remikoci@none.com', '0600000000'),
(7, 'NAAMAN', 'Naaman', 'naaman', 'artiste', '', 'naaman@none.com', '0600000000'),
(15, 'Fikce', 'Justin(e)', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/0002683278_10.jpg', 'fikce@justine.com', ''),
(16, 'BatBat', 'Diego Pallavas', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'batbat@diego.com', ''),
(28, 'adaba', 'babouin crew', '61809f85c4e74b413055b37ce999875d', 'organisateur', '', 'babouin@babouin.fr', '122212'),
(29, 'Gaell', 'aaaaaaaaaaa', '25f9e794323b453885f5181f1b624d0b', 'organisateur', '', 'laloum@gmail.com', '000'),
(20, 'Jules Carnage', 'Carnage Punk', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'organisateur', '', 'jules@carnage.com', ''),
(24, 'Kro\\''', 'KOCI', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/603126_4361516036972_52832129_n.jpg', 'remikoci@hotmail.fr', '0667031763'),
(30, 'gael.org', 'elgars oner', '25f9e794323b453885f5181f1b624d0b', 'organisateur', '', 'gaelorg@gmail.com', '0134562859'),
(31, 'Harouna', 'Matata', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', '', 'harouna@insta.fr', ''),
(32, 'Admin', 'Admin', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'admin', NULL, 'admin@concert.paris.fr', NULL),
(33, 'Gangstarr', 'Gang Starr', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'gangstarr@insta.fr', ''),
(35, 'BobbyMC', 'Bobby McFerrin', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/390e2cbe318872354a7b76f4c2282058.jpg', 'bobby@chatelet.fr', ''),
(36, 'Tigran', 'Tigran Hamasyan', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/ab12034b09b99b131ad410cd3a16c655.jpg', 'tigran@jazz.com', ''),
(37, 'LOTU', 'Lords Of The Underground', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', '', 'LOTU@macki.com', ''),
(38, 'RÃ©mi', 'RÃ©mi', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'url', 'remi@insta.fr', ''),
(48, 'GaÃ«l', 'LALOUM', '62f5e9d378bc27e065e67d8cb153d6a6', 'utilisateur', 'images/event/8d2777e08cbe6d72047045a89ef4864a.jpg', 'laloumgael@gmail.com', '0125364521'),
(49, 'Turnstile', 'Turnstile', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/701e047d60ae1cb9c77a4ccf4936796c.jpg', 'turnstile@hc.com', ''),
(50, 'AlexBBNG', 'BadBadNotGood', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'artiste', 'images/event/6ecef0c97674fba54c82240e5c064827.png', 'alex@bbng.com', ''),
(51, 'Zhong', 'Zheng', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/cab030f98273bc81d5bcd8160f79cff0.jpg', 'zhongou.zheng@gmail.com', ''),
(52, 'Jackie', 'Chan', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/4f0c89f6fbf4bebd28054553db8af84e.jpg', 'jackie@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_photo`
--

CREATE TABLE IF NOT EXISTS `t_photo` (
  `PHOTO_ID` int(6) NOT NULL AUTO_INCREMENT,
  `EVENEMENT_ID` int(6) NOT NULL,
  `GALLERIE_ID` int(6) NOT NULL,
  `PHOTO_Libelle` varchar(255) NOT NULL,
  `PHOTO_Url` varchar(255) NOT NULL,
  PRIMARY KEY (`PHOTO_ID`),
  KEY `EVENEMENT_ID` (`EVENEMENT_ID`),
  KEY `GALLERIE_ID` (`GALLERIE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `t_photo`
--

INSERT INTO `t_photo` (`PHOTO_ID`, `EVENEMENT_ID`, `GALLERIE_ID`, `PHOTO_Libelle`, `PHOTO_Url`) VALUES
(2, 5, 2, 'cover', 'images/event/b592267286519335291aabe128cd6228.jpg\n						'),
(3, 6, 3, 'cover', 'images/event/ac7f7ef4a5681b1f6178da0ee9acaa10.jpeg\n						'),
(4, 7, 4, 'cover', 'images/event/6b8fd709a613bfbe4ed633245d3d3596.jpg\n						'),
(5, 8, 5, 'cover', 'images/event/6cc18aaf9659699aa277f554f911ebcb.jpg\n						'),
(6, 9, 6, 'cover', 'images/event/6b27739184a94c3ab55568d250dd2a72.jpg\n						'),
(7, 10, 7, 'cover', 'images/event/a92e800dcc666d8060a41bebc27db65a.jpg\n						'),
(8, 11, 8, 'cover', 'images/event/390e2cbe318872354a7b76f4c2282058.jpg\n						'),
(9, 12, 9, 'cover', 'images/event/fq546qdsf4q6.jpg\r\n						'),
(10, 13, 10, 'cover', 'images/event/b28c16bd9971f09243bc4af158be2536.jpg\r\n						'),
(11, 14, 11, 'cover', 'images/event/7117f9c3b3d23a06dd7160ecf4fc4155.jpg\r\n						'),
(12, 15, 12, 'cover', 'images/event/cc2e79a8a0fb19b0a5f188fc02be2841.png\r\n						'),
(13, 16, 13, 'cover', 'images/event/0f14117fd0d2e30cdcf2a67fb505f441.jpg\r\n						'),
(14, 17, 14, 'cover', 'images/event/cc3c8ceac332c06b75b6a5e52642421a.jpg\r\n						'),
(15, 18, 15, 'cover', 'images/event/41f1566bd05ded72d4ddadf2eceb1533.jpg\r\n						'),
(16, 19, 16, 'cover', 'images/event/720915257f37cfb161747fe1efa3f13d.jpg\r\n						');

-- --------------------------------------------------------

--
-- Structure de la table `t_style`
--

CREATE TABLE IF NOT EXISTS `t_style` (
  `STYLE_ID` int(6) NOT NULL AUTO_INCREMENT,
  `STYLE_Libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`STYLE_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `t_style`
--

INSERT INTO `t_style` (`STYLE_ID`, `STYLE_Libelle`) VALUES
(1, 'ELECTRONIQUE'),
(2, 'JAZZ'),
(3, 'RAP'),
(4, 'HIP HOP'),
(6, 'PUNK'),
(7, 'HARDCORE');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE IF NOT EXISTS `t_utilisateur` (
  `PERSONNE_ID` int(6) NOT NULL,
  `UTILISATEUR_Datedenaissance` date DEFAULT NULL,
  `UTILISATEUR_Adresse` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Cp` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Ville` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Civilite` varchar(255) DEFAULT NULL,
  `UTILISATEUR_Prenom` varchar(255) DEFAULT NULL,
  `PERSONNE_Pseudo` varchar(255) DEFAULT NULL,
  `PERSONNE_Nom` varchar(255) DEFAULT NULL,
  `PERSONNE_Mdp` varchar(255) DEFAULT NULL,
  `PERSONNE_TypeUser` varchar(255) DEFAULT NULL,
  `PERSONNE_Photo` varchar(255) NOT NULL,
  `PERSONNE_Mail` varchar(255) DEFAULT NULL,
  `PERSONNE_Tel` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PERSONNE_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`PERSONNE_ID`, `UTILISATEUR_Datedenaissance`, `UTILISATEUR_Adresse`, `UTILISATEUR_Cp`, `UTILISATEUR_Ville`, `UTILISATEUR_Civilite`, `UTILISATEUR_Prenom`, `PERSONNE_Pseudo`, `PERSONNE_Nom`, `PERSONNE_Mdp`, `PERSONNE_TypeUser`, `PERSONNE_Photo`, `PERSONNE_Mail`, `PERSONNE_Tel`) VALUES
(4, '0000-00-00', '30 avenue de verdun', '95590', 'Presles', 'Mr', 'Gael', 'EL_GARS', 'Laloum', 'laloum', 'utilisateur', '', 'laloumgael@none.com', '0600000000'),
(5, '0000-00-00', '23 avenue de la pecherie', '95632', 'Meriel', 'Mr', 'Remi', 'REMI_K', 'Koci', 'koci', 'utilisateur', '', 'remikoci@none.com', '0600000000'),
(6, '0000-00-00', '132 Rue oberkampf', '75011', 'Paris', 'Mr', 'Jordan', 'JORD_C', 'Cochard', 'cochard', 'utilisateur', '', 'jodancochard@none.com', '0600000000'),
(24, '1992-02-18', '22 rue Charles Constantin', '78360', 'Montesson', 'Mr', 'RÃ©mi', 'Kro', 'KOCI', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/603126_4361516036972_52832129_n.jpg', 'remikoci@hotmail.fr', '0667031763'),
(31, '2014-04-01', '', '', '', '', 'Harouna', 'Harouna', 'Matata', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'url', 'harouna@insta.fr', ''),
(38, '2014-05-17', '', '', '', '', 'RÃ©mi', 'RÃ©mi', 'RÃ©mi', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'url', 'remi@insta.fr', ''),
(48, '0000-00-00', '30 Avenue de Verdun', '', 'Presles', '', 'GaÃ«l', 'GaÃ«l', 'LALOUM', '62f5e9d378bc27e065e67d8cb153d6a6', 'utilisateur', 'images/event/8d2777e08cbe6d72047045a89ef4864a.jpg', 'laloumgael@gmail.com', '0125364521'),
(51, '1993-10-14', '', '', '', '', 'Zhongou', 'Zhong', 'Zheng', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/cab030f98273bc81d5bcd8160f79cff0.jpg', 'zhongou.zheng@gmail.com', ''),
(52, '1954-04-07', '', '', '', '', 'Jackie', 'Jackie', 'Chan', 'b6edd10559b20cb0a3ddaeb15e5267cc', 'utilisateur', 'images/event/4f0c89f6fbf4bebd28054553db8af84e.jpg', 'jackie@gmail.com', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
