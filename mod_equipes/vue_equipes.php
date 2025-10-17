<?php

include_once("vue_generique.php");

class VueEquipes extends VueGenerique {

    public function __construct() {
        parent::__construct();
    }

    public function affiche_liste($tab) {

        ?> 
        <div class="d-flex justify-content-center">
           
            <ol class="list-group list-group-numbered">

            <?php foreach($tab as $values) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                    <div class="fw-bold"> <?php  echo "<a href=\"index.php?module=equipe&action=detailsEquipe&id=".$values['id']."\">". $values['nom'] . "</a>"; ?></div>
                    <br>      
                    </div>
                </li>
            <?php } ?>
                
            </ol>
        
        </div>

        <?php
    }

    public function affiche_lien() {
        ?> 
            <ul>
                <li><a href="index.php?module=equipe&action=bienvenue">Bienvenue</a></li>
                <li><a href="index.php?module=equipe&action=listeEquipe">Liste</a></li>
            </ul>

        <?php
    }

    public function affiche_bienvenue() {
        echo "Bienvenue sur le module Equipe.";
    }

    public function detailsEquipe($equipe) {

        ?>
            <div class="col d-flex justify-content-center">
                <div class="card text-bg-dark mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                        <img src="<?php echo $equipe['logo'];?>" class="img-fluid rounded-start" alt="<?php echo $equipe['logo'];?>">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $equipe['nom'];?></h5>
                            <p class="card-text"><?php echo $equipe['description'];?></p>
                            <p class="card-text">Année de création : <?php echo $equipe['annee_creation'];?></p>
                            <p class="card-text">Pays : <?php echo $equipe['pays'];?></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    public function form_equipe() {
        ?>
            <div class="mx-auto p-2" style="width: 300px;">
                <h3 class="fw-bold"> Insérer une équipe : </h3>
                <form action="index.php?module=equipe&action=creer_equipe" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nom :</label>
                        <input type="text" class="form-control" name="nom" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Année création : </label>
                        <input type="number" class="form-control" name="annee" id="annee" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description  : </label>
                        <input type="text" class="form-control" name="desc" id="desc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pays  : </label>
                        <input type="number" class="form-control" name="pays" id="pays" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Logo  : </label>
                        <input type="file" class="form-control" name="logo" id="logo" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Insérer</button>
                </form>
            </div>
        <?php
    }
    
}

?>