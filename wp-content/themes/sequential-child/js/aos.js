(function($) {
	$(document).ready(function(){
		AOS.init({
            duration: 1200,
        })
    });
    $(window).on('load', function () {
        AOS.refresh();
    });
})(jQuery);
