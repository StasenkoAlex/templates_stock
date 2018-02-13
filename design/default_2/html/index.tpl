<!DOCTYPE html>
{*
	Общий вид страницы
	Этот шаблон отвечает за общий вид страниц без центрального блока.
*}
<html>
<head>
	<base href="{$config->root_url}/"/>
	<title>{$meta_title|escape}</title>
	
	{* Метатеги *}
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="{$meta_description|escape}" />
	<meta name="keywords"    content="{$meta_keywords|escape}" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	{* Канонический адрес страницы *}
	{if isset($canonical)}<link rel="canonical" href="{$config->root_url}{$canonical}"/>{/if}
	
	{* Стили *}
	<link href="design/{$settings->theme|escape}/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon" type="image/x-icon"/>
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
	
	{* JQuery *}
	<script src="design/{$settings->theme}/js/jquery-3.2.1.min.js"  type="text/javascript"></script>
	<script src="design/{$settings->theme}/js/jquery-migrate-1.4.1.min.js"  type="text/javascript"></script>
	
	{* Всплывающие подсказки для администратора *}
	{if $smarty.session.admin == 'admin'}
	<script src ="js/admintooltip/admintooltip.js" type="text/javascript"></script>
	<link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
	{/if}
	
	{* Ctrl-навигация на соседние товары *}
	<script type="text/javascript" src="js/ctrlnavigate.js"></script>           
	
	{* Общий скрипт *}
	<script src="design/{$settings->theme}/js/script.js"></script>
	<script src="design/{$settings->theme}/js/jquery-ui-slider.min.js"></script>
  <link href="design/{$settings->theme|escape}/css/jquery-ui-slider.min.css" rel="stylesheet" type="text/css" media="screen"/>


	
	{* js-проверка форм *}
	<script src="design/{$settings->theme}/js/jquery.validate.js" type="text/javascript"></script>
	<script src="design/{$settings->theme}/js/jquery.validate.rules.js" type="text/javascript"></script>
	

	{* slider slick*}
	<script src="design/{$settings->theme}/js/slick.js"></script>
	<script src="design/{$settings->theme}/js/banners.js"></script>

	{* Подключение GOOGLE MAP*}
	{if $module == "FeedbackView"}
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5FBDFmR4yO5tuOgFfqpqg-9IvpCTNHYU&callback=initMap">
  </script>
	<script src="design/{$settings->theme}/js/googlemap.js"></script>
	{/if}
	{* Автозаполнитель поиска *}
	<script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
</head>

<body>
	<!-- Шапка -->
	<header class="header">
		<div class="container-fluid container-flex">	
			<div class="header__menu-flex js-switch-container">
				<button class="header__mobi-btn header__mobi-btn--menu js-switch-link" type="button" data-close_outside="true">
					<span class="btn-trigger"></span>
				</button>
				<div class="header__menu clearfix js-switch-content">
					<button class="header__menu-btn-close js-switch-close" type="button" >
						{include file="svg.tpl" svgId="ic_close" fill="#12a4dd" width="12px" height="22px"}
					</button>
					<!-- Вход пользователя -->
					<div class="header__user-info js-menu">
						<div class="header__user-info-list js-menu__list clearfix">
							{if $user}
							<span class="header__user-info-item header__user-info-item--username">
								<a href="user">{include file="svg.tpl" svgId="ic_user"}{$user->name}</a>{if $group->discount>0},
								<span class="header__user-info-diskount">ваша скидка &#45; {$group->discount}%</span>{/if}
							</span>
							<a class="header__user-info-item user-info__item--logout" href="user/logout">выйти</a>
							{else}
							<a class="header__user-info-item user-info__item--login" href="user/login">Вход</a>
							<a class="header__user-info-item user-info__item--register" href="user/register">Регистрация</a>
							{/if}
						</div>
					</div>
					<!-- Вход пользователя (The End)-->	
					
					<!-- Меню каталога -->
					<div class="catalog js-catalog js-switch-container">
						<button class="catalog__btn catalog__btn--mobi" type="button">
						  {include file="svg.tpl" svgId="ic_more" fill="#12a4dd" width="12px" height="22px"} Категории 
						</button>
						<button class="catalog__btn catalog__btn--desktop  js-switch-link" type="button" data-close_outside="true">
						  {include file="svg.tpl" svgId="ic_menu" fill="#12a4dd" width="40px" height="40px"}
						</button>
						{* Рекурсивная функция вывода дерева категорий *}
						{function name=categories_tree}
						{if $categories}
						<ul class="catalog__list catalog__list--lvl{$level} {if $level==1}js-switch-content{/if} {if $level==3}js-catalog-content{/if}">     
							{foreach $categories as $c}
							{* Показываем только видимые категории *}
							{if $c->visible}
							<li class="catalog__item catalog__item--lvl{$level} js-catalog">
								<div class="catalog__item-name catalog__item-name--lvl{$level} {if $category->id == $c->id}selected{/if}">
									<a class="catalog__item-link catalog__item-link--lvl{$level}" href="catalog/{$c->url}" data-category="{$c->id}">
										{$c->name|escape}
									</a>
									{if $c->children|count>1 && $level==1 || $c->children|count>1 && $level==2}
									  <span class="catalog__item-trigger catalog__item-trigger--lvl{$level} js-catalog-trigger">
										  {include file="svg.tpl" svgId="ic_arrow-down" width="10px" height="32px"}
									  </span>
									{/if}
								</div>
								{categories_tree categories=$c->subcategories level=$level+1}
							</li>
							{/if}
							{/foreach}
						</ul>
						{/if}
						{/function}
						{categories_tree categories=$categories level=1}
					</div>
					<!-- Меню каталога (The End)-->
					
					<!-- Меню -->
					<ul class="menu clearfix">
						{foreach $pages as $p}
						{* Выводим только страницы из первого меню *}
						{if $p->menu_id == 1}
						<li class="menu__item {if $page && $page->id == $p->id}menu__item--selected{/if}">
							<a class="menu__item-link" data-page="{$p->id}" href="{$p->url}">{$p->name|escape}</a>
						</li>
						{/if}
						{/foreach}
					</ul>
					<!-- Меню (The End) -->
				</div>

			</div>
			<div class="header__search-flex js-switch-container">
				<button class="header__mobi-btn header__mobi-btn--search js-switch-link" type="button" data-close_outside="true">
					{include file="svg.tpl" svgId="ic_search"}
				</button>
				<!-- Поиск-->
				<div class="header__search js-switch-content">
					<form action="products" class="search__form js-menu__list">
						<input class="input_search" type="text" name="keyword" value="{$keyword|escape}" placeholder="Поиск товара"/>
						<button class="button_search" value="" type="submit">
							{include file="svg.tpl" svgId="ic_search"}
						</button>
					</form>
				</div>
				<!-- Поиск (The End)-->
			</div>
			<div class="header__favorite-flex">
				<button class="header__mobi-btn header__mobi-btn--favorite" type="button">
					{include file="svg.tpl" svgId="ic_favorite"}
				</button>
			</div>
			<div id="cart_informer" class="header__cart-flex">
		    {include file="cart_informer.tpl"}
			</div>
			<div class="header__currencies-flex">
				<!-- Выбор валюты -->
				{* Выбор валюты только если их больше одной *}
				{if $currencies|count>1}
				<div class="currencies">
					<h2>Валюта</h2>
					<select class="currencies__list" onchange="location = $('.currencies__item:selected').data('href');">
						{foreach $currencies as $c}
						{if $c->enabled} 
						<option class="currencies__item" {if $c->id==$currency->id}selected{/if} data-href="{url currency_id=$c->id}">
						  {$c->code|escape}
						</option>
						{/if}
						{/foreach}
					</select>
				</div> 
				{/if}
				<!-- Выбор валюты (The End) -->
			</div>	

			<div class="header__logo header__logo-flex">
				<a href="/" class="logo__link"><img src="design/{$settings->theme|escape}/images/logo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
			</div>
			<div class="header__support header__support-flex">
				{include file="svg.tpl" svgId="ic_phone-full" fill="#12a4dd"}<span class="text"> Тех. поддержка:</span>
				<a href="tel" class="tel">+38 063 277-77-55</a>
			</div>
		</div>
	</header>
	<!-- Шапка (The End)-->


  <!-- Баннеры - слайдер --> 
  {* banners *}
	{get_banner var=banner4 group=4}
	{if $banner4->items}
	<div class="container-fluid">
		<div class="banner js-slick_banner">
			{foreach $banner4->items as $bi}
			<div class="banner__list">
				{if $bi->image}
  		    <img src="{$config->banners_images_dir}{$bi->image}" alt="{$bi->alt}" title="{$bi->title}">
				{/if}
				{if $bi->description}
					<div class="banner__wrap">
						<h2 class="banner__title">{$bi->title}</h2>
						<p class="banner__text">{$bi->description}</p>
						{if $bi->url}
						<a class="btn banner__btn" href="{$bi->url}" target="_blank">
      			  {include file="svg.tpl" svgId="ic_cart" width="20px" height="20px"}
      			  <span>Купить</span>
      		  </a>
      	    {/if}
					</div>
				{/if}
			</div>
			{/foreach}
		</div>
	</div>
	{/if}
	{*/ banners *}

  <!--Баннеры - слайдер (The End) -->

 
	<!-- Вся страница --> 
	<div class="main">
		<!-- Основная часть --> 
		{$content}
		<!-- Основная часть (The End) --> 
	</div>
	<!-- Вся страница (The End)--> 

	<!-- О нас-->
	<section class="about">
	  <div class="container">
	  	<div class="about__features container-flex row">
	  		<div class="col-xs-12 col-sm-4">
          <div class="about__features-item about__features-item--delivery">
				    <h4 class="about__title">Бесплатная доставка</h4>
				    <p class="about__text">Быстрая и бесплатная доставка к вашим дверям.</p>
				  </div>
	  		</div>
	  		<div class="col-xs-12 col-sm-4">
	  			<div class="about__features-item about__features-item--support">
			      <h4 class="about__title">Онлайн поддержка</h4>
			      <p class="about__text">Бесплатная техническая поддержка 24/7</p>
			    </div>
	  		</div>
	  		<div class="col-xs-12 col-sm-4">
	  			<div class="about__features-item about__features-item--question">
	  				<h4 class="about__title">Другие вопросы</h4>
	  		    <p class="about__text">Напишите нам ваш вопрос</p>
	  			</div>
	  		</div>
	  	</div>
	  	<div class="row about__nav">
	  		<div class="col-xs-12 col-sm-4 about__nav-col">
	  				<h4 class="about__title">Контакты</h4>
	  				<ul class="about__nav-list">
	  					<li class="about__nav-contacts container-flex">
	  						{include file="svg.tpl" svgId="ic_location" width="15px" height="22px" fill="#12a4dd"}
	  						<span>28 Jackson Blvd Ste 1020 Chicago IL 60604-2340</span>
	  					</li>
	  					<li class="about__nav-contacts container-flex">
	  						{include file="svg.tpl" svgId="ic_phone" width="15px" height="15px" fill="#12a4dd"}
	  						<span>+38 063 277-77-55</span>
	  					</li>
	  					<li class="about__nav-contacts container-flex">
	  						{include file="svg.tpl" svgId="ic_mail" width="15px" height="15px" fill="#12a4dd"}
	  						<span>info@simpla.org</span>
	  					</li>
	  				</ul>
	  		</div>
	  		<div class="col-xs-12 col-sm-4 about__nav-col">
			    <h4 class="about__title">Категории</h4>
			    {* Вывод  категорий *}
			    {if $categories}
			    <ul class="about__category">
			    	{foreach $categories as $c}
			    	{* Показываем только видимые категории *}
			    	{if $c->visible}
			    	<li class="about__category-item">
			    		{if $c->image}<img src="{$config->categories_images_dir}{$c->image}" alt="{$c->name|escape}">{/if}
			    		<a {if $category->id == $c->id}class="selected"{/if} href="catalog/{$c->url}" data-category="{$c->id}">{$c->name|escape}</a>
			    	</li>
			    	{/if}
			    	{/foreach}
			    </ul>
			    {/if}
	  		</div>
	  		<div class="col-xs-12 col-sm-4 about__nav-col">
	  		  <h4 class="about__title">Информация</h4>
	  		  <!-- Меню -->
					<ul class="about__menu">
						{foreach $pages as $p}
						{* Выводим только страницы из первого меню *}
						{if $p->menu_id == 1}
						<li class="about__menu-item">
							<a data-page="{$p->id}" href="{$p->url}">{$p->name|escape}</a>
						</li>
						{/if}
						{/foreach}
					</ul>
					<!-- Меню (The End) -->
	  		</div>
	  	</div>
	  </div>
	</section>
	<!-- О нас (The End)--> 
	
	<!-- Футер -->
	<div class="footer">
	  <div class="container">
	  	<div class="row">
	  		<div class="footer__copyright col-xs-12 col-sm-4">
					Copyright © 2017 - <a class="text-copyright__link" href="http://simplacms.ru">Скрипт интернет-магазина Simpla</a>
	  		</div>
	  		<div class="footer__social social col-xs-12 col-sm-4">
					<a class="social__link" href="#">
					  {include file="svg.tpl" svgId="ic_instagram" width="36px" height="36px"}
					</a>
					<a class="social__link" href="#">
					 {include file="svg.tpl" svgId="ic_facebook" width="36px" height="36px"}
					</a>
					<a class="social__link" href="#">
					 {include file="svg.tpl" svgId="ic_vk" width="36px" height="36px"}
					</a>
	  		</div>
	  		<div class="footer__payment col-xs-12 col-sm-4">
	  		  <img src="design/{$settings->theme|escape}/images/payment.png" alt="payment" width="210" height="31">
	  		</div>
	  	</div> 
	  </div>
  </div>
  <!-- Футер (The End)-->

  <div id="add-cart-notice" class="modal-block js-modal-notice">
  	<div class="modal-block__content js-modal-notice-content">
  		<button class="modal-block__btn-close js-modal-notice-close" type="button" >
				{include file="svg.tpl" svgId="ic_close" fill="#12a4dd" width="18px" height="18px"}
			</button>
			<div class="modal-block__body">
				<div class="modal-block__img">
					{include file="svg.tpl" svgId="ic_cart" width="60px" height="60px"}
				</div>
				<div class="modal-block__text">
					Товар добавлен в корзину
				</div>
			</div>
			<div class="modal-block__footer">
		    <a class="modal-block__submit btn" href="/cart">Оформить заказ</a>
		    <span class="modal-block__continue js-modal-notice-close">Продолжить покупки</span>
			</div
  	</div>
  </div>
</body>
</html>