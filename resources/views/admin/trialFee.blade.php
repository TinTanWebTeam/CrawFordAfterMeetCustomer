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
                        <th>Code</th>
                        <th>Insured Name</th>
                        <th>Branch</th>
                        <th>Loss Date</th>
                        <th>Received</th>
                        <th>Opened</th>
                        <th>Estimated</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($claimIB !=null)
                        @foreach($claimIB as $item)
                            <tr id="{{$item->id}}" onclick="trialFeeView.viewDetailIBClaim(this)"
                                style="cursor: pointer">
                                <td>{{$item->code}}</td>
                                <td>{{$item->insuredName}}</td>
                                <td>{{$item->branchCode}}</td>
                                <td>{{$item->lossDate}}</td>
                                <td>{{$item->receiveDate}}</td>
                                <td>{{$item->openDate}}</td>
                                <td>{{$item->extimatedClaimValue}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--End Model Model List Claim IB--}}
<div class="row">
    <form id="trialFee">
        <div class="col-sm-5">
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
                                   onkeypress="trialFeeView.chooseClaimWhenUseEventEnterKey(event)">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-default" onclick="trialFeeView.loadIBClaim()"
                                    style="height: 28px">
                                ...
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-2 text-right">
                            <input type="checkbox" style="width: 20px;height: 20px">
                        </div>
                        <div class="col-sm-10">
                            <h5 style="text-align: left">Show Pending</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2 text-right">
                            <input type="checkbox" style="width: 20px;height: 20px">
                        </div>
                        <div class="col-sm-10">
                            <h5 style="text-align: left">Show All</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="border: 1px solid #A9A6A6;border-radius: 5px;padding: 10px 10px">
                <table style="width: 100%">
                    <tr>
                        <td>
                            <h5>Insured:</h5>
                        </td>
                        <td colspan="3">
                            <input type="text" name="insured" id="insured">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Claim Type:</h5>
                        </td>
                        <td>
                            <input type="text" name="claimTypeCode" id="claimTypeCode">
                        </td>
                        <td>
                            <h5>Branch:</h5>
                        </td>
                        <td>
                            <input type="text" name="branch" id="branch">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Loss Date:</h5>
                        </td>
                        <td>
                            <input type="date" name="lossDate" id="lossDate">
                        </td>
                        <td>
                            <h5>Initial Reserve:</h5>
                        </td>
                        <td>
                            <input type="text" name="initialReserve" id="initialReserve">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Received:</h5>
                        </td>
                        <td>
                            <input type="date" name="receiveDate" id="receiveDate">
                        </td>
                        <td>
                            <h5>Current Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="currentRes" id="currentRes">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Opened:</h5>
                        </td>
                        <td>
                            <input type="date" name="openDate" id="openDate">
                        </td>
                        <td>
                            <h5>Adjust Res:</h5>
                        </td>
                        <td>
                            <input type="text" name="adjustRes" id="adjustRes">
                        </td>
                    </tr>
                    <tr>
                        <td>
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
                 style="border: 1px solid #A9A6A6;border-radius: 5px;padding: 10px 10px;margin-left: 1px;height: 332px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 10%">
                            <h5>Bill To:</h5>
                        </td>
                        <td>
                            <select name="" id="chooseCustomer" style="width:100px"
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
            </div>
        </div>
    </form>
</div>
<div class="row" style="margin-top: 20px">
    <div class="col-sm-2">
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
    <div class="col-sm-3">
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
<div class="row">
    <div class="col-sm-8">
        <button type="button" class="btn btn-default" onclick="trialFeeView.actionBillOfClaim()" name="btnBill">
            Bill Claim
        </button>
    </div>
    <div class="col-sm-4">
        <button type="button" class="btn btn-default" onclick="trialFeeView.cancel()" name="cancel">
            Cancel
        </button>
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
                                $("input[name=idClaim]").val(data["Claim"]["id"]);
                                $("input[name=insured]").val(data["Claim"]["insuredName"]);
                                $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                                $("input[name=branch]").val(data["Claim"]["branchCode"]);
                                $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                                $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                                $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                                $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);

                                //Insert data to table list task detail
                                var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                                var theadList = $("thead[id=theadTableListTaskDetail]");
                                for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                                    //Insert data to thead of table
                                    theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Name"] + "</th>");
                                    //Insert data to tbody of table
                                    tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + (parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVChinh"]) + parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVPhu"])) + "</td>");
                                    tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">USD" + data["listClaimTaskDetail"][i]["Rate"] + "</td>");
                                    tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + data["listClaimTaskDetail"][i]["RateType"] + "</td>");
                                    // CV chính và CV ph?
                                    tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["ProfessionalServices"] + "'</td>");
                                    tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["Expense"] + "'</td>");
                                    // CV thêm
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
                            if($("input[name=action]").val()==="0")
                            {
                                if(z===10)
                                {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' value=" + data["total"] + "></td>");
                                    h++;
                                }
                                else
                                {
                                    tbodyListTotal.find("tr:eq(" + z + ")").empty().append("<td>" + arrSum[h] + "</td>").append("<td><input type='text' id='' name='' readonly style='background-color:#AFA3A3' value=" + arrSum[h] + "></td>");
                                    h++;
                                }
                            }
                            else
                            {
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
                    trialFeeView.loadDataToTableTotal();
                },
                actionBillOfClaim: function () {
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
                            if(data["Result"]===1) {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Bill claim success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else
                            {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Bill claim no success!!!")
                                $("div[id=modalConfirm]").modal("show");
                            }
                        }
                        else {
                            if(data["Result"]===1) {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Update claim success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                            else
                            {
                                $("div[id=modalConfirm]").find("div[class=modal-body]").empty().append("Update claim no success!!!");
                                $("div[id=modalConfirm]").modal("show");
                            }
                        }
                    })
                },
                loadIBClaim: function () {
                    $("div[id=modalListClaimIB]").modal("show");
                },
                viewDetailIBClaim: function (element) {
                    //Custom form when view IB claim
                    $("form[id=trialFee]").find("input").prop("readonly",true).css("background-color","#AFA3A3");
                    $("select[id=chooseCustomer]").prop("disabled",true);
                    $("input[name=action]").val("0");
                    $("textarea[name=addressCustomer]").prop("disabled",true).css("background-color","#AFA3A3");
                    $("button[name=btnBill]").empty().text("Update");
                    //Call Ajax come back server
                    $.post(url + "chooseClaimWhenUseEventEnter", {
                        _token: _token,
                        key: "",
                        id: $(element).attr("id")
                    }, function (data) {
                        console.log(data);
                        if (data["Claim"] !== "") {
                            $("input[name=Claim]").val(data["Claim"]["code"]);
                            $("input[name=idClaim]").val(data["Claim"]["id"]);
                            $("input[name=insured]").val(data["Claim"]["insuredName"]);
                            $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                            $("input[name=branch]").val(data["Claim"]["branchCode"]);
                            $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                            $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                            $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                            $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);
                            $("select#chooseCustomer").val(data["customer"]);
                            trialFeeView.showInformationOfCustomer();

                            var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                            var theadList = $("thead[id=theadTableListTaskDetail]");
                            for (var i = 0; i < data["listClaimTaskDetail"].length; i++) {
                                //Insert data to thead of table
                                theadList.find("tr:eq(1)").append("<th style='text-align: center'>" + data["listClaimTaskDetail"][i]["Name"] + "</th>");
                                //Insert data to tbody of table
                                tbodyList.find("tr:eq(0)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + (parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVChinh"]) + parseFloat(data["listClaimTaskDetail"][i]["SumTimeCVPhu"])) + "</td>");
                                tbodyList.find("tr:eq(1)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">USD" + data["listClaimTaskDetail"][i]["Rate"] + "</td>");
                                tbodyList.find("tr:eq(2)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + ">" + data["listClaimTaskDetail"][i]["RateType"] + "</td>");
                                // CV chính và CV ph?
                                tbodyList.find("tr:eq(3)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["ProfessionalServices"] + "'</td>");
                                tbodyList.find("tr:eq(4)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + data["listClaimTaskDetail"][i]["Expense"] + "'</td>");
                                // CV thêm
                                tbodyList.find("tr:eq(5)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(6)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(7)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(8)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(9)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='0.00' onchange='trialFeeView.sumTotalValueofInputOfTableListTaskDetail(this)'></td>");
                                tbodyList.find("tr:eq(10)").append("<td id=" + data["listClaimTaskDetail"][i]["Name"] + "><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='" + (parseFloat(data["listClaimTaskDetail"][i]["ProfessionalServices"]) + parseFloat(data["listClaimTaskDetail"][i]["Expense"])) + "'></td>");
                            }
                            //insert total into table total
                            trialFeeView.loadDataToTableTotal(data);
                            //tbodyListTotal.find("tr:eq(10)").empty().append("<td>" + trialFeeView.sumAllTd($(tbodyList).find("tr:eq(10)"), "TH2") + "</td>").append("<td><input type='text' id='' name='' value=" + data["total"] + "></td>");
                            $("div[id=modalListClaimIB]").modal("hide");

                        }
                        else {
                            alert("Can't find it!!!");
                        }
                    })
                }
            };
        }
        else {

        }
    })
</script>