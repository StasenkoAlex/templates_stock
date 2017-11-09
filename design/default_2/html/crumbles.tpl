{strip}
{if $smarty.get.module == 'ProductView' || ($smarty.get.module == 'ProductsView' && !$keyword) || ($smarty.get.module == 'BlogView' && $post)}
	<div class="crumbles">
		<span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
			<a class="crumbles__link" itemprop="url" href="./">
				{include file="svg.tpl" svgId="ic_home" width="17px" height="14px"}
			</a>
			{include file="svg.tpl" svgId="ic_arrow-right" width="8px" height="12px" color="#ccc"}
		</span>
		{if $smarty.get.module == 'ProductView'}
			{foreach from=$category->path item=cat}
				<span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
					<a class="crumbles__link" href="catalog/{$cat->url}" itemprop="url"><span itemprop="title">{$cat->name|escape}</span></a>
					{include file="svg.tpl" svgId="ic_arrow-right" width="8px" height="12px" color="#ccc"}
				</span>
			{/foreach}
			<span class="crumbles__last">
				{$product->name|escape}
			</span>
		{elseif $smarty.get.module == 'ProductsView' && !$keyword}
			{if $category} 
				{foreach from=$category->path item=cat}
					{if $cat@last}
						<span class="crumbles__last">
							<span>{$cat->name|escape}</span>
						</span>
					{else}
						<span  class="crumbles__item"  itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							<a class="crumbles__link" itemprop="url" href="catalog/{$cat->url}"><span itemprop="title">{$cat->name|escape}</span></a>
							{include file="svg.tpl" svgId="ic_arrow-right" width="8px" height="12px" color="#ccc"}
						</span>
					{/if}
				{/foreach}
			{/if}
		{elseif $smarty.get.module == 'BlogView' && $post}
			<span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a class="crumbles__link" itemprop="url" href="blog"><span itemprop="title">Публикации</span></a>
				{include file="svg.tpl" svgId="ic_arrow-right" width="8px" height="12px" color="#ccc"}
			</span>
			<span class="crumbles__last crumbles__item--active">{$post->name|escape}</span>
		{/if}
	</div>
{/if}
{/strip}