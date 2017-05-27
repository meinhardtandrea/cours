<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
    <h2>Changer mon mot de passe</h2>
    <p class="chapo">Saisissez votre nouveau mot de passe pour modifier vos identifiants </p>
    
    <form name="form_chgerMdp" method="POST" action="index.php?uc=login&action=enregistrer_new_mdp">
        
        <br><label for="mdp_actuel"> Mot de passe actuel : </label>
        <input type="password" name="mdp_actuel" id="mdp_actuel"><br><br>
        
        <label for="mdp_nouveau"> Nouveau mot de passe : </label>
        <input type="password" name="mdp_nouveau" id="mdp_nouveau"><br><br>
        
        <label for="mdp_confirm"> Confirmer le mot de passe : </label>
        <input type="password" name="mdp_confirm" id="mdp_confirm"><br><br>
        
        <input type="submit" name="valider" value="Sauvegarder">
    </form>
</div>