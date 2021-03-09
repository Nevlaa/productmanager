<?php

$username = getenv('USERNAME');
$password = getenv('PASSWORD');
echo($username);
echo($password);
try {
    $db = new PDO('mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_0c0b9ba07013cb3', $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include 'errors/db_error_connect.php';
    exit;
}

function display_db_error($error_message) {
    global $app_path;
    include 'errors/db_error.php';
    exit;
}
?>