<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
    
    <h2 class="w3-center">Nos prestations :</h2>

    <div class="w3-content w3-container w3-padding-64">
        <?php foreach( $lesProduits as $unProduit) {
        $idProduit   = $unProduit['idProduit'];
        $libProduit  = $unProduit['libProduit'];
        $description = $unProduit['description'];
        $prix        = $unProduit['prix'];
        $image       = $unProduit['image']; ?>
        <div class="w3-row">
            <!-- 1ere partie :  -->
            <div class="w3-col m6 w3-hide-small w3-padding-large">
                <img src="images/fleurs/<?php echo $image; ?>" alt=image width="400"/>
            </div>
            <!-- 2eme partie :  -->
            <div class="w3-col m6 w3-hide-small w3-padding-large">
                <p><?php echo '<b>Composition ' . $libProduit . ' : </b>' . $description ; ?></p>
                <p><?php echo "<b>Prix : </b>" . $prix . " Euros" ?></p>
                <p>
                    <a href=index.php?uc=voirProduits&categorie=<?php echo $idCategorie ?>&produit=<?php echo $idProduit; ?>&action=ajouterAuPanier>
                        <img src="images/mettrepanier.png" TITLE="Ajouter au panier">
                    </a>
                </p>
            </div>
        </div>
        <hr>
        <?php }?>
    </div>

</div>
