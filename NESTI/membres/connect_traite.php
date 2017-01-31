<?php
$bdd = new PDO('mysql:host=localhost;dbname=nesti', 'nesti_user', 'secret') ;

$sql1 = 'SELECT * FROM membres WHERE login=:login' ;

$reponse = $bdd->prepare($sql1) ;
$reponse->bindParam(':login', $login) ;
$reponse->execute() ;

$donnees = $reponse->fetch() ;

$mdp = 'toto' ;
$grail = 'M4Gthu56G' ;
hash('sha256', $mdp.$grail) ;
        
?>

