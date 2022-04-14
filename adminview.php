<?php

include "connection.php";

?>
<head>
    <link rel="stylesheet" type="text/css" href="static/styles/css/bootstrap.min.css">
</head>
<section>
<style>
textarea::-webkit-scrollbar{
    width: 5px;
    cursor: pointer;
}
textarea::-webkit-scrollbar-track{
    background: rgb(16, 16, 44);
    cursor: pointer;
}
textarea::-webkit-scrollbar-thumb{
    background: rgb(255, 196, 0);
    border-radius: 10px;
    cursor: pointer;
}
textarea::-webkit-scrollbar-thumb:hover{
    background-color: rgb(0, 46, 253);
}
textarea{
    max-height: 100px;
    min-height: 100px;
}
.customradio{
    margin-top: 10px;
	border: transparent 2px solid;
	width: 80px;
	padding: 10px;
	text-align: center;
	border-radius: 10px;
	box-shadow: 0px 2px 5px -2px rgba(0, 0, 0, 0.4);
	background-color: whitesmoke;
	cursor: pointer;
	transition: all 0.3s ease-in;
}
input[type="radio"]{
	display: none;
}
input[type="radio"]:checked + label{
	border-color: blue;
    color: whitesmoke;
    background-color: rgba(11, 17, 36, 0.89);
}
</style>
<h3 class="text-center">Admin View posts</h3>
<div class="d-flex table-responsive p-2">
    <table class="table table-sm table-striped table-bordered table-condensed text-center">
        <thead>
            <tr>
                <th>#</th>
                <th hidden>Photo</th>
                <th>Topic</th>
                <th>Category</th>
                <th>subcategory</th>
                <th>Link</th>
                <th>Star</th>
                <th colspan="3">operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * FROM posts";
            $query=mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
                while($row=mysqli_fetch_assoc($query)){
                    ?>
                    
                    <tr id="<?php echo $row['id'];?>">
                        <td data-target='id'><?php echo $row['id'];?></td>
                        <td data-target='photo' hidden><img src="images/uploads/<?php echo $row['photo'];?>" width="300" height="300"></td>
                        <td data-target='Topic'><?php echo $row['Topic'];?></td>
                        <td data-target='category'><?php echo $row['category'];?></td>
                        <td data-target='subcategory'><?php echo $row['subcategory'];?></td>
                        <td data-target='content' hidden style="font-size: 8px;"><?php echo $row['content'];?></td>
                        <td data-target='link'><a target="blank" href="<?php echo $row['link'];?>"><?php echo $row['link'];?></a></td>
                        <td data-target='star'><?php echo $row['star'];?></td>
                        <td><button class="btnview btn btn-sm btn-warning" data-role="view" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/view.png" width="20" height="20">View</button></td>
                        <td><button class="btnedit btn btn-sm btn-primary" data-role="edit" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/edit.png" width="20" height="20">Edit</button></td>
                        <td><button class="btndelete btn btn-sm btn-danger" data-role="delete" data-id="<?php echo $row['id'];?>"><img class="icon" src="icons/delete.png" width="20" height="20">Delete</button></td>
                    </tr>
                    <?php
                }
            }
            
            ?>
        </tbody>
    </table>
</div>
<div id="my-modal" class="modal modalview" tabindex="-1" role="dialog" aria-hidden="true" style="background:rgba(0,0,0,0.3);" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-white" id="mymodalbody" style="background: rgb(16, 16, 44);">
            <h5 class="viewtext text-center"></h5>
                <div class="row justify-content-center">
                    <div id="photo"></div>
                </div>
                <div class="row justify-content-center px-2">
                    <div class="col">
                        <h5 id="topic"></h5>
                        <p class="badge badge-primary" id="category"></p>
                        <p class="badge badge-warning" id="subcategory"></p>
                        <div class="badge" id="star"></div><br>
                        <p>Website/link: <a id="link" href=""></a></p>
                        
                    </div>
                </div>
                <div class="row justify-content-center px-2 text-white">
                    <h6>Description</h6>
                    <p id="content" style="font-size: 17px;"></p>
                    <button class="bntclosemodal btn-sm btn btn-danger" style="position: absolute;right:10px;top:10px;"><img src="icons/close.png" height="20px" width="20px"></button>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div id="my-modal" class="modal modaledit" tabindex="-1" role="dialog" aria-hidden="true" style="background:rgba(0,0,0,0.3);">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="editidtext"></h4>
                <form class="form formedit" enctype="multipart/form-data" method="post">
                    <input id="editid" type="text" class="form-control" name="id" hidden>
                    <label>Post Topic</label>
                    <input id="edittopic" type="text" class="form-control form-control-sm" name="topic">
                    <label>Category</label>
                    <select id="editcategory" class="form-control form-control-sm" name="category">
                        
                    </select>
                    <label>Sub category</label>
                    <select id="editsubcategory" class="form-control form-control-sm" name="subcategory">
                        
                    </select>
                    <label>content</label>
                    <textarea id="editcontent" name="content" class="form-control form-control-sm" rows="3">
                    </textarea>
                    <label>link</label>
                    <input id="editlink" type="text" class="form-control form-control-sm" name="link">
                    <div class="btn-group-toggle" data-toggle="buttons">
                        <input id="radiostar" type="radio" value="yes" name="star" checked>
                        <label class="customradio" for="radiostar">
                             Star ⭐
                        </label>
                        <input id="radiounstar" type="radio" value="no" name="star">
                        <label class="customradio" for="radiounstar">
                            UnStar
                        </label>
                    </div>
                    <button class="btn btn-success btn-block mt-2">Update</button>
                </form>
                <button type="submit" class="btnclosemodaledit btn-sm btn btn-danger" style="position: absolute;right:10px;top:10px;"><img src="icons/close.png" height="20px" width="20px"></button>
            </div>
        </div>
    </div>
</div>
<script>
    
    $(document).ready(function(){
        $(".bntclosemodal").click(function(){
            $(".modalview").hide();
        })
        $(".btnview").click('button[data-role=view]',function(){
            var id=$(this).data("id")
            var topic=$('#'+id).children('td[data-target=Topic]').text()
            var category=$('#'+id).children('td[data-target=category]').text()
            var subcategory=$('#'+id).children('td[data-target=subcategory]').text()
            var content=$('#'+id).children('td[data-target=content]').text()
            var link=$('#'+id).children('td[data-target=link]').text()
            var star=$('#'+id).children('td[data-target=star]').text()
            var photo=$('#'+id).children('td[data-target=photo]').html()
            $(".viewtext").text("View "+id+" "+ category)
            $("#topic").text(topic)
            $("#category").text("#"+category)
            $("#subcategory").text("#"+subcategory)
            $("#content").text(content)

            $("#link").empty()
            $("#link").append(link)
            $("#link").attr("href",link)

            $("#star").text("Starred: 🌟 "+star)
            $("#photo").html(photo)
            $(".modalview").show()
        })
        $(".btnedit").click('button[data-role=edit]',function(){
            var id=$(this).data("id")
            $(".editidtext").text("Edit post "+id)
            var topic=$('#'+id).children('td[data-target=Topic]').text()
            var category=$('#'+id).children('td[data-target=category]').text()
            var subcategory=$('#'+id).children('td[data-target=subcategory]').text()
            var content=$('#'+id).children('td[data-target=content]').text()
            var link=$('#'+id).children('td[data-target=link]').text()
            var star=$('#'+id).children('td[data-target=star]').text()
            $("#editid").val(id)
            $("#edittopic").val(topic)
            $("#editcategory").empty()
            $("#editcategory").prepend('<option>'+category+'</option>')
            $("#editcategory").append('<option>News</option>')
            $("#editcategory").append('<option>Trending</option>')
            $("#editcategory").append('<option>Sports</option>')
            $("#editcategory").append('<option>World</option>')
            $("#editcategory").append('<option>Advert</option>')
            $("#editcategory").append('<option>Adventure</option>')
            $("#editsubcategory").empty()
            $("#editsubcategory").prepend('<option>'+subcategory+'</option>')
            $("#editcontent").val(content)
            $("#editlink").val(link)

            $(".modaledit").show()
        })
        $(".formedit").on("submit",function(e){
            e.preventDefault()
            updatedata=new FormData(this)
            $.ajax({
                url:"updatepost.php",
                method:"post",
                data:updatedata,
                contentType:false,
                processData:false,

                success:function(data){
                    alert(data)
                    $(".modaledit").hide()
                    $(".main").load("adminview.php")
                }
            })
        })
        $(".btndelete").click('button[data-role=delete]',function(){
            var id=$(this).data("id")
            var todelete=confirm("Do you want to delete this post")
            if(todelete==1){
                $.ajax({
                url:"deletepost.php",
                method:"post",
                data:{id},
                success:function(data){
                    alert(data);
                    $(".main").load("adminview.php")
                }
                })
            }
            
        })
        $(".btnclosemodaledit").click(function(){
            $(".modaledit").hide()
        })
        $("#editcategory").change(function(){
        if($('#editcategory').val()=="News"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>Politics</option>')
            $("#editsubcategory").append('<option>Government</option>')
            $("#editsubcategory").append('<option>Health</option>')
            $("#editsubcategory").append('<option>Education</option>')
        }else if($('#editcategory').val()=="Trending"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>Gossip</option>')
            $("#editsubcategory").append('<option>Trending</option>')
            $("#editsubcategory").append('<option>Music</option>')
            $("#editsubcategory").append('<option>Celebrity</option>')
        }else if($('#editcategory').val()=="Sports"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>Football</option>')
            $("#editsubcategory").append('<option>Olympics</option>')
            $("#editsubcategory").append('<option>EPL</option>')
            $("#editsubcategory").append('<option>World Cup</option>')
            $("#editsubcategory").append('<option>Sports</option>')
        }else if($('#editcategory').val()=="World"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>World Politics</option>')
            $("#editsubcategory").append('<option>Wars</option>')
            $("#editsubcategory").append('<option>Automotive</option>')
            $("#editsubcategory").append('<option>Technology</option>')   
        }else if($('#editcategory').val()=="Advert"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>Job</option>')
            $("#editsubcategory").append('<option>Company</option>')
            $("#editsubcategory").append('<option>Business</option>')
            $("#editsubcategory").append('<option>Advert</option>')
        }else if($('#editcategory').val()=="Adventure"){
            $("#editsubcategory").empty()
            $("#editsubcategory").append('<option>Hotel</option>')
            $("#editsubcategory").append('<option>Parks</option>')
            $("#editsubcategory").append('<option>Museum</option>')
            $("#editsubcategory").append('<option>Adventure</option>')
        }
    })
    })
</script>
</section>