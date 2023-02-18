<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Maket;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
        if ($product->price > $user->money){
            echo 400;
            return;
        }
        $paid=$product->price * $stock;
        $user->money=$user->money-$paid;
        $user->save();
        Maket::create(['product'=>$id,"author"=>$uid,'paid'=>$paid,'stock'=>$stock]);

        return view("maket.index");
    }
    //buy
}
