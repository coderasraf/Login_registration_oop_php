<?php 
	include_once './lib/Session.php';
	Session::init();

	if (isset($_GET['action']) && isset($_GET['action']) == 'logout') {
		Session::Logout();
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/all.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Login & Registration OOP-PDO</title>
</head>
<body>

		<div class="container">
  		<nav class="nav">
  			<div class="nav-header">
  				<a href="index.php" class="navbar-brand">Login & Registration </a>
  			</div>
  			<ul class="">
  				

  				<?php 
  					$login = Session::get('login');
  					$id = Session::get('id');
  					if ($login == true) { ?>
	  					<li>
	  						<a href="profile.php">Profile <i class="fa fa-user ml-2"></i></a>
	  					</li>
	  					<li>
	  						<a href="?action=logout">Logout <i class="fa fa-power-off ml-2"></i></a>
	  					</li>
  				 	<?php }else{ ?>
		  				<li><a href="login.php">Login <i class="fa fa-key ml-2"></i></a></li>
		  				<li><a href="register.php">Register <i class="fa fa-user ml-2"></i></a></li>
		  			<?php } ?>
  			</ul>
  	  </nav>