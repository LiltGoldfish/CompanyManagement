<!DOCTYPE html>
<?php session_start(); include("conn.php");?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		
		<link rel="stylesheet" href="css/amazeui.min.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/app.css">
		<style>
			.admin-main{
				padding-top: 0px;
			}
		</style>
	</head>
	<body>		
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-g">
						<form class="am-form am-form-horizontal" action="addPart_ok.php" method="post" >

				<?php
				if (!($_POST['email'] and $_POST['username'] and $_POST['password'] and $_POST['password2'] and $_POST['id'])){
					echo "输入不允许为空。";
				}else{
					if( $_POST['password'] !=  $_POST['password2'])
						{echo "两次密码不相同！";}
					else{
					$sqlstr1 = "insert into user(email,username,password,id) values ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[id]')";
					$result = mysqli_query($conn,$sqlstr1);
					}
				if ($result){
						echo "注册成功!";
				}else{
						echo "<script>alert('注册失败');history.go(-1);</script>";
				}
			}
				?>

						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

