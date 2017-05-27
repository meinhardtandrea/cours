<!--Sélectionner une fiche ingrédient-->
<h2>Sélectionner une fiche ingrédient</h2>

<form name="saisie_ingredient" method="POST" action="index.php?uc=gestionAdmin&action=modifier_ingredient">
    
    <label for="select_ingredient"> Sélectionnez l'ingrédient que vous souhaitez modifier : </label>
    <select name="select_ingredient" id="select_recette">
    
        <?php foreach ($les_ingredients as $un_ingredient) {
            $id_ingredient  = $une_recette['id_ing'];
            $titre_ingredient   = $une_recette['lib_ing']; ?>  
        
        <option value="<?php echo $id_ingredient; ?>"> <?php echo $titre_ingredient; ?> </option> 
        
        <?php } ?> 
    </select><br><br>
    
    <input type="submit" name="continuer" value="Modifier la fiche ingredient">
</form>

