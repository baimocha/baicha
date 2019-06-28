@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>账号添加</title>
</head>
<body>
@section('body')
    <table  border="1">
      <tr>
        <td>账号</td>
      </tr>
      @foreach($info as $v)
      <tr>
        <td>{{$v->name}}</td>
      </tr>
      @endforeach
    </table>
</body>
</html>
@endsection