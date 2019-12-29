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

	<body>

		<div class="am-cf admin-main">
			<!-- content start -->
			<div class="admin-content">
				<div class="admin-content-body">
					<div class="am-cf am-padding am-padding-bottom-0">
						<div class="am-fl am-cf">
							<strong class="am-text-primary am-text-lg"> </strong><small>
							<i class="icon-home"></i> &gt; 首页 &gt; 用户管理</small>
						</div>
					</div>
					<hr>
					<div class="container" style="padding: 0px 10px 0px 10px">
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
							<div class="am-u-sm-12 am-u-md-3">
								<div class="am-input-group am-input-group-sm">
									<input id="username"  placeholder="请输入用户名称" type="text" name="username">
									<input name="submit" type="submit" value="搜索" style="position: absolute; left:210px; top:2px;" /> 
								</div>
							</div>
						</form>
						<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
							<div class="am-u-sm-12 am-u-md-3">
								<div class="am-input-group am-input-group-sm">
									<input id="username"  type="hidden" name="username">
									<input name="submit" type="submit" value="显示全部" style="position: absolute; left:825px;top:-27px" /> 
								</div>
							</div>
						</form>
						</div>

						<div class="am-g" style="margin-top: 5px;">
							<div class="am-u-sm-12">
								<form class="am-form">
									<table class="am-table am-table-striped am-table-hover table-main">
										<thead>
											<tr>
												<th class="" width="50px;">
													<input id="chkAll" type="checkbox">
												</th>
												<th class="table-id" style="width: 150px;">
													用户名称
												</th>
												<th class="table-id" style="width: 150px;">
													职工编号
												</th>
												<th class="" style="width: 150px">
													职工姓名
												</th>
												<th class="" style="width: 150px">
													用户权限
												</th>												
												<th class="table-set">
													操作
												</th>
												
											</tr>
										</thead>
  <?php 
  if(isset($_POST["submit"]))
   { 
  $sqlstr ="select username,id,姓名,string from user,职工,up where user.id=职工.职工编号 and up.priority =user.priority and username like '%".$_POST['username']."%'";
      $result = mysqli_query($conn,$sqlstr);
		while ($rows = mysqli_fetch_row($result)){
				echo "<tr>";
				echo "<td ><input name='chks' value='27' type='checkbox'></td>";
				for($i = 0; $i < count($rows); $i++){
					echo "<td   height='25' align='left'>".$rows[$i]."</td>";
							}
					echo "<td>
							<div class='am-btn-toolbar'>
						          <div class='am-btn-group am-btn-group-xs'>
									<button type='button' id='role_506' class='am-btn am-btn-default am-btn-xs am-text-secondary btnedit'><span class='am-icon-pencil-square-o'></span> 编辑
									</button>
									<button type='button' class='am-btn am-btn-default am-btn-xs am-text-danger amt-hide-sm-only' onclick='''><span class='am-icon-trash-o'></span> <a href = 'deleteRole.php?id= ".$rows[1]."' >删除</a>
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

		<!--[if (gte IE 9)|!(IE)]><!-->
		<script src="js/jquery-1.11.3.min.js"></script>
		<!--<![endif]-->
		<script type="text/javascript" src="myplugs/js/plugs.js"></script>
		<script>
			$(function() {

						$(".btnedit").click(function() {

							$.jq_Panel({
								title: "修改用户",
								iframeWidth: 500,
								iframeHeight: 300,
								url: "editRole.html"
							});
						});
						
						 $(".btnAdd").click(function(){
						 	
						 	$.jq_Panel({
								title: "添加用户",
								iframeWidth: 600,
								iframeHeight: 400,
								url: "addRole.html"
							});
						 	
						});						
			});
		 function sharesysfun(id){
		 	location.href="shareRole.html";
		 }
		</script>
	</body>

</html>