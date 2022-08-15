<?php
if (isset($_GET["register"])) {
	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Account Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	  <script src="js/jquery2.js"></script>
   
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
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

        </div>
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="text-center"> Admin Area <small>Account Login</small></h1>
          </div>
        </div>
      </div>
    </header>
<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3">
        <form id="signup_form" onsubmit="return false" class="login100-form">
									<div >
                                    <div class="section-title">
                                        <h2 class="login100-form-title p-b-49" >Register Here</h2>
                                    </div>
                                    <div class="form-group ">
                                    
                                        <input class="input form-control input-borders" type="text" name="f_name" id="f_name" placeholder="First Name">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="email" name="email"  placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                    
                                        <input class="input form-control input-borders" type="text" name="username" id="username" placeholder="UserName">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="password" id="password" placeholder="password">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="password" name="repassword" id="repassword" placeholder="confirm password">
                                    </div>
                                    <div class="form-group">
                                        <input class="input form-control input-borders" type="text" name="mobile" id="mobile" placeholder="mobile">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">Select user type</label>
                                      <select class="form-control" id="role" name="role">
                                        <option value="admin">admin</option>
                                        <option value="waiter">waiter</option>
                                        
                                      </select>
                                    </div>
                                    
                                    <div style="form-group">
                                       <input class="btn btn-info btn-block"  value="Sign Up" type="submit" name="signup_button">
                                    </div>
                                    
                                    
                                
								</form>
                                <div class="login-marg">
						
                        </div>
          </div>
        </div>
      </div>
    </section>

    
 <script>
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		
		$.ajax({
			url : "http://localhost/foodshop/register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			 success : function(data){
				if (data == "register_success"){$(".overlay").hide();
					window.location.href = "login.php";
				}else{
					$("#signup_msg").html(data);
					
				}
				
			}
		})
	})
	 </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
	<?php
}
?>
