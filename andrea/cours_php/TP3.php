<html>
    <head>
        <meta charset="UTF-8">
        <title>Mon TP3 n'a pas de nom</title>
    </head>
    <body>
        <h1><b>Mon TP3 n'a pas de nom</b></h1>
        <h2>Un petit formulaire pour le plaisir !</h2>
        <p>Merci de saisir les champs suivants : </p>
        <form name='Inscrption' method="POST" action="TP3.php">
            Votre nom : <input type="text" name="nom"/><br/><br/>
            Votre prénom : <input type="text" name="prenom"/><br/><br/>
            Votre âge : <input type="number" name="age"/><br/><br/>
            Votre ville : <input type="text" name="ville"/><br/><br/>
            Votre activité sportive préférée : <input type="text" name="activite"/><br/><br/>
            <input type="submit" name="valider" value="Envoyer"/><br/><br/>
        </form>
        <?php
        if(isset($_POST['valider'])){
            echo '<h3>Vous venez de saisir : <br/><br/></h3>';
            foreach ($_POST as $index=>$valeur){
                if($index=='valider'){
                    $verdict=' ';
                } 
                else {
                    $verdict= '- ' . $index . ' : ' . $valeur . '<br/>';   
                }
                echo $verdict;
            }
            /*2ème méthode : 
            foreach($_POST as $index=>$valeur){
                if($index!='valider'){
                    echo '- ' . $index . ' : ' . $valeur . '<br/>';  
                }
            }*/
        }
        ?>
    </body>
</html>
