<?php 
   include "db.php";
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Waiter</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css//style.css" rel="stylesheet">
    <style>
        .card-area{
        border:1px solid black;
        width:250px;
        padding:10px;
        margin:10px;

    }
        </style>
    
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

    <section id="main">
      <div class="container" >
        <div class="row">
          
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Customer Orders</h3>
              </div>
              <div class="panel-body">
               
              <?php 
              

              $query = "Select * from orders where status='0'";
              $run = mysqli_query($conn,$query);
              $rows = mysqli_num_rows($run)>0;

              if($rows)
              {
                  while($row= mysqli_fetch_assoc($run))
                  {
                   
                  ?>
              <form action="waiter.php?id=<?php echo $row['id'];?>" method="POST">
              <div class="col-md-4 card-area"  style="background-color: #ffff99">
              <div class="card "  style="width: 18rem;">
              
              <div class="card-body" style="width:225px">
              <h4 class="card-title"style="width:225px;text-align:Center">Order Item Details</h4>
              <p class="card-text" style="width:225px;text-align:Center;font-size:20px"><b><?php echo $row['item_name'];?></b></p>
                  
                  <label style="color:red;width:225px;text-align:Center" ><b><?php echo "Quantity: ".$row['quantity'];?></b></label>
                  
                  
              </div>
              </div>
              </div>
              
                  <?php
                  }

              }
              else{

                  echo "<h2>No order items</h2>";
              }
              ?>
					<div ><button type="submit" name="order_complete"class="btn btn-info " style="position:relative;float:right; margin-top:50px; width:150px"name="purchase.php">Order Complete</button>
                    </form>
                </div>	
              </div>
              </div>

          </div>
        </div>
      </div>
    </section>
  </body>
</html>
<?php
 if(isset($_POST['order_complete'])){

    $id=$_GET['id'];

    $query2 = "UPDATE `orders` SET status ='1' WHERE $id";
              $run2 = mysqli_query($conn,$query2);
             
 }
?>
