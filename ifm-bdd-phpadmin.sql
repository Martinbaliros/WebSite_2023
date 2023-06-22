
CREATE database if not exists IFM;


CREATE TABLE IFM.personne (
  `id_personne` int NOT NULL AUTO_INCREMENT,
  `nomPersonne` varchar(45) NOT NULL,
  `prenomPersonne` varchar(45) NOT NULL,
  `dateNaissance` date NOT NULL,
  `Telephone` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`id_personne`)
) ;
CREATE TABLE IFM.hopitaux (
  `id_hopital` int NOT NULL AUTO_INCREMENT,
  `adresse` varchar(45) NOT NULL,
  `numeroTel` varchar(45) NOT NULL,
  PRIMARY KEY (`id_hopital`)
) ;

CREATE TABLE IFM.bracelet (
  `id_Bracelet` int NOT NULL AUTO_INCREMENT,
  `couleur` varchar(10) NOT NULL,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_Bracelet`),
  KEY `id_personne_idx` (`id_personne`),
  CONSTRAINT `id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ;
CREATE TABLE IFM.alerte (
  `id_alerte` int NOT NULL AUTO_INCREMENT,
  `libelle_alerte` varchar(45) NOT NULL,
  `id_bracelet` int NOT NULL,
  `id_hopital` int NOT NULL,
  `alertecol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_alerte`),
  KEY `id_hopital_idx` (`id_hopital`),
  KEY `id_bracelet_idx` (`id_bracelet`),
  CONSTRAINT `id_bracelett` FOREIGN KEY (`id_bracelet`) REFERENCES `bracelet` (`id_Bracelet`),
  CONSTRAINT `id_hopitals` FOREIGN KEY (`id_hopital`) REFERENCES `hopitaux` (`id_hopital`)
);
CREATE TABLE IFM.employe (
  `idemploye` int NOT NULL AUTO_INCREMENT,
  `poste_employe` varchar(45) DEFAULT NULL,
  `id_personne` int NOT NULL,
  `id_hopital` int NOT NULL,
  PRIMARY KEY (`idemploye`),
  KEY `id_personne_idx` (`id_personne`),
  KEY `id_hopitalss_idx` (`id_hopital`),
  CONSTRAINT `id_hopitalss` FOREIGN KEY (`id_hopital`) REFERENCES `hopitaux` (`id_hopital`),
  CONSTRAINT `id_personnesss` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ;
CREATE TABLE IFM.intervention (
  `idintervention` int NOT NULL AUTO_INCREMENT,
  `date_intervention` date DEFAULT NULL,
  `id_personne` int NOT NULL,
  `id_hopital` int NOT NULL,
  `duree_intervention` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idintervention`),
  KEY `id_pe;rsonne_idx` (`id_personne`),
  KEY `id_hopital_idx` (`id_hopital`),
  CONSTRAINT `id_hopital` FOREIGN KEY (`id_hopital`) REFERENCES `hopitaux` (`id_hopital`),
  CONSTRAINT `id_personnes` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ;
CREATE TABLE IFM.capteur (
  `id_Capteur` int NOT NULL AUTO_INCREMENT,
  `nomCapteur` varchar(45) NOT NULL,
  `typeCapteur` varchar(45) NOT NULL,
  `id_bracelet` int NOT NULL,
  PRIMARY KEY (`id_Capteur`),
  KEY `id_bracelet_idx` (`id_bracelet`),
  CONSTRAINT `id_bracelet` FOREIGN KEY (`id_bracelet`) REFERENCES `bracelet` (`id_Bracelet`)
) ;
CREATE TABLE `donnees` (
  `id_data` int NOT NULL AUTO_INCREMENT,
  `temps_donnee` datetime NOT NULL,
  `valeur_donnee` float(3,2) NOT NULL,
  `id_capteur` int NOT NULL,
  PRIMARY KEY (`id_data`),
  KEY `idcapteur_idx` (`id_capteur`),
  CONSTRAINT `idcapteur` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id_Capteur`)
) ;



