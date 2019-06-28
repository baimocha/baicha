<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<form action="{{ url('register_do') }}" method="post">
		<input type="hidden" name="_token" value="{{csrf_token()}}">
		账号 : <input type="text" name="name"><br />
		密码 : <input type="text" name="pwd"><br />
		<input type="submit" value="提交">
	</form>
</body>
</html>