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
								<i class="icon-home"></i> &gt; 首页 &gt; 部门管理</small>
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
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right: 110px;" >
									<input  id="部门名称" placeholder="请输入部门名称" type="text" name="部门名称" style="height: 21.4px">
							<input name="submit" type="submit" value="搜索" style="margin-left: -5px;" />
								</div>
							</div>
					</form>
					<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="" >
								<div class="" style="position: absolute;right:30px;" >
									<input  id="部门名称" placeholder="请输入部门名称" type="hidden" name="部门名称" style="height: 21.4px;">
							<input name="submit" type="submit" value="显示全部" style="margin-left: -5px;" />
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
												<th class="table-id" style="width: 150px;">
													ID
												</th>
												<th class="" style="width: 250px">
													部门名称
												</th>
												<th class="" style="width: 250px">
													部门电话
												</th>												
												<th class="table-set">
													操作
												</th>
											</tr>
										</thead>
  <?php 
  if(isset($_POST["submit"]))
   { 
  	  $sqlstr ="select * from 部门 where 部门名称 like '%".$_POST['部门名称']."%'";
      $result = mysqli_query($conn,$sqlstr);
		while ($rows = mysqli_fetch_row($result)){
				echo "<tr>";
				echo "<td><input name='chks' value='27' type='checkbox'></td>";
				for($i = 0; $i < count($rows); $i++){
					echo "<td height='25' align='left'>".$rows[$i]."</td>";
							}
					echo "<td>
						 <div class='am-btn-toolbar'>
						 <div class='am-btn-group am-btn-group-xs'>
						 <button type='button' class='am-btn am-btn-default am-btn-xs am-text-secondary btnedit' ></span>
						 <span class='am-icon-pencil-square-o'>编辑
						</button>
						 <button type='button' class='am-btn am-btn-default am-btn-xs am-text-danger amt-hide-sm-only ' onclick='deleteDepart(26,1)''>
						 <span class='am-icon-trash-o'></span> <a href = 'deleteDepart.php?id= ".$rows[0]." ' >删除</a>
						 </button>

						</div>
						</div>
						</td>";
					echo "</tr>";
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
						title: "修改部门",
						iframeWidth: 500,
						iframeHeight: 300,
						url: "alterDepart.html"
					});
				});
				$(".btnAdd").click(function() {

					$.jq_Panel({
						title: "添加部门",
						iframeWidth: 500,
						iframeHeight: 300,
						url: "addDepart.html"
					});
				});
			});
		</script>
	</body>

</html>