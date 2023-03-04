<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        
        $item =User::firstWhere('name',$name);
        if (isset($item)){
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

        Auth::login(User::create(["name"=>$name,"password"=>Hash::make($password)],true));
        
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
        $name=$request->post("name");
        $a=User::where('name', $name)->first();
        if (empty($a)){
            echo 404;
            return;
        }
        if (!Hash::check($request->post("password"),$a["password"])){
            echo 402;
            return;
        }
        Auth::login($a,true);
   
        return Redirect::to(url('/'));

    }
    function CreateUserView(){
        return view("auth.register");
    }
    function GetProfile ($id= null){
        if ($id !== null){
            $data=User::where('id', $id)->first();
            
            if (empty($data)){
                echo '404';
                return;
            }
            echo "u";
            if ($data->id ===auth::getUser()->id){
                return view('auth.profile',compact('data'))->with("self",true);
            }else{
                return view('auth.profile',compact('data'))->with("self",false);
            }
            
        }
        if (auth::check()){
            $a=User::where('id', auth::getUser()->id)->first();
            return view('auth.profile',compact('a'))->with("self",true);
        }else{
            return Redirect::to(route('login'));
        }
    }
}
