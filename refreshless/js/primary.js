function positionElements(){
	$articleCategoriesContainer = $('.article-categories-container');
	$fanFare = $('.fan-fare');
	$top = ($(window).height() - $('header').outerHeight())/2 + $('header').outerHeight() - $articleCategoriesContainer.outerHeight()/2;
	$articleCategoriesContainer.css('top',$top+'px');

	$handleTop = $articleCategoriesContainer.outerHeight()/2 - $('.handle').height()/2;
	$('.handle').css('top', $handleTop + 'px');

	$toShiftLeftBy = $articleCategoriesContainer.outerWidth() -10;

	$articleCategoriesContainer.css('margin-left', '-' + $toShiftLeftBy + 'px');
	$articleCategoriesContainer.mouseover(function(){
		$(this).css('margin-left', '0px');
	}).mouseout(function(){
		$(this).css('margin-left', '-' + $toShiftLeftBy + 'px');
	});


	$toShiftRightBy = $fanFare.width()+20;
	$fanFare.css('margin-right', '-' + $toShiftRightBy + 'px');
	$fanFare.mouseover(function(){
		$(this).css('margin-right', '0px');
	}).mouseout(function(){
		$(this).css('margin-right', '-' + $toShiftRightBy + 'px');
	});
	$handleRightTop = $fanFare.outerHeight()/2 - $('.handle-right').height()/2;
	$('.handle-right').css('top', $handleRightTop+'px');


};

$(document).ready(function(){
	$('.background-overlay img').css({
		"top": ($(window).height()/2 - 64)+ "px",
		"left": ($(window).width()/2 -64)+ "px"
		});	
	$('.background-overlay').css({
		"height": $(document).height()+'px',
		"width" : $(window).width()+'px'
		});
	$('.background-overlay').fadeIn(500);

	/*since anchor tag has not been hardcoded in the HTML, 
	making the header a link to homepage by getting the URL 
	and splitting to get the base URL*/
	$('.header .name').click(function(){
			window.location.href = "http://www.aakashgoel.com";
	});
});
$(window).load(function(){
	positionElements();
	$('.background-overlay').fadeOut(500);
	var $sticky_anchor = $('.article-list>li');

	$('.go-back').live('click', function(){
		$('.article-overlay').removeClass('animated fadeInDownBig').addClass('animated fadeOutUpBig').hide();
		$('.first-screen').removeClass('animated fadeOutUpBig').addClass('animated fadeInDownBig').show();
		$(".article-categories-container").show();
		$('.go-back').hide();	
	});

	$('.categories>li').click(function(){
		var toShow = Array();
		$(this).find('a').toggleClass('active');
		$('ul.categories li').each(function(){
			if($(this).find('a').hasClass('active')){
				toShow.push($(this).attr('class'));
			}
		});
		$('ul.article-list>li').each(function(){
			if(toShow.length==0){
				$(this).removeClass('hidden').addClass('visible');
			}
			else{
				$(this).removeClass('visible').addClass('hidden');
				var itemsClasses = $(this).attr('class').split(' ');
				var itemsClass = itemsClasses[0];
				$(toShow).each(function(index){
					if(itemsClass == toShow[index]){
						$('ul.article-list>li.'+itemsClass).removeClass('hidden').addClass('visible');
					}
				});							
			}
		});
	});
	//add form validation here
	
	$("form#commentform").submit(function(){
		$name = $('input#author');
		$email = $('input#email');
		$content = $('textarea#comment');

		if($name.val() && $email.val() && $content.val()){
			return true;
		}
		return false;
	});
});