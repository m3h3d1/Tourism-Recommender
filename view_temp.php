<html>
 <head>
 <title>display image</title>
 </head>
 <body>
 <p>Here in your form and text</p>
   <?php
 
  // echo "<img src='upload/01capture-1632648682.png' height='500'/>"; 

   ?>  
   <?php
  include_once 'database.php';
  $image_details  = mysqli_query($con, "SELECT image FROM places where image='01capture-1632648682.png'");
     while ($row = mysqli_fetch_array($image_details)) {     
    
        echo "<img src='upload/".$row['image']."' height='500'/>";   
      
    }     

  ?>
  <br>

  <?php 
  // Check to see the URL variable is set and that it exists in the database
  if (isset($_GET['id'])) {
    // Connect to the MySQL database  
      include "database.php"; 
    $id = preg_replace('#[^0-9]#i', '', $_GET['id']); 
    // Use this var to check to see if this ID exists, if yes then get the product 
    // details, if no then exit this script and give message why
    $sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
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
  mysql_close();
  ?>
 </body>
 </html>