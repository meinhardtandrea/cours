<!--Fiche recette-->

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
            <ul>
                <li><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Pour <?php echo $nb_pers ?> personnes</li>
                <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Temps de préparation : <?php echo $tps_prepa ?></li>
                <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Temps de cuisson : <?php echo $tps_cuisson ?></li>
                <li>Difficulté : 
                    <?php
                    switch($difficulte){
                        case 1: echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'; break;
                        case 2: for($i=1 ; $i<=2 ; $i++){ echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'; } break;
                        case 3: for($i=1 ; $i<=3 ; $i++){ echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'; } break;
                        case 4: for($i=1 ; $i<=4 ; $i++){ echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'; } break;
                        case 5: for($i=1 ; $i<=5 ; $i++){ echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>'; } break;
                    } ?>
                </li>
            </ul>
        </div>
        <p>Publié le <?php echo $date_rec ?>.</p>
        <p class="sous-titre">Ingrédients :</p>
        <ul>
            <?php foreach($quantites_des_ingredients as $quantite_pour_un_ingredient){
                $quantite     = $quantite_pour_un_ingredient['quantite'];
                $libelle_ing  = $quantite_pour_un_ingredient['lib_ing'];
                echo '<li>' . $libelle_ing . ' (' . $quantite . ')</li>';} 
            ?>
        </ul>
        <p class="sous-titre">Préparation :</p>
        <p><?php echo $texte ?></p>
    </div>
</div>



     