<!--Créer une fiche recette-->
<h2>Créer une fiche recette</h2>

<form name="saisie_recette" method="POST" action="index.php?uc=gestionAdmin&action=enregistrer_recette">
    
    <label for="titre_recette"> L'intitulé de votre recette : </label>
    <input type="text" name="titre_recette" id="titre_recette"><br><br>
    
    <label for="categorie_recette"> Sélectionnez la catégorie correspondant à votre recette : </label>
    <select name="categorie_recette" id="categorie_recette">
    
        <?php foreach ($les_categories as $une_categorie) {
            $id_cat_rec  = $une_categorie['id_cat_rec'];
            $lib_cat_rec = $une_categorie['lib_cat_rec']; ?>  
        
        <option value="<?php echo $id_cat_rec; ?>"> <?php echo $lib_cat_rec; ?> </option> 
        
        <?php } ?> 
    </select><br><br>
    
    <label for="chapo_recette"> Rédigez un petit texte de présentation : </label>
    <br><textarea name="chapo_recette" rows="10" cols="50" id="chapo_recette"> Présentez en quelques mots votre recette. </textarea><br><br>
    
    <label for="date"> Date : </label>
    <input type="date" name="date" id="date"><br><br>
    
    <label for="nb_pers"> Pour combien de personnes ? </label>
    <input type="number" name="nb_pers" min="1" id="nb_pers"><br><br>

    <label for="tps_prepa"> Le temps de préparation de votre recette : </label>
    <input type="time" name="tps_prepa" id="tps_prepa"><br><br>

    <label for="tps_cuisson"> Le temps de cuisson : </label>                   
    <input type="time" name="tps_cuisson" id="tps_cuisson"><br><br>
    
    <label for="difficulte"> La difficulté : </label>
    <select name="difficulte" id="difficulte">
        <option value="1"> très facile    </option>
        <option value="2"> facile         </option>
        <option value="3"> moyenne        </option>
        <option value="4"> difficile      </option>
        <option value="5"> très difficile </option>
    </select><br><br>
    
    <label for="text_recette">Décrivez les étapes de votre recette : </label> 
    <br><textarea name="text_recette" rows="10" cols="50" id="text_recette"> Décrivez étape par étape votre recette. </textarea><br><br>
    
    <input type="submit" name="continuer" value="Continuer"><br><br>

</form>
<script>
    $( function() {
		$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
		$( "#locale" ).on( "change", function() {
			$( "#datepicker" ).datepicker( "option",
				$.datepicker.regional[ $( this ).val() ] );
		});
	} );
</script>