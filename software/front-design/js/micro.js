$( document ).ready(function() {

	$(".menu_icon").click(function(){
    	$(this).toggleClass("menu_trig");
		$(".slide_menu").toggleClass("is-visible");
  	});

  	$(".top_search").click(function(){
    	$(this).toggleClass("menu_trig");
		$(".search_block").toggleClass("is-visible");
		$(".shadow_layer").toggleClass("is-visible");
  	});

  	$(".shadow_layer").click(function(){
    	$(this).removeClass("is-visible");
		$(".search_block").removeClass("is-visible");
		$( "#loc_drop" ).removeClass( "is-visible" );
		$( "#city_drop" ).removeClass( "is-visible" );
  	});

	$('.has-child a').on('click', function(event) {
	    // $('.has-child a').toggleClass("open_it");
	    // $(".has-child a").not(this).removeClass("open_it");
		// event.preventDefault();
		var target = $(this).attr('rel');
	   $("#"+target).toggleClass("slide_drop").siblings(".sub_menu").removeClass("slide_drop");
	});




});