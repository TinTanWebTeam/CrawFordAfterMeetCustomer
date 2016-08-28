{{--Modal Notification--}}
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
{{--End Modal Notification--}}

{{--Modal Confirm--}}
<div aria-hidden="true" class="modal fade" id="modalConfirm" role="basic" style="display: none;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                </button>
                <h4 class="modal-title">
                    Confirm Bill Claim
                </h4>
            </div>
            <div class="modal-body" id="modalContent">
                Are you sure this bill claim ?
            </div>
            <div class="row">
                <div class="col-sm-12 text-right">
                    <h4 style="display: inline-block;">Pending</h4>&nbsp;&nbsp;<input type="radio" name="bill-status" id="pending" checked style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                    <h4 style="display: inline-block;">Complete</h4>&nbsp;&nbsp;<input type="radio" name="bill-status" id="complete" style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn dark btn-outline" data-dismiss="modal" name="modalClose" type="button">
                    Close
                </button>
                <button class="btn green" name="modalAgree" type="button" onclick="trialFeeView.confirmBillClaim()">
                    Save changes
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal Confirm--}}

{{--Model List Claim IB--}}
<div class="modal fade" id="modalListClaimIB" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List IB Claim</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th style="display: none">Total</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTableBillOfClaim">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model Model List Claim IB--}}
<div class="row" style="background-color: white">
    <form id="trialFee">
        <div class="col-sm-5" style="padding-top: 28px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h5 style="text-align: right">Claim#:</h5>
                                    <input name="action" id="action" style="display: none" value="1">
                                    <input name="idClaim" id="idClaim" style="display: none">
                                </div>
                                <div class="col-sm-6">
                                    <input name="Claim" id="Claim"
                                           onkeypress="trialFeeView.chooseClaimWhenUseEventEnterKey(event)" style="margin-left: 4px;display: inline-block">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-primary" name="actionViewListIB" onclick="trialFeeView.loadIBClaim()" disabled
                                    style="height: 28px;width: 50px;">
                                    ...
                                    </button>
                                </div>
                            </div>
                        </div>
                        {{--<div class="col-sm-6">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-10">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-sm-2 text-right">--}}
                                            {{--<input type="checkbox" style="width: 20px;height: 20px">--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-9">--}}
                                            {{--<h5 style="text-align: left">Show Pending</h5>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{----}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="col-sm-2">--}}
                            {{--<button type="button" class="btn btn-default" onclick="trialFeeView.loadIBClaim()"--}}
                                    {{--style="height: 28px">--}}
                                {{--...--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 style="text-align: right">From:</h5>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" name="FromDate" id="FromDate" readonly style="margin-left: 4px;background-color: #F3EDED">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 style="text-align: right">To:</h5>
                        </div>
                        <div class="col-sm-9">
                            <input type="date" name="ToDate" id="ToDate" value="{{date('Y-m-d')}}" onchange="trialFeeView.loadTaskDetailByDate()">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-2 text-right">
                        <input type="radio" name="btnStatus" value="0" style="width: 20px;height: 20px" checked>
                        {{--<div class="radio">--}}
                            {{--<label><input type="radio" name="optradio">Option 1</label>--}}
                        {{--</div>--}}
                    </div>
                    <div class="col-sm-9">
                        <h5 style="text-align: left;padding-left: 15px">Show Pending</h5>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-2 text-right">
                        <input type="radio" name="btnStatus" value="1" style="width: 20px;height: 20px">
                    </div>
                    <div class="col-sm-9">
                        <h5 style="text-align: left;margin-left: 10px">Show All</h5>
                    </div>
                </div>
            </div>
            <div class="row" style="border: 1px solid #A9A6A6;padding: 10px 10px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 15%" class="text-right">
                            <h5>Insured:</h5>
                        </td>
                        <td colspan="3">
                            <input type="text" name="insured" id="insured" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Claim Type:</h5>
                        </td>
                        <td>
                            <input type="text" name="claimTypeCode" id="claimTypeCode" readonly style="background-color: #F3EDED">
                        </td>
                        <td class="text-right">
                            <h5>Branch:</h5>
                        </td>
                        <td>
                            <input type="text" name="branch" id="branch" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Loss Date:</h5>
                        </td>
                        <td>
                            <input type="text" name="lossDate" id="lossDate" readonly style="background-color: #F3EDED">
                        </td>
                        <td class="text-right">
                            <h5>Initial Reserve:</h5>
                        </td>
                        <td>
                            <input type="text" name="initialReserve" id="initialReserve" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Received:</h5>
                        </td>
                        <td>
                            <input type="text" name="receiveDate" id="receiveDate" readonly style="background-color: #F3EDED">
                        </td>
                        <td class="text-right">
                            <h5>Current Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="currentRes" id="currentRes" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Opened:</h5>
                        </td>
                        <td>
                            <input type="text" name="openDate" id="openDate" readonly style="background-color: #F3EDED">
                        </td>
                        <td class="text-right">
                            <h5>Adjust Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="adjustRes" id="adjustRes" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Estimated:</h5>
                        </td>
                        <td>
                            <input type="text" name="estimated" id="estimated" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="row"
                 style="border: 1px solid #A9A6A6;padding: 10px 10px;margin-left: 1px;height: 360px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 10%">
                            <h5>Bill To:</h5>
                        </td>
                        <td>
                            <select id="chooseCustomer" style="width:auto"
                                    onchange="trialFeeView.showInformationOfCustomer()">
                                @if($listCustomer!=null)
                                    @foreach($listCustomer as $item)
                                        <option value={{$item->code}}>{{$item->code}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                        <textarea rows="4" style="width: 100%;resize: none;" id="addressCustomer"
                                  name="addressCustomer">

                        </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Insurer:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 100%" id="insurerCustomer" name="insurerCustomer">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Policy #:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 100%" id="policyCustomer" name="policyCustomer">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Invoice MajorNo:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 30%" id="invoiceMajorNo" name="invoiceMajorNo" value="{{$invoiceMajorNo}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Cor Insurer:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 30%" id="coInsurer" name="coInsurer">
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <h4 style="display: inline-block;">Interim Bill</h4>&nbsp;&nbsp;<input type="radio" name="bill-type" id="interim_bill" checked style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                        <h4 style="display: inline-block;">Final Bill</h4>&nbsp;&nbsp;<input type="radio" name="bill-type" id="final_bill" style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                    </div>
                </div>
                <div class="row">
                    <button type="button" class="btn btn-danger pull-right" onclick="trialFeeView.cancel()"
                            name="cancel"
                            style="margin-right: 15px;margin-left: 15px">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-success pull-right" onclick="trialFeeView.actionBillOfClaim()"
                            name="btnBill">
                        Bill Claim
                    </button>
                </div>
                {{--<div class="row" style="margin-top: 120px">--}}
                    {{--<button type="button" class="btn btn-danger pull-right" onclick="trialFeeView.cancel()"--}}
                            {{--name="cancel"--}}
                            {{--style="margin-right: 15px;margin-left: 15px">--}}
                        {{--Cancel--}}
                    {{--</button>--}}
                    {{--<button type="button" class="btn btn-success pull-right" onclick="trialFeeView.actionBillOfClaim()"--}}
                            {{--name="btnBill">--}}
                        {{--Bill Claim--}}
                    {{--</button>--}}
                {{--</div>--}}
            </div>
        </div>
    </form>
</div>
<div class="row" style="margin-top: 20px;padding-top: 10px;background-color: white">
    <div class="col-sm-2" style="padding:0">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="background-color: rgba(52, 52, 80, 0.55);;color: white;text-align: center">GL</th>
                </tr>
                <tr>
                    <th style="text-align: center">Account</th>
                </tr>
                </thead>
                <tbody id="tbodyGL">
                <tr>
                    {{--<td style="width: 170px">Hours</td>--}}
                </tr>
                <tr>
                    {{--<td>Rate</td>--}}
                </tr>
                <tr>
                    {{--<td>Period</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Professional services</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">General Exp</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Comm && Photo Exp</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Consult Fees && Exp</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Travel Related Exp</td>--}}

                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">GST-free Disb</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Disbursements</td>--}}
                </tr>
                <tr>
                    {{--<td style="width: 266px;height:43px">Total</td>--}}
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="table-responsive" style="width: 600px;">
            <table class="table table-bordered" style="width: 700px;">
                <thead id="theadTableListTaskDetail">
                <tr>
                    <th colspan="50" style="text-align: center;background-color: rgba(52, 52, 80, 0.55);;color: white">Branch/Adjuster
                        Subtotals:
                    </th>
                </tr>
                <tr>

                </tr>
                </thead>
                <tbody id="tbodyTableListTaskDetail">
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-3" style="padding:0">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2" style="background-color: rgba(52, 52, 80, 0.55);;color: white;text-align: center">Total</th>
                </tr>
                <tr>
                    <th style="text-align: center">Actual</th>
                    <th style="text-align: center">Invoice</th>
                </tr>
                </thead>
                <tbody id="tbodyListTotal">
                <tr></tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>
<script>
    $(function () {
        if (typeof(trialFeeView) === "undefined") {
            trialFeeView = {
                userObject: {
                    Id: null,
                    name: null,
                    totalHours: null,
                    rate: null,
                    period: null,
                    professionalServices: null,
                    generalExp: null,
                    commPhotoExp: null,
                    consultFeesExp: null,
                    travelRelatedExp: null,
                    gstFreeDisb: null,
                    disbursements: null,
                    total: null
                },
                codeCustomer:null,
                idBillWhenUpdateBill:null,
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" + currentDate.getDate()).slice(-2)+"-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)+"-"
                            + currentDate.getFullYear();
                    return datetime;
                },
                loadTableGL:function()
                {
                    var gl = $("tbody[id=tbodyGL]");
                    gl.find("tr:eq(0)").empty().append("<td style='width: 170px'>Hours</td>");
                    gl.find("tr:eq(1)").empty().append("<td>Rate</td>");
                    gl.find("tr:eq(2)").empty().append("<td>Period</td>");
                    gl.find("tr:eq(3)").empty().append("<td style='width: 266px;height:43px'>Professional services</td>");
                    gl.find("tr:eq(4)").empty().append("<td style='width: 266px;height:43px'>General Exp</td>");
                    gl.find("tr:eq(5)").empty().append("<td style='width: 266px;height:43px'>Comm && Photo Exp</td>");
                    gl.find("tr:eq(6)").empty().append("<td style='width: 266px;height:43px'>Consult Fees && Exp</td>");
                    gl.find("tr:eq(7)").empty().append("<td style='width: 266px;height:43px'>Travel Related Exp</td>");
                    gl.find("tr:eq(8)").empty().append("<td style='width: 266px;height:43px'>GST-free Disb</td>");
                    gl.find("tr:eq(9)").empty().append("<td style='width: 266px;height:43px'>Disbursements</td>");
                    gl.find("tr:eq(10)").empty().append("<td style='width: 266px;height:43px'>Total</td>");
                },

                chooseClaimWhenUseEventEnterKey: function (e) {
                    $("button[name=actionViewListIB]").prop("disabled",false);
                    if (e.keyCode === 13) {
                        $.post(url + "chooseClaimWhenUseEventEnter", {
                            _token: _token,
                            key: $("input[name=Claim]").val()
                        }, function (data) {
                            console.log(data);
                            if (data === "Error") {
                                $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Claim is not exist!");
                                $("div[id=modalNotification]").modal("show");
                            }
                            else {
                                var arrayTimeCheck = data["check"].split(" ");
                                trialFeeView.codeCustomer = data["Claim"]["insurerCode"];
                                $("input[name=FromDate]").val(trialFeeView.convertStringToDate(arrayTimeCheck[0])+" "+arrayTimeCheck[1]);
                                $("input[name=idClaim]").val(data["Claim"]["id"]);
                                $("input[name=insured]").val(data["Claim"]["insuredFirstName"]+" "+data["Claim"]["insuredLastName"]);
                                $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                                $("input[name=branch]").val(data["Claim"]["branchCode"]);
                                $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                                $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                                $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                                $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);
                                //load customer
                                trialFeeView.showInformationOfCustomer(data["Claim"]["insurerCode"]);
                                //Insert data to table list task detail

                                if(data["listClaimTaskDetail"].length !== 0) {
                                    //Insert table GL
                                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                                    var theadList = $("thead[id=theadTableListTaskDetail]");
                                    trialFeeView.clearTable();
                                    trialFeeView.loadTableGL();
                                    for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                                        //Insert data to thead of table
                                        theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "</th>");
                                        //Insert data to tbody of table
                                        tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"] + "</td>");
                                        tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value=" + data["listClaimTaskDetail"][i]["Time"]["Rate"] + " onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                        tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["RateType"] + "</td>");
                                        // Time
                                        tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #EAE2E2' value='" + data["listClaimTaskDetail"][i]["Time"]["ProfessionalServices"] + "'</td>");
                                        //Expense
                                        tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                        tbodyList.find("tr:eq(5)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                        tbodyList.find("tr:eq(6)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'</td>");
                                        tbodyList.find("tr:eq(7)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                        tbodyList.find("tr:eq(8)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                        tbodyList.find("tr:eq(9)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                        for (var j = 0; j < data["listClaimTaskDetail"][i]["Expense"].length; j++) {
                                            console.log(data["listClaimTaskDetail"][i]["Expense"][j]["Name"]);
                                            switch (data["listClaimTaskDetail"][i]["Expense"][j]["taskCategory"]) {
                                            case "GeneralExp":
                                                tbodyList.find("tr:eq(4)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            case "CommPhotoExp":
                                                tbodyList.find("tr:eq(5)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            case "ConsultFeesExp":
                                                tbodyList.find("tr:eq(6)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            case "TravelRelatedExp":
                                                tbodyList.find("tr:eq(7)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            case "Disbursements":
                                                tbodyList.find("tr:eq(9)").find("td[id="+data["listClaimTaskDetail"][i]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            }
                                        }
                                        tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value="+trialFeeView.sumAllRow(data["listClaimTaskDetail"][i]["Time"]["Name"])+" readonly style='background-color: #EAE2E2'></td>");

                                        //insert total into table total
                                        trialFeeView.loadDataToTableTotal();
                                    }
                                }
                                else
                                {
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Cant't find data of Adjuster Subtotals from"+" "+data["check"]);
                                    $("div[id=modalNotification]").modal("show");
                                }
                            }
                        });
                    }
                },
                sumAllRow:function(row)
                {
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var sum = 0;
                    var trSum = tbodyList.find("tr");
                    for(var i= 3;i<trSum.length - 2;i++)
                    {
                        sum += Number($(trSum[i]).find("td[id="+row+"]").children().val());
                        //sum += tbodyList.(find("tr")[i]).find("td[id="+row+"]").children().val();
                    }
                    return sum;
                },
                showInformationOfCustomer: function (codeInsured) {
                    $.post(url + "showInformationOfCustomer", {
                        _token: _token,
                        idCustomer:codeInsured
                    }, function (data) {
                        $("select#chooseCustomer").val(data["code"]).prop("disabled",true);
                        $("textarea[name=addressCustomer]").val(data["address"]).prop("readOnly",true).css("background-color","#F3EDED");
                        $("input[name=insurerCustomer]").val(data["fullName"]).prop("readOnly",true).css("background-color","#F3EDED");
                        $("input[name=policyCustomer]").css("background-color","#F3EDED");
                    });
                },
                loadDataToTableTotal: function () {
                    var arrSum = [];
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var tbodyListTotal = $("tbody[id=tbodyListTotal]");
                    tbodyListTotal.find("tr:eq(1)").empty().append("<td>---</td>").append("<td>---</td>");
                    tbodyListTotal.find("tr:eq(2)").empty().append("<td>---</td>").append("<td>---</td>");
                    var indexToFill = [0, 3, 4, 5, 6, 7, 8, 9, 10];
                    for (var k = 0; k < indexToFill.length; k++) {
                        var trSum = tbodyList.find('tr').eq(indexToFill[k]).find('td');
                        var sum = 0;
                        for (var j = 0; j < trSum.length; j++) {
                            if ($(trSum[j]).find('input').length > 0) {
                                sum += Number($(trSum[j]).find('input').val());
                            }
                            else {
                                sum += Number($(trSum[j]).text());
                            }
                        }
                        arrSum.push(sum);
                    }
                    var h = 1;
                    for (var z = 0; z < tbodyListTotal.find("tr").length; z++) {
                        if (z === 0) {
                            tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[z] + "</td>").append("<td>" + arrSum[z] + "</td>")
                        }
                        if (z > 2 && z <= 10) {
                            if ($("input[name=action]").val() === "0") {
//                                if (z === 10) {
//                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + data + "></td>");
//                                    h++;
//                                }
                                //else {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + arrSum[h] + "></td>");
                                    h++;
                                //}
                            }
                            else {
                                tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + arrSum[h] + "></td>");
                                h++;
                            }
                        }
                    }
                },

                sumTotalValueofInputOfTableListTaskDetail: function (element) {
                    var tbodyListTaskDetail = $("tbody[id=tbodyTableListTaskDetail]");

                    var rate = tbodyListTaskDetail.find("tr:eq(1)").find("td[id="+$(element).parent().attr("id")+"]").children().val();
                    var time = tbodyListTaskDetail.find("tr:eq(0)").find("td[id="+$(element).parent().attr("id")+"]").text();
                    tbodyListTaskDetail.find("tr:eq(3)").find("td[id="+$(element).parent().attr("id")+"]").children().val(rate * parseFloat(time));

                    var trList = tbodyListTaskDetail.find("tr");
                    var sum = 0;
                    for (var i = 0; i < trList.length; i++) {
                        if (i > 2 && i < 10) {
                            sum += parseFloat($(trList[i]).find("td[id=" + $(element).parent().attr("id") + "]").children().val());
                        }
                    }

                    tbodyListTaskDetail.find("tr:eq(10)").find("td[id=" + $(element).parent().attr("id") + "]").children().val(sum);
                    trialFeeView.loadDataToTableTotal(element);
                },
                actionBillOfClaim: function () {
                    if($("input[id=final_bill]").is(":checked"))
                    {
                        $("div[id=modalConfirm]").find("div[class=modal-content]").find("div:eq(2)").hide();
                    }
                    else
                    {
                        $("div[id=modalConfirm]").find("div[class=modal-content]").find("div:eq(2)").show();
                    }
                    $("div[id=modalConfirm]").modal("show");
                },
                confirmBillClaim: function () {
                        //get array object user
                        var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                        var theadList = $("thead[id=theadTableListTaskDetail]");
                        var arrayuser = [];
                        var abc = theadList.find("tr:eq(1)").find("th");
                        for (var j = 0; j < abc.length; j++) {
                            arrayuser.push($(abc[j]).text());
                        }
                        var objectUserAll = null;
                        if(arrayuser.length === 0)
                        {
                            objectUserAll = "null";
                        }
                        else
                        {
                            var objectUserAll1 = [];
                            for (var z = 0; z < arrayuser.length; z++) {
                                var array1 = [arrayuser[z]];
                                var list = tbodyList.find("td[id=" + arrayuser[z] + "]");
                                for (var h = 0; h < $(list).length; h++) {
//                                if (h <= 2) {
//                                    array1.push($(list[h]).text());
//                                }
//                                else {
//                                    array1.push($(list[h]).children().val());
//                                }
                                    if (h ==0) {
                                        array1.push($(list[h]).text());
                                    }
                                    else if(h ==1)
                                    {
                                        array1.push($(list[h]).children().val());
                                    }
                                    else if(h ==2)
                                    {
                                        array1.push($(list[h]).text());
                                    }
                                    else
                                    {
                                        array1.push($(list[h]).children().val());
                                    }
                                }
                                objectUserAll1.push(array1);
                            }
                            objectUserAll = objectUserAll1;
                        }
                        var arrayBill = {
                            idClaim: $("input[name=idClaim]").val(),
                            idBill:trialFeeView.idBillWhenUpdateBill,
                            billToCustomer: $("select#chooseCustomer option:selected").val(),
                            invoiceMajorNo:$("input[name=invoiceMajorNo]").val(),
                            coorInsurer:$("input[name=coInsurer]").val(),
                            Total: $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(0)").text(),
                            TotalUpdateInvoice: $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(),
                            FromDate:$("input[name=FromDate]").val(),
                            ToDate:$("input[name=ToDate]").val(),
                            billType: $("input[name=bill-type]:checked").attr("id"),
                            billStatus:$("input[name=bill-status]:checked").attr("id"),
                            ArrayData: objectUserAll
                        };
                        $.post(url + "actionBillOfClaimViewTrialFee", {
                            _token: _token,
                            action: $("input[name=action]").val(),
                            data: arrayBill
                        }, function (data) {
                            console.log(data);
                            if (data["Action"] === "BillClaim") {
                                if (data["Result"] === 1) {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Bill claim success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                    trialFeeView.cancel();
                                    $("input[name=invoiceMajorNo]").val(data["invoiceMajorNoNew"]);
                                }
                                else {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Bill claim no success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                            }
                            else if(data["Action"] === "UpdateClaim")
                            {
                                if (data["Result"] === 1) {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Update claim success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                    trialFeeView.cancel();
                                    $("input[name=invoiceMajorNo]").val(data["invoiceMajorNoNew"]);
                                }
                                else {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Update claim no success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                            }
                            else if(data["Action"] === "ErrorDate")
                            {
                                $("div[id=modalConfirm]").modal("hide");
                                $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("To date is not larger than from date!!!");
                                $("div[id=modalNotification]").modal("show");
                            }
                            else
                            {
                                $("div[id=modalConfirm]").modal("hide");
                                $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("To date is not larger date time now!!!");
                                $("div[id=modalNotification]").modal("show");
                            }
                        })
                },
                loadIBClaim: function () {
                    $.post(url+"viewBillOfClaimByStatus",{_token:_token,idClaim:$("input[name=idClaim]").val(),status:$("input[name=btnStatus]:checked").val()},function(data){
                        var row ="";
                        for(var i = 0;i<data.length;i++)
                        {
                            var tr = "";
                            tr += "<tr id='" + data[i]["idBill"] + "' onclick='trialFeeView.viewDetailIBClaim(this)' style='cursor:pointer'>";
                            tr += "<td>" + data[i]["idBill"] + "</td>";
                            tr += "<td>" + data[i]["customer"] + "</td>";
                            tr += "<td>" + data[i]["status"] + "</td>";
                            tr += "<td>" + data[i]["type"] + "</td>";
                            tr += "<td style='display: none'>" + data[i]["total"] + "</td>";
                            row += tr;
                        }
                        $("tbody[id=tbodyTableBillOfClaim]").empty().append(row);
                    });
                    $("div[id=modalListClaimIB]").modal("show");
                },
                viewDetailIBClaim: function (element) {
                    var total = $(element).find("td:eq(4)").text();
                    trialFeeView.idBillWhenUpdateBill = $(element).attr("id");
                    if($(element).find("td:eq(2)").text()==="Complete")
                    {
                        $("button[name=btnBill]").text("Update Bill ").prop('disabled', true);
                    }
                    else
                    {
                        $("button[name=btnBill]").text("Update Bill ");
                    }
                    $("input[name=action]").val("0");
                    $("select#chooseCustomer").val($(element).find("td:eq(1)").text());
                    trialFeeView.showInformationOfCustomer();
                    $("div[id=modalListClaimIB]").modal("hide");
                    $.post(url+"loadInformationOfBill",{_token:_token,idBill:$(element).attr("id")},function(data)
                    {
                        console.log(data);
                        trialFeeView.showInformationOfCustomer(trialFeeView.codeCustomer);
                        var theadListTaskDetail = $("thead[id=theadTableListTaskDetail]");
                        var tbodyListTaskDetail = $("tbody[id=tbodyTableListTaskDetail]");
                        if(data[0]==="Pending")//nếu bill này đang là bill pending
                        {
                            //insert from date to date
                            var arrayTimeCheckFromDate = data[1]["FromDate"].split(" ");
                            var arrayTimeCheckToDate = data[1]["ToDate"].split(" ");
                            //custom date text box
                            $("input[name=FromDate]").val(trialFeeView.convertStringToDate(arrayTimeCheckFromDate[0])+" "+arrayTimeCheckFromDate[1]).prop("readOnly",true);
                            $("input[name=ToDate]").attr("type","text").val(trialFeeView.convertStringToDate(arrayTimeCheckToDate[0])+" "+arrayTimeCheckToDate[1]).prop("readOnly",true);
                            //load data to table
                            var count = theadListTaskDetail.find("tr:eq(1)").find("th").length;//đếm số user của tag thead
                            var k =0; //Chạy vòng lặp while của từng user có sẵn của claim vàm load thông tin của bill đó
                            do{
                                for(var i = 0;i<count;i++)//chạy vòng lặp for của list time và expense của một user
                                {

                                    if(theadListTaskDetail.find("tr:eq(1)").find("th:eq("+i+")").text() === data[2][k][i]["name"])
                                    {
                                        if(k==0)
                                        {
                                            tbodyListTaskDetail.find("tr:eq(1)").find("td:eq("+i+")").children().empty().val(data[2][k][i]["rate"]);
                                        }
                                        tbodyListTaskDetail.find("tr:eq("+ (k + 3)+")").find("td:eq("+i+")").children().empty().val(data[2][k][i]["value"]);
                                    }
                                }
                                k++;
                            }
                            while(k<data[2].length);
                            //insert total into table total
                            //trialFeeView.loadDataToTableTotal(total);
                            trialFeeView.loadDataToTableTotal();
                        }
                        else
                        {
                            var arrayTimeCheckFromDateCL = data[1]["FromDate"].split(" ");
                            var arrayTimeCheckToDateCL = data[1]["ToDate"].split(" ");
                            $("input[name=FromDate]").val(trialFeeView.convertStringToDate(arrayTimeCheckFromDateCL[0])+" "+arrayTimeCheckFromDateCL[1]).prop("readOnly",true);
                            $("input[name=ToDate]").attr("type","text").val(trialFeeView.convertStringToDate(arrayTimeCheckToDateCL[0])+" "+arrayTimeCheckToDateCL[1]).prop("readOnly",true);
                            //insert data default
                            trialFeeView.clearTable();
                            trialFeeView.loadTableGL();
                            for (var a = 0; a < data[2].length; a++) {
                                theadListTaskDetail.find("tr:eq(1)").append("<th style='text-align: center'>" + data[2][a]["userName"] + "</th>");

                                tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[2][a]["userName"] + ">"+data[2][a]["sumTimeCvChinh"]+"</td>");
                                tbodyListTaskDetail.find("tr:eq(1)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(2)").append("<td id=" + data[2][a]["userName"] + ">" + data[2][a]["rateType"] + "</td>");
                                tbodyListTaskDetail.find("tr:eq(3)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");

                                tbodyListTaskDetail.find("tr:eq(4)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(5)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(6)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'</td>");
                                tbodyListTaskDetail.find("tr:eq(7)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(8)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(9)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(10)").append("<td id=" + data[2][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                for (var b = 0; b < data[3].length; b++) {
                                    switch (b) {
                                        case 0:
                                            tbodyListTaskDetail.find("tr:eq(3)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            tbodyListTaskDetail.find("tr:eq(1)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["rate"]);
                                            break;
                                        case 1:
                                            tbodyListTaskDetail.find("tr:eq(4)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 2:
                                            tbodyListTaskDetail.find("tr:eq(5)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 3:
                                            tbodyListTaskDetail.find("tr:eq(6)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 4:
                                            tbodyListTaskDetail.find("tr:eq(7)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 5:
                                            tbodyListTaskDetail.find("tr:eq(8)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 6:
                                            tbodyListTaskDetail.find("tr:eq(9)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                        case 7:
                                            tbodyListTaskDetail.find("tr:eq(10)").find("td[id="+data[3][b][a]["name"]+"]").children().val(data[3][b][a]["value"]);
                                            break;
                                    }
                                }
                            }
                            //insert total into table total
                            trialFeeView.loadDataToTableTotal();
                            $("button[name=btnBill]").prop("disabled",true);
                        }
                    });
                },
                cancel:function()
                {
                    $("button[name=actionViewListIB]").prop("disabled",true);
                    $("form#trialFee").find("input").val("");
                    $("input[name=ToDate]").prop("readOnly",false).attr("type","date");
                    $("textarea[name=addressCustomer]").val("");
                    $("select[id=chooseCustomer]").val($("select[id=chooseCustomer] option:eq(0)").val());
                    trialFeeView.clearTable();
                    trialFeeView.codeCustomer = null;
                },
                loadTaskDetailByDate:function()
                {
                    $.post(url+"loadTaskDetailByDate",{_token:_token,key:$("input[name=Claim]").val(),fromDate:$("input[name=FromDate]").val(),toDate:$("input[name=ToDate]").val()},function(data)
                    {
                        console.log(data);
                        if(data["listClaimTaskDetail"].length === 0)
                        {
                            trialFeeView.clearTable();
                        }
                        else
                        {
                            trialFeeView.clearTable();
                            trialFeeView.loadTableGL();
                            //Insert data to table list task detail
                            var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                            var theadList = $("thead[id=theadTableListTaskDetail]");
                            for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                                //Insert data to thead of table
                                theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "</th>");
                                //Insert data to tbody of table
                                tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"] + "</td>");
                                tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value=" + data["listClaimTaskDetail"][i]["Time"]["Rate"] + " onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["RateType"] + "</td>");
                                // Time
                                tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #EAE2E2' value='" + data["listClaimTaskDetail"][i]["Time"]["ProfessionalServices"] + "'</td>");
                                //Expense
                                tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyList.find("tr:eq(5)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyList.find("tr:eq(6)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'</td>");
                                tbodyList.find("tr:eq(7)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyList.find("tr:eq(8)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyList.find("tr:eq(9)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                for (var j = 0; j < data["listClaimTaskDetail"][i]["Expense"].length; j++) {
                                    console.log(data["listClaimTaskDetail"][i]["Expense"][j]["Name"]);
                                    switch (data["listClaimTaskDetail"][i]["Expense"][j]["taskCategory"]) {
                                        case "GeneralExp":
                                            tbodyList.find("tr:eq(4)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                        case "CommPhotoExp":
                                            tbodyList.find("tr:eq(5)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                        case "ConsultFeesExp":
                                            tbodyList.find("tr:eq(6)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                        case "TravelRelatedExp":
                                            tbodyList.find("tr:eq(7)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                        case "Disbursements":
                                            tbodyList.find("tr:eq(9)").find("td[id="+data["listClaimTaskDetail"][i]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                    }
                                }
                                tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value="+trialFeeView.sumAllRow(data["listClaimTaskDetail"][i]["Time"]["Name"])+" readonly style='background-color: #EAE2E2'></td>");

                                //insert total into table total sd
                                trialFeeView.loadDataToTableTotal();
                            }
                        }

                    });
                },
                clearTable:function()
                {
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var theadList = $("thead[id=theadTableListTaskDetail]");
                    var tbodyTableGL = $("tbody[id=tbodyGL]");
                    var tbodyTableTotal = $("tbody[id=tbodyListTotal]");
                    $("button[name=btnBill]").prop("disabled",false);
                    var trClick = tbodyList.find("tr");
                    theadList.find("tr:eq(1)").empty();
                    for(var i = 0;i<trClick.length;i++)
                    {
                        $(trClick[i]).empty();
                    }
                    for(var j = 0;j<tbodyTableGL.find("tr").length;j++)
                    {
                        $(tbodyTableGL.find("tr")[j]).empty();
                    }
                    for(var k = 0;k<tbodyTableTotal.find("tr").length;k++)
                    {
                        $(tbodyTableTotal.find("tr")[k]).empty();
                    }
                }

            };
        }
        else {

        }
    })
</script>