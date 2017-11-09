<?php /* Smarty version Smarty-3.1.18, created on 2017-11-09 15:58:57
         compiled from "E:\Work\OSPanel\domains\test\design\default_2\html\post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:760959ff6683880c78-38687713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b926daff779d7a54c00b6cd0bd6e80f099202669' => 
    array (
      0 => 'E:\\Work\\OSPanel\\domains\\test\\design\\default_2\\html\\post.tpl',
      1 => 1510232335,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '760959ff6683880c78-38687713',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_59ff668396c8e4_55864911',
  'variables' => 
  array (
    'post' => 0,
    'comments' => 0,
    'prev_post' => 0,
    'next_post' => 0,
    'comment' => 0,
    'error' => 0,
    'comment_name' => 0,
    'comment_text' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59ff668396c8e4_55864911')) {function content_59ff668396c8e4_55864911($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'E:\\Work\\OSPanel\\domains\\test\\Smarty\\libs\\plugins\\function.math.php';
?>


<?php $_smarty_tpl->tpl_vars['canonical'] = new Smarty_variable("/blog/".((string)$_smarty_tpl->tpl_vars['post']->value->url), null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['canonical'] = clone $_smarty_tpl->tpl_vars['canonical'];?>

<div class="post">
  <div class="container-fluid container-fluid--grey post__crumbles">
  <!-- Заголовок /-->
   <?php echo $_smarty_tpl->getSubTemplate ('crumbles.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- Заголовок /-->
  </div>
  <div class="container">
  <h1 class="post__title" data-post="<?php echo $_smarty_tpl->tpl_vars['post']->value->id;?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['post']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
  <div class="post__item-info">
    <span class="post__item-date">
      <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_clock",'width'=>"16px",'height'=>"16px"), 0);?>

      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['post']->value->date);?>

    </span>
    <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
      <span class="post__item-commetns">
        <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_commetns",'width'=>"16px",'height'=>"16px"), 0);?>
 (<?php echo count($_smarty_tpl->tpl_vars['comments']->value);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['plural'][0][0]->plural_modifier(count($_smarty_tpl->tpl_vars['comments']->value),'комментарий','комментария');?>
)
      </span>
    <?php }?>
  </div>

  <div class="post__text">
    <!-- Тело поста /-->
    <?php echo $_smarty_tpl->tpl_vars['post']->value->text;?>

  </div>

  <!-- Соседние записи /-->
  <div class="post__back-forward clearfix">
    <?php if ($_smarty_tpl->tpl_vars['prev_post']->value) {?>
      <a class="post__prev-page-link" href="blog/<?php echo $_smarty_tpl->tpl_vars['prev_post']->value->url;?>
"><?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-left",'width'=>"10px",'height'=>"10px"), 0);?>
 <?php echo $_smarty_tpl->tpl_vars['prev_post']->value->name;?>
</a>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['next_post']->value) {?>
      <a class="post__next-page-link" href="blog/<?php echo $_smarty_tpl->tpl_vars['next_post']->value->url;?>
"><?php echo $_smarty_tpl->tpl_vars['next_post']->value->name;?>
<?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_arrow-right",'width'=>"10px",'height'=>"10px"), 0);?>
</a>
    <?php }?>
  </div>

  <div class="post__tabs  clearfix">
    <span class="post__tabs-left"> Комментарии </span>
    <!-- Комментарии -->
    <div class="comments post__comments">
      <?php if ($_smarty_tpl->tpl_vars['comments']->value) {?>
      <!-- Список с комментариями -->
      <ul class="comments__list">
        <?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
        <a name="comments__<?php echo $_smarty_tpl->tpl_vars['comment']->value->id;?>
"></a>
        <li class="comments__item">
          <!-- Имя и дата комментария-->
          <span class="comments__author"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->name, ENT_QUOTES, 'UTF-8', true);?>
 </span>
          <span class="comments__date">
            <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_clock",'width'=>"16px",'height'=>"16px"), 0);?>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['date'][0][0]->date_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>
, <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['time'][0][0]->time_modifier($_smarty_tpl->tpl_vars['comment']->value->date);?>

          </span>
          <?php if (!$_smarty_tpl->tpl_vars['comment']->value->approved) {?>ожидает модерации</b><?php }?>
          <!-- Имя и дата комментария (The End)-->
          <div class="comments__text">
          <!-- Комментарий -->
            <?php echo nl2br(htmlspecialchars($_smarty_tpl->tpl_vars['comment']->value->text, ENT_QUOTES, 'UTF-8', true));?>

           <!-- Комментарий (The End)-->
          </div>
        </li>
        <?php } ?>
      </ul>
      <!-- Список с комментариями (The End)-->
      <?php } else { ?>
      <p class="comments__absent">
        Пока комментариев нет
      </p>
      <?php }?>
          
      <p class="comments__form-title">Оставить комментарий</p>
      <!--Форма отправления комментария-->  
      <form class="comments__form comment_form js-form" method="post" action="">
        <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <div class="message_error">
          <?php if ($_smarty_tpl->tpl_vars['error']->value=='captcha') {?>
            Неверно введена капча
          <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_name') {?>
            Введите имя
          <?php } elseif ($_smarty_tpl->tpl_vars['error']->value=='empty_comment') {?>
            Введите комментарий
          <?php }?>
        </div>
        <?php }?>
        <div class="form__group">
          <label class="after" for="comment__name">Имя</label>
          <input class="name" type="text" id="comment__name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['comment_name']->value;?>
" data-format=".+" data-notice="Введитеимя" minlength="2" required>
        </div>
        <div class="form__group">
           <label class="after" for="comment__text">Ваш отзыв</label>
        <textarea class="comment__textarea" id="comment_text" name="text" data-format=".+" data-notice="Введите комментарий" required><?php echo $_smarty_tpl->tpl_vars['comment_text']->value;?>
</textarea>
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
          <input class="btn comment__btn captcha__btn" type="submit" name="comment" value="Отправить отзыв">
        </div>
      </form>
      <div class="modal__success js-form__success">
        <?php echo $_smarty_tpl->getSubTemplate ("svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('svgId'=>"ic_checkbox",'width'=>"100px",'fill'=>"#12a4dd"), 0);?>

        <p class="modal__text">Ваш комментарий принят в обработку</p>
        <button class="btn modal__btn js-form__btn-close">Ок</button>
      </div>
      <!--Форма отправления комментария (The End)-->
    </div>
    <!-- Комментарии (The End) -->
  </div>  
</div>
</div>
<?php }} ?>
