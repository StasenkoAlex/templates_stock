{$meta_title = "Избранные товары" scope=parent}
<div class="container-fluid container-fluid--grey">
  {* Заголовок страницы *}
  <h1 class="page__title">{$page->meta_title}</h1>
    {* Тело страницы *}
    {$page->body}
  
    <!-- Список товаров-->
    {if $wished_products|count}
    <ul class="wishlist__products row row--flex">
      {foreach $wished_products as $product}
      <!-- Товар-->
      <li class="col-xs-12 col-sm-6 col-md-3 col-lg-3 wishlist__product-wrap">
        <div class="wishlist__product-inner">
          <!-- Фото товара -->
          {if $product->image}
          <div class="wishlist__product-image">
            <a href="products/{$product->url}"><img src="{$product->image->filename|resize:200:200}" alt="{$product->name|escape}"/></a>
          </div>
          {/if}
          <!-- Фото товара (The End) -->
          <div class="wishlist__product-info">
            <!-- Название товара -->
            <div class="wishlist__product-name">
              <a data-product="{$product->id}" href="products/{$product->url}">{$product->name|escape}</a>
            </div>
            <a class="wishlist__product-favorite" href="wishlist/delete/{$product->id}">
              Удалить из избранного {include file="svg.tpl" svgId="ic_favorite"}
            </a>
            <!-- Название товара (The End) -->
          </div>
 
        </div>
      </li>
      <!-- Товар (The End)-->
      {/foreach} 
    </ul>
    {else}
      <div class="wishlist__absent">В избранном пусто</div>
    {/if}
