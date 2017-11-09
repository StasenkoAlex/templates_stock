$(document).ready(function(){
	// Аяксовая корзина
  $('form.variants').on('submit', function(e) {
  	e.preventDefault();
  	button = $(this).find('input[type="submit"]');
  	if($(this).find('input[name=variant]:checked').size()>0)
  		variant = $(this).find('input[name=variant]:checked').val();
  	if($(this).find('select[name=variant]').size()>0)
  		variant = $(this).find('select').val();
  	$.ajax({
		  url: "ajax/cart.php",
		  data: {variant: variant},
		  dataType: 'json',
		  success: function(data){
		  	$('#cart_informer').html(data);
		  	if(button.attr('data-result-text'))
		  		button.val(button.attr('data-result-text'));
		  }
	  });
	  return false;
  });

  //Появление сайдбара

  var sideBar =  $('.menu-sidebar');

  $(document).on('click', '.js-btn--open', function(){
   sideBar.css('left', '0');
    $(this).addClass("active");
  }); 

  

  //Закрытие сайдбар

  $(document).on('click', '.js-btn--close', function(){
    sideBar.css('left','-65%');
    $('.js-btn--open').removeClass("active");
  }); 

/* $(document).mouseup(function(e) {
    if(sideBar.has(e.target).length === 0) {
      sideBar.hide();
    }
  });
*/


  // Управленик каталогом товаров на моб версии

  $(document).on('click', '.js-trigger-open', function(){
    var $this = $(this),
    	mainMenu = $this.closest(".js-menu").find('.js-menu__list').first();
      mainMenu.toggleClass("isactive");
      $this.toggleClass("active");
  });
  
  $(document).on('click', '.js-trigger-close', function(){
    var $this = $(this),
    	mainMenu = $this.closest(".js-menu").find('.js-menu__list').first();
      mainMenu.removeClass("isactive");
      $('.js-trigger-open').removeClass("active");
  });
  

//Инциализация SLIDER SLICK

  $('.slick-slider').slick({
    autoplay:true,
    infinite: true,
    speed: 500
  });

});



