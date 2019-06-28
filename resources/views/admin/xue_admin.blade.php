@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>学生列表</title>
</head>
<body>
@section('body')
  <form action="">
    学生姓名：<input type="text" name="name" value="{{$query['name']??''}}">
    <button>搜索</button>
  </form><br />
  <table border="1">
    <tr>
      <td>姓名</td>
      <td>年龄</td>
      <td>操作</td>
    </tr>
    @foreach($info as $v)
    <tr>
      <td>{{ $v->name }}</td>
      <td>{{ $v->age }}</td>
      <td>
        <a href="{{url('/xue_del_admin')}}?id={{$v->id}}">删除</a>
        <a href="{{url('/xue_update_admin')}}?id={{$v->id}}">修改</a>
      </td>
    </tr>
    @endforeach
  </table><br/>
  {{$info->appends($query)->links()}}
</body>
</html>
@endsection