<!--Formulaire d'inscription-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Inscription</h2>

<p class="chapo">C'est gratuit (et ça le restera toujours)</p>

<form name="form_inscription" method="POST" action="index.php?uc=login&action=enregistrer_inscription">
    
    Civilité :      <input type="radio"    name="civ"   value="Madame"> Madame
                    <input type="radio"    name="civ"   value="Mademoiselle"> Mademoiselle
                    <input type="radio"    name="civ"   value="Monsieur"> Monsieur <br><br>
    
    <label for="nom"> Nom : </label>
    <input type="text" name="nom" id="nom"><br><br>
    
    <label for="prenom"> Prénom : </label>
    <input type="text" name="prenom" id="prenom"><br><br>
    
    <label for="adresse"> Adresse : </label>
    <input type="text" name="adresse" id="adresse"><br><br>
    
    <label for="cp"> Code postal : </label>
    <input type="text" name="cp" id="cp"><br><br>
    
    <label for="ville"> Ville : </label>
    <input type="text" name="ville" id="ville"><br><br>
    
    <label for="tel"> Téléphone : </label>
    <input type="text" name="tel" id="tel"><br><br>
    
    <label for="login"> Email : </label>
    <input type="email" name="login" id="login"><br><br>
    
    <label for="mdp"> Mot de passe : </label>
    <input type="password" name="mdp" id="mdp"><br><br>
    
    <label for="re_mdp"> Retapez votre mot de passe : </label>
    <input type="password" name="re_mdp" id="re_mdp"><br><br>
    
    <input type="submit" name="valider" value="Inscription">
</form>
</div>