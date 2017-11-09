{* Список товаров *}

{* Канонический адрес страницы *}
{if $category && $brand}
{$canonical="/catalog/{$category->url}/{$brand->url}" scope=parent}
{elseif $category}
{$canonical="/catalog/{$category->url}" scope=parent}
{elseif $brand}
{$canonical="/brands/{$brand->url}" scope=parent}
{elseif $keyword}
{$canonical="/products?keyword={$keyword|escape}" scope=parent}
{else}
{$canonical="/products" scope=parent}
{/if}

<div class="container-fluid container-fluid--grey filter">
  <!-- Хлебные крошки /-->
    {include file="crumbles.tpl"}
  <!-- Хлебные крошки #End /-->


	<div class="row js-switch-container products">
		<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 filter-sidebar js-menu_sidebar js-switch-content" id="filter-sidebar">
      <button class="filter-sidebar__btn-close js-switch-close" type="button">
        {include file="svg.tpl" svgId="ic_close" fill="#12a4dd" width="12px" height="22px"}
      </button>
			{* Фильтр по брендам *}
      {if $category->brands}
      <div class="filter-brands">
        <h3 class="filter-title main-title">Бренды</h3>
        <div class="filter-brands__list">
      	  <a class="filter-brands__item {if !$brand->id}selected{/if}" href="catalog/{$category->url}" >Все бренды</a>
      	  {foreach $category->brands as $b}
          {if $b->image}
      	  <a class="filter-brands__item" data-brand="{$b->id}" href="catalog/{$category->url}/{$b->url}"></a>
      		{else}
      	  <a class="filter-brands__item {if $b->id == $brand->id}selected{/if}" data-brand="{$b->id}" href="catalog/{$category->url}/{$b->url}">{$b->name|escape}</a>
      	  {/if}
      	  {/foreach}
        </div>
      </div>
      {/if}

      {if $current_page_num==1}
      {* Описание бренда *}
      {$brand->description}
      {/if}
      
      {* Фильтр по свойствам *}
      {if $features}
      <div class="features">
      	{foreach $features as $key=>$f}
      	<div class="features__item">
      		<h3 class="features-title main-title" data-feature="{$f->id}">
      		  {$f->name}
      	  </h3>
      	  <div class="features__values">
      	  	<a class="features__values-link {if !$smarty.get.$key}selected{/if}"  href="{url params=[$f->id=>null, page=>null]}">Все</a>
      	  	{foreach $f->options as $o}
		        <a class="features__values-link {if $smarty.get.$key == $o->value}selected{/if}" href="{url params=[$f->id=>$o->value, page=>null]}">{$o->value|escape}</a>
      	  	{/foreach}
      	  </div>
      	</div>
      	{/foreach}
      </div>
      {/if}
		</div>

		<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
		{* Заголовок страницы *}
    {if $keyword}
    <h1 class="products__title">Поиск {$keyword|escape}</h1>
    {elseif $page}
    <h1 class="products__title">{$page->name|escape}</h1>
    {else}
    <h1 class="products__title">{$category->name|escape} {$brand->name|escape}</h1>
    {/if}

    <!--Каталог товаров-->
    {if $products}
    
    {* Сортировка *}
    {if $products|count>0}
    <div class="sort">
    	<span class="sort__title">Сортировать по: </span> 
      <select class="sort__list"  onchange="location = $('.sort__link:selected').data('href');">
        <option class="sort__link" {if $sort=='position'}selected{/if} data-href="{url sort=position page=null}">умолчанию</option>
        <option class="sort__link" {if $sort=='price'}selected{/if}  data-href="{url sort=price page=null}">цене</option>
        <option class="sort__link" {if $sort=='name'}selected{/if}  data-href="{url sort=name page=null}">названию</option>
      </select>   	 
    </div>
    {/if}
     <button class="btn filter-sidebar__btn-open js-switch-link" type="button" data-target="filter-sidebar" data-close_outside="true">Фильтр</button>
    
   
    <div class="products__grid">
    	<div class="row row--flex">
    		<!-- Список товаров-->
        	{foreach $products as $product}
        	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 products__item">
        	<!-- Товар-->
        	{include file = "tiny-product__inner.tpl"}
        	<!-- Товар (The End)-->
        	</div>
        	{/foreach}		
       
        <!-- Список товаров (The End)-->
    	</div>
    </div>
    {else}
    <p class="products__absent">Товары не найдены</p>
    {/if}

     {include file='pagination.tpl'}	
    <!--Каталог товаров (The End)-->
    </div>
	</div>
</div>

{* Описание страницы (если задана) *}
{$page->body}

{if $current_page_num==1}
{* Описание категории *}
{$category->description}
{/if}