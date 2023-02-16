<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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

    }
    
    function UpdateUser (){

    }
    
    function DeleteUser (){

    }

    function CreateUserView(){
        return view("auth.register");
    }
}
