<html>
	<head>
		<title>檔案資訊</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
	<body>
		<!---<Script language="javascript">
			alert('哈摟');
		</Script>--->
		
		<div class="login">
		<div class="login2">
		
		<?php 
		if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}
		echo $_COOKIE["id"]."，你好!<br>";
		
		?>
		<div class="loglink">
		<a href="FileUpdate.php" >檔案總管 </a>
		<a href="MemberPwch.php" >更改密碼 </a>
		<a href="MemberDelete.php">刪除帳號 </a>
		<a href="MemberLogout.php">登出 </a>
		</div>
		<hr>
		<?php
			if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}	
		
			$link=mysqli_connect("127.0.0.1","admin","admin","test");
			if($link){echo "<div class='dbc'>Database:ON</div>";}
			mysqli_query($link,"SET NAMES 'utf8'");
		
			$a=$_GET['data'];
			$aaa=$_COOKIE["id"];
		    $datasql="SELECT * FROM fileupdate WHERE FileName='$a' and Account='$aaa'";
			$result=mysqli_query($link,$datasql);
			$row=mysqli_fetch_array($result,MYSQLI_NUM);
			
			echo "<table border='1'><tr><th width='50%'>檔案所有人</th><td>  ".$row[0]."</td></tr>";
			echo "<tr><th>檔案名稱</th><td> ".$row[1]."</td></tr>";
			echo "<tr><th>檔案類型</th><td>  ".$row[2]."</td></tr>";
			echo "<tr><th>檔案大小(Bytes)</th><td> ".$row[3]."</td></tr></table>";
			
		
			
		
		
		
		
		
		
		
		
		
		
			mysqli_close($link);
			
		?>
		</div>
		</div>
		
	</body>


</html>