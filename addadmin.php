<?php

include "connection.php";

if(isset($_POST)){
    $name=$_POST['name'];
    $image=$_FILES['image']['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $password=$_POST['password'];

    $extension=pathinfo($image,PATHINFO_EXTENSION);
    $rename=$username;
    $newname=$rename.".".$extension;

    $filename=$_FILES['image']['tmp_name'];
    $sql="INSERT INTO admin(name,image,username,email,phoneno,password) VALUES('$name','$newname','$username','$email','$phoneno','$password')";
    $query=mysqli_query($conn,$sql);
    if($query){
        move_uploaded_file($filename,"images/admin/".$newname);
        echo "admin added";
    }else{
        echo "admin not added";
    }
}

?>