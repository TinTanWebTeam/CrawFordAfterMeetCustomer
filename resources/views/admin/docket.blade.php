{{--Model Modifys--}}
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
                        <input type="text" name="taskCategory_modify_id" id="taskCategory_modify_id" value="0"
                               style="display: none">

                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="taskCategory_modify_code"
                                   name="taskCategory_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="taskCategory_modify_name"
                                   id="taskCategory_modify_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Description</h5>
                            <textarea rows="3" type="text" class="form-control" name="taskCategory_modify_description"
                                      id="taskCategory_modify_description">

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
                    <table class="table table-hover" id="tableListTime">
                        <thead>
                        <tr>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="description">
                                Description
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-time-table-body">

                        </tbody>
                    </table>
                </div>
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
                <select class="form-control" style="width: 50%" id="selectTypeExpense" onchange="docketView.onChangeWhenChooseExpenseType(this)">
                    <option value="GeneralExp">General Expenses</option>
                    <option value="CommPhotoExp">Comm && Photo Expenses</option>
                    <option value="ConsultFeesExp">Consultants Fees && Expenses</option>
                    <option value="TravelRelatedExp">Travel Related Expenses</option>
                    <option value="Disbursements">Disbursements</option>
                    <option value="GSTfreeDisb">GSTfreeDisb</option>
                </select>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th data-name="id">
                                Code
                            </th>
                            <th data-name="name">
                                Description
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
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Rate</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($listUser !=null)
                        @foreach($listUser as $item)
                            <tr id="{{$item->id}}" onclick="docketView.chooseUserWhenAssignmentTask(this)" style="cursor: pointer">
                                <td>{{$item->name}}</td>
                                <td>{{$item->firstName}}</td>
                                <td>{{$item->lastName}}</td>
                                <td>{{$item->sex}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->rate}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model Model List Employee--}}

{{--Model Delete--}}
<div aria-hidden="true" class="modal fade" id="modalDelete" role="basic" style="display: none;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                </button>
                <h4 class="modal-title">
                    Delete Task
                </h4>
            </div>
            <div class="modal-body" id="modalContent">
                Are you sure delete this task  ?
            </div>
            <div class="modal-footer">
                <button class="btn dark btn-outline" data-dismiss="modal" name="modalClose" type="button">
                    Close
                </button>
                <button class="btn green" name="Agree" type="button" onclick="docketView.confirmDelete()">
                    Delete
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Model Delete--}}

{{--Model Claim--}}
<div class="modal fade" id="modal-claim">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Claim List
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="claim-table">
                        <thead>
                        <tr>
                            <th>
                                Code
                            </th>
                            <th>
                                Insured Name
                            </th>
                            <th>
                                Insurer Code
                            </th>
                            <th>
                                Receive Date
                            </th>
                            <th>
                                Open Date
                            </th>
                            <th>
                                Adjuster
                            </th>
                            <th class="text-center">
                                Choose
                            </th>
                        </tr>
                        </thead>
                        <tbody id="claim-talbe-body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Model Claim--}}

<div class="row">
    <form id="formClaim" style="background-color: #fff;width: 100%">
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
                        <input type="text" id="ClaimCode" name="ClaimCode" value="" style="display: inline-block"
                               onkeypress="docketView.loadClaimByEventEnterKey(event)"
                               ondblclick="docketView.loadClaimByEventDoubleClick()">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="display: inline-block" class="text-right">Employee Id:</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" id="UserId" name="UserId" value="" style="display: inline-block" ondblclick="docketView.showUserWhenAssignmentTask()">
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
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="display: inline-block" class="text-right">Status:</h5>
                    </div>
                    <div class="col-sm-8">
                        <label id="statusClaim" style="padding-top: 7px"></label>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Insured Name: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="InsuredName" name="InsuredName" value=""
                               style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Loss Date: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="LossDate" name="LossDate" value=""
                               style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">Loss Location: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="LossLocation" name="LossLocation" value=""
                               style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="display: inline-block" class="text-right">From date: </h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" id="fromDate" name="fromDate" value=""
                               style="display: inline-block;background-color: #E6D8D8" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="display: inline-block" class="text-right">Code: </h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="codeTotal" name="codeTotal" value="" style="display: inline-block;background-color: #E6D8D8" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="display: inline-block" class="text-right">Expense: </h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" id="expenseTotal" name="expenseTotal" value="" style="display: inline-block;background-color: #E6D8D8" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" style="background-color: #fff;width: 100%" id="formTask">
        <div class="row">
            <div class="col-sm-6">
                <div class="row" style="padding: 20px;">
                    <div class="col-sm-12">
                        <fieldset>
                            <legend>Time:</legend>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 style="text-align:right">Code:</h5>
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" id="ProfessionalServices" name="ProfessionalServices"
                                           style="width: auto;display: none">
                                    <input type="text" id="ProfessionalServicesCode" name="ProfessionalServicesCode"
                                           style="width: auto;text-transform: uppercase"  ondblclick="docketView.loadListProfessionalService()" data-id="">
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
                                    <input type="text" name="Expense" id="Expense" style="width: auto;display: none;" data-id="">
                                    <input type="text"  name="ExpenseCode" id="ExpenseCode" style="width: auto;text-transform: uppercase"
                                           ondblclick="docketView.loadListExpense()">
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
                                                <input type="text" name="ProfessionalServicesTime"
                                                       id="ProfessionalServicesTime" style="width:80px"
                                                       onkeyup="docketView.automaticInitialValueTimeOfInputUnit()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmount"
                                                       id="ProfessionalServicesAmount"
                                                       style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRate"
                                                       id="ProfessionalServicesRate" readonly style="width:80px;background-color:#E6D8D8 "
                                                       onkeyup="docketView.automaticInitialValueTimeOfInputRate()">
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
                                                <input type="text" name="ProfessionalServicesTimeBillValue"
                                                       id="ProfessionalServicesTimeBillValue" readonly
                                                       style="width:80px;background-color: #E6D8D8"
                                                       onkeyup="docketView.automaticBillableValueTimeOfInputUnit()">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmountBillValue"
                                                       id="ProfessionalServicesAmountBillValue"
                                                       style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRateBillValue"
                                                       id="ProfessionalServicesRateBillValue" readonly
                                                       style="width:80px;background-color: #E6D8D8"
                                                       onkeyup="docketView.automaticBillableValueRateOfInputUnit()">
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
                                                <input type="text" name="ProfessionalServicesTimeOverrideValue"
                                                       id="ProfessionalServicesTimeOverrideValue"
                                                       style="width:80px;background-color: #E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Amount</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesAmountOverrideValue"
                                                       id="ProfessionalServicesAmountOverrideValue"
                                                       style="width:80px;background-color:#E6D8D8" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h5 style="text-align:right">Rate/Unit</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="ProfessionalServicesRateOverrideValue"
                                                       id="ProfessionalServicesRateOverrideValue"
                                                       style="width:80px;background-color:#E6D8D8" readonly>
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
                                                <input type="text" name="ExpenseAmount" id="ExpenseAmount"
                                                       style="width:80px" onblur="docketView.formatCurrencyExpense()">
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
                                                <input type="text" name="ExpenseAmountBillValue"
                                                       id="ExpenseAmountBillValue" readonly style="width:80px;background-color:#E6D8D8">
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
                                                <input type="text" name="ExpenseAmountOverrideValue"
                                                       id="ExpenseAmountOverrideValue"
                                                       style="width:80px;background-color:#E6D8D8" readonly>
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
            <div class="col-sm-6">
                <h5 style="font-weight: 600">Sort By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning" onclick="docketView.sortDocketTableByDate()">Date</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-warning" type="button" onclick="docketView.sortDocketTableByAdjuster()">Adjuster</button></h5>
            </div>
            <div class="col-sm-6" style="padding-right: 40px">
                <button type="button" class="btn btn-danger pull-right" style="margin-left: 20px"
                        onclick="docketView.ActionCancelOfButton()">Cancel
                </button>
                <button type="button" class="btn btn-success pull-right" onclick="docketView.assignmentTask()"
                        name="actionAssignmentTask">Save
                </button>
            </div>
        </div>
        <br>
    </form>
    <table style="background-color: #fff;width: 100%" class="table-claim-report-assist" id="table_docket">
        <thead>
        <tr class="assist">
            <th colspan="10"><h4 class="text-center">Docket</h4></th>
        </tr>
        <tr style="border-bottom: 1px solid black;margin-bottom:20px">
            <th class="text-bold text-center" style="display: none">IdUser</th>
            <th class="text-bold text-center">Date</th>
            <th class="text-bold text-center">Adjuster<br>Name</th>
            <th class="text-bold text-center">Code</th>
            <th class="text-bold text-center">Time</th>
            <th class="text-bold text-center" style="display:none">Description</th>
            <th class="text-bold text-center">Expense<br>Code</th>
            <th class="text-bold text-center">Expense<br>Amount</th>
            <th class="text-bold text-center" style="width: 30%">Note</th>
            <th class="text-bold text-center">InvoiceMajorNo</th>
            <th class="text-bold text-center">InvoiceDate</th>
            <th class="text-bold text-center">Modify</th>
        </tr>
        </thead>
        <tbody id="tbodyDocket">

        </tbody>
    </table>
    <br>
    <br>
</div>

<script>
    $("input[name=ExpenseAmount]").formatCurrency({roundToDecimalPlace:0});
    $(document).on('keypress', ':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if (typeof(docketView) === "undefined") {
            docketView = {
                taskObject: {
                    ClaimId: null,
                    UserId: null,
                    ProfessionalServices: null,
                    ProfessionalServicesNote: null,

                    ProfessionalServicesTime: null,
                    ProfessionalServicesRate: null,
                    ProfessionalServicesAmount: null,

                    ProfessionalServicesRateBillValue: null,
                    ProfessionalServicesTimeBillValue: null,
                    ProfessionalServicesAmountBillValue: null,

                    ProfessionalServicesTimeOverrideValue: null,
                    ProfessionalServicesRateOverrideValue: null,
                    ProfessionalServicesAmountOverrideValue: null,

                    Expense: null,
                    ExpenseNote: null,

                    ExpenseAmount: null,
                    ExpenseAmountBillValue: null,
                    ExpenseAmountOverrideValue: null,
                    BillDate:null,

                },
                timeFrom:null,
                sortDate: 1,
                claimData: null,
                idTaskDelete:null,
                resetTaskObject: function () {
                    for (var propertyName in docketView.taskObject) {
                        if (docketView.taskObject.hasOwnProperty(propertyName)) {
                            docketView.taskObject.propertyName = null;
                        }
                    }
                },
                //sds
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" + currentDate.getDate()).slice(-2) + "-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-"
                            + currentDate.getFullYear();
                    return datetime;
                },
                firstToUpperCase: function (str) {
                    return str.substr(0, 1).toUpperCase() + str.substr(1);
                },
                getInformationOfClaim:function(code){
                    $.post(url + "loadClaimByEventEnterKey", {
                        _token: _token,
                        key: code
                    }, function (data) {
                        docketView.claimData = data;
                        if (data["Status"]==="Success") {
                            //Reset information claim befor
                            docketView.resetInformationClaim();
                            //Reset information task of user before
                            docketView.resetInformationTask();
                            //load status claim
                            if(data["Claim"]["statusId"]===3)
                            {
                                $("label[id=statusClaim]").text("Close").css("color","red");
                            }
                            else
                            {
                                $("label[id=statusClaim]").text("Open").css("color","blue");
                            }
                            var dateTimeFromDate = data["Date"].split(" ");
                            var dateTimeLossDate = data["Claim"]["lossDate"].split(" ");
                            docketView.timeFrom = dateTimeFromDate[1];
                            $("input[name=fromDate]").val(dateTimeFromDate[0]);
                            $("input[name=ClaimId]").val(data["Claim"]["id"]);
                            $("input[name=InsuredName]").val(data["Claim"]["insuredFirstName"] + " " + data["Claim"]["insuredLastName"]);
                            $("input[name=LossDate]").val(docketView.convertStringToDate(dateTimeLossDate[0]));
                            $("input[name=LossLocation]").val(data["Claim"]["lossLocation"]);
                            $("input[name=codeTotal]").val(data["codeTotal"]).formatCurrency({roundToDecimalPlace:2});
                            $("input[name=expenseTotal]").val(data["expenseTotal"]).formatCurrency({roundToDecimalPlace:0});
                            docketView.taskObject.ClaimId = data["Claim"]["id"];
                            //Insert to table docket
                            $.post(url + "loadViewDocketDetail/0", {
                                _token: _token,
                                idClaim: data["Claim"]["id"]
                            }, function (view) {
                                $("tbody[id=tbodyDocket]").empty().append(view);
                            });
                        }
                        else
                        {
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Claim is not found!!!");
                            $("div[id=modal-confirm]").modal("show");
                        }

                    });
                },
                loadClaimByEventEnterKey: function (e) {
                    if (e.keyCode === 13) {
                        docketView.getInformationOfClaim($("input[name=ClaimCode]").val());
                    }
                },
                viewDetailTask: function (element) {
                    //alert(docketView.convertStringToDate2($(element).parent().parent().find("td:eq(1)").text()));
                    //Setup form and action
                    $("button[name=actionAssignmentTask]").text("Update");
                    $("input[name=Action]").val("0");
                    $.post(url + "viewDetailTask", {_token: _token, idDocket: $(element).attr("id")}, function (data) {
                        console.log(data);
                        var billDate = data["Task"]["billDate"].split(" ");
                        $("input[name=ChooseDate]").val(billDate[0]);
                        //Binding data

                        for (var propertyName in data["Task"]) {
                            if (propertyName !== "userId") {
                                $("#" + docketView.firstToUpperCase(propertyName)).val(data["Task"][propertyName]);
                            }
                        }
                        $("input[name=IdTask]").val(data["Task"]["id"]);
                        $("#UserId").val($(element).parent().parent().find("td:eq(2)").text()).css("text-transform","lowercase");
                        $("#ExpenseCode").val(data["expenseCode"]);
                        $("#ProfessionalServicesCode").val(data["professionalCode"]);
                        $("#ProfessionalServices").val(data["Task"]["professionalServices"]);
                        $("#Expense").val(data["Task"]["expense"]);

                        $("input#ProfessionalServicesAmount").formatCurrency({roundToDecimalPlace:0});
                        $("input#ProfessionalServicesRate").formatCurrency({roundToDecimalPlace:0});
                        $("input#ExpenseAmount").formatCurrency({roundToDecimalPlace:0});
                          if(data["errorInvoiceMajorNo"]==="True")
                          {
                              $("button[name=actionAssignmentTask]").prop("disabled", true);
                              $("input[name=ProfessionalServicesTime]").prop("readOnly", true).css("background-color", "#E6D8D8");
                              $("input[name=ExpenseAmount]").prop("readOnly", true).css("background-color", "#E6D8D8");
                          }
                          else if(data["errorInvoiceTempNo"]==="True")
                          {
                              $("button[name=actionAssignmentTask]").prop("disabled", true);
                              $("input[name=ProfessionalServicesTime]").prop("readOnly", true).css("background-color", "#E6D8D8");
                              $("input[name=ExpenseAmount]").prop("readOnly", true).css("background-color", "#E6D8D8");
                          }
                          else
                          {
                              $("button[name=actionAssignmentTask]").prop("disabled", false);
                              $("input[name=ProfessionalServicesTime]").prop("readOnly",false).css("background-color", "");
                              $("input[name=ExpenseAmount]").prop("readOnly", false).css("background-color", "");
                          }
                    });
                },
                automaticValue: function (A, B, C) {
                    $("input[name=" + C + "]").empty().val(parseFloat($("input[name=" + A + "]").val()) * parseFloat($("input[name=" + B + "]").val()));
                },
                automaticInitialValueTimeOfInputUnit: function () {
                    if($("input[name=ProfessionalServicesTime]").val()==="")
                    {
                        $("input[name=ProfessionalServicesTime]").val("");
                        $("input[name=ProfessionalServicesAmount]").val("");
                    }
                    else if(parseFloat($("input[name=ProfessionalServicesTime]").val()) < 0 )
                    {
                        $("input[name=ProfessionalServicesTime]").val("");
                        $("input[name=ProfessionalServicesAmount]").val("");

                    }
                    else{
                        var Rate = $("input[name=ProfessionalServicesRate]").val().replace(/,/g,"");
                        var Time = $("input[name=ProfessionalServicesTime]").val();
                        var Sum = Rate * Time;
                        $("input[name=ProfessionalServicesAmount]").empty().val(Sum).formatCurrency({roundToDecimalPlace:0});
                    }
//                    docketView.automaticValue("ProfessionalServicesTime", "ProfessionalServicesRate", "ProfessionalServicesAmount");
                },
                automaticInitialValueTimeOfInputRate: function () {
                    docketView.automaticValue("ProfessionalServicesRate", "ProfessionalServicesTime", "ProfessionalServicesAmount");
                },
                automaticBillableValueTimeOfInputUnit: function () {
                    docketView.automaticValue("ProfessionalServicesTimeBillValue", "ProfessionalServicesRateBillValue", "ProfessionalServicesAmountBillValue");
                },
                automaticBillableValueRateOfInputUnit: function () {
                    docketView.automaticValue("ProfessionalServicesRateBillValue", "ProfessionalServicesTimeBillValue", "ProfessionalServicesAmountBillValue");
                },
                submitAssignmentTask:function()
                {
                    docketView.resetTaskObject();
                    for (var i = 0; i < Object.keys(docketView.taskObject).length; i++) {
                        docketView.taskObject[Object.keys(docketView.taskObject)[i]] = $("#" + Object.keys(docketView.taskObject)[i]).val();
                    }
                    docketView.taskObject.ProfessionalServicesAmount = String(docketView.taskObject.ProfessionalServicesAmount).replace(/,/g,"");
                    docketView.taskObject.ProfessionalServicesRate = String(docketView.taskObject.ProfessionalServicesRate).replace(/,/g,"");
                    docketView.taskObject.ExpenseAmount = $("input#ExpenseAmount").val().replace(/,/g,"");
                    $.post(url + "assignmentTask", {
                        _token: _token,
                        action: $("input[name=Action]").val(),
                        idTask: $("input[name=IdTask]").val(),
                        taskObject: docketView.taskObject,
                        ChooseDate: $("input[name=ChooseDate]").val(),
                        FromDate: $("input[name=fromDate]").val() +" "+docketView.timeFrom
                    }, function (data) {
                        if (data["Action"] === "AddNew") {
                            if (data["Result"] === 1) {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add New Success");
                                $("div[id=modal-confirm]").modal("show");
                                docketView.resetInformationTask();
                                $.post(url + "loadViewDocketDetail/0", {
                                    _token: _token,
                                    idClaim: docketView.taskObject.ClaimId
                                }, function (view) {
                                    $("tbody[id=tbodyDocket]").empty().append(view);
                                });
                            }
                            else if (data["Result"] === 2) {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add New No Success");
                                $("div[id=modal-confirm]").modal("show");
                            }
                            else {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add New No Success");
                                $("div[id=modal-confirm]").modal("show");
                            }
                        }
                        else if (data["Action"] === "Update") {
                            if (data["Result"] === 1) {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Update Success");
                                $("div[id=modal-confirm]").modal("show");
                                docketView.resetInformationTask();
                                $.post(url + "loadViewDocketDetail/0", {
                                    _token: _token,
                                    idClaim: docketView.taskObject.ClaimId
                                }, function (view) {
                                    $("tbody[id=tbodyDocket]").empty().append(view);
                                });
                            }
                            else if(data["Result"]==2)
                            {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("This task already bill,can't update task!!!");
                                $("div[id=modal-confirm]").modal("show");
                            }
                            else {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("This task already bill,can't update task!!!");
                                $("div[id=modal-confirm]").modal("show");
                            }
                        }
                        else if(data["Action"] === "ErrorDate")
                        {
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Choose date is not smaller than from date!!!");
                            $("div[id=modal-confirm]").modal("show");
                        }
                        else if(data["Action"] === "ErrorDateNow")
                        {
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Choose date is not larger than from current date !!!");
                            $("div[id=modal-confirm]").modal("show");
                        }
                        else
                        {
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("This claim has closed! Can't assign task or update!");
                            $("div[id=modal-confirm]").modal("show");
                        }
                    });

                },
                assignmentTask: function () {
                    if ($("input[name=ClaimCode]").val() === "") {
                        //validator required claim
                        $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter claimId");
                        $("div[id=modal-confirm]").modal("show");
                    }
                    else {
                        $("form[id=formClaim]").validate({
                            rules: {
                                InsuredName: "required"

                            },
                            messages: {
                                InsuredName: "ID is required"
                            }
                        });
                        if ($("form[id=formClaim]").valid()) {
                            //validator time expesn
                            if(String($("input[name=ProfessionalServicesCode]").val()).trim() !== "" && String($("textarea[name=ProfessionalServicesNote]").val()).trim() == ""){
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter description");
                                $("div[id=modal-confirm]").modal("show");
                                return;
                            }
                            if(String($("input[name=ExpenseCode]").val()).trim() !== "" && String($("textarea[name=ExpenseNote]").val()).trim() == ""){
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter description");
                                $("div[id=modal-confirm]").modal("show");
                                return;
                            }
                            if(String($("input[name=ExpenseAmount]").val()).trim() !== "" && String($("input[name=ExpenseCode]").val()).trim() === "" )
                            {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter code expense");
                                $("div[id=modal-confirm]").modal("show");
                                return;
                            }
                            if($("input[name=ProfessionalServicesCode]").val() !=="")
                            {
                                if($("input[name=ProfessionalServicesTime]").val() ==="")
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter units of time");
                                    $("div[id=modal-confirm]").modal("show");
                                }
                                else
                                {
                                    if($("input[name=ExpenseCode]").val() !=="")
                                    {
                                        if($("input[name=ExpenseAmount]").val() ==="")
                                        {
                                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter amount of expense code");
                                            $("div[id=modal-confirm]").modal("show");
                                        }
                                        else
                                        {
                                            docketView.submitAssignmentTask();
                                        }
                                    }
                                    else
                                    {
                                        docketView.submitAssignmentTask();
                                    }

                                }
                            }
                            else if($("input[name=ExpenseCode]").val() !=="")
                            {
                                if($("input[name=ExpenseAmount]").val() ==="")
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter amount of expense code");
                                    $("div[id=modal-confirm]").modal("show");
                                }
                                else
                                {

                                    if($("input[name=ProfessionalServicesCode]").val() !=="")
                                    {
                                        if($("input[name=ProfessionalServicesTime]").val() ==="")
                                        {
                                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter time of time code");
                                            $("div[id=modal-confirm]").modal("show");
                                        }
                                        else
                                        {
                                            docketView.submitAssignmentTask();
                                        }
                                    }
                                    else
                                    {
                                        docketView.submitAssignmentTask();
                                    }
                                }
                            }
                            else
                            {
                                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("You must enter Time code or expense");
                                $("div[id=modal-confirm]").modal("show");
                            }



                        }
                    }
                },
                ActionCancelOfButton: function () {
                    docketView.openDateClaim = null;
                    $("input[name=ChooseDate]").val("");
                    $("button[name=actionAssignmentTask]").text("Add New").prop("disabled",false);
                    $("input[name=Action]").val("1");
                    docketView.resetInformationTask();
                    $("input[name=ProfessionalServicesRate]").val("");
                    $("input[name=UserId]").val("");
                },
                resetInformationTask:function()
                {
                    $("input[name=ChooseDate]").val("");
                    //Time
                    $("input[name=ProfessionalServices]").val("");
                    $("input[name=ProfessionalServicesCode]").val("");
                    $("textarea[name=ProfessionalServicesNote]").val("");
                    //Initial Value time
                    $("input[name=ProfessionalServicesTime]").prop("readOnly", false).css("background-color", "").val("");
                    $("input[name=ProfessionalServicesAmount]").val("");
                    //Billable value time
                    $("input[name=ProfessionalServicesTimeBillValue]").val("");
                    $("input[name=ProfessionalServicesAmountBillValue]").val("");
                    $("input[name=ProfessionalServicesRateBillValue]").val("");

                    //Expense
                    $("input[name=ExpenseCode]").val("");
                    $("input[name=Expense]").val("");
                    $("textarea[name=ExpenseNote]").val("");
                    //Initial value expense
                    $("input[name=ExpenseAmount]").val("");
                    //Billable value time
                    $("input[name=ExpenseAmountBillValue]").val("");
                },
                resetInformationClaim:function()
                {
                    $("input[name=Action]").val("1");
                    $("input[name=ClaimId]").val("");
                    $("input[name=IdTask]").val("");
                    $("input[name=InsuredName]").val("");
                    $("input[name=LossDate]").val("");
                    $("input[name=LossLocation]").val("");
                    $("input[name=fromDate]").val("");
                    $("input[name=codeTotal]").val("");
                    $("input[name=expenseTotal]").val("");
                    $("label[id=statusClaim]").text("");
                    $("input[name=UserId]").val("");
                    $("input[name=ProfessionalServicesRate]").val("");
                },
                loadListProfessionalService: function () {
                    $.post(url + "loadListTimeCode", {_token: _token}, function (view) {
                        $("table[id=tableListTime]").DataTable().destroy();
                        $("tbody[id=modal-time-table-body]").empty().append(view);
                        $("table[id=tableListTime]").DataTable();

                    });
                    $("div[id=modal-time]").modal("show");

                },
                loadListExpense: function () {
                    $("div[id=modal-expense]").modal("show");
                    $("select#selectTypeExpense").val($("select#selectTypeExpense option:eq(0)").val());
                    docketView.loadListExpenseByType($("select#selectTypeExpense option:eq(0)").val());


                },
                loadListExpenseByType:function(typeExpense)
                {
                    $.post(url + "loadListExpenseCode", {_token: _token,typeExpense:typeExpense}, function (view) {
                        $("tbody[id=modal-expense-table-body]").empty().append(view);
                    });
                },
                onChangeWhenChooseExpenseType:function(element)
                {
                    docketView.loadListExpenseByType($(element).find("option:selected").val());
                },

                chooseTaskTimeCode: function (element) {
                    $("input[name=ProfessionalServices]").val($(element).attr("id"));
                    $("input[name=ProfessionalServicesCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modal-time]").modal("hide");
                },
                chooseTaskExpenseCode:function(element)
                {
                    $("input[name=Expense]").val($(element).attr("id"));
                    $("input[name=ExpenseCode]").val($(element).find("td:eq(0)").html());
                    $("div[id=modal-expense]").modal("hide");
                },
                addNewOrUpdateCategory: function () {
                    //Reset form modify
                    $("input[name=taskCategory_modify_id]").val("");
                    $("input[name=taskCategory_modify_code]").val("");
                    $("input[name=taskCategory_modify_name]").val("");
                    $("textarea[name=taskCategory_modify_description]").val("");

                    $("div[id=modal-time]").modal("hide");
                    $("input[name=taskCategory_modify_id]").val("0");
                    $("div[id=modal-category-modify]").modal("show");
                },
                submitAddNewAndUpdateCategory: function () {
                    $.post(url + "submitAddNewAndUpdateCategory",
                            {
                                _token: _token,
                                id: $("input[name=taskCategory_modify_id]").val(),
                                code: $("input[name=taskCategory_modify_code]").val(),
                                name: $("input[name=taskCategory_modify_name]").val(),
                                description: $("textarea[name=taskCategory_modify_description]").val()
                            }, function (data) {
                                if (data["Action"] === "AddNew") {
                                    if (data["Result"] === 1) {
                                        $("div[id=modal-category-modify]").modal("hide");
                                        docketView.loadListProfessionalService();
                                    }
                                }
                                else {
                                    if (data["Result"] === 1) {
                                        $("div[id=modal-category-modify]").modal("hide");
                                        docketView.loadListProfessionalService();
                                    }
                                }
                            });
                },
                modifyTaskCategory: function (element) {
                    $("div[id=modal-time]").modal("hide")
                    $("input[name=taskCategory_modify_id]").val($(element).attr("data-id"));
                    $("input[name=taskCategory_modify_code]").val($("tbody[id=modal-time-table-body]").find("tr[id=" + $(element).attr("data-id") + "]").find("td:eq(0)").text());
                    $("input[name=taskCategory_modify_name]").val($("tbody[id=modal-time-table-body]").find("tr[id=" + $(element).attr("data-id") + "]").find("td:eq(1)").text());
                    $("textarea[name=taskCategory_modify_description]").val($("tbody[id=modal-time-table-body]").find("tr[id=" + $(element).attr("data-id") + "]").find("td:eq(2)").text());
                    $("div[id=modal-category-modify]").modal("show");
                },
                chooseUserWhenAssignmentTask:function(element)
                {
                    $("input[name=UserId]").val($(element).find("td:eq(0)").text());
                    $("input[name=ProfessionalServicesRate]").val($(element).find("td:eq(6)").text()).formatCurrency({roundToDecimalPlace:0});
                    $("div[id=modalListEmployee]").modal("hide");
                },
                showUserWhenAssignmentTask:function()
                {
                    $("div[id=modalListEmployee]").modal("show");
                },
                formatCurrencyExpense:function()
                {
                    if(parseFloat( $("input#ExpenseAmount").val())<0)
                    {
                         $("input#ExpenseAmount").val("");
                    }
                    else
                    {
                        $("input#ExpenseAmount").formatCurrency({roundToDecimalPlace:0});

                    }
                },
                sortDocketTableByDate: function(){
                    if(docketView.sortDate == 0){
                        $.post(url + "loadViewDocketDetail/0", {
                            _token: _token,
                            idClaim: docketView.claimData["Claim"]["id"]
                        }, function (view) {
                            $("tbody[id=tbodyDocket]").empty().append(view);
                        });
                        docketView.sortDate = 1;
                    }else{
                        $.post(url + "loadViewDocketDetail/1", {
                            _token: _token,
                            idClaim: docketView.claimData["Claim"]["id"]
                        }, function (view) {
                            $("tbody[id=tbodyDocket]").empty().append(view);
                        });
                        docketView.sortDate = 0;
                    }
                },
                sortDocketTableByAdjuster: function(){
                    $.post(url + "loadViewDocketDetail/2", {
                        _token: _token,
                        idClaim: docketView.claimData["Claim"]["id"]
                    }, function (view) {
                        $("tbody[id=tbodyDocket]").empty().append(view);
                    });
                },
                deleteTask:function(element)
                {
                    $("div[id=modalDelete]").modal("show");
                    docketView.idTaskDelete = $(element).attr("id");
                },
                confirmDelete:function()
                {
                    $.post(url+"deleteTask",{_token:_token,idTask:docketView.idTaskDelete,date:$("input[name=fromDate]").val() +" "+docketView.timeFrom},function(data){
                        if(data==="1")
                        {
                            $("div[id=modalDelete]").modal("hide");
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Delete Success");
                            $("div[id=modal-confirm]").modal("show");
                            $.post(url + "loadViewDocketDetail/0", {
                                _token: _token,
                                idClaim: docketView.taskObject.ClaimId
                            }, function (view) {
                                $("tbody[id=tbodyDocket]").empty().append(view);
                            });
                            docketView.idTaskDelete = null;
                            docketView.resetInformationTask();
                        }
                        else
                        {
                            $("div[id=modalDelete]").modal("hide");
                            $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Delete No Success");
                            $("div[id=modal-confirm]").modal("show");
                        }
                    });
                },
                loadClaimByEventDoubleClick:function()
                {
                    $.get(url + 'getAllClaim',function (listClaim) {
                        var row = "";
                        for (var i = 0; i < listClaim.length; i++) {
                            var tr = "<tr>";
                            tr += "<td>" + listClaim[i]["code"] + "</td>";
                            tr += "<td>"+ listClaim[i]["insuredLastName"] + "</td>";
                            tr += "<td>"+ listClaim[i]["insurerCode"] + "</td>";
                            if (listClaim[i]["receiveDate"]) {
                                var receiveDate = new Date(listClaim[i]["receiveDate"].substring(0, 10));
                                var dd = receiveDate.getDate();
                                var mm = receiveDate.getMonth() + 1; //January is 0!

                                var yyyy = receiveDate.getFullYear();
                                if (dd < 10) {
                                    dd = '0' + dd;
                                }
                                if (mm < 10) {
                                    mm = '0' + mm;
                                }
                                tr += "<td>"+ dd + '-' + mm + '-' + yyyy + "</td>";
                            }
                            if (listClaim[i]["openDate"]) {
                                var openDate = new Date(listClaim[i]["openDate"].substring(0, 10));
                                var dd = openDate.getDate();
                                var mm = openDate.getMonth() + 1; //January is 0!

                                var yyyy = openDate.getFullYear();
                                if (dd < 10) {
                                    dd = '0' + dd;
                                }
                                if (mm < 10) {
                                    mm = '0' + mm;
                                }
                                tr += "<td>"+ dd + '-' + mm + '-' + yyyy + "</td>";
                            }
                            tr += "<td>"+ String(listClaim[i]["adjusterCode"]).toUpperCase() + "</td>";
                            tr += "<td class='text-center'><button class='btn btn-xs btn-success' onclick='docketView.fillClaimToForm(this)'><span class='glyphicon glyphicon-ok'></span></button></td>";
                            tr += "</tr>";
                            row += tr;
                        }
                        $("#claim-talbe-body").empty().append(row);
                        $("#claim-table").DataTable();
                    });
                    $("#modal-claim").modal("show");
                },
                fillClaimToForm:function(element)
                {
                    docketView.getInformationOfClaim($(element).parent().parent().find("td:eq(0)").text());
                    $("input[name=ClaimCode]").val($(element).parent().parent().find("td:eq(0)").text());
                    $("#modal-claim").modal("hide");
                }

            }
        }
        else {

        }
    })
    //setup before functions Time
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 3 second for example
    var $inputTime = $("input#ProfessionalServicesCode");

    //on keyup, start the countdown
    $inputTime.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingTime, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputTime.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingTime() {
        $.get(url + 'getSearchTime', {
            token: _token,
            Code: $inputTime.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this task!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputTime.val("");
                $("input#ProfessionalServices").val("");
            }
            else {
                $inputTime.val(data["code"]);
                $("input#ProfessionalServices").val(data["id"])
            }
        });
    }

    //setup before functions Expense
    var typingTimer;                //timer identifier
    var doneTypingInterval = 500;  //time in ms, 3 second for example
    var $inputExpense = $("input#ExpenseCode");

    //on keyup, start the countdown
    $inputExpense.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingExpense, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputExpense.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingExpense() {
        $.get(url + 'getSearchExpense', {
            token: _token,
            Code: $inputExpense.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this task!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputExpense.val("");
                $("input#Expense").val("");
            }
             else {
                $inputExpense.val(data["code"]);
                $("input#Expense").val(data["id"]);
            }
        });
    }
</script>