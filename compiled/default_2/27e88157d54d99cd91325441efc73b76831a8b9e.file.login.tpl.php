<?php /* Smarty version Smarty-3.1.18, created on 2017-11-07 18:24:19
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1968559ff6acc2a9241-60796415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27e88157d54d99cd91325441efc73b76831a8b9e' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\login.tpl',
      1 => 1510067273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1968559ff6acc2a9241-60796415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff6acc313ed2_31064296',
  'variables' => 
  array (
    'error' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff6acc313ed2_31064296')) {function content_59ff6acc313ed2_31064296($_smarty_tpl) {?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/login", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Вход", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<div class="section--dark login">
	<div class="container-fluid">
	<div class="row">
		<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
		<div class="message_error">
			<?php if ($_smarty_tpl->tpl_vars['error']->value=='login_incorrect') {?>Неверный логин или пароль
			<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_disabled') {?>Ваш аккаунт еще не активирован.
			<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
		</div>
		<?php }?>
		<div class="col-md-6">
			<div class="login__col">
				<p class="login__col-title">Новый клиент</p>
				<b class="login__col-title_strong">Регистрация</b>
				<p class="login__col-text">Создание учетной записи поможет покупать быстрее. Вы сможете контролировать состояние заказа, а также просматривать заказы сделанные ранее. Вы сможете накапливать призовые баллы и получать скидочные купоны.<br>
				А постоянным покупателям мы предлагаем гибкую систему скидок и персональное обслуживание.</p>
				<a href="user/register" class="btn">Продолжить</a>
			</div>
		</div>
		<div class="col-md-6">
			<div class="login__col">
				<p class="login__col-title">Зарегистрированный клиент</p>
				<b class="login__col-title_strong">Войти в личный кабинет</b>
				<form class="login__form js-form" method="post">
					<div class="form__group">
						<label for="login_email">Email</label>
					  <input id="login_email" type="text" name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" required>
					</div>
					<div class="form__group">
						<label for="login_password">Пароль</label>
					  <input id="login_password" type="password" name="password" data-format=".+" data-notice="Введите пароль" value="" required>
					</div>
					<a class="login__remaind" href="user/password_remind">Забыли пароль?</a>
					<input type="submit" class="btn" name="login" value="Войти">
				</form>
			</div>
		</div>
	</div>
</div>
</div>


<?php }} ?>
