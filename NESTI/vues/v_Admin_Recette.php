<!--Créer une fiche recette-->
<h2>Créer une fiche recette</h2>

<form name="saisie_recette" method="POST" action="index.php?uc=gestionAdmin&action=enregistrer_recette">
    
    L'intitulé de votre recette :             <input type="text"   name="titre_recette"><br><br>
    
    Sélectionnez la catégorie correspondant à votre recette : 
    <select name="categorie_recette">
    
        <?php foreach ($les_categories as $une_categorie) {
            $id_cat_rec  = $une_categorie['id_cat_rec'];
            $lib_cat_rec = $une_categorie['lib_cat_rec']; ?>  
        
        <option> <?php echo $lib_cat_rec; ?> </option> 
        
        <?php } ?> 
    </select><br><br>
    
    Rédigez un petit texte de présentation :  <br><textarea        name="chapo_recette" rows="10" cols="50"> Présentez en quelques mots votre recette. </textarea><br><br>
    Date :                                    <input type="date"   name="date"       ><br><br>
    Pour combien de personnes ?               <input type="number" name="nb_pers"    ><br><br>
    Le temps de préparation de votre recette :<input type="time"   name="tps_prepa"  ><br><br>
    Le temps de cuisson :                     <input type="time"   name="tps_cuisson"><br><br>
    
    La difficulté :
    <select name="categorie_recette">
        <option> très facile    </option>
        <option> facile         </option>
        <option> moyenne        </option>
        <option> difficile      </option>
        <option> très difficile </option>
    </select><br><br>
    
    Décrivez les étapes de votre recette :    <br><textarea        name="text_recette" rows="10" cols="50"> Décrivez étape par étape votre recette. </textarea><br><br>
    
    <input type="submit" name="valider" value="Sauvegarder"><br><br>

</form>