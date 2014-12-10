<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php $msg_set=find_all_message();?>

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Check Message</h1>
						<table>
							<tr>
								<th style="text-align:left; width:200px;">Message</th>
								<th colspan="2" style="text-align:left;">Actions</th>
							</tr>
							<?php
								while($msg = mysqli_fetch_assoc($msg_set)){
							?>
								<tr>
									<td><a href="read_message.php?id=<?php echo urlencode($msg["id"]); ?>"><?php echo htmlentities($msg["subject"]); ?>
											</a>
									</td>
									<td ><a href="delete_message.php?id=<?php echo urlencode($msg["id"]); ?>" onclick="return confirm('Are you sure?')">
											Delete</a></td>
								</tr>
							<?php } ?>
						</table>			
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		