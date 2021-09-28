<?php
session_start();
if (isset($_SESSION['email'])) {
// echo $_SESSION['email'];
// echo $_SESSION['id'];

} else {
    header('location:index.php');
}
?>

<?php
echo $_SESSION['id'];
    if (isset($_GET['place_name'])) {
      // Connect to the MySQL database  
        include "database.php"; 
      // $place_name = preg_replace('#[^0-9]#i', '', $_GET['place_name']); 
      $place_name = $_GET['place_name']; 
      // Use this var to check to see if this place_name exists, if yes then get the product 
      // details, if no then exit this script and give message why
      // echo "$place_name\n";
      $sql  = mysqli_query($con, "SELECT * FROM places where place_name='$place_name' LIMIT 1");
      $cnt = mysqli_num_rows($sql); // count the output amount
      if ($cnt > 0) {
           while ($row = mysqli_fetch_array($sql)) {     
                $image_text = $row['image'];
              // echo "<img src='upload/".$row['image']."' height='500'/>";   
              // echo "<br>Place Name = {$row['place_name']} <br>";
              // echo "Division = {$row['division']} <br>";
              $description = $row['description'];
              $place_id = $row['id'];
              // echo "Description: {$row['description']} <br>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Place</title>
    <link rel="stylesheet" href="view.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    

    <section>
    
        <div class="header">
       
            <div class="container">
                <div class="navbar">
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="#" style="text-decoration: none; color: black;"> destinations </a></li>
                            <li><a href="#regions" style="text-decoration: none; color: black;"> Regions </a></li>
                            <li><a href="#experinace" style="text-decoration: none; color: black;"> Experiences </a></li>
                            <li><a href="#searchplace.php" style="text-decoration: none; color: black;">Search by District </a></li>

                           
                        </ul>
                    </nav>
                    <br>
                    <i class="fas fa-search" style="color: black; cursor: pointer; padding-right: 10px;"></i>
                    
                </div>
            </div>
            </div>

     </section>


     <section>
         <div class="row">
                    <div class="logo">
                        <img src="upload/<?php echo $image_text; ?>" width="500px" alt="" style=" float:left; cursor: pointer;">
                        <!-- <?php
                            echo "<img src='upload/".$image_text."' height='300'/>"; 
                        ?> -->
                    </div>
            <div class="col-5">
                <h4> <?php echo "$place_name"; ?> </h4>
                <p><i class="fa fa-star" style="color: yellow;"></i> 9.0 out of 10 <span> 100 reviews </span> </p>
                <div class="discription">
                    <p> 
                       <?php 
                            echo "$description";
                        ?>
                    </p>
                </div>
              
            </div>
            <div class="col-5">
               <div class="img-slider">
                   
               </div>
            </div>
         </div>
         
     </section>

    <section class="reviws">
        <div class="comment-box">
            <form action="" method="post">
            <textarea name="comment" class="text-area" cols="40" rows="5" placeholder="write your opinion here....." style="resize: none; padding-left: 10px;"></textarea>
            <!-- <input type="text" name="comment" class="text-area" cols="40" rows="5" placeholder="write your opinion here....." style="resize: none; padding-left: 10px;"> -->
            <!-- <textarea name="rating" class="text-area" cols="15" rows="2" placeholder=" Rating out of 10" style="resize: none; padding-left: 10px;"></textarea> -->
            <!-- <div class="btn-design"> -->
             <!-- <button class="btn"> Add review</button> -->



             <br>
                     <label for="validationCustom04"><b>Rating   </b>  </label>
        <select name="rating" style="margin-left: 30px;">
            <option selected disabled value="">Choose</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
        </select>
             <input type="submit" name="save" value="Add Review">
            </div>
            <?php 
                include 'database.php';
                if(isset($_POST['save']))
                {  

                    // $sqljoin = "SELECT * FROM rating INNER JOIN user ON rating.user_id = user.id INNER JOIN places ON rating.place_id = places.id where user.id=$_SESSION['id'] and places.id=$place_id";

                   $rating = $_POST['rating'];
                   $review = $_POST['comment'];

                    $sql = "INSERT INTO `rating`(place_id, user_id, rating ,review)VALUES ('$place_id', '$_SESSION[id]', '$rating', '$review')";



                   if (mysqli_query($con, $sql)) {
                    echo "New review inserted!";
                   } else {
                    echo "Error: " . $sql . "
                " . mysqli_error($con);
                   }
                   mysqli_close($con);
                }
            ?>

        </form>


                    <?php 
                    include('database.php');
                    $connect = mysqli_connect("localhost", "root", "", "travelrecommend");

                    $query="Select * from places";
                    $data=mysqli_query($connect,$query);
                    $total=mysqli_num_rows($data);


                    if($total!=0)
                    {
                        
                        while($result=mysqli_fetch_assoc($data))
                    {
                    echo "
                    <tr >
                    <td style=padding:10px;text-align:center>".$result['id']."</td>
                    <td style=padding:10px;text-align:center>".$result['place_name']."</td>
                    <td style=padding:10px>".$result['division']."</td>
                    <td style=padding:10px>".$result['description']."</td>
                    <td style=padding:10px>".$result['image']."</td>
                    <td><a href='delete.php?id=$result[id] 'class=delete>Delete</a></td>
                    </tr>";

                        }
                    }
                    else{
                        echo 'No data found';
                    }
                    ?>
            <div class="peoples-review">
               <div class="rev">
                <h5 id="mmm"> Riyad </h5>
                <p style="padding-left: 20px; text-align: justify;"> <i class="fa fa-star" style="color: yellow;"></i><span >9.0 out of 10</span>  </p>
                <p style="padding-left: 20px; text-align: justify;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                       sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
                       Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                   sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
                </p>
               </div>
               <h5> Rafi </h5>
               <p style="padding-left: 20px; text-align: justify;"> <i class="fa fa-star" style="color: yellow;"></i><span >9.0 out of 10</span>  </p>
               <p style="padding-left: 20px; text-align: justify;">
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                      sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                   sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
               </p>
            </div>
            <h5> Sinthia </h5>
            <p style="padding-left: 20px; text-align: justify;"> <i class="fa fa-star" style="color: yellow;"></i><span>9.0 out of 10</span>  </p>
            <p style="padding-left: 20px; text-align: justify;">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                   sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia molestiae voluptas vel eveniet,
                   sint qui iste debitis minus magni asperiores quas quaerat totam. Aspernatur odio inventore vitae.
            </p>
            
           </div>
    </section>
</body>
</html>