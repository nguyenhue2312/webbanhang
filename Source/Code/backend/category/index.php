
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
						<a href="edit.php" class="btn-minimize"><i> ADD</i></a>
					</div>
				</div>
				<div class="box-content">
					<?php
						$sql = mysqli_query( $conn,'select *from category'); 
						$category = mysqli_fetch_array($sql);
						var_dump($category);
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
					  		foreach ($category as $cate) 
					  			{?>
					  			<tr>
									<td><?php $cate["name"]?></td>
									<td class="center">Member</td>
									<td class="center">
										<span class="label label-success">Active</span>
									</td>
									<td class="center">
										<a class="btn btn-success" href="#">
											<i class="halflings-icon white zoom-in"></i>  
										</a>
										<a class="btn btn-info" href="#">
											<i class="halflings-icon white edit"></i>  
										</a>
										<a class="btn btn-danger" href="#">
											<i class="halflings-icon white trash"></i> 
										</a>
									</td>
								</tr>
					  		<?php					  			
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