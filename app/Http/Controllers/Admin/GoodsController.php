<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function add_goods(){
    	return view('admin/add_goods');
    }
    public function do_add_goods(Request $request){
    	$path = $request->file('g_img');
    	dd($path);
    }
}
