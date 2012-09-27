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
	console.log("initiated")
}

$(document).ready( function() {
	tabbed(".tabs");
});