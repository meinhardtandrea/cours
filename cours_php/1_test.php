<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mes premiers essais</title>
    </head>
    <body>
        <p>J'apprends le PHP !  Et c'est trop cool !</p>
        <br><br>
        <h1><b>J'aimerais en apprendre davantage sur toi :D</b></h1>
        <h2>Prends le temps de remplir ce petit questionnaire tout mignon !</h2>
        <br>
        <form name="Formulaire_accueil" method="POST" action="1_test.php">
            Ton prénom : <input type="text" name="prenom"/><br/><br/>
            Fille ou garçon ? : <input type="text" name="sexe"/><br/><br/>
            Ton âge : <input type="number" name="age"/><br/><br/>
            La chose que tu préfères le + : <input type="text" name="preferes_le_plus"/><br/><br/>
            La chose que tu détestes le + : <input type="text" name="detestes_le_plus"/><br/><br/>
            <input type="submit" name="valider" value="C'est partiiii !"/>
        </form>
        <br><br>
        <?php
        if(isset($_POST['valider'])){
            $prenom=$_POST['prenom'];
            $sexe=$_POST['sexe'];
            $age=$_POST['age'];
            $preferes_le_plus=$_POST['preferes_le_plus'];
            $detestes_le_plus=$_POST['detestes_le_plus'];
            echo"Bonjour Andréa ! <br/>Je m'appelle " .$prenom. ". Et oui... C'est bien un prénom de " .$sexe. " ! <br/>J'ai " .$age. " ans et ce que je préfère le plus, c'est ".$preferes_le_plus.". Et je déteste ".$detestes_le_plus.".";
        }
        ?>
    </body>
</html>
