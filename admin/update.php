<?php

require "db.php";

if(isset($_POST["action"])){
	
	if($_POST["action"] == "PUT"){
		
	if(isset($_GET['id'])) {
		
		$id = $_GET['id'];
       
        $massage = "";
        $category_id = $_GET['category_id'];        
        $name = $_GET['name'];
		$description = $_GET['description'];
        $price = $_GET['price'];
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
   if ($tmpFilePath != "" && $picture_size < (5000000) )
            {
				
                $newFilePath = "uploadFiles/" . $_FILES['img']['name'];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

				
				$sql = "UPDATE product_list SET name='".$name."',category_id='".$category_id."',description='".$description."', price='".$price."',img_path ='".$_FILES['img']['name']."',status='".$status."' WHERE id='$id'";
               
			
			  if ($conn->query($sql) === TRUE) 
                    {
                        header("HTTP/1.1 200 OK");
                         $massage =  "Item updated successfully";
						
                    } 
                    else 
                    {
                        header("HTTP/1.1 403 ERROR");
												
                        $massage = $conn->error;
                    }
                }
				
			}
		else {
			
			$massage =  "Update Faild";
			
			}
            echo json_encode($massage);
			
                }
			}
			
			
  
	 
	
}
?>