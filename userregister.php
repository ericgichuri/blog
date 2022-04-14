<?php

include "connection.php";

if(isset($_POST)){
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($firstname===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*firstname is empty</p>";
        return false;
    }elseif($lastname===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Lastname is empty</p>";
        return false;
    }elseif($email===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Email is empty</p>";
        return false;
    }elseif($phoneno===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Phone no is empty</p>";
        return false;
    }elseif($username===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*Username is empty</p>";
        return false;
    }elseif($password===""){
        echo "<p class='alert alert-danger text-center p-0 m-0'>*password is empty</p>";
        return false;
    }else{
        $sql="INSERT INTO users(firstname,lastname,email,phoneno,username,password) VALUES('$firstname','$lastname','$email','$phoneno','$username','$password')";
        $query=mysqli_query($conn,$sql);
        if($query){
            echo "<p class='alert alert-success text-center p-0 m-0'>$username Registered successfully</p>";
        }else{
            echo "<p class='alert alert-danger text-center p-0 m-0'>You have not been registered. Try again</p>";
        }

    }
}

?>