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

				<?php
				if (!( $_POST['password'] and $_POST['password2'] )){
					echo "输入不允许为空。";
				}else{
					if($_POST['password'] !=  $_POST['password2'])
						{echo "<script>alert('两次密码不相同！');history.go(-1);</script>";}
					else{
					$s=$_SESSION['username'];
					$sqlstr1 = "update user set password ='$_POST[password]' where username = '$s' ";
					$result = mysqli_query($conn,$sqlstr1);}
				if ($result){
						echo "修改成功!";
				}else{
						echo "<script>alert('修改失败');window.location.href='index.php';</script>";
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

