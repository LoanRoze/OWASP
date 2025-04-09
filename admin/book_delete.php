<?php
include_once "../utils/config.php";
include_once "./partials/top.php";
include_once "../utils/auth.php";

startSecureSession();


if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../405.php');
    exit;
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    echo "erreur du token de sécurité.";
    include_once "./partials/bottom.php";
    exit;
}

if (!isset($_POST['id'])) {
    echo "id du livre invalide.";
    include_once "./partials/bottom.php";
    exit;
}

$bookId = intval($_POST['id']);

try {
    $db = getDbConnection();
    
    $getStatement = $db->prepare("SELECT cover_path FROM books WHERE id = ?");
    $getStatement->execute([$bookId]);
    $book = $getStatement->fetch();
    
    if (!$book) {
        echo "Livre non trouvé.";
        include_once "./partials/bottom.php";
        exit;
    }
    
    $deleteStatement = $db->prepare("DELETE FROM books WHERE id = ?");
    $result = $deleteStatement->execute([$bookId]);
    
    if ($result) {
        if ($book['cover_path'] && file_exists('../' . $book['cover_path'])) {
            unlink('../' . $book['cover_path']);
        }
        
        echo "Le livre a été supprimé avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la suppression du livre.";
    }
    
} catch (PDOException $e) {
    echo "Erreur: " . htmlspecialchars($e->getMessage());
}

include_once "./partials/bottom.php";
