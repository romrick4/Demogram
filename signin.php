<?php
	session_start();
	require "code/vendor/autoload.php";
	$post = $_POST;
	
	$options = array('driver' => 'mysqli',
					'host' => 'localhost',
					'user' => 'root',
					'password' => '',
					'database' => 'demogram',
					'prefix' => ''
					);
				
			if(isset($_POST['email'], $_POST['password'])){
				$db = \Joomla\Database\DatabaseDriver::getInstance($options);
				
				
				
				 $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
				
				$query = $db->getQuery(true);
				$query->select('*');
				$query->from('#__users');
				$query->where('user_email = ' . $db->quote($_POST['email']));
				
				
				$db->setQuery($query);
				
				try{
					$user = $db->loadObject();
					
					if($user){						
						if(password_verify($_POST['password'], $user->user_password)){
							$_SESSION['logged_in_status'] = 1;
							$_SESSION['user'] = $user;
						}else{
							$_SESSION['logged_in_status'] = 0;
						}
					}
				} catch(RuntimeException $e){
					$e->getCode() . ' ' . $e->getMessage();
				}
				//echo print_r($db);
				
			}	
				
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin to Demogram</title>

    <link rel="stylesheet" href="css/bootstrap.css">
	<style>
		body {
			padding-top: 50px;
			padding-bottom: 20px;
		}
	</style>
	
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	
	<!-- Custom styles for this template -->		
	<link rel="stylesheet" href="css/signin.css">
	
	<link rel="stylesheet" href="css/main.css">

	<script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

  </head>

  <body>

    <div class="container">
	<pre><?php
			if(isset($_SESSION['user'])){
		echo print_r($_SESSION['user'], true);
		}
		/*if(function_exists("password_verify")){
			echo "function exists";
		}else{
			echo "Function does not exist";
		}*/
			?>
		</pre>
      <form method="post" class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
        <input name="password" type="password" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input name="rememberme" type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<h3><strong>Don't have an account? <a href="signup.php">Sign up!</a></strong></h3>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
