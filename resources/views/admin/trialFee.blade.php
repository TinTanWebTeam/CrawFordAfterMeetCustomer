    {{--Modal Notifications--}}
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

{{--Modal Confirm Pending--}}
<div aria-hidden="true" class="modal fade" id="modalConfirmBillPending" role="basic" style="display: none;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                </button>
                <h4 class="modal-title">
                    Confirm
                </h4>
            </div>
            <div class="modal-body" id="modalContent">
               Data can have overided when you bill pending, would you like do this ?
            </div>
            <div class="modal-footer">
                <button class="btn dark btn-outline" data-dismiss="modal" name="modalClose" type="button">
                    Close
                </button>
                <button class="btn green" name="modalAgree" type="button" onclick="trialFeeView.Bill()">
                    Agree
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{--End Modal Confirm Pending--}}

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
        <div class="col-sm-5">
            <div class="row" style="border: 1px solid #A9A6A6;padding: 10px 10px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 15%" class="text-right">
                            <h5>Claim:</h5>
                        </td>
                        <td colspan="3">
                            <input type="text" name="Claim" id="Claim" onkeypress="trialFeeView.chooseClaimWhenUseEventEnterKey(event)">
                            <input type="text" name="action" id="action" style="display: none" value="1">
                            <input type="text" name="idClaim" id="idClaim" style="display: none">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%" class="text-right">
                            <h5>From Date:</h5>
                        </td>
                        <td colspan="3">
                            <input type="date" name="FromDate" id="FromDate" readonly style="background-color: #F3EDED">
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 15%" class="text-right">
                            <h5>To Date:</h5>
                        </td>
                        <td colspan="3">
                            <input type="date" name="ToDate" id="ToDate"  value="{{date('Y-m-d')}}" onchange="trialFeeView.loadTaskDetailByDate()">
                        </td>
                    </tr>
                </table>
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
                 style="border: 1px solid #A9A6A6;padding: 10px 10px;margin-left: 1px;height: 370px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 10%">
                            <h5>Bill To:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 70%;background-color: #F3EDED" id="billTo" name="billTo" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Policy #:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 70%;background-color: #F3EDED" id="policy" name="policy" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Officer:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 70%" id="officer" name="officer">
                        </td>
                    </tr>
                </table>
                {{--Table bill--}}
                <table class="table table-bordered" id="tableBillByStatus">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Type</th>
                        <th style="display: none">Total</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTableBillByStatus">

                    </tbody>
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
        <div class="row">
            <div class="col-sm-4">
                <h4>Discount:</h4>
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="discount" onkeyup="trialFeeView.discountBill(event)">
            </div>
            <div class="col-sm-2">
                <h5 style="text-align: left">%</h5>
            </div>
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
                timeFrom:null,
                timeTo:null,
                dateDefault:$("input[name=ToDate]").val(),
                codeCustomer:null,
                idBillWhenUpdateBill:null,
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" +currentDate.getDate()).slice(-2) +"/"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)+"/"
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
                formatInputCurrencyTableDataUser:function()
                {
                    var trTableDataUser = $("#tbodyTableListTaskDetail").find("tr");
                    trTableDataUser.eq(1).children().children().formatCurrency({roundToDecimalPlace:0});
                    for(var i =3;i<trTableDataUser.length;i++)
                    {
                        $(trTableDataUser[i]).children().children().formatCurrency({roundToDecimalPlace:0});
                    }
                },
                formatInputCurrencyTableTotal:function()
                {
                    var trTableDataTotal = $("#tbodyListTotal").find("tr");
                    trTableDataTotal.eq(1).children().formatCurrency({roundToDecimalPlace:0});
                    for(var i =3;i<trTableDataTotal.length;i++)
                    {
                        $(trTableDataTotal[i]).find("td:eq(0)").formatCurrency({roundToDecimalPlace:0});
                    }
                    for(var i =3;i<trTableDataTotal.length;i++)
                    {
                        $(trTableDataTotal[i]).find("td:eq(1)").children().formatCurrency({roundToDecimalPlace:0});
                    }

                },
                chooseClaimWhenUseEventEnterKey: function (e) {
                    $("button[name=btnBill]").text("Bill Claim").prop("disabled",false);
                    $("input[name=ToDate]").val("").prop("readOnly",false);
                    trialFeeView.clearTable();
                    $("button[name=actionViewListIB]").prop("disabled",false);
                    if (e.keyCode === 13) {
                        $.post(url + "chooseClaimWhenUseEventEnter", {
                            _token: _token,
                            key: $("input[name=Claim]").val()
                        }, function (data) {
                            if (data === "Error") {
                                $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Claim is not exist!");
                                $("div[id=modalNotification]").modal("show");
                            }
                            else {
                                var arrayTimeCheck = data["check"].split(" ");
                                trialFeeView.timeFrom = arrayTimeCheck[1];//save time to variable temp to bill
                                $("input[name=FromDate]").val(arrayTimeCheck[0]);
                                $("input[name=idClaim]").val(data["Claim"]["id"]);
                                $("input[name=insured]").val(data["Claim"]["insuredFirstName"]+" "+data["Claim"]["insuredLastName"]);
                                $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                                $("input[name=branch]").val(data["Claim"]["branchCode"]);
                                $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                                $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                                $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                                $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);
                                //load customer
                                $("input[name=billTo]").val(data["customer"]);
                                $("input[name=policy]").val(data["policy"]);
                                $("input[name=officer]").val(data["officer"]);
                                trialFeeView.loadIBClaim();
                                //Insert data to table list task detail

                                if(data["listClaimTaskDetail"].length !== 0) {
                                    //Insert table GL
                                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                                    var theadList = $("thead[id=theadTableListTaskDetail]");
                                    trialFeeView.clearTable();
                                    trialFeeView.loadTableGL();
                                    for (var i = 0; i < data["listClaimTaskDetail"].length; i++)
                                    {
                                        //Insert data to thead of table
                                        theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "</th>");
                                        //Insert data to tbody of table
                                        if(data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"]===null)
                                        {
                                            tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "></td>");
                                        }
                                        else
                                        {
                                            tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"] + "</td>");
                                        }
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
                                                tbodyList.find("tr:eq(9)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                                break;
                                            }
                                        }
                                        tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value="+trialFeeView.sumAllRow(data["listClaimTaskDetail"][i]["Time"]["Name"])+" readonly style='background-color: #EAE2E2'></td>");
                                        //insert total into table total
                                        trialFeeView.loadDataToTableTotal();
                                        //$("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().prop("readOnly",false).css("background-color","");

                                    }
                                    trialFeeView.formatInputCurrencyTableTotal();
                                    trialFeeView.formatInputCurrencyTableDataUser();
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
                    for(var i= 3;i<=trSum.length - 2;i++)
                    {
                        sum += Number($(trSum[i]).find("td[id="+row+"]").children().val());
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
                                //sum += $(trSum[j]).find('input').val();
                            }
                            else {
                                sum += Number($(trSum[j]).text());
                                //sum += $(trSum[j]).text();
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
                            //if ($("input[name=action]").val() === "0") {
                                if (z === 10) {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' onchange='trialFeeView.discountPrecent(this)' value=" + arrSum[h] + "></td>");
                                }
                                else {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + arrSum[h] + "></td>");
                                    h++;
                                }
                            //}
//                            else {
//                                alert(123);
//                                tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + arrSum[h] + "></td>");
//                                h++;
//                            }
                        }
                    }

                },
                loadDataToTableTotal1: function () {
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
                                sum += Number($(trSum[j]).find('input').val().replace(/,/g,""));
                                //sum += $(trSum[j]).find('input').val();
                            }
                            else {
                                sum += Number($(trSum[j]).text().replace(/,/g,""));
                                //sum += $(trSum[j]).text();
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
                            if (z === 10) {
                                tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' onchange='trialFeeView.discountPrecent(this)' value=" + arrSum[h] + "></td>");
                            }
                            else {
                                tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#EAE2E2' value=" + arrSum[h] + "></td>");
                                h++;
                            }
                        }
                    }

                },
                sumTotalValueofInputOfTableListTaskDetail: function (element) {
                    var rateDefault = $(element).attr("value");
                    if(parseFloat($(element).val())<0)
                    {
                        $(element).val(rateDefault);
                        $(element).formatCurrency({roundToDecimalPlace:0});
                    }
                    else
                    {
                        $(element).formatCurrency({roundToDecimalPlace:0});
                        var tbodyListTaskDetail = $("tbody[id=tbodyTableListTaskDetail]");

                        var rate = tbodyListTaskDetail.find("tr:eq(1)").find("td[id="+$(element).parent().attr("id")+"]").children().val().replace(/,/g,"");
                        var time = tbodyListTaskDetail.find("tr:eq(0)").find("td[id="+$(element).parent().attr("id")+"]").text();

                        tbodyListTaskDetail.find("tr:eq(3)").find("td[id="+$(element).parent().attr("id")+"]").children().val(rate * parseFloat(time));
                        var trList = tbodyListTaskDetail.find("tr");
                        var sum = 0;
                        for (var i = 0; i < trList.length; i++) {
                            if (i > 2 && i < 10) {
                                sum += parseFloat($(trList[i]).find("td[id=" + $(element).parent().attr("id") + "]").children().val().replace(/,/g,""));
                            }
                        }

                        tbodyListTaskDetail.find("tr:eq(10)").find("td[id=" + $(element).parent().attr("id") + "]").children().val(sum);
                        trialFeeView.loadDataToTableTotal1(element);
                        //Format currency
                        trialFeeView.formatInputCurrencyTableTotal();
                        trialFeeView.formatInputCurrencyTableDataUser();
                    }


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
                                if (h ==0) {
                                    array1.push($(list[h]).text().replace(/,/g,""));
                                }
                                else if(h ==1)
                                {
                                    array1.push($(list[h]).children().val().replace(/,/g,""));
                                }
                                else if(h ==2)
                                {
                                    array1.push($(list[h]).text().replace(/,/g,""));
                                }
                                else
                                {
                                    array1.push($(list[h]).children().val().replace(/,/g,""));
                                }
                            }
                            objectUserAll1.push(array1);
                        }
                        objectUserAll = objectUserAll1;
                    }
                    var arrayBill = {
                        idClaim: $("input[name=idClaim]").val(),
                        idBill:trialFeeView.idBillWhenUpdateBill,
                        billToCustomer: $("input[name=billTo]").val(),
                        coorInsurer:$("input[name=officer]").val(),
                        Total: $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val().replace(/,/g,""),
                        FromDate:$("input[name=FromDate]").val() +" "+trialFeeView.timeFrom,
                        ToDate:$("input[name=ToDate]").val(),
                        billType: $("input[name=bill-type]:checked").attr("id"),
                        billStatus:$("input[name=bill-status]:checked").attr("id"),
                        ArrayData: objectUserAll
                    };
                    if(objectUserAll==="null")
                    {
                        $("div[id=modalConfirm]").modal("hide");
                        $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Data is not correct!!!");
                        $("div[id=modalNotification]").modal("show");
                    }
                    else
                    {
                        $.post(url + "Bill", {
                            _token: _token,
                            action: $("input[name=action]").val(),
                            data: arrayBill
                        }, function (data) {
                            if (data["Action"] === "AddNew") { //AddNew
                                if (data["Error"] === "ToDate<FromDate") {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("ToDate is  not smaller than FromDate!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else if (data["Error"] === "ToDate>TimeNow")
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("ToDate is  not lager than date now!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else if(data["Error"]==="InvoiceMajorNoSame")
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("This invoice has exist!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Bill claim success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                    trialFeeView.cancel();
                                    $("input[name=discount]").val("");
                                }
                            }
                            else //UPdate
                            {
                                if (data["Error"] === "ToDate<FromDate") {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("ToDate is  not smaller than FromDate!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else if(data["Error"]==="InvoiceMajorNoSame")
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("This invoice has exist!!!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else if(data["Error"]==="ClaimClose")
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("This claim has closed!");
                                    $("div[id=modalNotification]").modal("show");
                                }
                                else
                                {
                                    $("div[id=modalConfirm]").modal("hide");
                                    $("div[id=modalNotification]").find("div[class=modal-body]").find("h4").text("Update claim success!!!");
                                    $("div[id=modalNotification]").modal("show");
                                    trialFeeView.cancel();
                                    trialFeeView.loadIBClaimConfirnm();
                                    $("input[name=discount]").val("");
                                }
                            }
                        })
                    }

                },
                loadIBClaimConfirnm:function()
                {
                    $.post(url+"viewBillOfClaimByStatus",{_token:_token,idClaim:$("input[name=idClaim]").val()},function(view){
                        $("tbody[id=tbodyTableBillByStatus]").empty().append(view);
                    });
                },
                loadIBClaim: function () {
                    trialFeeView.loadIBClaimConfirnm();
                },
                viewDetailIBClaim: function (element) {
                    var total = $(element).find("td:eq(4)").text();
                    trialFeeView.idBillWhenUpdateBill = $(element).attr("id");
                    $("input[name=action]").val("0");
                    $.post(url+"loadInformationOfBill",{_token:_token,idBill:$(element).attr("id")},function(data)
                    {
                        console.log(data);
                        $("input[id=pending]").prop("disabled",true).prop("checked",false);
                        trialFeeView.showInformationOfCustomer(trialFeeView.codeCustomer);
                        var theadListTaskDetail = $("thead[id=theadTableListTaskDetail]");
                        var tbodyListTaskDetail = $("tbody[id=tbodyTableListTaskDetail]");
                        if(data[0]==="Pending")//nếu bill này đang là bill pending
                        {
                            //if pending at status lock is disabled button update
                            if(data[1]==="Lock")
                            {
                                $("button[name=btnBill]").text("Update Bill").prop("disabled",true);
                            }
                            else
                            {
                                $("button[name=btnBill]").text("Update Bill").prop("disabled",false);
                            }
                            //insert from date to date
                            var arrayTimeCheckFromDate = data[2]["FromDate"].split(" ");
                            var arrayTimeCheckToDate = data[2]["ToDate"].split(" ");
                            //Pass data time in properties
                            trialFeeView.timeFrom = arrayTimeCheckFromDate[1];
                            trialFeeView.timeTo = arrayTimeCheckToDate[1];
                            //custom date text box
                            $("input[name=FromDate]").val(arrayTimeCheckFromDate[0]).prop("readOnly",true);
                            $("input[name=ToDate]").val(arrayTimeCheckToDate[0]).prop("readOnly",true);
                            trialFeeView.clearTable();
                            trialFeeView.loadTableGL();
                            for (var a = 0; a < data[3].length; a++) {
                                theadListTaskDetail.find("tr:eq(1)").append("<th style='text-align: center'>" + data[3][a]["userName"] + "</th>");
                                //check null sumtime
                                if(data[3][a]["sumTimeCvChinh"]!==null)
                                {
                                    tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[3][a]["userName"] + ">"+data[3][a]["sumTimeCvChinh"]+"</td>");
                                }
                                else
                                {
                                    tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[3][a]["userName"] + "></td>");
                                }
                                tbodyListTaskDetail.find("tr:eq(1)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(2)").append("<td id=" + data[3][a]["userName"] + ">" + data[3][a]["rateType"] + "</td>");
                                tbodyListTaskDetail.find("tr:eq(3)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");

                                tbodyListTaskDetail.find("tr:eq(4)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(5)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(6)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'</td>");
                                tbodyListTaskDetail.find("tr:eq(7)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(8)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(9)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                tbodyListTaskDetail.find("tr:eq(10)").append("<td id=" + data[3][a]["userName"] + "><input type='text' id='' name='' value='0' readonly style='background-color: #EAE2E2'></td>");
                                for (var b = 0; b < data[4].length; b++) {
                                    switch (b) {
                                        case 0:
                                            tbodyListTaskDetail.find("tr:eq(3)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            tbodyListTaskDetail.find("tr:eq(1)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["rate"]);
                                            break;
                                        case 1:
                                            tbodyListTaskDetail.find("tr:eq(4)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 2:
                                            tbodyListTaskDetail.find("tr:eq(5)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 3:
                                            tbodyListTaskDetail.find("tr:eq(6)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 4:
                                            tbodyListTaskDetail.find("tr:eq(7)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 5:
                                            tbodyListTaskDetail.find("tr:eq(8)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 6:
                                            tbodyListTaskDetail.find("tr:eq(9)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                        case 7:
                                            tbodyListTaskDetail.find("tr:eq(10)").find("td[id="+data[4][b][a]["name"]+"]").children().val(data[4][b][a]["value"]);
                                            break;
                                    }
                                }
                            }
                            trialFeeView.loadDataToTableTotal();
                            //load total
                            $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(data[5]);
                            trialFeeView.formatInputCurrencyTableTotal();
                            trialFeeView.formatInputCurrencyTableDataUser();
                        }
                        else
                        {
                            $("button[name=btnBill]").text("Update Bill");
                            var arrayTimeCheckFromDateCL = data[1]["FromDate"].split(" ");
                            var arrayTimeCheckToDateCL = data[1]["ToDate"].split(" ");
                            //Pass date time in properties
                            trialFeeView.timeFrom = arrayTimeCheckFromDateCL[1];
                            trialFeeView.timeTo = arrayTimeCheckFromDateCL[1];
                            //insert date in text box
                            $("input[name=FromDate]").val(arrayTimeCheckFromDateCL[0]).prop("readOnly",true);
                            $("input[name=ToDate]").val(arrayTimeCheckToDateCL[0]).prop("readOnly",true);
                            //insert data default
                            trialFeeView.clearTable();
                            trialFeeView.loadTableGL();
                            for (var a = 0; a < data[2].length; a++) {
                                theadListTaskDetail.find("tr:eq(1)").append("<th style='text-align: center'>" + data[2][a]["userName"] + "</th>");
                                if(data[2][a]["sumTimeCvChinh"]!==null)
                                {
                                    tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[2][a]["userName"] + ">"+data[2][a]["sumTimeCvChinh"]+"</td>");

                                }
                                else{
                                    tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[2][a]["userName"] + "></td>");

                                }
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
                            //load total
                            $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(data[4]);
                            trialFeeView.formatInputCurrencyTableTotal();
                            trialFeeView.formatInputCurrencyTableDataUser();
                        }
                    });
                },
                cancel:function()
                {
                    $("button[name=btnBill]").text("Bill Claim").prop("disabled",false);

                    trialFeeView.timeFrom = null;
                    trialFeeView.timeTo = null;
                    $("button[name=actionViewListIB]").prop("disabled",true);
                    $("form#trialFee").find("input[type=text]").val("");
                    $("input[name=ToDate]").prop("readOnly",false).val("");
                    $("input[name=FromDate]").val("");

                    $("textarea[name=addressCustomer]").val("");
                    $("select[id=chooseCustomer]").val($("select[id=chooseCustomer] option:eq(0)").val());
                    trialFeeView.clearTable();
                    trialFeeView.codeCustomer = null;
                    $("tbody[id=tbodyTableBillByStatus]").empty();
                    $("input[id=pending]").prop("disabled",false).prop("checked",true);

                },
                loadTaskDetailByDate:function()
                {
                    $.post(url+"loadTaskDetailByDate",{_token:_token,key:$("input[name=Claim]").val(),fromDate:$("input[name=FromDate]").val()+" "+trialFeeView.timeFrom,toDate:$("input[name=ToDate]").val()},function(data)
                    {
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
                                if(data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"]!==null)
                                {
                                    tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + ">" + data["listClaimTaskDetail"][i]["Time"]["SumTimeCVChinh"] + "</td>");
                                }
                                else
                                {
                                    tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "></td>");
                                }
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
                                            tbodyList.find("tr:eq(9)").find("td[id="+data["listClaimTaskDetail"][i]["Expense"][j]["Name"]+"]").children().val(data["listClaimTaskDetail"][i]["Expense"][j]["expenseAmount"]);
                                            break;
                                    }
                                }
                                tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Time"]["Name"] + "><input type='text' id='' name='' value="+trialFeeView.sumAllRow(data["listClaimTaskDetail"][i]["Time"]["Name"])+" readonly style='background-color: #EAE2E2'></td>");

                                //insert total into table total sd
                                trialFeeView.loadDataToTableTotal();
                            }
                            trialFeeView.formatInputCurrencyTableTotal();
                            trialFeeView.formatInputCurrencyTableDataUser();
                        }

                    });
                },
                clearTable:function()
                {
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var theadList = $("thead[id=theadTableListTaskDetail]");
                    var tbodyTableGL = $("tbody[id=tbodyGL]");
                    var tbodyTableTotal = $("tbody[id=tbodyListTotal]");
//                    $("button[name=btnBill]").prop("disabled",false);
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
                },
                discountBill:function()
                {
                    var actualBill = $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(0)").text().replace(/,/g,"");
                    if(parseFloat($("input[name=discount]").val()) <=100 && parseFloat($("input[name=discount]").val()) >0) {
                        var inputDiscount = $("input[name=discount]").val().replace("%", "");
                        var discount = parseFloat(actualBill - (parseFloat((actualBill * inputDiscount) / 100)));
                        $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(discount).formatCurrency({roundToDecimalPlace: 0});
                    }
                    else
                    {
                        $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(actualBill).formatCurrency({roundToDecimalPlace: 0});
                        $("input[name=discount]").val("");
                    }
                },
                discountPrecent:function(element)
                {
                    if(parseFloat($(element).val()) < 0)
                    {
                        $(element).val($(element).attr("value")).formatCurrency({roundToDecimalPlace: 0});
                    }
                    else
                    {
                        var invoiceBill =  $(element).val();
                        var actualBill = $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(0)").text().replace(/,/g,"");
                        $("input[name=discount]").val(100 - Math.floor((invoiceBill*100)/actualBill));
                        $(element).formatCurrency({roundToDecimalPlace: 0});

                    }

                }

            };
        }
        else {

        }
    })
</script>