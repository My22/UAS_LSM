<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php $msg = find_message_by_id($_GET["id"]);?>

<?php include("../include/layout/admin_header.php");?>
			<div id="main">
				<div class="isi">
					<h1>Read Message</h1>						
								E-mail :
								<?php echo htmlentities($msg["email"]);?><br>
								Subject :
								<?php echo htmlentities($msg["subject"]);?><br>
								Message :
								<br>
								<?php echo htmlentities($msg["message"]);?>
								</table>
						<hr>
					<a href="message.php">Back</a>
				</div>
			</div><!--main-->
			
<?php	include("../include/layout/footer.php");?>		