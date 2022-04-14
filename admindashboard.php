<?php


include "connection.php";

//get number of post
$query=mysqli_query($conn,"SELECT * FROM posts");
$totalposts=mysqli_num_rows($query);
//get total news posts
$query=mysqli_query($conn,"SELECT * FROM posts WHERE category='News'");
$totalnewspost=mysqli_num_rows($query);
//get total trending posts
$query=mysqli_query($conn,"SELECT * FROM posts WHERE category='Trending'");
$totaltrendingpost=mysqli_num_rows($query);
//get total sports posts
$query=mysqli_query($conn,"SELECT * FROM posts WHERE category='Sports'");
$totalsportspost=mysqli_num_rows($query);


//get total comments
$query=mysqli_query($conn,"SELECT * FROM comments");
$totalcomments=mysqli_num_rows($query);
//starred comments
$query=mysqli_query($conn,"SELECT * FROM comments WHERE star='True'");
$totalstarredcomments=mysqli_num_rows($query);


//get total messages
$query=mysqli_query($conn,"SELECT * FROM messages");
$totalmessages=mysqli_num_rows($query);
//get unread messages
$query=mysqli_query($conn,"SELECT * FROM messages WHERE mark='unread'");
$unreadmessages=mysqli_num_rows($query);

//get total users
$query=mysqli_query($conn,"SELECT * FROM users");
$totalusers=mysqli_num_rows($query);
//total subscribers
$query=mysqli_query($conn,"SELECT * FROM subscribers");
$totalsubscribers=mysqli_num_rows($query);


//total admins
$query=mysqli_query($conn,"SELECT * FROM admin");
$totaladmins=mysqli_num_rows($query);
//main admins
$query=mysqli_query($conn,"SELECT * FROM admin LIMIT 1");
if(mysqli_num_rows($query)>0){
    while($row=mysqli_fetch_assoc($query)){
        $mainadmin=$row['username'];
    }
}


?>

<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section class="pb-4">

<h3 class="text-center">Dashboard</h3>
<div class="d-flex flex-column  justify-content-center">
<div class="d-flex flex-column justify-content-center">
    <h4 class="text-center">Post</h4>
    <div class="d-flex justify-content-start text-warning" style="width: 100%;">
        <div class="card mx-3" style="min-width: 230px;background:rgba(11, 17, 36, 0.89);">
            <div class="card-header">
                <h5>Total post</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalposts;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktopost btn btn-primary btn-sm">>> View Posts >></a></p>
            </div>
        </div>
        <div class="card mx-3" style="min-width: 230px;background:rgba(11, 17, 36, 0.89);">
            <div class="card-header">
                <h5>News post</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalnewspost;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktopost btn btn-primary btn-sm">>> View News >></a></p>
            </div>
        </div>
        <div class="card mx-3" style="min-width: 230px;background:rgba(11, 17, 36, 0.89);">
            <div class="card-header">
                <h5>Trending post</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totaltrendingpost;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktopost btn btn-primary btn-sm">>> View Trending >></a></p>
            </div>
        </div>
        <div class="card mx-3" style="min-width: 230px;background:rgba(11, 17, 36, 0.89);">
            <div class="card-header">
                <h5>Sports post</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalsportspost;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktopost btn btn-primary btn-sm">>> View Sports >></a></p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-row justify-content-start mb-4">
<div class="d-flex flex-column justify-content-center">
    <h4 class="text-center">Comments</h4>
    <div class="d-flex justify-content-around text-white" style="width: 100%;">
        <div class="card mx-3" style="width: 230px;background:rgba(14, 80, 223, 0.888);">
            <div class="card-header">
                <h5>Total comments</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalcomments;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktocomments btn btn-success btn-sm">>> View Comments >></a></p>
            </div>
        </div>
        <div class="card  mx-3" style="width: 230px;background:rgba(14, 80, 223, 0.888);">
            <div class="card-header">
                <h5>⭐🌟 comments</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalstarredcomments;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktocomments btn btn-success btn-sm">>> ⭐🌟 comments >></a></p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-center">
    <h4 class="text-center">Messages</h4>
    <div class="d-flex justify-content-around" style="width: 100%;">
        <div class="card mx-3" style="width: 230px;background:rgba(14, 223, 42, 0.712);">
            <div class="card-header">
                <h5>Total messages</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalmessages;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktomessages btn btn-primary btn-sm">>> View messages >></a></p>
            </div>
        </div>
        <div class="card mx-3" style="width: 230px;background:rgba(14, 223, 42, 0.712);">
            <div class="card-header">
                <h5>📩📩 messages</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $unreadmessages;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktomessages btn btn-primary btn-sm">>> 📧 Unread >></a></p>
            </div>
        </div>
    </div>
</div>
</div>
<div class="d-flex flex-row justify-content-start">
<div class="d-flex flex-column justify-content-center">
    <h4 class="text-center">Users</h4>
    <div class="d-flex justify-content-around text-white" style="width: 100%;">
        <div class="card mx-3 bg-secondary" style="width: 230px;background-color: rgba(250, 214, 9, 0.938);">
            <div class="card-header">
                <h5>Total users</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalusers;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktousers btn btn-primary btn-sm">>> View Users >></a></p>
            </div>
        </div>
        <div class="card mx-3 bg-secondary" style="width: 230px;background-color: rgba(250, 214, 9, 0.938);">
            <div class="card-header">
                <h5>Subscribers</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totalsubscribers; ?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktosubscribers btn btn-primary btn-sm">>> View more >></a></p>
            </div>
        </div>
    </div>
</div>
<div class="d-flex flex-column justify-content-center">
    <h4 class="text-center">Admins</h4>
    <div class="d-flex justify-content-around" style="width: 100%;">
        <div class="card mx-3 bg-dark text-warning" style="width: 230px;">
            <div class="card-header">
                <h5>Total Admins</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $totaladmins;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="linktoadmins btn btn-primary btn-sm">>> View admins >></a></p>
            </div>
        </div>
        <div class="card mx-3 bg-danger text-white" style="width: 230px;">
            <div class="card-header">
                <h5>Main admin</h5>
            </div>
            <div class="card-body">
                <h5 class="card-title"><?php echo $mainadmin;?></h5>
                <p class="card-text"><a href="javascript:void(0)" class="btn btn-primary btn-sm">>> Profile >></a></p>
            </div>
        </div>
    </div>
</div>
</div>
<hr>
</div>

<script>
    $(document).ready(function(){
        function viewpost(){
            $(".main").load("adminview.php")
        }
        function viewcomment(){
            $(".main").load("admincomments.php");
        } 
        function viewmessages(){
            $(".main").load("adminmessages.php");
        }
        function viewusers(){
            $(".main").load("users.php");
        } 
        function viewsubscribers(){
            $(".main").load("subscribers.php");
        }
        function viewadmins(){
            $(".main").load("myadmins.php");
        }   
        $(".linktopost").click(function(){
            viewpost();
        })
        $(".linktocomments").click(function(){
            viewcomment();
        })
        $(".linktomessages").click(function(){
            viewmessages();
        })
        $(".linktousers").click(function(){
            viewusers();
        })
        $(".linktosubscribers").click(function(){
            viewsubscribers();
        })
        $(".linktoadmins").click(function(){
            viewadmins();
        })
    })

</script>

</section>
