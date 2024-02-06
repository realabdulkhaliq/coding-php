

<?php
include 'sql.php';

if (isset($_POST["button"])) {
// now we insert it into the database  

    $sql = "INSERT INTO addstudent (fname, lname, rollno,pass,program,dob,email,cellno,year,address)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[rollno]','$_POST[pass]','$_POST[program]','$_POST[dob]','$_POST[email]','$_POST[cellno]','$_POST[year]','$_POST[address]')";

    if (!mysqli_query($con, $sql)) {
        die('Error: ' . mysqli_error($con));
    }


    echo "<script>
      alert('1 Record entered');
     
</script>";
}
mysqli_close($con);
?>



<!DOCTYPE html>
<html>
    <title>Add a new Student</title>    

    <style>
        .error {color: #FF0000;}
    </style>
    <script>
        function validateForm()
        {
            var x = document.forms["myForm"]["fname"].value;
            var y = document.forms["myForm"]["lname"].value;
            var z = document.forms["myForm"]["rollno"].value;
            var a = document.forms["myForm"]["pass"].value;
            var b = document.forms["myForm"]["email"].value;
            var e = document.forms["myForm"]["cellno"].value;

            if (x == null || x == "") {

                alert("*`First Name must be filled out.....");
                return false;



            }

            if (y == "" || y == null) {

                alert("*`Last Name must be filled out.....");
                return false;



            }

            if (z == "" || z == null) {

                alert("*`Rollno must be filled out.....");
                return false;



            }


            if (a == "" || a == null) {

                alert("*`Password must be filled out.....");
                return false;



            }

            if (b == "" || b == null) {

                alert("*`Email must be filled out.....");
                return false;



            }


            if (e == "" || e == null)
            {
                alert("*`Cellno must be filled out.....");
                return false;
            }



        }

    </script>


    <!DOCTYPE html>
    <html>
        <title>Student SignUp</title>    

        <head>
            <link rel="stylesheet" type="text/css" href="css/default.css"">
        </head>
        <body>
        <center>
            <div align="center" style="background-color:#EAF2D3;width:800px;">
                <br><h1>Student Result Management System  </h1> 
                <br>

<?php include("menu.php"); ?> 
                <p><strong> Student Signup  </strong></p>

                <form name="myForm" onsubmit="return validateForm()" method="post" >


                    <table cellspacing="10">
                        <tr>
                            <td>First Name: </td>
                            <td><input name="fname"  value="" placeholder="Jhon">*</td>

                        </tr>
                        <tr>
                            <td>Last Name: </td>
                            <td><input name="lname" value="" placeholder="David">*</td>

                        </tr>

                        <tr>
                            <td>Roll Number: </td>
                            <td><input name="rollno" value="" placeholder="12345">*</td>

                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td><input name="pass" value="" placeholder="******">*</td>

                        </tr>
                        <tr>
                            <td>Program: </td>
                            <td><select value="" name="program" style="width: 125px">
                                    <option value="bsse">BSSE</option>
                                    <option value="bscs">BSCS</option>
                                    <option value="bsit">BSIT</option>
                                    <option value="mscit">Msc IT</option>
                                    <option value="mscgis">Msc GIS</option>
                                </select></td>

                        </tr>

                        <tr>
                            <td>   Birthday: </td><td><input value="" type="date" name="dob"><br>
                            </td></tr>

                        <tr>

                            <td>Email</td><td> <input type="email" value="" placeholder="info@someone.com" name="email">*<br>

                            </td></tr>
                        <tr>

                            <td>Cell No:</td><td> <input type="text" value="" name="cellno" placeholder="9231313223">*<br>

                            </td></tr>

                        <tr>

                            <td>Year:</td>

                            <td> <select value="" name="year" style="width: 125px">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select><br>

                            </td></tr>

                        <tr>

                            <td>Address:</td><td> <textarea name="address" value="" rows="5" cols="20"></textarea><br>

                            </td></tr>



                        <tr>
                            <td><input name="button" type="submit"></td>
                            <td align="center"><input type="reset" value="Reset"></td>
                        </tr>
                    </table>

                </form>

            </div>


        </center>
    </body>
</html>

