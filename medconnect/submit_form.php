<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';

//$DATABASE_HOST = 'rdbms.strato.de';
//$DATABASE_USER = 'dbu123640';
//$DATABASE_PASS = 'MouzHIwS23/24paN';
//$DATABASE_NAME = 'dbs12338865';


// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if the user is logged in as a doctor
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || !isset($_SESSION['doctor_id'])) {
    echo 'User not logged in. <a href="./index.html">Go Home</a>';
    exit();
}

if (isset($_POST['submit_it'])) {

    // Add this line for debugging
    error_log("POST data: " . print_r($_POST, true));

    $patient_name = $_POST['name'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $prevDiseases = $_POST['prevDiseases'];
    $allergies = '';

    // Check if allergies are set in the form
    if (isset($_POST['allergies'])) {
        $allergies = implode(',', $_POST['allergies']);
    }

    // Retrieve doctor's information from the session
    $doctor_id = $_SESSION['doctor_id'];

    // Use prepared statements for security
    $sql = "INSERT INTO patients (`patient_name`, `gender`, `address`, `zipcode`, `city`, `phone`, `prevDiseases`, `allergies`, `doctor_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssssssi", $patient_name, $gender, $address, $zipcode, $city, $phone, $prevDiseases, $allergies, $doctor_id);

    // Execute the statement
    $stmt->execute();

    // Check if the query executed successfully
    if ($stmt->affected_rows > 0) {
        echo 'Patient data successfully inserted. <a href="loggedin-temperory.php">Go back to profile</a>';
    } else {
        echo 'Failed to insert new data. <a href="new_patient.html">New try?</a>';
    }

    // Close the prepared statement
    $stmt->close();
} else {
    echo 'Submit parameter not set.';
}

// Close the database connection
mysqli_close($con);
?>
