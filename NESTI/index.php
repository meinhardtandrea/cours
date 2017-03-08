<?php
session_start();

/*
 * Ce fichier est le seul point d'entrée de ton projet.
 * N'importe quel page du site passe par ici.
 * Il s'agit de ce qu'on appelle un "routeur" (il redirige la requête au bon endroit parmi ton projet).
 * C'est lui qui est chargé de contrôler l'URL pour savoir quelle page est demandée,
 *  et donc quel contrôleur va se charger de répondre à cet appel.
 * Comme on sait que tout passe par ici, c'est aussi l'endroit idéal pour effectuer des choses
 *  qui seront communes à tous les appels (comme le session_start, ou l'appel à un fichier de config global).
 */

/**
 * C'est donc ici qu'on a décidé de charger un fichier qui s'occupe de l'initialisation de ce que tu as envie de faire au démarrage du process.
 */
require_once("util/nesti.init.php");
if( $GLOBALS[ 'config'][ 'show_all_errors'] == true){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
/*
 * Ici tu as décidé de charger un PDO quoiqu'il arrive.
 * Cela signifie que même si certains appels n'ont pas besoin d'aller lire ou écrire
 *  dans la base (par exemple une page d'accueil sur laquelle tu n'as rien de dynamique, ou encore une page de CGU),
 *  le PDO aura été chargé quand même pour rien, il ne sera pas utilisé.
 * 
 * Ce n'est pas bien grave mais on pourra peut-être améliorer ça plus tard si tu veux.
 * 
 * Quand tu programmes, et si ça ne te fais pas perdre du temps, mieux vaut faire au plus performant.
 * 
 * Ca évite de devoir refondre des choses quand le site devient utilisé et qu'on s'aperçoit que ça rame pas mal
 *   à certains endroits "gourmands" plus que de besoin en ressources du serveur. 
 */
require_once("util/class_PdoNesti.php");
$pdo = PdoNesti::getPdoNesti();

include "vues/v_entete.php";
include "vues/v_bandeau.php";


/*
 * C'est ici que ton routeur agit réellement : il charge un contrôleur selon la page demandée dans le GET (via la variable "uc")
 */
if( !isset ( $_REQUEST['uc'])){
    $uc = 'accueil';
}else{
    $uc = $_REQUEST['uc'];
}
switch ( $uc){

//Boutons inscription et connexion
    case 'login':
        include "controleurs/c_gestionLogin.php"; break;

//Menu
    case 'accueil':
        include "vues/v_accueil.php"; break;   
    case 'gestionIngredients':
        include "controleurs/c_gestionIngredients.php"; break;
    case 'gestionRecettes':
        include "controleurs/c_gestionRecettes.php"; break;
    case 'gestionCours':
        include "controleurs/c_gestionCours.php"; break;
    case 'gestionAdmin':
        include "controleurs/c_gestionAdmin.php"; break;
    case 'gestionCompte':
        include "controleurs/c_gestionCompte.php"; break;
    
    }

include "vues/v_pied.php";






/*******************************
 ******** EXERCICE 1 ***********
 ******************************* 
 * Transformons pour commencer le côté contrôleur en classes.
 * 
 * Dans tous tes contrôleurs, tu fais un switch sur l'action demandée.
 * Que dirais-tu d'une classe de base pour tous tes contrôleurs, dans le but de mutualiser ce comportement ?
 * 
 * Je te propose la chose suivante :
 *  - le routeur récupère ce qui lui concerne dans l'URL pour savoir quoi appeler et quoi lui donner.
 *  - en fonction de la page demandée (tu as décidé d'appeller cette variable "uc" dans l'url),
 *     il va instancier la classe du contrôleur demandé
 *  - il exécute une méthode de la classe en fonction de la variable "action" dans l'url.
 * 
 * Actions à faire pour y parvenir :
 *   => transformer tous tes contrôleurs en classes
 *   => profites en pour toutes les ranger dans le même namespace (par exemple NESTI\controller), 
 *       c'est beaucoup mieux que de nommer tes fichiers et tes classes avec un c_ par exemple. 
 *       C'est grâce au namespace que tu sais ce qu'est le rangement adéquat de cette classe.
 *       Tu peux donc appeller une classe contrôleur Recette, tout simplement, au lieu de C_Recette, puisqu'avec son namespace tu sais que c'est un contrôleur, sans ambiguité.
 *      Prends l'habitude d'utiliser les namespace, même si c'est optionnel : ça t'évitera d'être perdue le jour où tu arrives dans un projet qui les utilise.
 *   => au lieu d'avoir un switch action dans les contrôleurs, tu vas plutôt créér une méthode publique
 *       pour chaque "case" que tu avais prévu à l'intérieur des contrôleurs.
 *          Par exemple "public function enregistrer_recette()" dans le contrôleur Admin
 *   => Maintenant ton routeur récupère non seulement la variable "uc" mais aussi "action"
 *   => il effectue un switch sur "uc", comme actuellement, mais cette fois non seulement il inclue le fichier contrôleur
 *       mais il doit aussi faire une instanciation de la classe, par exemple $controleur= new C_recettes();
 *   => Après le switch, le routeur va maintenant exécuter l'action de cette façon (si tu as une variable $action par exemple :
 *          $controleur->$action()
 *      Php permet d'appeler une méthode d'une classe de façon dynamique : la variable $action est un string qui contient le nom de la méthode,
 *          et php va remplacer la variable pour exécuter la méthode.
 *      Par exemple si tu veux faire un $pdo->query(); ça marche aussi si tu fais :
 *          $methode= 'query';
 *          $pdo->$methode();
 * 
 * Encore mieux : tu sais que plus tard tu auras sans doute besoin de regrouper des choses entre les contrôleurs (par exemple des outils communs utilisés dedans)
 * 
 * Le top serait d'avoir une classe de base pour les contrôleurs qui en serait les filles.
 * 
 * Une classe controller_base ou du nom de ton choix.
 * Pour le moment vide (n'oublie pas le namespace, tout de même)
 * 
 * Et chacun de tes contrôleurs étendent cette classe de base. On va appeller ce controleur de base le "contrôleur mère" si tu veux bien.
 * 
 * Suite de la refonte :
 *  - maintenant, avoir transformé, essaye de surfer sur ton site
 *  - comme tu peux voir il y a un problème. Essaye de résoudre ce problème en lisant bien le message d'erreur (la solution est plus bas).
 */







/*
 * Une solution possible est la suivante : il faudrait que la variable $pdo soit instanciée dans les contrôleurs.
 * 
 * Efface ici le require_once et le $pdo= ....
 * 
 * Fait plutôt le require_once dans ton controleur mère (puisque plein de controleurs ont besoin du PDO).
 * 
 * Maintenant, tu n'as pas besoin d'instancier tout de suite $pdo.
 * 
 * Fais le plutôt au besoin : dans chaque méthode de contrôleur qui a besoin de $pdo, colle la ligne que tu as effacée du routeur ($pdo= ...)
 * 
 * 
 * Maintenant çà marche déjà mieux.
 *  
 * 
 * Et te voilà avec de belles classes propres en guise de contrôleurs, un bon premier pas vers un MVC Objet blindé !
 */



/*******************************
 ******** EXERCICE 2 ***********
 ******************************* 
 */











?>