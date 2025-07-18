<?php
require_once __DIR__.'/../autoloader.php';

session_start();

$basePath = '/ma%20biblio/bibliotheque/public';
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$cleanRequest = str_replace($basePath, '', $request);

// Routes principales
switch ($cleanRequest) {
    case '/':
    case '/livre':
        (new LivreController())->index();
        break;
        
    case '/livre/create':
        (new LivreController())->create();
        break;
        
    case '/livre/store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new LivreController())->store();
        }
        break;
        
    case '/categorie':
        (new CategorieController())->index();
        break;
        
    default:
        http_response_code(404);
        echo 'Page non trouvée';
        break;
}