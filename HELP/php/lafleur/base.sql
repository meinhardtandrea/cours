CREATE TABLE produit (
    idProd int(11) NOT NULL auto_increment,
    description text NOT NULL,
    prix int(11) NOT NULL,
    image varchar(255) NOT NULL,
    idCat int(11) NOT NULL,
   PRIMARY KEY (idProd)
) ENGINE=InnoDB;

CREATE TABLE categorie (
    idCat int(11) NOT NULL auto_increment,
    libelle varchar(255) NOT NULL,
   PRIMARY KEY (idCat)
) ENGINE=InnoDB;

CREATE TABLE commande (
    idCom int(11) NOT NULL auto_increment,
    dateCommande date DEFAULT '0000-00-00' NOT NULL,
    nomClient varchar(255) NOT NULL,
    adresserueClient varchar(255) NOT NULL,
    cpClient varchar(255) NOT NULL,
    villeClient varchar(255) NOT NULL,
    mailClient varchar(255) NOT NULL,
   PRIMARY KEY (idCom)
) ENGINE=InnoDB;

CREATE TABLE contenir (
    idCont int(11) NOT NULL auto_increment,
    idProd int(11) NOT NULL,
    idCom int(11) NOT NULL,
   PRIMARY KEY (idCont)
) ENGINE=InnoDB;

CREATE TABLE Administrateur (
    idAdm int(11) NOT NULL auto_increment,
    nomAdmin varchar(255) NOT NULL,
    motdepasse varchar(255) NOT NULL,
   PRIMARY KEY (idAdm)
) ENGINE=InnoDB;

INSERT INTO Administrateur VALUES ('1', 'toto', 'toto');
INSERT INTO Administrateur VALUES ('2', 'titi', 'titi');