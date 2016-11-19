<?php

if ( !defined( 'ABSPATH' ) ) :
	exit; // Exit if accessed directly
endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemprop="mainEntity" itemscope itemtype="http://schema.org/BlogPosting">
	<link itemprop="mainEntityOfPage" href="<?php echo esc_url( get_permalink() );?>" />
    <header class="page-entry-header">
        <span itemprop="author" itemscope itemtype="http://schema.org/Person">
            <meta itemprop="url" content="#">
            <meta itemprop="name" content="<?php the_author(); ?>">
        </span>
        <meta itemprop="datePublished" content="<?php the_time('c'); ?> ">
        <meta itemprop="dateModified" content="<?php the_modified_time('c'); ?>">
        <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
            <?php $logo = get_theme_mod( 'site_logo', '' ); 
            if ( !empty($logo) ) : ?>
            <span itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                <meta itemprop="url" content="<?php echo esc_url( $logo ); ?>">
            </span>
            <?php endif; ?>
            <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
        </span>
        <?php 
            global $lang_support;
            $lang = get_theme_mod( 'force_locale', 'en' );
        ?>
        <meta itemprop="inLanguage" content="<?php echo $lang_support['html'][$lang]; ?>">
	</header>
    
	<div class="entry-content" itemprop="text">
        <div class="section">
        <p class="entry-meta site-meta-t">
            <?php the_title( '<h2 class="genpost-entry-title" itemprop="headline">', '</h2>' ); ?>
            Posted by <?php the_author(); ?> on <time><?php the_time('F j, Y '); ?></time>
         </p> 
        <?php _social_media(); ?>
        </div>
        <div class="divider"></div>
        <div class="section">
            <?php the_content(); ?>
        </div>
        <div class="divider"></div>
        <div class="section">
            <p>
            <?php if ( comments_open() && pings_open() ) {
            // Both Comments and Pings are open ?>
            You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(); ?>" >trackback</a> from your own site.

            <?php } elseif ( !comments_open() && pings_open() ) {
            // Only Pings are Open ?>
            Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " >trackback</a> from your own site.

            <?php } elseif ( comments_open() && !pings_open() ) {
            // Comments are open, Pings are not ?>
            You can skip to the end and leave a response. Pinging is currently not allowed.

            <?php } elseif ( !comments_open() && !pings_open() ) {
            // Neither Comments, nor Pings are open ?>
            Both comments and pings are currently closed.

            <?php } edit_post_link('Edit this entry','','.'); ?>

            </p>
            <?php _social_media(); ?>
        </div>
        <div class="divider"></div>
        <div class="section">
            <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5" data-width="100%"></div>
        
            <?php tieronetwo_next_prev_link();?> 
        </div>
        
	</div>
</article>