<?php
/*   Nous aurons accès aux variables suivantes : 
$_GET['nom'] = 'Meinhardt'
$_GET['prenom] = 'Andrea'    */




if(isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter']))
{
    $_GET['nom'] = (string)$_GET['nom'];
    $_GET['prenom'] = (string)$_GET['prenom'];
    $_GET['repeter'] = (int)$_GET['repeter'];
    
    if($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100)
    {
        for( $i = 0 ; $i < $_GET['repeter'] ; $i++)
        {
        echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . '. <br />';
        }
    }
}
else
{
    echo 'Il faut renseigner un nom <b><u>et</u></b> un prénom <b><u>et</u></b> le nombre de fois que vous souhaitez voir afficher votre message.';
}


?>