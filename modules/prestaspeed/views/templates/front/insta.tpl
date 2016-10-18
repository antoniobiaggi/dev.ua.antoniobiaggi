{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* No redistribute in other sites, or copy.
*
*  @author RSI <rsi_2004@hotmail.com>
*  @copyright  2007-2016 RSI
*} 
{if $infi eq 1}
{if $psversion > "1.6.0.0"}
<script type="text/javascript">
  $( document ).ready(function() {
        display('grid');
    });
</script>
{/if}
 {literal}

<script type="text/javascript">

	infinite_scroll = {/literal}{$options|escape:'quotes':'UTF-8'}{literal};
	{/literal}{if isset($pages_nb)}{literal}
	infinite_scroll.maxPage = {/literal}{$pages_nb|escape:'htmlall':'UTF-8'}{literal};
	{/literal}{/if}{literal}
	jQuery( infinite_scroll.contentSelector ).infinitescroll( infinite_scroll, function(newElements, data, url) { eval(infinite_scroll.callback); });
</script>
{/literal}
{/if}

