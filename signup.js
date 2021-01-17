
$(document).ready(function(){
    $("#but_submit").click(function(){
        let username = ($("#txt_uname").val() === undefined) ? "" : $("#txt_uname").val().trim();
        let password = ($("#txt_pwd").val() === undefined)? "" : $("#txt_pwd").val().trim();
        let password2 = ($("#txt_pwd2").val() === undefined)? "" : $("#txt_pwd2").val().trim();

        if(password !== password2)
        {
            let msg = "Passwords does not match";
            $("#message").html(msg);
            return;
        }

        if( username !== "" && password !== "" ){
            $.ajax({
                url:'checkUser.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    let msg = "";
                    if(response == 1){
                        window.location = "login.php";
                    }else{
                        msg = "User already exists";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});

