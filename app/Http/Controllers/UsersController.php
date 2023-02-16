<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    function CreateUser (Request $request){
        $name=$request->post('name');
        $password=$request->post('password');
        $repassword=$request->post('repassword');
        $item =DB::select("select username from users where username=?",[$name]);
        if (!isset($item)){
            echo 403;
            return;
        }
        if ($password !== $repassword){
            echo 400;
            return;
        }
        if (strlen($password)<6){
            echo 400;
            return;
        }
        DB::insert("insert into users (id_user,username,password) values (?,?,?)",[
            Str::uuid()->toString(),
            $name,
            Hash::make($password)
        ]);
        return Redirect::to(url('/maket'));
    }
    
    function GetUser (){
        return view('auth.profile');
    }
    
    function UpdateUser (){

    }
    
    function DeleteUser (){

    }
    function LoginView(){
        return view("auth.login");
    }
    function Login(Request $request){
        $username=$request->post("username");
        $a=DB::select("select password,id_user from users where username=?",[$request->post("username")]);
        if (empty($a)){
            return;
        }
       
        echo auth()->user();
        if (Auth::attempt(['username' => $username, 'password' => $a[0]->password], true)){
            echo 404;
            return;
        }
        echo 402;
        return;
    }
    function CreateUserView(){
        return view("auth.register");
    }
    function GetProfile ($id= null){
        
        return ;
    }
}
