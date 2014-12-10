	$(document).ready(function(){

		/*FIXED NAV*/
		var offset = 700; // some offset value for which when the header becomes hidden
		$(window).scroll(function() { //also an option: jQuery .on('scroll') method
						  if($(window).scrollTop() < offset) {
							$('#navigation.f-nav').removeClass('f-nav');
							$('#navigation').fadeOut(fast);
						  } else if( $(window).scrollTop() > offset) {
							$('#navigation').addClass('f-nav');
							$('#navigation').fadeIn(fast);
						  }   
					});

		/*HIGHLIGHT MENU*/
			  $("ul#subject li a").click(function(){
				   $('ul#subject li a.active').removeClass('active');
				   $(this).addClass('active');   
			  });
		  
		  
		/*SHOP TOGGLE*/
				$( "#pra" ).ready(function() {
					$( ".paket-pra" ).hide(  );
				});
											
				$("#pra.inactive").click(function(){	
					if($("#pasca").is(".active")){
							$("#pasca").addClass("inactive");
							$("#pasca").removeClass("active");
							$(".paket-pasca").hide();
					}
					$("#pra").removeClass("inactive");
					$("#pra").addClass("active");
					$(".paket-pra").slideToggle("slow");
					});
											
					$( "#pasca" ).ready(function() {
						$( ".paket-pasca" ).hide(  );
					});
											
					$("#pasca.inactive").click(function(){	
						if($("#pra").is(".active")){
							$("#pra").addClass("inactive");
							$("#pra").removeClass("active");
							$(".paket-pra").hide();
						}
							$("#pasca").removeClass("inactive");
							$("#pasca").addClass("active");
							$(".paket-pasca").slideToggle("slow");	
					});
					
		/*STORE TOGGLE*/
			$( "#store-zone" ).ready(function() {
			$( "#isi-store1" ).hide(  );
			});

			$("#store-modern").ready(function(){
			$("#isi-store2").hide();
			});

			$( "#store-online" ).ready(function() {
			$( "#isi-store3" ).hide();
			});

			$( "#store-store" ).ready(function() {
			$( "#isi-store4" ).hide();
			});

			$( "#store-zone" ).click(function() {
			$( "#isi-store1" ).toggle( "fast" );
			});

			$("#store-modern").click(function(){
			$("#isi-store2").toggle("fast");
			});

			$( "#store-online" ).click(function() {
			$( "#isi-store3" ).toggle( "fast" );
			});

			$( "#store-store" ).click(function() {
			$( "#isi-store4" ).toggle( "fast" );
			});	

				$(".store-hide h3").click(function(){
					   $(".store-hide h3.selected").removeClass('selected');
					   $(this).addClass('selected');   
						 $(".store-hide h3.selected").click(function(){
						$(this).removeClass('selected');
					});
			  });
	
	
});				
				
				
		
				
