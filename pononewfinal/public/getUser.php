<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the "users" table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Display data in a list
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li><strong>Name:</strong> " . $row["name"] . "</li>";
        echo "<li><strong>Password:</strong> " . $row["password"] . "</li>";
        echo "<li><strong>Email:</strong> " . $row["email"] . "</li>"; // Added line for email
        echo "<li><strong>Gender:</strong> " . $row["gender"] . "</li>";
        echo "<li><strong>Occupation:</strong> " . $row["occupation"] . "</li>";
        echo "<li><strong>Date of Birth:</strong> " . $row["dob"] . "</li>";
        echo "<br>";
    }
    echo "</ul>";
} else {
    echo "No records found.";
}
// Close the database connection
$conn->close();
?>

