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
	tabbed(".tabs");
	if ($('.gallery').length > 0) {
		$('.gallery').carousel();
	}
});