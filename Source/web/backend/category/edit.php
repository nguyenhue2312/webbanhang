
<title>Category</title>
<?php
	include('../../db/connect.php');
	include('../layout/header.php');
	include('../layout/navbar.php');
	include('../layout/menu.php');

?>	
	<?php 

		@$namecate = $_POST['namecate'];
		if (isset($_GET['id']))
			{
				$id = $_GET['id'];	
			}
		if (isset($_POST['save'])) {
		if (empty($namecate)) 
			{
				$err = 'Bạn Chưa Nhập Name';
			}
			else  { 
			$sql = "UPDATE  category SET name = '".$namecate."', status = '".$_POST['status']."' WHERE id = '".$id."'" ;
			// var_dump($sql);die();

			if ($conn->query($sql) === TRUE) 
				{
					@$tb = "update Thành Công";
				} else {
						$tb =  "Error: " . $sql . "<br>" . $conn->error;
						}
					}
				}			
							
	?>	
	<?php 
		$sql2 = "select * from category where id = '".$id."'";
		// $query2 = mysqli_fetch_assoc($sql2);
		$query2 = mysqli_query($conn, $sql2);
		while ($row = $query2->fetch_array(MYSQLI_ASSOC)) {
        $name       = $row['name'];
        $status        = $row['status'];
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
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add Category</h2>
					</div>
					<div class="box-content">					
							<p><?php echo @$tb; ?></p>
						<form class="form-horizontal" action="" method="post">
						
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name Category</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" data-items="4" name="namecate" value="<?php echo $name; ?>" >
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>	
							<div>
								<label class="control-label" for="typeahead">Status</label>
								<div class="controls">
									  <select id="selectError3" name="status">
									  	<?php 
									  		if ($status == 0) {
									  			?>
									  			<option value="1">Enable</option>
												<option value="0" selected=""> Disable</option>
									  		<?php
									  	}
									  		else{
									  			?>
									  			<option value="1" selected="">Enable</option>
												<option value="0"> Disable</option>
									  		<?php
									  		
									  		}
									  	 ?>
										
									  </select>
									</div>
							</div>						
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="save">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						  <?php 
						}
						   ?>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
	
<?php
	include('../layout/footer.php');
?>