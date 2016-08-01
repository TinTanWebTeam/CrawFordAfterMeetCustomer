<div class="row">
    <form class="form-claim" id="form_claim">
        <input name="id" style="display: none" type="text" value="0">
        <table style="width: 100%">
            <tr>
                <td style="width: 15%;">
                    <h5 class="text-right">ID:</h5>
                </td>
                <td style="width: 15%;">
                    <input id="code" name="code" ondblclick="cliamView.searchClaimByCode()" onkeyup="cliamView.fillClaim(this,event)" type="text"/>
                </td>
                <td style="width: 20%;">
                    <div style="display: inline-block;width: 20%">
                        <input id="privileged" name="privileged" type="checkbox"/>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <h5>
                            Privileged
                        </h5>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">
                            Account:
                        </h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input id="accountCode" name="accountCode" type="text"/>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="display: inline-block;width: 40%">
                        <h5>Policy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="accountPolicyId" name="accountPolicyId">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                </td>
                <td>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Partnership:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="partnershipId" name="partnershipId">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5>Currency:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <select name="currency" id="currency" style="width: 100%">
                            <option value="usd">USD</option>
                            <option value="vnd">VND</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Organization:</h5>
                </td>
                <td colspan="2">
                    <input type="text" id="organization" name="organization">
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Incident:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="incident" name="incident">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5>Branch Seq #:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="branchSeqNo" name="branchSeqNo">
                    </div>
                </td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">
                    <div style="display: inline-block;width: 30%">

                    </div>
                    <div style="display: inline-block;width: 68%">
                        <h5 class="text-left">First Name:</h5>
                    </div>
                </td>
                <td>
                    <h5 class="text-left">Last Name:</h5>
                </td>
                <td>
                    <h5 class="text-center" style="border-bottom: 1px solid #7d7676">Dates</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Insured Name:</h5>
                </td>
                <td colspan="2">
                    <div style="display: inline-block;width: 30%">
                        <button style="width: 100%">Address...</button>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="insuredFirstName" name="insuredFirstName">
                    </div>
                </td>
                <td>
                    <input type="text" id="insuredLastName" name="insuredLastName">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Received:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="receiveDate" name="receiveDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Insured Claim #:</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="insuredClaim" name="insuredClaim">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Opened:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="openDate" name="openDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Operated As:</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="operatedAs" name="operatedAs">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Closed:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="closeDate" name="closeDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Misc Info:</h5>
                </td>
                <td colspan="3">
                    <input type="text" name="miscInfo">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Reopened:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" inputmode="Reopened" name="reOpen">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Claim Type:</h5>
                </td>
                <td>
                    <input type="text" id="claimTypeCode" name="claimTypeCode">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Insurer:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="insurerCode" name="insurerCode">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Branch:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="branchCode" name="branchCode">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Destroy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="destroyedDate" name="destroyedDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Loss Desc:</h5>
                </td>
                <td>
                    <input type="text" id="lossLocation" name="lossDescCode">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Broker:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="brokerCode" name="brokerCode">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Adjuster:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="adjusterCode" name="adjusterCode">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">EBox Destroy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="eBoxDestroyed" name="eBoxDestroyed">
                    </div>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td>

                </td>
                <td>

                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Rate:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="rate" name="rate">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">First Contact:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="firstContact" name="firstContact">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Catastrophic Loss:</h5>
                </td>
                <td>
                    <input type="text" id="catastrophicLoss" name="catastrophicLoss">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Source:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="sourceCode" name="sourceCode">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Period:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <select name="rateType" id="rateType" style="width: 100%">
                            <option value="hourly">Hourly</option>
                            <option value="flat">Flat</option>
                            <option value="blend">Blend</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Contact:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="contact" name="contact">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <button>Loss Location</button>
                </td>
                <td colspan="3">
                    <input type="text" id="lossLocation" name="lossLocation">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Loss Date:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="lossDate" name="lossDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Line Of Business Code:</h5>
                </td>
                <td>
                    <input type="text" id="lineOfBusinessCode" name="lineOfBusinessCode">
                </td>
                <td>
                    <div style="display: inline-block;width: 50%">
                        <h5 class="text-right">Large Loss Claim:</h5>
                    </div>
                    <div style="display: inline-block;width: 48%">
                        <select name="largeLossClaim" id="largeLossClaim">
                            <option value="undetermined">Undetermined</option>
                            <option value="determined">Determined</option>
                        </select>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 68%">
                        <h5 class="text-right">Taxable:</h5>
                    </div>
                    <div style="display: inline-block;width: 30%">
                        <input type="checkbox" id="taxable" name="taxable">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Proscription:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="proscription" name="proscription">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Estimated Claim Value:</h5>
                </td>
                <td>
                    <input type="text" id="estimatedClaimValue" name="estimatedClaimValue">
                </td>
                <td>
                    <div style="display: inline-block;width: 50%">
                        <h5 class="text-right">SIR Breached:</h5>
                    </div>
                    <div style="display: inline-block;width: 48%">
                        <input type="checkbox" id="sirBreached" name="sirBreached">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 68%">
                        <h5 class="text-right">Claim Assignment:</h5>
                    </div>
                    <div style="display: inline-block;width: 30%">
                        <input type="checkbox" id="claimAssignment" name="claimAssignment">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Policy Inception:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="Date" id="policyInceptionDate" name="policyInceptionDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Policy Expiry:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="Date" id="policyExpiryDate" name="policyExpiryDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <h5></h5>
                </td>
            </tr>
            <tr>
                <td colspan="4" rowspan="6"  style="border: 1px solid #c5c0c0;border-radius: 10px;padding: 10px;width: 878px;">
                    <h5>Co-insurers Detail</h5>
                    <div class="table-responsive" style="width: 878px;">
                        <table class="table table-bordered" style="width: 878px;">
                            <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>
                            <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>
                            <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>
                            <thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>
                        </table>
                    </div>
                </td>
                <td rowspan="6" style="border: 1px solid #c5c0c0;border-radius: 10px;padding: 10px">
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Created Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="created_at" name="created_at" type="text">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Created By:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="createdBy" name="createdBy" type="text">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Last Changed:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="updated_at" name="updated_at" type="text">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Last Changed By:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="updatedBy" name="updatedBy" type="text">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Import Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="importDate" name="importDate" type="text">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Import Close Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input type="text">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <div class="text-right">
            <div style="width: 7%;display: inline-block">
                <input type="submit" class="btn btn-default" value="Save">
            </div>
            <div style="width: 7%;display: inline-block">
                <input type="submit" class="btn btn-default" value="Cancel">
            </div>
        </div>
    </form>
    <br>
    <br>
</div>
<div class="modal fade" id="modal-claim">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    ×
                </button>
                <h4 class="modal-title">
                    Claim List
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                code
                            </th>
                            <th>
                                insuredName
                            </th>
                            <th>
                                lossLocation
                            </th>
                            <th>
                                receiveDate
                            </th>
                            <th>
                                openDate
                            </th>
                            <th>
                                adjuster
                            </th>
                            <th>
                            </th>
                        </tr>
                        </thead>
                        <tbody id="claim-talbe-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Close
                </button>
                <button class="btn btn-primary" type="button">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('keypress',':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });
    $(function () {
        if(typeof claimView === 'undefined'){
            cliamView = {
                claimViewObject : {
                    id: null,
                    code : null,
                    branchSeqNo : null,
                    privileged: null,
                    incident : null,
                    assignmentTypeCode : null,
                    accountCode : null,
                    accountPolicyId : null,
                    insuredName : null,
                    insuredClaim : null,
                    tradingAs : null,
                    claimTypeCode : null,
                    lossDescCode : null,
                    catastrophicLoss : null,
                    sourceCode : null,
                    insurerCode : null,
                    brokerCode : null,
                    branchCode : null,
                    branchTypeCode : null,
                    destroyedDate : null,
                    lossLocation : null,
                    lineOfBusinessCode : null,
                    lossDate : null,
                    receiveDate : null,
                    openDate : null,
                    closeDate : null,
                    insuredContactedDate : null,
                    limitationDate : null,
                    policyInceptionDate : null,
                    policyExpiryDate : null,
                    disabilityCode : null,
                    outComeCode : null,
                    lastChanged : null,
                    partnershipId : null,
                    adjusterCode : null,
                    rate : null,
                    feeType : null,
                    taxable : null,
                    estimatedClaimValue : null,
                    createdBy : null,
                    updatedBy : null,
                    statusId : null,
                    privileged : null,
                    organization : null,
                    operatedAs : null,
                    miscInfo : null,
                    largeLossClaim : null,
                    sirBreached : null,
                    claimAssignment : null,
                    policy : null,
                    reOpen : null,
                    eBoxDestroyed : null,
                    firstContact : null,
                    proscription : null,
                    created_at : null,
                    updated_at : null,
                    importDate : null,
                    importCloseDate : null
                },
                resetClaimViewObject : function(){
                    for(var i = 0; i < Object.keys(cliamView.claimViewObject).length;i++){
                        cliamView.claimViewObject[Object.keys(cliamView.claimViewObject)[i]] = null;
                    }
                },
                save : function () {
                    for(var i = 0; i < Object.keys(cliamView.claimViewObject).length;i++){
                        if($("#"+Object.keys(cliamView.claimViewObject)[i])){
                            cliamView.claimViewObject[Object.keys(cliamView.claimViewObject)[i]] = $("#"+Object.keys(cliamView.claimViewObject)[i]).val();
                        }
                    }
                    cliamView.claimViewObject.id = $("input[name=id]").val();
                    console.log(cliamView.claimViewObject);
                },
                cancel : function () {
                    for(var i = 0; i < Object.keys(cliamView.claimViewObject).length;i++){
                        cliamView.claimViewObject[Object.keys(cliamView.claimViewObject)[i]] = null;
                    }
                },
                fillClaimToForm : function (claimId) {
                    $.get(url+"getClaimByCode/"+claimId,function (data) {
                        if(data.status === 201){
                            for(var i = 0; i < Object.keys(data.data).length;i++){
                                $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                            }
                        }
                        $("input[name=id]").val(data.data.id);
                        $("input[name=code]").val(data.data.code);
                    });
                    $("#modal-claim").modal("hide");
                },
                searchClaimByCode : function () {
                    $.get(url + 'getAllClaim',function (listClaim) {
                        var row = "";
                        for (var i = 0; i < listClaim.length; i++) {
                            var tr = "<tr>";
                            tr += "<td>" + listClaim[i]["code"] + "</td>";
                            tr += "<td>"+ listClaim[i]["insuredLastName"] + "</td>";
                            tr += "<td>"+ listClaim[i]["lossLocation"] + "</td>";
                            tr += "<td>"+ listClaim[i]["receiveDate"] + "</td>";
                            tr += "<td>"+ listClaim[i]["openDate"] + "</td>";
                            tr += "<td>"+ listClaim[i]["adjusterCode"] + "</td>";
                            tr += "<td><button class='btn btn-xs btn-success' onclick='cliamView.fillClaimToForm(\"" + listClaim[i]["code"] + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
                            tr += "</tr>";
                            row += tr;
                        }
                        $("#claim-talbe-body").empty().append(row);
                    });
                    $("#modal-claim").modal("show");
                },
                fillClaim : function (inputElement,event) {
                    if(event.keyCode === 13){
                        $.get(url+"getClaimByCode/"+$(inputElement).val(),function (result) {
                            if(result.status === 201){
                                console.log(result.data);
                                for(var i = 0; i < Object.keys(result.data).length;i++){
                                    $("#" + Object.keys(result.data)[i]).val(result.data[Object.keys(result.data)[i]]);
                                }
                            }
                            $("input[name=id]").val(result.data.id);
                        });
                    }
                }
            };
        }
    });
</script>
