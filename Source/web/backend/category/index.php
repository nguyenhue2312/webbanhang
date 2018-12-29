
<title>Category</title>
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
				<a href="index.html">Home</a> 
				<i class="icon-angle-right"></i>
			</li>
			<li><a href="#">Category</a></li>
		</ul>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header" data-original-title>
					<h2><i class="halflings-icon white user"></i><span class="break"></span>Category</h2>
					<div class="box-icon">
						<a href="/add.php" class="btn-minimize"><i></i></a>
					</div>
				</div>
				<div class="box-content">
					<?php
						$sql = 'select *from category'; 
						$result = $conn->query($sql);	
						// var_dump($category);				
					?>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						  <tr>
							  <th>Stt</th>
							  <th>Name</th>
							  <th>Status</th>
							  <th>Actions</th>
						  </tr>
					  </thead>   
					  <tbody>
					  	<?php
					  		if ($result->num_rows > 0) {
					  			 while($row = $result->fetch_assoc()) {
					  			?>
					  			<tr>
									<td><?php echo $row["id"]?></td>
									<td class="center"><?php echo $row["name"] ?></td>
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
										<a class="btn btn-danger" href="<?php echo 'delete.php?id=' . $row["id"] . ''?>" onclick="alert('Bạn chắc chắn muốn xóa')">
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
				</div>
			</div><!--/span-->
		
		</div><!--/row-->

	
<?php
	include('../layout/footer.php');
?>