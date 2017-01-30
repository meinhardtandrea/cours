<br><div>
     <ul class="categories">
        <?php
        foreach ($les_categories as $une_categorie) {
            $lib_cat_rec = $une_categorie['lib_cat_rec'];
        ?>
        <li>
            <?php   echo $lib_cat_rec;   ?>
        </li>
        <?php } ?>
    </ul>   
</div>

