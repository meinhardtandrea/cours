<html>
    <head>
        <meta charset="UTF-8">
        <title>Les fonctions</title>
    </head>
    <body>
        <h1><b>Les fonctions</b></h1>
        <?php
        function code_couleur($nombre){
           if($nombre<10){
               echo '<font color="red">' . $nombre . '</font>';
           } 
           elseif ($nombre>=15) {
               echo '<font color="green">' . $nombre . '</font>';
           }
           else{
               echo $nombre;
           }
        }
        ?>
        <?php
        $trim1=array(2,5,7,10,11,13,15,17,18);
        echo "<h2>Vos notes du premier trimestre :</h2>";
        foreach ($trim1 as $trim1){
            echo '- ';
            echo code_couleur($trim1) . ' <br/>';
        }
        $trim2=array(3,4,9,9,12,15,16,17,19);
        echo "<h2>Vos notes du second trimestre :</h2>";
        foreach ($trim2 as $trim2){
            echo '- ';
            echo code_couleur($trim2) . ' <br/>';
        }
        $trim3=array(0,2,5,9,9,9,12,17,19);
        echo "<h2>Vos notes du troisième trimestre :</h2>";
        foreach ($trim3 as $trim3){
            echo '- ';
            echo code_couleur($trim3) . ' <br/>';
        }
        ?>
        <br>
        <?php
        $Moy_t1=(2+5+7+10+11+13+15+17+18)/9;
        echo 'La moyenne générale au premier trimestre est de : ' . round($Moy_t1,2) . '.</br>';
        $Moy_t2=(3+4+9+9+12+15+16+17+19)/9;
        echo 'La moyenne générlae au second trimestre est de : ' . round($Moy_t2,2) . '.</br>';
        $Moy_t3=(0+2+5+9+9+9+12+17+19)/9;
        echo 'La moyenne générale au troisième trimestre est de : ' . round($Moy_t3,2) . '.</br>';
        $MA=($Moy_t1+$Moy_t2+$Moy_t3)/3;
        echo 'Votre moyenne annuelle est de : ' . round($MA,2) . '.</br>';
        ?>
    </body>
</html>