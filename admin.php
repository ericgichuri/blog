<?php

session_start();
if (!isset($_SESSION['adminusername'])) {
    echo "<script>window.location.href='adminlogin.php'</script>";
    
}

include "connection.php";
$adminusername=$_SESSION['adminusername'];
$getadmin="SELECT username,image,name FROM admin WHERE username='$adminusername'";
$query=mysqli_query($conn,$getadmin);

if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        $username=$row['username'];
        $image=$row['image'];
        $name=$row['name'];
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/ericbloglogo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="static/styles/admin.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="static/js/jquery-3.6.0.min.js"></script>
    <script src="static/js/admin.js" defer></script>
    <title>Eric Blog | Admin</title>
</head>
<body>
<nav class="navbar" style="background: rgba(11, 17, 36, 0.89);">
    <div class="logo">
        <h2 class="text-warning">Eric Blog</h2>
    </div>
    <ul class="links">
        <li><a href="javascript:void(0)">Back</a></li>
        <li><a href="javascript:void(0)">Home</a></li>
        <li><a href="javascript:void(0)">Contact</a></li>
        <li><a href="javascript:void(0)">About</a></li>
    </ul>
</nav>
<section class="maincontainer">
<div class="sidebar">
<div class="admin">
    <div class="image p-2 rounded">
        <img class="img rounded border border-white border-6" src="<?php echo 'images/admin/'.$image;?>" width="100" height="100" style="object-fit:fill">
    </div>
    <h6 class="text-center text-white"><?php echo $name;?></h6>
    <span class="badge badge-sm badge-success">online</span>
</div>
<div class="menubuttons mt-2">
    <div class="menus">
        <ul class="mainbuttons">
            <li class="menubtn getdashboard active">Dashboard</li>
            <li class="menubtn getaddpost">Add Post</li>
            <li class="menubtn getviewpost">View Post</li>
            <li class="menubtn getusers">View Users</li>
            <li class="menubtn getsubscribers">subscribers</li>
            <li class="menubtn getcomments">Comments</li>
            <li class="menubtn getmessages">Messages</li>
            <li class="menubtn getadmins">Admins</li>
        </ul>
        <ul class="forlogout">
            <li class="btnlogout">Logout</li>
        </ul>
    </div>
</div>
</div>
<div class="main pb-4" style="position: relative;overflow-y:scroll;">


</div>
</section>

</body>
</html>