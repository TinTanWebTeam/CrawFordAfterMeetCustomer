{{--Model List Invoice--}}
{{--demo--}}
<div class="modal fade" id="modalListInvoice" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="modalContent" style="text-align: center">List Invoice</div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Invoice</th>
                        <th>Invoice Date</th>
                        <th>BillTo</th>
                        <th>Total</th>
                        <th>claimCode</th>
                    </tr>
                    </thead>
                    <tbody id="tbodyTableInvoice">
                        @if($query!=null)
                            @foreach($query as $item)
                                <tr id="{{$item->invoice}}" onclick="invoiceView.viewDetailInvoice(this)" style="cursor: pointer">
                                    <td>{{$item->invoice}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->invoiceDay)->format('d-m-Y')}}</td>
                                    <td>{{$item->billTo}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->claimCode}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--Model List Invoice--}}

<form action="" class="form-invoice">
    <div class="row" style="background-color: white">
        <div class="col-sm-7">
            <div class="row" style="padding: 10px;border: 1px solid #AFAFAF">
                <fieldset>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h5 style="text-align: right">Invoice #</h5>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" name="Invoice" id="Invoice" onkeypress="invoiceView.loadInvoiceByEventEnterKey(event)" ondblclick="invoiceView.loadListInvoice()">
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
                                <input type="text" name="Claim" id="Claim" readonly style="background-color: #EAD8D8">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <h5 style="text-align: right">Loss Desc:</h5>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="LossDate" id="LossDate" readonly style="background-color: #EAD8D8">
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
                        <h5 style="text-align: right">Claim Total Tax</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="Claim Total Tax" id="Claim Total Tax" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Claim Total Fee</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ClaimTotalFee" id="ClaimTotalFee" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Your Subtotal</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="YourSubtotal" id="YourSubtotal" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Your Taxes</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="YourTaxes" id="YourTaxes" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <h5 style="text-align: right">Your Position</h5>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="YourPosition" id="YourPosition" readonly style="background-color: #EAD8D8">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <br>
</form>

<div class="row" style="background-color: #fff">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                <h5>Invoice Print Review</h5>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-sm btn-primary pull-right" style="margin-top: 10px">Print Invoice</button>
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
                <h3>FEE STATEMENT</h3>
            </div>
            <div style="width: 1150px;display: block">
                <h4>No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="display: inline-block;">7016</div></h4>
                <h4>15 August, 2016</h4>
            </div>
            <div style="width: 1150px;display: block;height: 84px">
                <div style="width: 50%;display: inline-block;box-sizing: border-box">
                    <h4 style="font-weight: 600">GROUPAMA VIETNAM GENERAL INSURANCE</h4>
                    <h4>Petronas Tower, 6th Floor, 235 Nguyen Van Cu,<br>Nguyen Cu Trinh Ward, District 1, Ho Chi Minh City</h4>
                </div>
                <div style="width: 48%;display: inline-block;box-sizing: border-box">
                    <h4>Attention:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mr. Nguyen Xuan Phuong</h4>
                </div>
            </div>
            <br>
            <br>
            <div style="width: 1150px;display: block">
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Insured:</h4>
                    <h4>Loss Description:</h4>
                </div>
                <div style="display: inline-block;width: 73%;box-sizing: border-box">
                    <h4>An Phat Computing Trading and Service Co., Ltd</h4>
                    <h4>Water damage to electric machinery/equipment</h4>
                </div>
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Your Claim No:</h4>
                    <h4>Policy No:</h4>
                </div>
                <div style="display: inline-block;width: 34%;box-sizing: border-box">
                    <h4>Not advised</h4>
                    <h4>PDAR1500085</h4>
                </div>
                <div style="display: inline-block;width: 15%;box-sizing: border-box">
                    <h4>Crawford Ref:</h4>
                    <h4>Loss date:</h4>
                </div>
                <div style="display: inline-block;width: 25%;box-sizing: border-box">
                    <h4>1001685</h4>
                    <h4>22 September, 2015</h4>
                </div>
            </div>
            <div style="width: 1150px;display: block">
                <h4 class="text-center" style="font-weight: 600">Memoradum of Fees</h4>
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
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">Expenses</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">TOTAL (Excluding VAT)</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">

                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">

                    </div>
                </div>
                <div style="width: 1150px;">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">VAT@10%</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">

                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">

                    </div>
                </div>
                <br>
                <br>
                <div style="width: 1150px;border: 2px solid black">
                    <div style="width: 60%;display: inline-block">
                        <h4 style="font-weight: 600">&nbsp;&nbsp;&nbsp;TOTAL PAYABLE</h4>
                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                    <div style="width: 13%;display: inline-block">

                    </div>
                    <div style="width: 12%;display: inline-block">
                        <h4 style="font-weight: 600;text-align: right;padding-right: 30px">$5,992.00</h4>
                    </div>
                </div>
                <br>
                <div style="width: 1150px;">
                    <h4>Exchange rate of Vietcombank on <div style="display: inline-block;">15/8/2016</div> USD/VND: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22,260</h4>
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
                            <h5 style="margin-top: 0px;margin-bottom: 0px">Vietnam International Adhuster Co., Ltd</h5>
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
                <div style="width: 1150px;">
                    <h5 style="text-align: center;font-weight: 600">Vietnam International Adjuster Co., Ltd</h5>
                    <h5 style="text-align: center;font-weight: 600">5th floor Estar Building, 147-149 Vo Van Tan Street, Ward 6, District 3, Ho Chi Minh City, Vietnam</h5>
                    <h5 style="text-align: center;font-weight: 600">Telephone:&nbsp;&nbsp;&nbsp;(84)&nbsp;8&nbsp;3930&nbsp;3777&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fax:&nbsp;&nbsp;&nbsp;(84)&nbsp;8&nbsp;3930&nbsp;3777</h5>
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
                    var datetime = currentDate.getFullYear() + "-"
                            + ("0" + (currentDate.getMonth() + 1)).slice(-2) + "-"
                            + ("0" + currentDate.getDate()).slice(-2);
                    return datetime;
                },
                getData:function(key)
                {
                    $.post(url+"loadInvoiceByEventEnterKey",{_token:_token,key:key},function(data){
                        console.log(data);
                        $("input[name=InvoiceDate]").val(invoiceView.convertStringToDate(data[0][0]["invoiceDay"]));
                        $("input[name=BillTo]").val(data[0][0]["billTo"]);
                        $("input[name=BillType]").val(data[0][0]["typeInvoice"]);
                        $("input[name=Organization]").val(data[0][0]["organization"]);
                        $("input[name=Claim]").val(data[0][0]["Claim"]);
                        $("input[name=AdjusterID]").val(data[0][0]["adjusterId"]);
                        $("input[name=LossDate]").val(invoiceView.convertStringToDate(data[0][0]["lossDate"]));
                        $("input[name=BranchID]").val(data[0][0]["branchId"]);
                        $("input[name=InsuredName]").val(data[0][0]["insuredFirstName"]+" "+data[0][0]["insuredLastName"]);
                        $("input[name=Policy]").val(data[0][0]["policy"]);

                        $("input[name=Professional]").val(data[1][0]["professionalServices"]);
                        $("input[name=GeneralExp]").val(data[2][0]["generalExp"]);
                        $("input[name=CommPhotoExp]").val(data[3][0]["commPhotoExp"]);
                        $("input[name=ConsultFeesExp]").val(data[4][0]["consultFeesExp"]);
                        $("input[name=TravelRelatedExp]").val(data[5][0]["travelRelatedExp"]);
                        $("input[name=GSTFreeDisb]").val(data[6][0]["gstFreeDisb"]);
                        $("input[name=Disbursements]").val(data[7][0]["disbursement"]);
                    });

                },
                loadInvoiceByEventEnterKey:function(e)
                {
                    if (e.keyCode === 13)
                    {
                        invoiceView.getData($("input[name=Invoice]").val());
                    }
                },
                loadListInvoice:function()
                {
                    $("div[id=modalListInvoice]").modal("show");
                },
                viewDetailInvoice:function(element)
                {
                    invoiceView.getData($(element).attr("id"));
                    $("div[id=modalListInvoice]").modal("hide");
                }
            };
        }
        else {

        }
    })
</script>