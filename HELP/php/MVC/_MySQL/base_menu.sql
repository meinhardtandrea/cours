CREATE TABLE menu (
    idMenu int(11) NOT NULL auto_increment,
    titre varchar(255) NOT NULL,
    lien varchar(255) NOT NULL,
   PRIMARY KEY (idMenu)
) ENGINE=InnoDB;

INSERT INTO menu (idMenu, titre, lien) 
VALUES ('1', 'Accueil', 'home.php');
INSERT INTO menu (idMenu, titre, lien) 
VALUES ('2', 'Recettes', 'recettes.php');
INSERT INTO menu (idMenu, titre, lien) 
VALUES ('3', 'Ingrédients', 'ingredients.php');
INSERT INTO menu (idMenu, titre, lien) 
VALUES ('4', 'Cours', 'cours.php');

CREATE TABLE recette (
    idRec int(11) NOT NULL auto_increment,
    rec_titre varchar(255) NOT NULL,
    rec_texte text NOT NULL,
   PRIMARY KEY (idRec)
) ENGINE=InnoDB;

INSERT INTO recette (idRec, rec_titre, rec_texte) 
VALUES ('1', 'Recette 1', 'Blablabla...');
INSERT INTO recette (idRec, rec_titre, rec_texte) 
VALUES ('2', 'Recette 2', 'Bliblibli...');