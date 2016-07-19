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
}
