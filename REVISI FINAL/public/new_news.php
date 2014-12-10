<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php

	if(isset($_POST["submit"])){
		$name = mysql_prep($_POST["name"]);
		$visible= (int) $_POST["visible"];
		$content = mysql_prep($_POST["content"]);			
		$file = $_FILES["img"];
		
		$file_name = $_FILES["img"]["name"];
		$file_size = $_FILES["img"]["size"];
		$file_tmp = $_FILES["img"]["tmp_name"];
		
		$file_ext= strtolower(end(explode(".", $file_name)));
		$ext_boleh = array("jpg","jpeg","png","gif","bmp");
		
		if(in_array($file_ext, $ext_boleh) ){
				//EXT FILE DIPERBOLEHKAN
				if($file_size <= 2*1024*1024){
					$sumber = $file_tmp;
					$tujuan = "gambar/".$file_name;
					move_uploaded_file($sumber, $tujuan);
					$sql = "INSERT INTO news
									(name, visible, file, content)
									VALUES ('{$name}', '{$visible}', '{$tujuan}', '{$content}')";				
					$hasil = mysqli_query($koneksi,$sql);
			
			redirect_to("manage_news.php");
					}
			}
		}
?>


<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h2>Create News</h2>
					<form action="new_news.php" method= "POST" enctype="multipart/form-data">
						<table>
							<tr>
								<td>Judul :</td>
								<td><input type="text" name="name"></td>
							</tr>											
							<tr>
								<td>Visible :</td>
								<td>
								<input type="radio" name="visible" value="0">No
								<input type="radio" name="visible" value="1">Yes
								</td>
							<tr>
								<td>File :</td>
								<td><input type="file" name="img" ></td>
							</tr>
							<tr>
								<td>Content :</td>
							<tr>
								<td colspan="2">
									<textarea name="content">
									</textarea>
								</td>
							</tr>
							<tr>
									<td colspan="2"><input type="submit" name="submit" value="Create page"></input></td>
							</tr>
						</table>
					</form>
					<hr>
					<a href="manage_news.php">Cancel</a>
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		