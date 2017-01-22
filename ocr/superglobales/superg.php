<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>superG</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Variables superglobales</h1>  
        <pre>
            <?php
            echo 'Voici le POST :<br />';
            print_r($_POST);
            echo '<br />Voici le SESSION :<br />';
            print_r($_SESSION);

            ?>
        </pre>
        <h1>SESSIONS</h1>
        <p>Se connecter :</p>
        <form method="POST" action="superg.php">
            Ton nom : <input type="text" name="nom"/><br/><br/>
            Ton prénom : <input type="text" name="prenom"/><br/><br/>
            ton age : <input type="text" name="age"/><br/><br/>
            <input type="submit" name="valider" value="OK"/><br/><br/>
        </form>
        
        <?php
        if( isset( $_POST[ 'valider'])){
            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['age'] = $_POST['age'];
        }
        if( isset( $_SESSION[ 'prenom'])){
            echo 'Coucou ' . $_SESSION['prenom'] . ' ! ';
        }
        ?>
        
        <p>
           Tu es à l'accueil de mon site (superg.php). Tu veux aller sur une autre page ? 
        </p>
        <p>
            <a href="mapage.php">Lien vers mapage.php</a><br />
            <a href="monscript.php">Lien vers monscript.php</a><br />
            <a href="informations.php">Lien vers informations.php</a><br />
            <a href="destroy.php">Se déconnecter</a><br />
        </p>
        
    </body>
</html>
