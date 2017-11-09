<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 14:58:00
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2638159ff6be1d08362-76675355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e4d4103e959eb7b4a980ac2d3fa9ac18b0cc90d' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\user.tpl',
      1 => 1510228598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2638159ff6be1d08362-76675355',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff6be234d9d5_80823832',
  'variables' => 
  array (
    'user' => 0,
    'error' => 0,
    'name' => 0,
    'email' => 0,
    'orders' => 0,
    'order' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff6be234d9d5_80823832')) {function content_59ff6be234d9d5_80823832($_smarty_tpl) {?>

	<div class="container-fluid container-fluid--grey">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="register__col">
          <span class="user__name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['user']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="message_error">
          <?php if ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>Введите имя
          <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_email') {?>Введите email
          <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_password') {?>Введите пароль
          <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='user_exists') {?>Пользователь с таким email уже зарегистрирован
          <?php } else { ?><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<?php }?>
        </div>
        <?php }?>
        <form class="user__form" method="post">
          <div class="form__group">
            <label for="user__name">Имя</label>
            <input id="user__name" data-format=".+" data-notice="Введите имя" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="name" maxlength="255" type="text"/>
          </div>
          <div class="form__group">
            <label for="user__mail">Email</label>
            <input id="user__mail" data-format="email" data-notice="Введите email" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="email" maxlength="255" type="text"/>
          </div>
          <a class="btn user__btn-password" href='#' onclick="$('.user__password').show();return false;">Изменить пароль</a>
          <input class="user__password" value="" name="password" type="password" style="display:none;"/>
          <input type="submit" class="btn user__btn-save" value="Сохранить">
        </form>
      </div>
      </div>
      
      <?php if ($_smarty_tpl->tpl_vars['orders']->value) {?>
      <div class="col-xs-12 col-sm-6">
        <div class="register__col">
          <p class="user__orders-title">Ваши заказы</p>
          <table class="user__orders-tables">
            <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
            <tr class="user__orders-item">
              <td class="user__orders-td user__orders-td--date"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['order']->value->date);?>
</td>
              <td class="user__orders-td"><a href='order/<?php echo $_smarty_tpl->tpl_vars['order']->value->url;?>
'>Заказ №<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</a></td>
              <td class="user__orders-td"><?php if ($_smarty_tpl->tpl_vars['order']->value->paid==1) {?>оплачен,<?php }?> 
                <?php if ($_smarty_tpl->tpl_vars['order']->value->status==0) {?>ждет обработки<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==1) {?>в обработке<?php } elseif ($_smarty_tpl->tpl_vars['order']->value->status==2) {?>выполнен<?php }?>
              </td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
      <?php }?>
    </div>
	</div>

<?php }} ?>
