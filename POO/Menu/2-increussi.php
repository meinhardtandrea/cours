<?php
session_start();

if(!(isset($_SESSION['valider']) && ($_SESSION['valider']=='OK'))){
    header ('location:2-inscription.php');
    exit();
}

echo'Inscription reussie ! <br >';
echo'<a href="2-connexion.php"> Se connecter </a>';
?>

<?php
$filename_out= "2-bddinscr.txt";
$f=  fopen($filename_out, "a+");

if (!$f) {
  echo "Erreur. Le fichier " . $filename_out . "ne s'ouvre pas :'(";
  return(False);
}
if (isset($_POST['identifiant'])) {
  $nomform = $_POST['identifiant']."\r\n";
  fwrite($f, $nomform);
}
if (isset($_POST['motdepasse'])) {
  $prenomform = $_POST['motdepasse']."\r\n";
  fwrite($f, $prenomform);
}

fclose($f); 
?>