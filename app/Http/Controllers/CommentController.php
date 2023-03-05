<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Maket;
class CommentController extends Controller
{
    //

    function post(Request $request,$id=null){
        $validate = $this->getValidationFactory()->make($request->all(), [
            'product'=>'required|numeric|min:1',
            'review'=>'required|numeric|min:1',
            'comment'=>'required|string|max:1024',
            ],[
                'comment.required' => 'Name is must.',
                'comment.min' => 'Name must have 1024 char.',
            ]);
        if ($validate->fails()) {
                echo "error";
                return;
            }
        Maket::where('product',$validate->validated()['product'])->where('author', Auth::getUser()->id)->firstOrFail();
        
        $ll=array('author'=>Auth::getUser()->id);
        Comments::create($validate->validated()+$ll);
        echo "sus";

    }
}
