<?php

include "connection.php";
if(isset($_POST)){
    $photo=$_FILES['postphoto']['name'];
    $topic=$_POST['posttitle'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $content=$_POST['content'];
    $link=$_POST['link'];
    $author=$_POST['author'];
    $date=date("Y-m-d");


    $extension=pathinfo($photo,PATHINFO_EXTENSION);
    $rename=$subcategory.date("Ymdhis");
    $newname=$rename.".".$extension;
    $filename=$_FILES['postphoto']['tmp_name'];

    $sql="INSERT INTO posts(photo,Topic,content,category,subcategory,link,author,postdate,star) VALUES('$newname','$topic','$content','$category','$subcategory','$link','$author','$date','no')";
    $query=mysqli_query($conn,$sql);
    if($query){
        move_uploaded_file($filename,"images/uploads/".$newname);
        echo "<span class='alert alert-success'>Post saved successfully</span>";
    }else{
        echo "<span class='alert alert-danger'>Unable to upload your post".mysqli_error($conn)."</span>";
    }


}
?>