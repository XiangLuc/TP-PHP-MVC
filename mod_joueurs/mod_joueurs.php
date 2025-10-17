<?php

include_once('cont_joueurs.php');

class ModJoueurs {

    private $action,$cont;

    public function __construct() {
        $this->cont = new ContJoueurs();
        $this->action = isset($_GET['action']) ? $_GET['action'] : "bienvenue"; 
    }

    public function exec() {

        switch($this->action) {
            case "bienvenue":
                $this->cont->bienvenue();
            break;
            case "liste":
                $this->cont->liste();
            break;
            case "details":
                $this->cont->details();
            break;
            case "creer":
                $this->cont->form();
            break;
            case "ajout":
                $this->cont->addJoueur();
            break;
            default:
                die("L'action n'existe pas.");
        }
    }
}

?>