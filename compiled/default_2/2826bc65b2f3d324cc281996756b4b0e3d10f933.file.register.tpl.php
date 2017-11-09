<?php /* Smarty version Smarty-3.1.18, created on 2017-11-08 22:20:13
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2161059ff6ad42ab1b5-69340938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2826bc65b2f3d324cc281996756b4b0e3d10f933' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\register.tpl',
      1 => 1510086297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2161059ff6ad42ab1b5-69340938',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff6ad4328851_70528717',
  'variables' => 
  array (
    'error' => 0,
    'name' => 0,
    'email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff6ad4328851_70528717')) {function content_59ff6ad4328851_70528717($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\Work\\OSPanel\\domains\\test\\Smarty\\libs\\plugins\\function.math.php';
?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/user/register", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable("Регистрация", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<div class="container-fluid container-fluid--grey">
	<div class="row">
		<div class="col-xs-12 col-sm-6 offset-sm-3 register__col">
			<h3 class="register__title">Регистрация</h3>
			<p class="register__text">Если Вы уже зарегистрированы, перейдите на страницу <a class="register__link" href="user/login">авторизации.</a></p>
			<form class="register__form js-form" method="post">
				  <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
				  <div class="message_error">
				  	<?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя
				  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email
				  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_password') {?>Введите пароль
				  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_exists') {?>Пользователь с таким email уже зарегистрирован
				  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>Неверно введена капча
				  	<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
				  </div>
				  <?php }?>
				  <div class="form__group">
				  	<label class="after" for="register__name">Имя</label>
					  <input type="text" id="register__name" name="name" data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" minlength="2" required>
				  </div>
				  <div class="form__group">
				  	<label class="after" for="register__mail">Email</label>
					  <input type="text" id="register__mail"  name="email" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" maxlength="255" required>
				  </div>
				  <div class="form__group">
				  	<label class="after" for="register__password">Пароль</label>
					  <input type="password" id="register__password" name="password" data-format=".+" data-notice="Введите пароль" value="" minlength="4" required>
				  </div>
				  <div class="container-flex container-flex--form form__group">
            <div class="captcha__container">  
              <label class="after" for="comment_captcha">Введите число</label>
              <div class="captcha">
                <img class="captcha__img" src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
" alt='captcha'/>
                <input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" required>
              </div>  
            </div>
            <input type="submit" class="btn register__btn captcha__btn" name="register" value="Зарегистрироваться">
        </div>
			</form>
			<div class="modal__success js-form__success">
				<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_checkbox",'width'=>"100px",'fill'=>"#12a4dd"), 0);?>

				<p class="modal__text">Регистрация прошла успешна!</p>
				<button class="btn modal__btn js-form__btn-close">Ок</button>
			</div>
		</div>
	</div>
</div>

		


<?php }} ?>
