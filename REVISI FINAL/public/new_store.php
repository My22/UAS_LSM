<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php	if(isset($_POST["submit"])){
		$name = mysql_prep($_POST["name"]);
		$website = mysql_prep($_POST["website"]);
		$store_type = (int) $_POST["type"];
		$alamat = mysql_prep($_POST["alamat"]);
		$waktu = mysql_prep($_POST["waktu"]);
		
		$sql = "INSERT INTO store 
					(name, website, store_type, alamat, waktu)
					VALUES ('{$name}','{$website}',{$store_type},'{$alamat}','{$waktu}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		redirect_to("manage_store.php");
		}
?>


<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h2>Create Store</h2>
					<form action="new_store.php" method= "POST">
						<table>
							<tr>
								<td>Nama store :</td>
								<td><input type="text" name="name"></td>
							</tr>											
							<tr>
								<td>Website :</td>
								<td> <input type="text" name="website"></td>
							<tr>
								<td>Store type :</td>
								<td>
									<select name="type">
													<?php 
														for($count = 1; $count <= 4; $count++){
															echo "<option value=\"{$count}\"";
															echo ">";
															if($count == 1) {
																$value = " zone";
															} else if($count == 2) {
																$value = " channel";
															} else if($count == 3) {
																$value = " online";
															} else if($count == 4) {
																$value = " store";
															}
															echo "{$value}</option>";
														}
													?>
										</select>
								</td>
							</tr>
							<tr>
								<td>Alamat :</td>
								<td colspan="2">
									<textarea name="alamat"></textarea>
								</td>
							</tr>
							<tr>
								<td>Waktu operasional :</td>
								<td>
									<input type="text" name="waktu">									
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" value="Create page"></td>
							</tr>
						</table>
					</form>
					<hr>
					<a href="manage_store.php">Cancel</a>
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		