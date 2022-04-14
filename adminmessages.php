<?php

include "connection.php";

?>
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>

<h3 class="text-center">Admin messages</h3>
<div class="d-flex table-responsive p-2">
    <table class="table table-condensed table-bordered table-sm table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone no</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Status</th>
                <th colspan="3">operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $sql="SELECT * FROM messages";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['phoneno'];?></td>
                        <td><?php echo $row['subject'];?></td>
                        <td><?php echo $row['message'];?></td>
                        <td><?php echo $row['status'];?></td>
                        <td><button class="btn btn-sm btn-warning"><img class="icon" src="icons/view.png" width="20" height="20">View</button></td>
                        <td><button class="btn btn-sm btn-primary"><img class="icon" src="icons/edit.png" width="20" height="20">Edit</button></td>
                        <td><button class="btn btn-sm btn-danger"><img class="icon" src="icons/delete.png" width="20" height="20">Delete</button></td>
                    </tr>
                    <?php
                }
            }else{
                ?>
                    <tr>
                        <td colspan="9">NO MESSAGE FOUND</td>
                    </tr>
                <?php
            }
            
            ?>
        </tbody>
    </table>
</div>
</section>