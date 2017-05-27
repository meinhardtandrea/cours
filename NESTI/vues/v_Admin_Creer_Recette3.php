<!--Créer une fiche recette-->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:50px;margin-bottom:50px">
<h2>Créer une fiche recette</h2>
<p class="chapo">Etape 3 : Saisissez le nom de votre fichier image</p>
<hr>

<form name="saisie_media" method="POST" action="index.php?uc=gestionAdmin&action=enregistrer_media">
    
    <input type="hidden" name="id_recette" value=" <?php echo $id_recette; ?>"/>
    
    <label for="nom_image"> Le nom de votre fichier image : </label>
    <input type="text" name="nom_image" id="nom_image"><br><br>
    
    <label for="format_image"> Le format de l'image : </label>
    <select name="format_image" id="format_image">
        <option value="png" > png  </option>
        <option value="jpg" > jpg  </option>
        <option value="jpeg"> jpeg </option>
        <option value="gif" > gif  </option>
        <option value="svg" > svg  </option>
        <option value="bmp" > bmp  </option>
        <option value="dib" > dib  </option>
    </select><br><br>
    
    <input type="submit" name="terminer" value="Terminer">

</form>
</div>
