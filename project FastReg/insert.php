<?php
# -- this is insert.php --

/**
 * The follwing Condition checks whether a client requested the insert.php through
 * the POST method with the u_name, u_age, and u_email
 * 
 * u_name, u_age, and u_email - You can also see these in the HTML Form (index.html) -
 * These are keys to access the actual data provided by a user.
 */
if (isset($_POST['u_username']) && isset($_POST['u_password'])) :

    # Database Connection my_test_db is the Database name.
    $db_conn = mysqli_connect("localhost", "root", "", "fastregdb");

    # Assigning user data to variables for easy access later.
    $username = $_POST['u_username'];
    $password = $_POST['u_password'];
    $firstname  = $_POST['u_firstname'];
    $lastname = $_POST['u_lastname'];
    $institution= $_POST['u_institution'];
    $emailadress = $_POST['u_emailadress'];

    // Hash the password
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    # SQL query for Inserting the Form Data into the users table.
    $sql = "INSERT INTO `doctors` (`username`, `password`, `firstname`, `lastname`, `institution`, `emailadress`) VALUES ('$username', '$password', '$firstname', '$lastname', '$institution', '$emailadress')";

    # Executing the Above SQL query.
    $query = mysqli_query($db_conn, $sql);

    # Checks that the query executed successfully
    if ($query) {
        echo 'You registered successfully. <a href="./login.php">Login</a>';
    } else {
        echo "Failed to insert new data.";
    }
    exit;
endif;

/**
 * This message occurs when a user tries to access Insert.php without -
 * the required method and credentials.
 */
echo '404 Page Not Found. <a href="./index.html">Go Home</a>';