<?php /* Smarty version Smarty-3.1.18, created on 2017-11-05 22:27:54
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\tiny-product__inner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1877559ff663adc8fe3-75329691%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9445c4dd2c150169c64cf7e2ec4f66224c5428a' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\tiny-product__inner.tpl',
      1 => 1508832004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1877559ff663adc8fe3-75329691',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff663ae52086_79662683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff663ae52086_79662683')) {function content_59ff663ae52086_79662683($_smarty_tpl) {?>
<div class="tiny-product__inner">
  <div class="tiny-product__row row">
    <?php if ($_smarty_tpl->tpl_vars['product']->value->featured) {?> <span class="tiny-product__label">hit</span> <?php }?>
    <!-- Фото товара -->
    <?php if ($_smarty_tpl->tpl_vars['product']->value->image) {?>
    <a class="tiny-product__image col-xs-6 col-sm-12" href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><img src="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['resize'][0][0]->resize_modifier($_smarty_tpl->tpl_vars['product']->value->image->filename,200,200);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['product']->value-htmlspecialchars('name', ENT_QUOTES, 'UTF-8', true);?>
"/></a>
    <?php }?>
    <!-- Фото товара (The End) -->

    <div class="tiny-product__info col-xs-6 col-sm-12">
      <!-- Название товара -->
      <div class="tiny-product__name"><a data-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" href="products/<?php echo $_smarty_tpl->tpl_vars['product']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a></div>
      <!-- Название товара (The End) -->

      <?php if (count($_smarty_tpl->tpl_vars['product']->value->variants)>0) {?>
      <!-- Выбор варианта товара -->
      <form class="tiny-product__cart js-add_cart" action="/cart">
       <input name="variant" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->variant->id;?>
" type="hidden"/>
       <div class="tiny-product__price">
        <?php if ($_smarty_tpl->tpl_vars['product']->value->variant->compare_price>0) {?>
        <span class="compare-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->compare_price);?>

          <span class="currency"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true);?>
</span>
        </span>
        <?php }?>
        <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convert'][0][0]->convert($_smarty_tpl->tpl_vars['product']->value->variant->price);?>
 
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


<?php }} ?>
