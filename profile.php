<?php 
  include 'inc/header.php'; 
  include 'lib/User.php'; 
  Session::checkSession();

  $user = new User();

  if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

  if (isset($_SERVER['REQUEST_METHOD']) == "POST" && isset($_POST['update'])) {

    $updateUser = $user->updateUserData($id, $_POST);

  }
?>

  	  <section class="main-body">
  	  <div class="row">
          <div class="col-md-4">
            <h4>My Profile</h4>
          </div>
          <div class="col-md-8 text-right">
            <h2>Welcome :<strong> 
              <?php 
                $loginuser = Session::get('username');
                if (isset($loginuser)) {
                   echo $loginuser;
                }
               ?>
               </strong>
            </h2>
          </div>
        </div>
        <hr>
  	  <div class="form-inner" style="width: 50%;margin: auto;">
        <?php 

          $userData = $user->getUserById($id);
          if (isset($updateUser)) {
            echo  $updateUser;
          }

          if ($userData) { ?>
  	  	<form method="POST">
          <div class="form-group">
            <label>Your Name</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="name" value="<?= $userData->name; ?>">
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Enter your username" name="username" value="<?= $userData->username; ?>">
          </div>
  	  		<div class="form-group">
  	  			<label>Email</label>
  	  			<input type="email" class="form-control" placeholder="Enter your username" name="email" value="<?= $userData->email; ?>">
  	  		</div>
  	  		<div class="form-group">
  	  			<label>Password:</label>
  	  			<input type="password" class="form-control" placeholder="Enter your Password" name="password" value="<?= $userData->password; ?>"> 
  	  		</div>
          <?php 
            $sesId = Session::get('id');
            if ($sesId == $userData->id) { ?>
  	  		    <input type="submit" name="update" value="Update" class="btn btn-success btn-block">
            <?php } ?>
  	  	</form>
      <?php } ?>

  	  </div>
  	  </section>



  	  <footer>
  	  	
  	  	<h2><i class="fab fa-facebook"></i>https://www.acebook.com/hass.asraf</h2>
  	  </footer>
  	</div>






<?php include 'inc/footer.php'; ?>