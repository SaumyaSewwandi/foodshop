<?php 
   
   include "db.php";
 
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Transactions</title>
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
            <li ><a href="users.html">Users</a></li>
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
          <li class="active">Transactions</li>
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
                <h3 class="panel-title">Today Transactions</h3>
              </div>
              <div class="panel-body">
              <table class="table">
              <thead>
                <tr>
                <th width="20%">Date</th>
                <th width="20%">Item Name</th>
                <th width="20%">Quantity</th>
                <th width="20%">Price</th>
                <th width="30%" style="text-align:center" >Total</th>
                </tr>
            </thead>
                <tbody>

              <?php 
              
                $total=0;
              $query = "SELECT DISTINCT(`id`), `item_name`, `quantity`, `price`,`date` FROM `orders`,`order_list` WHERE date=CURRENT_DATE() and orders.id=order_list.order_id;";
              $run = mysqli_query($conn,$query);
              $rows = mysqli_num_rows($run)>0;

              if($rows)
              {
                  while($row= mysqli_fetch_assoc($run))
                  {
                   
                  ?>
            
                    <tr>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['item_name'];?></td>
                    <td><?php echo $row['quantity'];?></td>
                    <td><?php echo $row['price'];?></td>
                    <td align="right"><?php echo number_format($row['price'] * $row['quantity'],2)?></td>
                    </tr>

					<?php
				        $total = $total + ($row['price'] * $row['quantity']);
              
						}
					?>
					<tr>
            
						<td colspan="4" align="right"><b>Total</b></td>
						<td align="right"><b>Rs. <?php echo number_format($total, 2); ?></b></td>
						
					</tr>
    
                  <?php
                   
                  }

              
              else{

                  echo "<h2>No order items</h2>";
              }
              ?>
				</tr>
  </tbody>
</table>

              </div>
              </div>

          </div>
        </div>
      </div>
    </section>

  </body>
</html>
