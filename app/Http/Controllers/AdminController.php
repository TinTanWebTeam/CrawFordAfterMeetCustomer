<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimTaskDetail;
use App\Customer;
use App\Position;
use App\RateDetail;
use App\User;
use Auth;
use Config;
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
        $position = Position::where('active',1)->get();
        $listUser = User::where('active',1)->where('roleId',2)->get();
        return view('admin.employee')->with('position',$position)->with('listUser',$listUser);
    }

    public function getViewTrialFee()
    {
        $listCustomer = Customer::where('active',1)->get();
        return view('admin.trialFee')->with('listCustomer',$listCustomer);
    }

    public function getViewInvoice()
    {
        return view('admin.invoice');
    }

    public function addNewAndUpdateEmployee(Request $request)
    {
        $result =null;
        if($request->get('idAction')==1)
        {
            try
            {
                $employee = new User();
                $employee->name = $request->get('dataEmployee')['Name'];
                $employee->email = $request->get('dataEmployee')['Email'];
                $employee->password = crypt(Config::get('app.key'),$request->get('dataEmployee')['Name']);
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
                if($request->get('dataEmployee')['DefaultProfile'] == 'True')
                {
                    $employee->defaultProfile = 1;
                }
                else
                {
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
                $result= array("Action"=>"AddNew","Result"=>1);
            }
            catch(Exception $ex)
            {
                return $ex;
            }
        }
        else
        {
            //dd($request->get('dataEmployee'));
            try{
                if($request->get('dataEmployee')['Id']!= null)
                {
                    $employee = User::where('id',$request->get('dataEmployee')['Id'])->where('roleId','!=',1)->first();
                    if($employee)
                    {
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
                        if($request->get('dataEmployee')['Locked']=="True")
                        {
                            $employee->locked = 1;
                            $employee->inactive = 0;
                            $employee->inactiveDetail = null;
                        }
                        else
                        {
                            $employee->locked = 0;
                        }
                        if($request->get('dataEmployee')['Inactive']=="True")
                        {
                            $employee->inactive = 1;
                            $employee->locked = 0;
                            $employee->lockedDetail = null;
                        }
                        else
                        {
                            $employee->inactive = 0;
                        }
                        $employee->lockedDetail = $request->get('dataEmployee')['LockedDetail'];
                        $employee->inactiveDetail = $request->get('dataEmployee')['InactiveDetail'];
                        $employee->save();
                        //update rate when update user
                        $rate_DetailCheck = RateDetail::where('active',1)
                            ->where('userId',$employee->id)
                            ->where('rateTypeId',2)->first();
                        if($rate_DetailCheck)
                        {
                            $rate_DetailCheck->value = $request->get('dataEmployee')['Hourly'];
                            $rate_DetailCheck->description = $request->get('dataEmployee')['Hourly'];
                            $rate_DetailCheck->updatedBy = Auth::user()->id;
                            $rate_DetailCheck->save();
                        }
                        $result= array("Action"=>"Update","Result"=>1);
                    }
                }
            }
            catch(Exception $ex)
            {
                return $ex;
            }
        }
        return $result;
    }

    public function viewEmployeeDetailWhenChooseRowOfEventDoubleClick(Request $request)
    {
        $result = null;
        try
        {
            if($request->get('idEmployee')!=null)
            {
                $user = User::where('active',1)->where('id',$request->get('idEmployee'))
                    ->where('roleId',2)->first();
                if($user)
                {
                    $nameCreated = User::where('active',1)->where('id',$user->userID_created)->first()->name;
                    $nameUpdated = User::where('active',1)->where('id',$user->userID_changed)->first()->name;
                    $rate = RateDetail::where('active',1)->where('userId',$user->id)->first()->value;
                    $result = array("Object"=>$user,"nameCreated"=>$nameCreated,"nameUpdated"=>$nameUpdated,"rate"=>$rate);
                }
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $result;
    }

    public function viewDetailEmployeeWhenUseEvenEnter(Request $request)
    {
        $result = null;
        try{
            if($request->get('key')!=null)
            {
                $user = User::where('active',1)->where('name',$request->get('key'))->where('roleId',2)->first();
                if($user!= null)
                {
                    $nameCreated = User::where('active',1)->where('id',$user->userID_created)->first()->name;
                    $result = array("Data"=>$user,"Result"=>1,"nameCreated"=>$nameCreated);
                }
                else
                    $result = array("Data"=>null,"Result"=>0);
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $result;
    }

    public function chooseClaimWhenUseEventEnter(Request $request)
    {
        $result = null;
        try{
            if($request->get('key')!= null)
            {
               $claim = Claim::where('code',$request->get('key'))->where('statusId',1)->first();
                $listClaimTaskDetail = DB::table('claim_task_details')
                    ->leftJoin('users','claim_task_details.userId','=','users.id')
                    ->leftJoin('rate_details','claim_task_details.userId','=','rate_details.userId')
                    ->leftJoin('rate_types','rate_details.rateTypeId','=','rate_types.id')
                    ->where('claim_task_details.active','=',1)
                    ->where('claim_task_details.claimId','=',$claim->id)
                    ->groupBy('users.name')
                    ->select(
                        'users.name as userName',
                        'claim_task_details.professionalServices as cv9',
                        DB::raw('SUM(claim_task_details.professionalServicesTime) as sumTime'),
                        'rate_details.value as rate',
                        'rate_types.name as rateType'
                    )
                    ->get();
                    $collect = collect($listClaimTaskDetail);
                    $array_all = [];
                    foreach($collect as $item)
                    {
                        $array = [
                            'Name'=>$item->userName,
                            'Rate'=>$item->rate,
                            'RateType'=>$item->rateType,
                            'Sum'=>$item->sumTime,
                            'ProfessionalServices'=>$item->sumTime*$item->rate
                        ];
                        array_push($array_all,$array);
                    }
                $result = array('Claim'=>$claim,'listClaimTaskDetail'=>$array_all);
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $result;
    }

    public function showInformationOfCustomer(Request $request)
    {
        $result = null;
        try{
            if($request->get('idCustomer')!= null)
            {
                $result = Customer::where('id',$request->get('idCustomer'))->where('active',1)->first();
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $result;
    }
}