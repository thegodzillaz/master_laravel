<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('rule:admin'); // ini rule diregister kerenel->route middleware
    // }

    public function show(){
      return view('dashboard.index');
    }
    public function home(){
      $user=array(
        'username' => Auth::User()->username,
        'name'=> Auth::User()->name,
        'rule'=> Auth::User()->getNamaRule()
      );

      return view('dashboard.admin_dashboard',['data'=>$user]);

    }

}
