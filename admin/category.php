<?php 

	require 'db.php';	
	if($_SERVER['REQUEST_METHOD'] === 'GET') 
	{ 
		
		if(isset($_GET['id'])) 
		{

			$sql = 'SELECT * FROM category where id='.$_GET['id'];

			$result = $conn->query($sql);

			$records = $result->fetch_assoc();

		} 
		else 
		{

			$sql = 'SELECT * FROM category'; 
			
			$result = $conn->query($sql); 
			
			$records = array();
			
			while($row = $result->fetch_assoc()) { 
				$records[] = $row; 
			}
		}
		
		header("HTTP/1.1 200 OK");
		echo json_encode($records); 
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
		$name = $_POST['name']; 

		$sql = "INSERT INTO category (name) VALUES ('$name')"; 

		if($conn->query($sql) === TRUE) { 
			header("HTTP/1.1 200 OK"); 
			echo json_encode(array(
				//'message' => 'Success' 
				'status' => '200' ,
				'message' => 'Category added successfuly'
			));
		} else {
			header("HTTP/1.1 403 ERROR");
			echo json_encode(array(
				'status' => '403','message' => 'Can not added category' 
			));
		}
	}

	if($_SERVER['REQUEST_METHOD'] === 'PUT') 
	{
		if(isset($_GET['id'])) { 

			$name = $_GET['name']; 
			$id = $_GET['id']; 

			$sql = "UPDATE category SET name='$name' WHERE id='$id'"; 

			if($conn->query($sql) === TRUE) {
				header("HTTP/1.1 200 OK"); 
				echo json_encode(array(
					'message' => ' success'
				));
			} else {
				header("HTTP/1.1 303 ERROR"); 
				echo json_encode(array(
				
					'message' => 'Error' 
				));
			}
		}
	}
	if($_SERVER['REQUEST_METHOD'] === 'DELETE') 
	{
		if(isset($_GET['id'])) {

			$id = $_GET['id']; 

			$sql = "DELETE FROM category where id='$id'";	
			if($conn->query($sql) === TRUE) {
				header("HTTP/1.1 200 OK"); 
				echo json_encode(array(
					'status' => '200' ,'message' => 'Category removed'  
				));
			} else {
				header("HTTP/1.1 200 ERROR"); 
				echo json_encode(array(
					'status' => '303' ,'message' => 'Can not Remove' 
				));
			}
		}
	}
?>