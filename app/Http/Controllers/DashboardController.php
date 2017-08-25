<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

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
             if(Auth::User() != null){
               $user=array(
                 'username' => Auth::User()->username,
                 'name'     => Auth::User()->name,
                 'rule'     => Auth::User()->getNamaRule()
               );
            }else{
              $user=array(
                'username' => "Guest",
                'name'     => "Guest",
                'rule'     => "Guest",
              );
            }
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
      $cari = "";

        // $userData =User::join('roles', 'roles_id', '=', 'roles.id')->
        //   where('namaRule', 'like',  '%'.$cari.'%')
        //   ->paginate(10);

      $userData2 =User::whereHas('role', function ($query) use($cari) {
            $query->where('namaRule', 'like', '%'.$cari.'%');
          })
          ->with('role')
          ->get();
       return view('dashboard.users_data', ['data'=>$this->user], ['userData'=>$userData2]);
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
