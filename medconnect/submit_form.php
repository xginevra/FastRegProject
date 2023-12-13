<?php
session_start();

$DATABASE_HOST = 'rdbms.strato.de';
$DATABASE_USER = 'dbu123640';
$DATABASE_PASS = 'MouzHIwS23/24paN';
$DATABASE_NAME = 'dbs12338865';

// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_POST['name']) && isset($_POST['city'])) :

    # Database Connection my_test_db is the Database name.
    //$db_conn = mysqli_connect("localhost", "root", "", "medconnect");
    $db_conn = mysqli_connect("rdbms.strato.de", "dbu123640", "MouzHIwS23/24paN", "dbs12338865");


    # Assigning user data to variables for easy access later.
    $patient_name = $_POST['name'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $prevDiseases = $_POST['prevDiseases'];
    $allergies = $_POST['allergies'];

    //if(isset($_POST['submit_it'])) {
       // echo $allergies;
    foreach($allergies as $item) {
       // echo $item . '<br>'; 
     //  $query1 = "INSERT INTO patients (allergies) VALUES ('$item)";
      // $query_run = mysqli_query($db_conn, $query1);
       //}

    # SQL query for Inserting the Form Data into the patients table.
    $sql = "INSERT INTO `patients` (`patient_name`, `gender`, `address`, `zipcode`, `city`, `phone`, `prevDiseases`, `allergies`) VALUES ('$patient_name', '$gender', '$address', '$zipcode', '$city', '$phone', '$prevDiseases', '$item')";
    # Executing the Above SQL query.
    $query = mysqli_query($db_conn, $sql);
    # Checks that the query executed successfully
    if ($query) {
        echo 'Patient data successfully inserted. <a href="patient_data.html">See patient data</a> or <a href="loggedin.php">Go back to profile</a>';
    } else {
       // echo "Failed to insert new data. <a href=".'"'."new_patient.html".'"'.">New try?</a>";
    }
    }
    exit;
endif;

/**
 * This message occurs when a user tries to access submit_form.php without -
 * the required method and credentials.
 */
echo '404 Page Not Found. <a href="./index.html">Go Home</a>';