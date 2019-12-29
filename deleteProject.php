<?php session_start(); include("conn.php");?>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
<?php
if($_SESSION['priority']>2){
					echo "<script>alert('权限不足');window.location.href='Project.php';</script>";
				}
			else{
	$s=$_GET["id"]; 
	$sql=" delete from 项目 where 项目编号 = '$s' ";
	$r=mysqli_query($conn,$sql);   
	if($r){
	echo "<script> alert('删除成功');rel='Project.php';</script>";
	}else{
	echo "<script>alert('删除失败');rel='Project.php';</script>";
}
}
?>