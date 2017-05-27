CREATE TABLE clients (
    client_id int(11) NOT NULL auto_increment,
    client_pseudo varchar(38) NOT NULL,
    client_mail varchar(255) NOT NULL,
    client_pwd varchar(64) NOT NULL,
    client_nom varchar(32) NOT NULL,
    client_prenom varchar(32) NOT NULL,
    client_tel int(13) NOT NULL,
   PRIMARY KEY (client_id)
) ENGINE=InnoDB;

INSERT INTO clients 
(client_id, client_pseudo, client_mail, client_pwd, client_nom, client_prenom, client_tel) VALUES 
('1', 'nico', 'nicolas@digiforge.fr', '933f1501b5d0043af98b8c47e86446f31bc9d0f7edb8ed2cb8b15ff4cb9182ff', 'HEBERT', 'Nicolas', '0467524872');


CREATE TABLE commande (
    com_id int(11) NOT NULL auto_increment,
    com_nom varchar(255) NOT NULL,
    client_id int(11) NOT NULL,
    ing_id int(11) NOT NULL,
    pai_id int(11) NOT NULL,
    eta_id int(11) NOT NULL,
   PRIMARY KEY (com_id)
) ENGINE=InnoDB;


CREATE TABLE modepaiement (
    pai_id int(11) NOT NULL auto_increment,
    pai_nom varchar(255) NOT NULL,
   PRIMARY KEY (pai_id)
) ENGINE=InnoDB;


CREATE TABLE typeEtat (
    eta_id int(11) NOT NULL auto_increment,
    eta_nom varchar(255) NOT NULL,
   PRIMARY KEY (eta_id)
) ENGINE=InnoDB;


CREATE TABLE ingredients (
    ing_id int(11) NOT NULL auto_increment,
    ing_nom varchar(255) NOT NULL,
    med_id int(11) NOT NULL,
    ci_id int(11) NOT NULL,
   PRIMARY KEY (ing_id)
) ENGINE=InnoDB;


CREATE TABLE categorieIngredient (
    ci_id int(11) NOT NULL auto_increment,
    ci_nom varchar(255) NOT NULL,
   PRIMARY KEY (ci_id)
) ENGINE=InnoDB;


CREATE TABLE media (
    med_id int(11) NOT NULL auto_increment,
    med_nom varchar(255) NOT NULL,
    tm_id int(11) NOT NULL,
   PRIMARY KEY (med_id)
) ENGINE=InnoDB;


CREATE TABLE typeMedia (
    tm_id int(11) NOT NULL auto_increment,
    tm_nom varchar(255) NOT NULL,
   PRIMARY KEY (tm_id)
) ENGINE=InnoDB;


CREATE TABLE recette (
    rec_id int(11) NOT NULL auto_increment,
    rec_nom varchar(255) NOT NULL,
    rec_date date DEFAULT '0000-00-00' NOT NULL,
    rec_nb_pers int(11) NOT NULL,
    rec_temps tinyint(3) NOT NULL,
    rec_texte text NOT NULL,
    rec_difficulte tinyint(1) DEFAULT 5,
    med_id int(11) NOT NULL,
    cr_id int(11) NOT NULL,
   PRIMARY KEY (rec_id)
) ENGINE=InnoDB;


CREATE TABLE categorieRecette (
    cr_id int(11) NOT NULL auto_increment,
    cr_nom varchar(255) NOT NULL,
   PRIMARY KEY (cr_id)
) ENGINE=InnoDB;





CREATE TABLE categorie (
    CodeCateg int(11) NOT NULL auto_increment,
    NomCateg varchar(32) NOT NULL,
   PRIMARY KEY (CodeCateg)
) ENGINE=InnoDB;

INSERT INTO categorie (CodeCateg, NomCateg) VALUES ('1', 'Fruit');
INSERT INTO categorie (CodeCateg, NomCateg) VALUES ('2', 'Légumes');

CREATE TABLE produit (
    CodeProduit int(11) NOT NULL auto_increment,
    NomProduit varchar(32) NOT NULL,
    CategProduit int(32) NOT NULL,
   PRIMARY KEY (CodeProduit)
) ENGINE=InnoDB;

INSERT INTO produit (CodeProduit, NomProduit, CategProduit) VALUES ('1', 'Pomme', '1');
INSERT INTO produit (CodeProduit, NomProduit, CategProduit) VALUES ('2', 'Pomme de terre', '2');
INSERT INTO produit (CodeProduit, NomProduit, CategProduit) VALUES ('3', 'Poireau', '2');

CREATE TABLE classe (
    CodeClasse int(11) NOT NULL auto_increment,
    LibelleClasse varchar(32) NOT NULL,
   PRIMARY KEY (CodeClasse)
) ENGINE=InnoDB;

INSERT INTO classe (CodeClasse, LibelleClasse) VALUES ('1', 'Salle_1');
INSERT INTO classe (CodeClasse, LibelleClasse) VALUES ('2', 'Salle_2');


CREATE TABLE etudiant (
    NumEtu int(11) NOT NULL auto_increment,
    NomEtu varchar(32) NOT NULL,
    DateNaissanceEtu date DEFAULT '0000-00-00' NOT NULL,
    ClasseEtu int(32) NOT NULL,
   PRIMARY KEY (NumEtu)
) ENGINE=InnoDB;

INSERT INTO etudiant (NumEtu, NomEtu, DateNaissanceEtu, ClasseEtu) 
VALUES ('1', 'Hebert', '1975-08-08','1');
INSERT INTO etudiant (NumEtu, NomEtu, DateNaissanceEtu, ClasseEtu) 
VALUES ('2', 'Ortiz', '1985-09-10','2');
INSERT INTO etudiant (NumEtu, NomEtu, DateNaissanceEtu, ClasseEtu) 
VALUES ('3', 'Dupont', '1990-11-25','2');
