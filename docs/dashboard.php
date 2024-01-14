<?php
//session_start();

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
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$doctor_id = $_SESSION['doctor_id'];

$sql = "SELECT * FROM patients WHERE doctor_id = $doctor_id";
$result = $con->query($sql);
?>

<table id="myTable" style="height: 50vh;">
    <tr class="header" style="color: #181818 !important;">
    <th style="width:16.25%;">ID</th>
        <th style="width:16.25%;">Name</th>
        <th style="width:30%;">City</th>
        <th style="width:10%;">Gender</th>
        <th style="width:23.75%;">Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['patient_id'] . "</td>";
            echo "<td>" . $row['patient_name'] . "</td>";
            echo "<td>" . $row['city'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";

            // "View Patient Details" button with a link to show_patient.php
            echo "<td><a href='show_patient.php?patient_id=" . $row['patient_id'] . "'>View Details</a></td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
</table>

<?php
$con->close();
?>
