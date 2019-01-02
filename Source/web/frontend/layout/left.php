
<?php 
	include('../db/connect.php');
	$sqlcate = 'select *from category'; 
	$resultcate = $conn->query($sqlcate);
	
 ?>
 <?php 
		

		    $sql2 = "SELECT * FROM product ORDER BY id DESC LIMIT 2 ";
		    $result = $conn->query($sql2);
	?>
<div class="content">
		<div class="left">
			 	<p style="text-align: center;color: white;background: green;padding: 10px;font-size: 20px">Danh Mục</p>	
				<div class="menucate">
				    <ul>
				    	<?php 
				    		while($row = $resultcate->fetch_array()) 
				    		{
				    	?>
							<li><a href="../frontend/category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
						<?php
						}
				    	 ?>
				        
				        
				    </ul>
				</div>
				<p style="text-align: center;color: white;background: green;padding: 10px;font-size: 20px;">Sản Phẩm Mới</p>	
				<div class="productnew">					
					<ul>
						<?php 							
							while($row = $result->fetch_array()) {
						  ?>
						<li>
							<a href="sanpham.html">
							<img src="../public/backend/image/<?php echo $row['image']?>" width="150px" height="150px"></a><br>
							<p style="color:#F00"><?php echo $row['name']; ?></p>
							</a>
						</li>
					<?php } ?>			
					</ul>
				</div>
			</div>
					