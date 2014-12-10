<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php selected_page();?>
<?php	if(isset($_POST["submit"])){
		$id = $selected_page_id;
		$name = mysql_prep($_POST["name"]);
		$website = mysql_prep($_POST["website"]);
		$store_type = (int) $_POST["type"];
		$alamat = mysql_prep($_POST["alamat"]);
		$waktu = mysql_prep($_POST["waktu"]);
		
		$sql = "UPDATE store SET 
							name = '{$name}',
							website = '{$website}',
							store_type = {$store_type},
							alamat = '{$alamat}',
							waktu = '{$waktu}'
							WHERE id = {$id}
							LIMIT 1";
							
			$hasil = mysqli_query($koneksi,$sql);
			
			redirect_to("manage_store.php?page={$selected_page_id}");
			}
		?>
		

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Edit BOLT!STORE</h1>
						<form action="edit_store.php?page=<?php echo $selected_page_id; ?>" method="POST">
						<?php if($selected_page_id) { ?>
						<?php $current_page = find_store_by_id($selected_page_id); ?>
						<table>
							<tr>
								<td>Nama store :</td>
								<td><input type="text" name="name" value="<?php echo htmlentities($current_page["name"]); ?>"></td>
							</tr>											
							<tr>
								<td>Website :</td>
								<td> <input type="text" name="website" value="<?php echo htmlentities($current_page["website"]); ?>"></td>
							<tr>
								<td>Store type :</td>
								<td>
									<select name="type">
													<?php 
														for($count = 1; $count <= 4; $count++)
														{
															echo "<option value=\"{$count}\"";
															if($current_page["store_type"] == $count){
																echo " selected";
															}
															if($count == 1) {
																$value = " zone";
															} else if($count == 2) {
																$value = " channel";
															} else if($count == 3) {
																$value = " online";
															} else if($count == 4) {
																$value = " store";
															}
															echo "> {$value}</option>";
														}
													?>
										</select>
								</td>
							</tr>
							<tr>
								<td>Alamat :</td>
								<td colspan="2">
									<textarea name="alamat">
											<?php echo htmlentities($current_page["alamat"]); ?>
									</textarea>
								</td>
							</tr>
							<tr>
								<td>Waktu operasional :</td>
								<td>
									<input type="text" name="waktu" value="<?php echo htmlentities($current_page["waktu"]); ?>">
									
								</td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" value="Update page"></td>
							</tr>
						</table>
					</form>
						<?php } ?>
							<hr>							
						
						<a style="margin-left:30px;" href="manage_store.php">Cancel</a>	
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		