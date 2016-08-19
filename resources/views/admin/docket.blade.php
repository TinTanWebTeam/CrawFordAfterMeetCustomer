{{--Model Modify--}}
<div class="modal fade" id="modal-category-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                     Modify Caterory
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="taskCategory_modify_id" id="taskCategory_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="taskCategory_modify_code" name="taskCategory_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="taskCategory_modify_name" id="taskCategory_modify_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Description</h5>
                            <textarea rows="3" type="text" class="form-control" name="taskCategory_modify_description" id="taskCategory_modify_description">

                            </textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" onclick="docketView.submitAddNewAndUpdateCategory()">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
{{--End Model Modify--}}

{{--Model list task time  --}}
<div class="modal fade" id="modal-time" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    List Time
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th data-name="description">
                                Description
                            </th>
                            <th data-name="modify">
                                Modify
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-time-table-body">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate" onclick="docketView.addNewOrUpdateCategory()">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>
{{--End Model list task time--}}

{{--Model list task expense  --}}
<div class="modal fade" id="modal-expense">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    List Expense
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th data-name="id">
                                Code
                            </th>
                            <th data-name="code">
                                Name
                            </th>
                            <th data-name="name">
                                Description
                            </th>
                            <th>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-expense-table-body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Model list task expense--}}

{{--Model Show Confirm  --}}
{{--<div class="modal fade" id="modal-confirm" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-body" id="modalContent" style="text-align: center">--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
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
                <h4></h4>
            </div>
        </div>
    </div>
</div>
{{--End Model Show Confirm--}}

<div class="row">
    <form action="" style="background-color: #fff;width: 100%">
        <div class="row" style="padding: 20px;">
            <div class="col-sm-4">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="display: inline-block" class="text-right">Claim Id:</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" id="Action" name="Action" value="1" style="display:none">
                        <input type="text" id="ClaimId" name="ClaimId" value="" style="display:none">
                        <input type="text" id="IdTask" name="IdTask" value="" style="display:none">
                        <input type="text" id="ClaimCode" name="ClaimCode" value="" style="display: inline-block" onkeypress="docketView.loadClaimByEventEnterKey(event)">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="display: inline-block" class="text-right">Employee Id:</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" id="UserId" name="UserId" value="" style="display: inline-block">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="display: inline-block" class="text-right">Choose Date:</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="date" id="ChooseDate" name="ChooseDate" value="" style="display: inline-block">
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Insured Name: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="InsuredName" name="InsuredName" value="" style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Loss Date: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="LossDate" name="LossDate" value="" style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Loss Location: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="LossLocation" name="LossLocation" value="" style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" style="background-color: #fff;width: 100%" id="formTask">
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
                                    <input type="text" id ="ProfessionalServices" name="ProfessionalServices" style="width: auto;display: none">
                                    <input type="text" id ="ProfessionalServicesCode" name="ProfessionalServicesCode" style="width: auto" ondblclick="docketView.loadListProfessionalService()">
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
                                    <input type="text" name="Expense" id="Expense" style="width: auto;display: none;">
                                    <input type="text" name="ExpenseCode" id="ExpenseCode" style="width: auto" ondblclick="docketView.loadListExpense()">
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
                                                <input type="text" name="ProfessionalServicesTime" id="ProfessionalServicesTime" value="0" style="width:80px" onkeyup="docketView.automaticInitialValueTimeOfInputUnit()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmount" id="ProfessionalServicesAmount" value="0" style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRate" id="ProfessionalServicesRate" value="0" style="width:80px" onkeyup="docketView.automaticInitialValueTimeOfInputRate()">
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
                                                <input type="text" name="ProfessionalServicesTimeBillValue" id="ProfessionalServicesTimeBillValue" value="0" style="width:80px" onkeyup="docketView.automaticBillableValueTimeOfInputUnit()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmountBillValue" id="ProfessionalServicesAmountBillValue" value="0" style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRateBillValue" id="ProfessionalServicesRateBillValue" value="0" style="width:80px" onkeyup="docketView.automaticBillableValueRateOfInputUnit()">
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
                                                <input type="text" name="ProfessionalServicesTimeOverrideValue" id="ProfessionalServicesTimeOverrideValue" value="0" style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmountOverrideValue" id="ProfessionalServicesAmountOverrideValue" value="0" style="width:80px;background-color:#E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRateOverrideValue" id="ProfessionalServicesRateOverrideValue" value="0" style="width:80px;background-color:#E6D8D8" readonly>
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
                                                <input type="text" name="ExpenseAmountBillValue" id="ExpenseAmountBillValue" value="0" style="width:80px">
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
                                                <input type="text" name="ExpenseAmountOverrideValue" id="ExpenseAmountOverrideValue" value="0" style="width:80px;background-color:#E6D8D8" readonly>
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
                <button type="button" class="btn btn-danger pull-right" style="margin-left: 20px" onclick="docketView.cancel()">Cancel</button>
                <button type="button" class="btn btn-success pull-right" onclick="docketView.assignmentTask()" name="actionAssignmentTask">Save</button>
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
            <th class="text-bold text-center">Date</th>
            <th class="text-bold text-center">Adjuster Code</th>
            <th class="text-bold text-center">Code</th>
            <th class="text-bold text-center">Unit</th>
            <th class="text-bold text-center">Note</th>
            <th class="text-bold text-center">Expense Code</th>
            <th class="text-bold text-center">Expense Amount</th>
            <th class="text-bold text-center">Expense Note</th>
        </tr>
        </thead>
        <tbody id="tbodyDocket">

        </tbody>
    </table>
    <br>
    <br>
</div>

<script>
    $(document).on('keypress',':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if (typeof(docketView) === "undefined") {
            docketView = {
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
                resetTaskObject: function () {
                    for (var propertyName in docketView.taskObject) {
                        if (docketView.taskObject.hasOwnProperty(propertyName)) {
                            docketView.taskObject.propertyName = null;
                        }
                    }
                },
                firstToUpperCase:function(str){
                    return str.substr(0, 1).toUpperCase() + str.substr(1);
                },
                loadClaimByEventEnterKey:function(e)
                {
                    if (e.keyCode === 13) {
                        $.post(url + "loadClaimByEventEnterKey", {
                            _token: _token,
                            key: $("input[name=ClaimCode]").val()
                        }, function (data) {
                            console.log(data);
                            if(data){
                                $("input[name=ClaimId]").val(data["Claim"]["id"]);
                                $("input[name=InsuredName]").val(data["Claim"]["insuredFirstName"]+" "+data["Claim"]["insuredLastName"]);
                                $("input[name=LossDate]").val(data["Claim"]["lossDate"]);
                                $("input[name=LossLocation]").val(data["Claim"]["lossLocation"]);
                                docketView.taskObject.ClaimId = data["Claim"]["id"];
                                //Insert to table docket
                                $.post(url+"loadViewDocketDetail",{_token:_token,idClaim:data["Claim"]["id"]},function(view){
                                    $("tbody[id=tbodyDocket]").empty().append(view);
                                });
                            }

                        });
                    }
                },
                viewDetailTask:function(element)
                {
                    $("input[name=ProfessionalServicesTime]").prop("readOnly",true).css("background-color","#E6D8D8");
                    $("input[name=ProfessionalServicesRate]").prop("readOnly",true).css("background-color","#E6D8D8");
                    $("input[name=ExpenseAmount]").prop("readOnly",true).css("background-color","#E6D8D8");

                    $("button[name=actionAssignmentTask]").text("Update");
                    $("input[name=Action]").val("0");
                    $.post(url+"viewDetailTask",{_token:_token,idDocket:$(element).attr("id")},function(data){
                        console.log(data);
                        for(var propertyName in data["Task"])
                        {
                            if(propertyName!=="userId")
                            {
                                $("#"+docketView.firstToUpperCase(propertyName)).val(data["Task"][propertyName]);
                            }
                        }
                        $("input[name=IdTask]").val(data["Task"]["id"]);
                        $("#UserId").val($(element).find("td:eq(2)").text());
                        $("#ExpenseCode").val(data["expenseCode"]);
                        $("#ProfessionalServicesCode").val(data["professionalCode"]);
                        $("#ExpenseCode").val(data["expenseCode"]);
                    });
                },
                automaticValue:function(A,B,C)
                {
                    $("input[name="+C+"]").empty().val(parseFloat($("input[name="+A+"]").val()) * parseFloat($("input[name="+B+"]").val()));
                },
                automaticInitialValueTimeOfInputUnit:function()
                {
                    docketView.automaticValue("ProfessionalServicesTime","ProfessionalServicesRate","ProfessionalServicesAmount");
                },
                automaticInitialValueTimeOfInputRate:function()
                {
                    docketView.automaticValue("ProfessionalServicesRate","ProfessionalServicesTime","ProfessionalServicesAmount");
                },
                automaticBillableValueTimeOfInputUnit:function()
                {
                    docketView.automaticValue("ProfessionalServicesTimeBillValue","ProfessionalServicesRateBillValue","ProfessionalServicesAmountBillValue");
                },
                automaticBillableValueRateOfInputUnit:function()
                {
                    docketView.automaticValue("ProfessionalServicesRateBillValue","ProfessionalServicesTimeBillValue","ProfessionalServicesAmountBillValue");
                },
                assignmentTask:function()
                {
                    if($("input[name=ClaimCode]").val()==="")
                    {
                        $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter claimId");
                        $("div[id=modal-confirm]").modal("show");
                    }
                    else
                    {
                        if($("input[name=ProfessionalServices]").val()==="")
                        {
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter ProfessionalServices");
                            $("div[id=modal-confirm]").modal("show");
                        }
                        else
                        {
                            docketView.resetTaskObject();
                            for(var i = 0;i<Object.keys(docketView.taskObject).length;i++)
                            {
                                docketView.taskObject[Object.keys(docketView.taskObject)[i]] = $("#"+Object.keys(docketView.taskObject)[i]).val();
                            }
                            console.log(docketView.taskObject);
                            $.post(url+"assignmentTask",{_token:_token,action:$("input[name=Action]").val(),idTask:$("input[name=IdTask]").val(),taskObject:docketView.taskObject,Date:$("input[name=ChooseDate]").val()},function(data){
                                console.log(data);
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                        $("div[id=modal-confirm]").find("div[id=modalContent]").text("Add New Success");
                                        $("div[id=modal-confirm]").modal("show");
                                        docketView.cancel();
                                        $.post(url+"loadViewDocketDetail",{_token:_token,idClaim:docketView.taskObject.ClaimId},function(view){
                                            $("tbody[id=tbodyDocket]").empty().append(view);
                                        });
                                    }
                                    else if(data["Result"]===2)
                                    {
                                        $("div[id=modal-confirm]").find("div[id=modalContent]").text("Add New No Success");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else{
                                        $("div[id=modal-confirm]").find("div[id=modalContent]").text("This user is not define");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                }
                                else{
                                    if(data["Result"]===1)
                                    {
                                        $("div[id=modal-confirm]").find("div[id=modalContent]").text("Update Success");
                                        $("div[id=modal-confirm]").modal("show");
                                        docketView.cancel();
                                    }
                                    else
                                    {
                                        $("div[id=modal-confirm]").find("div[id=modalContent]").text("Update No Success");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                }
                            });
                        }
                    }
                },
                cancel:function()
                {
                    $("button[name=actionAssignmentTask]").text("Add New");
                    $("input[name=Action]").val("1");
                    $("form[id=formTask]").find("input").val("");
                    $("form[id=formTask]").find("textarea").val("");

                    $("input[name=ProfessionalServicesTime]").prop("readOnly",false).css("background-color","");
                    $("input[name=ProfessionalServicesRate]").prop("readOnly",false).css("background-color","");
                    $("input[name=ExpenseAmount]").prop("readOnly",false).css("background-color","");
                },
                loadListProfessionalService:function()
                {
                    $.post(url+"loadListProfessionalServiceOrExpense",{_token:_token},function(view)
                    {
                        $("tbody[id=modal-time-table-body]").empty().append(view);

                    });
                    $("div[id=modal-time]").modal("show");

                },
                loadListExpense:function()
                {
                    $.post(url+"loadListProfessionalServiceOrExpense",{_token:_token},function(view)
                    {
                        $("tbody[id=modal-expense-table-body]").empty().append(view);
                    });
                    $("div[id=modal-expense]").modal("show");
                },
                chooseTaskProfessionalOrExpense:function(element)
                {
                   if($(element).parent("tbody").attr("id")==="modal-time-table-body")
                   {
                        //Choose only row of table time
                        $("input[name=ProfessionalServices]").val($(element).attr("id"));
                        $("input[name=ProfessionalServicesCode]").val($(element).find("td:eq(0)").html());
                        $("div[id=modal-time]").modal("hide");
                   }
                   else
                   {
                       //Choose only row of table expense
                       $("input[name=Expense]").val($(element).attr("id"));
                       $("input[name=ExpenseCode]").val($(element).find("td:eq(0)").html());
                       $("div[id=modal-expense]").modal("hide");
                   }

                },
                addNewOrUpdateCategory:function()
                {
                    //Reset form modify
                    $("input[name=taskCategory_modify_id]").val("");
                    $("input[name=taskCategory_modify_code]").val("");
                    $("input[name=taskCategory_modify_name]").val("");
                    $("textarea[name=taskCategory_modify_description]").val("");

                    $("div[id=modal-time]").modal("hide");
                    $("input[name=taskCategory_modify_id]").val("0");
                    $("div[id=modal-category-modify]").modal("show");
                },
                submitAddNewAndUpdateCategory:function()
                {
                    $.post(url+"submitAddNewAndUpdateCategory",
                    {_token:_token,
                     id:$("input[name=taskCategory_modify_id]").val(),
                     code:$("input[name=taskCategory_modify_code]").val(),
                     name:$("input[name=taskCategory_modify_name]").val(),
                     description:$("textarea[name=taskCategory_modify_description]").val()
                    },function(data){
                        if(data["Action"]==="AddNew")
                        {
                            if(data["Result"]===1)
                            {
                                $("div[id=modal-category-modify]").modal("hide");
                                docketView.loadListProfessionalService();
                            }
                        }
                        else{
                            if(data["Result"]===1)
                            {
                                $("div[id=modal-category-modify]").modal("hide");
                                docketView.loadListProfessionalService();
                            }
                        }
                    });
                },
                modifyTaskCategory:function(element)
                {
                    $("div[id=modal-time]").modal("hide")
                    $("input[name=taskCategory_modify_id]").val($(element).attr("data-id"));
                    $("input[name=taskCategory_modify_code]").val($("tbody[id=modal-time-table-body]").find("tr[id="+$(element).attr("data-id")+"]").find("td:eq(0)").text());
                    $("input[name=taskCategory_modify_name]").val($("tbody[id=modal-time-table-body]").find("tr[id="+$(element).attr("data-id")+"]").find("td:eq(1)").text());
                    $("textarea[name=taskCategory_modify_description]").val($("tbody[id=modal-time-table-body]").find("tr[id="+$(element).attr("data-id")+"]").find("td:eq(2)").text());
                    $("div[id=modal-category-modify]").modal("show");
                }








            }
        }
        else
        {

        }
    })
</script>