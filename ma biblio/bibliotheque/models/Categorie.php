<?php
require_once __DIR__ . '/../core/Model.php';

class Categorie extends Model {
    protected $table = 'categories';
    
    public function create($nom) {
        $query = "INSERT INTO categories (nom) VALUES (:nom)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(['nom' => $nom]);
    }
    
    public function update($id, $nom) {
        $query = "UPDATE categories SET nom = :nom WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(['id' => $id, 'nom' => $nom]);
    }
}