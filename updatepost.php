<?php

include "connection.php";
if(isset($_POST)){
    $id=$_POST['id'];
    $topic=$_POST['topic'];
    $category=$_POST['category'];
    $subcategory=$_POST['subcategory'];
    $content=$_POST['content'];
    $link=$_POST['link'];
    $star=$_POST['star'];

    $sql="UPDATE posts SET Topic='$topic',category='$category',subcategory='$subcategory',content='$content',link='$link',star='$star' WHERE id='$id'";
    $query=mysqli_query($conn,$sql);
    if($query){
        echo "Post updated";
    }else{
        echo "Post not updated";
    }
}


?>