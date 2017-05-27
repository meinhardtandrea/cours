<!--Modifier une fiche recette-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Modifier une fiche recette</h2>
<p class="chapo">Etape 1 : la recette</p>

<form name="saisie_recette" method="POST" action="index.php?uc=gestionAdmin&action=enregistrer_modif_recette">
    
    <input type="hidden" name="id_recette" value="<?php echo $id_recette; ?>"/>
    <input type="hidden" name="titre_recette" value="<?php echo $titre_recette; ?>"/>
        
    <?php echo 'Vous travaillez actuellement sur la recette intitulée <b>' . $titre_recette . '</b>.'; ?>
    <br><br>
    <hr>
    <label for="categorie_recette"> Sélectionnez la catégorie correspondant à votre recette : </label>
    <select name="categorie_recette" id="categorie_recette">
    <?php echo '
            <option value="1" ' . ( $id_cat_recette == 1 ? 'selected="selected" ' : '') . '> Base               </option>
            <option value="2" ' . ( $id_cat_recette == 2 ? 'selected="selected" ' : '') . '> Apéritif           </option>
            <option value="3" ' . ( $id_cat_recette == 3 ? 'selected="selected" ' : '') . '> Entrée             </option>
            <option value="4" ' . ( $id_cat_recette == 4 ? 'selected="selected" ' : '') . '> Plat               </option>
            <option value="5" ' . ( $id_cat_recette == 5 ? 'selected="selected" ' : '') . '> Dessert            </option>
            <option value="6" ' . ( $id_cat_recette == 6 ? 'selected="selected" ' : '') . '> Sauce              </option>
            <option value="7" ' . ( $id_cat_recette == 7 ? 'selected="selected" ' : '') . '> Classique          </option>
            <option value="8" ' . ( $id_cat_recette == 8 ? 'selected="selected" ' : '') . '> Enfant             </option>
            <option value="9" ' . ( $id_cat_recette == 9 ? 'selected="selected" ' : '') . '> Santé et bien-être </option>
            <option value="10" ' . ( $id_cat_recette == 10 ? 'selected="selected" ' : '').'> Végétarien         </option>
        '; ?>   

    </select><br><br>
    
    <label for="chapo_recette"> Rédigez un petit texte de présentation : </label>
    <br><textarea name="chapo_recette" rows="10" cols="50" id="chapo_recette"><?php echo $chapo_recette; ?></textarea><br><br>
    
    <label for="nb_pers"> Pour combien de personnes ? </label>
    <input type="number" name="nb_pers" min="1" id="nb_pers" value="<?php echo $nb_pers; ?>"><br><br>

    <label for="tps_prepa"> Le temps de préparation de votre recette : </label>
    <input type="time" name="tps_prepa" id="tps_prepa" value="<?php echo $tps_prepa; ?>"><br><br>

    <label for="tps_cuisson"> Le temps de cuisson : </label>                   
    <input type="time" name="tps_cuisson" id="tps_cuisson" value="<?php echo $tps_cuisson; ?>"><br><br>
    
    <label for="difficulte"> La difficulté : </label>
    <select name="difficulte" id="difficulte">
        <?php echo '
            <option value="1" ' . ( $difficulte == 1 ? 'selected="selected" ' : '') . '> très facile    </option>
            <option value="2" ' . ( $difficulte == 2 ? 'selected="selected" ' : '') . '> facile         </option>
            <option value="3" ' . ( $difficulte == 3 ? 'selected="selected" ' : '') . '> moyenne        </option>
            <option value="4" ' . ( $difficulte == 4 ? 'selected="selected" ' : '') . '> difficile      </option>
            <option value="5" ' . ( $difficulte == 5 ? 'selected="selected" ' : '') . '> très difficile </option>
        '; ?>   
    </select><br><br>
    
    <label for="text_recette">Décrivez les étapes de votre recette : </label> 
    <br><textarea name="text_recette" rows="10" cols="50" id="text_recette"><?php echo $text_recette; ?></textarea><br><br>
    
    <input type="submit" name="continuer" value="Passez à l'étape 2">

</form>

</div>
<script>
    $( function() {
		$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
		$( "#locale" ).on( "change", function() {
			$( "#datepicker" ).datepicker( "option",
				$.datepicker.regional[ $( this ).val() ] );
		});
	} );
</script>
