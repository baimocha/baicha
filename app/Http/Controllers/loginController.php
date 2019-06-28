<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class loginController extends Controller
{
    

    public function login(){
        return view('login/login');
    }
    public function login_do(Request $request){
        $req=$request->all();
        $info = DB::table('login')->get();
        $res = DB::table('login')->first();
        if($res){
            return redirect('/list');
        }
    }

    public function register(){
    	return view('login/register');
    }
    public function register_do(Request $request){
        $req=$request->all();
        $res=DB::table('login')->insert([
            'name'=>$req['name'],
            'pwd'=>$req['pwd'],

        ]);
        if(!empty($res)){
            return redirect('/login');
        }
    }
    
    public function list(){
        $info=DB::table('login')->get();
        return view('list',['info'=>$info]);
    }
}
