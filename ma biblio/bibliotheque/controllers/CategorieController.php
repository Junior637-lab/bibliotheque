<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../models/Categorie.php';

class CategorieController extends Controller {
    private $model;
    
    public function __construct() {
        $this->model = new Categorie();
    }
    
    public function index() {
        $categories = $this->model->getAll();
        $this->render('categorie/index', ['categories' => $categories]);
    }
    
    public function create() {
        $this->render('categorie/create');
    }
    
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->create($_POST['nom']);
            $this->redirect('/categorie');
        }
    }
    
    public function edit($id) {
        $categorie = $this->model->find($id);
        $this->render('categorie/edit', ['categorie' => $categorie]);
    }
    
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST['nom']);
            $this->redirect('/categorie');
        }
    }
    
    public function delete($id) {
        $this->model->delete($id);
        $this->redirect('/categorie');
    }
}