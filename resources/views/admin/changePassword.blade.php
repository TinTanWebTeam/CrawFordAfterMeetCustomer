{{--End Model  confirm--}}
<div class="modal fade" id="modalNotification">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Information
                </h4>
            </div>
            <div class="modal-body">
                <h4></h4>
            </div>
        </div>
    </div>
</div>
{{--End Model  show confirm--}}

{{--Model List Employee--}}
<div class="modal fade" id="modalListEmployee" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List Users</div>
            <div class="table-responsive">
                <table class="table hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>Sex</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyAllEmployee">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model Model List Employee--}}



<div style="background-color: white" class="row">
    <form action="" id="formChangePassword" style="padding-left: 30px">
        <table width="30%" style="height: 200px" cellspacing="10">
            <tr>
                <td>User :</td>
                <td><input type="text" class="form-control" name="User" id="User" ondblclick="changePasswordView.viewListEmployeeWhenDoubleClickOnInputName()" ></td>
            </tr>
            <tr style="display: none;">
                <td><input type="password" id="userCurrent" name="userCurrent"></td>
            </tr>


            <tr style="padding-top: 10px">
                <td>Password New :</td>
                <td><input type="password" class="form-control" name="passwordNew" id="passwordNew"></td>
            </tr>
            <tr>
                <td>Password Confirm :</td>
                <td><input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm"></td>
            </tr>
        </table>
        <div style="margin-left: 185px;margin-top: 15px">
            <button type="button" class="btn btn-default pull-left" onclick="changePasswordView.save()"  style="margin-left: 15px">
                Save
            </button>
            <button type="button" class="btn btn-default pull-left" onclick="changePasswordView.cancel()"  style="margin-left: 15px">
                Cancel
            </button>
        </div>

    </form>
</div>
<script>
    $(function(){
        if(typeof(changePasswordView)==="undefined")
        {
            changePasswordView = {
                getAllEmployees:function()
                {
                    $.get(url+"getAllEmployeesChangePassword",{_token:_token},function(view){
                        $("tbody[id=tbodyAllEmployee]").empty().append(view);
                    });
                },
                viewListEmployeeWhenDoubleClickOnInputName:function()
                {
                    changePasswordView.getAllEmployees();
                    $("div[id=modalListEmployee]").modal("show");
                },
                viewEmployeeDetailWhenChooseRowOfEventDoubleClick:function(element)
                {
                    $("input[name=userCurrent]").val($(element).attr("id"));
                    $("input[name=User]").val($(element).find("td:eq(0)").text());
                    $("div[id=modalListEmployee]").modal("hide");
                },
                save:function()
                {
                    $("form[id=formChangePassword]").validate({
                        rules: {
                            User:"required",
                            passwordNew: {
                                required:true,
                                minlength:6
                            },
                            passwordConfirm: {
                                required: true,
                                minlength:6,
                                equalTo: "#passwordNew"
                            }
                        },
                        messages: {
                            User: "User is required",
                            passwordNew:{
                                required:"Password is required",
                                minlength:"Password must be at least 6 characters"
                            },
                            passwordConfirm: {
                                required: "Password Confirm is required",
                                minlength:"Password confirm must be at least 6 characters !!!",
                                equalTo: "Password Confirm is not the same password"
                            }
                        }
                    });
                    if($("form[id=formChangePassword]").valid())
                    {
                        $.post(url+"saveChangePassword",
                                {
                                    _token:_token,
                                    idUser:$("input[name=userCurrent]").val(),
                                    passwordNew:$("input[name=passwordNew]").val()},
                                function(data){
                                    if(data==="1")
                                    {
                                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Change password success");
                                        $("div[id=modalNotification]").modal("show");
                                        //Reset
                                        $("input[name=passwordCurrent]").val("");
                                        $("input[name=passwordNew]").val("");
                                        $("input[name=passwordConfirm]").val("");
                                        $("input[name=User]").val("");
                                        $("input[name=userCurrent]").val("");
                                    }

                                    else
                                    {
                                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Change password no success");
                                        $("div[id=modalNotification]").modal("show");
                                    }

                        });
                    }

                },
                cancel:function()
                {
                    $("input[name=passwordCurrent]").val("");
                    $("input[name=passwordNew]").val("");
                    $("input[name=passwordConfirm]").val("");
                    $("input[name=User]").val("");
                    $("input[name=userCurrent]").val("");
                }
            };

        }
        else
        {

        }



    })
</script>