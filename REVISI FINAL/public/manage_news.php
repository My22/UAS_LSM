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
					<h1>Manage news & promo page</h1>
						<?php if($selected_page_id) { ?>
						<?php $current_page = find_news_by_id($selected_page_id); ?>
							Judul : <?php echo $current_page["name"]; ?><br>						
							Visible : <?php echo $current_page["visible"]; ?><br>
							File : <?php echo $current_page["file"]; ?><br>
							Content :<br><?php echo $current_page["content"]; ?><br><br>
							<a href="edit_news.php?page=<?php echo $selected_page_id?>">
								Edit page
							</a>
							<a style="margin-left:30px;" href="delete_news.php?page=<?php echo $selected_page_id?>" onclick="return confirm('Are you sure?') ">
								Delete page
							</a>
							<hr>
						<?php }  ?>
						<p>News & promo List:</p>
								<ul>
									<?php
									$news_set= find_all_news();
									?>
									<?php 
										while($news=mysqli_fetch_assoc($news_set)){
									?>
										<li>
									<?php	$safe_news_id =  urlencode($news["id"]); ?>
											<a href="manage_news.php?page=<?php echo $safe_news_id; ?>">
									<?php	echo htmlentities($news["name"]); ?>
										</a>
										</li>
									<?php } ?>
									<?php
									mysqli_free_result($news_set);
									?>
								</ul>
							<hr>
							<a href="new_news.php">+ Add new news & promo </a>
												
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		