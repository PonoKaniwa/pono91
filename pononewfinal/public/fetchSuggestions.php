<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Establish a database connection
try {
    $dbh = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit;
}

// Check if the query parameter is set
if (isset($_POST['query'])) {
    $query = $_POST['query'];

    // Prepare the query to fetch suggestions from the database
    $stmt = $dbh->prepare("SELECT name FROM suggestions WHERE name LIKE :query");
    $stmt->bindValue(':query', '%' . $query . '%');
    $stmt->execute();

    // Fetch the suggestions from the database
    $suggestions = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Output the suggestions as HTML list items
    foreach ($suggestions as $suggestion) {
        echo '<div class="suggestion-item">' . $suggestion . '</div>';
    }
}
?>

