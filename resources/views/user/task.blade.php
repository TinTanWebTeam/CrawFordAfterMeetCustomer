{{--Model list task time  --}}
<div class="modal fade" id="modalListTaskCaterogyTime" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List Time Code</div>
            <div class="table-responsive">
                <table class="table" id="tableListTime">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTableListTime">
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
            <div class="modal-body" id="modalContent" style="text-align: center">List Expense Code</div>
            <div class="table-responsive">
                <select class="form-control" style="width: 50%" id="selectTypeExpense" onchange="taskView.onChangeWhenChooseExpenseType(this)">
                    <option value="GeneralExp">General Expenses</option>
                    <option value="CommPhotoExp">Comm && Photo Expenses</option>
                    <option value="ConsultFeesExp">Consultants Fees && Expenses</option>
                    <option value="TravelRelatedExp">Travel Related Expenses</option>
                    <option value="Disbursements">Disbursements</option>
                    <option value="GSTfreeDisb">GSTfreeDisb</option>
                </select>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyListExpense">

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
        <form action="" style="background-color: #fff;width: 100%" id="form-claim">
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
                            <input type="text" id="UserCode" name="UserCode" value="{{Auth::user()->name}}" style="display: inline-block;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="display: inline-block" class="text-right">From date: </h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="fromDate" name="fromDate" value="" style="display: inline-block;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h5 style="display: inline-block" class="text-right">Choose Date:</h5>
                        </div>
                        <div class="col-sm-8">
                            <input type="date"  name="ChooseDate" id="ChooseDate" value="{{date('Y-m-d')}}" style="display: inline-block">
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Insured Name: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="insuredName" name="insuredName" value="" style="display: inline-block;width: 600px;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Loss Date: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="lossDate" name="lossDate" value="" style="display: inline-block;width: 600px;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Loss Location: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="lossLocation" name="lossLocation" value="" style="display: inline-block;width: 600px;background-color: #E2D8D8" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <h5 style="display: inline-block" class="text-right">Open date: </h5>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" id="openDate" name="openDate" value="" style="display: inline-block;width: 600px;background-color: #E2D8D8" readonly>
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
                                        <input type="text" name="ProfessionalServicesCode" id="ProfessionalServicesCode" style="width: auto" readonly onfocus="taskView.showModelListTaskTime()">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Sort Description:</h5>
                                    </div>
                                    <div class="col-sm-9">
			    			<textarea rows="4" cols="40" style="resize: none;" name="ProfessionalServicesNote" id="ProfessionalServicesNote"></textarea>
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
                                        <input type="text" name="ExpenseCode" id="ExpenseCode" style="width: auto" readonly onfocus="taskView.showModelListTaskExpense()">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5 style="text-align:right">Sort Description:</h5>
                                    </div>
                                    <div class="col-sm-9">
		    			<textarea rows="4" cols="40" style="resize: none;" name="ExpenseNote" id="ExpenseNote"></textarea>
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
                                                    <input type="text" name="ProfessionalServicesTime" id="ProfessionalServicesTime"  style="width:80px" onkeyup="taskView.automaticInitialValueTimeOfInputUnit()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmount" id="ProfessionalServicesAmount"  style="width:80px;background-color:#E2D8D8 " readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                @if($rateDefault!=null)
                                                    <div class="col-sm-8">
                                                        <input type="text" name="ProfessionalServicesRate" id="ProfessionalServicesRate" value="{{$rateDefault}}" readonly style="width:80px;background-color:#E2D8D8" onkeyup="taskView.automaticInitialValueTimeOfInputRate()">
                                                    </div>
                                                @endif
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
                                                    <input type="text" name="ProfessionalServicesTimeBillValue" id="ProfessionalServicesTimeBillValue"  style="width:80px;background-color: #E2D8D8" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmountBillValue" id="ProfessionalServicesAmountBillValue" style="width:80px;background-color: #E2D8D8" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesRateBillValue" id="ProfessionalServicesRateBillValue"  style="width:80px;background-color: #E2D8D8" readonly>
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
                                                    <input type="text" name="ProfessionalServicesTimeOverrideValue" id="ProfessionalServicesTimeOverrideValue"  style="width:80px;background-color: #E2D8D8" readonly onkeyup="taskView.automaticUserOverideTimeOfInputTime()">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Amount</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesAmountOverrideValue" id="ProfessionalServicesAmountOverrideValue"  style="width:80px;background-color: #E2D8D8" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h5 style="text-align:right">Rate/Unit</h5>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" name="ProfessionalServicesRateOverrideValue" id="ProfessionalServicesRateOverrideValue"  style="width:80px;background-color: #E2D8D8" readonly onkeyup="taskView.automaticUserOverideRateOfInputRate()">
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
                                                    <input type="text" name="ExpenseAmount" id="ExpenseAmount"  style="width:80px">
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
                                                    <input type="text" name="ExpenseAmountBillValue" id="ExpenseAmountBillValue"  style="width:80px;background-color: #E2D8D8" readonly>
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
                                                    <input type="text" name="ExpenseAmountOverrideValue" id="ExpenseAmountOverrideValue" style="width:80px;background-color: #E2D8D8" readonly>
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
                <th class="text-bold text-center">Expense Amount</th>
                <th class="text-bold text-center">Expense Note</th>
                <th class="text-bold text-center">InvoiceMajorNo</th>
                <th class="text-bold text-center">InvoiceDate</th>
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
                    ExpenseAmountOverrideValue:null,


                },
                RateDefault:$("input[name=ProfessionalServicesRate]").val(),
                checkDate:null,
                resetTaskObject: function () {
                    for (var propertyName in taskView.taskObject) {
                        if (taskView.taskObject.hasOwnProperty(propertyName)) {
                            taskView.taskObject.propertyName = null;
                        }
                    }
                },
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" + currentDate.getDate()).slice(-2)+"-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)+"-"
                            + currentDate.getFullYear();
                    return datetime;
                },
                formatYMD: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" + currentDate.getFullYear() +"-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)+"-"
                            + currentDate.getDate()).slice(-2);
                    return datetime;
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
                            console.log(data);
                            if(data["Claim"]==="null")
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("This claim not exist!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else
                            {
                                taskView.checkDate = data["Date"];
                                var openDateFR = data["Claim"]["openDate"].split(" ");
                                var fromDateFR = data["Date"].split(" ");
                                $("input[name=openDate]").val(taskView.convertStringToDate(openDateFR[0])+" "+openDateFR[1]);
                                $("input[name=fromDate]").val(taskView.convertStringToDate(fromDateFR[0])+" "+fromDateFR[1]);
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
                    $("button[name=actionAttackTask]").text("Update");
                    $("input[name=Action]").val("0");
                    $.post(url+"user/viewDetailTask",{_token:_token,idDocket:$(element).attr("id")},function(data){
                        var a = data["Task"]["billDate"].split(" ");
                        var b = a[0].split("-");
                        $("input[name=ChooseDate]").val(b[0]+"-"+b[1]+"-"+b[2]);
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
                        if(data["ErrorUser"]==="True")
                        {
                            $("button[name=actionAttackTask]").hide();
                        }
                        else
                        {
                            $("button[name=actionAttackTask]").show();
                            //check invoice
                            if(data["Task"]["invoiceMajorNo"]!==null)
                            {
                                $("input[name=ProfessionalServicesTime]").prop("readOnly",true).css("background-color","#E2D8D8");
                                $("input[name=ExpenseAmount]").prop("readOnly",true).css("background-color","#E2D8D8");
                                $("button[name=actionAttackTask]").prop("disabled",true);
                            }
                            else
                            {
                                $("input[name=ProfessionalServicesTime]").prop("readOnly",false).css("background-color","");
                                $("input[name=ExpenseAmount]").prop("readOnly",false).css("background-color","");
                                $("button[name=actionAttackTask]").prop("disabled",false);
                            }

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
                automaticUserOverideTimeOfInputTime:function()
                {
                    if($("input[name=ProfessionalServicesTimeOverrideValue]").val()==="")
                    {
                        $("input[name=ProfessionalServicesAmountOverrideValue]").empty().val(parseFloat($("input[name=ProfessionalServicesRateOverrideValue]").val()));
                    }
                    else{
                        $("input[name=ProfessionalServicesAmountOverrideValue]").empty().val(parseFloat($("input[name=ProfessionalServicesRateOverrideValue]").val()) * parseFloat($("input[name=ProfessionalServicesTimeOverrideValue]").val()));
                    }
                },
                automaticUserOverideRateOfInputRate:function()
                {
                    if($("input[name=ProfessionalServicesTimeOverrideValue]").val()==="")
                    {
                        $("input[name=ProfessionalServicesAmountOverrideValue]").empty().val(parseFloat($("input[name=ProfessionalServicesRateOverrideValue]").val()));
                    }
                    else{
                        $("input[name=ProfessionalServicesAmountOverrideValue]").empty().val(parseFloat($("input[name=ProfessionalServicesRateOverrideValue]").val()) * parseFloat($("input[name=ProfessionalServicesTimeOverrideValue]").val()));
                    }
                },
                submitAssignmentTask:function()
                {
                    taskView.resetTaskObject();
                    for(var i = 0;i<Object.keys(taskView.taskObject).length;i++)
                    {
                        taskView.taskObject[Object.keys(taskView.taskObject)[i]] = $("#"+Object.keys(taskView.taskObject)[i]).val();
                    }
                    $.post(url+"user/assignmentTask",{_token:_token,action:$("input[name=Action]").val(),idTask:$("input[name=IdTask]").val(),taskObject:taskView.taskObject,fromDate:$("input[name=fromDate]").val(),toDate:$("input[name=ChooseDate]").val()},function(data){
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
                                taskView.cancel();
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
                        else if(data["Action"]==="Update")
                        {
                            if(data["Result"]===1)
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("Update Success");
                                $("div[id=modalConfirm]").modal("show");
                                $.post(url+"user/loadViewDocketDetail",{_token:_token,idClaim:taskView.taskObject.ClaimId},function(view){
                                    $("tbody[id=tbodyDocket]").empty().append(view);
                                });
                                taskView.cancel();
                            }
                            else if(data["Result"]===0)
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("Can't update task of user other");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else if(data["Result"]===2)
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("This task has already bill, please choose task other");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("This task has already bill, please choose task other");
                                $("div[id=modalConfirm]").modal("show");
                            }

                        }
                        else if(data["Action"]==="ErrorDate")
                        {
                            $("div[id=modalConfirm]").find("div[id=modalContent]").text("Choose date is not smaller than from date!!!");
                            $("div[id=modalConfirm]").modal("show");
                        }
                        else if(data["Action"]==="ErrorCloseClaim")
                        {
                            $("div[id=modalConfirm]").find("div[id=modalContent]").text("This claim has closed, can't assignment task");
                            $("div[id=modalConfirm]").modal("show");
                        }
                        else{
                            $("div[id=modalConfirm]").find("div[id=modalContent]").text("Choose date is not lager than current date!!!");
                            $("div[id=modalConfirm]").modal("show");
                        }

                    });
                },
                assignmentTask:function()
                {
                    if($("input[name=ClaimCode]").val()==="")
                    {
                        alert("You must enter claimId");
                    }
                    else
                    {
                        $("form[id=form-claim]").validate({
                                rules: {
                                    insuredName: "required"

                                },
                                messages: {
                                    insuredName: "ID is required"
                                }
                            });
                        if($("form[id=form-claim]").valid()){
                            //validator time expesn
                            if($("input[name=ProfessionalServicesCode]").val() !=="")
                            {
                                if($("input[name=ProfessionalServicesTime]").val() ==="")
                                {
                                    $("div[id=modalConfirm]").find("div[id=modalContent]").text("You must enter units of time");
                                    $("div[id=modalConfirm]").modal("show");
                                }
                                else
                                {
                                    if($("input[name=ExpenseCode]").val() !=="")
                                    {
                                        if($("input[name=ExpenseAmount]").val() ==="")
                                        {
                                            $("div[id=modalConfirm]").find("div[id=modalContent]").text("You must enter amount of expense code");
                                            $("div[id=modalConfirm]").modal("show");
                                        }
                                        else
                                        {
                                            taskView.submitAssignmentTask();
                                        }
                                    }
                                    else
                                    {
                                        taskView.submitAssignmentTask();
                                    }

                                }
                            }
                            else if($("input[name=ExpenseCode]").val() !=="")
                            {
                                if($("input[name=ExpenseAmount]").val() ==="")
                                {
                                    $("div[id=modalConfirm]").find("div[id=modalContent]").text("You must enter amount of expense code");
                                    $("div[id=modalConfirm]").modal("show");
                                }
                                else
                                {

                                    if($("input[name=ProfessionalServicesCode]").val() !=="")
                                    {
                                        if($("input[name=ProfessionalServicesTime]").val() ==="")
                                        {
                                            $("div[id=modalConfirm]").find("div[id=modalContent]").text("You must enter time of time code");
                                            $("div[id=modalConfirm]").modal("show");
                                        }
                                        else
                                        {
                                            taskView.submitAssignmentTask();
                                        }
                                    }
                                    else
                                    {
                                        taskView.submitAssignmentTask();
                                    }
                                }
                            }
                            else
                            {
                                $("div[id=modalConfirm]").find("div[id=modalContent]").text("You must enter Time code or expense");
                                $("div[id=modalConfirm]").modal("show");
                            }

                        }
                    }
                },
                cancel:function()
                {
                    $("#IdTask").val("");
                    $("input[id=ChooseDate]").val("");
                    //Time
                    $("input[id=ProfessionalServices]").val("");
                    $("input[id=ProfessionalServicesCode]").val("");
                    $("textarea[id=ProfessionalServicesNote]").val("");
                    //Expense
                    $("input[id=Expense]").val("");
                    $("input[id=ExpenseCode]").val("");
                    $("textarea[id=ExpenseNote]").val("");
                    //Button
                    $("button[name=actionAttackTask]").text("Add New").prop("disabled",false);
                    $("input[name=Action]").val("1");

                    //Value ProfessionalServices
                    $("input[name=ProfessionalServicesTime]").prop("readOnly",false).val("").css("background-color","");
                    $("input[name=ProfessionalServicesAmount]").val("");

                    $("input[name=ProfessionalServicesTimeBillValue]").val("");
                    $("input[name=ProfessionalServicesAmountBillValue]").val("");
                    $("input[name=ProfessionalServicesRateBillValue]").val("");

                    //Expense
                    $("input[name=ExpenseAmount]").prop("readOnly",false).val("").css("background-color","");

                },
                showModelListTaskTime:function()
                {
                    $("div[id=modalListTaskCaterogyTime]").modal("show");
                    $("table[id=tableListTime]").DataTable();
                },
                chooseTaskTimeWhenUseEventDoubleClick:function(element)
                {
                    $("input[name=ProfessionalServices]").val($(element).attr("id"));
                    $("input[name=ProfessionalServicesCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modalListTaskCaterogyTime]").modal("hide");
                },
                showModelListTaskExpense:function()
                {
                    taskView.loadExpenseCodeByType($("select#selectTypeExpense option:eq(0)").val());
                    $("div[id=modalListTaskCaterogyExpense]").modal("show");
                },
                chooseTaskExpenseWhenUseEventDoubleClick:function(element)
                {
                    $("input[name=Expense]").val($(element).attr("id"));
                    $("input[name=ExpenseCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modalListTaskCaterogyExpense]").modal("hide");
                },
                loadExpenseCodeByType:function(type)
                {
                    $.post(url+"user/loadExpenseCodeByType",{_token:_token,typeExpense:type},function(data){
                        $("tbody[id=tbodyListExpense]").empty().append(data);
                    });
                },
                onChangeWhenChooseExpenseType:function(element)
                {
                    taskView.loadExpenseCodeByType($(element).find("option:selected").val());
                }







                }
        }
        else
        {

        }
    })
</script>
