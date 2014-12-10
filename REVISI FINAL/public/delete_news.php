<?php
	session_start();
?>
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php confirm_logged_in(); ?>
<?php selected_page();?>
<?php
	if($selected_page_id) {
		$current_page = find_news_by_id($selected_page_id); 
	
	$id = $current_page["id"];
	$sql = "DELETE FROM news
				WHERE id = '{$id}'
				LIMIT 1";
				
	$hasil = mysqli_query($koneksi,$sql);
		redirect_to("manage_news.php");
	}
?>