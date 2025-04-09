<?php

/**
 * USAGE
 * 
 * $to = "john.doe@mailbox.com";
 * $subject = "Verification Code";
 * $content = "653298";
 * fakeMailSend($to, $subject, $content);
 */
function fakeMailSend($to, $subject, $content, $filePath = "../public/mails/")
{
    if (!file_exists($filePath)) {
        mkdir($filePath, 0755, true);
    }

    $dateTime = (new DateTime())->format('d/m/Y H:i:s');
    $fileName = 'mailbox.txt';

    $emailContent  = "----------" . PHP_EOL;
    $emailContent .= "At: $dateTime" . PHP_EOL;
    $emailContent .= "To: $to" . PHP_EOL;
    $emailContent .= "Subject: $subject" . PHP_EOL;
    $emailContent .= "Content: $content" . PHP_EOL;

    if (file_put_contents($filePath . $fileName, $emailContent, FILE_APPEND) === false) {
        // FIXME: error handling
        return false;
    }

    return true;
}

function startSecureSession(bool $https = false)
{
    $sessionId = bin2hex(random_bytes(32)); // Generate a custom strong ID
    session_id($sessionId); // Session custom strong ID setting

    session_set_cookie_params([
        'httponly' => true, // Limit session cookies access to HTTP (vs JavaScript...)
        'secure' => $https, // Limit session cookies on HTTPS
    ]);

    ini_set('session.gc_maxlifetime', 1800); // Server-side session lifetime in seconds
    ini_set('session.cookie_lifetime', 1800); // Client-side session cookies lifetime in seconds

    ini_set('session.gc_probability', 1); // See: https://www.php.net/manual/en/session.configuration.php#ini.session.gc-probability
    ini_set('session.gc_divisor', 100); // See: https://www.php.net/manual/en/session.configuration.php#ini.session.gc-divisor

    session_start(); // Finally, start customized session
}

function digitsCode(int $length = 6) {
    $limit = str_repeat('9', $length);
    $digitsCode = sprintf("%0{$length}d",rand(1,(int) $limit));

    return $digitsCode;
}

function prettyDump($var) {
    ini_set("highlight.comment", "#6a9955");
    ini_set("highlight.default", "#dcdcaa");
    ini_set("highlight.html", "#da70d6");
    ini_set("highlight.keyword", "#569cd6; font-weight: bold");
    ini_set("highlight.string", "#ce9178");
    
    ob_start();
    var_dump($var);
    $dumpedVar = ob_get_clean();
    
    $phpOpenTag = '<span style="color: ' . ini_get("highlight.default") . '">&lt;?php </span>';
    $highlightedVar = str_replace($phpOpenTag, '', highlight_string("<?php " . $dumpedVar, true));
    
    echo $highlightedVar;
}

function generateCsrfToken() {
    $token = bin2hex(random_bytes(32)); // 64 caractères aléatoires
    
    try {
        $db = getDbConnection();
        $stmt = $db->prepare("INSERT INTO csrf_tokens (token, session_id, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->execute([$token, session_id()]);
        
        $_SESSION['csrf_token'] = $token;
        return $token;
    } catch (PDOException $e) {
        // En cas d'erreur, générer un token de session uniquement (moins sécurisé mais fonctionnel)
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }
}

function verifyCsrfToken($token) {
    if (empty($token) || empty($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
        return false;
    }
    
    try {
        $db = getDbConnection();
        $statement = $db->prepare("SELECT token FROM csrf_tokens WHERE token = ? AND session_id = ? AND expires_at > NOW()");
        $statement->execute([$token, session_id()]);
        
        return ($statement->rowCount() > 0);
    } catch (PDOException $e) {
        // En cas d'erreur DB, vérifier uniquement le token de session
        return ($token === $_SESSION['csrf_token']);
    }
}