<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php	if(isset($_POST["submit"])){
		$username = mysql_prep($_POST["username"]);
		$hashed_password =password_encrypt($_POST["password"]);
		$user = "1";
		$sql = "INSERT INTO account
					(account_type, username, hashed_password)
					VALUES ({$user},'{$username}','{$hashed_password}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		redirect_to("manage_admin.php");
		}
?>


<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Create Admin</h1>
						<form action="new_admin.php" method= "POST">
							<table>
								<tr>
									<td>Username :</td>
									<td><input type="text" name="username"></td>
								</tr>
								<tr>
									<td>Password :</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="submit" value="Create Admin"/></td>
								</tr>
								</table>
							</form>	
						<hr>
					<a href="manage_admin.php">Cancel</a>
				</div>
			</div><!--main-->
			
<?php	include("../include/layout/footer.php");?>		