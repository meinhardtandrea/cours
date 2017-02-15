<!--Formulaire de connexion-->
<h2>Connexion</h2>

<form name="form_connexion" method="POST" action="index.php?uc=login&action=valider_connexion">
    Login :        <input type="email"    name="login"   value="Votre email"><br><br>
    Mot de passe : <input type="password" name="mdp"><br><br>
    <input type="submit" name="valider" value="Connexion">
</form>