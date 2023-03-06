<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\product_images;
use Illuminate\Support\Facades\Storage;
use App\Models\Comments;
class ProductController extends Controller
{
    function CreateProduct (Request $request){
        if (!Auth::check()){
            return Redirect::to(route("login"));
        }
        $validate = $this->getValidationFactory()->make($request->all(), [
            'images'=>"required",
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'name'=>'required|string|max:257',
            'stock'=>'required|numeric|min:1',
            'price'=>'required|numeric|min:1',
            'description'=>'required|string|max:1025',
            ],[
                'name.required' => 'Name is must.',
                'name.min' => 'Name must have 5 char.',
            ]);
        $item =Product::where('author', Auth::getUser()->id)->where("name",$validate->validated()['name'])->first();
        if (isset($item)){
            echo "400";
            return;
        }
        if ($validate->fails()) {
            echo $validate->errors();
            return ;
        }
        $product_created=Product::create([
            "name"=>$validate->validated()['name'],
            "author"=>Auth::getUser()->id,
            "stock"=>$validate->validated()['stock'],
            "price"=>$validate->validated()['price'],
            "description"=>$validate->validated()['description'],
        ]);
        foreach ($validate->validated()['images'] as $imagefile) {   
            $image = new product_images;
            $filename = time().$imagefile->getClientOriginalName();
             Storage::disk('local')->putFileAs(
                'public/images/products',
                $imagefile,
                $filename
              );
            $image->image = $filename;
            $image->product = $product_created->id;
            $image->save();
        }
        
        
        return Redirect::to(url('/product/'.$product_created->id));
        
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

           
            $item =Product::findOrFail($id);
            $comment=Comments::where('product',$id)->get();
            return view("product.profile")
                    ->with(compact('item'))
                    ->with(compact('id'))
                    ->with(compact('comment'))
                    ;
        }
    }
}
