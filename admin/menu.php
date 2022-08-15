<?php 
   
   include "db.php";
   session_start();
   
   
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Menu</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css//style.css" rel="stylesheet">
   
	<style>
	.card-area{
        
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
          <a class="navbar-brand" href="#">Fast food </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          
            <li class="active"><a href="menu.php">Menu</a></li>
            <li ><a href="add_category.html">Add Category</a></li>
            <li><a href="add_Item.html">Add New Item</a></li>
            <li><a href="users.html">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome </a></li>
            <li><a href="logout.php">Logout</a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
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
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.php">Dashboard</a></li>
          <li class="active">Menu</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
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
                <h3 class="panel-title">Food Menu</h3>
              
              </div>
              <div class="panel-body" >
              <?php 
                    $query = "Select * from product_list order by id ASC";
                    $run = mysqli_query($conn,$query);
                    $checkrow = mysqli_num_rows($run)>0;

                    if($checkrow)
                    {
                        while($row= mysqli_fetch_assoc($run))
                        {
                          if($row['status'] == "1"){
                            $avi="Available";
                         }
                         else{
                           $avi="Unavailable";

                         }
                        ?>
                        <form action="manage_order.php?id=<?php echo $row['id'];?>" method="POST">
                    <div class="col-md-4 card-area"  >
                    <div class="card "  style="width: 18rem;">
                    <img class="card-img-top" src="uploadFiles/<?php echo $row['img_path'];?>"width="225px" height="150px"alt="Card image">
                    <div class="card-body" style="width:225px">
                        <h5 class="card-title"><b><?php echo $row['name'];?></b></h5>
                        <p class="card-text" style="width:225px;text-align:justify"><?php echo $row['description'];?>.</p>
                        <label style="color:red" ><b><?php echo "Rs. ".$row['price'];?></b></label>
                         
                        <label style="color:green;margin-left:80px"><b><?php echo $avi ;?></b></label>
                        <input type="number" name="quantity" min="1" max="10" value="1" />
                        <input type="hidden" name="item_name" value="<?php echo $row['name'];?>">
                        <input type="hidden" name="item_price" value="<?php echo $row['price'];?>">
                        <button type="submit" name="add_to_cart" class="btn btn-info" style="margin-top:7px;margin-left:50px">Order Now</button>
                    </div>
                    </div>
                    </div>
                        </form>

                        <?php
                        }

                    }
                    else{

                        echo "No menu items";
                    }
                    ?>
				
              </div> 
              </div>		 
              </div>         
        </div>
      </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  
  </body>
</html>

