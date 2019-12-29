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
						<form class="am-form am-form-horizontal" action="addReport_ok.php" method="post" >

				<?php
				if (!($_POST['date'] and $_POST['content'])){
					echo "输入不允许为空。";
				}else{
					$id = $_SESSION['id'];
					$sqlstr1 = "insert into 业绩报告 values(null,$id,'$_POST[date]','$_POST[content]')";
					$result = mysqli_query($conn,$sqlstr1);
				}

				if ($result){
						echo "添加成功!";
				}else{
						echo "<script>alert('添加失败');history.go(-1);</script>";
				}
			
				?>

						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

