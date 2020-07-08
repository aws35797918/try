<!DOCTYPE html>
<html>
	<head>
		<title>更改密碼</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css.css" />
		<script src="jquery-3.5.1.min.js"></script>
		<script language="javascript">
			
				function deletes(){
				var sure=confirm("確定要刪除帳號?");
				if(sure){ location.href="MemberDelete.php";}
				
				
				
				}
		</script>
	</head>
	<body>
		<script src="resize.js"></script>
		<div class="login">
		<div class="kabe"></div>
		<div class="login2">
		<?php 
		if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}
		echo $_COOKIE["id"]."，你好!<br>";
		
		?>
		<div class="loglink">
		<a href="FileUpdate.php" >檔案總管 </a>
		<a href="MemberPwch.php" >更改密碼 </a>
		
		<a href="MemberLogout.php">登出 </a>
		</div>
		<hr>
		<div class="inputw">
		<form method="POST" action="MemberPwch.php">
			帳號: <input type="text" name="Account" class="input"value="<?php echo $_COOKIE['id'];?>" readonly><br>
			請輸入新密碼:<input type="password" name="Password" class="input"><br>
			<input type="submit" value="送出" class="button"><br>
		</form>
		
		<?php
		if(!isset($_COOKIE["id"])){echo "<Script language='javascript'>alert('請登入帳號!');window.location.href='MemberLogin.php';</Script>";}
		$link=mysqli_connect("127.0.0.1","admin","admin","test");
		if($link){echo  "<div class='dbc'>Database:ON</div>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		if(isset($_POST['Password']))
			{
				$re=0;
				$aaa=$_COOKIE["id"];
				$ppp=$_POST['Password'];
				$sql="SELECT Account FROM `member`";
				$result=mysqli_query($link,$sql);
				while($row=mysqli_fetch_array($result,MYSQLI_NUM))
					{
						if($row[0]==$aaa){$re++;}
					}
				
				if($re>0)
					{	
						if($ppp!="")
							{
								$sql="UPDATE `member`SET`Password`='$ppp' WHERE `Account`='$aaa'";
								$result=mysqli_query($link,$sql);
								if($result)
									{
										echo "<Script language='javascript'>alert('更改密碼成功');window.location.href='FileUpdate.php';</Script>";
									}
							}
						else
							{
								echo "<Script language='javascript'>alert('請輸入密碼!');";
							}
					}
				else
					{
						echo "<Script language='javascript'>alert('更改密碼失敗!');";
					}
				
				
			}
		mysqli_close($link);
		
		?>
			<button onclick="deletes()" class="delete">刪除帳號</button>
			
			</div>
		</div>
		</div>
	</body>


</html>