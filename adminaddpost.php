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
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>

<h3 class="text-center">Add Post</h3>
<div class="row justify-content-center">
<div class="col-md-7">
    <form class="form border border-primary rounded p-4" action="" method="post" enctype="multipart/form-data">
        <p class="foralert text-center p-0 m-0 "></p>
        <div class="form-group p-0 mt-0">
            <label class="p-0 mt-0 font-weight-bold">Photo</label>
            <input type="file" name="postphoto" class="form-control form-control-sm" required>
        </div>
        <div class="form-group p-0 mt-0">
            <label class="p-0 mt-0 font-weight-bold">Post Title</label>
            <input type="text" name="posttitle" class="form-control form-control-sm" required>
        </div>
        <div class="form-group p-0 mt-0">
            <label class="p-0 mt-0 font-weight-bold">Category</label>
            <select id="category" name="category" class="form-control form-control-sm" required>
                <option></option>
                <option value="News">News</option>
                <option value="Trending">Trending</option>
                <option value="Sports">Sports</option>
                <option value="World">World</option>
                <option value="Advert">Advert</option>
                <option value="Adventure">Adventure</option>
            </select>
        </div>
        <div class="form-group p-0 mt-1">
            <label class="p-0 mt-0 font-weight-bold">Sub category</label>
            <select id="subcategory" name="subcategory" class="form-control form-control-sm" required>
                <option>select category</option>
            </select>
        </div>
        <div class="form-group p-0 mt-1">
            <label class="p-0 mt-0 font-weight-bold">Post content</label>
            <textarea name="content" class="form-control form-control-sm" rows="3" required></textarea>
        </div>
        <div class="form-group p-0 mt-0">
            <label class="p-0 mt-0 font-weight-bold">Website/Link</label>
            <input type="text" name="link" class="form-control form-control-sm">
        </div>
        <div class="form-group p-0 mt-0" hidden>
            <input type="text" name="author" class="form-control form-control-sm" value="<?php echo $name;?>" readonly>
        </div>
        <div class="form-group p-0 mt-0" hidden>
            <input name="date" class="form-control form-control-sm" value="<?php echo date('d/m/Y')?>" readonly>
        </div>
        <div class="form-group mt-1">
            <button class="btn btn-success btn-successbtn-addpost" type="addpost"><img src="icons/add.png" height="20" width="20">Add Post</button>
        </div>
    </form>
</div>
</div>
<script src="static/js/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function(){
    $("#category").change(function(){
        
        if($('#category').val()=="News"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>Politics</option>')
            $("#subcategory").append('<option>Government</option>')
            $("#subcategory").append('<option>Health</option>')
            $("#subcategory").append('<option>Education</option>')
        }else if($('#category').val()=="Trending"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>Gossip</option>')
            $("#subcategory").append('<option>Trending</option>')
            $("#subcategory").append('<option>Music</option>')
            $("#subcategory").append('<option>Celebrity</option>')
        }else if($('#category').val()=="Sports"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>Football</option>')
            $("#subcategory").append('<option>Olympics</option>')
            $("#subcategory").append('<option>EPL</option>')
            $("#subcategory").append('<option>World Cup</option>')
            $("#subcategory").append('<option>Sports</option>')
        }else if($('#category').val()=="World"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>World Politics</option>')
            $("#subcategory").append('<option>Wars</option>')
            $("#subcategory").append('<option>Automotive</option>')
            $("#subcategory").append('<option>Technology</option>')   
        }else if($('#category').val()=="Advert"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>Job</option>')
            $("#subcategory").append('<option>Company</option>')
            $("#subcategory").append('<option>Business</option>')
            $("#subcategory").append('<option>Advert</option>')
        }else if($('#category').val()=="Adventure"){
            $("#subcategory").empty()
            $("#subcategory").append('<option>Hotel</option>')
            $("#subcategory").append('<option>Parks</option>')
            $("#subcategory").append('<option>Museum</option>')
            $("#subcategory").append('<option>Adventure</option>')
        }
    })


    $(".form").on("submit",function(e){
        e.preventDefault();
        var formdata=new FormData(this);
        $.ajax({
            url:"processaddpost.php",
            method:"post",
            data:formdata,
            processData:false,
            contentType:false,

            success:function(data){
                $(".foralert").empty();
                $(".foralert").append(data);
                $(".form")[0].reset();
            }
        });
    });
});

</script>
</section>