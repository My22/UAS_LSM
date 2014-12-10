<?php
	function redirect_to($new_location){
		header("Location: ".$new_location);
		exit;
	}

	function mysql_prep($string){
		global $koneksi;
	
		$escaped_string = mysqli_real_escape_string($koneksi, $string);
		return $escaped_string;
	}
	
	function confirm_query($result_set){
		if(!$result_set){
			die("Database query error");
		}
	}
	
	function selected_page(){
		global $selected_page_id;
	
		if(isset($_GET["page"])){
		$selected_page_id = $_GET["page"];
		} else{
		$selected_page_id = null;
		}
	}
	
	function find_all_message(){
		global $koneksi;
	
		$sql = "SELECT * FROM message";
		$sql .= " ORDER BY id DESC";
		
		$msg_set = mysqli_query($koneksi, $sql);
		confirm_query($msg_set);
		return $msg_set;
	}
	
	
	function find_all_admin(){
		global $koneksi;
	
		$sql = "SELECT * FROM account";
		$sql .= " WHERE account_type=1";
		
		$admin_set = mysqli_query($koneksi, $sql);
		confirm_query($admin_set);
		return $admin_set;
	}
	
	
	function find_all_news(){
		global $koneksi;
	
		$sql = "SELECT * FROM news";
		$sql .= " WHERE visible=1";
		$sql .= " ORDER BY id DESC";
		$news_set = mysqli_query($koneksi, $sql);
		confirm_query($news_set);
		return $news_set;
	}
	
	function find_store_by_type($type){
		global $koneksi;
	
		$sql = "SELECT * FROM store";
		$sql .= " WHERE store_type='{$type}'";
		$sql .= " ORDER BY id";
		$store_set = mysqli_query($koneksi, $sql);
		confirm_query($store_set);
		return $store_set;
	}
	
	function find_shop_by_paket($paket){
		global $koneksi;
	
		$sql = "SELECT * FROM product";
		$sql .= " WHERE paket='{$paket}'";
		$sql .= " ORDER BY id";
		$shop_set = mysqli_query($koneksi, $sql);
		confirm_query($shop_set);
		return $shop_set;
	}
	
	function find_admin_by_username($username){
		global $koneksi;
		
		$safe_username=mysqli_real_escape_string($koneksi, $username);
		
		$sql = "SELECT * FROM account";
		$sql .= " WHERE  username = '{$safe_username}' AND account_type=1";
		$sql .= " LIMIT 1";
		$admin_set = mysqli_query($koneksi, $sql);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else {
			return null;
		}
	}
	
	function find_admin_by_id($admin_id){
		global $koneksi;
		
		$safe_id=mysqli_real_escape_string($koneksi,$admin_id);
		
		$sql = "SELECT * FROM account";
		$sql .= " WHERE id={$safe_id} AND account_type= 1 ";
		$sql .= " LIMIT 1";
		$admin_set = mysqli_query($koneksi, $sql);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)){
			return $admin;
		} else {
			return null;
		}
	}
	
	function find_message_by_id($msg_id){
		global $koneksi;
		
		$safe_id=mysqli_real_escape_string($koneksi,$msg_id);
		
		$sql = "SELECT * FROM message";
		$sql .= " WHERE id={$safe_id}";
		$sql .= " LIMIT 1";
		$msg_set = mysqli_query($koneksi, $sql);
		confirm_query($msg_set);
		if($msg = mysqli_fetch_assoc($msg_set)){
			return $msg;
		} else {
			return null;
		}
	}
	
	function find_news_by_id($page_id){
		global $koneksi;
	
		$safe_id=mysqli_real_escape_string($koneksi,$page_id);
	
		$sql = "SELECT * FROM news";
		$sql .= " WHERE id={$safe_id}";
		$sql .= " LIMIT 1";
		$news_set = mysqli_query($koneksi, $sql);
		confirm_query($news_set);
		if($news = mysqli_fetch_assoc($news_set)){
			return $news;
		} else{
			return null;
		}
	}
	
	function find_store_by_id($page_id){
		global $koneksi;
	
		$safe_id=mysqli_real_escape_string($koneksi,$page_id);
	
		$sql = "SELECT * FROM store";
		$sql .= " WHERE id={$safe_id}";
		$sql .= " LIMIT 1";
		$store_set = mysqli_query($koneksi, $sql);
		confirm_query($store_set);
		if($store = mysqli_fetch_assoc($store_set)){
			return $store;
		} else{
			return null;
		}
	}
	
	function find_shop_by_id($page_id){
		global $koneksi;
	
		$safe_id=mysqli_real_escape_string($koneksi,$page_id);
	
		$sql = "SELECT * FROM product";
		$sql .= " WHERE id={$safe_id}";
		$sql .= " LIMIT 1";
		$shop_set = mysqli_query($koneksi, $sql);
		confirm_query($shop_set);
		if($shop = mysqli_fetch_assoc($shop_set)){
			return $shop;
		} else{
			return null;
		}
	}
	
	function password_encrypt($password){
		$hash_format = "$2y$10$";
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;					
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}
	
	function generate_salt($length){
		$unique_random_string = md5(uniqid(mt_rand(), true));
		$base64_string = base64_encode($unique_random_string);
		$modified_base64_string = str_ireplace('+', '.', $base64_string);
		
		$salt = substr($modified_base64_string, 0, $length);
		
		return $salt;
	}
	
	function password_check($password, $existing_hash){
		$hash = crypt($password, $existing_hash);
		if($hash === $existing_hash){
			return true;
		} else{
			return false;
		}
	}
	
	function attempt_login($username, $password){
		$admin = find_admin_by_username($username);
		if($admin){
			if(password_check($password, $admin["hashed_password"])){
				return $admin;
			} else{
				return false;
			}
		}	else{
			return false;
		}
	}

	function logged_in(){
		return isset($_SESSION["admin_id"]);
	}	
	
	function confirm_logged_in(){
		if(!logged_in()){
			redirect_to("login.php");
		}
	}
?>