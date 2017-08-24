<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    // public function __construct(){
    //     $this->middleware('auth');
    //     $this->middleware('rule:admin'); // ini rule diregister kerenel->route middleware
    // }
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
             $user=array(
               'username' => Auth::User()->username,
               'name'=> Auth::User()->name,
               'rule'=> Auth::User()->getNamaRule()
             );
             $this->user=$user;
            return $next($request);
        });
    }


    public function show()
    {//oonly admin rule set in route
      return view('dashboard.home');
    }

    public function home()
    {
      $user=array(
        'username' => Auth::User()->username,
        'name'=> Auth::User()->name,
        'rule'=> Auth::User()->getNamaRule()
      );
      return view('dashboard.admin_dashboard',['data'=>$user]);
    }


    public function user()
    {
      return view('dashboard.users_data', ['data'=>$this->user]);
    }

    public function formAddUser(){
      return view('dashboard.add_user_form');

    }
    public function updateUser(){

    }
    public function deleteUser(){

    }
    public function profilUser(Request $r){

    }

    public function addUser(Request $request){
      $this->validate($request, [
          'name'    => 'required|min:5',
          'username'=> 'required|unique:users|min:5',
          'email'   => 'required|unique:users|min:5',
          'password'=> 'required|confirmed|min:5',
        ]
      );
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
    }



}
