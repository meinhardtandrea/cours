<?php 
include 'Constantes.php';
?>

<?php
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];

if($nom==$prenom){
    echo'Ton nom doit être différent de ton prénom.';
}

elseif(!ctype_alpha($nom)){ //La fonction ctype_alpha vérifie qu'une chaîne est alphabétique.
    echo"WTF ! Tu as saisi un chiffre !?";  
}

elseif(!ctype_alpha($prenom)){
    echo"WTF ! Tu as saisi un chifre !?";  
}

elseif(2>=strlen($nom) or strlen($nom)>=24){ //strlen permet de limiter la taille d'une chaîne.
    echo'Minimum 2 caractères par pitié ET pas plus de 24 caractères !';
}

elseif(2>=strlen($prenom) or strlen($prenom)>=20){
    echo'Minimum 2 caractères par pitié ET pas plus de 24 caractères !';
}
else{
echo BIENVENUE . ' ' . strtoupper($nom) . ' ' . strtolower($prenom) . ' ' . SIO ; //strtoupper met tout en MAJUSCULE et strtolower met tout en minuscule. 
}
?>