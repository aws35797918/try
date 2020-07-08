<!DOCTYPE html>
<html>
	<head>
		<title>登入會員</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<script src="jquery-3.5.1.min.js"></script>
	</head>
	<body>
	
		<script src="resize.js"></script>
		<div class="login">
		<div class="kabe"></div>
		<div class="login2">
		<form method="get" action="MemberLogin.php">
			<h2>登入會員</h2><br>
			<div class="inputw">
			請輸入帳號:<input type="text" name="Account" class="input" ><br>
			請輸入密碼:<input type="password" name="Password" class="input"><br><br>
		    <input type="submit" value="送出" class="button"><br>
			</div>
			<div class="link"><a href="MemberCreate.php">加入會員</a></div>
		</form>
		<?php
		$link=mysqli_connect("127.0.0.1","admin","admin","test");
		if($link){echo  "<div class='dbc'>Database:ON</div>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		if(isset($_GET['Account'])&&isset($_GET['Password']))
			{
				$re=0;
				$aaa=$_GET['Account'];
				$ppp=$_GET['Password'];
				$sql="SELECT Account FROM `member`";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_array($result,MYSQLI_NUM))
					{
						if($row[0]==$_GET['Account']){$re++;}
					}
				mysqli_free_result($result);
				if($re>0)
					{
						$sql="SELECT Password FROM `member`WHERE Account='$aaa'";
						$result=mysqli_query($link,$sql);
						if(!$result)
							{
								echo ("Error: ".mysqli_error($link));
								exit();
							}
						while($row=mysqli_fetch_array($result,MYSQLI_NUM))
							{
								if($row[0]==$ppp)
									{
										echo "<Script language='javascript'>alert('登入成功!');window.location.href='FileUpdate.php';</Script>";
										setcookie("id",$aaa,time()+2*60*60);
										
									}
								else
									{
										
										echo "<Script language='javascript'>alert('密碼錯誤!')</Script>";
						
					
									}
							}
						
					}
				else
					{
						echo "<Script language='javascript'>alert('查無此帳號!')</Script>";
						
					}
				
				
			}
		mysqli_close($link);
		
		?>
		
		</div>
		</div>
	</body>


</html>
