<!-- Menu -->
<div class="w3-top w3-hide-small" style="font-family: Amatic SC">
    <div class="w3-bar w3-xlarge w3-black  w3-hover-opacity-off">
        <a href="index.php?uc=accueil" class="w3-bar-item w3-button">ACCUEIL</a>
        <!-- Je clique sur INGRÉDIENTS et je découvre une liste de catégories ingrédients -->
        <div class="w3-dropdown-click">
            <button onclick="onClickIng()" class="w3-button w3-black">INGRÉDIENTS</button>
            <div id="Ing" class="w3-dropdown-content w3-bar-block w3-card-4">
                <?php
                $les_categories = $pdo->getCategories_Ingredients();
                foreach ($les_categories as $une_categorie) {
                    $lib_cat_ing = $une_categorie['lib_cat_ing'];
                    ?>
                    <a href="#" class="w3-bar-item w3-button"><?php echo $lib_cat_ing; ?></a>
                <?php } ?>
            </div>
        </div>
        <!-- Je clique sur RECETTES et je découvre une liste de catégories recettes -->
        <div class="w3-dropdown-click">
            <button onclick="onClickRec()" class="w3-button w3-black">RECETTES</button>
            <div id="Rec" class="w3-dropdown-content w3-bar-block w3-card-4">
                <?php
                $les_categories = $pdo->getCategories_Recettes();
                foreach ($les_categories as $une_categorie) {
                    $id_cat_rec = $une_categorie['id_cat_rec'];
                    $lib_cat_rec = $une_categorie['lib_cat_rec'];
                    ?>
                    <a href="index.php?uc=gestionRecettes&action=voir_Recettes&categorie=<?php echo $id_cat_rec; ?>" class="w3-bar-item w3-button"><?php echo $lib_cat_rec; ?></a>
                <?php } ?>
            </div>
        </div>
        <a href="index.php?uc=gestionCours" class="w3-bar-item w3-button">COURS</a>
        <!-- Admin + Compte s'affichent à la condition que l'utilisateur se soit connecté -->
        <?php
        if (isset($_SESSION['login'])) {
            echo '
                <div class="w3-dropdown-click">
                    <button onclick="onClickAdmin()" class="w3-button w3-black">ACCÈS ADMINISTRATEUR</button>
                    <div id="Admin" class="w3-dropdown-content w3-bar-block w3-card-4">
                        <a href="index.php?uc=gestionAdmin&action=voir_Categories_Admin&categorie=ingredient" class="w3-bar-item w3-button">Gérer une fiche ingrédient</a>
                        <a href="index.php?uc=gestionAdmin&action=voir_Categories_Admin&categorie=recette" class="w3-bar-item w3-button">Gérer une fiche recette</a>
                        <a href="index.php?uc=gestionAdmin&action=voir_Categories_Admin&categorie=cours" class="w3-bar-item w3-button">Gérer les cours</a>
                    </div>
                </div>';
            echo '<a href="index.php?uc=login&action=gerer_mon_compte" class="w3-bar-item w3-button">COMPTE</a>';
        }
        ?>
        <!-- Login -->
        <a href="index.php?uc=login&action=je_veux_minscrire" class="w3-bar-item w3-button">S'INSCRIRE</a>
        <a href="index.php?uc=login&action=je_veux_me_connecter" class="w3-bar-item w3-button">SE CONNECTER</a>
        <?php
        if (isset($_SESSION['login'])) {
            echo '<a href="index.php?uc=login&action=je_veux_me_deconnecter" class="w3-bar-item w3-button">SE DÉCONNECTER</a>';
        }
        ?>
    </div>
</div>

<!-- Header avec image -->
<header class="bgimg w3-display-container w3-grayscale-min">
    <div class="w3-display-middle w3-center">
        <a href="index.php?uc=accueil"><img src="images/nesti.png" alt="Logo Nesti" title="Logo Nesti"/></a>
    </div>
</header>

<div>