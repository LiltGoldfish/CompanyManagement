<?php
$conn = mysqli_connect("localhost", "root", "admin") or die("连接数据库服务器失败！".mysql_error()); //连接MySQL服务器
mysqli_select_db($conn,"company_management");			//选择数据库db_database18
mysqli_query($conn,"set names utf8");						//设置数据库编码格式utf8
?>