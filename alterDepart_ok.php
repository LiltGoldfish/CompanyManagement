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
						<form class="am-form am-form-horizontal" action="alterDepart_ok.php" method="post" >

	<?php
		$s=$session['id']
		$sqlstr1 = "update 部门 set 部门编号 = '$_POST[departNo]',部门名称 = '$_POST[departName]',部门电话 = '$_POST[departPhone]' where 部门编号 = '$s' ";
		$result = mysqli_query($conn,$sqlstr1);
		if ($result){
			echo "修改成功!";
		}else{
			echo "<script>alert('修改失败');history.go(-1);</script>";
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
