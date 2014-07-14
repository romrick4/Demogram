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
				
			if(isset($_POST['firstname'], $_POST['lastname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])){
				$db = \Joomla\Database\DatabaseDriver::getInstance($options);
				
				
				
				 $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
				
				$query = $db->getQuery(true);
					
				$query->insert('#__users');
				$query->set('user_first_name = ' . $db->quote($_POST['firstname']));
				$query->set('user_last_name = ' . $db->quote($_POST['lastname']));
				$query->set('user_username = ' . $db->quote($_POST['username']));
				$query->set('user_email = ' . $db->quote($_POST['email']));
				$query->set('user_password= ' . $db->quote($hash_pass));
				$query->set('user_creation_date = NOW()');
				
				$db->setQuery($query);
				
				try{
					$result = $db->execute();
					
					if($result){
						$user_id = $db->insertid();
						$_SESSION['logged_in_status'] = 1;
					}
				} catch(RuntimeException $e){
					$e->getCode() . ' ' . $e->getMessage();
				}
				echo print_r($db);
				
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

    <title>Create Demogram Account</title>

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
		echo print_r($post, true);
		if(function_exists("password_verify")){
			echo "function exists";
		}else{
			echo "Function does not exist";
		}
			?>
		</pre>
      <form method = "post" class="form-signin" role="form">
        <h2 class="form-signin-heading">Sign up Here</h2>
		<input type="text" name="firstname" class="form-control" placeholder="First Name" required autofocus>
		<input type="text" name="lastname" class="form-control" placeholder="Last Name" required autofocus>
		<input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>
        <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
		<input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
        <div class="checkbox">
          <!--<label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
		  -->
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
