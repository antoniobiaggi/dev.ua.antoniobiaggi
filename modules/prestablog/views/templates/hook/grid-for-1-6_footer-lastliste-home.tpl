<aside id="easycontent_6" class=" model-foto-style easycontent_6   easycontent ">
<div class="style_content   block_content">
	<div class="wrapp-model-foto-style clearfix">
		{if $ListeBlocLastNews}
			{$irr='0'}
			{$sty='1'}
			{$step1 = ''}
			{foreach from=$ListeBlocLastNews item=Item name=myLoop}
				{if $irr==0}
					{$step = 'item-model frolova'}
					{$step1 = 'name-model'}
					{$sty = 0}
				{/if}
				{if $irr==1}
					{$step = 'item-model center-marg'}
					{$step1 = 'name-model'}
					{$sty = 0}
				{/if}
				{if $irr==2}
					{$step = 'takes-her'}
					{$step1 = 'text-takes'}
					{$sty = 1}
				{/if}
				{if $irr==3}
					{$step = 'item-model position-centr for-adapt'}
					{$step1 = 'name-model'}
					{$sty = 0}
				{/if}
				<div class="{$step}">
					<div class="foto-model ">
						<a href="{PrestaBlogUrl id=$Item.id_prestablog_news seo=$Item.link_rewrite titre=$Item.title}">
						<img src="{$prestablog_theme_upimg|escape:'html':'UTF-8'}thumb_{$Item.id_prestablog_news|intval}.jpg?{$md5pic|escape:'htmlall':'UTF-8'}" alt="{$Item.title|escape:'htmlall':'UTF-8'}">
						</a>
					</div>
					<div class="{$step1}">
						{if $sty == 1}<p>{/if}
						<a href="{PrestaBlogUrl id=$Item.id_prestablog_news seo=$Item.link_rewrite titre=$Item.title}">{$Item.title|escape:'htmlall':'UTF-8'}</a>
						{if $sty == 1}</p>{/if}
					</div>
				</div>
				{$irr = $irr+1}
			{/foreach}
		{/if}
	</div>
</div>
</aside>