<?php
include 'sql.php';




//checks cookies to make sure they are logged in 
if (isset($_COOKIE['ID_my_site'])) {
    $username = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysqli_query($con, "SELECT * FROM addstudent WHERE fname = '$username'");
    while ($info = mysqli_fetch_array($check)) {

        //if the cookie has the wrong password, they are taken to the login page 
        if ($pass != $info['pass']) {
            header("Location: studentlogin.php");
        }
    }
} else {

//if the cookie does not exist, they are taken to the login screen 
    header("Location: studentlogin.php");
}
?>

<!DOCTYPE html>
<html>
    <title>Student Login</title>    

    <head>
        <link rel="stylesheet" type="text/css" href="css/default.css"">
    </head>
    <body>
    <center>
        <div align="center" style="background-color:#EAF2D3;width:800px;">
            <br><h1>Student Result Management System  </h1>
            <br>


<?php include("menu.php"); ?> 
            <p><strong> Student Area  </strong></p>

            <?php include("option.php"); ?>


           
                <table cellspacing="10">
                    <tr>
                        <td><a href="editprofile.php" onMouseOver="window.status = 'Change Password';
return true" onMouseOut="window.status = 'Done'" title="Manage your Profile"><img src="img/edit.jpg" width="139" height="106" border="0"></a></td>
                        <td><a href="uploads.php" onMouseOver="window.status = 'Change Password';
                                return true" onMouseOut="window.status = 'Done'" title="View Your Uploads"><img src="img/pic.jpg" width="139" height="106" border="0"></a></td>

                    </tr>
                    <tr>
                        <td><a href="results.php" onMouseOver="window.status = 'Logout';                     return true" onMouseOut="window.status = 'Done'" title="View Your Results"><img src="img/result.jpg" width="139" height="106" border="0"></a> </td>
                        
                        <td><a href="studentlogout.php" onMouseOver="window.status = 'Logout';
                                return true" onMouseOut="window.status = 'Done'" title="Logout this site"><img src="img/logout.jpg" width="139" height="106" border="0"></a> </td>
                        <td></td>

                    </tr>



                    <tr>
                        <td></td>
                        <td></td>
                    </tr>


                </table>

            

        </div>


    </center>
</body>
</html>