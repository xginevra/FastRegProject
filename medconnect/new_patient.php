<?php
session_start()
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>New Patient Form</title>
</head>
<body>
    <header>
        <a href="index.html" >
            <object data="Logo.svg" height="20vh" style="margin-top: 5vh; margin-left: 6vh;"> </object>
        </a>
    </header>

    <h2 class="h2">New Patient Form</h2>

    

    <form class="form" action="submit_form.php" method="POST">

        <label for="name">Name:</label>
        <input class=".input1" type="text" id="name" name="name" required><br>

        <!-- Gender -->
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        
        <br>
        <br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="zipcode">Zipcode:</label>
        <input type="text" id="zipcode" name="zipcode" required><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <br>

        <label for="prevDiseases">Known Previous Diseases:</label>
        <textarea id="prevDiseases" name="prevDiseases"></textarea><br>

        <br>

        <label>Known Allergies:</label><br>
        <input type="checkbox" id="allergy1" name="allergies" value="Peanuts">
        <label for="allergy1">Peanuts</label><br>

        <input type="checkbox" id="allergy2" name="allergies" value="Shellfish">
        <label for="allergy2">Shellfish</label><br>

        <input type="checkbox" id="allergy3" name="allergies" value="Pollen">
        <label for="allergy3">Pollen</label><br>

        <input type="checkbox" id="allergy3" name="allergies" value="No known allergy">
        <label for="allergy3">No known allergy</label><br>
        <!-- Add more checkboxes as needed -->

        <br>
        

        <input type="submit" name="submit" value="submit">
    </form>

</body>
</html>
