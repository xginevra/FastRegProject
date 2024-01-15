<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesdraft.css">
    <title>Update Patient</title>
</head>
<body>
<header>
    <a href="index.html">
        <object data="Logo.svg" height="20vh" style="margin-top: 5vh; margin-left: 6vh;"> </object>
    </a>

    <nav>
        <a href="loggedin-temperory.php" class="navbtn">Dashboard</a>
        <a href="logout.php" class="navbtn" style="margin-right: 13vh; margin-top: 5vh;">LOGOUT</a>
    </nav>
</header>

    <h1 class="hg4">Update Patient</h1>

    <form class="form" action="update_patientdata.php" method="post" enctype="multipart/form-data">

        <div style="margin-top: 100px;">
            <label class="labelline" style="margin-right: 50px;" for="name">Patient ID:</label><br>
             <input type="text" name="patient_id" value=" <?php echo $_GET['patient_id']; ?> " readonly />
        </div>

        <label class="labelline" style="margin-right: 50px;" for="name">Name:</label><br>
        <input class="input1" style="margin-top: 20px;" type="text" id="name" name="name"><br>

        <div class="labelline">Gender:</p>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>

        <br>
        <br>

        <label for="address">Address:</label><br>
        <input style="margin-left: -8px; margin-top: 20px; margin-bottom: 20px;" type="text" id="address" name="address"><br>

        <label for="zipcode">Zipcode:</label><br>
        <input style="margin-left: -8px; margin-top: 20px; margin-bottom: 20px;" type="text" id="zipcode" name="zipcode"><br>

        <label for="city">City:</label><br>
        <input style="margin-top: 20px; margin-left: -8px; margin-bottom: 20px;" type="text" id="city" name="city"><br>

        <label for="phone">Phone:</label><br>
        <input style="margin-top: 20px; margin-left: 20px; margin-left: -8px;" type="tel" id="phone" name="phone"><br>

        <br>

        <label>Known Allergies:</label><br>
        <input type="checkbox" id="allergy1" name="allergies[]" value="Peanuts">
        <label for="allergy1">Peanuts</label><br>

        <input type="checkbox" id="allergy2" name="allergies[]" value="Shellfish">
        <label for="allergy2">Shellfish</label><br>

        <input type="checkbox" id="allergy3" name="allergies[]" value="Pollen">
        <label for="allergy3">Pollen</label><br>

        <input type="checkbox" id="allergy4" name="allergies[]" value="No known allergy">
        <label for="allergy4">No known allergy</label><br>
    <div style="margin-top: 20px;">
        <label for="signsSymptoms">Patient's signs and symptoms:</label><br>
    <textarea  style="margin-left: -8px;" class="input2" id="signsSymptoms" name="signsSymptoms" rows="4" cols="40"
    placeholder="Please enter the symptoms and signs that you as a doctor noticed"></textarea>
    </div>

    <div style="margin-top: 20px;">
        <label for="diagnosis">Patient's diagnosis:</label><br>
        <textarea style="margin-left: -8px;" class="input2" id="diagnosis" name="diagnosis" rows="2" cols="20" 
        placeholder="Diagnosis (either ICD-10 or written)"></textarea>
    </div>
        <button  type="submit" class="custombutton" name="submit_it" style= "margin-top: 20px; margin-bottom: 100px; cursor: pointer;">UPDATE</button>

    </form>
                
        
</body>
</html>