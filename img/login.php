<?php 
   session_start();
   if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering system</title>
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
      .container{background-image:url("img/img2.jpg");
        background-repeat: no-repeat;
        background-position:center;};
    </style>

  </head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form method="POST" action="check-login.php"class="shadow p-3 rounded" style="width: 450px;">
        <h1 style="text-align:center"> LOGIN</h1>
        <?php if (isset($_GET['error'])) { ?>
      	      <div class="alert alert-danger" role="alert">
				  <?=$_GET['error']?>
			  </div>
			  <?php } ?>
            <div class="form-group">
              <label for="exampleInputname">Username</label>
              <input type="text" class="form-control" id="txtusername" name="username"  placeholder="Enter Username">
              
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="txtpassword" name="password"  placeholder="Enter Password">
            </div>
          <div class="form-group">
          <label for="exampleFormControlSelect1">Select user type</label>
          <select class="form-control" id="role" name="role">
            <option value="admin">admin</option>
            <option value="waiter">waiter</option>
            
          </select>

          
          </div>
       
        <button type="submit" class="btn btn-danger "style="width: 415px;">LOGIN</button>
      
        <p><br/></p>
				  <div class="text-pad">
                 <a href="register_form.php?register=1">Create a new account?</a>
                                       
              </div>
          </form>

         
				
                 
                                       
              

    </div>
</body>
</html>
<?php }else{
	header("Location:admin/menu.php");
} ?>