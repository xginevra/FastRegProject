<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';
//use this database information if you're running it on your local machine

// $DATABASE_HOST = 'rdbms.strato.de';
// $DATABASE_USER = 'dbu123640';
// $DATABASE_PASS = 'MouzHIwS23/24paN';
// $DATABASE_NAME = 'dbs12338865';

// Establish a connection to the database
$conn = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the patient_id is provided in the URL or POST data
if (!empty($_GET['patient_id'])) {
    $patient_id = trim($_GET['patient_id']);
} elseif (!empty($_POST['patient_id'])) {
    $patient_id = trim($_POST['patient_id']);
} else {
    echo "Patient ID not provided.";
    exit;
}

// Fetch patient data based on patient_id
$sql = "SELECT * FROM patients WHERE patient_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $patient_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Extract patient details
    $patient_id = $row['patient_id'];
    $patient_name = $row['patient_name'];
    $gender = $row['gender'];
    $address = $row['address'];
    $zipcode = $row['zipcode'];
    $city = $row['city'];
    $phone = $row['phone'];
    $prevDiseases = $row['prevDiseases'];
    $allergies = $row['allergies'];
    $signsSymptoms = $row['signsSymptoms'];
    $diagnosis = $row['diagnosis'];
    $doctor_id = $row['doctor_id'];

    // The fetched values are stored in the corresponding variables


    // Check if the form is submitted for updating patient data
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_it'])) {
        // Initialize arrays to store update values and their corresponding types
        $updateValues = array();
        $updateTypes = "";

        // Retrieve updated data from the form
$fieldsToUpdate = array('patient_name', 'gender', 'address', 'zipcode', 'city', 'phone', 'signsSymptoms', 'diagnosis', 'allergies');

foreach ($fieldsToUpdate as $field) {
    if (isset($_POST[$field])) {
        // For checkboxes, check if it's an array and implode it into a string
        if ($field === 'allergies') {
            $updateValues[$field] = implode(', ', $_POST[$field]);
        } else {
            $updateValues[$field] = $_POST[$field];
        }

        // Determine the type based on the field
        if (in_array($field, array('zipcode', 'phone', 'patient_id', 'doctor_id'), true)) {
            $updateTypes .= 'i'; // Integer
        } else {
            $updateTypes .= 's'; // String
        }
    }
}


        // Use the UPDATE statement with dynamically generated SET clause
        $updateSql = "UPDATE patients SET ";

        foreach ($updateValues as $field => $value) {
            $updateSql .= "$field=?, ";
        }

        $updateSql = rtrim($updateSql, ', '); // Remove the trailing comma and space
        $updateSql .= " WHERE patient_id=?";

        // Add the patient_id to the updateValues array and updateTypes string
        $updateValues['patient_id'] = $patient_id;
        $updateTypes .= 'i'; // Assuming patient_id is an integer

        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param($updateTypes, ...array_values($updateValues));

        if ($updateStmt->execute()) {
            echo "Patient data updated successfully! <a href='loggedin-temperory.php'>Back to Dashboard</a>";
        } else {
            echo "Error updating patient data: " . $updateStmt->error;
        }

        // Close the prepared statement
        $updateStmt->close();
    }
} else {
    echo "Patient not found.";
}

// Close the statement
$stmt->close();

// Close the database connection
$conn->close();
?>
