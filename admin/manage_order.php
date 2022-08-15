<?php
session_start();


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(isset($_POST['add_to_cart']))
    {
        if(isset($_SESSION['cart']))
	    {
            $item_array_id = array_column($_SESSION["cart"], "item_id");
            if(!in_array($_GET["id"], $item_array_id))
            {
            
			      $count = count($_SESSION["cart"]);
            $_SESSION['cart'][$count]=array('item_id'=>$_GET['id'],'item_name'=>$_POST['item_name'],'item_price'=>$_POST['item_price'],'Quantity'=>$_POST['quantity']);
           
            echo "<script>
                    alert('Item Added');
                    window.location.href='manage_order.php';
                    </script>";
		    }
		    
		    else
		    {
			echo "<script>
                    alert('Item Already Added');
                    window.location.href='manage_order.php';
                    </script>";
		    }
            
        }
            
        else
        
            {
                $_SESSION['cart'][0]=array('item_id'=>$_GET['id'],'item_name'=>$_POST['item_name'],'item_price'=>$_POST['item_price'],'Quantity'=>$_POST['quantity']);
                echo "<script>
                    alert('Item Added');
                    window.location.href='manage_order.php';
                    </script>";
            }

        

}

}
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION['cart'] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION['cart'][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="manage_order.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Manage order</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css//style.css" rel="stylesheet">
    
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Fast Food</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li><a href="menu.php">Menu</a></li>
            <li ><a href="add_category.html">Add Category</a></li>
            <li><a href="add_Item.html">Add New Item</a></li>
            <li class="active" ><a href="users.html">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome </a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> Fast Food<small> Restaurant</small></h1>
          </div>
          <div class="col-md-2">
           
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div  class="container" >
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Manage Order</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container" >
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="menu.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Menu </a>
              <a href="add_category.html" class="list-group-item"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Add Category </a>
              <a href="add_Item.html" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Add New Item</a>
              <a href="today.php" class="list-group-item"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> Today Transactions </a>
              <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users </a>
            </div>

           
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Order Details</h3>
              </div>
              <div class="panel-body">
              
			
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["cart"]))
					{
						$total = 0;
						foreach($_SESSION["cart"] as $keys => $values)
						{
					?>
					<tr>
          <form action="purchase.php" method="POST">
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["Quantity"]; ?></td>
						<td>Rs. <?php echo $values["item_price"]; ?></td>
						<td>Rs. <?php echo number_format($values["Quantity"] * $values["item_price"], 2);?></td>
					
            <td><a href="manage_order.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
            
          </tr>
					<?php
							$total = $total + ($values["Quantity"] * $values["item_price"]);
              $_SESSION['total']=$total;
						}
					?>
					<tr>
            
						<td colspan="3" align="right"><b>Total</b></td>
						<td align="right"><b>Rs. <?php echo number_format($total, 2); ?></b></td>
						<td></td>
					</tr>
          <tr>
            <td colspan="3" ></td>
            <td colspan="2" >
     
            <button type="submit" name="place_order"class="btn btn-primary btn-block" name="purchase.php">Place Order</button></td>
                    </form>
        </tr>
   
					<?php
					}
					?>
          
              </div>
              </div>

          </div>
          
        </div>
      </div>
    </section>
    
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

