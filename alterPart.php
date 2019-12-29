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
			if($_SESSION['priority']>2){
					echo "<script>alert('权限不足');go.history(-1);</script>";
				}
			else{
				if (!($_POST['id'] and $_POST['partNo'] and $_POST['partName'] and $_POST['partProject'] and $_POST['partPhone'] and $_POST['partAddress'])){
					echo "输入不允许为空。";
				}else{
					$sqlstr1 = "update 甲方 set 甲方编号='$_POST[partNo]',甲方名称='$_POST[partName]',项目编号='$_POST[partProject]',甲方电话='$_POST[partPhone]',地址='$_POST[partAddress]' where 甲方编号 = '$_POST[id]'";
					$result = mysqli_query($conn,$sqlstr1);
				if ($result){
						echo "修改成功!";
				}else{
						echo "<script>alert('修改失败');</script>";
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

