function menu($) {
	var dropdowns = $(".dropdown"),
		menu = $("#menu-primary-menu"),
		navItems = $(".menu-item", menu),
		dropdownClass,
		parentMenuItem;

	dropdowns.each(function() {
		parentMenuId = '#' + $(this).attr("id").split('dropdown-')[1];
		$(parentMenuId).append($(this));
	});

	navItems.hover(function() {
		dropdownClass = '.dropdown.' + $(this).attr("id");
		$(dropdownClass).addClass('active');
	}, function() {
		$(dropdownClass).removeClass('active');
	});
}

function tabbed($, element) {
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

function navToggle($) {
	$("#nav-tab").click(function() {
		$("#navigation").toggleClass('visible-phone').toggleClass('visible-tablet');
		console.log("tab clicked");
	});
}

jQuery(document).ready(function($) {
	navToggle($);
	menu($);
	tabbed($, ".tabs");
});