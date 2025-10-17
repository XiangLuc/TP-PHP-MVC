<?php

require_once("modele_joueurs.php");
require_once("vue_joueurs.php");

class ContJoueurs {

    private $modele,$vue;

    public function __construct() {
        $this->modele = new ModeleJoueurs();
        $this->vue = new VueJoueurs();
    }

    public function liste() {
        $tab = $this->modele->getListe();
        $this->vue->affiche_liste($tab);
    }

    public function details() {
        if(isset($_GET['id'])) {
            $joueur = $this->modele->getJoueur($_GET['id']);
            $this->vue->detailsJoueur($joueur);
        }else {
            echo "<p> L'identifiant du joueur n'existe pas dans la base de donnée. </p>";
        }
    }

    public function lien() {
        $this->vue->affiche_lien();
    }

    public function bienvenue() {
        $this->vue->affiche_bienvenue();
    }

    public function form() {
        $this->vue->form_ajout();
    }

    public function addJoueur() {
    
        $bool = $this->modele->creerJoueur();
        if($bool) {
            echo "Insertion valide.";
        }else {
            echo "Insertion invalide.";
        }
    }
}

?>