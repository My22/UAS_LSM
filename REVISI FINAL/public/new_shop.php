<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php	if(isset($_POST["submit"])){
		$name = mysql_prep($_POST["name"]);
		$isi_paket= mysql_prep($_POST["isi_paket"]);
		$paket = (int) $_POST["paket_type"];
		$harga = mysql_prep($_POST["harga"]);
		$catatan_1 = mysql_prep($_POST["catatan_1"]);
		$catatan_2 = mysql_prep($_POST["catatan_2"]);
		$catatan_3 = mysql_prep($_POST["catatan_3"]);
		$catatan_4 = mysql_prep($_POST["catatan_4"]);
		$catatan_5 = mysql_prep($_POST["catatan_5"]);
		$catatan_6 = mysql_prep($_POST["catatan_6"]);
		$catatan_7 = mysql_prep($_POST["catatan_7"]);
		$catatan_8 = mysql_prep($_POST["catatan_8"]);
		$catatan_9 = mysql_prep($_POST["catatan_9"]);
		$catatan_10 = mysql_prep($_POST["catatan_10"]);
		
		$file1 = $_FILES["img1"];
		$file2 = $_FILES["img2"];
		
		$file_name1 = $_FILES["img1"]["name"];
		$file_name2 = $_FILES["img2"]["name"];
		
		$file_size1 = $_FILES["img1"]["size"];
		$file_size2 = $_FILES["img2"]["size"];
		
		$file_tmp1 = $_FILES["img1"]["tmp_name"];
		$file_tmp2 = $_FILES["img2"]["tmp_name"];
		
		$file_ext1= strtolower(end(explode(".", $file_name1)));
		$file_ext2= strtolower(end(explode(".", $file_name2)));
		
		$ext_boleh = array("jpg","jpeg","png","gif","bmp");
		
		if(in_array($file_ext1, $ext_boleh) &&  in_array($file_ext2, $ext_boleh)){
				//EXT FILE DIPERBOLEHKAN
				if($file_size <= 2*1024*1024){
					$sumber1 = $file_tmp1;
					$sumber2 = $file_tmp2;
					
					$tujuan1 = "gambar/".$file_name1;
					$tujuan2 = "gambar/".$file_name2;
					move_uploaded_file($sumber1, $tujuan1);
					move_uploaded_file($sumber2, $tujuan2);
							
		$sql = "INSERT INTO product
					(name, paket, isi_paket, gambar_1, gambar_2, harga, catatan_1, catatan_2, catatan_3, catatan_4, catatan_5, catatan_6, catatan_7, catatan_8, catatan_9, catatan_10)
					VALUES ('{$name}',{$paket},'{$isi_paket}','{$tujuan1}','{$tujuan2}','{$harga}','{$catatan_1}','{$catatan_2}','{$catatan_3}','{$catatan_4}','{$catatan_5}','{$catatan_6}','{$catatan_7}','{$catatan_8}','{$catatan_9}','{$catatan_10}')";
		$hasil = mysqli_query($koneksi, $sql);
		
		redirect_to("manage_shop.php");
		}
	}
}
?>


<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h2>Create Shop</h2>
					<form action="new_shop.php" method= "POST" enctype="multipart/form-data">
						<table>
							<tr>
								<td>Nama paket :</td>
								<td><input type="text" name="name"></td>
							</tr>											
							<tr>
								<td>Paket type :</td>
								<td> <select name="paket_type">
												<?php 
														for($count = 1; $count <= 2; $count++){
															echo "<option value=\"{$count}\"";
															echo ">";
															if($count == 1) {
																$value = " prabayar";
															} else if($count == 2) {
																$value = "pascabayar";
															}
															echo "{$value}</option>";
														}
													?>
											</select>
								</td>
							<tr>
								<td>Isi paket :</td>
									<td> <input type="text" name="isi_paket"></td>
							</tr>
							<tr>
								<td>Harga :</td>
									<td> <input type="text" name="harga"></td>
							</tr>
							<tr>
								<td>Gambar 1:</td>
								<td> <input type="file" name="img1" ></td>
							</tr>
							<tr>
								<td>Gambar 2:</td>
								<td><input type="file" name="img2" ></td>
							</tr>
							<tr>
								<td>Catatan 1:</td>
								<td><input type="text" name="catatan_1"></td>
							</tr>
							<tr>
								<td>Catatan 2:</td>
								<td><input type="text" name="catatan_2"></td>
							</tr>
							<tr>
								<td>Catatan 3:</td>
								<td><input type="text" name="catatan_3"></td>
							</tr>
							<tr>
								<td>Catatan 4:</td>
								<td><input type="text" name="catatan_4"></td>
							</tr>
							<tr>
								<td>Catatan 5:</td>
								<td><input type="text" name="catatan_5"></td>
							</tr>
							<tr>
								<td>Catatan 6:</td>
								<td><input type="text" name="catatan_6"></td>
							</tr>
							<tr>
								<td>Catatan 7:</td>
								<td><input type="text" name="catatan_7"></td>
							</tr>
							<tr>
								<td>Catatan 8:</td>
								<td><input type="text" name="catatan_8"></input></td>
							</tr>
							<tr>
								<td>Catatan 9:</td>
								<td><input type="text" name="catatan_9"></td>
							</tr>
							<tr>
								<td>Catatan 10:</td>
								<td><input type="text" name="catatan_10"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" value="Create page"></input></td>
							</tr>
						</table>
					</form>
					<hr>
					<a href="manage_shop.php">Cancel</a>
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		