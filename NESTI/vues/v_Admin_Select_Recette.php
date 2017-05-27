<!--Sélectionner une fiche recette-->
<h2>Sélectionner une fiche recette</h2>

<form name="saisie_recette" method="POST" action="index.php?uc=gestionAdmin&action=modifier_recette">
    
    <label for="select_recette"> Sélectionnez la recette que vous souhaitez modifier : </label>
    <select name="select_recette" id="select_recette">
    
        <?php foreach ($les_recettes as $une_recette) {
            $id_recette    = $une_recette['id_rec'];
            $titre_recette = $une_recette['lib_rec']; ?>  
        
        <option value="<?php echo $id_recette; ?>"> <?php echo $titre_recette; ?> </option>
        
        <?php } ?> 
    </select><br><br>
    
    <input type="submit" name="continuer" value="Modifier la fiche recette">
</form>
