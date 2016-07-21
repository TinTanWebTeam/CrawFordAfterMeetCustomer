<div class="row">
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
                            <input type="text" name="ajaxAddNewAndSaveUpdateId" style="width: 100%;display: none"
                                   id="ajaxAddNewAndSaveUpdateCodeId">
                            <input type="text" name="Name" style="width: 100%"
                                    id="Name">
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
                            <h5 style="text-align: right">PasswordConfirm :</h5>
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
                                <input type="text" name="Flat" id="Flat">
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
                                <input type="text" name="Blended" id="Blended">
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
                                <input type="text" name="Created_at" id="Created_at" readonly style="background-color: #BF9B9B">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="ajaxAddNewAndSaveUpdateDateUserIDCreated" id="ajaxAddNewAndSaveUpdateDateUserIDCreated" readonly="readonly" style="background-color: #BF9B9B">
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
                                <input type="text" name="updated_at" id="updated_at" readonly style="background-color: #BF9B9B">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID :</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="ajaxAddNewAndSaveUpdateDateUserIDLastChanged" id="ajaxAddNewAndSaveUpdateDateUserIDLastChanged" readonly="readonly" style="background-color: #BF9B9B">
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
                        <div class="row">
                            <div class="col-sm-5">
                                <h5 style="text-align: right">Windows Users ID :</h5>
                            </div>
                            <div class="col-sm-7">
                                <input type="text" name="ajaxAddNewAndSaveUpdateDateWindowsUsersID" id="ajaxAddNewAndSaveUpdateDateWindowsUsersID">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Locked :</h5>
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" class="radio" name="checkboxLockAndActive" value="Locked">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="LockedDetail" id="LockedDetail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Inactive :</h5>
                            </div>
                            <div class="col-sm-2">
                                <input type="radio" class="radio" name="checkboxLockAndActive" value="Inactive">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="InactiveDetail" id="InactiveDetail">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Default Profile :</h5>
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" class="checkbox" name="DefaultProfile" value="defaultProfile">
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row" style="margin-left: 225px">
                <button type="button" class="btn btn-default" name="btnAction" onclick="employeeView.ActionAddNewOrUpdate()">
                    Save
                </button>
                <button type="button" class=" btn btn-default">
                    Cancel
                </button>
            </div>
        </div>

    </form>
</div>

<script>
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
                    Locked:null,
                    LockedDetail:null,
                    Inactive:null,
                    InactiveDetail:null,
                    DefaultProfile:null,
                    Created_at:null,
                    Updated_at:null,
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
                    if ($("input[name=ajaxActionType]").val() === "1") {
                        $("form[id=formEmployee]").validate({
                            rules: {
                                Name: "required",
                                Password: "required",
                                FirstName: "required",
                                LastName: "required",
                                PasswordConfirm: {
                                    required: true,
                                    equalTo: "#Password"
                                }
                            },
                            messages: {
                                Name: "ID is required",
                                Password: "Password is required",
                                FirstName: "First Name is required",
                                LastName: "Last Name is required",
                                PasswordConfirm: {
                                    required: "Password Confirm is required",
                                    equalTo: "Password Confirm is not them same password"
                                }
                            }
                        });
                    }
                    else
                    {
                        $("form[id=formEmployee]").validate({
                            rules: {
                                ajaxAddNewAndSaveUpdateName: "required",
                                ajaxAddNewAndSaveUpdateFirstName: "required",
                                ajaxAddNewAndSaveUpdateLastName: "required"
                            },
                            messages: {
                                ajaxAddNewAndSaveUpdateName: "Code is required",
                                ajaxAddNewAndSaveUpdateFirstName: "First Name is required",
                                ajaxAddNewAndSaveUpdateLastName: "Last Name is required"
                            }
                        });
                    }
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
                            else if(Object.keys(employeeView.EmployeeObject)[i]==="Locked")
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("input[name=checkboxLockAndActive]:checked").val();
                            }
                            else if(Object.keys(employeeView.EmployeeObject)[i]==="Inactive")
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("input[name=checkboxLockAndActive]:checked").val();
                            }
                            else if(Object.keys(employeeView.EmployeeObject)[i]==="DefaultProfile")
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("input[name=DefaultProfile]:checked").val();
                            }
                            else
                            {
                                employeeView.EmployeeObject[Object.keys(employeeView.EmployeeObject)[i]] = $("#"+Object.keys(employeeView.EmployeeObject)[i]).val();
                            }
                        }
                        console.log(employeeView.EmployeeObject);
                        $.post(url+"admin/addNewAndUpdateEmployee",{_token:_token});
                    }

                }
            };
        }
        else
        {

        }
    })
</script>