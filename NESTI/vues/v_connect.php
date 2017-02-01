<!--Formulaire de connexion-->
<h2>Connexion</h2>

<form name="form_connexion" method="POST" action="index.php?uc=login&action=valider_connexion">
    Login :        <input type="email"    name="login"   value="Votre email"><br><br>
    Mot de passe : <input type="password" name="mdp"><br><br>
    <input type="submit" name="valider" value="Connexion">
</form>

<?php


// On imagine que l'on a récupéré le hash dans la bdd   
    $mdp_dans_bdd = hash('sha256','boulet');
    echo $mdp_dans_bdd . '<br>';

    $login  = $_POST['login'];
    $mdp    = $_POST['mdp'];
    
    $mdp = hash('sha256',$mdp);
    echo $mdp . '<br>';
    
    if($mdp == $mdp_dans_bdd){
        echo 'Connexion réussie.';
    }else{
        echo 'Mauvais mot de passe.';
    }
?>