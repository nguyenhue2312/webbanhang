
<title>Product</title>
<?php
	include('../../db/connect.php');
	include('../layout/header.php');
	include('../layout/navbar.php');
	include('../layout/menu.php');

?>	
	<?php 
		$sqlcate = 'select *from category'; 
		$resultcate = $conn->query($sqlcate);	
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];	
		}
		if (isset($_POST['save'])) {
		if (empty($_POST['nameproduct'])) 
			{
				$err = 'Bạn Chưa Nhập Name';
			}
			else  { 
			$sql = "UPDATE  product SET 
									name = '".$_POST['nameproduct']."',
									cate_id = '".$_POST['category']."',
									code = '".$_POST['code']."',
									price = '".$_POST['price']."',
									content = '".$_POST['status']."',
									sale = '".$_POST['sale']."',
									qty = '".$_POST['qty']."',
									status = '".$_POST['status']."'
								WHERE id = '".$id."'" ;
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
		$sql2 = "select * from product where id = '".$id."'";
		// $query2 = mysqli_fetch_assoc($sql2);
		$query2 = mysqli_query($conn, $sql2);
		while ($row = $query2->fetch_array(MYSQLI_ASSOC)) {
        $name       = $row['name'];
        $cate       = $row['cate_id'];
        $code       = $row['code'];
        $price       = $row['price'];
        $content       = $row['content'];
        $sale       = $row['sale'];
        $qty       = $row['qty'];
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
			<li><a href="#">Product</a></li>
		</ul>
		<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Edit Product</h2>
					</div>
					<div class="box-content">					
							<p><?php echo @$tb; ?></p>
							<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Name Product</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="nameproduct" value="<?php echo $name;?>">
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>
							
					  		
							<div class="control-group">
								<label class="control-label" for="typeahead">Category</label>
								<div class="controls">
									  <select id="selectError3" name="category">
									  	<?php
									  		if ($resultcate->num_rows > 0) {
									  			while($row = $resultcate->fetch_assoc()) {
					  					?>
											<option value="<?php  echo $row["id"]  ?>"><?php echo $row["name"] ?></option>
										<?php 
										} }
										?>
									  </select>
								</div>
							</div>			

							<div class="control-group">
							  <label class="control-label" for="typeahead">Code</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="code"  value="<?php echo $code;?>">
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>
								
							<div class="control-group">
							  <label class="control-label" for="typeahead">Price</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="price"  value="<?php echo    $price;?>" >
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>

							<!-- <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Textarea WYSIWYG</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" rows="3"></textarea>
							  </div>
							</div> -->

							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Content</label>
							  <div class="controls">
								<textarea class="" id="textarea2" rows="3"><?php echo  $content; ?></textarea>
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Sale</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="sale"  value="<?php echo      $sale ;?>"   >
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Qty</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" name="qty" value="<?php echo  $qty;?>" >
								<p style="color: red"><?php echo @$err; ?></p>
							  </div>
							</div>

							<div>
								<label class="control-label" for="typeahead">Status</label>
								<div class="controls">
									  <select id="selectError3" name="status">
										<option value="1">Enable</option>
										<option value="0"> Disable</option>
									  </select>
									</div>
							</div>						
							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary" name="save">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   
					  
<?php 
	}
 ?>
					</div>
				</div><!--/span-->

			</div><!--/row-->
	
<?php
	include('../layout/footer.php');
?>