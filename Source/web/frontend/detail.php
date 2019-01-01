<title>Chi tiết</title>
<?php 
	include('layout/header.php');
	include('layout/menu.php'); 
	include('layout/left.php'); 
	include('layout/content.php'); 
?>			
	<?php 
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];	
		}
		

        $result = mysqli_query($conn, "SELECT * FROM product where id= '".$id."'" );
		
	?>
	
<div class="right">			
	<div class="title">
		<p style="text-align: center;color: white;background: green;padding: 10px;font-size: 20px;">Chi Tiết Sản Phẩm</p>	
		<hr width="500px" />
	</div>	
	<div class="list">
		<div class="detail">
			<?php 
				while($row = $result->fetch_assoc()) {
				
			 ?>
			<table width="100%" align="center">
				<tr align="center">
					<td colspan="2"><h2><?php echo $row['name'] ?></h2></td>
				</tr>
				<tr align="left">
					<td><img src="../public/backend/image/<?php echo $row["image"] ?>" width="300px" height="300px"></td>
					<td>
						<p>Giá : <?php echo number_format($row['price']) ?></p>
						<p><a href="">Thêm Giỏ hàng</a></p>
					</td>

				</tr>
				<tr>
					<td colspan="2">
						<br>
						<hr width="500px">
						<br>
						<?php echo $row['description'] ?>
					</td>
				</tr>
			</table>
			<?php } ?>
		</div>
	</div>	
</div>
	<?php 
		include('layout/footer.php');
	 ?>