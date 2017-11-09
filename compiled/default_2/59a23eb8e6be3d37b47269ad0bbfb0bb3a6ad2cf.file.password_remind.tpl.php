<?php /* Smarty version Smarty-3.1.18, created on 2017-11-07 18:24:23
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\password_remind.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188945a01d027d49484-41953609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59a23eb8e6be3d37b47269ad0bbfb0bb3a6ad2cf' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\password_remind.tpl',
      1 => 1509711552,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188945a01d027d49484-41953609',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email_sent' => 0,
    'email' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a01d027d9f364_25654022',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a01d027d9f364_25654022')) {function content_5a01d027d9f364_25654022($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/password_remind", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<div class="container-fluid container-fluid--grey">
	<div class="row">
		<div class="col-xs-12 col-sm-6  offset-sm-3 remind__col">
			<?php if ($_smarty_tpl->tpl_vars['email_sent']->value) {?>
      <h1 class="remind__title">Вам отправлено письмо</h1>
      <p class="remind__text">На <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
 отправлено письмо для восстановления пароля.</p>
      <?php } else { ?>
      <h1 class="remind__title">Напоминание пароля</h1>
        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="message_error">
	        <?php if ($_smarty_tpl->tpl_vars['error']->value=='user_not_found') {?>Пользователь не найден
	        <?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
        </div>
        <?php }?>
			<form class="remind__form js-form" method="post">
	      <label class="after" for="remind__email">Введите email, который вы указывали при регистрации</label>
	      <input type="text" id="remind__email" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
"  maxlength="255"/>
	      <input type="submit" class="btn remind__btn" value="Вспомнить" />
      </form>
    <?php }?>
		</div>
	</div>
</div>


<?php }} ?>
