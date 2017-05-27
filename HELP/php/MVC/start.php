<?php
$sql = 'SELECT * FROM menu WHERE idMenu = :idMenu';
$req = $bdd->prepare($sql);
$req->bindParam(':idMenu', $page, PDO::PARAM_STR);
$req->execute();
$data = $req->fetch();
$titre = $data['titre'];
$lien = $data['lien'];
$req->closeCursor();

if (isset($_GET["rec"])){
$rec = $_GET["rec"];
$sql = 'SELECT * FROM recette WHERE idRec = :idRec';
$req = $bdd->prepare($sql);
$req->bindParam(':idRec', $rec, PDO::PARAM_STR);
$req->execute();
$data = $req->fetch();
echo '<h1>'.$titre.' > '.$data['rec_titre'].'</h1>';
include($lien);
$req->closeCursor();
} else {
echo '<h1>'.$titre.'</h1>';
include($lien);
}
?>