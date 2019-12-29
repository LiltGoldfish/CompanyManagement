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
						<form class="am-form am-form-horizontal" action="addUser_ok.php" method="post" >

				<?php
				if($_SESSION['priority']>2){
					echo "<script>alert('权限不足');go.history(-1);</script>";
				}
			else{
				if (!($_POST['userNo'] and $_POST['userName'] and $_POST['userSex'] and $_POST['userBirth'] and $_POST['userDepart'])){
					echo "输入不允许为空。";
				}else{
					$sqlstr1 = "insert into 职工 values ($_POST[userNo],'$_POST[userName]','$_POST[userSex]','$_POST[userBirth]',$_POST[userDepart]) ";
					$result = mysqli_query($conn,$sqlstr1);
				if ($result){
						echo "添加成功!";
				}else{
						echo "<script>alert('添加失败');history.go(-1);</script>";
				}
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

