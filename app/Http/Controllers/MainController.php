<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;

use IPNVZLA\Http\Requests;

class MainController extends Controller
{
    public function index(){
    	return view('index');
    }
}
