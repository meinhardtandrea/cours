<html>
    <head>
        <meta charset="UTF-8">
        <title>Les opérateurs</title>
    </head>
    <body>
        <h1><b>Les opérateurs essentiels</b></h1>
        <h2></h2>
        <?php
        $valeur=5;
        echo $valeur . '<br>';
        $nombre=(4+6)-2;
        echo $nombre . '<br>';
        $nombre=(4*6)/2;
        echo $nombre . '<br>';
        $valeur=4+6*2;
        echo $valeur . '<br>';
        $valeur=4+(6*2);
        echo $valeur . '<br>';
        $valeur=(4+6)*2;
        echo $valeur . '<br>';
        $nombre=6%2;
        echo $nombre . '<br>';
        $nombre=27%4;
        echo $nombre . '<br>';
        $nombre=(4*6)/2;
        echo $nombre . '<br>';
        ?>
        <br>
        
        
        <?php
        if($nombre==12){
            echo 'Le résultat est égal à 12. <br/>';
        }
        if($nombre!=13){
            echo 'Le résultat est différent de 13. <br/>';
        }
         if($nombre<20){
            echo 'Le résultat est inférieur à 20. <br/>';
        }
        if($nombre>4){
            echo 'Le résultat est supérieur à 4. <br/>';
        }
        if($nombre<=12){
            echo 'Le résultat est inférieur ou égal à 12. <br/>';
        }
        if($nombre>=12){
            echo 'Le résultat est supérieur ou égal à 12. <br/>';
        }
        ?>
        <br>
        
        
        <?php
        $age=20;
        if(($age>=15)&&($age<=25)){
            echo 'Mon âge est supérieur ou égal à 15 ans <b style="color:#991056">ET</b> inférieur ou égal à 25 ans.<br/>';
        }
        $truc='papa';
        if(($truc=='papa')||($truc=='maman')){
            echo 'Chouette, mes parents !';
        }
        ?>
    </body>
</html>