<?php /* Smarty version Smarty-3.1.18, created on 2018-05-02 17:00:06
         compiled from "simpla\design\html\banners.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293205a098f27b25ec6-36306588%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64a004256e3fba682a92072a4468a9f742f7a0fa' => 
    array (
      0 => 'simpla\\design\\html\\banners.tpl',
      1 => 1525269492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293205a098f27b25ec6-36306588',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5a098f27bb4676_80972850',
  'variables' => 
  array (
    'banners' => 0,
    'banner' => 0,
    'level' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a098f27bb4676_80972850')) {function content_5a098f27bb4676_80972850($_smarty_tpl) {?>
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


<?php $_smarty_tpl->tpl_vars['meta_title'] = new Smarty_variable('Группы баннеров', null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['meta_title'] = clone $_smarty_tpl->tpl_vars['meta_title'];?>

<div class="banners_links">
	<a href="index.php?module=BannersImagesAdmin">Баннера</a>
	<a href="index.php?module=BannersAdmin" class="active">Группы баннеров</a>
</div>


<div id="header">
	<h1>Группы баннеров</h1>
	<a class="add" href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'BannerAdmin','return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
">Добавить группу</a>
</div>	
<!-- Заголовок (The End) -->

<?php if ($_smarty_tpl->tpl_vars['banners']->value) {?>
<div id="main_list" class="categories">

	<form id="list_form" method="post">
	<input type="hidden" name="session_id" value="<?php echo $_SESSION['id'];?>
">
		
		<div id="list" class="sortable">
			<?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['banners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
			<div class="<?php if (!$_smarty_tpl->tpl_vars['banner']->value->visible) {?>invisible<?php }?> row">		
				<div class="tree_row">
					<input type="hidden" name="positions[<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['banner']->value->position;?>
">
					<div class="move cell" style="margin-left:<?php echo $_smarty_tpl->tpl_vars['level']->value*20;?>
px"><div class="move_zone"></div></div>
					<div class="checkbox cell">
						<input type="checkbox" name="check[]" value="<?php echo $_smarty_tpl->tpl_vars['banner']->value->id;?>
" />				
					</div>
					<div class="cell">
						<a href="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0][0]->url_modifier(array('module'=>'BannerAdmin','id'=>$_smarty_tpl->tpl_vars['banner']->value->id,'return'=>$_SERVER['REQUEST_URI']),$_smarty_tpl);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</a> 	 			
					</div>
					<div class="icons cell">
						<a class="enable" title="Активна" href="#"></a>
						<a class="delete" title="Удалить" href="#"></a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<div id="action">
		<label id="check_all" class="dash_link">Выбрать все</label>
		
		<span id="select">
		<select name="action">
			<option value="enable">Сделать видимыми</option>
			<option value="disable">Сделать невидимыми</option>
			<option value="delete">Удалить</option>
		</select>
		</span>
		
		<input id="apply_action" class="button_green" type="submit" value="Применить">
		
		</div>
	
	</form>
</div>
<?php } else { ?>
Нет групп баннеров
<?php }?>


<script>
$(function() {

	// Сортировка списка
	$(".sortable").sortable({
		items:".row",
		handle: ".move_zone",
		tolerance:"pointer",
		scrollSensitivity:40,
		opacity:0.7, 
		axis: "y",
		update:function()
		{
			$("#list_form input[name*='check']").attr('checked', false);
			$("#list_form").ajaxSubmit();
		}
	});
 
	// Выделить все
	$("#check_all").click(function() {
		$('#list input[type="checkbox"][name*="check"]:not(:disabled)').attr('checked', $('#list input[type="checkbox"][name*="check"]:not(:disabled):not(:checked)').length>0);
	});	

	// Показать категорию
	$("a.enable").click(function() {
		var icon        = $(this);
		var line        = icon.closest(".row");
		var id          = line.find('input[type="checkbox"][name*="check"]').val();
		var state       = line.hasClass('invisible')?1:0;
		icon.addClass('loading_icon');
		$.ajax({
			type: 'POST',
			url: 'ajax/update_object.php',
			data: {'object': 'banner', 'id': id, 'values': {'visible': state}, 'session_id': '<?php echo $_SESSION['id'];?>
'},
			success: function(data){
				icon.removeClass('loading_icon');
				if(state)
					line.removeClass('invisible');
				else
					line.addClass('invisible');				
			},
			dataType: 'json'
		});	
		return false;	
	});

	// Удалить 
	$("a.delete").click(function() {
		$('#list input[type="checkbox"][name*="check"]').attr('checked', false);
		$(this).closest("div.row").find('input[type="checkbox"][name*="check"]:first').attr('checked', true);
		$(this).closest("form").find('select[name="action"] option[value=delete]').attr('selected', true);
		$(this).closest("form").submit();
	});

	
	// Подтвердить удаление
	$("form").submit(function() {
		if($('select[name="action"]').val()=='delete' && !confirm('Подтвердите удаление'))
			return false;	
	});

});
</script>

<link href="design/css/banners.css" rel="stylesheet" type="text/css" /><?php }} ?>
