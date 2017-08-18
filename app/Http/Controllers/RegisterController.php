<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;

class RegisterController extends Controller
{
    //
    public function __construct(){
       $this->middleware('guest');
    }

    public function getRegister(){
    	return view('register.formRegister');
    }

    public function postRegister(Request $request){
      if($request->passwrod == $request->password_verify){
      	$user=new User();
      	$user->name    =$request->name;
      	$user->username=$request->username;
      	$user->email   =$request->email;
      	$user->password=bcrypt($request->password);
      	$user->roles_id=DB::table('roles')
          ->select('id')
          ->where('namaRule','user')
          ->first()->id;
        $user->save();
        return redirect('login');
      }else {
        echo "Verfication password unproperly";
        return redirect('register');
      }
    }
}
