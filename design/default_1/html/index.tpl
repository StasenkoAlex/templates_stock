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
	<link href="design/{$settings->theme|escape}/css/style1.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="icon" type="image/x-icon"/>
	<link href="design/{$settings->theme|escape}/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	
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
	
	{* Аяксовая корзина *}
	<script src="design/{$settings->theme}/js/script.js"></script>
	
	{* js-проверка форм *}
	<script src="js/baloon/js/baloon.js" type="text/javascript"></script>
	<link   href="js/baloon/css/baloon.css" rel="stylesheet" type="text/css" /> 

	{* slider slick*}
	<script src="design/{$settings->theme}/js/slick.min.js"></script>
	<link href="design/{$settings->theme|escape}/css/slick.css" rel="stylesheet" type="text/css" media="screen"/>
	
	{* Автозаполнитель поиска *}
	{literal}
	<script src="js/autocomplete/jquery.autocomplete-min.js" type="text/javascript"></script>
	<style>
		.autocomplete-suggestions{
		background-color: #ffffff;
		overflow: hidden;
		border: 1px solid #e0e0e0;
		overflow-y: auto;
		}
		.autocomplete-suggestions .autocomplete-suggestion{cursor: default;}
		.autocomplete-suggestions .selected { background:#F0F0F0; }
		.autocomplete-suggestions div { padding:2px 5px; white-space:nowrap; }
		.autocomplete-suggestions strong { font-weight:normal; color:#3399FF; }
	</style>	
	<script>
	$(function() {
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
	});
	</script>
	{/literal}
		
			
</head>
<body>

	<!-- Шапка -->
	<div class="header">
	  <div class="header__container container js-container-flex">
      <div class="menu">
       	<button class="mobile-btn mobile-btn--open js-btn--open">
       	 {include file="svg.tpl" svgId="ic_menu" fill="#fff"}
       	</button>
       	<div class="menu-sidebar">
       	  <div class="menu-sidebar__control">
       	 	 	<button class="mobile-btn mobile-btn--close js-btn--close">
       	 	 		{include file="svg.tpl" svgId="ic_close" fill="#fff"}
       	 	 	</button>
       	 	 	<span>Закрыть</span>
       	 	</div>
       	  <!-- Меню -->
		      <ul class="menu__list flex-menu">
		     	  <li class="menu__item {if $page && $page->id == 1}menu__item--selected{/if}">
		      		<a href="">Главная</a>
		      	</li>
		      	<li class="menu__item menu__item--catalog {if $page && $page->id == 2}menu__item--selected{/if} clear js-menu">
       	 	 	  <a href="#">
       	 	 	    Каталог
       	 	 	    <button class="menu__item-open js-trigger-open">
       	 	 	     {include file="svg.tpl" svgId="ic_arrow_down"}
       	 	 	  </button>
       	 	 	  </a>
       	 	 	  
       	 	   	  <!-- Меню каталога -->
			          <div class="catalog-menu js-menu__list">
			            {* Рекурсивная функция вывода дерева категорий *}
			            {function name=categories_tree}
			            {if $categories}
			            <ul class="catalog-menu__list catalog-menu__list-lvl{$level} {if $level == 1}flex-menu{/if} {if $level == 2}js-menu__list{/if} {if $level == 3}clear{/if}">     
			            {foreach $categories as $c}
			             	{* Показываем только видимые категории *}
			             	{if $c->visible}
			            		<li class="catalog-menu__item catalog-menu__item-lvl{$level} {if $level == 1}js-menu{/if}">
			            		  <div class="catalog-menu__item-name-lvl{$level}">
			            		  {if $c->children|count>1 && $level==1}
			            		  <span class="icon-more js-trigger-open">
			            		  	{include file="svg.tpl" svgId="ic_add" fill="#000"}
			            		  </span>
			            		  {/if}
			            			<a {if $category->id == $c->id}class="selected"{/if} href="catalog/{$c->url}" data-category="{$c->id}">{$c->name|escape}</a>
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
       	 	    </li>
		        	{foreach $pages as $p}
		        		{* Выводим только страницы из первого меню *}
		        		{if $p->menu_id == 1}
		        		<li class="menu__item {if $page && $page->id == $p->id}menu__item--selected{/if}">
		        			<a data-page="{$p->id}" href="{$p->url}">{$p->name|escape}</a>
		        		</li>
		        		{/if}
		        	{/foreach}
		        </ul>
		        <!-- Меню (The End) -->
       	  </div>
        </div>
        <!-- Поиск-->
			  <div class="header__search js-menu">
			    <button class="mobile-btn mobile-btn--search js-trigger-open" value="" type="button">
					  {include file="svg.tpl" svgId="ic_search" fill="#fff"}
					</button>
				  <form action="products" class="search__form js-menu__list">
					  <input class="input_search" type="text" name="keyword" value="{$keyword|escape}" placeholder="Поиск товара"/>
					  <button class="button_search" value="" type="submit">
					  	<svg fill="#ffffff" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                  <path d="M0 0h24v24H0z" fill="none"/>
              </svg>
					  </button>
				  </form>
			  </div>
			  <!-- Поиск (The End)-->
        <!-- Вход пользователя -->
			  <div class="header__user-info js-menu">
			  	<button class="mobile-btn mobile-btn--user-info js-trigger-open" value="" type="button">
			  	  {include file="svg.tpl" svgId="ic_person" fill="#fff"}
			  	</button>
			  	<div class="user-info__list js-menu__list clear">
			    {if $user}
			    	<span id="username">
			    		<a href="user">{$user->name}</a>{if $group->discount>0},
			    		ваша скидка &mdash; {$group->discount}%{/if}
			    	</span>
			    	<a id="logout" href="user/logout">выйти</a>
			    {else}
			    	<a id="register" href="user/register">Регистрация</a>
			    	<a id="login" href="user/login">Вход</a>
			    {/if}
		      </div>
			  </div>
			  <!-- Вход пользователя (The End)-->
			  <!-- Корзина -->
		    <div class="header__cart_informer">
			    {* Обновляемая аяксом корзина должна быть в отдельном файле *}
			    {include file='cart_informer.tpl'}
		    </div>
		    <!-- Корзина (The End)-->

		    <div class="header__logo">
			    <a href="/" class="logo__link"><img src="design/{$settings->theme|escape}/images/logo.png" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/></a>
		    </div>
		    <div class="header__contact">
		      {include file="svg.tpl" svgId="ic_phone" width="20px" height="20px" }
			    <span class="phone"><span class="mobile-hidden">Cлужба тех. поддержки</span> +38 (063) 545-54-55</span>
		    </div>	
	  </div>
	</div>
	<!-- Шапка (The End)--> 
  {if $module == "MainView"}
  <!-- Баннеры - слайдер --> 
  <div class="slick-slider single-item">
  	<div class="slick-list">
  		<img src="design/{$settings->theme|escape}/images/img-slide1.jpg" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/>
  	</div>
  	<div class="slick-list">
  		<img src="design/{$settings->theme|escape}/images/img-slide2.jpg" title="{$settings->site_name|escape}" alt="{$settings->site_name|escape}"/>
  	</div>
  </div>
  <!-- Баннеры - слайдер (The End)-->
  {/if}
	<!-- Вся страница --> 
	<div class="main">
		<!-- Основная часть --> 
			{$content}
		<!-- Основная часть (The End) --> 
	</div>
	<!-- Вся страница (The End)--> 
	
	<!-- Футер -->
	<div class="footer">
	  <div class="container">
	  	<div class="row">
	  		<div class="text-copyright col-xs-12 col-sm-12 col-md-4">
					Copyright © 2017 - <a class="text-copyright__link" href="http://simplacms.ru">Скрипт интернет-магазина Simpla</a>
	  		</div>
	  		<div class="social-list col-xs-12 col-sm-12 col-md-4">
					<a class="social-list__link social-list__link--inst" href="#">
					  {include file="svg.tpl" svgId="ic_instagram"}
					</a>
					<a class="social-list__link social-list__link--fb" href="#">
					 {include file="svg.tpl" svgId="ic_facebook"}
					</a>
					<a class="social-list__link social-list__link--vk" href="#">
					 {include file="svg.tpl" svgId="ic_vk"}
					</a>
	  		</div>
	  		<div class="payment col-xs-12 col-sm-12 col-md-4">
	  		  <img src="design/{$settings->theme|escape}/images/payment.png" alt="payment" width="210" height="31">
	  		</div>
	  	</div>
	  </div>
		
	</div>
	<!-- Футер (The End)--> 
	
</body>
</html>