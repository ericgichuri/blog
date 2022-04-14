var menubtn=document.querySelectorAll(".menubtn");
menubtn.forEach(element=>{
    element.addEventListener("click",function(){
        menubtn.forEach(link=>link.classList.remove('active'));
        this.classList.add('active');
    })
})
$(document).ready(function(){
    $(".main").load("admindashboard.php")
    $(".getdashboard").click(function(){
        $(".main").load("admindashboard.php")
    })
    $(".getaddpost").click(function(){
        $(".main").load("adminaddpost.php")
    })
    $(".getviewpost").click(function(){
        $(".main").load("adminview.php")
    })
    $(".getusers").click(function(){
        $(".main").load("users.php")
    })
    $(".getcomments").click(function(){
        $(".main").load("admincomments.php")
    })
    $(".getmessages").click(function(){
        $(".main").load("adminmessages.php")
    })
    $(".getadmins").click(function(){
        $(".main").load("myadmins.php")
    })
    $(".getsubscribers").click(function(){
        $(".main").load("subscribers.php");
    })
})

var btnlogout=document.querySelector(".btnlogout");
btnlogout.addEventListener("click",function(){
    tologout=confirm("Do you want to logout");
    if(tologout==1){
        window.location.href='logout.php';
    }
})