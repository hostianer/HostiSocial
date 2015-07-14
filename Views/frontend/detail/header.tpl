{extends file="parent:frontend/index/header.tpl"}

{block name='frontend_index_header_meta_tags_schema_webpage' append}

    <link rel="image_src" href="{$sArticle.image.thumbnails[2].source}">

    <meta property="og:type" content="product" />
    <meta name="og:site_name" content="{config name=sShopname}" />
    <meta name="og:url" content="{$sArticle.linkDetailsRewrited}" />
    <meta name="og:description" content="{$sArticle.description_long|strip_tags|truncate:240}" />
    <meta name="og:image" content="{$sArticle.image.thumbnails[2].source}" />

    <meta name="twitter:card" content="product" />
    <meta name="twitter:title" property="og:title" content="{$sArticle.articleName|escape:"html"}"/>
    <meta name="twitter:url" property="og:url" content="{$sArticle.linkDetailsRewrited}"/>
    <meta name="twitter:image:src" property="og:image" content="{$sArticle.image.thumbnails[2].source}"/>
    <meta name="twitter:description" property="og:description" content="{$sArticle.description_long|strip_tags|truncate:240}" />

{/block}