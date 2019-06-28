@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>学生修改</title>
</head>
<body>
@section('body')
	<form action="{{ url('do_xue_update_admin') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id" value="{{$stu->id}}">
		<table  border="1">
			<tr>
				<td>姓名 : <input type="text" name="name" value="{{$stu->name}}"></td>
			</tr>
			<tr>
				<td>年龄 : <input type="text" name="age" value="{{$stu->age}}"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>
@endsection