CREATE TABLE clients (
    client_id int(11) NOT NULL auto_increment,
    client_pseudo varchar(32) NOT NULL,
    client_mail varchar(255) NOT NULL,
    client_pwd varchar(40) NOT NULL,
    client_nom varchar(32) NOT NULL,
    client_prenom varchar(32) NOT NULL,
    client_tel int(13) NOT NULL,
   PRIMARY KEY (client_id)
) ENGINE=InnoDB;

INSERT INTO clients 
(client_id, client_pseudo, client_mail, client_pwd, client_nom, client_prenom, client_tel) VALUES 
('1', 'nico', 'nicolas@digiforge.fr', 'nico', 'HEBERT', 'Nicolas', '0467524872');


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