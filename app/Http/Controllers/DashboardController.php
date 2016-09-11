<?php

namespace IPNVZLA\Http\Controllers;

use Illuminate\Http\Request;

use IPNVZLA\Http\Requests;

class DashboardController extends Controller
{
	#Método que arma la vista principal del dashboard para la gestión administrativa
	#de la página
    public function index(){
    	return view('dashboard');
    }

    #Método que arma la vista para la gestion de especialidades
    public function especialidades(){
    	return view('administrativas/especialidades');
    }
}