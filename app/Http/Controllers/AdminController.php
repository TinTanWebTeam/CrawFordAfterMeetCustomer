<?php

namespace App\Http\Controllers;

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
        return view('admin.employee');
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
