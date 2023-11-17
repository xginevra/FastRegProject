<?php
session_start();

   // include("connection.php");
    //include("functions.php");

    //$user_data = check_login($con);


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
            <li><a href="register.php">Register</a></li><br />
            <li><a href="login.php">Login</a></li><br />
            <li><a href="info.php">about us</a></li>
        </l>
    </div>

    <div id="content">
        
        <form action="insert.php" method="POST">
            <table>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="u_username" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="u_password" required />
                    </td>
                </tr>
               
                <tr>
                    <td>
                        First name:
                    </td>
                    <td>
                        <input type="text" name="u_firstname" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Last name:
                    </td>
                    <td>
                        <input type="text" name="u_lastname" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Institution:
                    </td>
                    <td>
                        <input type="text" name="u_institution" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        E-mail-adress
                    </td><br />
                    <td>
                        <input type="text" name="u_emailadress" required />
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="submit" value="register">
                    </td>
                </tr>
            </table>
        </form>



    </div>



</div>
<div id="footer">
    <p> Franziska Wojtkowski, HI 3. semester</p>
</div>
</body>
</html>