{if isset($content)}
	{if $collapsible eq 1}
		<div class='categoryextrafield'>
			<div class='excerpt'>
				{$excerpt|unescape:'html'}
				<a class='read-more'>read more <i class="icon-chevron-down"></i></a>
			</div>
			<div class='content' style='display:none'>
				{$content|unescape:'html'}
				<a class='read-less'>read less <i class="icon-chevron-up"></i></a>
			</div>
		</div>
	{else}
		<div class='categoryextrafield'>
			<div class='content'>
				{$content|unescape:'html'}
			</div>
		</div>	
	{/if}
{/if}