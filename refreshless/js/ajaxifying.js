var $mainContent     = $(".article-overlay"),
    $ajaxSpinner     = $(".background-overlay"),
    $allLinks        = $("a"),
    $el;

$('a:urlInternal').live('click', function(e) { 

	$el = $(this);

	if ((!$el.hasClass("comment-reply-link")) && ($el.attr("id") != 'cancel-comment-reply-link')) { 		
		var path = $(this).attr('href').replace(base, '');
		$.address.value(path);
		return false;
	}
	// Default action (go to link) prevented for comment-related links (which use onclick attributes)
	e.preventDefault();
});  

$.address.change(function(event) { 
	var current = location.protocol + '//' + location.hostname + location.pathname;
	
	if (event.value) {
		if(event.value.toString()!="/"){
		$ajaxSpinner.fadeIn(500);
		$('.first-screen').removeClass('animated fadeInDownBig').addClass('animated fadeOutUpBig').hide();
		$mainContent
			.empty()
			.load(base + event.value + ' #inside', function() {
				$(".article-categories-container").hide();
				$('.article-overlay').removeClass('animated fadeOutUpBig').addClass('animated fadeInDownBig').show();
				$('.go-back').show();
				$ajaxSpinner.fadeOut(500);
			});  
		}
	} 
	
	if (base + '/' != current) {
		var diff = current.replace(base, '');
		location = base + '/#' + diff;
	}
}); 