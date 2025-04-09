<?php

include_once "../utils/config.php";
include_once "./partials/top.php";
include_once "../utils/auth.php";

startSecureSession();


if (!isset($_GET['id'])) {
    echo "id du livre invalide.";
    include_once "./partials/bottom.php";
    exit;
}

$bookId = intval($_GET['id']);

try {
    $db = getDbConnection();
    $statement = $db->prepare("SELECT * FROM books WHERE id = ?");
    $statement->execute([$bookId]);
    $book = $statement->fetch();

    if (!$book) {
        echo "Livre non trouvé.";
        include_once "./partials/bottom.php";
        exit;
    }
    
    $borrowStatement = $db->prepare("SELECT * FROM borrows WHERE book_id = ? AND return_date IS NULL");
    $borrowStatement->execute([$bookId]);
    $isCurrentlyBorrowed = ($borrowStatement->rowCount() > 0);
    
} catch (PDOException $e) {
    echo "Erreur: " . htmlspecialchars($e->getMessage());
    include_once "./partials/bottom.php";
    exit;
}

$csrfToken = generateCsrfToken();
?>

<div class="delete-confirmation">
    <h2>Supprimer un livre</h2>
    
    <?php if ($isCurrentlyBorrowed): ?>
        <p>le livre est emprunté, êtes vous sur de vouloir le supprimer ?</p>
    <?php endif; ?>
    
    <div class="book-info">
        <h3><?= htmlspecialchars($book['title']) ?></h3>
        <p><strong>ISBN:</strong> <?= htmlspecialchars($book['isbn']) ?></p>
        <p><strong>Année de publication:</strong> <?= htmlspecialchars($book['publication_year']) ?></p>
        
        <?php if ($book['cover_path']): ?>
            <div class="book-cover">
                <img src="<?= htmlspecialchars('../' . $book['cover_path']) ?>" alt="Couverture" style="max-width: 150px;">
            </div>
        <?php endif; ?>
    </div>
    
    <div class="confirmation-message">
        <p>Êtes-vous sûr de vouloir supprimer définitivement ce livre?</p>
        <p class="warning">Cette action est irréversible.</p>
    </div>
    
    <form action="book_delete.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">
        <input type="hidden" name="id" value="<?= $bookId ?>">
        
        <div class="button-group">
            <input type="submit" name="confirm_delete" value="Oui, supprimer ce livre" class="btn-danger">
            <a href="book_show.php?id=<?= $bookId ?>" class="btn">Annuler</a>
        </div>
    </form>
</div>

<?php
include_once "./partials/bottom.php";
