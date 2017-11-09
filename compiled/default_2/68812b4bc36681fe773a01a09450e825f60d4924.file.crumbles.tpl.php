<?php /* Smarty version Smarty-3.1.18, created on 2017-11-05 22:29:01
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\crumbles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3160759ff667de47f36-42122878%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68812b4bc36681fe773a01a09450e825f60d4924' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\crumbles.tpl',
      1 => 1509370217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3160759ff667de47f36-42122878',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'keyword' => 0,
    'post' => 0,
    'category' => 0,
    'cat' => 0,
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff667e0118c1_62427149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff667e0118c1_62427149')) {function content_59ff667e0118c1_62427149($_smarty_tpl) {?><?php if ($_GET['module']=='ProductView'||($_GET['module']=='ProductsView'&&!$_smarty_tpl->tpl_vars['keyword']->value)||($_GET['module']=='BlogView'&&$_smarty_tpl->tpl_vars['post']->value)) {?><div class="crumbles"><span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumbles__link" itemprop="url" href="./"><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_home",'width'=>"17px",'height'=>"14px"), 0);?>
</a><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-right",'width'=>"8px",'height'=>"12px",'color'=>"#ccc"), 0);?>
</span><?php if ($_GET['module']=='ProductView') {?><?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
?><span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumbles__link" href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
" itemprop="url"><span itemprop="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></a><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-right",'width'=>"8px",'height'=>"12px",'color'=>"#ccc"), 0);?>
</span><?php } ?><span class="crumbles__last"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span><?php } elseif ($_GET['module']=='ProductsView'&&!$_smarty_tpl->tpl_vars['keyword']->value) {?><?php if ($_smarty_tpl->tpl_vars['category']->value) {?><?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->path; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['cat']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['cat']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
 $_smarty_tpl->tpl_vars['cat']->iteration++;
 $_smarty_tpl->tpl_vars['cat']->last = $_smarty_tpl->tpl_vars['cat']->iteration === $_smarty_tpl->tpl_vars['cat']->total;
?><?php if ($_smarty_tpl->tpl_vars['cat']->last) {?><span class="crumbles__last"><span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></span><?php } else { ?><span  class="crumbles__item"  itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumbles__link" itemprop="url" href="catalog/<?php echo $_smarty_tpl->tpl_vars['cat']->value->url;?>
"><span itemprop="title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cat']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span></a><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-right",'width'=>"8px",'height'=>"12px",'color'=>"#ccc"), 0);?>
</span><?php }?><?php } ?><?php }?><?php } elseif ($_GET['module']=='BlogView'&&$_smarty_tpl->tpl_vars['post']->value) {?><span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a class="crumbles__link" itemprop="url" href="blog"><span itemprop="title">Публикации</span></a><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-right",'width'=>"8px",'height'=>"12px",'color'=>"#ccc"), 0);?>
</span><span class="crumbles__last crumbles__item--active"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></div><?php }?><?php }} ?>
