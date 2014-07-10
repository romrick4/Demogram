<?php
	session_start();
	
	$title = 'Demogram';
	
	$filename = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME );
	
	$pages = array(
		'trending' => 'Trending Photos',
		'friends' => 'Friends Photos',
		'upload' => 'Upload Photos',
		'categories' => 'Categories'
	);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<?php if (isset($pages[$filename])) : ?>
			<title><?php echo $pages[$filename] . ' | ' . $title; ?></title>
		<?php else : ?>
			<title><?php echo $title; ?></title>
		<?php endif; ?>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Demogram</a>
        </div>
        <div class="navbar-collapse collapse">
		  <ul class="nav navbar-nav">
            <li class="<?php echo ($filename === 'index') ? 'active' : ''; ?>"><a href="index.php">Home</a></li>				
            <li class="<?php echo ($filename === 'trending') ? 'active' : ''; ?>"><a href="trending.php">Trending</a></li>
            <li class="<?php echo ($filename === 'friends') ? 'active' : ''; ?>"><a href="friends.php">Friends</a></li>
			<li class="<?php echo ($filename === 'categories') ? 'active' : ''; ?>"><a href="categories.php">Categories</a></li>
			<!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
			-->
          </ul>
		  <ul class="navbar-form navbar-right">
			<li><a href="signin.php" class="btn btn-success">Sign in</a></li>
		  </ul>
		  <ul class="navbar-form navbar-right">
			<li><a href="upload.php" class="btn btn-warning">Upload</a></li>
		  </ul>
		  <!--
		  <form class="navbar-form navbar-right" role="form">
            <a href="signin.php" class="btn btn-success">Sign in</a>
          </form>
		  -->
          <!--
		  <form class="navbar-form navbar-right" role="form" action="signin.php" method="POST">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
		  -->
        </div><!--/.navbar-collapse -->
      </div>
    </div>
