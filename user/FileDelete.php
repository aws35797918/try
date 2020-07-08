<html>
	<head>
		<title>檔案刪除</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
	<body>
		<Script language="javascript">
			alert('哈摟');
		</Script>
		
		
		
		<?php
			if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}
		
			$link=mysqli_connect("127.0.0.1","admin","admin","test");
			if($link){echo "成功連接資料庫<br>";}
			mysqli_query($link,"SET NAMES 'utf8'");
		
			$a=$_GET['delete'];
			$aaa=$_COOKIE["id"];
		    unlink("update/$aaa/$a");
			$deletesql="DELETE FROM fileupdate WHERE FileName='$a'";
			$result=mysqli_query($link,$deletesql);
			if($result)
			{
				echo "<Script language='javascript'>alert('刪除成功');window.location.href='FileUpdate.php';</Script>";
			}
			else
			{
				echo "<Script language='javascript'>alert('刪除失敗請重新再試');window.location.href='FileUpdate.php';</Script>";
			}
			
			mysqli_close($link);
			
			
		?>
		
	</body>


</html>