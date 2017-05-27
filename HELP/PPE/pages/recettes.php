<?php
include("classes/form.class.php");
$form = new Formulaire();
echo $form->form('post','index-3.html');
echo $form->inputText('Votre nom','nom');
echo $form->inputText('Votre pr&eacute;nom','prenom');
echo $form->submit('Valider');
echo $form->fabriqueForm();
?>