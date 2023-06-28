<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form inputs
    $name = $_POST['name'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $occupation = $_POST['occupation'];
    $dob = $_POST['dob'];

    // Validate form inputs (similar to the existing JavaScript validation)
    if (empty($name) || empty($password) || empty($gender) || empty($occupation) || empty($dob)) {
        echo "Please fill in all the required fields.";
        exit;
    }

    // Perform additional validation or data sanitization if needed

    // Establish a database connection
    $servername = "localhost";
    $username = "roor";
    $password = "";
    $dbname = "registration_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to insert the data
    $stmt = $conn->prepare("INSERT INTO ursers (name, password, gender, occupation, dob) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $password, $gender, $occupation, $dob);

    if ($stmt->execute()) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data: " . $stmt->error;
    }

    
}
?>
