$(document).ready(function(){

  //  Автозаполнитель поиска
  $(".input_search").autocomplete({
    serviceUrl:'ajax/search_products.php',
    minChars:1,
    noCache: false, 
    onSelect:
    function(suggestion){
     $(".input_search").closest('form').submit();
    },
    formatResult:
    function(suggestion, currentValue){
      var reEscape = new RegExp('(\\' + ['/', '.', '*', '+', '?', '|', '(', ')', '[', ']', '{', '}', '\\'].join('|\\') + ')', 'g');
      var pattern = '(' + currentValue.replace(reEscape, '\\$1') + ')';
      return (suggestion.data.image?"<img align=absmiddle src='"+suggestion.data.image+"'> ":'') + suggestion.value.replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>');
    } 
  });

	// Аяксовая корзина
  $(document).on('submit', '.js-add_cart', function(e) {
  	e.preventDefault();
    var $this = $(this),
        variant = $this.find('input[name=variant]:checked').val() || 
                  $this.find('input[name=variant][type="hidden"]').val(),
        amount = 1;
        if($this.find('input[name=amount]').length) {
          amount = $this.find('input[name=amount]').val();
        }
  	$.ajax({
		  url: "ajax/cart.php",
		  data: {variant: variant, amount: amount},
		  dataType: 'json',
		  success: function(data){
		  	$('#cart_informer').html(data);
        //Показываем информер успешного добавления в корзину
        $('#add-cart-notice').addClass('is-active');
        $('body').addClass('modal-notice-open');
		  }
	  });
	  return false;
  });


  /*Закрываем модальные уведомления*/ 
  $('body').on('click', function(e){
    var modalNotice = $('.js-modal-notice.is-active'),
      modalNoticeContent = modalNotice.find('.js-modal-notice-content'),
      modalNoticeClose = modalNotice.find('.js-modal-notice-close');
    if ( modalNotice.length === 0) {
      return;
    }
    if( $(e.target).closest(modalNoticeClose).length || $(e.target).closest(modalNoticeContent).length === 0 ) {
      modalNotice.removeClass('is-active');
      $('body').removeClass('modal-notice-open');
    }
  });
  /*/Закрываем модальные уведомления*/



  /*Переключатели*/
  $(document).on('click', '.js-switch-link', function(){
    var $this = $(this),
            switchContent;
    //Определяем блок с контентом
    if ( typeof($this.data('target')) !== 'undefined' ) {
      switchContent = $('#' + $this.data('target'));
    } else if( $this.closest('.js-switch-container').length ) {
      switchContent = $this.closest('.js-switch-container').find('.js-switch-content').first();
    } else {
      switchContent = $this.next();
    }
    $this.toggleClass('is-active');
    switchContent.toggleClass('is-active');
    if( switchContent.closest('.js-switch-container').length ) {
      switchContent.closest('.js-switch-container').toggleClass('is-active');
    }
    //Задаем способ отображения если, указан
    if ( typeof($this.data('action')) !== 'undefined' ) {
      if ( $this.data('action') === 'slide' ) {
        switchContent.slideToggle();
      } else {
        switchContent.fadeToggle();
      }
    }
    //Переключаем класс у документа, если указан тип
    if ( typeof($this.data('type')) !== 'undefined') {
      $body.toggleClass($(this).data('type')+'-open');
    }
  });
  //Закрываем переключатель и его контент при клике. Наличие этой кнопки не обязательно
  $(document).on('click', '.js-switch-close', function(){
    var $this = $(this),
            switchContent = $this.closest('.js-switch-content'),
      switchLink;
    //Определяем кнопку вызова
    if ( typeof(switchContent.attr('id')) !== 'undefined' ) {
      switchLink = $('.js-switch-link[data-target="'+switchContent.attr('id')+'"]');
    } else if( switchContent.closest('.js-switch-container').length ) {
      switchLink = $this.closest('.js-switch-container').find('.js-switch-link').first();
    } else {
      switchLink = switchContent.prev();
    }
    switchLink.removeClass('is-active');
    switchContent.removeClass('is-active');
    if( switchContent.closest('.js-switch-container').length ) {
      switchContent.closest('.js-switch-container').removeClass('is-active');
    }
    //Задаем способ скрытия если, указан
    if ( typeof(switchLink.data('action')) !== 'undefined' ) {
      if ( switchContent.data('action') === 'slide' ) {
        switchContent.slideUp();
      } else {
        switchContent.fadeOut();
      }
    }
  });

  //Закрываем триггеры с классом close_outside по клику вне их области
  $('body').on('click', function(e) {
    var switchLink = $('.js-switch-link.is-active[data-close_outside="true"]'),
      switchContent;  
    //Определяем блок с контентом
    if ( typeof(switchLink.data('target')) !== 'undefined' ) {
      switchContent = $('#' + switchLink.data('target'));
    } else if( switchLink.closest('.js-switch-container').length ) {
      switchContent = switchLink.closest('.js-switch-container').find('.js-switch-content').first();
    } else {
      switchContent = switchLink.next();
    }
    //Закрываем контент по клику вне его области и вне области переключателя
    if( switchLink.length && ($(e.target).closest(switchLink).length === 0) && ($(e.target).closest(switchContent).length === 0) ) {
      switchLink.removeClass('is-active');
      switchContent.removeClass('is-active');
      if( switchContent.closest('.js-switch-container').length ) {
        switchContent.closest('.js-switch-container').removeClass('is-active');
      }
      //Задаем способ скрытия если, указан
      if ( typeof(switchLink.data('action')) !== 'undefined' ) {
        if ( switchLink.data('action') === 'slide' ) {
          switchContent.slideUp();
        } else {
          switchContent.fadeOut();
        }
      }
    }
  });
  /*/Переключатели*/

  // Управление каталогом товаров на моб версии
  $(document).on('click', '.js-catalog-trigger', function(e){
    if($(window).width() < 1024) {
      e.preventDefault();
      $(this).toggleClass("is-active");
    }
      var $this = $(this),
      mainCatalog = $this.closest(".js-catalog").find('.js-catalog-content');
      mainCatalog.toggleClass("is-active");
      $this.toggleClass("is-active");
   
  });
  

  //Инциализация SLIDER SLICK 

  $('.js-products-slider').slick({
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    responsive: [
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 1279,
      settings: {
        slidesToShow:  4,
        slidesToScroll: 2.
      }
    }
    ]
  });


  $('.js-brands_slider').slick({
    mobileFirst: true,
    slidesToShow: 2,
    slidesToScroll: 2,
    arrows: false,
    dots: true,
    prevArrow: '<button type="button" class="slick-prev slick-prev--brands">Prev</button>',
    nextArrow: '<button type="button" class="slick-next slick-next--brands">Next</button>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 1024,
        settings: {
          arrows: true,
          slidesToShow: 5
        }
      }
    ]
  });

  //Инциализация SLIDER SLICK для галереи PRODUCT
  $('.gallery_slider-for').slick({
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    fade: true,
    arrows: false,
    dots: true,
    asNavFor: '.gallery_slider-nav',
    responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        autoplaySpeed: 2000
      }
    },
    {
      breakpoint: 1024,
      settings: {
        dots: false
      }
    }  
    ]
  });

  $('.gallery_slider-nav').slick({
    mobileFirst: true,
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.gallery_slider-for',
    focusOnSelect: true,
    adaptiveHeight: true,
    vertical: true,
    verticalSwiping: true,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev_vertical">Prev</button>',
    nextArrow: '<button type="button" class="slick-next_vertical">Next</button>'
  });

  //ИЗМЕНЕНИЕ КОЛИЧЕСТВА ТОВАРА 
  $(document).on('click', '.js-counter ', function() {

    var $this = $(this),
    amountInput = $this.closest('.js-counter_form').find('.js-counter_input'),
    amountMax = parseInt(amountInput.data('max')),
    amountVal = parseInt(amountInput.val());

    if($this.hasClass('js-counter_plus')) {
      amountInput.val(Math.min(amountMax,(amountVal+1))).trigger('change');
    } else if($this.hasClass('js-counter_minus')) {
      amountInput.val(Math.max(1,(amountVal-1))).trigger('change');
    }  
  });

  //ПРИМИНЕНИЕ КУПОНА В КОРЗИНЕ
  $('.js-coupon_trigger').click( function(e) {
    e.preventDefault();
    $('.js-coupon_content').slideToggle();
  });

  $("input[name='coupon_code']").keypress(function(event){
    if(event.keyCode == 13){
      $("input[name='name']").attr('data-format', '');
      $("input[name='email']").attr('data-format', '');
      document.cart.submit();
    }
  });


  // PRODUCT-> РЕАЛИЗАЦИЯ ТАБОВ
    $('.js-tab_item').not(":first").hide();
    $('.js-tab').click(function() {
      $('.js-tab').removeClass('active').eq($(this).index()).addClass('active');
      $('.js-tab_item').hide().eq($(this).index()).fadeIn();
    }).eq(0).addClass('active');


  //ОТКРЫТИЕ ФОРМЫ КОММЕНТАРИЕВ
  $('.comments__form-btn').click( function(e) {
    e.preventDefault();
    $('.comments__form').slideToggle();
  });

  //PRODUCT-> реализация варианта выбора
  $(document).on('change','.js-variant_input', function() {
    var product = $('.js-product-info'),
      containerPrice = product.find('.js-price'),
      containerOldprice = product.find('.js-compare_price'),
      containerSku = product.find('.js-sku'),
      containerSkuParent = product.find('.js-sku-container');

    containerPrice.html($(this).data('price'));

    if($(this).data('old_price')) {
      containerOldprice.removeClass("hidden").html($(this).data('old_price'));
    } else {
      containerOldprice.addClass("hidden");
    }
    if($(this).data('sku')) {
      containerSkuParent.removeClass("hidden");
      containerSku.html($(this).data('sku'));
    } else {
      containerSkuParent.addClass("hidden");
    }
  });



  //ЗАКАЗ НА ОДНОЙ СТРАНИЦЕ
  /*Смена выбора оплаты на странице корзины*/
  function updatePayment (ids) {
    var payment = $('.js-payment'),
      paymentInput = $('.js-payment-input'),
      defaultPayment = $('.js-delivery-input').first().data('payments') || '',
      firstActivePayment;
    
    ids = ids ? ids.split(',') : defaultPayment.split(',');
    if (!ids[0]) {
      return;
    }
    payment.addClass('hidden');
    paymentInput.each(function () {
      if ($.inArray($(this).val(), ids) !== -1) {
        $(this).closest('.js-payment').removeClass('hidden');
      }
    });
    firstActivePayment = payment.filter(':visible').first();
    firstActivePayment.find('input').prop('checked', true);
  }
  updatePayment();
  $('.js-delivery-input').change(function () {
    updatePayment($(this).data('payments'));
  });
  /*/Смена выбора оплаты на странице корзины*/

  //КОРЗИНА 
  
      
  $(".js-cart_list").each(function() {
    var cartContainer = $(this).find('.js-cart_container');
    cartContainer.not('.hidden').first().find('.js-cart_content').addClass('is-active');
  });
      
  $(document).on('click', '.js-cart_trigger',function() {
    var cartTrigger = $(this),
      cartList = cartTrigger.closest('.js-cart_list'),
      cartContainer = cartTrigger.closest('.js-cart_container'),
      cartContent = cartContainer.find('.js-cart_content');

    if(cartContent.hasClass('is-active')) {
      return;
    }
    cartContent.addClass('is-active');
    cartContainer.siblings().find('.js-cart_content').removeClass('is-active');

  });

  //SLIDER диапазона цен для фильтра товаров
  var min = $("#p_min").data('min'),
      max = $("#p_max").data('max'),
      current_min = $("#p_min").val(),
      current_max = $("#p_max").val(),
      currency = '<i class="slider__currency">Р</i>';

  $( "#slider-range" ).slider({
    range: true,
    min: min,
    max: max,
    values: [current_min, current_max],
      slide: function( event, ui ) {
        $( "#amount" ).html( ui.values[ 0 ] + " - " + ui.values[ 1 ] + " " + currency );
        $( "#p_min" ).val( ui.values[ 0 ] );
        $( "#p_max" ).val( ui.values[ 1 ] );
      },
      stop: function(event, ui) {
        $( "input#p_min" ).val( ui.values[ 0 ] ).closest('form').submit();
        $( "input#p_max" ).val( ui.values[ 1 ] ).closest('form').submit();
      }
  });

  $( "#amount" ).html( $( "#slider-range" ).slider( "values", 0) + " - " + $( "#slider-range" ).slider( "values", 1) + " " + currency );
  $( "#p_min" ).val($( "#slider-range" ).slider( "values", 0));
  $( "#p_max" ).val($( "#slider-range" ).slider( "values", 1));

  //Мультифильтр по свойствам, вариантам и цене

  $('#features [type=checkbox]').live('change',function(){
    $(this).closest('form').submit();
  });



});



