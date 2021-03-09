<?php

$username = getenv('USERNAME');
$password = getenv('PASSWORD');
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO("mysql:host=gator3301.hostgator.com;dbname=shorsrgh_guitar_shop;port=3306", $username, $password, $options);
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