<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
    
    <h2 class="w3-center">Accès administrateur</h2>
    
    <div class="w3-content w3-container w3-padding-64">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?uc=administrer&action=validConnexion">
            
            <p>
                <label for="identifiant">Identifiant * : </label><br>
                <input id="identifiant" type="text" name="identifiant" size="100" maxlength="100">
            </p>
            <p>
                <label for="mdp">Mot de passe * : </label><br>
                <input id="mdp" type="password" name="mdp" size="100" maxlength="100">
            </p>
            <br><br>
            <p>
                <input type="submit" value="Me connecter" name="valider" class="w3-button w3-black w3-round-xxlarge">
            </p>
            
        </form>
    </div>
</div>

