{* Страница товара *}

{* Канонический адрес страницы *}
{$canonical="/products/{$product->url}" scope=parent}
<div class="container-fluid container-fluid--grey">
  <!-- Хлебные крошки /-->
  {include file="crumbles.tpl"}
  <!-- Хлебные крошки #End /-->
  <div class="product">
    <div class="row product">
    	<div class="col-xs-12 col-sm-6 col-lg-8">
    		<div class="product__gallery clearfix">
    			<div class="gallery_slider-nav product__images hidden-xs visible-md col-md-4 col-lg-3">
    				<!-- Дополнительные фото продукта -->
    			  {if $product->images}
    			  {foreach $product->images as $i=>$image}
    			    <div class="product__img product__img--small">
    				     <img src="{$image->filename|resize:130:130}" alt="{$product->name|escape}" />   
    			    </div> 
    			     {/foreach}
    			  {/if}
    			  <!-- Дополнительные фото продукта (The End)-->
    			</div>    			
    			<div class="gallery_slider-for col-md-8 col-lg-9">
    				{if $product->images}
    				{foreach $product->images as $i=>$image}
    				<div class="product__img product__img--big">
    				  <img src="{$image->filename|resize:360:700}" alt="{$product->ame|escape}" />
    				</div>
    				{/foreach}
    				{/if}
    			</div>
    		</div>
    	</div>
    	<div class="col-xs-12 col-sm-6 col-lg-4">
    		<div class="product__info js-product-info">
    			<h1 class="product__name" data-product="{$product->id}">{$product->name|escape}</h1>
    			<div class="product__price-section">
    				<span class="product__price">
    					<span class="js-price">{$product->variant->price|convert}</span>
    					<span class="currency">{$currency->code|escape}</span>
    				</span>
    				<span class="product__price--compare js-compare_price {if $product->variant->compare_price == 0}hidden{/if}">
    					{$product->variant->compare_price|convert}
    				</span>
    			</div>
    			<ul class="product__data">
    				<li class="product__data-item">
    					<strong>Производитель:</strong>
    					<a href="{$brand->url}">{$brand->name}</a>
    				</li>
    				<li class="product__data-item js-sku-container {if !$product->variant->sku}hidden{/if}">
    					<strong>Артикул:</strong>
    					<span class="js-sku">{$product->variant->sku}</span>
    				</li>
    				<li class="product__data-item">
    					<strong>Наличие:</strong>
    					{if $product ->variant ->stock>0} <span class="stock">Есть в наличии</span> 
    					{else}<span class="stock--out">Нет в наличии</span>{/if}
    				</li>
    			</ul>

    			{if $product->variants|count > 0}
    			<!-- Выбор варианта товара -->
    			<form class="product__variants js-add_cart" action="/cart">
    				<h3 class="product__name">Доступные варианты</h3>
    				<ul class="product__variants-list">
    					{foreach $product->variants as $v}
    					<li class="product__variant">
    						<input id="product_{$v->id}" name="variant" value="{$v->id}" type="radio" class="js-variant_input" 
                  {if $product->variant->id==$v->id}checked{/if} 
                  data-price="{str_replace('',' ',ceil($v->price)|convert)}" 
                  {if $v->sku}data-sku="{$v->sku}"{/if} 
                  {if $v->compare_price}data-old_price="{str_replace('',' ',ceil($v->compare_price)|convert)}"{/if} 
                />
    						{if $v->name}<label class="product__variant-name" for="product_{$v->id}">{$v->name}</label>
                  {else} <label class="product__variant-name" for="product_{$v->id}">Один вариант товара</label>
                {/if}
    					</li>
    					{/foreach}
    				</ul>
    				<div class="product__custom-panel clearfix">
    					<div class="product__quantity js-counter_form">
    						<button class="counter js-counter js-counter_minus" type="button">
                  {include file="svg.tpl" svgId="ic_minus" width="15px" height="42px"}
                </button>
    						<input type="text" class="product__quantity-input quantity js-counter_input" name="amount" value="1" data-max="{$product->variant->stock}">
    						<button class="counter js-counter js-counter_plus" type="button">
                  {include file="svg.tpl" svgId="ic_plus" width="15px" height="42px"}
                </button>
    					</div>
    					<button class="tiny-product__btn btn" type="submit" data-result-text="добавлено">
    						{include file="svg.tpl" svgId="ic_cart" width="20px" height="20px"}
    						<span>Купить</span>
    					</button>
    					<button class="product__favorite-btn" type="button">
    						{include file="svg.tpl" svgId="ic_favorite"}
    					</button>
    				</div>
    			</form>
    			<!-- Выбор варианта товара (The End) -->
    			{else}
    			Нет в наличии
    			{/if}
    		</div>
    	</div>
    </div>
    <div class="product__tabs clearfix">
    	<ul class="product__tabs-nav js-tabs">
    		<li class="js-tab">Описание</li>
    		<li class="js-tab">Характеристики</li>
    		<li class="js-tab">
          Отзывов <span>({$comments|count})</span>
        </li>
    	</ul>
    	<div class="product__tabs-content js-tab_content">
    		<div class="product__tabs-pane js-tab_item">	
    			<!-- Описание товара -->
    			{$product->body}
    			<!-- Описание товара (The End)-->
    		</div>
    		<div class="product__tabs-pane js-tab_item">
    			{if $product->features}
    			<!-- Характеристики товара -->
    			
    			<table class="product__features">
    				<th colspan="2" class="product__features-title">Характеристики</th>
    				{foreach $product->features as $f}
    				<tr>
    					<td class="product__features-name">{$f->name}</td>
    					<td class="product__features-value">{$f->value}</td>
    				</tr>
    				{/foreach}
    			</table>
    			<!-- Характеристики товара (The End)-->
    			{/if}
    		</div>
    		<div class="product__tabs-pane js-tab_item">
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
                <div class="comments__text ">
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
    					Пока нет отзывов
    				</p>
    				{/if}
            <div class="comments__btn-wrap">  
              <a class="comments__form-btn">Написать отзыв</a>
            </div>
    				<!--Форма отправления комментария-->	
    				<form class="comments__form js-form" method="post">
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
                <input class="name" type="text" id="comment__name" name="name" value="{$comment_name}" data-format=".+" data-notice="Введите имя" required>
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
                <input type="submit" class="btn comment__btn captcha__btn" name="comment" value="Оставить коммментарий">
              </div>
    				</form>
    				<!--Форма отправления комментария (The End)-->
            <div class="modal__success js-form__success">
              {include file="svg.tpl" svgId="ic_checkbox" width="100px" fill="#12a4dd"}
              <p class="modal__text">Ваш отзыв принят в обработку</p>
              <button class="btn modal__btn js-form__btn-close">Ок</button>
            </div>
    			</div>
    			<!-- Комментарии (The End) -->
    		</div>
    	</div>
    </div>
  </div>
</div>
<!-- Описание товара (The End)-->
<div class="section section--dark">
	<div class="container-fluid">
		{* Связанные товары *}
		{if $related_products}
		<h2 class="products__title">Рекомендуемые товары</h2>
		<!-- Список каталога товаров-->	
		<ul class="products__list row row--flex">
			{foreach $related_products as $related_product}
			<div class="tiny-product col-xs-12 col-sm-4 col-lg-3">
				<!-- Товар-->
			  <div class="tiny-product__inner">
          <div class="tiny-product__row row">
          {if $product -> featured} <span class="tiny-product__label">hit</span> {/if}
          <!-- Фото товара -->
          {if $related_product->image}
            <a class="tiny-product__image col-xs-6 col-sm-12" href="products/{$related_product->url}"><img src="{$related_product->image->filename|resize:200:200}" alt="{$related_product->name|escape}"/></a>
          {/if}
          <!-- Фото товара (The End) -->

          <div class="tiny-product__info col-xs-6 col-sm-12">
            <!-- Название товара -->
              <div class="tiny-product__name">
            	  <a data-product="{$related_product->id}" href="products/{$related_product->url}">{$related_product->name|escape}</a>
              </div>
            <!-- Название товара (The End) -->

            {if $related_product->variants|count > 0}
            <!-- Выбор варианта товара -->
            <form class="tiny-product__cart" action="/cart">
              <input name="variant" value="{$related_product->variant->id}" type="hidden"/>
              <div class="tiny-product__price">
              	{if $related_product->variant->compare_price > 0}
              	<span class="compare-price">{$product->variant->compare_price|convert}
              		<span class="currency">{$currency->sign|escape}</span>
              	</span>
              	{/if}
              	<span class="price">{$related_product->variant->price|convert} 
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
      </div>
			<!-- Товар (The End)-->
			{/foreach}
		</ul>
		{/if}
	</div>
 </div>
</div>


{* Увеличитель картинок *}
{literal}
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />

<script>
$(function() {
	// Раскраска строк характеристик
	$(".features li:even").addClass('even');

	// Зум картинок
	$("a.zoom").fancybox({
		prevEffect	: 'fade',
		nextEffect	: 'fade'});
	});
</script>
{/literal}