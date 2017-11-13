<?php /* Smarty version Smarty-3.1.18, created on 2017-11-13 15:25:27
         compiled from "simpla\design\html\banner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21025a098f370b1705-27930346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'faccccb709b608c7984116b2eb26221605849656' => 
    array (
      0 => 'simpla\\design\\html\\banner.tpl',
      1 => 1409211096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21025a098f370b1705-27930346',
  'function' => 
  array (
    'category_select' => 
    array (
      'parameter' => 
      array (
        'level' => 0,
      ),
      'compiled' => '',
    ),
  ),
  'variables' => 
  array (
    'banner' => 0,
    'message_success' => 0,
    'message_error' => 0,
    'pages' => 0,
    'page' => 0,
    'brands' => 0,
    'brand' => 0,
    'categories' => 0,
    'category' => 0,
    'selected' => 0,
    'level' => 0,
    'products' => 0,
    'product' => 0,
    'otstup1' => 0,
    'otstup2' => 0,
    'otstup3' => 0,
    'otstup4' => 0,
    'otstup5' => 0,
  ),
  'has_nocache_code' => 0,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a098f372ed5d6_69877588',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a098f372ed5d6_69877588')) {function content_5a098f372ed5d6_69877588($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('tabs', null, null); ob_start(); ?>
	<li><a href="index.php?module=ThemeAdmin">Тема</a></li>
	<li><a href="index.php?module=TemplatesAdmin">Шаблоны</a></li>		
	<li><a href="index.php?module=StylesAdmin">Стили</a></li>		
	<li><a href="index.php?module=ImagesAdmin">Изображения</a></li>		
	<li><a href="index.php?module=BannersImagesAdmin">Баннера</a></li>
	<li class="active"><a href="index.php?module=BannersAdmin">Группы баннеров</a></li>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['banner']->value->id) {?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable($_smarty_tpl->tpl_vars['banner']->value->name, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Новая группа', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>
<?php }?>



<script src="design/js/jquery/jquery.js"></script>


<script>
$(function() {

	
});
</script>





<?php if ($_smarty_tpl->tpl_vars['message_success']->value) {?>
<!-- Системное сообщение -->
<div class="message message_success">
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_success']->value=='added') {?>Группа добавлена<?php } elseif ($_smarty_tpl->tpl_vars['message_success']->value=='updated') {?>Группа обновлена<?php }?></span>
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
	<span class="text"><?php if ($_smarty_tpl->tpl_vars['message_error']->value=='url_exists') {?>Страница с таким адресом уже существует<?php }?></span>
	<a class="button" href="">Вернуться</a>
</div>
<!-- Системное сообщение (The End)-->
<?php }?>

<!-- Основная форма -->
<form method=post id=product>
	<input type=hidden name="session_id" value="<?php echo $_SESSION['id'];?>
">
	<div id="name">
		<input class="name" name=name type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<input name=id type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->id, ENT_QUOTES, 'UTF-8', true);?>
"/> 
		<div class="checkbox">
			<input name=visible value='1' type="checkbox" id="active_checkbox" <?php if ($_smarty_tpl->tpl_vars['banner']->value->visible) {?>checked<?php }?>/> <label for="active_checkbox">Активна</label>
		</div>
	</div>

	<!-- Левая колонка свойств товара -->
	<div id="column_left">
			
		<!-- Параметры страницы -->
		<div class="block layer">
			<h2>Описание</h2>
			<ul>
				<li><textarea name="description" class="simpla_inp"/><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->description, ENT_QUOTES, 'UTF-8', true);?>
</textarea></li>
			</ul>
		</div>
		<!-- Параметры страницы (The End)-->		

			
	</div>
	<!-- Левая колонка свойств товара (The End)--> 
	
	<br />
		<div class="block layer">
			<table><tr><td valign="top"  style="padding:5px;">
				<h2>Баннер отображать на:</h2>				
				<input name="show_all_pages" value="1" type="checkbox" <?php if ($_smarty_tpl->tpl_vars['banner']->value->show_all_pages) {?>checked<?php }?> id="show_all_pages"/> <label for="show_all_pages" class="property" style="display:inline;float:none;color:black;">Показывать на всех страницах сайта</label>
				<br/><br/>
				<ul>
					<li>
						<label class=property>На страницах:</label>
						<select name="pages[]" multiple="multiple" size="10" style="width:450px;height:150px;">
							<option value='0' <?php if (!$_smarty_tpl->tpl_vars['banner']->value->page_selected||in_array(0,$_smarty_tpl->tpl_vars['banner']->value->page_selected)) {?>selected<?php }?>>Не показывать на страницах</option>
							<?php  $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['page']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['page']->key => $_smarty_tpl->tpl_vars['page']->value) {
$_smarty_tpl->tpl_vars['page']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['page']->value->name!='') {?><option value='<?php echo $_smarty_tpl->tpl_vars['page']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['banner']->value->page_selected&&in_array($_smarty_tpl->tpl_vars['page']->value->id,$_smarty_tpl->tpl_vars['banner']->value->page_selected)) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option><?php }?>
							<?php } ?>
						</select>
					</li>
					<li>
						<label class=property>В брендах:</label>
						<select name="brands[]" multiple="multiple" size="10" style="width:450px;height:150px;">
							<option value='0' <?php if (!$_smarty_tpl->tpl_vars['banner']->value->brand_selected||in_array(0,$_smarty_tpl->tpl_vars['banner']->value->brand_selected)) {?>selected<?php }?>>Не показывать в брендах</option>
							<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['brand']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['banner']->value->brand_selected&&in_array($_smarty_tpl->tpl_vars['brand']->value->id,$_smarty_tpl->tpl_vars['banner']->value->brand_selected)) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
							<?php } ?>
						</select>
					</li>
				</ul>
			</td><td valign="top" style="padding-top:75px; width:50%">
				<ul><li><label class=property>В категориях:</label>
				<select name="categories[]" multiple="multiple" size="10" style="width:450px;height:325px;">
					<option value='0' <?php if (!$_smarty_tpl->tpl_vars['banner']->value->category_selected||in_array(0,$_smarty_tpl->tpl_vars['banner']->value->category_selected)) {?>selected<?php }?>>Не показывать в категориях</option>
					<?php if (!function_exists('smarty_template_function_category_select')) {
    function smarty_template_function_category_select($_smarty_tpl,$params) {
    $saved_tpl_vars = $_smarty_tpl->tpl_vars;
    foreach ($_smarty_tpl->smarty->template_functions['category_select']['parameter'] as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);};
    foreach ($params as $key => $value) {$_smarty_tpl->tpl_vars[$key] = new Smarty_variable($value);}?>
						<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['category']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['selected']->value&&in_array($_smarty_tpl->tpl_vars['category']->value->id,$_smarty_tpl->tpl_vars['selected']->value)) {?>selected<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['name'] = 'sp';
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['level']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['sp']['total']);
?>&nbsp;&nbsp;&nbsp;&nbsp;<?php endfor; endif; ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
								<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['category']->value->subcategories,'selected'=>$_smarty_tpl->tpl_vars['banner']->value->category_selected,'level'=>$_smarty_tpl->tpl_vars['level']->value+1));?>

						<?php } ?>
					<?php $_smarty_tpl->tpl_vars = $saved_tpl_vars;
foreach (Smarty::$global_tpl_vars as $key => $value) if(!isset($_smarty_tpl->tpl_vars[$key])) $_smarty_tpl->tpl_vars[$key] = $value;}}?>

					<?php smarty_template_function_category_select($_smarty_tpl,array('categories'=>$_smarty_tpl->tpl_vars['categories']->value,'selected'=>$_smarty_tpl->tpl_vars['banner']->value->category_selected));?>

				</select></li></ul>
			</td></tr>
            <tr>
                <td valign="top" style="padding:5px;" colspan="2">
    				<ul><li><label class=property>В товарах:</label>
    				<select name="products[]" multiple="multiple" size="10" style="width:450px;height:325px;">
							<option value='0' <?php if (!$_smarty_tpl->tpl_vars['banner']->value->product_selected||in_array(0,$_smarty_tpl->tpl_vars['banner']->value->product_selected)) {?>selected<?php }?>>Не показывать в товарах</option>
							<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
' <?php if ($_smarty_tpl->tpl_vars['banner']->value->product_selected&&in_array($_smarty_tpl->tpl_vars['product']->value->id,$_smarty_tpl->tpl_vars['banner']->value->product_selected)) {?>selected<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</option>
							<?php } ?>
					</select></li></ul>
    			</td>
            </table>
		</div>
		<div class="block layer">
			<?php $_smarty_tpl->tpl_vars['otstup1'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;&nbsp;", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['otstup2'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['otstup3'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['otstup4'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['otstup5'] = new Smarty_variable("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", null, 0);?>
			Для того, чтобы вставить эту группу баннеров &mdash;<br>
			вставьте этот код в нужное Вам место в шаблоне<br><br>
			{get_banner var=banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
 group=<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
}<br>
			{if $banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
->items}<br>
				<?php echo $_smarty_tpl->tpl_vars['otstup1']->value;?>
&lt;div class="banner banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
"&gt;<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
{foreach $banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
->items as $bi}<br>
						<?php echo $_smarty_tpl->tpl_vars['otstup3']->value;?>
&lt;div&gt;<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{if $bi->url}<br>
								<?php echo $_smarty_tpl->tpl_vars['otstup5']->value;?>
&lt;a href="{$bi->url}" target="_blank"&gt;<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{/if}<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{if $bi->image}<br>
								<?php echo $_smarty_tpl->tpl_vars['otstup5']->value;?>
&lt;img src="{$config->banners_images_dir}{$bi->image}" alt="{$bi->alt}" title="{$bi->title}"&gt;<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{else}<br>
								<?php echo $_smarty_tpl->tpl_vars['otstup5']->value;?>
{$bi->description}<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{/if}<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{if $bi->url}<br>
								<?php echo $_smarty_tpl->tpl_vars['otstup5']->value;?>
&lt;/a&gt;<br>
							<?php echo $_smarty_tpl->tpl_vars['otstup4']->value;?>
{/if}<br>
						<?php echo $_smarty_tpl->tpl_vars['otstup3']->value;?>
&lt;/div&gt;<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
{/foreach}<br>
				<?php echo $_smarty_tpl->tpl_vars['otstup1']->value;?>
&lt;/div&gt;<br>
			{/if}<br>
		</div>
		<div class="block layer">
			Для того, чтобы баннеры сменялись &mdash; можно определить для группы слайдер<br>
			Для этого в папке с шаблоном в папке js в файле banners.js нужно вставить следующий скрипт:<br><br>
			if($('.banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
').size()){<br>
				<?php echo $_smarty_tpl->tpl_vars['otstup1']->value;?>
$('.banner<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
').bxSlider({<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
mode: 'horizontal',<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
speed: 500,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
adaptiveHeight: true,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
pager: true,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
controls: true,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
auto: false,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
pause: 3000,<br>
					<?php echo $_smarty_tpl->tpl_vars['otstup2']->value;?>
autoHover: false<br>
				<?php echo $_smarty_tpl->tpl_vars['otstup1']->value;?>
});<br>
			}<br><br>
			*В самом файле есть пример скрипта с описанием настроек
		</div>
	
	<input class="button_green button_save" type="submit" name="" value="Сохранить" />
	
</form>
<!-- Основная форма (The End) -->

<?php }} ?>
