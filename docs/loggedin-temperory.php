<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MEDCONNECT - Dashboard</title>
    <link rel="stylesheet" href="stylesdraft.css" />
</head>
<body>
    <header>
        <a href="index.html" >
            <object data="Logo.svg" height="20vh" style="margin-top: 2vh; margin-left: 6vh; pointer-events: none;"> </object>
        </a>
        <nav>
            <a href="loggedin-temperory.php" class="navbtn">PROFILE</a>
            <a href="logout.php" class="navbtn" style="margin-right: 13vh; margin-top: 5vh;">LOGOUT</a>
        </nav>
    </header>
    <div class="welcome">
        Welcome back, <?=$_SESSION['doctor_name']?>!<br>
    </div>
    <div>
        <div class="patientRecords">
            Patient records
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search by Name...">
        </div>

        <?php include 'dashboard.php'; ?>

        <div style="text-align: center; margin-top: 15px;">
            <a href="new_patient.html" >
                <button type="button" class="custombutton" style="width: 44%; height: 8vh; font-size: 2vh;">+  NEW PATIENT</button>
            </a>
        </div>
    </div>
</body>
</html>