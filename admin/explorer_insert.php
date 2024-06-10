
<?php require("../help/connect.php");?>
<?php

if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $new_image_name = 'ex_'.uniqid().".".pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../imagesur/".$new_image_name;
    move_uploaded_file($_FILES['image']['tmp_name'],$image_upload_path);
     }
     else{
         $new_image_name = "";
     }


    $sql = "INSERT INTO image_survey(image_sur) VALUES ('$new_image_name')";
    $result=mysqli_query($connection,$sql);
     

    mysqli_close($connection); ?>