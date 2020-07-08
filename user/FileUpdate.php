<!DOCTYPE html>
<html>
	<head>
		<title>檔案總管</title>
		<link rel="stylesheet" type="text/css" href="css.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<script src="jquery-3.5.1.min.js"></script>
	</head>
	<body>
		<script src="resize.js"></script>
		<!---<Script language="javascript">
			alert('哈摟');
		</Script>--->
		
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
		<form action="FileUpdate.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="submit" value="上傳">
			<input type="reset" value="重設">
		
		
		</form>
		
	
		<?php
		$aaa=$_COOKIE["id"];
		
		$link=mysqli_connect("127.0.0.1","admin","admin","test");
		if($link){echo "<div class='dbc'>Database:ON</div>";}
		mysqli_query($link,"SET NAMES 'utf8'");
		
		if(isset($_FILES["file"])&&isset($_COOKIE["id"]))
		{
			
			$tmp=$_FILES["file"]["tmp_name"];
			$name=$_FILES["file"]["name"];
			$type=$_FILES["file"]["type"];
			$size=$_FILES["file"]["size"];
			if($name!="")
			{
				move_uploaded_file($tmp,"./update/$aaa/".$name);
				$upsql="INSERT INTO fileupdate (Account,FileName,FileType,FileSize)VALUE('$aaa','$name','$type','$size')";
				$result=mysqli_query($link,$upsql);	
				if($result){echo "<Script language='javascript'>alert('上傳成功');</Script>";}
			}
			else "請重新操作";
		}
		echo "<table border=1>";
		echo"<tr><th colspan='4'>目前有的檔案:</th></tr>";
		$a=scandir("./update/$aaa");
		foreach($a as $i=>$row)
		{
			if($i>1)
			{
				echo "<tr>";
				echo "<td width='50%'>$a[$i]</td>";
				echo " <td><a href='FileData.php?data=$a[$i]'>查看資訊</a></td>";
				echo " <td><a href='./update/$aaa/$a[$i]' target='_blank'>檢視</a></td>";
				echo " <td><a href='FileDelete.php?delete=$a[$i]'>刪除</a></td>";
				echo "</tr>";
			}
		}
		echo"</table>";
		mysqli_close($link);
		?>
		</div>
		</div>
	</body>


</html>