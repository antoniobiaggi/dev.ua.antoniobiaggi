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
{if isset($news)}
	<a name="article"></a>
	<h1>{$news->title|escape:'htmlall':'UTF-8'}</h1>
	<p class="info_blog">{l s='Published :' mod='prestablog'}
	{dateFormat date=$news->date full=1}
	{if sizeof($news->categories)}
		<br />
		{l s='Categories :' mod='prestablog'}
		{foreach from=$news->categories item=categorie key=key name=current}<a href="{PrestaBlogUrl c=$key titre=$categorie.link_rewrite}">{$categorie.title|escape:'htmlall':'UTF-8'}</a>
		{if $prestablog_config.prestablog_uniqnews_rss}<sup><a target="_blank" href="{PrestaBlogUrl rss=$key}"><img src="{$prestablog_theme_dir|escape:'html':'UTF-8'}/img/rss.png" alt="Rss feed" align="absmiddle" /></a></sup>{/if}
		{if !$smarty.foreach.current.last},{/if}
		{/foreach}
	{/if}
	</p>
	{if isset($news_Image) && $prestablog_config.prestablog_view_news_img}<img src="{$prestablog_theme_upimg|escape:'html':'UTF-8'}thumb_{$news->id|intval}.jpg?{$md5pic|escape:'htmlall':'UTF-8'}" class="news" alt="{$news->title|escape:'htmlall':'UTF-8'}"/>{/if}
	<div id="prestablogfont">{PrestaBlogContent return=$news->content}</div>
	<div class="clear"></div>
	{if (sizeof($news->products_liaison))}
    <div id="blog_product_linked">
		<h3>{l s='Related products' mod='prestablog'}</h3>
		{foreach from=$news->products_liaison item=product key=key name=current}
		<div class="productslinks">
				<a href="{$product.link|escape:'htmlall':'UTF-8'}">
					{PrestaBlogContent return=$product.thumb}
                    <br/>
					{$product.name|escape:'htmlall':'UTF-8'}
				</a>
        </div>
		{/foreach}
    </div>
	{/if}
    {if (sizeof($news->articles_liaison))}
    <div id="blog_article_linked">
        <h3>{l s='Related posts' mod='prestablog'}</h3>
        {foreach from=$news->articles_liaison item=article key=key name=current}
        <ul class="articleslinks">
            <li><a href="{$article.link|escape:'htmlall':'UTF-8'}">{$article.title|escape:'htmlall':'UTF-8'}</a></li>
        </ul>
        {/foreach}
    </div>
    {/if}
	{if $prestablog_config.prestablog_socials_actif}
	<h3>{l s='Share this content' mod='prestablog'}</h3>
	<ul class="rrssb-buttons clearfix">
        {if $prestablog_config.prestablog_s_facebook}
        <li class="facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u={$prestablog_current_url|escape:'url':'UTF-8'}" class="popup">
                <span class="icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                        <path d="M27.825,4.783c0-2.427-2.182-4.608-4.608-4.608H4.783c-2.422,0-4.608,2.182-4.608,4.608v18.434
                            c0,2.427,2.181,4.608,4.608,4.608H14V17.379h-3.379v-4.608H14v-1.795c0-3.089,2.335-5.885,5.192-5.885h3.718v4.608h-3.726
                            c-0.408,0-0.884,0.492-0.884,1.236v1.836h4.609v4.608h-4.609v10.446h4.916c2.422,0,4.608-2.188,4.608-4.608V4.783z"/>
                    </svg>
                </span>
                <span class="text">{l s='Facebook' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_twitter}
        <li class="twitter">
            <a href="http://twitter.com/home?status={$news->title|escape:'url':'UTF-8'}%20{$prestablog_current_url|escape:'url':'UTF-8'}" class="popup">
                <span class="icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                    <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                        c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                        C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                        C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                        c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                        C26.275,7.229,25.39,8.196,24.253,8.756z"/>
                    </svg>
               </span>
                <span class="text">{l s='Twitter' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_googleplus}
        <li class="googleplus">
            <a href="https://plus.google.com/share?url={$news->title|escape:'url':'UTF-8'}%20{$prestablog_current_url|escape:'url':'UTF-8'}" class="popup">
                <span class="icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                        <g>
                            <g>
                                <path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
                                    c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
                                    C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
                                    c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
                                    c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
                                    c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
                                    c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
                                    c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
                                    c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
                                    c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"/>
                                <polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
                                    23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "/>
                            </g>
                        </g>
                    </svg>
                </span>
                <span class="text">{l s='Google+' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_linkedin}
        <li class="linkedin">
            <a href="http://www.linkedin.com/shareArticle?mini=true&url={$prestablog_current_url|escape:'url':'UTF-8'}&title={$news->title|escape:'url':'UTF-8'}&summary={$news->title|escape:'url':'UTF-8'}" class="popup">
                <span class="icon">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                        <path d="M25.424,15.887v8.447h-4.896v-7.882c0-1.979-0.709-3.331-2.48-3.331c-1.354,0-2.158,0.911-2.514,1.803
                            c-0.129,0.315-0.162,0.753-0.162,1.194v8.216h-4.899c0,0,0.066-13.349,0-14.731h4.899v2.088c-0.01,0.016-0.023,0.032-0.033,0.048
                            h0.033V11.69c0.65-1.002,1.812-2.435,4.414-2.435C23.008,9.254,25.424,11.361,25.424,15.887z M5.348,2.501
                            c-1.676,0-2.772,1.092-2.772,2.539c0,1.421,1.066,2.538,2.717,2.546h0.032c1.709,0,2.771-1.132,2.771-2.546
                            C8.054,3.593,7.019,2.501,5.343,2.501H5.348z M2.867,24.334h4.897V9.603H2.867V24.334z"/>
                    </svg>
                </span>
                <span class="text">{l s='Linkedin' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_email}
        <li class="email">
            <a href="mailto:?subject={$news->title|escape:'url':'UTF-8'}&amp;body={$prestablog_current_url|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><g><path d="M20.111 26.147c-2.336 1.051-4.361 1.401-7.125 1.401c-6.462 0-12.146-4.633-12.146-12.265 c0-7.94 5.762-14.833 14.561-14.833c6.853 0 11.8 4.7 11.8 11.252c0 5.684-3.194 9.265-7.399 9.3 c-1.829 0-3.153-0.934-3.347-2.997h-0.077c-1.208 1.986-2.96 2.997-5.023 2.997c-2.532 0-4.361-1.868-4.361-5.062 c0-4.749 3.504-9.071 9.111-9.071c1.713 0 3.7 0.4 4.6 0.973l-1.169 7.203c-0.388 2.298-0.116 3.3 1 3.4 c1.673 0 3.773-2.102 3.773-6.58c0-5.061-3.27-8.994-9.303-8.994c-5.957 0-11.175 4.673-11.175 12.1 c0 6.5 4.2 10.2 10 10.201c1.986 0 4.089-0.43 5.646-1.245L20.111 26.147z M16.646 10.1 c-0.311-0.078-0.701-0.155-1.207-0.155c-2.571 0-4.595 2.53-4.595 5.529c0 1.5 0.7 2.4 1.9 2.4 c1.441 0 2.959-1.828 3.311-4.087L16.646 10.068z"/></g></svg>
                </span>
                <span class="text">{l s='e-mail' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_pinterest}
        <li class="pinterest">
            <a href="http://pinterest.com/pin/create/button/?url={$prestablog_current_url|escape:'url':'UTF-8'}&amp;media={if $force_ssl}{$base_dir_ssl|escape:'url':'UTF-8'}{else}{$base_dir|escape:'url':'UTF-8'}{/if}{$prestablog_theme_upimg|escape:'url':'UTF-8'}{$news->id|intval}.jpg&amp;description={$news->title|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                    <path d="M14.021,1.57C6.96,1.57,1.236,7.293,1.236,14.355c0,7.062,5.724,12.785,12.785,12.785c7.061,0,12.785-5.725,12.785-12.785
                        C26.807,7.294,21.082,1.57,14.021,1.57z M15.261,18.655c-1.161-0.09-1.649-0.666-2.559-1.219c-0.501,2.626-1.113,5.145-2.925,6.458
                        c-0.559-3.971,0.822-6.951,1.462-10.116c-1.093-1.84,0.132-5.545,2.438-4.632c2.837,1.123-2.458,6.842,1.099,7.557
                        c3.711,0.744,5.227-6.439,2.925-8.775c-3.325-3.374-9.678-0.077-8.897,4.754c0.19,1.178,1.408,1.538,0.489,3.168
                        C7.165,15.378,6.53,13.7,6.611,11.462c0.131-3.662,3.291-6.227,6.46-6.582c4.007-0.448,7.771,1.474,8.29,5.239
                        c0.579,4.255-1.816,8.865-6.102,8.533L15.261,18.655z"/>
                    </svg>
                </span>
                <span class="text">{l s='pinterest' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_pocket}
        <li class="pocket">
            <a href="https://getpocket.com/save?url={$prestablog_current_url|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg width="32px" height="28px" viewBox="0 0 32 28" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                        <path d="M28.7817528,0.00172488695 C30.8117487,0.00431221738 31.9749312,1.12074529 31.9644402,3.10781507 C31.942147,6.67703739 32.1336065,10.2669583 31.8057648,13.8090137 C30.7147076,25.5813672 17.2181194,31.8996281 7.20714461,25.3808491 C2.71833574,22.4571656 0.196577202,18.3122624 0.0549495772,12.9357897 C-0.0342233715,9.5774348 0.00642900214,6.21519891 0.0300336062,2.85555035 C0.0405245414,1.1129833 1.21157517,0.0146615391 3.01995012,0.00819321302 C7.34746087,-0.00603710433 11.6775944,0.00431221738 16.0064164,0.00172488695 C20.2644248,0.00172488695 24.5237444,-0.00215610869 28.7817528,0.00172488695 L28.7817528,0.00172488695 Z M8.64885184,7.85611511 C7.38773662,7.99113854 6.66148108,8.42606978 6.29310958,9.33228474 C5.90114134,10.2969233 6.17774769,11.1421181 6.89875951,11.8276216 C9.35282156,14.161969 11.8108164,16.4924215 14.2976518,18.7943114 C15.3844131,19.7966007 16.5354102,19.7836177 17.6116843,18.7813283 C20.0185529,16.5495467 22.4070683,14.2982907 24.7824746,12.0327533 C25.9845979,10.8850542 26.1012707,9.56468083 25.1469132,8.60653379 C24.1361858,7.59255976 22.8449191,7.6743528 21.5890476,8.85191291 C19.9936451,10.3488554 18.3680912,11.8172352 16.8395462,13.3777945 C16.1342655,14.093159 15.7200114,14.0048744 15.0566806,13.3440386 C13.4599671,11.7484252 11.8081945,10.2060421 10.1262706,8.70001155 C9.65564653,8.27936164 9.00411403,8.05345704 8.64885184,7.85611511 L8.64885184,7.85611511 L8.64885184,7.85611511 Z"></path>
                    </svg>
                </span>
                <span class="text">{l s='pocket' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_tumblr}
        <li class="tumblr">
            <a href="http://tumblr.com/share/link?url={$prestablog_current_url|escape:'url':'UTF-8'}&name={$news->title|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><path d="M18.02 21.842c-2.029 0.052-2.422-1.396-2.439-2.446v-7.294h4.729V7.874h-4.71V1.592c0 0-3.653 0-3.714 0 s-0.167 0.053-0.182 0.186c-0.218 1.935-1.144 5.33-4.988 6.688v3.637h2.927v7.677c0 2.8 1.7 6.7 7.3 6.6 c1.863-0.03 3.934-0.795 4.392-1.453l-1.22-3.539C19.595 21.6 18.7 21.8 18 21.842z"/></svg>
                </span>
                <span class="text">{l s='tumblr' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_reddit}
        <li class="reddit">
            <a href="http://www.reddit.com/submit?url={$prestablog_current_url|escape:'url':'UTF-8'}&title={$news->title|escape:'url':'UTF-8'}&text={$news->title|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve"><g><path d="M11.794 15.316c0-1.029-0.835-1.895-1.866-1.895c-1.03 0-1.893 0.865-1.893 1.895s0.863 1.9 1.9 1.9 C10.958 17.2 11.8 16.3 11.8 15.316z"/><path d="M18.1 13.422c-1.029 0-1.895 0.864-1.895 1.895c0 1 0.9 1.9 1.9 1.865c1.031 0 1.869-0.836 1.869-1.865 C19.969 14.3 19.1 13.4 18.1 13.422z"/><path d="M17.527 19.791c-0.678 0.678-1.826 1.006-3.514 1.006c-0.004 0-0.009 0-0.014 0c-0.004 0-0.01 0-0.015 0 c-1.686 0-2.834-0.328-3.51-1.005c-0.264-0.265-0.693-0.265-0.958 0c-0.264 0.265-0.264 0.7 0 1 c0.943 0.9 2.4 1.4 4.5 1.402c0.005 0 0 0 0 0c0.005 0 0 0 0 0c2.066 0 3.527-0.459 4.47-1.402 c0.265-0.264 0.265-0.693 0.002-0.958C18.221 19.5 17.8 19.5 17.5 19.791z"/><path d="M27.707 13.267c0-1.785-1.453-3.237-3.236-3.237c-0.793 0-1.518 0.287-2.082 0.761c-2.039-1.295-4.646-2.069-7.438-2.219 l1.483-4.691l4.062 0.956c0.071 1.4 1.3 2.6 2.7 2.555c1.488 0 2.695-1.208 2.695-2.695C25.881 3.2 24.7 2 23.2 2 c-1.059 0-1.979 0.616-2.42 1.508l-4.633-1.091c-0.344-0.081-0.693 0.118-0.803 0.455l-1.793 5.7 C10.548 8.6 7.7 9.4 5.6 10.75C5.006 10.3 4.3 10 3.5 10.029c-1.785 0-3.237 1.452-3.237 3.2 c0 1.1 0.6 2.1 1.4 2.69c-0.04 0.272-0.061 0.551-0.061 0.831c0 2.3 1.3 4.4 3.7 5.9 c2.299 1.5 5.3 2.3 8.6 2.325c3.228 0 6.271-0.825 8.571-2.325c2.387-1.56 3.7-3.66 3.7-5.917 c0-0.26-0.016-0.514-0.051-0.768C27.088 15.5 27.7 14.4 27.7 13.267z M23.186 3.355c0.74 0 1.3 0.6 1.3 1.3 c0 0.738-0.6 1.34-1.34 1.34s-1.342-0.602-1.342-1.34C21.844 4 22.4 3.4 23.2 3.355z M1.648 13.3 c0-1.038 0.844-1.882 1.882-1.882c0.31 0 0.6 0.1 0.9 0.209c-1.049 0.868-1.813 1.861-2.26 2.9 C1.832 14.2 1.6 13.8 1.6 13.267z M21.773 21.57c-2.082 1.357-4.863 2.105-7.831 2.105c-2.967 0-5.747-0.748-7.828-2.105 c-1.991-1.301-3.088-3-3.088-4.782c0-1.784 1.097-3.484 3.088-4.784c2.081-1.358 4.861-2.106 7.828-2.106 c2.967 0 5.7 0.7 7.8 2.106c1.99 1.3 3.1 3 3.1 4.784C24.859 18.6 23.8 20.3 21.8 21.57z M25.787 14.6 c-0.432-1.084-1.191-2.095-2.244-2.977c0.273-0.156 0.59-0.245 0.928-0.245c1.035 0 1.9 0.8 1.9 1.9 C26.354 13.8 26.1 14.3 25.8 14.605z"/></g></svg>
                </span>
                <span class="text">{l s='reddit' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
        {if $prestablog_config.prestablog_s_hackernews}
        <li class="hackernews">
            <a href="https://news.ycombinator.com/submitlink?u={$prestablog_current_url|escape:'url':'UTF-8'}&t={$news->title|escape:'url':'UTF-8'}&text={$news->title|escape:'url':'UTF-8'}">
                <span class="icon">
                    <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                        <polygon fill="#FFFFFF" points="14.001,13.626 9.492,4.435 6.588,4.435 12.753,16.644 12.753,23.565 15.262,23.565 15.262,16.644
        21.413,4.435 18.689,4.435 "/>
                    </svg>
                </span>
                <span class="text">{l s='hackernews' mod='prestablog'}</span>
            </a>
        </li>
        {/if}
    </ul>
	{/if}
    <script type="text/javascript">
        {literal}
        $(function() {
            $('#prestablogfont a img').addClass('anti-fancybox');
            $('#prestablogfont img').not(".anti-fancybox").each(function() {
                $(this).wrap('<a class="fancybox" href="'+$(this).attr('src')+'" data-fancybox-group="prestablog-news-{/literal}{$news->id|intval}{literal}"></a>');
                $(this).addClass('img-responsive');
            });
            $('#prestablogfont a.fancybox').fancybox();
        });
        {/literal}
    </script>
{/if}
<!-- /Module Presta Blog -->
