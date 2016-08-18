{{--Model show confirm--}}
<div class="modal fade" id="modal-confirm">
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
                <h4>

                </h4>
            </div>
        </div>
    </div>
</div>

{{--End Model  show confirm--}}

<div class="row" style="background-color: white;padding-top: 20px;padding-bottom: 20px">
    <form class="form-employee" id="formEmployee" role="form" onsubmit="return false">
        <div class="col-sm-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">ID :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="Id" style="width: 100%;display: none"
                                   id="Id" value="{{$user->id}}">
                            <input type="text" name="ajaxActionType" style="width: 100%;display: none" value="1">
                            <input type="text" name="Name" style="width: 100%;background-color:#E2D8D8"
                                   id="Name" value="{{$user->name}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Employee # :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="Employee" id="Employee" style="width: 100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">User Type :</h5>
                        </div>
                        <div class="col-sm-8">
                            <select style="height: 27px" id="Position">
                                @if($position!=null)
                                    @foreach($position as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Salutation :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="Salutation" id="Salutation" style="width: 100%" value="{{$user->salutation}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">First Name :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="FirstName" id="FirstName" style="width: 100%" value="{{$user->firstName}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Middle Initial :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="MiddleInitial" id="MiddleInitial" style="width: 100%" value="{{$user->middleInitial}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Last Name :</h5>
                        </div>
                        <div class="col-sm-10">
                            <input name="LastName" id="LastName" style="width: 100%" value="{{$user->lastName}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Designations :</h5>
                        </div>
                        <div class="col-sm-10">
                            <input name="Designations" id="Designations" style="width: 100%" value="{{$user->designations}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Sex :</h5>
                        </div>
                        <div class="col-sm-8">
                            <select style="height: 27px" id="Sex">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Birth Day :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" name="BirthDate" id="BirthDate" style="width: 100%" value="{{ date_format(date_create($user->birthDate),'Y-m-d') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Company :</h5>
                        </div>
                        <div class="col-sm-10">
                            <input name="Company" id="Company" style="width: 100%" value="{{$user->company}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Title :</h5>
                        </div>
                        <div class="col-sm-10">
                            <input name="Title" id="Title" style="width: 100%" value="{{$user->title}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Address :</h5>
                        </div>
                        <div class="col-sm-10">
                            @if($address!=null)
                                <input name="Address" id="Address" style="width: 100%" value="{{$address}}">
                            @else
                                <input name="Address" id="Address" style="width: 100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right"></h5>
                        </div>
                        <div class="col-sm-10">
                            @if($address1 !=null)
                                <input name="Address1" id="Address1" style="width: 100%" value="{{$address1}}">
                            @else
                                <input name="Address1" id="Address1" style="width: 100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 9px">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right"></h5>
                        </div>
                        <div class="col-sm-10">
                            @if($address2 != null)
                                <input name="Address2" id="Address2" style="width: 100%" value="{{$address2}}">
                            @else
                                <input name="Address2" id="Address2" style="width: 100%">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 9px">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="text-align: right">Email :</h5>
                        </div>
                        <div class="col-sm-10">
                            <input name="Email" id="Email" style="width: 100%" value="{{$user->email}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Bonus Date :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" name="BonusDate" id="BonusDate" style="width: 100%" value="{{date_format(date_create($user->bounsDate),'Y-m-d')}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Password New:</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="password" name="Password" id="Password" value="SamePassword" style="width: 100%;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Phone Number :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="Phone" id="Phone" style="width: 100%" value="{{$user->phone}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">PasswordConfirm:</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="password" name="PasswordConfirm" value="SamePassword" id="PasswordConfirm" style="width: 100%;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button type="button" class="btn btn-success pull-right" name="btnAction" onclick="profileView.changePassword()">
                        Change Password
                    </button>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>Rates:</legend>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Flat</h5>
                            </div>
                            <div class="col-sm-8">
                                @if($arrayFlat!=null)
                                    <input type="text" name="Flat" id="Flat" value="{{$arrayFlat}}">
                                @else
                                    <input type="text" name="Flat" id="Flat" >
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Hourly :</h5>
                            </div>
                            <div class="col-sm-8">
                                @if($arrayHourly!=null)
                                    <input type="text" name="Hourly" id="Hourly" value="{{$arrayHourly}}">
                                @else
                                      <input type="text" name="Hourly" id="Hourly">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Blended :</h5>
                            </div>
                            <div class="col-sm-8">
                                @if($arrayBlend!=null)
                                    <input type="text" name="Blended" id="Blended" value="{{$arrayBlend}}">
                                @else
                                    <input type="text" name="Blended" id="Blended">
                                @endif
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>User Created</legend>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Date :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="Created_at" id="Created_at" readonly style="background-color: #E2D8D8" value="{{date_format(date_create($user->created_at),'Y-m-d')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                @if($userCreated!=null)
                                    <input type="text" name="UserID_Created" id="UserID_Created" readonly="readonly" style="background-color: #E2D8D8" value="{{$userCreated}}">
                                @else
                                    <input type="text" name="UserID_Created" id="UserID_Created" readonly="readonly" style="background-color: #E2D8D8">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Network ID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="NetworkID_created" id="NetworkID_created" value="{{$user->networkID_created}}" readonly style="background-color:#E2D8D8">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <fieldset>
                        <legend>User Last Changed</legend>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Date :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="Updated_at" id="Updated_at" readonly style="background-color: #E2D8D8" value="{{date_format(date_create($user->updated_at),'Y-m-d')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                @if($userChanged!=null)
                                    <input type="text" name="UserID_Changed" id="UserID_Changed" readonly="readonly" style="background-color: #E2D8D8" value="{{$userChanged}}">
                                @else
                                    <input type="text" name="UserID_Changed" id="UserID_Changed" readonly="readonly" style="background-color: #E2D8D8">
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Network ID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="NetworkID_changed" id="NetworkID_changed" value="{{$user->networkID_changed}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <h5 style="text-align: right">Windows Users ID :</h5>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" name="ajaxAddNewAndSaveUpdateDateWindowsUsersID" id="ajaxAddNewAndSaveUpdateDateWindowsUsersID">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <br>
            <div class="row">
                <button type="button" class="btn btn-danger pull-right" style="margin-right: 20px;margin-left: 20px" onclick="profileView.actionCancel()">
                    Cancel
                </button>
                <button type="button" class="btn btn-success pull-right" name="btnAction" onclick="profileView.ActionUpdateOrChangePassword()">
                    Save
                </button>
            </div>
        </div>

    </form>
</div>
<br>
<br>

<script>
    $(function(){
        $("select#Position").val({{$user->positionId}});
        $("select#Sex").val("{{$user->sex}}");
        if(typeof(profileView)==="undefined")
        {

            profileView = {
                userObject: {
                    Id: $("input[name=Id]").val(),
                    Name: $("input[name=Name]").val(),
                    Email: $("input[name=Email]").val(),
                    Password:$("input[name=Password]").val(),
                    Position:$("select#Position option:selected").val(),
                    FirstName:$("input[name=FirstName]").val(),
                    LastName:$("input[name=LastName]").val(),
                    Salutation:$("input[name=Salutation]").val(),
                    MiddleInitial:$("input[name=MiddleInitial]").val(),
                    Designations:$("input[name=Designations]").val(),
                    Sex:$("select#Sex option:selected").val(),
                    BirthDate:$("input[name=BirthDate]").val(),
                    Company:$("input[name=Company]").val(),
                    Title:$("input[name=Title]").val(),
                    Phone:$("input[name=Phone]").val(),
                    Address:$("input[name=Address]").val(),
                    Address1:$("input[name=Address1]").val(),
                    Address2:$("input[name=Address2]").val(),
                    BonusDate:$("input[name=BonusDate]").val(),
                    NetworkID_created:$("input[name=NetworkID_created]").val(),
                    NetworkID_changed:$("input[name=NetworkID_changed]").val(),
                    Created_at:$("input[name=Created_at]").val(),
                    Changed_at:$("input[name=Changed_at]").val(),
                    Flat:$("input[name=Flat]").val(),
                    Hourly:$("input[name=Hourly]").val(),
                    Blended:$("input[name=Blended]").val()
                },
                resetUserObject: function () {
                    for (var propertyName in profileView.userObject) {
                        if (profileView.userObject.hasOwnProperty(propertyName)) {
                            profileView.userObject.propertyName = null;
                        }
                    }
                },
                constructorObjectUser:function()
                {
                    profileView.resetUserObject();
                    for(var i = 0;i<Object.keys(profileView.userObject).length;i++)
                    {
                        if(Object.keys(profileView.userObject)[i]==="Address")
                        {
                            var address = $("Input[name=Address]").val() +";"+ $("Input[name=Address1]").val() +";"+ $("Input[name=Address2]").val();
                            profileView.userObject[Object.keys(profileView.userObject)[i]] = address;
                        }
                        else if(Object.keys(profileView.userObject)[i]==="Position")
                        {
                            profileView.userObject[Object.keys(profileView.userObject)[i]] = $("select#Position option:selected").val();
                        }
                        else if(Object.keys(profileView.userObject)[i]==="Sex")
                        {
                            profileView.userObject[Object.keys(profileView.userObject)[i]] = $("select#Sex option:selected").val();
                        }
                        else
                        {
                            profileView.userObject[Object.keys(profileView.userObject)[i]] = $("#"+Object.keys(profileView.userObject)[i]).val();
                        }
                    }
                    return profileView.userObject;
                },
                abc:function()
                {
                    return  profileView.constructorObjectUser();
                },
                ActionUpdateOrChangePassword:function()
                {
                    var type = $("input[name=ajaxActionType]").val();
                    console.log(type);
                    if (type === "0") {
                        $("form[id=formEmployee]").validate({
                            rules: {
                                Password: "required",
                                PasswordConfirm: {
                                    required: true,
                                    equalTo: "#Password"
                                }
                            },
                            messages: {
                                Password: "Password is required",
                                PasswordConfirm: {
                                    required: "Password Confirm is required",
                                    equalTo: "Password Confirm is not the same password"
                                }
                            }
                        });
                    }
                    else
                    {
                        //alert(type);
                        $("form[id=formEmployee]").validate({
                            rules: {
                                Name: "required",
                                FirstName: "required",
                                LastName:"required",
                                Email:{
                                    required:true,
                                    email:true
                                }
                            },
                            messages: {
                                Name: "Code is required",
                                FirstName: "First Name is required",
                                LastName: "Last Name is required",
                                Email:{
                                    required:"Email is required",
                                    email:"Email is not correct"
                                }
                            }
                        });
                    }
                    if ($("form[id=formEmployee]").valid()) {
                        profileView.constructorObjectUser();
                        console.log(profileView.userObject);
                        $.post(url+"user/updateInformationOrChangePassword",{_token:_token,idAction:$("input[name=ajaxActionType]").val(),dataUser:profileView.userObject},function(data){
                            console.log(data);
                            if(data["Action"]==="Update")
                            {
                                if(data["Result"]===1)
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Update success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();
                                }
                                else if(data["Result"]===0)
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Update No success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();
                                }
                                else
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Update No success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();
                                }
                            }
                            else
                            {
                                if(data["Result"]===1)
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Change Password success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();

                                }
                                else if(data["Result"]===0)
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Change Password No success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();

                                }
                                else
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Change Password No success");
                                    $("div[id=modal-confirm]").modal("show");
                                    profileView.actionCancel();
                                }
                            }

                        });
                    }
                },
                convertStringToDate:function(date)
                {
                    var currentDate = new Date(date);
                    var datetime = currentDate.getFullYear() +"-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)  +"-"
                            + ("0" + currentDate.getDate()).slice(-2);
                    return datetime;
                },
                firstToUpperCase:function(str){
                    return str.substr(0, 1).toUpperCase() + str.substr(1);
                },
                ResetForm:function()
                {
                    if($("input[name=ajaxActionType]").val()==="1")
                    {
                        var allInput = $("input");
                        $("form[id=formEmployee]").find(allInput).val("");
                        $("button[name=btnAction]").text("Save New");
                        $("input[name=ajaxActionType]").val("1");
                        $("input[name=checkboxLockAndActive]").prop("checked",false);
                    }
                },
                changePassword:function()
                {
                    $("input[name=ajaxActionType]").val("0");
                    $("select[id=Position]").prop("disabled",true);
                    $("select[id=Sex]").prop("disabled",true);
                    $("form[id=formEmployee]").find("input").prop("readOnly",true).css("background-color","#E2D8D8");
                    $("input[name=Password]").prop("readOnly",false).css("background-color","").val("");
                    $("input[name=PasswordConfirm]").prop("readOnly",false).css("background-color","").val("");

                },
                actionCancel:function()
                {
                    if($("input[name=ajaxActionType]").val()==="0")
                    {
                        $("input[name=Password]").val("SamePassword").prop("readOnly",true);
                        $("input[name=PasswordConfirm]").val("SamePassword").prop("readOnly",true);

                        $("select[id=Position]").prop("disabled",false);
                        $("select[id=Sex]").prop("disabled",false);
                        console.log($("form[id=formEmployee]").find("input").length);
                        for(var i =0;i<$("form[id=formEmployee]").find("input").length;i++)
                        {
                            var name =$("form[id=formEmployee]").find($("input")[i]).attr("name");
                            if(name==="UserID_Created")
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",true).css("background-color","#E2D8D8");
                            }
                            else if(name==="Created_at")
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",true).css("background-color","#E2D8D8");
                            }
                            else if(name==="NetworkID_created")
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",true).css("background-color","#E2D8D8");
                            }
                            else if(name==="Updated_at")
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",true).css("background-color","#E2D8D8");
                            }
                            else if(name==="UserID_Changed")
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",true).css("background-color","#E2D8D8");
                            }
                            else
                            {
                                $("form[id=formEmployee]").find($("input")[i]).prop("readOnly",false).css("background-color","");
                            }
                        }
                        $("input[name=Password]").prop("readOnly",true).css("background-color","#E2D8D8");
                        $("input[name=PasswordConfirm]").prop("readOnly",true).css("background-color","#E2D8D8");

                        $("form[id=formEmployee]").find($("label[class=error]")).css("display","none");

                    }
                    else
                    {
                        $("select#Position").val(profileView.userObject.Position);
                        $("select#Sex").val(profileView.userObject.Sex);
                        for(var property in profileView.userObject)
                        {
                            $("#"+property).val(profileView.userObject[property]);
                        }
                        $("form[id=formEmployee]").find($("label[class=error]")).css("display","none");
                    }
                }
            };
        }
        else
        {

        }
    })
</script>