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

$result = mysqli_query($con, "SELECT * FROM addstudent
WHERE fname='$username'");





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
                <p><strong> Edit Your Profile  </strong></p>

                <?php include("option.php"); ?>


                <form action="" method="post" >
                    <?php
            while ($row = mysqli_fetch_array($result)) {
                ?>
                    
                    <table cellspacing="10">
  <tr>
  <td>First Name: </td>
  <td><input name="fname"  value="<?php echo $row['fname']; ?>" placeholder="Jhon">*</td>
  
  </tr>
  <tr>
  <td>Last Name: </td>
  <td><input name="lname" value="<?php echo $row['lname']; ?>" placeholder="David">*</td>
  
  </tr>
  
  <tr>
  <td>Roll Number: </td>
  <td><input name="rollno" value="<?php echo $row['rollno']; ?>" placeholder="12345">*</td>
  
  </tr>
  <tr>
  <td>Password: </td>
  <td><input name="pass" value="<?php echo $row['pass']; ?>" placeholder="******">*</td>
  
  </tr>
  <tr>
  <td>Program: </td>
  <td><select id="program" name="program" style="width: 125px">
  <option value="bsse">BSSE</option>
  <option value="bscs">BSCS</option>
  <option value="bsit">BSIT</option>
  <option value="mscit">Msc IT</option>
  <option value="mscgis">Msc GIS</option>
</select></td>
  
  </tr>
  
  <tr>
<td>   Birthday: </td><td><input value="<?php echo date('Y-m-d',strtotime($row['dob'])) ?>" type="date" name="dob"><br>
   </td></tr>
  
  <tr>
  
  <td>Email</td><td> <input type="email" value="<?php echo $row['email']; ?>" placeholder="info@someone.com" name="email">*<br>
   
   </td></tr>
   <tr>
  
  <td>Cell No:</td><td> <input type="text" value="<?php echo $row['cellno']; ?>" name="cellno" placeholder="9231313223">*<br>
   
   </td></tr>
   
   <tr>
  
  <td>Year:</td>
  
  <td> <select id="year" value="" name="year" style="width: 125px">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  </select><br>
   
   </td></tr>
   
   <tr>
  
       <td>Address:</td><td> <textarea name="address"rows="5" cols="20"><?php echo $row['address']; ?></textarea><br>
   
   </td></tr>
   
   
   
   <tr>
   <td><input type="submit"></td>
   <td align="center"></td>
  </tr>
	</table>

                </form>


            </div>


        </center>
    </body>
    </html>




    <script>
function setSelectedIndex(s, valsearch)
{
    
// Loop through all the items in drop down list
for (i = 0; i< s.options.length; i++)
{ 
if (s.options[i].value == valsearch)
{
// Item is found. Set its property and exit
s.options[i].selected = true;
break;
}
}
return;
}
setSelectedIndex(document.getElementById("program"),"<?php echo $row['program']; ?>");


function setSelectedIndex1(s, valsearch)
{
    
// Loop through all the items in drop down list
for (i = 0; i< s.options.length; i++)
{ 
if (s.options[i].value == valsearch)
{
// Item is found. Set its property and exit
s.options[i].selected = true;
break;
}
}
return;
}
setSelectedIndex1(document.getElementById("year"),"<?php echo $row['year']; ?>");


    
    
    </script>

    <?php
}
?>