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
                    $checkIBAndFB = ClaimTaskDetail::where('statusId', 2)
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
                            ->where('claim_task_details.professionalServices', '!=', 1)
                            ->where('claim_task_details.professionalServices', '!=', 2)
                            ->where('claim_task_details.claimId', '=', $claim->id)
                            ->where('claim_task_details.billDate', '>', $date)
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
                            ->where('claim_task_details.professionalServices', '!=', 1)
                            ->where('claim_task_details.professionalServices', '!=', 2)
                            ->where('claim_task_details.expense', '!=', 0)
                            ->where('claim_task_details.claimId', '=', $claim->id)
                            ->where('claim_task_details.billDate', '>', $date)
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
                ->join('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
                ->where('claim_task_details.claimId', $request->get('idClaim'))
                ->select(
                    'bills.id as idBill',
                    'bills.billToId as customer',
                    'statuses.name as status',
                    'bills.total as total',
                    'claim_task_details.professionalServicesNote as type'
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
                            array_push($arrayAll, "Pending");
                            //check lockBillPending
                            if ($checkIBorFB->lockInvoiceNo == 1) {
                                array_push($arrayAll, "Lock");
                            } else {
                                array_push($arrayAll, "NoLock");
                            }
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
                            } else {
                                $claim = Claim::where('id', $checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate' => $claim->openDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                                $date = $claim->openDate;
                            }
                            //listTime
                            $listTime = DB::table('claim_task_details')
                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                ->where('claim_task_details.professionalServices', '!=', 1)
                                ->where('claim_task_details.professionalServices', '!=', 2)
                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                ->where('claim_task_details.billDate', '>', $date)
                                ->where('claim_task_details.billDate', '<', $checkIBorFB->billDate)
                                ->where('claim_task_details.created_at', '<', $checkIBorFB->created_at)
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
                            array_push($arrayAll,$bill->total);
                        } else {
                            //IB Complete
                            array_push($arrayAll, "Complete");
                            $date = null;
                            //Find all IB have status is compete, to known value from date to date
                            $checkIBComplete = ClaimTaskDetail::where('statusId', 2)
                                ->where('claimId', $bill->claimId)
                                ->where('billDate', '<', $checkIBorFB->billDate)
                                ->Where('id', '!=', $checkIBorFB->id)
                                ->orderBy('billDate', 'desc')
                                ->first();
                            if ($checkIBComplete) {
                                $arrayDate = array('FromDate' => $checkIBComplete->billDate, 'ToDate' => $checkIBorFB->billDate);
                                array_push($arrayAll, $arrayDate);
                                $date = $checkIBComplete->billDate;
                            } else {
                                $claim = Claim::where('id', $checkIBorFB->claimId)->first();
                                $arrayDate = array('FromDate' => $claim->openDate, 'ToDate' => $checkIBorFB->billDate);
                                $date = $claim->openDate;
                                array_push($arrayAll, $arrayDate);
                            }
                            //Take data of user in bill follow form date to date
                            $listTime = DB::table('claim_task_details')
                                ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                                ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                                ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                                ->where('claim_task_details.professionalServices', '!=', 1)
                                ->where('claim_task_details.professionalServices', '!=', 2)
                                ->where('claim_task_details.claimId', '=', $checkIBorFB->claimId)
                                ->where('claim_task_details.billDate', '>', $date)
                                ->where('claim_task_details.billDate', '<', $checkIBorFB->billDate)
                                ->where('claim_task_details.active', '=', 1)
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
                            array_push($arrayAll,$bill->total);
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
                $lossDateFR = $request->get("claim")['lossDate'] . " " . $timeLossDateNow->hour . ":" . $timeLossDateNow->minute . ":" . $timeLossDateNow->second;

                $timeReceiveDateNow = Carbon::now();
                $receiveDateFR = $request->get("claim")['receiveDate'] . " " . $timeReceiveDateNow->hour . ":" . $timeReceiveDateNow->minute . ":" . $timeReceiveDateNow->second;

                $openDateFR = $request->get("claim")['openDate'] . " " . "00" . ":" . "00" . ":" . "00";
                //check claimId the same
                $checkClaim = Claim::where('code', $request->get("claim")['code'])->first();
                if ($checkClaim != null) {
                    $checkErrorClaimSame = "True";
                } else {
                    $checkErrorClaimSame = "False";
                }

                if ($lossDateFR > $receiveDateFR) {
                    $result = array('Action' => 'AddNew', 'Error' => 'LossDate>ReceiveDate');
                } else if ($lossDateFR > $openDateFR) {
                    $result = array('Action' => 'AddNew', 'Error' => 'LossDate>OpenDate');
                } else if ($checkErrorClaimSame == "True") {
                    $result = array('Action' => 'AddNew', 'Error' => 'TheSameCodeClaim');
                } else {
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
                $lossDateFR = $request->get("claim")['lossDate'] . " " . $timeLossDateNow->hour . ":" . $timeLossDateNow->minute . ":" . $timeLossDateNow->second;

                $timeReceiveDateNow = Carbon::now();
                $receiveDateFR = $request->get("claim")['receiveDate'] . " " . $timeReceiveDateNow->hour . ":" . $timeReceiveDateNow->minute . ":" . $timeReceiveDateNow->second;

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
                if ($lossDateFR > $receiveDateFR) {
                    $result = array('Action' => 'Update', 'Error' => 'LossDate>ReceiveDate');
                } else if ($lossDateFR > $openDateFR) {
                    $result = array('Action' => 'Update', 'Error' => 'LossDate>OpenDate');
                } else if ($countErrorOpenDate > 0) {
                    $result = array('Action' => 'Update', 'Error' => 'CantUpdateOpenDate');
                } else if ($countErrorReceiveDate > 0) {
                    $result = array('Action' => 'Update', 'Error' => 'CantUpdateReceiveDate');
                } else {
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
                            $claimDetail = ClaimTaskDetail::orderBy('billDate', 'desc')->first();
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
        $toDate = $request->get('toDate') . " " . "23:59:59";
        try {
            if ($request->get('key') != null) {
                $claim = Claim::where('code', $request->get('key'))->first();
                if ($claim) {
                    //load data
                    $listTime = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('rate_details', 'claim_task_details.userId', '=', 'rate_details.userId')
                        ->leftJoin('rate_types', 'rate_details.rateTypeId', '=', 'rate_types.id')
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
                        ->where('claim_task_details.claimId', '=', $claim->id)
                        ->where('claim_task_details.billDate', '>', $fromDate)
                        ->where('claim_task_details.billDate', '<', $toDate)
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
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
                        ->where('claim_task_details.expense', '!=', 0)
                        ->where('claim_task_details.claimId', '=', $claim->id)
                        ->where('claim_task_details.billDate', '>', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->groupBy('users.name')
                        ->groupBy('claim_task_details.expense')
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
                ->join('claim_task_details', 'bills.billId', '=', 'claim_task_details.id')
                ->join('task_categories', 'claim_task_details.professionalServices', '=', 'task_categories.id')
                ->join('claims', 'claim_task_details.claimId', '=', 'claims.id')
                ->join('type_of_damages','claims.lossDescCode','=','type_of_damages.code')
                ->where('invoices.invoiceMajorNo', $request->get('key'))
                ->orWhere('invoices.invoiceTempNo',$request->get('key'))
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
                    'claims.policy as policy',
                    'claims.lossDate as lossDate',
                    'type_of_damages.description as descriptionLossDesc',
                    'claims.lossLocation as lossLocation',
                    'invoices.nameBank as nameBank',
                    'invoices.exchangeRate as exchangeRate',
                    'invoices.dateExchangeRate as dateExchangeRate',
                    'invoices.addressBank as addressBank'
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
                    $checkDateIBcompleteFB = ClaimTaskDetail::where('statusId', 2)->where('claimId', $claim->id)->orderBy('billDate', 'desc')->first();
                        if ($checkDateIBcompleteFB != null) {
                            $date = $checkDateIBcompleteFB->billDate;
                        } else {
                            $date = $claim->openDate;
                        }
                        $a = explode(" ", $date);
                        $aFR = Carbon::parse($a[0])->format('d-m-Y') . " " . $a[1];
                        $result = array('Status' => 'Success', 'Claim' => $claim, 'Date' => $aFR);

                } else {
                    $result = array('Status' => 'notFoundClaim');
                }
            }
        } catch (Exception $ex) {
            return null;
        }
        return $result;
    }

    public function loadViewDocketDetail($sort_type,Request $request)
    {
        switch ($sort_type){
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
                            'claim_task_details.invoiceTempNo as invoiceTempNo'
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
                            'claim_task_details.invoiceTempNo as invoiceTempNo'
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
                            'claim_task_details.invoiceTempNo as invoiceTempNo'
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
        //dd($request->all());
        $result = null;
        $idTime = 0;
        $idExpense = 0;
        //Check date
        $now = Carbon::now();
        $timeNow = Carbon::parse($now)->format('Y-m-d H:i:s');
        $chooseDate = $request->get('ChooseDate') . " " . Carbon::parse($now)->format('H:i:s');

        $a = explode(" ", $request->get('FromDate'));
        $fromDate = Carbon::parse($a[0])->format('Y-m-d') . " " . $a[1];

        //get claim to check assignment task when claim closed
        $claimClosed = Claim::where('id',$request->get('taskObject')['ClaimId'])->first();
        if ($chooseDate < $fromDate) {
            $result = array('Action' => 'ErrorDate');
        } else if ($chooseDate > $timeNow) {
            $result = array('Action' => 'ErrorDateNow');
        }
        else if($claimClosed->statusId===3)
        {
            $result = array('Action' => 'ErrorClaimClose');
        }
        else {
            if ($request->get('action') == 1) { // assignment task
                try {
                    $userTask = User::where('name', $request->get('taskObject')['UserId'])->first();
                    if ($userTask) {
                        if ($request->get('taskObject')['ProfessionalServices'] != null) {
                            $idTime = TaskCategory::where('code', $request->get('taskObject')['ProfessionalServices'])
                                ->where('name','TimeCode')
                                ->first()->id;
                        }
                        if ($request->get('taskObject')['Expense'] != null) {
                            $idExpense = TaskCategory::where('code', $request->get('taskObject')['Expense'])
                                ->where('name','!=','TimeCode')
                                ->first()->id;
                        }
                        $task = new ClaimTaskDetail();
                        $task->professionalServices = $idTime;
                        $task->professionalServicesNote = $request->get('taskObject')['ProfessionalServicesNote'];

                        if ($request->get('taskObject')['ProfessionalServicesTime'] != null) {
                            $task->professionalServicesTime = $request->get('taskObject')['ProfessionalServicesTime'];
                        }
                        $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                        if ($request->get('taskObject')['ProfessionalServicesAmount'] != null) {
                            $task->professionalServicesAmount = $request->get('taskObject')['ProfessionalServicesAmount'];
                        }

                        $task->expense = $idExpense;
                        $task->expenseNote = $request->get('taskObject')['ExpenseNote'];
                        if ($request->get('taskObject')['ExpenseAmount'] != null) {
                            $task->expenseAmount = $request->get('taskObject')['ExpenseAmount'];
                        }

                        $task->active = 0;
                        $task->claimId = $request->get('taskObject')['ClaimId'];
                        $task->userId = $userTask->id;
                        $task->createdBy = Auth::user()->id;
                        $task->billDate = $chooseDate;
                        $task->save();
                        $result = array('Action' => 'AddNew', 'Result' => 1);
                    } else {
                        $result = array('Action' => 'AddNew', 'Result' => 3);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }

            } else { //update assignment task
                try {
                    if ($request->get('idTask')) {
                        $task = ClaimTaskDetail::where('id', $request->get('idTask'))->first();
                        if ($task) {
                            //check invoice to update
                            if ($task->invoiceMajorNo != null) {
                                $result = array('Action' => 'Update', 'Result' => 2);
                            } //check bill pending to update
                            else if ($task->active == 1) {
                                $result = array('Action' => 'Update', 'Result' => 3);
                            } else {
                                if ($request->get('taskObject')['ProfessionalServices'] != null) {
                                    $idTime = TaskCategory::where('code', $request->get('taskObject')['ProfessionalServices'])->first()->id;
                                }
                                if ($request->get('taskObject')['Expense'] != null) {
                                    $idExpense = TaskCategory::where('code', $request->get('taskObject')['Expense'])->first()->id;
                                }
                                $task->professionalServices = $idTime;
                                $task->professionalServicesNote = $request->get('taskObject')['ProfessionalServicesNote'];

                                if ($request->get('taskObject')['ProfessionalServicesTime'] != null) {
                                    $task->professionalServicesTime = $request->get('taskObject')['ProfessionalServicesTime'];
                                }
                                $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                                if ($request->get('taskObject')['ProfessionalServicesAmount'] != null) {
                                    $task->professionalServicesAmount = $request->get('taskObject')['ProfessionalServicesAmount'];
                                }

                                $task->expense = $idExpense;
                                $task->expenseNote = $request->get('taskObject')['ExpenseNote'];
                                if ($request->get('taskObject')['ExpenseAmount'] != null) {
                                    $task->expenseAmount = $request->get('taskObject')['ExpenseAmount'];
                                }

                                $task->billDate = $chooseDate;
                                $task->updatedBy = Auth::user()->id;
                                $task->save();
                                $result = array('Action' => 'Update', 'Result' => 1);
                            }

                        }
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
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
            ->leftJoin('claim_task_details','bills.billId','=','claim_task_details.id')
            ->leftJoin('statuses','claim_task_details.statusId','=','statuses.id')
            ->where('claims.code', '=', $claim_id)
            ->select(
                'invoices.invoiceMajorNo as invoice_id',
                'invoices.invoiceTempNo as invoice_temp',
                'claims.code as claim_id',
                'bills.id as bill_id',
                'invoices.created_at as invoice_date',
                'statuses.name as invoiceType'
            )->get();
        return [
            'status' => 'success',
            'data' => $result
        ];
    }

    public function getReportData($invoice_major_no, $bill_id, $claim_code)
    {
        $claim = Claim::where('code', $claim_code)->first();
        $branch = Branch::where('code', $claim->branchCode)->first();
        $insuranceDetail = InsuranceDetail::where('code', $claim->claimTypeCode)->first();
        $extendOfDamage = ExtendOfDamage::where('code', $claim->lossDescCode)->first();
        $adjuster = User::where('name', $claim->adjusterCode)->first();
        $sourceCode = SourceCustomer::where('code', $claim->sourceCode)->first();
        $docket_backup = DB::table('claim_task_details')
            ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
            ->leftJoin('task_categories as pro', 'claim_task_details.professionalServices', '=', 'pro.id')
            ->leftJoin('task_categories as ex', 'claim_task_details.expense', '=', 'ex.id')
            ->where('claim_task_details.invoiceMajorNo', '=', $invoice_major_no)
            ->select(
                'claim_task_details.professionalServicesNote',
                'pro.description as professionalServicesNoteDes',
                'claim_task_details.professionalServicesTime',
                'claim_task_details.expenseNote',
                'ex.description as expenseNoteDes',
                'claim_task_details.expenseAmount',
                'claim_task_details.created_at',
                'claim_task_details.userId',
                'claim_task_details.invoiceMajorNo',
                'claim_task_details.invoiceDate',
                'pro.code as professionalServices',
                'ex.code as expense',
                'users.name as adjusterCode'
            )->get();
        $docket = ClaimTaskDetail::where('invoiceMajorNo', $invoice_major_no)->orderBy('created_at', 'asc')->get();
        $assit_array = [];
        foreach ($docket->groupBy('userId') as $key => $value) {
            $assit_detail = User::where('id', $key)->first();
            $rate = RateDetail::where('userId', $assit_detail->id)->first();
            $sum = collect($value)->sum('professionalServicesTime');
            array_push($assit_array, [
                'assit' => $assit_detail,
                'time' => $sum,
                'branch' => $branch->code,
                'rate' => $rate->value
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
                'insuredName' => $claim->insuredName,
                'insuredClaim' => $claim->insuredClaim,
                'tradingAs' => $claim->tradingAs,
                'claimTypeCode' => $claim->claimTypeCode,
                'claimTypeCodeDetail' => $insuranceDetail->name,
                'lossDescCode' => $claim->lossDescCode,
                'lossDescCodeDetail' => $extendOfDamage == null ? '' : $extendOfDamage->name,
                'catastrophicLoss' => $claim->catastrophicLoss,
                'sourceCode' => $claim->sourceCode,
                'sourceCodeDetail' => $sourceCode->name,
                'insurerCode' => $claim->insurerCode,
                'branchCode' => $claim->branchCode,
                'branchCodeDetail' => $branch->name,
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
                'rate' => $claim->rate,
                'taxable' => $claim->taxable,
                'taxable' => $claim->taxable
            ],
            'bill' => [
                'billToId' => $bill->billToId,
                'claimOfficer' => $bill->claimOfficer,
                'policyNumber' => $bill->policyNumber
            ],
            'assit' => $assit_array,
            'docket' => $docket_backup,
            'print_date' => date('d-m-Y H:i:s')
        ];
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

    public function Bill(Request $request)
    {

        //dd($request->all());
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
                        //Find bill complete or final bill final
                        $billCompleteFinalBill = ClaimTaskDetail::where('statusId', 2)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->orderBy('billDate', 'desc')
                            ->first();

                        if ($billCompleteFinalBill == null) {
                            //New
                            //Find bill pending not lockeInvoiceNo
                            $IBPending = ClaimTaskDetail::where('statusId', 1)
                                ->where('claimId', $request->get('data')['idClaim'])
                                ->where('lockInvoiceNo', 0)
                                ->orderBy('invoiceTempNo', 'desc')
                                ->first();
                            if ($IBPending != null) {
                                $IBPending->lockInvoiceNo = 1;
                                $IBPending->save();
                                $invoiceTempNo = $IBPending->invoiceTempNo + 1;
                            } else {
                                $invoice = Invoice::orderBy('invoiceTempNo','desc')->first();
                                if($invoice!=null)
                                {
                                    $invoiceTempNo = $invoice->invoiceTempNo +1;
                                }
                                else
                                {
                                    $invoiceTempNo = 10000;
                                }

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
                                //$invoiceTempNo = 10000;
                                $invoiceTempNo = ((int)("1" . substr($billCompleteFinalBill->invoiceMajorNo, 1, 4))) + 1;
                            } else {
                                $IBPending->lockInvoiceNo = 1;
                                $IBPending->save();
                                //Find invoiceTempNo next
                                $invoiceFind = Invoice::orderBy('invoiceTempNo', 'desc')->first();
                                if ($invoiceFind != null) {
                                    $invoiceTempNo = $invoiceFind->invoiceTempNo + 1;
                                }
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
                        $claimTaskDetail->userId = Auth::user()->id;
                        $claimTaskDetail->createdBy = Auth::user()->id;
                        $claimTaskDetail->save();
                        //Add new row
                        $bill = new Bill();
                        $bill->billToId = $request->get('data')['billToCustomer'];
                        $bill->claimId = $request->get('data')['idClaim'];
                        $bill->billId = $claimTaskDetail->id;
                        $bill->total = $request->get('data')['Total'];
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
                        $listClaimTaskDetail = ClaimTaskDetail::where('statusId', 0)
                            ->where('billDate', '>=', $fromDate)
                            ->where('billDate', '<=', $claimTaskDetail->billDate)
                            ->where('claimId', $request->get('data')['idClaim'])
                            ->get();
                        foreach ($listClaimTaskDetail as $taskDetail) {
                            //update active
                            $taskDetail->active = 1;
                            //update invoiceMajorNo
                            $taskDetail->invoiceTempNo = $invoiceTempNo;
                            $taskDetail->save();
                            //Update rate change
                            foreach ($request->get('data')['ArrayData'] as $item) {
                                $idUser = User::where('name', $item[0])->first()->id;
                                if ($idUser) {
                                    $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;
                                    if ($taskDetail->userId == $idUser) {
                                        if ($checkRateDefault != $item[2]) {
                                            $taskDetail->professionalServicesRateBillValue = $item[2];
                                            $taskDetail->save();
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
                        $invoiceCount = Invoice::all();
                        if (count($invoiceCount)>0) {
                            $invoiceTemp = Invoice::orderBy('invoiceTempNo','desc')->first();
                            if($invoiceTemp)
                            {
                                $invoiceMajorNo = ((int)("2" . substr($invoiceTemp->invoiceTempNo, 1, 4))) + 1;
                            }
                            else
                            {
                                $invoiceMajorNo = ((int)Invoice::orderBy('invoiceMajorNo','desc')->first()->invoiceMajorNo) +1;
                            }
                        } else {
                            $invoiceMajorNo = 20000;
                        }
                        //add new one row bill complete to table task
                        $claimTaskDetail = new ClaimTaskDetail();
                        $claimTaskDetail->professionalServices = 1;
                        $claimTaskDetail->professionalServicesTime = 0;
                        $claimTaskDetail->professionalServicesNote = 'Interim Billing';
                        $claimTaskDetail->billDate = $toDate;
                        $claimTaskDetail->active = 1;
                        $claimTaskDetail->statusId = 2;
                        $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
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
                            ->get();
                        foreach ($listClaimTaskDetail as $taskDetail) {
                            $taskDetail->active = 1;
                            $taskDetail->invoiceMajorNo = $invoice->invoiceMajorNo;
                            $taskDetail->invoiceDate = $invoice->invoiceDay;
                            $taskDetail->save();
                            //c?p nh?t rate thay ??i
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
                        $data = array('Action' => 'AddNew', 'Error' => 'null');


                    }
                    //End bill complete
                } //End Interim Bill
                else //Add new final bill
                {
                    //get invoiceMajorNo
                    $invoiceCount = Invoice::all();
                    if (count($invoiceCount)>0) {
                        $invoiceTemp = Invoice::orderBy('invoiceTempNo','desc')->first();
                        if($invoiceTemp)
                        {
                            $invoiceMajorNo = ((int)("2" . substr($invoiceTemp->invoiceTempNo, 1, 4))) + 1;
                        }
                        else
                        {
                            $invoiceMajorNo = ((int)Invoice::orderBy('invoiceMajorNo','desc')->first()->invoiceMajorNo) +1;
                        }
                    } else {
                        $invoiceMajorNo = 20000;
                    }
                    //Add new row task final bill
                    $claimTaskDetail = new ClaimTaskDetail();
                    $claimTaskDetail->professionalServices = 2;
                    $claimTaskDetail->professionalServicesTime = 0;
                    $claimTaskDetail->professionalServicesNote = 'Final Billing';
                    $claimTaskDetail->billDate = $toDate;
                    $claimTaskDetail->active = 1;
                    $claimTaskDetail->statusId = 2;
                    $claimTaskDetail->invoiceMajorNo = $invoiceMajorNo;
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
                        ->get();
                    foreach ($listClaimTaskDetail as $taskDetail) {
                        $taskDetail->active = 1;
                        $taskDetail->invoiceMajorNo = $invoice->invoiceMajorNo;
                        $taskDetail->invoiceDate = $invoice->invoiceDay;
                        $taskDetail->save();
                        //c?p nh?t rate value change
                        foreach ($request->get('data')['ArrayData'] as $item) {
                            $idUser = User::where('name', $item[0])->first()->id;
                            if ($idUser) {
                                $checkRateDefault = RateDetail::where('userId', $idUser)->first()->value;//l?y ra rate m?c ??nh
                                if ($taskDetail->userId == $idUser) {
                                    if ($checkRateDefault != $item[2]) {
                                        $taskDetail->professionalServicesRateBillValue = $item[2];
                                        $taskDetail->save();
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
                $claimClose = Claim::where('id',$request->get('data')['idClaim'])->first();
                if($claimClose)
                {
                    if($claimClose->statusId==3)
                    {
                        $data = array('Action' => 'Update', 'Error' => 'ClaimClose');
                    }
                    else
                    {
                        $bill = Bill::where('id', $request->get('data')['idBill'])->first();
                        if ($bill) {
                            //check bill has already bill complete???
                            $taskBill = ClaimTaskDetail::where('id',$bill->billId)->where('claimId',$request->get('data')['idClaim'])->first();
//                          dd($taskBill);
                            if($taskBill)
                            {
                                //dd($taskBill->statusId);
                                if($taskBill->statusId==1)
                                {
                                    //Update bill from pending to complete
                                    if ($request->get('data')['billStatus'] == 'complete') {
                                        //Update total
                                        $bill->total = $request->get('data')['Total'];
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
                                                ->where('billDate', '>=', $fromDate)
                                                ->where('billDate', '<=', $task->billDate)
                                                ->where('claimId', $bill->claimId)
                                                ->where('active', 1)
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
                                else
                                {
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
                ->where('code',$request->get('Code'))->first();
            if($time)
            {
                return $time;
            }
            else
            {
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
                ->where('code',$request->get('Code'))->first();
            if($expense)
            {
                return $expense;
            }
            else
            {
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
        $sumTime =0;
        $sumExpenseAmount =0;
        $fromDate = $request->get('fromDate')." "."00:00:00";
        $toDate = $request->get('toDate')." "."23:59:59";
        if ($request->get('allClaim') === 'True') {
            try {

                $claimTask = DB::table('claim_task_details')
                    ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                    ->leftJoin('task_categories as cate1','claim_task_details.professionalServices','=','cate1.id')
                    ->leftJoin('task_categories as cate2','claim_task_details.expense','=','cate2.id')
                    ->where('claim_task_details.billDate', '>=', $fromDate)
                    ->where('claim_task_details.billDate', '<=', $toDate)
                    ->where('claim_task_details.userId',$request->get('userId'))
                    ->orderBy('claim_task_details.billDate','asc')
                    ->select(
                        'claim_task_details.billDate as CreatedDate',
                        'claims.code as Claim',
                        'cate1.code as Time',
                        'claim_task_details.professionalServicesTime as Unit',
                        'cate2.code as ExpenseCode',
                        'claim_task_details.expenseAmount as ExpenseAmount',
                        'claim_task_details.invoiceMajorNo as Invoice'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmountTotal'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as unitsTotal')
                    )
                    ->get();
                $timeTotal = ClaimTaskDetail::where('userId',$request->get('userId'))->get();
                $collectTimeTotal = collect($timeTotal);
                if(count($claimTask)>0)
                {
                    $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                    $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                }
                $arrayData = array('ListData'=>$claimTask,'SumTime'=>$sumTime,'SumExpenseAmount'=>$sumExpenseAmount);


            }
            catch (Exception $ex) {

            }
        } else // report only claim
        {
            try {
                $claim = Claim::where('code', $request->get('claimCode'))->first();
                if ($claim) {
                    $claimTask = DB::table('claim_task_details')
                        ->leftJoin('claims', 'claim_task_details.claimId', '=', 'claims.id')
                        ->leftJoin('task_categories as cate1','claim_task_details.professionalServices','=','cate1.id')
                        ->leftJoin('task_categories as cate2','claim_task_details.expense','=','cate2.id')
                        ->where('claim_task_details.billDate', '>=', $fromDate)
                        ->where('claim_task_details.billDate', '<=', $toDate)
                        ->where('claim_task_details.userId',$request->get('userId'))
                        ->where('claim_task_details.claimId', $claim->id)
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
                    $timeTotal = ClaimTaskDetail::where('userId',$request->get('userId'))->where('claimId',$claim->id)->get();
                    $collectTimeTotal = collect($timeTotal);
                    if(count($claimTask)>0)
                    {
                        $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                        $sumExpenseAmount = $collectTimeTotal->sum('expenseAmount');
                    }
                    $arrayData = array('ListData'=>$claimTask,'SumTime'=>$sumTime,'SumExpenseAmount'=>$sumExpenseAmount);
                }

            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $arrayData;
    }

    public function getTimeNowServer(){
        return date('d-m-Y h:i:s');
    }

    public function deleteTask(Request $request)
    {
        $data = null;
        try
        {
            $task = ClaimTaskDetail::where('id',$request->get('idTask'))
                ->where('invoiceMajorNo',null)
                ->where('invoiceTempNo',null)
                ->first();
            if($task)
            {
                //check claim closed
                $claimClose = Claim::where('id',$task->claimId)->first();
                if($claimClose)
                {
                    if($claimClose->statusId===3)
                    {
                        $data = 0;
                    }
                    else
                    {
                        $task->delete();
                        $data = 1;
                    }
                }
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $data;
    }

    public function saveInformationOfInvoiceAfterInReport(Request $request)
    {
        $data =0;
        try
        {
            $invoice = Invoice::where('invoiceMajorNo',$request->get('invoice'))->first();
            if($invoice)
            {
                $invoice->nameBank = $request->get('bankName');
                $invoice->exchangeRate = $request->get('exchangeRate');
                $invoice->dateExchangeRate = $request->get('date')." ".Carbon::parse(Carbon::now())->format('H:i:s');
                $invoice->save();
                $data = 1;
            }
            else
            {
                $data = 2;
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $data;
    }

    //demo




}