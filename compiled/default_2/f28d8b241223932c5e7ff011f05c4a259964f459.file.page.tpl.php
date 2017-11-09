<?php /* Smarty version Smarty-3.1.18, created on 2017-11-07 15:45:32
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:151825a005484574a01-85877522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f28d8b241223932c5e7ff011f05c4a259964f459' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\page.tpl',
      1 => 1510058725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151825a005484574a01-85877522',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a0054845ea386_67475733',
  'variables' => 
  array (
    'page' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0054845ea386_67475733')) {function content_5a0054845ea386_67475733($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<!-- Заголовок страницы -->
<h1 class="page__title" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->header, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<div class="container">
	<div class="user-text">
    <!-- Тело страницы -->
      <?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

  </div>
</div>

<?php }} ?>
