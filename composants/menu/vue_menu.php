<?php

class VueMenu {

    public $contenu; 

    public function __construct() {
        if(isset($_SESSION['login'])) {
            $this->contenu = '
            <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="Index.php">MVC 3</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav justify-content-center" style="width: 100%;">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Joueur
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?module=joueur&action=liste">Liste des joueurs</a></li>
                                <li><a class="dropdown-item" href="index.php?module=joueur&action=creer">Créer un joueur</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Equipes
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?module=equipe&action=listeEquipe">Liste des équipes</a></li>
                                <li><a class="dropdown-item" href="index.php?module=equipe&action=form_equipe">Inscrire une équipe</a></li>
                            </ul>
                        </li>
                        <a class="nav-link" href="index.php?module=connexion&action=form_connexion">Connexion</a>
                        <a class="nav-link" href="index.php?module=connexion&action=deconnexion">Déconnexion</a> 
                    </div>
                </div>
                </div>
            </nav>';
        } else {
            $this->contenu = '
            <nav class="navbar bg-dark border-bottom border-body navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                <a class="navbar-brand" href="Index.php">MVC 3</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav justify-content-center" style="width: 100%;">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                        <a class="nav-link" href="index.php?module=connexion">Connexion</a>
                        <a class="nav-link" href="index.php?module=connexion&action=form_inscription">Inscription</a>
                    </div>
                </div>
                </div>
            </nav>';
        }
    }
}