<?php

include "connection.php";

?>
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>

<h3 class="text-center">Admin View Comments</h3>
<div class="d-flex table-responsive p-2">
    <table class="table table-condensed table-bordered table-sm table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Post Id</th>
                <th>Commentor</th>
                <th>Comment</th>
                <th>Pin</th>
                <th colspan="2">Operations</th>
            </tr>
            <tbody>
                <?php
                
                $sql="SELECT * FROM comments";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['postid'];?></td>
                                <td><?php echo $row['commentor'];?></td>
                                <td><?php echo $row['comment'];?></td>
                                <td><?php echo $row['star'];?></td>
                                <td><button class="btn btn-sm btn-primary"><img src="icons/edit.png" height="20" width="20">Edit</button></td>
                                <td><button class="btn btn-sm btn-danger"><img src="icons/delete.png" height="20" width="20">Delete</button></td>
                            </tr>
                        <?php
                    }
                }else{
                    ?>
                        <tr>
                            <td colspan="7">NO COMMENT AVAILABLE</td>
                        </tr>
                    <?php
                }
                
                ?>
            </tbody>
        </thead>
    </table>
</div>

</section>