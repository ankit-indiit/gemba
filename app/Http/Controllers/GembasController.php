<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GembasController extends Controller
{
    public function index()
    {
    	return view('page.my-gembas');
    }  

    public function howToGemba()
    {
    	return view('page.how-to-gemba');
    }

    public function hsseLeaderDetail()
    {
    	return view('page.hsse-leader-detail');
    }  

    public function hsseLeaderLed()
    {
    	return view('page.gemba.hsse-leader-led');
    }  

    public function processesAreStandard()
    {
    	return view('page.gemba.processes-are-standard');
    }  

    public function employeesAreEngaged()
    {
    	return view('page.gemba.employees-are-engaged');
    } 

    public function visionAndMission()
    {
    	return view('page.gemba.vision-and-mission');
    } 

    public function leaderAtGemba()
    {
        return view('page.gemba.leader-at-gemba');
    }  
}
