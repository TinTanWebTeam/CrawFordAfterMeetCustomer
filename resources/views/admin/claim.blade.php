<div class="row" style="background-color: white;padding-top: 20px;padding-bottom: 20px">
    <form class="form-claim" id="form_claim">
        <input name="id" style="display: none" type="text" value="0">
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
                        <input type="date" id="reOpen" name="reOpen"/>
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
                        <input type="date" id="destroyedDate" name="destroyedDate">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h5 class="text-right">Loss Desc:</h5>
                </td>
                <td>
                    <input type="text" id="lossDescCode" name="lossDescCode">
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
                        <input type="date" id="eBoxDestroyed" name="eBoxDestroyed">
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
                        <input type="text" id="sourceCode" name="sourceCode">
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
                        <input type="date" id="contact" name="contact">
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
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>
                                Code
                            </th>
                            <th>
                                Insured Name
                            </th>
                            <th>
                                Loss Location
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
                            <th>
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
                            <th>
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
    <div class="modal-dialog modal-md">
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
                            <th data-name="sourceCustomerId">
                                Source Customer
                            </th>
                            <th data-name="address" style="display: none;">
                                Source Address
                            </th>
                            <th data-name="contactPerson" style="display: none">
                                Contact Person
                            </th>
                            <th>
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
    <div class="modal-dialog modal-md">
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
                            <th>
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
    <div class="modal-dialog modal-md">
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
                            <th>
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
    <div class="modal-dialog modal-md">
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
                    <table class="table table-hover">
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
                            <th>
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
                            <th>
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
                    assignmentTypeCode : null,
                    accountCode : null,
                    accountPolicyId : null,
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
                codeClaim:$("input[name=code]").val(),
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
                            sourceCode: "required"
                        },
                        messages: {
                            claimTypeCode: "Claim type is required",
                            lossDescCode: "Loss desc is required",
                            insurerCode:"Insurer code is required",
                            sourceCode:"Source code is required"
                        }
                    });
                    if($("form[id=form_claim]").valid())
                    {
                        for(var i = 0; i < Object.keys(claimView.claimViewObject).length;i++){
                            if($("#"+Object.keys(claimView.claimViewObject)[i])){
                                claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = $("#"+Object.keys(claimView.claimViewObject)[i]).val();
                            }
                            if($("#"+Object.keys(claimView.claimViewObject)[i]).val()===""){
                                claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = "";
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
                        console.log(claimView.claimViewObject);
                        $.post(url+'saveClaim/'+ claimView.claimViewObject.id,{_token:_token,claim : claimView.claimViewObject},function (data) {
                            console.log(data);
                            if(data["Action"]==="AddNew")
                            {
                                if(data["Result"]===1)
                                {
                                    $("div[id=modal-confirm]").find("div[class=modal-body]").find("h4").text("Add new Claim Success");
                                    $("div[id=modal-confirm]").modal("show");
                                    claimView.cancel();
                                    $("input[name=code]").val(parseInt(data["codeClaim"]) + 1);
                                }
                            }
                            else
                            {
                                if(data["Result"]===1)
                                {

                                    $("div[id=modal-confirm]").find($("div[class=modal-body]")).find("h4").text("Update Claim Success");
                                    $("div[id=modal-confirm]").modal("show");
                                    claimView.cancel();
                                    $("input[name=code]").val(parseInt(data["codeClaim"]) + 1);
                                }
                            }
                        });
                    }
                    else
                    {

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
                                var tr = "";
                                tr+="<tr>";
                                tr+= "<td style='display: none'>"+data["Data"]["id"]+"</td>";
                                tr+="<td>"+data["Data"]["code"]+"</td>";
                                tr+="<td>"+data["Data"]["name"]+"</td>";
                                tr+="<td><button class='btn btn-success' onclick='claimView.fillClaimTypeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editClaimType(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                                tr+="</tr>";
                                $("#modal-claim-type-table-body").append(tr);
                                $("#modal-claim-type-modify").modal("hide");
                                $("#modal-claim-type").modal("show");
                            }
                        }
                        else
                        {
                            if(data["Result"]===1)
                            {
                                var tr1 = $("#modal-claim-type-table-body").find("td:contains("+data["Data"]["id"]+")").parent();
                                tr1.find("td:eq(0)").empty().append(data["Data"]["id"]);
                                tr1.find("td:eq(1)").empty().append(data["Data"]["code"]);
                                tr1.find("td:eq(2)").empty().append(data["Data"]["name"]);
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
                                        var tr = "";
                                        tr+="<tr>";
                                        tr+= "<td style='display: none'>"+data["Data"]["id"]+"</td>";
                                        tr+="<td>"+data["Data"]["code"]+"</td>";
                                        tr+="<td>"+data["Data"]["name"]+"</td>";
                                        tr+="<td><button class='btn btn-success' onclick='claimView.fillLossDescFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editLossDesc(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                                        tr+="</tr>";
                                        $("#modal-loss-desc-table-body").append(tr);
                                        $("#modal-loss-desc-code-modify").modal("hide");
                                        $("#modal-loss-desc-code").modal("show");
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        var tr1 = $("#modal-loss-desc-table-body").find("td:contains("+data["Data"]["id"]+")").parent();
                                        console.log(tr1);
                                        tr1.find("td:eq(0)").empty().append(data["Data"]["id"]);
                                        tr1.find("td:eq(1)").empty().append(data["Data"]["code"]);
                                        tr1.find("td:eq(2)").empty().append(data["Data"]["name"]);
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
                                        var tr = "";
                                        tr+="<tr>";
                                        tr+= "<td style='display: none'>"+data["Data"]["id"]+"</td>";
                                        tr+="<td>"+data["Data"]["code"]+"</td>";
                                        tr+="<td>"+data["Data"]["name"]+"</td>";
                                        tr+="<td><button class='btn btn-success' onclick='claimView.fillSourceCustomerFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editSourceCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                                        tr+="</tr>";
                                        $("#modal-source-code-table-body").append(tr);
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
                                        var tr1 = $("#modal-source-code-table-body").find("td:contains("+data["Data"]["id"]+")").parent();
                                        console.log(tr1);
                                        tr1.find("td:eq(0)").empty().append(data["Data"]["id"]);
                                        tr1.find("td:eq(1)").empty().append(data["Data"]["code"]);
                                        tr1.find("td:eq(2)").empty().append(data["Data"]["name"]);
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
                                        var tr = "";
                                        tr+="<tr>";
                                        tr+= "<td style='display: none'>"+data["Data"]["id"]+"</td>";
                                        tr+="<td>"+data["Data"]["code"]+"</td>";
                                        tr+="<td>"+data["Data"]["name"]+"</td>";
                                        tr+="<td>"+data["Data"]["branchTypeCode"]+"</td>";
                                        tr+="<td><button class='btn btn-success' onclick='claimView.fillBranchFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editBranch(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                                        tr+="</tr>";
                                        $("#modal-branch-table-body").append(tr);
                                        $("#modal-branch-modify").modal("hide");
                                        $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
                                        $("#modal-branch").modal("show");
                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        var tr1 = $("#modal-branch-table-body").find("td:contains("+data["Data"]["id"]+")").parent();
                                        tr1.find("td:eq(0)").empty().append(data["Data"]["id"]);
                                        tr1.find("td:eq(1)").empty().append(data["Data"]["code"]);
                                        tr1.find("td:eq(2)").empty().append(data["Data"]["name"]);
                                        $("#modal-branch-modify").modal("hide");
                                        $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
                                        $("#modal-branch").modal("show");
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

                                        var tr = "";
                                        tr+="<tr>";
                                        tr+= "<td style='display: none'>"+data["Data"]["id"]+"</td>";
                                        tr+="<td>"+data["Data"]["code"]+"</td>";
                                        tr+="<td>"+data["Data"]["fullName"]+"</td>";
                                        tr+="<td>"+data["Data"]["sourceCustomerId"]+"</td>";
                                        tr+="<td style='display: none'>"+data["Data"]["address"]+"</td>";
                                        tr+="<td style='display:none '>"+data["Data"]["contactPersonFirstName"]+"</td>";
                                        tr+="<td><button class='btn btn-success' onclick='claimView.fillInsurerCodeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editInsurerCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                                        tr+="</tr>";
                                        $("tbody[id=modal-insurer-code-table-body]").append(tr);
                                        $("div[id=modal-insurer-modify]").modal("hide");
                                        $("div[id=modal-insurer-code]").modal("show");

                                    }
                                }
                                else
                                {
                                    if(data["Result"]===1)
                                    {
                                        var tr1 = $("#modal-insurer-code-table-body").find("td:contains("+data["Data"]["id"]+")").parent();
                                        tr1.find("td:eq(0)").empty().append(data["Data"]["id"]);
                                        tr1.find("td:eq(1)").empty().append(data["Data"]["code"]);
                                        tr1.find("td:eq(2)").empty().append(data["Data"]["fullName"]);
                                        tr1.find("td:eq(3)").empty().append(data["Data"]["sourceCustomerId"]);
                                        tr1.find("td:eq(4)").empty().append(data["Data"]["address"]);
                                        tr1.find("td:eq(5)").empty().append(data["Data"]["contactPersonFirstName"]);
                                        $("div[id=modal-insurer-modify]").modal("hide");
                                        $("div[id=modal-insurer-code]").modal("show");
                                    }
                                }
                            })
                },
                cancel : function () {
                    for(var i = 0; i < Object.keys(claimView.claimViewObject).length;i++){
                        claimView.claimViewObject[Object.keys(claimView.claimViewObject)[i]] = null;
                    }
                    $("table[id=table_claim]").find("input").val("");
                    $("textarea[name=insuredAddress]").val("");
                    $("input[name=sirBreached]").prop("checked",false);
                    $("input[name=claimAssignment]").prop("checked",false);
                    $("input[name=taxable]").prop("checked",false);
                    $("input[name=privileged]").prop("checked",false);
                },
                fillClaimToForm : function (claimId) {
                    $("table[id=table_claim]").find("label[class=error]").hide();
                    $.get(url+"getClaimByCode/"+claimId,function (data) {
                        console.log(data);
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
                            tr += "<td><button class='btn btn-xs btn-success' onclick='claimView.fillClaimToForm(\"" + listClaim[i]["code"] + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
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
                },
                fillSourceCustomerFromModalToInput: function(element){
                    $("input[name=sourceCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-source-code").modal("hide");
                },
                fillClaimTypeFromModalToInput : function(element){
                    $("input[name=claimTypeCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-claim-type").modal("hide");
                },
                fillLossDescFromModalToInput:function(element)
                {
                    $("input[name=lossDescCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-loss-desc-code").modal("hide");
                },
                fillAdjusterFromModalToInput:function(element)
                {
                    $("input[name=adjusterCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-adjuster").modal("hide");
                },
                fillBranchFromModalToInput:function(element)
                {
                    $("input[name=branchCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-branch").modal("hide");
                },
                fillInsurerCodeFromModalToInput:function(element)
                {
                    $("input[name=insurerCode]").val($(element).parent().parent().find("td").eq(1).html());
                    $("#modal-insurer-code").modal("hide");
                },
                editClaimType:function(element)
                {
                    $("input[name=claimType_code_modify_id]").val($(element).parent().parent().find("td").eq(0).html());
                    $("input[name=claimType_code_modify_code]").val($(element).parent().parent().find("td").eq(1).html());
                    $("input[name=claimType_code_modify_name]").val($(element).parent().parent().find("td").eq(2).html());
                    $("div[id=modal-claim-type]").modal("hide");
                    $("div[id=modal-claim-type-modify]").modal("show");
                },
                editLossDesc:function(element)
                {
                    $("input[name=lossDesc_code_modify_id]").val($(element).parent().parent().find("td").eq(0).html());
                    $("input[name=lossDesc_code_modify_code]").val($(element).parent().parent().find("td").eq(1).html());
                    $("input[name=lossDesc_code_modify_name]").val($(element).parent().parent().find("td").eq(2).html());
                    $("#modal-loss-desc-code").modal("hide");
                    $("#modal-loss-desc-code-modify").modal("show");
                },
                editSourceCode:function(element)
                {

                    $("input[name=source_code_modify_id]").val($(element).parent().parent().find("td").eq(0).html());
                    $("input[name=source_code_modify_code]").val($(element).parent().parent().find("td").eq(1).html());
                    $("input[name=source_code_modify_name]").val($(element).parent().parent().find("td").eq(2).html());
                    $("#modal-source-code").modal("hide");
                    $("#modal-source-code-modify").modal("show");
                },
                editBranch:function(element)
                {
                    $("input[name=branch_code_modify_id]").val($(element).parent().parent().find("td").eq(0).html());
                    $("input[name=branch_code_modify_code]").val($(element).parent().parent().find("td").eq(1).html());
                    $("input[name=branch_code_modify_name]").val($(element).parent().parent().find("td").eq(2).html());
                    $("select#branch_code_modify_branch_type").val($(element).parent().parent().find("td").eq(3).html()).prop("disabled",true);

                    $("#modal-branch").modal("hide");
                    $("#modal-branch-modify").modal("show");
                },
                editInsurerCode:function(element)
                {
                    $("input[name=insurer_code_modify_id]").val($(element).parent().parent().find("td").eq(0).html());
                    $("input[name=insurer_code_modify_code]").val($(element).parent().parent().find("td").eq(1).html());
                    $("input[name=insurer_code_modify_name]").val($(element).parent().parent().find("td").eq(2).html());
                    $("select#insurer_code_modify_sourceCustomerId").val($(element).parent().parent().find("td").eq(3).html()).prop("disabled",true);

                    $("textarea[name=insurer_code_modify_address]").val($(element).parent().parent().find("td").eq(4).html());
                    $("input[name=insurer_code_modify_contact_person]").val($(element).parent().parent().find("td").eq(5).html());


                    $("#modal-insurer-code").modal("hide");
                    $("#modal-insurer-modify").modal("show");
                }
            };
        }
        /* insured address */
        $("button#insured_address").click(function (e) {
            e.preventDefault();
            $("#modal-insured-address").modal("show");
        });
        /* source code */
        $("input#sourceCode").dblclick(function () {
            $("#modal-source-code").modal("show");
            $.get(url + 'getAllSourceCode',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].code+"</td>";
                    tr+="<td>"+data[i].name+"</td>";
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillSourceCustomerFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editSourceCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-source-code-table-body").empty().append(tr);
            });
        });
        $("#modal-source-code").find("button#addNewUpdate").click(function () {
            //Reset form
            $("#source_code_modify_id").val("0");
            $("#source_code_modify_code").val("");
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
            $.get(url + 'getAllInsurerCode',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].code+"</td>";
                    tr+="<td>"+data[i].fullName+"</td>";
                    tr+="<td style='text-align: center'>"+data[i].sourceCustomerId+"</td>";
                    tr+="<td style='display: none'>"+data[i].address+"</td>";
                    tr+="<td style='display: none'>"+data[i].contactPersonFirstName+"</td>";
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillInsurerCodeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editInsurerCode(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-insurer-code-table-body").empty().append(tr);
            });
        });
        $("div#modal-insurer-code").find("button#addNewUpdate").click(function () {
            //Reset form
            $("select#insurer_code_modify_sourceCustomerId").val($("select#insurer_code_modify_sourceCustomerId option:eq(0)").val()).prop("disabled",false);
            $("input[name=insurer_code_modify_id]").val("0");
            $("input[name=insurer_code_modify_code]").val("");
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
            $.get(url + 'getAllClaimType',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].code+"</td>";
                    tr+="<td>"+data[i].name+"</td>";
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillClaimTypeFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editClaimType(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-claim-type-table-body").empty().append(tr);
            });
        });
        $("#modal-claim-type").find("button#addNewUpdate").click(function () {
            //reset form
            $("#claimType_code_modify_id").val("0");
            $("#claimType_code_modify_code").val("");
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
            $.get(url + 'getAllLossDesc',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].code+"</td>";
                    tr+="<td>"+data[i].name+"</td>";
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillLossDescFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editLossDesc(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-loss-desc-table-body").empty().append(tr);
            });
        });
        $("div[id=modal-loss-desc-code]").find("button[id=addNewUpdate]").click(function(){
            //Reset form
            $("input[id=lossDesc_code_modify_id]").val("0");
            $("input[id=lossDesc_code_modify_code]").val("");
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
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillAdjusterFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-adjuster-table-body").empty().append(tr);
            });
        });

        /* Branch Code */
        $("input[name=branchCode]").dblclick(function(){
            $("div[id=modal-branch]").modal("show");
            $.get(url + 'getAllBranch',function (data) {
                var tr = "";
                for(var i = 0;i<data.length;i++){
                    tr+= "<tr>";
                    tr+= "<td style='display: none'>"+data[i].id+"</td>";
                    tr+="<td>"+data[i].code+"</td>";
                    tr+="<td>"+data[i].name+"</td>";
                    tr+="<td>"+data[i].branchTypeCode+"</td>";
                    tr+="<td><button class='btn btn-success' onclick='claimView.fillBranchFromModalToInput(this)'><span class='glyphicon glyphicon-check'></span></button>&nbsp;&nbsp;<button class='btn btn-info' onclick='claimView.editBranch(this)'><span class='glyphicon glyphicon-edit'></span></button></td>";
                    tr+="</tr>";
                }
                $("#modal-branch-table-body").empty().append(tr);
            });
        });
        $("div[id=modal-branch]").find("button[id=addNewUpdate]").click(function(){
            $("select#branch_code_modify_branch_type").prop("disabled",false).val($("select#branch_code_modify_branch_type option:eq(0)").val());
            $("input[id=branch_code_modify_id]").val("0");
            $("input[id=branch_code_modify_code]").val("");
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
