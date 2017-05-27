<?php
require_once('./RemplissageAuto_Ville_Depcom.class.php');

//Initialisation de la liste
$list = array();

//Connexion MySQL
try
{
    $db = new PDO('mysql:host=localhost;dbname=dsidd', 'root', 'gkzovd554');
	$db->exec("SET CHARACTER SET utf8");

}
catch (Exception $ex)
{
    echo $ex->getMessage();
}

//Construction de la requete
$strQuery = "SELECT code Depcom ,libéllé Ville, dep dep FROM Infos_Communes  WHERE libéllé LIKE :ville ORDER BY population_commune DESC ";


//Limite
if (isset($_POST["maxRows"]))
{
    $strQuery .= "LIMIT 0, :maxRows";
}
$query = $db->prepare($strQuery);
    $value = $_POST["ville"]."%";
    $query->bindParam(":ville", $value, PDO::PARAM_STR);

//Limite
if (isset($_POST["maxRows"]))
{
    $valueRows = intval($_POST["maxRows"]);
    $query->bindParam(":maxRows", $valueRows, PDO::PARAM_INT);
}

$query->execute();

$list = $query->fetchAll(PDO::FETCH_CLASS, "AutoCompletionCPVille");;

echo json_encode($list);
?>
