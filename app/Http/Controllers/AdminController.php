<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Branch;
use App\BranchType;
use App\Broker;
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
use App\TaskCategory;
use App\Total;
use App\TravelRelatedExp;
use App\TypeOfDamage;
use App\User;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Http\Request;
use App\ExtendOfDamage;
use Mockery\Exception;
use Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function getViewClaim()
    {
        $codeID = null;
        $branchType = BranchType::where('active', 1)->get();
        $sourceCustomer = SourceCustomer::where('active', 1)->get();
        $code = Claim::orderBy('code', 'desc')->first();
        if ($code != null) {
            $codeID = $code->code;
        }

        return view('admin.claim')->with('branchType', $branchType)->with('sourceCustomer', $sourceCustomer)->with('codeClaim', $codeID);
    }

    public function getViewEmployee()
    {
        $position = Position::where('active', 1)->get();
        $listUser = User::where('active', 1)->get();
        return view('admin.employee')->with('position', $position)->with('listUser', $listUser);
    }

    public function getViewTrialFee()
    {
        $invoiceMajorNo = null;
        $listCustomer = Customer::where('active', 1)->get();
        $claimIB = Claim::where('statusId', 4)->get();
        $invoice = Invoice::orderBy('invoiceMajorNo', 'desc')->first();
        if ($invoice != null) {
            $invoiceMajorNo = $invoice->invoiceMajorNo + 1;
        } else {
            $invoiceMajorNo = 2700;
        }
        return view('admin.trialFee')->with('listCustomer', $listCustomer)->with('claimIB', $claimIB)->with('invoiceMajorNo', $invoiceMajorNo);
    }

    public function getViewInvoice()
    {
        $query = DB::table('invoices')
            ->join('bills', 'invoices.idBill', '=', 'bills.id')
            ->join('claims', 'bills.claimId', '=', 'claims.id')
            ->select(
                'invoices.invoiceMajorNo as invoice',
                'invoices.invoiceDay as invoiceDay',
                'bills.billToId as billTo',
                'bills.total as total',
                'claims.code as claimCode'
            )->get();
        return view('admin.invoice')->with('query', $query);
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
                $employee->password = encrypt($request->get('dataEmployee')['Password'], Config::get('app.key'));
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
                $employee->userID_changed = Auth::user()->id;
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
                    $employee = User::where('id', $request->get('dataEmployee')['Id'])->first();
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
                    ->first();
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
                $user = User::where('active', 1)->where('name', $request->get('key'))->first();
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
        $policy = null;
        $officer = null;
        $billTotal = null;
        $date = null;
        try {
            if ($request->get('key') != null) {
                $claim = Claim::where('code', $request->get('key'))->first();
                if ($claim) {
                    $billToId = $claim->insurerCode;
                    $policy = $claim->policy;
                    $officer = $claim->contact;
                    //Check from date to date
                    $checkIBAndFB = ClaimTaskDetail::where('statusId','>',1)
                        ->where('claimId', $claim->id)
                        ->orderBy('billDate', 'desc')
                        ->first();
                    if ($checkIBAndFB) {
                        $date = $checkIBAndFB->billDate;
                    } else {
                        $date = $claim->openDate;
                    }
                    //load data
                    if ($date) {
//                        $listClaimTaskDetail = DB::table('claim_task_details')
//                            ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
//                            ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
//                            ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
//                            ->leftJoin('task_categories','claim_task_details.expense','=','task_categories.id')
//                            ->where('claim_task_details.professionalServices', '!=', 1)
//                            ->where('claim_task_details.professionalServices', '!=', 2)
//                            ->where('claim_task_details.claimId', '=', $claim->id)
//                            ->where('claim_task_details.billDate','>',$date)
//                            ->groupBy('users.name')
//                            ->select(
//                                'users.name as userName',
//                                'claim_task_details.professionalServices as cvChinh',
//                                'claim_task_details.expense as cvPhu',
//                                DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
//                                DB::raw('SUM(claim_task_details.expenseAmount) as expense'),
//                                DB::raw('SUM(claim_task_details.professionalServicesAmount) as ProfessionalServices'),
//                                'rate_details.value as rate',
//                                'rate_types.name as rateType',
//                                'task_categories.name as taskCategory'
//                            )
//                            ->get();
//                        $collect = collect($listClaimTaskDetail);
//                        $array_all = [];
//                        foreach ($collect as $item) {
//                            $array = [
//                                'cvPhu'=>$item->cvPhu,
//                                'Name' => $item->userName,
//                                'Rate' => $item->rate,
//                                'RateType' => $item->rateType,
//                                'SumTimeCVChinh' => $item->sumTimeCvChinh,
//                                'Expense' => $item->expense,
//                                'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate ,
//                                'TaskCategory'=>$item->taskCategory
//                            ];
//                            array_push($array_all, $array);
//                        }

                        $listTime = DB::table('claim_task_details')
                            ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                            ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                            ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                            ->where('claim_task_details.invoiceMajorNo', '=', null)
                            ->where('claim_task_details.professionalServices', '!=', 1)
                            ->where('claim_task_details.professionalServices', '!=', 2)
                            ->where('claim_task_details.claimId', '=', $claim->id)
                            ->where('claim_task_details.statusId', 0)
                            ->where('claim_task_details.claimId', $claim->id)
                            ->groupBy('users.name')
                            ->select(
                                'users.name as userName',
                                'claim_task_details.professionalServices as cvChinh',
                                DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                'rate_details.value as rate',
                                'rate_types.name as rateType'
                            )
                            ->get();
                        $collect = collect($listTime);
                        $arrayListTime = [];
                        foreach ($collect as $item) {
                            $array = [
                                'Name' => $item->userName,
                                'Rate' => $item->rate,
                                'RateType' => $item->rateType,
                                'SumTimeCVChinh' => $item->sumTimeCvChinh,
                                'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate,
                            ];
                            array_push($arrayListTime, $array);
                        }
                        $listExpense = DB::table('claim_task_details')
                            ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                            ->leftJoin('task_categories', 'claim_task_details.expense', '=', 'task_categories.id')
                            ->where('claim_task_details.invoiceMajorNo', '=', null)
                            ->where('claim_task_details.professionalServices', '!=', 1)
                            ->where('claim_task_details.professionalServices', '!=', 2)
                            ->where('claim_task_details.expense', '!=', 0)
                            ->where('claim_task_details.claimId', '=', $claim->id)
                            ->where('claim_task_details.statusId', 0)
                            ->groupBy('users.name')
//                            ->groupBy('claim_task_details.expense')
                            ->groupBy('task_categories.name')
                            ->select(
                                'users.name as Name',
                                DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
                                //'claim_task_details.expenseAmount as expenseAmount',
                                'task_categories.name as taskCategory'
                            )
                            ->get();
//                        dd($listExpense);
                        $arrayAll = [];
                        //$arrayTaskExpense = array("GeneralExp","CommPhotoExp","ConsultFeesExp","TravelRelatedExp","GstFreeDisb","Disbursements");
                        foreach ($arrayListTime as $item) {
                            //dd($item["Name"]);
                            $arrayExpense = [];
                            foreach ($listExpense as $expense) {
                                if ($item["Name"] == $expense->Name) {
                                    array_push($arrayExpense, $expense);
                                }
                            }
                            $arrayA = [
                                "Time" => $item,
                                "Expense" => $arrayExpense
                            ];
                            array_push($arrayAll, $arrayA);
                        }
                        $result = array('Claim' => $claim, 'check' => $date, 'customer' => $billToId, 'policy' => $policy, 'officer' => $officer, 'listClaimTaskDetail' => $arrayAll);
                    }
                } else {
                    $result = "Error";
                }
            }
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

    public function getAllClaim()
    {
        return Claim::orderBy('code', 'desc')->get();
    }

    public function getClaimByCode($code)
    {
        $claim = Claim::where('code', $code)->first();
        if ($claim) {
            $userCreatedBy = User::where('roleId', 1)->where('id', $claim->createdBy)->first()->name;
            $userUpdatedBy = User::where('roleId', 1)->where('id', $claim->updatedBy)->first()->name;
            return [
                'status' => 201,
                'data' => $claim,
                'userCreatedBy' => $userCreatedBy,
                'userUpdatedBy' => $userUpdatedBy
            ];
        }
        return [
            'status' => 301,
            'data' => null
        ];
    }

    public function getViewDocket()
    {
        $listUser = DB::table('users')
            ->join('rate_details', 'users.id', '=', 'rate_details.userId')
            ->select(
                'users.id as id',
                'users.name as name',
                'users.firstName as firstName',
                'users.lastName as lastName',
                'users.sex as sex',
                'users.email as email',
                'users.phone as phone',
                'users.address as address',
                'rate_details.value as rate'
            )
            ->get();
        return view('admin.docket')->with('listUser', $listUser);
    }

    public function viewBillOfClaimByStatus(Request $request)
    {
//        dd($request->all());
        $data = null;
        //Show bill have status all
        try {
            $bill = DB::table('claim_task_details')
                ->join('bills', 'claim_task_details.id', '=', 'bills.billId')
                ->join('invoices', 'bills.id', '=', 'invoices.idBill')
                ->join('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
                ->join('task_categories','claim_task_details.professionalServices','=','task_categories.id')
                ->where('claim_task_details.claimId', $request->get('idClaim'))
                ->select(
                    'invoices.invoiceMajorNo as majorNo',
                    'invoices.invoiceTempNo as tempNo',
                    'bills.id as idBill',
                    'bills.billToId as customer',
                    'statuses.name as status',
                    'bills.total as total',
                    'task_categories.description as type'
                )->get();

            $data = $bill;
        } catch (Exception $ex) {
            return $ex;
        }

        return view('admin.viewBillOfClaimByStatus')->with('data', $data);
    }

    public function loadInformationOfBill(Request $request)
    {
        //dd($request->all());
        $arrayAll = [];
        $arrayData = [];
        $total = null;
        $arrayDate = null;
        // $createdDate = null;
        if ($request->get('idBill')) {
            try {
                $bill = Bill::where('id', $request->get('idBill'))->first();
                if ($bill) {
                    //Take 1 row IB
                    $checkIBorFB = ClaimTaskDetail::where('id', $bill->billId)->first();
                    //Check IB have status pending or complete
                    if ($checkIBorFB) {
                        //IB in Pending
                        if ($checkIBorFB->statusId == 1) {
                            array_push($arrayAll, "IBPending");
                            //date
                            $date = null;
                            $checkIB = ClaimTaskDetail::where('claimId', $checkIBorFB->claimId)
                                ->where('statusId', 2)
                                ->where('billDate', '<', $checkIBorFB->billDate)
                                ->orderBy('billDate', 'desc')
                                ->first();
                            if ($checkIB) {
                                $arrayDate = array('FromDate' => $checkIB->billDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                                $date = $checkIB->billDate;
                                //$createdDate  = $checkIB->created_at;

                            } else {
                                $claim = Claim::where('id', $checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate' => $claim->openDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                                $date = $claim->openDate;
                            }
                            //listTime
                            $listTime = null;
                            $listTime = DB::table('claim_task_details')
                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                ->where('claim_task_details.professionalServices', '!=', 1)
                                ->where('claim_task_details.professionalServices', '!=', 2)
                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                ->where('claim_task_details.invoiceTempNo', $checkIBorFB->invoiceTempNo)
                                ->groupBy('users.name')
                                ->select(
                                    'users.name as userName',
                                    'claim_task_details.professionalServices as cvChinh',
                                    DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                    'rate_details.value as rate',
                                    'rate_types.name as rateType'
                                )
                                ->get();
                            if ($listTime == null) {
                                $listTime = DB::table('claim_task_details')
                                    ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                    ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                    ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                    ->where('claim_task_details.professionalServices', '!=', 1)
                                    ->where('claim_task_details.professionalServices', '!=', 2)
                                    ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                    ->where('claim_task_details.invoiceTempNoBeforeOverRide', $checkIBorFB->invoiceTempNo)
                                    ->groupBy('users.name')
                                    ->select(
                                        'users.name as userName',
                                        'claim_task_details.professionalServices as cvChinh',
                                        DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                        'rate_details.value as rate',
                                        'rate_types.name as rateType'
                                    )
                                    ->get();
                            }
                            array_push($arrayAll, $listTime);
                            //list expense
                            $professionalServices = DB::table('professional_services')
                                ->leftJoin('users', 'professional_services.userId', '=', 'users.id')
                                ->where('professional_services.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'professional_services.value as value',
                                    'professional_services.rateChange as rate'
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
                            //get total of bill
                            array_push($arrayAll, $bill->total);
                            //get coorInsurer
                            array_push($arrayAll, $bill->claimOfficer);
                            array_push($arrayAll, $bill->policyNumber);
                            array_push($arrayAll, $bill->percentage);
                            array_push($arrayAll, $bill->professionalServices);
                        } else {
                            //IB Complete
                            switch($checkIBorFB->statusId)
                            {
                                case 2:
                                    array_push($arrayAll, "IBComplete");
                                    break;
                                case 3:
                                    array_push($arrayAll, "FBPending");
                                    break;
                                case 4:
                                    array_push($arrayAll, "FBComplete");
                                    break;
                            }
                            //Find all IB have status is compete, to known value from date to date
                            $checkIBComplete = ClaimTaskDetail::where('statusId', '>',1)
                                ->where('claimId', $bill->claimId)
                                ->where('billDate', '<', $checkIBorFB->billDate)
                                ->Where('id', '!=', $checkIBorFB->id)
                                ->orderBy('billDate', 'desc')
                                ->first();
                            if ($checkIBComplete) {
                                $arrayDate = array('FromDate' => $checkIBComplete->billDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                            } else {
                                $claim = Claim::where('id', $checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate' => $claim->openDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                            }
                            //Take data of user in bill follow form date to date
//                            if($createdDate)
//                            {
//
//                            }
                            $listTime = DB::table('claim_task_details')
                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                ->where('claim_task_details.professionalServices', '!=', 1)
                                ->where('claim_task_details.professionalServices', '!=', 2)
                                ->where('claim_task_details.active', '=', 1)
                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                ->where('claim_task_details.invoiceMajorNo', $checkIBorFB->invoiceMajorNo)
                                //->where('claim_task_details.billDate', '>', $date)
                                //->Where('claim_task_details.created_at','>',$createdDate)
                                //->where('claim_task_details.billDate', '<', $checkIBorFB->billDate)
                                ->groupBy('users.name')
                                ->select(
                                    'users.name as userName',
                                    'claim_task_details.professionalServices as cvChinh',
                                    DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                                    'rate_details.value as rate',
                                    'rate_types.name as rateType'
                                )
                                ->get();
                            array_push($arrayAll, $listTime);
//                            else
//                            {
//                                $listTime = DB::table('claim_task_details')
//                                    ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
//                                    ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
//                                    ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
//                                    ->where('claim_task_details.professionalServices', '!=', 1)
//                                    ->where('claim_task_details.professionalServices', '!=', 2)
//                                    ->where('claim_task_details.active', '=', 1)
//                                    ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
//                                    ->where('claim_task_details.billDate', '>', $date)
//                                    ->where('claim_task_details.created_at','<',$checkIBorFB->created_at)
//                                    ->where('claim_task_details.billDate', '<', $checkIBorFB->billDate)
//                                    ->groupBy('users.name')
//                                    ->select(
//                                        'users.name as userName',
//                                        'claim_task_details.professionalServices as cvChinh',
//                                        DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
//                                        'rate_details.value as rate',
//                                        'rate_types.name as rateType'
//                                    )
//                                    ->get();
//                                array_push($arrayAll, $listTime);
//                            }


//                            $listExpense = DB::table('claim_task_details')
//                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
//                                ->leftJoin('task_categories', 'claim_task_details.expense', '=', 'task_categories.id')
//                                ->where('claim_task_details.professionalServices', '!=', 1)
//                                ->where('claim_task_details.professionalServices', '!=', 2)
//                                ->where('claim_task_details.expense', '!=', 0)
//                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
//                                ->where('claim_task_details.billDate', '>', $date)
//                                ->where('claim_task_details.billDate', '<', $checkIBorFB->billDate)
//                                ->groupBy('users.name')
//                                ->groupBy('claim_task_details.expense')
//                                ->select(
//                                    'users.name as Name',
//                                    DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                                    //'claim_task_details.expenseAmount as expenseAmount',
//                                    'task_categories.name as taskCategory'
//                                )
//                                ->get();
//
//                            //$arrayTaskExpense = array("GeneralExp","CommPhotoExp","ConsultFeesExp","TravelRelatedExp","GstFreeDisb","Disbursements");
//                            foreach($arrayListTime as $item)
//                            {
//                                //dd($item["Name"]);
//                                $arrayExpense = [];
//                                foreach($listExpense as $expense)
//                                {
//                                    if($item["Name"] == $expense->Name)
//                                    {
//                                        array_push($arrayExpense,$expense);
//                                    }
//                                }
//                                $arrayA  = [
//                                    "Time"=>$item,
//                                    "Expense"=>$arrayExpense
//                                ];
//                                array_push($arrayAll,$arrayA);
//                            }

                            //Take task exp of user in bill
                            $professionalServices = DB::table('professional_services')
                                ->leftJoin('users', 'professional_services.userId', '=', 'users.id')
                                ->where('professional_services.billId', $request->get('idBill'))
                                ->select(
                                    'users.name as name',
                                    'professional_services.value as value',
                                    'professional_services.rateChange as rate'
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
                            //get total of bill
                            array_push($arrayAll, $bill->total);
                            //get coorInsurer
                            array_push($arrayAll, $bill->claimOfficer);
                            array_push($arrayAll, $bill->policyNumber);
                            array_push($arrayAll, $bill->percentage);
                            array_push($arrayAll, $bill->professionalServices);

                        }
                    }
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }

        return $arrayAll;
    }

    public function saveClaim(Request $request, $claimId)
    {
        //dd($claimId);
        $result = null;
        $checkErrorClaimSame = null;
        if ($this->validatorAdmin($request->get('claim'), "createClaim")->fails()) {
            return "Error Validator";
        } else {
            if ($claimId == '0') {
                //format date
                $timeLossDateNow = Carbon::now();
                //$lossDateFR = $request->get("claim")['lossDate'] . " " . $timeLossDateNow->hour . ":" . $timeLossDateNow->minute . ":" . $timeLossDateNow->second;
                $lossDateFR = $request->get("claim")['lossDate'] . " " ."00" . ":" . "00" . ":" . "00";

                $timeReceiveDateNow = Carbon::now();
                //$receiveDateFR = $request->get("claim")['receiveDate'] . " " . $timeReceiveDateNow->hour . ":" . $timeReceiveDateNow->minute . ":" . $timeReceiveDateNow->second;
                $receiveDateFR = $request->get("claim")['receiveDate'] . " " . "00" . ":" . "00" . ":" . "00";

                $openDateFR = $request->get("claim")['openDate'] . " " . "00" . ":" . "00" . ":" . "00";
                //check claimId the same
                $checkClaim = Claim::where('code', $request->get("claim")['code'])->first();
                if ($checkClaim != null) {
                    $checkErrorClaimSame = "True";
                } else {
                    $checkErrorClaimSame = "False";
                }

                if ($lossDateFR > $receiveDateFR)
                {
                    $result = array('Action' => 'AddNew', 'Error' => 'LossDate>ReceiveDate');
                }
                else if ($lossDateFR > $openDateFR)
                {
                    $result = array('Action' => 'AddNew', 'Error' => 'LossDate>OpenDate');
                }
                else if ($checkErrorClaimSame == "True")
                {
                    $result = array('Action' => 'AddNew', 'Error' => 'TheSameCodeClaim');
                } else
                {
                    //save new claim
                    $claim = new Claim();
                    $claim->code = $request->get("claim")['code'];
                    $claim->branchSeqNo = $request->get("claim")['branchSeqNo'];
                    $claim->incident = $request->get("claim")['incident'];
                    $claim->accountCode = $request->get("claim")['accountCode'];
                    $claim->insuredFirstName = $request->get("claim")['insuredFirstName'];
                    $claim->insuredLastName = $request->get("claim")['insuredLastName'];
                    $claim->insuredAddress = $request->get("claim")['insuredAddress'];
                    $claim->insuredClaim = $request->get("claim")['insuredClaim'];
                    $claim->claimTypeCode = $request->get("claim")['claimTypeCode'];
                    $claim->lossDescCode = $request->get("claim")['lossDescCode'];
                    $claim->catastrophicLoss = $request->get("claim")['catastrophicLoss'];
                    $claim->sourceCode = $request->get("claim")['sourceCode'];
                    $claim->insurerCode = $request->get("claim")['insurerCode'];
                    $claim->brokerCode = $request->get("claim")['brokerCode'];
                    $claim->branchCode = $request->get("claim")['branchCode'];
                    $claim->lossLocation = $request->get("claim")['lossLocation'];
                    $claim->lineOfBusinessCode = $request->get("claim")['lineOfBusinessCode'];
                    $claim->lossDate = $lossDateFR;
                    $claim->receiveDate = $receiveDateFR;
                    $claim->openDate = $openDateFR;
                    $claim->partnershipId = $request->get("claim")['partnershipId'];
                    $claim->adjusterCode = $request->get("claim")['adjusterCode'];
                    $claim->rate = $request->get("claim")['rate'];
                    $claim->taxable = $request->get("claim")['taxable'];
                    $claim->estimatedClaimValue = $request->get("claim")['estimatedClaimValue'];
                    $claim->createdBy = Auth::user()->id;
                    $claim->updatedBy = Auth::user()->id;
                    $claim->statusId = 0;
                    $claim->privileged = $request->get("claim")['privileged'];
                    $claim->organization = $request->get("claim")['organization'];
                    $claim->operatedAs = $request->get("claim")['operatedAs'];
                    $claim->miscInfo = $request->get("claim")['miscInfo'];
                    $claim->largeLossClaim = $request->get("claim")['largeLossClaim'];
                    $claim->sirBreached = $request->get("claim")['sirBreached'];
                    $claim->claimAssignment = $request->get("claim")['claimAssignment'];
                    $claim->policy = $request->get("claim")['policy'];

                    $timeFirstContactNow = Carbon::now();
                    if ($request->get("claim")['firstContact'] != null) {
                        $claim->firstContact = $request->get("claim")['firstContact'] . " " . $timeFirstContactNow->hour . ":" . $timeFirstContactNow->minute . ":" . $timeFirstContactNow->second;
                    }

                    $claim->contact = $request->get("claim")['contact'];

                    $timeProscriptionNow = Carbon::now();
                    if ($request->get("claim")['proscription'] != null) {
                        $claim->proscription = $request->get("claim")['proscription'] . " " . $timeProscriptionNow->hour . ":" . $timeProscriptionNow->minute . ":" . $timeProscriptionNow->second;
                    }

                    $timePolicyInceptionDateNow = Carbon::now();
                    if ($request->get("claim")['policyInceptionDate'] != null) {
                        $claim->policyInceptionDate = $request->get("claim")['policyInceptionDate'] . " " . $timePolicyInceptionDateNow->hour . ":" . $timePolicyInceptionDateNow->minute . ":" . $timePolicyInceptionDateNow->second;
                    }

                    $timePolicyExpiryDateNow = Carbon::now();
                    if ($request->get("claim")['policyExpiryDate']) {
                        $claim->policyExpiryDate = $request->get("claim")['policyExpiryDate'] . " " . $timePolicyExpiryDateNow->hour . ":" . $timePolicyExpiryDateNow->minute . ":" . $timePolicyExpiryDateNow->second;
                    }
                    $claim->save();
                    $result = array('Action' => 'AddNew', 'Claim' => $claim, 'Error' => 'Null');
                }
            } else {
                //update claim
                $claim = Claim::where('id', $claimId)->first();
                $countErrorOpenDate = 0;
                $countErrorReceiveDate = 0;

                $timeLossDateNow = Carbon::now();
                //$lossDateFR = $request->get("claim")['lossDate'] . " " . $timeLossDateNow->hour . ":" . $timeLossDateNow->minute . ":" . $timeLossDateNow->second;
                $lossDateFR = $request->get("claim")['lossDate'] . " " ."00" . ":" . "00" . ":" . "00";

                $timeReceiveDateNow = Carbon::now();
                //$receiveDateFR = $request->get("claim")['receiveDate'] . " " . $timeReceiveDateNow->hour . ":" . $timeReceiveDateNow->minute . ":" . $timeReceiveDateNow->second;
                $receiveDateFR = $request->get("claim")['receiveDate'] . " " . "00" . ":" . "00" . ":" . "00";

                $openDateFR = $request->get("claim")['openDate'] . " " . "00" . ":" . "00" . ":" . "00";

                //Check fix openDate
                if ($claim) {
                    $taskList = ClaimTaskDetail::where('claimId', $claim->id)->orderBy('billDate', 'desc')->get();
                    if ($taskList) {
                        foreach ($taskList as $item) {
                            if ($openDateFR > $item->billDate) {
                                $countErrorOpenDate++;
                            }
                            if ($receiveDateFR > $item->billDate) {
                                $countErrorReceiveDate++;
                            }
                        }
                    }
                }

                //Check
                if ($lossDateFR > $receiveDateFR)
                {
                    $result = array('Action' => 'Update', 'Error' => 'LossDate>ReceiveDate');
                }
                else if ($lossDateFR > $openDateFR)
                {
                    $result = array('Action' => 'Update', 'Error' => 'LossDate>OpenDate');
                }
                else if ($countErrorOpenDate > 0)
                {
                    $result = array('Action' => 'Update', 'Error' => 'CantUpdateOpenDate');
                }
                else if ($countErrorReceiveDate > 0)
                {
                    $result = array('Action' => 'Update', 'Error' => 'CantUpdateReceiveDate');
                } else
                {
                    if ($claim) {
                        $claim->code = $request->get("claim")['code'];
                        $claim->branchSeqNo = $request->get("claim")['branchSeqNo'];
                        $claim->incident = $request->get("claim")['incident'];
                        $claim->accountCode = $request->get("claim")['accountCode'];
                        $claim->insuredFirstName = $request->get("claim")['insuredFirstName'];
                        $claim->insuredLastName = $request->get("claim")['insuredLastName'];
                        $claim->insuredAddress = $request->get("claim")['insuredAddress'];
                        $claim->insuredClaim = $request->get("claim")['insuredClaim'];
                        $claim->claimTypeCode = $request->get("claim")['claimTypeCode'];
                        $claim->lossDescCode = $request->get("claim")['lossDescCode'];
                        $claim->catastrophicLoss = $request->get("claim")['catastrophicLoss'];
                        $claim->sourceCode = $request->get("claim")['sourceCode'];
                        $claim->openDate = $openDateFR;
                        $claim->receiveDate = $receiveDateFR;
                        $claim->lossDate = $lossDateFR;

                        $timeFirstContactNow = Carbon::now();
                        if ($request->get("claim")['firstContact'] != null) {
                            $claim->firstContact = $request->get("claim")['firstContact'] . " " . $timeFirstContactNow->hour . ":" . $timeFirstContactNow->minute . ":" . $timeFirstContactNow->second;
                        }

                        $timeProscriptionNow = Carbon::now();
                        if ($request->get("claim")['proscription'] != null) {
                            $claim->proscription = $request->get("claim")['proscription'] . " " . $timeProscriptionNow->hour . ":" . $timeProscriptionNow->minute . ":" . $timeProscriptionNow->second;
                        }

                        $timePolicyInceptionDateNow = Carbon::now();
                        if ($request->get("claim")['policyInceptionDate'] != null) {
                            $claim->policyInceptionDate = $request->get("claim")['policyInceptionDate'] . " " . $timePolicyInceptionDateNow->hour . ":" . $timePolicyInceptionDateNow->minute . ":" . $timePolicyInceptionDateNow->second;
                        }

                        $timePolicyExpiryDateNow = Carbon::now();
                        if ($request->get("claim")['policyExpiryDate'] != null) {
                            $claim->policyExpiryDate = $request->get("claim")['policyExpiryDate'] . " " . $timePolicyExpiryDateNow->hour . ":" . $timePolicyExpiryDateNow->minute . ":" . $timePolicyExpiryDateNow->second;
                        }
                        $claim->insurerCode = $request->get("claim")['insurerCode'];
                        $claim->brokerCode = $request->get("claim")['brokerCode'];
                        $claim->branchCode = $request->get("claim")['branchCode'];
                        $claim->lossLocation = $request->get("claim")['lossLocation'];
                        $claim->lineOfBusinessCode = $request->get("claim")['lineOfBusinessCode'];
                        $claim->partnershipId = $request->get("claim")['partnershipId'];
                        $claim->adjusterCode = $request->get("claim")['adjusterCode'];
                        $claim->rate = $request->get("claim")['rate'];
                        $claim->taxable = $request->get("claim")['taxable'];
                        $claim->estimatedClaimValue = $request->get("claim")['estimatedClaimValue'];
                        $claim->updatedBy = Auth::user()->id;
                        $claim->privileged = $request->get("claim")['privileged'];
                        $claim->organization = $request->get("claim")['organization'];
                        $claim->operatedAs = $request->get("claim")['operatedAs'];
                        $claim->miscInfo = $request->get("claim")['miscInfo'];
                        $claim->largeLossClaim = $request->get("claim")['largeLossClaim'];
                        $claim->sirBreached = $request->get("claim")['sirBreached'];
                        $claim->claimAssignment = $request->get("claim")['claimAssignment'];
                        $claim->policy = $request->get("claim")['policy'];

                        $timePolicyInceptionDateNow = Carbon::now();
                        $claim->policyInceptionDate = $request->get("claim")['policyInceptionDate'] . " " . $timePolicyInceptionDateNow->hour . ":" . $timePolicyInceptionDateNow->minute . ":" . $timePolicyInceptionDateNow->second;

                        $timePolicyExpiryDateNow = Carbon::now();
                        $claim->policyExpiryDate = $request->get("claim")['policyExpiryDate'] . " " . $timePolicyExpiryDateNow->hour . ":" . $timePolicyExpiryDateNow->minute . ":" . $timePolicyExpiryDateNow->second;

                        $claim->contact = $request->get("claim")['contact'];
                        if ($request->get('claim')['closeDate'] != null)//insert close date when have value closeDate
                        {
                            $checkDate = null;
                            $claimDetail = ClaimTaskDetail::where('claimId',$claim->id)->orderBy('billDate', 'desc')->first();
                            if ($claimDetail != null)//check date
                            {
                                $checkDate = $claimDetail->billDate;
                            } else {
                                $checkDate = $claim->opendDate;
                            }
                            $now = Carbon::now();
                            $closeDate = $request->get('claim')['closeDate'] . " " . Carbon::parse($now)->format('H:i:s');
                            //Close claim
                            if ($closeDate > $checkDate) {
                                $claim->closeDate = $closeDate;
                                $claim->statusId = 3;
                                $claim->save();
                                $result = array('Action' => 'Update', 'Claim' => $claim, 'Error' => 'Null');
                            } else {
                                //Error
                                $result = array('Action' => 'Update', 'Claim' => 'Null', 'Error' => 'ErrorCloseDate');//Error
                            }

                        } else {
                            $claim->save();
                            $result = array('Action' => 'Update', 'Claim' => $claim, 'Error' => 'Null');
                        }
                    }
                }

            }
        }
        return $result;
    }

    public function getAllSourceCode()
    {
        $sourceCode = SourceCustomer::all();
        return view('admin.sourceCustomer')->with('sourceCode', $sourceCode);
    }

    public function getAllClaimType()
    {
        $insuranceDetail = InsuranceDetail::all();
        return view('admin.insuranceDetail')->with('insuranceDetail', $insuranceDetail);
    }

    public function loadTaskDetailByDate(Request $request)
    {
        $result = null;
        $claim = null;
        $billToId = null;
        $billTotal = null;
        $check = null;
        $a = explode(" ", $request->get('fromDate'));
        $fromDate = Carbon::parse($a[0])->format('Y-m-d') . " " . $a[1];
        //$date = Carbon::now();
        $toDate = $request->get('toDate') . " " . Carbon::parse(Carbon::now())->format("H:i:s");
        try {
            if ($request->get('key') != null) {
                $claim = Claim::where('code', $request->get('key'))->first();
                if ($claim) {
                    //load data
                    $listTime = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                        ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                        ->where('claim_task_details.invoiceMajorNo', null)
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
                        ->where('claim_task_details.claimId', '=', $claim->id)
                        ->where('claim_task_details.billDate', '<', $toDate)
                        ->where('claim_task_details.statusId', 0)
                        ->groupBy('users.name')
                        ->select(
                            'users.name as userName',
                            'claim_task_details.professionalServices as cvChinh',
                            DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTimeCvChinh'),
                            'rate_details.value as rate',
                            'rate_types.name as rateType'
                        )
                        ->get();
                    //dd($listTime);
                    $collect = collect($listTime);
                    $arrayListTime = [];
                    foreach ($collect as $item) {
                        $array = [
                            'Name' => $item->userName,
                            'Rate' => $item->rate,
                            'RateType' => $item->rateType,
                            'SumTimeCVChinh' => $item->sumTimeCvChinh,
                            'ProfessionalServices' => $item->sumTimeCvChinh * $item->rate,
                        ];
                        array_push($arrayListTime, $array);
                    }

                    $listExpense = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories', 'claim_task_details.expense', '=', 'task_categories.id')
                        ->where('claim_task_details.invoiceMajorNo', null)
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
                        ->where('claim_task_details.expense', '!=', 0)
                        ->where('claim_task_details.claimId', '=', $claim->id)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.statusId', 0)
                        ->groupBy('users.name')
//                        ->groupBy('claim_task_details.expense')
                        ->groupBy('task_categories.name')
                        ->select(
                            'users.name as Name',
                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
                            //'claim_task_details.expenseAmount as expenseAmount',
                            'task_categories.name as taskCategory'
                        )
                        ->get();
                    $arrayAll = [];
                    //$arrayTaskExpense = array("GeneralExp","CommPhotoExp","ConsultFeesExp","TravelRelatedExp","GstFreeDisb","Disbursements");
                    foreach ($arrayListTime as $item) {
                        //dd($item["Name"]);
                        $arrayExpense = [];
                        foreach ($listExpense as $expense) {
                            if ($item["Name"] == $expense->Name) {
                                array_push($arrayExpense, $expense);
                            }
                        }
                        $arrayA = [
                            "Time" => $item,
                            "Expense" => $arrayExpense
                        ];
                        array_push($arrayAll, $arrayA);
                    }

                    $result = array('Claim' => $claim, 'check' => $check, 'customer' => $billToId, 'total' => $billTotal, 'listClaimTaskDetail' => $arrayAll);

                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function loadInvoiceByEventEnterKey(Request $request)
    {
//        dd($request->all());
        $resultArray = [];
        try {
            $query1 = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('customers', 'bills.billToId', '=', 'customers.code')
                ->join('claim_task_details', 'bills.billId', '=', 'claim_task_details.id')
                ->join('task_categories', 'claim_task_details.professionalServices', '=', 'task_categories.id')
                ->join('claims', 'claim_task_details.claimId', '=', 'claims.id')
                ->join('type_of_damages', 'claims.lossDescCode', '=', 'type_of_damages.code')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    'invoices.invoiceDay as invoiceDay',
                    'bills.billToId as billTo',
                    'task_categories.code as typeInvoice',
                    'claims.code as Claim',
                    'claims.organization as organization',
                    'claims.adjusterCode as adjusterId',
                    'claims.insuredFirstName as insuredFirstName',
                    'claims.insuredLastName as insuredLastName',
                    'claims.lossDescCode as lossDesc',
                    'claims.branchCode as branchId',
                    'bills.policyNumber as policy',
                    'claims.lossDate as lossDate',
                    'bills.claimOfficer as contactName',
                    'type_of_damages.description as descriptionLossDesc',
                    'claims.lossLocation as lossLocation',
                    'invoices.nameBank as nameBank',
                    'invoices.exchangeRate as exchangeRate',
                    'invoices.dateExchangeRate as dateExchangeRate',
                    'invoices.addressBank as addressBank',
                    'customers.fullName as nameCustomer',
                    'customers.address as addressCustomer',
                    'bills.percentage as percentage',
                    'bills.total as total',
                    'claims.insuredClaim as insuredClaim',
                    'bills.professionalServices as professionalServicesDiscount'
                )->get();
            array_push($resultArray, $query1);
            $professionalService = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('professional_services', 'bills.id', '=', 'professional_services.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(professional_services.value) as professionalServices')
                )->get();
            array_push($resultArray, $professionalService);
            $generalExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('general_exps', 'bills.id', '=', 'general_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(general_exps.value) as generalExp')
                )->get();
            array_push($resultArray, $generalExp);

            $commPhotoExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('comm_photo_exps', 'bills.id', '=', 'comm_photo_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(comm_photo_exps.value) as commPhotoExp')
                )->get();
            array_push($resultArray, $commPhotoExp);

            $consultFeesExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('consult_fees_exps', 'bills.id', '=', 'consult_fees_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(consult_fees_exps.value) as consultFeesExp')
                )->get();
            array_push($resultArray, $consultFeesExp);

            $travelRelatedExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('travel_related_exps', 'bills.id', '=', 'travel_related_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(travel_related_exps.value) as travelRelatedExp')
                )->get();
            array_push($resultArray, $travelRelatedExp);

            $gstFreeDisb = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('gst_free_disbs', 'bills.id', '=', 'gst_free_disbs.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(gst_free_disbs.value) as gstFreeDisb')
                )->get();
            array_push($resultArray, $gstFreeDisb);

            $disbursement = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('disbursements', 'bills.id', '=', 'disbursements.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(disbursements.value) as disbursement')
                )->get();
            array_push($resultArray, $disbursement);

        } catch (Exception $ex) {
            return $ex;
        }
        return $resultArray;

    }

    public function loadClaimByEventEnterKey(Request $request)
    {
        $result = null;
        $date = null;
        try {
            if ($request->get('key')) {
                $claim = Claim::where('code', $request->get('key'))->first();
                if ($claim) {
                    $checkDateIBcompleteFB = ClaimTaskDetail::where('statusId', '>',1)->where('claimId', $claim->id)->orderBy('billDate', 'desc')->first();
                    if ($checkDateIBcompleteFB != null) {
                        $date = $checkDateIBcompleteFB->billDate;
                    } else {
                        $date = $claim->openDate;
                    }
                    $a = explode(" ", $date);
                    $aFR = Carbon::parse($a[0])->format('d-m-Y') . " " . $a[1];
                    $codeTotal = ClaimTaskDetail::where('claimId', $claim->id)->where('expense','<>',null)->get()->sum('professionalServicesTime');
                    $expenseTotal = ClaimTaskDetail::where('claimId', $claim->id)->where('expense','<>',null)->get()->sum('expenseAmount');
                    $result = array('Status' => 'Success', 'Claim' => $claim, 'Date' => $aFR,'codeTotal'=>$codeTotal,'expenseTotal'=>$expenseTotal);

                } else {
                    $result = array('Status' => 'notFoundClaim');
                }
            }
        } catch (Exception $ex) {
            return null;
        }
        return $result;
    }

    public function loadViewDocketDetail($sort_type, Request $request)
    {
        switch ($sort_type) {
            case '0':
                if ($request->get('idClaim')) {
                    $claim_task_detail = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->where('claim_task_details.claimId', $request->get('idClaim'))
//                ->where('claim_task_details.professionalServices','!=',1)
//                ->where('claim_task_details.professionalServices','!=',2)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.id as idTask',
                            'claim_task_details.userId as idUser',
                            'users.name as adjuster',
                            'cate1.code as professionalServices',
                            'cate2.code as expense',
                            'claim_task_details.professionalServicesTime as professionalUnit',
                            'claim_task_details.professionalServicesNote as professionalNote',
                            'claim_task_details.expenseNote as expenseNote',
                            'claim_task_details.expenseAmount as expenseAmount',
                            'claim_task_details.billDate as date',
                            'claim_task_details.invoiceMajorNo as invoiceMajorNo',
                            'claim_task_details.invoiceDate as invoiceDate',
                            'claim_task_details.invoiceTempNo as invoiceTempNo',
                            'claim_task_details.statusId as statusId',
                            'claim_task_details.lockInvoiceNo as lockInvoiceNo'
                        )
                        ->get();
                    return view('admin.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
            case '1':
                if ($request->get('idClaim')) {
                    $claim_task_detail = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->where('claim_task_details.claimId', $request->get('idClaim'))
//                ->where('claim_task_details.professionalServices','!=',1)
//                ->where('claim_task_details.professionalServices','!=',2)
                        ->orderBy('claim_task_details.billDate', 'desc')
                        ->select(
                            'claim_task_details.id as idTask',
                            'claim_task_details.userId as idUser',
                            'users.name as adjuster',
                            'cate1.code as professionalServices',
                            'cate2.code as expense',
                            'claim_task_details.professionalServicesTime as professionalUnit',
                            'claim_task_details.professionalServicesNote as professionalNote',
                            'claim_task_details.expenseNote as expenseNote',
                            'claim_task_details.expenseAmount as expenseAmount',
                            'claim_task_details.billDate as date',
                            'claim_task_details.invoiceMajorNo as invoiceMajorNo',
                            'claim_task_details.invoiceDate as invoiceDate',
                            'claim_task_details.invoiceTempNo as invoiceTempNo',
                            'claim_task_details.statusId as statusId',
                            'claim_task_details.lockInvoiceNo as lockInvoiceNo'
                        )
                        ->get();
                    return view('admin.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
            case '2':
                if ($request->get('idClaim')) {
                    $claim_task_detail = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->where('claim_task_details.claimId', $request->get('idClaim'))
//                ->where('claim_task_details.professionalServices','!=',1)
//                ->where('claim_task_details.professionalServices','!=',2)
                        ->orderBy('claim_task_details.userId', 'asc')
                        ->select(
                            'claim_task_details.id as idTask',
                            'claim_task_details.userId as idUser',
                            'users.name as adjuster',
                            'cate1.code as professionalServices',
                            'cate2.code as expense',
                            'claim_task_details.professionalServicesTime as professionalUnit',
                            'claim_task_details.professionalServicesNote as professionalNote',
                            'claim_task_details.expenseNote as expenseNote',
                            'claim_task_details.expenseAmount as expenseAmount',
                            'claim_task_details.billDate as date',
                            'claim_task_details.invoiceMajorNo as invoiceMajorNo',
                            'claim_task_details.invoiceDate as invoiceDate',
                            'claim_task_details.invoiceTempNo as invoiceTempNo',
                            'claim_task_details.statusId as statusId',
                            'claim_task_details.lockInvoiceNo as lockInvoiceNo'
                        )
                        ->get();
                    return view('admin.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
        }
    }

    public function loadListTimeCode()
    {
        $result = null;
        try {
            $result = TaskCategory::where('code', '!=', 'IB')
                ->where('code', '!=', 'FB')
                ->where('name', '=', 'TimeCode')
                ->get();
        } catch (Exception $ex) {
            return $ex;
        }
        return view('admin.viewTaskCategory')->with('result', $result);
    }

    public function loadListExpenseCode(Request $request)
    {
        $listExpense = null;
        try {
            $listExpense = TaskCategory::where('code', '!=', 'IB')
                ->where('code', '!=', 'FB')
                ->where('name', $request->get('typeExpense'))
                ->get();
        } catch (Exception $ex) {
            return $ex;
        }
        return view('admin.viewTaskExpense')->with('listExpense', $listExpense);
    }

    public function submitAddNewAndUpdateCategory(Request $request)
    {
        //dd($request->all());
        $result = null;
        if ($request->get('id') == 0) {
            //add new
            try {
                $taskCategory = new TaskCategory();
                $taskCategory->code = $request->get('code');
                $taskCategory->name = $request->get('name');
                $taskCategory->description = $request->get('description');
                $taskCategory->active = 1;
                $taskCategory->createdBy = Auth::user()->id;
                $taskCategory->save();
                $result = array('Action' => 'AddNew', 'Result' => 1);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            //update
            try {
                $taskCategory = TaskCategory::where('id', $request->get('id'))->where('active', 1)->first();
                if ($taskCategory) {
                    $taskCategory->code = $request->get('code');
                    $taskCategory->name = $request->get('name');
                    $taskCategory->description = $request->get('description');
                    $taskCategory->active = 1;
                    $taskCategory->updatedBy = Auth::user()->id;
                    $taskCategory->save();
                    $result = array('Action' => 'Update', 'Result' => 1);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function validatorAdmin(array $data, $variable)
    {
        $rules = null;
        switch ($variable) {
            case "createClaim": {
                $rules = [
                    'claimTypeCode' => 'required',
                    'lossDescCode' => 'required',
                    'insurerCode' => 'required',
                    'sourceCode' => 'required'
                ];
                break;
            }
        }
        return Validator::make($data, $rules);
    }

    public function assignmentTask(Request $request)
    {
        $action = $request->get('action');
        $result = null;
        $idTime = 0;
        $idExpense = 0;
        $professionalServicesTime = null;
        $professionalServicesAmount = null;
        $professionalServicesNote = null;
        $expenseAmount = null;
        $expenseNote = null;
        //Set value date
        $now = Carbon::now();
        $timeNow = Carbon::parse($now)->format('Y-m-d H:i:s');
        $chooseDate = $request->get('ChooseDate') . " " . Carbon::parse($now)->format('H:i:s');

        $a = explode(" ", $request->get('FromDate'));
        $fromDate = Carbon::parse($a[0])->format('Y-m-d') . " " . $a[1];

        //get claim to check assignment task when claim closed
        $claimClosed = Claim::where('id', $request->get('taskObject')['ClaimId'])->first();
        //check null and set value time
        if ($request->get('taskObject')['ProfessionalServices'] != null) {
            $idTime = $request->get('taskObject')['ProfessionalServices'];
        }
        if($request->get('taskObject')['ProfessionalServicesNote'] != null)
        {
            $professionalServicesNote = $request->get('taskObject')['ProfessionalServicesNote'];
        }
        if ($request->get('taskObject')['ProfessionalServicesTime'] != null) {
            $professionalServicesTime = $request->get('taskObject')['ProfessionalServicesTime'];
        }
        if ($request->get('taskObject')['ProfessionalServicesAmount'] != null) {
            $professionalServicesAmount = $request->get('taskObject')['ProfessionalServicesAmount'];
        }
        //check null and set value expense
        if ($request->get('taskObject')['Expense'] != null) {
            $idExpense = $request->get('taskObject')['Expense'];
        }
        if($request->get('taskObject')['ExpenseNote'] != null)
        {
            $expenseNote = $request->get('taskObject')['ExpenseNote'];
        }
        if ($request->get('taskObject')['ExpenseAmount'] != null) {
            $expenseAmount = $request->get('taskObject')['ExpenseAmount'];
        }
        //Process......
        switch($action)
        {
            case 1://Add new task
                //Check condition
                if ($chooseDate < $fromDate)
                {
                    $result = array('Action' =>'AddNew','Result' =>'ErrorDate');
                }
                else if ($chooseDate > $timeNow)
                {
                    $result = array('Action' => 'AddNew','Result'=> 'ErrorDateNow');
                }
                else if($claimClosed->statusId == 3)
                {
                    //Reopen Claim by code O2
                    if($idTime)
                    {
                        $codeO2 = TaskCategory::where('id',$idTime)->first();
                        if($codeO2->code=='O2')
                        {
                            $claimClosed->statusId = 0;
                            $claimClosed->closeDate = null;
                            $claimClosed->save();
                            //Add new task O2 reOpen
                            $userTask = User::where('name', $request->get('taskObject')['UserId'])->first();
                            if($userTask)
                            {
                                $task = new ClaimTaskDetail();
                                //Time
                                $task->professionalServices = $idTime;
                                $task->professionalServicesNote = $professionalServicesNote;
                                $task->professionalServicesTime = $professionalServicesTime;
                                $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                $task->professionalServicesAmount = $professionalServicesAmount;
                                //Expense
                                $task->expense = $idExpense;
                                $task->expenseNote = $expenseNote;
                                $task->expenseAmount = $expenseAmount;
                                //Information common
                                $task->active = 0;
                                $task->claimId = $request->get('taskObject')['ClaimId'];
                                $task->userId = $userTask->id;
                                $task->createdBy = Auth::user()->id;
                                $task->updatedBy = Auth::user()->id;
                                $task->billDate = $chooseDate;
                                $task->save();
                                $result = array('Action' => 'AddNew', 'Result' => 'ReOpenSuccess','Status'=>'Open');
                            }
                        }
                        else
                        {
                            $result = array('Action' =>'AddNew','Result'=> 'ErrorClaimClose');
                        }
                    }
                    else
                    {
                        $result = array('Action' =>'AddNew','Result'=> 'ErrorClaimClose');
                    }



                }
                else
                {
                    try
                    {
                        $userTask = User::where('name', $request->get('taskObject')['UserId'])->first();
                        if ($userTask) {
                            //check time code is O2
                            if($idTime)
                            {
                                $codeO2 = TaskCategory::where('id',$idTime)->first();
                                if($codeO2->code=='O2')
                                {
                                    $result = array('Action' => 'AddNew', 'Result' => 'ErrorCodeO2');
                                }
                                else
                                {
                                    $task = new ClaimTaskDetail();
                                    //Time
                                    $task->professionalServices = $idTime;
                                    $task->professionalServicesNote = $professionalServicesNote;
                                    $task->professionalServicesTime = $professionalServicesTime;
                                    $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                    $task->professionalServicesAmount = $professionalServicesAmount;
                                    //Expense
                                    $task->expense = $idExpense;
                                    $task->expenseNote = $expenseNote;
                                    $task->expenseAmount = $expenseAmount;
                                    //Information common
                                    $task->active = 0;
                                    $task->claimId = $request->get('taskObject')['ClaimId'];
                                    $task->userId = $userTask->id;
                                    $task->createdBy = Auth::user()->id;
                                    $task->updatedBy = Auth::user()->id;
                                    $task->billDate = $chooseDate;
                                    $task->save();
                                    //Return
                                    $result = array('Action' => 'AddNew', 'Result' => 'Success');
                                }
                            }
                            else
                            {
                                $task = new ClaimTaskDetail();
                                //Time
                                $task->professionalServices = $idTime;
                                $task->professionalServicesNote = $professionalServicesNote;
                                $task->professionalServicesTime = $professionalServicesTime;
                                $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                $task->professionalServicesAmount = $professionalServicesAmount;
                                //Expense
                                $task->expense = $idExpense;
                                $task->expenseNote = $expenseNote;
                                $task->expenseAmount = $expenseAmount;
                                //Information common
                                $task->active = 0;
                                $task->claimId = $request->get('taskObject')['ClaimId'];
                                $task->userId = $userTask->id;
                                $task->createdBy = Auth::user()->id;
                                $task->updatedBy = Auth::user()->id;
                                $task->billDate = $chooseDate;
                                $task->save();
                                //Return
                                $result = array('Action' => 'AddNew', 'Result' => 'Success');
                            }
                        }
                    }
                    catch(Exception $ex)
                    {
                        return $ex;
                    }
                }
                break;
            case 0://Update task
                //Check condition
                if ($chooseDate < $fromDate)
                {
                    $result = array('Action' =>'Update', 'Result'=> 'ErrorDate');
                }
                else if ($chooseDate > $timeNow)
                {
                    $result = array('Action'=>'Update', 'Result'=> 'ErrorDateNow');
                }
                else if($claimClosed->statusId == 3)
                {
                    $result = array('Action'=>'Update', 'Result'=> 'ErrorClaimClose');
                }
                else
                {
                    try
                    {
                        if ($request->get('idTask')) {
                            $task = ClaimTaskDetail::where('id', $request->get('idTask'))->first();
                            if ($task) {
                                //check invoice to update
                                if ($task->invoiceMajorNo != null)
                                {
                                    $result = array('Action' => 'Update', 'Result' => 'invoiceMajorNo');
                                }
                                //check bill pending to update
                                else if ($task->active == 1)
                                {
                                    $result = array('Action' => 'Update', 'Result' => 'invoiceTempNo');
                                }
                                else
                                {
                                    if($idTime)
                                    {
                                        //Check update code O2
                                        $codeO2 = TaskCategory::where('id',$idTime)->first();
                                        if($codeO2->code=='O2')
                                        {
                                            $result = array('Action' => 'Update', 'Result' => 'codeO2');
                                        }
                                        else
                                        {
                                            // Process...
                                            //Time
                                            $task->professionalServices = $idTime;
                                            $task->professionalServicesNote = $professionalServicesNote;
                                            $task->professionalServicesTime = $professionalServicesTime;
                                            $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                            $task->professionalServicesAmount = $professionalServicesAmount;
                                            //Expense
                                            $task->expense = $idExpense;
                                            $task->expenseNote = $expenseNote;
                                            $task->expenseAmount = $expenseAmount;
                                            //Information common
                                            $task->billDate = $chooseDate;
                                            $task->updatedBy = Auth::user()->id;
                                            $task->save();
                                            $result = array('Action' => 'Update', 'Result' => 'Success');
                                        }
                                    }
                                    else
                                    {
                                        // Process...
                                        //Time
                                        $task->professionalServices = $idTime;
                                        $task->professionalServicesNote = $professionalServicesNote;
                                        $task->professionalServicesTime = $professionalServicesTime;
                                        $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                        $task->professionalServicesAmount = $professionalServicesAmount;
                                        //Expense
                                        $task->expense = $idExpense;
                                        $task->expenseNote = $expenseNote;
                                        $task->expenseAmount = $expenseAmount;
                                        //Information common
                                        $task->billDate = $chooseDate;
                                        $task->updatedBy = Auth::user()->id;
                                        $task->save();
                                        $result = array('Action' => 'Update', 'Result' => 'Success');
                                    }


                                }
                            }
                        }
                    }
                    catch(Exception $ex)
                    {
                        return $ex;
                    }
                }
                break;
        }
        return $result;
    }

    public function viewDetailTask(Request $request)
    {
        $data = null;
        $professionalCode = null;
        $expenseCode = null;
        try {
            if ($request->get('idDocket')) {
                $task = ClaimTaskDetail::where('id', $request->get('idDocket'))->first();
                if ($task) {
                    if ($task->professionalServices) {
                        $professionalCode = TaskCategory::where('id', $task->professionalServices)->where('active', 1)->first()->code;
                    }
                    if ($task->expense) {
                        $expenseCode = TaskCategory::where('id', $task->expense)->where('active', 1)->first()->code;
                    }
                    if ($task->invoiceMajorNo != null) {
                        $data = array('Task' => $task, 'professionalCode' => $professionalCode, 'expenseCode' => $expenseCode, 'errorInvoiceMajorNo' => 'True');
                    } else if ($task->invoiceTempNo != null) {
                        $data = array('Task' => $task, 'professionalCode' => $professionalCode, 'expenseCode' => $expenseCode, 'errorInvoiceTempNo' => 'True');
                    } else {
                        $data = array('Task' => $task, 'professionalCode' => $professionalCode, 'expenseCode' => $expenseCode, 'errorInvoiceMajorNo' => 'False');
                    }
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $data;
    }

    public function getAllLossDesc()
    {
        $lossDesc = TypeOfDamage::all();
        return view('admin.lossDesc')->with('lossDesc', $lossDesc);
    }

    public function saveAddNewUpdateClaimType(Request $request)
    {
        $result = null;
        if ($request->get('idClaimType') === '0') {
            try {
                $claimType = new InsuranceDetail();
                $claimType->code = $request->get('codeClaimType');
                $claimType->name = $request->get('nameClaimType');
                $claimType->description = 'Description Claim Type';
                $claimType->active = 1;
                $claimType->createdBy = Auth::user()->id;
                $claimType->typeOfInsuranceId = 1;
                $claimType->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $claimType);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $claimType = InsuranceDetail::where('id', $request->get('idClaimType'))->where('active', 1)->first();
                if ($claimType) {
                    $claimType->code = $request->get('codeClaimType');
                    $claimType->name = $request->get('nameClaimType');
                    $claimType->updatedBy = Auth::user()->id;
                    $claimType->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $claimType);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function saveAddNewUpdateLossDesc(Request $request)
    {
        $result = null;
        if ($request->get('idLossDesc') === '0') {
            try {
                $lossDesc = new TypeOfDamage();
                $lossDesc->code = $request->get('codeLossDesc');
                $lossDesc->name = $request->get('nameLossDesc');
                $lossDesc->description = 'Description Loss Desc';
                $lossDesc->active = 1;
                $lossDesc->createdBy = Auth::user()->id;
                $lossDesc->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $lossDesc);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $lossDesc = TypeOfDamage::where('id', $request->get('idLossDesc'))->where('active', 1)->first();
                if ($lossDesc) {
                    $lossDesc->code = $request->get('codeLossDesc');
                    $lossDesc->name = $request->get('nameLossDesc');
                    $lossDesc->updatedBy = Auth::user()->id;
                    $lossDesc->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $lossDesc);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function saveAddNewUpdateSourceCode(Request $request)
    {
        $result = null;
        if ($request->get('idSourceCode') === '0') {
            try {
                $sourceCode = new SourceCustomer();
                $sourceCode->code = $request->get('codeSourceCode');
                $sourceCode->name = $request->get('nameSourceCode');
                $sourceCode->description = 'Description Source Code';
                $sourceCode->active = 1;
                $sourceCode->createdBy = Auth::user()->id;
                $sourceCode->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $sourceCode);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $sourceCode = SourceCustomer::where('id', $request->get('idSourceCode'))->where('active', 1)->first();
                if ($sourceCode) {
                    $sourceCode->code = $request->get('codeSourceCode');
                    $sourceCode->name = $request->get('nameSourceCode');
                    $sourceCode->updatedBy = Auth::user()->id;
                    $sourceCode->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $sourceCode);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function getAllAdjuster()
    {
        $user = DB::table('users')
            ->join('rate_details', 'users.id', '=', 'rate_details.userId')
            ->select(
                'users.id as id',
                'users.name as name',
                'users.email as email',
                'users.firstName as firstName',
                'users.lastName as lastName',
                'rate_details.value as rate'
            )->get();
        return $user;
    }

    public function getAllBranch()
    {
        $branch = Branch::all();
        return view('admin.branch')->with('branch', $branch);
    }

    public function saveAddNewUpdateBranch(Request $request)
    {
        //dd($request->all());
        $result = null;
        if ($request->get('idBranch') === '0') {
            try {
                $branchCode = new Branch();
                $branchCode->code = $request->get('codeBranch');
                $branchCode->name = $request->get('nameBranch');
                $branchCode->description = 'Description Branch';
                $branchCode->branchTypeCode = $request->get('branchTypeBranch');
                $branchCode->active = 1;
                $branchCode->createdBy = Auth::user()->id;
                $branchCode->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $branchCode);
            } catch (Exception $ex) {
                $result = array('Action' => 'AddNew', 'Result' => 0, 'Data' => null);
            }
        } else {
            try {
                $branchCode = Branch::where('id', $request->get('idBranch'))->where('active', 1)->first();
                if ($branchCode) {
                    $branchCode->code = $request->get('codeBranch');
                    $branchCode->name = $request->get('nameBranch');
                    $branchCode->updatedBy = Auth::user()->id;
                    $branchCode->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $branchCode);
                }
            } catch (Exception $ex) {
                $result = array('Action' => 'Update', 'Result' => 0, 'Data' => null);
            }
        }
        return $result;
    }

    public function saveAddNewUpdateBranchType(Request $request)
    {
        $result = null;
        if ($request->get('idBranchType') === '0') {
            try {
                $branchType = new BranchType();
                $branchType->code = $request->get('codeBranchType');
                $branchType->name = $request->get('nameBranchType');
                $branchType->description = 'Description Branch Type';
                $branchType->active = 1;
                $branchType->createdBy = Auth::user()->id;
                $branchType->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $branchType);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $branchType = BranchType::where('id', $request->get('idBranchType'))->where('active', 1)->first();
                if ($branchType) {
                    $branchType->code = $request->get('codeBranchType');
                    $branchType->name = $request->get('nameBranchType');
                    $branchType->updatedBy = Auth::user()->id;
                    $branchType->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $branchType);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function getAllInsurerCode()
    {
        $customer = Customer::all();
        return view('admin.customer')->with('customer', $customer);
    }

    public function saveAddNewUpdateInsurer(Request $request)
    {
        //dd($request->all());
        $result = null;
        if ($request->get('idInsurer') === '0') {
            try {
                $insurer = new Customer();
                $insurer->code = $request->get('codeInsurer');
                $insurer->fullName = $request->get('nameInsurer');
                $insurer->address = $request->get('addressInsurer');
                $insurer->contactPersonFirstName = $request->get('contactPersonInsurer');
                $insurer->sourceCustomerId = $request->get('sourceCustomer');
                $insurer->active = 1;
                $insurer->createdBy = Auth::user()->id;
                $insurer->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $insurer);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $insurer = Customer::where('id', $request->get('idInsurer'))->where('active', 1)->first();
                if ($insurer) {
                    $insurer->code = $request->get('codeInsurer');
                    $insurer->fullName = $request->get('nameInsurer');
                    $insurer->address = $request->get('addressInsurer');
                    $insurer->contactPersonFirstName = $request->get('contactPersonInsurer');
                    $insurer->updatedBy = Auth::user()->id;
                    $insurer->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $insurer);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function getAllBrokerCode()
    {
        $broker = Broker::all();
        return view('admin.broker')->with('broker', $broker);
    }

    public function saveAddNewUpdateBroker(Request $request)
    {
        $result = null;
        if ($request->get('id') === '0') {
            try {
                $broker = new Broker();
                $broker->code = $request->get('code');
                $broker->firstName = $request->get('firstName');
                $broker->lastName = $request->get('lastName');
                $broker->phone = $request->get('phone');
                $broker->active = 1;
                $broker->createdBy = Auth::user()->id;
                $broker->save();
                $result = array('Action' => 'AddNew', 'Result' => 1, 'Data' => $broker);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $broker = Broker::where('id', $request->get('id'))->where('active', 1)->first();
                if ($broker) {
                    $broker->firstName = $request->get('firstName');
                    $broker->lastName = $request->get('lastName');
                    $broker->phone = $request->get('phone');
                    $broker->active = 1;
                    $broker->updatedBy = Auth::user()->id;
                    $broker->save();
                    $result = array('Action' => 'Update', 'Result' => 1, 'Data' => $broker);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $result;
    }

    public function getAllInvoiceByClaimId($claim_id)
    {
        $result = DB::table('invoices')
            ->leftJoin('bills', 'bills.id', '=', 'invoices.idBill')
            ->leftJoin('claims', 'bills.claimId', '=', 'claims.id')
            ->leftJoin('claim_task_details', 'bills.billId', '=', 'claim_task_details.id')
            ->leftJoin('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
            ->where('claims.code', '=', $claim_id)
            ->select(
                'invoices.id as invoice_id',
                'invoices.invoiceMajorNo as invoice_major',
                'invoices.invoiceTempNo as invoice_temp',
                'claims.code as claim_id',
                'bills.id as bill_id',
                'invoices.invoiceDay as invoice_date',
                'statuses.name as invoiceType'
            )->get();
        return [
            'status' => 'success',
            'data' => $result
        ];
    }

    public function getReportData($invoice_id, $bill_id, $claim_code)
    {
        $claim = Claim::where('code', $claim_code)->first();
        if($claim){
            if($invoice_id != '0'){
                $insurer = Customer::where('code', $claim->insurerCode)->first();
                $branch = Branch::where('code', $claim->branchCode)->first();
                $insuranceDetail = InsuranceDetail::where('code', $claim->claimTypeCode)->first();
                $typeOfDamage = TypeOfDamage::where('code', $claim->lossDescCode)->first();
                $adjuster = User::where('name', $claim->adjusterCode)->first();
                $rate = RateDetail::where('userId', $adjuster->id)->first();
                $sourceCode = SourceCustomer::where('code', $claim->sourceCode)->first();
                $invoice = Invoice::where('id', $invoice_id)->first();
                $docket_backup = null;
                $docket = null;
                if ($invoice->invoiceMajorNo) {
                    $docket_backup = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as pro', 'claim_task_details.professionalServices', '=', 'pro.id')
                        ->leftJoin('task_categories as ex', 'claim_task_details.expense', '=', 'ex.id')
                        ->where('claim_task_details.invoiceMajorNo', '=', $invoice->invoiceMajorNo)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.professionalServicesNote',
                            'pro.description as professionalServicesNoteDes',
                            'claim_task_details.professionalServicesTime',
                            'claim_task_details.expenseNote',
                            'ex.description as expenseNoteDes',
                            'claim_task_details.expenseAmount',
                            'claim_task_details.billDate',
                            'claim_task_details.userId',
                            'claim_task_details.invoiceMajorNo',
                            'claim_task_details.invoiceTempNo',
                            'claim_task_details.invoiceDate',
                            'pro.code as professionalServices',
                            'ex.code as expense',
                            'users.name as adjusterCode'
                        )->get();
                    $docket = ClaimTaskDetail::where('invoiceMajorNo', $invoice->invoiceMajorNo)
                        ->where('userId', '!=', 23)->orderBy('created_at', 'asc')->get();
                } else {
                    $docket_backup = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as pro', 'claim_task_details.professionalServices', '=', 'pro.id')
                        ->leftJoin('task_categories as ex', 'claim_task_details.expense', '=', 'ex.id')
                        ->where('claim_task_details.invoiceTempNo', '=', $invoice->invoiceTempNo)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.professionalServicesNote',
                            'pro.description as professionalServicesNoteDes',
                            'claim_task_details.professionalServicesTime',
                            'claim_task_details.expenseNote',
                            'ex.description as expenseNoteDes',
                            'claim_task_details.expenseAmount',
                            'claim_task_details.billDate',
                            'claim_task_details.userId',
                            'claim_task_details.invoiceMajorNo',
                            'claim_task_details.invoiceTempNo',
                            'claim_task_details.invoiceDate',
                            'pro.code as professionalServices',
                            'ex.code as expense',
                            'users.name as adjusterCode'
                        )->get();
                    $docket = ClaimTaskDetail::where('invoiceTempNo', $invoice->invoiceTempNo)
                        ->where('userId', '!=', 23)->orderBy('created_at', 'asc')->get();
                }
                $assit_array = [];
                foreach ($docket->groupBy('userId') as $key => $value) {
                    $assit_detail = User::where('id', $key)->first();
                    $rateDetail = RateDetail::where('userId', $assit_detail->id)->first();
                    $sum = collect($value)->sum('professionalServicesTime');
                    array_push($assit_array, [
                        'assit' => $assit_detail,
                        'time' => $sum,
                        'branch' => $branch == null ? '' : $branch->code,
                        'rate' => $rateDetail->value
                    ]);
                }

                $bill = Bill::where('id', $bill_id)->first();
                return [
                    'claim' => [
                        'ourFile' => $claim->code,
                        'branchSeqNo' => $claim->branchSeqNo,
                        'incident' => $claim->incident,
                        'assignmentTypeCode' => $claim->assignmentTypeCode,
                        'accountCode' => $claim->accountCode,
                        'accountPolicyId' => $claim->accountPolicyId,
                        'insuredName' => $claim->insuredFirstName . ' ' . $claim->insuredLastName,
                        'insuredClaim' => $claim->insuredClaim,
                        'tradingAs' => $claim->tradingAs,
                        'claimTypeCode' => $claim->claimTypeCode,
                        'claimTypeCodeDetail' => $insuranceDetail->name,
                        'lossDescCode' => $claim->lossDescCode,
                        'lossDescCodeDetail' => $typeOfDamage->name,
                        'catastrophicLoss' => $claim->catastrophicLoss,
                        'sourceCode' => $claim->sourceCode,
                        'sourceCodeDetail' => $sourceCode->name,
                        'insurerCode' => $claim->insurerCode . ' - ' . $insurer->fullName,
                        'branchCode' => $claim->branchCode,
                        'branchCodeDetail' => $branch == null ? '': $branch->name,
                        'branchTypeCode' => $claim->branchTypeCode,
                        'destroyedDate' => $claim->destroyedDate,
                        'lossLocation' => $claim->lossLocation,
                        'lineOfBusinessCode' => $claim->lineOfBusinessCode,
                        'lossDate' => $claim->lossDate,
                        'firstContact' => $claim->firstContact,
                        'receiveDate' => $claim->receiveDate,
                        'openDate' => $claim->openDate,
                        'closeDate' => $claim->closeDate,
                        'insuredContactedDate' => $claim->insuredContactedDate,
                        'limitationDate' => $claim->limitationDate,
                        'policyInceptionDate' => $claim->policyInceptionDate,
                        'policyExpiryDate' => $claim->policyExpiryDate,
                        'disabilityCode' => $claim->disabilityCode,
                        'outComeCode' => $claim->outComeCode,
                        'lastChange' => $claim->lastChange,
                        'partnershipId' => $claim->partnershipId,
                        'adjusterCode' => $claim->adjusterCode,
                        'adjusterCodeDetail' => $adjuster->firstName . ' ' . $adjuster->lastName,
                        'rate' => $rate->value,
                        'taxable' => $claim->taxable
                    ],
                    'bill' => [
                        'billToId' => $bill->billToId,
                        'claimOfficer' => $bill->claimOfficer,
                        'policyNumber' => $bill->policyNumber
                    ],
                    'assit' => $assit_array,
                    'docket' => $docket_backup,
                    'print_date' => date('d-m-Y H:i:s'),
                    'sum_unit' => collect($docket_backup)->sum('professionalServicesTime'),
                    'sum_expense' => collect($docket_backup)->sum('expenseAmount'),
                    'invoice_date' => $invoice->invoiceDay
                ];
            }
            else{
                $insurer = Customer::where('code', $claim->insurerCode)->first();
                $branch = Branch::where('code', $claim->branchCode)->first();
                $insuranceDetail = InsuranceDetail::where('code', $claim->claimTypeCode)->first();
                $typeOfDamage = TypeOfDamage::where('code', $claim->lossDescCode)->first();
                $adjuster = User::where('name', $claim->adjusterCode)->first();
                $rate = RateDetail::where('userId', $adjuster->id)->first();
                $sourceCode = SourceCustomer::where('code', $claim->sourceCode)->first();
                $invoice = Invoice::where('id', $invoice_id)->first();
                $docket_backup = null;
                $docket = null;
                $docket_backup = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as pro', 'claim_task_details.professionalServices', '=', 'pro.id')
                        ->leftJoin('task_categories as ex', 'claim_task_details.expense', '=', 'ex.id')
                        ->where('claim_task_details.claimId',$claim->id)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.professionalServicesNote',
                            'pro.description as professionalServicesNoteDes',
                            'claim_task_details.professionalServicesTime',
                            'claim_task_details.expenseNote',
                            'ex.description as expenseNoteDes',
                            'claim_task_details.expenseAmount',
                            'claim_task_details.billDate',
                            'claim_task_details.userId',
                            'claim_task_details.invoiceMajorNo',
                            'claim_task_details.invoiceTempNo',
                            'claim_task_details.invoiceDate',
                            'pro.code as professionalServices',
                            'ex.code as expense',
                            'users.name as adjusterCode'
                        )->get();
                $docket = ClaimTaskDetail::where('claimId', $claim->id)
                    ->where('userId', '!=', 23)->orderBy('created_at', 'asc')->get();
                $assit_array = [];
                foreach ($docket->groupBy('userId') as $key => $value) {
                    $assit_detail = User::where('id', $key)->first();
                    $rateDetail = RateDetail::where('userId', $assit_detail->id)->first();
                    $sum = collect($value)->sum('professionalServicesTime');
                    array_push($assit_array, [
                        'assit' => $assit_detail,
                        'time' => $sum,
                        'branch' => $branch == null ? '': $branch->code,
                        'rate' => $rateDetail->value
                    ]);
                }
                return [
                    'claim' => [
                        'ourFile' => $claim->code,
                        'branchSeqNo' => $claim->branchSeqNo,
                        'incident' => $claim->incident,
                        'assignmentTypeCode' => $claim->assignmentTypeCode,
                        'accountCode' => $claim->accountCode,
                        'accountPolicyId' => $claim->accountPolicyId,
                        'insuredName' => $claim->insuredFirstName . ' ' . $claim->insuredLastName,
                        'insuredClaim' => $claim->insuredClaim,
                        'tradingAs' => $claim->tradingAs,
                        'claimTypeCode' => $claim->claimTypeCode,
                        'claimTypeCodeDetail' => $insuranceDetail->name,
                        'lossDescCode' => $claim->lossDescCode,
                        'lossDescCodeDetail' => $typeOfDamage->name,
                        'catastrophicLoss' => $claim->catastrophicLoss,
                        'sourceCode' => $claim->sourceCode,
                        'sourceCodeDetail' => $sourceCode->name,
                        'insurerCode' => $claim->insurerCode . ' - ' . $insurer->fullName,
                        'branchCode' => $claim->branchCode,
                        'branchCodeDetail' => $branch == null ? '': $branch->name ,
                        'branchTypeCode' => $claim->branchTypeCode,
                        'destroyedDate' => $claim->destroyedDate,
                        'lossLocation' => $claim->lossLocation,
                        'lineOfBusinessCode' => $claim->lineOfBusinessCode,
                        'lossDate' => $claim->lossDate,
                        'firstContact' => $claim->firstContact,
                        'receiveDate' => $claim->receiveDate,
                        'openDate' => $claim->openDate,
                        'closeDate' => $claim->closeDate,
                        'insuredContactedDate' => $claim->insuredContactedDate,
                        'limitationDate' => $claim->limitationDate,
                        'policyInceptionDate' => $claim->policyInceptionDate,
                        'policyExpiryDate' => $claim->policyExpiryDate,
                        'disabilityCode' => $claim->disabilityCode,
                        'outComeCode' => $claim->outComeCode,
                        'lastChange' => $claim->lastChange,
                        'partnershipId' => $claim->partnershipId,
                        'adjusterCode' => $claim->adjusterCode,
                        'adjusterCodeDetail' => $adjuster->firstName . ' ' . $adjuster->lastName,
                        'rate' => $rate->value,
                        'taxable' => $claim->taxable
                    ],
                    'bill' => [
                        'billToId' => '',
                        'claimOfficer' => '',
                        'policyNumber' => ''
                    ],
                    'assit' => $assit_array,
                    'docket' => $docket_backup,
                    'print_date' => date('d-m-Y H:i:s'),
                    'sum_unit' => collect($docket_backup)->sum('professionalServicesTime'),
                    'sum_expense' => collect($docket_backup)->sum('expenseAmount'),
                    'invoice_date' => null
                ];
            }
        }
        
    }

    public function actionBillOfClaimViewTrialFee(Request $request)
    {
        dd($request->all());
        $invoiceAdd = 2700;
        $result = null;
        $fromDate = Carbon::parse($request->get('data')['FromDate'])->format('Y-m-d H:i:s');
        //dd($fromDate);
        $toDate = null;
        if ($request->get('action') == 1)//Thuc hien lenh bill IB hoac FB
        {
            $now = Carbon::now();
            $toDate = Carbon::parse($request->get('data')['ToDate'])->format('Y-m-d') . " " . Carbon::parse($now)->format('H:i:s');
            $timeNow = Carbon::parse($now)->format('Y-m-d H:i:s');
            //Bill
            if ($toDate < $fromDate) {
                $result = array('Action' => 'ErrorDate');
            } else if ($toDate > $timeNow) {
                $result = array('Action' => 'ErrorDateNow');
            } else {
                try {
                    //check bill type: IB or FB
                    if ($request->get('data')['billType'] == 'interim_bill') {
                        //check bill status:pending or complete
                        if ($request->get('data')['billStatus'] == 'pending') {
                            //Find all task claim details and update active = 0
                            $listClaimTaskDetailUpdateActive = ClaimTaskDetail::where('statusId', 0)
                                ->where('claimId', $request->get('data')['idClaim'])
                                ->where('billDate', '>=', $fromDate)
                                ->get();
                            foreach ($listClaimTaskDetailUpdateActive as $item) {
                                $item->active = 0;
                                $item->save();
                            }
                            //Insert data to table Claim_task_detail(Docket)
                            $claimTaskDetail = new ClaimTaskDetail();
                            $claimTaskDetail->professionalServices = 1;
                            $claimTaskDetail->professionalServicesTime = 0;
                            $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                            $claimTaskDetail->billDate = $toDate;
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
                            if ($request->get('data')['ArrayData'] == "null") {
                                $result = array('Action' => 'BillClaim', 'Result' => 2);
                            } else {
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $user = User::where('name', $item[0])->where('active', 1)->first();
                                    if ($user) {
                                        //table professional_services
                                        $professionalServices = new ProfessionalService();
                                        $professionalServices->billId = $bill->id;
                                        $professionalServices->userId = $user->id;
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
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
                                //insert rate change of task
                                $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $bill->claimId)
                                    ->get();
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    //update active = 1
                                    $taskDetail->active = 1;
                                    $taskDetail->save();
                                    //update rate bill value when bill change
                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                        $idUser = User::where('name', $item[0])->first()->id;
                                        if ($idUser) {
                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                            if ($taskDetail->userId == $idUser) {
                                                if ($checkRateDefault != $item[2]) //if rate default different rate change to update
                                                {
                                                    $taskDetail->professionalServicesRateBillValue = $item[2];
                                                    $taskDetail->save();
                                                }
                                            }
                                        }
                                    }
                                }
                                $invoiceMajorNoNew = Invoice::orderBy('invoiceMajorNo', 'desc')->first();
                                if ($invoiceMajorNoNew != null) {
                                    $invoiceAdd = $invoiceMajorNoNew->invoiceMajorNo + 1;
                                }
                                $result = array('Action' => 'BillClaim', 'Result' => 1, 'invoiceMajorNoNew' => $invoiceAdd);
                            }

                        } else {
                            //check the same invoiceMajorNo
                            $invoiceMajorNoCheck = Invoice::where('invoiceMajorNo', $request->get('data')['invoiceMajorNo'])->first();
                            if ($invoiceMajorNoCheck != null) {
                                //Error
                                $result = array('Action' => 'BillClaim', 'Result' => 2, 'invoiceMajorNoNew' => "null");
                            } else {
                                //Insert data to table Claim_task_detail(Docket)
                                $claimTaskDetail = new ClaimTaskDetail();
                                $claimTaskDetail->professionalServices = 1;
                                $claimTaskDetail->professionalServicesTime = 0;
                                $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                                $claimTaskDetail->billDate = $toDate;
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
                                        $professionalServices->rateChange = $item[2];
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
                                $invoice->invoiceMajorNo = $request->get('data')['invoiceMajorNo'];
                                $invoice->corInsurer = $request->get('data')['coorInsurer'];
                                $invoice->save();

                                //insert all row of table claimtaskdetail after have invoice
                                $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $bill->claimId)
                                    ->get();
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    $taskDetail->active = 1;
                                    $taskDetail->invoiceMajorNo = $invoice->invoiceMajorNo;
                                    $taskDetail->invoiceDate = $invoice->invoiceDay;
                                    $taskDetail->save();
                                    //update rate bill value when bill change
                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                        $idUser = User::where('name', $item[0])->first()->id;
                                        if ($idUser) {
                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                            if ($taskDetail->userId == $idUser) {
                                                if ($checkRateDefault != $item[2]) {
                                                    $taskDetail->professionalServicesRateBillValue = $item[2];
                                                    $taskDetail->save();
                                                }
                                            }
                                        }
                                    }
                                }
                                //send to client invoiceMajorNo new
                                $invoiceMajorNoNew = Invoice::orderBy('invoiceMajorNo', 'desc')->first();
                                if ($invoiceMajorNoNew != null) {
                                    $invoiceAdd = $invoiceMajorNoNew->invoiceMajorNo + 1;
                                }
                                $result = array('Action' => 'BillClaim', 'Result' => 1, 'invoiceMajorNoNew' => $invoiceAdd);
                            }

                        }
                    } else {
                        //Delete IB have status 1
                        $IBPending = ClaimTaskDetail::where('professionalServices', 1)->where('statusId', 1)->first();
                        if ($IBPending) {
                            $billIB = Bill::where('billId', $IBPending->id)->first();
                            if ($billIB) {
                                ProfessionalService::where('billId', $billIB->id)->delete();
                                GeneralExp::where('billId', $billIB->id)->delete();
                                CommPhotoExp::where('billId', $billIB->id)->delete();
                                ConsultFeesExp::where('billId', $billIB->id)->delete();
                                TravelRelatedExp::where('billId', $billIB->id)->delete();
                                GstFreeDisb::where('billId', $billIB->id)->delete();
                                Disbursement::where('billId', $billIB->id)->delete();
                                $billIB->delete();
                            }
                            $IBPending->delete();
                        }
                        //check invoiceMajorNo same
                        $invoiceMajorNoCheck = Invoice::where('invoiceMajorNo', $request->get('data')['invoiceMajorNo'])->first();
                        if ($invoiceMajorNoCheck != null) {
                            //Error
                            $result = array('Action' => 'BillClaim', 'Result' => 2, 'invoiceMajorNoNew' => "null");
                        } else {
                            //Insert data to table Claim_task_detail(Docket)
                            $claimTaskDetail = new ClaimTaskDetail();
                            $claimTaskDetail->professionalServices = 2;
                            $claimTaskDetail->professionalServicesTime = 0;
                            $claimTaskDetail->professionalServicesNote = 'Final Billing';
                            $claimTaskDetail->billDate = $toDate;
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
                                    $professionalServices->rateChange = $item[2];
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
                            $invoice->invoiceMajorNo = $request->get('data')['invoiceMajorNo'];
                            $invoice->corInsurer = $request->get('data')['coorInsurer'];
                            $invoice->save();
                            //insert all row of table claimtaskdetail after have invoice
                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                ->where('billDate', '>=', $fromDate)
                                ->where('billDate', '<=', $claimTaskDetail->billDate)
                                ->where('claimId', $bill->claimId)
                                ->get();
                            foreach ($listClaimTaskDetail as $taskDetail) {
                                $taskDetail->active = 1;
                                $taskDetail->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $taskDetail->invoiceDate = $invoice->invoiceDay;
                                $taskDetail->save();
                                //update rate bill value when bill change
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $idUser = User::where('name', $item[0])->first()->id;
                                    if ($idUser) {
                                        $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                        if ($taskDetail->userId == $idUser) {
                                            if ($checkRateDefault != $item[2]) {
                                                $taskDetail->professionalServicesRateBillValue = $item[2];
                                                $taskDetail->save();
                                            }
                                        }
                                    }
                                }
                            }
                            //send to client invoiceMajorNo new
                            $invoiceMajorNoNew = Invoice::orderBy('invoiceMajorNo', 'desc')->first();
                            if ($invoiceMajorNoNew != null) {
                                $invoiceAdd = $invoiceMajorNoNew->invoiceMajorNo + 1;
                            }
                            $result = array('Action' => 'BillClaim', 'Result' => 1, 'invoiceMajorNoNew' => $invoiceAdd);
                        }

                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
        } else //Thuc hien lenh khi cap nhat bill
        {
            $a = explode(" ", $request->get('data')['ToDate']);
            $toDate = Carbon::parse($a[0])->format('Y-m-d') . " " . $a[1];
            try {
                $bill = Bill::where('id', $request->get('data')['idBill'])->first();
                if ($bill) {
                    //update status complete
                    if ($request->get('data')['billStatus'] == 'complete') {
                        //check the same invoiceMajorNo
                        $invoiceMajorNoCheck = Invoice::where('invoiceMajorNo', $request->get('data')['invoiceMajorNo'])->first();
                        if ($invoiceMajorNoCheck != null) {
                            //Error
                            $result = array('Action' => 'UpdateClaim', 'Result' => 2, 'invoiceMajorNoNew' => "null");
                        } else {
                            //update total of bill discount
                            $bill->total = $request->get('data')['Total'];
                            $bill->save();
                            $task = ClaimTaskDetail::where('id', $bill->billId)->where('statusId', 1)->where('claimId', $bill->claimId)->first();
                            if ($task != null) {
                                $task->statusId = 2;
                                $task->save();
                            }
                            //insert table invoice
                            $invoice = new Invoice();
                            $invoice->idBill = $bill->id;
                            $invoice->invoiceDay = $toDate;
                            $invoice->invoiceMajorNo = $request->get('data')['invoiceMajorNo'];
                            $invoice->corInsurer = $request->get('data')['coorInsurer'];
                            $invoice->save();
                            //insert all row of table claimtaskdetail after have invoice
                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                ->where('billDate', '>=', $fromDate)
                                ->where('billDate', '<=', $task->billDate)
                                ->where('claimId', $bill->claimId)
                                ->get();
                            foreach ($listClaimTaskDetail as $taskDetail) {
                                $taskDetail->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $taskDetail->invoiceDate = $invoice->invoiceDay;
                                $taskDetail->save();
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $idUser = User::where('name', $item[0])->first()->id;
                                    if ($idUser) {
                                        $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                        if ($taskDetail->userId == $idUser) {
                                            if ($checkRateDefault != $item[2]) {
                                                $taskDetail->professionalServicesRateBillValue = $item[2];
                                                $taskDetail->save();
                                            }
                                        }
                                    }
                                }
                            }
                            //insert list task rate change
                            //Insert data detail table
                            foreach ($request->get('data')['ArrayData'] as $item) {
                                $user = User::where('name', $item[0])->where('active', 1)->first();
                                if ($user) {
                                    //find 1 row table professionalServices to update rate change
                                    $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                    if ($professionalServices) {
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
                                        $professionalServices->save();
                                    }
                                    $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                    if ($total) {
                                        $total->value = $item[11];
                                        $total->save();
                                    }
                                    //find 1 row table total to update rate change
                                }
                            }//insert list professional services rate change
                            //send to client invoiceMajorNo new
                            $invoiceMajorNoNew = Invoice::orderBy('invoiceMajorNo', 'desc')->first();
                            if ($invoiceMajorNoNew != null) {
                                $invoiceAdd = $invoiceMajorNoNew->invoiceMajorNo + 1;
                            }
                            $result = array('Action' => 'UpdateClaim', 'Result' => 1, 'invoiceMajorNoNew' => $invoiceAdd);
                        }
                    }
                }
            } catch (Exception $ex) {
                return $ex;
            }

        }
        return $result;
    }

    public function getInvoiceTempNo()
    {
        $invoice = null;
        $temp = 0;
        $rowInvoice = Invoice::orderBy('created_at', 'desc')->first();
        if($rowInvoice)
        {
            if($rowInvoice->invoiceMajorNo != null && $rowInvoice->invoiceTempNo == null)
                $temp = 1;
            if($rowInvoice->invoiceMajorNo == null && $rowInvoice->invoiceTempNo != null)
                $temp = 2;
            if($rowInvoice->invoiceMajorNo != null && $rowInvoice->invoiceTempNo != null)
                $temp = 3;
        }
        switch($temp)
        {
            case 0:
                $invoice = 10000;
                break;
            case 1:
                $invoice = ((int)("1" . substr($rowInvoice->invoiceMajorNo, 1, 4))) + 1;
                break;
            case 2:
                $invoice = $rowInvoice->invoiceTempNo + 1;
                break;
            case 3:
                $major = (int)substr($rowInvoice->invoiceMajorNo, 1, 4);
                $temp = (int)substr($rowInvoice->invoiceTempNo, 1, 4);
                if ($major > $temp) {
                    $invoice = ((int)("1" . substr($rowInvoice->invoiceMajorNo, 1, 4))) + 1;
                } else {
                    $invoice = $rowInvoice->invoiceTempNo + 1;
                }
                break;
        }
        return $invoice;

    }

    public function getInvoiceMajorNo()
    {
        $invoice = null;
        $temp = 0;
        $rowInvoice = Invoice::orderBy('created_at', 'desc')->first();
        if($rowInvoice)
        {
            if($rowInvoice->invoiceMajorNo != null && $rowInvoice->invoiceTempNo == null)
                $temp = 1;
            if($rowInvoice->invoiceMajorNo == null && $rowInvoice->invoiceTempNo != null)
                $temp = 2;
            if($rowInvoice->invoiceMajorNo != null && $rowInvoice->invoiceTempNo != null)
                $temp = 3;
        }
        switch($temp)
        {
            case 0:
                $invoice = 20000;
                break;
            case 1:
                $invoice = $rowInvoice->invoiceMajorNo + 1;
                break;
            case 2:
                $invoice = ((int)("2" . substr($rowInvoice->invoiceTempNo, 1, 4))) + 1;
                break;
            case 3:
                $major = (int)substr($rowInvoice->invoiceMajorNo, 1, 4);
                $temp = (int)substr($rowInvoice->invoiceTempNo, 1, 4);
                if ($major > $temp) {
                    $invoice = $rowInvoice->invoiceMajorNo + 1;
                } else {
                    $invoice = ((int)("2" . substr($rowInvoice->invoiceTempNo, 1, 4))) + 1;
                }
                break;
        }
        return $invoice;
    }

    public function Bill(Request $request)
    {

        //dd($request->all());
        $data = null;
        $invoiceTempNo = null;
        $invoiceMajorNo = null;
        $fromDate = null;
        $toDate = null;
        $tempOverRide = 0;
        if ($request->get('action') == 1) // Add new only bill
        {
            $timeNow = Carbon::now();//take time now to when add new
            $fromDate = $request->get('data')['FromDate'];
            $toDate = $request->get('data')['ToDate'] . " " . Carbon::parse($timeNow)->format('H:i:s');
            //Check fromDate v� toDate of bill before add new
            if ($toDate < $fromDate) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate<FromDate');
            } else if ($toDate > $timeNow) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate>TimeNow');
            } else {
                //Perform Add New
                if ($request->get('data')['billType'] == 'interim_bill')//Add new Interim Bill
                {
                    if ($request->get('data')['billStatus'] == 'pending')// Bill pending
                    {
                        //Find bill complete or final bill final
                        $billCompleteFinalBill = ClaimTaskDetail::where('statusId', 2)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->orderBy('billDate', 'desc')
                            ->first();
                        if ($billCompleteFinalBill == null) {
                            //Find bill pending not lockeInvoiceNo
                            $IBPending = ClaimTaskDetail::where('statusId', 1)
                                ->where('claimId', $request->get('data')['idClaim'])
                                ->where('lockInvoiceNo', 0)
                                ->orderBy('invoiceTempNo', 'desc')
                                ->first();
                            if ($IBPending != null) {
                                $tempOverRide = 1;
                                $IBPending->lockInvoiceNo = 1;
                                $IBPending->save();
                                $invoiceTempNo = $this->getInvoiceTempNo();
                            } else {
                                $invoiceTempNo = $this->getInvoiceTempNo();
                            }
                        } else {
                            //Find bill pending not lockeInvoiceNo
                            $IBPending = ClaimTaskDetail::where('statusId', 1)
                                ->where('claimId', $request->get('data')['idClaim'])
                                ->where('billDate', '>', $billCompleteFinalBill->billDate)
                                ->where('lockInvoiceNo', 0)
                                ->orderBy('invoiceTempNo', 'desc')
                                ->first();
                            if ($IBPending == null) {
                                $invoiceTempNo = $this->getInvoiceTempNo();
                            } else {
                                $tempOverRide = 1;
                                $IBPending->lockInvoiceNo = 1;
                                $IBPending->save();
                                $invoiceTempNo = $this->getInvoiceTempNo();
                            }
                        }
                        //Add new row task pending
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $toDate;
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 1;
                        $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                        $claimTaskDetail->invoiceTempNo = $invoiceTempNo;
                        $claimTaskDetail->invoiceTempNoBeforeOverRide = $invoiceTempNo;
                        $claimTaskDetail->invoiceDate = $toDate;
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Add new row
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
                        $bill->createdBy = Auth::user()->id;
                        $bill->updatedBy = Auth::user()->id;
                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                        $bill->policyNumber = $request->get('data')['policy'];
                        $bill->save();
                        //Add new details
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->first();
                            if ($user) {
                                //table professional_services
                                $professionalServices = new ProfessionalService();
                                $professionalServices->billId = $bill->id;
                                $professionalServices->userId = $user->id;
                                $professionalServices->value = $item[4];
                                $professionalServices->rateChange = $item[2];
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
                        //Add new invoice
                        $invoice = new Invoice();
                        $invoice->idBill = $bill->id;
                        $invoice->invoiceDay = $claimTaskDetail->billDate;
                        $invoice->invoiceTempNo = $invoiceTempNo;
                        $invoice->corInsurer = $request->get('data')['coorInsurer'];
                        $invoice->save();
                        //Add new rate change
                        $listClaimTaskDetail = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
//                            ->where('created_at','>',$created_atCP)
                            ->where('billDate', '>=', $fromDate)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('lockInvoiceNo', 0)
                            ->where('statusId', 0)
                            ->get()
                            ->toArray();
                        $listClaimTaskDetailV2 = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
                            ->where('billDate', '<=', $fromDate)
                            ->where('invoiceMajorNo', null)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('lockInvoiceNo', 0)
                            ->where('statusId', 0)
                            ->get()
                            ->toArray();
                        if ($listClaimTaskDetailV2 != null) {
                            foreach ($listClaimTaskDetailV2 as $item) {
                                array_push($listClaimTaskDetail, $item);
                            }
                        }
                        foreach ($listClaimTaskDetail as $taskDetail) {
                            $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                            if ($task) {
                                if($tempOverRide == 0)
                                {
                                    //update active
                                    $task->active = 1;
                                    //update invoiceMajorNo
                                    $task->invoiceTempNo = $invoiceTempNo;
                                    $task->invoiceTempNoBeforeOverRide = $invoiceTempNo;
                                    $task->save();
                                }
                                else
                                {
                                    //update active
                                    $task->active = 1;
                                    if($task->invoiceTempNoBeforeOverRide==null)
                                    {

                                        $task->invoiceTempNoBeforeOverRide = $invoiceTempNo;
                                        $task->invoiceTempNo = $invoiceTempNo;
                                    }
                                    else
                                    {
                                        //update invoiceMajorNo
                                        $task->invoiceTempNo = $invoiceTempNo;
                                    }
                                    $task->save();
                                }
                                //Update rate change
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $idUser = User::where('name', $item[0])->first()->id;
                                    if ($idUser) {
                                        $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;
                                        if ($task->userId == $idUser) {
                                            if ($checkRateDefault != $item[2]) {
                                                $task->professionalServicesRateBillValue = $item[2];
                                                $task->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $data = array('Action' => 'AddNew', 'Error' => 'null');
                    } // End bill pending
                    else//Bill complete
                    {
                        //get invoiceMajorNo
                        $invoiceMajorNo = $this->getInvoiceMajorNo();
                        //add new one row bill complete to table task
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $toDate;
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 2;
                        $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                        $claimTaskDetail->invoiceDate = $toDate;
                        $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Add one row to table bill
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
                        $bill->createdBy = Auth::user()->id;
                        $bill->updatedBy = Auth::user()->id;
                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                        $bill->policyNumber = $request->get('data')['policy'];
                        $bill->save();
                        //Add new invoice
                        $invoice = new Invoice();
                        $invoice->idBill = $bill->id;
                        $invoice->invoiceDay = $claimTaskDetail->billDate;
                        $invoice->invoiceMajorNo = $invoiceMajorNo;
                        $invoice->corInsurer = $request->get('data')['coorInsurer'];
                        $invoice->save();
                        //Add new details
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->first();
                            if ($user) {
                                //table professional_services
                                $professionalServices = new ProfessionalService();
                                $professionalServices->billId = $bill->id;
                                $professionalServices->userId = $user->id;
                                $professionalServices->value = $item[4];
                                $professionalServices->rateChange = $item[2];
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
                        //insert all row of table claimtaskdetail after have invoice
                        $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                            ->where('billDate', '>=', $fromDate)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->get()->toArray();
                        $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                            ->where('billDate', '<=', $fromDate)
                            ->where('invoiceMajorNo', null)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->get()->toArray();
                        if ($listClaimTaskDetailV2 != null) {
                            foreach ($listClaimTaskDetailV2 as $item) {
                                array_push($listClaimTaskDetailV2, $item);
                            }
                        }
                        foreach ($listClaimTaskDetail as $taskDetail) {
                            $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                            if ($task) {
                                $task->active = 1;
                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $task->invoiceDate = $invoice->invoiceDay;
                                $task->save();
                                //c?p nh?t rate thay ??i
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $idUser = User::where('name', $item[0])->first()->id;
                                    if ($idUser) {
                                        $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                        if ($task->userId == $idUser) {
                                            if ($checkRateDefault != $item[2]) {
                                                $task->professionalServicesRateBillValue = $item[2];
                                                $task->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $data = array('Action' => 'AddNew', 'Error' => 'null');


                    }
                    //End bill complete
                } //End Interim Bill
                else //Add new final bill
                {
                    //get invoiceMajorNo
                    $invoiceMajorNo = $this->getInvoiceMajorNo();
                    //Add new row task final bill
                    $claimTaskDetail = new ClaimTaskDetail();
                    $claimTaskDetail->professionalServices = 2;
                    $claimTaskDetail->professionalServicesTime = 0;
                    $claimTaskDetail->professionalServicesNote = 'Final Billing';
                    $claimTaskDetail->billDate = $toDate;
                    $claimTaskDetail->active = 1;
                    $claimTaskDetail->statusId = 2;
                    $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                    $claimTaskDetail->invoiceDate = $toDate;
                    $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                    $claimTaskDetail->userId = Auth::user()->id;
                    $claimTaskDetail->createdBy = Auth::user()->id;
                    $claimTaskDetail->save();
                    //Add new bill
                    $bill = new Bill();
                    $bill->billToId = $request->get('data')['billToCustomer'];
                    $bill->claimId = $request->get('data')['idClaim'];
                    $bill->billId = $claimTaskDetail->id;
                    $bill->total = $request->get('data')['Total'];
                    $bill->createdBy = Auth::user()->id;
                    $bill->updatedBy = Auth::user()->id;
                    $bill->claimOfficer = $request->get('data')['coorInsurer'];
                    $bill->policyNumber = $request->get('data')['policy'];
                    $bill->save();
                    //Add new details
                    foreach ($request->get('data')['ArrayData'] as $item) {
                        $user = User::where('name', $item[0])->first();
                        if ($user) {
                            //table professional_services
                            $professionalServices = new ProfessionalService();
                            $professionalServices->billId = $bill->id;
                            $professionalServices->userId = $user->id;
                            $professionalServices->value = $item[4];
                            $professionalServices->rateChange = $item[2];
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
                    //Add new invoice
                    $invoice = new Invoice();
                    $invoice->idBill = $bill->id;
                    $invoice->invoiceDay = $claimTaskDetail->billDate;
                    $invoice->invoiceMajorNo = $invoiceMajorNo;
                    $invoice->corInsurer = $request->get('data')['coorInsurer'];
                    $invoice->save();
                    //Update detail task of user
                    $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                        ->where('billDate', '>=', $fromDate)
                        ->where('billDate', '<=', $claimTaskDetail->billDate)
                        ->where('claimId', $request->get('data')['idClaim'])
                        ->get()->toArray();
                    $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                        ->where('billDate', '<=', $fromDate)
                        ->where('invoiceMajorNo', null)
                        ->where('billDate', '<=', $claimTaskDetail->billDate)
                        ->where('claimId', $request->get('data')['idClaim'])
                        ->get()->toArray();
                    if ($listClaimTaskDetailV2 != null) {
                        foreach ($listClaimTaskDetailV2 as $item) {
                            array_push($listClaimTaskDetail, $item);
                        }
                    }
                    foreach ($listClaimTaskDetail as $taskDetail) {
                        $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                        if ($task) {
                            $task->active = 1;
                            $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                            $task->invoiceDate = $invoice->invoiceDay;
                            $task->save();

                            //c?p nh?t rate value change
                            foreach ($request->get('data')['ArrayData'] as $item) {
                                $idUser = User::where('name', $item[0])->first()->id;
                                if ($idUser) {
                                    $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//l?y ra rate m?c ??nh
                                    if ($task->userId == $idUser) {
                                        if ($checkRateDefault != $item[2]) {
                                            $task->professionalServicesRateBillValue = $item[2];
                                            $task->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $data = array('Action' => 'AddNew', 'Error' => 'null');
                }
                //End final bill
            }
        } //End add new only bill
        else //Update bill from pending to complete
        {

            $fromDate = $request->get('data')['FromDate'];
            //Update bill from pending to complete
            try {
                //check close claim
                $claimClose = Claim::where('id', $request->get('data')['idClaim'])->first();
                if ($claimClose) {
                    if ($claimClose->statusId == 3) {
                        $data = array('Action' => 'Update', 'Error' => 'ClaimClose');
                    } else {
                        $bill = Bill::where('id', $request->get('data')['idBill'])->first();
                        if ($bill) {
                            //check bill has already bill complete???
                            $taskBill = ClaimTaskDetail::where('id', $bill->billId)->where('claimId', $request->get('data')['idClaim'])->first();
//                          dd($taskBill);
                            if ($taskBill) {
                                //+($taskBill->statusId);
                                if ($taskBill->statusId == 1) {
                                    //Update bill from pending to complete
                                    if ($request->get('data')['billStatus'] == 'complete') {
                                        //Update total
                                        $bill->total = $request->get('data')['Total'];
                                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                        $bill->policyNumber = $request->get('data')['policy'];
                                        $bill->save();
                                        //Update status = 2
                                        $task = ClaimTaskDetail::where('id', $bill->billId)
                                            ->where('statusId', 1)
                                            ->where('claimId', $request->get('data')['idClaim'])
                                            ->where('lockInvoiceNo', '!=', 1)
                                            ->first();
                                        if ($task != null) {
                                            //Update invoiceTempNo -> invoiceMajorNo
                                            $invoice = Invoice::where('idBill', $bill->id)->first();
                                            if ($invoice) {
                                                $changeNumber = substr($invoice->invoiceTempNo, 1, 4);
                                                $invoice->invoiceMajorNo = "2" . $changeNumber;
                                                $invoice->invoiceDay = $task->billDate;
                                                $invoice->save();

                                                $task->statusId = 2;
                                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                $task->save();
                                            }
                                            //update c�c c�ng vi?c c?a bill
                                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '>=', $fromDate)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '<=', $fromDate)
                                                ->where('invoiceMajorNo', null)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            if ($listClaimTaskDetailV2 != null) {
                                                foreach ($listClaimTaskDetailV2 as $item) {
                                                    array_push($listClaimTaskDetail, $item);
                                                }
                                            }
                                            foreach ($listClaimTaskDetail as $taskDetail) {
                                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                                if ($task) {
                                                    $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                    $task->invoiceDate = $invoice->invoiceDay;
                                                    $task->save();
                                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                                        $idUser = User::where('name', $item[0])->first()->id;
                                                        if ($idUser) {
                                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                                            if ($task->userId == $idUser) {
                                                                if ($checkRateDefault != $item[2]) {
                                                                    $task->professionalServicesRateBillValue = $item[2];
                                                                    $task->save();
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        //Update details of users
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $user = User::where('name', $item[0])->where('active', 1)->first();
                                            if ($user) {
                                                //Update rate of table professionalServices
                                                $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($professionalServices) {
                                                    $professionalServices->value = $item[4];
                                                    $professionalServices->rateChange = $item[2];
                                                    $professionalServices->save();
                                                }
                                                //Update table total
                                                $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($total) {
                                                    $total->value = $item[11];
                                                    $total->save();
                                                }
                                            }
                                        }
                                        $data = array('Action' => 'Update', 'Error' => 'null');

                                    }
                                } else {
                                    //just only update total of bill when discount
                                    $bill->total = $request->get('data')['Total'];
                                    $bill->save();
                                    $data = array('Action' => 'Update', 'Error' => 'null');
                                }
                            }
                        }
                    }
                }

            } catch (Exception $ex) {
                return $ex;
            }


        }
        return $data;
    }

    public function getSearchTime(Request $request)
    {
        try {
            $time = TaskCategory::where('name', 'TimeCode')
                ->where('code', $request->get('Code'))->first();
            if ($time) {
                return $time;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchExpense(Request $request)
    {
        try {
            $expense = TaskCategory::where('name', '!=', 'TimeCode')->where('name', '!=', 'IB')->where('name', '!=', 'FB')
                ->where('code', $request->get('Code'))->first();
            if ($expense) {
                return $expense;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchInsurer(Request $request)
    {
        $arrayData = null;
        try {
            $insurer = Customer::where('code', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($insurer) == 0) {
                //return 0;
                $arrayData = array('Result' => 0);
            } else if (count($insurer) > 1) {
                //return 2;
                $arrayData = array('Result' => 2);
            } else if (count($insurer) == 1) {
                foreach ($insurer as $item) {
                    $arrayData = array('Result' => 1, 'Data' => $item->code, 'Source' => $item->sourceCustomerId, 'Contact' => $item->contactPersonFirstName);
                }
                //return $insurer;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $arrayData;
    }

    public function getSearchClaimType(Request $request)
    {
        try {
            $claimType = InsuranceDetail::where('code', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($claimType) == 0) {
                return 0;
            } else if (count($claimType) > 1) {
                return 2;
            } else if (count($claimType) == 1) {
                return $claimType;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchLossDesc(Request $request)
    {
        try {
            $lossDesc = TypeOfDamage::where('code', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($lossDesc) == 0) {
                return 0;
            } else if (count($lossDesc) > 1) {
                return 2;
            } else if (count($lossDesc) == 1) {
                return $lossDesc;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchBroker(Request $request)
    {
        try {
            $broker = Broker::where('code', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($broker) == 0) {
                return 0;
            } else if (count($broker) > 1) {
                return 2;
            } else if (count($broker) == 1) {
                return $broker;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchAdjuster(Request $request)
    {
        try {
            $adjuster = User::where('name', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($adjuster) == 0) {
                return 0;
            } else if (count($adjuster) > 1) {
                return 2;
            } else if (count($adjuster) == 1) {
                return $adjuster;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchBranch(Request $request)
    {
        try {
            $branch = Branch::where('code', 'LIKE', '%' . $request->get('Code') . '%')->get();
            if (count($branch) == 0) {
                return 0;
            } else if (count($branch) > 1) {
                return 2;
            } else if (count($branch) == 1) {
                return $branch;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getMaxCodeClaim()
    {
        $data = null;
        try {
            $claim = Claim::orderBy('code', 'desc')->first();
            if ($claim != null) {
                $data = ((int)$claim->code) + 1;
            } else {
                $data = 1000000;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $data;
    }

    public function getAllEmployees()
    {
        $data = null;
        try {
            $data = User::all();
        } catch (Exception $ex) {
            return $ex;
        }
        return view('admin.viewGetAllEmployees')->with('listEmployee', $data);
    }

    public function getSearchNameOfEmployee(Request $request)
    {
        try {
            $name = User::where('name', $request->get('Code'))->first();
            if ($name === null) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getSearchEmailOfEmployee(Request $request)
    {
        try {
            $email = User::where('email', $request->get('Code'))->first();
            if ($email === null) {
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function reportTask()
    {
        return view('admin.reportTask');
    }

    public function loadReportTask(Request $request)
    {
        $arrayData = null;
        $sumTime = 0;
        $sumExpenseAmount = 0;
        $fromDate = $request->get('fromDate') . " " . "00:00:00";
        $toDate = $request->get('toDate') . " " . "23:59:59";
        if ($request->get('allClaim') === 'True') {
            try {
                if($request->get('userCode') == ""){
                    $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.professionalServicesTime as professionalServicesTime',
                            'claim_task_details.invoiceMajorNo as Invoice',
                            'users.name as adjuster'
                        )
                        ->get();
                    //$timeTotal = ClaimTaskDetail::all();
                    if (count($claimTask) > 0) {
                        $collectTimeTotal = collect($claimTask);
                        $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                        $sumExpenseAmount = $collectTimeTotal->sum('ExpenseAmount');
                    }
                    $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);
                }else{
                    $user = User::where('name',$request->get('userCode'))->first();
                    $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.userId', $user->id)
                        ->orderBy('claim_task_details.billDate', 'asc')
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.professionalServicesTime as professionalServicesTime',
                            'claim_task_details.invoiceMajorNo as Invoice',
                            'users.name as adjuster'
                        )
                        ->get();
                    //$timeTotal = ClaimTaskDetail::where('userId', $user->id)->get();
                    if (count($claimTask) > 0) {
                        $collectTimeTotal = collect($claimTask);
                        $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                        $sumExpenseAmount = $collectTimeTotal->sum('ExpenseAmount');
                    }
                    $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);
                }
                
            } catch (Exception $ex) {

            }
        } else // report only claim
        {
            try {
                $claim = Claim::where('code', $request->get('claimCode'))->first();
                if ($claim) {
                    if($request->get('userCode') == ""){
                        $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.claimId', $claim->id)
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.invoiceMajorNo as Invoice',
                            'users.name as adjuster'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as units')
                        )
                        ->get();
                        $timeTotal = ClaimTaskDetail::where('claimId', $claim->id)->get();
                        $collectTimeTotal = collect($timeTotal);
                        if (count($claimTask) > 0) {
                            $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                            $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                        }
                        $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);
                    }else{
                        $user = User::where('name',$request->get('userCode'))->first();
                        $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.userId', $user->id)
                        ->where('claim_task_details.claimId', $claim->id)
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.invoiceMajorNo as Invoice',
                            'users.name as adjuster'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as units')
                        )
                        ->get();
                        $timeTotal = ClaimTaskDetail::where('userId', $user->id)->where('claimId', $claim->id)->get();
                        $collectTimeTotal = collect($timeTotal);
                        if (count($claimTask) > 0) {
                            $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                            $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                        }
                        $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);
                    }      
                }else{
                    if($request->get('userCode') == ""){
                        $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.invoiceMajorNo as Invoice'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as units')
                        )
                        ->get();
                        $timeTotal = ClaimTaskDetail::all();
                        $collectTimeTotal = collect($timeTotal);
                        if (count($claimTask) > 0) {
                            $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                            $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                        }
                        $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);        
                    }else{
                        $user = User::where('name',$request->get('userCode'))->first();
                        $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->leftJoin('users','claim_task_details.userId','=','users.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.userId', $user->id)
                        ->select(
                            'claim_task_details.billDate as CreatedDate',
                            'claims.code as Claim',
                            'cate1.code as Time',
                            'claim_task_details.professionalServicesTime as Unit',
                            'cate2.code as ExpenseCode',
                            'claim_task_details.expenseAmount as ExpenseAmount',
                            'claim_task_details.invoiceMajorNo as Invoice'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as units')
                        )
                        ->get();
                        $timeTotal = ClaimTaskDetail::where('userId', $request->get('userId'))->get();
                        dd($timeTotal);
                        $collectTimeTotal = collect($timeTotal);
                        if (count($claimTask) > 0) {
                            $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                            $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                        }
                        $arrayData = array('ListData' => $claimTask, 'SumTime' => $sumTime, 'SumExpenseAmount' => $sumExpenseAmount);
                    }
                }

            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $arrayData;
    }

    public function getTimeNowServer()
    {
        return date('d-m-Y h:i:s');
    }

    public function deleteTask(Request $request)
    {

        $data = null;
        try {
            $task = ClaimTaskDetail::where('id', $request->get('idTask'))
                ->first();
            if ($task->invoiceMajorNo==null && $task->invoiceTempNo==null) {
                //check claim closed
                $claimClose = Claim::where('id', $task->claimId)->first();
                if ($claimClose) {
                    if ($claimClose->statusId === 3) {
                        $data = 0;
                    } else {
                        $task->delete();
                        $data = 1;
                    }
                }
            }
            else //Delete bill pending or IB complete, FB pending,FB complete
            {
                switch($task->statusId)
                {
                    case 1: //IB pending
                        //check claim closed
                        $claimClose = Claim::where('id', $task->claimId)->first();
                        if ($claimClose) {
                            if ($claimClose->statusId === 3) {
                                $data = 0;
                            }
                            else {
                                $listTask = ClaimTaskDetail::where('claimId',$task->claimId)
                                    ->where('invoiceMajorNo',null)
                                    ->where('invoiceTempNo',$task->invoiceTempNo)
                                    ->where('statusId',0)
                                    ->get();
                                foreach($listTask as $detail)
                                {
                                    //find bill overRide

                                    $detail->active =0;
                                    $detail->invoiceTempNo = null;
                                    $detail->invoiceTempNoBeforeOverRide = null;
                                    $detail->save();
                                }
                                //Delete row table bill
                                $bill = Bill::where('billId',$task->id)->first();
                                if($bill)
                                {
                                    Invoice::where('idBill',$bill->id)->delete();
                                    ProfessionalService::where('billId',$bill->id)->delete();
                                    GeneralExp::where('billId',$bill->id)->delete();
                                    CommPhotoExp::where('billId',$bill->id)->delete();
                                    ConsultFeesExp::where('billId',$bill->id)->delete();
                                    Disbursement::where('billId',$bill->id)->delete();
                                    GstFreeDisb::where('billId',$bill->id)->delete();
                                    TravelRelatedExp::where('billId',$bill->id)->delete();
                                    Total::where('billId',$bill->id)->delete();
                                    $bill->delete();

                                }
                                $task->delete();
                                $data = 1;


                            }
                        }
                        break;
                    case 2: //IB complete
                        //check claim closed
                        $claimClose = Claim::where('id', $task->claimId)->first();
                        if ($claimClose) {
                            if ($claimClose->statusId === 3) {
                                $data = 0;
                            }
                            else {
                                $listTask = ClaimTaskDetail::where('claimId',$task->claimId)
                                    ->where('invoiceMajorNo',$task->invoiceMajorNo)
                                    ->where('statusId',0)
                                    ->get();
                                foreach($listTask as $detail)
                                {
                                    //find bill overRide
                                    $detail->active =0;
                                    $detail->invoiceMajorNo = null;
                                    $detail->invoiceTempNo = null;
                                    $detail->invoiceDate = null;
                                    $detail->save();
                                }
                                //Delete row table bill
                                $bill = Bill::where('billId',$task->id)->first();
                                if($bill)
                                {
                                    Invoice::where('idBill',$bill->id)->delete();
                                    ProfessionalService::where('billId',$bill->id)->delete();
                                    GeneralExp::where('billId',$bill->id)->delete();
                                    CommPhotoExp::where('billId',$bill->id)->delete();
                                    ConsultFeesExp::where('billId',$bill->id)->delete();
                                    Disbursement::where('billId',$bill->id)->delete();
                                    GstFreeDisb::where('billId',$bill->id)->delete();
                                    TravelRelatedExp::where('billId',$bill->id)->delete();
                                    Total::where('billId',$bill->id)->delete();
                                    $bill->delete();

                                }
                                $task->delete();
                                $data = 1;
                            }
                        }
                        break;
                    case 3: //FB pending
                        //check claim closed
                        $claimClose = Claim::where('id', $task->claimId)->first();
                        if ($claimClose) {
                            if ($claimClose->statusId === 3) {
                                $data = 0;
                            }
                            else {
                                $listTask = ClaimTaskDetail::where('claimId',$task->claimId)
                                    ->where('invoiceMajorNo',$task->invoiceMajorNo)
                                    ->where('statusId',0)
                                    ->get();
                                foreach($listTask as $detail)
                                {
                                    //find bill overRide
                                    $detail->active =0;
                                    $detail->invoiceMajorNo = null;
                                    $detail->invoiceTempNo = null;
                                    $detail->invoiceDate = null;
                                    $detail->save();
                                }
                                //Delete row table bill
                                $bill = Bill::where('billId',$task->id)->first();
                                if($bill)
                                {
                                    Invoice::where('idBill',$bill->id)->delete();
                                    ProfessionalService::where('billId',$bill->id)->delete();
                                    GeneralExp::where('billId',$bill->id)->delete();
                                    CommPhotoExp::where('billId',$bill->id)->delete();
                                    ConsultFeesExp::where('billId',$bill->id)->delete();
                                    Disbursement::where('billId',$bill->id)->delete();
                                    GstFreeDisb::where('billId',$bill->id)->delete();
                                    TravelRelatedExp::where('billId',$bill->id)->delete();
                                    Total::where('billId',$bill->id)->delete();
                                    $bill->delete();

                                }
                                $task->delete();
                                $data = 1;
                            }
                        }
                        break;
                    case 4: //FB complete and reOpen claim
                        $claimClose = Claim::where('id', $task->claimId)->first();
                        if ($claimClose) {
                            $listTask = ClaimTaskDetail::where('claimId',$task->claimId)
                                ->where('invoiceMajorNo',$task->invoiceMajorNo)
                                ->where('statusId',0)
                                ->get();
                            foreach($listTask as $detail)
                            {
                                //find bill overRide
                                $detail->active =0;
                                $detail->invoiceMajorNo = null;
                                $detail->invoiceTempNo = null;
                                $detail->invoiceDate = null;
                                $detail->save();
                            }
                            //Delete row table bill
                            $bill = Bill::where('billId',$task->id)->first();
                            if($bill)
                            {
                                Invoice::where('idBill',$bill->id)->delete();
                                ProfessionalService::where('billId',$bill->id)->delete();
                                GeneralExp::where('billId',$bill->id)->delete();
                                CommPhotoExp::where('billId',$bill->id)->delete();
                                ConsultFeesExp::where('billId',$bill->id)->delete();
                                Disbursement::where('billId',$bill->id)->delete();
                                GstFreeDisb::where('billId',$bill->id)->delete();
                                TravelRelatedExp::where('billId',$bill->id)->delete();
                                Total::where('billId',$bill->id)->delete();
                                $bill->delete();

                            }
                            $task->delete();
                            //reOpen Claim
                            $claimClose->statusId = 0;
                            $claimClose->closeDate = null;
                            $claimClose->save();
                            $data = 1;

                        }
                        break;
                }

            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $data;
    }

    public function saveInformationOfInvoiceAfterInReport(Request $request)
    {

        $data = 0;
        try {
            $invoice = Invoice::where('invoiceMajorNo', $request->get('invoice'))
                ->orWhere('invoiceTempNo', $request->get('invoice'))
                ->first();
            if ($invoice) {
                $invoice->nameBank = $request->get('bankName');
                $invoice->exchangeRate = $request->get('exchangeRate');
                $invoice->dateExchangeRate = $request->get('date') . " " . Carbon::parse(Carbon::now())->format('H:i:s');
                $invoice->save();
                $data = 1;
            } else {
                $data = 2;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $data;
    }

    public function BillV2(Request $request)
    {
        dd($request->all());
        $data = null;
        $invoiceTempNo = null;
        $invoiceMajorNo = null;
        $fromDate = null;
        $toDate = null;
        if ($request->get('action') == 1) // Add new only bill
        {
            $timeNow = Carbon::now();//take time now to when add new
            $fromDate = $request->get('data')['FromDate'];
            $toDate = $request->get('data')['ToDate'] . " " . Carbon::parse($timeNow)->format('H:i:s');
            //Check fromDate v� toDate of bill before add new
            if ($toDate < $fromDate) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate<FromDate');
            } else if ($toDate > $timeNow) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate>TimeNow');
            } else {
                //Perform Add New
                if ($request->get('data')['billType'] == 'interim_bill')//Add new Interim Bill
                {
                    if ($request->get('data')['billStatus'] == 'pending')// Bill pending
                    {
                        $listPendingBefore = ClaimTaskDetail::where('statusId',1)
                                                            ->where('claimId',$request->get('data')['idClaim'])
                                                            ->where('invoiceMajorNo',null)
                                                            ->get();
                        if(count($listPendingBefore)!==0)
                        {
                            $data = array('Action' => 'AddNew', 'Error' => 'DeleteBill');
                        }
                        else
                        {
                            $invoiceTempNo = $this->getInvoiceTempNo();
                            //Add new row task pending
                            $claimTaskDetail = new ClaimTaskDetail();
                            $claimTaskDetail->professionalServices = 1;
                            $claimTaskDetail->professionalServicesTime = 0;
                            $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                            $claimTaskDetail->billDate = $toDate;
                            $claimTaskDetail->active = 1;
                            $claimTaskDetail->statusId = 1;
                            $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                            $claimTaskDetail->invoiceTempNo = $invoiceTempNo;
                            $claimTaskDetail->invoiceDate = $toDate;
                            $claimTaskDetail->userId = Auth::user()->id;
                            $claimTaskDetail->createdBy = Auth::user()->id;
                            $claimTaskDetail->save();
                            //Add new row
                            $bill = new Bill();
                            $bill->billToId = $request->get('data')['billToCustomer'];
                            $bill->claimId = $request->get('data')['idClaim'];
                            $bill->billId = $claimTaskDetail->id;
                            $bill->total = $request->get('data')['Total'];
                            $bill->createdBy = Auth::user()->id;
                            $bill->updatedBy = Auth::user()->id;
                            $bill->claimOfficer = $request->get('data')['coorInsurer'];
                            $bill->policyNumber = $request->get('data')['policy'];
                            $bill->save();
                            //Add new details
                            foreach ($request->get('data')['ArrayData'] as $item) {
                                $user = User::where('name', $item[0])->first();
                                if ($user) {
                                    //table professional_services
                                    $professionalServices = new ProfessionalService();
                                    $professionalServices->billId = $bill->id;
                                    $professionalServices->userId = $user->id;
                                    $professionalServices->value = $item[4];
                                    $professionalServices->rateChange = $item[2];
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
                            //Add new invoice
                            $invoice = new Invoice();
                            $invoice->idBill = $bill->id;
                            $invoice->invoiceDay = $claimTaskDetail->billDate;
                            $invoice->invoiceTempNo = $invoiceTempNo;
                            $invoice->corInsurer = $request->get('data')['coorInsurer'];
                            $invoice->save();
                            //Add new rate change
                            $listClaimTaskDetail = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
//                            ->where('created_at','>',$created_atCP)
                                ->where('billDate', '>=', $fromDate)
                                ->where('billDate', '<=', $claimTaskDetail->billDate)
                                ->where('lockInvoiceNo', 0)
                                ->where('statusId', 0)
                                ->get()
                                ->toArray();
                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
                                ->where('billDate', '<=', $fromDate)
                                ->where('invoiceMajorNo', null)
                                ->where('billDate', '<=', $claimTaskDetail->billDate)
                                ->where('lockInvoiceNo', 0)
                                ->where('statusId', 0)
                                ->get()
                                ->toArray();
                            if ($listClaimTaskDetailV2 != null) {
                                foreach ($listClaimTaskDetailV2 as $item) {
                                    array_push($listClaimTaskDetail, $item);
                                }
                            }
                            foreach ($listClaimTaskDetail as $taskDetail) {
                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                if ($task) {
                                    //update active
                                    $task->active = 1;
                                    //update invoiceMajorNo
                                    $task->invoiceTempNo = $invoiceTempNo;
                                    $task->save();
                                    //Update rate change
                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                        $idUser = User::where('name', $item[0])->first()->id;
                                        if ($idUser) {
                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;
                                            if ($task->userId == $idUser) {
                                                if ($checkRateDefault != $item[2]) {
                                                    $task->professionalServicesRateBillValue = $item[2];
                                                    $task->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            $data = array('Action' => 'AddNew', 'Error' => 'null');
                        }

                    } // End bill pending
                    else//Bill complete
                    {
                        //get invoiceMajorNo
                        $invoiceMajorNo = $this->getInvoiceMajorNo();
                        //add new one row bill complete to table task
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $toDate;
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 2;
                        $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                        $claimTaskDetail->invoiceDate = $toDate;
                        $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Add one row to table bill
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
                        $bill->createdBy = Auth::user()->id;
                        $bill->updatedBy = Auth::user()->id;
                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                        $bill->policyNumber = $request->get('data')['policy'];
                        $bill->save();
                        //Add new invoice
                        $invoice = new Invoice();
                        $invoice->idBill = $bill->id;
                        $invoice->invoiceDay = $claimTaskDetail->billDate;
                        $invoice->invoiceMajorNo = $invoiceMajorNo;
                        $invoice->corInsurer = $request->get('data')['coorInsurer'];
                        $invoice->save();
                        //Add new details
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->first();
                            if ($user) {
                                //table professional_services
                                $professionalServices = new ProfessionalService();
                                $professionalServices->billId = $bill->id;
                                $professionalServices->userId = $user->id;
                                $professionalServices->value = $item[4];
                                $professionalServices->rateChange = $item[2];
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
                        //insert all row of table claimtaskdetail after have invoice
                        $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                            ->where('billDate', '>=', $fromDate)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->get()->toArray();
                        $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                            ->where('billDate', '<=', $fromDate)
                            ->where('invoiceMajorNo', null)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->get()->toArray();
                        if ($listClaimTaskDetailV2 != null) {
                            foreach ($listClaimTaskDetailV2 as $item) {
                                array_push($listClaimTaskDetailV2, $item);
                            }
                        }
                        foreach ($listClaimTaskDetail as $taskDetail) {
                            $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                            if ($task) {
                                $task->active = 1;
                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $task->invoiceDate = $invoice->invoiceDay;
                                $task->save();
                                //c?p nh?t rate thay ??i
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $idUser = User::where('name', $item[0])->first()->id;
                                    if ($idUser) {
                                        $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                        if ($task->userId == $idUser) {
                                            if ($checkRateDefault != $item[2]) {
                                                $task->professionalServicesRateBillValue = $item[2];
                                                $task->save();
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        $data = array('Action' => 'AddNew', 'Error' => 'null');


                    }
                    //End bill complete
                } //End Interim Bill
                else //Add new final bill
                {
                    //get invoiceMajorNo
                    $invoiceMajorNo = $this->getInvoiceMajorNo();
                    //Add new row task final bill
                    $claimTaskDetail = new ClaimTaskDetail();
                    $claimTaskDetail->professionalServices = 2;
                    $claimTaskDetail->professionalServicesTime = 0;
                    $claimTaskDetail->professionalServicesNote = 'Final Billing';
                    $claimTaskDetail->billDate = $toDate;
                    $claimTaskDetail->active = 1;
                    $claimTaskDetail->statusId = 2;
                    $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                    $claimTaskDetail->invoiceDate = $toDate;
                    $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                    $claimTaskDetail->userId = Auth::user()->id;
                    $claimTaskDetail->createdBy = Auth::user()->id;
                    $claimTaskDetail->save();
                    //Add new bill
                    $bill = new Bill();
                    $bill->billToId = $request->get('data')['billToCustomer'];
                    $bill->claimId = $request->get('data')['idClaim'];
                    $bill->billId = $claimTaskDetail->id;
                    $bill->total = $request->get('data')['Total'];
                    $bill->createdBy = Auth::user()->id;
                    $bill->updatedBy = Auth::user()->id;
                    $bill->claimOfficer = $request->get('data')['coorInsurer'];
                    $bill->policyNumber = $request->get('data')['policy'];
                    $bill->save();
                    //Add new details
                    foreach ($request->get('data')['ArrayData'] as $item) {
                        $user = User::where('name', $item[0])->first();
                        if ($user) {
                            //table professional_services
                            $professionalServices = new ProfessionalService();
                            $professionalServices->billId = $bill->id;
                            $professionalServices->userId = $user->id;
                            $professionalServices->value = $item[4];
                            $professionalServices->rateChange = $item[2];
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
                    //Add new invoice
                    $invoice = new Invoice();
                    $invoice->idBill = $bill->id;
                    $invoice->invoiceDay = $claimTaskDetail->billDate;
                    $invoice->invoiceMajorNo = $invoiceMajorNo;
                    $invoice->corInsurer = $request->get('data')['coorInsurer'];
                    $invoice->save();
                    //Update detail task of user
                    $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                        ->where('billDate', '>=', $fromDate)
                        ->where('billDate', '<=', $claimTaskDetail->billDate)
                        ->where('claimId', $request->get('data')['idClaim'])
                        ->get()->toArray();
                    $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                        ->where('billDate', '<=', $fromDate)
                        ->where('invoiceMajorNo', null)
                        ->where('billDate', '<=', $claimTaskDetail->billDate)
                        ->where('claimId', $request->get('data')['idClaim'])
                        ->get()->toArray();
                    if ($listClaimTaskDetailV2 != null) {
                        foreach ($listClaimTaskDetailV2 as $item) {
                            array_push($listClaimTaskDetail, $item);
                        }
                    }
                    foreach ($listClaimTaskDetail as $taskDetail) {
                        $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                        if ($task) {
                            $task->active = 1;
                            $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                            $task->invoiceDate = $invoice->invoiceDay;
                            $task->save();

                            //c?p nh?t rate value change
                            foreach ($request->get('data')['ArrayData'] as $item) {
                                $idUser = User::where('name', $item[0])->first()->id;
                                if ($idUser) {
                                    $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//l?y ra rate m?c ??nh
                                    if ($task->userId == $idUser) {
                                        if ($checkRateDefault != $item[2]) {
                                            $task->professionalServicesRateBillValue = $item[2];
                                            $task->save();
                                        }
                                    }
                                }
                            }
                        }
                    }
                    $data = array('Action' => 'AddNew', 'Error' => 'null');
                }
                //End final bill
            }
        } //End add new only bill
        else //Update bill from pending to complete
        {

            $fromDate = $request->get('data')['FromDate'];
            //Update bill from pending to complete
            try {
                //check close claim
                $claimClose = Claim::where('id', $request->get('data')['idClaim'])->first();
                if ($claimClose) {
                    if ($claimClose->statusId == 3) {
                        $data = array('Action' => 'Update', 'Error' => 'ClaimClose');
                    } else {
                        $bill = Bill::where('id', $request->get('data')['idBill'])->first();
                        if ($bill) {
                            //check bill has already bill complete???
                            $taskBill = ClaimTaskDetail::where('id', $bill->billId)->where('claimId', $request->get('data')['idClaim'])->first();
//                          dd($taskBill);
                            if ($taskBill) {
                                //+($taskBill->statusId);
                                if ($taskBill->statusId == 1) {
                                    //Update bill from pending to complete
                                    if ($request->get('data')['billStatus'] == 'complete') {
                                        //Update total
                                        $bill->total = $request->get('data')['Total'];
                                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                        $bill->policyNumber = $request->get('data')['policy'];
                                        $bill->save();
                                        //Update status = 2
                                        $task = ClaimTaskDetail::where('id', $bill->billId)
                                            ->where('statusId', 1)
                                            ->where('claimId', $request->get('data')['idClaim'])
                                            ->where('lockInvoiceNo', '!=', 1)
                                            ->first();
                                        if ($task != null) {
                                            //Update invoiceTempNo -> invoiceMajorNo
                                            $invoice = Invoice::where('idBill', $bill->id)->first();
                                            if ($invoice) {
                                                $changeNumber = substr($invoice->invoiceTempNo, 1, 4);
                                                $invoice->invoiceMajorNo = "2" . $changeNumber;
                                                $invoice->invoiceDay = $task->billDate;
                                                $invoice->save();

                                                $task->statusId = 2;
                                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                $task->save();
                                            }
                                            //update c�c c�ng vi?c c?a bill
                                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '>=', $fromDate)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '<=', $fromDate)
                                                ->where('invoiceMajorNo', null)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            if ($listClaimTaskDetailV2 != null) {
                                                foreach ($listClaimTaskDetailV2 as $item) {
                                                    array_push($listClaimTaskDetail, $item);
                                                }
                                            }
                                            foreach ($listClaimTaskDetail as $taskDetail) {
                                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                                if ($task) {
                                                    $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                    $task->invoiceDate = $invoice->invoiceDay;
                                                    $task->save();
                                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                                        $idUser = User::where('name', $item[0])->first()->id;
                                                        if ($idUser) {
                                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                                            if ($task->userId == $idUser) {
                                                                if ($checkRateDefault != $item[2]) {
                                                                    $task->professionalServicesRateBillValue = $item[2];
                                                                    $task->save();
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        //Update details of users
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $user = User::where('name', $item[0])->where('active', 1)->first();
                                            if ($user) {
                                                //Update rate of table professionalServices
                                                $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($professionalServices) {
                                                    $professionalServices->value = $item[4];
                                                    $professionalServices->rateChange = $item[2];
                                                    $professionalServices->save();
                                                }
                                                //Update table total
                                                $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($total) {
                                                    $total->value = $item[11];
                                                    $total->save();
                                                }
                                            }
                                        }
                                        $data = array('Action' => 'Update', 'Error' => 'null');

                                    }
                                    if($request->get('data')['billType'] == 'final_bill')
                                    {
                                        //Update total
                                        $bill->total = $request->get('data')['Total'];
                                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                        $bill->policyNumber = $request->get('data')['policy'];
                                        $bill->save();
                                        //Update status = 2
                                        $task = ClaimTaskDetail::where('id', $bill->billId)
                                            ->where('statusId', 1)
                                            ->where('claimId', $request->get('data')['idClaim'])
                                            ->where('lockInvoiceNo', '!=', 1)
                                            ->first();
                                        if ($task != null) {
                                            //Update invoiceTempNo -> invoiceMajorNo
                                            $invoice = Invoice::where('idBill', $bill->id)->first();
                                            if ($invoice) {
                                                $changeNumber = substr($invoice->invoiceTempNo, 1, 4);
                                                $invoice->invoiceMajorNo = "2" . $changeNumber;
                                                $invoice->invoiceDay = $task->billDate;
                                                $invoice->save();

                                                $task->statusId = 2;
                                                $task->professionalServicesNote = 'Final Billing';
                                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                $task->save();
                                            }
                                            //update c�c c�ng vi?c c?a bill
                                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '>=', $fromDate)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
                                                ->where('billDate', '<=', $fromDate)
                                                ->where('invoiceMajorNo', null)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->get()->toArray();
                                            if ($listClaimTaskDetailV2 != null) {
                                                foreach ($listClaimTaskDetailV2 as $item) {
                                                    array_push($listClaimTaskDetail, $item);
                                                }
                                            }
                                            foreach ($listClaimTaskDetail as $taskDetail) {
                                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                                if ($task) {
                                                    $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                                    $task->invoiceDate = $invoice->invoiceDay;
                                                    $task->save();
                                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                                        $idUser = User::where('name', $item[0])->first()->id;
                                                        if ($idUser) {
                                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                                            if ($task->userId == $idUser) {
                                                                if ($checkRateDefault != $item[2]) {
                                                                    $task->professionalServicesRateBillValue = $item[2];
                                                                    $task->save();
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        //Update details of users
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $user = User::where('name', $item[0])->where('active', 1)->first();
                                            if ($user) {
                                                //Update rate of table professionalServices
                                                $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($professionalServices) {
                                                    $professionalServices->value = $item[4];
                                                    $professionalServices->rateChange = $item[2];
                                                    $professionalServices->save();
                                                }
                                                //Update table total
                                                $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                                if ($total) {
                                                    $total->value = $item[11];
                                                    $total->save();
                                                }
                                            }
                                        }
                                        $data = array('Action' => 'Update', 'Error' => 'null');
                                    }
                                }
                                else {
                                    //just only update total of bill when discount
                                    $bill->total = $request->get('data')['Total'];
                                    $bill->save();
                                    $data = array('Action' => 'Update', 'Error' => 'null');
                                }
                            }
                        }
                    }
                }

            } catch (Exception $ex) {
                return $ex;
            }


        }
        return $data;
    }

    public function viewDetailInvoiceByInvoice(Request $request)
    {
        $resultArray = [];
        try {
            $query1 = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('customers', 'bills.billToId', '=', 'customers.code')
                ->join('claim_task_details', 'bills.billId', '=', 'claim_task_details.id')
                ->join('task_categories', 'claim_task_details.professionalServices', '=', 'task_categories.id')
                ->join('claims', 'claim_task_details.claimId', '=', 'claims.id')
                ->join('type_of_damages', 'claims.lossDescCode', '=', 'type_of_damages.code')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    'invoices.invoiceDay as invoiceDay',
                    'bills.billToId as billTo',
                    'task_categories.code as typeInvoice',
                    'claims.code as Claim',
                    'claims.organization as organization',
                    'claims.adjusterCode as adjusterId',
                    'claims.insuredFirstName as insuredFirstName',
                    'claims.insuredLastName as insuredLastName',
                    'claims.lossDescCode as lossDesc',
                    'claims.branchCode as branchId',
                    'bills.policyNumber as policy',
                    'claims.lossDate as lossDate',
                    'bills.claimOfficer as contactName',
                    'type_of_damages.description as descriptionLossDesc',
                    'claims.lossLocation as lossLocation',
                    'claims.code as claimCode',
                    'invoices.nameBank as nameBank',
                    'invoices.exchangeRate as exchangeRate',
                    'invoices.dateExchangeRate as dateExchangeRate',
                    'invoices.addressBank as addressBank',
                    'customers.fullName as nameCustomer',
                    'customers.address as addressCustomer'
                )->get();
            array_push($resultArray, $query1);
            $professionalService = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('professional_services', 'bills.id', '=', 'professional_services.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(professional_services.value) as professionalServices')
                )->get();
            array_push($resultArray, $professionalService);
            $generalExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('general_exps', 'bills.id', '=', 'general_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(general_exps.value) as generalExp')
                )->get();
            array_push($resultArray, $generalExp);

            $commPhotoExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('comm_photo_exps', 'bills.id', '=', 'comm_photo_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(comm_photo_exps.value) as commPhotoExp')
                )->get();
            array_push($resultArray, $commPhotoExp);

            $consultFeesExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('consult_fees_exps', 'bills.id', '=', 'consult_fees_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(consult_fees_exps.value) as consultFeesExp')
                )->get();
            array_push($resultArray, $consultFeesExp);

            $travelRelatedExp = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('travel_related_exps', 'bills.id', '=', 'travel_related_exps.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(travel_related_exps.value) as travelRelatedExp')
                )->get();
            array_push($resultArray, $travelRelatedExp);

            $gstFreeDisb = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('gst_free_disbs', 'bills.id', '=', 'gst_free_disbs.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(gst_free_disbs.value) as gstFreeDisb')
                )->get();
            array_push($resultArray, $gstFreeDisb);

            $disbursement = DB::table('invoices')
                ->join('bills', 'invoices.idBill', '=', 'bills.id')
                ->join('disbursements', 'bills.id', '=', 'disbursements.billId')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo', $request->get('key'))
                ->select(
                    DB::raw('SUM(disbursements.value) as disbursement')
                )->get();
            array_push($resultArray, $disbursement);

        } catch (Exception $ex) {
            return $ex;
        }
        return $resultArray;
    }

    public function getClaimHaveInvoiceOfTabInvoice()
    {
        $query = null;
        $query = DB::table('claims')
                    ->join('bills','bills.claimId','=','claims.id')
                    ->groupBy('claims.id')
                    ->select(
                        'claims.code as code',
                        'claims.insuredLastName as insuredLastName',
                        'claims.insurerCode as insurerCode',
                        'claims.receiveDate as receiveDate',
                        'claims.openDate as openDate',
                        'claims.adjusterCode as adjusterCode'
                    )->get();
        return $query;
    }

    public function BillV3(Request $request)
    {
        //dd($request->all());
        $data = null;
        $invoiceTempNo = null;
        $invoiceMajorNo = null;
        $action = $request->get('action');
        $billType = $request->get('data')['billType'];
        $billStatus = $request->get('data')['billStatus'];
        if($action=='1')//Action add new only bill
        {
            $timeNow = Carbon::now();//take time now to when add new
            $fromDate = $request->get('data')['FromDate'];
            $toDate = $request->get('data')['ToDate'] . " " . Carbon::parse($timeNow)->format('H:i:s');
            //Check fromDate and toDate of bill before add new
            if ($toDate < $fromDate) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate<FromDate');
            } else if ($toDate > $timeNow) {
                $data = array('Action' => 'AddNew', 'Error' => 'ToDate>TimeNow');
            }
            else
            {
                if($billType=='interim_bill') //bill type IB
                {
                    switch($billStatus) //Have two status : pending and complete
                    {
                        case 'pending':
                            //Process....
                            $listPendingBefore = ClaimTaskDetail::where('statusId',1)
                                ->where('claimId',$request->get('data')['idClaim'])
                                ->where('invoiceMajorNo',null)
                                ->where('invoiceTempNo','!=',null)
                                ->get();
                            if(count($listPendingBefore)!==0)
                            {
                                $data = array('Action' => 'AddNew', 'Error' => 'DeleteBill');
                            }
                            else
                            {
                                $invoiceTempNo = $this->getInvoiceTempNo();
                                //Add new row task pending
                                $claimTaskDetail = new ClaimTaskDetail();
                                $claimTaskDetail->professionalServices = 1;
                                $claimTaskDetail->professionalServicesTime = 0;
                                $claimTaskDetail->professionalServicesNote = 'Interim Billing Pending';
                                $claimTaskDetail->billDate = $toDate;
                                $claimTaskDetail->active = 1;
                                $claimTaskDetail->statusId = 1;
                                $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                                $claimTaskDetail->invoiceTempNo = $invoiceTempNo;
                                $claimTaskDetail->invoiceDate = $toDate;
                                $claimTaskDetail->userId = Auth::user()->id;
                                $claimTaskDetail->createdBy = Auth::user()->id;
                                $claimTaskDetail->save();
                                //Add new row
                                $bill = new Bill();
                                $bill->billToId = $request->get('data')['billToCustomer'];
                                $bill->claimId = $request->get('data')['idClaim'];
                                $bill->billId = $claimTaskDetail->id;
                                $bill->total = $request->get('data')['Total'];
                                $bill->createdBy = Auth::user()->id;
                                $bill->updatedBy = Auth::user()->id;
                                $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                $bill->policyNumber = $request->get('data')['policy'];
                                $bill->percentage = $request->get('data')['discount'];
                                $bill->professionalServices = $request->get('data')['professionalDiscount'];
                                $bill->save();
                                //Add new details
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $user = User::where('name', $item[0])->first();
                                    if ($user) {
                                        //table professional_services
                                        $professionalServices = new ProfessionalService();
                                        $professionalServices->billId = $bill->id;
                                        $professionalServices->userId = $user->id;
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
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
                                //Add new invoice
                                $invoice = new Invoice();
                                $invoice->idBill = $bill->id;
                                $invoice->invoiceDay = $claimTaskDetail->billDate;
                                $invoice->invoiceTempNo = $invoiceTempNo;
                                $invoice->corInsurer = $request->get('data')['coorInsurer'];
                                $invoice->save();
                                //Add new rate change
                                $listClaimTaskDetail = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('lockInvoiceNo', 0)
                                    ->where('statusId', 0)
                                    ->get()
                                    ->toArray();
                                $listClaimTaskDetailV2 = ClaimTaskDetail::where('claimId', $request->get('data')['idClaim'])
                                    ->where('billDate', '<=', $fromDate)
                                    ->where('invoiceMajorNo', null)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('lockInvoiceNo', 0)
                                    ->where('statusId', 0)
                                    ->get()
                                    ->toArray();
                                if ($listClaimTaskDetailV2 != null) {
                                    foreach ($listClaimTaskDetailV2 as $item) {
                                        array_push($listClaimTaskDetail, $item);
                                    }
                                }
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                    if ($task) {
                                        //update active
                                        $task->active = 1;
                                        //update invoiceMajorNo
                                        $task->invoiceTempNo = $invoiceTempNo;
                                        $task->save();
                                        //Update rate change
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $idUser = User::where('name', $item[0])->first()->id;
                                            if ($idUser) {
                                                $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;
                                                if ($task->userId == $idUser) {
                                                    if ($checkRateDefault != $item[2]) {
                                                        $task->professionalServicesRateBillValue = $item[2];
                                                        $task->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $data = array('Action' => 'AddNew', 'Error' => 'null');
                            }
                            break;

                        case 'complete':
                            //Process....
                            $listPendingBefore = ClaimTaskDetail::where('statusId',1)
                                ->where('claimId',$request->get('data')['idClaim'])
                                ->where('invoiceMajorNo',null)
                                ->where('invoiceTempNo','!=',null)
                                ->get();
                            if(count($listPendingBefore)!==0)
                            {
                                $data = array('Action' => 'AddNew', 'Error' => 'DeleteBill');
                            }
                            else {
                                //get invoiceMajorNo
                                $invoiceMajorNo = $this->getInvoiceMajorNo();
                                //add new one row bill complete to table task
                                $claimTaskDetail = new ClaimTaskDetail();
                                $claimTaskDetail->professionalServices = 1;
                                $claimTaskDetail->professionalServicesTime = 0;
                                $claimTaskDetail->professionalServicesNote = 'Interim Billing Complete';
                                $claimTaskDetail->billDate = $toDate;
                                $claimTaskDetail->active = 1;
                                $claimTaskDetail->statusId = 2;
                                $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                                $claimTaskDetail->invoiceDate = $toDate;
                                $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                                $claimTaskDetail->userId = Auth::user()->id;
                                $claimTaskDetail->createdBy = Auth::user()->id;
                                $claimTaskDetail->save();
                                //Add one row to table bill
                                $bill = new Bill();
                                $bill->billToId = $request->get('data')['billToCustomer'];
                                $bill->claimId = $request->get('data')['idClaim'];
                                $bill->billId = $claimTaskDetail->id;
                                $bill->total = $request->get('data')['Total'];
                                $bill->createdBy = Auth::user()->id;
                                $bill->updatedBy = Auth::user()->id;
                                $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                $bill->policyNumber = $request->get('data')['policy'];
                                $bill->percentage = $request->get('data')['discount'];
                                $bill->professionalServices = $request->get('data')['professionalDiscount'];
                                $bill->save();
                                //Add new invoice
                                $invoice = new Invoice();
                                $invoice->idBill = $bill->id;
                                $invoice->invoiceDay = $claimTaskDetail->billDate;
                                $invoice->invoiceMajorNo = $invoiceMajorNo;
                                $invoice->corInsurer = $request->get('data')['coorInsurer'];
                                $invoice->save();
                                //Add new details
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $user = User::where('name', $item[0])->first();
                                    if ($user) {
                                        //table professional_services
                                        $professionalServices = new ProfessionalService();
                                        $professionalServices->billId = $bill->id;
                                        $professionalServices->userId = $user->id;
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
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
                                //insert all row of table claimtaskdetail after have invoice
                                $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '<=', $fromDate)
                                    ->where('invoiceMajorNo', null)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                if ($listClaimTaskDetailV2 != null) {
                                    foreach ($listClaimTaskDetailV2 as $item) {
                                        array_push($listClaimTaskDetailV2, $item);
                                    }
                                }
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                    if ($task) {
                                        $task->active = 1;
                                        $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                        $task->invoiceDate = $invoice->invoiceDay;
                                        $task->save();
                                        //c?p nh?t rate thay ??i
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $idUser = User::where('name', $item[0])->first()->id;
                                            if ($idUser) {
                                                $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                                if ($task->userId == $idUser) {
                                                    if ($checkRateDefault != $item[2]) {
                                                        $task->professionalServicesRateBillValue = $item[2];
                                                        $task->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $data = array('Action' => 'AddNew', 'Error' => 'null');
                                break;
                            }
                    }
                }
                else //bill type FB
                {
                    switch($billStatus)
                    {
                        case 'pending':
                            //Process....
                            $listPendingBefore = ClaimTaskDetail::where('statusId',1)
                                ->where('claimId',$request->get('data')['idClaim'])
                                ->where('invoiceMajorNo',null)
                                ->where('invoiceTempNo','!=',null)
                                ->get();
                            if(count($listPendingBefore)!==0)
                            {
                                $data = array('Action' => 'AddNew', 'Error' => 'DeleteBill');
                            }
                            else
                            {
                                //get invoiceMajorNo
                                $invoiceMajorNo = $this->getInvoiceMajorNo();
                                //Add new row task final bill
                                $claimTaskDetail = new ClaimTaskDetail();
                                $claimTaskDetail->professionalServices = 2;
                                $claimTaskDetail->professionalServicesTime = 0;
                                $claimTaskDetail->professionalServicesNote = 'Final Billing Pending';
                                $claimTaskDetail->billDate = $toDate;
                                $claimTaskDetail->active = 1;
                                $claimTaskDetail->statusId = 3;
                                $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                                $claimTaskDetail->invoiceDate = $toDate;
                                $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                                $claimTaskDetail->userId = Auth::user()->id;
                                $claimTaskDetail->createdBy = Auth::user()->id;
                                $claimTaskDetail->save();
                                //Add new bill
                                $bill = new Bill();
                                $bill->billToId = $request->get('data')['billToCustomer'];
                                $bill->claimId = $request->get('data')['idClaim'];
                                $bill->billId = $claimTaskDetail->id;
                                $bill->total = $request->get('data')['Total'];
                                $bill->createdBy = Auth::user()->id;
                                $bill->updatedBy = Auth::user()->id;
                                $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                $bill->policyNumber = $request->get('data')['policy'];
                                $bill->percentage = $request->get('data')['discount'];
                                $bill->professionalServices = $request->get('data')['professionalDiscount'];
                                $bill->save();
                                //Add new details
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $user = User::where('name', $item[0])->first();
                                    if ($user) {
                                        //table professional_services
                                        $professionalServices = new ProfessionalService();
                                        $professionalServices->billId = $bill->id;
                                        $professionalServices->userId = $user->id;
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
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
                                //Add new invoice
                                $invoice = new Invoice();
                                $invoice->idBill = $bill->id;
                                $invoice->invoiceDay = $claimTaskDetail->billDate;
                                $invoice->invoiceMajorNo = $invoiceMajorNo;
                                $invoice->corInsurer = $request->get('data')['coorInsurer'];
                                $invoice->save();
                                //Update detail task of user
                                $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '<=', $fromDate)
                                    ->where('invoiceMajorNo', null)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                if ($listClaimTaskDetailV2 != null) {
                                    foreach ($listClaimTaskDetailV2 as $item) {
                                        array_push($listClaimTaskDetail, $item);
                                    }
                                }
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                    if ($task) {
                                        $task->active = 1;
                                        $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                        $task->invoiceDate = $invoice->invoiceDay;
                                        $task->save();

                                        //c?p nh?t rate value change
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $idUser = User::where('name', $item[0])->first()->id;
                                            if ($idUser) {
                                                $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//l?y ra rate m?c ??nh
                                                if ($task->userId == $idUser) {
                                                    if ($checkRateDefault != $item[2]) {
                                                        $task->professionalServicesRateBillValue = $item[2];
                                                        $task->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $data = array('Action' => 'AddNew', 'Error' => 'null');
                            }
                        break;
                        case 'complete':
                            //Process....
                            $listPendingBefore = ClaimTaskDetail::where('statusId',1)
                                ->where('claimId',$request->get('data')['idClaim'])
                                ->where('invoiceMajorNo',null)
                                ->where('invoiceTempNo','!=',null)
                                ->get();
                            if(count($listPendingBefore)!==0)
                            {
                                $data = array('Action' => 'AddNew', 'Error' => 'DeleteBill');
                            }
                            else
                            {
                                //close claim when bill Final bill at status complete
                                $claim = Claim::where('id',$request->get('data')['idClaim'])->first();
                                if($claim)
                                {
                                    $claim->statusId = 3;
                                    $claim->closeDate = $toDate;
                                    $claim->save();
                                }
                                //get invoiceMajorNo
                                $invoiceMajorNo = $this->getInvoiceMajorNo();
                                //Add new row task final bill
                                $claimTaskDetail = new ClaimTaskDetail();
                                $claimTaskDetail->professionalServices = 2;
                                $claimTaskDetail->professionalServicesTime = 0;
                                $claimTaskDetail->professionalServicesNote = 'Final Billing Complete';
                                $claimTaskDetail->billDate = $toDate;
                                $claimTaskDetail->active = 1;
                                $claimTaskDetail->statusId = 4;
                                $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
                                $claimTaskDetail->invoiceDate = $toDate;
                                $claimTaskDetail->claimId = $request->get('data')['idClaim'];
                                $claimTaskDetail->userId = Auth::user()->id;
                                $claimTaskDetail->createdBy = Auth::user()->id;
                                $claimTaskDetail->save();
                                //Add new bill
                                $bill = new Bill();
                                $bill->billToId = $request->get('data')['billToCustomer'];
                                $bill->claimId = $request->get('data')['idClaim'];
                                $bill->billId = $claimTaskDetail->id;
                                $bill->total = $request->get('data')['Total'];
                                $bill->createdBy = Auth::user()->id;
                                $bill->updatedBy = Auth::user()->id;
                                $bill->claimOfficer = $request->get('data')['coorInsurer'];
                                $bill->policyNumber = $request->get('data')['policy'];
                                $bill->percentage = $request->get('data')['discount'];
                                $bill->professionalServices = $request->get('data')['professionalDiscount'];
                                $bill->save();
                                //Add new details
                                foreach ($request->get('data')['ArrayData'] as $item) {
                                    $user = User::where('name', $item[0])->first();
                                    if ($user) {
                                        //table professional_services
                                        $professionalServices = new ProfessionalService();
                                        $professionalServices->billId = $bill->id;
                                        $professionalServices->userId = $user->id;
                                        $professionalServices->value = $item[4];
                                        $professionalServices->rateChange = $item[2];
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
                                //Add new invoice
                                $invoice = new Invoice();
                                $invoice->idBill = $bill->id;
                                $invoice->invoiceDay = $claimTaskDetail->billDate;
                                $invoice->invoiceMajorNo = $invoiceMajorNo;
                                $invoice->corInsurer = $request->get('data')['coorInsurer'];
                                $invoice->save();
                                //Update detail task of user
                                $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '>=', $fromDate)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                    ->where('billDate', '<=', $fromDate)
                                    ->where('invoiceMajorNo', null)
                                    ->where('billDate', '<=', $claimTaskDetail->billDate)
                                    ->where('claimId', $request->get('data')['idClaim'])
                                    ->get()->toArray();
                                if ($listClaimTaskDetailV2 != null) {
                                    foreach ($listClaimTaskDetailV2 as $item) {
                                        array_push($listClaimTaskDetail, $item);
                                    }
                                }
                                foreach ($listClaimTaskDetail as $taskDetail) {
                                    $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                    if ($task) {
                                        $task->active = 1;
                                        $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                        $task->invoiceDate = $invoice->invoiceDay;
                                        $task->save();

                                        //c?p nh?t rate value change
                                        foreach ($request->get('data')['ArrayData'] as $item) {
                                            $idUser = User::where('name', $item[0])->first()->id;
                                            if ($idUser) {
                                                $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//l?y ra rate m?c ??nh
                                                if ($task->userId == $idUser) {
                                                    if ($checkRateDefault != $item[2]) {
                                                        $task->professionalServicesRateBillValue = $item[2];
                                                        $task->save();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                $data = array('Action' => 'AddNew', 'Error' => 'null');
                            }
                        break;
                    }
                }
            }

        }
        else//Action update only bill
        {
            $fromDate = $request->get('data')['FromDate'];
            $bill = Bill::where('id', $request->get('data')['idBill'])->first();
            $taskStatus = ClaimTaskDetail::where('id', $bill->billId)->where('claimId', $request->get('data')['idClaim'])->first();
            switch($taskStatus->statusId)
            {
                case 1://Bill IB pending
                    //update -> IB complete
                    if($billStatus=='complete' && $billType=='interim_bill') // IB pending -> IB complete
                    {
                        //Update total
                        $bill->total = $request->get('data')['Total'];
                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                        $bill->policyNumber = $request->get('data')['policy'];
                        $bill->percentage = $request->get('data')['discount'];
                        $bill->professionalServices = $request->get('data')['professionalDiscount'];
                        $bill->save();
                        //Update status = 2
                        $task = ClaimTaskDetail::where('id', $bill->billId)
                            ->where('statusId', 1)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->where('lockInvoiceNo', '!=', 1)
                            ->first();
                        if ($task != null) {
                            //Update invoiceTempNo -> invoiceMajorNo
                            $invoice = Invoice::where('idBill', $bill->id)->first();
                            if ($invoice) {
                                $changeNumber = substr($invoice->invoiceTempNo, 1, 4);
                                $invoice->invoiceMajorNo = "2" . $changeNumber;
                                $invoice->invoiceDay = $task->billDate;
                                $invoice->save();

                                $task->statusId = 2;
                                $task->professionalServicesNote = "Interim Billing Complete";
                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $task->save();
                            }
                            //update list task of bill
                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                ->where('claimId', $bill->claimId)
                                ->where('active', 1)
                                ->where('billDate', '>=', $fromDate)
                                ->where('billDate', '<=', $task->billDate)
                                ->get()->toArray();
                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                ->where('claimId', $bill->claimId)
                                ->where('active', 1)
                                ->where('billDate', '<=', $fromDate)
                                ->where('invoiceMajorNo', null)
                                ->where('billDate', '<=', $task->billDate)
                                ->get()->toArray();
                            if ($listClaimTaskDetailV2 != null) {
                                foreach ($listClaimTaskDetailV2 as $item) {
                                    array_push($listClaimTaskDetail, $item);
                                }
                            }
                            foreach ($listClaimTaskDetail as $taskDetail) {
                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                if ($task) {
                                    $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                    $task->invoiceDate = $invoice->invoiceDay;
                                    $task->save();
                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                        $idUser = User::where('name', $item[0])->first()->id;
                                        if ($idUser) {
                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                            if ($task->userId == $idUser) {
                                                if ($checkRateDefault != $item[2]) {
                                                    $task->professionalServicesRateBillValue = $item[2];
                                                    $task->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        //Update details of users
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->where('active', 1)->first();
                            if ($user) {
                                //Update rate of table professionalServices
                                $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                if ($professionalServices) {
                                    $professionalServices->value = $item[4];
                                    $professionalServices->rateChange = $item[2];
                                    $professionalServices->save();
                                }
                                //Update table total
                                $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                if ($total) {
                                    $total->value = $item[11];
                                    $total->save();
                                }
                            }
                        }
                        $data = array('Action' => 'Update', 'Error' => 'null');
                    }
                    //update -> FB complete
                    if($billType=='final_bill') // IB pending -> Final
                    {
                        //Update total
                        $bill->total = $request->get('data')['Total'];
                        $bill->claimOfficer = $request->get('data')['coorInsurer'];
                        $bill->policyNumber = $request->get('data')['policy'];
                        $bill->percentage = $request->get('data')['discount'];
                        $bill->professionalServices = $request->get('data')['professionalDiscount'];
                        $bill->save();
                        //Update status = 2
                        $task = ClaimTaskDetail::where('id', $bill->billId)
                            ->where('statusId', 1)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->first();
                        if ($task != null) {
                            //Update invoiceTempNo -> invoiceMajorNo
                            $invoice = Invoice::where('idBill', $bill->id)->first();
                            if ($invoice) {
                                $changeNumber = substr($invoice->invoiceTempNo, 1, 4);
                                $invoice->invoiceMajorNo = "2" . $changeNumber;
                                $invoice->invoiceDay = $task->billDate;
                                $invoice->save();

                                $task->statusId = 4;
                                $task->professionalServices = 2;
                                $task->professionalServicesNote = 'Final Billing Complete';
                                $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                $task->save();
                            }
                            //update c�c c�ng vi?c c?a bill
                            $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                                ->where('claimId', $bill->claimId)
                                ->where('active', 1)
                                ->where('billDate', '>=', $fromDate)
                                ->where('billDate', '<=', $task->billDate)
                                ->get()->toArray();
                            $listClaimTaskDetailV2 = ClaimTaskDetail::where('statusId', 0)
                                ->where('claimId', $bill->claimId)
                                ->where('active', 1)
                                ->where('billDate', '<=', $fromDate)
                                ->where('invoiceMajorNo', null)
                                ->where('billDate', '<=', $task->billDate)
                                ->get()->toArray();
                            if ($listClaimTaskDetailV2 != null) {
                                foreach ($listClaimTaskDetailV2 as $item) {
                                    array_push($listClaimTaskDetail, $item);
                                }
                            }
                            foreach ($listClaimTaskDetail as $taskDetail) {
                                $task = ClaimTaskDetail::where('id', $taskDetail["id"])->first();
                                if ($task) {
                                    $task->invoiceMajorNo = $invoice->invoiceMajorNo;
                                    $task->invoiceDate = $invoice->invoiceDay;
                                    $task->save();
                                    foreach ($request->get('data')['ArrayData'] as $item) {
                                        $idUser = User::where('name', $item[0])->first()->id;
                                        if ($idUser) {
                                            $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//check rate default vs rate change
                                            if ($task->userId == $idUser) {
                                                if ($checkRateDefault != $item[2]) {
                                                    $task->professionalServicesRateBillValue = $item[2];
                                                    $task->save();
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        //Update details of users
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $user = User::where('name', $item[0])->where('active', 1)->first();
                            if ($user) {
                                //Update rate of table professionalServices
                                $professionalServices = ProfessionalService::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                if ($professionalServices) {
                                    $professionalServices->value = $item[4];
                                    $professionalServices->rateChange = $item[2];
                                    $professionalServices->save();
                                }
                                //Update table total
                                $total = Total::where('billId', $request->get('data')['idBill'])->where('userId', $user->id)->first();
                                if ($total) {
                                    $total->value = $item[11];
                                    $total->save();
                                }
                            }
                        }
                        //close claim
                        $claim = Claim::where('id',$bill->claimId)->first();
                        if($claim)
                        {
                            $claim->closeDate =$taskStatus->invoiceDate;
                            $claim->statusId = 3;
                            $claim->save();
                        }
                        $data = array('Action' => 'Update', 'Error' => 'null');
                    }
                    break;
                case 2://Bill IB complete
                    //just only update -> FBComplete
                    $claim = Claim::where('id',$bill->claimId)->first();
                    if($claim)
                    {
                        if($claim->statusId==3)
                        {
                            $data = array('Action' => 'Update', 'Error' => 'ClaimClose');
                        }
                        else
                        {
                            //get task complete before
                            $complete  = ClaimTaskDetail::where('claimId',$request->get('data')['idClaim'])
                                                        ->where('statusId','>',1)
                                                        ->where('id','!=',$taskStatus->id)
                                                        ->where('billDate','>',$taskStatus->billDate)
                                                        ->get();
                            if(count($complete) > 0)
                            {
                                $data = array('Action' => 'Update', 'Error' => 'UpdateBillFinal');
                            }
                            else
                            {
                                $bill->total = $request->get('data')['Total'];
                                $bill->percentage = $request->get('data')['discount'];
                                $bill->professionalServices = $request->get('data')['professionalDiscount'];
                                $bill->save();
                                $taskStatus->statusId =4;
                                $taskStatus->professionalServices = 2;
                                $taskStatus->professionalServicesNote = 'Final Billing Complete';
                                $taskStatus->save();
                                //Close claim
                                $claim->closeDate =$taskStatus->invoiceDate;
                                $claim->statusId = 3;
                                $claim->save();
                                $data = array('Action' => 'Update', 'Error' => 'null');
                            }
                        }
                    }
                    break;
                case 3://Bill FB pending
                    //just only update -> FBComplete
                    $claim = Claim::where('id',$bill->claimId)->first();
                    if($claim)
                    {
                        if($claim->statusId==3)
                        {
                            $data = array('Action' => 'Update', 'Error' => 'ClaimClose');
                        }
                        else
                        {
                            $bill->total = $request->get('data')['Total'];
                            $bill->percentage = $request->get('data')['discount'];
                            $bill->professionalServices = $request->get('data')['professionalDiscount'];
                            $bill->save();
                            $taskStatus->statusId = 4;
                            $taskStatus->professionalServicesNote = 'Final Billing Complete';
                            $taskStatus->save();
                            //Close claim
                            $claim->closeDate =$taskStatus->invoiceDate;
                            $claim->statusId = 3;
                            $claim->save();
                            $data = array('Action' => 'Update', 'Error' => 'null');
                        }
                    }
                    break;
                case 4: //Bill FB complete
                    break;
            }

        }
        return $data;
    }

    public function discountBill(Request $request)
    {
        $data = null;
        try
        {
            $bill = Bill::where('id', $request->get('idBill'))->first();
            if($bill)
            {
                $claim = Claim::where('id',$bill->claimId)->first();
                if($claim->statusId==3)
                {
                    $data = array('Error' => 'claimClose');
                }
                else
                {
                    $bill->total = $request->get('totalDiscount');
                    $bill->percentage = $request->get('discount');
                    $bill->save();
                    $data = array('Error' => 'null');
                }
            }
            else
            {
                $data = array('Error' => 'Error');
            }

        }
        catch(Exception $ex)
        {
            $data = array('Error' => 'Error');
        }
        return $data;
    }

    public function getViewChangePassword()
    {
        return view('admin.changePassword');
    }

    public function saveChangePassword(Request $request)
    {
        $bRe = null;
        try
        {
            $user = User::where('id', $request->get('idUser'))
                ->first();
            if($user)
            {
                $password = decrypt($user->password,Config::get('app.key'));
                if($password == $request->get('passwordCurrent'))
                {
                    $user->password = encrypt($request->get('passwordNew'), Config::get('app.key'));
                    $user->save();
                    $bRe = 1;
                }
            }
        }
        catch(Exception $ex)
        {
            $bRe = 0;
        }
        return $bRe;
    }
    public function getAllEmployeesChangePassword()
    {
        $data = null;
        try {
            $data = User::all();
        } catch (Exception $ex) {
            return $ex;
        }
        return view('admin.viewGetAllEmployeesChangePassword')->with('listEmployee', $data);
    }
    //demo


}