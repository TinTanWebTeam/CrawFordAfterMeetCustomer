<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;

use App\Http\Requests;

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
        return view('admin.employee')->with('position',$position);
    }

    public function getViewTrialFee()
    {
        //$list = array("A");
        return view('admin.trialFee');
    }

    public function getViewInvoice()
    {
        return view('admin.invoice');
    }
}
