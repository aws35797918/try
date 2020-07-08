<html>
	<head>
		<title>登入會員</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
	<body>
	


		<?php
		setcookie("id","",time()-2*60*60);
		echo "<Script language='javascript'>alert('登出成功!');window.location.href='MemberLogin.php';</Script>";
		
		?>
	</body>


</html>