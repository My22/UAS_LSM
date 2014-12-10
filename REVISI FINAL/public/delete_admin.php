<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php
$admin = find_admin_by_id($_GET["id"]);
?>
<?php
	$id = $admin["id"];
	$sql = "DELETE FROM account
					WHERE id = '{$id}'
					LIMIT 1";
	$hasil = mysqli_query($koneksi,$sql);
	
		redirect_to("manage_admin.php");
?>