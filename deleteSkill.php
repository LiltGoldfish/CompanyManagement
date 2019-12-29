<?php session_start(); include("conn.php");?>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
<?php
		if($_SESSION['priority']>2){
					echo "<script>alert('权限不足');window.location.href='Skill.php';</script>";
				}
			else{
	$s1=$_GET["id1"]; 
	$s2=$_GET["id2"]; 
	$sql=" delete from 职工掌握技能 where 技能编号 = '$s1' and 职工编号 = '$s2' " ;
	$r=mysqli_query($conn,$sql);   
	if($r){
	echo "<script> alert('删除成功');rel='Skill.php';</script>";
	}else{
	echo "<script>alert('删除失败');rel='Skill.php';</script>";
}
}
?>