<html>
    <head>
        <meta charset="UTF-8">
        <title>Les tableaux</title>
    </head>
    <body>
        <h1><b>Les tableaux</b></h1>
        
        
        
        <h2>Les tableaux simples</h2>
        <br>
        <?php
        /*commentaire sur plusieurs lignes*/
        //commentaire court
        $semaine=array('lundi','mardi','mercredi','jeudi','vendredi','samedi','dimanche');
        echo $semaine[0] . '<br/>'; //Affiche 'lundi'
        echo $semaine[1] . '<br/>'; //Affiche 'mardi'
        echo $semaine[2] . '<br/>'; //Affiche 'mercredi'
        echo $semaine[3] . '<br/>'; //Affiche 'jeudi'
        echo $semaine[4] . '<br/>'; //Affiche 'vendredi'
        echo $semaine[5] . '<br/>'; //Affiche 'samedi'
        echo $semaine[6] . '<br/>'; //Affiche 'dimanche'
        ?>
        <br>
                
        
        
        <h2>Les tableaux associatifs ou table de hachage (hash)</h2>
        <br>
        <p>Le tableau associatif pour stocker une adresse :</p>
        <br>
        <?php
        $coordonnées_completes=array();
              $coordonnées_completes['nom']='DUMONTEIL';
              $coordonnées_completes['prenom']='Nicolas';
              $coordonnées_completes['num']=19;
              $coordonnées_completes['rue']='rue Terral';
              $coordonnées_completes['cp']=34000;
              $coordonnées_completes['ville']='MONTPELLIER';
              echo $coordonnées_completes['nom'] . '<br/>'; //Affiche 'DUMONTEIL'
              echo $coordonnées_completes['prenom'] . '<br/>'; //Affiche 'Nicolas'
              echo $coordonnées_completes['num'] . ' ' . $coordonnées_completes['rue'] . '<br/>'; //Affiche '19 rue Terral'
              echo $coordonnées_completes['cp'] . ' ' . $coordonnées_completes['ville'] . '<br/>'; //Affiche '34000 MONTPELLIER'
        ?>
        <br>
        
        
        
        <p>Un tableau de tableaux</p>
        <br>
        <?php
        $adresse0=array(); //On définit d'abord la variable !
            //Faudrait compléter l'adresse commplète d'un contact 0
        
        $adresse1=array();
            //Faudrait également compléter l'adresse commplète d'un contact 1
        
        $adresse2=array();
            //Faudrait également compléter l'adresse commplète d'un contact 2
        
        $adresse3=array();
            //Faudrait également compléter l'adresse commplète d'un contact 3
        
        $adresse4=array();
            $adresse4['nom']='MEINHARDT';
            $adresse4['prenom']='Franck';
            $adresse4['num']=12;
            $adresse4['rue']='rue de la jolie fontaine';
            $adresse4['cp']=44000;
            $adresse4['ville']='NANTES';
            
        $repertoire=array($adresse0,$adresse1,$adresse2,$adresse3,$adresse4);
        echo $repertoire[4]['nom'] . ' ' . $repertoire[4]['prenom'] . '<br/><br/>';
        $adresseFranck=$adresse4;
        echo $adresseFranck['nom'] . ' ' . $adresseFranck['prenom'] . '<br/>';
        echo $adresseFranck['num'] . ' ' . $adresseFranck['rue'] . '<br/>';
        echo $adresseFranck['cp'] . ' ' . $adresseFranck['ville'] . '<br/>';
        ?>
        <br>
        
        
        
        <h2>La boucle foreach (pour chaque)</h2>
        <br>
        <a href="http://andrea.dev/cours_php/3_mon_repertoire.php">Voir mon petit répertoire.</a>
    </body>
</html>