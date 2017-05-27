<html>
    <head>
        <title>TP5</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
include('function.inc.php');
if(!isset($_POST['valider'])){
?>
    <form name="nbpremier" method="post" action="tp5.php">
        Entrez un nombre entier: <input type="text" name="nombre" /> 
        <input type="submit" name="valider" value="Valider" />
    </form>
<?php
} else {
$nombre = $_POST['nombre'];
$res = verif($nombre);
echo '<p>'.$nombre.' '.$res.'</p>';
}
?>
    </body>
</html>

