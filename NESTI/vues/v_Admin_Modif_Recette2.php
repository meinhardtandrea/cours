<!--Modifier une fiche recette-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Modifier une fiche recette</h2>
<p class="chapo">Etape 2 : les ingrédients</p>

<?php echo 'Vous travaillez actuellement sur la recette intitulée <b>' . $titre_recette . '</b>.'; ?>
<br><br>
<hr>

<h3>Modifiez vos ingrédients</h3>
<?php 
foreach ( $mes_ingredients as $mon_ingredient) {
    $id_ingredient      = $mon_ingredient[ 'id_ing'];
    $lib_ingredient     = $mon_ingredient[ 'lib_ing'];
    $id_cat_ingredient  = $mon_ingredient[ 'id_cat_ing'];
    $lib_cat_ingredient = $mon_ingredient[ 'lib_cat_ing'];

    $mes_quantites = $pdo->getQuantites_MaRecette( $id_ingredient);
    foreach ( $mes_quantites as $ma_quantite) {
        $id_quantite    = $ma_quantite[ 'id_mes'];
        $quantite       = $ma_quantite[ 'quantite'];
    }?>
    
<form name="saisie_ingredients1" method="POST" action="index.php?uc=gestionAdmin&action=modifier_ingredients">
    <div>
        <input type="hidden" name="id_recette" value="<?php echo $id_recette; ?>"/>
        <input type="hidden" name="id_ingredient" value="<?php echo $id_ingredient; ?>"/>
        <label for="cat_ingredient">La catégorie correspondant à votre ingrédient : </label>
        <?php echo '
                <select name="id_cat_ingredient" id="cat_ingredient">
                    <option value="1" ' . ( $id_cat_ingredient == 1 ? 'selected="selected" ' : '') . '>Chocolat, biscuit et produit sucré</option>
                    <option value="2" ' . ( $id_cat_ingredient == 2 ? 'selected="selected" ' : '') . '>Fruit et légume</option>
                    <option value="3" ' . ( $id_cat_ingredient == 3 ? 'selected="selected" ' : '') . '>Herbe, épice et condiment</option>
                    <option value="4" ' . ( $id_cat_ingredient == 4 ? 'selected="selected" ' : '') . '>Oeufs, fromage et produit laitier</option>
                    <option value="5" ' . ( $id_cat_ingredient == 5 ? 'selected="selected" ' : '') . '>Pâte, riz, céréale et pain</option>
                    <option value="6" ' . ( $id_cat_ingredient == 6 ? 'selected="selected" ' : '') . '>Poisson et fruit de mer</option>
                    <option value="7" ' . ( $id_cat_ingredient == 7 ? 'selected="selected" ' : '') . '>Viande et charcuterie</option>
                </select>'; ?>
        <br><br>

        <label for="quantite"> Quantité : </label>                   
        <input type="number" name="quantite" min="0" id="quantite" value="<?php echo $quantite; ?>">

        <label for="lib_ingredient"> Libellé de l'ingrédient : </label>                   
        <input type="text" name="lib_ingredient" value="<?php echo $lib_ingredient; ?>">

        <input type="submit" name="modifier" value="Modifier" class="w3-button w3-black w3-round-xxlarge">
        <button class="w3-button w3-black w3-round-xxlarge"><a href='index.php?uc=gestionAdmin&action=modif_supprimer_ingredients&id_recette=<?php echo $id_recette; ?>&id_ingredient=<?php echo $id_ingredient; ?>&id_quantite=<?php echo $id_quantite; ?>'>Supprimer</a></button>
        <hr>
    </div>
</form>

<?php } ?>

<h3>Ajouter de nouveaux ingrédients</h3>
<form  name="saisie_ingredients2" method="POST" action="index.php?uc=gestionAdmin&action=modif_rajouter_ingredients">
    
    <input type="hidden" name="id_recette" value="<?php echo $id_recette; ?>"/>
   
    <div id="tous_mes_ingredients">
        <div  id="infos_ingredient" class="saisie_un_ingredient">
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
            
        </div>
    </div>
    <div class="w3-container">
        <p>
            <button type="button" onclick="onClickAjoutIngredient()" class="w3-button w3-black w3-round-xxlarge">+ Ajouter un ingrédient</button>
            <button type="button" onclick="onClickSupprimerIngredient()" class="w3-button w3-black w3-round-xxlarge">- Supprimer le dernier ingrédient</button>
            <input type="submit" name="sauvegarder" value="Sauvegarder mes modifications" class="w3-button w3-black w3-round-xxlarge">
        </p>
    </div>
</form>
<hr>        
<form name="saisie_ingredients3" method="POST" action="index.php?uc=gestionAdmin&action=finaliser_modif_ingredients">
    <input type="hidden" name="id_recette" value="<?php echo $id_recette; ?>"/>
    <input type="hidden" name="titre_recette" value="<?php echo $titre_recette; ?>"/>
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
        // Il ne reste plus que le premier ingrédient, on ne le supprime pas
        return false;
    }
    // Suppression du dernier ingrédient
    noeud_container.removeChild( noeud_container.lastChild);
}
</script>