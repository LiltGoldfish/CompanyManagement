<?php
session_start();
header("Content-type:text/html;charset=utf-8");
include("conn.php");

$name=$_POST['username'];
$pwd=$_POST['password'];
$yzm=$_POST['yzm'];
 if($pwd==''){

 echo "<script>alert('请输入密码');location='" . $_SERVER['HTTP_REFERER'] . "'</script>";
 exit;

 }
 if($yzm!=$_SESSION['VCODE']){

 echo"<script>alert('你的验证码不正确，请重新输入');location='".$_SERVER['HTTP_REFERER']. "'</script>";
 exit;
 }

 $sql_select="select * from user where username = '$name' "; //从数据库查询信息
 $result = mysqli_query($conn,$sql_select);
 $row = mysqli_fetch_row($result);
 if($row){

 if($pwd != $row[1] || $name != $row[0]){

 echo "<script>alert('密码错误，请重新输入');location='home.html'</script>";
 exit;
 }
 else{
 $_SESSION['username']=$row[0];
 $_SESSION['id']=$row[4];
 $_SESSION['priority']=$row[3];
 if($row[3]==1)
 {echo "<script>alert('管理员登录成功!');location='index.php'</script>";}
 else if($row[3]==2)
 {echo "<script>alert('经理登录成功!');location='index.php'</script>";}
 else if($row[3]==3)
 {echo "<script>alert('职工登录成功!');location='index.php'</script>";}
 }

 }

 else{
 echo "<script>alert('您输入的用户名不存在');location='home.html'</script>";
 exit;
 };