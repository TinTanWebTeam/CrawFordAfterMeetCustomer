<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Claim;
use App\ClaimTaskDetail;
use App\CommPhotoExp;
use App\ConsultFeesExp;
use App\Customer;
use App\Disbursement;
use App\GeneralExp;
use App\GstFreeDisb;
use App\InsuranceDetail;
use App\Invoice;
use App\Position;
use App\ProfessionalService;
use App\RateDetail;
use App\SourceCustomer;
use App\Total;
use App\TravelRelatedExp;
use App\User;
use Auth;
use Config;
use DateTime;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\Exception;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getViewClaim()
    {
        return view('admin.claim');
    }

    public function getViewEmployee()
    {
        $position = Position::where('active', 1)->get();
        $listUser = User::where('active', 1)->where('roleId', 2)->get();
        return view('admin.employee')->with('position', $position)->with('listUser', $listUser);
    }

    public function getViewTrialFee()
    {
        $listCustomer = Customer::where('active', 1)->get();
        $claimIB = Claim::where('statusId', 4)->get();
        return view('admin.trialFee')->with('listCustomer', $listCustomer)->with('claimIB', $claimIB);
    }

    public function getViewInvoice()
    {
        $query = DB::table('invoices')
                ->join('bills','invoices.idBill','=','bills.id')
                ->join('claims','bills.claimId','=','claims.id')
                ->select(
                    'invoices.idBill as invoice',
                    'invoices.invoiceDay as invoiceDay',
                    'bills.billToId as billTo',
                    'bills.total as total',
                    'claims.code as claimCode'
                )->get();
        return view('admin.invoice')->with('query',$query);
    }

    public function getViewReport()
    {
        return view('admin.report');
    }

    public function addNewAndUpdateEmployee(Request $request)
    {
        //dd($request->all());
        $result = null;
        if ($request->get('idAction') == 1) {
            try {
                $employee = new User();
                $employee->name = $request->get('dataEmployee')['Name'];
                $employee->email = $request->get('dataEmployee')['Email'];
                $employee->password = crypt(Config::get('app.key'), $request->get('dataEmployee')['Password']);
                $employee->firstName = $request->get('dataEmployee')['FirstName'];
                $employee->lastName = $request->get('dataEmployee')['LastName'];
                $employee->salutation = $request->get('dataEmployee')['Salutation'];
                $employee->middleInitial = $request->get('dataEmployee')['MiddleInitial'];
                $employee->designations = $request->get('dataEmployee')['Designations'];
                $employee->sex = $request->get('dataEmployee')['Sex'];
                $employee->birthDate = $request->get('dataEmployee')['BirthDate'];
                $employee->company = $request->get('dataEmployee')['Company'];
                $employee->title = $request->get('dataEmployee')['Title'];
                $employee->phone = $request->get('dataEmployee')['Phone'];
                $employee->address = $request->get('dataEmployee')['Address'];
                $employee->bonusDate = $request->get('dataEmployee')['BonusDate'];
                $employee->userID_created = Auth::user()->id;
                $employee->networkID_created = $request->get('dataEmployee')['NetworkID_created'];
                $employee->positionId = $request->get('dataEmployee')['Position'];
                $employee->roleId = 2;
                if ($request->get('dataEmployee')['DefaultProfile'] == 'True') {
                    $employee->defaultProfile = 1;
                } else {
                    $employee->defaultProfile = 0;
                }
                $employee->save();
                //Insert table rate details
                $rate_Detail = new RateDetail();
                $rate_Detail->value = $request->get('dataEmployee')['Hourly'];
                $rate_Detail->description = $request->get('dataEmployee')['Hourly'];
                $rate_Detail->active = 1;
                $rate_Detail->rateTypeId = 2;
                $rate_Detail->userId = $employee->id;
                $rate_Detail->claimId = 0;
                $rate_Detail->createdBy = Auth::user()->id;
                $rate_Detail->save();
                $result = array('Action' => 'AddNew', 'Result' => 1);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            //dd($request->get('dataEmployee'));
            try {
                if ($request->get('dataEmployee')['Id'] != null) {
                    $employee = User::where('id', $request->get('dataEmployee')['Id'])->where('roleId', '!=', 1)->first();
                    if ($employee) {
                        $employee->email = $request->get('dataEmployee')['Email'];
                        $employee->firstName = $request->get('dataEmployee')['FirstName'];
                        $employee->lastName = $request->get('dataEmployee')['LastName'];
                        $employee->salutation = $request->get('dataEmployee')['Salutation'];
                        $employee->middleInitial = $request->get('dataEmployee')['MiddleInitial'];
                        $employee->designations = $request->get('dataEmployee')['Designations'];
                        $employee->sex = $request->get('dataEmployee')['Sex'];
                        $employee->birthDate = $request->get('dataEmployee')['BirthDate'];
                        $employee->company = $request->get('dataEmployee')['Company'];
                        $employee->title = $request->get('dataEmployee')['Title'];
                        $employee->phone = $request->get('dataEmployee')['Phone'];
                        $employee->address = $request->get('dataEmployee')['Address'];
                        $employee->bonusDate = $request->get('dataEmployee')['BonusDate'];
                        $employee->userID_changed = Auth::user()->id;
                        $employee->networkID_changed = $request->get('dataEmployee')['NetworkID_changed'];
                        if ($request->get('dataEmployee')['Locked'] == 'True') {
                            $employee->locked = 1;
                            $employee->inactive = 0;
                            $employee->inactiveDetail = null;
                        } else {
                            $employee->locked = 0;
                        }
                        if ($request->get('dataEmployee')['Inactive'] == 'True') {
                            $employee->inactive = 1;
                            $employee->locked = 0;
                            $employee->lockedDetail = null;
                        } else {
                            $employee->inactive = 0;
                        }
                        $employee->lockedDetail = $request->get('dataEmployee')['LockedDetail'];
                        $employee->inactiveDetail = $request->get('dataEmployee')['InactiveDetail'];
                        $employee->save();
                        //update rate when update user
                        $rate_DetailCheck = RateDetail::where('active', 1)
                            ->where('userId', $employee->id)
                            ->where('rateTypeId', 2)->first();
                        if ($rate_DetailCheck) {
                            $rate_DetailCheck->value = $request->get('dataEmployee')['Hourly'];
                            $rate_DetailCheck->description = $request->get('dataEmployee')['Hourly'];
                            $rate_DetailCheck->updatedBy = Auth::user()->id;
                            $rate_DetailCheck->save();
                        }
                        $result = array('Action' => 'Update', 'Result' => 1);
                    }
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function viewEmployeeDetailWhenChooseRowOfEventDoubleClick(Request $request)
    {
        $result = null;
        try {
            if ($request->get('idEmployee') != null) {
                $user = User::where('active', 1)->where('id', $request->get('idEmployee'))
                    ->where('roleId', 2)->first();
                if ($user) {
                    $nameCreated = User::where('active', 1)->where('id', $user->userID_created)->first()->name;
                    $nameUpdated = User::where('active', 1)->where('id', $user->userID_changed)->first()->name;
                    $rate = RateDetail::where('active', 1)->where('userId', $user->id)->first()->value;
                    $result = array('Object' => $user, 'nameCreated' => $nameCreated, 'nameUpdated' => $nameUpdated, 'rate' => $rate);
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function viewDetailEmployeeWhenUseEvenEnter(Request $request)
    {
        $result = null;
        try {
            if ($request->get('key') != null) {
                $user = User::where('active', 1)->where('name', $request->get('key'))->where('roleId', 2)->first();
                if ($user != null) {
                    $nameCreated = User::where('active', 1)->where('id', $user->userID_created)->first()->name;
                    $result = array('Data' => $user, 'Result' => 1, 'nameCreated' => $nameCreated);
                } else
                    $result = array('Data' => null, 'Result' => 0);
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function chooseClaimWhenUseEventEnter(Request $request)
    {
        //dd($request->all());
        $result = null;
        $claim = null;
        $billToId = null;
        $billTotal = null;
        $check = null;
        try {
            if ($request->get('key') != null)
            {
                $claim = Claim::where('code', $request->get('key'))->where('statusId', 1)->first();
                if ($claim)
                {
                    $checkIB = ClaimTaskDetail::where('professionalServices', 1)
                        ->where('claimId', $claim->id)
//                        ->where('billDate', '<', date('Y-m-d 23:59:59'))
                        ->where('statusId', 2)
                        ->orderBy('billDate', 'desc')
                        ->first();
                    if ($checkIB) {
                        $check = $checkIB->billDate;
                    } else {
                        $check = $claim->openDate;
                    }
                    //load data
                    if($check)
                    {
                        $listClaimTaskDetail = DB::table('claim_task_details')
                            ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                            ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                            ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                            ->where('claim_task_details.professionalServices', '!=', 1)
                            ->where('claim_task_details.professionalServices', '!=', 2)
                            ->where('claim_task_details.claimId', '=', $claim->id)
                            ->where('claim_task_details.billDate','>',$check)
                            ->groupBy('users.name')
                            ->select(
                                'users.name as userName',
                                'claim_task_details.professionalServices as cvChinh',
                                'claim_task_details.expense as cvPhu',
                                DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                DB::raw('SUM(claim_task_details.expenseAmount) as expense'),
                                'rate_details.value as rate',
                                'rate_types.name as rateType'
                            )
                            ->get();
                        $collect = collect($listClaimTaskDetail);
                        $array_all = [];
                        foreach ($collect as $item) {
                            $array = [
                                'Name' => $item->userName,
                                'Rate' => $item->rate,
                                'RateType' => $item->rateType,
                                'SumTimeCVChinh' => $item->sumTimeCvChinh,
                                'Expense' => $item->expense,
                                'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate,
                                //'Expense'=>$item->sumTimeCvPhu*$item->rate,
                            ];
                            array_push($array_all, $array);
                        }
//                        dd($array_all);

                        $result = array('Claim' => $claim, 'check' => $check, 'customer' => $billToId, 'total' => $billTotal, 'listClaimTaskDetail' => $array_all);
                    }

                }
            }
            else
            {
                if ($request->get('id') != null) {
                    $claim = Claim::where('id', $request->get('id'))->where('statusId', 4)->first();
                    if ($claim) {
                        $bill = Bill::where('claimId', $claim->id)->where('active', 1)->first();
                        $billToId = $bill->billToId;
                        $billTotal = $bill->total;
                    }
                }
            }
//            if ($claim) {
//
//            }
//            else
//            {
//                $result = array('Claim' => '', 'check' => $check, 'customer' => '', 'total' => '', 'listClaimTaskDetail' => '');
//            }


        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function showInformationOfCustomer(Request $request)
    {
        $result = null;
        try {
            if ($request->get('idCustomer') != null) {
                $result = Customer::where('code', $request->get('idCustomer'))->where('active', 1)->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function actionBillOfClaimViewTrialFee(Request $request)
    {
        //dd($request->all());
        $result = null;
        try {
            //Check action bill or update bill
            if ($request->get('action') == '1') {
                //check bill type: IB or FB
                if ($request->get('data')['billType'] == 'interim_bill') {
                    //check bill status:pending or complete
                    if($request->get('data')['billStatus'] == 'pending')
                    {
                        //delete IB pending before
                        $IBPending = ClaimTaskDetail::where('professionalServices',1)->where('statusId',1)->first();
                        if($IBPending)
                        {
                            $billIB = Bill::where('billId',$IBPending->id)->first();
                            if($billIB)
                            {
                                ProfessionalService::where('billId',$billIB->id)->delete();
                                GeneralExp::where('billId',$billIB->id)->delete();
                                CommPhotoExp::where('billId',$billIB->id)->delete();
                                ConsultFeesExp::where('billId',$billIB->id)->delete();
                                TravelRelatedExp::where('billId',$billIB->id)->delete();
                                GstFreeDisb::where('billId',$billIB->id)->delete();
                                Disbursement::where('billId',$billIB->id)->delete();
                                $billIB->delete();
                            }
                            $IBPending->delete();
                        }
                        //Insert data to table Claim_task_detail(Docket)
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $request->get('data')['toDate'];
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 1;
                        $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Insert data to table Bill
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
                        $bill->save();
                        //Insert data detail table
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->where('active', 1)->first();
                            if ($user) {
                                //table professional_services
                                $professionalServices = new ProfessionalService();
                                $professionalServices->billId = $bill->id;
                                $professionalServices->userId = $user->id;
                                $professionalServices->value = $item[4];
                                $professionalServices->save();
                                //table general exp
                                $generalExp = new GeneralExp();
                                $generalExp->billId = $bill->id;
                                $generalExp->userId = $user->id;
                                $generalExp->value = $item[5];
                                $generalExp->save();
                                //table commAndPhotoExp
                                $commAndPhotoExp = new CommPhotoExp();
                                $commAndPhotoExp->billId = $bill->id;
                                $commAndPhotoExp->userId = $user->id;
                                $commAndPhotoExp->value = $item[6];
                                $commAndPhotoExp->save();
                                //table consultFeeAndExp
                                $consultFeeAndExp = new ConsultFeesExp();
                                $consultFeeAndExp->billId = $bill->id;
                                $consultFeeAndExp->userId = $user->id;
                                $consultFeeAndExp->value = $item[7];
                                $consultFeeAndExp->save();
                                //table travelRelatedExp
                                $travelRelatedExp = new TravelRelatedExp();
                                $travelRelatedExp->billId = $bill->id;
                                $travelRelatedExp->userId = $user->id;
                                $travelRelatedExp->value = $item[8];
                                $travelRelatedExp->save();
                                //table gstFreeDisb
                                $gstFreeDisb = new GstFreeDisb();
                                $gstFreeDisb->billId = $bill->id;
                                $gstFreeDisb->userId = $user->id;
                                $gstFreeDisb->value = $item[9];
                                $gstFreeDisb->save();
                                //table disbursement
                                $disbursement = new Disbursement();
                                $disbursement->billId = $bill->id;
                                $disbursement->userId = $user->id;
                                $disbursement->value = $item[10];
                                $disbursement->save();
                                //table total
                                $total = new Total();
                                $total->billId = $bill->id;
                                $total->userId = $user->id;
                                $total->value = $item[11];
                                $total->save();
                            }
                        }
                        $result = array('Action' => 'BillClaim', 'Result' => 1);
                    }
                    else
                    {
                        //Insert data to table Claim_task_detail(Docket)
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $request->get('data')['toDate'];
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 2;
                        $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Insert data to table Bill
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
                        $bill->save();
                        //Insert data detail table
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->where('active', 1)->first();
                            if ($user) {
                                //table professional_services
                                $professionalServices = new ProfessionalService();
                                $professionalServices->billId = $bill->id;
                                $professionalServices->userId = $user->id;
                                $professionalServices->value = $item[4];
                                $professionalServices->save();
                                //table general exp
                                $generalExp = new GeneralExp();
                                $generalExp->billId = $bill->id;
                                $generalExp->userId = $user->id;
                                $generalExp->value = $item[5];
                                $generalExp->save();
                                //table commAndPhotoExp
                                $commAndPhotoExp = new CommPhotoExp();
                                $commAndPhotoExp->billId = $bill->id;
                                $commAndPhotoExp->userId = $user->id;
                                $commAndPhotoExp->value = $item[6];
                                $commAndPhotoExp->save();
                                //table consultFeeAndExp
                                $consultFeeAndExp = new ConsultFeesExp();
                                $consultFeeAndExp->billId = $bill->id;
                                $consultFeeAndExp->userId = $user->id;
                                $consultFeeAndExp->value = $item[7];
                                $consultFeeAndExp->save();
                                //table travelRelatedExp
                                $travelRelatedExp = new TravelRelatedExp();
                                $travelRelatedExp->billId = $bill->id;
                                $travelRelatedExp->userId = $user->id;
                                $travelRelatedExp->value = $item[8];
                                $travelRelatedExp->save();
                                //table gstFreeDisb
                                $gstFreeDisb = new GstFreeDisb();
                                $gstFreeDisb->billId = $bill->id;
                                $gstFreeDisb->userId = $user->id;
                                $gstFreeDisb->value = $item[9];
                                $gstFreeDisb->save();
                                //table disbursement
                                $disbursement = new Disbursement();
                                $disbursement->billId = $bill->id;
                                $disbursement->userId = $user->id;
                                $disbursement->value = $item[10];
                                $disbursement->save();
                                //table total
                                $total = new Total();
                                $total->billId = $bill->id;
                                $total->userId = $user->id;
                                $total->value = $item[11];
                                $total->save();
                            }
                        }
                        //Insert table invoice
                        $invoice = new Invoice();
                        $invoice->idBill = $bill->id;
                        $invoice->invoiceDay = $claimTaskDetail->billDate;
                        $invoice->save();
                        $result = array('Action' => 'BillClaim', 'Result' => 1);
                    }

                }
                else
                {
                    //Insert data to table Claim_task_detail(Docket)
                    $claimTaskDetail = new ClaimTaskDetail();
                    $claimTaskDetail->professionalServices = 2;
                    $claimTaskDetail->professionalServicesTime = 0;
                    $claimTaskDetail->professionalServicesNote = 'Final Billing';
                    $claimTaskDetail->billDate = $request->get('data')['toDate'];
                    $claimTaskDetail->active = 1;
                    $claimTaskDetail->statusId = 2;
                    $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                    $claimTaskDetail->userId = Auth::user()->id;
                    $claimTaskDetail->createdBy = Auth::user()->id;
                    $claimTaskDetail->save();
                    //Insert data to table Bill
                    $bill = new Bill();
                    $bill->billToId = $request->get('data')['billToCustomer'];
                    $bill->claimId = $request->get('data')['idClaim'];
                    $bill->billId = $claimTaskDetail->id;
                    $bill->total = $request->get('data')['Total'];
                    $bill->save();
                    //Insert data detail table
                    foreach ($request->get('data')['ArrayData'] as $item) {
                        $user = User::where('name', $item[0])->where('active', 1)->first();
                        if ($user) {
                            //table professional_services
                            $professionalServices = new ProfessionalService();
                            $professionalServices->billId = $bill->id;
                            $professionalServices->userId = $user->id;
                            $professionalServices->value = $item[4];
                            $professionalServices->save();
                            //table general exp
                            $generalExp = new GeneralExp();
                            $generalExp->billId = $bill->id;
                            $generalExp->userId = $user->id;
                            $generalExp->value = $item[5];
                            $generalExp->save();
                            //table commAndPhotoExp
                            $commAndPhotoExp = new CommPhotoExp();
                            $commAndPhotoExp->billId = $bill->id;
                            $commAndPhotoExp->userId = $user->id;
                            $commAndPhotoExp->value = $item[6];
                            $commAndPhotoExp->save();
                            //table consultFeeAndExp
                            $consultFeeAndExp = new ConsultFeesExp();
                            $consultFeeAndExp->billId = $bill->id;
                            $consultFeeAndExp->userId = $user->id;
                            $consultFeeAndExp->value = $item[7];
                            $consultFeeAndExp->save();
                            //table travelRelatedExp
                            $travelRelatedExp = new TravelRelatedExp();
                            $travelRelatedExp->billId = $bill->id;
                            $travelRelatedExp->userId = $user->id;
                            $travelRelatedExp->value = $item[8];
                            $travelRelatedExp->save();
                            //table gstFreeDisb
                            $gstFreeDisb = new GstFreeDisb();
                            $gstFreeDisb->billId = $bill->id;
                            $gstFreeDisb->userId = $user->id;
                            $gstFreeDisb->value = $item[9];
                            $gstFreeDisb->save();
                            //table disbursement
                            $disbursement = new Disbursement();
                            $disbursement->billId = $bill->id;
                            $disbursement->userId = $user->id;
                            $disbursement->value = $item[10];
                            $disbursement->save();
                            //table total
                            $total = new Total();
                            $total->billId = $bill->id;
                            $total->userId = $user->id;
                            $total->value = $item[11];
                            $total->save();
                        }
                    }
                    //Insert table invoice
                    $invoice = new Invoice();
                    $invoice->idBill = $bill->id;
                    $invoice->invoiceDay = $claimTaskDetail->billDate;
                    $invoice->save();
                    $result = array('Action' => 'BillClaim', 'Result' => 1);
                }
            } else {
                $bill = Bill::where('claimId', $request->get('data')['idClaim'])->first();
                if($bill)
                {
                    //update total of bill discount
                    $bill->total = $request->get('data')['TotalUpdateInvoice'];
                    $bill->save();
                    //update status complete
                    if($request->get('data')['billStatus']=='complete')
                    {
                        $task = ClaimTaskDetail::where('id',$bill->billId)->where('professionalServices',1)
                            ->where('statusId',1)->first();
                        if($task)
                        {
                            $task->statusId = 2;
                            $task->save();
                        }
                        //insert table invoice
                        $invoice = new Invoice();
                        $invoice->idBill = $bill->id;
                        $invoice->invoiceDay = $request->get('data')['toDate'];
                        $invoice->save();
                    }
                    $result = array('Action' => 'UpdateClaim', 'Result' => 1);
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getAllClaim()
    {
        return Claim::all();
    }

    public function getClaimByCode($code)
    {
        $claim = Claim::where('code', $code)->first();
        if ($claim) {
            return [
                'status' => 201,
                'data' => $claim
            ];
        }
        return [
            'status' => 301,
            'data' => null
        ];
    }

    public function getViewDocket()
    {
        return view('admin.docket');
    }

    public function viewBillOfClaimByStatus(Request $request)
    {
        $result = null;
        $professionalServices = null;
        $generalExp = null;
        if ($request->get('status') == "0") {
            //Show bill have status pending
            try {
                $bill = DB::table('claim_task_details')
                    ->leftJoin('bills', 'claim_task_details.id', '=', 'bills.billId')
                    ->leftJoin('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
                    ->where('claim_task_details.statusId', 1)
                    ->where('claim_task_details.professionalServices', 1)
                    ->select(
                        'bills.id as idBill',
                        'bills.billToId as customer',
                        'statuses.name as status',
                        'bills.total as total'
                    )->get();

                $result = $bill;
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            //Show bill have status all
            try {
                $bill = DB::table('claim_task_details')
                    ->Join('bills', 'claim_task_details.id', '=', 'bills.billId')
                    ->Join('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
                    ->select(
                        'bills.id as idBill',
                        'bills.billToId as customer',
                        'statuses.name as status',
                        'bills.total as total'
                    )->get();

                $result = $bill;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function loadInformationOfBill(Request $request)
    {
        //dd($request);
        $arrayAll = [];
        $arrayData = [];
        $total = null;
        $arrayDate = null;
        if ($request->get('idBill')) {
            try {
                $bill = Bill::where('id',$request->get('idBill'))->first();
                if($bill)
                {
                    //Take 1 row IB
                    $checkIBorFB = ClaimTaskDetail::where('id',$bill->billId)->first();
                    //Check IB have status pending or complete
                    if($checkIBorFB)
                    {
                        //IB in Pending
                        if($checkIBorFB->statusId==1)
                        {
                            array_push($arrayAll, "Pending");
                            //date
                            $checkIB = ClaimTaskDetail::where('professionalServices', 1)
                                ->where('claimId', $checkIBorFB->claimId)
//                                ->where('billDate', '<', date('Y-m-d'))
                                ->where('statusId', 2)
                                ->orderBy('billDate', 'desc')
                                ->first();
                            if($checkIB)
                            {
                                $arrayDate = array('FromDate'=>$checkIB->billDate,'ToDate'=>$checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                            }
                            else
                            {
                                $claim = Claim::where('id',$checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate'=>$claim->openDate,'ToDate'=>$checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                            }
                            $professionalServices = DB::table('professional_services')
                                ->leftJoin('users', 'professional_services.userId', '=', 'users.id')
                                ->where('professional_services.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'professional_services.value as value'
                                )->get();
                            array_push($arrayData, $professionalServices);
                            $generalExp = DB::table('general_exps')
                                ->leftJoin('users', 'general_exps.userId', '=', 'users.id')
                                ->where('general_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'general_exps.value as value'
                                )->get();
                            array_push($arrayData, $generalExp);
                            $comm_and_photo_exps = DB::table('comm_photo_exps')
                                ->leftJoin('users', 'comm_photo_exps.userId', '=', 'users.id')
                                ->where('comm_photo_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'comm_photo_exps.value as value'
                                )->get();
                            array_push($arrayData, $comm_and_photo_exps);
                            $consult_fees_and_exps = DB::table('consult_fees_exps')
                                ->leftJoin('users', 'consult_fees_exps.userId', '=', 'users.id')
                                ->where('consult_fees_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'consult_fees_exps.value as value'
                                )->get();
                            array_push($arrayData, $consult_fees_and_exps);
                            $travel_related_exps = DB::table('travel_related_exps')
                                ->leftJoin('users', 'travel_related_exps.userId', '=', 'users.id')
                                ->where('travel_related_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'travel_related_exps.value as value'
                                )->get();
                            array_push($arrayData, $travel_related_exps);
                            $g_st_free_disbs = DB::table('gst_free_disbs')
                                ->leftJoin('users', 'gst_free_disbs.userId', '=', 'users.id')
                                ->where('gst_free_disbs.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'gst_free_disbs.value as value'
                                )->get();
                            array_push($arrayData, $g_st_free_disbs);
                            $disbursements = DB::table('disbursements')
                                ->leftJoin('users', 'disbursements.userId', '=', 'users.id')
                                ->where('disbursements.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'disbursements.value as value'
                                )->get();
                            array_push($arrayData, $disbursements);
                            $total = DB::table('totals')
                                ->leftJoin('users', 'totals.userId', '=', 'users.id')
                                ->where('totals.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'totals.value as value'
                                )->get();
                            array_push($arrayData, $total);
                            array_push($arrayAll, $arrayData);
                        }
                        else
                        {
                            //IB Complete
                            array_push($arrayAll, "Complete");
                            $date = null;
                            //Find all IB have status is compete, to known value from date to date
                            $checkIBComplete = ClaimTaskDetail::where('statusId',2)
                                ->where('professionalServices',1)
                                ->Where('id','!=',$checkIBorFB->id)->orderBy('billDate', 'desc')->first();
                            if($checkIBComplete)
                            {
                                $arrayDate = array('FromDate'=>$checkIBComplete->billDate,'ToDate'=>$checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                                $date = $checkIBComplete->billDate;
                            }
                            else
                            {
                                $claim = Claim::where('id',$checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate'=>$claim->openDate,'ToDate'=>$checkIBorFB->billDate);
                                $date = $claim->openDate;
                                array_push($arrayAll, $arrayDate);
                            }
                            //Take data of user in bill follow form date to date
                            $listClaimTaskDetail = DB::table('claim_task_details')
                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                ->where('claim_task_details.professionalServices', '!=', 1)
                                ->where('claim_task_details.professionalServices', '!=', 2)
                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                ->where('claim_task_details.billDate','>',$date)
                                ->where('claim_task_details.billDate','<',$checkIBorFB->billDate)
                                ->groupBy('users.name')
                                ->select(
                                    'users.name as userName',
                                    'claim_task_details.professionalServices as cvChinh',
                                    'claim_task_details.expense as cvPhu',
                                    DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                    DB::raw('SUM(claim_task_details.expenseAmount) as expense'),
                                    'rate_details.value as rate',
                                    'rate_types.name as rateType'
                                )
                                ->get();
                            $collect = collect($listClaimTaskDetail);
                            $array_all = [];
                            foreach ($collect as $item) {
                                $array = [
                                    'Name' => $item->userName,
                                    'Rate' => $item->rate,
                                    'RateType' => $item->rateType,
                                    'SumTimeCVChinh' => $item->sumTimeCvChinh,
                                    'Expense' => $item->expense,
                                    'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate,
                                ];
                                array_push($array_all, $array);
                            }
                            array_push($arrayAll, $array_all);
                            //Take task exp of user in bill
                            $professionalServices = DB::table('professional_services')
                                ->leftJoin('users', 'professional_services.userId', '=', 'users.id')
                                ->where('professional_services.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'professional_services.value as value'
                                )->get();
                            array_push($arrayData, $professionalServices);
                            $generalExp = DB::table('general_exps')
                                ->leftJoin('users', 'general_exps.userId', '=', 'users.id')
                                ->where('general_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'general_exps.value as value'
                                )->get();
                            array_push($arrayData, $generalExp);
                            $comm_and_photo_exps = DB::table('comm_photo_exps')
                                ->leftJoin('users', 'comm_photo_exps.userId', '=', 'users.id')
                                ->where('comm_photo_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'comm_photo_exps.value as value'
                                )->get();
                            array_push($arrayData, $comm_and_photo_exps);
                            $consult_fees_and_exps = DB::table('consult_fees_exps')
                                ->leftJoin('users', 'consult_fees_exps.userId', '=', 'users.id')
                                ->where('consult_fees_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'consult_fees_exps.value as value'
                                )->get();
                            array_push($arrayData, $consult_fees_and_exps);
                            $travel_related_exps = DB::table('travel_related_exps')
                                ->leftJoin('users', 'travel_related_exps.userId', '=', 'users.id')
                                ->where('travel_related_exps.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'travel_related_exps.value as value'
                                )->get();
                            array_push($arrayData, $travel_related_exps);
                            $g_st_free_disbs = DB::table('gst_free_disbs')
                                ->leftJoin('users', 'gst_free_disbs.userId', '=', 'users.id')
                                ->where('gst_free_disbs.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'gst_free_disbs.value as value'
                                )->get();
                            array_push($arrayData, $g_st_free_disbs);
                            $disbursements = DB::table('disbursements')
                                ->leftJoin('users', 'disbursements.userId', '=', 'users.id')
                                ->where('disbursements.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'disbursements.value as value'
                                )->get();
                            array_push($arrayData, $disbursements);
                            $total = DB::table('totals')
                                ->leftJoin('users', 'totals.userId', '=', 'users.id')
                                ->where('totals.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'totals.value as value'
                                )->get();
                            array_push($arrayData, $total);
                            array_push($arrayAll, $arrayData);
                        }
                    }
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $arrayAll;
    }

    public function saveClaim(Request $request,$claimId)
    {
        if($claimId == '0'){
            //save new claim
            $claim = new Claim();
            $claim->code = $request->get('code');
            $claim->branchSeqNo = $request->get('branchSeqNo');
            $claim->incident = $request->get('incident');
            $claim->assignmentTypeCode = $request->get('assignmentTypeCode');
            $claim->accountCode = $request->get('accountCode');
            $claim->accountPolicyId = $request->get('accountPolicyId');
            $claim->insuredFirstName = $request->get('insuredFirstName');
            $claim->insuredLastName = $request->get('insuredLastName');
            $claim->insuredAddress = $request->get('insuredAddress');
            $claim->insuredClaim = $request->get('insuredClaim');
            $claim->tradingAs = $request->get('tradingAs');
            $claim->claimTypeCode = $request->get('claimTypeCode');
            $claim->lossDescCode = $request->get('lossDescCode');
            $claim->catastrophicLoss = $request->get('catastrophicLoss');
            $claim->sourceCode = $request->get('sourceCode');
            $claim->insurerCode = $request->get('insurerCode');
            $claim->brokerCode = $request->get('brokerCode');
            $claim->branchCode = $request->get('branchCode');
            $claim->branchTypeCode = $request->get('branchTypeCode');
            $claim->destroyedDate = $request->get('destroyedDate');
            $claim->lossLocation = $request->get('lossLocation');
            $claim->lineOfBusinessCode = $request->get('lineOfBusinessCode');
            $claim->lossDate = $request->get('lossDate');
            $claim->receiveDate = $request->get('receiveDate');
            $claim->openDate = $request->get('openDate');
            $claim->closeDate = $request->get('closeDate');
            $claim->insuredContactedDate = $request->get('insuredContactedDate');
            $claim->limitationDate = $request->get('limitationDate');
            $claim->policyInceptionDate = $request->get('policyInceptionDate');
            $claim->policyExpiryDate = $request->get('policyExpiryDate');
            $claim->disabilityCode = $request->get('disabilityCode');
            $claim->outComeCode = $request->get('outComeCode');
            $claim->lastChanged = $request->get('lastChanged');
            $claim->partnershipId = $request->get('partnershipId');
            $claim->adjusterCode = $request->get('adjusterCode');
            $claim->rate = $request->get('rate');
            $claim->feeType = $request->get('feeType');
            $claim->taxable = $request->get('taxable');
            $claim->estimatedClaimValue = $request->get('estimatedClaimValue');
            $claim->createdBy = $request->get('createdBy');
            $claim->updatedBy = $request->get('updatedBy');
            $claim->statusId = $request->get('statusId');
            $claim->privileged = $request->get('privileged');
            $claim->organization = $request->get('organization');
            $claim->operatedAs = $request->get('operatedAs');
            $claim->miscInfo = $request->get('miscInfo');
            $claim->largeLossClaim = $request->get('largeLossClaim');
            $claim->sirBreached = $request->get('sirBreached');
            $claim->claimAssignment = $request->get('claimAssignment');
            $claim->policy = $request->get('policy');
            $claim->reOpen = $request->get('reOpen');
            $claim->eBoxDestroyed = $request->get('eBoxDestroyed');
            $claim->firstContact = $request->get('firstContact');
            $claim->proscription = $request->get('proscription');
            $claim->initialReserve = $request->get('initialReserve');
            $claim->currentRes = $request->get('currentRes');
            $claim->adjustReserve = $request->get('adjustReserve');
            $claim->save();
            return $claim;
        }else{
            //update claim
            $claim = Claim::where('id',$claimId)->first();
            $claim->code = $request->get('code');
            $claim->branchSeqNo = $request->get('branchSeqNo');
            $claim->incident = $request->get('incident');
            $claim->assignmentTypeCode = $request->get('assignmentTypeCode');
            $claim->accountCode = $request->get('accountCode');
            $claim->accountPolicyId = $request->get('accountPolicyId');
            $claim->insuredFirstName = $request->get('insuredFirstName');
            $claim->insuredLastName = $request->get('insuredLastName');
            $claim->insuredAddress = $request->get('insuredAddress');
            $claim->insuredClaim = $request->get('insuredClaim');
            $claim->tradingAs = $request->get('tradingAs');
            $claim->claimTypeCode = $request->get('claimTypeCode');
            $claim->lossDescCode = $request->get('lossDescCode');
            $claim->catastrophicLoss = $request->get('catastrophicLoss');
            $claim->sourceCode = $request->get('sourceCode');
            $claim->insurerCode = $request->get('insurerCode');
            $claim->brokerCode = $request->get('brokerCode');
            $claim->branchCode = $request->get('branchCode');
            $claim->branchTypeCode = $request->get('branchTypeCode');
            $claim->destroyedDate = $request->get('destroyedDate');
            $claim->lossLocation = $request->get('lossLocation');
            $claim->lineOfBusinessCode = $request->get('lineOfBusinessCode');
            $claim->lossDate = $request->get('lossDate');
            $claim->receiveDate = $request->get('receiveDate');
            $claim->openDate = $request->get('openDate');
            $claim->closeDate = $request->get('closeDate');
            $claim->insuredContactedDate = $request->get('insuredContactedDate');
            $claim->limitationDate = $request->get('limitationDate');
            $claim->policyInceptionDate = $request->get('policyInceptionDate');
            $claim->policyExpiryDate = $request->get('policyExpiryDate');
            $claim->disabilityCode = $request->get('disabilityCode');
            $claim->outComeCode = $request->get('outComeCode');
            $claim->lastChanged = $request->get('lastChanged');
            $claim->partnershipId = $request->get('partnershipId');
            $claim->adjusterCode = $request->get('adjusterCode');
            $claim->rate = $request->get('rate');
            $claim->feeType = $request->get('feeType');
            $claim->taxable = $request->get('taxable');
            $claim->estimatedClaimValue = $request->get('estimatedClaimValue');
            $claim->createdBy = $request->get('createdBy');
            $claim->updatedBy = $request->get('updatedBy');
            $claim->statusId = $request->get('statusId');
            $claim->privileged = $request->get('privileged');
            $claim->organization = $request->get('organization');
            $claim->operatedAs = $request->get('operatedAs');
            $claim->miscInfo = $request->get('miscInfo');
            $claim->largeLossClaim = $request->get('largeLossClaim');
            $claim->sirBreached = $request->get('sirBreached');
            $claim->claimAssignment = $request->get('claimAssignment');
            $claim->policy = $request->get('policy');
            $claim->reOpen = $request->get('reOpen');
            $claim->eBoxDestroyed = $request->get('eBoxDestroyed');
            $claim->firstContact = $request->get('firstContact');
            $claim->proscription = $request->get('proscription');
            $claim->initialReserve = $request->get('initialReserve');
            $claim->currentRes = $request->get('currentRes');
            $claim->adjustReserve = $request->get('adjustReserve');
            $claim->save();
            return $claim;
        }
    }

    public function getAllSourceCode()
    {
        return SourceCustomer::all();
    }

    public function getAllClaimType()
    {
        return InsuranceDetail::all();
    }

    public function loadTaskDetailByDate(Request $request)
    {
        //dd($request->all());
        $result = null;
        $claim = null;
        $billToId = null;
        $billTotal = null;
        $check = null;
        try {
            if ($request->get('key') != null)
            {
                $claim = Claim::where('code', $request->get('key'))->where('statusId', 1)->first();
                if ($claim)
                {
                    $checkIBStatusComplete = ClaimTaskDetail::where('professionalServices', 1)
                        ->where('claimId', $claim->id)
//                        ->where('billDate', '<', date('Y-m-d'))
                        ->where('statusId', 2)
                        ->orderBy('billDate', 'desc')
                        ->first();
                    if ($checkIBStatusComplete) {
                        $check = $checkIBStatusComplete->billDate;
                    }

                    //load data
                    $query = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                        ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
                        ->where('claim_task_details.claimId', '=', $claim->id)
                        ->groupBy('users.name')
                        ->select(
                            'users.name as userName',
                            'claim_task_details.professionalServices as cvChinh',
                            'claim_task_details.expense as cvPhu',
                            DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                            DB::raw('SUM(claim_task_details.expenseAmount) as expense'),
                            'rate_details.value as rate',
                            'rate_types.name as rateType'
                        );
                    if($check==null)
                    {
                        $query->where('claim_task_details.billDate','<',$request->get('date'));
                    }
                    else
                    {
                        $query->where('claim_task_details.billDate','<',$request->get('date'))->where('claim_task_details.billDate','>',$check);
                    }
                    $listClaimTaskDetail = $query->get();
                    $collect = collect($listClaimTaskDetail);
                    $array_all = [];
                    foreach ($collect as $item) {
                        $array = [
                            'Name' => $item->userName,
                            'Rate' => $item->rate,
                            'RateType' => $item->rateType,
                            'SumTimeCVChinh' => $item->sumTimeCvChinh,
                            'Expense' => $item->expense,
                            'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate
                        ];
                        array_push($array_all, $array);
                    }
//                    dd($array_all);
                    $result = array('Claim' => $claim, 'check' => $check, 'customer' => $billToId, 'total' => $billTotal, 'listClaimTaskDetail' => $array_all);

                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function loadInvoiceByEventEnterKey(Request $request)
    {
        $resultArray = [];
        try{
            $query1 = DB::table('invoices')
                    ->join('bills','invoices.idBill','=','bills.id')
                    ->join('claim_task_details','bills.billId','=','claim_task_details.id')
                    ->join('task_categories','claim_task_details.professionalServices','=','task_categories.id')
                    ->join('claims','claim_task_details.claimId','=','claims.id')
                    ->where('invoices.idBill',$request->get('key'))
                    ->select(
                        'invoices.invoiceDay as invoiceDay',
                        'bills.billToId as billTo',
                        'task_categories.code as typeInvoice',
                        'claims.code as Claim',
                        'claims.organization as organization',
                        'claims.adjusterCode as adjusterId',
                        'claims.insuredFirstName as insuredFirstName',
                        'claims.insuredLastName as insuredLastName',
                        'claims.lossDate as lossDate',
                        'claims.branchCode as branchId',
                        'claims.policy as policy'
                    )->get();
                    array_push($resultArray,$query1);
            $professionalService = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('professional_services','bills.id','=','professional_services.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(professional_services.value) as professionalServices')
                )->get();
            array_push($resultArray,$professionalService);
            $generalExp = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('general_exps','bills.id','=','general_exps.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(general_exps.value) as generalExp')
                )->get();
            array_push($resultArray,$generalExp);

            $commPhotoExp = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('comm_photo_exps','bills.id','=','comm_photo_exps.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(comm_photo_exps.value) as commPhotoExp')
                )->get();
            array_push($resultArray,$commPhotoExp);

            $consultFeesExp = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('consult_fees_exps','bills.id','=','consult_fees_exps.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(consult_fees_exps.value) as consultFeesExp')
                )->get();
            array_push($resultArray,$consultFeesExp);

            $travelRelatedExp = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('travel_related_exps','bills.id','=','travel_related_exps.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(travel_related_exps.value) as travelRelatedExp')
                )->get();
            array_push($resultArray,$travelRelatedExp);

            $gstFreeDisb = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('gst_free_disbs','bills.id','=','gst_free_disbs.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(gst_free_disbs.value) as gstFreeDisb')
                )->get();
            array_push($resultArray,$gstFreeDisb);

            $disbursement = DB::table('invoices')
                ->Join('bills','invoices.idBill','=','bills.id')
                ->Join('disbursements','bills.id','=','disbursements.billId')
                ->where('invoices.idBill',$request->get('key'))
                ->select(
                    DB::raw('SUM(disbursements.value) as $disbursement')
                )->get();
            array_push($resultArray,$disbursement);

        }

        catch(Exception $ex)
        {
            return $ex;
        }
        return $resultArray;

    }

}