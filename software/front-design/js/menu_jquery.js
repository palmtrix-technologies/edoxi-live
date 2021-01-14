$( document ).ready(function() {

var menu = $('#cssmenu');
var menuList = menu.find('ul:first');
var listItems = menu.find('li').not('#responsive-tab');


menuList.prepend('<li id="responsive-tab"><a href="#0">MENU</a></li>');


menu.on('click', '#responsive-tab', function(){
	//event.preventDefault();
	$(".header_block").toggleClass("is-visible");
	$("#cssmenu > ul").toggleClass("is-visible");
	listItems.slideToggle("fast");
	listItems.toggleClass('collapsed');
});
	$(".has-sub > .mob_nav").click(function(){
    	$("#cssmenu > ul > li > ul").slideToggle("fast");
		$("#cssmenu > ul > li.has-sub > .mob_nav").toggleClass("active");
  });
});