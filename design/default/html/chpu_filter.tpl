{if $category->brands}
	<div id="brands" class="filter-links">
		<a href="{furl params=[brand=>null, page=>null]}" {if !$brand->id && !$smarty.get.b}class="selected"{/if}>Все бренды</a>
        {foreach $category->brands as $b}
            {if $b->image}
				<a data-brand="{$b->id}" href="{furl params=[brand=>$b->url, page=>null]}"><img src="{$config->brands_images_dir}{$b->image}" alt="{$b->name|escape}"></a>
            {else}
				<a data-brand="{$b->id}" href="{furl params=[brand=>$b->url, page=>null]}" {if $brand->id == $b->id || $smarty.get.b && in_array($b->id,$smarty.get.b)}class="selected"{/if}>{$b->name|escape}</a>
            {/if}
        {/foreach}
	</div>
{/if}

{if $features || $prices}
	<table id="features" class="filter-links">
        {foreach $features as $key=>$f}
			<tr>
				<td class="feature_name" data-feature="{$f->id}">
                    {$f->name}:
				</td>
				<td class="feature_values">
					<a href="{furl params=[$f->url=>null, page=>null]}" {if !$smarty.get.$key}class="selected"{/if}>Все</a>
                    {foreach $f->options as $o}
						<a href="{furl params=[$f->url=>$o->translit, page=>null]}" {if $smarty.get.{$f@key} && in_array($o->translit,$smarty.get.{$f@key})}class="selected"{/if}>{$o->value|escape}</a>
                    {/foreach}
				</td>
			</tr>
        {/foreach}
        {if $prices}
			<tr>
				<td class="feature_name" data-feature="{$f->id}">
					Цена:
				</td>
				<td class="feature_values">
					<form action="{furl params=[page=>null, sort=>null, 'price-min'=>null, 'price-max'=>null]}">
						<div id="slider-range"></div>
						<div id="selected_prices">
							<span id="selected_prices_min">{$prices->current->min|default:$prices->range->min|fconvert}</span>
							&mdash;
							<span id="selected_prices_max">{$prices->current->max|default:$prices->range->max|fconvert}</span>
                            {$currency->sign}
						</div>
						<input type="hidden" id="p_min" name="p[min]" value="{$prices->current->min|default:$prices->range->min|fconvert}" data-extremum="{$prices->range->min|fconvert}" />
						<input type="hidden" id="p_max" name="p[max]" value="{$prices->current->max|default:$prices->range->max|fconvert}" data-extremum="{$prices->range->max|fconvert}" />
					</form>
				</td>
			</tr>
        {/if}
	</table>
{/if}

{if $products|count>0}
	<div class="sort filter-links">
		Сортировать по
		<a {if $sort=='position'} class="selected"{/if} href="{furl sort=position page=null}" rel="nofollow">умолчанию</a>
		<a {if $sort=='price'}    class="selected"{/if} href="{furl sort=price page=null}" rel="nofollow">цене</a>
		<a {if $sort=='name'}     class="selected"{/if} href="{furl sort=name page=null}" rel="nofollow">названию</a>
	</div>
{/if}