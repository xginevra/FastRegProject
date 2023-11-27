<?php

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
            <li><a href="info.php">About us</a></li>
        </l>
    </div>

    <div id="content">
        <form action="login.php" method="POST">
            <table>
                <tr>
                    <td>
                        Username:
                    </td>
                    <td>
                        <input type="text" name="username" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" name="password" required />
                    </td>
                </tr>
                <tr>

                    <td>
                        <input type="button" name="log-in" value="login" required />
                    </td>
                </tr>
            </table>
        </form>
        <br><br>
        New to FastReg? <a href="register.php">Register</a>

    </div>



</div>
<div id="footer">
    <p> Franziska Wojtkowski, HI 3. semester</p>
</div>
</body>
</html>