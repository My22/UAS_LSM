<?php session_start();?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php	if(isset($_POST["submit"])){
		$username = mysql_prep($_POST["username"]);
		$hashed_password =password_encrypt($_POST["password"]);
		$user = "2";
		$sql = "INSERT INTO account
					(account_type, username, hashed_password)
					VALUES ({$user},'{$username}','{$hashed_password}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		redirect_to("index.php");
		}
?>
<?php include("../include/layout/single_public_header.php")?>
			<div id="main">
		<div id="aktv">
			<div class="container">
				<div class="isi">
					<div id="aktv-box">
						<div id="aktv-container">
							<h1 style="text-align:center;">ACTIVATION</h1>
							<form id="aktv-form"action="activation.php" method="POST">
								<table>
									<tr>
										<td><p>Username</p></td>
									</tr>
									<tr>
										<td><input type="text" name="username" placeholder="Enter your username" /></td>
									</tr>
									<tr>
										<td><p>Password</p></td>
									</tr>
									<tr>
										<td><input type="password" name="password" placeholder="Enter your password" ></td>
									</tr>
									<tr>
										<td><input type="submit" name="submit" value="Aktivasi"></td>
									</tr>
								</table>
							</form>
						</div><!--aktv-container-->
					</div><!--aktv-box-->
				</div>
				</div>
			</div><!--aktv-->
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		