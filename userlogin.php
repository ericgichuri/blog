<?php

session_start();
include "connection.php";
if(isset($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($username===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Username is empty</p>";
        return false;
    }elseif($password===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Password is empty</p>";
        return false;
    }else{
        $sanusername=mysqli_real_escape_string($conn,$username);
        $sanpassword=mysqli_real_escape_string($conn,$password);

        $sql="SELECT * FROM users WHERE username='$sanusername' AND password='$password'";
        $query=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)==1){
            $_SESSION['username']=$sanusername;
            echo 1;
        }else{
            echo 2;
            
        }
    }
}

?>