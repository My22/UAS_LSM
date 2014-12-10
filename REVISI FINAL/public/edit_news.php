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
		$sql = "UPDATE news SET 
							name = '{$name}',
							visible = '{$visible}',
							file = '{$tujuan}',
							content = '{$content}'
							WHERE id = {$id}
							LIMIT 1";
							
			$hasil = mysqli_query($koneksi,$sql);
			
			redirect_to("manage_news.php?page={$selected_page_id}");
			}
		}
	}
?>

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Edit News & promo</h1>
						<form action="edit_news.php?page=<?php echo $selected_page_id; ?>" method="POST"  enctype="multipart/form-data">
						<?php if($selected_page_id) { ?>
						<?php $current_page = find_news_by_id($selected_page_id); ?>
						<table>
							<tr>
								<td>Judul :</td>
								<td><input type="text" name="name" value="<?php echo htmlentities($current_page["name"]); ?>"></input></td>
							</tr>											
							<tr>
								<td>Visible :</td>
								<td><input type="radio" name="visible" value="0"
									<?php 
										if($current_page["visible"] == 0){
											{echo " checked";}
										}
									?>/>No
									<input type="radio" name="visible" value="1"
									<?php 
										if($current_page["visible"] == 1){
											{echo " checked";}
										}
									?>/>Yes
								</td>
							<tr>
								<td>File :</td>
								<td><?php echo htmlentities ($current_page["file"]); ?></td>
							</tr>
							<tr>
								<td colspan="2"><img src="<?php echo htmlentities($current_page["file"]); ?>"/></td>
							</tr>
							<tr>
								<td colspan="2"><input type="file" name="img" ></td>
							</tr>
							<tr>
							<!--masih error-->
								<td>Content :</td>
							</td>
							<tr>
								<td colspan="2">
									<textarea name="content">
										<?php echo htmlentities($current_page["content"] );?>
									</textarea>
								</td>
							</tr>
							<tr>
									<td colspan="2"><input type="submit" name="submit" value="Update page"></input></td>
								</tr>
							</table>
						</form>
						<?php } ?>
							<hr>								
						<a style="margin-left:30px;" href="manage_news.php">Cancel</a>	
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		