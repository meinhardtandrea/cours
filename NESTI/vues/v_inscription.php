<!--Formulaire d'inscription-->
<h2>Inscription</h2>

<p class="chapo">C'est gratuit (et ça le restera toujours)</p>

<form name="form_inscription" method="POST" action="index.php?uc=login&action=enregistrer_inscription">
    Civilité :                   <input type="radio"    name="civ"   value="Madame"> Madame
                                 <input type="radio"    name="civ"   value="Mademoiselle"> Mademoiselle
                                 <input type="radio"    name="civ"   value="Monsieur"> Monsieur <br><br>
    Nom :                        <input type="text"     name="nom">     <br><br>
    Prénom :                     <input type="text"     name="prenom">  <br><br>
    Adresse :                    <input type="text"     name="adresse"> <br><br>
    Code postal :                <input type="text"     name="cp">      <br><br>
    Ville :                      <input type="text"     name="ville">   <br><br>
    Téléphone :                  <input type="text"     name="tel">     <br><br>
    Email :                      <input type="email"    name="login">   <br><br>
    Mot de passe :               <input type="password" name="mdp">     <br><br>
    Retapez votre mot de passe : <input type="password" name="re_mdp">  <br><br>
    
    <input type="submit" name="valider" value="Inscription">
</form>