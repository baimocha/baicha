@extends('layout.common')
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品添加</title>
</head>
<body>
@section('body')
	<form action="{{ url('do_shang_add_admin') }}" method="post" enctype="multipart/form-data">
		@csrf
		<table  border="1">
			<tr>
				<td>货物名称 : <input type="text" name="name"></td>
			</tr>
			<tr>
				<td>货物图片 : <input type="file" name="zhou_img"></td>
			</tr>
			<tr>
				<td>库　　存 : <input type="text" name="ku"></td>
			</tr>
			<tr>
				<td>价　　格 : <input type="text" name="jg"></td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>
@endsection