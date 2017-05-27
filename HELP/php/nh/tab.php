<?php
include('inc/header.inc.php');
?>
        <h2>Déterminez votre IMC et sachez quelle est votre corpulence d'un
point de vue médical</h2>
        <h3>Entrez les données suivantes </h3>
        <form name="formulaire" method="post" action="imc.php">
            Entrez votre prénom : <input type="text" name="prenom"/> <br/>
            Entrez votre taille (sous la forme 1.70) : <input type="text" name="taille"/> <br/>
            Entrez votre poids (en kilos) : <input type="text" name="poids"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        echo'Vos données entrées : '.'<br/>';
        if(isset($_POST['valider'])){
            foreach($_POST as $index=>$valeur){
                echo '- '.$index.' : '.$valeur.'<br/>';
            }
        }

include('inc/footer.inc.php');
?>