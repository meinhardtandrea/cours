<?php
include('inc/header.inc.php');
include('inc/fonctions.php');
?>
        <form name="formulaire" method="post" action="premiers.php">
            Entrez un nombre entre 1 et 10000: <br/><input type="text" name="num"/> <input type="submit" name="valider" value="OK"/>
        </form>

<?php
   		  if(isset($_POST['valider'])){
            $nombre=$_POST['num'];
            $verdict= premiers($nombre);
            echo $nombre.' '.$verdict;
        }
include('inc/footer.inc.php');
?>