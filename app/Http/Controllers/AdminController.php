<?php

namespace App\Http\Controllers;

use App\Branch;
use App\BranchType;
use App\Claim;
use App\ClaimTaskDetail;
use App\Customer;
use App\ExchangeRate;
use App\ExtendOfDamage;
use App\InsuranceDetail;
use App\LineOfBusiness;
use App\Position;
use App\RateDetail;
use App\RateType;
use App\SourceCustomer;
use App\Status;
use App\TypeOfDamage;
use App\TypeOfInsurance;
use App\User;
use Auth;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function getViewClaimType()
    {
        $listInsuranceType = TypeOfInsurance::where('active', 1)->get();
        return view('admin.claimType')->with('listInsuranceType', $listInsuranceType);
    }

    public function getViewInsurance()
    {
        $listInsurance = InsuranceDetail::where('active', 1)->get();
        $listInsuranceType = TypeOfInsurance::where('active', 1)->get();
        return view('admin.insurance')->with('listInsuranceType', $listInsuranceType)->with('listInsurance', $listInsurance);
    }

    public function getViewLossDesc()
    {
        $listTypeOfDamage = TypeOfDamage::where('active', 1)->get();
        $listExtendOfDamage = ExtendOfDamage::where('active', 1)->get();
        return view('admin.lossDesc')->with('listTypeOfDamage', $listTypeOfDamage)->with('listExtendOfDamage', $listExtendOfDamage);
    }

    public function getViewListCustomer()
    {
        $listCustomer = Customer::where('active', 1)->get();
        $listSourceCustomer = SourceCustomer::where('active', 1)->get();
        return view('admin.listCustomer')->with('listCustomer', $listCustomer)->with('listSourceCustomer', $listSourceCustomer);
    }

    public function getViewSourceCustomer()
    {
        $listSourceCustomer = SourceCustomer::where('active', 1)->get();
        return view('admin.sourceCustomer')->with('listSourceCustomer', $listSourceCustomer);
    }

    public function deleteSourceCustomer(Request $request)
    {
        if ($request->get('deleteSourceCustomer') != 0) {
            try {
                $deleteSourceCustomer = SourceCustomer::where('id', $request->get('deleteSourceCustomer'))
                    ->where('active', 1)->first();
                $deleteSourceCustomer->active = 0;
                $deleteSourceCustomer->save();
                return 1;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return 0;
    }

    public function addNewAndUpdateSourceCustomer(Request $request)
    {
        if ($this->validator($request->all(), "validatorSourceCustomer")->fails()) {
            return $this->validator($request->all(), "validatorSourceCustomer")->errors();
        } else {
            if ($request->get('addNewOrUpdateId') == 1) {
                try {
                    $SourceCustomer = new SourceCustomer();
                    $SourceCustomer->code = $request->get('SourceCustomerCode');
                    $SourceCustomer->name = $request->get('SourceCustomerName');
                    $SourceCustomer->description = $request->get('SourceCustomerDescription');
                    $SourceCustomer->createdBy = Auth::user()->id;
                    $SourceCustomer->updatedBy = Auth::user()->id;
                    $SourceCustomer->save();
                    return array('Action' => '1', 'SourceCustomer' => $SourceCustomer);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $SourceCustomer = SourceCustomer::where('id', $request->get('SourceCustomerId'))
                        ->where('active', 1)->first();
                    if ($SourceCustomer) {
                        $SourceCustomer->code = $request->get('SourceCustomerCode');
                        $SourceCustomer->name = $request->get('SourceCustomerName');
                        $SourceCustomer->description = $request->get('SourceCustomerDescription');
                        $SourceCustomer->updatedBy = Auth::user()->id;
                        $SourceCustomer->save();
                        return array('Action' => '2', 'SourceCustomer' => $SourceCustomer);
                    } else {
                        return array('Action' => '0', 'SourceCustomer' => null);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
        }
    }

    public function getCustomerBySourceCustomer(Request $request)
    {
        $listCustomer = null;
        try {
            if ($request->get('customer') != null) {
                if ($request->get('customer') == 0) {
                    $listCustomer = Customer::where('active', 1)->get();
                } else {
                    $listCustomer = Customer::where('active', 1)->where('sourceCustomerId', $request->get('customer'))->get();
                }
            }
            return $listCustomer;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function viewDetailCustomer(Request $request)
    {
        $idCustomer = null;
        try {
            if ($request->get('idCustomer') != null) {
                $idCustomer = Customer::where('active', 1)->where('id', $request->get('idCustomer'))->first();
            }
            return $idCustomer;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function deleteCustomer(Request $request)
    {
        try {
            if ($request->get('idCustomer') != null) {
                $updateCustomer = Customer::where('active', 1)->where('id', $request->get('idCustomer'))->first();
                $updateCustomer->active = 0;
                $updateCustomer->save();
            }
            return 1;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function addNewAndUpdateCustomer(Request $request)
    {
        if ($request->get('idAction') == 1) {
            try {
                $Customer = new Customer();
                $Customer->code = $request->get('codeCustomer');
                $Customer->fullName = $request->get('fullNameCustomer');
                $Customer->address = $request->get('addressCustomer');
                $Customer->phone = $request->get('phoneCustomer');
                $Customer->email = $request->get('emailCustomer');
                $Customer->addressReserve = $request->get('addressReserveCustomer');
                $Customer->phoneReserve = $request->get('phoneReserveCustomer');
                $Customer->emailReserve = $request->get('emailReserveCustomer');
                $Customer->bankAccountNumber = $request->get('bankAccountNumberCustomer');
                $Customer->bankCardNumber = $request->get('bankCardNumberCustomer');
                $Customer->bankAccountName = $request->get('bankAccountNameCustomer');
                $Customer->bankName = $request->get('bankNameCustomer');
                $Customer->contactPersonFirstName = $request->get('firstNameContactCustomer');
                $Customer->contactPersonLastName = $request->get('lastNameContactCustomer');
                $Customer->contactPersonPhone = $request->get('phoneContactCustomer');
                $Customer->contactPersonEmail = $request->get('emailContactCustomer');
                $Customer->contactPersonFirstNameReserve = $request->get('firstNameReserveContactCustomer');
                $Customer->contactPersonLastNameReserve = $request->get('lastNameReserveContactCustomer');
                $Customer->contactPersonPhoneReserve = $request->get('phoneReserveContactCustomer');
                $Customer->contactPersonEmailReserve = $request->get('emailReserveContactCustomer');
                $Customer->sourceCustomerId = $request->get('sourceCustomerId');
                $Customer->createdBy = Auth::user()->id;
                $Customer->updatedBy = Auth::user()->id;
                $Customer->save();
                return 1;
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $Customer = Customer::where('active', 1)->where('id', $request->get('idCustomer'))->first();
                if ($Customer) {
                    $Customer->code = $request->get('codeCustomer');
                    $Customer->fullName = $request->get('fullNameCustomer');
                    $Customer->address = $request->get('addressCustomer');
                    $Customer->phone = $request->get('phoneCustomer');
                    $Customer->email = $request->get('emailCustomer');
                    $Customer->addressReserve = $request->get('addressReserveCustomer');
                    $Customer->phoneReserve = $request->get('phoneReserveCustomer');
                    $Customer->emailReserve = $request->get('emailReserveCustomer');
                    $Customer->bankAccountNumber = $request->get('bankAccountNumberCustomer');
                    $Customer->bankCardNumber = $request->get('bankCardNumberCustomer');
                    $Customer->bankAccountName = $request->get('bankAccountNameCustomer');
                    $Customer->bankName = $request->get('bankNameCustomer');
                    $Customer->contactPersonFirstName = $request->get('firstNameContactCustomer');
                    $Customer->contactPersonLastName = $request->get('lastNameContactCustomer');
                    $Customer->contactPersonPhone = $request->get('phoneContactCustomer');
                    $Customer->contactPersonEmail = $request->get('emailContactCustomer');
                    $Customer->contactPersonFirstNameReserve = $request->get('firstNameReserveContactCustomer');
                    $Customer->contactPersonLastNameReserve = $request->get('lastNameReserveContactCustomer');
                    $Customer->contactPersonPhoneReserve = $request->get('phoneReserveContactCustomer');
                    $Customer->contactPersonEmailReserve = $request->get('emailReserveContactCustomer');
                    $Customer->sourceCustomerId = $request->get('sourceCustomerId');
                    $Customer->updatedBy = Auth::user()->id;
                    $Customer->save();
                    return 2;
                } else {
                    return 0;
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
    }

    public function getViewCatastrophic()
    {
        $listTypeOfDamage = TypeOfDamage::where('active', 1)->get();
        return view('admin.catastrophic')->with('listTypeOfDamage', $listTypeOfDamage);
    }

    public function getTypeOfDamageByExtendOfDamage(Request $request)
    {
        try {
            $list = null;
            if ($request->get('typeOfDamageId') != null) {
                if ($request->get('typeOfDamageId') == 0) {
                    $list = ExtendOfDamage::where('active', 1)->get();
                } else {
                    $list = ExtendOfDamage::where('active', 1)->where('typeOfDamageId', $request->get('typeOfDamageId'))->get();
                }
            }
            return $list;
        } catch (Exception $ex) {
            return null;
        }
    }

    public function deleteLossDesc(Request $request)
    {
        try {
            if ($request->get('deteleExtendOfDamageId') != 0) {
                $deleteExtendOfDamage = ExtendOfDamage::where('id', $request->get('deteleExtendOfDamageId'))
                    ->where('active', 1)->first();
                $deleteExtendOfDamage->active = 0;
                $deleteExtendOfDamage->save();
                return 1;
            } else {
                return 0;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function AddAndUpdateLossDesc(Request $request)
    {
        if ($this->validator($request->all(), "validatorLossDesc")->fails()) {
            return $this->validator($request->all(), "validatorLossDesc")->errors();
        } else {
            if ($request->get('addAndUpdateId') == "1") {
                try {
                    $ExtendOfDamage = new ExtendOfDamage();
                    $ExtendOfDamage->code = $request->get('ExtendOfDamageCode');
                    $ExtendOfDamage->name = $request->get('ExtendOfDamageName');
                    $ExtendOfDamage->extendDamage = $request->get('ExtendOfDamageExtendDamage');
                    $ExtendOfDamage->description = $request->get('ExtendOfDamageDescription');
                    $ExtendOfDamage->typeOfDamageId = $request->get('TypeOfDamageId');
                    $ExtendOfDamage->createdBy = Auth::user()->id;
                    $ExtendOfDamage->updatedBy = Auth::user()->id;
                    $ExtendOfDamage->save();
                    return 1;
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $ExtendOfDamage = ExtendOfDamage::where('id', $request->get('ExtendOfDamageId'))
                        ->where('active', 1)->first();
                    if ($ExtendOfDamage) {
                        $ExtendOfDamage->code = $request->get('ExtendOfDamageCode');
                        $ExtendOfDamage->name = $request->get('ExtendOfDamageName');
                        $ExtendOfDamage->typeOfDamageId = $request->get('TypeOfDamageId');
                        $ExtendOfDamage->extendDamage = $request->get('ExtendOfDamageExtendDamage');
                        $ExtendOfDamage->description = $request->get('ExtendOfDamageDescription');
                        $ExtendOfDamage->updatedBy = Auth::user()->id;
                        $ExtendOfDamage->save();
                        return 2;
                    } else {
                        return 0;
                    }

                } catch (Exception $ex) {
                    return $ex;
                }
            }
        }
    }

    public function addNewAndUpdateCatastrophic(Request $request)
    {
        if ($this->validator($request->all(), "validatorCatastrophic")->fails()) {
            return $this->validator($request->all(), "validatorCatastrophic")->errors();
        } else {
            if ($request->get('addNewOrUpdateId') == 1) {
                try {
                    $Catastrophic = new TypeOfDamage();
                    $Catastrophic->code = $request->get('catastrophicCode');
                    $Catastrophic->name = $request->get('catastrophicName');
                    $Catastrophic->description = $request->get('catastrophicDescription');
                    $Catastrophic->createdBy = Auth::user()->id;
                    $Catastrophic->updatedBy = Auth::user()->id;
                    $Catastrophic->save();
                    return array('Action' => '1', 'Catastrophic' => $Catastrophic);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $Catastrophic = TypeOfDamage::where('id', $request->get('catastrophicId'))
                        ->where('active', 1)->first();
                    if ($Catastrophic) {
                        $Catastrophic->code = $request->get('catastrophicCode');
                        $Catastrophic->name = $request->get('catastrophicName');
                        $Catastrophic->description = $request->get('catastrophicDescription');
                        $Catastrophic->updatedBy = Auth::user()->id;
                        $Catastrophic->save();
                        return array('Action' => '2', 'Catastrophic' => $Catastrophic);
                    } else {
                        return array('Action' => '0', 'Catastrophic' => $Catastrophic);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
        }
    }

    public function deleteCatastrophic(Request $request)
    {
        if ($request->get('deleteTypeOfDamage') != 0) {
            try {
                $deleteTypeOfDamage = TypeOfDamage::where('id', $request->get('deleteTypeOfDamage'))
                    ->where('active', 1)->first();
                $deleteTypeOfDamage->active = 0;
                $deleteTypeOfDamage->save();
                return 1;
            } catch (Exception $ex) {
                return $ex;
            }
        }
        return 0;
    }

    public function getViewPosition()
    {
        $positionList = Position::where('active', 1)->get();
        return view('admin.position')->with('positionList', $positionList);
    }

    public function getViewEmployee()
    {
        $positionList = Position::where('active', 1)->get();
        $employeeList = User::where('active', 1)->where('roleId', 2)->get();
        $rate_Type = RateType::where('active',1)->get();
        return view('admin.manageEmployee')->with('positionList', $positionList)->with('employeeList', $employeeList)->with('rate_Type',$rate_Type);
    }

    public function validator(array $data, $variable)
    {
        $rules = null;
        switch ($variable) {
            case "validatorInsuranceType": {
                $rules = [
                    'codeInsuranceType' => 'required',
                    'nameInsuranceType' => 'required'
                ];
                break;
            }
            case "validatorInsurance": {
                $rules = [
                    'codeInsurance' => 'required',
                    'nameInsurance' => 'required'
                ];
                break;
            }
            case "validatorPosition": {
                $rules = [
                    'codePosition' => 'required',
                    'namePosition' => 'required'
                ];
                break;
            }
            case "validatorEmployee": {
                $rules = [
                    'codeEmployee' => 'required',
                    'userNameEmployee' => 'required'
                ];
                break;
            }
            case "validatorCatastrophic": {
                $rules = [
                    'catastrophicCode' => 'required',
                    'catastrophicName' => 'required'
                ];
                break;
            }
            case "validatorLossDesc": {
                $rules = [
                    'ExtendOfDamageCode' => 'required',
                    'ExtendOfDamageName' => 'required'
                ];
                break;
            }
            case "validatorSourceCustomer": {
                $rules = [
                    'SourceCustomerCode' => 'required',
                    'SourceCustomerName' => 'required'
                ];
                break;
            }
            case "validatorBranchType": {
                $rules = [
                    'codeBranchType' => 'required',
                    'nameBranchType' => 'required'
                ];
                break;
            }

        }
        return Validator::make($data, $rules);
    }

    public function viewDetailInsuranceType(Request $request)
    {
        $insuranceType = null;
        try {

            if ($request->get('idInsuranceType') != null) {
                $insuranceType = TypeOfInsurance::where('active', 1)->where('id', $request->get('idInsuranceType'))->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $insuranceType;
    }

    public function addNewAndUpdateInsuranceType(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorInsuranceType")->fails()) {
            return $this->validator($request->all(), "validatorInsuranceType")->errors();
        } else {
            if ($request->get("idAction") == 1) {
                try {
                    $insuranceType = new TypeOfInsurance();
                    $insuranceType->code = $request->get('codeInsuranceType');
                    $insuranceType->name = $request->get('nameInsuranceType');
                    $insuranceType->description = $request->get('descriptionInsuranceType');
                    $insuranceType->createdBy = Auth::user()->id;
                    $insuranceType->updatedBy = Auth::user()->id;
                    $insuranceType->save();
                    $result = array('Action' => 'AddNew', 'Result' => 'True', 'insuranceTypNew' => $insuranceType);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $insuranceType = TypeOfInsurance::where('id', $request->get('idInsuranceType'))
                        ->where('active', 1)
                        ->first();
                    if ($insuranceType) {
                        $insuranceType->code = $request->get('codeInsuranceType');
                        $insuranceType->name = $request->get('nameInsuranceType');
                        $insuranceType->description = $request->get('descriptionInsuranceType');
                        $insuranceType->updatedBy = Auth::user()->id;
                        $insuranceType->save();
                        $result = array('Action' => 'SaveUpdate', 'Result' => 'True', 'insuranceTypNew' => $insuranceType);
                    } else {
                        $result = array('Action' => 'SaveUpdate', 'Result' => 'False', 'insuranceTypNew' => null);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }
    }

    public function deleteInsuranceType(Request $request)
    {
        $result = null;
        try {
            $insuranceType = TypeOfInsurance::where('active', 1)->where('id', $request->get('idInsuranceType'))->first();
            if ($insuranceType != null) {
                $insuranceType->active = 0;
                $insuranceType->save();
                $result = 1;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getInsuranceByInsuranceType(Request $request)
    {
        $list = null;
        try {
            if ($request->get('typeInsurance') != null) {
                if ($request->get('typeInsurance') == 0) {
                    $list = InsuranceDetail::where('active', 1)->get();
                } else {
                    $list = InsuranceDetail::where('active', 1)->where('typeOfInsuranceId', $request->get('typeInsurance'))->get();
                }
            }
            return $list;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function viewDetailInsurance(Request $request)
    {
        $insurance = null;
        try {
            if ($request->get('idInsurance') != null) {
                $insurance = InsuranceDetail::where('active', 1)->where('id', $request->get('idInsurance'))
                    ->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $insurance;
    }

    public function addNewAndUpdateInsurance(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorInsurance")->fails()) {
            return $this->validator($request->all(), "validatorInsurance")->errors();
        } else {
            if ($request->get('idAction') == 1)//Action add new
            {
                try {
                    $insurance = new InsuranceDetail();
                    $insurance->code = $request->get('codeInsurance');
                    $insurance->name = $request->get('nameInsurance');
                    $insurance->description = $request->get('descriptionInsurance');
                    $insurance->typeOfInsuranceId = 1;
                    $insurance->createdBy = Auth::user()->id;
                    $insurance->updatedBy = Auth::user()->id;
                    $insurance->save();
                    $result = array('Action' => 'AddNew', 'Result' => 1, 'insuranceNew' => $insurance);

                } catch (Exception $ex) {
                    return $ex;
                }
            } else //Action Save update
            {
                try {
                    $insurance = InsuranceDetail::where('id', $request->get('idInsurance'))
                        ->where('active', 1)
                        ->first();
                    if ($insurance) {
                        $insurance->code = $request->get('codeInsurance');
                        $insurance->name = $request->get('nameInsurance');
                        $insurance->description = $request->get('descriptionInsurance');
                        $insurance->createdBy = Auth::user()->id;
                        $insurance->updatedBy = Auth::user()->id;
                        $insurance->save();
                        $result = array('Action' => 'SaveUpdate', 'Result' => 1, 'insuranceNew' => $insurance);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }

    }

    public function deleteInsurance(Request $request)
    {
        $result = null;
        try {
            if ($request->get('idInsurance') != null) {
                $insurance = InsuranceDetail::where('id', $request->get('idInsurance'))->where('active', 1)->first();
                if ($insurance != null) {
                    $insurance->active = 0;
                    $insurance->save();
                    $result = 1;
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function viewDetailPosition(Request $request)
    {
        $position = null;
        try {

            if ($request->get('idPosition') != null) {
                $position = Position::where('active', 1)->where('id', $request->get('idPosition'))->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $position;
    }

    public function addNewAndUpdatePosition(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorPosition")->fails()) {
            return $this->validator($request->all(), "validatorPosition")->errors();
        } else {
            if ($request->get("idAction") == 1) {
                try {
                    $position = new Position();
                    $position->code = $request->get('codePosition');
                    $position->name = $request->get('namePosition');
                    $position->description = $request->get('descriptionPosition');
                    $position->createdBy = Auth::user()->id;
                    $position->updatedBy = Auth::user()->id;
                    $position->save();
                    $result = array('Action' => 'AddNew', 'Result' => 1, 'positionNew' => $position);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $position = Position::where('id', $request->get('idPosition'))
                        ->where('active', 1)
                        ->first();
                    if ($position) {
                        $position->code = $request->get('codePosition');
                        $position->name = $request->get('namePosition');
                        $position->description = $request->get('descriptionPosition');
                        $position->createdBy = Auth::user()->id;
                        $position->updatedBy = Auth::user()->id;
                        $position->save();
                        $result = array('Action' => 'SaveUpdate', 'Result' => 1, 'positionNew' => $position);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }
    }

    public function deletePosition(Request $request)
    {
        $result = null;
        try {
            $position = Position::where('active', 1)->where('id', $request->get('idPosition'))->first();
            if ($position != null) {
                $position->active = 0;
                $position->save();
                $result = 1;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getEmployeeByPosition(Request $request)
    {
        $list = null;
        try {
            if ($request->get('position') != null) {
                if ($request->get('position') == 0) {
                    $list = User::where('active', 1)->where('roleId', '!=', 1)->get();
                } else {
                    $list = User::where('active', 1)->where('roleId', '!=', 1)->where('positionId', $request->get('position'))->get();
                }
            }
            return $list;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function viewDetailEmployee(Request $request)
    {
        $employeeArray = null;
        $arrayRate = [];
        try {
            if ($request->get('idEmployee') != null) {
                $employee = User::where('active', 1)->where('roleId', '!=', 1)->where('id', $request->get('idEmployee'))
                    ->first();
                if($employee!=null)
                {
                    $rateDetail = RateDetail::where('active',1)->where('userId',$employee->id)->get();
                    foreach($rateDetail as $item)
                    {
                        array_push($arrayRate,$item);
                    }
                    $employeeArray = ["objectEmployee"=>$employee,"listRate"=>$arrayRate];
                }
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $employeeArray;
    }

    public function addNewAndUpdateEmployee(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorEmployee")->fails()) {
            return $this->validator($request->all(), "validatorEmployee")->errors();
        } else {
            if ($request->get("idAction") == 1) {
                try {
                    $employee = new User();
                    $employee->code = $request->get('codeEmployee');
                    $employee->username = $request->get('userNameEmployee');
                    $employee->email = $request->get('emailEmployee');
                    $employee->password = crypt($request->get('passwordEmployee'), 'PhanMemTinTan');
                    $employee->firstName = $request->get('firstNameEmployee');
                    $employee->lastName = $request->get('lastNameEmployee');
                    $employee->phone = $request->get('phoneEmployee');
                    $employee->address = $request->get('addressEmployee');
                    $employee->phoneReserve = $request->get('phoneReserveEmployee');
                    $employee->addressReserve = $request->get('addressReserveEmployee');
                    $employee->governmentId = $request->get('governmentIdEmployee');
                    $employee->bankAccountId = $request->get('bankAccountIdEmployee');
                    $employee->bankAccountName = $request->get('bankAccountNameEmployee');
                    $employee->bankAccountIdReserve = $request->get('bankAccountIdReserveEmployee');
                    $employee->bankAccountNameReserve = $request->get('bankAccountNameReserveEmployee');
                    $employee->active = 1;
                    $employee->roleId = 2;
                    $employee->positionId = $request->get('positionId');
                    $employee->createdBy = Auth::user()->id;
                    $employee->save();
                    //Insert to table rate Details
                    foreach($request->get('rate') as $item)
                    {
                        $rate_Detail = new RateDetail();
                        $rate_Detail->value = $item["rateValue"];
                        $rate_Detail->description = "Description";
                        $rate_Detail->active = 1;
                        $rate_Detail->rateTypeId = $item["idRate"];
                        $rate_Detail->userId = $employee->id;
                        $rate_Detail->claimId = 0;
                        $rate_Detail->createdBy = Auth::user()->id;
                        $rate_Detail->save();
                    }
                    $result = array('Action' => 'AddNew', 'Result' => 1);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $employee = User::where('id', $request->get('idEmployee'))
                        ->where('active', 1)
                        ->where('roleId', '!=', 1)
                        ->first();
                    if ($employee) {
                        $employee->code = $request->get('codeEmployee');
                        $employee->username = $request->get('userNameEmployee');
                        $employee->email = $request->get('emailEmployee');
                        $employee->firstName = $request->get('firstNameEmployee');
                        $employee->lastName = $request->get('lastNameEmployee');
                        $employee->phone = $request->get('phoneEmployee');
                        $employee->address = $request->get('addressEmployee');
                        $employee->phoneReserve = $request->get('phoneReserveEmployee');
                        $employee->addressReserve = $request->get('addressReserveEmployee');
                        $employee->governmentId = $request->get('governmentIdEmployee');
                        $employee->bankAccountId = $request->get('bankAccountIdEmployee');
                        $employee->bankAccountName = $request->get('bankAccountNameEmployee');
                        $employee->bankAccountIdReserve = $request->get('bankAccountIdReserveEmployee');
                        $employee->bankAccountNameReserve = $request->get('bankAccountNameReserveEmployee');
                        $employee->updatedBy = Auth::user()->id;
                        $employee->save();

                        //$rateDetailList = RateDetail::where('active',1)->where('userId',$employee->id)->get();
                        foreach($request->get('rate') as $rate)
                        {
                            $rate_DetailCheck = RateDetail::where('active',1)
                                ->where('userId',$employee->id)
                                ->where('rateTypeId',$rate["idRate"])->first();
                            if($rate_DetailCheck == null)
                            {
                                $rate_DetailCheck = new RateDetail();
                                $rate_DetailCheck->value = $rate["rateValue"];
                                $rate_DetailCheck->description = "Description";
                                $rate_DetailCheck->active = 1;
                                $rate_DetailCheck->rateTypeId = $rate["idRate"];
                                $rate_DetailCheck->userId = $employee->id;
                                $rate_DetailCheck->claimId = 0;
                                $rate_DetailCheck->createdBy = Auth::user()->id;
                                $rate_DetailCheck->save();
                            }
                            else
                            {
                                $rate_DetailCheck->value = $rate["rateValue"];
                                $rate_DetailCheck->updatedBy = Auth::user()->id;
                                $rate_DetailCheck->save();
                            }
                        }





                        $result = array('Action' => 'SaveUpdate', 'Result' => 1);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }
    }

    public function deleteEmployee(Request $request)
    {
        $result = null;
        try {
            $employee = User::where('active', 1)->where('roleId', '!=', 1)->where('id', $request->get('idEmployee'))->first();
            if ($employee != null) {
                $employee->active = 0;
                $employee->save();
                $result = 1;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getViewExchangeRate()
    {
        $exchangeRate = ExchangeRate::where('active', 1)->get();
        return view('admin.exchangeRate')->with('exchangeRate', $exchangeRate);
    }

    public function viewDetailExchangeRate(Request $request)
    {
        $exchangeRate = null;
        try {
            if ($request->get('idExchangeRate') != null) {
                $exchangeRate = ExchangeRate::where('active', 1)->where('id', $request->get('idExchangeRate'))
                    ->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $exchangeRate;
    }

    public function addNewAndUpdateExchangeRate(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorExchangeRate")->fails()) {
            return $this->validator($request->all(), "validatorExchangeRate")->errors();
        } else {
            if ($request->get("idAction") == 1) {
                try {
                    $exchangeRate = new ExchangeRate();
                    $exchangeRate->code = $request->get('codeExchangeRate');
                    $exchangeRate->name = $request->get('nameExchangeRate');
                    $exchangeRate->value = $request->get('valueExchangeRate');
                    $exchangeRate->description = $request->get('descriptionExchangeRate');
                    $exchangeRate->active = 1;
                    $exchangeRate->save();
                    $result = array('Action' => 'AddNew', 'Result' => 1, 'exchangeRateNew' => $exchangeRate);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $exchangeRate = ExchangeRate::where('active', 1)->where('id', $request->get('idExchangeRate'))
                        ->first();
                    if ($exchangeRate) {
                        $exchangeRate->code = $request->get('codeExchangeRate');
                        $exchangeRate->name = $request->get('nameExchangeRate');
                        $exchangeRate->value = $request->get('valueExchangeRate');
                        $exchangeRate->description = $request->get('descriptionExchangeRate');
                        $exchangeRate->save();
                        $result = array('Action' => 'SaveUpdate', 'Result' => 1, 'exchangeRateNew' => $exchangeRate);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }
    }

    public function deleteExchangeRate(Request $request)
    {
        $result = null;
        try {
            $exchangeRate = ExchangeRate::where('active', 1)->where('id', $request->get('idExchangeRate'))->first();
            if ($exchangeRate != null) {
                $exchangeRate->active = 0;
                $exchangeRate->save();
                $result = 1;
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $result;
    }

    public function getViewBranchType()
    {
        $branchType = BranchType::where('active', 1)->get();
        $customer = Customer::where('active', 1)->get();
        return view('admin.branchType')->with('branchType', $branchType)->with('customer', $customer);
    }

    public function getViewBranch()
    {
        $branch = Branch::where('active', 1)->get();
        $branchType = BranchType::where('active', 1)->get();
        $sourceCustomer = SourceCustomer::where('active', 1)->get();
        $customer = Customer::where('active', 1)->get();
        return view('admin.branch')->with('branch', $branch)->with('sourceCustomer', $sourceCustomer)
            ->with('customer', $customer)->with('branchType', $branchType);
    }

    public function loadBranchTypeByCustomer(Request $request)
    {
        $getTypeBranch = null;
        try {
            if ($request->get('idLoadBranchTypeByCustomer') != null) {
                $getTypeBranch = BranchType::where('active', 1)->where('customerId', $request->get('idLoadBranchTypeByCustomer'))->get();

            } else {
                $getTypeBranch = BranchType::where('active', 1)->get();
            }
            return $getTypeBranch;
        } catch (Exception $ex) {

        }
    }

    public function addNewAndUpdateBranch(Request $request)
    {
        if ($request->get('idAction') == 1) {
            try {
                $Branch = new Branch();
                $Branch->code = $request->get('codeBranch');
                $Branch->name = $request->get('nameBranch');
                $Branch->description = $request->get('descriptionBranch');
                $Branch->branchTypeCode = $request->get('codeBranchType');
                $Branch->customerCode = $request->get('codeChooseCustomerBranch');
                $Branch->createdBy = Auth::user()->id;
                $Branch->updatedBy = Auth::user()->id;
                $Branch->save();
                return array(1, 'Branch' => $Branch);
            } catch (Exception $ex) {
                return $ex;
            }
        } else {
            try {
                $Branch = Branch::where('active', 1)->where('id', $request->get('idBranch'))->first();
                if ($Branch) {
                    $Branch->code = $request->get('codeBranch');
                    $Branch->name = $request->get('nameBranch');
                    $Branch->description = $request->get('descriptionBranch');
                    $Branch->branchTypeCode = $request->get('codeBranchType');
                    $Branch->customerCode = $request->get('codeChooseCustomerBranch');
                    $Branch->updatedBy = Auth::user()->id;
                    $Branch->save();
                    return array(2, 'Branch' => $Branch);
                } else {
                    return array(0, 'Branch' => $Branch);
                }
            } catch (Exception $ex) {
                return $ex;
            }
        }
    }

    public function viewDetailBranch(Request $request)
    {
        $viewBranch = Branch::where('active', 1)->where('id', $request->get('idBranch'))->first();
        $getNameCustomer = Customer::where('code', $viewBranch->customerCode)->where('active', 1)->first();
        return array('viewBranch' => $viewBranch, 'getNameCustomer' => $getNameCustomer);
    }

    public function deleteBranch(Request $request)
    {
        try {
            $deleteBranch = Branch::where('active', 1)->where('id', $request->get('idBranch'))->first();
            if ($deleteBranch) {
                $deleteBranch->active = 0;
                $deleteBranch->save();
            }
            return 1;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getBranchByBranchType(Request $request)
    {
        $branch = null;
        try {
            if ($request->get('branchCustomer') != null) {
                $branch = Branch::where('active', 1)->where('customerCode', $request->get('branchCustomer'))->get();
            } else {
                $branch = Branch::where('active', 1)->get();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $branch;
    }

    public function viewDetailBranchType(Request $request)
    {
        $branchType = null;
        try {
            if ($request->get('idBranchType') != null) {
                $branchType = BranchType::where('active', 1)->where('id', $request->get('idBranchType'))
                    ->first();
            }
        } catch (Exception $ex) {
            return $ex;
        }
        return $branchType;
    }

    public function addNewAndUpdateBranchType(Request $request)
    {
        $result = null;
        if ($this->validator($request->all(), "validatorBranchType")->fails()) {
            return $this->validator($request->all(), "validatorBranchType")->errors();
        } else {
            if ($request->get("idAction") == 1) {
                try {
                    $branchType = new BranchType();
                    $branchType->code = $request->get('codeBranchType');
                    $branchType->name = $request->get('nameBranchType');
                    $branchType->description = $request->get('descriptionBranchType');
                    $branchType->active = 1;
                    $branchType->createdBy = Auth::user()->id;
                    $branchType->updatedBy = Auth::user()->id;
                    $branchType->save();
                    $result = array('Action' => 'AddNew', 'Result' => 1, 'branchTypeNew' => $branchType);
                } catch (Exception $ex) {
                    return $ex;
                }
            } else {
                try {
                    $branchType = BranchType::where('active', 1)->where('id', $request->get('idBranchType'))
                        ->first();
                    if ($branchType) {
                        $branchType->code = $request->get('codeBranchType');
                        $branchType->name = $request->get('nameBranchType');
                        $branchType->description = $request->get('descriptionBranchType');
                        $branchType->updatedBy = Auth::user()->id;
                        $branchType->save();
                        $result = array('Action' => 'SaveUpdate', 'Result' => 1, 'branchTypeNew' => $branchType);
                    }
                } catch (Exception $ex) {
                    return $ex;
                }
            }
            return $result;
        }
    }

    public function getViewClaim()
    {
        $claim = Claim::all();
        $status = Status::where('active',1)
            ->where('id','<',4)
            ->get();
        return view('admin.claim')->with('claim',$claim)->with('status',$status);
    }

    public function deleteBranchType(Request $request)
    {
        try {
            $branchType = BranchType::where('active', 1)->where('id', $request->get('idBranchType'))->first();
            if ($branchType) {
                $branchType->active = 0;
                $branchType->save();
                return 1;
            }
            return 0;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getCustomer(Request $request)
    {
        try {
            if ($request->get('seachName') != null) {
                $customer = Customer::where('fullName', 'LIKE', '%' . $request->get('seachName') . '%')
                    ->where('active', 1)->get();
            } else {
                $customer = Customer::where('active', 1)->get();
            }
            return $customer;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getTypeBranch(Request $request)
    {
        try {
            if ($request->get('seachCustomer') != null) {
                $listType = BranchType::where('active', 1)->where('id', $request->get('seachCustomer'))->get();
                return $listType;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getBranchByCustomerAndBranchType(Request $request)
    {
        try {
            if ($request->get('codeCustomer') != null) {
                $customer = Branch::where('active', 1)->where('customerCode', 'LIKE', '%' . $request->get('codeCustomer') . '%')
                    ->where('branchTypeCode', $request->get('idBranchType'))->get();
                return $customer;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getBranchTypeByCustomer(Request $request)
    {
        try {
            if ($request->get('idCustomer') != null) {
                $getBranchType = BranchType::where('active', 1)->where('customerId', $request->get('idCustomer'))->get();
                return $getBranchType;
            }
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getAllCodeAndNameForAutoCompleteTable(Request $request)
    {
        $allCode = [
            'tableName' => null,
            'data' => null
        ];
        try {
            switch ($request->get('tableName')) {
                case 'claimTypeCode': {
                    $allCode['data'] = InsuranceDetail::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'claimTypeCode';
                }
                    break;
                case 'lossDescCode': {
                    $allCode['data'] = TypeOfDamage::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'lossDescCode';
                }
                    break;
                case 'sourceCode': {
                    $allCode['data'] = SourceCustomer::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'sourceCode';
                }
                    break;
                case 'insurerCode': {
                    $allCode['data'] = Customer::where('active', 1)->where('code', 'LIKE', '%' . $request->get('allCode') . '%')->get();
                    $allCode['tableName'] = 'insurerCode';
                }
                    break;
                case 'branchCode': {
                    $allCode['data']=BranchType::where('active',1)->where('code','LIKE','%'.$request->get('allCode').'%')->get();
                    $allCode['tableName'] = 'branchCode';
                }
                    break;
                case 'lineOfBusinessCode': {
                    $allCode['data']=LineOfBusiness::where('active',1)->where('code','LIKE','%'.$request->get('allCode').'%')->get();
                    $allCode['tableName'] = 'lineOfBusinessCode';
                }
                    break;
                case 'adjusterCode': {
                    $allCode['data']=User::where('active',1)->where('code','LIKE','%'.$request->get('allCode').'%')->get();
                    $allCode['tableName'] = 'adjusterCode';
                }
                    break;
            }
            return $allCode;
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function addNewAndUpdateClaim(Request $request)
    {
        $result = null;
        if($request->get('idActionAddNewOrUpdate')==1)
        {
            try
            {
                //dd($request->get('dataClaim'));
                $claim = New Claim();
                $claim->code = 'CODE' . str_random(3) . (string) date_timestamp_get(date_create());
                $claim->branchSeqNo = $request->get('dataClaim')['BranchSeqNo'];
                $claim->incident = $request->get('dataClaim')['IncidentNumber'];
                $claim->assignmentTypeCode = $request->get('dataClaim')['AssignmentTypeCode'];
                $claim->accountCode = $request->get('dataClaim')['AccountCode'];
                $claim->accountPolicyId = $request->get('dataClaim')['AccountPolicyId'];
                $claim->insuredName = $request->get('dataClaim')['InsuredName'];
                $claim->insuredClaim = $request->get('dataClaim')['InsuredClaimNumber'];
                $claim->tradingAs = $request->get('dataClaim')['TradingAs'];
                $claim->claimTypeCode  = $request->get('dataClaim')['ClaimTypeCode'];
                $claim->lossDescCode = $request->get('dataClaim')['LossDescCode'];
                $claim->catastrophicLoss = $request->get('dataClaim')['CatastrophicLoss'];
                $claim->sourceCode = $request->get('dataClaim')['SourceCode'];
                $claim->insurerCode = $request->get('dataClaim')['InsurerCode'];
                $claim->brokerCode = $request->get('dataClaim')['BrokerCode'];
                $claim->branchCode = $request->get('dataClaim')['BranchCode'];
                $claim->branchTypeCode = $request->get('dataClaim')['BranchTypeCode'];
                $claim->destroyedDate = $request->get('dataClaim')['DestroyedDate'];
                $claim->lossLocation = $request->get('dataClaim')['LossLocation'];
                $claim->lineOfBusinessCode = $request->get('dataClaim')['LineOfBusinessCode'];
                $claim->lossDate = $request->get('dataClaim')['LossDate'];
                $claim->receiveDate = $request->get('dataClaim')['ReceiveDate'];
                $claim->openDate = $request->get('dataClaim')['OpenDate'];
                $claim->closeDate = $request->get('dataClaim')['CloseDate'];
                $claim->insuredContactedDate = $request->get('dataClaim')['InsuredContactedDate'];
                $claim->limitationDate = $request->get('dataClaim')['LimitationDate'];
                $claim->policyInceptionDate = $request->get('dataClaim')['PolicyInceptionDate'];
                $claim->policyExpiryDate = $request->get('dataClaim')['PolicyExpiryDate'];
                $claim->disabilityCode = $request->get('dataClaim')['DisabilityCode'];
                $claim->outComeCode = $request->get('dataClaim')['OutcomeCode'];
                $claim->lastChanged = $request->get('dataClaim')['LastChanged'];
                $claim->partnershipId = $request->get('dataClaim')['PartnershipId'];
                $claim->adjusterCode = $request->get('dataClaim')['AdjusterCode'];
                $claim->rate = $request->get('dataClaim')['Rate'];
                $claim->feeType = $request->get('dataClaim')['FeeType'];
                $claim->taxable = $request->get('dataClaim')['Taxable'];
                $claim->estimatedClaimValue = $request->get('dataClaim')['EstimatedClaimValue'];
                $claim->createdBy = Auth::user()->id;
                $claim->statusId = $request->get('idStatus');
                $claim->save();
                $result =  array('Action' => 'addNew', 'result' => 1);
            }
            catch(Exception $ex)
            {
                return $ex;
            }
        }
        else
        {
            try
            {
                if($request->get('dataClaim')!=null)
                {
                    $claim = Claim::where('id',(int)$request->get('dataClaim')['Id'])->first();
                    if($claim!=null)
                    {
                        $claim->branchSeqNo = $request->get('dataClaim')['BranchSeqNo'];
                        $claim->incident = $request->get('dataClaim')['IncidentNumber'];
                        $claim->assignmentTypeCode = $request->get('dataClaim')['AssignmentTypeCode'];
                        $claim->accountCode = $request->get('dataClaim')['AccountCode'];
                        $claim->accountPolicyId = $request->get('dataClaim')['AccountPolicyId'];
                        $claim->insuredName = $request->get('dataClaim')['InsuredName'];
                        $claim->insuredClaim = $request->get('dataClaim')['InsuredClaimNumber'];
                        $claim->tradingAs = $request->get('dataClaim')['TradingAs'];
                        $claim->claimTypeCode  = $request->get('dataClaim')['ClaimTypeCode'];
                        $claim->lossDescCode = $request->get('dataClaim')['LossDescCode'];
                        $claim->catastrophicLoss = $request->get('dataClaim')['CatastrophicLoss'];
                        $claim->sourceCode = $request->get('dataClaim')['SourceCode'];
                        $claim->insurerCode = $request->get('dataClaim')['InsurerCode'];
                        $claim->brokerCode = $request->get('dataClaim')['BrokerCode'];
                        $claim->branchCode = $request->get('dataClaim')['BranchCode'];
                        $claim->branchTypeCode = $request->get('dataClaim')['BranchTypeCode'];
                        $claim->destroyedDate = $request->get('dataClaim')['DestroyedDate'];
                        $claim->lossLocation = $request->get('dataClaim')['LossLocation'];
                        $claim->lineOfBusinessCode = $request->get('dataClaim')['LineOfBusinessCode'];
                        $claim->lossDate = $request->get('dataClaim')['LossDate'];
                        $claim->receiveDate = $request->get('dataClaim')['ReceiveDate'];
                        $claim->openDate = $request->get('dataClaim')['OpenDate'];
                        $claim->closeDate = $request->get('dataClaim')['CloseDate'];
                        $claim->insuredContactedDate = $request->get('dataClaim')['InsuredContactedDate'];
                        $claim->limitationDate = $request->get('dataClaim')['LimitationDate'];
                        $claim->policyInceptionDate = $request->get('dataClaim')['PolicyInceptionDate'];
                        $claim->policyExpiryDate = $request->get('dataClaim')['PolicyExpiryDate'];
                        $claim->disabilityCode = $request->get('dataClaim')['DisabilityCode'];
                        $claim->outComeCode = $request->get('dataClaim')['OutcomeCode'];
                        $claim->lastChanged = $request->get('dataClaim')['LastChanged'];
                        $claim->partnershipId = $request->get('dataClaim')['PartnershipId'];
                        $claim->adjusterCode = $request->get('dataClaim')['AdjusterCode'];
                        $claim->rate = $request->get('dataClaim')['Rate'];
                        $claim->feeType = $request->get('dataClaim')['FeeType'];
                        $claim->taxable = $request->get('dataClaim')['Taxable'];
                        $claim->estimatedClaimValue = $request->get('dataClaim')['EstimatedClaimValue'];
                        $claim->updatedBy = Auth::user()->id;
                        if($request->get('idStatus') == 3)
                        {
                            $claim->statusId = $request->get('idStatus');
                            $claim_task_detail = ClaimTaskDetail::where('active',1)->where('claimId',$request->get('dataClaim')['Id'])->get();
                            foreach($claim_task_detail as $item)
                            {
                                $item->statusId = 5;
                                $item->save();
                            }
                        }
                        else
                        {
                            $claim->statusId = $request->get('idStatus');
                        }
                        $claim->save();
                        $result =  array('Action' => 'update', 'result' => 1);
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

    public function viewClaimDetail(Request $request)
    {
        $claim = null;
        try
        {
            if($request->get('idClaim')!=null)
            {
                $claim = Claim::where('id',$request->get('idClaim'))->first();
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $claim;
    }

    public function loadClaimByStatus(Request $request)
    {
        $claim = null;
        try
        {
            if($request->get('idStatus')!=null)
            {
                if($request->get('idStatus')==0)
                {
                    $claim = Claim::all();
                }
                else
                {
                    $claim = Claim::where('statusId',$request->get('idStatus'))->get();
                }
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $claim;
    }

    public function closeClaim(Request $request)
    {
        $result = null;
        try{
            if($request->get('idClaim')!= null)
            {
                $claim = Claim::where('id',$request->get('idClaim'))->first();
                if($claim!=null)
                {
                    $claim->statusId = 3;
                    $claim->save();
                    //update list table claim_task_detail
                    $claim_task_detail = ClaimTaskDetail::where('active',1)->where('claimId',$request->get('idClaim'))->get();
                    foreach($claim_task_detail as $item)
                    {
                        $item->statusId = 5;
                        $item->save();
                    }
                    $result = 1;
                }
            }
        }
        catch(Exception $ex)
        {
            return $ex;
        }
        return $result;
    }
}
