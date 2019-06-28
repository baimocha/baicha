<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class adminController extends Controller
{
	//登录
    public function login_admin(){
    	return view("admin/login_admin");
    }
    public function do_login_admin(Request $request){
    	$res = $request->all();
        $data = DB::table('login')->where('name',$res['name'])->where('pwd',$res['pwd'])->first();
        // dd($data);
        if(!empty($data)){
            Session(['data'=>$res['name']]);
            return redirect('/index_admin');
        }
    }
	//主页
    public function index_admin(){
    	return view("admin/index_admin");
    }
    //账号添加
    public function add_admin(){
    	return view("admin/add_admin");
    }
    public function do_add_admin(Request $request){
    	$req=$request->all();
        $res=DB::table('login')->insert([
            'name'=>$req['name'],
            'pwd'=>$req['pwd'],

        ]);
        if(!empty($res)){
            return redirect('/list_admin');
        }
    }
    //账号展示
    public function list_admin(){
    	$info=DB::table('login')->get();
    	return view('admin/list_admin',['info'=>$info]);
    }
    //商品添加
    public function shang_add_admin(){
    	return view("admin/shang_add_admin");
    }
    //商品添加执行
    public function do_shang_add_admin(Request $request){
    	$data=$request->all();
        $path = $request->file('zhou_img')->store('zhou');
        $zhou_img=asset('storage'.'/'.$path);
        // dd($zhou_img);
        $data['zhou_img']=$zhou_img;
        $data['time']=time();
        unset($data['_token']);
        $res=DB::table('zhou')->insert($data);
        if ($res){
            return redirect('/shang_list_admin');
        }
    }
    public function shang_list_admin(Request $request){
    	$query = request()->all();
    	$where = [];
    	if($query['name']??''){
            $where[] = ['name','like',"%$query[name]%"];
        }
        $info = DB::table('zhou')->where($where)->orderBy('id','desc')->paginate(2);
    	return view('admin/shang_list_admin',['info'=>$info,'query'=>$query]);
    }
    public function del_admin(Request $request){
    	$id = $request->all();
    	$data = DB::table('zhou')->where(['id'=>$id])->delete();
    	if($data){
    		return redirect('/shang_list_admin');
    	}
    }
    //学生列表增删改查
    //添加
    public function tian_admin(){
        return view("admin/tian_admin");
    }
    //添加执行
    public function do_tian_admin(Request $request){
        $req=$request->all();
        $res=DB::table('xs')->insert([
            'name'=>$req['name'],
            'age'=>$req['age'],
        ]);
        if(!empty($res)){
            return redirect('/xue_admin');
        }
    }
    //展示
    public function xue_admin(Request $request){
        $query = request()->all();
        $where = [];
        if($query['name']??''){
            $where[] = ['name','like',"%$query[name]%"];
        }
        $info = DB::table('xs')->where($where)->orderBy('id','desc')->paginate(2);
        return view('admin/xue_admin',['info'=>$info,'query'=>$query]);
    }
    //删除
    public function xue_del_admin(Request $request){
        $id=$request->all();
        $data=DB::table('xs')->where(['id'=>$id])->delete();
        if($data){
            return redirect('/xue_admin');
        }
    }
    //修改
    public function xue_update_admin(Request $request){
        $req=$request->all();
        $stu = DB::table('xs')->where(['id'=>$req['id']])->first();
        return view('admin/xue_update_admin',['stu'=>$stu]);
    }
    //修改执行
    public function do_xue_update_admin(Request $request){
        $req = $request->all();
        // dd($req);
        unset($req['_token']);
        $res=DB::table('xs')->where('id',$req['id'])->update($req);
        if($res){
            return redirect('/xue_admin');
        }
    }
}
