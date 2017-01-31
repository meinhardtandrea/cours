<!DOCTYPE html>
<!--Les pages web contenant du php contiennent l'extension .php-->
<!--Une page PHP = Uune page HTML qui contient des instructions en langage PHP.-->
<!--Les instructions PHP sont placées dans une balise <?php ?> -->
<!--Pour afficher du texte en PHP, on utilise l'instruction echo -->
<!--Il est possible d'ajouter des commentaires en PHP pour décrire le fonctionnement du code. On utilise pour cela les symboles //  ou /* */ -->
<html>
    <head>
        <title>test</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>Page de test</h2>
        <?php
            echo'Bonjour "Pan Pan" ! ';
            //commentaire
            /*commentaire sur pluseirs lignes*/
        ?>
        <p>
            Cette page contient du code HTML avec des balises PHP.<br />
            Voici quelques petits tests :
        </p>
        
        <ul>
            <li style="color: blue;">Texte en bleu</li>
            <li style="color: red;">Texte en rouge</li>
            <li style="color: green;">Texte en vert</li>
        </ul>
    </body>
</html>

