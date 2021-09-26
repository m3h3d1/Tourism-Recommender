<?php
include_once('database.php');
session_start();
if(isset($_SESSION['Place'])){
 $sqlfetch="SELECT * FROM places where image='$_SESSION[image]'";
 $res=mysqli_query($conn,$sqlfetch);
 $row = mysqli_fetch_assoc($res);

}
else{
  header('location:add details.php');
}

$result = mysqli_query($conn, "SELECT * FROM adddetails");

?>
<html>
    <head>
        <title>po</title>
    </head>
    <body>
    <p> <?php echo  $row['Place'];?></p>
    <p> <?php echo  $row['Division'];?></p>
    <p> <?php echo  $row['Image_text'];?></p>
    <p> <?php echo  $row['Image'];?></p>
    
  <img src="Images/<?php echo  $row["Image"];?>" class="image"  alt="Responsive image">
    
    </body>
</html>