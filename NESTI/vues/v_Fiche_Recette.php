<!--Fiche recette-->

<?php
    foreach($les_recettes as $une_recette){
        $id_rec      = $une_recette['id_rec'];
        $titre_rec   = $une_recette['lib_rec'];
        $chapo_rec   = $une_recette['chapo_rec'];
        $date_rec    = $une_recette['date'];
        $nb_pers     = $une_recette['nb_pers'];
        $tps_prepa   = $une_recette['tps_prepa'];
        $tps_cuisson = $une_recette['tps_cuisson'];
        $difficulte  = $une_recette['difficulte'];
        $texte       = $une_recette['texte'];
        
?>
<div id="fiche_recette">
    
    <div id="img_recette">
        <img id="img_recette
            <?php  foreach($les_images as $une_image){
                $id_img      = $une_image['id_med'];
                $lib_img     = $une_image['lib_med'];
                $format      = $une_image['format'];
                echo $id_img ?>" src="images/<?php echo $lib_img . '.' . $format ?>" alt="<?php echo $lib_img ?>" title="<?php echo $lib_img ?>"/>
            <?php } ?>
    </div>
    <div>
        <h2><?php echo $titre_rec ?></h2>
        <p class="chapo"><?php echo $chapo_rec ?></p>
        <div>
            <!--Insérer icônes : nb_pers + tps de prépa + tps de cuisson + la difficulté de la recette-->
        </div>
        <p><?php echo $date_rec ?></p>
        <p class="sous-titre">Ingrédients :</p>
        <ul>
            <?php foreach($quantites_des_ingredients as $quantite_pour_un_ingredient){
                $lib_ing     = $quantite_pour_un_ingredient['lib_ing'];
                $quantite    = $quantite_pour_un_ingredient['quantite'];
                echo '<li>' . $lib_ing . '(' . $quantite . ')</li>'; } ?>
        </ul>
        <p class="sous-titre">Préparation :</p>
        <p><?php echo $texte ?></p>
    </div>
</div>
<?php    
}
?>


<!--Je pense qu'on n'en a pas besoin -->  
<!--
    foreach($les_ingredients as $un_ingredient){
        $id_ing      = $un_ingredient['id_ing'];
        $lib_ing     = $un_ingredient['lib_ing'];
    } -->    