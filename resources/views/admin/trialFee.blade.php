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
                            <input name="">
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
                                <input type="text" name="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Claim Type:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
                            </td>
                            <td>
                                <h5>Branch:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Loss Date:</h5>
                            </td>
                            <td>
                                <input type="date" name="">
                            </td>
                            <td>
                                <h5>Initial Reserve:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Received:</h5>
                            </td>
                            <td>
                                <input type="date" name="">
                            </td>
                            <td>
                                <h5>Current Res:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Opened:</h5>
                            </td>
                            <td>
                                <input type="date" name="">
                            </td>
                            <td>
                                <h5>Adjust Res:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Estimated:</h5>
                            </td>
                            <td>
                                <input type="text" name="">
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
                            <select name="" id="" style="width:100px">
                                <option value="">A</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>
                        <textarea rows="4" style="width: 100%;resize: none;">

                        </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Insurer:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 100%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Policy #:</h5>
                        </td>
                        <td>
                            <input type="text" style="width: 100%">
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
                        {{--<tr style="border: 1px solid black">--}}
                            {{--<th style="text-align: center;background-color: blue;color: white">Branch/Adjuster Subtotals:</th>--}}
                        {{--</tr>--}}
                        <thead>
                            <tr>
                                <th style="width:600px">A</th>
                                <th style="width:600px">A</th>
                            </tr>
                        </thead>
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

</div>
<br>
<br>