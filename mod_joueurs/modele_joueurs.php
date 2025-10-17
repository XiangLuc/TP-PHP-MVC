<?php

require_once('connexion.php');

class ModeleJoueurs extends Connexion {

    public function __construct() {}

    public function getListe() {
        $query = self::$bdd->prepare("SELECT * FROM joueur");
        $query->execute();
        $tab = $query->fetchAll();
        return $tab;
    }

    public function getJoueur($id) {
        $query = self::$bdd->prepare("SELECT * FROM joueur WHERE id = ?");
        $query->execute(array($id));
        $joueur = $query->fetch();
        return $joueur;
    }

    public function creerJoueur() {
        if(isset($_POST['nom']) && isset($_POST['desc'])) {
            $query = self::$bdd->prepare("INSERT INTO joueur(nom,biographie) VALUES(?,?)");
            $query->execute(array(
                htmlspecialchars($_POST['nom']),
                htmlspecialchars($_POST['desc']))
            );
            return true; 
        }else {
            return false; 
        }
    }
}

?>