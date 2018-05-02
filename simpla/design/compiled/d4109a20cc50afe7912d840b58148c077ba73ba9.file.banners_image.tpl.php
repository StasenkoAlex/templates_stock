<?php /* Smarty version Smarty-3.1.18, created on 2018-05-02 16:59:29
         compiled from "simpla\design\html\banners_image.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241425a098b5eb06915-74612181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4109a20cc50afe7912d840b58148c077ba73ba9' => 
    array (
      0 => 'simpla\\design\\html\\banners_image.tpl',
      1 => 1525269492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241425a098b5eb06915-74612181',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a098b5ebd6590_85535717',
  'variables' => 
  array (
    'banners_image' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'banners' => 0,
    'banner' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a098b5ebd6590_85535717')) {function content_5a098b5ebd6590_85535717($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=ThemeAdmin">Тема</a></li>
	<li><a href="index.php?module=TemplatesAdmin">Шаблоны</a></li>		
	<li><a href="index.php?module=StylesAdmin">Стили</a></li>		
	<li><a href="index.php?module=ImagesAdmin">Изображения</a></li>		
	
	<li class="active"><a href="index.php?module=BannersImagesAdmin">Баннера</a></li>
	
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['banners_image']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['banners_image']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Добавить баннер', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>





<script src="design/js/jquery/jquery.js"></script>
<script>
$(function() {

	// Удаление изображений
	$(".images a.delete").click( function() {
		$("input[name='delete_image']").val('1');
		$(this).closest("ul").fadeOut(200, function() { $(this).remove(); });
		return false;
	});
	  
});


</script>
 



<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Баннер добавлен<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Баннер обновлен<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['message_success']->value;?>
<?php }?></span>
	<?php if ($_GET['return']) {?>
	<a class="button" href="<?php echo $_GET['return'];?>
">Вернуться</a>
	<?php }?>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['message_error']->value) {?>
<!-- Системное сообщение -->
<div class="message message_error">
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<!-- Основная форма -->
<form method=post id=product enctype="multipart/form-data">
<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<div id="name">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banners_image']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['banners_image']->value->id;?>
"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" <?php if ($_smarty_tpl->tpl_vars['banners_image']->value->visible) {?>checked<?php }?>/> <label for="active_checkbox">Активен</label>
		</div>
	</div> 
	
	<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
	<div id="product_categories">
		<select name="banner_id">
			<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
				<option value='<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['banners_image']->value->banner_id==$_smarty_tpl->tpl_vars['banner']->value->id) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['banner']->value->name;?>
</option>
			<?php } ?>
		</select>
	</div>
	<?php }?>
		
	<!-- Левая колонка -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Параметры баннера</h2>
			<ul>
				<li><label class=property>Адрес(url)</label><input name="url" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banners_image']->value->url, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Alt</label><input name="alt" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banners_image']->value->alt, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Title</label><input name="title" class="simpla_inp" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banners_image']->value->title, ENT_QUOTES, 'UTF-8', true);?>
" /></li>
				<li><label class=property>Описание</label><textarea name="description" class="simpla_inp" /><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banners_image']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->
			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<!-- Правая колонка свойств товара -->	
	<div id="column_right">
		
		<!-- Изображение категории -->	
		<div class="block layer images">
			<h2>Изображение</h2>
			<input class='upload_image' name=image type=file>			
			<input type=hidden name="delete_image" value="">
			<?php if ($_smarty_tpl->tpl_vars['banners_image']->value->image) {?>
			<ul>
				<li>
					<a href='#' class="delete"><img src='design/images/cross-circle-frame.png'></a>
					<img src="../<?php echo $_smarty_tpl->tpl_vars['config']->value->banners_images_dir;?>
<?php echo $_smarty_tpl->tpl_vars['banners_image']->value->image;?>
" alt="" />
				</li>
			</ul>
			<?php }?>
		</div>
	</div>
	<!-- Правая колонка свойств товара (The End)--> 

	<!-- Описание категории (The End)-->
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

<?php }} ?>
