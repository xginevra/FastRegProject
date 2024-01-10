<?php
session_start();

// Change this to your connection info.
// $DATABASE_HOST = 'localhost';
// $DATABASE_USER = 'root';
// $DATABASE_PASS = '';
// $DATABASE_NAME = 'medconnect';
//use this database information if you're running it on your local machine

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

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email_address'], $_POST['password'])) {
    // Could not get the data that should have been sent.
    exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM doctors WHERE email_address = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['email_address']);
    $stmt->execute();

    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();

    // Bind the result variables
    $stmt->bind_result($id, $truepass);

    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        $userEnteredPassword = $_POST['password'];

        // Account exists, now we verify the password.
        if (password_verify($userEnteredPassword, $truepass)) {
// Create sessions, so we know the user is logged in.
            session_regenerate_id();
            $_SESSION['loggedin'] = true;
            $_SESSION['doctor_id'] = $id; // Store doctor's ID
            $_SESSION['doctor_name'] = $_POST['email_address']; // Store doctor's name
            header('Location: loggedin-temperory.php');
            exit(); // Ensure no further code is executed after the redirect

        } else {
            // Incorrect password
            echo 'Incorrect password!';
        }
    } else {
        // Incorrect username
        echo 'Incorrect email address!';
    }

    $stmt->close();
}
?>