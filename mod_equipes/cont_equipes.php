<?php

include_once("modele_equipes.php");
include_once("vue_equipes.php");

class ContEquipes {

    private $modele,$vue;

    public function __construct() {
        $this->modele = new ModeleEquipes();
        $this->vue = new VueEquipes();
    }

    public function liste() {
        $tab = $this->modele->getListeEquipe();
        $this->vue->affiche_liste($tab);
    }

    public function detailsEquipe() {
        if(isset($_GET['id'])) {
            $equipe = $this->modele->getEquipe($_GET['id']);
            $this->vue->detailsEquipe($equipe);
        }else {
            echo "<p> L'identifiant de l'équipe n'existe pas dans la base de donnée. </p>";
        }
    }

    public function lien() {
        $this->vue->affiche_lien();
    }

    public function bienvenue() {
        $this->vue->affiche_bienvenue();
    }

    public function form_equipe() {
        $this->vue->form_equipe();
    }

    public function creer_equipe() {
        $insert_equipe = $this->modele->creerEquipe();
        if($insert_equipe) {
            echo "L'équipe a été créer.";
        }else {
            echo "Echec de l'insertion.";
        }
    }
}

?>