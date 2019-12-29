<?php session_start(); include("conn.php");?>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
<?php
	$s=$_GET["id"]; 
	$sql=" delete from 绩效信息 where id = $s " ;
	$r=mysqli_query($conn,$sql);    
	if($r){
	echo "<script> alert('删除成功');rel='Allow.php';</script>";
	}else{
	echo "<script>alert('删除失败');rel='Allow.php';</script>";
	}
?>