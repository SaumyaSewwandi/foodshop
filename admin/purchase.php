<?php 

session_start();

	require 'db.php';

    if(isset($_POST['place_order'])){
    
    $total= $_SESSION['total'];
    $query1 = "INSERT INTO `order_list`(`Total_price`) VALUES ('$total')";
    if(mysqli_query($conn,$query1))
    {

        
    $oredr_status="0";
    $order_id =mysqli_insert_id($conn);
    
    $query = "INSERT INTO `orders`(`id`, `item_name`, `quantity`, `price`, `status`) VALUES (?,?,?,?,?)";
    $result = mysqli_prepare($conn,$query);

    if($result)
    {
        mysqli_stmt_bind_param($result,"isiii",$order_id ,$item_name,$Quantity,$price,$oredr_status);

        foreach($_SESSION["cart"] as $keys => $values)
			{
                $id = $values['item_id'];
                $item_name = $values['item_name'];
                $Quantity = $values['Quantity'];
                $price = $values['item_price'];
                
                mysqli_stmt_execute($result);
             }

             unset($_SESSION['cart']);

             echo "<script>
             alert('order placed,Thank you');
             window.location.href='menu.php';
             </script>";
            }

    }
    else
    {
        echo "<script>
        alert('faild');
        window.location.href='manage_order.php';
        </script>";
    }

    }
    ?>