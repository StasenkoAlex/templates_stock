<?php /* Smarty version Smarty-3.1.18, created on 2017-11-05 22:27:55
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\cart_informer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2621059ff663b7d4b57-83131342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46beab49a1ff1715e4d1de3e6541580c3323f868' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\cart_informer.tpl',
      1 => 1508850543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2621059ff663b7d4b57-83131342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff663b7fd2f0_59734773',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff663b7fd2f0_59734773')) {function content_59ff663b7fd2f0_59734773($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['cart']->value->total_products>0) {?>
	<a href="./cart/" class="cart">
	  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"26px",'height'=>"26px"), 0);?>

		<span class="cart__total"><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
</span>
		<span class="cart__price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>

	  </span>
	</a>
<?php } else { ?>
<span class="cart">
	  <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_cart",'width'=>"26px",'height'=>"26px"), 0);?>

		<span class="cart__total"><?php echo $_smarty_tpl->tpl_vars['cart']->value->total_products;?>
</span>
		<span class="cart__price">
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['cart']->value->total_price);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>

	  </span>
	</span>	
<?php }?>
<?php }} ?>
