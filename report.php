<!DOCTYPE html>
<?php session_start(); include("conn.php");?>
<html>

	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="css/amazeui.min.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="css/app.css">
	</head>

	<body style="overflow:auto;">
		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding am-padding-bottom-0">
						<div class="am-fl am-cf">
							<strong class="am-text-primary am-text-lg"> </strong><small>
								<i class="icon-home"></i> &gt; 首页 &gt; 业绩报告管理</small>
						</div>
					</div>
					<hr>
					<div class="container">
						<div class="am-g">
							<div class="am-u-sm-12 am-u-md-6">
								<div class="am-btn-toolbar">

									<div class="am-btn-group am-btn-group-xs">
										<button type="button" class="am-btn am-btn-default btnAdd">
											<span class="icon-plus"></span> 新增
										</button>
									</div>
								</div>
							</div>
					<?php if($_SESSION['priority']<3){ ?>
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right: 110px;" >
									<input  id="职工姓名" placeholder="请输入职工姓名" type="text" name="职工姓名" style="height: 21.4px">
							<input type="hidden" name="flag" value="1" />
							<input name="submit" type="submit" value="搜索" style="margin-left: -5px;" />
								</div>
							</div>
					</form>
					<?php } ?>
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right:30px;" >
									<input  id="职工姓名" placeholder="请输入职工姓名" type="hidden" name="职工姓名" style="height: 21.4px;">
							<input type="hidden" name="flag" value="1" /><input name="submit" type="submit" value="显示全部" style="margin-left: -5px;" />
								</div>
							</div>
					</form>
						</div>
					<div class="am-g" style="margin-top: -30px;">
							<div class="am-u-sm-12">
								<form class="am-form">
									<table class="am-table am-table-striped am-table-hover table-main">
										<thead>
											<tr>
												<th class="" width="50px;">
													<input id="chkAll" type="checkbox">
												</th>
												<th class="table-id" style="width: 80px;">
													ID
												</th>
												<th class="" style="width: 120px">
													姓名
												</th>
												<th class="" style="width: 120px">
													所在部门
												</th>
												<th class="" style="width: 120px">
													日期
												</th>												
												<th class="" style="width: 160px">
													业绩报告
												</th>												
												<th class="table-set">
													操作
												</th>
											</tr>
										</thead>

  <?php 
  if(isset($_POST["flag"]))
   { 
   		if( $_SESSION['priority']==3){  		  
   		  $s = $_SESSION['id'];
 		  $sqlstr ="select 业绩报告.id,姓名,部门名称,提交时间,内容 from 业绩报告,职工,部门 where 业绩报告.职工编号=职工.职工编号 and 职工.部门编号=部门.部门编号 and 职工.职工编号 = '$s' ";
          $result = mysqli_query($conn,$sqlstr);
		while ($rows = mysqli_fetch_row($result)){
				echo "<tr>";
				echo "<td><input name='chks' value='27' type='checkbox'></td>";
				for($i = 0; $i < count($rows); $i++){
					echo "<td height='25' align='left'>".$rows[$i]."</td>";
							}
					echo "<td>
						 <div class='am-btn-toolbar'>
						 <div class='am-btn-group am-btn-group-xs'><button type='button' id='depart_26' class='am-btn am-btn-default am-btn-xs am-text-secondary btnedit'><span class='am-icon-pencil-square-o'></span> 编辑</button><button type='button' class='am-btn am-btn-default am-btn-xs am-text-danger amt-hide-sm-only' onclick='''><span class='am-icon-trash-o'></span> </span><a href = 'deletePart.php?id= ".$rows[0]." ' >删除</a></button></div>
						</div>
						</td>";
					echo "</tr>";
			} }
			else{
		  $sqlstr ="select 业绩报告.id,姓名,部门名称,提交时间,内容 from 业绩报告,职工,部门 where 业绩报告.职工编号=职工.职工编号 and 职工.部门编号=部门.部门编号 and 姓名 like '%".$_POST['职工姓名']."%' ";
          $result = mysqli_query($conn,$sqlstr);
		   while ($rows = mysqli_fetch_row($result)){
				echo "<tr>";
				echo "<td><input name='chks' value='27' type='checkbox'></td>";
				for($i = 0; $i < count($rows); $i++){
					echo "<td height='25' align='left'>".$rows[$i]."</td>";
							}
					echo "<td>
						 <div class='am-btn-toolbar'>
						 <div class='am-btn-group am-btn-group-xs'><button type='button' id='depart_26' class='am-btn am-btn-default am-btn-xs am-text-secondary btnedit'><span class='am-icon-pencil-square-o'></span> 编辑</button><button type='button' class='am-btn am-btn-default am-btn-xs am-text-danger amt-hide-sm-only' onclick='''><span class='am-icon-trash-o'></span> </span><a href = 'deleteReport.php?id= ".$rows[0]." ' >删除</a></button></div>
						</div>
						</td>";
					echo "</tr>";
			}
			}
   
		} 
?>
				
																				
					</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- content end -->
			</div>
		</div>

		<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->


<!--[if (gte IE 9)|!(IE)]><!-->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!--<![endif]-->
		<script type="text/javascript" src="myplugs/js/plugs.js"></script>

		<script>
			$(function() {
				$(".btnedit").click(function() {
					$.jq_Panel({
						title: "修改业绩报告",
						iframeWidth: 500,
						iframeHeight: 350,
						url: "alterReport.html"
					});
				});
				$(".btnAdd").click(function() {

					$.jq_Panel({
						title: "添加业绩报告",
						iframeWidth: 500,
						iframeHeight: 300,
						url: "addReport.html"
					});
				});
			});
		</script>
	</body>

</html>