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


//File Upload




?>

<!DOCTYPE html>
<html>
    <title>Student Login</title>    

    <head>
        
        <style>
            
            .table1
{

font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
border-collapse:collapse;
}
.table1_td,.table1_th
{
font-size:1em;
border:1px solid #556B2F;

}
.table1,.table1_th
{
background-color:green;
color:white;
}
.table1,.table1_td
{
color:#000000;
background-color:#EAF2D3;
text-align:center;

}
        </style>
        <link rel="stylesheet" type="text/css" href="css/default.css"">
    </head>
    <body>
    <center>
        <div align="center" style="background-color:#EAF2D3;width:800px;">
            <br><h1>Student Result Management System  </h1>
            <br>


            <?php include("menu.php"); ?> 
            <p><strong> Files and Uploads  </strong></p>

            <?php include("option.php"); ?>

<?php
include 'sql.php';

$filename="";

if(isset($_POST["button"]))
{
if ((($_FILES["filenew"]["type"] == "image/gif")
|| ($_FILES["filenew"]["type"] == "image/jpeg")
|| ($_FILES["filenew"]["type"] == "image/jpg")
|| ($_FILES["filenew"]["type"] == "image/pjpeg")
|| ($_FILES["filenew"]["type"] == "image/x-png")
|| ($_FILES["filenew"]["type"] == "image/png"))
&& ($_FILES["filenew"]["size"] < 200000000)
)
  {
  if ($_FILES["filenew"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["filenew"]["error"] . "<br>";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["filenew"]["name"]))
      {
      echo $_FILES["filenew"]["name"] . " already exists. ";
      
      die('Error: ' .  mysqli_connect_error());
      }
    else
      {
      move_uploaded_file($_FILES["filenew"]["tmp_name"],
      "upload/" . $_FILES["filenew"]["name"]);
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      $filename= $_FILES["filenew"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  
  $sql="INSERT INTO image (name,category,description,filename)VALUES('$_POST[filename]','$_POST[category]','$_POST[des]','$filename')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' .  mysqli_connect_error());
  }
  else
  {
echo "Image uploaded Successfully";
  }
}

if(isset($_GET["delimg"]))
{
    
$sql2="DELETE FROM image WHERE id='$_GET[delimg]'";
if(mysqli_query($con,$sql2)){
    
    
   echo "Image Deleted Successfully";
    
}



}

 $result = mysqli_query($con,"SELECT * FROM image");
?>
            <form action="" method="post" enctype="multipart/form-data">
                <table cellspacing="10">
                    <tr>
                        <td>
                            File Name:
                        </td> 
                        <td>
                            <input name="filename"  value="" placeholder="New">
                        </td> 

                    </tr>
                    <tr>
                        <td>
                            File Category:
                        </td> 
                        <td>
                            <input name="category"  value="" placeholder="Word File">
                        </td> 
                    </tr>
                    <tr>
                        <td>File Description:</td> 

                        <td>
                            <textarea name="des"  value="" placeholder="About File"></textarea>

                        </td> 
                    </tr>
                    <tr><td></td>
                        <td><input type="file" name="filenew" id="file"></td></tr>
                    <tr><td></td><td><input type="submit" name="button" value="Upload Image" /></td></tr>
                </table>

            </form>

            
            <table class="table1" width="90%" border="1"align="center">
  <tr>
    <th width="15%" scope="col"><strong>Image Name</strong></th>
    <th width="15%" scope="col"><strong>Image Category</strong></th>
    <th width="20%" scope="col"><strong>Description</strong></th>
    <th width="30%" scope="col"><strong>Uploaded Image</strong></th>
      <th width="20%" scope="col"><strong>Delete Image</strong></th>
  </tr>
  <?php
  while($row = mysqli_fetch_array($result))
  {
     ?> 
      
 <tr>
<td>&nbsp<?php echo $row['name']; ?></td>
<td>&nbsp<?php echo $row['category']; ?></td>
<td>&nbsp<?php echo $row['description']; ?></td>
<?php echo "    <td>&nbsp; <img src='upload/$row[filename]' width='100%' height='75'></td>"?>

<td align="center"><a href='uploads.php?delimg=<?php echo $row['id']; ?>'>Delete</a></td>
</tr>

<?php
  }
  ?>
</table>
            

        </div>


    </center>
</body>
</html>