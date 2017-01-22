<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Ma page d'accueil</h1>   
        
        <a href="url.php?nom=Meinhardt&amp;prenom=Andrea&amp;repeter=8">Dis-moi bonjour ? (Lien entre index.php et url.php)</a>
        <!--En html, le symbole & s'écrit $amp;-->
        
        <h2>Formulaire</h2>
        <form name="formulaire" method="POST" action="traitement.php" enctype="multipart/form-data">
            Nom :                <input type="text" name="nom" value="Ton nom"/><br/><br/>
            Prénom :             <input type="text" name="prenom" value="Ton prénom"/><br/><br/>
            Sexe :               <input type="radio" name="sexe" value="femme" id="femme"/><label for="femme">Femme</label>
                                 <input type="radio" name="sexe" value="homme" id="homme"/><label for="homme">Homme</label><br/><br/>
            Quelle est la couleur de tes yeux ?
            <select name="yeux">
               <option value="bleu">Bleu</option>
               <option value="vert">Vert</option>
               <option value="marron" selected="selected">Marron</option>
               <option value="noisette">Noisette</option>
               <option value="gris">Gris</option>
               <option value="violet">Violet</option>
            </select><br/><br/>
            
            Parmi ces aliments, lesquels aimes-tu ?
            <input type="checkbox" name="frites" id="frites"/><label for="frites"> Frites </label>
            <input type="checkbox" name="langue" id="langue"/><label for="langue"> Langue de boeuf </label>
            <input type="checkbox" name="huitre" id="huitre"/><label for="huitre"> Huîtres </label>
            <input type="checkbox" name="chocolat" id="chocolat"/><label for="chocolat"> Chocolat </label><br/><br/>
            
            Ton pseudo :       <input type="text" name="pseudo" value="Ton pseudo"/><br/><br/>
                               <input type="hidden" name="cacher" value="cacher"/>
            Ton mot de passe : <input type="password" name="mdp" value="Ton mot de passe"/><br/><br/>
            
            <textarea name="message" rows="8" cols="40">Votre message :</textarea><br/><br/>
            <input type="file" name="monfichier"/><br/><br/>
            
            <input type="submit" name="valider" value="Envoyer"/><br/><br/>
        </form>
        
    </body>
</html>

