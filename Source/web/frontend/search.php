<title>Trang chu</title>
<?php 
	include('layout/header.php');
	include('layout/menu.php'); 
	include('layout/left.php'); 
?>			
	<?php 
	if (isset($_POST['sub'])) {
	
			$name = $_POST['name'];
			$result = mysqli_query($conn, 'select count(id) as total from product');
	        $row = mysqli_fetch_assoc($result);
	        $total_records = $row['total'];

			$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
 				$limit = 9;
 				$total_page = ceil($total_records / $limit);
 				 if ($current_page > $total_page){
	            $current_page = $total_page;
	        }
	        else if ($current_page < 1){
	            $current_page = 1;
	        }	
	        $start = ($current_page - 1) * $limit;

	        $results = mysqli_query($conn, "SELECT * FROM product  LIMIT  $start, $limit ");
		}
	?>
	
		<div class="right">			
		<div class="title">
			<p style="text-align: center;color: white;background: green;padding: 10px;font-size: 20px;">Danh Sách Sản Phẩm</p>	
			<hr width="500px" />
		</div>
<div class="list">
	<div class="product">
		<ul>
			<?php 
				if ($result->num_rows > 0) {
				while($row = $results->fetch_assoc()) {
			  ?>
			<li>
				<a href="<?php echo 'detail.php?id=' . $row["id"] . ''?>">
				<img src="../public/backend/image/<?php echo $row['image']?>" width="150px" height="150px"></a><br>
				<p style="color:#F00"><?php echo $row['name']; ?></p>
				<p style="color: #F00;"><?php echo $row['price'];?></p>
				</a>
			</li>
		<?php }} ?>			
		</ul>

	</div>

			<!-- endcontent right-->
			
	</div>

	<div class="clear"></div>
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
	</div>
	<?php 
		include('layout/footer.php');
	 ?>