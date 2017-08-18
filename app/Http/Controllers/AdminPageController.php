<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('rule:admin'); // ini rule diregister kerenel->route middleware
    // }

    public function show(){
      return view('admin.home');
    }
}
