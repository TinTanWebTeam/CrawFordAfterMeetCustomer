<div class="row">
    <form>
        <div class="col-sm-5">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            <h5 style="text-align: right">Claim#:</h5>
                        </div>
                        <div class="col-sm-7">
                            <input name="Claim" id="Claim" onkeypress="trialFeeView.chooseClaimWhenUseEventEnterKey(event)">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-default" style="height: 28px">
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
                            <td  colspan="3">
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
            <div class="row" style="border: 1px solid #A9A6A6;border-radius: 5px;padding: 10px 10px;margin-left: 1px;height: 332px">
                <table style="width: 100%">
                    <tr>
                        <td style="width: 10%">
                            <h5>Bill To:</h5>
                        </td>
                        <td>
                            <select name="" id="chooseCustomer" style="width:100px" onchange="trialFeeView.showInformationOfCustomer()">
                                @if($listCustomer!=null)
                                    @foreach($listCustomer as $item)
                                        <option value={{$item->id}}>{{$item->code}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                        <textarea rows="4" style="width: 100%;resize: none;" id="addressCustomer" name="addressCustomer">

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
<div class="row">
    <div class="col-sm-7">
        <div class="row">
            <div class="col-sm-4" style="padding: 10px 10px;margin-top: 10px">
                <table style="width: 100%">
                    <tr style="border: 1px solid black">
                        <th style="text-align: center;background-color: blue;color: white">GL</th>
                    </tr>
                    <tr style="border: 1px solid black;height: 30px">
                        <td style="text-align: center">Account</td>
                    </tr>
                    <tr style="border: 1px solid black">
                        <td>Hours</td>
                    </tr>
                    <tr style="border: 1px solid black">
                        <td>Rate</td>
                    </tr>
                    <tr style="border: 1px solid black"><td>Period</td></tr>
                    <tr style="border: 1px solid black"><td>Professional services</td></tr>
                    <tr style="border: 1px solid black"><td>General Exp</td></tr>
                    <tr style="border: 1px solid black"><td>Comm && Photo Exp</td></tr>
                    <tr style="border: 1px solid black"><td>Consult Fees && Exp</td></tr>
                    <tr style="border: 1px solid black"><td>Travel Related Exp</td></tr>
                    <tr style="border: 1px solid black"><td>GST-free Disb</td></tr>
                    <tr style="border: 1px solid black"><td>Disbursements</td></tr>
                    <tr style="border: 1px solid black"><td>Totals</td></tr>
                </table>
            </div>
            <div class="col-sm-8" style="padding: 10px 10px;margin-top: 10px">
                <div class="table-responsive"  style="width: 400px;">
                    <table class="table table-bordered" style="width: 400px;">
                        <thead id="theadTableListTaskDetail">
                            <tr>

                            </tr>
                        </thead>
                        <tbody id="tbodyTableListTaskDetail">
                            <tr style="display: none"></tr>
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
                            <tr>

                            </tr>
                        </tbody>
                        {{--<thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th><th>Username</th> </tr> </thead>--}}
                    </table>
                </div>

            </div>
        </div>
    </div>
    <div class="col-sm-5" style="padding: 10px 10px;margin-top: 10px">
        <div class="row">
            <div class="col-sm-7">
                <table style="width: 100%">
                    <tr style="border: 1px solid black">
                        <th colspan="2" style="text-align: center;background-color: blue;color: white">Totals:</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">Actual</th>
                        <th style="text-align: center">Invoice</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


<br>
<br>
<script>
    $(function(){
        if(typeof(trialFeeView)==="undefined")
        {
            trialFeeView = {
                TrialFeeObject: {
                    Id: null

                },
                convertStringToDate:function(date)
                {
                    var currentDate = new Date(date);
                    var datetime = currentDate.getFullYear() +"-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2)  +"-"
                            + ("0" + currentDate.getDate()).slice(-2);
                    return datetime;
                },
                chooseClaimWhenUseEventEnterKey:function(e)
                {
                    if (e.keyCode === 13) {
                        console.log($("input[name=Claim]").val());
                        $.post(url+"chooseClaimWhenUseEventEnter",{_token:_token,key:$("input[name=Claim]").val()},function(data){
                            console.log(data);
                            $("input[name=insured]").val(data["Claim"]["insuredName"]);
                            $("input[name=claimTypeCode]").val(data["Claim"]["claimTypeCode"]);
                            $("input[name=branch]").val(data["Claim"]["branchCode"]);
                            $("input[name=lossDate]").val(trialFeeView.convertStringToDate(data["Claim"]["lossDate"]));
                            $("input[name=receiveDate]").val(trialFeeView.convertStringToDate(data["Claim"]["receiveDate"]));
                            $("input[name=openDate]").val(trialFeeView.convertStringToDate(data["Claim"]["openDate"]));
                            $("input[name=estimated]").val(data["Claim"]["estimatedClaimValue"]);
                            console.log(data["listClaimTaskDetail"].length);

                            var tbodyList = $("tbody[id=tbodyTableListTaskDetail]");
                            var theadList = $("thead[id=theadTableListTaskDetail]");
                            for(var i = 0;i<data["listClaimTaskDetail"].length;i++)
                            {
                                //Insert data to thead of table
                                theadList.children().append("<th style='width:600px;text-align: center'>"+data["listClaimTaskDetail"][i]["Name"]+"</th>");
                                //Insert data to tbody of table
                                tbodyList.find("tr:eq(0)").append("<td>"+data["listClaimTaskDetail"][i]["Name"]+"</td>");
                                tbodyList.find("tr:eq(1)").append("<td>"+data["listClaimTaskDetail"][i]["Sum"]+"</td>");
                                tbodyList.find("tr:eq(2)").append("<td>USD"+data["listClaimTaskDetail"][i]["Rate"]+"</td>");
                                tbodyList.find("tr:eq(3)").append("<td>"+data["listClaimTaskDetail"][i]["RateType"]+"</td>");
                                tbodyList.find("tr:eq(4)").append("<td id="+data["listClaimTaskDetail"][i]["Name"]+"><input type='text' id='' name='' readonly style='background-color: #AFA3A3' value='USD"+data["listClaimTaskDetail"][i]["ProfessionalServices"]+"'</td>");
                                tbodyList.find("tr:eq(5)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(6)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(7)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(8)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(9)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(10)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='USD0.00' onchange='trialFeeView.sumTotal(this)'></td>");
                                tbodyList.find("tr:eq(11)").append("<td><input type='text' id='' name="+data["listClaimTaskDetail"][i]["Name"]+" value='Total'></td>");
                            }

                            //$("tr[id=trTableListTaskDetail]").append(row);
                        });
                    }
                },
                showInformationOfCustomer:function()
                {
                    $.post(url+"showInformationOfCustomer",{_token:_token,idCustomer:$("select#chooseCustomer option:selected").val()},function(data){
                        console.log(data);
                        $("textarea[name=addressCustomer]").val(data["address"]);
                        $("input[name=insurerCustomer]").val(data["fullName"]);

                    });
                },
                sumTotal:function(element)
                {
                    var id = $("tbody[id=tbodyTableListTaskDetail]").find("tr:eq(4)").find("td[id="+$(element).attr("name")+"]").val();
                    alert(id);
                }


            };
        }
        else
        {

        }
    })
</script>