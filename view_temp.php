<html>
 <head>
 <title>display image</title>
 </head>
 <body>
  
  <?php 
 /* // Check to see the URL variable is set and that it exists in the database
  if (isset($_GET['id'])) {
    // Connect to the MySQL database  
      include "database.php"; 
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
    // Use this var to check to see if this ID exists, if yes then get the product 
    // details, if no then exit this script and give message why
    $sql = mysql_query($con, "SELECT place_name FROM places WHERE id='$id' LIMIT 1");
    $productCount = mysql_num_rows($sql); // count the output amount
      if ($productCount > 0) {
      // get all the product details
        while($row = mysql_fetch_array($sql)){ 
           $product_name = $row["product_name"];
           $price = $row["price"];
           $details = $row["details"];
           $category = $row["category"];
           $subcategory = $row["subcategory"];
           $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
          }
       
      } else {
        echo "That item does not exist.";
          exit();
      }
  } else {
    echo "Data to render this page is missing.";
    exit();
  }
  mysql_close();*/
  ?>


   <?php
 
  // echo "<img src='upload/01capture-1632648682.png' height='500'/>"; 

   ?>  
   <?php
      
    if (isset($_GET['division'])) {
      // Connect to the MySQL database  
        include "database.php"; 
      // $division = preg_replace('#[^0-9]#i', '', $_GET['division']); 
      $division = $_GET['division']; 
      // Use this var to check to see if this division exists, if yes then get the product 
      // details, if no then exit this script and give message why
      echo "$division\n";
      $sql  = mysqli_query($con, "SELECT * FROM places where division='$division' LIMIT 1");
      $cnt = mysqli_num_rows($sql); // count the output amount
      if ($cnt > 0) {
           while ($row = mysqli_fetch_array($sql)) {     
          
              echo "<img src='upload/".$row['image']."' height='500'/>";   
              echo "<br>Place Name = {$row['place_name']} <br>";
              echo "Division = {$row['division']} <br>";
              echo "Description: {$row['description']} <br>";
          }
      } else {
        echo "That item does not exist.";
          exit();
      }
    }
    else {
        echo "Data to render this page is missing.";
        exit();
    }
  ?>
 </body>
 </html>