<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    function CreateProduct (Request $request){
        $name_product=$request->post('name');
        $id_author=$request->post('author');
        $token = $request->session()->token();
        $token = csrf_token();
        $id= Str::uuid()->toString();
        $item =DB::select("select name,author from products where name=? and author=?",[$name_product,$id_author]);
        
        if (!isset($item)){
            echo "400";
            return;
            
        }
        
        DB::insert("insert into products (id_product,name,author,number) values (?,?,?,?)",[
            $id,
            $name_product,
            $id_author,
            $request->post('number')
        ]);
        return Redirect::to(url('/product/'.$id));
        // echo "$request->post('name')";
    }
    function CreateProductView(){
        return view("product.Create");
    }
    function GetProduct (){

    }
    function UpdateProduct (){

    }
    function DeleteProduct (){

    }
    
}
