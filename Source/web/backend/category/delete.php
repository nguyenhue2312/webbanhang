<?php 
		include('../../db/connect.php');

				// sql to delete a record

		if (isset($_GET['id']))
			{
				$id = $_GET['id'];	
			}
		$sql = "DELETE FROM category WHERE id= '".$id."'";

		if ($conn->query($sql) === TRUE) {
		    $tb = "Record deleted successfully";		   
		    header("location:index.php");
		} else {
		    $tb = "Error deleting record: " . $conn->error;
		}
		// $_SESSION['thongbao'] = $tb;
 ?>
