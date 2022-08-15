<?php 
require "db.php";

    if($_SERVER['REQUEST_METHOD'] === "GET") {

        if(isset($_GET['id'])) {

            $sql = "SELECT * FROM product_list WHERE id=".$_GET['id'];

            $result = $conn->query($sql);

            header("HTTP/1.1 200 OK"); 
            echo json_encode($result->fetch_assoc());

        } else {

            $sql = "SELECT * FROM product_list";

            $result = $conn->query($sql);
 
            $records = [];

            while($i = $result->fetch_assoc()){
                $records[] = $i;
            }

            header("HTTP/1.1 200 OK"); 
            echo json_encode($records); 

        }

    }
	
	if($_SERVER['REQUEST_METHOD'] === "POST") {
       	
        $massage = "";
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
		$image = $_FILES['img'];
   
        $category_id = $_POST['category_id'];
        
        if(isset($_POST['status']))
            {
            $status = "1";
            }
            else
            {
             $status = "0";
            }

		
        //Get the temp file path
        $tmpFilePath = $_FILES['img']['tmp_name'];
		$picture_size =  $_FILES['img']['size'];
		
   //Setup our new file path
   if ($tmpFilePath != "" && $picture_size < (5000000))
            {
				
                $newFilePath = "uploadFiles/" . $_FILES['img']['name'];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

				$sql = "INSERT INTO product_list(category_id,name,description,price, img_path,status) VALUES ('".$category_id."','".$name."','".$description."','".$price."','".$_FILES['img']['name']."','".$status."')";
                    if ($conn->query($sql) === TRUE) 
                    {
                        header("HTTP/1.1 200 OK");
                         $massage =  "New item added successfully";
						
                    } 
                    else 
                    {
                        header("HTTP/1.1 403 ERROR");
												
                        $massage = $conn->error;
                    }
                }
				
			}
		else {
			
			$massage =  "Insert Faild";
		}
            echo json_encode($massage);
			
    } 

    if($_SERVER['REQUEST_METHOD'] === "DELETE") {
        if(isset($_GET['id'])) {

            $id = $_GET['id'];

            $sql = "DELETE FROM product_list WHERE id='$id'";

            if($conn->query($sql)) {
                header("HTTP/1.1 200 OK");
				echo json_encode(
                    array(
                        'status' => '200' ,'message' => 'Item removed successfully'  
                    )
                );
            } else {
                header("HTTP/1.1 403 ERROR");
                echo json_encode(
                    array(
                        'status' => '403' ,'message' => 'can not remove'  
                    )
                );
            }
        }
    }

?>