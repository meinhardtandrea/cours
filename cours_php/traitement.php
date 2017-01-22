<?php
$filename_out= "Formulaire_contact.txt";
$f=  fopen($filename_out, "a+");

if (!$f) {
  echo "Erreur. Le fichier " . $filename_out . "ne s'ouvre pas :'(";
  return(False);
}
if (isset($_POST['nom'])) {
  $nomform = $_POST['nom']."\r\n";
  fwrite($f, $nomform);
}
if (isset($_POST['prenom'])) {
  $prenomform = $_POST['prenom']."\r\n";
  fwrite($f, $prenomform);
}
if (isset($_POST['email'])) {
  $emailform = $_POST['email']."\r\n";
  fwrite($f, $emailform);
}
if (isset($_POST['tel'])) {
  $telform = $_POST['tel']."\r\n";
  fwrite($f, $telform);
}
if (isset($_POST['message'])) {
  $messform = $_POST['message']."\r\n\r\n";
  fwrite($f, $messform);
}
fclose($f); 

?>