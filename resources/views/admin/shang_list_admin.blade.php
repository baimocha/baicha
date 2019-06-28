@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>展示</title>
</head>
<body>
@section('body')
	<form action="">
		商品名称：<input type="text" name="name" value="{{$query['name']??''}}">
		<button>搜索</button>
	</form><br />
	<table border="1">
		<tr>
			<td>货物名称</td>
			<td>货物图片</td>
			<td>库　　存</td>
			<td>价　　格</td>
			<td>添加时间</td>
			<td>操作</td>
		</tr>
		@foreach($info as $v)
		<tr>
			<td>{{ $v->name }}</td>
			<td><img src="{{ $v->zhou_img }}" alt="" width="100px"></td>
			<td>{{ $v->ku }}</td>
			<td>{{ $v->jg }}</td>
			<td>{{ date('Y-m-d H:i:s',$v->time) }}</td>
			<td>
				<a href="{{url('/del_admin')}}?id={{$v->id}}">删除</a>
				<a href="{{url('/update_admin')}}?id={{$v->id}}">修改</a>
			</td>
		</tr>
		@endforeach
	</table>
	{{$info->appends($query)->links()}}
</body>
</html>
@endsection
