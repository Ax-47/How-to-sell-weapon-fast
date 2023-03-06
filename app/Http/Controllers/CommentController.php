<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Maket;
use App\Models\CommentImage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
class CommentController extends Controller
{
    //

    function post(Request $request){
        $validate = $this->getValidationFactory()->make($request->all(), [
            'images'=>"required",
            'images.*' => 'image|mimes:jpeg,jpg,png|max:2048',
            'product'=>'required|numeric|min:1',
            'review'=>'required|numeric|min:1|max:5',
            'comment'=>'required|string|max:1024',
            ],[
                'images.image'=>'Image only',
                'comment.required' => 'comment is must.',
                'comment.max' => 'comment max have 1024 char.',
            ]);
        if ($validate->fails()) {
                echo $validate->errors();
                return;
            }
        Maket::where('product',$validate->validated()['product'])->where('author', Auth::getUser()->id)->firstOrFail();
        $f=Comments::where('product',$validate->validated()['product'])->where('author', Auth::getUser()->id)->get();
        if (isset($f)){
            
            return response("comment only once",400);
        }
        $ll=array('author'=>Auth::getUser()->id);
        $comment=Comments::create($validate->validated()+$ll);
        foreach ($validate->validated()['images'] as $imagefile) {   
            $image = new CommentImage;
            $filename = time().$imagefile->getClientOriginalName();
             Storage::disk('local')->putFileAs(
                'public/images/comment',
                $imagefile,
                $filename
              );
            $image->image = $filename;
            $image->product = $comment->id;
            $image->save();
        }
        return Redirect::to(url('/product/'.$validate->validated()['product']));

    }
    function fetch(Request $request,int $id){
        $comment=Comments::where('product',$id)->get();
        return $comment;
    }
}
