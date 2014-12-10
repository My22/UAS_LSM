<?php session_start();?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php
	$username = "";
	if(isset($_POST["submit"])){
		
		
		$username = $_POST["username"];
		$password = $_POST["password"];
		$found_admin = attempt_login($username, $password);
		
		
		if($found_admin){
		//SUCCESS
			$_SESSION["admin_id"] = $found_admin["id"]; 
			$_SESSION["username"] = $found_admin["username"]; 
			redirect_to("admin.php");
		} else{
		//FAILURE
			redirect_to("login.php");
		}
	
	} else{
		
	}
?>
<?php include("../include/layout/single_public_header.php")?>
			<div id="main">
		<div id="login">
			<div class="container">
				<div class="isi">
					<div id="login-box">
						<div id="login-container">
							<h1 style="text-align:center;">Your Account</h1>
							<form id="login-form"action="login.php" method="POST">
								<table>
									<tr>
										<td><p>Username</p></td>
									</tr>
									<tr>
										<td><input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="Enter your username here" /></td>
									</tr>
									<tr>
										<td><p>Password</p></td>
									</tr>
									<tr>
										<td><input type="password" name="password" placeholder="Enter your password" ></td>
									</tr>
									<tr>
										<td><input type="submit" name="submit" value="Log in"></td>
									</tr>
								</table>
							</form>
						</div><!--login-container-->
					</div><!--login-box-->
				</div>
				</div>
			</div><!--login-->
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>				