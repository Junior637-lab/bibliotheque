<?php
require_once __DIR__ . '/../core/Model.php';

class Livre extends Model {
    protected $table = 'livres';
    
    public function create($titre, $auteur, $id_categorie) {
    try {
        $query = "INSERT INTO livres (titre, auteur, id_categorie) VALUES (:titre, :auteur, :id_categorie)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            'titre' => $titre,
            'auteur' => $auteur,
            'id_categorie' => $id_categorie
        ]);
    } catch (PDOException $e) {
        error_log('Erreur création livre: '.$e->getMessage());
        return false;
    }
}
    }
    
    public function update($id, $titre, $auteur, $id_categorie) {
        $query = "UPDATE livres SET titre = :titre, auteur = :auteur, id_categorie = :id_categorie WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            'id' => $id,
            'titre' => $titre,
            'auteur' => $auteur,
            'id_categorie' => $id_categorie
        ]);
    }
    
   public function getWithCategories() {
    $query = "SELECT l.*, c.nom as categorie_nom 
              FROM livres l
              LEFT JOIN categories c ON l.id_categorie = c.id";  // Ligne corrigée
    $stmt = $this->pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_OBJ) ?: [];
}
}