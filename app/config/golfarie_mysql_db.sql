-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : golfarie.mysql.db
-- Généré le :  lun. 21 sep. 2020 à 10:15
-- Version du serveur :  5.6.48-log
-- Version de PHP :  7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `golfarie`
--
CREATE DATABASE IF NOT EXISTS `golfarie` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `golfarie`;

-- --------------------------------------------------------

--
-- Structure de la table `advantages`
--

CREATE TABLE `advantages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `advantages`
--

INSERT INTO `advantages` (`id`, `title`, `content`) VALUES
(1, 'AVANTAGES MEMBRES PARCOURS 18 Trous', '1 invitation 18 Trous@\r\n10% sur le ProShop@\r\nTarifs préférentiels sur voiturettes, jetons, chariots@\r\nGratuité du parcours initiation Pitch & Putt@');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `author`, `date`, `image`) VALUES
(1, 'La tondeuse autonome de l’Ecogolf de l’Ariège, une première mondiale', 'L’appareil va permettre d’économiser un temps de travail de 21 heures par semaine, ce qui va donner plus de temps au jardinier pour travailler sur les zones un peu plus délicates, qui demandent une certaine attention. Par ailleurs, cet équipement fait passer de deux à trois tontes par semaine, ce qui permet de densifier le terrain et de le rendre de meilleure qualité.\r\nRetrouvez l\'intégralité de l\'article sur: https://www.sportmag.fr/occitanie/la-tondeuse-autonome-de-lecogolf-de-lariege-une-premiere-mondiale', 'L\'equipe de l\'écogolf', '2019-11-24 00:00:00', '98a3ede1f81b3f00.jpeg'),
(2, '36ème assemblée générale de l\'écogolf', 'Samedi 29 Février avait lieu la 36ème Assemblée Générale de notre Golf.\r\nNous tenons à remercier notre comptable et trésorier, M. Jean-François GAVELLE qui après de nombreuses années au service du golf prend une retraite bien méritée. Désormais notre gestion comptable sera effectuée par Mme. Virginie HOSCHEID.\r\nMerci à Mme Christine TEQUI, Présidente du conseil départemental de l\'Ariège, qui a pris part à nos travaux, en réitérant l\'engagement et le soutien du Département. Merci également à M. Jean-Paul CAZES, vice-Président de l’ADT pour sa présence, ainsi que M. Christian BERNARD, président du CDOS, qui a également pris la parole afin de proposer des idées et projets à notre Ecogolf.\r\nEnfin nous remercions l’ensemble des membres présents', 'L\'equipe de l\'écogolf', '2020-02-29 00:00:00', 'fbc29d9f735540de.jpg'),
(24, 'Coronavirus', 'En raison des décisions gouvernementales de fermer tous les lieux recevant du public, nous avons pris la sage décision de fermer notre structure hier et ce, jusqu\'à nouvel ordre. \r\nNous devons dans un souci sanitaire et de solidarité accepter et respecter ces consignes. \r\nLes événements programmés (compétitions, réunions, animations et cours) sont donc annulés ou, lorsque cela est possible, reportés à une date ultérieure. \r\nDans ce contexte, nous vous demandons de respecter ces consignes de fermeture et de ne pas venir sur la structure (parcours, practice, club-house et restaurant). \r\nNous faisons donc appel à l\'esprit citoyen et responsable de chacun, lequel nous permettra, nous l’espérons, d\'endiguer la propagation et la progression du virus et donc d\'envisager une réouverture rapide.\r\nNous comptons sur votre totale compréhension.\r\nCordialement.', 'L\'equipe de l\'écogolf', '2020-03-16 00:00:00', NULL),
(26, 'L’Ecogolf au temps du confinement  Bulletin N°2', 'J’espère que vous allez bien malgré les contraintes imposées par le confinement. Vous savez que #Restezchezvous rime avec #Golfezchezvous ! Continuez à penser golf et à vous entraîner chez vous avec toutes les vidéos disponibles sur internet.\r\nPour ma part, je suis aux côtés de notre greenkeeper et de l’équipe des jardiniers qui continuent à travailler sur le terrain. J’échange aussi avec les membres du Conseil d’administration sur différents sujets visant à l’amélioration de notre parcours.\r\nSuite à une première concertation sur le thème « Notre parcours et les conditions de jeu », nous avons pris les décisions suivantes en accord avec François notre greenkeeper :\r\nDiminuer la hauteur des roughs en général et nettoyer les zones de retombées des balles. Moins de hautes herbes au profit  d’un rough plus clément, reconnaissez que ce sera un avantage pour la plupart d’entre nous qui sommes souvent victimes d’un coup malheureux… La balle ne sera pas perdue ou du moins restera jouable.\r\nUtiliser de façon plus systématique, au moment de la tonte des greens, le fameux « Cup setter » pour éviter d’avoir des trous en forme de volcan.\r\nLe travail sur le terrain continue, François et son équipe sont toujours à pied d’œuvre. Différentes actions sont menées : mécanique, sablage, aération à lames, tontes de toutes les zones et débroussaillage... Mise en place également d’une première passe de thé bactérien sur les greens pour essayer de limiter la propagation de la fusariose.\r\nLes semis sur les travaux commencent à sortir… A la reprise, tout sera nickel. Le robot qui continue son apprentissage et apporte sa contribution en donnant à nos fairways belle allure. Pour illustrer mes propos, en PJ une idée de ce qui vous attend. Les journées sont toujours bien remplies.\r\nPour conclure, je terminerai une nouvelle fois par un grand merci à l’équipe des jardiniers pour le travail qu’ils effectuent dans un contexte compliqué pour tout le monde.A bientôt pour le prochain bulletin.', 'L\'equipe de l\'écogolf', '2020-04-02 00:00:00', '58eba4ad276e9ea6.jpg'),
(27, ' L’Ecogolf au temps du confinement  Bulletin N°3', 'Chers Membres, Chers Amis (es),Le confinement se poursuit et, pour l’instant, ni sa durée ni les conditions de sortie ne sont connues. Il nous faut donc encore patienter avant d’avoir le plaisir de mettre nos sacs de golf dans la voiture et de prendre la direction de notre parcours.Aujourd’hui, je voudrais revenir sur l’intervention du Centre de Formation Professionnelle et de Promotion Agricole (CFPPA) car il me parait nécessaire et intéressant que vous preniez la mesure du travail réalisé, qui se décline de la façon suivante.\r\nLa taille en 4 thèmes : Sécurité, Contenance, Cohabitation et Formation.\r\nAbattage ou démontage d’arbres morts et dangereux.\r\nTaille de formation des jeunes arbres.\r\nMise en valeur du patrimoine arboré de notre site.A votre retour que j’espère rapide vous pourrez apprécier l’excellence du travail effectué au cours de ce chantier école. Pour mémoire, je rappelle que c’est au travers de la convention de partenariat avec le CFPPA  Ariège-Comminges, qui  possède en son sein une filière de formation intitulée « Filière Arbres », que nous avons pu bénéficier de cette intervention. Une réussite tant sur le plan pédagogique que sur notre site.Pour bien comprendre et respecter le travail de nos jardiniers, vous trouverez en cliquant sur le lien ci-dessous l’interview de Patrice Bernard, intendant des golfs de Biarritz. (touche Ctrl + clic gauche) https://www.golfplanete.com/actualites/patrice-bernard-mon-message-aux-greenkeepers-et-aux-golfeurs-en-cette-periode-de-crise-sanitaire/\r\nFrançois et son équipe sont toujours à pied d’œuvre. Au programme de la semaine  (Je cite François):Toutes les opérations de tonte ont été effectuées, avec une baisse des roughs comme évoqué précédemment.\r\nSablage agronomique des greens (Mélange sable, amendement, argile).\r\nSablage d’une zone de fairway pour améliorer la planimétrie.\r\nDébut d’entretien du réseau d’arrosage.\r\nConcernant la fusariose présente sur certains greens, elle semble sous contrôle, d’autant que l’arrivée de journées ensoleillées devrait activer le processus.Je terminerai une nouvelle fois par un grand merci à l’équipe de nos jardiniers pour le travail qu’ils effectuent comme en témoignent les photos.\r\nA bientôt pour le prochain bulletin.', 'L\'equipe de l\'écogolf', '2020-04-07 00:00:00', '986e0ce90b24cfb3.jpg'),
(28, ' L’Ecogolf au temps du confinement  Bulletin N°4', 'Chers Membres, Chères Amies, Chers Amis,\r\nNous en savons plus depuis hier soir avec l’intervention du Président de la République sur la durée probable du confinement. Toutefois, nous ne pouvons pas encore donner de date précise sur la réouverture du parcours. En attendant, notre équipe notre équipe de jardiniers est toujours sur le pont, bien secondée par « Ginette » notre robot qui, inlassablement, arpente nos fairways avec une remarquable efficacité… (Pour l’anecdote, nos jardiniers l’ont baptisé « Ginette », ne me demandez pas pourquoi… ;)\r\nAujourd’hui je vais vous parler du trou 17. Il y a 2 ans, nous avions fait un essai en configuration PAR 4 sans résultat probant, soit par défaut de présentation du projet et de communication ou bien simplement par manque d’intérêt de la part des membres. Nous reprenons à présent ce projet. Ce bulletin est consacré au passage possible de ce trou de PAR 3 en PAR 4 pour le rendre plus aisé, à l’étude précise sur laquelle nous nous appuyons et à l’intérêt que nous aurions à le faire.\r\nLe trou 17 en PAR 4 : Un projet qui peut devenir une réalité à l’issue de la période d’essai.Après avoir consulté et reçu des membres du Conseil d’administration et de la commission sportive, un avis favorable à ce projet, j’ai pris également l’avis de : Notre Pro Thomas Pitiot : Je le cite « Au sujet du trou 17, les deux options proposées (PAR 3 plus court ou PAR 4) sont possibles et réalisables. A mon avis, l’une ou l’autre seront une bonne chose car elles rendront ce trou plus tolérant. Le passer en PAR 4 serait pour moi la meilleure solution, notre parcours passerait en PAR 72 total et cela nécessiterait un nouvel étalonnage des distances, du slope et du SSS » et également l\'avis de Laura Chemarin, chargée des relations avec les clubs à la FFG, mais qui s’exprime avant tout en tant que joueuse émérite (2 d’index). Je la cite « Si à la fin du parcours les joueurs sont confrontés à un PAR 3 délicat qui peut « gâcher » leur carte de score et leur plaisir, il peut être intéressant de modifier le trou en le rallongeant (puisque vous en avez la possibilité) et en le faisant passer en PAR 4.\r\nPour information l’index médian des licenciés en France est de 31.\r\nCela permettra peut-être aux joueurs de s’amuser plus sur la fin du parcours et également de leur donner la possibilité de tenter un birdie pour les plus en forme ; donc d’accentuer l’aspect jeu de golf ludique. \r\nPour l’aspect compétition, cela peut aussi être un vecteur de communication pour attirer les joueurs à venir tester ce nouveau trou et ce nouveau PAR.\r\nDe fait, vous passerez votre parcours d’un PAR 71 à un PAR 72, ce qui en soi n’est pas du tout un frein puisqu’une grande partie des golfs sont des PAR 72 et c’est souvent le PAR de référence utilisé. »\r\nSi nous adoptions cette nouvelle configuration, notre parcours gagnerait en distance en passant de 5 943 m à 6 129 m soit 186 m de plus.\r\nEn cliquant sur le lien ci-dessous, vous allez découvrir le plan du parcours réétalonné avec les distances réelles pour chaque trou. \r\nhttps://wetransfer.com/downloads/e1490edf13086ae3dde68186d7afdcb120200409164425/588bf4e123c23469e4a275e2eed719b320200409164449/f892ad  \r\n\r\nLes récentes modifications apportées sur notre parcours (hauteur des roughs, recul des hautes herbes, nettoyage des ronciers intrusifs) doivent le rendre plus ludique sans pour autant dénaturer son caractère. Le passage en PAR 4 si l’essai s’avère concluant, apportera également sa touche de confort de jeu.\r\nL’essai consistera à jouer ce trou 17 en format PAR 4 jusqu’à l’automne a priori uniquement pour les parties amicales.\r\n\r\nMerci à Alexis pour la rigueur et l’excellence de son travail.\r\nSouhaitons bon courage à toute l’équipe de nos jardiniers qui restent mobilisés malgré la conjoncture. \r\n A bientôt pour le prochain bulletin.\r\n\r\n\r\n', 'L\'equipe de l\'écogolf', '2020-04-14 00:00:00', 'b460b5333f34ad98.jpg'),
(29, 'L’Ecogolf au temps du confinement  Bulletin N°5', 'Chers Membres, Chères Amies, Chers Amis,\r\n\r\nJe vous sais de plus en plus impatients de revenir jouer sur votre parcours. Il faudra toutefois attendre encore quelques semaines. Le jour où nous pourrons rouvrir le golf sera un grand jour car cela signifiera que la pandémie est sur le recul. Ayons conscience malgré tout qu’il sera sans doute nécessaire d’appliquer des mesures telles que la distanciation sociale et les gestes barrières. Je vous mets le lien qui vous permettra d’écouter l’interview du 17 avril du vice-président de la FFG et d’en savoir plus sur l’action de la Fédération vis-à-vis des autorités et les mesures qu’elle prône :  https://www.lequipe.fr/Golf/Actualites/Journal-du-golf-en-live-avec-pascal-grizot/1127875\r\nLe but des travaux sur le parcours : Donner du plaisir en jouant…\r\nBulletin après bulletin, je vous tiens informés des travaux qui continuent sur le parcours. Le team des jardiniers, toujours à pied d’œuvre, vient d’accueillir le binôme des saisonnières, Madame Laetitia  Peauger et Madame Corinne Dubouch qui était déjà là l’année dernière. Je puis vous assurer que le parcours sera magnifique et toute l’équipe s’y emploie pour obtenir ce résultat.\r\nnous avons réalisé divers travaux toujours dans le but d’améliorer les conditions de jeu sur le18 trous mais aussi sur le compact. Le travail sur les ronciers les plus intrusifs se poursuit afin que le parcours reprenne ses droits et notamment sur notre compact trop souvent délaissé. C’est une chance pour nous que d’avoir un parcours compact, encore faut t’il le rendre plus attractif. Il y a trop de hautes herbes proches des greens qui viennent souvent pénaliser les joueurs pas encore confirmés, au risque de les rebuter. Pour l’instant nous sommes intervenus seulement sur les Tees 1 et 12. Pour la reprise le nécessaire aura été fait, pour le plaisir de tous et particulièrement les amateurs du Pitch & Putt. Merci pour vos nombreux témoignages de sympathie à l’égard des bulletins…à  bientôt pour le prochain.. ', 'L\'equipe de l\'écogolf', '2020-04-21 00:00:00', 'a022b5c77c0877fb.jpg'),
(30, 'L’Ecogolf au temps du confinement - Bulletin N°6', 'Chers Membres, Chères Amies, Chers Amis,\r\nLe début d’un déconfinement progressif se dessine. Cette échéance crée une perspective de reprise de l’activité dans des conditions que la Fédération Française de Golf fait valoir auprès des autorités pour une réouverture des parcours à compter du 12 mai. Pour l’heure, rien n’est acquis mais gardons espoir.\r\nAprès la fermeture imposée depuis le samedi 14 mars, la grande majorité des clubs français sont concernés par ce nouveau défi qui se présente : réussir le mieux possible la réouverture, notamment en termes de sécurité sanitaire, que chaque club devra offrir aux joueurs et au personnel.\r\nSi dans les précédents bulletins nous avons essentiellement évoqué le parcours, aujourd’hui, je souhaiterais aborder une question (que peut-être certains d’entre vous se posent) et vous parler des cotisations pendant la période du confinement.\r\nJe vous donnerai également des nouvelles concernant le restaurant et des mesures que Marisol va prendre pour répondre au cahier des charges imposé par les autorités.\r\nGOLFS FERMÉS : QUELLES CONSÉQUENCES SUR LES COTISATIONS ?\r\n Tout d’abord quelques mots sur l’impact du confinement sur notre trésorerie.\r\nComme évoqué dans les précédents bulletins, nos jardiniers sont à pied d’œuvre depuis le début de la crise, ce qui représente pour nous un effort de trésorerie de 19 700 euros.\r\nLe personnel d’accueil quant à lui est en chômage partiel. J’estime à ce jour que notre préjudice en recettes extérieures sera de 30 000 euros à minima, si la reprise est effective le 12 mai.\r\nNos seules ressources actuelles sont donc les cotisations. Or, la question qui peut se poser au regard de la crise que nous traversons est l’éventuel remboursement correspondant aux 2 mois de fermeture du club. Cette question m’inspire une double remarque :\r\n1) Il faut regarder l’abonnement comme un engagement sur une longue durée (1 an) et non l’associer à un coût mensuel, car il permet à chacun de jouer autant de fois qu\'il le souhaite à un tarif préférentiel par rapport au tarif green fee.\r\n2)  Nous pratiquons un sport d’extérieur qui est assujetti bien souvent aux aléas de la météo, qui peut impacter notre accès au parcours nous le savons bien, sans pour autant donner droit à une compensation…\r\nPour étayer mes propos je vous engage à cliquer sur le lien ci-dessous. Vous découvrirez les explications de François Illouz qui a exercé de hautes responsabilités à la FFG. Il est avocat, notamment spécialisé en droit du sport. Il aborde des considérations d’ordre juridique (le contrat qui lie le membre à son club et l’impact d’un cas de force majeure comme la crise du Covid-19) et économique (les emplois) tout en replaçant ces notions dans un cadre spécifique qui est celui de la nécessité de montrer son attachement à son club et au golf. Et donc de soutenir les deux !\r\nhttps://www.golfplanete.com/actualites/golfs-fermes-quelles-consequences-sur-les-cotisations-la-reponse-de-francois-illouz/\r\nJ’ai souhaité évoquer avec vous ce sujet qui n’a aucune raison d’être tabou, afin que vous puissiez tous prendre la mesure des conséquences économiques pour notre association.\r\nRESTAURANT DU GOLF : BONS CADEAUX ET « DRIVE »\r\nPour Marisol Pires, après 2 mois d’activité encourageante, le Covid 19 est venu perturber les premiers bons résultats. Nous avons pu découvrir et apprécier l’énergie débordante qu’elle a su déployer dès son arrivée. \r\nElle a d’ores et déjà pris des dispositions pour vous accueillir au mieux dès que cela sera possible.\r\nElle a également mis en place une boutique en ligne avec des chèques cadeaux (une aide pour sa trésorerie) .\r\nJe vous transmets le lien de son site internet ou vous trouverez tous les détails : https://www.restaurantlesterrassesdugolf.com/          \r\nPour terminer, permettez-moi de la citer : « Un grand merci pour votre soutien et prenez soin de vous. Marisol ».\r\nDernier mot sur la reprise, je devrais connaitre dans la semaine, les mesures que l’on devra appliquer. `\r\nIl y aura des contraintes qui vont perturber nos habitudes et notre routine…Il faudra faire avec et je compte sur vous pour bien respecter les futures règles et nous aider à réguler la mise en route, pour le confort et l’intérêt de tous.  \r\nA bientôt pour le prochain bulletin qui je l’espère me permettra de vous annoncer de bonnes nouvelles avec une date précise de réouverture de notre golf.', 'L\'equipe de l\'écogolf', '2020-04-30 00:00:00', NULL),
(31, 'L’Ecogolf au temps du confinement - Bulletin N°7', 'Chers Membres, Chères Amies, Chers Amis,\r\nEn préambule de ce nouveau bulletin, je souhaite évoquer immédiatement la réouverture possible du golf dès le 11 mai. Il n’y a pas de confirmation officielle à ce jour, juste une possibilité. La Fédération française de golf en coordination avec ses groupements professionnels œuvre sans relâche pour que le golf soit « dans le premier wagon » des rares sports dont la pratique soit autorisée. Des règles ont été proposées auprès des différents ministères. Il y a toujours des échanges constants avec le Ministère des Sports et les autres parties prenantes pour fixer les modalités d’application de la reprise. Ces modalités devraient être fixées réglementairement dans les prochains jours et validées par le Premier ministre dans son intervention du 7 mai. Reste à connaître ces préconisations et auxquelles il conviendra de se plier complètement. \r\nLes dispositions dans notre golf\r\nConscients de notre devoir de sécurité à l’égard du personnel, des golfeurs et de notre capacité à les protéger, nous avons pris toutes les mesures pour répondre au protocole sanitaire.\r\nSous réserve des dernières directives, voici notre futur mode de fonctionnement :\r\nAccueil : gants, lingettes, gel mis à disposition.\r\nDans l’attente de la pose de la future verrière, un écran plexiglas sera installé. Respect des mesures de distanciation, le flux entrant et sortant sera matérialisé.\r\nDépart : réservation en amont de votre venue.  Starter pour réguler, contrôler et rappeler les consignes.\r\nVoiturettes : une par personne. Elles seront désinfectées systématiquement en fin de journée.\r\nParcours : vous disposerez aux trous 1, 10 et 18 de gel hydro alcoolique.\r\nLes drapeaux ne seront pas enlevés, un système sera adapté sur la hampe pour récupérer la balle sans avoir à toucher le mat. Restauration : j’ai fait les démarches auprès de la Préfecture pour que le format « drive » proposé par Marisol Pires soit validé. Le protocole mis en place (voir PJ) devrait recevoir un avis favorable, ce qui serait pour nous une aubaine. Suite au dernier bulletin et à la proposition des chèques cadeaux par Marisol, vous avez été nombreux à réagir. Je vous transmets ses remerciements. Elle a été touchée pour votre élan de solidarité.\r\nVoilà dans les grandes lignes. Il est évident qu’il faudra s’adapter le moment venu, mais j’ai souhaité vous informer dès à présent du nouveau mode de vie qui vous attendra au club dès la reprise.\r\nJe suis conscient que ces mesures sont contraignantes, mais nous devrons les respecter scrupuleusement au risque de remettre en cause l’accès au parcours.\r\nLe travail sur le terrain continue\r\nNos jardiniers et notre robot continuent de s’employer de manière efficace pour que le parcours soit fin prêt le jour J.\r\nAprès les chantiers de terrassement et de nappage des trous 5 &17, nous sommes intervenus à hauteur du green du 7 où la présence de 3 souches empêchait l’accès de la tondeuse.\r\nPour faciliter l’entretien et rendre cette zone jouable sans être pénalisé, nous avons procédé à l’évacuation des souches concernées :\r\nPour terminer ayons un regard positif : en temps normal, vu les nuisances pour le jeu qu’occasionnent de tels  travaux, nous n’aurions pas pu réaliser les 3 chantiers du 5, 7 & 17. J’espère que vous y verrez un gain en qualité et confort de jeu. Ainsi se termine, je l’espère, mon avant dernier bulletin, avant cette reprise si spéciale mais tant attendue.\r\nPrenez soin de vous et patientez encore un peu.', 'L\'equipe de l\'écogolf', '2020-05-01 00:00:00', 'a70b1f29331b1d7c.jpg'),
(32, 'L’Ecogolf au temps du confinement - Bulletin N°8', 'Chers Membres, Chères Amies, Chers Amis,Les modalités de reprise du golf ont été validées officiellement par notre fédération jeudi soir 7 mai après la conférence de presse du Premier ministre. Elles complètent les consignes gouvernementales largement diffusées. Elles seront en vigueur du 11 mai au 1er juin prochains et seront éventuellement prolongées. Elles pourront également être revues au gré de l’évolution de la situation sanitaire et réglementaire.\r\nLes clubs conserveront une souplesse d’organisation selon trois principes à garder à l’esprit :  garantir le respect des gestes barrières, respecter la distanciation physique en toutes circonstances et interdire tout rassemblement de joueurs. Pour garantir une bonne rentrée, il conviendra de se plier complètement à ces 3 principes.\r\nLes dispositions dans notre golf.\r\nNous avons pris les mesures nécessaires pour répondre aux critères sanitaires.\r\nProtocole de fonctionnement :\r\nAccueil : 1 seule personne dans le proshop, écran, respect des mesures de distanciation, le flux entrant et sortant devra être respecté. Départ : Présence sur site 30’ avant - Réservation en amont de votre venue (les équipes de 4 sont autorisées) - Voiturettes : une par personne, exception faite pour les couples.  Parcours : Vous disposerez aux trous 1, 10 et 18 de gel hydroalcoolique.\r\nRestauration : Le restaurant du Golf a l’autorisation de fournir des plats à emporter. Les clients peuvent consommer les repas chez eux ou sur place à condition de gérer eux mêmes les mesures barrières, comme pour les mesures de restauration en entreprise. L’agencement de la terrasse a été configuré pour respecter les mesures de distanciation, comme vous pouvez le voir ci-dessous. L’accès à l’intérieur du restaurant sera interdit, les commandes se feront suivant le format classique du mode drive. Un comptoir a été installé a cet effet devant une fenêtre.', 'L\'equipe de l\'écogolf', '2020-05-08 00:00:00', 'dcee0cfa00c6f125.jpg'),
(33, 'L\'Open d\'Intermarché', 'Samedi 27 juin avait lieu l\'Open d\'Intermarché, dans le soleil et la bonne humeur. \r\nUn évènement qu\'il ne fallait pas manquer puisque comme chaque années, la générosité de la famille Latour était au rendez-vous. \r\nAu programme, buffet de produits locaux, gift de départ originaux, de nombreux lots à gagner que l\'on soit classé (voir photo) ou que l\'on participe au tirage au sort lors du diner de clôture. \r\nEn bref, une magnifique journée conviviale. ', 'L\'equipe de l\'écogolf', '2020-06-27 00:00:00', 'dd921d01f1146bbe.jpg'),
(34, 'L\'ECOGOLF passe en WinInOne ', 'Une nouvelle initiative est de nature à renforcer l’attractivité de notre golf. \r\nIl s’agit de la mise en place d’un « Trou en 1 » permanent, inauguré ce samedi 8 août. \r\nIl permettra aux joueurs qui auront la chance de réaliser un coup de golf parfait de gagner une magnifique dotation Apple d’une valeur de 4500€ et une qualification pour la finale qui se disputera cette année à Hawaï. \r\nNotre site est le second golf d’Occitanie à proposer cette opportunité, de quoi séduire les visiteurs extérieurs déjà au nombre de 8 000 par an.', 'L\'equipe de l\'écogolf', '2020-08-08 00:00:00', '6b1825357deafb2d.JPG'),
(35, 'LES VENDREDIS DU GOLF ', 'Ce vendredi 14 août aura lieu le 3ème vendredi du golf.\r\nScramble à deux sur 9 Trous en shot-gun avec animations culturelles et repas auberge espagnole. \r\nUn rendez-vous saisonnier convivial à ne pas manquer!', 'L\'equipe de l\'écogolf', '2020-08-12 00:00:00', 'fd68190f8ea915e5.jpg'),
(36, 'LA COUPE DE L\'ESPOIR', 'Le dimanche 16 août, se déroulera la Coupe de l’Espoir.\r\nCompétition 18 Trous Stableford\r\nLes droits de jeu de 10 € seront intégralement reversés à la Ligue contre le cancer.\r\nIl reste des places et vous pouvez vous inscrire dès à présent par retour de mail, ou auprès de l’accueil au 06.61.64.56.78\r\n\r\n ', 'L\'equipe de l\'écogolf', '2020-08-13 00:00:00', '27b2aaca37643b37.jpg'),
(37, 'RESULTATS DE LA COUPE DE L\'ESPOIR', 'Bonjour à toutes et à tous, amis golfeurs, \r\n\r\nDimanche 16 août avait lieu la 38ème Édition de la Coupe de l\'Espoir \r\n\r\nVoici un petit retour en image de cette belle journée et l\'occasion de féliciter les lauréats de cette compétition :\r\n\r\nMesdames GUITER Christiane 1ère Brut et 1ère Net, 1ère série, CADET Emmy, 1ère Brut 2ème série et SANCHEZ Marie-Hélène 1ère Net 2ème série.\r\n\r\nMessieurs BARRIOS Florentin 1er Brut et 1er Net 1ère Serie, CALVET Cyril, 1er BRUT 2ème Serie, PFISTER Jean-Louis, 1er BRUT 3ème série, BOUTEILLER Lucien 1er Net 2ème série et CAVALIE Lionel, 1er Net 3ème série.', 'L\'equipe de l\'écogolf', '2020-08-20 00:00:00', 'dd0da13140fa018f.jpg'),
(38, '2 ème TROPHEE CREDIT MUTUEL', 'Samedi 22 août 2020 aura lieu le 2ème Trophée Crédit Mutuel avec cocktail de remise des prix et groupe de musique. \r\nN’hésitez pas à vous inscrire dès à présent à l\'accueil de votre ECOGOLF de l\'Ariège\r\nTél : 05 61 64 56 78\r\nMél :  golf-club-de-lariege@wanadoo.fr', 'L\'equipe de l\'écogolf', '2020-08-20 00:00:00', '5ce415a2dc8b5c85.jpg'),
(39, 'RESULTAT DU 2ème TROPHEE CREDIT MUTUEL', 'Bonjour à toutes et à tous, amis golfeurs,\r\n\r\nHier, samedi 22 août avait lieu le 2ème Trophée Crédit Mutuel\r\n\r\nVoici un petit retour en image de cette agréable journée et l\'occasion de féliciter les lauréats de cette compétition :\r\n\r\nChez les dames:\r\n\r\n1ère Série : Mesdames Joséphine SURTEES et Joëlle BOUCHE, 1ère et deuxième BRUT et Madame Marie-France JAMES 1ère Net\r\n\r\n2ème Série : Mesdames Edith BORDALLO et Stéphanie MAURETTE 1ère et deuxième BRUT et Mesdames Françoise COUVRY-VENTELON et Ness MARTINEZ, 1ère et deuxième Net.\r\n\r\nChez les messieurs:\r\n\r\n1ère Série : Messieurs Eric GIRAULT et Jean Rouch 1er et deuxième Brut, et Messieurs Pierre CANAL et Jean Jacques BOUCHE, 1er et deuxième Net.\r\n\r\n2ème Série: Messieurs Thierry GIROTTO et Jean-Louis PFISTER 1er et deuxième Brut, et Messieurs Alain MAZZONETTO et Jean-Bertrand PIQUEMAL, 1er et deuxième Net.\r\n\r\n3ème Série : Messieurs Bernard MISTOU et Jérémy PARADIS 1er et deuxième Brut, et Messieurs Christian PORTET et Alexandre MONER, 1er et deuxième Net.', 'L\'equipe de l\'écogolf', '2020-08-23 00:00:00', 'c6dd73c6a2e0a5f3.jpg'),
(40, '5ème ETAPE DE PITCH & PUTT CLIPP OCCITANIE 2020', 'Samedi 29 août, aura lieu la 5ème étape du CLIPP Occitanie sur notre EcoGolf.\r\n\r\nFormule individuelle en Strockplay.\r\nShot-Gun à 10h00\r\nTous les clubs sont utilisables \r\n', 'L\'equipe de l\'écogolf', '2020-08-23 00:00:00', '1db6c1d4be19c220.jpg'),
(41, 'COUPE DU PRESIDENT 2020', ' Samedi 12 septembre avait lieu la Coupe du Président, l\'occasion pour nous de revenir en photos sur cet événement convivial et de féliciter une nouvelle fois nos lauréats:\r\n\r\n- Messieurs Lucas LANAU, jeune 1er prix du Kid Open 9 Trous.\r\nFélicitons également tous les jeunes golfeurs qui ont participé à cette coupe.\r\n\r\n- Mademoiselle Pauline MONTEGUT, grande gagnante du Kid Open 18 Trous mais aussi Monsieur Mathys Galfard et Mademoiselle Emmy CADET, qui sont également montés sur le podium du Kid Open 18 Trous.\r\n\r\n- Félicitations aussi à Mme Josephine SURTEES 1er Prix Brut Dame 1ère Serie, ainsi que Mme Anne-Catherine AUZIES 2ème Brut 1ère série Dame.\r\nMesdames Marie-France JAMES et Josy CASTROVIEJO, respectivement 1ère et deuxième Net des 1ère série dames.\r\n\r\n- Mesdames Sophie CUVELIER et Nathalie MEOLA, 1ère et deuxième Brut des 2ème série dames.\r\nEt pour finir avec nos lauréates, Mesdames Agnes EDELEIN et Anne GOMES nos 1ère et 2ème Net 2ème série dames.\r\n\r\n- Chez les Messieurs, nous tenons à féliciter Messieurs Paul DUBOIS et Jean-Baptiste ALMANDOZ 1er et 2ème Brut Hommes 1ère série.\r\nMessieurs José MORALES et Bernard MISTOU respectivement 1er et 2ème Net Hommes 1ère série.\r\n\r\n- Félicitons également Messieur François D\'HERBIGNY et Grégory WAVRANT, 1er et 2ème Brut Hommes 2ème série.\r\nEt Messieurs Laurent CIBIEL et Eric PARADIS, 1er et 2ème Net Hommes 2ème série.\r\n\r\n- Enfin, terminons par nos lauréats de la 3ème série Homme: Messieurs Francis BONNEL et Florian BOYER 1er et 2ème Brut Hommes 3ème série.\r\nEt Messieurs Michel EYCHENNE et Hervé CUVELIER nos 1er et 2ème Net Hommes 3ème série.\r\n\r\nApplaudissons également le remarquable coup de Monsieur Fabien GABARRE.\r\n\r\nLes grands gagnants de cette compétition qui verront leurs noms gravés sur la Coupe du Président 2020 sont Madame Josephine SURTEES et Monsieur Paul DUBOIS. ', 'L\'equipe de l\'écogolf', '2020-09-14 00:00:00', '84e16aab8fd36a65.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state` tinyint(3) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `state`) VALUES
(1, 'course', 1),
(2, 'practice', 1),
(3, 'compact', 1),
(4, 'car', 1),
(5, 'chariot', 1);

-- --------------------------------------------------------

--
-- Structure de la table `course_offers`
--

CREATE TABLE `course_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `promo` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `course_offers`
--

INSERT INTO `course_offers` (`id`, `name`, `promo`) VALUES
(1, 'Green Fee 18 Trous', NULL),
(2, 'Green Fee 9 Trous', NULL),
(3, 'Etudiant 18 T', NULL),
(4, 'Junior (-18 ans)', NULL),
(5, 'Carnet 10 GF 18 Trous', NULL),
(6, 'Compact Pitch & Putt Adulte', NULL),
(7, 'Carnet 10 parcours p&p', NULL),
(8, 'Baptême', 'Tous les dimanches de 10 heures à 12 heures, de juin à novembre, sur réservation.');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` mediumtext,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `logo` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_time`, `end_time`, `logo`) VALUES
(2, 'Coupe de la chandeleur', 'Scramble à 2', '2020-02-02 10:00:00', '2020-02-02 19:00:00', 0),
(3, '4ème HIVERNALES Pitch & Putt', 'Shot-Gun 11h', '2020-02-08 11:00:00', '2020-02-08 19:00:00', 0),
(4, 'Coupe de Carnaval', 'Scramble à 2', '2020-02-22 10:00:00', '2020-02-22 19:00:00', 0),
(5, 'Compétition de parrainage Ecole de Golf', 'Scramble à 2', '2020-03-07 10:00:00', '2020-03-07 19:00:00', 0),
(6, '5ème HIVERNALES Pitch & Putt', 'Shot-Gun 11h', '2020-03-14 11:00:00', '2020-03-14 19:00:00', 0),
(17, 'challenge BERNARD-SIMONET', 'quatre balles meilleure balle', '2020-06-20 09:00:00', '2020-06-20 19:00:00', 0),
(20, 'COUPE DES RESTOS DU COEUR', 'Stableford individuel', '2020-07-12 08:00:00', '2020-07-12 19:00:00', 0),
(22, '3ème vendredi du golf', 'Sramble à deux\r\nShot-Gun à 18h', '2020-08-07 18:00:00', '2020-08-07 21:00:00', 0),
(23, 'COUPE DE LA LIGUE CONTRE LE CANCER', 'Stableford individuel\r\nCompétition caritative', '2020-08-16 08:00:00', '2020-08-16 19:00:00', 0),
(24, '2ème TROPHEE CREDIT MUTUEL', 'Stableford individuel', '2020-08-22 08:00:00', '2020-08-22 19:00:00', 1),
(25, '4ème vendredi du golf', 'Scramble à deux\r\nShot-Gun sur 9 Trous', '2020-08-28 18:00:00', '2020-08-28 21:00:00', 0),
(26, 'TROPHEE CAISSE D EPARGNE', 'Stableford individuel', '2020-08-30 08:00:00', '2020-08-30 19:00:00', 1),
(28, 'TROPHEE GROUPAMA', 'Stableford individuel', '2020-09-27 08:00:00', '2020-09-27 19:00:00', 1),
(29, '1er OPEN MARTINEZ', '4 balles meilleure balle', '2020-10-03 08:00:00', '2020-10-03 19:00:00', 1),
(30, 'TROPHEE NAUDIN', 'Stableford individuel', '2020-10-11 08:00:00', '2020-10-11 19:00:00', 1),
(35, 'COUPE DU BEAUJOLAIS', '', '2020-11-21 08:00:00', '2020-11-21 19:00:00', 0),
(38, 'OPEN INTERMARCHE', 'Stableford', '2020-06-27 09:00:00', '2020-06-27 19:00:00', 0),
(39, 'TROPHEE MAESTRIA', 'Stableford individuel', '2020-09-06 08:00:00', '2020-09-06 19:00:00', 1),
(40, 'COUPE DU PRESIDENT', 'Strokeplay', '2020-09-12 08:00:00', '2020-09-12 19:00:00', 1),
(42, 'Circuit Séniors', 'Stableford individuel', '2020-10-05 08:00:00', '2020-10-05 19:00:00', 0),
(43, 'Circuit Séniors', 'Stableford individuel', '2020-10-06 08:00:00', '2020-10-06 19:00:00', 0),
(44, 'Circuit Séniors', 'Stableford individuel', '2020-10-07 08:00:00', '2020-10-07 19:00:00', 0),
(45, 'Circuit Séniors', 'Stableford individuel', '2020-10-08 08:00:00', '2020-10-08 19:00:00', 0),
(46, 'TROPHEE AGA', 'Stableford individuel\r\n', '2020-08-02 08:00:00', '2020-08-02 19:00:00', 0),
(47, '1ERE ETAPE CAPP PITCH AND PUTT', 'strokeplay 18 trous', '2020-06-13 11:00:00', '2020-06-13 19:00:00', 0),
(48, 'TROPHEE ORPI', 'Stableford individuel', '2020-07-19 08:00:00', '2020-07-19 19:00:00', 0),
(49, 'OPEN PAPAREMBORDE', '', '2020-09-09 08:00:00', '2020-09-09 19:00:00', 0),
(50, 'TROPHEE AXA FRANCIS BONNEL', '', '2020-10-24 08:00:00', '2020-10-24 19:00:00', 0),
(52, '1er Vendredi du golf', 'Scramble à deux\r\nShot-Gun sur 9 trous', '2020-07-17 18:00:00', '2020-07-17 21:00:00', 0),
(53, '2ème Vendredi du Golf', 'Scramble à deux\r\nShot-Gun sur 9 Trous', '2020-07-31 18:00:00', '2020-07-31 21:00:00', 0),
(54, 'CAPP 2020 Pitch & Putt', 'Strokeplay', '2020-08-01 11:00:00', '2020-08-01 13:00:00', 0),
(55, 'CAPP 2020 Pitch & Putt', 'Strokeplay', '2020-09-11 10:00:00', '2020-09-11 13:00:00', 0),
(56, 'Trophée Max ESPIAUT', '', '2020-09-26 10:30:00', '2020-09-26 12:40:00', 0),
(57, 'CAPP 2020 Pitch & Putt', 'Strokeplay', '2020-10-10 11:00:00', '2020-10-10 13:00:00', 0),
(58, 'KID OPEN', 'Compétition enfants', '2020-09-27 15:00:00', '2020-09-27 19:00:00', 0),
(59, 'KID OPEN', 'Compétition enfants', '2020-09-12 15:00:00', '2020-09-12 19:00:00', 0),
(60, 'KID OPEN', 'Compétition enfants', '2020-10-11 15:00:00', '2020-10-11 19:00:00', 0),
(61, 'TROPHÉE ARIÈGE TRÈS HAUT DÉBIT', '', '2020-10-18 10:00:00', '2020-10-18 19:00:00', 1),
(62, 'GRAND PRIX ECOGOLF Ariège-Pyrénées', 'Pour vous inscrire :\r\nhttps://www.weezevent.com/grand-prix-golf-ariege-pyrenees', '2020-11-07 08:00:00', '2020-11-07 19:00:00', 0),
(63, 'GRAND PRIX ECOGOLF Ariège-Pyrénées', '', '2020-11-08 08:00:00', '2020-11-08 17:00:00', 0),
(64, 'TROPHEE GUY BENAC PITCH & PUTT', '', '2020-09-26 10:00:00', '2020-09-26 12:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(10) UNSIGNED NOT NULL,
  `perm_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` float UNSIGNED NOT NULL,
  `comments` text,
  `course_offer_id` int(10) UNSIGNED DEFAULT NULL,
  `price_variable_id` int(10) UNSIGNED DEFAULT NULL,
  `subscriptions_id` smallint(5) UNSIGNED DEFAULT NULL,
  `service_id` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prices`
--

INSERT INTO `prices` (`id`, `price`, `comments`, `course_offer_id`, `price_variable_id`, `subscriptions_id`, `service_id`) VALUES
(1, 38, NULL, 1, 1, NULL, NULL),
(2, 48, NULL, 1, 2, NULL, NULL),
(3, 60, NULL, 1, 3, NULL, NULL),
(4, 30, NULL, 2, 1, NULL, NULL),
(5, 32, NULL, 2, 2, NULL, NULL),
(6, 39, NULL, 2, 3, NULL, NULL),
(7, 32, NULL, 3, 4, NULL, NULL),
(8, 22, NULL, 4, 4, NULL, NULL),
(9, 450, NULL, 5, 4, NULL, NULL),
(10, 10, NULL, 6, 7, NULL, NULL),
(11, 15, NULL, 6, 8, NULL, NULL),
(12, 90, NULL, 7, 7, NULL, NULL),
(13, 135, NULL, 7, 8, NULL, NULL),
(14, 750, NULL, NULL, 11, 1, NULL),
(15, 1150, NULL, NULL, 12, 1, NULL),
(16, 12, NULL, NULL, NULL, 2, NULL),
(17, 8, NULL, NULL, NULL, 3, NULL),
(18, 1180, NULL, NULL, 11, 4, NULL),
(19, 1930, NULL, NULL, 12, 4, NULL),
(20, 160, NULL, NULL, NULL, 5, NULL),
(21, 265, NULL, NULL, NULL, 6, NULL),
(22, 790, NULL, NULL, NULL, 7, NULL),
(23, 930, NULL, NULL, 11, 8, NULL),
(24, 1440, NULL, NULL, 12, 8, NULL),
(25, 230, NULL, NULL, NULL, 9, NULL),
(26, 650, NULL, NULL, NULL, 10, NULL),
(27, 430, '(Hors juillet et août)', NULL, NULL, 11, NULL),
(28, 2.5, NULL, NULL, 9, NULL, 1),
(29, 2, NULL, NULL, 10, NULL, 1),
(30, 6, NULL, NULL, 9, NULL, 2),
(31, 3, NULL, NULL, 10, NULL, 2),
(32, 15, NULL, NULL, 9, NULL, 3),
(33, 6, NULL, NULL, 9, NULL, 4),
(34, 3, NULL, NULL, 10, NULL, 4),
(35, 20, NULL, NULL, 9, NULL, 5),
(36, 15, NULL, NULL, 10, NULL, 5),
(37, 30, NULL, NULL, 9, NULL, 6),
(38, 25, NULL, NULL, 10, NULL, 6),
(39, 650, '/430 (hors juillet et août)', NULL, NULL, NULL, 7),
(40, 30, NULL, NULL, NULL, NULL, 8),
(41, 50, NULL, NULL, NULL, NULL, 9),
(42, 75, NULL, NULL, NULL, NULL, 10),
(43, 10, NULL, 8, 7, NULL, NULL),
(44, 15, NULL, 8, 8, NULL, NULL),
(45, 10, NULL, NULL, 10, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `prices_variables`
--

CREATE TABLE `prices_variables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prices_variables`
--

INSERT INTO `prices_variables` (`id`, `name`, `comments`) VALUES
(1, 'Basse Saison', 'Dec/Jan/Fev'),
(2, 'Mi Saison', 'Nov/Mars/Avril'),
(3, 'Haute Saison', 'Mai à Oct'),
(4, 'unset', NULL),
(5, '- 25 ans', NULL),
(6, '+25 ans', NULL),
(7, '- 18 ans', NULL),
(8, 'Adulte', NULL),
(9, 'Visiteurs', NULL),
(10, 'Membres', NULL),
(11, 'solo', NULL),
(12, 'couple', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'superadmin'),
(2, 'ecogolf-manager'),
(3, 'resto-manager'),
(4, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `role_perm`
--

CREATE TABLE `role_perm` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `perm_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `name`) VALUES
(1, 'Jetons practice'),
(2, 'Location chariot'),
(3, 'Location chariot électrique'),
(4, 'Location 1/2 série'),
(5, 'Location Voiturette 9 trous'),
(6, 'Location voiturette 18 trous'),
(7, 'Location annuel voitures'),
(8, 'Location emplacement chariot seul'),
(9, 'Location casier sac seul'),
(10, 'Location emplacement Chariot + location casier');

-- --------------------------------------------------------

--
-- Structure de la table `special_offers`
--

CREATE TABLE `special_offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `colorized` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `bold` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `displayed` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `special_offers`
--

INSERT INTO `special_offers` (`id`, `content`, `colorized`, `bold`, `displayed`) VALUES
(1, 'Pour toute prise de cotisation avant fin janvier 2020, une location de voiturette et une invitation 18 trous\r\nvous seront offerts', 0, 0, 1),
(2, 'Pour tout abonnement adulte, 10 jetons de practice offerts', 1, 0, 1),
(3, 'Possibilité d’acheter avant fin Mars 2020 :\r\n- 2 carnets de 10 voiturettes 18 trous à 190 € chacun\r\n\r\n- 2 carnets de 10 voiturettes 9 trous à 120 € chacun', 0, 0, 1),
(4, 'Offre duo : 2 green fees + 1 voiturette = 135 € au lieu de 150 €,  2 green fees + 2 chariots électriques = 135 € au lieu de 150 €\r\n', 0, 1, 1),
(5, 'Tarifs et abonnements stages : demandez à l’accueil\r\n\r\n', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `comments` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `name`, `comments`) VALUES
(1, 'Cotisation adulte', NULL),
(2, 'Droits de jeu 18T', NULL),
(3, 'Droits de jeu 9T', NULL),
(4, 'Abonnement adulte', NULL),
(5, 'Abonnement (-18 ans)', NULL),
(6, 'Abonnement (18-25 ans)', NULL),
(7, 'Abonnement(26-35 ans)', NULL),
(8, 'Double Abonnement', 'Sur présentation d’un justificatif de cotisation pleine sur Parcours 18 T'),
(9, 'Abonnement annuel Compact/Pitch&Putt', NULL),
(10, 'Abonnement annuel voiturettes', NULL),
(11, 'Abonnement 10 mois voiturettes', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`) VALUES
(1, 'ben', '$2y$10$TOF5LGDe/5G1.pHOg4lmLe8u7ft1p81qQmTcFXeoaJiYBtWSd0Ycy', 'ben@gmail.com'),
(2, 'Célia Sentenac Réou', '$2y$10$/rO27cR7xWBj.t97xtqXV.988TEUMezWUHPiCE4PpbDr9JO8ZcSVS', 'direction.sentenac.reou@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advantages`
--
ALTER TABLE `advantages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course_offers`
--
ALTER TABLE `course_offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Index pour la table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_offer_id` (`course_offer_id`),
  ADD KEY `price_variable_id` (`price_variable_id`),
  ADD KEY `subscriptions_id` (`subscriptions_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Index pour la table `prices_variables`
--
ALTER TABLE `prices_variables`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index pour la table `role_perm`
--
ALTER TABLE `role_perm`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `special_offers`
--
ALTER TABLE `special_offers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`,`user_email`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advantages`
--
ALTER TABLE `advantages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `course_offers`
--
ALTER TABLE `course_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `prices_variables`
--
ALTER TABLE `prices_variables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `special_offers`
--
ALTER TABLE `special_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`course_offer_id`) REFERENCES `course_offers` (`id`),
  ADD CONSTRAINT `prices_ibfk_2` FOREIGN KEY (`price_variable_id`) REFERENCES `prices_variables` (`id`),
  ADD CONSTRAINT `prices_ibfk_3` FOREIGN KEY (`subscriptions_id`) REFERENCES `subscriptions` (`id`),
  ADD CONSTRAINT `prices_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Contraintes pour la table `role_perm`
--
ALTER TABLE `role_perm`
  ADD CONSTRAINT `role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
