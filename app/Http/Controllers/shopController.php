<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index_shop(){
    	return view('shop/index_shop');
    }
}
