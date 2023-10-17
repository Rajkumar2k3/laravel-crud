<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function aboutUs(){
        if(false){
            return redirect()->route('rajkumar');
        }else{
            return '<h1>your not welcome</h1>';
        }
    }
}
