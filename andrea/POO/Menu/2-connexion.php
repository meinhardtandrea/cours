<?php
session_start();

if(isset($_POST['identifiant']) && isset($_POST['motdepasse'])){
    
    $filename_in= "2-bddinscr.txt";
    $f=  fopen($filename_in, "r");
    
    //preg_match($filename_in, );
    
    if($_POST['identifiant']=='' && $_POST['motdepasse']==''){
        $_SESSION['valider']='OK';
        header('location:2-coreussi.php');
    }
    else{
        echo "Erreur d'identification"; 
    }
}
else{
    echo'<form name="connexion" method="POST" action="' . $_SERVER['PHP_SELF'] . '">
            Identifiant : <input type="text" name="identifiant"/><br />
            Mot de passe : <input type="password" name="motdepasse"/><br /><br />
            <input type="submit" name="valider" value="Se connecter"/>
        </form>';   
}
?>