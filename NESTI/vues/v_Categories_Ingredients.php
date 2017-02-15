<!--Sous-menu Catégories Ingrédients-->
<br><div>
    <ul class="categories">
        <?php
        foreach ($les_categories as $une_categorie) {
            $lib_cat_ing = $une_categorie['lib_cat_ing'];
        ?>
        <li>
            <?php   echo $lib_cat_ing;   ?>
        </li>
        <?php } ?>
    </ul>
</div>

