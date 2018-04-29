{* Список записей блога *}

{* Канонический адрес страницы *}
{$canonical="/blog" scope=parent}
<div class="blog">
  <div class="container">
  <!-- Заголовок /-->
  {include file='crumbles.tpl'}
    <h1 class="blog__title">{$page->name}</h1>
    {include file='crumbles.tpl'}
    <!-- Статьи /-->
    <ul class="blog__list row--flex">
      {foreach $posts as $post}
      <li class="blog__item col-xs-12 col-sm-6">
        <h3 class="blog__item-title">
          <a data-post="{$post->id}" href="blog/{$post->url}">{$post->name|escape}</a>
        </h3>
        {*blog_image*}
        {if $post->image}
          <a data-post="{$post->id}" href="blog/{$post->url}">
            <img src="{$post->image|resize:100:100:false:$config->resized_blog_dir}" alt="" />
          </a>
        {/if}
        {*/blog_image*}
        <div class="blog__item-info">
          <span class="blog__item-date">
            {include file="svg.tpl" svgId="ic_clock" width="16px" height="16px"}
            {$post->date|date}
          </span>
          {if $comments}
          <span class="blog__item-commetns">
            {include file="svg.tpl" svgId="ic_commetns" width="16px" height="16px"}{$comments|count}
          </span>
          {/if}
        </div>
        <div class="blog__item-annotation">{$post->annotation}</div>
        <a data-post="{$post->id}" href="blog/{$post->url}" class="btn blog__item-btn">Прочесть статью</a>
      </li>
      {/foreach}
    </ul>
  <!-- Статьи #End /-->    
  {include file='pagination.tpl'}
  </div>        
</div>
