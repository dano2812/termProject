
$(document).ready(function()
{
    $("#but_submit").click(function()
    {
        let username = ($("#txt_uname").val() === undefined) ? "" : $("#txt_uname").val().trim();
        let password = ($("#txt_pwd").val() === undefined)? "" : $("#txt_pwd").val().trim();
        let password2 = ($("#txt_pwd2").val() === undefined)? "" : $("#txt_pwd2").val().trim();

        if(password !== password2)
        {
            let msg = "Passwords don't match";
            $("#message").html(msg);
            return;
        }

        if( username !== "" && password !== "" )
        {
            $.ajax(
                {
                url:'createUser.php',
                type:'post',
                data:{username:username,password:password},
                success:function(response)
                {
                    let msg = "";
                    if(response == 1)
                    {
                        window.location = "login.php";
                    }
                    else
                    {
                        msg = "User already exists";
                    }
                    $("#message").html(msg);
                }
            });
        }
        else
        {
            let msg = "All fields have to filled";
            $("#message").html(msg);
        }
    });
});

