<?php 
  include 'inc/header.php';
  include 'lib/User.php';
  Session::checkLogin();

  $user = new User();

  if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['login'])) {

    $userLogin = $user->userLogin($_POST);

  }
?>
  	  <section class="main-body2">
  	  	
  	  <div class="form-inner" style="width: 50%">
  	  		<h2>User Login</h2>
  	  		<hr>
          <?php
            if (isset($userLogin)) {
              echo $userLogin;
            }
           ?>
  	  	<form method="POST" action="">
  	  		<div class="form-group">
  	  			<label>Email:</label>
  	  			<input type="email" class="form-control" placeholder="Enter your username" name="email">
  	  		</div>
  	  		<div class="form-group">
  	  			<label>Password:</label>
  	  			<input type="password" class="form-control" placeholder="Enter your Password" name="password">
  	  		</div>
  	  		<input type="submit" name="login" value="Login" class="btn btn-primary btn-block">
  	  	</form>

  	  </div>
  	  </section>



  	  <footer>
  	  	
  	  	<h2><i class="fab fa-facebook"></i>https://www.acebook.com/hass.asraf</h2>
  	  </footer>
  	</div>






<?php include 'inc/footer.php'; ?>