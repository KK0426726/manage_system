
var swiper = new Swiper('.swiper-container', {
	slidesPerView: 'auto',
	mousewheel: true,
	autoplay: {
		delay: 5000,
	},
	spaceBetween: 30,
	effect: 'fade',
	pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	on: {
		autoplayStop: function () {
			if (!firstLoad) {
				return;
			}
			$('#swiper').addClass('no-progress');
		},
		autoplayStart: function (swiper) {
			if (firstLoad) {
				$('#swiper').removeClass('no-progress').addClass('first-load-done');
			}
		}
	}
});

var firstLoad = false




