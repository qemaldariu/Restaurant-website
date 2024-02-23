<?php

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (!empty($_POST['emri']) && !empty($_POST['telefoni']) && !empty($_POST['adresa']) && !empty($_POST['porosia'])) {
        // Get the form data
        $emri = $_POST['emri'];
        $telefoni = $_POST['telefoni'];
        $adresa = $_POST['adresa'];
        $porosia = $_POST['porosia'];

        // Establish connection to the database
        $conn = new mysqli('localhost', 'root', 'password', 'test', 3308);

        // Check for connection errors
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the SQL statement to insert data into the database (Assuming table name is 'orders')
        $sql = "INSERT INTO delievery (emri, telefoni, adresa, porosia) VALUES ('$emri', '$telefoni', '$adresa', '$porosia')";

        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        echo "All fields are required";
    }
} else {
    echo "Form not submitted";
}
?>
