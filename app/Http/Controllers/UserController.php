<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Input;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
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
          })// ->with('role')
          ->where('userName', '!=' ,$this->user['username'])
          ->get();
    //  dd($userData2);
    //    return $userData2->toJson();
       return view('dashboard.users_data2', ['data'=>$this->user], ['userData'=>$userData2]);
    }

    function createAjax(Request $data){
        $user=new User();
        $user->name    =  $data->name;
        $user->username=  $data->username;
        $user->email   =  $data->email;
        $user->password=bcrypt($data->password);
        $user->roles_id=1;
        $user->save();

      $msg = "This is a simple message.";
      $userLoad =User::get()->where('userName', '!=', $this->user['username']);
      return response()->json(
        [
          'id'        => 90,//$user->id,
          'name'      => $user->name,
          'username'  => $user->username,
          'email'     => $user->email,
          'roles'     => $user->role->namaRule
      ], 200);
      //return response()->json(User::get()->where('userName', '!=', $this->user['username']));
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
    function addForm(){
      return view('dashboard.add_form_user');
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
