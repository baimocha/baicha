<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
	<!-- @if ($errors->any())
		@foreach ($errors->all() as $error)
			{{ $error }} <br />
		@endforeach
	@endif -->
	<form action="{{ url('do_update') }}" method="post">
		<input type="hidden" name="id" value="{{$stu_info->id}}">
		@csrf
		货物名称 : <input type="text" name="name" value="{{$stu_info->name}}"><br />
		货物图片 : <input type="file" name="zhou_img"><br />
		库存 : <input type="text" name="ku"><b
		<input type="submit" value="提交">
	</form>
</body>
</html>