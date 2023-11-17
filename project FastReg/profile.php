<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fastregdb';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, emailadress, firstname, lastname, institution FROM doctors WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email, $firstname, $lastname, $institution);
$stmt->fetch();
$stmt->close();
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> FastReg - registering & administrating patient's data </title>
</head>
<body>

<div id="wrapper" class="shadow">

    <div id="header">
    <h1>Welcome to <a href="index.php">FastReg</a>!</h1>
    </div>

    <div id="menue-left">
        <l>
            <li><a href="logout.php">Logout</a></li><br />
            <li><a href="info.php">about us</a></li>
        </l>
    </div>

    <div id="content">
    <h2>Profile Page</h2>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
                    <tr>
                        <td>Full name:</td>
                        <td><?=$lastname?>, <?=$firstname?></td>
                    </tr>
                    <tr>
                        <td>Your Institution:</td>
                        <td><?=$institution?></td>
                    </tr>

				</table>
    </div>



</div>
<div id="footer">
    <p> Franziska Wojtkowski, HI 3. semester WS 23/24 </p>
</div>
</body>
</html>