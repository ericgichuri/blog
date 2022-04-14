$(document).ready(function(){
    $(".menubtn").click(function(){
        $(".navlinks").toggleClass("show")
        
        var iconmenu=$(".menubtn").attr("data")
        
        if(iconmenu=="show"){
            $(".menubtn").attr("data","hide")
            $(".menubtn img").attr("src","icons/close.png")
        }else{
            $(".menubtn").attr("data","show")
            $(".menubtn img").attr("src","icons/menuicon.png")
        }
    })

    
})
$(document).ready(function(){
    $(".btnlogin").click(function(){
        $(".modallogin").show()
    })
    $(".btnregister").click(function(){
        $(".modalregister").show()
    })
    $(".btnclosemodal").click(function(){
        $(".modal").hide()
    })
})
$(document).ready(function(){
    
    $(".formregister").on("submit",function(e){
        e.preventDefault()
        var registerdata=new FormData(this)
        $.ajax({
            url:"userregister.php",
            method:"post",
            data:registerdata,
            contentType:false,
            processData:false,
            success:function(data){
                $(".alertholder").empty()
                $(".alertholder").append(data)
                $(".formregister")[0].reset()
            }
        })
    })
})

$(document).ready(function(){
    $(".formlogin").on("submit",function(e){
        e.preventDefault();
        var logindata=new FormData(this)
        $.ajax({
            url:"userlogin.php",
            method:"post",
            data:logindata,
            contentType:false,
            processData:false,
            success:function(data){
                if(data==1){
                    $(".alertholder1").empty()
                    $(".alertholder1").append("<p class='alert alert-success text-center p-0'>login successful</p>")
                    $(".welcometext").empty()
                    $(".welcometext").append("Welcome "+$(".username").val())
                    $(".formlogin")[0].reset()
                    $(".modallogin").hide()
                }else{
                    $(".alertholder1").empty()
                    $(".alertholder1").append("<p class='alert alert-danger text-center p-0'>username or password incorrect</p>")
                }
                
            }
        })
    })
})

$(document).ready(function(){
    $(".alertshow").hide()
    $(".commentform").on("submit",function(e){
        e.preventDefault()
        var commentformdata=new FormData(this)

        $.ajax({
            url:"commenting.php",
            method:"post",
            data:commentformdata,
            contentType:false,
            processData:false,
            success:function(data){
                

                if(data==1){
                    $(".alertshow").show()
                    $(".alertshowmsg").empty()
                    $(".alertshowmsg").append('<span class="alert alert-primary">comment sent. Thanks✔.</span>')
                    $(".alertshow").delay(4000).fadeOut("slow")
                    $(".commentform")[0].reset()
                }else if(data==2){
                    $(".alertshow").show()
                    $(".alertshowmsg").empty()
                    $(".alertshowmsg").append('<span class="alert alert-danger">comment not sent. Try to write something.</span>')
                    $(".alertshow").delay(4000).fadeOut("slow")
                    $(".commentform")[0].reset()
                }else if(data==3){
                    $(".alertshow").show()
                    $(".alertshowmsg").empty()
                    $(".alertshowmsg").append('<span class="alert alert-danger">comment not sent. Try again.</span>')
                    $(".alertshow").delay(4000).fadeOut("slow")
                    $(".commentform")[0].reset()
                }
                else{
                    $(".commentform")[0].reset()
                }
                
            }
        })
        $(this)[0].reset()
    })
})