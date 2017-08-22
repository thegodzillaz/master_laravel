<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function getLogin()
    {
    	return view('login.formLogin');
    }

    public function postLogin(Request $request)
    {
      // //Ingat password pada db harus dihash atau bcrypt();
      $email    =array('email'=>$request->emailUserName, 'password'=>$request->password);
      $userName =array('username'=>$request->emailUserName, 'password'=>$request->password);
      if (Auth::attempt($email)) { //Login by email
          return redirect('/dashboard');
      }elseif(Auth::attempt($userName)){ // Login by username
          return redirect('/dashboard');
      }else{
          return redirect('login');
      }
    }
}
