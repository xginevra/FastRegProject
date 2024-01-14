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

// Check if the user is logged in
if (!isset($_SESSION['loggedin'])) {
    echo 'User not logged in. <a href="./index.html">Go Home</a>';
    exit();
}

// Get the patient ID from the URL
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;
// Debugging statement
echo "Debug: Patient ID from URL: $patient_id";

if ($patient_id === null) {
    echo 'Invalid patient ID. <a href="show_patient.html">Go back</a>';
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
    $imageUpload = $_POST['imageUpload'];

    // Handle file upload
    if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
        // ... (your existing file upload logic)
    } else {
        echo "Error: " . $_FILES['imageUpload']['error'];
    }

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
            diagnosis = ?,
            imageUpload = ?
            WHERE patient_name = ?";

    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssssssbs", $gender, $address, $zipcode, $city, $phone, $prevDiseases, $allergies, $signsSymptoms, $diagnosis, $imageUpload, $patient_name);

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
