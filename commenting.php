<?php

include "connection.php";
if(isset($_POST)){
    $postid=$_POST['postid'];
    $commentor=$_POST['commentor'];
    $comment=$_POST['comment'];
    if($comment===""){
        echo 2;
        return false;  
    }else{
        $sql="INSERT INTO comments(postid,commentor,comment,star) VALUES ('$postid','$commentor','$comment','unpinned')";
        $query=mysqli_query($conn,$sql);
        if($query){
            echo 1;
        }else{
            echo 3;
        }
    }
    
}

?>