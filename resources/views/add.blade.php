<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加</title>
</head>
<body>
	<!-- @if ($errors->any())
		@foreach ($errors->all() as $error)
			{{ $error }} <br />
		@endforeach
	@endif -->
	<form action="{{ url('do_add') }}" method="post">
		@csrf
		姓名 : <input type="text" name="name"><br />
		年龄 : <input type="text" name="age"><br />
		性别 : <input type="radio" name="sex" value='1'>男 <input type="radio" name="sex" value='2'>女<br />
		<input type="submit" value="提交">
	</form>
</body>
</html>