<div class="row" style="background-color: white;padding-top: 20px;padding-bottom: 20px">
    <form class="form-claim" id="form_claim">
        <input name="id" id="id" style="display: none" type="text" value="0">
        <table style="width: 100%" id="table_claim">
            <tr>
                <td style="width: 15%;">
                    <h5 class="text-right">ID:</h5>
                </td>
                <td style="width: 15%;">
                    @if($codeClaim!=null)
                        <input id="code" name="code" value="{{$codeClaim + 1}}" ondblclick="claimView.searchClaimByCode()" onkeyup="claimView.fillClaim(this,event)" type="text"/>
                    @else
                        <input id="code" name="code" value="1000000" ondblclick="claimView.searchClaimByCode()" onkeyup="claimView.fillClaim(this,event)" type="text"/>
                    @endif
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
                        <input type="text" id="policy" name="policy">
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
                        <select name="currency" id="currency" style="width: 100%" disabled>
                            <option value="usd">VND</option>
                            <option value="vnd">USD</option>
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
                        <button style="width: 100%" id="insured_address">Address...</button>
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
                        <input type="date" id="receiveDate" name="receiveDate">
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
                        <input type="date" id="openDate" name="openDate">
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
                        <input type="date" id="closeDate" name="closeDate" readonly style="background-color: #EFE5E5">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Misc Info:</h5>
                </td>
                <td colspan="3">
                    <input type="text" name="miscInfo" id="miscInfo">
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
                    <input type="text" id="claimTypeCode" name="claimTypeCode" style="text-transform: uppercase">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Insurer:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="insurerCode" name="insurerCode" style="text-transform: uppercase">
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
                        <input type="text" id="destroyedDate" name="destroyedDate" readonly style="background-color: #EFE5E5"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Loss Desc:</h5>
                </td>
                <td>
                    <input type="text" id="lossDescCode" name="lossDescCode" style="text-transform: uppercase">
                </td>
                <td>
                    <div style="display: inline-block;width: 20%">
                        <h5>Broker:</h5>
                    </div>
                    <div style="display: inline-block;width: 78%">
                        <input type="text" id="brokerCode" name="brokerCode" style="text-transform: uppercase">
                    </div>
                </td>
                <td>
                    <div style="display: inline-block;width: 30%">
                        <h5 class="text-right">Adjuster:</h5>
                    </div>
                    <div style="display: inline-block;width: 68%">
                        <input type="text" id="adjusterCode" name="adjusterCode" style="text-transform: uppercase">
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
                        <input type="date" id="firstContact" name="firstContact">
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
                        <input type="text" id="sourceCode" name="sourceCode" readonly>
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
                        <input type="text" id="contact" name="contact">
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-right">
                    <h5 class="text-right">Loss Location</h5>
                </td>
                <td colspan="3">
                    <input type="text" id="lossLocation" name="lossLocation">
                </td>
                <td>
                    <div style="display: inline-block;width: 40%">
                        <h5 class="text-right">Loss Date:</h5>
                    </div>
                    <div style="display: inline-block;width: 58%">
                        <input type="date" id="lossDate" name="lossDate">
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
                        <input type="date" id="proscription" name="proscription">
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
                        <input type="date" id="policyInceptionDate" name="policyInceptionDate">
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
                        <input type="date" id="policyExpiryDate" name="policyExpiryDate">
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
                </td>
                <td rowspan="6" style="border: 1px solid #c5c0c0;border-radius: 10px;padding: 10px">
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Created Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="created_at" name="created_at" type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Created By:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="createdBy" name="createdBy" type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Last Changed:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="updated_at" name="updated_at" type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Last Changed By:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="updatedBy" name="updatedBy" type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Import Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input id="importDate" name="importDate" type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                    <div>
                        <div style="display: inline-block;width: 40%">
                            <h5 class="text-right">Import Close Date:</h5>
                        </div>
                        <div style="display: inline-block;width: 58%">
                            <input type="text" readonly style="background-color: #EFE5E5">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <br>
        <div class="text-right">
            <div style="width: 7%;display: inline-block">
                <input type="button" class="btn btn-success" value="Save">
            </div>
            <div style="width: 7%;display: inline-block;margin-right: 15px;margin-left: 20px">
                <input type="button" class="btn btn-danger" value="Cancel">
            </div>
        </div>
    </form>
</div>
<br>
<br>
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
{{--source code--}}
<div class="modal fade" id="modal-source-code">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Source Code
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th data-name="id" style="display: none">
                                Id
                            </th>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th class="text-center">
                                Choose/Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-source-code-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-source-code-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Source Code Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="source_code_modify_id" id="source_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="source_code_modify_code" name="source_code_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="source_code_modify_name" id="source_code_modify_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

{{--insurer code--}}
<div class="modal fade" id="modal-insurer-code">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Insurer Code
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tableInsurer">
                        <thead>
                        <tr>
                            <th data-name="id" style="display: none">
                                Id
                            </th>
                            <th data-name="code" style="width: 100px">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th data-name="sourceCustomerId" style="width: 120px">
                                Source Customer
                            </th>
                            <th data-name="address" style="display: none;">
                                Source Address
                            </th>
                            <th data-name="contactPerson" style="display: none">
                                Contact Person
                            </th>
                            <th class="text-center">
                                Choose
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-insurer-code-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-insurer-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Insurer Code Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="insurer_code_modify_id" id="insurer_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="insurer_code_modify_code" name="insurer_code_modify_code">
                        </div>
                        <div class="col-sm-5">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="insurer_code_modify_name" id="insurer_code_modify_name">
                        </div>
                        <div class="col-sm-4">
                            <h5>Contact Person Name</h5>
                            <input type="text" class="form-control" name="insurer_code_modify_contact_person" id="insurer_code_modify_contact_person">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <h5>Address</h5>
                            <textarea rows="3" type="text" style="resize: none" class="form-control" id="insurer_code_modify_address" name="insurer_code_modify_address">

                            </textarea>
                        </div>
                        <div class="col-sm-4">
                            <h5>Choose Source Customer</h5>
                            <select class="form-control" id="insurer_code_modify_sourceCustomerId">
                                @if($sourceCustomer !=null)
                                    @foreach($sourceCustomer as $item)
                                        <option value="{{$item->code}}">{{$item->code}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

{{--claim type--}}
<div class="modal fade" id="modal-claim-type">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Claim Type
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="tableClaimType">
                        <thead>
                        <tr>
                            <th data-name="id" style="display: none">
                                Id
                            </th>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th class="text-center">
                                Choose/Edit
                            </th>
                        </tr>
                        </thead>
                        <tbody id="modal-claim-type-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-claim-type-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Claim Type Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="claimType_code_modify_id" id="claimType_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="claimType_code_modify_code" name="claimType_code_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="claimType_code_modify_name" id="claimType_code_modify_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
{{--loss desc code--}}
<div class="modal fade" id="modal-loss-desc-code">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Loss Desc Code
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" ID="tableLossDesc">
                        <thead>
                        <tr>
                            <th data-name="id" style="display: none">
                                Id
                            </th>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th class="text-center">
                                Choose/Edit
                            </th>
                        </tr>
                        </thead>

                        <tbody id="modal-loss-desc-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-loss-desc-code-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Loss Desc Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="lossDesc_code_modify_id" id="lossDesc_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="lossDesc_code_modify_code" name="lossDesc_code_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="lossDesc_code_modify_name" id="lossDesc_code_modify_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
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
                            <th data-name="id" style="display: none">
                                Id
                            </th>
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
{{--Branch--}}
<div class="modal fade" id="modal-branch">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Branch Code
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th data-name="id" style="display: none">
                                Id
                            </th>
                            <th data-name="code">
                                Code
                            </th>
                            <th data-name="name">
                                Name
                            </th>
                            <th data-name="branchType">
                                Branch Type
                            </th>
                            <th class="text-center">
                                Choose/Edit
                            </th>
                        </tr>
                        </thead>

                        <tbody id="modal-branch-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
                <button class="btn btn-primary" type="button" id="addNewBranchType">
                    Add New Branch Type
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-branch-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Branch Code Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="branch_code_modify_id" id="branch_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="branch_code_modify_code" name="branch_code_modify_code">
                        </div>
                        <div class="col-sm-5">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="branch_code_modify_name" id="branch_code_modify_name">
                        </div>
                        <div class="col-sm-4">
                            <h5>Choose Branch Type</h5>
                            <select id="branch_code_modify_branch_type" class="form-control">
                                @if($branchType!=null)
                                    @foreach($branchType as $item)
                                        <option value="{{$item->code}}">{{$item->code}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-branch-type-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Branch Type Code Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="branch_type-code_modify_id" id="branch_type-code_modify_id" value="0" style="display: none">
                        <div class="col-sm-3">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="branch_type-code_modify_code" name="branch_type-code_modify_code">
                        </div>
                        <div class="col-sm-9">
                            <h5>Name</h5>
                            <input type="text" class="form-control" name="branch_type-code_modify_name" id="branch_type-code_modify_name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

{{--Broker--}}
<div class="modal fade" id="modal-broker-code">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Broker Code
                </h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover" ID="tableBrokerCode">
                        <thead>
                        <tr>
                            <th>
                                Code
                            </th>
                            <th>
                                FirstName
                            </th>
                            <th>
                                LastName
                            </th>
                            <th>
                                Phone
                            </th>
                            <th class="text-center">
                                Choose/Edit
                            </th>
                        </tr>
                        </thead>

                        <tbody id="modal-broker-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="addNewUpdate">
                    Add New
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-broker-code-modify">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                    x
                </button>
                <h4 class="modal-title">
                    Broker Modify
                </h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <input type="text" name="broker_code_modify_id" id="broker_code_modify_id" value="0" style="display: none">
                        <div class="col-sm-6">
                            <h5>Code</h5>
                            <input type="text" class="form-control" id="broker_code_modify_code" name="broker_code_modify_code">
                        </div>
                        <div class="col-sm-6">
                            <h5>Phone</h5>
                            <input type="text" class="form-control" name="broker_code_modify_phone" id="broker_code_modify_phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h5>FirstName</h5>
                            <input type="text" class="form-control" name="broker_code_modify_firstName" id="broker_code_modify_firstName">
                        </div>
                        <div class="col-sm-6">
                            <h5>LastName</h5>
                            <input type="text" class="form-control" name="broker_code_modify_lastName" id="broker_code_modify_lastName">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="saveSubmit">
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
            claimView = {
                claimViewObject : {
                    id: null,
                    code : null,
                    branchSeqNo : null,
                    incident : null,
                    //assignmentTypeCode : null,
                    accountCode : null,
                    //accountPolicyId : null,
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
                    //branchTypeCode : null,
                    //destroyedDate : null,
                    lossLocation : null,
                    lineOfBusinessCode : null,
                    lossDate : null,
                    receiveDate : null,
                    openDate : null,
                    closeDate : null,
                    //insuredContactedDate : null,
                    //limitationDate : null,
                    policyInceptionDate : null,
                    policyExpiryDate : null,
                    disabilityCode : null,
                    //outComeCode : null,
                    //lastChanged : null,
                    partnershipId : null,
                    adjusterCode : null,
                    rate : null,
                    //feeType : null,
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
                    //reOpen : null,
                    //eBoxDestroyed : null,
                    firstContact : null,
                    contact:null,
                    proscription : null,
                    created_at : null,
                    updated_at : null,
                    //importDate : null,
                    //importCloseDate : null
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
                save : function () {
                    //validator
                    $("form[id=form_claim]").validate({
                        rules: {
                            claimTypeCode: "required",
                            lossDescCode: "required",
                            insurerCode: "required",
                            sourceCode: "required",
                            insuredLastName:"required",
                            openDate:"required",
                            lossDate:"required",
                            receiveDate:"required",
                            adjusterCode:"required"
                        },
                        messages: {
                            claimTypeCode: "Claim type is required",
                            lossDescCode: "Loss desc is required",
                            insurerCode:"Insurer code is required",
                            sourceCode:"Source code is required",
                            insuredLastName:"Insured LastName is required",
                            openDate:"Open date is required",
                            lossDate:"Loss date is required",
                            receiveDate:"Receive date is required",
                            adjusterCode:"AdjusterCode is required"
                        }
                    });
                    if($("form[id=form_claim]").valid())
                    {
                        for(var i = 0; i < Object.keys(claimView.claimViewObject).length;i++){
                                if($("#"+Object.keys(claimView.claimViewObject)[i]).val()===""){
                                    claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = "";
                                }
                                else
                                {
                                    claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = $("#"+Object.keys(claimView.claimViewObject)[i]).val();
                                }
                            }
                            claimView.claimViewObject.id = $("input[name=id]").val();
                            claimView.claimViewObject.insuredAddress = $("textarea[name=insuredAddress]").val();
                            if($("input[name=sirBreached]").is(":checked"))
                            {
                                claimView.claimViewObject.sirBreached = 1;
                            }
                            else
                            {
                                claimView.claimViewObject.sirBreached = 0;
                            }
                            if($("input[name=taxable]").is(":checked"))
                            {
                                claimView.claimViewObject.taxable = 1;
                            }
                            else
                            {
                                claimView.claimViewObject.taxable = 0;
                            }
                            if($("input[name=claimAssignment]").is(":checked"))
                            {
                                claimView.claimViewObject.claimAssignment = 1;
                            }
                            else
                            {
                                claimView.claimViewObject.claimAssignment = 0;
                            }
                            if($("input[name=privileged]").is(":checked"))
                            {
                                claimView.claimViewObject.privileged = 1;
                            }
                            else
                            {
                                claimView.claimViewObject.privileged = 0;
                            }
                            $.post(url+'saveClaim/'+ $("input[name=id]").val(),{_token:_token,claim : claimView.claimViewObject},function (data) {
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Error"]==="LossDate>ReceiveDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Loss date is not lager than received date");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="LossDate>OpenDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Loss date is not lager than or equal open date");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="TheSameCodeClaim")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Code claim is exist!!!");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else
                                    {
                                        $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add new Claim Success");
                                        $("div[id=modal-confirm]").modal("show");
                                        claimView.cancel();
                                        claimView.getMaxClaimCode();
                                    }
                                }
                                else
                                {
                                    if(data["Error"]==="LossDate>ReceiveDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Loss date is not lager than received date");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="LossDate>OpenDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Loss date is not lager than or equal open date");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="ErrorCloseDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Close Date is not correct!!!");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="CantUpdateOpenDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("This claim has already task and open date is not lager than bill date of task!!!Please check again!");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else if(data["Error"]==="CantUpdateReceiveDate")
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("This claim has already task and receive date is not lager than bill date of task!!!Please check again!");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                    else
                                    {
                                        $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Update Claim Success");
                                        $("div[id=modal-confirm]").modal("show");
                                        claimView.cancel();
                                        claimView.getMaxClaimCode();
                                    }
                                }
                            });


                    }
                },
                saveAddNewUpdateClaimType:function()
                {
                    $.post(url+"saveAddNewUpdateClaimType",
                    {
                       _token:_token,
                        idClaimType:$("#claimType_code_modify_id").val(),
                        codeClaimType:$("#claimType_code_modify_code").val(),
                        nameClaimType:$("#claimType_code_modify_name").val()
                    },
                    function(data){
                        if(data["Action"]==="AddNew")
                        {
                            if(data["Result"]===1)
                            {
                                claimView.getAllClaimType();
                                $("#modal-claim-type-modify").modal("hide");
                                $("#modal-claim-type").modal("show");
                            }
                        }
                        else
                        {
                            if(data["Result"]===1)
                            {
                                claimView.getAllClaimType();
                                $("#modal-claim-type-modify").modal("hide");
                                $("#modal-claim-type").modal("show");
                            }
                        }
                    })
                },
                saveAddNewUpdateLossDesc:function()
                {
                    $.post(url+"saveAddNewUpdateLossDesc",
                            {
                                _token:_token,
                                idLossDesc:$("#lossDesc_code_modify_id").val(),
                                codeLossDesc:$("#lossDesc_code_modify_code").val(),
                                nameLossDesc:$("#lossDesc_code_modify_name").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllLossDesc();
                                        $("#modal-loss-desc-code-modify").modal("hide");
                                        $("#modal-loss-desc-code").modal("show");
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllLossDesc();
                                        $("#modal-loss-desc-code-modify").modal("hide");
                                        $("#modal-loss-desc-code").modal("show");
                                    }
                                }
                            })
                },
                saveAddNewUpdateSourceCode:function()
                {
                    $.post(url+"saveAddNewUpdateSourceCode",
                            {
                                _token:_token,
                                idSourceCode:$("#source_code_modify_id").val(),
                                codeSourceCode:$("#source_code_modify_code").val(),
                                nameSourceCode:$("#source_code_modify_name").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllSourceCode();
                                        $("#modal-source-code-modify").modal("hide");
                                        $("#modal-source-code").modal("show");
                                        //insert option in select of table insurer
                                        $("select#insurer_code_modify_sourceCustomerId").append($("<option></option>")
                                                .attr("value",data["Data"]["code"])
                                                .text(data["Data"]["code"]));
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllSourceCode();
                                        $("#modal-source-code-modify").modal("hide");
                                        $("#modal-source-code").modal("show");
                                    }
                                }
                            })
                },
                saveAddNewUpdateBranch:function()
                {
                    $.post(url+"saveAddNewUpdateBranch",
                            {
                                _token:_token,
                                idBranch:$("#branch_code_modify_id").val(),
                                codeBranch:$("#branch_code_modify_code").val(),
                                nameBranch:$("#branch_code_modify_name").val(),
                                branchTypeBranch:$("select#branch_code_modify_branch_type option:selected").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllBranch();
                                        $("#modal-branch-modify").modal("hide");
                                        $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
                                        $("#modal-branch").modal("show");
                                    }
                                    else
                                    {
                                        $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add new branch no success");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllBranch();
                                        $("#modal-branch-modify").modal("hide");
                                        $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
                                        $("#modal-branch").modal("show");
                                    }
                                    else
                                    {
                                        $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add new branch no success");
                                        $("div[id=modal-confirm]").modal("show");
                                    }
                                }
                            })
                },
                saveAddNewUpdateBranchType:function()
                {
                    $.post(url+"saveAddNewUpdateBranchType",
                            {
                                _token:_token,
                                idBranchType:$("#branch_type-code_modify_id").val(),
                                codeBranchType:$("#branch_type-code_modify_code").val(),
                                nameBranchType:$("#branch_type-code_modify_name").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {
                                         $("select#branch_code_modify_branch_type").append($("<option></option>")
                                                                                            .attr("value",data["Data"]["code"])
                                                                                            .text(data["Data"]["code"]));
                                        $("div[id=modal-branch-type-modify]").modal("hide");
                                        $("div[id=modal-branch-modify]").modal("show");
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {

                                    }
                                }
                            })
                },
                saveAddNewUpdateInsurer:function()
                {
                    $.post(url+"saveAddNewUpdateInsurer",
                            {
                                _token:_token,
                                idInsurer:$("#insurer_code_modify_id").val(),
                                codeInsurer:$("#insurer_code_modify_code").val(),
                                nameInsurer:$("#insurer_code_modify_name").val(),
                                contactPersonInsurer:$("#insurer_code_modify_contact_person").val(),
                                addressInsurer:$("#insurer_code_modify_address").val(),
                                sourceCustomer:$("select#insurer_code_modify_sourceCustomerId option:selected").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {

                                        claimView.getAllInsurerCode();
                                        $("div[id=modal-insurer-modify]").modal("hide");
                                        $("div[id=modal-insurer-code]").modal("show");

                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllInsurerCode();
                                        $("div[id=modal-insurer-modify]").modal("hide");
                                        $("div[id=modal-insurer-code]").modal("show");
                                    }
                                }
                            })
                },
                saveAddNewUpdateBroker:function()
                {
                    $.post(url+"saveAddNewUpdateBroker",
                            {
                                _token:_token,
                                id:$("#broker_code_modify_id").val(),
                                code:$("#broker_code_modify_code").val(),
                                firstName:$("#broker_code_modify_firstName").val(),
                                lastName:$("#broker_code_modify_lastName").val(),
                                phone:$("#broker_code_modify_phone").val()
                            },
                            function(data){
                                if(data["Action"]==="AddNew")
                                {
                                    if(data["Result"]===1)
                                    {

                                        claimView.getAllBroker();
                                        $("div[id=modal-broker-code-modify]").modal("hide");
                                        $("div[id=modal-broker-code]").modal("show");

                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        claimView.getAllBroker();
                                        $("div[id=modal-broker-code-modify]").modal("hide");
                                        $("div[id=modal-broker-code]").modal("show");
                                    }
                                }
                            })
                },
                getMaxClaimCode:function()
                {
                    $.get(url+"getMaxCodeClaim",{_token:_token},function(data){
                        $("input[name=code]").val(data);
                    })
                },
                cancel : function () {
                    for(var i = 0; i < Object.keys(claimView.claimViewObject).length;i++){
                        claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = null;
                    }
                    $("input[name=code]").prop("readOnly",false).css("background-color","");
                    $("table[id=table_claim]").find("input").val("");
                    $("textarea[name=insuredAddress]").val("");
                    $("input[name=sirBreached]").prop("checked",false);
                    $("input[name=claimAssignment]").prop("checked",false);
                    $("input[name=taxable]").prop("checked",false);
                    $("input[name=privileged]").prop("checked",false);
                    $("input[name=id]").val("0");

//                    $("input[name=receiveDate]").prop("readOnly",false);
//                    $("input[name=openDate]").prop("readOnly",false);
//                    $("input[name=lossDate]").prop("readOnly",false);
//                    $("input[name=proscription]").prop("readOnly",false);
//                    $("input[name=firstContact]").prop("readOnly",false);
//                    $("input[name=contact]").prop("readOnly",false);

                    $("input[name=closeDate]").prop("readOnly",true).css("background-color","#EFE5E5");


                },
                fillClaimToForm : function (claimId) {
                    $("input[name=closeDate]").prop("readOnly",false).css("background-color","");
                    $("input[name=code]").prop("readOnly",true).css("background-color","#EFE5E5");
                    $("table[id=table_claim]").find("label[class=error]").hide();
                    $.get(url+"getClaimByCode/"+claimId,function (data) {
                        if(data.status === 201){
                            $("input[name=id]").val(data.data.id);
                            for(var i = 0; i < Object.keys(data.data).length;i++){
                                var ob =Object.keys(data.data)[i];
                                console.log(data.data[ob]);
                                if(ob==="rate"){
                                    $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                }
                                else
                                {

                                      if(data.data[ob]!==null && data.data[ob]!=="0000-00-00 00:00:00")
                                      {
                                          if(ob==="receiveDate" || ob==="lossDate" || ob==="openDate" || ob==="closeDate"
                                                  || ob==="policyInceptionDate" || ob==="policyExpiryDate" || ob==="firstContact"
                                                  || ob==="proscription" || ob==="created_at" || ob==="updated_at")
                                          {
                                              $("#" + Object.keys(data.data)[i]).val(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]]));
                                          }
                                          else
                                          {
                                              $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                          }
                                      }

//                                    if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="NaN-aN-aN")
//                                    {
//                                        $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                    }
//                                    else if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="1969-12-31")
//                                    {
//                                        $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                    }
//                                    else if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="1970-01-01")
//                                    {
//                                        $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                    }
//                                    else
//                                    {
//                                        $("#" + Object.keys(data.data)[i]).val(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]]));
//                                    }
                                }

                            }
                        }
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
                        $("input[name=rate]").formatCurrency({roundToDecimalPlace:0})
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
                            tr += "<td class='text-center'><button class='btn btn-xs btn-success' onclick='claimView.fillClaimToForm(\"" + listClaim[i]["code"] + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
                            tr += "</tr>";
                            row += tr;
                        }
                        $("#claim-talbe-body").empty().append(row);
                        $("#claim-table").DataTable();
                    });
                    $("#modal-claim").modal("show");
                },
                fillClaim : function (inputElement,event) {
                    $("input[name=closeDate]").prop("readOnly",false).css("background-color","");
                    $("table[id=table_claim]").find("label[class=error]").hide();
                    if(event.keyCode === 13){
                        $.get(url+"getClaimByCode/"+$(inputElement).val(),function (data) {
                            if(data.status === 201){
                                $("input[name=code]").prop("readOnly",true).css("background-color","#EFE5E5");
                                $("input[name=id]").val(data.data.id);
//                                for(var i = 0; i < Object.keys(result.data).length;i++){
//                                    $("#" + Object.keys(result.data)[i]).val(result.data[Object.keys(result.data)[i]]);
//                                }
                                for(var i = 0; i < Object.keys(data.data).length;i++){
                                    var ob =Object.keys(data.data)[i];
                                    if(Object.keys(data.data)[i]==="rate"){
                                        $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                    }
                                    else
                                    {
                                        if(data.data[ob]!==null && data.data[ob]!=="0000-00-00 00:00:00")
                                        {
                                            if(ob==="receiveDate" || ob==="lossDate" || ob==="openDate" || ob==="closeDate"
                                                    || ob==="policyInceptionDate" || ob==="policyExpiryDate" || ob==="firstContact"
                                                    || ob==="proscription" || ob==="created_at" || ob==="updated_at")
                                            {
                                                $("#" + Object.keys(data.data)[i]).val(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]]));
                                            }
                                            else
                                            {
                                                $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
                                            }
                                        }
//                                        if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="NaN-aN-aN")
//                                        {
//                                            $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                        }
//                                        else if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="1970-01-01")
//                                        {
//                                            $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                        }
//                                        else if(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]])==="1969-12-31")
//                                        {
//                                            $("#" + Object.keys(data.data)[i]).val(data.data[Object.keys(data.data)[i]]);
//                                        }
//                                        else
//                                        {
//                                            $("#" + Object.keys(data.data)[i]).val(claimView.convertStringToDate(data.data[Object.keys(data.data)[i]]));
//                                        }
                                    }
                                }
                            }

                            $("input[name=id]").val(data.data.id);
                            $("input[name=rate]").formatCurrency({roundToDecimalPlace:0})
                        });
                    }
                },
                fillSourceCustomerFromModalToInput: function(element){
                    $("input[name=sourceCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("#modal-source-code").modal("hide");
                },
                fillClaimTypeFromModalToInput : function(element){
                    $("input[name=claimTypeCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("#modal-claim-type").modal("hide");
                },
                fillLossDescFromModalToInput:function(element)
                {
                    $("input[name=lossDescCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("#modal-loss-desc-code").modal("hide");
                },
                fillAdjusterFromModalToInput:function(element)
                {
                    $("input[name=adjusterCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("input[name=rate]").val($(element).parent().parent().find("td").eq(5).text());
                    $("input[name=rate]").formatCurrency({roundToDecimalPlace:0})
                    $("#modal-adjuster").modal("hide");
                },
                fillBranchFromModalToInput:function(element)
                {
                    $("input[name=branchCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("#modal-branch").modal("hide");
                },
                fillInsurerCodeFromModalToInput:function(element)
                {
                    $("input[name=insurerCode]").val($(element).parent().parent().parent().parent().find("td").eq(1).text());
                    $("input[name=sourceCode]").val($(element).parent().parent().parent().parent().find("td").eq(3).text());
                    //fill automatic to Contact of claim
                    $("input[name=contact]").val($(element).parent().parent().parent().parent().find("td").eq(5).text());
                    $("#modal-insurer-code").modal("hide");
                },
                fillBrokerFromModalToInput:function(element)
                {
                    $("input[name=brokerCode]").val($(element).parent().parent().find("td").eq(1).text());
                    $("#modal-broker-code").modal("hide");
                },
                editClaimType:function(element)
                {
                    $("input[name=claimType_code_modify_id]").val($(element).parent().parent().find("td").eq(0).text());
                    $("input[name=claimType_code_modify_code]").val($(element).parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=claimType_code_modify_name]").val($(element).parent().parent().find("td").eq(2).text());
                    $("div[id=modal-claim-type]").modal("hide");
                    $("div[id=modal-claim-type-modify]").modal("show");
                },
                editLossDesc:function(element)
                {
                    $("input[name=lossDesc_code_modify_id]").val($(element).parent().parent().find("td").eq(0).text());
                    $("input[name=lossDesc_code_modify_code]").val($(element).parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=lossDesc_code_modify_name]").val($(element).parent().parent().find("td").eq(2).text());
                    $("#modal-loss-desc-code").modal("hide");
                    $("#modal-loss-desc-code-modify").modal("show");
                },
                editSourceCode:function(element)
                {

                    $("input[name=source_code_modify_id]").val($(element).parent().parent().find("td").eq(0).text());
                    $("input[name=source_code_modify_code]").val($(element).parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=source_code_modify_name]").val($(element).parent().parent().find("td").eq(2).text());
                    $("#modal-source-code").modal("hide");
                    $("#modal-source-code-modify").modal("show");
                },
                editBranch:function(element)
                {
                    $("input[name=branch_code_modify_id]").val($(element).parent().parent().find("td").eq(0).text());
                    $("input[name=branch_code_modify_code]").val($(element).parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=branch_code_modify_name]").val($(element).parent().parent().find("td").eq(2).text());
                    $("select#branch_code_modify_branch_type").val($(element).parent().parent().find("td").eq(3).text()).prop("disabled",true);

                    $("#modal-branch").modal("hide");
                    $("#modal-branch-modify").modal("show");
                },
                editInsurerCode:function(element)
                {
                    $("input[name=insurer_code_modify_id]").val($(element).parent().parent().parent().parent().find("td").eq(0).text());
                    $("input[name=insurer_code_modify_code]").val($(element).parent().parent().parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=insurer_code_modify_name]").val($(element).parent().parent().parent().parent().find("td").eq(2).text());
                    $("select#insurer_code_modify_sourceCustomerId").val($(element).parent().parent().parent().parent().find("td").eq(3).text()).prop("disabled",true);

                    $("textarea[name=insurer_code_modify_address]").val($(element).parent().parent().parent().parent().find("td").eq(4).text());
                    $("input[name=insurer_code_modify_contact_person]").val($(element).parent().parent().parent().parent().find("td").eq(5).text());


                    $("#modal-insurer-code").modal("hide");
                    $("#modal-insurer-modify").modal("show");
                },
                editBroker:function(element)
                {
                    $("input[name=broker_code_modify_id]").val($(element).parent().parent().find("td").eq(0).text());
                    $("input[name=broker_code_modify_code]").val($(element).parent().parent().find("td").eq(1).text()).prop("readOnly",true).css("background-color","#EFE5E5");
                    $("input[name=broker_code_modify_firstName]").val($(element).parent().parent().find("td").eq(2).text());
                    $("input[name=broker_code_modify_lastName]").val($(element).parent().parent().find("td").eq(3).text());
                    $("input[name=broker_code_modify_phone]").val($(element).parent().parent().find("td").eq(4).text());

                    $("#modal-broker-code").modal("hide");
                    $("#modal-broker-code-modify").modal("show");
                },
                getAllBranch:function()
                {
                    $.get(url + 'getAllBranch',function (data) {
                        $("#modal-branch-table-body").empty().append(data);
                    });
                },
                getAllClaimType:function()
                {
                    $.get(url + 'getAllClaimType',function (data) {
                        $("table[id=tableClaimType]").DataTable().destroy();
                        $("#modal-claim-type-table-body").empty().append(data);
                        $("table[id=tableClaimType]").DataTable();
                    });
                },
                getAllLossDesc:function()
                {
                    $.get(url + 'getAllLossDesc',function (data) {
                        $("table[id=tableLossDesc]").DataTable().destroy();
                        $("#modal-loss-desc-table-body").empty().append(data);
                        $("table[id=tableLossDesc]").DataTable();
                    });
                },
                getAllSourceCode:function()
                {
                    $.get(url + 'getAllSourceCode',function (data) {
                        $("#modal-source-code-table-body").empty().append(data);
                    });
                },
                getAllInsurerCode:function()
                {
                    $.get(url + 'getAllInsurerCode',function (data) {
                        $("table[id=tableInsurer]").DataTable().destroy();
                        $("#modal-insurer-code-table-body").empty().append(data);
                        $("table[id=tableInsurer]").DataTable();
                    });
                },
                getAllBroker:function()
                {
                    $.get(url + 'getAllBrokerCode',function (data) {
                        $("#modal-broker-table-body").empty().append(data);
                    });
                }
            };
        }
        /* insured address */
        $("button#insured_address").click(function (e) {
            e.preventDefault();
            $("#modal-insured-address").modal("show");
        });
        /* source code */
//        $("input#sourceCode").dblclick(function () {
//            $("#modal-source-code").modal("show");
//            claimView.getAllSourceCode();
//        });
        $("#modal-source-code").find("button#addNewUpdate").click(function () {
            //Reset form
            $("#source_code_modify_id").val("0");
            $("#source_code_modify_code").val("").prop("readOnly",false).css("background-color","");
            $("#source_code_modify_name").val("");

            $("#modal-source-code").modal("hide");
            $("#modal-source-code-modify").modal("show");
        });
        $("#modal-source-code-modify").find("button#saveSubmit").click(function(){
            claimView.saveAddNewUpdateSourceCode();
        });
        /* insurer code */
        $("input#insurerCode").dblclick(function () {
            $("#modal-insurer-code").modal("show");
            claimView.getAllInsurerCode();
        });
        $("div#modal-insurer-code").find("button#addNewUpdate").click(function () {
            //Reset form
            $("select#insurer_code_modify_sourceCustomerId").val($("select#insurer_code_modify_sourceCustomerId option:eq(0)").val()).prop("disabled",false);
            $("input[name=insurer_code_modify_id]").val("0");
            $("input[name=insurer_code_modify_code]").val("").prop("readOnly",false).css("background-color","");
            $("input[name=insurer_code_modify_name]").val("");
            $("input[name=insurer_code_modify_contact_person]").val("");
            $("textarea[name=insurer_code_modify_address]").val("");

            $("#modal-insurer-code").modal("hide");
            $("#modal-insurer-modify").modal("show");
        });
        $("div#modal-insurer-modify").find("button#saveSubmit").click(function () {
           claimView.saveAddNewUpdateInsurer();
        });

        /* claim type */
        $("input#claimTypeCode").dblclick(function () {
            $("#modal-claim-type").modal("show");
            claimView.getAllClaimType();
        });
        $("#modal-claim-type").find("button#addNewUpdate").click(function () {
            //reset form
            $("#claimType_code_modify_id").val("0");
            $("#claimType_code_modify_code").val("").prop("readOnly",false).css("background-color","");
            $("#claimType_code_modify_name").val("");

            $("#modal-claim-type").modal("hide");
            $("#modal-claim-type-modify").modal("show");
        });
        $("#modal-claim-type-modify").find("button#saveSubmit").click(function(){
            claimView.saveAddNewUpdateClaimType();
        });

        /* Loss Desc Code */
        $("input[name=lossDescCode]").dblclick(function(){
            $("div[id=modal-loss-desc-code]").modal("show");
            claimView.getAllLossDesc();
        });
        $("div[id=modal-loss-desc-code]").find("button[id=addNewUpdate]").click(function(){
            //Reset form
            $("input[id=lossDesc_code_modify_id]").val("0");
            $("input[id=lossDesc_code_modify_code]").val("").prop("readOnly",false).css("background-color","");
            $("input[id=lossDesc_code_modify_name]").val("");

            $("div[id=modal-loss-desc-code]").modal("hide");
            $("div[id=modal-loss-desc-code-modify]").modal("show");
        });
        $("div[id=modal-loss-desc-code-modify]").find("button[id=saveSubmit]").click(function(){
            claimView.saveAddNewUpdateLossDesc();
        });

        /* Adjuster */
        $("input[name=adjusterCode]").dblclick(function(){
            $("div[id=modal-adjuster]").modal("show");
            $.get(url + 'getAllAdjuster',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].name+"</td>";
                    tr+="<td>"+data[i].email+"</td>";
                    tr+="<td>"+data[i].firstName+"</td>";
                    tr+="<td>"+data[i].lastName+"</td>";
                    tr+="<td>"+data[i].rate+"</td>";
                    tr+="<td class='text-center'><button class='btn btn-success' onclick='claimView.fillAdjusterFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-adjuster-table-body").empty().append(tr);
                $("#table-adjuster").DataTable();
            });
        });

        /* Branch Code */
        $("input[name=branchCode]").dblclick(function(){
            $("div[id=modal-branch]").modal("show");
            claimView.getAllBranch();
        });
        $("div[id=modal-branch]").find("button[id=addNewUpdate]").click(function(){
            $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
            $("input[id=branch_code_modify_id]").val("0");
            $("input[id=branch_code_modify_code]").val("").prop("readOnly",false).css("background-color","");
            $("input[id=branch_code_modify_name]").val("");

            $("div[id=modal-branch]").modal("hide");
            $("div[id=modal-branch-modify]").modal("show");
        });
        $("div[id=modal-branch]").find("button[id=addNewBranchType]").click(function(){
            //Reset form
            $("input[name=branch_type-code_modify_id]").val("0");
            $("input[name=branch_type-code_modify_code]").val("");
            $("input[name=branch_type-code_modify_name]").val("");

            $("div[id=modal-branch]").modal("hide");
            $("div[id=modal-branch-type-modify]").modal("show");
        });
        $("div[id=modal-branch-modify]").find("button[id=saveSubmit]").click(function(){
            claimView.saveAddNewUpdateBranch();
        });
        $("div[id=modal-branch-type-modify]").find("button[id=saveSubmit]").click(function(){
            claimView.saveAddNewUpdateBranchType();
        });

        /*Broker Code*/
        $("input[name=brokerCode]").dblclick(function(){
            $("div[id=modal-broker-code]").modal("show");
            claimView.getAllBroker();
        });
        $("div[id=modal-broker-code]").find("button[id=addNewUpdate]").click(function(){
            //Reset form
            $("input[name=broker_code_modify_id]").val("0");
            $("input[name=broker_code_modify_code]").val("");
            $("input[name=broker_code_modify_firstName]").val("");
            $("input[name=broker_code_modify_lastName]").val("");
            $("input[name=broker_code_modify_phone]").val("");

            $("div[id=modal-broker-code]").modal("hide");
            $("div[id=modal-broker-code-modify]").modal("show");
        });
        $("div[id=modal-broker-code-modify]").find("button[id=saveSubmit]").click(function(){
            claimView.saveAddNewUpdateBroker();
        });




        $("input[value=Save]").click(function (e) {
            e.preventDefault();
            claimView.save();
        });
        $("input[value=Cancel]").click(function (e) {
            e.preventDefault();
            claimView.cancel();
            claimView.getMaxClaimCode();
        });
    });
                            //Text transform Insurer
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputInsurer = $("input#insurerCode");

    //on keyup, start the countdown
    $inputInsurer.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingInsurer, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputInsurer.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingInsurer() {
        $.get(url + 'getSearchInsurer', {
            token: _token,
            Code: $inputInsurer.val()
        }, function (data) {
            console.log(data);
            if (data["Result"] === 0) {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this insurer!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputInsurer.val("");
                $("input#sourceCode").val("");
                $("input#contact").val("");
            } else if (data["Result"] === 2) {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this insurer!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputInsurer.val("");
                $("input#sourceCode").val("");
                $("input#contact").val("");
            } else {
                $inputInsurer.val(data["Data"]);
                $("input#sourceCode").val(data["Source"]);
                $("input#contact").val(data["Contact"]);
            }
        });
    }

                        //Text transform Claim Type
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputClaimType = $("input#claimTypeCode");

    //on keyup, start the countdown
    $inputClaimType.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingClaimType, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputClaimType.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingClaimType() {
        $.get(url + 'getSearchClaimType', {
            token: _token,
            Code: $inputClaimType.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this claim type!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputClaimType.val("");
            } else if (data === "2") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this claim type!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputClaimType.val("");
            } else {
                $inputClaimType.val(data[0]["code"]);
            }
        });
    }

                    //Text transform Loss desc
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputLossDesc = $("input#lossDescCode");

    //on keyup, start the countdown
    $inputLossDesc.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingLossDesc, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputLossDesc.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingLossDesc() {
        $.get(url + 'getSearchLossDesc', {
            token: _token,
            Code: $inputLossDesc.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this loss desc!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputLossDesc.val("");
            } else if (data === "2") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this loss desc!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputLossDesc.val("");
            } else {
                $inputLossDesc.val(data[0]["code"]);
            }
        });
    }

                //Text transform Broker
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputBroker = $("input#brokerCode");

    //on keyup, start the countdown
    $inputBroker.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingBroker, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputBroker.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingBroker() {
        $.get(url + 'getSearchBroker', {
            token: _token,
            Code: $inputBroker.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this broker!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputBroker.val("");
            } else if (data === "2") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this broker desc!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputBroker.val("");
            } else {
                $inputBroker.val(data[0]["code"]);
            }
        });
    }

                //Text transform Adjuster
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputAdjuster = $("input#adjusterCode");

    //on keyup, start the countdown
    $inputAdjuster.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingAdjuster, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputAdjuster.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingAdjuster() {
        $.get(url + 'getSearchAdjuster', {
            token: _token,
            Code: $inputAdjuster.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this adjuster!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputAdjuster.val("");
            } else if (data === "2") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this adjuster !Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputAdjuster.val("");
            } else {
                $inputAdjuster.val(data[0]["name"]);
            }
        });
    }

                    //Text transform Branch
    var typingTimer;                //timer identifier
    var doneTypingInterval = 800;  //time in ms, 3 second for example
    var $inputBranch = $("input#branchCode");

    //on keyup, start the countdown
    $inputBranch.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTypingBranch, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $inputBranch.on('keydown', function () {
        clearTimeout(typingTimer);
    });

    //user is "finished typing," do something
    function doneTypingBranch() {
        $.get(url + 'getSearchBranch', {
            token: _token,
            Code: $inputBranch.val()
        }, function (data) {
            if (data === "0") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this branch!Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputBranch.val("");
            } else if (data === "2") {
                $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Sorry!!!Not found this branch !Please choose other one");
                $("div[id=modal-confirm]").modal("show");
                $inputBranch.val("");
            } else {
                $inputBranch.val(data[0]["code"]);
            }
        });
    }
</script>
{{--demo--}}
