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
            <h4 style="padding-left: 10px">To:</h4>
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
            <input type="checkbox" value="" name="chooseAllClaim" style="width: 20px" onchange="reportView.changeCheckBox(this)">
        </td>
        <td>
            <h4>Enter Claim:</h4>
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
        <td style="padding-left: 10px">
            <button type="button" name="submitReport" class="btn btn-success" onclick="reportView.submitLoadReport()">
                Xem
            </button>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Expense Amount</h4>
        </td>
        <td>
            <input type="text" name="sumExpenseAmount" readonly id="" class="form-control">
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
<script>
    $(document).on('keypress', ':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if (typeof(reportView) === "undefined") {
            reportView = {
                loadReport: function (fromDate, toDate, claimCode, allClaim,userId) {
                    $.post(url + "user/loadReport", {
                        _token: _token,
                        fromDate: fromDate,
                        toDate: toDate,
                        claimCode: claimCode,
                        allClaim: allClaim,
                        userId:userId
                    }, function (data) {
                        if (data.length > 0) {
                            var row = "";
                            $("tbody#tbodyTableReport").empty();
                            for (var i = 0; i < data.length; i++) {
                                row += "<tr>";
                                row += "<td>" + data[i]["CreatedDate"] + "</td>";
                                row += "<td>" + data[i]["Claim"] + "</td>";
                                if(data[i]["Time"]!==null)
                                {
                                    row += "<td>" + data[i]["Time"] + "</td>";
                                }
                                else
                                {
                                    row += "<td></td>";
                                }
                                row += "<td>" + data[i]["Unit"] + "</td>";
                                if(data[i]["ExpenseCode"]!==null)
                                {
                                    row += "<td style='text-align: center'>" + data[i]["ExpenseCode"] + "</td>";
                                }
                                else
                                {
                                    row += "<td></td>";
                                }
                                row += "<td style='text-align: center'>" + data[i]["ExpenseAmount"] + "</td>";
                                if(data[i]["Invoice"]!==null)
                                {
                                    row += "<td>" + data[i]["Invoice"] + "</td>";

                                }
                                else
                                {
                                    row += "<td></td>";
                                }

                                row += "</tr>";
                            }

                            $("tbody#tbodyTableReport").append(row);
                            $("table[id=tableReport]").DataTable();
                        }
                        //sum textbox
                        var trList = $("tbody[id=tbodyTableReport]").find($("tr"));
                        var sumTime = 0;
                        var sumExpenseAmount = 0;
                        for(var j =0;j<trList.length;j++)
                        {
                            sumTime += parseFloat($(trList[j]).find("td:eq(3)").text());
                            sumExpenseAmount += parseFloat($(trList[j]).find("td:eq(5)").text());
                        }
                        $("input[name=sumTimeUnit]").empty().val(sumTime);
                        $("input[name=sumExpenseAmount]").empty().val(sumExpenseAmount);

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
                    reportView.loadReport(fromDate, toDate, claimCode, allClaim,userId);
                },
                changeCheckBox:function(element)
                {
                    if($(element).is(":checked"))
                    {
                       $("input[name=chooseClaim]").val("").prop("disabled",true);
                    }
                    else
                    {
                        $("input[name=chooseClaim]").val("").prop("disabled",false);
                    }
                }


            };

        }
    })
</script>