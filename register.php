<?php 
  include 'inc/header.php';
  include 'lib/User.php';
  Session::checkLogin();

  $user = new User();

  if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['register'])) {

    $userRegi = $user->userRegistration($_POST);

  }
?>

  	  <section class="main-body2">
  	  	
  	  <div class="form-inner" style="width: 50%">
  	  		<h2>User Login</h2>
  	  		<hr>
          <?php
            if (isset($userRegi)) {
              echo $userRegi;
            }
           ?>
  	  	<form action="register.php" method="POST">
          <div class="form-group">
            <label>Your fullname :</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="name">
          </div>
          <div class="form-group">
            <label>Username:</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="username">
          </div>
  	  		<div class="form-group">
  	  			<label>Email:</label>
  	  			<input type="email" class="form-control" placeholder="Enter your username" name="email">
  	  		</div>
  	  		<div class="form-group">
  	  			<label>Password:</label>
  	  			<input type="password" class="form-control" placeholder="Enter your Password" name="password">
  	  		</div>
  	  		<input type="submit" name="register" value="Register" class="btn btn-success btn-block">
  	  	</form>

  	  </div>
  	  </section>



  	  <footer>
  	  	
  	  	<h2><i class="fab fa-facebook"></i>https://www.acebook.com/hass.asraf</h2>
  	  </footer>
  	</div>






<?php include 'inc/footer.php'; ?>