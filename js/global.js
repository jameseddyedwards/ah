function menu() {
	var dropdowns = $(".dropdown"),
		menu = $("#menu-primary-menu"),
		navItems = $(".menu-item", menu),
		dropdownClass,
		parentMenuItem;

	dropdowns.each(function() {
		parentMenuId = '#' + $(this).attr("id").split('dropdown-')[1];
		console.log($(parentMenuId));
		$(parentMenuId).append($(this));
	});

	navItems.hover(function() {
		dropdownClass = '.dropdown.' + $(this).attr("id");
		$(dropdownClass).show();
	}, function() {
		$(dropdownClass).hide();
	});
}

function tabbed(element) {
	var tabs = $("li", element);
	tabs.click(function(){
		tabs.removeClass("active");
		that = $(this);
		if (!that.hasClass("active")){
			$(".tab-row").hide();
			$('.' + that.attr("id")).show();
			that.addClass("active");
		}
	});
}

$(document).ready( function() {
	menu();
	tabbed(".tabs");
	if ($('.gallery').length > 0) {
		$('.gallery').carousel();
	}
});