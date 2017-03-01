<!--Formulaire de connexion-->
<h2>Connexion</h2>

<form name="form_connexion" method="POST" action="index.php?uc=login&action=valider_connexion">
    
    <label for="login"> Login : </label>
    <input type="email" name="login" value="Votre email" id="login"><br><br>
    
    <label for="mdp"> Mot de passe : </label>
    <input type="password" name="mdp" id="mdp"><br><br>
    
    <input type="submit" name="valider" value="Connexion">
</form>