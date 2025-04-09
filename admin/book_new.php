<?php

include_once "../utils/regex.php";

include_once "./partials/top.php";

$errors = [];
$successes = [];

/**
 * ******************** [1] Check if submitted form is valid
 */

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Is method allowed ?
    if (isset($_GET['title']) && trim($_GET['title']) !== '') { // Required field value
        // OK
        $title = trim($_GET['title']);
        $titleLen = strlen($title);
        if ($titleLen < 2 || $titleLen > 150) { // Format check
            // KO
            $errors[] = "Le champ 'Titre' doit contenir entre 2 et 150 caractères.";
        }
    } else { // KO
        $errors[] = "Le champ 'Titre' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_GET['isbn']) && trim($_GET['isbn']) !== '') { // Required field value
        $isbn = trim($_GET['isbn']);
        if (!preg_match($validPatterns['isbn'], $isbn)) { // Format check
            // KO
            $errors[] = "Le champ 'ISBN' doit contenir exactement 13 chiffres.";
        }
    } else { // KO
        $errors[] = "Le champ 'ISBN' est obligatoire. Merci de saisir une valeur.";
    }

    if (isset($_GET['summary']) && trim($_GET['summary']) !== '') { // Not required field value but essential test needed
        // OK
        $summary = trim($_GET['summary']);
        $summaryLen = strlen($summary);
        if ($summaryLen > 65535) { // Format check
            // KO
            $errors[] = "Le champ 'Résumé' ne doit pas excéder 65535 caractères.";
        }
    } else {
        $summary = '';
    }

    if (isset($_GET['publication_year']) && trim($_GET['publication_year']) !== '') { // Required field value
        // OK
        $publicationYear = trim($_GET['publication_year']);
        if (!preg_match($validPatterns['year'], $publicationYear)) { // Format check
            // KO
            $errors[] = "Le champ 'Année de publication' doit être au format YYYY (ex. : 1997).";
        }
    } else { // KO
        $errors[] = "Le champ 'Année de publication' est obligatoire. Merci de saisir une valeur.";
    }
} else { // KO
    // "405 - Method Not Allowed" error handling
    header('Location: ../405.php');
    exit;
}

/**
 * ******************** [2-A] Submitted form is valid ➔ Data sanitization and escaping
 */

if (count($errors) === 0) {
    // TODO: Escaping (addslashes()) is unecessary as we later use a prepared statement
    $title = addslashes(htmlspecialchars($title, ENT_NOQUOTES | ENT_SUBSTITUTE));
    // FIXME: Check if the ISBN already exists in database
    $isbn = addslashes(htmlspecialchars($isbn, ENT_NOQUOTES | ENT_SUBSTITUTE));
    $summary = addslashes(htmlspecialchars($summary, ENT_NOQUOTES | ENT_SUBSTITUTE));
    $publicationYear = addslashes(htmlspecialchars($publicationYear, ENT_NOQUOTES | ENT_SUBSTITUTE));

    $currentDateTime = new DateTime();
    $createdAt = $updatedAt = $currentDateTime->format('Y-m-d H:i:s');

    /**
     * ******************** [3] Create the corresponding record in database
     */
    include_once "../utils/dbConnect.php";

    $connection = getDbConnection();
    
    $query  = "INSERT INTO `book` (`isbn`, `title`, `summary`, `publication_year`, `created_at`, `updated_at`) ";
    $query .= "VALUES (:isbn, :title, :summary, :publication_year, :created_at, :updated_at)";

    $queryParams = [
        ':isbn' => $isbn,
        ':title' => $title,
        ':summary' => $summary,
        ':publication_year' => $publicationYear,
        ':created_at' => $createdAt,
        ':updated_at'=> $updatedAt,
    ];

    $statement = $connection->prepare($query);

    if ($statement->execute($queryParams)) {
        $successes[] = 'Le nouveau livre a bien été enregistré.';
    } else {
        $errors[] = "Une erreur s'est produite lors de l'enregistrement du livre en base de données : veuillez contacter l'administrateur du site.";
    }

    $connection = null;
}

/**
 * ******************** [2-B] Submitted form is not valid (some errors occured)
 */

if (count($errors) !== 0) {
    $errorMsg = "<ul>";
    foreach ($errors as $error) {
        $errorMsg .= "<li>$error</li>";
    }
    $errorMsg .= "</ul>";
    echo $errorMsg;
} else { //... or everything is OK
    $successMsg = "<ul>";
    foreach ($successes as $success) {
        $successMsg .= "<li>$success</li>";
    }
    $successMsg .= "</ul>";
    echo $successMsg;
}

include_once "./partials/bottom.php";
