<?php

include_once("vue_generique.php");
include_once("token/tokenCRSF.php");

class VueJoueurs extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function affiche_liste($tab) {
        ?> 
        <div class="d-flex justify-content-center">
            <div>
                <h5>Liste des joueurs :</h5>
                <?php foreach($tab as $values) { ?>
                    <ol class="list-group text-center">
                        <li class="list-group-item">
                            <?php echo "<a href=\"index.php?module=joueur&action=details&id=".$values['id']."\">". $values['nom'] . "</a>"; ?>
                        </li>
                    </ol>
                <?php } ?>
            </div>
        </div>
        <?php
    }    

    public function affiche_lien() {
        ?> 
            <ul>
                <li><a href="index.php?module=joueur&action=bienvenue">Bienvenue</a></li>
                <li><a href="index.php?module=joueur&action=liste">Liste</a></li>
                <li><a href="index.php?module=joueur&action=creer">Créer un joueur</a></li>
            </ul>

        <?php
    }

    public function affiche_bienvenue() {
        echo "Bienvenue sur le module Joueur.";
    }

    public function detailsJoueur($joueur) {
        ?>
            <p> Détails du joueur : </p>

            <ul>
                <li> Nom : <?php echo $joueur['nom']; ?> </li>
                <li> Description : <?php echo $joueur['biographie']; ?> </li> 
            </ul>
        <?php
    }

    public function form_ajout() {
        
        ?>  
            <h5> Appuyer sur le bouton pour ouvrir le formulaire : </h5>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Ouvrir formulaire
            </button>

            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Formulaire d'insertion des joueurs :</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
              
                    <form action="index.php?module=joueur&action=ajout" method="post">
                        <div>
                            <label for="nom">Saisir nom : </label>
                            <input type="text" name="nom" required/>  
                        </div>
                        <div>
                            <label for="desc">Saisir description : </label>
                            <input type="text" name="desc" required/>  
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                        </div>
                </form>

            </div>
            </div>
        <?php
    }
}

?>