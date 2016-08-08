<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimTaskDetail;
use App\Position;
use App\RateDetail;
use App\TaskCategory;
use App\User;
use Auth;
use Config;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\Exception;
use Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function task()
    {
        $listTask = TaskCategory::where('active',1)->where('code','!=','IB')->where('code','!=','FB')->get();
        return view('user.task')->with('listTask',$listTask);
    }

    public function profile()
    {
        $arrayFlat = null;
        $arrayHourly = null;
        $arrayBlend = null;
        $address = null;
        $address1= null;
        $address2= null;
        $userCreated = null;
        $userChanged = null;
        $position = Position::where('active',1)->get();
        $user = User::where('active',1)->where('id',Auth::user()->id)->first();
        if($user)
        {
          $listRate = RateDetail::where('userId',$user->id)->where('active',1)->get();
          foreach($listRate as $item)
          {
              if($item->rateTypeId == 1)
              {
                  $arrayFlat = $item->value;
              }
              else if($item->rateTypeId == 2)
              {
                  $arrayHourly = $item->value;
              }
              else
              {
                  $arrayBlend = $item->value;
              }
          }
          //Address
          $arrayAddress = explode(";",$user->address);
          $address = $arrayAddress[0];
          $address1 = $arrayAddress[1];
          $address2 = $arrayAddress[2];
          //user Created
          $userCreated = User::where('active',1)->where('id',$user->userID_created)->first()->name;
          if($user->userID_changed!=null)
          {
              $userChanged = User::where('active',1)->where('id',$user->userID_changed)->first()->name;
          }
        }
        return view('user.profile')
            ->with('position',$position)
            ->with('user',$user)
            ->with('arrayFlat',$arrayFlat)
            ->with('arrayHourly',$arrayHourly)
            ->with('arrayBlend',$arrayBlend)
            ->with('address',$address)
            ->with('address1',$address1)
            ->with('address2',$address2)
            ->with('userCreated',$userCreated)
            ->with('userChanged',$userChanged);
    }
    public function loadClaimByEventEnterKey(Request $request)
    {
        //dd($request->get('key'));
        $result = null;
        try{
            if($request->get('key'))
            {
                $claim = Claim::where('code',$request->get('key'))->where('statusId',1)->first();
                $result = array('Claim'=>$claim);
            }
        }
        catch(Exception $ex)
        {
            return null;
        }
        return $result;
    }

    public function loadViewDocketDetail(Request $request)
    {
        if($request->get('idClaim'))
        {
            $claim_task_detail = DB::table('claim_task_details')
                ->leftJoin('users','claim_task_details.userId','=','users.id')
                ->leftJoin('task_categories as cate1','claim_task_details.professionalServices','=','cate1.id')
                ->leftJoin('task_categories as cate2','claim_task_details.expense','=','cate2.id')
                ->where('claim_task_details.claimId',$request->get('idClaim'))
                ->where('claim_task_details.professionalServices','!=',1)
                ->where('claim_task_details.professionalServices','!=',2)
                ->orderBy('claim_task_details.created_at','desc')
                ->select(
                    'claim_task_details.id as idTask',
                    'claim_task_details.userId as idUser',
                    'users.name as adjuster',
                    'cate1.code as professionalServices',
                    'cate2.code as expense',
                    'claim_task_details.professionalServicesTime as professionalUnit',
                    'claim_task_details.professionalServicesNote as professionalNote',
                    'claim_task_details.expenseNote as expenseNote',
                    'claim_task_details.created_at as date'
                )
                ->get();
                return view('user.viewDocketDetail')->with('claim_task_detail',$claim_task_detail);
        }
    }

    public function assignmentTask(Request $request)
    {
        $result = null;
        if($request->get('action')==1)
        {
            if ($this->validatorUser($request->get('taskObject'), "assignmentTask")->fails()) {
                $result = array('Action'=>'AddNew','Result'=>2);
            }
            else
            {
                try{
                    $task = new ClaimTaskDetail();
                    $task->professionalServices = $request->get('taskObject')['ProfessionalServices'];
                    $task->professionalServicesNote = $request->get('taskObject')['ProfessionalServicesNote'];

                    $task->professionalServicesTime = $request->get('taskObject')['ProfessionalServicesTime'];
                    $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                    $task->professionalServicesAmount = $request->get('taskObject')['ProfessionalServicesAmount'];

                    $task->professionalServicesTimeBillValue = $request->get('taskObject')['ProfessionalServicesTimeBillValue'];
                    $task->professionalServicesRateBillValue = $request->get('taskObject')['ProfessionalServicesRateBillValue'];
                    $task->professionalServicesAmountBillValue = $request->get('taskObject')['ProfessionalServicesAmountBillValue'];

                    $task->professionalServicesTimeOverrideValue = $request->get('taskObject')['ProfessionalServicesTimeOverrideValue'];
                    $task->professionalServicesRateOverrideValue = $request->get('taskObject')['ProfessionalServicesRateOverrideValue'];
                    $task->professionalServicesAmountOverrideValue = $request->get('taskObject')['ProfessionalServicesAmountOverrideValue'];

                    $task->expense = $request->get('taskObject')['Expense'];
                    $task->expenseNote = $request->get('taskObject')['ExpenseNote'];
                    $task->expenseAmount = $request->get('taskObject')['ExpenseAmount'];
                    $task->expenseAmountBillValue = $request->get('taskObject')['ExpenseAmountBillValue'];
                    $task->expenseAmountOverrideValue = $request->get('taskObject')['ExpenseAmountOverrideValue'];

                    $task->claimId = $request->get('taskObject')['ClaimId'];
                    $task->userId = $request->get('taskObject')['UserId'];
                    $task->createdBy = $request->get('taskObject')['UserId'];
                    $task->updatedBy = $request->get('taskObject')['UserId'];
                    $task->save();
                    $result = array('Action'=>'AddNew','Result'=>1);
                }
                catch(Exception $ex)
                {
                    return $ex;
                }
            }
        }
        else
        {
            if($request->get('idUserOther')!= Auth::user()->id)
            {
                $result = array('Action'=>'Update','Result'=>0);
            }
            else
            {
                try{
                    if($request->get('idTask'))
                    {
                        $task = ClaimTaskDetail::where('id',$request->get('idTask'))->where('active',1)->first();
                        if($task)
                        {
                            $task->professionalServices = $request->get('taskObject')['ProfessionalServices'];
                            $task->professionalServicesNote = $request->get('taskObject')['ProfessionalServicesNote'];

                            $task->professionalServicesTime = $request->get('taskObject')['ProfessionalServicesTime'];
                            $task->professionalServicesRate = $request->get('taskObject')['ProfessionalServicesRate'];
                            $task->professionalServicesAmount = $request->get('taskObject')['ProfessionalServicesAmount'];

                            $task->professionalServicesTimeBillValue = $request->get('taskObject')['ProfessionalServicesTimeBillValue'];
                            $task->professionalServicesRateBillValue = $request->get('taskObject')['ProfessionalServicesRateBillValue'];
                            $task->professionalServicesAmountBillValue = $request->get('taskObject')['ProfessionalServicesAmountBillValue'];

                            $task->professionalServicesTimeOverrideValue = $request->get('taskObject')['ProfessionalServicesTimeOverrideValue'];
                            $task->professionalServicesRateOverrideValue = $request->get('taskObject')['ProfessionalServicesRateOverrideValue'];
                            $task->professionalServicesAmountOverrideValue = $request->get('taskObject')['ProfessionalServicesAmountOverrideValue'];

                            $task->expense = $request->get('taskObject')['Expense'];
                            $task->expenseNote = $request->get('taskObject')['ExpenseNote'];
                            $task->expenseAmount = $request->get('taskObject')['ExpenseAmount'];
                            $task->expenseAmountBillValue = $request->get('taskObject')['ExpenseAmountBillValue'];
                            $task->expenseAmountOverrideValue = $request->get('taskObject')['ExpenseAmountOverrideValue'];

                            $task->save();
                            $result = array('Action'=>'Update','Result'=>1);
                        }
                    }
                }
                catch(Exception $ex)
                {
                    return $ex;
                }
            }
        }
        return $result;
    }

    public function viewDetailTask(Request $request)
    {
        $data = null;
        $expenseCode = null;
        try{
            if($request->get('idDocket'))
            {
                $task = ClaimTaskDetail::where('id',$request->get('idDocket'))->where('active',1)->first();
                $professionalCode = TaskCategory::where('id',$task->professionalServices)->where('active',1)->first()->code;
                if($task->expense)
                {
                    $expenseCode = TaskCategory::where('id',$task->expense)->where('active',1)->first()->code;
                }
                $data = array('Task'=>$task,'professionalCode'=>$professionalCode,'expenseCode'=>$expenseCode);
            }
        }
        catch(Exception $ex)
        {
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
        if($request->get('idAction')==1)
        {
            //dd($request->get('dataUser')->toAarray());
            if ($this->validatorUser($request->get('dataUser'), "updateUser")->fails()) {
                $result = array('Action'=>'Update','Result'=>2);
            }
            else
            {
                try{
                    $user = User::where('active',1)->where('id',$request->get('dataUser')['Id'])->first();
                    if($user)
                    {
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
                        $rate_DetailCheck = RateDetail::where('active',1)
                            ->where('userId',$user->id)->get();
                        foreach($rate_DetailCheck as $item)
                        {
                            if($item->rateTypeId==1)
                            {
                                $item->value = $request->get('dataUser')['Flat'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                            if($item->rateTypeId==2)
                            {
                                $item->value = $request->get('dataUser')['Hourly'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                            if($item->rateTypeId==3)
                            {
                                $item->value = $request->get('dataUser')['Blended'];
                                $item->updatedBy = $request->get('dataUser')['Id'];
                                $item->save();
                            }
                        }
                        $result = array('Action'=>'Update','Result'=>1);
                    }
                    else
                    {
                        $result = array('Action'=>'Update','Result'=>0);
                    }
                }
                catch(Exception $ex){
                    return $ex;
                }
            }
        }
        else
        {
            //Change Password
            if ($this->validatorUser($request->get('dataUser'), "changePassword")->fails()) {
                $result = array('Action'=>'ChangePassword','Result'=>2);
            }
            else
            {
                try{
                    $user = User::where('active',1)->where('id',$request->get('dataUser')['Id'])->first();
                    if($user)
                    {
                        $user->password = crypt(Config::get('app.key'),$request->get('dataUser')['Password']);
                        //$user->password = $request->get('dataUser')['Password'];
                        $user->save();
                        $result = array('Action'=>'ChangePassword','Result'=>1);
                    }
                    else
                    {
                        $result = array('Action'=>'ChangePassword','Result'=>0);
                    }
                    //dd($user);
                }
                catch(Exception $ex){
                    return $ex;
                }
            }

        }
        return $result;
    }
}
