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
<div class="modal fade" id="modal-invoice-report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Invoice List</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Invoice Id</th>
                            <th>Claim Id</th>
                            <th>Invoice Date</th>
                            <th>Choose</th>
                        </tr>
                        </thead>
                        <tbody id="invoice-table-body">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- TAB NAVIGATION -->
<ul class="nav nav-tabs" role="tablist">
    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">Claim Report</a></li>
    <li><a href="#tab2" role="tab" data-toggle="tab">WIP Report</a></li>
</ul>
<!-- TAB CONTENT -->
<div class="tab-content">
    <div class="active tab-pane fade in" id="tab1">
        <div class="row" style="background-color: #fff;padding-top:10px;padding-bottom:10px">
            <div class="col-sm-3">
                Claim ID: <input type="text" name="claim_id" id="claim_id">
                <br>
                Invoice ID: <input type="text" name="invoice_id" id="invoice_id">
            </div>
            <div class="col-sm-9">
                <button class="pull-right" id="print_report">Print Report</button>
            </div>
        </div>
        <hr>
        <div class="report">
                <div class="page" id="page_1">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                        <span class="claim-report-text bold">Our File #: <div
                                                    data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-1">
                            <div class="claim-info" id="claim-info-page-1">
                                <div class="claim-info-col-1">
                                    <span>Branch Seq No:</span>
                                    <span>Incident #:</span>
                                    <span>Asssignment Type Code:</span>
                                    <span>Account Code:</span>
                                    <span>Insured Name:</span>
                                    <span>Insured Claim #:</span>
                                    <span>Trading As:</span>
                                    <span>Claim Type Code:</span>
                                    <span>Loss Desc Code:</span>
                                    <span>Catastrophic Loss:</span>
                                    <span>Source Code:</span>
                                    <span>Insurer Code:</span>
                                    <span>Broker Code:</span>
                                    <span>Branch Code:</span>
                                    <span>Branch Type Code:</span>
                                    <span>Destroyed Date:</span>
                                    <span>Loss Location:</span>
                                    <span>Line Of Business Code:</span>
                                </div>
                                <div class="claim-info-col-2">
                                    <span>&nbsp;<div id="branchSeqNo" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="incidentNo" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="assignmentTypeCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="accountCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="insuredName" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="insuredClaimNo" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="tradingAs" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="claimTypeCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="lossDescCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="catastrophicLoss" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="sourceCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="insurerCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="brockerCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="branchCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="branchTypeCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="destroyedDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="lossLocation" style="display: inline-block"></div></span>
                                    <span>&nbsp;<div id="lineOfBusinessCode" style="display: inline-block"></div></span>
                                </div>
                                <div class="claim-info-col-3">
                                    <div class="claim-info-col-3-row-1">
                                        <div class="claim-info-col-3-row-1-col-1">
                                            <span>Loss Date:</span>
                                            <span>Receive Date:</span>
                                            <span>Open Date:</span>
                                            <span>Close Date:</span>
                                            <span>Insured Contacted Date:</span>
                                            <span>Limitation Date:</span>
                                            <span>Policy Inception Date:</span>
                                            <span>Policy Expiry Date:</span>
                                            <span>Disability Code:</span>
                                            <span>Outcome Code:</span>
                                            <span>Last Changed:</span>
                                            <span>Partnership Id:</span>
                                        </div>
                                        <div class="claim-info-col-3-row-1-col-2">
                                            <span>&nbsp;&nbsp;<div id="lossDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="receiveDate" style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="openDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="closeDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="insuredContactedDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="limitationDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="policyInceptionDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="policyExpireDate"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="disabilityCode"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="outComeCode" style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="lastChanged" style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="partnershipId"
                                                                   style="display: inline-block"></div></span>
                                        </div>
                                    </div>
                                    <div class="claim-info-col-3-row-2">
                                        <div class="claim-info-col-3-row-2-col-1">
                                            <span>Adjuster Code:</span>
                                            <span>Rate:</span>
                                            <span>Fee Type:</span>
                                            <span>Taxable:</span>
                                            <span>Estimated Claim Value:</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                        </div>
                                        <div class="claim-info-col-3-row-2-col-2">
                                            <span>&nbsp;&nbsp;<div id="adjusterCode"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="rate" style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="feeType"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="taxable"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;<div id="estimatedClaimValue"
                                                                   style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                        </div>
                                        <div class="claim-info-col-3-row-2-col-3">
                                            <span>&nbsp;&nbsp;&nbsp;<div id="adjusterName"
                                                                         style="display: inline-block"></div></span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                            <span>&nbsp;&nbsp;&nbsp;</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="co-insurers" id="co-insurers-page-1">
                                <div class="co-insurers-header">
                                    <span>Co - Insurers</span>
                                </div>
                                <div class="co-insurers-content">
                                    <div class="co-insurers-content-header">
                                        <div class="co-insurers-content-header-percentage">
                                            <span>Percentage</span>
                                        </div>
                                        <div class="co-insurers-content-header-bill-to-id">
                                            <span>Bill To Id</span>
                                        </div>
                                        <div class="co-insurers-content-header-claims-officer">
                                            <span>Claims Officer</span>
                                        </div>
                                        <div class="co-insurers-content-header-policy-number">
                                            <span>Policy Number</span>
                                        </div>
                                        <div class="co-insurers-content-header-comp-claim-number">
                                            <span>Comp. Claim Number</span>
                                        </div>
                                    </div>
                                    <div class="co-insurers-content-body">
                                        <div class="co-insurers-content-body-col">
                                            <span>100.00 %</span>
                                        </div>
                                        <div class="co-insurers-content-body-col">
                                            <span><div id="billToCustomerCode"
                                                       style="display: inline-block"></div></span>
                                        </div>
                                        <div class="co-insurers-content-body-col">
                                            <span><div id="billToCustomerClaimOfficer" style="display: inline-block"></div></span>
                                        </div>
                                        <div class="co-insurers-content-body-col">
                                            <span><div id="billToCustomerPolicyNumber" style="display: inline-block"></div></span>
                                        </div>
                                        <div class="co-insurers-content-body-col-last">
                                            <span>To be advise</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reserves" id="reserves-page-1">
                                <div class="reserves-header">
                                    <span>Reserves</span>
                                </div>
                                <div class="reserves-content">
                                    <div class="reserves-content-header">
                                        <div class="reserves-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="reserves-content-header-third-party">
                                            <span>Third Party</span>
                                        </div>
                                        <div class="reserves-content-header-reserve">
                                            <span>Reserve</span>
                                        </div>
                                        <div class="reserves-content-header-adj">
                                            <span>ADJ</span>
                                        </div>
                                        <div class="reserves-content-header-pmt">
                                            <span>PMT</span>
                                        </div>
                                        <div class="reserves-content-header-exp">
                                            <span>EXP</span>
                                        </div>
                                        <div class="reserves-content-header-rec">
                                            <span>REC</span>
                                        </div>
                                        <div class="reserves-content-header-total-inc">
                                            <span>Total Inc.</span>
                                        </div>
                                    </div>
                                    <div class="reserves-content-body">
                                    </div>
                                </div>
                            </div>
                            <div class="assists" id="assists-page-1">
                                <div class="assists-header">
                                    <span>Assists</span>
                                </div>
                                <div class="assists-content">
                                    <div class="assists-content-header">
                                        <div class="assists-content-header-branch">
                                            <span>&nbsp;&nbsp;&nbsp;&nbsp;Branch</span>
                                        </div>
                                        <div class="assists-content-header-adjuster-first-name">
                                            <span>&nbsp;&nbsp;Adjuster Name</span>
                                        </div>
                                        <div class="assists-content-header-adjuster-time">
                                            <span>Time</span>
                                        </div>
                                        <div class="assists-content-header-rate">
                                            <span>Rate</span>
                                        </div>
                                        <div class="assists-content-header-fee-type">
                                            <span>Type</span>
                                        </div>
                                        <div class="assists-content-header-date-added">
                                            <span>Date Added</span>
                                        </div>
                                    </div>
                                    <div id="assit-contain-page-1">

                                    </div>

                                </div>
                            </div>
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-1">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-1">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-1">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>1</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page" id="page_2">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg ') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                    <span class="claim-report-text bold">Our File #: <div
                                                data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-2">
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-2">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-2">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Time<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Time<br>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-2">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>2</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page" id="page_3">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg ') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                    <span class="claim-report-text bold">Our File #: <div
                                                data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-3">
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-3">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-3">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Time<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Time<br>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-3">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page" id="page_4">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg ') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                    <span class="claim-report-text bold">Our File #: <div
                                                data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-4">
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-4">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-4">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Time<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Time<br>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-4">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>4</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page" id="page_5">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg ') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                    <span class="claim-report-text bold">Our File #: <div
                                                data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-5"> 
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-5">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-5">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Time<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Time<br>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-5">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>5</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page" id="page_6">
                    <div class="header">
                        <div class="content-body">
                            <div class="marginTop">
                            </div>
                            <div class="logo">
                                <img src="{{ asset('img/logo.jpg ') }}" alt="logo" class="logo-img">
                            </div>
                            <div class="ourFile">
                                <div class="claim-report">
                                    <div>
                                        <span class="claim-report-text bold">Claim Report</span>
                                    </div>
                                    <div style="margin-top: 10px">
                                        <span class="claim-report-print-date">Printed: <div data-id="print_date">13/06/2016 10:03:49 AM</div></span>
                                    </div>
                                </div>
                                <div class="claim-report-outfile">
                                    <div>
                                    <span class="claim-report-text bold">Our File #: <div
                                                data-id="ourFile">1001682</div></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <div class="content-body" id="content-body-page-6">
                            <div class="dockets">
                                <div class="dockets-header" id="dockets-header-page-6">
                                    <span>Dockets</span>
                                </div>
                                <div class="dockets-content">
                                    <div class="dockets-content-header" id="dockets-content-header-page-6">
                                        <div class="dockets-content-header-date">
                                            <span>Date</span>
                                        </div>
                                        <div class="dockets-content-header-branch-code">
                                            <span>Branch<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-adjuster-code">
                                            <span>Adjuster<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-code">
                                            <span>Time<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-unit">
                                            <span>Time<br>Units</span>
                                        </div>
                                        <div class="dockets-content-header-expense-code">
                                            <span>Expense<br>Code</span>
                                        </div>
                                        <div class="dockets-content-header-expense-amount">
                                            <span>Expense<br>Amount</span>
                                        </div>
                                        <div class="dockets-content-header-note">
                                            <span>Note</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-major-no">
                                            <span>Invoice<br>MajorNo</span>
                                        </div>
                                        <div class="dockets-content-header-invoice-date">
                                            <span>Invoice<br>Date</span>
                                        </div>
                                    </div>
                                    <div id="docket-contain-page-6">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <div class="content-body">
                            <div class="paginate">
                                <div class="footer-text">
                                    <div class="footer-text-info">
                                        <span>CMS Claims Management System</span>
                                        <div class="TM"><span>TM</span></div>
                                        <span> - &copy; 2000-2016 VietNam International Adjusters.</span>
                                    </div>
                                </div>
                                <div class="footer-number">
                                    <div class="footer-text-number">
                                        <span>6</span>
                                    </div>
                                </div>
                            </div>
                            <div class="marginBottom">
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="tab-pane fade" id="tab2">
        <div class="row" style="background-color: #fff;">
            <div class="col-sm-12" style="padding-top:20px;padding-bottom:20px">
                <button class="pull-right">Export WIP To PDF</button>
                <button class="pull-right" style="margin-right: 20px">Export WIP To Excel</button>
            </div>
        </div>
        <br>
        
    </div>
</div>

</div>
<br>
<br>
<script>
    $("#claim_id").on("dblclick", function (e) {
        $.get(url + 'getAllClaim', function (listClaim) {
            var row = "";
            for (var i = 0; i < listClaim.length; i++) {
                var tr = "<tr>";
                tr += "<td>" + listClaim[i]["code"] + "</td>";
                tr += "<td>" + listClaim[i]["insuredLastName"] + "</td>";
                tr += "<td>" + listClaim[i]["lossLocation"] + "</td>";
                tr += "<td>" + listClaim[i]["receiveDate"] + "</td>";
                tr += "<td>" + listClaim[i]["openDate"] + "</td>";
                tr += "<td>" + listClaim[i]["adjusterCode"] + "</td>";
                tr += "<td><button class='btn btn-xs btn-success' onclick='fillClaimToInput(\"" + listClaim[i]["code"] + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
                tr += "</tr>";
                row += tr;
            }
            $("#claim-talbe-body").empty().append(row);
        });
        $("#modal-claim").modal("show");
    })

    $("#print_report").click(function (e) {
        $(".report").printThis({
            debug: false,
            importCSS: true,
            importStyle: false,
            loadCSS: "admin/css/style.css",
            removeInline: false,
            printDelay: 2000,
            header: null,
            formValues: true
        });
    });

    $("#invoice_id").on('dblclick', function (e) {
        $.get(url + 'getAllInvoiceByClaimId/' + $("#claim_id").val(), function (result) {
            if (result.status == "success") {
                var row = "";
                for (var i = 0; i < result.data.length; i++) {
                    var tr = "<tr>";
                    tr += "<td>" + result.data[i].invoice_id + "</td>";
                    tr += "<td>" + result.data[i].claim_id + "</td>";
                    tr += "<td>" + result.data[i].invoice_date + "</td>";
                    tr += "<td><button class='btn btn-xs btn-success' onclick='getReportData(\"" + result.data[i].invoice_id + "\",\"" + result.data[i].bill_id + "\",\"" + result.data[i].claim_id + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
                    tr += "</tr>";
                    row += tr;
                }
                $("#invoice-table-body").empty().append(row);
            }
        });
        $("#modal-invoice-report").modal("show");
    });

    function fillClaimToInput(code) {
        $("#claim_id").val(code);
        $("#modal-claim").modal("hide");
    }
    var data_docket = [];
    var continue_id = 0;
    var results = null;
    function getReportData(invoice_id, bill_id, claim_id) {
        $("#invoice_id").val(invoice_id);
        $("#modal-invoice-report").modal("hide");
        $.get(url + 'getReportData/' + invoice_id + '/' + bill_id + '/' + claim_id, function (result) {
            results = result;
            $("div[data-id=print_date]").each(function (index) {
                $(this).empty().append(result.print_date);
            });
            $("div[data-id=ourFile]").each(function (index) {
                $(this).empty().append(result.claim.ourFile);
            });
            $("#branchSeqNo").empty().append(result.claim.branchSeqNo);
            $("#incidentNo").empty().append(result.claim.incidentNo);
            $("#assignmentTypeCode").empty().append(result.claim.assignmentTypeCode);
            $("#accountCode").empty().append(result.claim.accountCode);
            $("#insuredName").empty().append(result.claim.insuredName);
            $("#insuredClaimNo").empty().append(result.claim.insuredClaimNo);
            $("#tradingAs").empty().append(result.claim.tradingAs);
            $("#claimTypeCode").empty().append(result.claim.claimTypeCode + " - " + result.claim.claimTypeCodeDetail);
            $("#lossDescCode").empty().append(result.claim.lossDescCode + " - " + result.claim.lossDescCodeDetail);
            $("#catastrophicLoss").empty().append(result.claim.catastrophicLoss);
            $("#sourceCode").empty().append(result.claim.sourceCode + " - " + result.claim.sourceCodeDetail);
            $("#insurerCode").empty().append(result.claim.insurerCode);
            $("#brockerCode").empty().append(result.claim.brockerCode);
            $("#branchCode").empty().append(result.claim.branchCode + " - " + result.claim.branchCodeDetail);
            $("#destroyedDate").empty().append(function () {
                if (result.claim.destroyedDate) {
                    var destroyedDate = new Date(result.claim.destroyedDate.substring(0, 10));
                    var dd = destroyedDate.getDate();
                    var mm = destroyedDate.getMonth() + 1; //January is 0!

                    var yyyy = destroyedDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#lossLocation").empty().append(result.claim.lossLocation);
            $("#lineOfBusinessCode").empty().append(result.claim.lineOfBusinessCode);
            $("#receiveDate").empty().append(function () {
                if (result.claim.receiveDate) {
                    var receiveDate = new Date(result.claim.receiveDate.substring(0, 10));
                    var dd = receiveDate.getDate();
                    var mm = receiveDate.getMonth() + 1; //January is 0!

                    var yyyy = receiveDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#openDate").empty().append(function () {
                if (result.claim.openDate) {
                    var openDate = new Date(result.claim.openDate.substring(0, 10));
                    var dd = openDate.getDate();
                    var mm = openDate.getMonth() + 1; //January is 0!

                    var yyyy = openDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#closeDate").empty().append(function () {
                if (result.claim.closeDate) {
                    var openDate = new Date(result.claim.closeDate.substring(0, 10));
                    var dd = closeDate.getDate();
                    var mm = closeDate.getMonth() + 1; //January is 0!

                    var yyyy = closeDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#insuredContactedDate").empty().append(function () {
                if (result.claim.receiveDate) {
                    var openDate = new Date(result.claim.receiveDate.substring(0, 10));
                    var dd = openDate.getDate();
                    var mm = openDate.getMonth() + 1; //January is 0!

                    var yyyy = openDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#limitationDate").empty().append(function () {
                if (result.claim.receiveDate) {
                    var openDate = new Date(result.claim.receiveDate.substring(0, 10));
                    var dd = openDate.getDate();
                    var mm = openDate.getMonth() + 1; //January is 0!

                    var yyyy = openDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#policyInceptionDate").empty().append(function () {
                if (result.claim.receiveDate) {
                    var openDate = new Date(result.claim.receiveDate.substring(0, 10));
                    var dd = openDate.getDate();
                    var mm = openDate.getMonth() + 1; //January is 0!

                    var yyyy = openDate.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }
                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    return dd + '-' + mm + '-' + yyyy;
                }
                return "";
            });
            $("#disabilityCode").empty().append(result.claim.disabilityCode);
            $("#outComeCode").empty().append(result.claim.outComeCode);
            $("#lastChanged").empty().append(result.claim.lastChanged);
            $("#partnershipId").empty().append(result.claim.partnershipId);
            $("#adjusterCode").empty().append(result.claim.adjusterCode);
            $("#adjusterName").empty().append(result.claim.adjusterCodeDetail);
            $("#rate").empty().append(result.claim.rate);
            $("#feeType").empty().append("Hourly");
            $("#taxable").empty().append("True");
            $("#estimatedClaimValue").empty().append(result.claim.estimatedClaimValue);
            $("#billToCustomerCode").empty().append(result.bill.billToId);
            $("#billToCustomerClaimOfficer").empty().append(result.bill.claimOfficer);
            $("#billToCustomerPolicyNumber").empty().append(result.bill.policyNumber);
            var row = "";
            for(var i = 0; i< result.assit.length;i++){
                row += "<div class='element'>";
                row += " <div class='assists-content-header-branch'>";
                row += "<span>" + result.assit[i].branch.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='assists-content-header-adjuster-first-name'>";
                row += "<span>" + result.assit[i].assit.firstName + " " + result.assit[i].assit.lastName + "</span>";
                row += "</div>";
                row += "<div class='assists-content-header-adjuster-time'>";
                row += "<span>"+result.assit[i].time+"</span>";
                row += "</div>";
                row += "<div class='assists-content-header-rate'>";
                row += "<span>"+result.assit[i].rate+"</span>";
                row += "</div>";
                row += "<div class='assists-content-header-fee-type'>";
                row += "<span>&nbsp;&nbsp;&nbsp;Hourly</span>";
                row += "</div>";
                row += "<div class='assists-content-header-date-added'>";
                var year = result.assit[i].assit.created_at.substring(0,4);
                var month = result.assit[i].assit.created_at.substring(5,7);
                var day = result.assit[i].assit.created_at.substring(8,10);
                row += "<span>&nbsp;&nbsp;" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
            }
            $("#assit-contain-page-1").empty().append(row);
            data_docket = result.docket;
            for(var i = 0;i < result.docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = result.docket[i].created_at.substring(0,4);
                var month = result.docket[i].created_at.substring(5,7);
                var day = result.docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + result.docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!result.docket[i].professionalServices){
                    row += "<span style='padding-right: 20px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+result.docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+result.docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!result.docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ result.docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(result.docket[i].expenseAmount == '0' || result.docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+result.docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                if(result.docket[i].professionalServices !=null && result.docket[i].expense != null){
                    row += "<span style='float: left;padding-left: 30px;font-size: 18px;text-align: left'>"+result.docket[i].professionalServicesNoteDes.trim() + ": " + result.docket[i].professionalServicesNote.trim() + "<br>" + result.docket[i].expenseNoteDes.trim() + ": " + result.docket[i].expenseNote.trim() +"</span>";
                }else if(result.docket[i].professionalServices !=null && result.docket[i].expense == null){
                    row += "<span style='float: left;padding-left: 30px;font-size: 18px;text-align: left'>"+result.docket[i].professionalServicesNoteDes.trim() + ": " + result.docket[i].professionalServicesNote.trim() +"</span>";
                }else if(result.docket[i].professionalServices == null && result.docket[i].expense != null){
                    row += "<span style='float: left;padding-left: 30px;font-size: 18px;text-align: left'>" + result.docket[i].expenseNoteDes.trim() + ": " + result.docket[i].expenseNote.trim() +"</span>";
                }
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;text-align: left'>"+result.docket[i].professionalServicesNote + " " + result.docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+result.docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = result.docket[i].invoiceDate.substring(0,4);
                var month = result.docket[i].invoiceDate.substring(5,7);
                var day = result.docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-1").append(row);
                var limit = $("#content-body-page-1").height() - $("#claim-info-page-1").height() - $("#co-insurers-page-1").height() - $("#reserves-page-1").height() - $("#assists-page-1").height() - $("#dockets-header-page-1").height() - $("#dockets-content-header-page-1").height() - $("#docket-contain-page-1").height();
                if(limit < 200){
                    break;
                }
            }
            load_page_2();
        });

    }
    function load_page_2(){
        if(continue_id + 1 == data_docket.length){
            console.log('load complete insert discount');
            console.log(data_docket);
            $("#page_2").remove();
            $("#page_3").remove();
            $("#page_4").remove();
            $("#page_5").remove();
            $("#page_6").remove();
        }else{
            var continue_index = continue_id + 1;
            for(var i = continue_index;i < data_docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = data_docket[i].created_at.substring(0,4);
                var month = data_docket[i].created_at.substring(5,7);
                var day = data_docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + data_docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!data_docket[i].professionalServices){
                    row += "<span style='padding-right: 10px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+data_docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+data_docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!data_docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ data_docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(data_docket[i].expenseAmount == '0' || data_docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+data_docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;;text-align: left'>"+data_docket[i].professionalServicesNote + " " + data_docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+data_docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = data_docket[i].invoiceDate.substring(0,4);
                var month = data_docket[i].invoiceDate.substring(5,7);
                var day = data_docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-2").append(row);
                var limit = $("#content-body-page-2").height() - $("#dockets-header-page-2").height() - $("#dockets-content-header-page-2").height() - $("#docket-contain-page-2").height();
                if(limit < 200){
                    break;
                }
            }
            load_page_3();
        }
    }
    function load_page_3() {
        if(continue_id + 1 == data_docket.length){
            console.log('load complete insert discount');
            console.log(data_docket);
            $("#page_3").remove();
            $("#page_4").remove();
            $("#page_5").remove();
            $("#page_6").remove();
        }else{
            var continue_index = continue_id + 1;
            for(var i = continue_index;i < data_docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = data_docket[i].created_at.substring(0,4);
                var month = data_docket[i].created_at.substring(5,7);
                var day = data_docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + data_docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!data_docket[i].professionalServices){
                    row += "<span style='padding-right: 20px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+data_docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+data_docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!data_docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ data_docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(data_docket[i].expenseAmount == '0' || data_docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+data_docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;text-align: left'>"+data_docket[i].professionalServicesNote + " " + data_docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+data_docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = data_docket[i].invoiceDate.substring(0,4);
                var month = data_docket[i].invoiceDate.substring(5,7);
                var day = data_docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-3").append(row);
                var limit = $("#content-body-page-3").height() - $("#dockets-header-page-3").height() - $("#dockets-content-header-page-3").height() - $("#docket-contain-page-3").height();
                if(limit < 200){
                    break;
                }
            }
            load_page_4();
        }
    }

    function load_page_4() {
        if(continue_id + 1 == data_docket.length){
            console.log('load complete insert discount');
            console.log(data_docket);
            $("#page_4").remove();
            $("#page_5").remove();
            $("#page_6").remove();
        }else{
            var continue_index = continue_id + 1;
            for(var i = continue_index;i < data_docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = data_docket[i].created_at.substring(0,4);
                var month = data_docket[i].created_at.substring(5,7);
                var day = data_docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + data_docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!data_docket[i].professionalServices){
                    row += "<span style='padding-right: 20px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+data_docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+data_docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!data_docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ data_docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(data_docket[i].expenseAmount == '0' || data_docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+data_docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;'>"+data_docket[i].professionalServicesNote + " " + data_docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+data_docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = data_docket[i].invoiceDate.substring(0,4);
                var month = data_docket[i].invoiceDate.substring(5,7);
                var day = data_docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-4").append(row);
                var limit = $("#content-body-page-4").height() - $("#dockets-header-page-4").height() - $("#dockets-content-header-page-4").height() - $("#docket-contain-page-4").height();
                if(limit < 200){
                    break;
                }
            }
            load_page_5();
        }
    }
    function load_page_5() {
        if(continue_id + 1 == data_docket.length){
            console.log('load complete insert discount');
            console.log(data_docket);
            $("#page_5").remove();
            $("#page_6").remove();
        }else{
            var continue_index = continue_id + 1;
            for(var i = continue_index;i < data_docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = data_docket[i].created_at.substring(0,4);
                var month = data_docket[i].created_at.substring(5,7);
                var day = data_docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + data_docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!data_docket[i].professionalServices){
                    row += "<span style='padding-right: 20px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+data_docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+data_docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!data_docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ data_docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(data_docket[i].expenseAmount == '0' || data_docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+data_docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;'>"+data_docket[i].professionalServicesNote + " " + data_docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+data_docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = data_docket[i].invoiceDate.substring(0,4);
                var month = data_docket[i].invoiceDate.substring(5,7);
                var day = data_docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-5").append(row);
                var limit = $("#content-body-page-5").height() - $("#dockets-header-page-5").height() - $("#dockets-content-header-page-5").height() - $("#docket-contain-page-5").height();
                if(limit < 200){
                    break;
                }
            }
            load_page_6();
        }
    }
    function load_page_6() {
        if(continue_id + 1 == data_docket.length){
            $("#page_6").remove();
        }else{
            var continue_index = continue_id + 1;
            for(var i = continue_index;i < data_docket.length;i++){
                continue_id = i;
                row = "";
                row += "<div class='element' style='margin-bottom: 10px'>";
                row += "<div class='dockets-content-header-date'>";
                var year = data_docket[i].created_at.substring(0,4);
                var month = data_docket[i].created_at.substring(5,7);
                var day = data_docket[i].created_at.substring(8,10);
                row += "<span style='padding-right: 30px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-branch-code'>";
                row += "<span style='padding-right: 40px'>"+results.claim.branchCode.toUpperCase()+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-adjuster-code'>";
                row += "<span style='padding-right: 30px'>" + data_docket[i].adjusterCode.toUpperCase() + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-code'>";
                if(!data_docket[i].professionalServices){
                    row += "<span style='padding-right: 20px'></span>";
                }else{
                    row += "<span style='padding-right: 20px'>"+data_docket[i].professionalServices + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-unit'>";
                row += "<span>"+data_docket[i].professionalServicesTime + "</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-expense-code'>";
                if(!data_docket[i].expense){
                    row += "<span></span>";
                }else{
                    row += "<span>"+ data_docket[i].expense + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-expense-amount'>";
                if(data_docket[i].expenseAmount == '0' || data_docket[i].expenseAmount == '0.00'){
                    row += "<span></span>";
                }else{
                    row += "<span>"+data_docket[i].expenseAmount + "</span>";
                }
                row += "</div>";
                row += "<div class='dockets-content-header-note'>";
                row += "<span style='float: left;padding-left: 30px;font-size: 18px;'>"+data_docket[i].professionalServicesNote + " " + data_docket[i].expenseNote +"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-major-no'>";
                row += "<span style='padding-left: 30px'>"+data_docket[i].invoiceMajorNo+"</span>";
                row += "</div>";
                row += "<div class='dockets-content-header-invoice-date'>";
                var year = data_docket[i].invoiceDate.substring(0,4);
                var month = data_docket[i].invoiceDate.substring(5,7);
                var day = data_docket[i].invoiceDate.substring(8,10);
                row += "<span style='padding-left: 35px'>" + day + "-" + month + "-" + year + "</span>";
                row += "</div>";
                row += "</div>";
                $("#docket-contain-page-6").append(row);
                var limit = $("#content-body-page-6").height() - $("#dockets-header-page-6").height() - $("#dockets-content-header-page-6").height() - $("#docket-contain-page-6").height();
                if(limit < 200){
                    break;
                }
            }
        }
        console.log('load complete insert discount');
    }
</script>