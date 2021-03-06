{{--Model show confirm--}}
{{--<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-body" id="modalContent" style="text-align: center">Save New Success</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

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
                            <input type="text" name="ajaxActionType" style="width: 100%;display: none"
                                   id="ajaxActionType" value="1">
                            <input type="text" name="Id" style="width: 100%;display: none"
                                   id="Id">
                            <input type="text" name="Name" style="width: 100%"
                                    id="Name" ondblclick="employeeView.viewListEmployeeWhenDoubleClickOnInputName()" onkeypress="employeeView.viewEmployeeDetailWhenEnterKey(event)">
                        </div>
                    </div>
                </div>
                {{--<div class="col-sm-6">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-sm-4">--}}
                            {{--<h5 style="text-align: right">Employee # :</h5>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-8">--}}
                            {{--<input name="Employee" id="Employee" style="width: 100%">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
                            <input name="Salutation" id="Salutation" style="width: 100%">
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
                            <input name="FirstName" id="FirstName" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Middle Initial :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input name="MiddleInitial" id="MiddleInitial" style="width: 100%">
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
                            <input name="LastName" id="LastName" style="width: 100%">
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
                            <input name="Designations" id="Designations" style="width: 100%">
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
                            <input type="date" name="BirthDate" id="BirthDate" style="width: 100%">
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
                            <input name="Company" id="Company" style="width: 100%">
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
                            <input name="Title" id="Title" style="width: 100%">
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
                            <input name="Address" id="Address" style="width: 100%">
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
                            <input name="Address1" id="Address1" style="width: 100%">
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
                            <input name="Address2" id="Address2" style="width: 100%">
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
                            <input name="Email" id="Email" style="width: 100%">
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
                            <input type="date" name="BonusDate" id="BonusDate" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Password :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="password" name="Password" id="Password" style="width: 100%">
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
                            <input name="Phone" id="Phone" style="width: 100%">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="text-align: right">Password Confirm :</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="password" name="PasswordConfirm" id="PasswordConfirm" style="width: 100%">
                        </div>
                    </div>
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
                                <input type="text" name="Flat" id="Flat" readonly style="background-color: #F3EDED">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Hourly :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="Hourly" id="Hourly">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Blended :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="Blended" id="Blended" readonly style="background-color: #F3EDED">
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
                                <input type="text" name="Created_at" id="Created_at" readonly style="background-color: #F3EDED">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="UserID_Created" id="UserID_Created" readonly="readonly" style="background-color: #F3EDED">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Network ID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="NetworkID_created" id="NetworkID_created">
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
                                <input type="text" name="Updated_at" id="Updated_at" readonly style="background-color: #F3EDED">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="UserID_Changed" id="UserID_Changed" readonly="readonly" style="background-color: #F3EDED">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Network ID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="NetworkID_changed" id="NetworkID_changed">
                            </div>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-5">--}}
                                {{--<h5 style="text-align: right">Windows Users ID :</h5>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-7">--}}
                                {{--<input type="text" name="ajaxAddNewAndSaveUpdateDateWindowsUsersID" id="ajaxAddNewAndSaveUpdateDateWindowsUsersID">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<h5 style="text-align: right">Locked :</h5>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-2">--}}
                                {{--<input type="radio" class="radio" name="checkboxLockAndActive" value="Locked" disabled>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="LockedDetail" id="LockedDetail" readonly style="background-color: #F3EDED">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<h5 style="text-align: right">Inactive :</h5>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-2">--}}
                                {{--<input type="radio" class="radio" name="checkboxLockAndActive" value="Inactive" disabled>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-6">--}}
                                {{--<input type="text" name="InactiveDetail" id="InactiveDetail" readonly style="background-color: #F3EDED">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-4">--}}
                                {{--<h5 style="text-align: right">Default Profile :</h5>--}}
                            {{--</div>--}}
                            {{--<div class="col-sm-2">--}}
                                {{--<input type="checkbox" class="checkbox" name="DefaultProfile" id="DefaultProfile" value="defaultProfile">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </fieldset>
                </div>
            </div>
            <br>
            <div class="row">
                <button type="button" class="btn btn-danger pull-right" style="margin-right: 20px;margin-left: 20px" onclick="employeeView.ResetForm()">
                    Cancel
                </button>
                <button type="button" class="btn btn-success pull-right" name="btnAction" onclick="employeeView.ActionAddNewOrUpdate()">
                    Save
                </button>
            </div>
        </div>

    </form>
</div>
<br>
<br>

<script>
    $("input[name=Hourly]").formatCurrency({roundToDecimalPlace:0});
    $("input[name=Hourly]").on('blur',function(){
        $("input[name=Hourly]").formatCurrency({roundToDecimalPlace:0});
    });
    $(function(){
        if(typeof(employeeView)==="undefined")
        {
            employeeView = {
                EmployeeObject: {
                    Id: null,
                    Name: null,
                    Email: null,
                    Password:null,
                    Position:null,
                    FirstName:null,
                    LastName:null,
                    Salutation:null,
                    MiddleInitial:null,
                    Designations:null,
                    Sex:null,
                    BirthDate:null,
                    Company:null,
                    Title:null,
                    Phone:null,
                    Address:null,
                    BonusDate:null,
                    NetworkID_created:null,
                    NetworkID_changed:null,
                    Created_at:null,
                    Changed_at:null,
                    Flat:null,
                    Hourly:null,
                    Blended:null
                },
                resetEmployeeObject: function () {
                    for (var propertyName in employeeView.EmployeeObject) {
                        if (employeeView.EmployeeObject.hasOwnProperty(propertyName)) {
                            employeeView.EmployeeObject.propertyName = null;
                        }
                    }
                },
                ActionAddNewOrUpdate:function()
                {
                     $("form[id=formEmployee]").validate({
                           rules: {
                                Name: "required",
                                Password: {
                                    required:true,
                                    minlength:6
                                },
                                FirstName: "required",
                                LastName: "required",
                                PasswordConfirm: {
                                    required: true,
                                    minlength:6,
                                    equalTo: "#Password"
                                },
                               Email: {
                                   required: true,
                                   email: true
                               },
                            },
                            messages: {
                                Name: "ID is required",
                                Password:{
                                    required:"Password is required",
                                    minlength:"Password must be at least 6 characters"
                                },
                                FirstName: "First Name is required",
                                LastName: "Last Name is required",
                                PasswordConfirm: {
                                    required: "Password Confirm is required",
                                    minlength:"Password confirm must be at least 6 characters !!!",
                                    equalTo: "Password Confirm is not the same password"
                                },
                                Email: {
                                    required: "Email is required",
                                    email: "Email is not correct"
                                },
                            }
                        });
                    if ($("form[id=formEmployee]").valid()) {
                        employeeView.resetEmployeeObject();
                        for(var i = 0;i<Object.keys(employeeView.EmployeeObject).length;i++)
                        {
                            if(Object.keys(employeeView.EmployeeObject)[i]==="Address")
                            {
                                var address = $("Input[name=Address]").val() +";"+ $("Input[name=Address1]").val() +";"+ $("Input[name=Address2]").val();
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = address;
                            }
                            else if(Object.keys(employeeView.EmployeeObject)[i]==="Position")
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("select#Position option:selected").val();
                            }
                            else if(Object.keys(employeeView.EmployeeObject)[i]==="Sex")
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("select#Sex option:selected").val();
                            }
//                            else if(Object.keys(employeeView.EmployeeObject)[i]==="Inactive")
//                            {
//                                var checked2 = null;
//                                if($("input[name=checkboxLockAndActive]:eq(1)").is(":checked"))
//                                {
//                                    checked2 = "True";
//                                }
//                                else
//                                {
//                                    checked2 = "False";
//                                }
//                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = checked2;
//                            }
                            else
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("#"+Object.keys(employeeView.EmployeeObject)[i]).val();
                            }
                        }
                        employeeView.EmployeeObject.Hourly = $("input[name=Hourly]").val().replace(/,/g,"");
                        $.post(url+"addNewAndUpdateEmployee",{_token:_token,idAction:$("input[name=ajaxActionType]").val(),dataEmployee:employeeView.EmployeeObject},function(data){
                            if(data["Action"]==="AddNew")
                            {
                                if(data["Result"]===1)
                                {
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Add New Success");
                                    $("div[id=modalNotification]").modal("show");
                                    $("input[name=ajaxActionType]").val("1");
                                    employeeView.ResetForm();
                                    String($("input[name=Hourly]").val()).replace(/,/g,"");
                                }
                                else
                                {
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Add New No Success");
                                    $("div[id=modalNotification]").modal("show");
                                }
                            }
                            else
                            {
                                if(data["Result"]===1)
                                {
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Update Success");
                                    $("div[id=modalNotification]").modal("show");
                                    $("input[name=ajaxActionType]").empty().val("1");
                                    employeeView.ResetForm();
                                    $("input[name=Hourly]").val().replace(/,/g,"");
                                }
                                else
                                {
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Update No Success");
                                    $("div[id=modalNotification]").modal("show");
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
                getAllEmployees:function(){
                    $.get(url+"getAllEmployees",{_token:_token},function(view){
                        $("tbody[id=tbodyAllEmployee]").empty().append(view);
                    });
                },
                viewListEmployeeWhenDoubleClickOnInputName:function()
                {
                    employeeView.getAllEmployees();
                    $("div[id=modalListEmployee]").modal("show");
                },
                viewEmployeeDetailWhenChooseRowOfEventDoubleClick:function(element)
                {
                    //Reset class error
                    $("form[id=formEmployee]").find("label[class=error]").hide();
                    $("input[name=Name]").prop("readOnly",true).css("background-color","#F3EDED");
                    $("input[name=ajaxActionType]").empty().val("0");
                    $("button[name=btnAction]").text("Save Update");
                    $("div[id=modalListEmployee]").modal("hide");
                    $.post(url+"viewEmployeeDetailWhenChooseRowOfEventDoubleClick",{_token:_token,idEmployee:$(element).attr("id")},function(data){

                        $("select#Position").val(data["Object"]["positionId"]);
                        $("select#Sex").val(data["Object"]["sex"]);
                        //set value password sd
                        $("input[name=Password]").val("SamePassword").prop("readOnly",true).css("background-color","#EADFDF");
                        $("input[name=PasswordConfirm]").val("SamePassword").prop("readOnly",true).css("background-color","#EADFDF");

                        $("input[name=checkboxLockAndActive]").removeAttr("disabled");
                        $("input[name=LockedDetail]").removeAttr("readonly").css("background-color","");
                        $("input[name=InactiveDetail]").removeAttr("readonly").css("background-color","");
                        for(var propertyName in data["Object"])
                        {
                            if(data["Object"][propertyName]!==null)
                            {
                                if(propertyName==="birthDate" || propertyName==="bonusDate" || propertyName==="created_at" ||propertyName==="updated_at")
                                {
                                    if(propertyName==="created_at" ||propertyName==="updated_at") {
                                        var date = new Date(data["Object"][propertyName].substring(0, 10));
                                        var dd = date.getDate();
                                        var mm = date.getMonth() + 1; //January is 0!

                                        var yyyy = date.getFullYear();
                                        if (dd < 10) {
                                            dd = '0' + dd;
                                        }
                                        if (mm < 10) {
                                            mm = '0' + mm;
                                        }
                                        $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(dd + '/' + mm + '/' + yyyy);
                                    }

                                    else
                                    {
                                        $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(employeeView.convertStringToDate(data["Object"][propertyName]));
                                    }
                                }
                                else
                                {
                                    $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(data["Object"][propertyName]);

                                }
                            }
                        }
                        var address = data["Object"]["address"].split(";");
                        $("input[name=Address]").val(address[0]);
                        $("input[name=Address1]").val(address[1]);
                        $("input[name=Address2]").val(address[2]);

                        $("input[name=UserID_Created]").val(data["nameCreated"]);
                        $("input[name=UserID_Changed]").val(data["nameUpdated"]);
                        $("input[name=Hourly]").val(data["rate"]);
                        if(data["Object"]["locked"]===1)
                        {
                            $("input[name=checkboxLockAndActive]:eq(0)").prop("checked",true);
                        }
                        else
                        {
                            $("input[name=checkboxLockAndActive]:eq(0)").prop("checked",false);
                        }

                        if(data["Object"]["inactive"]===1)
                        {
                            $("input[name=checkboxLockAndActive]:eq(1)").prop("checked",true);
                        }
                        else
                        {
                            $("input[name=checkboxLockAndActive]:eq(1)").prop("checked",false);
                        }

                        //reset object
                        employeeView.resetEmployeeObject();
                        for(var i = 0;i<Object.keys(employeeView.EmployeeObject).length;i++)
                        {
                            employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("#"+Object.keys(employeeView.EmployeeObject)[i]).val();
                        }
                        $("input[name=Hourly]").formatCurrency({roundToDecimalPlace:0});
                    });

                },
                viewEmployeeDetailWhenEnterKey:function(e)
                {
                    if (e.keyCode == 13) {
                        $.post(url+"viewDetailEmployeeWhenUseEvenEnter",{_token:_token,key:$("input[name=Name]").val()},function(data){
                            console.log(data);
                            if(data["Result"]===1){
                                //Reset form
                                $("input[name=ajaxActionType]").empty().val("0");
                                $("button[name=btnAction]").text("Save Update");
                                $("div[id=modalConfirm]").modal("hide");
                                //Binding data
                                $("select#Position").val(data["Data"]["positionId"]);
                                $("select#Sex").val(data["Data"]["sex"]);
                                $("input[name=checkboxLockAndActive]").removeAttr("disabled");
                                $("input[name=LockedDetail]").removeAttr("readonly").css("background-color","");
                                $("input[name=InactiveDetail]").removeAttr("readonly").css("background-color","");
                                for(var propertyName in data["Data"])
                                {
                                    if(employeeView.convertStringToDate(data["Data"][propertyName])==="NaN-aN-aN")
                                    {
                                        $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(data["Data"][propertyName]);
                                    }
                                    else if(employeeView.convertStringToDate(data["Data"][propertyName])==="1970-01-01")
                                    {
                                        $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(data["Data"][propertyName]);
                                    }
                                    else
                                    {
                                        $("input[name="+employeeView.firstToUpperCase(propertyName)+"]").val(employeeView.convertStringToDate(data["Data"][propertyName]));
                                    }
                                }
                                $("input[name=UserID_Created]").val(data["nameCreated"]);
                                var address = data["Data"]["address"].split(";");
                                $("input[name=Address]").val(address[0]);
                                $("input[name=Address1]").val(address[1]);
                                $("input[name=Address2]").val(address[2]);
                            }
                            else
                            {
                                $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Can't find this user !!!");
                                $("div[id=modalNotification]").modal("show");
                            }
                        });
                    }
                },
                ResetForm:function()
                {
//                    if($("input[name=ajaxActionType]").val()==="1")
//                    {
                        var allInput = $("input");
                        $("form[id=formEmployee]").find(allInput).val("");
                        $("form[id=formEmployee]").find("label[class=error]").hide();
                        $("button[name=btnAction]").text("Save New");
                        $("input[name=ajaxActionType]").val("1");
                        $("input[name=checkboxLockAndActive]").prop("checked",false).prop("disabled",true);
                        $("input[name=InactiveDetail]").prop("readOnly",true).css("background-color","#F3EDED");
                        $("input[name=LockedDetail]").prop("readOnly",true).css("background-color","#F3EDED");
                        $("input[name=Password]").css("background-color","").prop("readOnly",false);
                        $("input[name=PasswordConfirm]").css("background-color","").prop("readOnly",false);
                        $("input[name=Name]").prop("readOnly",false).css("background-color","");


                    //}
                }
            };
        }
        else
        {

        }
                    //ID
        var typingTimer; //timer identifier
        var doneTypingInterval = 2000;  //time in ms, 3 second for example
        var $inputName = $("input[name=Name]");

        //on keyup, start the countdown
        $inputName.on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(getSearchNameOfEmployee, doneTypingInterval);
        });
        //on keydown, clear the countdown
        $inputName.on('keydown', function () {
            clearTimeout(typingTimer);
        });

        //user is "finished typing," do something
        function getSearchNameOfEmployee () {
            $.ajax({
                method: "get",
                url: url + "getSearchNameOfEmployee",
                data:{
                    _token:_token,
                    Code:$inputName.val()
                },
                success: function(result) {
                    console.log(result);
                    if(result === "0"){
                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("This name has already exists!!!Let's choose other name");
                        $("div[id=modalNotification]").modal("show");
                        $inputName.val("");
                    }
                    else
                    {
                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("You can used this id!!!");
                        $("div[id=modalNotification]").modal("show");
                    }
                }
            });
        }

                //Email
        var typingTimer; //timer identifier
        var doneTypingInterval = 2200;  //time in ms, 3 second for example
        var $inputEmail = $("input[name=Email]");

        //on keyup, start the countdown
        $inputEmail.on('keyup', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(getSearchEmailOfEmployee, doneTypingInterval);
        });
        //on keydown, clear the countdown
        $inputEmail.on('keydown', function () {
            clearTimeout(typingTimer);
        });

        //user is "finished typing," do something
        function getSearchEmailOfEmployee () {
            $.ajax({
                method: "get",
                url: url + "getSearchEmailOfEmployee",
                data:{
                    _token:_token,
                    Code:$inputEmail.val()
                },
                success: function(result) {
                    if(result === "0"){
                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("This email has already exists!!!Let's choose other email");
                        $("div[id=modalNotification]").modal("show");
                        $inputEmail.val("");
                    }
                    else
                    {
                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("You can used this email!!!");
                        $("div[id=modalNotification]").modal("show");
                    }
                }
            });
        }


    })
</script>