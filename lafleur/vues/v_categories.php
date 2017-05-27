
<!--Boutons-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
    <h1>Voir notre catalogue</h1>
    <hr>
    <div class="w3-container">
        <p>
            <?php foreach( $lesCategories as $uneCategorie) {
            $idCategorie = $uneCategorie['idCategorie'];
            $libCategorie = $uneCategorie['libCategorie'];?>
            <a href=index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&action=voirProduits><button class="w3-button w3-black w3-round-xxlarge"><?php echo $libCategorie ?></button></a><?php }?>
        </p>
    </div>
    <hr>
</div>