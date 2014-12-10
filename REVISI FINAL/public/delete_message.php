<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php
$msg = find_message_by_id($_GET["id"]);
?>
<?php
	$id = $msg["id"];
	$sql = "DELETE FROM message
					WHERE id = '{$id}'
					LIMIT 1";
	$hasil = mysqli_query($koneksi,$sql);
	
		redirect_to("message.php");
?>