<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php $admin = find_admin_by_id($_GET["id"]);?>
<?php	if(isset($_POST["submit"])){
		$id = $admin["id"];
		$username = mysql_prep($_POST["username"]);
		$hashed_password =password_encrypt($_POST["password"]);
		$user = "1";
		$sql = "UPDATE account SET
					    username =  '{$username}',
						hashed_password = '{$hashed_password}'
						WHERE id = {$id}
						LIMIT 1";
		$hasil = mysqli_query($koneksi, $sql);
		
		redirect_to("manage_admin.php");
		}
?>


<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Edit Admin</h1>
						<form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method= "POST">
							<table>
								<tr>
									<td>Username :</td>
									<td><input type="text" name="username" value="<?php echo htmlentities($admin["username"]);?>"></td>
								</tr>
								<tr>
									<td>Password :</td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr>
									<td colspan="2"><input type="submit" name="submit" value="Update Admin"/></td>
								</tr>
								</table>
							</form>	
						<hr>
					<a href="manage_admin.php">Cancel</a>
				</div>
			</div><!--main-->
			
<?php	include("../include/layout/footer.php");?>		