{* Главная страница магазина *}

{* Для того чтобы обернуть центральный блок в шаблон, отличный от index.tpl *}
{* Укажите нужный шаблон строкой ниже. Это работает и для других модулей *}
{$wrapper = 'index.tpl' scope=parent}

{* Канонический адрес страницы *}
{$canonical="" scope=parent}


{* Рекомендуемые товары *}
<section class="section section--dark">
  <div class="container-fluid">
    {get_featured_products var=featured_products}
    {if $featured_products}
    <!-- Список товаров-->
    <div class="main__products-section">
      <h1 class="main__products-title">Рекомендуемые</h1>
      <div class="main__products-slider row row--flex js-products-slider">
        {foreach $featured_products as $product}
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          {include file="tiny-product__inner.tpl"}
        </div>
        <!-- Товар (The End)-->
        {/foreach}
      </div>
    {/if}
    </div>
  </div>
</section>




{* Новинки *}
<section class="section">
  <div class="container-fluid">
    {get_new_products var=new_products limit=5}
    {if $new_products}
    <div class="main__products-section">
      <h1 class="main__products-title">Новинки</h1>
      <!-- Список товаров-->
      <div class="main__products-slider main__products-slider--light row row--flex js-products-slider">
        {foreach $new_products as $product}
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          {include file="tiny-product__inner.tpl"}
        </div>
        <!-- Товар (The End)-->
        {/foreach}
      </div>
      {/if} 
    </div>
  </div>
</section>



{* Акционные товары *}
<section class="section section--dark">
  <div class="container-fluid">
    {get_discounted_products var=discounted_products limit=9}
    {if $discounted_products}
    <div class="main__products-section">
      <h1 class="main__products-title">Акционные товары</h1>
      <!-- Список товаров-->
      <div class="main__products-slider row row--flex js-products-slider">
  
        {foreach $discounted_products as $product}
        <!-- Товар-->
        <div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
          {include file="tiny-product__inner.tpl"}
        </div>
        <!-- Товар (The End)-->
        {/foreach}
      </div>
      {/if}
    </div>
  </div>
</section>

{get_brands var=all_brands limit=5}
<section class="brands">
  <div class="container-fluid">
    <h1 class="brands__title">Популярные бренды</h1>
    {if $all_brands}
    <ul class="brands__list js-brands_slider">
      {foreach $all_brands as $brand}
      <li class="brands__item">
        <a class="brands__link" href="{$brand->url}">
          {if $brand->image}
          <img class="brands__img" src="files/brands/{$brand->name}.jpg" alt="{$brand->name}">
          {else}
          {$brand->name}
          {/if}
        </a>
      </li>
      {/foreach}
    </ul>
    {/if}
  </div>
</section>


<section class="seo">
  <div class="container">
    {if $page->body}
      {* Заголовок страницы *}
        <h1 class="seo__title">{$page->header}</h1>
      {* Тело страницы *}
      {$page->body}
    {/if}
  </div>
</section>


