
$(document).ready(function(){
    $("#but_submit").click(function()
    {
        let username = ($("#txt_uname").val() === undefined) ? "" : $("#txt_uname").val().trim();
        let password = ($("#txt_pwd").val() === undefined)? "" : $("#txt_pwd").val().trim();

        if( username !== "" && password !== "" )
        {
            $.ajax({
                url:'checkUser.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    let msg = "";
                    if(response == 1)
                    {
                        window.location = "index.php";
                    }else
                        {
                        msg = "Invalid username or password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
        else
        {
            let msg = "Username and password have to be filled";
            $("#message").html(msg);
        }
    });
});

