<?php
session_start();

if(isset($_POST['identifiant']) && isset($_POST['motdepasse'])){
    if($_POST['identifiant']=='carambar' && $_POST['motdepasse']=='barbapapa'){
        $_SESSION['valider']='OK';
        header('location:pageprotege.php');
    }
    else{
        echo "Erreur d'identification"; 
    }
}
else{
    echo'<form name="connexion" method="POST" action="' . $_SERVER['PHP_SELF'] . '">
            Identifiant : <input type="text" name="identifiant"/><br />
            Mot de passe : <input type="password" name="motdepasse"/><br /><br />
            <input type="submit" name="valider" value="Valider"/>
        </form>';   
}   
?>
