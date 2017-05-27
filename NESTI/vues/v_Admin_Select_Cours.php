<!--Sélectionner un cours-->
<h2>Sélectionner un cours</h2>

<form name="saisie_cours" method="POST" action="index.php?uc=gestionAdmin&action=modifier_cours">
    
    <label for="select_cours"> Sélectionnez le cours que vous souhaitez modifier : </label>
    <select name="select_cours" id="select_cours">
    
        <?php foreach ($les_cours as $un_cours) {
            $id_cours  = $une_recette['id_cours'];
            $titre_cours   = $une_recette['lib_cours']; ?>  
        
        <option value="<?php echo $id_cours; ?>"> <?php echo $titre_cours; ?> </option> 
        
        <?php } ?> 
    </select><br><br>
    
    <input type="submit" name="continuer" value="Modifier le cours">
</form>