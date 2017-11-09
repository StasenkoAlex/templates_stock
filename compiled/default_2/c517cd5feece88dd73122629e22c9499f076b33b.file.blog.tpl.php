<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 10:59:17
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\blog.tpl" */ ?>
<?php /*%%SmartyHeaderCode:651859ff667dd01410-73677620%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c517cd5feece88dd73122629e22c9499f076b33b' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\blog.tpl',
      1 => 1510214353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '651859ff667dd01410-73677620',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff667ddb6bb8_52463044',
  'variables' => 
  array (
    'page' => 0,
    'posts' => 0,
    'post' => 0,
    'comments' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff667ddb6bb8_52463044')) {function content_59ff667ddb6bb8_52463044($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/blog", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<div class="blog">
  <div class="container">
  <!-- Заголовок /-->
  <?php echo $_smarty_tpl->getSubTemplate ('crumbles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <h1 class="blog__title"><?php echo $_smarty_tpl->tpl_vars['page']->value->name;?>
</h1>
    <?php echo $_smarty_tpl->getSubTemplate ('crumbles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- Статьи /-->
    <ul class="blog__list">
      <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
      <li class="blog__item">
        <h3 class="blog__item-title">
          <a data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
" href="blog/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a>
        </h3>
        <div class="blog__item-info">
          <span class="blog__item-date">
            <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_clock",'width'=>"16px",'height'=>"16px"), 0);?>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>

          </span>
          <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
          <span class="blog__item-commetns">
            <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_commetns",'width'=>"16px",'height'=>"16px"), 0);?>
<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>

          </span>
          <?php }?>
        </div>
        <div class="blog__item-annotation"><?php echo $_smarty_tpl->tpl_vars['post']->value->annotation;?>
</div>
        <a data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
" href="blog/<?php echo $_smarty_tpl->tpl_vars['post']->value->url;?>
" class="btn blog__item-btn">Прочесть статью</a>
      </li>
      <?php } ?>
    </ul>
  <!-- Статьи #End /-->    
  <?php echo $_smarty_tpl->getSubTemplate ('pagination.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  </div>        
</div>
<?php }} ?>
