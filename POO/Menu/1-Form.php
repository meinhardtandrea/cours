<html>
    <head>
        <title>Formulaire de contact</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="mes-styles.css" />
    </head>
    <body>
<nav>
    <div id="menu">   
      <ul id="onglets">
        <li class="active"><a href="Accueil.html"> Accueil </a></li>
        <li><a href="Nos_produits.html"> Nos produits </a></li>
        <li><a href="Entreprise.html"> Entreprise </a></li>
        <li><a href="2-inscription.php"> S'inscrire </a></li>
        <li><a href="2-connexion.php"> Se connecter </a></li>
        <li><a href="Contact.html"> Contact </a></li>
      </ul>   
    </div>
</nav><br>     
        
<form name="Contact" method="POST" action="1-traitement.php">
    Nom : <input type="text" name="nom"/><br/><br/>
    Prénom : <input type="text" name="prenom"/><br/><br/>
    Email : <input type="text" name="email"/><br/><br/>
    Tel : <input type="tel" name="tel"/><br/><br/>
    Votre message : <input type="textarea" name="message"/><br/><br/>
    <input type="submit" name="valider" value="Envoyer"/>
</form>
        
    </body>
</html>
    
    


