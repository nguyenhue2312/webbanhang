
<title>Product</title>
<?php
	include('../../db/connect.php');
	include('../layout/header.php');
	include('../layout/navbar.php');
	include('../layout/menu.php');

?>		

		<noscript>
			<div class="alert alert-block span10">
				<h4 class="alert-heading">Warning!</h4>
				<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
			</div>
		</noscript>			
		<!-- start: Content -->
		<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<i class="icon-home"></i>
				<a href="index.php">Home</a> 
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">Product</a></li>
		</ul>
		<div class="row-fluid">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Product</h2>
					<div class="box-icon">
						<a href="/add.php" class="btn-minimize"><i></i></a>
					</div>
				</div>
				<div class="box-content">
					<?php
						

						$result = mysqli_query($conn, 'select count(id) as total from product');
				        $row = mysqli_fetch_assoc($result);
				        $total_records = $row['total'];

						$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
       	 				$limit = 5;
       	 				$total_page = ceil($total_records / $limit);
       	 				 if ($current_page > $total_page){
				            $current_page = $total_page;
				        }
				        else if ($current_page < 1){
				            $current_page = 1;
				        }	
				        $start = ($current_page - 1) * $limit;

				        $result = mysqli_query($conn, "SELECT * FROM product LIMIT $start, $limit");


					?>
					<table class="table table-striped table-bordered bootstrap-datatable">
					  <thead>
						  <tr>
							  <th>Stt</th>
							  <th>Category</th>
							  <th>Name</th>
							  <th>Code</th>
							  <th>Price</th> 
							  <th>Sale</th>  
							  <th>Image</th> 
							  <th>Qty</th> 
							  <th>Status</th> 
							  <th>Acction</th> 
							  
						  </tr>
					  </thead>   
					  <tbody>
					  	<?php
					  		if ($result->num_rows > 0) {
					  			 while($row = $result->fetch_assoc()) {
					  			?>
					  			<tr>
									<td><?php echo $row["id"]?></td>
									<td class="center">
										<?php 
										$sqlcate = 'select *from category'; 
										$resultcate = $conn->query($sqlcate);
										while($row1 = $resultcate->fetch_array()) {
											if ($row1['id']==$row["cate_id"]) {
												echo $row1['name'];
											}
										}
										 ?>
									</td>
									<td class="center"><?php echo $row["name"] ?></td>
									<td class="center"><?php echo $row["code"] ?></td>
									<td class="center"><?php echo $row["price"] ?></td>
									<td class="center"><?php echo $row["sale"] ?></td>
									<td class="center"><img src="../../public/backend/image/<?php echo $row["image"] ?>" width="100px" height="100px"></td>	
									<td class="center"><?php echo $row["qty"] ?></td>
									<td class="center">
										<?php 
											if ($row["status"] == 1) {
												echo '<span class="label label-success">'.'Ennable'.'</span>';
											}
											else {
												echo '<span class="label label-danger">'.'Disable'.'</span>';
											}
										 ?>
									</td>
									<td class="center">										
										<a class="btn btn-info" href='<?php echo 'edit.php?id=' . $row["id"] . ''?>'>
											<i class="halflings-icon white edit"></i>  
										</a>
										<a class="btn btn-danger" href="<?php echo 'delete.php?id='. $row["id"] . ''?>" onclick="alert('Bạn chắc chắn muốn xóa')">
											<i class="halflings-icon white trash"></i> 
										</a>
									</td>
								</tr>
					  		<?php					  			
					  			}
							} 
					  	?>
										
					  </tbody>
				  </table>  
				  <div class="pagination">
				           <?php 
				            // PHẦN HIỂN THỊ PHÂN TRANG
				            // BƯỚC 7: HIỂN THỊ PHÂN TRANG
				 
				            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
				            if ($current_page > 1 && $total_page > 1){
				                echo '<a href="index.php?page='.($current_page-1).'">Prev</a> | ';
				            }
				 
				            // Lặp khoảng giữa
				            for ($i = 1; $i <= $total_page; $i++){
				                // Nếu là trang hiện tại thì hiển thị thẻ span
				                // ngược lại hiển thị thẻ a
				                if ($i == $current_page){
				                    echo '<span>'.$i.'</span> | ';
				                }
				                else{
				                    echo '<a href="index.php?page='.$i.'">'.$i.'</a> | ';
				                }
				            }
				 
				            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
				            if ($current_page < $total_page && $total_page > 1){
				                echo '<a href="index.php?page='.($current_page+1).'">Next</a> | ';
				            }
				           ?>
				        </div>              
				</div>
			</div><!--/span-->
		
		</div><!--/row-->	
<?php
	include('../layout/footer.php');
?>