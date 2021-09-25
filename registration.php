<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "travelrecommend";

$conn = mysqli_connect($hostname, $username, $password, $dbname);


session_start();

  if (isset($_POST['register']))
   
  {
    $username=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['password']; 
    $sqlFind = "SELECT * FROM registration where email='$email' ";
    $resFind =mysqli_query($conn,$sqlFind);
    if (mysqli_num_rows($resFind)>0)
    {
      echo 'Already Exist';
    }
    else
    {
      $sql="INSERT INTO registration(Name,Email,Password) VALUES ('$username','$email','$password')";
      $insertion= mysqli_query($conn,$sql);
      if($insertion)
      {
        $_SESSION['name']=$username;
        echo 'Added';
      }
      else
      {
        echo 'Not Added';
      }
    }
  }
else
{
  echo '';
}
?>
<html>
<head>
    <title>Registration</title>
    <meta charset="Utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="ibg">
        <div class="overlay">
      <div class="i1">
      <h2 class="text-center i3">Registration</h2>
      <form method="post">
        <div class="form-group  mt-7 ml-5 i2">
          <label for="exampleInputName1">Full name</label>
          <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group mt-7 ml-5 i2">
          <label for="exampleInputEmail1">Email address</label>
          <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group ml-5 i2">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" name="register" class="btn btn-primary ml-5">Submit</button>
      </form>
      </div>
      </div>
      </div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstap.min.js"></script>
    
    </body>
    
    </html>
</body>
</html>
