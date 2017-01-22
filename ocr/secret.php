<!DOCTYPE html>
<html>
    <head>
        <title>Page protégée</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Verdict</h1>
        <?php
        if(isset($_POST['valider']))
        {
            if($_POST['mdp']=='kangourou')
            {
                echo "Mot de passe correct. Accès autorisé. <br /> Voici les codes d'accès : 2154-PLOU-9541-PMLK";
            }
            else
            {
                echo 'Le mot de passe est incorrect. Accès refusé ! ';
            }
        }
        else
        {
            echo 'Tapez le mot de passe pour accéder à la page.'; 
        }
        ?>
        
    </body>
</html>