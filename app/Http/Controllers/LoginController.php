<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest');
    }

    public function getLogin(){
    	return view('login.formLogin');
    }
    public function postLogin(Request $request){
      //Ingat password pada db harus dihash atau bcrypt();
      $rule1=array('email'=>$request->emailUserName, 'password'=>$request->password);
      $rule2=array('username'=>$request->emailUserName, 'password'=>$request->password);
      if (Auth::attempt($rule1)) { //Login by email
          return redirect('/');
      }elseif(Auth::attempt($rule2)){ // Login by username
          return redirect('/');
      }else{
          return redirect('login');
      }
    }
}
