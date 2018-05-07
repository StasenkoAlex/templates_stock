{* Список записей блога *}
{* Канонический адрес страницы *}
{$canonical="/blog" scope=parent}
<div class="blog">
  <div class="container-fluid container-fluid--grey post__crumbles">
    <!-- Заголовок /-->
    {include file='crumbles.tpl'}
    <!-- Заголовок /-->
  </div>
  <div class="container">
    <!-- Заголовок /-->
    {include file='crumbles.tpl'}
    <ul class="blog__list row">
      {foreach $posts as $post}
      <li class="blog__item col-xs-12 col-sm-6 col-lg-4">
        <div class="blog__image-wrap">
          {*blog_image*}
          {if $post->image}
          <a href="blog/{$post->url}" class="blog__image" data-post="{$post->id}" style="background-image: url({$post->image|resize:800:450:false:$config->resized_blog_dir});">  </a>
          {/if}
          {*/blog_image*}
          <div class="blog__item-text">
            <a class="blog__item-title" href="blog/{$post->url}">{$post->name|escape}</a>
            <time class="blog__item-date" datetime="{$post->date}">
            {include file="svg.tpl" svgId="ic_calendar" width="13px"}
            {$post->date|date}
            </time>
          </div>
        </div>
        <div class="blog__info">
          {if $post->annotation}
          <div class="blog__item-intro">{$post->annotation|strip_tags}</div>
          {/if}
          <a class="blog__item-button btn" href="blog/{$post->url}">Подробнее</a>
        </div>
      </li>
      {/foreach}
    </ul>
    <!-- Статьи #End /-->
    {include file='pagination.tpl'}
  </div>
</div>