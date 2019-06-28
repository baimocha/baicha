<!DOCTYPE html>
<html>
<head>
	<title>用户列表展示页</title>
</head>
<body>
  <form>
  	<table border="1" width="500" align="center">
  		<caption><h1>用户列表</h1></caption>
  		<tr>
  			<th>用户名</th>
  		</tr>

  		@foreach($info as $v)
  		  <tr>
  		  	<td>{{$v->name}}</td>
  		  </tr>
  		@endforeach
  	</table>
  </form>
</body>
</html>