<html>
	<head>
		<title>刪除會員</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	</head>
	<body>
		
		<div class="login">
		<div class="login2">
		
		</div>
		</div>
		
		<?php
	
		 if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}
		$link=mysqli_connect("127.0.0.1","admin","admin","test");
		if($link){echo "成功連接資料庫<br>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		
		
		$aaa=$_COOKIE["id"];
						
		$sql="DELETE FROM `member` WHERE `Account`='$aaa'";
		$result=mysqli_query($link,$sql);
		$sql2="DELETE FROM `fileupdate` WHERE `Account`='$aaa'";
		$result2=mysqli_query($link,$sql2);
		if($result&&$result2)
			{
				
					
				setcookie("id","",time()-2*60*60);
				$dir=scandir("./update/".$aaa);
				foreach($dir as $f)
				{	
					
					if($f!="."&&$f!="..")
					{
						echo $f;
						unlink("./update/$aaa/".$f);
					}
					
				}
				rmdir("./update/".$aaa);
				echo "<Script language='javascript'>alert('刪除帳號成功!');window.location.href='MemberLogin.php';</Script>";
				
			}
		else
			{
				echo "<Script language='javascript'>alert('請刪除所有檔案!');";
			}
						
					
				
				
			
		
		 mysqli_close($link);
		
		?>
	</body>


</html>