<?php
//comment out what you don't need
    # Database Connection
    $db_conn = mysqli_connect("localhost", "root", "", "medconnect");
    //$db_conn = mysqli_connect("rdbms.strato.de", "dbu123640", "MouzHIwS23/24paN", "dbs12338865");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the patient ID from the URL parameter
$patient_id = $_GET['id'];

// Fetch patient data for the specific patient
$sql = "SELECT * FROM patients WHERE patient_id = $patient_id";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>-->
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
            <a href="loggedin-temperory.php" class="navbtn">My Profile</a>
            <a href="contact.html" class="navbtn">My Patients</a>
            <a href="loginpage.html">
              <button type="button" class="custombutton">LOG OUT</button>
            </a>
        </nav>
    </header>
        

    <div>
        <label for="search">Search:</label>
        <input type="text" id="search" name="search" oninput="filterOptions()">
        <button type="submit">Search</button>
    </div>

    <script>
        // function filterOptions() {
        //     var input = document.getElementById("search").value.toLowerCase();
        //     var options = document.getElementById("patient").options;
        //
        //     for (var i = 0; i < options.length; i++) {
        //         var optionText = options[i].text.toLowerCase();
        //         if (optionText.indexOf(input) > -1) {
        //             options[i].style.display = "";
        //         } else {
        //             options[i].style.display = "none";
        //         }
        //     }
        // }
    </script>
    
    <h1>Patient Details</h1>
    <?php
    // Display patient details
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p>ID: " . $row['patient_id'] . "</p>";
        echo "<p>Name: " . $row['patient_name'] . "</p>";
        echo "<p>Gender: " . $row['gender'] . "</p>";
        echo "<p>Address: " . $row['address'] . "</p>";
        echo "<p>Zip Code: " . $row['zipcode'] . "</p>";
        echo "<p>City: " . $row['city'] . "</p>";
        echo "<p>Phone: " . $row['phone'] . "</p>";
        echo "<p>Previous Diseases: " . $row['prevDiseases'] . "</p>";
        echo "<p>Allergies: " . $row['allergies'] . "</p>";
   
    </body>
    </html>
    ?>