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
        <a href="index.html">
            <object data="Logo.svg" height="20vh" style="margin-top: 5vh; margin-left: 6vh;"> </object>
        </a>
        <nav>
            <a href="loggedin-temperory.php" class="navbtn">My Profile</a>
            <a href="contact.html" class="navbtn">My Patients</a>
            <a href="logout.php" class="navbtn" style="margin-right: 13vh; margin-top: 5vh;">LOGOUT</a>
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

    <div style="margin-left: 3.5vw; margin-bottom: 12vh;">
        <div>
            <div class="labelline">NAME</div>
            <p class="output"><?php echo $patient_name; ?></p>
        </div>
        <div class="labelline">Gender</div>
        <p class="output"><?php echo $gender; ?></p>
        <div>
            <div class="labelline">ADDRESS</div>
            <p class="output"><?php echo $address; ?></p>
        </div>
        <div>
            <div class="labelline">ZIPCODE</div>
            <p class="output"><?php echo $zipcode; ?></p>
        </div>
        <div>
            <div class="labelline">CITY</div>
            <p class="output"><?php echo $city; ?></p>
        </div>
        <div>
            <div class="labelline">PHONE NUMBER</div>
            <p class="output"><?php echo $phone; ?></p>
        </div>
        <div>
            <div class="labelline">Known Previous Diseases:</div>
            <p class="output" style="height: 180px; overflow: auto;"><?php echo $prevDiseases; ?></p>
        </div>
        <div>
            <div class="labelline">Current Signs and Symptoms:</div>
            <p class="output" style="height: 180px; overflow: auto;"><?php echo $signsSymptoms; ?></p>
        </div>
        <div class="labelline">Known Allergies:</div>
        <p class="output"><?php echo $allergies; ?></p>

    </div>
</body>
</html>
