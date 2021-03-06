<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimTaskDetail;
use App\Position;
use App\RateDetail;
use App\TaskCategory;
use App\User;
use Auth;
use Carbon\Carbon;
use Config;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\Exception;
use PhpParser\Node\Expr\Array_;
use Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function task()
    {
        $listTask = TaskCategory::where('active', 1)
            ->where('code', '!=', 'IB')
            ->where('code', '!=', 'FB')
            ->where('code', '!=', 'O2')
            ->where('name', 'TimeCode')
            ->get();
        $rate = RateDetail::where('userId', Auth::user()->id)
            ->where('active', 1)
            ->where('rateTypeId', 2)
            ->first();
        return view('user.task')->with('listTask', $listTask)->with('rateDefault', $rate->value);
    }

    public function profile()
    {
        $arrayFlat = null;
        $arrayHourly = null;
        $arrayBlend = null;
        $address = null;
        $address1 = null;
        $address2 = null;
        $userCreated = null;
        $userChanged = null;
        $position = Position::where('active', 1)->get();
        $user = User::where('active', 1)->where('id', Auth::user()->id)->first();
        if ($user) {
            $listRate = RateDetail::where('userId', $user->id)->where('active', 1)->get();
            foreach ($listRate as $item) {
                if ($item->rateTypeId == 1) {
                    $arrayFlat = $item->value;
                } else if ($item->rateTypeId == 2) {
                    $arrayHourly = $item->value;
                } else {
                    $arrayBlend = $item->value;
                }
            }
            //Addresss
            $arrayAddress = explode(";", $user->address);
            $address = $arrayAddress[0];
            $address1 = $arrayAddress[1];
            $address2 = $arrayAddress[2];
            //user Created
            $userCreated = User::where('active', 1)->where('id', $user->userID_created)->first()->name;
            if ($user->userID_changed != null) {
                $userChanged = User::where('active', 1)->where('id', $user->userID_changed)->first()->name;
            }
        }
        return view('user.profile')
            ->with('position', $position)
            ->with('user', $user)
            ->with('arrayFlat', $arrayFlat)
            ->with('arrayHourly', $arrayHourly)
            ->with('arrayBlend', $arrayBlend)
            ->with('address', $address)
            ->with('address1', $address1)
            ->with('address2', $address2)
            ->with('userCreated', $userCreated)
            ->with('userChanged', $userChanged);
    }

    public function claim()
    {
        return view('user.claim');
    }

    public function loadClaimByEventEnterKey(Request $request)
    {
        //dd($request->get('key'));sdsd
        $result = null;
        $date = null;
        try {
            if ($request->get('key')) {
                $claim = Claim::where('code', $request->get('key'))->first();
                if ($claim) {
                    $checkDateIBcompleteFB = ClaimTaskDetail::where('statusId', '>',1)->where('claimId',$claim->id)->orderBy('billDate', 'desc')->first();
                    if ($checkDateIBcompleteFB != null) {
                        $date = $checkDateIBcompleteFB->billDate;
                    } else {
                        $date = $claim->openDate;
                    }
                    $codeTotal = ClaimTaskDetail::where('claimId', $claim->id)->where('expense','<>',null)->get()->sum('professionalServicesTime');
                    $expenseTotal = ClaimTaskDetail::where('claimId', $claim->id)->where('expense','<>',null)->get()->sum('expenseAmount');
                    $result = array('Claim' => $claim, 'Date' => $date,'codeTotal'=>$codeTotal,'expenseTotal'=>$expenseTotal);
                } else {
                    $result = array('Claim' => "null", 'Date' => $date);
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
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
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
                    return view('user.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
            case '1':
                if ($request->get('idClaim')) {
                    $claim_task_detail = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->where('claim_task_details.claimId', $request->get('idClaim'))
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
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
                    return view('user.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
            case '2':
                if ($request->get('idClaim')) {
                    $claim_task_detail = DB::table('claim_task_details')
                        ->leftJoin('users', 'claim_task_details.userId', '=', 'users.id')
                        ->leftJoin('task_categories as cate1', 'claim_task_details.professionalServices', '=', 'cate1.id')
                        ->leftJoin('task_categories as cate2', 'claim_task_details.expense', '=', 'cate2.id')
                        ->where('claim_task_details.claimId', $request->get('idClaim'))
                        ->where('claim_task_details.professionalServices', '!=', 1)
                        ->where('claim_task_details.professionalServices', '!=', 2)
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
                    return view('user.viewDocketDetail')->with('claim_task_detail', $claim_task_detail);
                }
                break;
        }
    }

    public function assignmentTask(Request $request)
    {
        $action = $request->get('action');

        $idTime = 0;
        $professionalServicesTime = null;
        $professionalServicesAmount = null;
        $professionalServicesNote = null;

        $idExpense = 0;
        $expenseAmount = null;
        $expenseNote = null;

        $result = null;

        $now = Carbon::now();
        $timeNow = Carbon::parse($now)->format('Y-m-d H:i:s');
        $a = explode(" ", $request->get('fromDate'));
        $fromDate = Carbon::parse($a[0])->format('Y-m-d') . " " . $a[1];

        $toDate = $request->get('toDate') . " " . Carbon::parse($now)->format('H:i:s');

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

        //get claim to check assignment task when claim closed
        $checkClaimClose = Claim::where('id', $request->get('taskObject')['ClaimId'])->first();

        //Process.....
        switch($action)
        {
            case 1://Add new task
                //Check condition
                if($toDate < $fromDate)
                {
                    $result = array('Action' => 'AddNew', 'Result'=> 'ErrorDate');
                }
                else if($toDate > $timeNow)
                {
                    $result = array('Action' => 'AddNew', 'Result'=> 'ErrorDateNow');
                }
                else if($checkClaimClose->statusId === 3)
                {
                    $result = array('Action' => 'AddNew', 'Result'=> 'ErrorCloseClaim');
                }
                else
                {
                    try
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
                        $task->claimId = $request->get('taskObject')['ClaimId'];
                        $task->userId = $request->get('taskObject')['UserId'];
                        $task->createdBy = $request->get('taskObject')['UserId'];
                        $task->updatedBy = $request->get('taskObject')['UserId'];
                        $task->billDate = $toDate;
                        $task->save();
                        $result = array('Action' => 'AddNew', 'Result' => 'Success');

                    }
                    catch(Exception $ex)
                    {
                        return $ex;
                    }
                }
                break;
            case 0:
                if($toDate < $fromDate)
                {
                    $result = array('Action' => 'Update', 'Result'=> 'ErrorDate');
                }
                else if($toDate > $timeNow)
                {
                    $result = array('Action' => 'Update', 'Result'=> 'ErrorDateNow');
                }
                else if($checkClaimClose->statusId === 3)
                {
                    $result = array('Action' => 'Update', 'Result'=> 'ErrorCloseClaim');
                }
                else
                {
                    $task = ClaimTaskDetail::where('id', $request->get('idTask'))->where('claimId',$request->get('taskObject')['ClaimId'])->first();
                    if($task)
                    {
                        //check this task already bill
                        if ($task->active == 1 && $task->invoiceMajorNo == null) {
                            $result = array('Action' => 'Update', 'Result' => 'HasBillPending');//can't fix task has already bill Pending
                        } else if ($task->invoiceMajorNo != null) {
                            $result = array('Action' => 'Update', 'Result' => 'HasBillComplete');//can't fix task has already bill pending complete or final bill
                        } else if ($task->userId != Auth::user()->id) {
                            $result = array('Action' => 'Update', 'Result' => 'UpdateOtherUser');//can't fix task of user other
                        } else {
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
                            $task->billDate = $toDate;
                            $task->updatedBy = $request->get('taskObject')['UserId'];
                            $task->save();
                            $result = array('Action' => 'Update', 'Result' => 'Success');
                        }
                    }
                }
                break;
        }
        return $result;
    }

    public function viewDetailTask(Request $request)
    {
//        dd($request->all());
        $data = null;
        $professionalCode = null;
        $expenseCode = null;
        try {
            if ($request->get('idDocket')) {
                $task = ClaimTaskDetail::where('id', $request->get('idDocket'))->first();
                if ($task != null) {
                    //Take time and expense
                    if ($task->professionalServices) {
                        $professionalCode = TaskCategory::where('id', $task->professionalServices)->first()->code;
                    }
                    if ($task->expense) {
                        $expenseCode = TaskCategory::where('id', $task->expense)->first()->code;
                    }
                    //Test user other
                    if ($task->userId != Auth::user()->id) {
                        $data = array('Task' => $task, 'professionalCode' => $professionalCode, 'expenseCode' => $expenseCode, 'ErrorUser' => 'True');
                    } else {
                        $data = array('Task' => $task, 'professionalCode' => $professionalCode, 'expenseCode' => $expenseCode, 'ErrorUser' => 'False');
                    }
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $data;
    }

    public function validatorUser(array $data, $variable)
    {
        $rules = null;
        switch ($variable) {
            case "updateUser": {
                $rules = [
                    'FirstName' => 'required',
                    'LastName' => 'required'
                ];
                break;
            }
            case "changePassword": {
                $rules = [
                    'Password' => 'required',
                ];
                break;
            }
            case "assignmentTask": {
                $rules = [
                    'ProfessionalServices' => 'required',
                ];
                break;
            }
        }
        return Validator::make($data, $rules);
    }

    public function updateInformationOrChangePassword(Request $request)
    {
        $result = null;
        if ($request->get('idAction') == 1) {
            //dd($request->get('dataUser')->toAarray());
            if ($this->validatorUser($request->get('dataUser'), "updateUser")->fails()) {
                $result = array('Action' => 'Update', 'Result' => 2);
            } else {
                try {
                    $user = User::where('active', 1)->where('id', $request->get('dataUser')['Id'])->first();
                    if ($user) {
                        $user->email = $request->get('dataUser')['Email'];
                        $user->firstName = $request->get('dataUser')['FirstName'];
                        $user->lastName = $request->get('dataUser')['LastName'];
                        $user->salutation = $request->get('dataUser')['Salutation'];
                        $user->middleInitial = $request->get('dataUser')['MiddleInitial'];
                        $user->designations = $request->get('dataUser')['Designations'];
                        $user->sex = $request->get('dataUser')['Sex'];
                        $user->birthDate = $request->get('dataUser')['BirthDate'];
                        $user->company = $request->get('dataUser')['Company'];
                        $user->title = $request->get('dataUser')['Title'];
                        $user->phone = $request->get('dataUser')['Phone'];
                        $user->address = $request->get('dataUser')['Address'];
                        $user->bonusDate = $request->get('dataUser')['BonusDate'];
                        $user->userID_changed = $request->get('dataUser')['Id'];
                        $user->networkID_changed = $request->get('dataUser')['NetworkID_changed'];
                        $user->save();
                        //update rate when update user
                        $rate_DetailCheck = RateDetail::where('active', 1)
                            ->where('userId', $user->id)->get();
                        foreach ($rate_DetailCheck as $item) {
                            if ($item->rateTypeId == 1) {
                                $item->value = $request->get('dataUser')['Flat'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                            if ($item->rateTypeId == 2) {
                                $item->value = $request->get('dataUser')['Hourly'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                            if ($item->rateTypeId == 3) {
                                $item->value = $request->get('dataUser')['Blended'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                        }
                        $result = array('Action' => 'Update', 'Result' => 1);
                    } else {
                        $result = array('Action' => 'Update', 'Result' => 0);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
        } else {
            //Change Password
            if ($this->validatorUser($request->get('dataUser'), "changePassword")->fails()) {
                $result = array('Action' => 'ChangePassword', 'Result' => 2);
            } else {
                try {
                    $user = User::where('active', 1)->where('id', $request->get('dataUser')['Id'])->first();
                    if ($user) {
                        $user->password = encrypt($request->get('dataUser')['Password'], Config::get('app.key'));
                        //$user->password = $request->get('dataUser')['Password'];
                        $user->save();
                        $result = array('Action' => 'ChangePassword', 'Result' => 1);
                    } else {
                        $result = array('Action' => 'ChangePassword', 'Result' => 0);
                    }
                    //dd($user);
                } catch (Exception $ex) {
                    return $ex;
                }
            }

        }
        return $result;
    }

    public function loadClaimByEventEnterKeyWhenUserSeeClaim(Request $request)
    {
        $result = null;
        try {
            $claim = Claim::where('code', $request->get('key'))->first();
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
        } catch (Exception $ex) {

        }
    }

    public function loadExpenseCodeByType(Request $request)
    {
        try {
            $expense = TaskCategory::where('name', $request->get('typeExpense'))->where('code', '!=', 'IB')->where('code', '!=', 'FB')->get();
        } catch (Exception $ex) {
            return $ex;
        }
        return view('user.taskExpense')->with('expense', $expense);
    }

    public function report()
    {
        return view('user.report');
    }

    public function loadReport(Request $request)
    {
        //dd($request->all());
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
                            'claim_task_details.professionalServicesTime as professionalServicesTime',
                            'claim_task_details.invoiceMajorNo as Invoice'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmountTotal'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as unitsTotal')
                        )
                        ->get();
                    //$timeTotal = ClaimTaskDetail::where('userId',$request->get('userId'))->get();
                    if(count($claimTask)>0)
                    {
                        $collectTimeTotal = collect($claimTask);
                        $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                        $sumExpenseAmount = $collectTimeTotal->sum('ExpenseAmount');
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
                            'claim_task_details.professionalServicesTime as professionalServicesTime',
                            'claim_task_details.invoiceMajorNo as Invoice'
//                            DB::raw('SUM(claim_task_details.expenseAmount) as expenseAmount'),
//                            DB::raw('SUM(claim_task_details.professionalServicesTime) as units')
                        )
                        ->get();
                    //$timeTotal = ClaimTaskDetail::where('userId',$request->get('userId'))->where('claimId',$claim->id)->get();
                    if(count($claimTask)>0)
                    {
                        $collectTimeTotal = collect($claimTask);
                        $sumTime = $collectTimeTotal->sum('professionalServicesTime');
                        $sumExpenseAmount = $collectTimeTotal->sum('ExpenseAmount');
                    }
                    $arrayData = array('ListData'=>$claimTask,'SumTime'=>$sumTime,'SumExpenseAmount'=>$sumExpenseAmount);
                }

            } catch (Exception $ex) {
                return $ex;
            }
        }
        return $arrayData;

    }

    public function getSearchTime(Request $request)
    {
        try
        {
            $time = TaskCategory::where('name','TimeCode')
                ->where('code','!=','O2')
                ->where('code',$request->get('Code'))->first();
            if($time)
            {
                return $time;
            }
            else
            {
                return 0;
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
    }

    public function getSearchExpense(Request $request)
    {
        try
        {
            $expense = TaskCategory::where('name','!=','TimeCode')->where('name','!=','IB')->where('name','!=','FB')
                ->where('code',$request->get('Code'))->first();
            if($expense)
            {
                return $expense;
            }
            else
            {
                return 0;
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
    }

    public function getTimeNowServer(){
        return date('d-m-Y h:i:s');
    }

    public function getAllClaim()
    {
        $data = null;
        try
        {
            $data = Claim::orderBy('code','desc')->get();
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return view('user.viewAllClaim')->with('AllClaim',$data);
    }

    public function deleteTask(Request $request)
    {
        $data = null;
        try
        {
            $task = ClaimTaskDetail::where('id',$request->get('idTask'))
                ->where('userId',Auth::user()->id)
                ->where('invoiceMajorNo',null)
                ->where('invoiceTempNo',null)
                ->first();
            if($task)
            {
                $task->delete();
                $data = 1;

            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $data;
    }


}
