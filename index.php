<?php 

  include 'inc/header.php'; 
  include 'lib/user.php'; 
  Session::checkSession();
?>

  	  <section class="main-body">
        <?php 
          $loginmsg = Session::get('loginmsg');
          if (isset($loginmsg)) {
            echo $loginmsg;
          }

          Session::set('loginmsg', null);

         ?>
  	  	<div class="row">
  	  		<div class="col-md-4">
  	  			<h4 class="display-5">User List</h4>
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
  	  	<div class="table-responsie mt-2">
  	  		<table class="table table-bordered table-striped table-border">
  	  			<thead>
  	  				<tr>
  	  					<th width="20%">Serial</th>
  	  					<th width="20%">Name</th>
  	  					<th width="20%">Username</th>
  	  					<th width="20%">Email</th>
  	  					<th width="20%">Action</th>
  	  				</tr>
  	  			</thead>
  	  			<tbody>
              <?php 
                $user = new User();
                $userData = $user->getUserData();
                if ($userData) {
                  $i = 0;
                  foreach ($userData as $data) { 
                      $i++;
                    ?>
    	  				<tr>
    	  					<td><?= $i; ?></td>
    	  					<td><?= $data['name']; ?></td>
    	  					<td><?= $data['username']; ?></td>
    	  					<td><?= $data['email']; ?></td>
    	  					<td>
    	  						<a href="profile.php?id=<?= $data['id']; ?>" class="btn text-light bg-success"><i class="fa fa-eye"></i></a>
    	  					</td>
    	  				</tr>
              <?php } }else{ ?>
                <div class="alert alert-danger">No data found</div>
              <?php } ?>
  	  			</tbody>
  	  		</table>
  	  	</div>
  	  </section>



  	  <footer>
  	  	
  	  	<h2><i class="fab fa-facebook"></i>https://www.acebook.com/hass.asraf</h2>
  	  </footer>
  	</div>






<?php include 'inc/footer.php'; ?>