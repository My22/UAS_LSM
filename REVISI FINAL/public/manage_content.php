<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Manage content</h1>
						<ul>
							<li><a href="manage_news.php">Manage news & promo page</a></li>							
							<li><a href="manage_shop.php">Manage bolt!shop page</a></li>
							<li><a href="manage_store.php">Manage bolt!store page</a></li>
						</ul>						
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		