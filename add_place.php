<?php
include_once 'database.php';
$output_dir = "upload/";/* Path for file upload */
if(isset($_POST['save']))
{  
   $place_name = $_POST['place_name'];
   $division = $_POST['division'];
   $description = $_POST['description'];


   // image
   $RandomNum   = time();
   $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
   $ImageType      = $_FILES['image']['type'][0];

   $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
   $ImageExt       = str_replace('.','',$ImageExt);
   $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
   $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;

   /* Try to create the directory if it does not exist */
   if (!file_exists($output_dir))
   {
      @mkdir($output_dir, 0777);
   }               
    move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
        $sql = "INSERT INTO `places`(place_name,division,description,`image`)VALUES ('$place_name','$division','$description','$NewImageName')";
   if (mysqli_query($con, $sql)) {
    echo "New record created successfully !";
   } else {
    echo "Error: " . $sql . "
" . mysqli_error($con);
   }
   mysqli_close($con);
}
?>