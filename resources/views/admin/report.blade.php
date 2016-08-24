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
<div class="row" style="background-color: #fff;">
    <div class="col-sm-6">
        <h5>Claim Id: </h5>
        <input type="text" id="claim_id" style="display: inline-block;width: 70%">&nbsp;&nbsp;<button id="show_invoice" style="display: inline-block">Show All Invoice</button>
    </div>
    <div class="col-sm-6">
        <h5 class="text-right" style="width: 100%;">-------------------------------------------------------------------</h5>
        <button class="pull-right" id="print_report">Print Report</button>
    </div>
    &nbsp;

</div>
<div class="row">
    <div class="report">
        <div class="page" id="page_1">
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="claim-info">
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
                                    <span>&nbsp;&nbsp;<div id="lossDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="receiveDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="openDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="closeDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="insuredContactedDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="limitationDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="policyInceptionDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="policyExpireDate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="disabilityCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="outComeCode" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="lastChanged" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="partnershipId" style="display: inline-block"></div></span>
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
                                    <span>&nbsp;&nbsp;<div id="adjusterCode" style="display: inline-block">SONV1</div></span>
                                    <span>&nbsp;&nbsp;<div id="rate" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="feeType" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="taxable" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;<div id="estimatedClaimValue" style="display: inline-block"></div></span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                </div>
                                <div class="claim-info-col-3-row-2-col-3">
                                    <span>&nbsp;&nbsp;&nbsp;<div id="adjusterName" style="display: inline-block">Vu Thanh Son</div></span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                    <span>&nbsp;&nbsp;&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="co-insurers">
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
                                    <span><div id="billToCustomerCode" style="display: inline-block">FUBHCM1</div></span>
                                </div>
                                <div class="co-insurers-content-body-col">
                                    <span><div id="billToCustomerClaimOfficer" style="display: inline-block">Mr. Nguyen Hung Linh</div></span>
                                </div>
                                <div class="co-insurers-content-body-col">
                                    <span><div id="billToCustomerPolicyNumber" style="display: inline-block">P0014CFE400</div></span>
                                </div>
                                <div class="co-insurers-content-body-col-last">
                                    <span>To be advise</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reserves">
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
                    <div class="assists">
                        <div class="assists-header">
                            <span>Assists</span>
                        </div>
                        <div class="assists-content">
                            <div class="assists-content-header">
                                <div class="assists-content-header-branch">
                                    <span>Branch</span>
                                </div>
                                <div class="assists-content-header-adjuster-first-name">
                                    <span>Adjuster First Name</span>
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

                            <div class="element">
                                <div class="assists-content-header-branch">
                                    <span>Branch</span>
                                </div>
                                <div class="assists-content-header-adjuster-first-name">
                                    <span>Adjuster First Name</span>
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
                            <div class="element">
                                <div class="assists-content-header-branch">
                                    <span>Branch</span>
                                </div>
                                <div class="assists-content-header-adjuster-first-name">
                                    <span>Adjuster First Name</span>
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
                        </div>
                    </div>
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
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
                            <div class="element">
                                <div class="dockets-content-header-date">
                                    <span>Date</span>
                                </div>
                                <div class="dockets-content-header-branch-code">
                                    <span>Branch Code</span>
                                </div>
                                <div class="dockets-content-header-adjuster-code">
                                    <span>Adjuster Code</span>
                                </div>
                                <div class="dockets-content-header-code">
                                    <span>Time<br>Code</span>
                                </div>
                                <div class="dockets-content-header-unit">
                                    <span>Time<br>Units</span>
                                </div>
                                <div class="dockets-content-header-expense-code">
                                    <span>Expense Code</span>
                                </div>
                                <div class="dockets-content-header-expense-amount">
                                    <span>Expense Amount</span>
                                </div>
                                <div class="dockets-content-header-note">
                                    <span>Note</span>
                                </div>
                                <div class="dockets-content-header-invoice-major-no">
                                    <span>Invoice MajorNo</span>
                                </div>
                                <div class="dockets-content-header-invoice-date">
                                    <span>Invoice Date</span>
                                </div>
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
                                <div class="dockets-content-header-row-1">
                                </div>
                                <div class="dockets-content-header-row-2">
                                </div>
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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
                                <span class="claim-report-print-date">Printed: <div id="print_date">13/06/2016 10:03:49 AM</div></span>
                            </div>
                        </div>
                        <div class="claim-report-outfile">
                            <div>
                                <span class="claim-report-text bold">Our File #: <div id="ourFile">1001682</div></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="content-body">
                    <div class="dockets">
                        <div class="dockets-header">
                            <span>Dockets</span>
                        </div>
                        <div class="dockets-content">
                            <div class="dockets-content-header">
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
                                <div class="TM"><span>TM</span></div><span> - &copy; 2000-2016 VietNam International Adjusters.</span>
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

<br>
<br>
<script>
    $("#claim_id").on("dblclick",function (e) {
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

    $("#show_invoice").click(function (e) {
        $.get(url + 'getAllClaim/' + $("#claim_id").val() ,function (result) {
            if(result.status == "success"){
                var row = "";
                for (var i = 0; i < listClaim.length; i++) {
                    var tr = "<tr>";
                    tr += "<td>" + listClaim[i]["code"] + "</td>";
                    tr += "<td>"+ listClaim[i]["insuredLastName"] + "</td>";
                    tr += "<td>"+ listClaim[i]["lossLocation"] + "</td>";
                    tr += "<td>"+ listClaim[i]["receiveDate"] + "</td>";
                    tr += "<td>"+ listClaim[i]["openDate"] + "</td>";
                    tr += "<td>"+ listClaim[i]["adjusterCode"] + "</td>";
                    tr += "<td><button class='btn btn-xs btn-success' onclick='getReportData(\"" + listClaim[i]["code"] + "\")'><span class='glyphicon glyphicon-ok'></span></button></td>";
                    tr += "</tr>";
                    row += tr;
                }
            }
            $("#invoice-talbe-body").empty().append(row);
        });
        $("#modal-invoice-report").modal("show");   
    });

    function fillClaimToInput(code) {
        $("#claim_id").val(code);
        $("#modal-claim").modal("hide");   
    }

    function getReportData(reportCode) {
        $.get(url + 'getReportData/' + reportCode ,function (result) {

        });
    }



</script>