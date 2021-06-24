<!doctype html>
<html>
	<!-- head 부분 -->
	<head>
		<title>Web Test Site</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" >
		<link rel="stylesheet" href="style_head.css" type="text/css">
	</head>
	<body>
		<?php session_start(); ?>
		<div id="area_header">
			<h1>Web Test Site</h1>
		</div>
		<div id="area_menu">
			<a href="index.php" target="_parent">홈</a>
			| <a href="board/board_list.php" target="_parent">게시판</a>
			<?php if(!$_SESSION[user_id]): ?>
			| <a href="login.php" target="_parent">로그인</a>
			| <a href="register.php" target="_parent">회원가입</a>
		<?php else: ?>
			|<a href="info.php" target="_parent"><?=$_SESSION[nickname]?>님 정보</a>
			|<a href="nickname.php" target="_parent">닉네임 변경</a>
			|<a href="logout.php" target="_parent">로그아웃</a>
		<?php endif; ?>
		</div>
	</body>
</html>
