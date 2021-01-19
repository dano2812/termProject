$(document).ready(function(){
    $("#btn_question").click(function()
    {
        let mail = ($("#txt_mail").val() === undefined) ? "" : $("#txt_mail").val().trim();
        let text = ($("#txt_question").val() === undefined)? "" : $("#txt_question").val().trim();

        let msg = "";
        if( mail !== "" && text !== "" )
        {
            $.ajax({
                url:'createQuestion.php',
                type:'post',
                data:{mail:mail,text:text},
                success:function(response){

                    if(response == 1)
                    {
                        msg = "Thank you, for your questions. We will send you an answer as soon, as possible."
                    }else
                    {
                        msg = "Invalid email format!";
                    }
                    $("#message").html(msg);
                }
            });
        }
        else
        {
            msg = "Username and password have to be filled";
            $("#message").html(msg);
        }
    });
});