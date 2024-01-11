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

    // Handle file upload
    if (isset($_FILES['imageUpload']) && $_FILES['imageUpload']['error'] == 0) {
        $allowed = array('jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif');
        $file_name = $_FILES['imageUpload']['name'];
        $file_type = $_FILES['imageUpload']['type'];
        $file_size = $_FILES['imageUpload']['size'];

        // Validate file extension
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) {
            die("Error: Please select a valid file format.");
        }

        // Validate file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($file_size > $maxsize) {
            die("Error: File size is larger than the allowed limit.");
        }

        // Validate MIME type
        if (in_array($file_type, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $file_name)) {
                echo $file_name . " is already exists.";
            } else {
                move_uploaded_file($_FILES['imageUpload']['tmp_name'], "upload/" . $file_name);
                echo "Your file was uploaded successfully.";
                // You can now store the file name or path in your database if required
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
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
