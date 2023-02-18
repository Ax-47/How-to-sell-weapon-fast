<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Maket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class MaketController extends Controller
{
    function MaketView(){
        return view("maket.index");
    }
    function Buy(Request $request ){
        if(!Auth::check()){
            echo 403;
            return;
        }

        $id=$request->post('product');
        $stock=$request->post('stock');
        $uid=Auth::getUser()->id;
        if ($stock<0){
            echo 401;
            return;
        }
        $product=Product::where("id",$id)->first();
        $user=User::where("id",$uid)->first();
        if (empty($product)){
            echo 404;
            return;
        }
        if ($product->stock < $stock){
            echo 4001;
            return;
        }
        $paid=$product->price * $stock;
        if ($paid > $user->money){
            echo 400;
            return;
        }

        $paid=$product->price * $stock;
        $user->money=$user->money-$paid;
        $user->save();
        Maket::create(["id"=>Str::uuid(),'product'=>$id,"author"=>$uid,'paid'=>$paid,'stock'=>$stock]);

        return view("maket.index");
    }
    //buy
}
