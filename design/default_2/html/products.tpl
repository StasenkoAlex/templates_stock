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
      {* Фильтр по свойствам *}
      {* MultiFilter  *}
      {if $features || $category->brands || $prices_range || $features_variants}
      <form method="get" class="features" id="features">
        {if $prices_range}
          <div class="features__item">
            <div class="features-title main-title">Цена:</div>
            <div class="features__values features__values--slider slider">
              <span class="slider__amount" id="amount"></span>
              <div id="slider" class="slider__container">
                <div id="slider-range" class="slider__range"></div>
              </div>
              <input type="hidden" id="p_min" name="p[min]" value="{$prices_range->current->min}" data-min="{$prices_range->min}">
              <input type="hidden" id="p_max" name="p[max]" value="{$prices_range->current->max}" data-max="{$prices_range->max}">
            </div>
          </div>
        {/if}

          {if $category->brands|count>1}
          <div class="filter-brands">
            <div class="filter-title main-title">Бренды</div>
            {foreach name=brands item=b from=$category->brands} 
            <div class="filter-brands__list">
              <input class="filter-brands__input" id="{$b->name|escape}" type="checkbox" name="b[]" value="{$b->id}" {if $smarty.get.b && $b->id|in_array:$smarty.get.b}checked{/if}>
              <label class="filter-brands__link" for="{$b->name|escape}">&nbsp;{$b->name|escape}</label>
            </div>
            {/foreach}
          </div>
          {/if}

          {if $features_variants|count > 2}
          <div class="features__item">
            <div class="features-title main-title">Варианты:</div>
              {foreach $features_variants as $o}
              <div class="features__list">
                <input class="features__input" type="checkbox" id="{$o}" name="v[]" value="{$o}" {if $smarty.get.v && $o|in_array:$smarty.get.v}checked{/if}>
                <label class="features__link" for="{$o}">
                  {$o|default:"без названия"|escape}
                </label>
              </div>
              {/foreach}
          </div>
          {/if}

          {if $features}
          {foreach $features as $f}
          <div class="features__item">
            <div class="features-title main-title" data-feature="{$f->id}">{$f->name}:</div>
            {foreach $f->options as $o}
            <div class="features__list">
              <input class="features__input" type="checkbox" name="{$f->id}[]" id="{$o->value}" value="{$o->value}" {if $smarty.get.{$f@key} && $o->value|in_array:$smarty.get.{$f@key}}checked{/if}>
              <label class="features__link" for="{$o->value}">&nbsp;{$o->value|escape}</label>
            </div>
            {/foreach}
          </div>
          {/foreach}
          {/if}
        </form>
        <script>                
          {literal}
            $(function() {
              
            });
          {/literal}
        </script>
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