<!-- Block user information module NAV  -->
{if $is_logged}
	<li class="login">
		<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}"><i class="icon icon-user"></i><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
</li>
{/if}
<li class="login">
	{if $is_logged}
	<span>
		<a href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}"><i class="icon icon-user"></i>
			{l s='LOGIN OUT' mod='blockuserinfo'}
		</a>
</span>
	{else}
	<span>
		<a class="login" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" ><i class="icon icon-user"></i>
			{l s='LOGIN' mod='blockuserinfo'}
		</a>
</span>
	{/if}
</li>
<!-- /Block usmodule NAV -->
