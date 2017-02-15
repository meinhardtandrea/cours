<!--Fiche recette-->

<div id="fiche_recette">
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
    }
    
    //à faire : créer une fonction ds la class PDO pour récupérer les ingrédients de la recette
    foreach($les_ingrédients as $un_ingrédient){
        $id_ing      = $un_ingredient['id_ing'];
        $lib_ing     = $un_ingredient['lib_ing'];
    }
    
    //à faire : créer une table media ds la BDD + créer une fonction ds la classe PDO pour récupérer 
    foreach($les_images as $une_image){
        $id_img      = $une_image['id_img'];
        $src_img     = $une_image['src_img'];
        $alt_img     = $une_image['alt_img'];
        $title_img   = $une_image['title_img'];
    }
    ?>
    <div id="img_recette">
        <img id="<?php echo $id_img ?>" src="<?php echo $src_img ?>" alt="<?php echo $alt_img ?>" title="<?php echo $title_img ?>"/>
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
            <li></li>
        </ul>
        <p class="sous-titre">Préparation :</p>
        <p><?php echo $texte ?></p>
    </div>
</div>
