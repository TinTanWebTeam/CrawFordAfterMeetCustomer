{{--Model List Claim have invoice--}}
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

<form action="" class="form-invoice">
    <div class="row" style="background-color: white">
        <div class="col-sm-7">
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 style="text-align: right">Invoice #</h5>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="Invoice" id="Invoice" onkeypress="invoiceView.viewDetailInvoiceByInvoice(event)">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5 style="text-align: left">Invoice Date</h5>
                                </div>
                                <div class="col-sm-8">
                                    <input type="datetime" name="InvoiceDate" id="InvoiceDate" readonly style="background-color: #EAD8D8">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF;margin-top: 10px">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Bill To:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="BillTo" id="BillTo" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Billing Type:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="BillType" id="BillType" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row" style="margin-top: 3px">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF;margin-top: 10px">
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="text-align: right">Organization:</h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="Organization" id="Organization" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Claim #:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="Claim" id="Claim" onkeypress="invoiceView.getAllInvoiceByClaim(event)" ondblclick="invoiceView.searchClaimByDoubleClick()">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Loss Desc:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="LossDesc" id="LossDesc" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">AdjusterID:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="AdjusterID" id="AdjusterID" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">BranchID:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="BranchID" id="BranchID" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="text-align: right">Insured Name:</h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="InsuredName" id="InsuredName" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="text-align: right">Policy #:</h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="Policy" id="Policy" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="text-align: right">Co. Claim #:</h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="CoClaim" id="CoClaim" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <h5 style="text-align: right">Node:</h5>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" name="Note" id="Note" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
            </div>
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF;margin-top: 10px">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Master Billed:</h5>
                            </div>
                            <div class="col-sm-2">
                                <input type="checkbox" name="" readonly style="background-color: #EAD8D8">
                            </div>
                            <div class="col-sm-7">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Master Bill #:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Print Date:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Printed By:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">UserID:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">BatchID:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Invoice Credit Code:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">ID:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF;margin-left: 10px">
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Professional</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="Professional" id="Professional" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">General Exp</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="GeneralExp" id="GeneralExp" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Comm & Photo Exp</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="CommPhotoExp" id="CommPhotoExp" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Consult Fees & Exp</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ConsultFeesExp" id="ConsultFeesExp" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Travel Related Exp</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="TravelRelatedExp" id="TravelRelatedExp" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">GST-free Disb</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="GSTFreeDisb" id="GSTFreeDisb" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Disbursements</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="Disbursements" id="Disbursements" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Total Professional Fee</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="claimTotalTax" id="claimTotalTax" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Total Expense Fee</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="claimTotalFee" id="claimTotalFee" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Your Subtotal</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="yourSubtotal" id="yourSubtotal" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Total Professional Fee(After Discount)</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="totalProfessialFeeAfterDiscount" id="totalProfessialFeeAfterDiscount" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Your Subtotal After Discount</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="yourSubtotalAfterDiscount" id="yourSubtotalAfterDiscount" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Include VAT(10%)</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="vat" id="vat" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Discount percentage</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="percentage" id="percentage" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
            </div>
            <br>
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF;margin-left: 10px">
                <table class="table table-hover" id="table-invoice">
                	<thead>
                		<tr>
                			<th>MajorNo</th>
                            <th>TempNo</th>
                            <th>Invoice Date</th>
                            <th>Invoice Type</th>
                            <th>Claim Id</th>
                		</tr>
                	</thead>
                	<tbody id="table-invoice-body">

                	</tbody>
                </table>
            </div>

        </div>
    </div>
    <br>
    <br>
</form>

<div class="row">
    <div class="col-sm-2">
        <h5 style="padding-left: 70px">Bank name</h5>
    </div>
    <div class="col-sm-5">
        <input type="text" name="bankName" class="form-control" style="width: 40%" onchange="invoiceView.fillBankNameToReport(this)">
    </div>
</div>

<br>
<div class="row">
    <div class="col-sm-2">
        <h5 style="padding-left: 70px">Exchange rate</h5>
    </div>
    <div class="col-sm-5">
        <input type="text" name="exchangeRate" class="form-control" style="width: 40%" onchange="invoiceView.formatCurrencyExchangeRate()">
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-2">
        <h5 style="padding-left: 70px">Choose date</h5>
    </div>
    <div class="col-sm-5">
        <input type="date" name="dateExchange" class="form-control" style="width: 40%" onchange="invoiceView.fillDateToInvoice(this)">
    </div>
</div>
<br>
<div class="row" style="background-color: #fff">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                {{--<h5>Invoice Print Review</h5>--}}
            </div>
            <div class="col-sm-6">
                <button class="btn btn-sm btn-primary pull-right" style="margin-top: 10px" onclick="print_invoice_page()">Print Invoice</button>
                <button class="btn btn-sm btn-success pull-right" style="margin-top: 10px;margin-right: 30px" onclick="show_invoice_page()">Show/Hide Review</button>
            </div>
        </div>
        <br>
        <br>
    </div>
    <hr>
    <div class="col-sm-12">
        <div id="invoice_print_page">
            <div class="invoice-logo">
                <img src="{{ asset('img/logo.jpg') }}" alt="invoice logo" class="invoice-logo-img">
            </div>
            <div class="fee-statement">
                <h2>FEE STATEMENT</h2>
            </div>
            <div style="width: 1150px;display: block">
                <h4>No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display: inline-block;" id="NoFee"></div></h4>
                <h4 id="dateFee">15 August, 2016</h4>
            </div>
            <div style="width: 1150px;display: block;height: 84px">
                <div style="width: 50%;display: inline-block;box-sizing: border-box">
                    <h4 style="font-weight: 600" id=nameCustomer></h4>
                    <h4 id="addressCustomer"></h4>
                </div>
                <div style="width: 48%;display: inline-block;box-sizing: border-box">
                    <h4>Attention:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id=contactName></span></h4>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div style="width: 1150px;display: block">
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Insured:</h4>
                    <h4 style="margin-bottom: 0px">Loss Description:</h4>
                </div>
                <div style="display: inline-block;width: 73%;box-sizing: border-box">
                    <h4 id="insuredClaim"></h4>
                    <h4 id="lossDescClaim" style="margin-bottom: 0px"></h4>
                </div>
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Your Claim No:</h4>
                    <h4>Policy No:</h4>
                </div>
                <div style="display: inline-block;width: 34%;box-sizing: border-box">
                    <h4 style="margin-top: 0px" id="yourClaimNo">Not advised</h4>
                    <h4 id="policyClaim"></h4>
                </div>
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Loss date:</h4>
                    <h4 style="margin-top: 0px">VIA Ref:</h4>

                </div>
                <div style="display: inline-block;width: 25%;box-sizing: border-box">
                    <h4 id="lossDateClaim"></h4>
                    <h4 style="margin-top: 0px" id="viaRef"></h4>

                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div style="width: 1150px;display: block">
                <h4 class="text-center" style="font-weight: 600">Memorandum of Fees</h4>
                <br>
                <br>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: center">Amount</h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: center">Amount</h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: center">(USD)</h4>
                    </div>
                    <div style="width: 13%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: center">Equivalent to</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: center">(VND)</h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">Professional Fees</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="professionFeeUSD" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="professionFeeVND" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">Expenses</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="expenseUSD" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="expenseVND" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">TOTAL (Excluding VAT)</h4>
                    </div>
                    <div style="width: 12%;display: inline-block;border-top: 2px solid">
                        <h4 id="total_ExcludingVAT_USD" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>

                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block;border-top: 2px solid">
                        <h4 id="total_ExcludingVAT_VND" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">VAT@10%</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="total_Vat_USD" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="total_Vat_VND" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div style="width: 1150px;border: 2px solid black">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">&nbsp;&nbsp;&nbsp;TOTAL PAYABLE</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="totalUSD" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 id="totalVND" style="font-weight: 600;text-align: right;padding-right: 30px"></h4>
                    </div>
                </div>
                <br>
                <div style="width: 1150px;">
                    <h4>Exchange rate of <span id="bankName"></span>&nbsp;&nbsp;on
                        <div style="display: inline-block;" id="dateExchangeRate">15/8/2016</div> USD/VND: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="exchangeRateInvoice">22,260</span>
                    </h4>
                    <h4>Payment term: within 30 days</h4>
                </div>
                <div style="width: 1150px;border: 1px solid black;margin-top: 200px;padding: 0 10px">
                    <h5>Payment may be made by Direct Credit or Telegraphic Transfer to our account at Vietcombank <div style="display: inline-block;text-decoration: underline">within 30 days</div> as follows:</h5>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Direct Banking</h5>
                        </div>
                        <div style="width: 20%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Bank name</h5>
                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Vietcombank - Ben Thanh Branch</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Details:</h5>
                        </div>
                        <div style="width: 20%;display: inline-block">

                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">69 Bui Thi Xuan, Pham Ngu Lao Ward, District 1, Ho Chi Minh City</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">

                        </div>
                        <div style="width: 20%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">US$ Account No:</h5>
                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">0331.37046.0010</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">

                        </div>
                        <div style="width: 20%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">VND Account No:</h5>
                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">0331.00046.0007</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">

                        </div>
                        <div style="width: 20%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">In the Name of:</h5>
                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Vietnam International Adjuster Co., Ltd</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <div style="width: 15%;display: inline-block">

                        </div>
                        <div style="width: 20%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">SWIFT Code:</h5>
                        </div>
                        <div style="width: 60%;display: inline-block">
                            <h5 style="margin-top: 0px;margin-bottom: 0px">BFTV VNVX</h5>
                        </div>
                    </div>
                    <div style="width: 100%">
                        <h5 style="margin-top: 0px;margin-bottom: 0px">Please quote our invoice no. with your payment to ensure proper crediting to your account.</h5>
                        <h5 style="margin-top: 0px;margin-bottom: 0px">If paying by direct credit to our bank account, please forward payment confirmation by facsimile to +84 8 3930 2777</h5>
                        <h5 style="margin-top: 0px">Tax Invoice to be issued upon receiving payment</h5>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div style="width: 1150px;">
                    <h5 style="text-align: center;font-weight: 600">Vietnam International Adjuster Co., Ltd</h5>
                    <h5 style="text-align: center;font-weight: 600">5th floor Estar Building, 147-149 Vo Van Tan Street, Ward 6, District 3, Ho Chi Minh City, Vietnam</h5>
                    <h5 style="text-align: center;font-weight: 600">Telephone:&nbsp;&nbsp;&nbsp;(84)&nbsp;8&nbsp;3930&nbsp;3777&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax:&nbsp;&nbsp;&nbsp;(84)&nbsp;8&nbsp;3930&nbsp;2777</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>

<script>
    $(function () {
        if (typeof(invoiceView) === "undefined") {
            invoiceView = {
                invoiceObject: {

                },
                convertStringToDate: function (date) {
                    var currentDate = new Date(date);
                    var datetime = ("0" + currentDate.getDate()).slice(-2) + "-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-"
                            +currentDate.getFullYear() ;
                    return datetime;
                },
                submitServergetAllInvoiceByClaim:function(claim)
                {
                    $.get(url+"getAllInvoiceByClaimId/"+claim,{_token:_token},function(data){
                        if (data["data"].length > 0) {
                            //$("form[class=form-invoice]").find("input").val("");
                            $("input[name=Claim]").val(claim);
                            var row = "";
                            $("tbody#table-invoice-body").empty();
                            for (var i = 0; i < data["data"].length; i++) {
                                if(data["data"][i]["invoice_major"]!==null && data["data"][i]["invoice_temp"]===null)
                                {
                                    row += "<tr id= "+data["data"][i]["invoice_major"]+" onclick='invoiceView.viewDetailInvoice(this)' style='cursor: pointer'>";
                                    row += "<td>" + data["data"][i]["invoice_major"] + "</td>";
                                    row += "<td></td>";
                                }
                                if(data["data"][i]["invoice_temp"]!==null && data["data"][i]["invoice_major"]===null)
                                {
                                    row += "<tr id= "+data["data"][i]["invoice_temp"]+" onclick='invoiceView.viewDetailInvoice(this)' style='cursor: pointer'>";
                                    row += "<td></td>";
                                    row += "<td>" + data["data"][i]["invoice_temp"] + "</td>";
                                }
                                if(data["data"][i]["invoice_major"]!==null && data["data"][i]["invoice_temp"]!==null)
                                {
                                    row += "<tr id= "+data["data"][i]["invoice_major"]+" onclick='invoiceView.viewDetailInvoice(this)' style='cursor: pointer'>";
                                    row += "<td>" + data["data"][i]["invoice_major"] + "</td>";
                                    row += "<td>" + data["data"][i]["invoice_temp"] + "</td>";
                                }



                                if (data["data"][i]["invoice_date"]) {
                                    var receiveDate = new Date(data["data"][i]["invoice_date"].substring(0, 10));
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

                                row += "<td>" + data["data"][i]["invoiceType"] + "</td>";

                                row += "<td>" + data["data"][i]["claim_id"] + "</td>";
                                row += "</tr>";
                            }

                            $("tbody#table-invoice-body").append(row);

                        }
                    });
                },
                getAllInvoiceByClaim:function(e)
                {
                    if(e.keyCode===13)
                    {
                        var code = $("input[name=Claim]").val();
                        $("form[class=form-invoice]").find("input").val("");
                        $("tbody#table-invoice-body").empty();
                        $("input[name=Claim]").val(code);
                        invoiceView.submitServergetAllInvoiceByClaim(code);
                    }

                },
                viewDetailInvoice: function (element) {
                    $.post(url+"loadInvoiceByEventEnterKey",{_token:_token,key:$(element).attr("id")},function(data){
                        //Informationn of claim
                        $("input[name=Invoice]").val($(element).attr("id"));
                        $("input[name=InvoiceDate]").val($(element).find("td:eq(2)").text());
                        $("input[name=BillTo]").val(data[0][0]["billTo"]);
                        $("input[name=BillType]").val(data[0][0]["typeInvoice"]);
                        $("input[name=Organization]").val(data[0][0]["organization"]);
                        $("input[name=LossDesc]").val(data[0][0]["lossDesc"]);
                        $("input[name=AdjusterID]").val(data[0][0]["adjusterId"]);
                        $("input[name=BranchID]").val(data[0][0]["branchId"]);
                        $("input[name=InsuredName]").val(data[0][0]["insuredLastName"]);
                        $("input[name=Policy]").val(data[0][0]["policy"]);
                        //$("input[name=discount]").val(data[0][0]["total"]).formatCurrency({roundToDecimalPlace:0});
                        $("input[name=percentage]").val(data[0][0]["percentage"]);
                        if(data[0][0]["insuredClaim"]!==null)
                        {
                            $("h4[id=yourClaimNo]").text(data[0][0]["insuredClaim"]);
                        }
                        //load information bank and exchangeRate
                        $("input[name=bankName]").val(data[0][0]["nameBank"]);
                        $("input[name=exchangeRate]").val(data[0][0]["exchangeRate"]).formatCurrency({roundToDecimalPlace:0});
                        if(data[0][0]["dateExchangeRate"]!==null)
                        {
                            var dateRate = data[0][0]["dateExchangeRate"].split(" ");
                            $("input[name=dateExchange]").val(dateRate[0]);
                        }
                        else
                        {
                            $("input[name=dateExchange]").val("");
                        }
                        //Information of bill
                        var ClaimTotalFee = parseFloat(data[2][0]["generalExp"]) + parseFloat(data[3][0]["commPhotoExp"]) + parseFloat(data[4][0]["consultFeesExp"]) + parseFloat(data[5][0]["travelRelatedExp"]) + parseFloat(data[6][0]["gstFreeDisb"]) + parseFloat(data[7][0]["disbursement"]);
                        $("input[name=Professional]").val(data[1][0]["professionalServices"]);
                        $("input[name=GeneralExp]").val(data[2][0]["generalExp"]);
                        $("input[name=CommPhotoExp]").val(data[3][0]["commPhotoExp"]);
                        $("input[name=ConsultFeesExp]").val(data[4][0]["consultFeesExp"]);
                        $("input[name=TravelRelatedExp]").val(data[5][0]["travelRelatedExp"]);
                        $("input[name=GSTFreeDisb]").val(data[6][0]["gstFreeDisb"]);
                        $("input[name=Disbursements]").val(data[7][0]["disbursement"]);

                        $("input[name=claimTotalFee]").val(ClaimTotalFee);
                        $("input[name=yourSubtotal]").val(parseFloat(data[1][0]["professionalServices"]) + ClaimTotalFee);
                        //$("h4[id=total_Vat_VND]").text(Math.round(Number($("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")).formatCurrency({roundToDecimalPlace:0});
                        $("input[name=totalProfessialFeeAfterDiscount]").val(data[0][0]["professionalServicesDiscount"]);
                        $("input[name=claimTotalTax]").val($("input[name=Professional]").val());
                        $("input[name=yourSubtotalAfterDiscount]").val(parseFloat(data[0][0]["professionalServicesDiscount"]) + ClaimTotalFee);
                        $("input[name=vat]").val(Math.round(Number($("input[name=yourSubtotalAfterDiscount]").val().replace(/,/g,"")) * 1.1)).formatCurrency({roundToDecimalPlace:0});

                        invoiceView.formatCurrencyInput();

                        //load information of report
                        $("h4[id=viaRef]").text($("input[id=Claim]").val());
                        $("span[id=contactName]").text(data[0][0]["contactName"]);
                        $("div[id=NoFee]").text($("input[name=Invoice]").val());
                        $("h4[id=dateFee]").text($(element).find("td:eq(2)").text());
                        $("h4[id=insuredClaim]").text(data[0][0]["insuredFirstName"] +" "+ data[0][0]["insuredLastName"]);
                        $("h4[id=lossDescClaim]").text(data[0][0]["descriptionLossDesc"]);
                        $("h4[id=policyClaim]").text(data[0][0]["policy"]);
                        $("h4[id=lossDateClaim]").text(invoiceView.convertStringToDate((data[0][0]["lossDate"].split(" "))[0]));
                        $("h4[id=addressCustomer]").text(data[0][0]["addressCustomer"]);
                        $("h4[id=nameCustomer]").text(data[0][0]["nameCustomer"]);
                        //load report invoice
                        $("h4[id=professionFeeVND]").text($("input[name=totalProfessialFeeAfterDiscount]").val());
                        $("h4[id=expenseVND]").text((Number($("input[name=GeneralExp]").val().replace(/,/g,""))) + (Number($("input[name=CommPhotoExp]").val().replace(/,/g,""))) + (Number($("input[name=ConsultFeesExp]").val().replace(/,/g,""))) + (Number($("input[name=TravelRelatedExp]").val().replace(/,/g,""))) + (Number($("input[name=GSTFreeDisb]").val().replace(/,/g,""))) + (Number($("input[name=Disbursements]").val().replace(/,/g,"")))).formatCurrency({roundToDecimalPlace:0});
                        //load total excludingVAT VND
                        //$("h4[id=total_ExcludingVAT_VND]").text(Number($("h4[id=professionFeeVND]").text().replace(/,/g,"")) + Number($("h4[id=expenseVND]").text().replace(/,/g,""))).formatCurrency({roundToDecimalPlace:0});
                        $("h4[id=total_ExcludingVAT_VND]").text($("input[name=yourSubtotalAfterDiscount]").val()).formatCurrency({roundToDecimalPlace:0});
                        //load total VAT VND
                        $("h4[id=total_Vat_VND]").text(Math.round(Number($("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")).formatCurrency({roundToDecimalPlace:0});

                        //USD when in report
                        $("span[id=bankName]").text("");
                        $("div[id=dateExchangeRate]").text("");
                        $("span[id=exchangeRateInvoice]").text("");
                        $("h4[id=professionFeeUSD]").text("");
                        $("h4[id=expenseUSD]").text("");
                        $("h4[id=total_ExcludingVAT_USD]").text("");
                        $("h4[id=total_Vat_USD]").text("");
                        $("h4[id=totalUSD]").text("");

                        if($("input[name=bankName]").val()!=="")
                        {
                            $("span[id=bankName]").text($("input[name=bankName]").val());
                        }
                        if($("input[name=exchangeRate]").val()!=="")
                        {
                            $("span[id=exchangeRateInvoice]").text($("input[name=exchangeRate]").val());
                            $("h4[id=professionFeeUSD]").text(invoiceView.round((($("input[name=Professional]").val().replace(/,/g,""))/($("input[name=exchangeRate]").val().replace(/,/g,""))),2)).formatCurrency();
                            $("h4[id=expenseUSD]").text(invoiceView.round((Number($("h4[id=expenseVND]").text().replace(/,/g,""))/($("input[name=exchangeRate]").val().replace(/,/g,""))),2)).formatCurrency();

                            $("h4[id=total_ExcludingVAT_USD]").text(invoiceView.round((Number($("h4[id=professionFeeUSD]").text().replace(/,/g,"")) + Number($("h4[id=expenseUSD]").text().replace(/,/g,""))),2)).formatCurrency();
                            $("h4[id=total_Vat_USD]").text(invoiceView.round(((Number($("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")),2)).formatCurrency();

                            $("h4[id=totalUSD]").text(invoiceView.round(((Number($("h4[id=professionFeeUSD]").text().replace(/,/g,"")) + Number($("h4[id=expenseUSD]").text().replace(/,/g,"")))*1.1),2)).formatCurrency();
                            $("h4[id=totalVND]").text(parseInt((Number($("h4[id=professionFeeVND]").text().replace(/,/g,"")) + Number($("h4[id=expenseVND]").text().replace(/,/g,"")))*1.1)).formatCurrency({roundToDecimalPlace:0});


                            //format USD $
                            $("h4[id=professionFeeUSD]").text("$"+$("h4[id=professionFeeUSD]").text());
                            $("h4[id=expenseUSD]").text("$"+$("h4[id=expenseUSD]").text());
                            $("h4[id=total_ExcludingVAT_USD]").text("$"+$("h4[id=total_ExcludingVAT_USD]").text());
                            $("h4[id=total_Vat_USD]").text("$"+$("h4[id=total_Vat_USD]").text());
                            $("h4[id=totalUSD]").text("$"+$("h4[id=totalUSD]").text());
                        }
                        if($("input[name=dateExchange]").val()!=="")
                        {
                            $("div[id=dateExchangeRate]").text(invoiceView.convertStringToDate($("input[name=dateExchange]").val()));
                        }

                    });
                },
                viewDetailInvoiceByInvoice: function(e) {
                    if(e.keyCode===13)
                    {
                        var invoice = $("input[name=Invoice]").val();
                        $.post(url+"viewDetailInvoiceByInvoice",{_token:_token,key:invoice},function(data){
                            //Informationn of claim
                            $("input[name=Claim]").val(data[0][0]["claimCode"]);
                            invoiceView.submitServergetAllInvoiceByClaim($("input[name=Claim]").val());

                            $("input[name=Invoice]").val(invoice);

                            var receiveDate = new Date(data[0][0]["invoiceDay"].substring(0, 10));
                            var dd = receiveDate.getDate();
                            var mm = receiveDate.getMonth() + 1; //January is 0!

                            var yyyy = receiveDate.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }
                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            $("input[name=InvoiceDate]").val(dd + '-' + mm + '-' + yyyy);


                            $("input[name=BillTo]").val(data[0][0]["billTo"]);
                            $("input[name=BillType]").val(data[0][0]["typeInvoice"]);
                            $("input[name=Organization]").val(data[0][0]["organization"]);
                            $("input[name=LossDesc]").val(data[0][0]["lossDesc"]);
                            $("input[name=AdjusterID]").val(data[0][0]["adjusterId"]);
                            $("input[name=BranchID]").val(data[0][0]["branchId"]);
                            $("input[name=InsuredName]").val(data[0][0]["insuredLastName"]);
                            $("input[name=Policy]").val(data[0][0]["policy"]);
                            $("input[name=CoClaim]").val();
                            //load information bank and exchangeRate
                            $("input[name=bankName]").val(data[0][0]["nameBank"]);
                            $("input[name=exchangeRate]").val(data[0][0]["exchangeRate"]).formatCurrency({roundToDecimalPlace:0});
                            if(data[0][0]["dateExchangeRate"]!==null)
                            {
                                var dateRate = data[0][0]["dateExchangeRate"].split(" ");
                                $("input[name=dateExchange]").val(dateRate[0]);
                            }
                            else
                            {
                                $("input[name=dateExchange]").val("");
                            }
                            //Information of bill
                            var ClaimTotalFee = parseFloat(data[2][0]["generalExp"]) + parseFloat(data[3][0]["commPhotoExp"]) + parseFloat(data[4][0]["consultFeesExp"]) + parseFloat(data[5][0]["travelRelatedExp"]) + parseFloat(data[6][0]["gstFreeDisb"]) + parseFloat(data[7][0]["disbursement"]);
                            $("input[name=Professional]").val(data[1][0]["professionalServices"]);
                            $("input[name=GeneralExp]").val(data[2][0]["generalExp"]);
                            $("input[name=CommPhotoExp]").val(data[3][0]["commPhotoExp"]);
                            $("input[name=ConsultFeesExp]").val(data[4][0]["consultFeesExp"]);
                            $("input[name=TravelRelatedExp]").val(data[5][0]["travelRelatedExp"]);
                            $("input[name=GSTFreeDisb]").val(data[6][0]["gstFreeDisb"]);
                            $("input[name=Disbursements]").val(data[7][0]["disbursement"]);
                            $("input[name=percentage]").val(data[0][0]["percentage"]);

                            $("input[name=claimTotalFee]").val(ClaimTotalFee);
                            $("input[name=yourSubtotal]").val(parseFloat(data[1][0]["professionalServices"]) + ClaimTotalFee);
                            //$("h4[id=total_Vat_VND]").text(Math.round(Number($("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")).formatCurrency({roundToDecimalPlace:0});
                            $("input[name=totalProfessialFeeAfterDiscount]").val(data[0][0]["professionalServicesDiscount"]);
                            $("input[name=claimTotalTax]").val($("input[name=Professional]").val());
                            $("input[name=yourSubtotalAfterDiscount]").val(parseFloat(data[0][0]["professionalServicesDiscount"]) + ClaimTotalFee);
                            $("input[name=vat]").val(Math.round(Number($("input[name=yourSubtotalAfterDiscount]").val().replace(/,/g,"")) * 1.1)).formatCurrency({roundToDecimalPlace:0});

                            invoiceView.formatCurrencyInput();



                            //load information of report
                            $("h4[id=viaRef]").text($("input[id=Claim]").val());
                            $("span[id=contactName]").text(data[0][0]["contactName"]);
                            $("div[id=NoFee]").text($("input[name=Invoice]").val());

                            var receiveDate = new Date(data[0][0]["invoiceDay"].substring(0, 10));
                            var dd = receiveDate.getDate();
                            var mm = receiveDate.getMonth() + 1; //January is 0!

                            var yyyy = receiveDate.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }
                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            $("h4[id=dateFee]").text(dd + '-' + mm + '-' + yyyy);


                            $("h4[id=insuredClaim]").text(data[0][0]["insuredFirstName"] +" "+ data[0][0]["insuredLastName"]);
                            $("h4[id=lossDescClaim]").text(data[0][0]["descriptionLossDesc"]);
                            $("h4[id=policyClaim]").text(data[0][0]["policy"]);
                            $("h4[id=lossDateClaim]").text(invoiceView.convertStringToDate((data[0][0]["lossDate"].split(" "))[0]));
                            $("h4[id=addressCustomer]").text(data[0][0]["addressCustomer"]);
                            $("h4[id=nameCustomer]").text(data[0][0]["nameCustomer"]);
                            //load report invoice
                            $("h4[id=professionFeeVND]").text($("input[name=totalProfessialFeeAfterDiscount]").val());
                            $("h4[id=expenseVND]").text((Number($("input[name=GeneralExp]").val().replace(/,/g,""))) + (Number($("input[name=CommPhotoExp]").val().replace(/,/g,""))) + (Number($("input[name=ConsultFeesExp]").val().replace(/,/g,""))) + (Number($("input[name=TravelRelatedExp]").val().replace(/,/g,""))) + (Number($("input[name=GSTFreeDisb]").val().replace(/,/g,""))) + (Number($("input[name=Disbursements]").val().replace(/,/g,"")))).formatCurrency({roundToDecimalPlace:0});
                            //load total excludingVAT VND
                            $("h4[id=total_ExcludingVAT_VND]").text(Number($("h4[id=professionFeeVND]").text().replace(/,/g,"")) + Number($("h4[id=expenseVND]").text().replace(/,/g,""))).formatCurrency({roundToDecimalPlace:0});
                            //load total VAT VND
                            $("h4[id=total_Vat_VND]").text(Math.round(Number($("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_VND]").text().replace(/,/g,"")).formatCurrency({roundToDecimalPlace:0});

                            //USD when in report
                            $("span[id=bankName]").text("");
                            $("div[id=dateExchangeRate]").text("");
                            $("span[id=exchangeRateInvoice]").text("");
                            $("h4[id=professionFeeUSD]").text("");
                            $("h4[id=expenseUSD]").text("");
                            $("h4[id=total_ExcludingVAT_USD]").text("");
                            $("h4[id=total_Vat_USD]").text("");
                            $("h4[id=totalUSD]").text("");

                            if($("input[name=bankName]").val()!=="")
                            {
                                $("span[id=bankName]").text($("input[name=bankName]").val());
                            }
                            if($("input[name=exchangeRate]").val()!=="")
                            {
                                $("span[id=exchangeRateInvoice]").text($("input[name=exchangeRate]").val());
                                $("h4[id=professionFeeUSD]").text(invoiceView.round((($("input[name=Professional]").val().replace(/,/g,""))/($("input[name=exchangeRate]").val().replace(/,/g,""))),2)).formatCurrency();
                                $("h4[id=expenseUSD]").text(invoiceView.round((Number($("h4[id=expenseVND]").text().replace(/,/g,""))/($("input[name=exchangeRate]").val().replace(/,/g,""))),2)).formatCurrency();

                                $("h4[id=total_ExcludingVAT_USD]").text(invoiceView.round((Number($("h4[id=professionFeeUSD]").text().replace(/,/g,"")) + Number($("h4[id=expenseUSD]").text().replace(/,/g,""))),2)).formatCurrency();
                                $("h4[id=total_Vat_USD]").text(invoiceView.round(((Number($("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")) * 1.1) - $("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")),2)).formatCurrency();

                                $("h4[id=totalUSD]").text(invoiceView.round(((Number($("h4[id=professionFeeUSD]").text().replace(/,/g,"")) + Number($("h4[id=expenseUSD]").text().replace(/,/g,"")))*1.1),2)).formatCurrency();
                                $("h4[id=totalVND]").text(parseInt((Number($("h4[id=professionFeeVND]").text().replace(/,/g,"")) + Number($("h4[id=expenseVND]").text().replace(/,/g,"")))*1.1)).formatCurrency({roundToDecimalPlace:0});


                                //format USD $
                                $("h4[id=professionFeeUSD]").text("$"+$("h4[id=professionFeeUSD]").text());
                                $("h4[id=expenseUSD]").text("$"+$("h4[id=expenseUSD]").text());
                                $("h4[id=total_ExcludingVAT_USD]").text("$"+$("h4[id=total_ExcludingVAT_USD]").text());
                                $("h4[id=total_Vat_USD]").text("$"+$("h4[id=total_Vat_USD]").text());
                                $("h4[id=totalUSD]").text("$"+$("h4[id=totalUSD]").text());
                            }
                            if($("input[name=dateExchange]").val()!=="")
                            {
                                $("div[id=dateExchangeRate]").text(invoiceView.convertStringToDate($("input[name=dateExchange]").val()));
                            }
                        });
                    }
                },
                formatCurrencyInput:function()
                {
                    $("input[name=Professional]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=GeneralExp]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=CommPhotoExp]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=ConsultFeesExp]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=TravelRelatedExp]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=GSTFreeDisb]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=Disbursements]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=claimTotalFee]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=yourSubtotal]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=claimTotalTax]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=totalProfessialFeeAfterDiscount]").formatCurrency({roundToDecimalPlace:0});
                    $("input[name=yourSubtotalAfterDiscount]").formatCurrency({roundToDecimalPlace:0});
                },
                round:function(value,decimals)
                {
                    return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
                },
                formatCurrencyExchangeRate:function()
                {
                    if(parseFloat($("input[name=exchangeRate]").val())<0)
                    {
                        $("input[name=exchangeRate]").val("");
                    }
                    else
                    {
                        var expense = ((Number($("input[name=GeneralExp]").val().replace(/,/g,""))) + (Number($("input[name=CommPhotoExp]").val().replace(/,/g,""))) + (Number($("input[name=ConsultFeesExp]").val().replace(/,/g,""))) + (Number($("input[name=TravelRelatedExp]").val().replace(/,/g,""))) + (Number($("input[name=GSTFreeDisb]").val().replace(/,/g,""))) + (Number($("input[name=Disbursements]").val().replace(/,/g,""))));
                        $("input[name=exchangeRate]").formatCurrency({roundToDecimalPlace:0});
                        $("span[id=exchangeRateInvoice]").text($("input[name=exchangeRate]").val());
                        //change VND->USD
                        $("h4[id=professionFeeUSD]").text(invoiceView.round(parseFloat(($("input[name=Professional]").val().replace(/,/g,""))/($("input[name=exchangeRate]").val().replace(/,/g,""))),2)).formatCurrency();
                        $("h4[id=expenseUSD]").text(invoiceView.round(parseFloat(String(expense))/($("input[name=exchangeRate]").val().replace(/,/g,"")),2)).formatCurrency();

                        //load total excluding VAT
                        $("h4[id=total_ExcludingVAT_USD]").text(invoiceView.round(Number($("h4[id=professionFeeUSD]").text().replace(/,/g,"")) + Number($("h4[id=expenseUSD]").text().replace(/,/g,"")),2)).formatCurrency();
                        //load total VAT
                        $("h4[id=total_Vat_USD]").text(invoiceView.round(((Number($("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")) * 1.1) - Number($("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,""))),2)).formatCurrency();


                        //total Payable
                        $("h4[id=totalUSD]").text((Number($("h4[id=total_ExcludingVAT_USD]").text().replace(/,/g,"")) + Number($("h4[id=total_Vat_USD]").text().replace(/,/g,"")))).formatCurrency();
                        $("h4[id=totalVND]").text(parseInt((Number($("h4[id=professionFeeVND]").text().replace(/,/g,"")) + Number($("h4[id=expenseVND]").text().replace(/,/g,"")))*1.1)).formatCurrency({roundToDecimalPlace:0});

                        //$("h4[id=professionFeeUSD]").text(Number($("h4[id=professionFeeUSD]").text()).toLocaleString());
                        //$("h4[id=expenseUSD]").text(Number($("h4[id=expenseUSD]").text()).toLocaleString());
                        //$("h4[id=total_ExcludingVAT_USD]").text(Number($("h4[id=total_ExcludingVAT_USD]").text()).toLocaleString());
                        //$("h4[id=total_Vat_USD]").text(Number($("h4[id=total_Vat_USD]").text()).toLocaleString());
                        //$("h4[id=totalUSD]").text(Number($("h4[id=totalUSD]").text()).toLocaleString());
                        //format USD $
                        $("h4[id=professionFeeUSD]").text("$"+$("h4[id=professionFeeUSD]").text());
                        $("h4[id=expenseUSD]").text("$"+$("h4[id=expenseUSD]").text());
                        $("h4[id=total_ExcludingVAT_USD]").text("$"+$("h4[id=total_ExcludingVAT_USD]").text());
                        $("h4[id=total_Vat_USD]").text("$"+$("h4[id=total_Vat_USD]").text());
                        $("h4[id=totalUSD]").text("$"+$("h4[id=totalUSD]").text());
                    }

                },
                fillDateToInvoice:function(element)
                {

                    $("div[id=dateExchangeRate]").text(invoiceView.convertStringToDate($(element).val()));
                },
                fillBankNameToReport:function(element)
                {
                    $("span[id=bankName]").text($(element).val());
                    $("h5[id=bankName]").text($(element).val());
                },
                searchClaimByDoubleClick : function () {
                    $.post(url + 'getClaimHaveInvoiceOfTabInvoice',{_token:_token},function (listClaim) {
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
                            tr += "<td class='text-center'><button class='btn btn-xs btn-success' onclick='invoiceView.fillClaimToForm(this)'><span class='glyphicon glyphicon-ok'></span></button></td>";
                            tr += "</tr>";
                            row += tr;
                        }
                        $("#claim-talbe-body").empty().append(row);
                        $("#claim-table").DataTable();
                    });
                    $("#modal-claim").modal("show");
                },
                fillClaimToForm:function(element){
                    $("form[class=form-invoice]").find("input").val("");
                    invoiceView.submitServergetAllInvoiceByClaim($(element).parent().parent().find("td:eq(0)").text());
                    $("input[name=Claim]").val($(element).parent().parent().find("td:eq(0)").text());
                    $("#modal-claim").modal("hide");
                }


            };
        }
        else {

        }
    })
    function print_invoice_page() {
            //Save to serve information
            $.post(url+"saveInformationOfInvoiceAfterInReport",{_token:_token,bankName:$("input[name=bankName]").val(),exchangeRate:$("input[name=exchangeRate]").val().replace(/,/g,""),date:$("input[name=dateExchange]").val(),invoice:$("input[name=Invoice]").val()},function(data){
            });
            $("#invoice_print_page").show();
            $("#invoice_print_page").printThis({
                debug: false,
                importCSS: true,
                importStyle: false,
                loadCSS: "admin/css/style.css",
                removeInline: false,
                printDelay: 2000,
                header: null,
                formValues: true
            });

    }
    function show_invoice_page(){
        $("#invoice_print_page").toggle();
    }
</script>