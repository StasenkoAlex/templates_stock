<?php /* Smarty version Smarty-3.1.18, created on 2017-11-06 11:12:01
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:255065a00118c457184-41283709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27fbd9863636d6f00cf5c1add0c7c8ebaf42fdb1' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\order.tpl',
      1 => 1509955918,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '255065a00118c457184-41283709',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a00118c6835c6_71236356',
  'variables' => 
  array (
    'order' => 0,
    'purchases' => 0,
    'purchase' => 0,
    'image' => 0,
    'product' => 0,
    'currency' => 0,
    'settings' => 0,
    'delivery' => 0,
    'payment_methods' => 0,
    'payment_method' => 0,
    'all_currencies' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a00118c6835c6_71236356')) {function content_5a00118c6835c6_71236356($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Ваш заказ №".((string)$_smarty_tpl->tpl_vars['order']->value->id), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<div class="container-fluid container-fluid--grey">
<h1 class="order__title">Ваш заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
 
<?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>принят<?php }?>
<?php if ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>
<?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>, оплачен<?php } else { ?><?php }?>
</h1>


<table id="purchases" class="order__table">

<?php  $_smarty_tpl->tpl_vars['purchase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['purchase']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['purchases']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['purchase']->key => $_smarty_tpl->tpl_vars['purchase']->value) {
$_smarty_tpl->tpl_vars['purchase']->_loop = true;
?>
<tr class="order__table-row clearfix">
	
	<td class="order__table-image">
		<?php $_smarty_tpl->tpl_vars['image'] = new Smarty_variable($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['first'][0][0]->first_modifier($_smarty_tpl->tpl_vars['purchase']->value->product->images), null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
		<a href="products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['image']->value->filename,50,50);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"></a>
		<?php }?>
	</td>
	
	
	<td class="order__table-name">
		<a class="order__table-name-link" href="/products/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->product->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->product_name, ENT_QUOTES, 'UTF-8', true);?>
</a>
		<span class="order__table-name-variant"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['purchase']->value->variant_name, ENT_QUOTES, 'UTF-8', true);?>
</span>
		<?php if ($_smarty_tpl->tpl_vars['order']->value->paid&&$_smarty_tpl->tpl_vars['purchase']->value->variant->attachment) {?>
			<a class="download_attachment" href="order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['purchase']->value->variant->attachment;?>
">скачать файл</a>
		<?php }?>
	</td>

	
	<td class="order__table-price-equal">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	</td>

	
	<td class="order__table-amount">
		&times; <?php echo $_smarty_tpl->tpl_vars['purchase']->value->amount;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['settings']->value->units;?>

	</td>

	
	<td class="order__table-price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert(($_smarty_tpl->tpl_vars['purchase']->value->price*$_smarty_tpl->tpl_vars['purchase']->value->amount));?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>

	</td>
</tr>
<?php } ?>
</table>

<div class="row">
	<div class="col-sm-6 offset-sm-6 col-md-5 offset-md-7 clearfix">
		<table class="order__total-price">
			
      <?php if ($_smarty_tpl->tpl_vars['order']->value->discount>0) {?>
	    <tr>
		    <td class="order__total-price-name">Дисконт</td>
		    <td class="order__total-price-data"><?php echo $_smarty_tpl->tpl_vars['order']->value->discount;?>
&nbsp;%</td>
	    </tr>
      <?php }?>
      
      <?php if ($_smarty_tpl->tpl_vars['order']->value->coupon_discount>0) {?>
	    <tr>
		    <td class="order__total-price-name">Купон</td>
		    <td class="order__total-price-data">&minus;<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->coupon_discount);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
	    </tr>
	    <?php }?>
	    
      <?php if (!$_smarty_tpl->tpl_vars['order']->value->separate_delivery&&$_smarty_tpl->tpl_vars['order']->value->delivery_price>0) {?>
      <tr>
     	  <td class="order__total-price-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['delivery']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</td>
		    <td class="order__total-price-data"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->delivery_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
	    </tr>
	    <?php }?>
	    
      <tr>
     	  <td class="order__total-price-name">Итого</td>
		    <td class="order__total-price-data"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
	    </tr>
	    
      <?php if ($_smarty_tpl->tpl_vars['order']->value->separate_delivery) {?>
      <tr>
	      <td class="order__total-price-name">Итого</td>
		    <td class="order__total-price-data"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->delivery_price);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['currency']->value->sign;?>
</td>
		  </tr>
      <?php }?>
    </table>
	</div>
</div>


<h2 class="order__title order__title--min">Детали заказа</h2>
<table class="order__table-info">
	<tr>
		<td class="order__total-price-name">
			Дата заказа
		</td>
		<td class="order__total-price-data">
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
 в
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>

		</td>
	</tr>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->name) {?>
	<tr>
		<td class="order__total-price-name">
			Имя
		</td>
		<td class="order__total-price-data">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->name, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->email) {?>
	<tr>
		<td class="order__total-price-name">
			Email
		</td>
		<td class="order__total-price-data">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->email, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->phone) {?>
	<tr>
		<td class="order__total-price-name">
			Телефон
		</td>
		<td class="order__total-price-data">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->phone, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->address) {?>
	<tr>
		<td class="order__total-price-name">
			Адрес доставки
		</td>
		<td class="order__total-price-data">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->address, ENT_QUOTES, 'UTF-8', true);?>

		</td>
	</tr>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['order']->value->comment) {?>
	<tr>
		<td class="order__total-price-name">
			Комментарий
		</td>
		<td class="order__total-price-data">
			<?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->comment, ENT_QUOTES, 'UTF-8', true));?>

		</td>
	</tr>
	<?php }?>
</table>


<?php if (!$_smarty_tpl->tpl_vars['order']->value->paid) {?>

<?php if ($_smarty_tpl->tpl_vars['payment_methods']->value&&!$_smarty_tpl->tpl_vars['payment_method']->value&&$_smarty_tpl->tpl_vars['order']->value->total_price>0) {?>
<form method="post" class="order__paid-form">
	<legend class="order__paid__form-legend">Выберите способ оплаты</legend>
  <ul class="order__paid-list">
    <?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['payment_method']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['payment_method']->index++;
 $_smarty_tpl->tpl_vars['payment_method']->first = $_smarty_tpl->tpl_vars['payment_method']->index === 0;
?>
    	<li class="order__paid-checkbox">
    		<input type=radio name=payment_method_id value='<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['payment_method']->first) {?>checked<?php }?> id=payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
>			
		    <label class="order__paid-label" for=payment_<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->id;?>
>	<?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>
, к оплате <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['payment_method']->value->currency_id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['all_currencies']->value[$_smarty_tpl->tpl_vars['payment_method']->value->currency_id]->sign;?>
</label>
			  <div class="order__paid-description">
			    <?php echo $_smarty_tpl->tpl_vars['payment_method']->value->description;?>

			  </div>
    	</li>
    <?php } ?>
</ul>
<input type='submit' class="btn order__paid-btn" value='Завершить оформление'>
</form>

	
  <?php } elseif ($_smarty_tpl->tpl_vars['payment_method']->value) {?>
<div class="order__payment-method">
  <h3 class="order__payment-method-title">Способ оплаты &mdash; <?php echo $_smarty_tpl->tpl_vars['payment_method']->value->name;?>
</h3>
  <p><?php echo $_smarty_tpl->tpl_vars['payment_method']->value->description;?>
</p>
  <h2 class="order__payment-method-title">
    К оплате <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['order']->value->total_price,$_smarty_tpl->tpl_vars['payment_method']->value->currency_id);?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['all_currencies']->value[$_smarty_tpl->tpl_vars['payment_method']->value->currency_id]->sign;?>

  </h2>
  <form method=post>
	  <input class="btn" type=submit name='reset_payment_method' value='Выбрать другой способ оплаты'>
  </form>	
  <div class="order__payment-method-form">
  	
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['checkout_form'][0][0]->checkout_form(array('order_id'=>$_smarty_tpl->tpl_vars['order']->value->id,'module'=>$_smarty_tpl->tpl_vars['payment_method']->value->module),$_smarty_tpl);?>

  </div>
  <?php }?>
</div>
<?php }?>
</div>

 <?php }} ?>
