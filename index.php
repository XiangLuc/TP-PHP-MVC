<?php

session_start();

include_once('connexion.php');

$con = new Connexion();
$con::init_Connexion();

include_once('vue_generique.php');

$vueGen = new VueGenerique;

include_once('token/tokenCRSF.php');

// Vérifier le jeton CSRF pour toutes les requêtes POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tokenName = CSRFToken::getTokenName();
    if (!isset($_POST[$tokenName]) || !CSRFToken::verifierToken($_POST[$tokenName])) {
        die("Token CSRF invalide. Arrêt de l'exécution.");
    }
}


$module = isset($_GET['module']) ? htmlspecialchars($_GET['module']) : "accueil"; 

switch($module) {
    case 'joueur':
        include_once('mod_joueurs/mod_joueurs.php');
        $modJoueurs = new ModJoueurs;
        $modJoueurs->exec();
    break;
    case 'equipe':
        include_once('mod_equipes/mod_equipes.php');
        $modEquipes = new ModEquipes;
        $modEquipes->exec();
    break;
    case 'connexion':
        include_once('mod_connexion/mod_connexion.php');
        $modConnexion = new ModConnexion;
        $modConnexion->exec();
    break;
    case 'accueil':
        include_once('accueil.php');
    break;
    default:
       die("Le module n'existe pas.");
}

$contenu = $vueGen->getAffichage();

include_once("composants/menu/comp_menu.php");

$compMenu = new CompMenu;

include_once('template.php');

?>