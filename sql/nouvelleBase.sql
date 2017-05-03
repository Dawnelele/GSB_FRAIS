# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.42)
# Base de données: gsbv2
# Temps de génération: 2017-03-30 08:49:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table Etat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Etat`;

CREATE TABLE `Etat` (
  `id` char(2) NOT NULL,
  `libelle` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Etat` WRITE;
/*!40000 ALTER TABLE `Etat` DISABLE KEYS */;

INSERT INTO `Etat` (`id`, `libelle`)
VALUES
	('CL','Saisie clÃ´turÃ©e'),
	('CR','Fiche crÃ©Ã©e, saisie en cours'),
	('RB','RemboursÃ©e'),
	('VA','ValidÃ©e et mise en paiement');

/*!40000 ALTER TABLE `Etat` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table fichefrais
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fichefrais`;

CREATE TABLE `fichefrais` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `nbJustificatifs` int(11) DEFAULT NULL,
  `montantValide` decimal(10,2) DEFAULT NULL,
  `dateModif` date DEFAULT NULL,
  `idEtat` char(2) DEFAULT 'CR',
  PRIMARY KEY (`idVisiteur`,`mois`),
  KEY `idEtat` (`idEtat`),
  CONSTRAINT `fichefrais_ibfk_1` FOREIGN KEY (`idEtat`) REFERENCES `Etat` (`id`),
  CONSTRAINT `fichefrais_ibfk_2` FOREIGN KEY (`idVisiteur`) REFERENCES `Visiteur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fichefrais` WRITE;
/*!40000 ALTER TABLE `fichefrais` DISABLE KEYS */;

INSERT INTO `fichefrais` (`idVisiteur`, `mois`, `nbJustificatifs`, `montantValide`, `dateModif`, `idEtat`)
VALUES
	('001','201606',0,0.00,'2016-10-06','CL'),
	('001','201610',0,0.00,'2016-10-06','CR'),
	('002','201610',0,275.00,'2016-10-07','VA'),
	('002','201703',0,0.00,'2017-03-27','CR'),
	('a131','201510',0,30.00,'2017-03-27','RB'),
	('a131','201606',0,0.00,'2016-10-06','CL'),
	('a131','201610',0,150.00,'2016-10-07','VA'),
	('a131','201703',0,0.00,'2017-03-27','CR'),
	('a131','201710',0,50.00,'2017-03-27','RB');

/*!40000 ALTER TABLE `fichefrais` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table FraisForfait
# ------------------------------------------------------------

DROP TABLE IF EXISTS `FraisForfait`;

CREATE TABLE `FraisForfait` (
  `id` char(3) NOT NULL,
  `libelle` char(20) DEFAULT NULL,
  `montant` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `FraisForfait` WRITE;
/*!40000 ALTER TABLE `FraisForfait` DISABLE KEYS */;

INSERT INTO `FraisForfait` (`id`, `libelle`, `montant`)
VALUES
	('ETP','Forfait Etape',110.00),
	('KM','Frais KilomÃ©trique',0.62),
	('NUI','NuitÃ©e HÃ´tel',80.00),
	('REP','Repas Restaurant',25.00);

/*!40000 ALTER TABLE `FraisForfait` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table LigneFraisForfait
# ------------------------------------------------------------

DROP TABLE IF EXISTS `LigneFraisForfait`;

CREATE TABLE `LigneFraisForfait` (
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `idFraisForfait` char(3) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVisiteur`,`mois`,`idFraisForfait`),
  KEY `idFraisForfait` (`idFraisForfait`),
  CONSTRAINT `lignefraisforfait_ibfk_1` FOREIGN KEY (`idVisiteur`, `mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`),
  CONSTRAINT `lignefraisforfait_ibfk_2` FOREIGN KEY (`idFraisForfait`) REFERENCES `FraisForfait` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `LigneFraisForfait` WRITE;
/*!40000 ALTER TABLE `LigneFraisForfait` DISABLE KEYS */;

INSERT INTO `LigneFraisForfait` (`idVisiteur`, `mois`, `idFraisForfait`, `quantite`)
VALUES
	('001','201606','ETP',0),
	('001','201606','KM',0),
	('001','201606','NUI',0),
	('001','201606','REP',0),
	('001','201610','ETP',10),
	('001','201610','KM',20),
	('001','201610','NUI',30),
	('001','201610','REP',50),
	('002','201610','ETP',10),
	('002','201610','KM',20),
	('002','201610','NUI',30),
	('002','201610','REP',120),
	('002','201703','ETP',0),
	('002','201703','KM',0),
	('002','201703','NUI',0),
	('002','201703','REP',0),
	('a131','201510','REP',30),
	('a131','201606','ETP',0),
	('a131','201606','KM',0),
	('a131','201606','NUI',0),
	('a131','201606','REP',0),
	('a131','201610','ETP',10),
	('a131','201610','KM',10),
	('a131','201610','NUI',10),
	('a131','201610','REP',30),
	('a131','201703','ETP',0),
	('a131','201703','KM',0),
	('a131','201703','NUI',0),
	('a131','201703','REP',0),
	('a131','201710','REP',30);

/*!40000 ALTER TABLE `LigneFraisForfait` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table LigneFraisHorsForfait
# ------------------------------------------------------------

DROP TABLE IF EXISTS `LigneFraisHorsForfait`;

CREATE TABLE `LigneFraisHorsForfait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idVisiteur` char(4) NOT NULL,
  `mois` char(6) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idVisiteur` (`idVisiteur`,`mois`),
  CONSTRAINT `lignefraishorsforfait_ibfk_1` FOREIGN KEY (`idVisiteur`, `mois`) REFERENCES `FicheFrais` (`idVisiteur`, `mois`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `LigneFraisHorsForfait` WRITE;
/*!40000 ALTER TABLE `LigneFraisHorsForfait` DISABLE KEYS */;

INSERT INTO `LigneFraisHorsForfait` (`id`, `idVisiteur`, `mois`, `libelle`, `date`, `montant`)
VALUES
	(9,'002','201610','test','2016-02-02',50.00),
	(11,'002','201610','test','2016-10-01',150.00),
	(12,'002','201610','test','2016-03-01',75.00),
	(14,'a131','201610','test2','2016-10-01',75.00),
	(15,'a131','201610','test','2016-06-01',50.00),
	(16,'a131','201710','test2','2017-10-01',50.00);

/*!40000 ALTER TABLE `LigneFraisHorsForfait` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table Visiteur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Visiteur`;

CREATE TABLE `Visiteur` (
  `id` char(4) NOT NULL,
  `nom` char(30) DEFAULT NULL,
  `prenom` char(30) DEFAULT NULL,
  `login` char(20) DEFAULT NULL,
  `mdp` char(20) DEFAULT NULL,
  `adresse` char(30) DEFAULT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` char(30) DEFAULT NULL,
  `dateEmbauche` date DEFAULT NULL,
  `isComptable` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `Visiteur` WRITE;
/*!40000 ALTER TABLE `Visiteur` DISABLE KEYS */;

INSERT INTO `Visiteur` (`id`, `nom`, `prenom`, `login`, `mdp`, `adresse`, `cp`, `ville`, `dateEmbauche`, `isComptable`)
VALUES
	('001','root','root','root','root','coucou','','',NULL,1),
	('002','root2','root','root2','root',NULL,NULL,NULL,NULL,0),
	('a131','Villechalane','Louis','lvillachane','jux7g','8 rue des Charmes','46000','Cahors','2005-12-21',NULL),
	('a17','Andre','David','dandre','oppg5','1 rue Petit','46200','Lalbenque','1998-11-23',NULL),
	('a55','Bedos','Christian','cbedos','gmhxd','1 rue Peranud','46250','Montcuq','1995-01-12',NULL),
	('a93','Tusseau','Louis','ltusseau','ktp3s','22 rue des Ternes','46123','Gramat','2000-05-01',NULL),
	('b13','Bentot','Pascal','pbentot','doyw1','11 allÃ©e des Cerises','46512','Bessines','1992-07-09',NULL),
	('b16','Bioret','Luc','lbioret','hrjfs','1 Avenue gambetta','46000','Cahors','1998-05-11',NULL),
	('b19','Bunisset','Francis','fbunisset','4vbnd','10 rue des Perles','93100','Montreuil','1987-10-21',NULL),
	('b25','Bunisset','Denise','dbunisset','s1y1r','23 rue Manin','75019','paris','2010-12-05',NULL),
	('b28','Cacheux','Bernard','bcacheux','uf7r3','114 rue Blanche','75017','Paris','2009-11-12',NULL),
	('b34','Cadic','Eric','ecadic','6u8dc','123 avenue de la RÃ©publique','75011','Paris','2008-09-23',NULL),
	('b4','Charoze','Catherine','ccharoze','u817o','100 rue Petit','75019','Paris','2005-11-12',NULL),
	('b50','Clepkens','Christophe','cclepkens','bw1us','12 allÃ©e des Anges','93230','Romainville','2003-08-11',NULL),
	('b59','Cottin','Vincenne','vcottin','2hoh9','36 rue Des Roches','93100','Monteuil','2001-11-18',NULL),
	('c14','Daburon','FranÃ§ois','fdaburon','7oqpv','13 rue de Chanzy','94000','CrÃ©teil','2002-02-11',NULL),
	('c3','De','Philippe','pde','gk9kx','13 rue Barthes','94000','CrÃ©teil','2010-12-14',NULL),
	('c54','Debelle','Michel','mdebelle','od5rt','181 avenue Barbusse','93210','Rosny','2006-11-23',NULL),
	('d13','Debelle','Jeanne','jdebelle','nvwqq','134 allÃ©e des Joncs','44000','Nantes','2000-05-11',NULL),
	('d51','Debroise','Michel','mdebroise','sghkb','2 Bld Jourdain','44000','Nantes','2001-04-17',NULL),
	('e22','Desmarquest','Nathalie','ndesmarquest','f1fob','14 Place d Arc','45000','OrlÃ©ans','2005-11-12',NULL),
	('e24','Desnost','Pierre','pdesnost','4k2o5','16 avenue des CÃ¨dres','23200','GuÃ©ret','2001-02-05',NULL),
	('e39','Dudouit','FrÃ©dÃ©ric','fdudouit','44im8','18 rue de l Ã©glise','23120','GrandBourg','2000-08-01',NULL),
	('e49','Duncombe','Claude','cduncombe','qf77j','19 rue de la tour','23100','La souteraine','1987-10-10',NULL),
	('e5','Enault-Pascreau','CÃ©line','cenault','y2qdu','25 place de la gare','23200','Gueret','1995-09-01',NULL),
	('e52','Eynde','ValÃ©rie','veynde','i7sn3','3 Grand Place','13015','Marseille','1999-11-01',NULL),
	('f21','Finck','Jacques','jfinck','mpb3t','10 avenue du Prado','13002','Marseille','2001-11-10',NULL),
	('f39','FrÃ©mont','Fernande','ffremont','xs5tq','4 route de la mer','13012','Allauh','1998-10-01',NULL),
	('f4','Gest','Alain','agest','dywvt','30 avenue de la mer','13025','Berre','1985-11-01',NULL);

/*!40000 ALTER TABLE `Visiteur` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
