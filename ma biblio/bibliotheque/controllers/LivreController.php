<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Livre.php';
require_once __DIR__ . '/../models/Categorie.php';

public function store() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $livre = new Livre();
        $success = $livre->create(
            $_POST['titre'],
            $_POST['auteur'],
            $_POST['id_categorie'] ?? null
        );
        
        if ($success) {
            $_SESSION['message'] = 'Livre ajouté avec succès';
            header('Location: '.$this->getBasePath().'/livre');
        } else {
            $_SESSION['error'] = 'Erreur lors de l\'ajout du livre';
            header('Location: '.$this->getBasePath().'/livre/create');
        }
        exit;
    }
}

private function getBasePath() {
    return '/ma%20biblio/bibliotheque/public';
}