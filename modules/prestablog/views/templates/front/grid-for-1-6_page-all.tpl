{*
 * 2008 - 2015 HDClic
 *
 * MODULE PrestaBlog
 *
 * @version   3.6.6
 * @author    HDClic <prestashop@hdclic.com>
 * @link      http://www.hdclic.com
 * @copyright Copyright (c) permanent, HDClic
 * @license   Addons PrestaShop license limitation
 *
 * NOTICE OF LICENSE
 *
 * Don't use this module on several shops. The license provided by PrestaShop Addons
 * for all its modules is valid only once for a single shop.
 *}

<!-- Module Presta Blog -->
{if isset($prestablog_title_h1)}<h1>{$prestablog_title_h1|escape:'htmlall':'UTF-8'}</h1>{/if}

{if sizeof($news)}
	{include file="$prestablog_pagination"}
	<ul id="blog_list">
	{foreach from=$news item=news_item name=NewsName}
		<li>
        	<div class="block_cont">
                <div class="block_top">
                    <a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}">
                        <p class="blog_desc">
                            {if $news_item.paragraph_crop!=''}
                                {$news_item.paragraph_crop|escape:'htmlall':'UTF-8'}
                            {/if}
                            <!---->
                        </p>
                    </a>
                {if isset($news_item.image_presente)}
                    {if isset($news_item.link_for_unique)}<a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}" class="product_img_link" title="{$news_item.title|escape:'htmlall':'UTF-8'}">{/if}
                        <img src="{$prestablog_theme_upimg|escape:'html':'UTF-8'}thumb_{$news_item.id_prestablog_news|intval}.jpg?{$md5pic|escape:'htmlall':'UTF-8'}" alt="{$news_item.title|escape:'htmlall':'UTF-8'}" />
                    {if isset($news_item.link_for_unique)}</a>{/if}
                {/if}
                </div>
                <div class="block_bas">
                    <h3>
                        {if isset($news_item.link_for_unique)}<a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}" title="{$news_item.title|escape:'htmlall':'UTF-8'}">{/if}{$news_item.title|escape:'htmlall':'UTF-8'}{if isset($news_item.link_for_unique)}</a>{/if}
                    <br /><span class="date_blog-cat">
                            {if sizeof($news_item.categories)}{l s='Categories :' mod='prestablog'}
                                {foreach from=$news_item.categories item=categorie key=key name=current}
                                    <a href="{PrestaBlogUrl c=$key titre=$categorie.link_rewrite}" class="categorie_blog">{$categorie.title|escape:'htmlall':'UTF-8'}</a>
                                    {if !$smarty.foreach.current.last},{/if}
                                {/foreach}
                            {/if}</span>
                    </h3>
                    {if isset($news_item.link_for_unique)}
                            <a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}" class="blog_link">{l s='Read more' mod='prestablog'}</a>
                            {if $prestablog_config.prestablog_comment_actif==1 && $news_item.count_comments>0}
                                <a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}#comment" class="comments"> {$news_item.count_comments|intval}</a>
                            {/if}
                            {if $prestablog_config.prestablog_commentfb_actif==1}
                                <script type="text/javascript">
                                {literal}
                                $(function(){
                                    $.getJSON( "https://graph.facebook.com/v2.4/?fields=share{comment_count}&id={/literal}{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}{literal}", function( json ) {
                                            $("#showcomments{/literal}{$news_item.id_prestablog_news|intval}{literal}").html(json.share.comment_count);
                                    });
                                });
                                {/literal}
                                </script>
                                <a href="{PrestaBlogUrl id=$news_item.id_prestablog_news seo=$news_item.link_rewrite titre=$news_item.title}#comment" id="showcomments{$news_item.id_prestablog_news|intval}" class="comments"></a>
                            {/if}
                    {/if}
                </div>
              </div>
		</li>
	{/foreach}
	</ul>
	{include file="$prestablog_pagination"}
{else}
	<p class="warning">{l s='Empty' mod='prestablog'}</p>
{/if}
<!-- /Module Presta Blog -->
