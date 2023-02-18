<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
class ProductController extends Controller
{
    function CreateProduct (Request $request){
        if (!Auth::check()){
            return Redirect::to(route("login"));
        }
        $name_product=$request->post('name');
        $stock=$request->post('stock');
        $price=$request->post('price');
        $description=$request->post('description');
        $item =Product::where('author', Auth::getUser()->id)->where("name",$name_product)->first();
        if (isset($item)){
            echo "400";
            return;
        }
        if ($stock<0 || $price<0){
            echo "ทำควยไร";
            return;
        }
        if (strlen($description)>1024 ){
            echo "ทำควยไร";
            return;
        }
        if (strlen($name_product)>256 ){
            echo "ทำควยไร";
            return;
        }
        $product_created=Product::create([
            "name"=>$name_product,
            "author"=>Auth::getUser()->id,
            "stock"=>$stock,
            "price"=>$price,
            "description"=>$description,
        ]);
        return Redirect::to(url('/product/'.$product_created->id));
        // echo "$request->post('name')";
    }
    
    function GetProduct (){

    }
    function UpdateProduct (){

    }
    function DeleteProduct (){

    }
    function CreateProductView(){
        return view("product.create");
    }
    function ProductView($id=null){
        if ($id ===null){
            return view("product.create");
        }else{

           
            $item =Product::with('user')->get()[0];
            return view("product.profile",compact('item'));
        }
    }
}
