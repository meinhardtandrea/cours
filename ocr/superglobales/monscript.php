<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php
        echo 'Ton nom est ' . $_SESSION['nom'] . ' ! ';
        ?>   
    </body>
</html>