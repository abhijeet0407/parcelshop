<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class welcome extends Controller
{
    //

	function index(){
		    try{
			   echo DB::connection()->getDatabaseName();
			}catch(Exception $e){
			   echo $e->getMessage();
			}
	}

}
