$(function(){
	/* Пример подключения слайдера */
	if($('.banner3').size()){/* Проверка на наличие таакого баннера на странице */
		$('.banner3').bxSlider({/* Вызов слайдера для баннера */
			/* здесь будут описываться параметры слайдера */
			mode: 'vertical',		/* - вид смены слайдера: horizontal - горизонально слева на право, vertical - вертикально сверху вниз, fade - проявление */
			speed: 500,				/* - скорость смены слайда в миллисекундах 1с=1000мс */
			adaptiveHeight: true,	/* - адптация размеров слайдера: true - под текущий слайд, false - выставляет высоту слайдера в соответствии с самым большим */
			pager: true,			/* - "постраничная навигация(точечки под слайдером)": true - есть / false - нет */
			controls: true,			/* - стрелки "следующий/предыдущий": true - есть / false - нет */
			auto: false,			/* - автоматическая смена слайдов: true - вкл / false - выкл */
			pause: 3000,			/* - интервал при автоматической смене слайдов: в миллисекундах */
			autoHover: false		/* - остановка автоматической смены слайдов при наведении мыши: true - вкл / false - выкл */
		});
	}
	/* Ниже можно вставлять скрипты для ваших баннеров */
	
	$('.js-slick_banner').slick({
    autoplay: false,
    infinite: true,
    arrows: false,
    dots: true,
    speed: 500
  });


  /* Слайдер на странице trade-in */
	if($('#js-tn_slider').length) {
		$('#js-tn_slider').slick({
			dots: true,
			arrows: false,
			slidesToShow: 1,
			speed: 300
		});
	}
	/* /Слайдер на странице trade-in */
	
	/* Слайдер фото в товаре */
	if($('#product_slider').length) {
		$('#product_slider').slick({
			dots: true,
			arrows: false,
			slidesToShow: 1,
			lazyLoad: 'ondemand',
			speed: 300
		});
	}
	/* /Слайдер фото в товаре */
	
	/* Карусель товаров */
	if($('.js-carousel').length) {
		var carousel = $('.js-carousel').slick({
			speed: 500,
			slidesToShow: 2,
			slidesToScroll: 2,
			dots: true,
			mobileFirst: true,
			responsive: [{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3
				}
			},{
				breakpoint: 1280,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			}]
		});
	}
	/* /Карусель товаров */

	/* Слайдер отзывов */
	if($('.js-reviews').length) {
		$('.js-reviews').slick({
			dots: true,
			arrows: true,
			slidesToShow: 1,
			lazyLoad: 'ondemand',
			speed: 300
		});
	}
	/* /Слайдер отзывов */

	
 //Cлайдера на странице продукта
  $('.js-slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: true,
    asNavFor: '.js-slider-nav'
  });
  $('.js-slider-nav').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.js-slider-for',
    focusOnSelect: true
  });

  
});