{* Страница отдельной записи блога *}
{* Канонический адрес страницы *}
{$canonical="/blog/{$post->url}" scope=parent}
<div class="post">
  <div class="container-fluid container-fluid--grey post__crumbles">
    <!-- Заголовок /-->
    {include file='crumbles.tpl'}
    <!-- Заголовок /-->
  </div>

  <div class="container">
      <div class="post__image" data-post="{$post->id}" {if $post->image}style="background-image: url({$post->image|resize:1150:650:false:$config->resized_blog_dir});"{/if}>
    <div class="container post__data">
      <h2 class="post__title" data-post="{$post->id}">{$post->name|escape}</h2>
      <time class="post__date" datetime="{$post->date}">
      {include file="svg.tpl" svgId="ic_calendar" width="15px"}
      {$post->date|date}
      </time>
    </div>
  </div>
    <div class="user_content post__user-content">
      {$post->text}
    </div>
    <!-- Соседние записи /-->
    <div class="post__siblings clearfix">
      <div class="post__siblings-title">Соседние публикации</div>
      {if $prev_post}
      <a class="post__siblings-link post__siblings-link--prev" href="blog/{$prev_post->url}">{include file="svg.tpl" svgId="ic_arrow-left" width="10px" height="10px"} {$prev_post->name}</a>
      {/if}
      {if $next_post}
      <a class="post__siblings-link post__siblings-link--next" href="blog/{$next_post->url}">{$next_post->name}{include file="svg.tpl" svgId="ic_arrow-right" width="10px" height="10px"}</a>
      {/if}
    </div>
    <div class="post__comments">
      <div class="post__comments-title">Комментарии</div>
      <!-- Комментарии -->
      <div class="comments">
        {if $comments}
        <!-- Список с комментариями -->
        <ul class="comments__list">
          {foreach $comments as $comment}
          <a name="comments__{$comment->id}"></a>
          <li class="comments__item">
            <!-- Имя и дата комментария-->
            <span class="comments__author">{$comment->name|escape} </span>
            <span class="comments__date">
              {include file="svg.tpl" svgId="ic_clock" width="16px" height="16px"}
              {$comment->date|date}, {$comment->date|time}
            </span>
            {if !$comment->approved}ожидает модерации</b>{/if}
            <!-- Имя и дата комментария (The End)-->
            <div class="comments__text">
              <!-- Комментарий -->
              {$comment->text|escape|nl2br}
              <!-- Комментарий (The End)-->
            </div>
          </li>
          {/foreach}
        </ul>
        <!-- Список с комментариями (The End)-->
        {else}
        <p class="comments__absent">
          Пока комментариев нет
        </p>
        {/if}
        
        <p class="comments__form-title">Оставить комментарий</p>
        <!--Форма отправления комментария-->
        <form class="comments__form comment_form js-form" method="post" action="">
          {if $error}
          <div class="message_error">
            {if $error=='captcha'}
            Неверно введена капча
            {elseif $error=='empty_name'}
            Введите имя
            {elseif $error=='empty_comment'}
            Введите комментарий
            {/if}
          </div>
          {/if}
          <div class="form__group">
            <label class="after" for="comment__name">Имя</label>
            <input class="name" type="text" id="comment__name" name="name" value="{$comment_name}" data-format=".+" data-notice="Введитеимя" minlength="2" required>
          </div>
          <div class="form__group">
            <label class="after" for="comment__text">Ваш отзыв</label>
            <textarea class="comment__textarea" id="comment_text" name="text" data-format=".+" data-notice="Введите комментарий" required>{$comment_text}</textarea>
          </div>
          <div class="container-flex container-flex--form form__group">
            <div class="captcha__container">
              <label class="after" for="comment_captcha">Введите число</label>
              <div class="captcha">
                <img class="captcha__img" src="captcha/image.php?{math equation='rand(10,10000)'}" alt='captcha'/>
                <input class="captcha__input" id="comment_captcha" type="text" name="captcha_code" value="" data-format="\d\d\d\d" data-notice="Введите капчу" required>
              </div>
            </div>
            <input class="btn comment__btn captcha__btn" type="submit" name="comment" value="Отправить отзыв">
          </div>
        </form>
        <div class="modal__success js-form__success">
          {include file="svg.tpl" svgId="ic_checkbox" width="100px" fill="#12a4dd"}
          <p class="modal__text">Ваш комментарий принят в обработку</p>
          <button class="btn modal__btn js-form__btn-close">Ок</button>
        </div>
        <!--Форма отправления комментария (The End)-->
      </div>
      <!-- Комментарии (The End) -->
    </div>
  </div>
</div>