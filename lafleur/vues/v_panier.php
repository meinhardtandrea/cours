<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px">
    
    <h2 class="w3-center">Mon panier :</h2>
    
    <div class="w3-content w3-container w3-padding-64">
        <?php 
        
        $id_mesProduits = [];
        $total = 0;
        
        foreach( $lesProduitsDuPanier as $unProduit) {
        $idProduit      = $unProduit['idProduit'];
        array_push( $id_mesProduits, $idProduit);
        $libProduit     = $unProduit['libProduit'];
        $description    = $unProduit['description'];
        $prix           = $unProduit['prix'];
        $prix           = (int)$prix;
        $total         += $prix ;
        $image          = $unProduit['image']; ?>
        
        <div class="w3-row">
            <!-- 1ere partie :  -->
            <div class="w3-col m6 w3-hide-small w3-padding-large">
                <img src="images/fleurs/<?php echo $image; ?>" alt=image width="200"/>
            </div>
            <!-- 2eme partie :  -->
            <div class="w3-col m6 w3-hide-small w3-padding-large">
                <p><?php echo '<b>Composition : </b>' . $libProduit ; ?></p>
                <p><?php echo "<b>Prix : </b>" . $prix . " Euros" ?></p>
                <p>
                    <a href="index.php?uc=gererPanier&produit=<?php echo $idProduit ?>&action=supprimerUnProduit" onclick="return confirm('Voulez-vous vraiment retirer cet article frais?');">
                        <img src="images/retirerpanier.png" TITLE="Retirer du panier" >
                    </a>
                </p>
            </div>
        </div>
        
        <?php }?>
    </div>
    
   
    <div>
        <p class="w3-center">
            <b>TOTAL de ma commande : </b><?php echo $total . " Euros"; ?>
        </p>
        <form name="passerCommande" method="POST" action="index.php?uc=gererPanier&action=passerCommande">
            <input type="hidden" name="totalCommande" value="<?php echo $total; ?>"/><br>
            <p class="w3-center">
                <a href=index.php?uc=gererPanier&action=passerCommande><button class="w3-button w3-black w3-round-xxlarge">Passer commande</button></a>
            </p>
        </form>
    </div>

</div>

