{{--Modal Confirm--}}
<div aria-hidden="true" class="modal fade" id="modalConfirm" role="basic" style="display: none;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                </button>
                <h4 class="modal-title">
                    Modal Title
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
        <div class="col-sm-5" style="padding-top: 15px">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5 style="text-align: right">Claim#:</h5>
                                    <input name="action" id="action" style="display: none" value="1">
                                    <input name="idClaim" id="idClaim" style="display: none">
                                </div>
                                <div class="col-sm-7">
                                    <input name="Claim" id="Claim"
                                           onkeypress="trialFeeView.chooseClaimWhenUseEventEnterKey(event)" style="margin-left: 4px;display: inline-block">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-default" onclick="trialFeeView.loadIBClaim()"
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
                            <h5 style="text-align: right">From Date:</h5>
                        </div>
                        <div class="col-sm-7">
                            <input type="date" name="FromDate" id="FromDate" readonly style="margin-left: 4px">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 style="text-align: right">To Date:</h5>
                        </div>
                        <div class="col-sm-7">
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
                            <input type="text" name="insured" id="insured">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Claim Type:</h5>
                        </td>
                        <td>
                            <input type="text" name="claimTypeCode" id="claimTypeCode">
                        </td>
                        <td class="text-right">
                            <h5>Branch:</h5>
                        </td>
                        <td>
                            <input type="text" name="branch" id="branch">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Loss Date:</h5>
                        </td>
                        <td>
                            <input type="date" name="lossDate" id="lossDate">
                        </td>
                        <td class="text-right">
                            <h5>Initial Reserve:</h5>
                        </td>
                        <td>
                            <input type="text" name="initialReserve" id="initialReserve">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Received:</h5>
                        </td>
                        <td>
                            <input type="date" name="receiveDate" id="receiveDate">
                        </td>
                        <td class="text-right">
                            <h5>Current Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="currentRes" id="currentRes">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Opened:</h5>
                        </td>
                        <td>
                            <input type="date" name="openDate" id="openDate">
                        </td>
                        <td class="text-right">
                            <h5>Adjust Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="adjustRes" id="adjustRes">
                        </td>
                    </tr>
                    <tr>
                        <td class="text-right">
                            <h5>Estimated:</h5>
                        </td>
                        <td>
                            <input type="text" name="estimated" id="estimated">
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
                            <select name="" id="chooseCustomer" style="width:auto"
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
                </table>
                <div class="row" style="margin-top: 30px">
                    <div class="col-sm-12 text-right">
                        <h4 style="display: inline-block;">Interim Bill</h4>&nbsp;&nbsp;<input type="radio" name="bill-type" id="interim_bill" checked style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                        <h4 style="display: inline-block;">Final Bill</h4>&nbsp;&nbsp;<input type="radio" name="bill-type" id="final_bill" style="display: inline-block;width: 20px;height: 20px;padding-top: 5px">
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
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
                    <th style="background-color: blue;color: white;text-align: center">GL</th>
                </tr>
                <tr>
                    <th style="text-align: center">Account</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 170px">Hours</td>
                </tr>
                <tr>
                    <td>Rate</td>
                </tr>
                <tr>
                    <td>Period</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Professional services</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">General Exp</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Comm && Photo Exp</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Consult Fees && Exp</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Travel Related Exp</td>

                </tr>
                <tr>
                    <td style="width: 266px;height:43px">GST-free Disb</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Disbursements</td>
                </tr>
                <tr>
                    <td style="width: 266px;height:43px">Total</td>
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
                    <th colspan="4" style="text-align: center;background-color: blue;color: white">Branch/Adjuster
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
                    <th colspan="2" style="background-color: blue;color: white;text-align: center">Total</th>
                </tr>
                <tr>
                    <th style="text-align: center">Actual</th>
                    <th style="text-align: center">Invoice</th>
                </tr>
                </thead>
                <tbody id="tbodyListTotal">
                <tr>

                </tr>
                <tr>
                    <td>---</td>
                    <td>---</td>
                </tr>
                <tr>
                    <td>---</td>
                    <td>---</td>
                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
                <tr>

                </tr>
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
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = currentDate.getFullYear() + "-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-"
                            + ("0" + currentDate.getDate()).slice(-2);
                    return datetime;
                },
                chooseClaimWhenUseEventEnterKey: function (e) {
                    if (e.keyCode === 13) {
                        console.log($("input[name=Claim]").val());
                        $.post(url + "chooseClaimWhenUseEventEnter", {
                            _token: _token,
                            key: $("input[name=Claim]").val(),
                            id: ""
                        }, function (data) {
                            console.log(data);
                            if (data["Claim"] === "") {
                                alert("This claim has already bill! Can't find it!!!");
                            }
                            else {
                                $("input[name=FromDate]").val(trialFeeView.convertStringToDate(data["check"]));
                                $("input[name=idClaim]").val(data["Claim"]["id"]);
                                $("input[name=insured]").val(data["Claim"]["insuredFirstName"]+" "+data["Claim"]["insuredLastName"]);
                                $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                                $("input[name=branch]").val(data["Claim"]["branchCode"]);
                                $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                                $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                                $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                                $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);

                                //Insert data to table list task detail
                                var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                                var theadList = $("thead[id=theadTableListTaskDetail]");
                                trialFeeView.clearTable();
                                for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                                    //Insert data to thead of table
                                    theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Name"] + "</th>");
                                    //Insert data to tbody of table
                                    tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + (parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVChinh"])) + "</td>");
                                    tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">USD" + data["listClaimTaskDetail"][i]["Rate"] + "</td>");
                                    tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + data["listClaimTaskDetail"][i]["RateType"] + "</td>");
                                    // CV ch�nh v� CV ph?
                                    tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["ProfessionalServices"] + "'</td>");
                                    tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["Expense"] + "'</td>");
                                    // CV th�m
                                    tbodyList.find("tr:eq(5)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                    tbodyList.find("tr:eq(6)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                    tbodyList.find("tr:eq(7)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                    tbodyList.find("tr:eq(8)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                    tbodyList.find("tr:eq(9)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                    tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + (parseFloat(data["listClaimTaskDetail"][i]["ProfessionalServices"]) + parseFloat(data["listClaimTaskDetail"][i]["Expense"])) + "'></td>");
                                }
                                //insert total into table total
                                trialFeeView.loadDataToTableTotal(data);
                            }
                        });
                    }
                },
                loadDataToTableTotal: function (data) {
                    var arrSum = [];
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var tbodyListTotal = $("tbody[id=tbodyListTotal]");
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
                                if (z === 10) {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' value=" + data + "></td>");
                                    h++;
                                }
                                else {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#AFA3A3' value=" + arrSum[h] + "></td>");
                                    h++;
                                }
                            }
                            else {
                                tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#AFA3A3' value=" + arrSum[h] + "></td>");
                                h++;
                            }
                        }
                    }
                },
                showInformationOfCustomer: function () {
                    $.post(url + "showInformationOfCustomer", {
                        _token: _token,
                        idCustomer: $("select#chooseCustomer option:selected").val()
                    }, function (data) {
                        console.log(data);
                        $("textarea[name=addressCustomer]").val(data["address"]);
                        $("input[name=insurerCustomer]").val(data["fullName"]);

                    });
                },
                sumTotalValueofInputOfTableListTaskDetail: function (element) {
                    var trList = $("tbody[id=tbodyTableListTaskDetail]").find("tr");
                    var sum = 0;
                    for (var i = 0; i < trList.length; i++) {
                        if (i > 2 && i < 10) {
                            sum += parseFloat($(trList[i]).find("td[id=" + $(element).parent().attr("id") + "]").children().val());
                        }
                    }
                    $("tbody[id=tbodyTableListTaskDetail]").find("tr:eq(10)").find("td[id=" + $(element).parent().attr("id") + "]").children().val(sum);
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
                    console.log(arrayuser);
                    var objectUserAll = [];
                    for (var z = 0; z < arrayuser.length; z++) {
                        var array1 = [arrayuser[z]];
                        var list = tbodyList.find("td[id=" + arrayuser[z] + "]");
                        for (var h = 0; h < $(list).length; h++) {
                            if (h <= 2) {
                                array1.push($(list[h]).text());
                            }
                            else {
                                array1.push($(list[h]).children().val());
                            }
                        }
                        objectUserAll.push(array1);
                    }
                    console.log(objectUserAll);

                    var arrayBill = {
                        idClaim: $("input[name=idClaim]").val(),
                        billToCustomer: $("select#chooseCustomer option:selected").val(),
                        Total: $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(0)").text(),
                        TotalUpdateInvoice: $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().val(),
                        toDate:$("input[name=ToDate]").val(),
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
                        $("div[id=modalConfirm]").find("div[class=modal-footer]").hide();
                        if (data["Action"] === "BillClaim") {
                            if (data["Result"] === 1) {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Bill claim success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Bill claim no success!!!")
                                $("div[id=modalConfirm]").modal("show");
                            }
                        }
                        else {
                            if (data["Result"] === 1) {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Update claim success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Update claim no success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                        }
                    })
                },
                loadIBClaim: function () {
                    $.post(url+"viewBillOfClaimByStatus",{_token:_token,idClaim:$("input[name=idClaim]").val(),status:$("input[name=btnStatus]:checked").val()},function(data){
                        console.log(data);
                        var row ="";
                        for(var i = 0;i<data.length;i++)
                        {
                            var tr = "";
                            tr += "<tr id='" + data[i]["idBill"] + "' onclick='trialFeeView.viewDetailIBClaim(this)' style='cursor:pointer'>";
                            tr += "<td>" + data[i]["idBill"] + "</td>";
                            tr += "<td>" + data[i]["customer"] + "</td>";
                            tr += "<td>" + data[i]["status"] + "</td>";
                            tr += "<td style='display: none'>" + data[i]["total"] + "</td>";
                            row += tr;
                        }
                        $("tbody[id=tbodyTableBillOfClaim]").empty().append(row);
                    });
                    $("div[id=modalListClaimIB]").modal("show");
                },
                viewDetailIBClaim: function (element) {
                    var total = $(element).find("td:eq(3)").text();
                    console.log($(element).find("td:eq(2)").text());
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
                        var theadListTaskDetail = $("thead[id=theadTableListTaskDetail]");
                        var tbodyListTaskDetail = $("tbody[id=tbodyTableListTaskDetail]");
                        if(data[0]==="Pending")
                        {
                            $("input[name=FromDate]").val(trialFeeView.convertStringToDate(data[1]["FromDate"])).prop("readOnly",true);
                            $("input[name=ToDate]").val(trialFeeView.convertStringToDate(data[1]["ToDate"])).prop("readOnly",true);
                            //load data to table
                            var count = theadListTaskDetail.find("tr:eq(1)").find("th").length;
                            var k =0;
                            do{
                                for(var i = 0;i<count;i++)
                                {
                                    //console.log(data[k][i]["name"]);
                                    console.log(theadListTaskDetail.find("tr:eq(1)").find("th:eq("+i+")").text());
                                    if(theadListTaskDetail.find("tr:eq(1)").find("th:eq("+i+")").text() === data[2][k][i]["name"])
                                    {
                                        tbodyListTaskDetail.find("tr:eq("+ (k + 3)+")").find("td:eq("+i+")").children().empty().val(data[2][k][i]["value"]);
                                    }
                                }
                                k++;
                            }
                            while(k<data[2].length);
                            //insert total into table total
                            trialFeeView.loadDataToTableTotal(total);
                        }
                        else
                        {
                            $("input[name=FromDate]").val(trialFeeView.convertStringToDate(data[1]["FromDate"])).prop("readOnly",true);
                            $("input[name=ToDate]").val(trialFeeView.convertStringToDate(data[1]["ToDate"])).prop("readOnly",true);
                            //insert data default
                            trialFeeView.clearTable();
                            for (var i = 0; i < data[2].length; i++) {
                                //Insert data to thead of table
                                theadListTaskDetail.find("tr:eq(1)").append("<th style='text-align: center'>" + data[2][i]["Name"] + "</th>");
                                //Insert data to tbody of table
                                tbodyListTaskDetail.find("tr:eq(0)").append("<td id=" + data[2][i]["Name"] + ">" + (parseFloat(data[2][i]["SumTimeCVChinh"])) + "</td>");
                                tbodyListTaskDetail.find("tr:eq(1)").append("<td id=" + data[2][i]["Name"] + ">USD" + data[2][i]["Rate"] + "</td>");
                                tbodyListTaskDetail.find("tr:eq(2)").append("<td id=" + data[2][i]["Name"] + ">" + data[2][i]["RateType"] + "</td>");
                                // CV ch�nh v� CV ph?
                                tbodyListTaskDetail.find("tr:eq(3)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data[2][i]["ProfessionalServices"] + "'</td>");
                                tbodyListTaskDetail.find("tr:eq(4)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data[2][i]["Expense"] + "'</td>");
                                // CV th�m
                                tbodyListTaskDetail.find("tr:eq(5)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(6)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(7)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(8)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(9)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyListTaskDetail.find("tr:eq(10)").append("<td id=" + data[2][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + (parseFloat(data[2][i]["ProfessionalServices"]) + parseFloat(data[2][i]["Expense"])) + "'></td>");
                            }
                            //insert total into table total
                            trialFeeView.loadDataToTableTotal(data);
                            //insert data exp
                            var count = theadListTaskDetail.find("tr:eq(1)").find("th").length;
                            var k =0;
                            do{
                                for(var i = 0;i<count;i++)
                                {
                                    //console.log(data[k][i]["name"]);
                                    console.log(theadListTaskDetail.find("tr:eq(1)").find("th:eq("+i+")").text());
                                    if(theadListTaskDetail.find("tr:eq(1)").find("th:eq("+i+")").text() === data[3][k][i]["name"])
                                    {
                                        tbodyListTaskDetail.find("tr:eq("+ (k + 3)+")").find("td:eq("+i+")").children().empty().val(data[3][k][i]["value"]);
                                    }
                                }
                                k++;
                            }
                            while(k<data[3].length);
                            //insert total into table total
                            trialFeeView.loadDataToTableTotal(total);
                            $("tbody[id=tbodyListTotal]").find("tr:eq(10)").find("td:eq(1)").children().prop("readOnly",true).css("background-color","#AFA3A3");
                        }


                    });
                },
                cancel:function()
                {
                    if($("button[name=action]").val()==="0")
                    {
                        trialFeeView.chooseClaimWhenUseEventEnterKey();
                    }
                },
                loadTaskDetailByDate:function()
                {
                    $.post(url+"loadTaskDetailByDate",{_token:_token,key:$("input[name=Claim]").val(),date:$("input[name=ToDate]").val()},function(data)
                    {
                        trialFeeView.clearTable();
                        console.log(data["listClaimTaskDetail"]);
                        //Insert data to table list task detail
                        var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                        var theadList = $("thead[id=theadTableListTaskDetail]");
                        for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                            //Insert data to thead of table
                            theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Name"] + "</th>");
                            //Insert data to tbody of table
                            tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + (parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVChinh"])) + "</td>");
                            tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">USD" + data["listClaimTaskDetail"][i]["Rate"] + "</td>");
                            tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + data["listClaimTaskDetail"][i]["RateType"] + "</td>");
                            // CV ch�nh v� CV ph?
                            tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["ProfessionalServices"] + "'</td>");
                            tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["Expense"] + "'</td>");
                            // CV th�m
                            tbodyList.find("tr:eq(5)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                            tbodyList.find("tr:eq(6)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                            tbodyList.find("tr:eq(7)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                            tbodyList.find("tr:eq(8)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                            tbodyList.find("tr:eq(9)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                            tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + (parseFloat(data["listClaimTaskDetail"][i]["ProfessionalServices"]) + parseFloat(data["listClaimTaskDetail"][i]["Expense"])) + "'></td>");
                        }
                        //insert total into table total
                        trialFeeView.loadDataToTableTotal(data);
                    });
                },
                clearTable:function()
                {
                    var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                    var theadList = $("thead[id=theadTableListTaskDetail]");
                    var trClick = tbodyList.find("tr");
                    theadList.find("tr:eq(1)").empty();
                    for(var i = 0;i<trClick.length;i++)
                    {
                        $(trClick[i]).empty();
                    }
                }
            };
        }
        else {

        }
    })
</script>