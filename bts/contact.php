<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Nous contacter</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="fichier_style.css">
    </head>
    <body>
        <div id="content">
            <form name="form_contact" method="post" action="contact.php">
                <label for="nom">Nom : </label>
                <span class="error"></span>
                <input type="text" name="nom"><br>
                
                <label for="prenom">Prénom : </label>
                <span class="error"></span>
                <input type="text" name="prenom"><br>
                
                <label for="email">Email : </label>
                <span class="error"></span>
                <input type="email" name="email"><br>
                
                <label for="sujet">Sujet du message : </label>
                <span class="error"></span>
                <input type="text" name="sujet"><br>
                
                <label for="msg">Message : </label>
                <span class="error"></span>
                <textarea name="msg" rows="5" cols="8"></textarea>
            </form>
        </div>
    </body>
</html>
