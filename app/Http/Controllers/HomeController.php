<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(){
       $this->middleware('auth');
    }

    public function home(){
      return view('selamat_datang');
    }

    protected function redirectTo(){
      return redirect('login');
    }
}
