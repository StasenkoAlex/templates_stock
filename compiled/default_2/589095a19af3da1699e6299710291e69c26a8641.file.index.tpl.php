<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 15:39:25
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30159ff663b393369-08976451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '589095a19af3da1699e6299710291e69c26a8641' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\index.tpl',
      1 => 1510230865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30159ff663b393369-08976451',
  'function' => 
  array (
    'categories_tree' => 
    array (
      'parameter' => 
      array (
      ),
      'compiled' => '',
    ),
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff663b563946_19933646',
  'variables' => 
  array (
    'config' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'canonical' => 0,
    'settings' => 0,
    'module' => 0,
    'user' => 0,
    'group' => 0,
    'categories' => 0,
    'level' => 0,
    'c' => 0,
    'category' => 0,
    'pages' => 0,
    'p' => 0,
    'page' => 0,
    'keyword' => 0,
    'currencies' => 0,
    'currency' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => 0,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff663b563946_19933646')) {function content_59ff663b563946_19933646($_smarty_tpl) {?><!DOCTYPE html>

<html>
<head>
	<base href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/"/>
	<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="keywords"    content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	
	<?php if (isset($_smarty_tpl->tpl_vars['canonical']->value)) {?><link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
<?php echo $_smarty_tpl->tpl_vars['canonical']->value;?>
"/><?php }?>
	
	
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/favicon.ico" rel="icon" type="image/x-icon"/>
	<link href="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/favicon.ico" rel="shortcut icon" type="image/x-icon"/>
	
	
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-3.2.1.min.js"  type="text/javascript"></script>
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery-migrate-1.4.1.min.js"  type="text/javascript"></script>
	
	
	<?php if ($_SESSION['admin']=='admin') {?>
	<script src ="js/admintooltip/admintooltip.js" type="text/javascript"></script>
	<link   href="js/admintooltip/css/admintooltip.css" rel="stylesheet" type="text/css" /> 
	<?php }?>
	
	
	<script type="text/javascript" src="js/ctrlnavigate.js"></script>           
	
	
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/script.js"></script>
	
	
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery.validate.js" type="text/javascript"></script>
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/jquery.validate.rules.js" type="text/javascript"></script>
	

	
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/slick.js"></script>

	
	<?php if ($_smarty_tpl->tpl_vars['module']->value=="FeedbackView") {?>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5FBDFmR4yO5tuOgFfqpqg-9IvpCTNHYU&callback=initMap">
  </script>
	<script src="design/<?php echo $_smarty_tpl->tpl_vars['settings']->value->theme;?>
/js/googlemap.js"></script>
	<?php }?>
	
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
						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_close",'fill'=>"#12a4dd",'width'=>"12px",'height'=>"22px"), 0);?>

					</button>
					<!-- Вход пользователя -->
					<div class="header__user-info js-menu">
						<div class="header__user-info-list js-menu__list clearfix">
							<?php if ($_smarty_tpl->tpl_vars['user']->value) {?>
							<span class="header__user-info-item header__user-info-item--username">
								<a href="user"><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_user"), 0);?>
<?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</a><?php if ($_smarty_tpl->tpl_vars['group']->value->discount>0) {?>,
								<span class="header__user-info-diskount">ваша скидка &#45; <?php echo $_smarty_tpl->tpl_vars['group']->value->discount;?>
%</span><?php }?>
							</span>
							<a class="header__user-info-item user-info__item--logout" href="user/logout">выйти</a>
							<?php } else { ?>
							<a class="header__user-info-item user-info__item--login" href="user/login">Вход</a>
							<a class="header__user-info-item user-info__item--register" href="user/register">Регистрация</a>
							<?php }?>
						</div>
					</div>
					<!-- Вход пользователя (The End)-->	
					
					<!-- Меню каталога -->
					<div class="catalog js-catalog js-switch-container">
						<button class="catalog__btn catalog__btn--mobi" type="button">
						  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_more",'fill'=>"#12a4dd",'width'=>"12px",'height'=>"22px"), 0);?>
 Категории 
						</button>
						<button class="catalog__btn catalog__btn--desktop  js-switch-link" type="button" data-close_outside="true">
						  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_menu",'fill'=>"#12a4dd",'width'=>"40px",'height'=>"40px"), 0);?>

						</button>
						
						<?php if (!function_exists('smarty_template_function_categories_tree')) {
    function smarty_template_function_categories_tree($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['categories_tree']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
						<?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
						<ul class="catalog__list catalog__list--lvl<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['level']->value==1) {?>js-switch-content<?php }?> <?php if ($_smarty_tpl->tpl_vars['level']->value==3) {?>js-catalog-content<?php }?>">     
							<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
							
							<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
							<li class="catalog__item catalog__item--lvl<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 js-catalog">
								<div class="catalog__item-name catalog__item-name--lvl<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>selected<?php }?>">
									<a class="catalog__item-link catalog__item-link--lvl<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
" href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
">
										<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>

									</a>
									<?php if (count($_smarty_tpl->tpl_vars['c']->value->children)>1&&$_smarty_tpl->tpl_vars['level']->value==1||count($_smarty_tpl->tpl_vars['c']->value->children)>1&&$_smarty_tpl->tpl_vars['level']->value==2) {?>
									  <span class="catalog__item-trigger catalog__item-trigger--lvl<?php echo $_smarty_tpl->tpl_vars['level']->value;?>
 js-catalog-trigger">
										  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-down",'width'=>"10px",'height'=>"32px"), 0);?>

									  </span>
									<?php }?>
								</div>
								<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['c']->value->subcategories,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

							</li>
							<?php }?>
							<?php } ?>
						</ul>
						<?php }?>
						<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

						<?php smarty_template_function_categories_tree($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'level'=>1));?>

					</div>
					<!-- Меню каталога (The End)-->
					
					<!-- Меню -->
					<ul class="menu clearfix">
						<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						
						<?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?>
						<li class="menu__item <?php if ($_smarty_tpl->tpl_vars['page']->value&&$_smarty_tpl->tpl_vars['page']->value->id==$_smarty_tpl->tpl_vars['p']->value->id) {?>menu__item--selected<?php }?>">
							<a class="menu__item-link" data-page="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
						</li>
						<?php }?>
						<?php } ?>
					</ul>
					<!-- Меню (The End) -->
				</div>

			</div>
			<div class="header__search-flex js-switch-container">
				<button class="header__mobi-btn header__mobi-btn--search js-switch-link" type="button" data-close_outside="true">
					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_search"), 0);?>

				</button>
				<!-- Поиск-->
				<div class="header__search js-switch-content">
					<form action="products" class="search__form js-menu__list">
						<input class="input_search" type="text" name="keyword" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Поиск товара"/>
						<button class="button_search" value="" type="submit">
							<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_search"), 0);?>

						</button>
					</form>
				</div>
				<!-- Поиск (The End)-->
			</div>
			<div class="header__favorite-flex">
				<button class="header__mobi-btn header__mobi-btn--favorite" type="button">
					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_favorite"), 0);?>

				</button>
			</div>
			<div id="cart_informer" class="header__cart-flex">
		    <?php echo $_smarty_tpl->getSubTemplate ("cart_informer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			</div>
			<div class="header__currencies-flex">
				<!-- Выбор валюты -->
				
				<?php if (count($_smarty_tpl->tpl_vars['currencies']->value)>1) {?>
				<div class="currencies">
					<h2>Валюта</h2>
					<select class="currencies__list" onchange="location = $('.currencies__item:selected').data('href');">
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['c']->value->enabled) {?> 
						<option class="currencies__item" <?php if ($_smarty_tpl->tpl_vars['c']->value->id==$_smarty_tpl->tpl_vars['currency']->value->id) {?>selected<?php }?> data-href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('currency_id'=>$_smarty_tpl->tpl_vars['c']->value->id),$_smarty_tpl);?>
">
						  <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->code, ENT_QUOTES, 'UTF-8', true);?>

						</option>
						<?php }?>
						<?php } ?>
					</select>
				</div> 
				<?php }?>
				<!-- Выбор валюты (The End) -->
			</div>	

			<div class="header__logo header__logo-flex">
				<a href="/" class="logo__link"><img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/logo.png" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
			</div>
			<div class="header__support header__support-flex">
				<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_phone-full",'fill'=>"#12a4dd"), 0);?>
<span class="text"> Тех. поддержка:</span>
				<a href="tel" class="tel">+38 063 277-77-55</a>
			</div>
		</div>
	</header>
	<!-- Шапка (The End)-->

	<?php if ($_smarty_tpl->tpl_vars['module']->value=="MainView") {?>
  <!-- Баннеры - слайдер --> 
  <div class="container-fluid">
  	<div class="banner js-slick_banner">
  	  <div class="banner__list">
  		  <picture>
          <source srcset="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-1.jpg" media="(min-width: 768px)">
  		    <img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-1-mobile.jpg" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/>
  		  </picture>
  		  <div class="banner__wrap">
  			  <h2 class="banner__title">Samsung. Лучшее предложение.</h2>
  			  <p class="banner__text">Galaxy S7 от Samsung поддерживает инновационные технологии, что делает его одним из лучших смартфонов 2016 года.</p>
  			  <button class="btn banner__btn" type="submit" data-result-text="добавлено">
    			  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

    			  <span>Купить</span>
    		  </button>
  		  </div>
  	  </div>
  	  <div class="banner__list">
  		  <picture>
          <source srcset="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-2.jpg" media="(min-width: 768px)">
  		    <img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-2-mobile.jpg" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/>
  		  </picture>
  		  <div class="banner__wrap">
  			  <h2 class="banner__title">Apple iPhone 7</h2>
  			  <p class="banner__text">
          Телефон оснащен 4,70-дюймовым сенсорным дисплеем с разрешением 750 пикселей на 1334 пикселя при PPI 326 пикселей на дюйм.</p>
  			  <button class="btn banner__btn" type="submit" data-result-text="добавлено">
    			  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

    			  <span>Купить</span>
    		  </button>
  		  </div>
  	  </div>
  	  <div class="banner__list">
  		  <picture>
          <source srcset="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-3.jpg" media="(min-width: 768px)">
  		    <img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-3-mobile.jpg" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/>
  		  </picture>
  		  <div class="banner__wrap">
  			  <h2 class="banner__title">XiaoMi Mi 5</h2>
  			  <p class="banner__text">Snapdragon 820 / 3GB RAM / 32GB UFS 2.0 Flash 4-axis OIS кмера / 3D стекло</p>
  			  <button class="btn banner__btn" type="submit" data-result-text="добавлено">
    			   <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

    			   <span>Купить</span>
    		  </button>
  		  </div>
  	  </div>
  	  <div class="banner__list">
  		  <picture>
          <source srcset="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-4.jpg" media="(min-width: 768px)">
  		    <img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/slide-4-mobile.jpg" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->site_name, ENT_QUOTES, 'UTF-8', true);?>
"/>
  		  </picture>
  		  <div class="banner__wrap">
  			  <h2 class="banner__title">Lenovo K5 Note 4G</h2>
  			  <p class="banner__text">Этот телефон оснащен 5,5-дюймовым многоточечным емкостным сенсорным экраном с разрешением 1920 * 1080, двойной SIM-картой и двухрежимным дизайном.</p>
  			  <button class="btn banner__btn" type="submit" data-result-text="добавлено">
    			  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

    			  <span>Купить</span>
    		  </button>
  		  </div>
  	  </div>
    </div>
  </div>
  <!-- Баннеры - слайдер (The End)-->
  <?php }?>
 
	<!-- Вся страница --> 
	<div class="main">
		<!-- Основная часть --> 
		<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

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
	  						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_location",'width'=>"15px",'height'=>"22px",'fill'=>"#12a4dd"), 0);?>

	  						<span>28 Jackson Blvd Ste 1020 Chicago IL 60604-2340</span>
	  					</li>
	  					<li class="about__nav-contacts container-flex">
	  						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_phone",'width'=>"15px",'height'=>"15px",'fill'=>"#12a4dd"), 0);?>

	  						<span>+38 063 277-77-55</span>
	  					</li>
	  					<li class="about__nav-contacts container-flex">
	  						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_mail",'width'=>"15px",'height'=>"15px",'fill'=>"#12a4dd"), 0);?>

	  						<span>info@simpla.org</span>
	  					</li>
	  				</ul>
	  		</div>
	  		<div class="col-xs-12 col-sm-4 about__nav-col">
			    <h4 class="about__title">Категории</h4>
			    
			    <?php if ($_smarty_tpl->tpl_vars['categories']->value) {?>
			    <ul class="about__category">
			    	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['c']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value) {
$_smarty_tpl->tpl_vars['c']->_loop = true;
?>
			    	
			    	<?php if ($_smarty_tpl->tpl_vars['c']->value->visible) {?>
			    	<li class="about__category-item">
			    		<?php if ($_smarty_tpl->tpl_vars['c']->value->image) {?><img src="<?php echo $_smarty_tpl->tpl_vars['config']->value->categories_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['c']->value->image;?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"><?php }?>
			    		<a <?php if ($_smarty_tpl->tpl_vars['category']->value->id==$_smarty_tpl->tpl_vars['c']->value->id) {?>class="selected"<?php }?> href="catalog/<?php echo $_smarty_tpl->tpl_vars['c']->value->url;?>
" data-category="<?php echo $_smarty_tpl->tpl_vars['c']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['c']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
			    	</li>
			    	<?php }?>
			    	<?php } ?>
			    </ul>
			    <?php }?>
	  		</div>
	  		<div class="col-xs-12 col-sm-4 about__nav-col">
	  		  <h4 class="about__title">Информация</h4>
	  		  <!-- Меню -->
					<ul class="about__menu">
						<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
						
						<?php if ($_smarty_tpl->tpl_vars['p']->value->menu_id==1) {?>
						<li class="about__menu-item">
							<a data-page="<?php echo $_smarty_tpl->tpl_vars['p']->value->id;?>
" href="<?php echo $_smarty_tpl->tpl_vars['p']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
						</li>
						<?php }?>
						<?php } ?>
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
					  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_instagram",'width'=>"36px",'height'=>"36px"), 0);?>

					</a>
					<a class="social__link" href="#">
					 <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_facebook",'width'=>"36px",'height'=>"36px"), 0);?>

					</a>
					<a class="social__link" href="#">
					 <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_vk",'width'=>"36px",'height'=>"36px"), 0);?>

					</a>
	  		</div>
	  		<div class="footer__payment col-xs-12 col-sm-4">
	  		  <img src="design/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['settings']->value->theme, ENT_QUOTES, 'UTF-8', true);?>
/images/payment.png" alt="payment" width="210" height="31">
	  		</div>
	  	</div> 
	  </div>
  </div>
  <!-- Футер (The End)-->

  <div id="add-cart-notice" class="modal-block js-modal-notice">
  	<div class="modal-block__content js-modal-notice-content">
  		<button class="modal-block__btn-close js-modal-notice-close" type="button" >
				<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_close",'fill'=>"#12a4dd",'width'=>"18px",'height'=>"18px"), 0);?>

			</button>
			<div class="modal-block__body">
				<div class="modal-block__img">
					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"60px",'height'=>"60px"), 0);?>

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
</html><?php }} ?>
