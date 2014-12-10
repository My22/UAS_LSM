<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php selected_page();?>

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Manage BOLT!SHOP page</h1>
						<?php if($selected_page_id) { ?>
						<?php $current_page =find_shop_by_id($selected_page_id); ?>
							Nama : <?php echo $current_page["name"]; ?><br>						
							Paket : <?php echo $current_page["paket"]; ?><br>
							Isi Paket : <?php echo $current_page["isi_paket"]; ?><br>
							Harga : <?php echo $current_page["harga"]; ?><br>
							Gambar 1 :<br><img src="<?php echo $current_page["gambar_1"]; ?>"/><br>
							Gambar 2 : <br><img src="<?php echo $current_page["gambar_2"]; ?>"/><br>
							Catatan_1 : <?php echo $current_page["catatan_1"]; ?><br>
							Catatan_2 : <?php echo $current_page["catatan_2"]; ?><br>
							Catatan_3 : <?php echo $current_page["catatan_3"]; ?><br>
							Catatan_4 : <?php echo $current_page["catatan_4"]; ?><br>
							Catatan_5 : <?php echo $current_page["catatan_5"]; ?><br>
							Catatan_6 : <?php echo $current_page["catatan_6"]; ?><br>
							Catatan_7 : <?php echo $current_page["catatan_7"]; ?><br>
							Catatan_8 : <?php echo $current_page["catatan_8"]; ?><br>
							Catatan_9 : <?php echo $current_page["catatan_9"]; ?><br>
							Catatan_10 : <?php echo $current_page["catatan_10"]; ?><br><br>
							<a href="edit_shop.php?page=<?php echo $selected_page_id?>">
								Edit page
							</a>
							<a style="margin-left:30px;" href="delete_shop.php?page=<?php echo $selected_page_id?>" onclick="return confirm('Are you sure?') ">
								Delete page
							</a>
							<hr>
						<?php }  ?>
						<p>Paket PRABAYAR List:</p>
								<ul>
									<?php
										$shop_set= find_shop_by_paket('1');
									?>
									<?php 
										while($shop=mysqli_fetch_assoc($shop_set)){
									?>
										<li>
									<?php	$safe_shop_id =  urlencode($shop["id"]); ?>
											<a href="manage_shop.php?page=<?php echo $safe_shop_id; ?>">
									<?php	echo htmlentities($shop["name"]); ?>
										</a>
										</li>
									<?php } ?>
									<?php
									mysqli_free_result($shop_set);
								?>
								</ul>
						<p>Paket PASCABAYAR List:</p>
								<ul>
									<?php
										$shop_set= find_shop_by_paket('2');
									?>
									<?php 
										while($shop=mysqli_fetch_assoc($shop_set)){
									?>
										<li>
									<?php	$safe_shop_id =  urlencode($shop["id"]); ?>
											<a href="manage_shop.php?page=<?php echo $safe_shop_id; ?>">
									<?php	echo htmlentities($shop["name"]); ?>
										</a>
										</li>
									<?php } ?>
									<?php
									mysqli_free_result($shop_set);
								?>
								</ul>		
							<hr>
							<a href="new_shop.php">+ Add new product </a>						
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		