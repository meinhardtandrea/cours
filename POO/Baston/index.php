<?php

function chargerClasse($classe){
    require 'Classe' . $classe . '.php';
}
spl_autoload_register('chargerClasse');



$perso1= new Personnage(60,0); //60 de force, 0 dégât
$perso2= new Personnage(90,10); //95 de force, 10 dégâts

$perso1->parler(); //Je suis le héros.
$perso1->afficherExperience(); //EXP perso1 = 1

echo 'Le personnage 1 a <strong>' . $perso1->force() . '</strong> de force, contrairement au personnage 2  qui a <strong>' . $perso2->force() . '</strong> de force.<br />';
echo 'Le personnage 1 a <strong>' . $perso1->experience() . "</strong> d'expérience, contrairement au personnage 2  qui a <strong>" . $perso2->experience() . "</strong> d'expérience.<br />";
echo 'Le personnage 1 a <strong>' . $perso1->degats() . '</strong> de dégâts, contrairement au personnage 2  qui a <strong>' . $perso2->degats() . '</strong> de dégâts.<br />';

$perso1->setForce(65);
$perso1->setExperience(2);
$perso2->setForce(95);
$perso2->setExperience(23);

$perso1->frapper($perso2); //Dégâts du perso2 : 10(ligne6)+65(ligne15)
$perso1->gagnerExperience(); //EXP du perso 1 : 2(ligne16)+1

$perso2->frapper($perso1); //Dégâts du perso1 : 0(ligne5)+95(ligne17)
$perso2->gagnerExperience(); //EXP du perso 2 : 23(ligne18)+1

echo 'Le personnage 1 a <strong>' . $perso1->force() . '</strong> de force, contrairement au personnage 2  qui a <strong>' . $perso2->force() . '</strong> de force.<br />';
echo 'Le personnage 1 a <strong>' . $perso1->experience() . "</strong> d'expérience, contrairement au personnage 2  qui a <strong>" . $perso2->experience() . "</strong> d'expérience.<br />";
echo 'Le personnage 1 a <strong>' . $perso1->degats() . '</strong> de dégâts, contrairement au personnage 2  qui a <strong>' . $perso2->degats() . '</strong> de dégâts.<br />';
?>