{{--Model list task time  --}}
<div class="modal fade" id="modalListTaskCaterogyTime" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List Task Category</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($listTask !=null)
                        @foreach($listTask as $item)
                            <tr id="{{$item->id}}" onclick="taskView.chooseTaskTimeWhenUseEventDoubleClick(this)" style="cursor: pointer">
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model list task time--}}

{{--Model list task expense  --}}
<div class="modal fade" id="modalListTaskCaterogyExpense" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List Task Category</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($listTask !=null)
                        @foreach($listTask as $item)
                            <tr id="{{$item->id}}" onclick="taskView.chooseTaskExpenseWhenUseEventDoubleClick(this)" style="cursor: pointer">
                                <td>{{$item->code}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->description}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model list task expense--}}

{{--Model Show Confirm  --}}
<div class="modal fade" id="modalConfirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">Add New Success</div>
        </div>
    </div>
</div>
{{--End Model Show Confirm--}}

<div class="row">
        <form action="" style="background-color: #fff;width: 100%" class="form-task">
            <div class="row" style="padding: 20px;">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="display: inline-block" class="text-right">Claim Id:</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="text"  name="ClaimId" id="ClaimId" value="" style="display: none">
                            <input type="text"  name="Action" id="Action" value="1" style="display: none">
                            <input type="text"  name="IdTask" id="IdTask" style="display: none">
                            <input type="text"  name="ClaimCode" id="ClaimCode" value="" style="display: inline-block" onkeypress="taskView.loadClaimByEventEnterKey(event)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="display: inline-block" class="text-right">Employee Id:</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="UserId" name="UserId" value="{{Auth::user()->id}}" style="display: none">
                            <input type="text" id="UserOther" name="UserOther"  style="display: none">
                            <input type="text" id="UserCode" name="UserCode" value="{{Auth::user()->name}}" style="display: inline-block;background-color: #AFA3A3" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Insured Name: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="insuredName" name="insuredName" value="" style="display: inline-block;width: 300px;background-color: #AFA3A3" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Loss Date: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="lossDate" name="lossDate" value="" style="display: inline-block;width: 300px;background-color: #AFA3A3" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Loss Location: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="lossLocation" name="lossLocation" value="" style="display: inline-block;width: 300px;background-color: #AFA3A3" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="" style="background-color: #fff;width: 100%" id="formTask" role="form">
            <div class="row">
                <div class="col-sm-6" >
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12" >
                            <fieldset>
                                <legend>Time:</legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Code:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="ProfessionalServices" id="ProfessionalServices" style="width: auto;display:none">
                                        <input type="text" name="ProfessionalServicesCode" id="ProfessionalServicesCode" style="width: auto" ondblclick="taskView.showModelListTaskTime()">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Sort Description:</h5>
                                    </div>
                                    <div class="col-sm-9">
			    			<textarea rows="4" cols="40" style="resize: none;" name="ProfessionalServicesNote" id="ProfessionalServicesNote">
			    			</textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12">
                            <fieldset>
                                <legend>Expense:</legend>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Code:</h5>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" name="Expense" id="Expense" style="width: auto;display: none">
                                        <input type="text" name="ExpenseCode" id="ExpenseCode" style="width: auto" ondblclick="taskView.showModelListTaskExpense()">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Sort Description:</h5>
                                    </div>
                                    <div class="col-sm-9">
		    			<textarea rows="4" cols="40" style="resize: none;" name="ExpenseNote" id="ExpenseNote">
		    			</textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="row" style="padding: 20px;">
                        <div class="col-sm-12">
                            <fieldset>
                                <legend>Details:</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">Initial Values:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Units</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesTime" id="ProfessionalServicesTime" value="0" style="width:80px" onkeyup="taskView.automaticInitialValueTimeOfInputUnit()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmount" id="ProfessionalServicesAmount" value="0" style="width:80px;background-color:#AFA3A3 " readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesRate" id="ProfessionalServicesRate" value="0" style="width:80px" onkeyup="taskView.automaticInitialValueTimeOfInputRate()">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">Billable values:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Units</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesTimeBillValue" id="ProfessionalServicesTimeBillValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmountBillValue" id="ProfessionalServicesAmountBillValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesRateBillValue" id="ProfessionalServicesRateBillValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">User Overide:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Units</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesTimeOverrideValue" id="ProfessionalServicesTimeOverrideValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmountOverrideValue" id="ProfessionalServicesAmountOverrideValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesRateOverrideValue" id="ProfessionalServicesRateOverrideValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row" style="margin-top:14px;padding: 20px;">
                        <div class="col-sm-12">
                            <fieldset>
                                <legend>Details:</legend>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">Initial Values:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ExpenseAmount" id="ExpenseAmount" value="0" style="width:80px">
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">Billable values:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ExpenseAmountBillValue" id="ExpenseAmountBillValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-sm-4">
                                        <fieldset>
                                            <legend style="font-size:15px">User Overide:</legend>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ExpenseAmountOverrideValue" id="ExpenseAmountOverrideValue" value="0" style="width:80px;background-color: #AFA3A3" readonly>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-12" style="padding-right: 40px">
                    <button  type="button" class="btn btn-sm btn-danger pull-right" onclick="taskView.cancel()">Cancel</button>
                    <button type="button" class="btn btn-sm btn-success pull-right" name="actionAttackTask" onclick="taskView.assignmentTask()" style="margin-right: 10px">Add New</button>
                </div>
            </div>
            <br>
        </form>
        <table style="background-color: #fff;width: 100%" class="table-claim-report-assist">
            <thead>
            <tr class="assist">
                <th colspan="10"><h4 class="text-center">Docket</h4></th>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <th class="text-bold text-center" style="display: none">IdUser</th>
                <th class="text-bold text-center">Date</th>
                <th class="text-bold text-center">Adjuster Name</th>
                <th class="text-bold text-center">Code</th>
                <th class="text-bold text-center">Time</th>
                <th class="text-bold text-center">Description</th>
                <th class="text-bold text-center">Expense Code</th>
                <th class="text-bold text-center">Expense Note</th>
                <th class="text-bold text-center">Invoice MajorNo</th>
                <th class="text-bold text-center">Invoice Date</th>
            </tr>
            </thead>
            <tbody id="tbodyDocket">

            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
 </div>


<script>
    $(document).on('keypress',':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if (typeof(taskView) === "undefined") {
            taskView = {
                taskObject: {
                    ClaimId:null,
                    UserId:null,

                    ProfessionalServices:null,
                    ProfessionalServicesNote:null,

                    ProfessionalServicesTime:null,
                    ProfessionalServicesRate:null,
                    ProfessionalServicesAmount:null,

                    ProfessionalServicesRateBillValue:null,
                    ProfessionalServicesTimeBillValue:null,
                    ProfessionalServicesAmountBillValue:null,

                    ProfessionalServicesTimeOverrideValue:null,
                    ProfessionalServicesRateOverrideValue:null,
                    ProfessionalServicesAmountOverrideValue:null,

                    Expense:null,
                    ExpenseNote:null,

                    ExpenseAmount:null,
                    ExpenseAmountBillValue:null,
                    ExpenseAmountOverrideValue:null

                },
                idUserOther:null,
                resetTaskObject: function () {
                    for (var propertyName in taskView.taskObject) {
                        if (taskView.taskObject.hasOwnProperty(propertyName)) {
                            taskView.taskObject.propertyName = null;
                        }
                    }
                },
                firstToUpperCase:function(str){
                    return str.substr(0, 1).toUpperCase() + str.substr(1);
                },
                loadClaimByEventEnterKey:function(e)
                {
                    if (e.keyCode === 13) {
                        $.post(url + "user/loadClaimByEventEnterKey", {
                            _token: _token,
                            key: $("input[name=ClaimCode]").val()
                        }, function (data) {
                            if(data){
                                $("input[name=ClaimId]").val(data["Claim"]["id"]);
                                $("input[name=insuredName]").val(data["Claim"]["insuredFirstName"]+" "+data["Claim"]["insuredLastName"]);
                                $("input[name=lossDate]").val(data["Claim"]["lossDate"]);
                                $("input[name=lossLocation]").val(data["Claim"]["lossLocation"]);
                                taskView.taskObject.ClaimId = data["Claim"]["id"];
                                //Insert to table docket
                                $.post(url+"user/loadViewDocketDetail",{_token:_token,idClaim:data["Claim"]["id"]},function(view){
                                    $("tbody[id=tbodyDocket]").empty().append(view);
                                });
                            }

                        });
                    }
                },
                viewDetailTask:function(element)
                {
                    taskView.idUserOther = $(element).find("td:eq(0)").text();
                    $("button[name=actionAttackTask]").text("Update");
                    $("input[name=Action]").val("0");
                    $.post(url+"user/viewDetailTask",{_token:_token,idDocket:$(element).attr("id")},function(data){
                        console.log(data);
                        for(var propertyName in data["Task"])
                        {
                            if(propertyName!=="userId")
                            {
                                $("#"+taskView.firstToUpperCase(propertyName)).val(data["Task"][propertyName]);
                            }
                        }
                        $("#IdTask").val($(element).attr("id"));
                        $("#ProfessionalServicesCode").val(data["professionalCode"]);
                        $("#ExpenseCode").val(data["expenseCode"]);
                        //User current can't fix information of user other
                        if($(element).find("td:eq(0)").text() !== $("input[name=UserId]").val())
                        {
                            $("button[name=actionAttackTask]").prop("disabled",true);
                        }
                        else
                        {
                            $("button[name=actionAttackTask]").prop("disabled",false);
                        }
                        //change User overide when billValue have value
                        if(parseFloat($("input[name=ProfessionalServicesAmountBillValue]").val()) !== 0)
                        {
                            $("input[name=ProfessionalServicesTime]").prop("readOnly",true).css("background-color","#AFA3A3");
                            $("input[name=ProfessionalServicesRate]").prop("readOnly",true).css("background-color","#AFA3A3");
                            $("input[name=ProfessionalServicesTimeOverrideValue]").prop("readOnly",false).css("background-color","");
                            $("input[name=ProfessionalServicesAmountOverrideValue]").prop("readOnly",false).css("background-color","");
                            $("input[name=ProfessionalServicesRateOverrideValue]").prop("readOnly",false).css("background-color","");
                        }
                        if(parseFloat($("input[name=ExpenseAmountBillValue]").val()) !== 0)
                        {
                            $("input[name=ExpenseAmount]").prop("readOnly",true).css("background-color","#AFA3A3");
                            $("input[name=ExpenseAmountOverrideValue]").prop("readOnly",false).css("background-color","");
                        }
                    });
                },
                automaticInitialValueTimeOfInputUnit:function()
                {
                    if($("input[name=ProfessionalServicesTime]").val()==="")
                    {
                        $("input[name=ProfessionalServicesAmount]").empty().val(parseFloat($("input[name=ProfessionalServicesRate]").val()));
                    }
                    else{
                        $("input[name=ProfessionalServicesAmount]").empty().val(parseFloat($("input[name=ProfessionalServicesRate]").val()) * parseFloat($("input[name=ProfessionalServicesTime]").val()));
                    }
                },
                automaticInitialValueTimeOfInputRate:function()
                {
                    if($("input[name=ProfessionalServicesTime]").val()==="")
                    {
                        $("input[name=ProfessionalServicesAmount]").empty().val(parseFloat($("input[name=ProfessionalServicesRate]").val()));
                    }
                    else{
                        $("input[name=ProfessionalServicesAmount]").empty().val(parseFloat($("input[name=ProfessionalServicesRate]").val()) * parseFloat($("input[name=ProfessionalServicesTime]").val()));
                    }
                },
                assignmentTask:function()
                {
                    console.log();
                    if($("input[name=ClaimCode]").val()==="")
                    {
                        alert("You must enter claimId");
                    }
                    else
                    {
                        if($("input[name=ProfessionalServices]").val()==="")
                        {
                            alert("You must enter ProfessionalServices");
                        }
                        else
                        {
                            taskView.resetTaskObject();
                            for(var i = 0;i<Object.keys(taskView.taskObject).length;i++)
                            {
                                taskView.taskObject[Object.keys(taskView.taskObject)[i]] = $("#"+Object.keys(taskView.taskObject)[i]).val();
                            }
                            console.log(taskView.taskObject);
                            $.post(url+"user/assignmentTask",{_token:_token,action:$("input[name=Action]").val(),idTask:$("input[name=IdTask]").val(),idUserOther:taskView.idUserOther,taskObject:taskView.taskObject},function(data){
                                console.log(data);
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                        $("div[id=modalConfirm]").find("div[id=modalContent]").text("Add New Success");
                                        $("div[id=modalConfirm]").modal("show");
                                        $.post(url+"user/loadViewDocketDetail",{_token:_token,idClaim:taskView.taskObject.ClaimId},function(view){
                                            $("tbody[id=tbodyDocket]").empty().append(view);
                                        });
                                    }
                                    else if(data["Result"]===0)
                                    {
                                        $("div[id=modalConfirm]").find("div[id=modalContent]").text("Add New No Success");
                                        $("div[id=modalConfirm]").modal("show");
                                    }
                                    else{
                                        $("div[id=modalConfirm]").find("div[id=modalContent]").text("Add New No Success");
                                        $("div[id=modalConfirm]").modal("show");
                                    }
                                }
                                else{
                                    if(data["Result"]===1)
                                    {
                                        $("div[id=modalConfirm]").find("div[id=modalContent]").text("Update Success");
                                        $("div[id=modalConfirm]").modal("show");
                                    }
                                    else
                                    {
                                        $("div[id=modalConfirm]").find("div[id=modalContent]").text("Update No Success");
                                        $("div[id=modalConfirm]").modal("show");
                                    }
                                }
                            });
                        }
                    }
                },
                cancel:function()
                {
                    $("button[name=actionAttackTask]").text("Add New");
                    $("input[name=Action]").val("1");
                    $("form[id=formTask]").find("input").val("");
                    $("form[id=formTask]").find("textarea").val("");
                },
                showModelListTaskTime:function()
                {
                    $("div[id=modalListTaskCaterogyTime]").modal("show");
                },
                chooseTaskTimeWhenUseEventDoubleClick:function(element)
                {
                    $("input[name=ProfessionalServices]").val($(element).attr("id"));
                    $("input[name=ProfessionalServicesCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modalListTaskCaterogyTime]").modal("hide");
                },
                showModelListTaskExpense:function()
                {
                    $("div[id=modalListTaskCaterogyExpense]").modal("show");
                },
                chooseTaskExpenseWhenUseEventDoubleClick:function(element)
                {
                    $("input[name=Expense]").val($(element).attr("id"));
                    $("input[name=ExpenseCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modalListTaskCaterogyExpense]").modal("hide");
                }








                }
        }
        else
        {

        }
    })
</script>
