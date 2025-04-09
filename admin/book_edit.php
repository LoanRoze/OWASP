<?php
include_once "../utils/regex.php";
include_once "../utils/config.php";
include_once "../utils/upload_helper.php";
include_once "./partials/top.php";
include_once "../utils/auth.php";

startSecureSession();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: ../405.php');
    exit;
}

if (!isset($_POST['csrf_token']) || !verifyCsrfToken($_POST['csrf_token'])) {
    echo "erreur du token de sécurité.";
    include_once "./partials/bottom.php";
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "ID du livre invalide.";
    include_once "./partials/bottom.php";
    exit;
}

$bookId = intval($_POST['id']);

if (isset($_POST['title']) && trim($_POST['title']) !== '') {
    $title = trim($_POST['title']);
    $titleLen = strlen($title);
    if ($titleLen < 2 || $titleLen > 150) {
        $errors[] = "Le champ 'Titre' doit contenir entre 2 et 150 caractères.";
    }
} else {
    $errors[] = "Le champ 'Titre' est obligatoire.";
}

if (isset($_POST['isbn']) && trim($_POST['isbn']) !== '') {
    $isbn = trim($_POST['isbn']);
    if (!preg_match($validPatterns['isbn'], $isbn)) {
        $errors[] = "Le champ 'ISBN' doit contenir exactement 13 chiffres.";
    }
} else {
    $errors[] = "Le champ 'ISBN' est obligatoire.";
}

if (isset($_POST['summary']) && trim($_POST['summary']) !== '') {
    $summary = trim($_POST['summary']);
    $summaryLen = strlen($summary);
    if ($summaryLen > 65535) {
        $errors[] = "Le champ 'Résumé' doit contenir au plus 65535 caractères.";
    }
} else {
    $summary = NULL;
}

if (isset($_POST['publication_year']) && trim($_POST['publication_year']) !== '') {
    $publicationYear = trim($_POST['publication_year']);
    if (!preg_match($validPatterns['year'], $publicationYear)) {
        $errors[] = "Le champ 'Année de publication' doit être au format YYYY (ex. : 1997).";
    }
} else {
    $errors[] = "Le champ 'Année de publication' est obligatoire.";
}


if (count($errors) > 0) {
    echo "<div class='error-message'><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul></div>";
    echo "<p><a href='book_edit_form.php?id=" . $bookId . "'>Retour au formulaire d'édition</a></p>";
    include_once "./partials/bottom.php";
    exit;
}

try {
    $db = getDbConnection();
    
    $statement = $db->prepare("SELECT * FROM books WHERE id = ?");
    $statement->execute([$bookId]);
    $currentBook = $statement->fetch();
    
    if (!$currentBook) {
        echo "Livre non trouvé.";
        include_once "./partials/bottom.php";
        exit;
    }
    
    if ($isbn != $currentBook['isbn']) {
        $verifStatement = $db->prepare("SELECT id FROM books WHERE isbn = ? AND id != ?");
        $verifStatement->execute([$isbn, $bookId]);
        if ($verifStatement->rowCount() > 0) {
            echo "L'ISBN existe déjà pour un autre livre.";
            include_once "./partials/bottom.php";
            exit;
        }
    }
    
    $coverPath = $currentBook['cover_path'];
    
    if (isset($_POST['remove_cover']) && $_POST['remove_cover'] == 'on' && $coverPath) {
        if (file_exists('../' . $coverPath)) {
            unlink('../' . $coverPath);
        }
        $coverPath = null;
    }
    
    
    $updateStatement = $db->prepare("UPDATE books SET title = ?, isbn = ?, summary = ?, publication_year = ?, cover_path = ? WHERE id = ?");
    $result = $updateStatement->execute([$title, $isbn, $summary, $publicationYear, $coverPath, $bookId]);
    
    if ($result) {
        echo "Le livre a été mis à jour avec succès !";
    } else {
        echo "Une erreur s'est produite lors de la mise à jour du livre.";
    }
    
} catch (PDOException $e) {
    echo "Erreur : " . htmlspecialchars($e->getMessage()) . "</div>";
}

include_once "./partials/bottom.php";
