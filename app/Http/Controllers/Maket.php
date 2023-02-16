<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Maket extends Controller
{
    function MaketView(){
        return view("maket.index");
    }
}
