<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "password"; // If you haven't set a password for MySQL, leave this empty
$database = "restoranti";
$port = 3308;

// Create connection
$conn = new mysqli($servername, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $data = $_POST['data'];
    $ora = $_POST['ora'];
    $tel = $_POST['tel'];
    $numri = $_POST['numri'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO registration (Emri, Mbiemri, Data, Ora, Tel, Numri) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $emri, $mbiemri, $data, $ora, $tel, $numri);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Prenotimi u krye me sukses";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
