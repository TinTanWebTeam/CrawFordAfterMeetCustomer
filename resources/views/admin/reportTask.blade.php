{{--Adjuster--}}
<div class="modal fade" id="modal-adjuster">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    List Adjuster
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-adjuster">
                        <thead>
                        <tr>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="email">
                                Email
                            </th>
                            <th data-name="firstName">
                                First Name
                            </th>
                            <th data-name="lastName">
                                Last Name
                            </th>
                            <th data-name="Rate">
                                Rate
                            </th>
                            <th class="text-center">
                                Choose
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-adjuster-table-body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background-color: white" class="row">
    <div class="col-sm-12">
        <table>
            <tr>
                <td>
                    <h4>From:</h4>
                </td>
                <td>
                    <input type="date" name="fromDate" value="" class="form-control">
                    <input type="text" name="userId" value="{{Auth::user()->id}}" class="form-control" style="display: none">
                </td>
                <td>
                    <h4 style="padding-left: 20px">To:</h4>
                </td>
                <td>
                    <input type="date" name="toDate" value="" class="form-control">
                </td>
            </tr>
            <tr>
                <td colspan="1">
                    <h4>All Claim:</h4>
                </td>
                <td>
                    <input type="checkbox" value="" name="chooseAllClaim" style="width: 20px"
                           onchange="reportTaskView.changeCheckBox(this)">
                </td>
                <td>
                    <h4 style="padding-left: 20px">Enter Claim:</h4>
                </td>
                <td>
                    <input type="text" name="chooseClaim" id="" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Time Unit</h4>
                </td>
                <td>
                    <input type="text" name="sumTimeUnit" readonly id="" class="form-control">
                </td>
                <td>
                    <h4 style="padding-left: 20px">Employee:</h4>
                </td>
                <td>
                    <input type="text" name="employee"  id="employee" class="form-control" ondblclick="reportTaskView.showALLEmployee()">
                </td>
            </tr>
            <tr>
                <td>
                    <h4>Expense Amount</h4>
                </td>
                <td>
                    <input type="text" name="sumExpenseAmount" readonly id="" class="form-control">
                </td>
                <td style="padding-left: 10px">
                    <button type="button" name="submitReport" class="btn btn-success" onclick="reportTaskView.submitLoadReport()" style="margin-left: 10px">
                        Search
                    </button>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <table class="table table-bordered" id="tableReport">
            <thead>
            <tr>
                <th>Created Date</th>
                <th>Claim</th>
                <th>Time</th>
                <th>Unit</th>
                <th>Expense Code</th>
                <th>Expense Amount</th>
                <th>Invoice</th>
            </tr>
            </thead>
            <tbody id="tbodyTableReport">

            </tbody>
        </table>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h4>Print Review</h4>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-sm btn-info pull-right" onclick="print_submission()">Print Report</button>
            </div>
        </div>
        <hr>
        <div id="submission_detail">
            <div class="submission-header">
                <div style="display: inline-block;width: 50%;box-sizing: border-box">
                    <h3 style="font-weight: 600">Time Submission Report (Detailed)</h3>
                </div>
                <div style="display: inline-block;width: 48%;box-sizing: border-box">
                    <h6 style="font-style: italic;text-align: right">Printed: <span id="printed_at">30/06/2016 4:34:34</span></h6>
                </div>
                <div style="display: inline-block;width: 50%;box-sizing: border-box;padding-left: 70px">
                    <h5 style="font-weight: 600">End Date: <span id="end_date">01/05/2016</span></h5>
                    <h5 style="font-weight: 600">Start Date: <span id="start_date">01/05/2016</span></h5>
                    <h5 style="font-weight: 600">Branch: All Branches</h5>
                </div>
                <div style="display: inline-block;width: 48%;box-sizing: border-box">
                    <h5 style="font-weight: 600">Adjuster Code: <span id="adjusterCode">{{ strtoupper(Auth::user()->name) }}</span></h5>
                    <h5 style="font-weight: 600">Adjuster Name: <span id="adjusterName">{{ Auth::user()->firstName.' '.Auth::user()->lastName }}</span></h5>
                    <h5 style="font-weight: 600">Region Code: All Regions</h5>
                </div>
            </div>
            <br>
            <br>
            <div class="submission-content">
                <div style="width: 100%;margin-bottom: 5px">
                    <div style="width: 25%;display: inline-block"></div>
                    <div style="width: 73%;display: inline-block"><div style="text-align: center;font-size: 14px;font-weight: 600;border: 2px solid black">Billable</div></div>
                </div>
                <div style="width: 100%">
                    <div style="width: 25%;display: inline-block">
                        <div style="width: 50%;display: inline-block">
                            <div style="text-align: center;font-weight: 600;">Date</div>
                        </div>
                        <div style="width: 48%;display: inline-block">
                            <div style="text-align: center;font-weight: 600;">Claim #</div>
                        </div>
                    </div>
                    <div style="width: 73%;display: inline-block">
                        <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time Code</div></div>
                        <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time Units</div></div>
                        <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense Code</div></div>
                        <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense Amount</div></div>
                    </div>
                </div>
                <div id="report_submission_content">

                </div>

            </div>
            <br>
            <br>
        </div>
    </div>
</div>


<script>
    $(document).on('keypress', ':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if (typeof(reportTaskView) === "undefined") {
            reportTaskView = {
                loadReport: function (fromDate, toDate, claimCode, allClaim, userId) {
                    $.post(url + "loadReportTask", {
                        _token: _token,
                        fromDate: fromDate,
                        toDate: toDate,
                        claimCode: claimCode,
                        allClaim: allClaim,
                        userId: userId
                    }, function (data) {
                        if (data["ListData"].length > 0) {
                            var row = "";
                            $("tbody#tbodyTableReport").empty();
                            for (var i = 0; i < data["ListData"].length; i++) {
                                row += "<tr>";
                                if (data["ListData"][i]["CreatedDate"]) {
                                    var receiveDate = new Date(data["ListData"][i]["CreatedDate"].substring(0, 10));
                                    var dd = receiveDate.getDate();
                                    var mm = receiveDate.getMonth() + 1; //January is 0!

                                    var yyyy = receiveDate.getFullYear();
                                    if (dd < 10) {
                                        dd = '0' + dd;
                                    }
                                    if (mm < 10) {
                                        mm = '0' + mm;
                                    }
                                    row += "<td>" + dd + '-' + mm + '-' + yyyy + "</td>";
                                }
//                                row += "<td>" + data["ListData"][i]["CreatedDate"] + "</td>";
                                row += "<td>" + data["ListData"][i]["Claim"] + "</td>";
                                if (data["ListData"][i]["Time"] !== null) {
                                    row += "<td>" + data["ListData"][i]["Time"] + "</td>";
                                }
                                else {
                                    row += "<td></td>";
                                }

                                if(data["ListData"][i]["Unit"]!==null)
                                {
                                    row += "<td>" + data["ListData"][i]["Unit"] + "</td>";
                                }
                                else
                                {
                                    row += "<td></td>";
                                }

                                if (data["ListData"][i]["ExpenseCode"] !== null) {
                                    row += "<td style='text-align: center'>" + data["ListData"][i]["ExpenseCode"] + "</td>";
                                }
                                else {
                                    row += "<td></td>";
                                }

                                row += "<td style='text-align: center'>" + Number(data["ListData"][i]["ExpenseAmount"]).toLocaleString() + "</td>";
                                if (data["ListData"][i]["Invoice"] !== null) {
                                    row += "<td>" + data["ListData"][i]["Invoice"] + "</td>";

                                }
                                else {
                                    row += "<td></td>";
                                }

                                row += "</tr>";
                            }

                            $("tbody#tbodyTableReport").append(row);
                            $("table[id=tableReport]").DataTable();
                        }
                        //sum textbox
                        $("input[name=sumTimeUnit]").empty().val(data["SumTime"]);
                        $("input[name=sumExpenseAmount]").empty().val(data["SumExpenseAmount"]).formatCurrency({roundToDecimalPlace:0});
                        // fill to print report
                        var fromDate = $("input[name=fromDate]").val();
                        if (fromDate) {
                            var receiveDate = new Date(fromDate.substring(0, 10));
                            var dd = receiveDate.getDate();
                            var mm = receiveDate.getMonth() + 1; //January is 0!

                            var yyyy = receiveDate.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }
                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            fromDate = dd + '-' + mm + '-' + yyyy;
                        }
                        var toDate = $("input[name=toDate]").val();
                        if (toDate) {
                            var receiveDate = new Date(toDate.substring(0, 10));
                            var dd = receiveDate.getDate();
                            var mm = receiveDate.getMonth() + 1; //January is 0!

                            var yyyy = receiveDate.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }
                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            toDate = dd + '-' + mm + '-' + yyyy;
                        }
                        $("span[id=start_date]").text(fromDate);
                        $("span[id=end_date]").text(toDate);
                        $.get(url + "getTimeNowServer", function (tineNowServer) {
                            $("span[id=printed_at]").text(tineNowServer);
                        });
                        var trSubmission = "";
                        if (data["ListData"].length > 0) {
                            var rowDate = data["ListData"][0]["CreatedDate"].substring(0, 10);
                            var subUnit = 0.0;
                            var subAmount = 0;
                            var totalUnit = 0.0;
                            var totalAmount = 0;
                            for (var i = 0; i < data["ListData"].length; i++) {
                                if (rowDate == data["ListData"][i]["CreatedDate"].substring(0, 10)) {
                                    trSubmission += '<div style="width: 100%;margin-top: 10px">';
                                    trSubmission += '<div style="width: 25%;display: inline-block">';
                                    trSubmission += '<div style="width: 50%;display: inline-block">';
                                    if(i > 0 && data["ListData"][i]["CreatedDate"] != data["ListData"][i-1]["CreatedDate"])
                                    {
                                        trSubmission += '<div style="text-align: center;font-weight: 600"></div>';
                                    }else{
                                        if (data["ListData"][i]["CreatedDate"]) {
                                            var receiveDate = new Date(data["ListData"][i]["CreatedDate"].substring(0, 10));
                                            var dd = receiveDate.getDate();
                                            var mm = receiveDate.getMonth() + 1; //January is 0!

                                            var yyyy = receiveDate.getFullYear();
                                            if (dd < 10) {
                                                dd = '0' + dd;
                                            }
                                            if (mm < 10) {
                                                mm = '0' + mm;
                                            }
                                            trSubmission += '<div style="text-align: center;font-weight: 600">' + dd + '-' + mm + '-' + yyyy + '</div>';
                                        }
                                    }
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 48%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;">' + data["ListData"][i]["Claim"] + '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 73%;display: inline-block">';
                                    if (data["ListData"][i]["Time"] == 'null' || data["ListData"][i]["Time"] == null) {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center"></div></div>';
                                    } else {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center">' + data["ListData"][i]["Time"] + '</div></div>';
                                    }
                                    if(data["ListData"][i]["Unit"] == 'null' || data["ListData"][i]["Unit"] == null){
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    }else{
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center">' + data["ListData"][i]["Unit"] + '</div></div>';
                                    }
                                    if (data["ListData"][i]["ExpenseCode"] == 'null' || data["ListData"][i]["ExpenseCode"] == null) {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    } else {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 40px;text-align: center">' + data["ListData"][i]["ExpenseCode"] + '</div></div>';
                                    }
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center">' + Number(data["ListData"][i]["ExpenseAmount"]).toLocaleString() + '</div></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    subUnit += Number(data["ListData"][i]["Unit"]);
                                    subAmount += Number(data["ListData"][i]["ExpenseAmount"]);
                                    totalUnit += Number(data["ListData"][i]["Unit"]);
                                    totalAmount += Number(data["ListData"][i]["ExpenseAmount"]);
                                }
                                else {
                                    trSubmission += '<div style="width: 100%;margin-top: 10px">';
                                    trSubmission += '<div style="width: 25%;display: inline-block">';
                                    trSubmission += '<div style="width: 50%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 48%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 73%;display: inline-block">';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center;font-weight: 600">Subtotal :</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600">' + subUnit.toFixed(1) + '</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600">' + subAmount.toLocaleString() + '</div></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<hr>';
                                    rowDate = data["ListData"][i]["CreatedDate"].substring(0, 10);;
                                    subUnit = 0.0;
                                    subAmount = 0;
                                    trSubmission += '<div style="width: 100%;margin-top: 10px">';
                                    trSubmission += '<div style="width: 25%;display: inline-block">';
                                    trSubmission += '<div style="width: 50%;display: inline-block">';
                                    if (data["ListData"][i]["CreatedDate"]) {
                                        var receiveDate = new Date(data["ListData"][i]["CreatedDate"].substring(0, 10));
                                        var dd = receiveDate.getDate();
                                        var mm = receiveDate.getMonth() + 1; //January is 0!

                                        var yyyy = receiveDate.getFullYear();
                                        if (dd < 10) {
                                            dd = '0' + dd;
                                        }
                                        if (mm < 10) {
                                            mm = '0' + mm;
                                        }
                                        trSubmission += '<div style="text-align: center;font-weight: 600">' + dd + '-' + mm + '-' + yyyy + '</div>';
                                    }
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 48%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;">' + data["ListData"][i]["Claim"] + '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 73%;display: inline-block">';
                                    if (data["ListData"][i]["Time"] == 'null' || data["ListData"][i]["Time"] == null) {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center"></div></div>';
                                    } else {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center">' + data["ListData"][i]["Time"] + '</div></div>';
                                    }
                                    if(data["ListData"][i]["Unit"] == 'null' || data["ListData"][i]["Unit"] == null){
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    }else{
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center">' + data["ListData"][i]["Unit"] + '</div></div>';
                                    }
                                    if (data["ListData"][i]["ExpenseCode"] == 'null' || data["ListData"][i]["ExpenseCode"] == null) {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 40px"></div></div>';
                                    } else {
                                        trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 40px;text-align: center">' + data["ListData"][i]["ExpenseCode"] + '</div></div>';
                                    }
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center">' + Number(data["ListData"][i]["ExpenseAmount"]).toLocaleString() + '</div></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    subUnit += Number(data["ListData"][i]["Unit"]);
                                    subAmount += Number(data["ListData"][i]["ExpenseAmount"]);
                                    totalUnit += Number(data["ListData"][i]["Unit"]);
                                    totalAmount += Number(data["ListData"][i]["ExpenseAmount"]);
                                }
                                if (i == (data["ListData"].length - 1)) {
                                    trSubmission += '<div style="width: 100%;margin-top: 10px">';
                                    trSubmission += '<div style="width: 25%;display: inline-block">';
                                    trSubmission += '<div style="width: 50%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 48%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 73%;display: inline-block">';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600">Subtotal :</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="font-weight: 600;text-align: center;">' + subUnit.toFixed(1) + '</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600">' + subAmount.toLocaleString() + '</div></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<hr>';
                                    trSubmission += '<div style="width: 100%;margin-top: 30px">';
                                    trSubmission += '<div style="width: 25%;display: inline-block">';
                                    trSubmission += '<div style="width: 50%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 48%;display: inline-block">';
                                    trSubmission += '<div style="text-align: center;"></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                    trSubmission += '<div style="width: 73%;display: inline-block">';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="padding-left: 5px;text-align: center;font-weight: 600;font-size: 16px;font-style:italic">Total All:</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="font-weight: 600;font-size: 16px;font-style:italic;text-align: center;">' + totalUnit.toFixed(1) + '</div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center"></div></div>';
                                    trSubmission += '<div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;;font-size: 16px;font-style:italic">' + totalAmount.toLocaleString() + '</div></div>';
                                    trSubmission += '</div>';
                                    trSubmission += '</div>';
                                }
                            }

                        }
                        $("#report_submission_content").empty().append(trSubmission);
//                        <div style="width: 100%">
//                                <div style="width: 25%;display: inline-block">
//                                <div style="width: 50%;display: inline-block">
//                                <div style="text-align: center;font-weight: 600;">Date</div>
//                                </div>
//
//                                <div style="text-align: center;font-weight: 600;">Claim #</div>
//                        </div>
//                        </div>
//                        <div style="width: 33%;display: inline-block">
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time<br>Code</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time<br>Units</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense<br>Code</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense<br>Amount</div></div>
//                                </div>
//                                <div style="width: 7%;display: inline-block"></div>
//                                <div style="width: 33%;display: inline-block">
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time<br>Code</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Time<br>Units</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense<br>Code</div></div>
//                                <div style="width: 24%;display: inline-block"><div style="text-align: center;font-weight: 600;">Expense<br>Amount</div></div>
//                                </div>
//                                </div>
                    });
                },
                submitLoadReport: function () {
                    var allClaim = null;
                    var fromDate = $("input[name=fromDate]").val();
                    var toDate = $("input[name=toDate]").val();
                    var claimCode = $("input[name=chooseClaim]").val();
                    var userId = $("input[name=userId]").val();
                    if ($("input[name=chooseAllClaim]").prop("checked")) {
                        allClaim = "True";
                    }
                    else {
                        allClaim = "False";
                    }
                    reportTaskView.loadReport(fromDate, toDate, claimCode, allClaim, userId);
                },
                changeCheckBox: function (element) {
                    if ($(element).is(":checked")) {
                        $("input[name=chooseClaim]").val("").prop("disabled", true);
                    }
                    else {
                        $("input[name=chooseClaim]").val("").prop("disabled", false);
                    }
                },
                showALLEmployee:function()
                {
                    $("div[id=modal-adjuster]").modal("show");
                    $.get(url + 'getAllAdjuster',function (data) {
                        var tr = "";
                        for(var i = 0;i<data.length;i++){
                            tr+= "<tr>";
                            tr+="<td>"+data[i].name+"</td>";
                            tr+="<td>"+data[i].email+"</td>";
                            tr+="<td>"+data[i].firstName+"</td>";
                            tr+="<td>"+data[i].lastName+"</td>";
                            tr+="<td>"+data[i].rate+"</td>";
                            tr+="<td class='text-center'><button class='btn btn-success' id="+data[i].id+" onclick='reportTaskView.chooseEmployee(this)'><span class='glyphicon glyphicon-check'></span></button></td>";
                            tr+="</tr>";
                        }
                        $("#table-adjuster").DataTable().destroy();
                        $("#modal-adjuster-table-body").empty().append(tr);
                        $("#table-adjuster").DataTable();
                    });
                },
                chooseEmployee:function(element)
                {
                    $("input[name=userId]").val("");
                    $("input[name=employee]").val($(element).parent().parent().find("td:eq(0)").text());
                    $("input[name=userId]").val($(element).attr("id"));
                    $("div[id=modal-adjuster]").modal("hide");
                    $("span[id=adjusterCode]").text($(element).parent().parent().find("td:eq(0)").text());
                    $("span[id=adjusterName]").text($(element).parent().parent().find("td:eq(2)").text() +" "+$(element).parent().parent().find("td:eq(3)").text());

                }
            };
        }
    })
    function print_submission(){
        $("#submission_detail").printThis({
            debug: false,
            importCSS: true,
            importStyle: true,
            loadCSS: "user/css/style.css",
            removeInline: false,
            printDelay: 2000,
            header: null,
            formValues: true
        });
    }
</script>
