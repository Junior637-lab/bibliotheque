<?php
abstract class Model {
    protected $pdo;
    protected $table;
    
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    
    public function getAll() {
        $query = "SELECT * FROM livres";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function find($id) {
        $query = "SELECT * FROM livres WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
    public function delete($id) {
        $query = "DELETE FROM livres WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}