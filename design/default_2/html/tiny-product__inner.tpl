
<div class="tiny-product__inner">
  <div class="tiny-product__row row">
    {if $product -> featured} <span class="tiny-product__label">hit</span> {/if}
    <!-- Фото товара -->
    {if $product->image}
    <a class="tiny-product__image col-xs-6 col-sm-12" href="products/{$product->url}"><img src="{$product->image->filename|resize:200:200}" alt="{$product-name|escape}"/></a>
    {/if}
    <!-- Фото товара (The End) -->

    <div class="tiny-product__info col-xs-6 col-sm-12">
      <!-- Название товара -->
      <div class="tiny-product__name"><a data-product="{$product->id}" href="products/{$product->url}">{$product->name|escape}</a></div>
      <!-- Название товара (The End) -->

      {if $product->variants|count > 0}
      <!-- Выбор варианта товара -->
      <form class="tiny-product__cart js-add_cart" action="/cart">
       <input name="variant" value="{$product->variant->id}" type="hidden"/>
       <div class="tiny-product__price">
        {if $product->variant->compare_price > 0}
        <span class="compare-price">{$product->variant->compare_price|convert}
          <span class="currency">{$currency->sign|escape}</span>
        </span>
        {/if}
        <span class="price">{$product->variant->price|convert} 
          <span class="currency">{$currency->sign|escape}</span>
        </span>
      </div>
      <button class="tiny-product__btn btn" type="submit" data-result-text="добавлено">
        {include file="svg.tpl" svgId="ic_cart" width="20px" height="20px"}
        <span>Купить</span>
      </button>
    </form>
    <!-- Выбор варианта товара (The End) -->
    {else}
    Нет в наличии
    {/if}
    </div>
  </div>
</div>


