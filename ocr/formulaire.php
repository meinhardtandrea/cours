<!DOCTYPE html>
<html>
    <head>
        <title>Formulaire</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Accès privé</h1>
        <form method="POST" action="secret.php">
            Donnez le mot de passe : <input type="password" name="mdp"/><br/><br/>
            <input type="submit" name="valider" value="Envoyer"/>
        </form>
        
    </body>
</html>