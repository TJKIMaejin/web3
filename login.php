<!doctype html>
<html>
	<!-- head 부분 -->
	<head>
		<title>로그인</title>
		<link rel="stylesheet" href="style_contents.css" type="text/css">
	</head>
	<body>
			<iframe src="head.php" id="bodyFrame" name="body" width="100%" frameborder="0"></iframe>
		<div id="login_contents" class="contents">
		<form method="post" action="login_check.php">
		<table>
			<tr>
				<th colspan="2" style="background-color: #323232" >
					<font style="color: white; font-size: 150%;" >LOGIN</font>
				</th>
			</tr>
			<tr>
				<th>ID</th>
				<td class="input"><input type="text" name="user_id" style="border: 0;" maxlength="999"></td>
			</tr>
			<tr>
				<th>PASSWORD</th>
				<td class="input"><input type="password" name="user_pw" style="border: 0;" maxlength="20"></td>
			</tr>
		</table>
		<p>
			<input type="submit" value="로그인" class="btn_default btn_gray" >
		</p>
		</form>
		</div>
	</body>
</html
