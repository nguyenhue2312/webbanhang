<!DOCTYPE html>
<html>
<head>
	<title>Trang chu</title>
	<link rel="stylesheet" type="text/css" href="/../webbanhang/user/interface/css/style.css ">

</head>
<body>
	<div class="container">
	<?php 
		include('header.php');
		include('left.php');
	?>
		<div class="right">			
		<div class="title">
			<p style="text-align: center;color: white;background: green;padding: 10px;font-size: 20px;">Đăng Ký Thành Viên</p>	
		</div>
		<div class="list">
			<div class="product">
			 		<h2 style="margin-left: 250px; padding: 15px">Thông tin Đăng ký</h3>
			 			<hr width="400px" align="center" style="margin-left: 180px">
			 			<br>
				<form action="" method="post">
					<table style="margin-left: 200px" width="400px">						
						<tr style="height: 30px">
							<td>Tên</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Email</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Mật khẩu</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Tên</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Địa Chỉ</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Số Điện Thoại</td>
							<td><input type="text" name="name"></td>
						</tr>
						<tr style="height: 30px">
							<td>Giới Tính</td>
							<td>
								<input type="radio" name="name"> Nam
								<input type="radio" name="name"> Nữ
							</td>
						</tr>
						<tr>							
							<td colspan="2"><input type="submit" name="name" value="Đăng Ký"></td>
						</tr>
						
					</table>
				</form>
				
			</div>
			<!-- endcontent right-->
		</div>
		<div class="clear"></div>		
	</div>
	<?php
		include('footer.php');
	 ?>

	 </div>
</body>
</html>
