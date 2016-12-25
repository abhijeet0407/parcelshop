<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->userrole=='administrator'){
            return view('home');
        }else{
            Auth::logout();
            Session::flush();
            //return 'sess';
            //return redirect('login')->with('nopermission', 'nopermission');
           return redirect()->route('login', ['nopermission' => 1]);
        }
        
        //
    }
}
