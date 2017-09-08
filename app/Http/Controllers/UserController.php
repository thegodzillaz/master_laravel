<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    //
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

    function show(){
      $cari ="";
      $userData2 =User::whereHas('role', function ($query) use($cari) {
            $query->where('namaRule', 'like', '%'.$cari.'%');
          })
          ->with('role')
          ->where('userName', '!=' ,$this->user['username'])
          ->get();
       return view('dashboard.users_data', ['data'=>$this->user], ['userData'=>$userData2]);
    }

    function findByName($name){
      $cari = "";
      $userData2 =User::whereHas('role', function ($query) use($cari) {
            $query->where('namaRule', 'like', '%'.$cari.'%');
          })
          ->with('role')
          ->where('userName', '!=' ,$this->user['username'])
          ->get();
       return view('dashboard.users_data', ['data'=>$this->user], ['userData'=>$userData2]);
    }
    function add(){

    }

    function delete($id){
      $users = User::find($id);
      $users->delete();

      return redirect('user');

    }
    function info(){

    }

}
