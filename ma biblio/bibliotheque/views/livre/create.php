<?php ob_start(); ?>

<div class="card">
    <div class="card-header">
        <h5>Ajouter un Livre</h5>
    </div>
    <div class="card-body">
        <form action="/livre/store" method="POST">
            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <div class="mb-3">
                <label for="auteur" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="auteur" name="auteur">
            </div>
            <div class="mb-3">
                <label for="id_categorie" class="form-label">Catégorie</label>
                <select class="form-select" id="id_categorie" name="id_categorie">
                    <option value="">-- Sélectionnez --</option>
                    <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie->id ?>"><?= htmlspecialchars($categorie->nom) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="/livre" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../../views/layout.php';
?>