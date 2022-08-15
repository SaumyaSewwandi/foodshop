<?php 
    require "db.php";
    if($_SERVER['REQUEST_METHOD'] === "GET") {

        if(isset($_GET['id'])) {

            $sql = "SELECT * FROM user_info WHERE id=".$_GET['id'];

            $result = $conn->query($sql);

            header("HTTP/1.1 200 OK"); 
            echo json_encode($result->fetch_assoc());

        } else {

            $sql = "SELECT * FROM user_info";

            $result = $conn->query($sql);

            $records = [];

            while($i = $result->fetch_assoc()){
                $records[] = $i;
            }

            header("HTTP/1.1 200 OK"); 
            echo json_encode($records);

        }

    }



?>