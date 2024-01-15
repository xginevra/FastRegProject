<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';

// $DATABASE_HOST = 'rdbms.strato.
// $DATABASE_USER = 'dbu123640';
// $DATABASE_PASS = 'MouzHIwS23/24
// $DATABASE_NAME = 'dbs12338865';

// Establish a connection to the database
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the patient_id is provided in the URL
if (!isset($_GET['patient_id'])) {
    echo "Patient ID not provided in the URL.";
    exit;
}

$patient_id = $_GET['patient_id'];

// Delete patient data based on patient_id
$deleteSql = "DELETE FROM patients WHERE patient_id = $patient_id";

if ($conn->query($deleteSql) === TRUE) {
    echo 'Patient data deleted successfully! <a href="loggedin-temperory.php">Go back to profile</a>';
} else {
    echo "Error deleting patient data: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
