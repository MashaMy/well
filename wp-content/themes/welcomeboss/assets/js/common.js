$(document).ready(function(){
	
	$('.youtube-link').click(function(e) {
		var idVideo = $(this).attr('id');
		$(this).addClass('active');
		$(this).html('<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' + idVideo + '?autoplay=1&autohide=1&rel=0&amp;showinfo=0" frameborder="0"></iframe>');
		e.preventDefault();
	});


	jQuery(".faq-answer-text").each(function(){
		
		var faq_full = jQuery(this).html();
		var faq = faq_full;

		if( faq.length > 280 ) {
			faq = faq.substring(0, 280);
			jQuery(this).html( faq + '... <button type="button" class="view-more-btn">Показать полностью</button>' );
		}

		jQuery(this).append('<span class="full_text" style="display: none;">' + faq_full + '</span>');

	});
	jQuery(".view-more-btn").click(function(){
		jQuery(this).parent().html( jQuery(this).parent().find(".full_text").html() );
	});

});




window.addEventListener("DOMContentLoaded", function() {
	function setCursorPosition(pos, elem) {
		elem.focus();
		if (elem.setSelectionRange) elem.setSelectionRange(pos, pos);
		else if (elem.createTextRange) {
			var range = elem.createTextRange();
			range.collapse(true);
			range.moveEnd("character", pos);
			range.moveStart("character", pos);
			range.select()
		}
	}

	function mask(event) {
		var matrix = "+7 (___) ___ ____",
		i = 0,
		def = matrix.replace(/\D/g, ""),
		val = this.value.replace(/\D/g, "");
		if (def.length >= val.length) val = def;
		this.value = matrix.replace(/./g, function(a) {
			return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
		});
		if (event.type == "blur") {
			if (this.value.length == 2) this.value = ""
		} else setCursorPosition(this.value.length, this)
	};

	var input = document.querySelector("#callback-phone");
	input.addEventListener("input", mask, false);
	input.addEventListener("focus", mask, false);
	input.addEventListener("blur", mask, false);
});



/* tabs */
$(document).ready(function(){
	$(".tabs").lightTabs();
});

(function($){				
	jQuery.fn.lightTabs = function(options){

		var createTabs = function(){
			tabs = this;
			i = 0;
			
			showPage = function(i){
				$(tabs).children("div").children("div").hide();
				$(tabs).children("div").children("div").eq(i).show();
				$(tabs).children("ul").children("li").removeClass("active");
				$(tabs).children("ul").children("li").eq(i).addClass("active");
			}
								
			showPage(0);				
			
			$(tabs).children("ul").children("li").each(function(index, element){
				$(element).attr("data-page", i);
				i++;                        
			});
			
			$(tabs).children("ul").children("li").click(function(){
				showPage(parseInt($(this).attr("data-page")));
			});				
		};		
		return this.each(createTabs);
	};	
})(jQuery);



$('.country').slick({
  infinite: false,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 535,
        settings: {
        	arrows: false,
        	dots: true,
        	slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 450,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          arrows: false,
        	dots: true,
        }
      }
    ]
});