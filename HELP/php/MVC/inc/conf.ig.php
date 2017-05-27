<?php
$host = 'localhost';
$user = 'root';
$pwd = '';
$bdd = 'menu';

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES utf8';
$bdd = new PDO('mysql:host='.$host.';dbname='.$bdd, $user, $pwd, $pdo_options);
?>