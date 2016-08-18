<?php

namespace App\Http\Controllers;

use App\Assignment;
use App\Claim;
use App\ClaimTaskDetail;
use App\RateDetail;
use App\Status;
use App\TaskCategory;
use Auth;
use DB;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function getViewDashboard()
    {
        return view('user.dashboard');
    }

    public function getViewClaim()
    {
        try {
            $users = DB::table('claims')
                ->leftJoin('assignments', 'claims.id', '=', 'assignments.claimId')//3
                ->join('statuses', 'claims.statusId', '=', 'statuses.id')//open
                ->where('statuses.reference', '=', 'claim')
                ->orWhere('assignments.userId', '=', Auth::user()->id)
                ->select('claims.insuredName', 'claims.openDate', 'claims.id', 'claims.lossLocation', 'assignments.userId', 'statuses.name')
                ->get();
            return view('user.claim')->with('user', $users);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getViewTask()
    {
        try {
            $claim = DB::table('assignments')
                ->join('claims', 'assignments.claimId', '=', 'claims.id')
                ->where('assignments.userId', '=', Auth::user()->id)
                ->select('claims.insuredName', 'claims.id')
                ->get();
            $task = TaskCategory::where('active', 1)->get();
            return view('user.task')->with('claim', $claim)->with('task', $task);
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getClaim(Request $request)
    {
        try {
            $task = DB::table('claim_task_details')
                ->leftJoin('task_categories as cate1', 'claim_task_details.code1', '=', 'cate1.id')
                ->leftJoin('task_categories as cate2', 'claim_task_details.code2', '=', 'cate2.id')
                ->leftJoin('statuses', 'claim_task_details.statusId', '=', 'statuses.id')
                ->where('statuses.reference', '=', 'claim_task_detail')
                ->where('claim_task_details.active', '=', 1)
                ->where('claim_task_details.userId', '=', Auth::user()->id)
                ->where('claim_task_details.claimId', '=', $request->get('idAssignment'))
                ->orderBy('claim_task_details.id','desc')
                ->select(
                    'cate1.Code as taskCode1',
                    'cate2.Code as taskCode2',
                    'claim_task_details.id',
                    'claim_task_details.code1',
                    'claim_task_details.code2',
                    'claim_task_details.time1',
                    'claim_task_details.note1',
                    'claim_task_details.time2',
                    'claim_task_details.note2',
                    'statuses.name as statusName')
                ->get();
            return $task;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function deleteClaimTask(Request $request)
    {
        try {
            $deleteClaimTask = ClaimTaskDetail::where('active', 1)->where('id', $request->get('iddelete'))->first();
            if ($deleteClaimTask) {
                $deleteClaimTask->active = 0;
                $deleteClaimTask->save();
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function UpdateAndAddNewClaimTask(Request $request)
    {
        $TaskCode1=null;
        $TaskCode2=null;
        if ($request->get('ClaimTaskId') == "") {
            try {
                $claimTask = new ClaimTaskDetail();
                if($request->get('code1')!=""){
                    $TaskCode1 = TaskCategory::where('active', 1)->where('code', $request->get('code1'))->first();
                    $claimTask->code1 = $TaskCode1->id;
                }else{
                    $claimTask->code1 = "";
                }
                if($request->get('code2')!=""){
                    $TaskCode2 = TaskCategory::where('active', 1)->where('code', $request->get('code2'))->first();
                    $claimTask->code2 = $TaskCode2->id;
                }else{
                    $claimTask->code2 = "";
                }
                $claimTask->time1 = $request->get('time1');
                $claimTask->note1 = $request->get('note1');
                $claimTask->time2 = $request->get('time2');
                $claimTask->note2 = $request->get('note2');
                $claimTask->claimId = $request->get('claimId');
                $claimTask->statusId = 4;
                $claimTask->userId = Auth::user()->id;
                $claimTask->createdBy = Auth::user()->id;
                $claimTask->updatedBy = Auth::user()->id;
                $claimTask->save();
                return array(1, 'claimTask' => $claimTask, 'status' => 'Confim','TaskCode1'=>$TaskCode1,'TaskCode2'=>$TaskCode2);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $claimTask = ClaimTaskDetail::where('active', 1)->where('id', $request->get('ClaimTaskId'))->first();
                if ($claimTask) {
                    $claimTask->code1 = $request->get('code1');
                    $claimTask->time1 = $request->get('time1');
                    $claimTask->note1 = $request->get('note1');
                    $claimTask->code2 = $request->get('code2');
                    $claimTask->time2 = $request->get('time2');
                    $claimTask->note2 = $request->get('note2');
                    $claimTask->claimId = $request->get('ClaimId');
                    $claimTask->userId = Auth::user()->id;
                    $claimTask->updatedBy = Auth::user()->id;
                    $claimTask->save();
                    return array(2, 'claimTask' => $claimTask);
                } else {
                    return 0;
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }

    }

    public function getViewReport()
    {
        return view('user.report');
    }

    public function getViewProfile()
    {
        return view('user.profile');
    }

    public function insertRateDetail(Request $request)
    {
        try {
            $userId = RateDetail::where('active', 1)->where('userId', Auth::user()->id)
                ->where('claimId', 0)->get();
            if ($userId) {
                for ($i = 0; $i < count($userId); $i++) {
                    $insertRateDetail = new RateDetail();
                    $insertRateDetail->value = $userId[$i]->value;
                    $insertRateDetail->description = $userId[$i]->description;
                    $insertRateDetail->rateTypeId = $userId[$i]->rateTypeId;
                    $insertRateDetail->userId = Auth::user()->id;
                    $insertRateDetail->claimId = $request->get('Assignment');
                    $insertRateDetail->createdBy = Auth::user()->id;
                    $insertRateDetail->updatedBy = Auth::user()->id;
                    $insertRateDetail->save();
                }
                return 1;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function insertAssignment(Request $request)
    {
        try {
            $checkuser = Assignment::where('active', 1)->where('claimId', $request->get('Assignment'))
                ->where('userId', Auth::user()->id)->first();
            if ($checkuser) {
                return null;
            } else {
                if ($this->insertRateDetail($request) == "1") {
                    $users = new Assignment();
                    $users->claimId = $request->get('Assignment');
                    $users->userId = Auth::user()->id;
                    $users->createdBy = Auth::user()->id;
                    $users->updatedBy = Auth::user()->id;
                    $users->save();
                    return ($users);
                } else {
                    return null;
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function validatorUser(array $data, $variable)
    {
        $rules = null;
        switch ($variable) {
            case "validatorUpdateInformationUser": {
                $rules = [
                    'emailUser' => 'required',
                    'firstNameUser' => 'required',
                    'lastNameUser' => 'required',
                    'phoneUser' => 'required',
                    'addressUser' => 'required',
                    'governmentIdUser' => 'required'
                ];
                break;
            }
            case "validatorChangePasswordUser": {
                $rules = [
                    'passwordCurrent' => 'required',
                    'passwordNew' => 'required',
                    'passwordConfirm' => 'required',
                ];
                break;
            }
//            case "validatorUpdateAndAddNewClaimTask": {
//                $rules = [
//                    'code1' => 'required',
//                    'time1' => 'required',
//                    'code2' => 'required',
//                    'time2' => 'required',
//                    'claimId' => 'required'
//                ];
//                break;
//            }
        }
        return Validator::make($data, $rules);
    }

    public function updateInformationUser(Request $request)
    {
        $result = null;
        try {
            if ($this->validatorUser($request->all(), "validatorUpdateInformationUser")->fails()) {
                return $this->validatorUser($request->all(), "validatorUpdateInformationUser")->errors();
            } else {
                $user = User::where('id', $request->get('idUser'))
                    ->where('active', 1)
                    ->where('roleId', 2)
                    ->first();
                if ($user != null) {
                    $user->email = $request->get('emailUser');
                    $user->firstName = $request->get('firstNameUser');
                    $user->lastName = $request->get('lastNameUser');
                    $user->phone = $request->get('phoneUser');
                    $user->address = $request->get('addressUser');
                    $user->governmentId = $request->get('governmentIdUser');
                    $user->bankAccountId = $request->get('bankAccountIdUser');
                    $user->bankAccountName = $request->get('bankAccountNameUser');
                    $user->updatedBy = $request->get('idUser');
                    $user->save();
                    $result = 1;
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function changePasswordUser(Request $request)
    {
        $result = null;
        try {
            if ($this->validatorUser($request->all(), "validatorChangePasswordUser")->fails()) {
                return $this->validatorUser($request->all(), "validatorChangePasswordUser")->errors();
            } else {
                $user = User::where('id', $request->get('idUser'))
                    ->where('password', crypt($request->get('passwordCurrent'), 'PhanMemTinTan'))
                    ->where('active', 1)
                    ->where('roleId', 2)
                    ->first();
                if ($user != null) {
                    $user->password = crypt($request->get('passwordNew'), 'PhanMemTinTan');
                    $user->save();
                    $result = 1;
                } else {
                    $result = 0;
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getAllCodeAndNameForAutoCompleteTable(Request $request)
    {
        $allCode = [
            'tableName' => null,
            'data' => null
        ];
        try {
            switch ($request->get('tableName')) {
                case 'ajaxAddNewAndSaveUpdateTimeCode': {
                    $allCode['data'] = TaskCategory::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'ajaxAddNewAndSaveUpdateTimeCode';
                }
                    break;
                case 'ajaxAddNewAndSaveUpdateExpenseCode': {
                    $allCode['data'] = TaskCategory::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'ajaxAddNewAndSaveUpdateExpenseCode';
                }
                    break;
            }
            return $allCode;
        } catch (Exception $ex) {
            return $ex;
        }
    }
}


