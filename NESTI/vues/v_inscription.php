<!--Formulaire d'inscription-->
<h2>Inscription</h2>

<p class="chapo">C'est gratuit (et ça le restera toujours)</p>

<form name="form_inscription" method="POST" action="index.php?uc=login&action=enregistrer_inscription">
    Login :                      <input type="text"     name="login"><br><br>
    Mot de passe :               <input type="password" name="mdp"><br><br>
    Retapez votre mot de passe : <input type="password" name="re_mdp"><br><br>
    Email :                      <input type="email"    name="email"><br><br>
    <input type="submit" name="valider" value="Inscription">
</form>