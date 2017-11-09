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

<!-- Хлебные крошки /-->
<div class="crumbles">
	{include file="crumbles.tpl"}
</div>

<!-- Хлебные крошки #End /-->


<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
			{* Фильтр по брендам *}
      {if $category->brands}
      <div class="brands">
        <h3 class="features-title main-title">Бренды</h3>
        <div class="brands__list">
      	  <a class="brands__item" href="catalog/{$category->url}" {if !$brand->id}class="selected"{/if}>Все бренды</a>
      	  {foreach $category->brands as $b}
          {if $b->image}
      	  <a class="brands__item" data-brand="{$b->id}" href="catalog/{$category->url}/{$b->url}"><img src="{$config->      brands_images_dir}{$b->image}" alt="{$b->name|escape}"></a>
      		{else}
      	  <a class="brands__item" data-brand="{$b->id}" href="catalog/{$category->url}/{$b->url}" {if $b->id == $brand->      id}class="selected"{/if}>{$b->name|escape}</a>
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
      	  <div class="features-values">
      	  	<a href="{url params=[$f->id=>null, page=>null]}" {if !$smarty.get.$key}class="selected"{/if}  >Все</a>
      	  	{foreach $f->options as $o}
		        <a href="{url params=[$f->id=>$o->value, page=>null]}" {if $smarty.get.$key == $o->        value}class="selected"{/if}>{$o->value|escape}</a>
      	  	{/foreach}
      	  </div>
      	</div>
      	{/foreach}
      </div>
      {/if}
		</div>

		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
		{* Заголовок страницы *}
    {if $keyword}
    <h1 class="page-title">Поиск {$keyword|escape}</h1>
    {elseif $page}
    <h1 class="page-title">{$page->name|escape}</h1>
    {else}
    <h1 class="page-title">{$category->name|escape} {$brand->name|escape}</h1>
    {/if}

    <!--Каталог товаров-->
    {if $products}
    
    {* Сортировка *}
    {if $products|count>0}
    <div class="sort">
    	Сортировать по: 
    	<a {if $sort=='position'} class="selected"{/if} href="{url sort=position page=null}">умолчанию</a>
    	<a {if $sort=='price'}    class="selected"{/if} href="{url sort=price page=null}">цене</a>
    	<a {if $sort=='name'}     class="selected"{/if} href="{url sort=name page=null}">названию</a>
    </div>
    {/if}
    
   
    <div class="products-grid">
    	<div class="row">
    		<!-- Список товаров-->
        	{foreach $products as $product}
        	<div class="col-xs-12 col-sm-4 sol-md-4 col-lg-4">
        	<!-- Товар-->
        	{include file = "tiny-product__inner.tpl"}
        	<!-- Товар (The End)-->
        	</div>
        	{/foreach}		
       
        <!-- Список товаров (The End)-->
    	</div>
    </div>
    {else}
    Товары не найдены
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