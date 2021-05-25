<?php 

/**
 * Session class
 */
class Session{
		
		// Init session ===============
		public static function init(){
			if (version_compare(phpversion(), '5.4.0', '<')) {
				if (session_id() == '') {
					session_start();
				}
			}else{
				if (session_status() == PHP_SESSION_NONE) {
					session_start();
				}
			}
		}

		// Set session ====================
		public static function set($key, $value){
			$_SESSION[$key] = $value;
		}

		// get session =====================
		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}else{
				return false;
			}
		}

		// Check Session ==================
		public static function checkSession(){
			if (self::get('login') == false ) {
				self::Logout();
				header("Location:login.php");
			}
		}

		// Check Login ==================
		public static function checkLogin(){
			if (self::get('login') == true ) {
				header("Location:index.php");
			}
		}

		// Logout functin ==================
		public static function Logout(){
			session_destroy();
			session_unset();
			header('Location:login.php');
		}
	}

