<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class studentController extends Controller
{
    public function index(){
    	$redis = new \Redis();
    	$redis->connect('127.0.0.1','6379');

    	$redis->incr('num');
    	$num=$redis->get('num');
    	echo $num."<br />";
    	$stident_info = DB::table('student')->get();
    	return view('index',['data'=>$stident_info]);
    }



    public function add(){
    	$redis = new \Redis();
    	$redis->connect('127.0.0.1','6379');

    	$redis->incr('num');
    	$num=$redis->get('num');
    	echo $num."<br />";
    	return view('add');
    }



    public function do_add(Request $request){
    	$req = $request->all();
    	// $validatedData = $request->validate([
    	// 	'name' => 'required',
    	// 	'age' => 'required', 
    	// ],[
    	// 	'name.required'=>"11"
    	// ]);
    	$result = DB::table('student')->insert([
    		'name'=>$req['name'],
    		'age'=>$req['age'],
    		'sex'=>$req['sex'],
    		'addtime'=>time()
    	]);
    	if($result){
    		return redirect('index');
    	}
    	// dd($result);
    }



    public function del(Request $request){
    	$id = $request->all();
    	// dd($id);
    	$data = DB::table('student')->where(['id'=>$id])->delete();
    	if($data){
    		return redirect('index');
    	}
    }



    public function update(Request $request){
    	$req = $request->all();
    	$stu_info = DB::table('student')->where(['id'=>$req['id']])->first();
    	// dd($stu_info);
    	return view('update',['stu_info'=>$stu_info]);
    }



    public function do_update(Request $request){
    	$req = $request->all();
    	// dd($req);
    	$result = DB::table('student')->where(['id'=>$req['id']])->update([
    		'name'=>$req['name'],
    		'sex'=>$req['sex'],
    		'age'=>$req['age']
    	]);
    	if(!empty($result)){
    		return redirect('/index');
    	}
    }
}
