<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php $admin_set=find_all_admin();?>

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Manage Admin</h1>
						<table>
							<tr>
								<th style="text-align:left; width:200px;">Username</th>
								<th colspan="2" style="text-align:left;">Actions</th>
							</tr>
							<?php
								while($admin = mysqli_fetch_assoc($admin_set)){
							?>
								<tr>
									<td><?php echo htmlentities($admin["username"]); ?></br>
									</td>
									<td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
									<td ><a style="margin-left:30px;" href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?')">
											Delete</a></td>
								</tr>
							<?php } ?>
						</table>
						<hr>
						<a href="new_admin.php">+ Add new admin</a>				
				</div>
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		