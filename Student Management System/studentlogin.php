<?php
include 'sql.php';

//Checks if there is a login cookie
if (isset($_COOKIE['ID_my_site'])) {

//if there is, it logs you in and directes you to the members page
    $userid = $_COOKIE['ID_my_site'];
    $pass = $_COOKIE['Key_my_site'];
    $check = mysqli_query($con, "SELECT * FROM addstudent WHERE fname = '$userid'");
    while ($info = mysqli_fetch_array($check)) {
        if ($pass != $info['pass']) {
            
        } else {
            header("Location: studentarea.php");
        }
    }
}


//if the login form is submitted 
if (isset($_POST['submit'])) { // if form has been submitted
    $result = mysqli_query($con, "SELECT * FROM addstudent WHERE fname = '" . $_POST['fname'] . "'");

    //Gives error if user dosen't exist
    $check2 = mysqli_num_rows($result);
    if ($check2 == 0) {
        die('That user does not exist in our database. <a href=addstudent.php>Click Here to Register...</a>');
    }

    while ($row = mysqli_fetch_array($result)) {


        //gives error if the password is wrong
        if ($_POST['pass'] != $row['pass']) {
            die('Incorrect password, please try again.');
        } else {


            // if login is ok then we add a cookie 
            $_POST['fname'] = stripslashes($_POST['fname']);
            $hour = time() + 3600;
            setcookie(ID_my_site, $_POST['fname'], $hour);
            setcookie(Key_my_site, $_POST['pass'], $hour);

            //then redirect them to the members area 
            header("Location: studentarea.php");
        }
    }
} else {

    // if they are not logged in  
    ?>

    <script>
        function validateForm()
        {
            var x = document.forms["myForm"]["fname"].value;

            var a = document.forms["myForm"]["pass"].value;


            if (x == null || x == "") {

                alert("*`First Name must be filled out.....");
                return false;



            }

            if (a == "" || a == null) {

                alert("*`Password must be filled out.....");
                return false;



            }







        }

    </script>


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
                <p><strong> Student Login  </strong></p>


                <form name="myForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateForm()" method="post" >
                    <table cellspacing="10">
                        <tr>
                            <td>First Name: </td>
                            <td><input name="fname"  value="" placeholder="Jhon"></td>

                        </tr>
                        <tr>
                            <td>Pass: </td>
                            <td><input type="pass" name="pass" value="" placeholder="*****"></td>

                        </tr>



                        <tr>
                            <td></td>
                            <td align="center"><input name="submit" type="submit"></td>
                        </tr>


                    </table>

                </form>


            </div>


        </center>
    </body>
    </html>

    <?php
}
?> 
