{{--insured address--}}
<div class="modal fade" id="modal-insured-address">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Insured Address
                </h4>
            </div>
            <div class="modal-body">
                <textarea name="insuredAddress" id="insuredAddress" rows="10" style="width: 100%;"></textarea>
            </div>
        </div>
    </div>
</div>
{{--Confirm--}}
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
{{--claim--}}

<div class="row" style="background-color: white;padding-top: 20px;padding-bottom: 20px">
    <form class="form-claim" id="form_claim">
        <table style="width: 100%" id="table_claim">
            <tr>
                <td style="width: 15%;">
                    <h5 class="text-right">ID:</h5>
                </td>
                <td style="width: 15%;">
                    <input id="code" name="code" type="text"/>
                </td>
                <td style="width: 20%;">
                    <div style="display: inline-block;width: 20%">
                        <input id="privileged" name="privileged" type="checkbox" disabled/>
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
                        <input id="accountCode" name="accountCode" type="text" readonly style="background-color: #EFE5E5"/>
                    </div>
                </td>
                <td style="width: 25%;">
                    <div style="display: inline-block;width: 40%">
                        <h5>Policy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="policy" name="policy" readonly style="background-color: #EFE5E5">
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
                        <input type="text" id="partnershipId" name="partnershipId" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5>Currency:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <select name="currency" id="currency" style="width: 100%" disabled>
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
                    <input type="text" id="organization" name="organization" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Incident:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="incident" name="incident" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5>Branch Seq #:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="branchSeqNo" name="branchSeqNo" style="background-color: #EFE5E5" readonly>
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
                        <button style="width: 100%" id="insured_address">Address...</button>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="insuredFirstName" name="insuredFirstName" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <input type="text" id="insuredLastName" name="insuredLastName" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Received:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="receiveDate" name="receiveDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Insured Claim #:</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="insuredClaim" name="insuredClaim" style="background-color: #EFE5E5" readonly>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Opened:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="openDate" name="openDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Operated As:</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="operatedAs" name="operatedAs" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Closed:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="closeDate" name="closeDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Misc Info:</h5>
                </td>
                <td colspan="3">
                    <input type="text" name="miscInfo" id="miscInfo" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Reopened:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="reOpen" name="reOpen" readonly style="background-color: #EFE5E5"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Claim Type:</h5>
                </td>
                <td>
                    <input type="text" id="claimTypeCode" name="claimTypeCode" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Insurer:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="insurerCode" name="insurerCode" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Branch:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="branchCode" name="branchCode" style="background-color: #EFE5E5" readonly>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Destroy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="destroyedDate" name="destroyedDate" readonly style="background-color: #EFE5E5"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Loss Desc:</h5>
                </td>
                <td>
                    <input type="text" id="lossDescCode" name="lossDescCode" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Broker:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="brokerCode" name="brokerCode" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Adjuster:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="adjusterCode" name="adjusterCode" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">EBox Destroy:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="eBoxDestroyed" name="eBoxDestroyed" readonly style="background-color: #EFE5E5">
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
                        <input type="text" id="rate" name="rate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">First Contact:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="firstContact" name="firstContact" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Catastrophic Loss:</h5>
                </td>
                <td>
                    <input type="text" id="catastrophicLoss" name="catastrophicLoss" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Source:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="sourceCode" name="sourceCode" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Period:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <select name="rateType" id="rateType" style="width: 100%" disabled>
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
                        <input type="text" id="contact" name="contact" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <h5 class="text-right">Loss Location</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="lossLocation" name="lossLocation" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Loss Date:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="lossDate" name="lossDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Line Of Business Code:</h5>
                </td>
                <td>
                    <input type="text" id="lineOfBusinessCode" name="lineOfBusinessCode" readonly style="background-color: #EFE5E5">
                </td>
                <td>
                    <div style="display: inline-block;width: 50%">
                        <h5 class="text-right">Large Loss Claim:</h5>
                    </div>
                    <div style="display: inline-block;width: 48%">
                        <select name="largeLossClaim" id="largeLossClaim" disabled>
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
                        <input type="checkbox" id="taxable" name="taxable" style="background-color: #EFE5E5" disabled>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Proscription:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="proscription" name="proscription" style="background-color: #EFE5E5" readonly>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Estimated Claim Value:</h5>
                </td>
                <td>
                    <input type="text" id="estimatedClaimValue" name="estimatedClaimValue" style="background-color: #EFE5E5" readonly>
                </td>
                <td>
                    <div style="display: inline-block;width: 50%">
                        <h5 class="text-right">SIR Breached:</h5>
                    </div>
                    <div style="display: inline-block;width: 48%">
                        <input type="checkbox" id="sirBreached" name="sirBreached" style="background-color: #EFE5E5" disabled>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 68%">
                        <h5 class="text-right">Claim Assignment:</h5>
                    </div>
                    <div style="display: inline-block;width: 30%">
                        <input type="checkbox" id="claimAssignment" name="claimAssignment" disabled>
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Policy Inception:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="text" id="policyInceptionDate" name="policyInceptionDate" readonly style="background-color: #EFE5E5">
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
                        <input type="text" id="policyExpiryDate" name="policyExpiryDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <h5></h5>
                </td>
            </tr>
            {{--<tr>--}}
                {{--<td colspan="4" rowspan="6"  style="border: 1px solid #c5c0c0;border-radius: 10px;padding: 10px;width: 878px;">--}}
                    {{--<h5>Co-insurers Detail</h5>--}}
                    {{--<div class="table-responsive" style="width: 878px;">--}}
                        {{--<table class="table table-bordered" style="width: 878px;">--}}
                            {{--<thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>--}}
                            {{--<thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>--}}
                            {{--<thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>--}}
                            {{--<thead> <tr> <th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> </thead>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</td>--}}
                {{--<td rowspan="6" style="border: 1px solid #c5c0c0;border-radius: 10px;padding: 10px">--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Created Date:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input id="created_at" name="created_at" type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Created By:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input id="createdBy" name="createdBy" type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Last Changed:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input id="updated_at" name="updated_at" type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Last Changed By:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input id="updatedBy" name="updatedBy" type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Import Date:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input id="importDate" name="importDate" type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div>--}}
                        {{--<div style="display: inline-block;width: 40%">--}}
                            {{--<h5 class="text-right">Import Close Date:</h5>--}}
                        {{--</div>--}}
                        {{--<div style="display: inline-block;width: 58%">--}}
                            {{--<input type="text" readonly style="background-color: #EFE5E5">--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</td>--}}
            {{--</tr>--}}
        </table>

    </form>
</div>
<script>

    $(document).on('keypress',':input:not(textarea):not([type=submit])', function (e) {
        if (e.which == 13) e.preventDefault();
    });

    $(function () {
        if(typeof claimView === 'undefined'){
            claimView = {
                claimViewObject : {
                    id: null,
                    code : null,
                    branchSeqNo : null,
                    incident : null,
                    accountCode : null,
                    insuredFirstName : null,
                    insuredLastName : null,
                    insuredClaim : null,
                    insuredAddress:null,
                    tradingAs : null,
                    claimTypeCode : null,
                    lossDescCode : null,
                    catastrophicLoss : null,
                    sourceCode : null,
                    insurerCode : null,
                    brokerCode : null,
                    branchCode : null,
                    lossLocation : null,
                    lineOfBusinessCode : null,
                    lossDate : null,
                    receiveDate : null,
                    openDate : null,
                    closeDate : null,
                    disabilityCode : null,
                    partnershipId : null,
                    adjusterCode : null,
                    rate : null,
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
                    firstContact : null,
                    contact:null,
                    proscription : null,
                    created_at : null,
                    updated_at : null
                },
                resetClaimViewObject : function(){
                    for(var i = 0; i < Object.keys(claimView.claimViewObject).length;i++){
                        claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = null;
                    }
                },
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = currentDate.getFullYear() + "-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-"
                            + ("0" + currentDate.getDate()).slice(-2);
                    return datetime;
                },
                loadClaimByEventEnterKey:function()
                {
                    $.post(url+"user/loadClaimByEventEnterKeyWhenUserSeeClaim",
                            {
                                _token:_token,
                                key:$("input[name=code]").val()
                            },function(data)
                            {
                                if(data.status === 201){
                                    for(var i = 0; i < Object.keys(data.data).length;i++){
                                        console.log(Object.keys(data.data)[i]);
                                        if(Object.keys(data.data)[i]==="rate"){
                                            $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                        }
                                        else
                                        {
                                            if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="NaN-aN-aN")
                                            {
                                                $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                            }
                                            else if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="1970-01-01")
                                            {
                                                $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                            }
                                            else
                                            {
                                                $("#" + Object.keys(data.data)[i]).val(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]]));
                                            }
                                        }
                                    }
                                    //custom sds
                                    if(data.data.sirBreached===1)
                                    {
                                        $("input[name=sirBreached]").prop("checked",true);
                                    }
                                    if(data.data.claimAssignment===1)
                                    {
                                        $("input[name=claimAssignment]").prop("checked",true);
                                    }
                                    if(data.data.taxable===1)
                                    {
                                        $("input[name=taxable]").prop("checked",true);
                                    }
                                    if(data.data.privileged===1)
                                    {
                                        $("input[name=privileged]").prop("checked",true);
                                    }
                                    $("input[name=id]").val(data.data.id);
                                    $("input[name=code]").val(data.data.code);
                                    $("input[name=createdBy]").val(data.userCreatedBy);
                                    $("input[name=updatedBy]").val(data.userUpdatedBy);
                                    if(data.data.largeLossClaim === "Undetermined"){
                                        $("option[value=determined]").removeAttr("selected");
                                        $("option[value=undetermined]").attr("selected","selected");
                                    }else{
                                        $("option[value=determined]").attr("selected","selected");
                                        $("option[value=undetermined]").removeAttr("selected");
                                    }
                                }
                                else
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("This claim code is not exist!!! ")
                                    $("div[id=modal-confirm]").modal("show");
                                }
                            })
                },
            }
        }
        /* insured address */
        $("button#insured_address").click(function (e) {
            e.preventDefault();
            $("#modal-insured-address").modal("show");
        });
        $("input[name=code]").keypress(function(e){
            if(e.keyCode===13)
            {
                claimView.loadClaimByEventEnterKey();
            }

        });
        $("input[value=Save]").click(function (e) {
            e.preventDefault();
            claimView.save();
        });
        $("input[value=Cancel]").click(function (e) {
            e.preventDefault();
            claimView.cancel();
            $("input[name=code]").val(claimView.codeClaim);
        });
    });
</script>