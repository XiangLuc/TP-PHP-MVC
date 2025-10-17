<?php

include_once('connexion.php');

class ModeleEquipes extends Connexion {

    public function __construct() {}

    public function getListeEquipe() {
        $query = self::$bdd->prepare("SELECT * FROM equipe");
        $query->execute();
        $tab = $query->fetchAll();
        return $tab;
    }

    public function getEquipe($id) {
        $query = self::$bdd->prepare("SELECT * FROM equipe WHERE id = ?");
        $query->execute(array(
            $id
        ));
        $joueur = $query->fetch();
        return $joueur;
    }

    public function creerEquipe() {
    
        if (isset($_POST['nom']) && 
                isset($_POST['annee']) && 
                    isset($_POST['desc']) && 
                        isset($_FILES['logo'])) {
    
            $nom = $_FILES['logo']['name'];
            $nom_temp = $_FILES['logo']['tmp_name'];
            $type = $_FILES['logo']['type'];

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (!in_array($type, $allowedTypes)) {
                return false;
            }

            $nouveau_nom = $this->genererNomUnique($nom);
    
            $chemin_destination = "mod_equipes/logos/" . $nouveau_nom;
    
            $deplacer = move_uploaded_file($nom_temp, $chemin_destination);
    
            if ($deplacer) {
                $query = self::$bdd->prepare("INSERT INTO equipe(nom, annee_creation, description, pays, logo) VALUES(?, ?, ?, ?, ?)");
                $query->execute(array(
                    htmlentities($_POST['nom']),
                    htmlentities($_POST['annee']),
                    htmlentities($_POST['desc']),
                    htmlentities($_POST['pays']),
                    $chemin_destination
                ));
                return true;
            }
    
            return false;
        }
    
        return false; 
    }

    private function genererNomUnique($nom_original) {
        $extension = pathinfo($nom_original, PATHINFO_EXTENSION);
        return uniqid() . '.' . $extension;
    }
}

?>