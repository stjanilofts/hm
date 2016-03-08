$(window).load(function() {
	//alert('window load')
});

$(document).ready(function() {
	//alert('document ready');

	var $toppur = $('.toppur');
	var $btn = $('.menu.btn2');
	var $btnContainer = $('.menu-container');
	var $menu = $('.overlay-menu');

	$('.menu, .overlay-menu-close').click(function() {
		var scrollbarWidth = getScrollbarWidth();

		if($menu.is(':hidden')) {
			$('body').css('overflow-y', 'hidden')
			$btnContainer.css('right', parseInt($btnContainer.css('right'), 10) + scrollbarWidth);
			$('body').css('margin-right', scrollbarWidth + 'px');
			$toppur.css('margin-right', scrollbarWidth + 'px');
			$btn.attr('title', 'Loka valmynd');
			$btn.addClass('open');
			$menu.fadeIn();
		} else {
			$btn.attr('title', 'Opna valmynd');
			$btn.removeClass('open');
			$menu.fadeOut('normal', function() {
				$('body').css('overflow-y', 'scroll');
				$btnContainer.css('right', '1rem');
				$('body').css('margin-right', '0px');
				$toppur.css('margin-right', 0)
			});
		}
	});

	$(window).scroll(function() {
		var top = document.documentElement.scrollTop || document.body.scrollTop;

		if(top >= 300) {
			$btn.addClass('smaller');
		} else {
			$btn.removeClass('smaller');
		}
	})
});


function getScrollbarWidth() {
    var outer = document.createElement("div");
    outer.style.visibility = "hidden";
    outer.style.width = "100px";
    outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

    document.body.appendChild(outer);

    var widthNoScroll = outer.offsetWidth;
    // force scrollbars
    outer.style.overflow = "scroll";

    // add innerdiv
    var inner = document.createElement("div");
    inner.style.width = "100%";
    outer.appendChild(inner);        

    var widthWithScroll = inner.offsetWidth;

    // remove divs
    outer.parentNode.removeChild(outer);

    return widthNoScroll - widthWithScroll;
}