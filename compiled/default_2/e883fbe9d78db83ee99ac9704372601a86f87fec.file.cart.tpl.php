<?php /* Smarty version Smarty-3.1.18, created on 2017-11-08 22:53:42
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:325985a000f271c5153-82731126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e883fbe9d78db83ee99ac9704372601a86f87fec' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\cart.tpl',
      1 => 1510087047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '325985a000f271c5153-82731126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a000f2744efe8_90818673',
  'variables' => 
  array (
    'cart' => 0,
    'currency' => 0,
    'purchase' => 0,
    'image' => 0,
    'product' => 0,
    'user' => 0,
    'coupon_request' => 0,
    'coupon_error' => 0,
    'deliveries' => 0,
    'delivery' => 0,
    'delivery_id' => 0,
    'error' => 0,
    'name' => 0,
    'email' => 0,
    'phone' => 0,
    'address' => 0,
    'comment' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a000f2744efe8_90818673')) {function content_5a000f2744efe8_90818673($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\Work\\OSPanel\\domains\\test\\Smarty\\libs\\plugins\\function.math.php';
?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Корзина", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<div class="container-fluid container-fluid--grey">
	<h1 class="cart__title">
    <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'fill'=>"#12a4dd"), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>  Корзина покупок<br> (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
)
    <?php } else { ?>Корзина пуста<?php }?>
  </h1>

  <?php if ($_smarty_tpl->tpl_vars['cart']->value->purchases) {?>
  <form method="post" name="cart" class="cart__form js-form">
  	
  	<table id="purchases" class="cart-table">
  		<tr class="cart-table__headers">
  			<th>Изображение</th>
  			<th>Название</th>
  			<th>Количество</th>
  			<th>Цена за шт.</th>
  			<th>Всего</th>
  			<th></th>
  		</tr>
  		<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->purchases; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
  		<tr class="clearfix cart-table__row">
  			
  			<td class="cart-table__image">
  				<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
  				<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
  				<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,50,50);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
  				<?php }?>
  			</td>
  			
  			<td class="cart-table__name">
  				<a class="cart-table__name-link"href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
  				<?php if ($_smarty_tpl->tpl_vars['purchase']->value->variant->name) {?>
  				<br/><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant->name, ENT_QUOTES, 'UTF-8', true);?>
	
  				<?php }?>		
  			</td>

  			
  			<td class="cart-table__amount js-counter_form">
  				<button class="counter js-counter js-counter_minus" type="button">
  					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_minus",'width'=>"15px",'height'=>"22px"), 0);?>

  				</button>
  				<input type="text" data-max="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->stock;?>
" class="product__quantity-input quantity js-counter_input"  name="amounts[<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
" onchange="document.cart.submit();">
  				<button class="counter js-counter js-counter_plus" type="button">
  					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_plus",'width'=>"15px",'height'=>"22px"), 0);?>

  				</button>
  			</td>

  			
  			<td class="cart-table__price-equal">
  				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price));?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

  			</td>

  			
  			<td class="cart-table__price">
  				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->variant->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

  			</td>

  			
  			<td class="cart-table__remove">
  				<a class="cart-table__remove-link" href="cart/remove/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->id;?>
">
  					<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_close",'width'=>"14px",'height'=>"14px"), 0);?>

  				</a>
  			</td>
  		</tr>
  		<?php } ?>
  	</table>

  	<div class="row">
  		<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7">
  			<table class="cart__total-price">
  				<tr>
  					<td class="cart__total-price-name">Дисконт</td>
  					<td class="cart__total-price-data"><?php echo $_smarty_tpl->tpl_vars['user']->value->discount;?>
&nbsp;%</td>
  				</tr>
  				<tr>
  					<td class="cart__total-price-name">Итого</td>
  					<td class="cart__total-price-data"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
  				</tr>
  			</table>
  		</div>
  	</div>

  	<?php if ($_smarty_tpl->tpl_vars['coupon_request']->value) {?>
  	<div class="cart-table__coupon">
  		<p>Если у вас есть код купона на скидку выберите соотвествующий пункт ниже</p>
  		<div class="cart-table__field cart-table__field--coupon"> <!-- js-cart_field -->
  			<button class="cart-table__form-trigger js-cart_trigger">Использовать купон
  				<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-down",'width'=>"9px",'height'=>"9px"), 0);?>

  			</button>
  			<div class="cart-table__form cart-table__form--coupon js-cart_content">
  				<?php if ($_smarty_tpl->tpl_vars['coupon_error']->value) {?>
  				<div class="cart-table__message_error">
  					<?php if ($_smarty_tpl->tpl_vars['coupon_error']->value=='invalid') {?>Купон недействителен<?php }?>
  				</div>
  				<?php }?>
  				<label for="coupon-code" class="cart-table__label">Введите код купона</label>
  				<input type="text" name="coupon_code" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value->coupon->code, ENT_QUOTES, 'UTF-8', true);?>
" id="coupon-code" class="cart-table__input" placeholder="Введите код ">
  				<?php if ($_smarty_tpl->tpl_vars['cart']->value->coupon->min_order_price>0) {?>(купон <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value->coupon->code, ENT_QUOTES, 'UTF-8', true);?>
 действует для заказов от <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->coupon->min_order_price);?>
 <?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
)<?php }?>
  				<input class="btn btn--coupon" type="button" name="apply_coupon"  value="Применить купон" onclick="document.cart.submit();">
  			</div>
  		</div>
  	</div>

  	<?php if ($_smarty_tpl->tpl_vars['cart']->value->coupon_discount>0) {?>
  	<div class="row">
  		<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7">
  			<table class="cart__total-price">
  				<tr>
  					<td class="cart__total-price-name">Cкидка по купону</td>
  					<td class="cart__total-price-data">&minus;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->coupon_discount);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
  				</tr>
  			</table>    
  		</div>
  	</div>
  	<?php }?>
    <?php }?>

    
    <?php if ($_smarty_tpl->tpl_vars['deliveries']->value) {?>
    <div class="cart-table__field  js-cart_field">
    	<button href="#" class="cart-table__form-trigger js-cart_trigger">Выберите способ доставки
    		<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-down",'width'=>"9px",'height'=>"9px"), 0);?>

    	</button>	
    	<ul class="cart-table__form  cart__delivery-list js-cart_content">
    		<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['deliveries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['delivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value) {
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
 $_smarty_tpl->tpl_vars['delivery']->index++;
 $_smarty_tpl->tpl_vars['delivery']->first = $_smarty_tpl->tpl_vars['delivery']->index === 0;
?>
    		<li class="cart__delivery-item">
    			<div class="cart-table__checkbox">
    				<input type="radio" name="delivery_id" value="<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
" <?php if ($_smarty_tpl->tpl_vars['delivery_id']->value==$_smarty_tpl->tpl_vars['delivery']->value->id) {?>checked<?php } elseif ($_smarty_tpl->tpl_vars['delivery']->first) {?>checked<?php }?> id="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
">
    				<label for="deliveries_<?php echo $_smarty_tpl->tpl_vars['delivery']->value->id;?>
">
    					<?php echo $_smarty_tpl->tpl_vars['delivery']->value->name;?>

    					<?php if ($_smarty_tpl->tpl_vars['cart']->value->total_price<$_smarty_tpl->tpl_vars['delivery']->value->free_from&&$_smarty_tpl->tpl_vars['delivery']->value->price>0) {?>
    					(<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['delivery']->value->price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
)
    					<?php } elseif ($_smarty_tpl->tpl_vars['cart']->value->total_price>=$_smarty_tpl->tpl_vars['delivery']->value->free_from) {?>
    					(бесплатно)
    					<?php }?>
    				</label>
    			</div>
    			<div class="cart-table__checkbox-description">
    				<?php echo $_smarty_tpl->tpl_vars['delivery']->value->description;?>

    			</div>
    		</li>
    		<?php } ?>
    	</ul>
    </div>
    <?php }?>

    <div class="cart-table__form cart-table__form--user">
      <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
      <div class="message_error">
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>Капча введена неверно<?php }?>
      </div>
      <?php }?>
    	<legend class="cart-table__form-legend">Личные данные</legend>
      <div class="form__group">
        <label class="after">Имя</label>
        <input name="name" type="text"  value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format=".+" data-notice="Введите имя" placeholder="Введите имя" minlength="2" required>
      </div>
    	<div class="form__group">
        <label class="after">Email</label>
        <input name="email" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-format="email" data-notice="Введите email" placeholder="Введите email" required>
      </div>
    	<div class="form__group">
        <label class="after">Телефон</label>
        <input name="phone" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['phone']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Телефон" required>
      </div>
    	<legend class="cart-table__form-legend">Адрес</legend>
      <div class="form__group">
        <label>Адрес доставки</label>
        <input name="address" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
" placeholder="Адрес доставки" />
      </div>
    	<legend class="cart-table__form-legend">Комментарий к&nbsp;заказу</legend>
      <div class="form__group">
        <label>Комментарий</label>
        <textarea class="cart-table__textarea" name="comment" id="order_comment" placeholder="Комментарий"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value, ENT_QUOTES, 'UTF-8', true);?>
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
        <input type="submit" name="checkout" class="btn captcha__btn" value="Оформить заказ">
      </div>
    </div>
  </form>
  <?php } else { ?>
   <p class="cart__absent">В корзине нет товаров</p>
  <?php }?>
</div>
<?php }} ?>
