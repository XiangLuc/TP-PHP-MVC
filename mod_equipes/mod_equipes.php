<?php

include_once("cont_equipes.php");

class ModEquipes {

    private $action,$cont;

    public function __construct() {
       $this->cont = new ContEquipes();
       $this->action = isset($_GET['action']) ? $_GET['action'] : "bienvenue"; 
    }

    public function exec() {

        //$this->cont->lien();
        
        switch($this->action) {
            case "listeEquipe":
                $this->cont->liste();
            break;
            case "detailsEquipe":
                $this->cont->detailsEquipe();
            break;
            case "bienvenue":
                $this->cont->bienvenue();
            break;
            case "form_equipe":
                $this->cont->form_equipe();
            break;
            case "creer_equipe":
                $this->cont->creer_equipe();
            break;
            default :
                die("L'action n'existe pas");
        }
    }
}

?>