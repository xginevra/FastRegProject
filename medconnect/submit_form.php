<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Check if the user is logged in (adjust this condition based on your actual session logic)

if (isset($_POST['submit'])) {
        // Assigning user data to variables for easy access later.
        $patient_name = $_POST['name'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $zipcode = $_POST['zipcode'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $prevDiseases = $_POST['prevDiseases'];

        // Check if allergies are set in the form
        if (isset($_POST['allergies'])) {
            // Sanitize and implode the checked allergies into a comma-separated string
            $allergies = implode(",", array_map(function($item) use ($con) {
                return mysqli_real_escape_string($con, $item);
            }, $_POST['allergies']));
        } else {
            $allergies = ''; // No allergies selected
        }

        // SQL query for Inserting the Form Data into the patients table.
        $sql = "INSERT INTO `patients` (`patient_name`, `gender`, `address`, `zipcode`, `city`, `phone`, `prevDiseases`, `allergies`) VALUES ('$patient_name', '$gender', '$address', '$zipcode', '$city', '$phone', '$prevDiseases', '$allergies')";

        // Executing the SQL query.
        $query = mysqli_query($con, $sql);

        // Check if the query executed successfully
        if ($query) {
            echo 'Patient data successfully inserted. <a href="patient_data.html">See patient data</a> or <a href="loggedin.php">Go back to profile</a>';
        } else {
            echo 'Failed to insert new data. <a href="new_patient.html">New try?</a>';
        }
    } else {
        echo 'Submit parameter not set.';
    }
 //else {
    //echo 'User not logged in. <a href="./index.html">Go Home</a>';
//}

// Close the database connection
mysqli_close($con);
?>
