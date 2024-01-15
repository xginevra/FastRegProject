<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesdraft.css">
    <title>Show Patient</title>
</head>
<body>
    <header>
        <a href="index.html" >
            <object data="Logo.svg" height="20vh" style="margin-top: 5vh; margin-left: 6vh;"> </object>
        </a>
        <!--pages are yet to be created-->
        <nav>
            <a href="loggedin-temperory.php" class="navbtn">DASHBOARD</a>
            <a href="logout.php">
              <button type="button" class="custombutton">LOG OUT</button>
            </a>
        </nav>
    </header>
<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'medconnect';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Retrieve patient_id from the URL
$patient_id = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

if ($patient_id !== null) {
    // Fetch patient details based on patient_id
    $sql = "SELECT * FROM patients WHERE patient_id = $patient_id";
    $result = $con->query($sql);

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

        // Display patient details
        echo "<h1>Patient Details</h1>";
        echo "<p><strong>Patient ID:</strong> $patient_id</p>";
        echo "<p><strong>Patient Name:</strong> $patient_name</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Zipcode:</strong> $zipcode</p>";
        echo "<p><strong>City:</strong> $city</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Previous Diseases:</strong> $prevDiseases</p>";
        echo "<p><strong>Allergies:</strong> $allergies</p>";
        echo "<p><strong>Signs and Symptoms:</strong> $signsSymptoms</p>";
        echo "<p><strong>Diagnosis:</strong> $diagnosis</p>";
        echo "<p><strong>Doctor ID:</strong> $doctor_id</p>";

    } else {
        echo "Patient not found";
    }
} else {
    echo "Invalid or missing patient ID";
}

$con->close();
?>
</body>
</html>
