<!DOCTYPE html>

<html>
    <head>
        <title>CB</title>
        <meta charset="UTF-8 unicode">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <form method="post" action="2_traiter.php">
            Choisissez votre moyen de paiement :
            <select name="choix">
               <option value="visa">Visa</option>
               <option value="mastercard">Mastercard</option>
            </select><br/><br/>
            Saisissez votre numéro de CB à 16 chiffres (sans espace): <input type="text" name="nombre">
            <input type="submit" name="valider" value="Valider">
        </form>
    </body>
</html>