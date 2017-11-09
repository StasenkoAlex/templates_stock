<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 12:30:25
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\products.tpl" */ ?>
<?php /*%%SmartyHeaderCode:499359ff69301b5960-95547063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11f0b025a548d3578cece434160ebb5fd7c9e9ab' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\products.tpl',
      1 => 1510219823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '499359ff69301b5960-95547063',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff6930332bd7_48089813',
  'variables' => 
  array (
    'category' => 0,
    'brand' => 0,
    'keyword' => 0,
    'b' => 0,
    'current_page_num' => 0,
    'features' => 0,
    'f' => 0,
    'key' => 0,
    'o' => 0,
    'page' => 0,
    'products' => 0,
    'sort' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff6930332bd7_48089813')) {function content_59ff6930332bd7_48089813($_smarty_tpl) {?>


<?php if ($_smarty_tpl->tpl_vars['category']->value&&$_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url)."/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['category']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/catalog/".((string)$_smarty_tpl->tpl_vars['category']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['brand']->value) {?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/brands/".((string)$_smarty_tpl->tpl_vars['brand']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['keyword']->value) {?>
<?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products?keyword=".$_tmp1, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/products", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<?php }?>

<div class="container-fluid container-fluid--grey filter">
  <!-- Хлебные крошки /-->
    <?php echo $_smarty_tpl->getSubTemplate ("crumbles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- Хлебные крошки #End /-->


	<div class="row js-switch-container products">
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 filter-sidebar js-menu_sidebar js-switch-content" id="filter-sidebar">
      <button class="filter-sidebar__btn-close js-switch-close" type="button">
        <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_close",'fill'=>"#12a4dd",'width'=>"12px",'height'=>"22px"), 0);?>

      </button>
			
      <?php if ($_smarty_tpl->tpl_vars['category']->value->brands) {?>
      <div class="filter-brands">
        <h3 class="filter-title main-title">Бренды</h3>
        <div class="filter-brands__list">
      	  <a class="filter-brands__item <?php if (!$_smarty_tpl->tpl_vars['brand']->value->id) {?>selected<?php }?>" href="catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
" >Все бренды</a>
      	  <?php  $_smarty_tpl->tpl_vars['b'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->brands; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b']->key => $_smarty_tpl->tpl_vars['b']->value) {
$_smarty_tpl->tpl_vars['b']->_loop = true;
?>
          <?php if ($_smarty_tpl->tpl_vars['b']->value->image) {?>
      	  <a class="filter-brands__item" data-brand="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" href="catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['b']->value->url;?>
"></a>
      		<?php } else { ?>
      	  <a class="filter-brands__item <?php if ($_smarty_tpl->tpl_vars['b']->value->id==$_smarty_tpl->tpl_vars['brand']->value->id) {?>selected<?php }?>" data-brand="<?php echo $_smarty_tpl->tpl_vars['b']->value->id;?>
" href="catalog/<?php echo $_smarty_tpl->tpl_vars['category']->value->url;?>
/<?php echo $_smarty_tpl->tpl_vars['b']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
      	  <?php }?>
      	  <?php } ?>
        </div>
      </div>
      <?php }?>

      <?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>
      
      <?php echo $_smarty_tpl->tpl_vars['brand']->value->description;?>

      <?php }?>
      
      
      <?php if ($_smarty_tpl->tpl_vars['features']->value) {?>
      <div class="features">
      	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['f']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value) {
$_smarty_tpl->tpl_vars['f']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['f']->key;
?>
      	<div class="features__item">
      		<h3 class="features-title main-title" data-feature="<?php echo $_smarty_tpl->tpl_vars['f']->value->id;?>
">
      		  <?php echo $_smarty_tpl->tpl_vars['f']->value->name;?>

      	  </h3>
      	  <div class="features__values">
      	  	<a class="features__values-link <?php if (!$_GET[$_smarty_tpl->tpl_vars['key']->value]) {?>selected<?php }?>"  href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->tpl_vars['f']->value->id=>null,'page'=>null)),$_smarty_tpl);?>
">Все</a>
      	  	<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['o']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['f']->value->options; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->_loop = true;
?>
		        <a class="features__values-link <?php if ($_GET[$_smarty_tpl->tpl_vars['key']->value]==$_smarty_tpl->tpl_vars['o']->value->value) {?>selected<?php }?>" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('params'=>array($_smarty_tpl->tpl_vars['f']->value->id=>$_smarty_tpl->tpl_vars['o']->value->value,'page'=>null)),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['o']->value->value, ENT_QUOTES, 'UTF-8', true);?>
</a>
      	  	<?php } ?>
      	  </div>
      	</div>
      	<?php } ?>
      </div>
      <?php }?>
		</div>

		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
		
    <?php if ($_smarty_tpl->tpl_vars['keyword']->value) {?>
    <h1 class="products__title">Поиск <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['keyword']->value, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php } elseif ($_smarty_tpl->tpl_vars['page']->value) {?>
    <h1 class="products__title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php } else { ?>
    <h1 class="products__title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
    <?php }?>

    <!--Каталог товаров-->
    <?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
    
    
    <?php if (count($_smarty_tpl->tpl_vars['products']->value)>0) {?>
    <div class="sort">
    	<span class="sort__title">Сортировать по: </span> 
      <select class="sort__list"  onchange="location = $('.sort__link:selected').data('href');">
        <option class="sort__link" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='position') {?>selected<?php }?> data-href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'position','page'=>null),$_smarty_tpl);?>
">умолчанию</option>
        <option class="sort__link" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='price') {?>selected<?php }?>  data-href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'price','page'=>null),$_smarty_tpl);?>
">цене</option>
        <option class="sort__link" <?php if ($_smarty_tpl->tpl_vars['sort']->value=='name') {?>selected<?php }?>  data-href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('sort'=>'name','page'=>null),$_smarty_tpl);?>
">названию</option>
      </select>   	 
    </div>
    <?php }?>
     <button class="btn filter-sidebar__btn-open js-switch-link" type="button" data-target="filter-sidebar" data-close_outside="true">Фильтр</button>
    
   
    <div class="products__grid">
    	<div class="row row--flex">
    		<!-- Список товаров-->
        	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 products__item">
        	<!-- Товар-->
        	<?php echo $_smarty_tpl->getSubTemplate ("tiny-product__inner.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        	<!-- Товар (The End)-->
        	</div>
        	<?php } ?>		
       
        <!-- Список товаров (The End)-->
    	</div>
    </div>
    <?php } else { ?>
    <p class="products__absent">Товары не найдены</p>
    <?php }?>

     <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
	
    <!--Каталог товаров (The End)-->
    </div>
	</div>
</div>


<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>


<?php if ($_smarty_tpl->tpl_vars['current_page_num']->value==1) {?>

<?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>

<?php }?><?php }} ?>
