{if $MENU != ''}
<!-- Menu -->
<div class="header-navigation clearfix">
    <div class="wrapp-head-menu">
        <ul class="primary">
            {$MENU}
        </ul>
        {if $MENU_SEARCH}
        <div class="search2">
            <form action="{$link->getPageLink('search')|escape:'html':'UTF-8'}" method="get">
                <fieldset>
                    <input class="text-search" placeholder="{l s='SEARCH' mod='blocktopmenu'}" type="text" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|escape:'html':'UTF-8'}{/if}">
                    <button type="submit" class="btn btn-search"></button>
                </fieldset>
            </form>
        </div>
        {/if}
    </div>
</div>
<!--/ Menu -->
{/if}