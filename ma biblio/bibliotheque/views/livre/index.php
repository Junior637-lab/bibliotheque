<?php ob_start(); ?>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5>Liste des Livres</h5>
        <a href="/livre/create" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Ajouter
        </a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($livres) && is_array($livres)): ?>
                    <?php foreach ($livres as $livre): ?>
                        <tr>
                            <td><?= htmlspecialchars($livre->id ?? '') ?></td>
                            <td><?= htmlspecialchars($livre->titre ?? '') ?></td>
                            <td><?= htmlspecialchars($livre->auteur ?? '') ?></td>
                            <td><?= htmlspecialchars($livre->categorie_nom ?? 'Non catégorisé') ?></td>
                            <td class="action-btns">
                                <a href="/livre/edit/<?= $livre->id ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="/livre/delete/<?= $livre->id ?>" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="bi bi-book" style="font-size: 2rem;"></i><br>
                            Aucun livre disponible dans la bibliothèque
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>