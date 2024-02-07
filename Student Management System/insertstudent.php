<?php

include 'sql.php';

  
// now we insert it into the database  
  
$sql="INSERT INTO addstudent (fname, lname, rollno,pass,program,dob,email,cellno,year,address)
VALUES
('$_POST[fname]','$_POST[lname]','$_POST[rollno]','$_POST[pass]','$_POST[program]','$_POST[dob]','$_POST[email]','$_POST[cellno]','$_POST[year]','$_POST[address]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }


  echo "<script>
      alert('1 Record entered');
      window.location='studentlogin.php'
</script>";
  

mysqli_close($con);






?>
