<?php 


    require "db.php";
	
	
	  if(isset($_POST["pid"]))
	{
		$query = "SELECT * FROM product_list WHERE id = '".$_POST["pid"]."'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);

			echo json_encode($row);
		
	}
	
	if(isset($_POST["cid"]))
	{
		$query1 = "SELECT * FROM category WHERE id = '".$_POST["cid"]."'";
		$result1 = mysqli_query($conn,$query1);
		$row1 = mysqli_fetch_array($result1);
		echo json_encode($row1);
	
	}
	
	
	
?>