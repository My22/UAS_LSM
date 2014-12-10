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
					<h1>Manage BOLT!STORE</h1>
						<?php if($selected_page_id) { ?>
						<?php $current_page = find_store_by_id($selected_page_id); ?>
							Nama store : <?php echo $current_page["name"]; ?><br>						
							Website : <?php echo $current_page["website"]; ?><br>
							Store type : <?php echo $current_page["store_type"]; ?><br>
							Alamat : <?php echo $current_page["alamat"]; ?><br>
							Waktu operasional : <?php echo $current_page["waktu"]; ?><br><br>
							<a href="edit_store.php?page=<?php echo $selected_page_id?>">
								Edit page
							</a>
							<a style="margin-left:30px;" href="delete_store.php?page=<?php echo $selected_page_id?>" onclick="return confirm('Are you sure?') ">
								Delete page
							</a>
							<hr>
						<?php }  ?>
					
						<p>BOLT!ZONE list:</p>
								<ol>
									<?php $store_set = find_store_by_type('1');?>
								<?php
									while($store=mysqli_fetch_assoc($store_set)){
									?>	
									<li>
										<a href="manage_store.php?page=<?php echo urlencode($store["id"]); ?>">
									<?php	
										echo htmlentities($store["name"]);
										?>
										</a>
										</li>
									<?php
									}
								?>
								<?php
									mysqli_free_result($store_set);
								?>
								</ol>
							<p>Moder Channel list:</p>
								<ol>
									<?php $store_set = find_store_by_type('2');?>
								<?php
									while($store=mysqli_fetch_assoc($store_set)){
									?>	
									<li>
										<a href="manage_store.php?page=<?php echo urlencode($store["id"]); ?>">
									<?php	
										echo htmlentities($store["name"]);
										?>
										</a>
										</li>
									<?php
									}
								?>
								<?php
									mysqli_free_result($store_set);
								?>
								</ol>
							<p>Online list:</p>
								<ol>
									<?php $store_set = find_store_by_type('3');?>
								<?php
									while($store=mysqli_fetch_assoc($store_set)){
									?>	
									<li>
										<a href="manage_store.php?page=<?php echo urlencode($store["id"]); ?>">
									<?php	
										echo htmlentities($store["name"]);
										?>
										</a>
										</li>
									<?php
									}
								?>
								<?php
									mysqli_free_result($store_set);
								?>
								</ol>
							<p>BOLT!STORE list:</p>
								<ol>
									<?php $store_set = find_store_by_type('4');?>
								<?php
									while($store=mysqli_fetch_assoc($store_set)){
									?>	
									<li>
										<a href="manage_store.php?page=<?php echo urlencode($store["id"]); ?>">
									<?php	
										echo htmlentities($store["name"]);
										?>
										</a>
										</li>
									<?php
									}
								?>
								<?php
									mysqli_free_result($store_set);
								?>
								</ol>
						<hr>
						<a href="new_store.php">+ Add new BOLT!STORE</a>			
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>					