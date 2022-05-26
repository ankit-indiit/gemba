<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
    	return view('page.develop-employee');
    }  

    public function accountInfo()
    {
    	return view('page.account-info');
    }    
}
