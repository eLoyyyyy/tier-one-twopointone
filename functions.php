<?php

require get_template_directory() . '/inc/reset.php';

require get_template_directory() . '/inc/helpers.php';

function tier_one_two_styles_scripts(){
    wp_register_style('tier-one-twopointone-style', get_stylesheet_directory_uri() . '/css/style.min.css');
    wp_enqueue_style('tier-one-twopointone-style');
    wp_register_script('tier-one-two-script', get_stylesheet_directory_uri() . '/js/scripts.min.js');
    wp_enqueue_script('tier-one-two-script');
    
    wp_enqueue_style('google-noto', 'https://fonts.googleapis.com/css?family=Noto+Serif');
    wp_enqueue_style('material-icon', 'http://fonts.googleapis.com/icon?family=Material+Icons');
}
add_action('wp_enqueue_scripts', 'tier_one_two_styles_scripts');

require get_template_directory() . '/inc/features-init.php';

require get_template_directory() . '/inc/breadcrumbs.php';

require get_template_directory() . '/inc/walkers.php';

require get_template_directory() . '/inc/view-system.php';

require get_template_directory() . '/inc/material-comments.php';

require get_template_directory() . '/inc/multi_tab_widget.php';

require get_template_directory() . '/inc/widgets/widgets.php';


function force_relative_url()
{
    // get host name from URL
    preg_match("/^(http:\/\/)?([^\/]+)/i",home_url(), $matches);
    $host = $matches[2];

    // get last two segments of host name
    preg_match("/[^\.\/]+\.[^\.\/]+$/", $host, $matches);
    return strtoupper($matches[0]);
}

function _social_media(){
?>
    <div class="sm-action hide-on-med-and-down">
        <?php 
        $url = get_the_permalink(); 
        $url = urlencode(esc_url($url));?>
        <a class="facebook btn" href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>" target='_blank'>
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a class="twitter btn" target='_blank' href='https://twitter.com/share?url=<?php echo $url; ?>'>
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a class="linkedin btn" target='_blank' href='http://www.linkedin.com/shareArticle?url=<?php echo $url; ?>'>
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a class="reddit btn" target='_blank' href='http://reddit.com/submit?url=<?php echo $url; ?>'>
            <i class="fa fa-reddit-alien" aria-hidden="true"></i>
        </a>
        <a class="google-plus btn" target='_blank' href='https://plus.google.com/share?url=<?php echo $url; ?>'>
            <i class="fa fa-google-plus" aria-hidden="true"></i>
        </a>
        <?php $image = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0] : get_first_image() ; ?>
        <a class="pinterest btn" target='_blank' href='http://pinterest.com/pin/create/link/?url=<?php echo $url; ?>&media=<?php echo esc_url( $image ); ?>&description=<?php urlencode(the_title()) ;?>'>
            <i class="fa fa-pinterest" aria-hidden="true"></i>
        </a>
    </div>
<?php
}

function themeslug_remove_hentry( $classes ) {
    if ( is_page() ) {
        $classes = array_diff( $classes, array( 'hentry' ) );
    }
    return $classes;
}
add_filter( 'post_class','themeslug_remove_hentry' );