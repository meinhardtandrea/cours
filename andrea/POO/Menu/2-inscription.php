<?php

session_start();

if(isset($_POST['identifiant']) && isset($_POST['motdepasse'])){
    if($_POST['identifiant']=='carambar' && $_POST['motdepasse']=='barbapapa'){
        $_SESSION['valider']='OK';
        header('location:2-coreussi.php');
    }
    else{
        echo "Erreur d'identification"; 
    }
}
else{
    echo'
<form name="inscription" method="POST" action="2-increussi.php">
            Saisissez un identifiant : <input type="text" name="identifiant"/><br />
            Saisissez un mot de passe : <input type="password" name="motdepasse"/><br /><br />
            <input type="submit" name="valider" value="Inscription"/>
</form>';
}
?>
