<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class indexController extends Controller
{
    public function index_index(){
    	return view("index/index_index");
    }
    public function login_index(Request $request){
    	$res = $request->all();
        $data = DB::table('login')->where('name',$res['name'])->where('pwd',$res['pwd'])->first();
        // dd($data);
        if(!empty($data)){
            session(['name'=>$res['name'],'u_id'=>$data->u_id]);
            return redirect('/list_index');
        }
    }
    public function list_index(Request $request){
        $query = request()->all();
    	$info=DB::table('zhou')->orderBy('zhou_id','desc')->paginate(2);
    	return view("index/list_index",['info'=>$info,'query'=>$query]);
    }
    public function details_index(){
        $zhou_id = request()->zhou_id;
        $stu = DB::table('zhou')->where(['zhou_id'=>$zhou_id])->get();
        return view("index/details_index",['stu'=>$stu]);
    }
    public function cart_index(Request $request){
        $zhou_id=$request->all();
        // dd($id);
        $u_id=session('u_id');
        // dd($u_id);
        $data=DB::table('zhou')->where('zhou_id',$zhou_id)->first();
        // dd($data);
        $res=DB::table('cart')->where('zhou_id',$zhou_id)->insert([
            'u_id'=>$u_id,
            'name'=>$data->name,
            'zhou_id'=>$data->zhou_id,
            'zhou_img'=>$data->zhou_img,
            'jg'=>$data->jg,
            'add_time'=>time()
        ]);
        if($res){
            return redirect()->action('indexController@cart_shi_index');
        }
    }
    public function cart_shi_index(Request $request){
        $u_id=session('u_id');
        // dd($u_id);
        $data=DB::table('cart')->where('u_id',$u_id)->get();
        // dd($data);
        $price=DB::table('cart')->where('u_id',$u_id)->select('jg')->get();
        // dd($price);
        $total=0;
        foreach($price as $k=>$v){
            $total += $v->jg;
        }
        // dd($total);
        return view("index/cart_shi_index",['data'=>$data],['total'=>$total]);
    }
    public function Settlement_index(Request $request){
        //接受购物车穿过来的id
        $id=$request->get('id');
        // dd($id);
        //去除点右边拼接的，
        $id=trim($id,',');
        // dd($id);
        //接受用户id
        $u_id=session('u_id');
        // dd($u_id);
        //生成订到号
        $oid=time().rand(1000,4000).$u_id;
        // dd($oid);
        //查询单价
        $price=DB::table('cart')->where('u_id',$u_id)->select('jg')->get();
        // dd($price);
        $pay_money=0;
        //循环遍历出来单价相加 求出总价
        foreach($price as $k=>$v){
            $pay_money += $v->jg;
        }
        // dd($pay_money);
        //入库 order
        $res=DB::table('order')->insert([
            'oid'=>$oid,
            'u_id'=>$u_id,
            'pay_money'=>$pay_money,
            'add_time'=>time()
        ]);
        // dd($res);
        $pric=DB::table('cart')->where('u_id',$u_id)->select('zhou_id')->get();
        // dd($pric);
        $zhou_id=0;
        //循环遍历出来单价相加 求出总价
        foreach($pric as $k=>$v){
            $zhou_id = $v->zhou_id;
        }
        // dd($zhou_id);
        //根据商品id查询商品信息
        $zhou_id=explode(',',$zhou_id); //因为whereIn里面的参数必须是数组
        // dd($zhou_id);
        $data=DB::table('zhou')->where('zhou_id',$zhou_id)->get();
        // dd($data);
        //因为查询出来的是二维数组，需要循环遍历出来
        $info=[];
        foreach($data as $v){
            $info[]=[
                'oid'=>$oid,
                'zhou_id'=>$v->zhou_id,
                'name'=>$v->name,
                'zhou_img'=>$v->zhou_img,
                'add_time'=>time()
            ];
        }
        // dd($info);
        $result=DB::table('order_detail')->insert($info);
        // dd($result);
        if($result){
            return redirect()->action('indexController@do_settlement_index',['oid'=>$oid]);
        }
    }
    public function do_settlement_index(Request $request){
        $oid=$request->get('oid'); //一个值用get get接值必须要有参数 如果用all接受是数组的形式
        // dd($oid);
        $where=[
            'oid'=>$oid,
            'status'=>'1'
        ];
        // dd($where);
        $res = DB::table('order_detail')->where($where)->get();
        // dd($res);
        $data = DB::table('order')->where('oid',$oid)->select('pay_money')->get();
        // dd($data);
        return view('index/Settlement_index',['res'=>$res,'data'=>$data]);
    }
    //同步通知
    public function return_url(Request $request){
        $data=$request->all();
        // dd($data);
        DB::table('order')->where('oid',$data['out_trade_no'])->update(['state'=>'2']);
        DB::table('order_detail')->where('oid',$data['out_trade_no'])->update(['status'=>'2']);
        $u_id=session('u_id');
        // dd($u_id);
        DB::table('cart')->where('u_id',$u_id)->update(['status'=>'2']);
        return view('index/return_url',['data'=>$data]);

    }
    //异步通知
    public function asynUrl(Request $request){
        //接收支付宝异步通知
        $data=$request->all();
        $file="/data/wwwroot/default/shop/public/notify.log";
        if (empty($data)){
            file_put_contents($file,'no data',FILE_APPEND);
        }else{
            file_put_contents($file,print_r($data,true),FILE_APPEND);
        }
    }
}
