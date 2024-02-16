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
            <p><strong> Results  </strong></p>

            <?php include("option.php"); ?>


            <form action="" method="post" >
                

            </form>


        </div>


    </center>
</body>
</html>