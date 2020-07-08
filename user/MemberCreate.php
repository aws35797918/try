<!DOCTYPE html>
<html>
	<head>
		<title>加入會員</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<script src="jquery-3.5.1.min.js"></script>
	</head>
	<body>
	
		<script src="resize.js"></script>
		<div class="login">
		<div class="kabe"></div>
		<div class="login2">
		<form method="post" action="MemberCreate.php">
			<h2>加入會員</h2><br>
			<div class="inputw">
			請輸入帳號:<input type="text" name="Account" class="input"><br>
			請輸入密碼:<input type="password" name="Password" class="input"><br><br>
			<input type="submit" value="送出"class="button"><br>
			</div>
			<div class="link"><a href="MemberLogin.php">回登入頁面</a></div>
		</form>
		
		<?php
		$link=mysqli_connect("127.0.0.1","admin","admin","test");
		if($link){echo "<div class='dbc'>Database:ON</div>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		if(isset($_POST['Account'])and isset($_POST['Password']))
		{
			$re=0;
			$aaa=$_POST['Account'];
			$ppp=$_POST['Password'];
			$sql="SELECT Account FROM `member`";
			$result=mysqli_query($link,$sql);
			while($row=mysqli_fetch_array($result,MYSQLI_NUM))
				{
					if($row[0]==$_POST['Account']){$re++;}
				}
			
			if($re==0)
				{
					if($aaa!=""&&$ppp!="")
						{
						$sql="INSERT INTO `member`(Account,Password)VALUES('$aaa','$ppp')";
						$result=mysqli_query($link,$sql);
						if($result)
							{
								mkdir("./update/".$aaa, 0777);
								echo "<Script language='javascript'>alert('加入會員成功!');window.location.href='MemberLogin.php';</Script>";
							}
						}
					else
						{
							
							echo "<Script language='javascript'>alert('請完整輸入帳號密碼!');</Script>";
							
						}
				}
			else
				{
					
					echo "<Script language='javascript'>alert('已有重複帳號,請重新輸入!');</Script>";
				}
			
			
		}
		
		mysqli_close($link);
		
		?>
		</div>
		</div>
	</body>


</html>