<?php 
session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php include("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Welcome Admin!</h1>
						<ul>
							<li><a href="manage_content.php">Manage Content</a></li>
							<li><a href="manage_admin.php">Manage Admin</a></li>
							<li><a href="message.php">Check Message</a></li>
							<li><a href="login.php">Log out</a></li>
						</ul>						
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		