<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 12:01:02
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3138959ff693a4bc7e1-87570261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '026d31452af804f6ca56d6f5edd63667a5cf0c91' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\product.tpl',
      1 => 1510218053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3138959ff693a4bc7e1-87570261',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff693a646e19_78541960',
  'variables' => 
  array (
    'product' => 0,
    'image' => 0,
    'currency' => 0,
    'brand' => 0,
    'v' => 0,
    'comments' => 0,
    'f' => 0,
    'comment' => 0,
    'error' => 0,
    'comment_name' => 0,
    'comment_text' => 0,
    'related_products' => 0,
    'related_product' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff693a646e19_78541960')) {function content_59ff693a646e19_78541960($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\Work\\OSPanel\\domains\\test\\Smarty\\libs\\plugins\\function.math.php';
?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products/".((string)$_smarty_tpl->tpl_vars['product']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<div class="container-fluid container-fluid--grey">
  <!-- Хлебные крошки /-->
  <?php echo $_smarty_tpl->getSubTemplate ("crumbles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- Хлебные крошки #End /-->
  <div class="product">
    <div class="row product">
    	<div class="col-xs-12 col-sm-6 col-lg-8">
    		<div class="product__gallery clearfix">
    			<div class="gallery_slider-nav product__images hidden-xs visible-md col-md-4 col-lg-3">
    				<!-- Дополнительные фото продукта -->
    			  <?php if ($_smarty_tpl->tpl_vars['product']->value->images) {?>
    			  <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
    			    <div class="product__img product__img--small">
    				     <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,130,130);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />   
    			    </div> 
    			     <?php } ?>
    			  <?php }?>
    			  <!-- Дополнительные фото продукта (The End)-->
    			</div>    			
    			<div class="gallery_slider-for col-md-8 col-lg-9">
    				<?php if ($_smarty_tpl->tpl_vars['product']->value->images) {?>
    				<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['product']->value->images; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['image']->key;
?>
    				<div class="product__img product__img--big">
    				  <img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,360,700);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->ame, ENT_QUOTES, 'UTF-8', true);?>
" />
    				</div>
    				<?php } ?>
    				<?php }?>
    			</div>
    		</div>
    	</div>
    	<div class="col-xs-12 col-sm-6 col-lg-4">
    		<div class="product__info js-product-info">
    			<h1 class="product__name" data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    			<div class="product__price-section">
    				<span class="product__price">
    					<span class="js-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->price);?>
</span>
    					<span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->code, ENT_QUOTES, 'UTF-8', true);?>
</span>
    				</span>
    				<span class="product__price--compare js-compare_price <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price==0) {?>hidden<?php }?>">
    					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>

    				</span>
    			</div>
    			<ul class="product__data">
    				<li class="product__data-item">
    					<strong>Производитель:</strong>
    					<a href="<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
</a>
    				</li>
    				<li class="product__data-item js-sku-container <?php if (!$_smarty_tpl->tpl_vars['product']->value->variant->sku) {?>hidden<?php }?>">
    					<strong>Артикул:</strong>
    					<span class="js-sku"><?php echo $_smarty_tpl->tpl_vars['product']->value->variant->sku;?>
</span>
    				</li>
    				<li class="product__data-item">
    					<strong>Наличие:</strong>
    					<?php if ($_smarty_tpl->tpl_vars['product']->value->variant->stock>0) {?> <span class="stock">Есть в наличии</span> 
    					<?php } else { ?><span class="stock--out">Нет в наличии</span><?php }?>
    				</li>
    			</ul>

    			<?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>0) {?>
    			<!-- Выбор варианта товара -->
    			<form class="product__variants js-add_cart" action="/cart">
    				<h3 class="product__name">Доступные варианты</h3>
    				<ul class="product__variants-list">
    					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->variants; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
    					<li class="product__variant">
    						<input id="product_<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" name="variant" value="<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
" type="radio" class="js-variant_input" 
                  <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->id==$_smarty_tpl->tpl_vars['v']->value->id) {?>checked<?php }?> 
                  data-price="<?php echo str_replace('',' ',$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(ceil($_smarty_tpl->tpl_vars['v']->value->price)));?>
" 
                  <?php if ($_smarty_tpl->tpl_vars['v']->value->sku) {?>data-sku="<?php echo $_smarty_tpl->tpl_vars['v']->value->sku;?>
"<?php }?> 
                  <?php if ($_smarty_tpl->tpl_vars['v']->value->compare_price) {?>data-old_price="<?php echo str_replace('',' ',$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(ceil($_smarty_tpl->tpl_vars['v']->value->compare_price)));?>
"<?php }?> 
                />
    						<?php if ($_smarty_tpl->tpl_vars['v']->value->name) {?><label class="product__variant-name" for="product_<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value->name;?>
</label>
                  <?php } else { ?> <label class="product__variant-name" for="product_<?php echo $_smarty_tpl->tpl_vars['v']->value->id;?>
">Один вариант товара</label>
                <?php }?>
    					</li>
    					<?php } ?>
    				</ul>
    				<div class="product__custom-panel clearfix">
    					<div class="product__quantity js-counter_form">
    						<button class="counter js-counter js-counter_minus" type="button">
                  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_minus",'width'=>"15px",'height'=>"42px"), 0);?>

                </button>
    						<input type="text" class="product__quantity-input quantity js-counter_input" name="amount" value="1" data-max="<?php echo $_smarty_tpl->tpl_vars['product']->value->variant->stock;?>
">
    						<button class="counter js-counter js-counter_plus" type="button">
                  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_plus",'width'=>"15px",'height'=>"42px"), 0);?>

                </button>
    					</div>
    					<button class="tiny-product__btn btn" type="submit" data-result-text="добавлено">
    						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

    						<span>Купить</span>
    					</button>
    					<button class="product__favorite-btn" type="button">
    						<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_favorite"), 0);?>

    					</button>
    				</div>
    			</form>
    			<!-- Выбор варианта товара (The End) -->
    			<?php } else { ?>
    			Нет в наличии
    			<?php }?>
    		</div>
    	</div>
    </div>
    <div class="product__tabs clearfix">
    	<ul class="product__tabs-nav js-tabs">
    		<li class="js-tab">Описание</li>
    		<li class="js-tab">Характеристики</li>
    		<li class="js-tab">
          Отзывов <span>(<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
)</span>
        </li>
    	</ul>
    	<div class="product__tabs-content js-tab_content">
    		<div class="product__tabs-pane js-tab_item">	
    			<!-- Описание товара -->
    			<?php echo $_smarty_tpl->tpl_vars['product']->value->body;?>

    			<!-- Описание товара (The End)-->
    		</div>
    		<div class="product__tabs-pane js-tab_item">
    			<?php if ($_smarty_tpl->tpl_vars['product']->value->features) {?>
    			<!-- Характеристики товара -->
    			
    			<table class="product__features">
    				<th colspan="2" class="product__features-title">Характеристики</th>
    				<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->features; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
?>
    				<tr>
    					<td class="product__features-name"><?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>
</td>
    					<td class="product__features-value"><?php echo $_smarty_tpl->tpl_vars['f']->value->value;?>
</td>
    				</tr>
    				<?php } ?>
    			</table>
    			<!-- Характеристики товара (The End)-->
    			<?php }?>
    		</div>
    		<div class="product__tabs-pane js-tab_item">
    			<!-- Комментарии -->
    			<div class="comments">
    				<?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
    				<!-- Список с комментариями -->
    				<ul class="comments__list">
    					<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
    					<a name="comments__<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"></a>
    					<li class="comments__item">
    						<!-- Имя и дата комментария-->
    						<span class="comments__author"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 </span>
                <span class="comments__date">
                  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_clock",'width'=>"16px",'height'=>"16px"), 0);?>

                  <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
, <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>

                </span>
    						<?php if (!$_smarty_tpl->tpl_vars['comment']->value->approved) {?>ожидает модерации</b><?php }?>
    						<!-- Имя и дата комментария (The End)-->
                <div class="comments__text ">
                  <!-- Комментарий -->
                  <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->text, ENT_QUOTES, 'UTF-8', true));?>

                  <!-- Комментарий (The End)-->
                </div>
    					</li>
    					<?php } ?>
    				</ul>
    				<!-- Список с комментариями (The End)-->
    				<?php } else { ?>
    				<p class="comments__absent">
    					Пока нет отзывов
    				</p>
    				<?php }?>
            <div class="comments__btn-wrap">  
              <a class="comments__form-btn">Написать отзыв</a>
            </div>
    				<!--Форма отправления комментария-->	
    				<form class="comments__form js-form" method="post">
              <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
              <div class="message_error">
                <?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>
                Неверно введена капча
                <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
                Введите имя
                <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_comment') {?>
                Введите комментарий
                <?php }?>
              </div>
              <?php }?>
              <div class="form__group">
                <label class="after" for="comment__name">Имя</label>
                <input class="name" type="text" id="comment__name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['comment_name']->value;?>
" data-format=".+" data-notice="Введите имя" required>
              </div>
              <div class="form__group">
                <label class="after" for="comment__text">Ваш отзыв</label>
                <textarea class="comment__textarea" id="comment_text" name="text" data-format=".+" data-notice="Введите комментарий" required><?php echo $_smarty_tpl->tpl_vars['comment_text']->value;?>
</textarea>
              </div>
              <div class="container-flex container-flex--form form__group">
                <div class="captcha__container">  
                  <label class="after" for="comment_captcha">Введите число</label>
                  <div class="captcha">
                    <img class="captcha__img" src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
" alt='captcha'/>
                    <input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" required>
                  </div>  
                </div>
                <input type="submit" class="btn comment__btn captcha__btn" name="comment" value="Оставить коммментарий">
              </div>
    				</form>
    				<!--Форма отправления комментария (The End)-->
            <div class="modal__success js-form__success">
              <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_checkbox",'width'=>"100px",'fill'=>"#12a4dd"), 0);?>

              <p class="modal__text">Ваш отзыв принят в обработку</p>
              <button class="btn modal__btn js-form__btn-close">Ок</button>
            </div>
    			</div>
    			<!-- Комментарии (The End) -->
    		</div>
    	</div>
    </div>
  </div>
</div>
<!-- Описание товара (The End)-->
<div class="section section--dark">
	<div class="container-fluid">
		
		<?php if ($_smarty_tpl->tpl_vars['related_products']->value) {?>
		<h2 class="products__title">Рекомендуемые товары</h2>
		<!-- Список каталога товаров-->	
		<ul class="products__list row row--flex">
			<?php  $_smarty_tpl->tpl_vars['related_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['related_product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['related_product']->key => $_smarty_tpl->tpl_vars['related_product']->value) {
$_smarty_tpl->tpl_vars['related_product']->_loop = true;
?>
			<div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
				<!-- Товар-->
			  <div class="tiny-product__inner">
          <div class="tiny-product__row row">
          <?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?> <span class="tiny-product__label">hit</span> <?php }?>
          <!-- Фото товара -->
          <?php if ($_smarty_tpl->tpl_vars['related_product']->value->image) {?>
            <a class="tiny-product__image col-xs-6 col-sm-12" href="products/<?php echo $_smarty_tpl->tpl_vars['related_product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['related_product']->value->image->filename,200,200);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['related_product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/></a>
          <?php }?>
          <!-- Фото товара (The End) -->

          <div class="tiny-product__info col-xs-6 col-sm-12">
            <!-- Название товара -->
              <div class="tiny-product__name">
            	  <a data-product="<?php echo $_smarty_tpl->tpl_vars['related_product']->value->id;?>
" href="products/<?php echo $_smarty_tpl->tpl_vars['related_product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['related_product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
              </div>
            <!-- Название товара (The End) -->

            <?php if (count($_smarty_tpl->tpl_vars['related_product']->value->variants)>0) {?>
            <!-- Выбор варианта товара -->
            <form class="tiny-product__cart" action="/cart">
              <input name="variant" value="<?php echo $_smarty_tpl->tpl_vars['related_product']->value->variant->id;?>
" type="hidden"/>
              <div class="tiny-product__price">
              	<?php if ($_smarty_tpl->tpl_vars['related_product']->value->variant->compare_price>0) {?>
              	<span class="compare-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>

              		<span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
              	</span>
              	<?php }?>
              	<span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['related_product']->value->variant->price);?>
 
              		<span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
              	</span>
              </div>
              <button class="tiny-product__btn btn" type="submit" data-result-text="добавлено">
              	<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"20px",'height'=>"20px"), 0);?>

              	<span>Купить</span>
              </button>
            </form>
            <!-- Выбор варианта товара (The End) -->
            <?php } else { ?>
            Нет в наличии
            <?php }?>
            </div>
          </div>
        </div>
      </div>
			<!-- Товар (The End)-->
			<?php } ?>
		</ul>
		<?php }?>
	</div>
 </div>
</div>




<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

<script>
$(function() {
	// Раскраска строк характеристик
	$(".features li:even").addClass('even');

	// Зум картинок
	$("a.zoom").fancybox({
		prevEffect	: 'fade',
		nextEffect	: 'fade'});
	});
</script>
<?php }} ?>
