<?php

include "connection.php";

?>
<table class="table table-sm table-striped table-bordered table-condensed text-center">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Photo</th>
        <th>username</th>
        <th>Email</th>
        <th>Phone no</th>
        <th colspan="2">Operations</th>
    </thead>
    <tbody>
        <?php
                
        $sql="SELECT * FROM admin";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr id="<?php echo $row['id'];?>">
                    <td data-target="id"><?php echo $row['id'];?></td>
                    <td data-target="name"><?php echo $row['name'];?></td>
                    <td data-target="image"><img src="images/admin/<?php echo $row['image'];?>" height="50" width="50"></td>
                    <td data-target="username"><?php echo $row['username'];?></td>
                    <td data-target="email"><?php echo $row['email'];?></td>
                    <td data-target="phoneno"><?php echo $row['phoneno'];?></td>
                    <td><button class="btnedit btn btn-sm btn-primary" data-role="update" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/edit.png" width="20" height="20">Edit</button></td>
                    <td><button class="btndelete btn btn-sm btn-danger" data-role="delete" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/delete.png" width="20" height="20">Delete</button></td>
                </tr>
                <?php
            }
        }else{
            ?>
            <tr>
                <td colspan=8>NO ADMIN FOUND</td>
            </tr>
            <?php
        }
                    
            ?>
    </tbody>
</table>