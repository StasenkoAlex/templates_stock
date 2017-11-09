<?php /* Smarty version Smarty-3.1.18, created on 2017-11-07 18:20:32
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\feedback.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1618359ff6e5d5dc608-88170356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dea5541d6d7244241dbda873dfeffa328652bc65' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\feedback.tpl',
      1 => 1510068010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1618359ff6e5d5dc608-88170356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff6e5d6c0a21_64280266',
  'variables' => 
  array (
    'page' => 0,
    'message_sent' => 0,
    'name' => 0,
    'error' => 0,
    'email' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff6e5d6c0a21_64280266')) {function content_59ff6e5d6c0a21_64280266($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\Work\\OSPanel\\domains\\test\\Smarty\\libs\\plugins\\function.math.php';
?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/".((string)$_smarty_tpl->tpl_vars['page']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>
<div class="container-fluid container-fluid--grey feedback">
	

  <div class="feedback__address col-sm-5 col-lg-4">
  	<h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
  	<?php echo $_smarty_tpl->tpl_vars['page']->value->body;?>

  </div>

  <?php if ($_smarty_tpl->tpl_vars['message_sent']->value) {?>  
  <div class="feedback__message modal__success feedback__form">
  	<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_checkbox",'width'=>"100px",'fill'=>"#12a4dd"), 0);?>

		<p class="modal__text"> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
, ваше сообщение отправлено.</p>
		<button class="btn modal__btn js-form__btn-close" onclick="$('.feedback__message').hide();">Ок</button>
	</div>
  <?php } else { ?>

  <form class="feedback__form col-sm-5 col-lg-4 js-form" method="post">
	  <legend class="feedback__form-ledend">Обратная связь</legend>
	  <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
	  <div class="message_error">
	  	<?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>
	  	Неверно введена капча
	  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
	  	Введите имя
	  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>
	  	Введите email
	  	<?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_text') {?>
	  	Введите сообщение
	  	<?php }?>
	  </div>
	  <?php }?>
	  <div class="form__group">
	  	<label>Имя</label>
	    <input data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="name" maxlength="255" minlength="2" type="text" required>
	  </div>
	  <div class="form__group">
	  	<label>Email</label>
	    <input data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="email" maxlength="255" type="text" required>
	  </div>
	  <div class="form__group">
	  	<label>Сообщение</label>
	    <textarea data-format=".+" data-notice="Введите сообщение" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="message" required><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true);?>
</textarea> 
	  </div>
	  <div class="captcha clearfix form__group">
	  	<img class="captcha__img" src="captcha/image.php?<?php echo smarty_function_math(array('equation'=>'rand(10,10000)'),$_smarty_tpl);?>
"/>
	  	<input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу">
	  </div> 
	   <input class="btn btn--send" type="submit" name="feedback" value="Отправить" />
  </form>
  <?php }?>
  <div class="feedback__map" id="map"></div>
</div>
<?php }} ?>
