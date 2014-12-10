<?php require_once("../include/koneksi.php");?>
<?php require_once("../include/function.php");?>
<?php
									if(isset($_POST["send"])){
										$email = mysql_prep($_POST["email"]);
										$subject = mysql_prep($_POST["subject"]);
										$msg = mysql_prep($_POST["message"]);
										
										$sql = "INSERT INTO message 
														(email, subject, message)
														VALUES ('{$email}','{$subject}','{$msg}')";
															
											$hasil = mysqli_query($koneksi,$sql);
											
											redirect_to("index.php");
											}
?>
<?php	include("../include/layout/public_header.php");?>	
		</div><!--header-->
		<div id="main">
			<div id="about">
				<div class="container">
				<div class="isi">
					<img src="gambar/banner-about.jpg"/ style="display:block;margin-right:auto;margin-left:auto;">
					<div class="about-p">
						<p>
							BOLT! Super 4G LTE (Long Term Evolution) adalah cara baru internetan dengan koneksi broadband  berkecepatan 10x dibanding provider  biasa.
						</p>
						<p>
							Dengan BOLT! Super 4G LTE waktu loading  super cepat, koneksi super ngebut ditambah dengan kuota yang harganya super dahsyat. Dunia internetan kamu akan berubah total.
						</p>
						<h4>Begini cara berinternetan baru yang ditawarkan oleh BOLT! :</h4>
						<h5>Kecepatan 10x provider  biasa</h5>
						<p>
							Kecepatan download  yang tinggi BOLT! Super 4G LTE memanjakanmu dengan video High Definition  yang jernih dan kerja aplikasi yang optimal. Browsing, main games, dan video chat  dengan teman atau keluarga melalui tablet atau smartphone  terasa lebih menyenangkan. Rasakan kehebatannya sekarang!
						</p>
						<h5>Harga Super Dahsyat</h5>
						<p>
							Kemudahan akses internet lebih seru karena harganya yang super dahsyat. Mulai dari IDR 6000/GB, kamu bisa menikmati serunya internetan dengan kecepatan tinggi.
						</p>
						<h5>Share ke 8 perangkat</h5>
						<p>
							Share  koneksi 4G LTE-mu melalui BOLT! Mobile Wi-Fi. Smartphone, tablet, laptop, game console, apapun yang bisa terhubung melalui Wi-Fi dapat ikut berpesta kuota.
						</p>
					</div>
				</div>
				</div>
			</div><!--about-->
			<div id="shop">
				<div class="container">
					<div class="isi">
					<h1>Bolt! Shop</h1>
						<div class="shop-paket">
							<h3 id="pra" class="inactive">PRABAYAR</h3>
							<h3 id="pasca" class="inactive">PASCABAYAR</h3>
						</div>
									<div class="paket-pra">								
											<?php $pra_set = find_shop_by_paket('1');?>
											<?php while($pra=mysqli_fetch_assoc($pra_set)){?>
												<table  style="margin:20px auto;border-bottom:1px solid gray;">
													<tr>
															<td rowspan="2"><h4><?php echo htmlentities($pra["name"]);?></h4></td>
															<td><img src="<?php echo htmlentities($pra["gambar_1"])?>"/></td>
															<td><img src="<?php echo htmlentities($pra["gambar_2"])?>"/></td>
															<td style="text-align:center;">
																<ul>
																	<?php for($count=1; $count <= 10; $count++) {?>
																		<li><?php echo htmlentities($pra["catatan_{$count}"])?></li>
																	<?php } ?>
																</ul>
															</td>
													</tr>
													<tr>
														<td colspan="2" style="font-size:14px;text-align:center;"><p ><?php echo htmlentities($pra["isi_paket"]);?></p></td>
														<td style="text-align:center;"><h4><?php echo htmlentities($pra["harga"]);?></h4></td>
													</tr>
												</table>
											<?php } ?>
									</div>
									<?php
										mysqli_free_result($pra_set);
									?>
								<div class="paket-pasca">
										<?php $pasca_set = find_shop_by_paket('2');?>
											<?php while($pasca=mysqli_fetch_assoc($pasca_set)){?>
												<table  style="margin:20px auto;border-bottom:1px solid gray;">
													<tr>
															<td rowspan="2"><h4><?php echo htmlentities($pasca["name"]);?></h4></td>
															<td><img src="<?php echo htmlentities($pasca["gambar_1"])?>"/></td>
															<td><img src="<?php echo htmlentities($pasca["gambar_2"])?>"/></td>
															<td style="text-align:center;">
																<ul>
																	<?php for($count=1; $count <= 10; $count++) {?>
																		<li><?php echo htmlentities($pasca["catatan_{$count}"])?></li>
																	<?php } ?>
																</ul>
															</td>
													</tr>
													<tr>
														<td colspan="2" style="font-size:14px;text-align:center;"><p ><?php echo htmlentities($pasca["isi_paket"]);?></p></td>
														<td style="text-align:center;"><h4><?php echo htmlentities($pasca["harga"]);?></h4></td>
													</tr>
												</table>
											<?php } ?>
									</div>
									<?php
										mysqli_free_result($pasca_set);
									?>
					</div>
				</div>
			</div><!--shop-->
			<div id="store">
				<div class="container">
				<div class="isi">
						<h1>Bolt! Store</h1>
						<div class="store-hide">
								<h3 id="store-zone">Bolt! Zone</h3>
								<div id="isi-store1">
									<ol>
									<?php $store_set = find_store_by_type('1');?>
											<?php while($store=mysqli_fetch_assoc($store_set)){?>
														<li><?php echo htmlentities($store["name"]);?>,
														<?php echo htmlentities($store["alamat"]);?><br>
														( Jam Operasional : <?php echo htmlentities($store["waktu"]);?>) </li>
									<?php } ?>
									</ol>
									<?php
										mysqli_free_result($store_set);
									?>
							</div>
						</div>
						<div class="store-hide">
								<h3 id="store-modern">Modern Channel</h3>
								<div id="isi-store2">
								<ol>
									<?php $store_set = find_store_by_type('2');?>
											<?php while($store=mysqli_fetch_assoc($store_set)){?>
														<li><?php echo htmlentities($store["name"]);?>
														<a href="http://<?php echo htmlentities($store["website"]);?>"><?php echo htmlentities($store["website"]);?></a> </li>
									<?php } ?>
								</ol>
								<?php
										mysqli_free_result($store_set);
									?>
								</div>
						</div>
						<div class="store-hide">
								<h3 id="store-online">Online Store</h3>
								<div id="isi-store3">
								<ol>
									<?php $store_set = find_store_by_type('3');?>
											<?php while($store=mysqli_fetch_assoc($store_set)){?>
														<li><?php echo htmlentities($store["name"]);?>
														<a href="http://<?php echo htmlentities($store["website"]);?>"><?php echo htmlentities($store["website"]);?></a> </li>
									<?php } ?>
								</ol>
									<?php
										mysqli_free_result($store_set);
									?>
								</div>
						</div>
						<div class="store-hide">
								<h3 id="store-store">Bolt! Store</h3>
								<div id="isi-store4">
								<ol>
									<?php $store_set = find_store_by_type('4');?>
											<?php while($store=mysqli_fetch_assoc($store_set)){?>
														<li><?php echo htmlentities($store["name"]);?>,
														<?php echo htmlentities($store["alamat"]);?></li>
									<?php } ?>
								</ol>
									<?php
										mysqli_free_result($store_set);
									?>
								</div>
						</div>
						</div>
				</div>
			</div><!--store-->
			<div id="contact">
			<div class="container">
				<div class="isi">
					<div id="contact-box">
						<div id="contact-container">
							<h1 style="text-align:center;">Contact Us!</h1>
						
							<form id="contact-form"action="index.php" method="POST">
								<table>
									<tr>
										<td><p>E-mail</p></td>
									</tr>
									<tr>
										<td><input type="text" name="email" placeholder="Enter your e-mail here" /></td>
									</tr>
									<tr>
										<td><p>Subject</p></td>
									</tr>
									<tr>
										<td><input type="text" name="subject" placeholder="Enter subject name"  /></td>
									</tr>
									<tr>
										<td><p>Message</p></td>
									</tr>
									<tr>
										<td><textarea name="message" style="width:250px;height:120px;">
										</textarea></td>
									</tr>
									<tr>
										<td><button type="submit" name="send">Send</button></td>
									</tr>
								</table>
							</form>
						</div><!--contact-container-->
					</div><!--contact-box-->
				</div>
				</div>
			</div><!--contact-->
		</div><!--main-->
<?php	include("../include/layout/footer.php");?>		