<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
    }

    public function home(){
      $user=array(
        'username' => Auth::User()->username,
        'name'=> Auth::User()->name,
        'rule'=> Auth::User()->getNamaRule()
      );

      return view('selamat_datang',['data'=>$user]);

    }

    protected function redirectTo(){
      return redirect('login');
    }
}
