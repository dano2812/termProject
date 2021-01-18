$(document).ready(function(){
    $("#SaveEdit_btn").click(function()
    {
        let editproj = $(this).attr('name');

        let projname = ($("#txt_pename").val() === undefined) ? "" : $("#txt_pename").val().trim();
        let descr = ($("#txt_edsc").val() === undefined)? "" : $("#txt_edsc").val().trim();

        if(projname != "" && descr != "") {
            if (editproj !== "") {
                $.ajax({
                    url: 'projectUtils.php',
                    type: 'post',
                    data: {editproj: editproj, projname: projname, descr: descr},
                    success: function (response) {
                        if (response == 1) {
                            window.location = "ProjectsAlt.php";
                        }else
                        {
                            msg = "Cannot add project to database";
                        }
                        $("#message").html(msg);
                    }
                });
            }
        }
        else
        {
            msg = "Project name and description cant be empty!";
            $("#message").html(msg);
        }
    });
});

$(document).ready(function(){
    $(".deletebtn").click(function()
    {
        let id = $(this).attr('name');
        let delproj = "delproj";
        let msg = "";
        if( id !== "" )
        {
            $.ajax({
                url:'projectUtils.php',
                type:'post',
                data:{id:id,delproj:delproj},
                success:function(response){
                    if(response == 1)
                    {
                        window.location = "ProjectsAlt.php";
                    }else
                    {
                        msg = "Can not delete project from database";
                    }
                    $("#message").html(msg);
                }
            });
        }
        else
        {
            msg = "Wong project identification";
            $("#message").html(msg);
        }
    });
});

$(document).ready(function(){
    $("#Save_btn").click(function()
    {
        let name = $(this).attr('name');
        let projname = "";
        let descr = "";
        let newproj = "newproj";

        if( name === "Save_btn" )
        {
            projname = ($("#txt_pname").val() === undefined) ? "" : $("#txt_pname").val().trim();
            descr = ($("#txt_dsc").val() === undefined)? "" : $("#txt_dsc").val().trim();
            if(projname !== "" && descr !== "")
            {
                $.ajax({
                    url:'projectUtils.php',
                    type:'post',
                    data:{projname:projname,descr:descr, newproj:newproj},
                    success:function(response){
                        let msg = "";
                        if(response == 1)
                        {
                            window.location = "ProjectsAlt.php";
                        }else
                        {
                            msg = "Cannot add project to database";
                        }
                        $("#message").html(msg);
                    }
                });
            }
            else
            {
                msg = "Project name and description cant be empty!";
                $("#message").html(msg);
            }
        }
    });
});
