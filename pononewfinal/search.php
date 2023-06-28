

<?php
// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "registration_db";

$connection = mysqli_connect($host, $username, $password, $database);

// Get the search input from the query string
$search = $_GET["search"];

// Perform a database query to retrieve suggestions
$query = "SELECT suggestion FROM suggestions_table WHERE suggestion LIKE '%$search%'";
$result = mysqli_query($connection, $query);

$suggestions = array();
if($result->num_rows > 0){
while ($row = mysqli_fetch_assoc($result)) {
  $suggestions[] = $row["suggestion"];
}
}

// Return suggestions as a JSON response
header("Content-Type: application/json");
echo json_encode($suggestions);

// Close the database connection
mysqli_close($connection);
?>
