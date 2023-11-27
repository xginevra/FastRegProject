<?php
session_start();
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>

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
                        <input type="text" name="u_first_name" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        Last name:
                    </td>
                    <td>
                        <input type="text" name="u_last_name" required />
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
                        <input type="text" name="u_email_address" required />
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

</body>
</html>