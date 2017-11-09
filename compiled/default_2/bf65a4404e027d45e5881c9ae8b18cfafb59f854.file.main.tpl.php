<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 11:08:04
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2939859ff663abeb1f1-91905238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf65a4404e027d45e5881c9ae8b18cfafb59f854' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\main.tpl',
      1 => 1510214166,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2939859ff663abeb1f1-91905238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff663aceeb47_63452793',
  'variables' => 
  array (
    'featured_products' => 0,
    'new_products' => 0,
    'discounted_products' => 0,
    'all_brands' => 0,
    'brand' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff663aceeb47_63452793')) {function content_59ff663aceeb47_63452793($_smarty_tpl) {?>



<?php $_smarty_tpl->tpl_vars['wrapper'] = new Smarty_variable('index.tpl', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['wrapper'] = clone $_smarty_tpl->tpl_vars['wrapper'];?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable('', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>



<section class="section section--dark">
  <div class="container-fluid">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_featured_products'][0][0]->get_featured_products_plugin(array('var'=>'featured_products'),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['featured_products']->value) {?>
    <!-- Список товаров-->
    <div class="main__products-section">
      <h1 class="main__products-title">Рекомендуемые</h1>
      <div class="main__products-slider row row--flex js-products-slider">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          <?php echo $_smarty_tpl->getSubTemplate ("tiny-product__inner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <!-- Товар (The End)-->
        <?php } ?>
      </div>
    <?php }?>
    </div>
  </div>
</section>





<section class="section">
  <div class="container-fluid">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_new_products'][0][0]->get_new_products_plugin(array('var'=>'new_products','limit'=>5),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['new_products']->value) {?>
    <div class="main__products-section">
      <h1 class="main__products-title">Новинки</h1>
      <!-- Список товаров-->
      <div class="main__products-slider main__products-slider--light row row--flex js-products-slider">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          <?php echo $_smarty_tpl->getSubTemplate ("tiny-product__inner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <!-- Товар (The End)-->
        <?php } ?>
      </div>
      <?php }?> 
    </div>
  </div>
</section>




<section class="section section--dark">
  <div class="container-fluid">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_discounted_products'][0][0]->get_discounted_products_plugin(array('var'=>'discounted_products','limit'=>9),$_smarty_tpl);?>

    <?php if ($_smarty_tpl->tpl_vars['discounted_products']->value) {?>
    <div class="main__products-section">
      <h1 class="main__products-title">Акционные товары</h1>
      <!-- Список товаров-->
      <div class="main__products-slider row row--flex js-products-slider">
  
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounted_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          <?php echo $_smarty_tpl->getSubTemplate ("tiny-product__inner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <!-- Товар (The End)-->
        <?php } ?>
      </div>
      <?php }?>
    </div>
  </div>
</section>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['get_brands'][0][0]->get_brands_plugin(array('var'=>'all_brands','limit'=>5),$_smarty_tpl);?>

<section class="brands">
  <div class="container-fluid">
    <h1 class="brands__title">Популярные бренды</h1>
    <?php if ($_smarty_tpl->tpl_vars['all_brands']->value) {?>
    <ul class="brands__list js-brands_slider">
      <?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['all_brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
      <li class="brands__item">
        <a class="brands__link" href="<?php echo $_smarty_tpl->tpl_vars['brand']->value->url;?>
">
          <?php if ($_smarty_tpl->tpl_vars['brand']->value->image) {?>
          <img class="brands__img" src="files/brands/<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>
">
          <?php } else { ?>
          <?php echo $_smarty_tpl->tpl_vars['brand']->value->name;?>

          <?php }?>
        </a>
      </li>
      <?php } ?>
    </ul>
    <?php }?>
  </div>
</section>


<section class="seo">
  <div class="container">
    <?php if ($_smarty_tpl->tpl_vars['page']->value->body) {?>
      
        <h1 class="seo__title"><?php echo $_smarty_tpl->tpl_vars['page']->value->header;?>
</h1>
      
      <?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

    <?php }?>
  </div>
</section>


<?php }} ?>
