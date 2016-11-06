<?php 
    //TOUJOURS placer le code COOKIE en 1er !!!
    if(isset($_POST['nom'])&& isset($_POST['prenom'])){
    
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    
    setcookie('identification[nom]',$nom);
    setcookie('identification[prenom]',$prenom);
    echo'<a href="Essai_cookie2.php">page suivante</a>';
    }
    else{
    echo'<form name="Inscription" method="POST" action="' . $_SERVER['PHP_SELF'] . '">
                Votre nom : <input type="text" name="nom"/> <br />
                Votre prenom : <input type="text" name="prenom"/> <br /><br />
                <input type="submit" name="valider" value="Envoyer"/>
         </form>';
    }
    ?>

<html>
    <head>
        <title>Cookie</title>
        <meta charset="UTF-8">
    </head>
    <body>
    </body>
</html>
