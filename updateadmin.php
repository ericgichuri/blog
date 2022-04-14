<?php

include "connection.php";
if(isset($_POST)){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $password=$_POST['password'];

    $sql="UPDATE admin SET name='$name',username='$username',email='$email',phoneno='$phoneno',password='$password' WHERE id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo $username." Updated";

    }else{
        echo $username." Not updated";
    }
}

?>