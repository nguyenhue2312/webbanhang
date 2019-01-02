<?php 
		include('../../db/connect.php');

				// sql to delete a record

		if (isset($_GET['id']))
			{
				$id = $_GET['id'];	
			}
		$sql = "DELETE FROM product WHERE id= '".$id."'";

		if ($conn->query($sql) === TRUE) {		   
		    header("location:index.php");
		} else {
		    $tb1 = "Error deleting record: " . $conn->error;
		}
		// $_SESSION['thongbao'] = $tb;
 ?>
