{* Главная страница магазина *}

{* Для того чтобы обернуть центральный блок в шаблон, отличный от index.tpl *}
{* Укажите нужный шаблон строкой ниже. Это работает и для других модулей *}
{$wrapper = 'index.tpl' scope=parent}

{* Канонический адрес страницы *}
{$canonical="" scope=parent}


{* Рекомендуемые товары *}
<div class="section">
  <div class="container">
    {get_featured_products var=featured_products}
    {if $featured_products}
    <!-- Список товаров-->
    <div class="products">
      <h1 class="main-title">Рекомендуемые товары</h1>
      <div class="products__list row row--flex">
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
</div>




{* Новинки *}
<section class="section section--dark">
  <div class="container">
    {get_new_products var=new_products limit=3}
    {if $new_products}
    <div class="products">
      <h1 class="main-title">Новинки</h1>
      <!-- Список товаров-->
      <div class="row row--flex">
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
<div class="section">
  <div class="container">
    {get_discounted_products var=discounted_products limit=9}
    {if $discounted_products}
    <div class="products">
      <h1 class="main-title">Акционные товары</h1>
      <!-- Список товаров-->
      <div class="row row--flex">
  
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
</div>

<div class="user-content">
  <div class="container">
    {if $page->body}
      {* Заголовок страницы *}
        <h1 class="page-title">{$page->header}</h1>
      {* Тело страницы *}
      {$page->body}
    {/if}
  </div>
</div>


