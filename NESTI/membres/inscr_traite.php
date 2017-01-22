<?php
//$mdp_hache = sha256($_POST['mdp']) ;

$bdd = new PDO('mysql:host=localhost;dbname=nesti', 'nesti_user', 'secret') ;
$sql1 = 'INSERT INTO membres (login, mdp, email, date_inscr) VALUES (:login, :mdp, :email, CUREDATE())' ;
$reponse = $bdd->prepare($sql1) ;
//$reponse->bindParam(':id_membre', $id_membre, PDO::PARAM_INT) ;
$reponse->bindParam(':login', $login, PDO::PARAM_STR) ;
$reponse->bindParam(':mdp', $mdp, PDO::PARAM_STR) ;
$reponse->bindParam(':email', $email, PDO::PARAM_STR) ;
//$reponse->bindParam(':date_inscr', $date_inscr) ;
$reponse->execute() ;
?>
