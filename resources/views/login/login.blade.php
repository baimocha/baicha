<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>登录</title>
</head>
<body>
	<form action="{{ url('login_do') }}" method="post">
		<table border="1" width="400" align="center">
			<caption><h3>登录页面</h3></caption>
				@csrf
			<tr>
				<th>用户名</th>
				<td>
					<input type="text" name="u_name">
				</td>
			</tr>
			<tr>
				<th>登录密码</th>
				<td>
					<input type="pwd" name="u_pwd">
				</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<input type="submit" value="登录">
				</td>
			</tr>
			
		</table>
		
	</form>
</body>
</html>
