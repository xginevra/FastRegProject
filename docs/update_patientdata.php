<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';


// $DATABASE_HOST = 'rdbms.strato.de';
// $DATABASE_USER = 'dbu123640';
// $DATABASE_PASS = 'MouzHIwS23/24paN';
// $DATABASE_NAME = 'dbs12338865';


// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if the user is logged in (adjust this condition based on your actual session logic)
if (!isset($_SESSION['loggedin'])) {
    echo 'User not logged in. <a href="./index.html">Go Home</a>';
    exit();
}

if (isset($_POST['submit_it'])) {
    // Add this line for debugging
    error_log("POST data: " . print_r($_POST, true));

    // Get the patient name from the form
    $patient_name = $_POST['patients'];

    // Collect updated data from the form
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $prevDiseases = $_POST['prevDiseases'];
    $allergies = isset($_POST['allergies']) ? implode(',', $_POST['allergies']) : '';
    $signsSymptoms = $_POST['signsSymptoms'];
    $diagnosis = $_POST['diagnosis'];

    // Use prepared statements for security
    $sql = "UPDATE patients SET 
            gender = ?,
            address = ?,
            zipcode = ?,
            city = ?,
            phone = ?,
            prevDiseases = ?,
            allergies = ?,
            signsSymptoms = ?,
            diagnosis = ?
            WHERE patient_name = ?";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssssss", $gender, $address, $zipcode, $city, $phone, $prevDiseases, $allergies, $signsSymptoms, $diagnosis, $patient_name);

    // Execute the statement
    $stmt->execute();

    // Check if the query executed successfully
    if ($stmt->affected_rows > 0) {
        echo 'Patient data successfully updated. <a href="patient_data.html">See patient data</a> or <a href="loggedin.php">Go back to profile</a>';
    } else {
        echo 'Failed to update patient data. <a href="show_patient.html">Try again?</a>';
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo 'Submit parameter not set.';
}

// Close the database connection
mysqli_close($con);
?>
