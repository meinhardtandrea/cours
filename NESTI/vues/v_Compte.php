<!--Formulaire dde gestion du compte utilisateur-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Gérer mon compte</h2>

<form name="form_compte" method="POST" action="index.php?uc=login&action=modifier_mon_compte">
    
    <b>Civilité : </b><span style="margin-right:50px "> <?php echo $civ; ?></span>
    <?php
    if( $civ == 'Madame'){
        echo '<input type="radio"    name="civ"   value="Madame" checked="checked"> Madame
              <input type="radio"    name="civ"   value="Mademoiselle"> Mademoiselle
              <input type="radio"    name="civ"   value="Monsieur"> Monsieur <br><br>';
    }elseif ( $civ == 'Mademoiselle'){
        echo '<input type="radio"    name="civ"   value="Madame"> Madame
              <input type="radio"    name="civ"   value="Mademoiselle" checked="checked"> Mademoiselle
              <input type="radio"    name="civ"   value="Monsieur"> Monsieur <br><br>';
    } else {
        echo '<input type="radio"    name="civ"   value="Madame"> Madame
              <input type="radio"    name="civ"   value="Mademoiselle"> Mademoiselle
              <input type="radio"    name="civ"   value="Monsieur" checked="checked"> Monsieur <br><br>';
    }?>

    <label for="nom"> Nom : </label>
    <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>"><br><br>
    
    <label for="prenom"> Prénom : </label>
    <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>"><br><br>
    
    <label for="adresse"> Adresse : </label>
    <input type="text" name="adresse" id="adresse" value="<?php echo $adresse; ?>"><br><br>
    
    <label for="cp"> Code postal : </label>
    <input type="text" name="cp" id="cp" value="<?php echo $cp; ?>"><br><br>
    
    <label for="ville"> Ville : </label>
    <input type="text" name="ville" id="ville" value="<?php echo $ville; ?>"><br><br>
    
    <label for="tel"> Téléphone : </label>
    <input type="text" name="tel" id="tel" value="<?php echo $tel; ?>"><br><br>
    
    <label for="login"> Email : </label>
    <input type="email" name="login" id="login" value="<?php echo $email; ?>"><br><br>
    
    <label for="mdp"> Mot de passe : </label>
    <a href="index.php?uc=login&action=changer_mdp">Changer mon mot de passe</a><br><br>
    
    <input type="submit" name="valider" value="Sauvegarder mes modifications">
</form>
</div>