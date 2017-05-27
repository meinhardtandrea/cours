<?php

if(!isset($_POST['salaire'])){
    echo 'Variable n\'existe pas';
    }elseif(empty($_POST['salaire'])){
    echo 'Le champs est vide!';    
    }else{
    echo 'le salaire auquel j\'aspire est de: '.$_POST['salaire'];
    }
    
if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
    echo '<p>Votre pseudo est: '.$_POST['pseudo'].'</p>';
}

$ville=filter_input(INPUT_POST,'ville');
echo '<p>'.$ville.'</p>';
   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

