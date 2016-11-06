<html>
    <head>
        <meta charset="UTF-8">
        <title>Mon petit répertoire</title>
    </head>
    <body>
        <h1><b>Mon petit répertoire</b></h1>
        <h2>Famille</h2>
        <?php
        $adresse0=array();
            $adresse0 ['nom']='DUMONTEIL';
            $adresse0 ['prenom']='Nicolas';
            $adresse0 ['num'] = 19;
            $adresse0 ['rue'] = 'rue Terral';
            $adresse0 ['cp'] = 34000;
            $adresse0 ['ville'] = 'MONTPELLIER';
            
        $adresse1=array();
            $adresse1 ['nom']='BRICHAU'; 
            $adresse1 ['prenom']='Florence';
            $adresse1 ['num'] = 15;
            $adresse1 ['rue'] = 'rue de la Belgique';
            $adresse1 ['cp'] = 37000;
            $adresse1 ['ville'] = 'PERWEZ';
            
        $adresse2=array();
            $adresse2 ['nom']='LE TALLEC';
            $adresse2 ['prenom']='Kévin';
            $adresse2 ['num'] = 11;
            $adresse2 ['rue'] = 'rue de Paris';
            $adresse2 ['cp'] = 75001;
            $adresse2 ['ville'] = 'PARIS';
            
        $adresse3=array();
            $adresse3 ['nom']='MEINHARDT';
            $adresse3 ['prenom']='Papa';
            $adresse3 ['num'] = 'Lieu-dit';
            $adresse3 ['rue'] = 'Penhoët';
            $adresse3 ['cp'] = 56440;
            $adresse3 ['ville'] = 'LANGUIDIC';
            
        $adresse4=array();
            $adresse4['nom']='MEINHARDT';
            $adresse4['prenom']='Franck';
            $adresse4['num']=12;
            $adresse4['rue']='rue de la jolie fontaine';
            $adresse4['cp']=44000;
            $adresse4['ville']='NANTES';
            
        $repertoire=array($adresse0,$adresse1,$adresse2,$adresse3,$adresse4);
        
        foreach ($repertoire as $adresse){
            foreach ($adresse as $element){
                echo '- ' . $element . ' ';
            }
            echo '<br/>';
        }
        ?>
        <br>
    </body>
</html>