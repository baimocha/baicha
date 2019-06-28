@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账号添加</title>
</head>
<body>
@section('body')
	<form action="{{ url('do_add_admin') }}" method="post" enctype="multipart/form-data">
		@csrf
		<table  border="1">
			<tr>
				<td>邮箱 : <input type="text" name="name"></td>
			</tr>
			<tr>
				<td>密码 : <input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>
@endsection