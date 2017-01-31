<?php
setcookie('pseudo' , 'Minou' , time() + 365*24*3600 , null , null , false , true);
setcookie('pays' , 'France' , time() +365*24*3600 , null , null , false , true);
setcookie('pseudo' , 'Nounou' , time() + 365*24*3600 , null , null , false , true);
setcookie('pays' , 'Chine' , time() +365*24*3600 , null , null , false , true);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>cookie</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>COOKIE</h1>
        <?php
        if( isset($_COOKIE['pseudo']) AND isset($_COOKIE['pays']) ){
        echo 'Coucou ' . $_COOKIE['pseudo'] . ' !  Tu viens de ' . $_COOKIE['pays'] . ' ? ';
        }
        ?>
        
        
    </body>
</html>
