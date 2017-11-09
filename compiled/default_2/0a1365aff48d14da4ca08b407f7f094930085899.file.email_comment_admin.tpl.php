<?php /* Smarty version Smarty-3.1.18, created on 2017-11-05 22:37:51
         compiled from "E:\Work\OSPanel\domains\test\simpla\design\html\email_comment_admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2695159ff688f1bd310-08732533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1365aff48d14da4ca08b407f7f094930085899' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\simpla\\design\\html\\email_comment_admin.tpl',
      1 => 1492708202,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2695159ff688f1bd310-08732533',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comment' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff688f2762f5_17578258',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff688f2762f5_17578258')) {function content_59ff688f2762f5_17578258($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['comment']->value->approved) {?>
<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Новый комментарий от ".((string)htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true)), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<?php } else { ?>
<?php $_smarty_tpl->tpl_vars['subject'] = new Smarty_variable("Комментарий от ".((string)htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true))." ожидает одобрения", null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['subject'] = clone $_smarty_tpl->tpl_vars['subject'];?>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['comment']->value->approved) {?>
<h1 style="font-weight:normal;font-family:arial;"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/simpla/index.php?module=CommentsAdmin">Новый комментарий</a> от <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
<?php } else { ?>
<h1 style="font-weight:normal;font-family:arial;"><a href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/simpla/index.php?module=CommentsAdmin">Комментарий</a> от <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 ожидает одобрения</h1>
<?php }?>

<table cellpadding="6" cellspacing="0" style="border-collapse: collapse;">
  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Имя
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>

    </td>
  </tr>
  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Комментарий
    </td>
    <td style="padding:6px; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->text, ENT_QUOTES, 'UTF-8', true));?>

    </td>
  </tr>
  <tr>
    <td style="padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Время
    </td>
    <td style="padding:6px; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>

    </td>
  </tr>
  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      Статус
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php if ($_smarty_tpl->tpl_vars['comment']->value->approved) {?>
        Одобрен    
      <?php } else { ?>
        Ожидает одобрения
      <?php }?>
    </td>
  </tr>
<tr>
  <td style='padding:6px; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;'>
    IP
  </td>
  <td style='padding:6px; width:170; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;'>
    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->ip, ENT_QUOTES, 'UTF-8', true);?>
 (<a href='http://www.ip-adress.com/ip_tracer/<?php echo $_smarty_tpl->tpl_vars['comment']->value->ip;?>
/'>где это?</a>)
  </td>
  </tr>
  <tr>
    <td style="padding:6px; width:170; background-color:#f0f0f0; border:1px solid #e0e0e0;font-family:arial;">
      <?php if ($_smarty_tpl->tpl_vars['comment']->value->type=='product') {?>К товару<?php }?>
      <?php if ($_smarty_tpl->tpl_vars['comment']->value->type=='blog') {?>К записи<?php }?>
    </td>
    <td style="padding:6px; width:330; background-color:#ffffff; border:1px solid #e0e0e0;font-family:arial;">
      <?php if ($_smarty_tpl->tpl_vars['comment']->value->type=='product') {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/products/<?php echo $_smarty_tpl->tpl_vars['comment']->value->product->url;?>
#comment_<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value->product->name;?>
</a><?php }?>
      <?php if ($_smarty_tpl->tpl_vars['comment']->value->type=='blog') {?><a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['config']->value->root_url;?>
/blog/<?php echo $_smarty_tpl->tpl_vars['comment']->value->post->url;?>
#comment_<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['comment']->value->post->name;?>
</a><?php }?>
    </td>
  </tr>
</table>
<br><br>
Приятной работы с <a href='http://simp.la'>Simpla</a>!<?php }} ?>
