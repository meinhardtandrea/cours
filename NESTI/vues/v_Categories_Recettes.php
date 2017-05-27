<!--Sous-menu Catégories Recettes-->
<br><div>
     <ul class="categories">
        <?php
        foreach ($les_categories as $une_categorie) {
            $id_cat_rec  = $une_categorie['id_cat_rec'];
            $lib_cat_rec = $une_categorie['lib_cat_rec'];
        ?>
         <li> 
            <a href="index.php?uc=gestionRecettes&action=voir_Recettes&categorie=<?php echo $id_cat_rec; ?>"><?php echo $lib_cat_rec; ?></a>
        </li>
        <?php } ?>
    </ul>   
</div>
