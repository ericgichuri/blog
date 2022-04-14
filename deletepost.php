<?php

include "connection.php";

if(isset($_POST)){
    $id=$_POST['id'];

    $sql="DELETE FROM posts WHERE id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Post ".$id." deleted";
    }else{
        echo "Post not deleted";
    }
}


?>