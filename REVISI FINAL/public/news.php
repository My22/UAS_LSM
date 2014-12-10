
<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php include("../include/layout/single_public_header.php")?>
			<div id="main">
				<div id="news">
					<div class="isi">
						<img src="gambar/bolt-news.jpg"/>
							<ul id="news-container">
									<?php $news_set = find_all_news();?>
									<?php while ($news = mysqli_fetch_assoc($news_set)){?>
										<li>
											<div class="rack">
												<div class="rack-image">
													<a href="#">
														<img src="<?php echo htmlentities($news["file"]);?>"/>													
													</a>
												</div>
												<div class="rack-desc">
													<a href=""><h4><?php echo htmlentities($news["name"]);?></h4></a>
													<a class="btn" href="#"><p>Baca Selanjutnya</p></a>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul>
								<?php
									mysqli_free_result($news_set);
								?>
						</div>
					</div>
				</div><!--news-->
			</div><!--main-->
<?php	include("../include/layout/footer.php");?>		