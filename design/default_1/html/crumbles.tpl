{strip}
{if $smarty.get.module == 'ProductView' || ($smarty.get.module == 'ProductsView' && !$keyword) || ($smarty.get.module == 'BlogView' && $post)}
	<div class="crumbles__content container">
		<span class="crumbles__item" itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
			<a itemprop="url" href="./"><span itemprop="title">Главная</span></a>
		</span>
		{if $smarty.get.module == 'ProductView'}
			{foreach from=$category->path item=cat}
				<span class="crumbles__item"  itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				
					<a href="catalog/{$cat->url}" itemprop="url"><span itemprop="title">{$cat->name|escape}</span></a>
				</span>
			{/foreach}
			<span class="crumbles__item">
				{$product->name|escape}
			</span>
		{elseif $smarty.get.module == 'ProductsView' && !$keyword}
			{if $category} 
				{foreach from=$category->path item=cat}
					{if $cat@last}
						<span class="crumbles__item crumbles__item--active">
							{include file="svg.tpl" svgId="ic_arrow_down" width="19px" height="19px"}
							<span>{$cat->name|escape}</span>
						</span>
					{else}
						<span class="crumbles__item"  itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
							{include file="svg.tpl" svgId="ic_arrow_down" width="19px" height="19px"}
							<a itemprop="url" href="catalog/{$cat->url}"><span itemprop="title">{$cat->name|escape}</span></a>
						</span>
					{/if}
				{/foreach}
			{/if}
		{elseif $smarty.get.module == 'BlogView' && $post}
			<span class="crumbles__item"  itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
				<a itemprop="url" href="blog"><span itemprop="title">Публикации</span></a>
			</span>
			<span class="crumbles__item crumbles__item--active">{$post->name|escape}</span>
		{/if}
	</div>
{/if}
{/strip}