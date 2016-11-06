<html>
    <head>
        <meta charset="UTF-8">
        <title>Votre IMC</title>
    </head>
    <body>
        <h1><b>Déterminez votre IMC</b></h1>
        <h2>Pour connaître votre indice de masse corporelle, entrez vos informations personnelles dans le formulaire ci-dessous :</h2>
        <br><br>
        <form name="Formulaire_imc" method="POST" action="TP2.php">
            Entrez votre prénom : <input type="text" name="prenom"/><br/><br/>
            Entrez votre taille (sous la forme 1.70) : <input type="text" name="taille"/><br/><br/>
            Entrez votre poids (en kilos) : <input type="number" name="poids"/><br/><br/>
            <input type="submit" name="valider" value="OK"/><br/>
        </form>
        <br><br>

        <?php
        if(isset($_POST['valider'])){
            $prenom=$_POST['prenom'];
            $taille=$_POST['taille'];
            $poids=$_POST['poids'];
            $imc=$poids/($taille*$taille);
            echo'Bonjour ' .$prenom. ',<br/>Votre IMC (indice de masse corporelle) est de : ' .round($imc,2). '.<br/>' ;
            if($imc<16.5){
                $verdict='Vous êtes en état de dénutrition.';
                }
                elseif($imc<18.5){ 
                    $verdict='Vous êtes de corpulence maigre.'; 
                }
                elseif ($imc<25) {
                $verdict='Vous êtes de corpulence normale.';
                }
                elseif ($imc<30) {
                $verdict='Vous êtes en surpoids.';
                }
                elseif ($imc<35) {
                $verdict="Vous êtes en état d'obésité modérée.";
                }
                elseif ($imc<40) {
                $verdict="Vous êtes en état d'obésité sévère.";    
                }
                else {
                $verdict="Vous êtes en état d'obésité morbide.";
                }
            echo $verdict;
            }
        ?>
        <br><br>
        
        <?php
        if(isset($_POST['valider'])){
            echo 'Vous avez saisi les données suivantes :' . '<br/>';
            foreach ($_POST as $index=>$valeur){
                echo '- ' . $index . ' : ' . $valeur . '<br/>';
            }
        }
        ?>
    </body>
</html>