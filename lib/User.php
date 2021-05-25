<?php 

	include_once 'Session.php';
	include 'Database.php';

	class User{

		private $db;

		function __construct(){
			$this->db = new Database();
		}

		public function userRegistration($data){
			$name    = $data['name'];
			$username= $data['username'];
			$email   = $data['email'];
			$chk_email = $this->check_email($email);
			$password = md5($data['password']);

			if ($name == "" || $username == "" || $email == "" || $password == "") {

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Fields must not be empty</div>";
					return $msg;

			}elseif (strlen($username) < 3) {

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Username too short</div>";
					return $msg;

			}elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Username must be Alphanumerical, dashes and underscores!</div>";
					return $msg;

			}elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
				
					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Your email address is not valid</div>";
					return $msg;


			}elseif ($chk_email == true) {

				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Your email address is already exist</div>";
					return $msg;
			}else{

				$sql = "INSERT INTO 
					 tbl_users 
					(name,username,email,password)
					 VALUES
					(:name,:username,:email,:password)";

				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':name', $name);
				$query->bindValue(':username', $username);
				$query->bindValue(':email', $email);
				$query->bindValue(':password', $password);
				$result = $query->execute();

				if ($result) {

					$msg = "<div class='alert alert-success'><strong>Success! </strong>Registration Successfully completed</div>";
					return $msg;
				}else{

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Some error occoured</div>";
					return $msg;
				}
			}
		}

		// Email checking with database

		public function check_email($email){

			$sql = "SELECT email FROM tbl_users WHERE email = :email";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->execute();
			if ($query->rowCount() > 0) {

					return true;
			}else{

				return false;
			}
		}


		// User login methods

		public function getLoginUser($email,$password){

			$sql = "SELECT * FROM tbl_users WHERE email = :email AND password = :password LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email', $email);
			$query->bindValue(':password', $password);
			$query->execute();

			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;

		}

		public function userLogin($data){

			$email   = $data['email'];
			$chk_email = $this->check_email($email);
			$password = md5($data['password']);

			if ($email == "" || $password == "") {
					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Fields must not be empty</div>";
					return $msg;
			}

			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
				
					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Your email address is not valid</div>";
					return $msg;
			}

			if($chk_email == false) {

				$msg = "<div class='alert alert-danger'><strong>Error! </strong>Your email address not exist</div>";
					return $msg;
			}

			$result =  $this->getLoginUser($email,$password);

			if ($result) {

				Session::init();
				Session::set('login', true);
				Session::set('id', $result->id);
				Session::set('email', $result->email);
				Session::set('username', $result->username);
				Session::set('loginmsg', "<div class='alert alert-success'><strong>Success ! </strong>You are looged in!</div>");
				header('location:index.php');

			}else{
				$msg = "<div class='alert alert-danger'><strong>Error! </strong>User data not found</div>";
					return $msg;
			}

		}

		// Getting user data from Database ======
		public function getUserData(){

			$sql = "SELECT * FROM tbl_users ORDER BY id DESC";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchAll();
			 return $result;
		}


		// Getting user data by id ======
		public function getUserById($id){

			$sql = "SELECT * FROM tbl_users WHERE id = :id LIMIT 1";
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id', $id);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}

		public function updateUserData($id, $data){

			$name    = $data['name'];
			$username= $data['username'];
			$email   = $data['email'];
			$chk_email = $this->check_email($email);

			if ($name == "" || $username == "" || $email == "") {

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Fields must not be empty</div>";
					return $msg;

			}else{

				$sql = "UPDATE tbl_users SET
						 name 	  = :name,
						 username = :username,
						 email    = :email
						 WHERE id = :id";

				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':name', $name);
				$query->bindValue(':username', $username);
				$query->bindValue(':email', $email);
				$query->bindValue(':id', $id);
				$result = $query->execute();

				if ($result) {

					$msg = "<div class='alert alert-success'><strong>Success! </strong>Data updated Successfully</div>";
					return $msg;

				}else{

					$msg = "<div class='alert alert-danger'><strong>Error! </strong>Some error occoured</div>";
					return $msg;
				}
			}
		}

	}
