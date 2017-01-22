<h1>Les conditions</h1>

    <h2>La structure de base : if… else</h2>
    
        <h3>Les symboles à connaître</h3>
        <p>
            == est égal à <br />
            > est supérieur à <br />
            < est inférieur à <br />
            >= est supérieur ou égal à <br />
            <= est inférieur ou égal à <br />
            != est différent de  <br />
        </p>
        
        <h3>La structure if...else</h3>
        
<?php
$age = 8;

if ($age <= 12){
    $autorisation_entrer = "Oui";
}
else {
    $autorisation_entrer = "Non";
}
        
                
echo "Avez-vous l'autorisation d'entrer ? La réponse est : " . $autorisation_entrer . '. ';

if ($autorisation_entrer == "Oui"){
    echo'<br />Bienvenue gamin.';
}
elseif ($autorisation_entrer == "Non"){
    echo '<br />Accès refusé. Pas assez jeune ! ';
}
else{
    echo "<br />Euh, je ne connais pas ton âge, tu peux me le rappeler s'il te plaît ?";
}
?>
 
        <h3>Le cas des booléens</h3>

<?php
if ($age <= 12){
    echo "<br />Salut gamin ! Bienvenue sur mon site !";
    $autorisation_entrer = true;
}
else {
    echo "<br />Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir ! ";
    $autorisation_entrer = false;
}



if ($autorisation_entrer){
    echo "<br />Bienvenue petit nouveau. :o)";
}
else{
    echo "<br />T'as pas le droit d'entrer !";
}
?>
        
        <h3>Des conditions multiples</h3>
        <p>
            On souhaite poser plusieurs conditions à la fois. On aura besoin de nouveaux mots-clés : <br />
            <br />
            AND veut dire Et <br />
            && veut dire Et <br />
            OR veut dire Ou <br />
            || veut dire Ou <br />
        </p>
               
<?php
$langue='français';
$sexe='alien';

if ($age <= 12 AND $langue == "français"){
    echo "<br />Bienvenue sur mon site en français !";
}
elseif ($age <= 12 AND $langue == "anglais"){
    echo "<br />Welcome to my website in english !";
}

if ($sexe == "fille" OR $sexe == "garçon"){
    echo "<br />Salut Terrien !";
}
else{
    echo "<br />Euh, si t'es ni une fille ni un garçon, t'es quoi alors ?";
}
?>

        <h3>L'astuce bonus</h3>
        <p>
            Sachez que  les 2 codes ci-dessous donnent exactement le même résultat.<br/>
        </p>
        
<?php
$variable=23;
if ($variable == 23){
    echo '<br/><strong>Bravo !</strong> Vous avez trouvé le nombre mystère !';
}
?>
        
<?php
if ($variable == 23){
?>
<br/><strong>Bravo !</strong> Vous avez trouvé le nombre mystère !
<?php
}
?>
               
        <h2>switch</h2>
        <p>
            Pour comprendre l'interêt du switch, on prend un exemple un peu lours avec des if et elseilf : <br/>
        </p>   
    
<?php
$note=10;

if ($note == 0){
    echo "<br/>Tu es vraiment un gros nul !!!";
}
elseif ($note == 5){
    echo "<br/>Tu es très mauvais";
}
elseif ($note == 7){
    echo "<br/>Tu es mauvais";
}
elseif ($note == 10){
    echo "<br/>Tu as pile poil la moyenne, c'est un peu juste…";
}
elseif ($note == 12){
    echo "<br/>Tu es assez bon";
}
elseif ($note == 16){
    echo "<br/>Tu te débrouilles très bien !";
}
elseif ($note == 20){
    echo "<br/>Excellent travail, c'est parfait !";
}
else{
    echo "<br/>Désolé, je n'ai pas de message à afficher pour cette note";
}
?>
    
<?php
    switch ($note) // on indique sur quelle variable on travaille
{ 
    case 0: // dans le cas où $note vaut 0
        echo "<br/>Tu es vraiment un gros nul !!!";
    break;

    case 5: // dans le cas où $note vaut 5
        echo "<br/>Tu es très mauvais";
    break;

    case 7: // dans le cas où $note vaut 7
        echo "<br/>Tu es mauvais";
    break;

    case 10: // etc. etc.
        echo "<br/>Tu as pile poil la moyenne, c'est un peu juste…";
    break;

    case 12:
        echo "<br/>Tu es assez bon";
    break;

    case 16:
        echo "<br/>Tu te débrouilles très bien !";
    break;

    case 20:
        echo "<br/>Excellent travail, c'est parfait !";
    break;

    default:
        echo "<br/>Désolé, je n'ai pas de message à afficher pour cette note";
}
?>
    
    <p>
        Avantage : on n'a plus besoin de mettre le double égal ! <br/>
        Défaut : ça ne marche pas avec les autres symboles (< > <= >= !=). <br/>
        En clair, le switch ne peut tester que l'égalité. <br/>
    </p>
    

    <h2>Ternaire</h2>
    <p>
        Un ternaire est une condition condensée qui fait deux choses sur une seule ligne :
        
    <ul>
            <li>on teste la valeur d'une variable dans une condition ;</li>
            <li>on affecte une valeur à une variable selon que la condition est vraie ou non.</li>
        </ul> 
        Prenons cet exemple à base de if… else qui met un booléen $majeur à vrai ou faux selon l'âge du visiteur :
    </p>
    
<?php
$age = 24;

if ($age >= 18){
    $majeur = true;
}
else{
    $majeur = false;
}
?>
    
    <p>
       On peut faire la même chose en une seule ligne grâce à une structure ternaire :
    </p>
      
<?php
$age = 24;
$majeur = ($age >= 18) ? true : false;
?>