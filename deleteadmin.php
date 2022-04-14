<?php


include "connection.php";
if(isset($_POST)){
    $id=$_POST['id'];


    $sql="DELETE FROM admin WHERE id='$id'";
    $query=mysqli_query($conn,$sql);

    if($query){
        echo "Admin ".$id." deleted";
    }else{
        echo "Error Admin not deleted";
    }
}

?>