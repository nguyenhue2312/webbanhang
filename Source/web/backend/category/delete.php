<?php 
		include('../../db/connect.php');

				// sql to delete a record
		$sql = "DELETE FROM category WHERE id=?";

		if ($conn->query($sql) === TRUE) {
		    $tb = "Record deleted successfully";
		} else {
		    $tb  "Error deleting record: " . $conn->error;
		}
 ?>
