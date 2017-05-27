<!--Créer une fiche recette-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Créer une fiche recette</h2>
<p class="chapo">Etape 2 : Saisissez vos ingrédients</p>
<hr>

<form name="saisie_ingredients" method="POST" action="index.php?uc=gestionAdmin&action=enregistrer_ingredients">
    
    <input type="hidden" name="id_recette" value=" <?php echo $id_recette; ?>"/>
    
    <div id="tous_mes_ingredients">
        <div id="infos_ingredient" class="saisie_un_ingredient">
            <label for="categorie_ingredient"> Sélectionnez la catégorie correspondant à votre ingrédient : </label>
            <select name="categorie_ingredient[]">
                <?php foreach ($les_categories as $une_categorie) {
                    $id_cat_ing  = $une_categorie['id_cat_ing'];
                    $lib_cat_ing = $une_categorie['lib_cat_ing']; ?> 
                <option value="<?php echo $id_cat_ing; ?>"> <?php echo $lib_cat_ing; ?> </option> <?php } ?>
            </select><br><br>
            
            <label for="quantite"> Quantité : </label>                   
            <input type="number" name="quantite[]" min="0">
            
            <label for="lib_ingredient"> Libellé de l'ingrédient : </label>                   
            <input type="text" name="lib_ingredient[]"><br><br>
            
            <hr>
        </div>
    </div>
    <div class="w3-container">
        <p><button type="button" onclick="onClickAjoutIngredient()" class="w3-button w3-black w3-round-xxlarge">+ Ajouter un ingrédient</button>
        <button type="button" onclick="onClickSupprimerIngredient()" class="w3-button w3-black w3-round-xxlarge">- Supprimer le dernier ingrédient</button></p>
        <hr>
    </div>
    <div class="w3-container">
        <p><input type="submit" name="continuer" value="Passez à l'étape 3"></p>
    </div>
    
</form>
</div>
<script>
function onClickAjoutIngredient() {
    // Premier ingrédient
    var noeud_type = document.getElementById("infos_ingredient");
    // Création du clone
    var noeud_clone = noeud_type.cloneNode(true);
    // L'id ne doit pas être dupliqué
    noeud_clone.id= "";
    // Vidage des valeurs des inputs du clone
    for( var i in noeud_clone.childNodes){
        var noeud = noeud_clone.childNodes[i];
        if( noeud.nodeName === 'INPUT'){
            noeud.value = '';
        }
    }
    // Ajout du clone à la fin du noeud container
    var noeud_container = document.getElementById("tous_mes_ingredients");
    noeud_container.appendChild( noeud_clone);
}

function onClickSupprimerIngredient() {
    var noeud_container = document.getElementById("tous_mes_ingredients");
    // Vérification du nombre d'ingrédients affichés
    var noeuds_ingredients= document.getElementsByClassName("saisie_un_ingredient");
    if( noeuds_ingredients.length <= 1){
        // Il ne reste plus que le premier ingrédient, on ne le supprimer pas
        return false;
    }
    // Suppression du dernier ingrédient
    noeud_container.removeChild( noeud_container.lastChild);
}
</script>