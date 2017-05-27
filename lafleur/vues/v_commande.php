<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
    
    <h2 class="w3-center">Mes données personnelles :</h2>
    
    <div class="w3-content w3-container w3-padding-64">
        <form method="POST" action="index.php?uc=gererPanier&action=confirmerCommande">
            
            <input type="hidden" name="totalCommande" value="<?php echo $totalCommande; ?>"/>
            <p>
                <label for="nom">Nom Prénom * : </label><br>
                <input id="nom" type="text" name="nom" value="<?php echo $nom ?>" size="100" maxlength="100">
            </p>
            <p>
                <label for="rue">Rue * : </label><br>
                <input id="rue" type="text" name="rue" value="<?php echo $rue ?>" size="100" maxlength="100">
            </p>
            <p>
                <label for="cp">Code postal * : </label><br>
                <input id="cp" type="text" name="cp" value="<?php echo $cp ?>" size="100" maxlength="10">
            </p>
            <p>
               <label for="ville">Ville * : </label><br>
               <input id="ville" type="text" name="ville"  value="<?php echo $ville ?>" size="100" maxlength="100">
            </p>
            <p>
               <label for="mail">Email * : </label><br>
               <input id="mail" type="text"  name="mail" value="<?php echo $mail ?>" size ="100" maxlength="100">
            </p> 
            <br><br>
            <p>
               <input type="submit" value="Valider" name="valider" class="w3-button w3-black w3-round-xxlarge">
               <input type="reset" value="Annuler" name="annuler" class="w3-button w3-black w3-round-xxlarge"> 
            </p>
        </form>
    </div>
</div>





