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
						<form class="am-form am-form-horizontal" action="addProject_ok.php" method="post" >

				<?php
				if($_SESSION['priority']>2){
					echo "<script>alert('权限不足');go.history(-1);</script>";
				}
			else{
				if (!($_POST['id']and $_POST['projectNo'] and $_POST['projectName'] and $_POST['projectBudget'] and $_POST['partProgress'] and $_POST['projectDeadline'])){
					echo "输入不允许为空。";
				}else{
					$sqlstr1 = "update 项目 set 项目编号 = '$_POST[projectNo]',项目名称 = '$_POST[projectName]',经费预算 = '$_POST[projectBudget]',进度 = '$_POST[partProgress]',截止日期 = '$_POST[projectDeadline]' where 项目编号 =  '$_POST[id]' ";
					$result = mysqli_query($conn,$sqlstr1);
				if ($result){
						echo "修改成功!";
				}else{
						echo "<script>alert('修改失败');history.go(-1);</script>";
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

